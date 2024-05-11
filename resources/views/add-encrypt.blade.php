<x-app-layout title="Tambah File Enkripsi">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="{{ route('encrypt.index') }}">Enkripsi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah File Enkripsi</li>
        </ol>
    </nav>
    <h3 class="fw-bold">Tambah File Enkripsi</h3>
    <div class='pt-4 row'>
        <div class="col-6 pt-4">
            <form method="POST" enctype="multipart/form-data" action="{{ route('file.encrypt') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama File</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        autocomplete="off" placeholder="Masukan Nama File" name="name">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">File</label>
                    <input class="form-control" type="file" name="file" id="formFile" autocomplete="off"
                        placeholder="Masukan File">
                </div>
                <div class="mb-3">
                    <label for="secretKey" class="form-label">Masukan Sandi Rahasia</label>
                    <div class="input-group ">
                        <input class="form-control" id="password" type="password" name="secretKey"
                            placeholder="Masukan Sandi Rahasia" autocomplete="off">
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer">
                            <i class="bi bi-eye-slash" id="iconTogglePassword"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>


    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const iconTogglePassword = document.querySelector("#iconTogglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the eye icon
            iconTogglePassword.classList.toggle('bi-eye');
            iconTogglePassword.classList.toggle('bi-eye-slash');
        });
    </script>

</x-app-layout>
