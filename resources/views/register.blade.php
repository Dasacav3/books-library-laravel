@include('layouts.head', ['title' => 'Registro'])

<div class="bg-gradient-to-r from-blue-300 via-red-500 to-yellow-500 w-screen h-screen flex justify-center items-center">
    <div class="flex shadow-xl bg-white rounded-xl flex-row-reverse">
        <div>
            <img src="https://images.pexels.com/photos/1850022/pexels-photo-1850022.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                alt="books" class="object-cover rounded-xl" style="width:400px;heigth:100%">
        </div>
        <a href="{{ url('/login') }}" class="absolute text-2xl text-white shadow-xl" title="Return Home Page">
            <i class="fas fa-arrow-circle-left"></i>
        </a>
        <div class="flex items-center px-10">
            <form action="{{ url('/registeruser') }}" method="POST">
                @csrf

                @if (session('error'))
                    <div class="bg-red-500 rounded-md my-2 text-center text-white font-medium">
                        {{ session('error') }}
                    </div>
                @endif

                <h1 class="font-bold text-5xl my-5 text-center">¡Registrate!</h1>
                <div class="mb-4">
                    <label for="first_name">Nombre(s)</label>
                    <input type="first_name" name="first_name" id="first_name" class="border border-gray-400 p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="last_name">Apellido(s)</label>
                    <input type="last_name" name="last_name" id="last_name" class="border border-gray-400 p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full">
                </div>
                <div class="mb-4">
                    <button class="bg-blue-700 text-white p-2 rounded-lg">Crear cuenta</button>
                </div>
                <div class="mb-4">
                    <a href="{{ url('/login') }}" class="border-b-2 border-blue-300">¿Ya tiene una cuenta? Inicia
                        sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
