<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function listTickets()
    {
        $tickets = Ticket::all();

        return view('ticket', compact('tickets'));
    }

    public function orderTicket(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|max:255',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|min:12|max:13',
            'quantity' => 'required|integer|min:1',
        ]);

        $ticket = Ticket::findOrFail($request->input('ticket_id'));

        if ($ticket->stock <= 0) {
            return back()->with('error', 'Tiket sudah sold out.');
        }
    
        if ($request->quantity > $ticket->stock) {
            return back()->with('error', 'Tiket tidak cukup.');
        }

        $totalPrice = $ticket->price * $request->quantity;

        $updatedStock = $ticket->stock - $request->quantity;

        $order = Order::create([
            'ticket_id' => $ticket->id,
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'Unpaid'
        ]);

        $ticket->update(['stock' => $updatedStock]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $totalPrice,
            ),
            'customer_details' => array(
                'name' => $request->customer_name,
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'order'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }
    
    public function cancelOrder(Order $order)
    {
        $order->delete();

        return Redirect::route('ticket');
    }
    
    public function invoice($id)
    {
        $order = Order::find($id);

        return view('invoice', compact('order'));
    }
}
