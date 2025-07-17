<!-- HEADER -->
    <div class="container mt-3">
        <img src="https://klikdata.co.id/media/uploads/header_siakad.png" alt="Header Siakad" class="header-img img-fluid rounded">
        <h1 class="text-center main-title">Sistem Informasi Akademik</h1>
        <p class="text-center main-desc">Selamat datang di Sistem Informasi Akademik Universitas Nurdin Hamzah Jambi</p>
    </div>

<!-- NAVBAR -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand font-weight-bold" href="#">Siakad</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="{{ route('mhs-baru') }}">Data Mhs</a>
                    <a class="nav-item nav-link" href="{{ route('mhs-insert') }}">Insert Data</a>
                </div>
            </div>
        </nav>
    </div>
<!-- END NAVBAR -->