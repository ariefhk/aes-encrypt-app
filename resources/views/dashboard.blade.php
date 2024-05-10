<x-app-layout title="Dasboard">
    <h3 class="fw-bold">Dashboard</h3>
    <div class='pt-4 row gap-4'>
        <div class="card col-3">
            <div class="card-body">
                <h5 class="card-title">Enkripsi</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary card__sub__title">Jumlah File yang di
                    Enkripsi</h6>
                <p class="card-text card__text">{{ $encrytedFiles }}</p>
            </div>
        </div>
        <div class="card col-3">
            <div class="card-body">
                <h5>Dekripsi</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary card__sub__title">Jumlah File yang di
                    Dekripsi</h6>
                <p class="card-text card__text">{{ $totaldecrytedFiles }}</p>
            </div>
        </div>
        <div class="card col-3">
            <div class="card-body">
                <h5>Semua File</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary card__sub__title">Jumlah Semua File</h6>
                <p class="card-text card__text">{{ $totalFiles }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
