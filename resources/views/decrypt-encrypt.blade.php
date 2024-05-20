<x-app-layout title="Tambah File Enkripsi">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="{{ route('decrypt.index') }}">Dekripsi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Enkrip File yang Terdekripsi</li>
        </ol>
    </nav>
    <h3 class="fw-bold">Enkrip File yang Tedekripsi</h3>
    <div class='pt-4 row justify-between gap-5'>
        <div class="col-6 pt-4">
            <form method="POST" action="{{ route('file.encrypt') }}">
                @csrf
                <input type="hidden" value="{{ $id }}" name="id" id="id">
                <div class="mb-3">
                    <label for="secretKey" class="form-label">Sandi Rahasia</label>
                    <input type="text" class="form-control" id="secretKey" aria-describedby="secretKey"
                        autocomplete="off" placeholder="Masukan Sandi Rahasia File" name="secretKey">
                </div>
                <button type="submit" class="btn btn-primary">Enkrip File</button>
            </form>
        </div>
        <div class="col-5 d-flex flex-column gap-3">
            <div class="card">
                <div class="card-header">
                    <h5>Keterangan File</h5>
                </div>
                <div class="card-body">
                    <ul class="tata_cara">
                        <li><span class="fw-bold">Nama File:</span> {{ $name }}</li>
                        <li><span class="fw-bold">Ukuran File:</span> {{ $size }}</li>

                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-semibold">Petunjuk Enkrip file yang sudah didekripsi AES
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="tata_cara">
                        <li><span class="fw-bold">1.</span> Pastikan file yang akan dienkripsi sudah benar dengan
                            mengecek pada keterangan file</li>
                        <li><span class="fw-bold">2.</span> Masukan Sandi Rahasia maksimal 64 karakter</li>
                    </ul>
                </div>
            </div>
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
