<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manajemen Guru | EduPrime Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff', 100: '#e0f2fe', 200: '#bae6fd', 300: '#7dd3fc', 400: '#38bdf8', 500: '#0ea5e9', 600: '#0284c7', 700: '#0369a1', 800: '#075985', 900: '#0c4a6e',
                        },
                        dark: {
                            50: '#f8fafc', 100: '#f1f5f9', 200: '#e2e8f0', 300: '#cbd5e1', 400: '#94a3b8', 500: '#64748b', 600: '#475569', 700: '#334155', 800: '#1e293b', 900: '#0f172a',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                        display: ['Poppins', 'ui-sans-serif', 'system-ui'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out forwards', 'slide-up': 'slideUp 0.5s ease-out forwards', 'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        slideUp: { '0%': { transform: 'translateY(20px)', opacity: '0' }, '100%': { transform: 'translateY(0)', opacity: '1' } },
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-10px)' } }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.18);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f6f9ff;
            color: #334155;
            overflow-x: hidden;
        }

        .glass-effect {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            background: var(--primary-gradient);
            box-shadow: 0 0 45px rgba(102, 126, 234, 0.25);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 50;
        }

        .sidebar-mobile {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-mobile.visible {
            transform: translateX(0);
        }

        .modal {
            transition: opacity 0.2s ease-in-out, visibility 0.2s ease-in-out;
        }

        .modal.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .modal.visible {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            transform: scale(0.95);
            transition: transform 0.2s ease-in-out;
        }

        .modal.visible .modal-content {
            transform: scale(1);
        }

        .card {
            background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="flex relative overflow-x-hidden min-h-screen">

    <div id="sidebar-container" class="md:sticky md:top-0 md:h-screen w-72"></div>

    <div class="flex-1 flex flex-col min-h-screen">
        <div id="header-container"></div>
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-8" data-aos="fade-up">👨‍🏫 Manajemen Guru</h1>

            <div class="flex justify-end mb-6" data-aos="fade-up" data-aos-delay="100">
                <button id="addGuruBtn" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-xl shadow-lg transition duration-200">
                    <i class="bi bi-plus-circle mr-2"></i>Tambah Guru
                </button>
            </div>

            <div class="card p-6 overflow-x-auto" data-aos="fade-up" data-aos-delay="200">
                <table class="w-full text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-t-lg">
                        <tr>
                            <th scope="col" class="py-3 px-6 rounded-tl-lg">Nama</th>
                            <th scope="col" class="py-3 px-6">NIP</th>
                            <th scope="col" class="py-3 px-6">Mata Pelajaran</th>
                            <th scope="col" class="py-3 px-6 text-center rounded-tr-lg">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="guruTableBody">
                        </tbody>
                </table>
            </div>
        </main>
    </div>

    <div id="guruModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="modal-content bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 id="modalTitle" class="text-2xl font-bold text-gray-800">Tambah Guru</h3>
                <button onclick="closeModal('guruModal')" class="text-gray-400 hover:text-gray-600 transition duration-200">
                    <i class="bi bi-x-lg text-2xl"></i>
                </button>
            </div>
            <form id="guruForm">
                <input type="hidden" id="userId">
                <input type="hidden" id="guruId">
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Guru</label>
                    <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                    <input type="text" id="nip" name="nip" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="mapel" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                    <input type="text" id="mapel" name="mapel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal('guruModal')" class="px-6 py-2 rounded-lg text-gray-600 hover:bg-gray-200 transition duration-200">Batal</button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="deleteModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="modal-content bg-white p-8 rounded-2xl shadow-xl w-full max-w-sm mx-4 text-center">
            <div class="flex flex-col items-center justify-center mb-6">
                <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center text-red-600 text-3xl mb-4">
                    <i class="bi bi-trash-fill"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Hapus Guru</h3>
                <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus data guru ini? Aksi ini tidak dapat dibatalkan.</p>
            </div>
            <div class="flex justify-center space-x-4">
                <button type="button" onclick="closeModal('deleteModal')" class="px-6 py-2 rounded-lg text-gray-600 hover:bg-gray-200 transition duration-200">Batal</button>
                <button type="button" id="confirmDeleteBtn" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">Hapus</button>
            </div>
        </div>
    </div>

    <div id="overlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden" onclick="toggleSidebar()"></div>

    <script>
        async function loadComponent(url, elementId) {
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const html = await response.text();
                document.getElementById(elementId).innerHTML = html;
            } catch (e) {
                console.error(`Gagal memuat komponen dari ${url}:`, e);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadComponent('../layout/sidebar.html', 'sidebar-container');
            loadComponent('../layout/header.html', 'header-container');

            setTimeout(() => {
                AOS.init({
                    duration: 800,
                    easing: 'ease-out-quad',
                    once: true,
                    offset: 50
                });
            }, 500);
        });

        const guruModal = document.getElementById('guruModal');
        const deleteModal = document.getElementById('deleteModal');
        const addGuruBtn = document.getElementById('addGuruBtn');
        const guruForm = document.getElementById('guruForm');
        const guruTableBody = document.getElementById('guruTableBody');
        const modalTitle = document.getElementById('modalTitle');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        let isEditMode = false;
        let guruToDeleteId = null;

        // Simulasi Database
        const db = {
            users: JSON.parse(localStorage.getItem('users')) || [],
            guru: JSON.parse(localStorage.getItem('guru')) || [],
            save: function() {
                localStorage.setItem('users', JSON.stringify(this.users));
                localStorage.setItem('guru', JSON.stringify(this.guru));
            }
        };

        function renderGuru() {
            guruTableBody.innerHTML = '';
            const guruWithUser = db.guru.map(g => {
                const user = db.users.find(u => u.user_id === g.user_id);
                return { ...g,
                    nama: user ? user.nama : 'N/A'
                };
            });

            guruWithUser.forEach((guru, index) => {
                const row = document.createElement('tr');
                row.classList.add('border-b', 'hover:bg-gray-50');
                row.setAttribute('data-aos', 'fade-up');
                row.setAttribute('data-aos-delay', (index * 50 + 300).toString());
                row.innerHTML = `
                    <td class="py-4 px-6 font-medium text-gray-900">${guru.nama}</td>
                    <td class="py-4 px-6">${guru.nip}</td>
                    <td class="py-4 px-6">${guru.mapel}</td>
                    <td class="py-4 px-6 text-center space-x-2">
                        <button onclick="editGuru(${guru.guru_id})" class="text-blue-600 hover:text-blue-800 transition duration-200" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button onclick="showDeleteModal(${guru.guru_id})" class="text-red-600 hover:text-red-800 transition duration-200" title="Hapus">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                `;
                guruTableBody.appendChild(row);
            });
        }

        function openModal(modalElementId) {
            const modal = document.getElementById(modalElementId);
            modal.classList.remove('hidden');
            modal.classList.add('visible');
        }

        window.closeModal = function(modalElementId) {
            const modal = document.getElementById(modalElementId);
            modal.classList.remove('visible');
            modal.classList.add('hidden');
            if (modalElementId === 'guruModal') {
                guruForm.reset();
                isEditMode = false;
                document.getElementById('nip').disabled = false;
            }
        }

        addGuruBtn.addEventListener('click', () => {
            modalTitle.textContent = 'Tambah Guru';
            document.getElementById('userId').value = '';
            document.getElementById('guruId').value = '';
            document.getElementById('nip').disabled = false;
            openModal('guruModal');
        });

        guruForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const userId = document.getElementById('userId').value;
            const guruId = document.getElementById('guruId').value;
            const nama = document.getElementById('nama').value;
            const nip = document.getElementById('nip').value;
            const mapel = document.getElementById('mapel').value;

            if (isEditMode) {
                const guruIndex = db.guru.findIndex(g => g.guru_id == guruId);
                const userIndex = db.users.findIndex(u => u.user_id == userId);

                if (guruIndex !== -1 && userIndex !== -1) {
                    db.guru[guruIndex].mapel = mapel;
                    db.users[userIndex].nama = nama;
                }
            } else {
                const newUserId = db.users.length > 0 ? Math.max(...db.users.map(u => u.user_id)) + 1 : 1;
                const newGuruId = db.guru.length > 0 ? Math.max(...db.guru.map(g => g.guru_id)) + 1 : 1;

                const newUser = {
                    user_id: newUserId,
                    nama: nama,
                    email: nip + '@eduprime.id',
                    password: '',
                    role: 'member',
                    created_at: new Date().toISOString()
                };
                db.users.push(newUser);

                const newGuru = {
                    guru_id: newGuruId,
                    user_id: newUserId,
                    nip: nip,
                    mapel: mapel
                };
                db.guru.push(newGuru);
            }

            db.save();
            renderGuru();
            closeModal('guruModal');
        });

        window.editGuru = function(id) {
            const guru = db.guru.find(g => g.guru_id === id);
            const user = db.users.find(u => u.user_id === guru.user_id);
            if (guru && user) {
                modalTitle.textContent = 'Edit Guru';
                document.getElementById('guruId').value = guru.guru_id;
                document.getElementById('userId').value = user.user_id;
                document.getElementById('nama').value = user.nama;
                document.getElementById('nip').value = guru.nip;
                document.getElementById('mapel').value = guru.mapel;
                document.getElementById('nip').disabled = true;
                isEditMode = true;
                openModal('guruModal');
            }
        };

        window.showDeleteModal = function(id) {
            guruToDeleteId = id;
            openModal('deleteModal');
        };

        confirmDeleteBtn.addEventListener('click', () => {
            if (guruToDeleteId) {
                const guru = db.guru.find(g => g.guru_id === guruToDeleteId);
                if (guru) {
                    db.users = db.users.filter(u => u.user_id !== guru.user_id);
                    db.guru = db.guru.filter(g => g.guru_id !== guruToDeleteId);
                    db.save();
                    renderGuru();
                    closeModal('deleteModal');
                }
            }
        });

        window.toggleSidebar = function() {
            const sidebar = document.querySelector("#sidebar-container .sidebar");
            const overlay = document.getElementById("overlay");
            sidebar.classList.toggle("hidden");
            overlay.classList.toggle("hidden");
        }

        document.addEventListener('DOMContentLoaded', renderGuru);
    </script>
</body>

</html>