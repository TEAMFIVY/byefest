<div class="container-fluid mt-4">

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
				</div>
			</div>
		</div>

		<div class="row g-4">

			<div class="col-lg-8">
				<div class="card bg-white border-0 shadow-lg h-100 rounded-4">
					<div class="card-header bg-primary text-white border-0 p-3 rounded-top-4">
						<h6 class="mb-0 fw-bold"><i class="fas fa-chart-line me-2"></i> Aktivitas Pendaftaran Member (7
							Hari Terakhir)</h6>
					</div>
					<div class="card-body">
					</div>
				</div>
			</div>
		</div>
	</div>