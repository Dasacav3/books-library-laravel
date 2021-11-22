@include('layouts.head', ['title' => 'Books'])

@include('layouts.validate_session')

@include('layouts.admin_nav')

<div class="w-full">
    <div class="container m-auto flex flex-col justify-center items-center">
        <div>
            <div>
                <h1 class="text-2xl font-extrabold my-8">Libros</h1>
            </div>
        </div>
        <div>
            <div>
                <div class="flex justify-center mb-3" x-data="{open:false}">
                    <button class="bg-red-500 text-white p-1 rounded-lg" @click="open = true"><i
                            class="fas fa-plus-circle"></i> Añadir</button>
                    <div x-show="open" class="border shadow-xl absolute bg-gray-200 rounded-xl mt-5">
                        <form action="{{ url('/books/create') }}" method="POST" class="flex flex-col p-10"
                            enctype="multipart/form-data">
                            <i class="fas fa-times-circle text-red-500" @click="open = false"></i>
                            @csrf
                            <p class="font-bold text-center text-xl mb-5">Añadir Libro</p>
                            <label for="title">Titulo</label>
                            <input type="text" name="title" id="title" class="border-2">
                            <label for="isbn">ISBN</label>
                            <input type="text" name="isbn" id="isbn" class="border-2">
                            <label for="publication_date">Fecha publicación</label>
                            <input type="date" name="publication_date" id="publication_date" class="border-2">
                            <label for="topic">Tema</label>
                            <select name="topic" id="topic">
                                <option value="">Selecciona un tema</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                @endforeach
                            </select>
                            <label for="author">Autor</label>
                            <select name="author" id="author">
                                <option value="">Selecciona un autor</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->full_name }}</option>
                                @endforeach
                            </select>
                            <label for="image">Imagen</label>
                            <input type="file" name="image" id="image" class="border-2" accept="image/*">
                            <button class="bg-blue-500 mt-4">Aceptar</button>
                        </form>
                    </div>
                </div>
                <table class="w-full table-fixed border-2 text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>ISBN</th>
                            <th>Titulo</th>
                            <th>Fecha publicación</th>
                            <th>Autor</th>
                            <th>Tema</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td><img src="{{ url('/storage/images/' . $book->image) }}" class="rounded-xl" width="150"></td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->publication_date }}</td>
                                <td>{{ $book->full_name }}</td>
                                <td>{{ $book->name }}</td>
                                <td>
                                    <a href="{{ url('/books/' . $book->id) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ url('/books/' . $book->id . '/delete') }}" class="btn btn-danger"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
