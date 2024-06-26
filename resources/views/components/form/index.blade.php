 <form method="POST" enctype="multipart/form-data">
     @csrf
     <div class="mb-3">
         <label for="name" class="form-label">Nama File</label>
         <input type="text" class="form-control" id="name" aria-describedby="emailHelp" autocomplete="off"
             placeholder="Masukan Nama File" name="name">
     </div>
     <div class="mb-3">
         <label for="formFile" class="form-label">File</label>
         <input class="form-control" type="file" name="file" id="formFile" autocomplete="off"
             placeholder="Masukan File">
     </div>
     <div class="mb-3">
         <label for="password" class="form-label">Masukan Sandi Rahasia</label>
         <div class="input-group ">
             <input class="form-control" id="password" type="password" name="password"
                 placeholder="Masukan Sandi Rahasia" autocomplete="off">
             <span class="input-group-text" id="togglePassword" style="cursor: pointer">
                 <i class="bi bi-eye-slash" id="iconTogglePassword"></i>
             </span>
         </div>
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
 </form>
