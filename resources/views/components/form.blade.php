<form action="{{ route('order')}}" method="POST" class="w-auto max-w-lg mx-auto p-5">
    <h1 class="text-center p-2 pb-10 font-bold text-white text-4xl">Pesan Tiket Sekarang</h1>
    @csrf
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block mb-2 text-sm font-medium text-white" for="grid-name">
                Nama
            </label>
            <input name="customer_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                id="grid-name" type="text" required>
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block mb-2 text-sm font-medium text-white" for="phone">
                No. Telepon
            </label>
            <input name="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                id="grid-last-name" type="tel" required>
        </div>
    </div>
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block mb-2 text-sm font-medium text-white" for="email">
                Email
            </label>
            <div class="flex">
                <input name="email"
                    class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                    id="email" type="email" required>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap mx-3 mb-6 mt">
        <div class="w-full px-3 mb-6 md:mb-0 flex flex-row">
            <div class="w-full md:w-1/2 pr-3">
                <label class="block tracking-wide text-white text-xs font-bold mb-2" for="tickets">
                    Pilih Tiket
                </label>
                <select name="ticket_id"
                    class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    id="grid-state" required>
                    @foreach ($tickets as $ticket)
                        <option value="{{ $ticket->id }}">
                            {{ $ticket->title }}
                            (Rp{{ number_format($ticket->price, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-1/2 pl-3">
                <label class="block tracking-wide text-white text-xs font-bold mb-2" for="grid-quantity">
                    Jumlah
                </label>
                <input name="quantity"
                    class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    id="grid-quantity" type="number">
            </div>
        </div>
    <button type="submit"
        class="text-white bg-emerald-400 hover:bg-emerald-600 focus:ring-4 focus:outline-none focus:ring-emerald-200 font-medium rounded-lg text-sm w-full px-3 py-2.5 text-center">Submit</button>
</form>