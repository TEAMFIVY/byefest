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
    <div id="sidebar-container"></div>
    <div class="flex-1 flex flex-col min-h-screen">
        <div id="header-container"></div>
        <main class="flex-1 p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">👨‍🏫 Manajemen Guru</h1>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <div class="flex justify-end mb-4">
                <button onclick="openModal()" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-xl shadow-lg">
                    <i class="bi bi-plus-circle mr-2"></i> Tambah Guru
                </button>
            </div>

            <div class="card p-6 overflow-x-auto">
                <table class="w-full text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="py-3 px-6">Nama</th>
                            <th class="py-3 px-6">NIP</th>
                            <th class="py-3 px-6">Mata Pelajaran</th>
                            <th class="py-3 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($guru as $g): ?>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-6"><?= $g->nama ?></td>
                                <td class="py-3 px-6"><?= $g->nip ?></td>
                                <td class="py-3 px-6"><?= $g->mapel ?></td>
                                <td class="py-3 px-6 text-center space-x-2">
                                    <a href="<?= site_url('admin/guru/edit/'.$g->id_guru) ?>" 
                                    class="text-blue-600 hover:text-blue-800"><i class="bi bi-pencil-square"></i></a>
                                    <a href="<?= site_url('admin/guru/delete/'.$g->id_guru) ?>" 
                                    class="text-red-600 hover:text-red-800" 
                                    onclick="return confirm('Yakin hapus data ini?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal untuk Tambah Guru -->
            <div id="tambahGuruModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="modal-content relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 lg:w-1/3 shadow-lg rounded-md bg-white">
                    <div class="mt-3">
                        <div class="flex justify-between items-center pb-3 border-b">
                            <h3 class="text-xl font-semibold text-gray-800">Tambah Data Guru</h3>
                            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                                <i class="bi bi-x-circle text-2xl"></i>
                            </button>
                        </div>
                        
                        <form action="<?= site_url('admin/guru/simpan') ?>" method="POST" class="space-y-4 mt-4">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Guru</label>
                                <input type="text" id="nama" name="nama" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            </div>
                            
                            <div>
                                <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                                <input type="text" id="nip" name="nip" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            </div>
                            
                            <div>
                                <label for="mapel" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                                <input type="text" id="mapel" name="mapel" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            </div>
                            
                            <div class="flex justify-end space-x-3 pt-4">
                                <button type="button" onclick="closeModal()" 
                                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                                    Batal
                                </button>
                                <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                // Fungsi untuk membuka modal
                function openModal() {
                    document.getElementById('tambahGuruModal').classList.remove('hidden');
                    document.getElementById('tambahGuruModal').classList.add('visible');
                }

                // Fungsi untuk menutup modal
                function closeModal() {
                    document.getElementById('tambahGuruModal').classList.remove('visible');
                    document.getElementById('tambahGuruModal').classList.add('hidden');
                }

                // Tutup modal jika klik di luar area modal
                window.onclick = function(event) {
                    const modal = document.getElementById('tambahGuruModal');
                    if (event.target === modal) {
                        closeModal();
                    }
                }

                // Tutup modal dengan tombol ESC
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closeModal();
                    }
                });
            </script>

        </main>
    </div>
</body>
</html>