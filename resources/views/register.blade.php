<x-auth-layout title="Register">

    <div class="auth row">
        <div class="card col-11 col-lg-4">
            <div class="card-body">
                <h4 class="border-bottom pb-3">DAFTAR
                    AES ENCRYPT APP</h4>
                <form action="{{ route('register.store') }}" method="POST" class="d-flex flex-column pt-2">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            aria-describedby="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 ">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group ">
                            <input class="form-control" id="password" type="password" name="password"
                                placeholder="Masukan Password" autocomplete="off">
                            <span class="input-group-text" id="togglePassword" style="cursor: pointer">
                                <i class="bi bi-eye-slash" id="iconTogglePassword"></i>
                            </span>
                        </div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <span class="d-block pt-2"> Sudah punya akun? <a href="{{ route('login') }}">Login
                                Disini!</a></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
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
</x-auth-layout>
