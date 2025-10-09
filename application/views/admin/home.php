<div class="container-fluid mt-4">

    <div class="mb-4">
        <h1 class="fw-bolder text-dark">Dashboard Admin</h1>
        <p class="text-muted">Ringkasan cepat dan aksi utama sistem perpustakaan dan tryout Anda.</p>
    </div>

    <div class="row g-4 mb-5">
        
        <div class="col-xl-3 col-md-6">
            <div class="card bg-white border-0 shadow-lg h-100 p-3 rounded-4 lift-up-hover">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title text-muted mb-2 text-uppercase fw-bold fs-6">Total Buku</h5>
                        <h1 class="display-4 fw-bolder text-primary"><?= $jumlah_buku ?></h1>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-book-open fa-3x text-primary opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <small class="text-success fw-bold"><i class="fas fa-arrow-up"></i> 10% dari bulan lalu</small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-white border-0 shadow-lg h-100 p-3 rounded-4 lift-up-hover">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title text-muted mb-2 text-uppercase fw-bold fs-6">Total Member</h5>
                        <h1 class="display-4 fw-bolder text-success"><?= $jumlah_member ?></h1>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-users fa-3x text-success opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <small class="text-success fw-bold"><i class="fas fa-plus-circle"></i> 5 member baru hari ini</small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-white border-0 shadow-lg h-100 p-3 rounded-4 lift-up-hover">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title text-muted mb-2 text-uppercase fw-bold fs-6">Latihan Soal</h5>
                        <h1 class="display-4 fw-bolder text-warning"><?= $jumlah_latihan ?></h1>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-pencil-ruler fa-3x text-warning opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <small class="text-muted">Total soal tersedia</small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-white border-0 shadow-lg h-100 p-3 rounded-4 lift-up-hover">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title text-muted mb-2 text-uppercase fw-bold fs-6">Tryout Aktif</h5>
                        <h1 class="display-4 fw-bolder text-danger"><?= $jumlah_tryout ?></h1>
                    </div>
                    <div class="flex-shrink-0">
                        <i class="fas fa-clipboard-list fa-3x text-danger opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <small class="text-danger fw-bold">Lihat jadwal</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="card bg-white border-0 shadow-lg h-100 rounded-4">
                <div class="card-header bg-primary text-white border-0 p-3 rounded-top-4">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-chart-line me-2"></i> Aktivitas Pendaftaran Member (7 Hari Terakhir)</h6>
                </div>
                <div class="card-body">
                    <div style="height: 350px;" class="d-flex align-items-center justify-content-center">
                        <p class="text-center text-muted">
                            *Tempat untuk menampilkan grafik batang atau garis interaktif.*
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            
            <div class="card bg-white border-0 shadow-lg mb-4 rounded-4">
                <div class="card-header bg-light border-0 p-3 rounded-top-4">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-bolt me-2 text-warning"></i> Aksi Cepat</h6>
                </div>
                <div class="card-body p-3">
                    <a href="#" class="btn btn-primary w-100 mb-2 rounded-pill"><i class="fas fa-plus-circle me-2"></i> Tambah Buku Baru</a>
                    <a href="#" class="btn btn-success w-100 mb-2 rounded-pill"><i class="fas fa-user-plus me-2"></i> Daftarkan Member</a>
                    <a href="#" class="btn btn-outline-secondary w-100 rounded-pill"><i class="fas fa-bell me-2"></i> Kirim Notifikasi Massal</a>
                </div>
            </div>
            
            <div class="card bg-white border-0 shadow-lg rounded-4">
                <div class="card-header bg-light border-0 p-3 rounded-top-4">
                    <h6 class="mb-0 fw-bold"><i class="fas fa-history me-2 text-info"></i> Log Aktivitas Terbaru</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Admin **Budi** mengedit buku "Kimia Dasar".
                            <span class="badge bg-secondary">5m lalu</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Member **Rina** baru mendaftar.
                            <span class="badge bg-success">1j lalu</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Tryout "Fisika" selesai diunggah.
                            <span class="badge bg-primary">3j lalu</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-link p-0 mt-2">Lihat Semua Log</a>
                </div>
            </div>
        </div>
    </div>
</div>