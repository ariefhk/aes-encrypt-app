<x-app-layout title="Tambah File Enkripsi">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="{{ route('encrypt.index') }}">Enkripsi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dekrip File yang Terenkripsi</li>
        </ol>
    </nav>
    <h3 class="fw-bold">Dekrip File yang Terenkripsi</h3>
    @if (session('error'))
        <div class="alert alert-danger" id="error-message">
            {{ session('error') }}
        </div>
    @endif
    <div class='pt-4 row justify-between gap-5'>
        <div class="col-6 pt-4">
            <form method="POST" action="{{ route('file.decrypt', ['id' => $id]) }}">
                @csrf
                <div class="mb-3">
                    <label for="secretKey" class="form-label">Sandi Rahasia</label>
                    <input type="text" class="form-control" id="secretKey" aria-describedby="secretKey"
                        autocomplete="off" placeholder="Masukan Sandi Rahasia File" name="secretKey">
                    @error('secretKey')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Dekrip File</button>
            </form>
        </div>
        <div class="col-5 d-flex flex-column gap-3">
            {{-- <h5>Keterangan File</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nama File</th>
                        <td width="260px">{{ $name }}</td>

                    </tr>
                    <tr>
                        <th>Ukuran File</th>
                        <td width="260px">{{ $size }}</td>
                    </tr>
                </tbody>
            </table> --}}
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
                    <h5 class="card-title fw-semibold">Petunjuk Dekrip file yang sudah dienkripsi AES
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

    <script>
        // Hide the error message after 10 seconds
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000); // 10000 milliseconds = 10 seconds
    </script>

</x-app-layout>
