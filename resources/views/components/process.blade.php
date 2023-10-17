<div class="flex justify-center items-center h-screen">
    <div class="bg-white rounded-xl shadow-md p-5 w-1/2 text-black">
        <div class="flex justify-between pb-4">
            <form action="{{ route('cancel', $order)}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-error btn-sm">Batal</button>
            </form>
            <p>Tgl Pembelian: {{ date('l, d F Y', strtotime($order->created_at)) }}</p>
        </div>
        <h1 class="text-3xl font-bold">Proses Pembayaran</h1>
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
        <p class="text-end text-xl pr-2 font-bold"> Rp.
            {{ number_format($order->total_price, 0, ',', '.') }} </p>
        <button id="pay-button" class="btn btn-md btn-accent">Bayar!</button>
    </div>
</div>