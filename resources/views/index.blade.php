@include('layouts.head', ['title' => 'Book Library'])

@include('layouts.navbar')

<div class="container m-auto flex h-screen">
    @foreach ($books as $book)
        <div class="max-w-sm rounded overflow-hidden shadow-lg my-5">
            <div class="flex justify-center my-3">
                <img src="{{ url('/storage/images/' . $book->image) }}" width="150px" class="rounded-xl">
            </div>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $book->title }}</div>
                <p class="text-gray-700 text-base">
                    ISBN: {{ $book->isbn }}
                </p>
                <p class="text-gray-700 text-base">
                    Autor: {{ $book->full_name }}
                </p>
                <p class="text-gray-700 text-base">
                    Tema: {{ $book->name }}
                </p>
                <p class="text-gray-700 text-base">
                    Fecha de publicación: {{ $book->publication_date }}
                </p>
            </div>
        </div>
    @endforeach
</div>

<div id="about" class="bg-blue-100 container m-auto p-5">
    <h3 class="text-center text-3xl font-bold py-5">About</h3>
    <ul class="list-disc pl-5">
        <li>
            Book library is a open source project development in Laravel.
        </li>
        <li>
            The project was created for the purpose of learning about the Laravel framework.
        </li>
        <li>
            This is a CRUD application.
        </li>
        <li>
            The design is created with TailwindCSS.
        </li>
    </ul>
    </p>
    <p class="font-bold pt-8">Autor: @Dasacav3</p>
</div>

@include('layouts.footer')
