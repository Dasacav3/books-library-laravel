@include('layouts.head', ['title' => 'Inicia sesión'])

@if (session('user'))
    <script>
        window.location.href = "{{ url('/home') }}";
    </script>
@endif

<div class="bg-gradient-to-r from-yellow-300 via-red-500 to-blue-500 w-screen h-screen flex justify-center items-center">
    <div class="flex shadow-xl bg-white rounded-xl">
        <a href="{{ url('/') }}" class="absolute text-2xl text-white shadow-xl" title="Return Home Page">
            <i class="fas fa-arrow-circle-left"></i>
        </a>
        <div>
            <img src="https://images.pexels.com/photos/1370295/pexels-photo-1370295.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                alt="books" class="object-cover rounded-xl" style="width:400px;height:500px">
        </div>
        <div class="flex items-center px-10">
            <form action="{{ url('/loginuser') }}" method="POST">
                @csrf
                @if (session('error'))
                    <div class="bg-red-500 rounded-md my-2 text-center text-white font-medium">
                        {{ session('error') }}
                    </div>
                @elseif(session('success'))
                    <div class="bg-green-500 rounded-md my-2 text-center text-white font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                <h1 class="font-bold text-5xl my-8 text-center">¡Bienvenido!</h1>
                <div class="mb-4">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full">
                </div>
                <div class="mb-4">
                    <button class="bg-red-700 text-white p-2 rounded-lg">Iniciar Sesión</button>
                </div>
                <div>
                    <a href="{{ url('/register') }}" class="border-b-2 border-red-300">Registrarme</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
