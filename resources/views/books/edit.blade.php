@include('layouts.head', ['title' => 'Books Edit'])

@include('layouts.validate_session')

@include('layouts.admin_nav')

<div class="w-full">
    <div class="container m-auto flex flex-col justify-center items-center">
        <div>
            <div>
                <h1 class="text-2xl font-extrabold my-8">Libro #{{ $book->id }}</h1>
            </div>
        </div>
        <div>
            <div class="border shadow-xl bg-gray-200 rounded-xl mt-5">
                <form action="{{ url('/books/' . $book->id . '/edit') }}" method="POST" class="flex flex-col p-10"
                    enctype="multipart/form-data">
                    @csrf
                    <p class="font-bold text-center text-xl mb-5">Añadir Libro</p>
                    <label for="title">Titulo</label>
                    <input type="text" name="title" id="title" class="border-2" value="{{ $book->title }}">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="border-2" value="{{ $book->isbn }}">
                    <label for="publication_date">Fecha publicación</label>
                    <input type="date" name="publication_date" id="publication_date" class="border-2"
                        value="{{ $book->publication_date }}">
                    <label for="topic">Tema</label>
                    <select name="topic" id="topic" required>
                        <option value="">Selecciona un tema</option>
                        @foreach ($topics as $topic)
                            @if ($topic->id == $book->id_topic)
                                <option value="{{ $topic->id }}" selected>{{ $topic->name }}</option>
                            @else
                                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <label for="author">Autor</label>
                    <select name="author" id="author" required>
                        <option value="">Selecciona un autor</option>
                        @foreach ($authors as $author)
                            @if ($author->id == $book->id_author)
                                <option value="{{ $author->id }}" selected>{{ $author->full_name }}</option>
                            @else
                                <option value="{{ $author->id }}">{{ $author->full_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <label for="image">Imagen</label>
                    <input type="file" name="image" id="image" class="border-2" accept="image/*">
                    <button class="bg-blue-500 mt-4">Aceptar</button>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
