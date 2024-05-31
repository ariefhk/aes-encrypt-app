<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <title>
        @isset($title)
            {{ $title }} | Aplikasi Enkripsi AES
        @else
            Aplikasi Enkripsi AES
        @endisset
    </title>
</head>

<body>
    <div class="main">
        <x-sidebar.left />
        <div class="w-100 sidebar__right">
            <div class="navbar  navbar-expand-lg   border-bottom  p-3 h-100">
                <div class="container-fluid ">
                    <i id="sidebar__hide" class="bi bi-list sidebar__icon"></i>
                    @if (Auth::check())
                        <form action="{{ route('logout') }}" method="POST" class="d-flex gap-5 align-items-center">
                            @csrf
                            <span class="fs-4">{{ Auth::user()->name }}</span>
                            <button type="submit" class="btn btn-dark">Logout</button>
                        </form>
                    @else
                        <p>User not logged in.</p>
                    @endif
                </div>
            </div>
            <div class="p-4">
                {{ $slot }}
            </div>
        </div>
    </div>


    <script>
        const sideBarHide = document.querySelector('#sidebar__hide')
        const sideBarTarget = document.querySelector('#sidebar__hide_effect') // add toggle d-none

        sideBarHide.addEventListener('click', function() {
            // Toggle the 'd-none' class on sideBarTarget
            sideBarTarget.classList.toggle('d-none');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>



</body>

</html>
