<aside class="sidebar w-72 p-6 text-white fixed h-screen top-0 left-0 overflow-y-auto z-50">
    <div class="flex items-center mb-10 pl-2">
        <div class="glass-effect p-3 rounded-2xl mr-4">
            <i class="bi bi-mortarboard-fill text-2xl text-white"></i>
        </div>
        <h2 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100 whitespace-nowrap">
            EduPrime
            <span class="text-xs font-normal bg-white/10 px-2 py-1 rounded-md ml-2">ADMIN</span>
        </h2>
    </div>

    <nav class="flex flex-col space-y-3 mt-5">
        <a href="<?php echo site_url('home'); ?>" class="nav-item active flex items-center p-4 rounded-xl font-medium">
            <div class="bg-white/10 p-3 rounded-xl mr-4">
                <i class="bi bi-bar-chart text-lg"></i>
            </div>
            <span>Dashboard</span>
            <div class="ml-auto w-2 h-2 bg-white rounded-full"></div>
        </a>

        <a href="<?php echo site_url('student'); ?>" class="nav-item flex items-center p-4 rounded-xl font-medium">
            <div class="bg-white/10 p-3 rounded-xl mr-4">
                <i class="bi bi-people-fill text-lg"></i>
            </div>
            <span>Data Siswa</span>
        </a>

        <a href="<?php echo base_url('admin/guru'); ?>" class="nav-item flex items-center p-4 rounded-xl font-medium">
            <div class="bg-white/10 p-3 rounded-xl mr-4">
                <i class="bi bi-person-badge text-lg"></i>
            </div>
            <span>Data Guru</span>
        </a>

        <a href="<?php echo site_url('tryout'); ?>" class="nav-item flex items-center p-4 rounded-xl font-medium">
            <div class="bg-white/10 p-3 rounded-xl mr-4">
                <i class="bi bi-pencil-square text-lg"></i>
            </div>
            <span>Try Out</span>
        </a>

        <a href="<?php echo site_url('admin/buku/index'); ?>" class="nav-item flex items-center p-4 rounded-xl font-medium">
            <div class="bg-white/10 p-3 rounded-xl mr-4">
                <i class="bi bi-book text-lg"></i>
            </div>
            <span>Buku</span>
        </a>

        <a href="<?php echo site_url('latihan'); ?>" class="nav-item flex items-center p-4 rounded-xl font-medium">
            <div class="bg-white/10 p-3 rounded-xl mr-4">
                <i class="bi bi-lightbulb text-lg"></i>
            </div>
            <span>Latihan Soal</span>
        </a>
    </nav>
</aside>
