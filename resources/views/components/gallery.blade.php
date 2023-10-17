<div id="gallery" class="mx-auto pb-8 lg:justify-items-center sm:justify-self-center">
    <h1 class="py-8 text-4xl text-center font-bold text-white md:text-5xl lg:text-6xl">Galeri Ladaya</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-6">
        @foreach ($contents as $content)
            <div class="text-justify bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl shadow-md">
                <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $content->image) }}"
                    alt="Galeri Ladaya">
                <h4 class="text-center text-xl text-black font-bold pt-4"> {{ $content->title }} </h4>
                <p class="text-black p-4"> {{ $content->body }} </p>
            </div>
        @endforeach
    </div>
</div>
