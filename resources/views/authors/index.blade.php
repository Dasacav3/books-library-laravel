@include('layouts.head', ['title' => 'Authors'])

@include('layouts.validate_session')

@include('layouts.admin_nav')

<div class="w-full" >
    <div class="container m-auto flex flex-col justify-center items-center">
        <div>
            <div>
                <h1 class="text-2xl font-extrabold my-8">Autores</h1>
            </div>
        </div>
        <div>
            <div>
                <div class="flex justify-center mb-3" x-data="{open:false}">
                    <button class="bg-red-500 text-white p-1 rounded-lg" @click="open = true"><i
                            class="fas fa-plus-circle"></i> Añadir</button>
                    <div x-show="open" class="border shadow-xl absolute bg-gray-200 rounded-xl mt-5">
                        <form action="{{ url('/authors/create') }}" method="POST" class="flex flex-col p-10">
                            <i class="fas fa-times-circle text-red-500" @click="open = false"></i>
                            @csrf
                            <p class="font-bold text-center text-xl mb-5">Añadir Autor</p>
                            <label for="full_name">Nombre completo</label>
                            <input type="text" name="full_name" id="full_name" class="border-2">
                            <button class="bg-blue-500 mt-4">Aceptar</button>
                        </form>
                    </div>
                </div>
                <table class="w-full table-fixed border-2 text-center">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Fecha de creación</th>
                            <th>Fecha de actualización</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->full_name }}</td>
                                <td>{{ $author->created_at }}</td>
                                <td>{{ $author->updated_at }}</td>
                                <td>
                                    <a href="{{ url('/authors/' . $author->id) }}"
                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ url('/authors/' . $author->id . '/delete') }}"
                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
