@if (!session('user'))
    <script>
        window.history.go(-1);
    </script>
@endif
