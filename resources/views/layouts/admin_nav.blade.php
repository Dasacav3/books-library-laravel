<div class="w-full bg-red-500">
    <div class="container m-auto flex items-center justify-between text-white py-4">
        <div class="flex items-center">
            <i class="fas fa-tachometer-alt text-xl"></i>
            <h1 class="font-semibold text-xl ml-5"><a href="{{ url('/home') }}">Dashboard</a></h1>
        </div>
        <ul class="flex">
            <li class="px-2"><i class="fas fa-user"></i> <a href="{{ url('/authors') }}">Autores</a></li>
            <li class="px-2"><i class="fas fa-book"></i> <a href="{{ url('/books') }}">Libros</a></li>
            <li class="px-2"><i class="fas fa-bookmark"></i> <a href="{{ url('/topics') }}">Temas</a></li>
            <li class="px-2"><i class="fas fa-cog"></i> <a href="{{ url('/profile') }}">Profile</a></li>
            <li class="px-2"><i class="fas fa-power-off"></i> <a href="{{ url('/logout') }}">Cerrar sesión</a></li>
        </ul>
    </div>
</div>
