<div class="flex justify-center items-center h-screen">
    <div class="bg-white rounded-xl shadow-md p-5 w-1/2 text-black">
        <div class="flex justify-between pb-4">
            <p>Tgl Pembelian: {{ date('l, d F Y', strtotime($order->created_at)) }}</p>
        </div>
        <h1 class="text-3xl font-bold">Pembayaran Berhasil!</h1>
        <div class="p-4 text-xl">
            <p>{{ $order->customer_name }}</p>
            <p>{{ $order->email }}</p>
            <p>{{ $order->phone }}</p>
        </div>        
        <div class="p-2 text-xl flex justify-between">
            <p>Jumlah Tiket: {{ $order->quantity }} Tiket</p>
            <p>Total Keseluruhan</p>
        </div>
        <hr class="my-4 border-t-2 border-gray-300">
        <div class="flex justify-between px-2 font-bold text-white">
            @if ($order->status == 'Paid')
                <p class="bg-green-500 rounded-xl p-2">{{ $order->status }}</p>
            @else
                <p class="bg-red-500 rounded-xl p-2">{{ $order->status }}</p>
            @endif
            <p class="text-xl text-black pr-2 font-bold"> Rp.
                {{ number_format($order->total_price, 0, ',', '.') }} </p>
        </div>
        <p class="text-base text-center italic pt-4">Terima kasih sudah membeli tiket, Screenshot tiket ini sebagai tanda bukti <br> Kami tunggu kehadiran kalian!</p>
    </div>
</div>