<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Aplikasi Enkripsi AES</title>
</head>

<body>

    <div class=" main">
        <div id="sidebar__hide_effect" class="d-flex flex-column flex-shrink-0  bg-light"
            style="width: 280px;height:100vh">
            <div class="sidebar__left__icon">
                <span class="px-3">
                    AES ENCRYPT</span>
            </div>
            <ul class="nav nav-pills px-3 flex-column mb-auto gap-2 ">
                <li class="nav-item">
                    <a href="#" class="nav-link active d-flex align-items-center gap-3 sidebar__link"
                        aria-current="page">
                        <i class="bi bi-house-door-fill sidebar__icon"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark  d-flex align-items-center gap-3 sidebar__link">
                        <i class="bi bi-lock sidebar__icon"></i>
                        Enkripsi
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark  d-flex align-items-center gap-3 sidebar__link">
                        <i class="bi bi-unlock sidebar__icon"></i>
                        Dekripsi
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark  d-flex align-items-center gap-3 sidebar__link">
                        <i class="bi bi-collection sidebar__icon"></i>
                        Semua File
                    </a>
                </li>

            </ul>
            <hr class="mb-5">
        </div>
        <div class="w-100 sidebar__right">
            <div class="navbar  navbar-expand-lg   border-bottom  p-3 h-100">
                <div class="container-fluid ">
                    <i id="sidebar__hide" class="bi bi-list sidebar__icon"></i>
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
