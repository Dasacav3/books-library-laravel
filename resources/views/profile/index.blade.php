@include('layouts.head', ['title' => 'Profile'])

@include('layouts.validate_session')

@include('layouts.admin_nav')

<div class="container m-auto flex my-5">
    <div>
        <img src="{{ url('/storage/profile/' . $user->image) }}" class="rounded-full bg-red-500" width="200" height="200">
        <p class="font-bold text-center">{{ $user->first_name . ' ' . $user->last_name }}</p>
    </div>
    <form class="flex flex-col pl-10 w-full" method="POST" action="{{ url('/profile/update') }}" enctype="multipart/form-data">
        @csrf
        <h1 class="text-center font-bold text-3xl mb-5">Perfil</h1>
        <label for="first_name">Nombre(s)</label>
        <input type="text" name="first_name" id="first_name" class="border-2" required value="{{ $user->first_name }}">
        <label for="last_name">Apellido(s)</label>
        <input type="text" name="last_name" id="last_name" class="border-2" required value="{{ $user->last_name }}">
        <label for="email">Correo electronico</label>
        <input type="email" name="email" id="email" class="border-2" required value="{{ $user->email }}">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="border-2">
        <label for="image">Imagen</label>
        <input type="file" name="image" id="image" class="border-2">
        <div class="flex justify-center">
            <input type="submit" value="Guardar" class="mt-5 w-max bg-red-500 text-white p-1 rounded-lg">
        </div>
    </form>
</div>

@include('layouts.footer')
