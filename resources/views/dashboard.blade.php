@include('layouts.head', ['title' => 'Dashboard'])

@include('layouts.validate_session')

@include('layouts.admin_nav')

<div class="w-full">
    <div class="container m-auto">
        Dashboard
    </div>
</div>

@include('layouts.footer')
