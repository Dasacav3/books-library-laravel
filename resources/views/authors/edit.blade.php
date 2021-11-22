@include('layouts.head', ['title' => 'Authors Edit'])

@include('layouts.validate_session')

@include('layouts.admin_nav')

<div class="w-full">
    <div class="container m-auto flex flex-col justify-center items-center">
        <div>
            <div>
                <h1 class="text-2xl font-extrabold my-8">Autor #{{ $author->id }}</h1>
            </div>
        </div>
        <div>
            <div class="border shadow-xl bg-gray-200 rounded-xl mt-5">
                <form action="{{ url('/authors/' . $author->id . '/edit') }}" method="POST" class="flex flex-col p-10">
                    @csrf
                    @method('PUT')
                    <label for="full_name">Nombre completo</label>
                    <input type="text" name="full_name" id="full_name" class="border-2" value="{{ $author->full_name }}">
                    <button class="bg-blue-500 mt-4">Aceptar</button>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
