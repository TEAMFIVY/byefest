<header class="header sticky top-0 z-30 w-full px-8 py-5 flex items-center justify-between">
    <div class="md:hidden flex items-center">
        <button onclick="toggleSidebar()" class="text-primary-600 focus:outline-none">
            <i class="bi bi-list text-3xl"></i>
        </button>
    </div>
    <div class="relative w-full max-w-md">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
            <i class="bi bi-search text-slate-400"></i>
        </span>
        <input type="text" placeholder="Cari data..." class="w-full pl-10 pr-4 py-2 rounded-full border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary-500 transition-all duration-300 shadow-sm text-slate-800">
    </div>
    <div class="flex items-center space-x-4">
        <div class="relative">
            <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-primary-600 focus:outline-none pulse">
                <i class="bi bi-bell text-xl"></i>
            </button>
            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
        </div>
        <div class="relative">
            <button onclick="toggleDropdown()" class="flex items-center space-x-2 focus:outline-none">
                <img class="w-10 h-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name=Admin&background=random" alt="Admin" />
                <span class="text-sm font-medium text-slate-600 hidden md:block">Admin</span>
            </button>
            <div id="dropdownMenu" class="dropdown-menu absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg z-50 py-2 hidden">
                <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 transition-colors duration-200">
                    <i class="bi bi-person mr-2"></i> Profil
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 transition-colors duration-200">
                    <i class="bi bi-gear mr-2"></i> Pengaturan
                </a>
                <div class="border-t border-slate-200 my-1"></div>
                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200">
                    <i class="bi bi-box-arrow-right mr-2"></i> Keluar
                </a>
            </div>
        </div>
    </div>
</header>