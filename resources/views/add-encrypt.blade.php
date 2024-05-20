<x-app-layout title="Tambah File Enkripsi">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="{{ route('encrypt.index') }}">Enkripsi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah File Enkripsi</li>
        </ol>
    </nav>
    <h3 class="fw-bold">Tambah File Enkripsi</h3>
    <div class='pt-4 row justify-content-between '>
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
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" id="resetForm" class="btn btn-secondary"
                        onclick="resetFormFields(event)">Reset Input</button>
                </div>
            </form>

        </div>
        <div class="col-5  ">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-semibold">Petunjuk penggunaan Enkripsi AES
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="tata_cara">
                        <li><span class="fw-bold">1.</span> Format File Enkripsi : PDF, Word, PPT, Excel, dan TXT</li>
                        <li><span class="fw-bold">2.</span> Ukuran File Maksimal 2mb</li>
                        <li><span class="fw-bold">3.</span> Kunci Enkripsi berjumlah maksimal 64 karakter</li>
                        <li><span class="fw-bold">4.</span>Tombol enkripsi digunakan untuk mengenkripsi file dengan
                            syarat seluruh textbox telah terisi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const iconTogglePassword = document.querySelector("#iconTogglePassword");

        const name = document.querySelector("#name");
        const password = document.querySelector("#password");
        const file = document.querySelector("#formFile");
        const resetForm = document.querySelector("#resetForm");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the eye icon
            iconTogglePassword.classList.toggle('bi-eye');
            iconTogglePassword.classList.toggle('bi-eye-slash');
        });

        function resetFormFields(e) {
            e.preventDefault();
            e.stopPropagation();

            name.value = "";
            file.value = ""; // Resetting file input
            password.value = "";
        }
    </script>

</x-app-layout>
