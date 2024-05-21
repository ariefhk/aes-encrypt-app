  <div id="sidebar__hide_effect" class="d-flex flex-column flex-shrink-0  bg-light" style="width: 280px;height:100vh">
      <div class="px-3 border-bottom d-flex align-items-center" style="height:73px">
          <div class="d-flex px-3 align-items-center gap-3">
              <i class="bi bi-file-lock2-fill fs-2 d-block"></i>
              <h4>AES ENCRYPT</h4>
          </div>
      </div>
      <ul class="nav nav-pills px-3 pt-3 flex-column mb-auto gap-2 ">
          <li class="nav-item">
              <x-sidebar.link href="{{ route('home.index') }}">
                  <i class="bi bi-house-door sidebar__icon"></i>
                  Dashboard
              </x-sidebar.link>
          </li>
          <li class="nav-item">
              <x-sidebar.link href="{{ route('encrypt.index') }}">
                  <i class="bi bi-lock sidebar__icon"></i>
                  Enkripsi
              </x-sidebar.link>
          </li>
          <li class="nav-item">
              <x-sidebar.link href="{{ route('decrypt.index') }}">
                  <i class="bi bi-unlock sidebar__icon"></i>
                  Dekripsi
              </x-sidebar.link>
          </li>
          <li class="nav-item">
              <x-sidebar.link href="{{ route('all-files.index') }}">
                  <i class="bi bi-collection sidebar__icon"></i>
                  Semua File
              </x-sidebar.link>
          </li>

      </ul>
      <hr class="mb-5">
  </div>
