<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manajemen Buku | EduPrime Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {50:'#f0f9ff',100:'#e0f2fe',200:'#bae6fd',300:'#7dd3fc',400:'#38bdf8',500:'#0ea5e9',600:'#0284c7',700:'#0369a1',800:'#075985',900:'#0f172a'},
                        dark: {50:'#f8fafc',100:'#f1f5f9',200:'#e2e8f0',300:'#cbd5e1',400:'#94a3b8',500:'#64748b',600:'#475569',700:'#334155',800:'#1e293b',900:'#0f172a'}
                    },
                    fontFamily: {sans:['Inter','ui-sans-serif','system-ui'], display:['Poppins','ui-sans-serif','system-ui']},
                    animation: {'fade-in':'fadeIn 0.5s ease-out forwards','slide-up':'slideUp 0.5s ease-out forwards','float':'float 6s ease-in-out infinite'},
                    keyframes: {fadeIn:{'0%':{opacity:'0'},'100%':{opacity:'1'}},slideUp:{'0%':{transform:'translateY(20px)',opacity:'0'},'100%':{transform:'translateY(0)',opacity:'1'}},float:{'0%,100%':{transform:'translateY(0)'},'50%':{transform:'translateY(-10px)'}}}
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        body {font-family:'Inter',sans-serif;background:#f6f9ff;color:#334155;overflow-x:hidden;}
        .glass-effect {background:var(--glass-bg);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid var(--glass-border);box-shadow:0 8px 32px rgba(0,0,0,0.1);}
        .sidebar {background:var(--primary-gradient);box-shadow:0 0 45px rgba(102,126,234,0.25);transition:all 0.4s cubic-bezier(0.4,0,0.2,1);z-index:50;}
        .sidebar-mobile {transform:translateX(-100%);transition:transform 0.3s ease-in-out;}
        .sidebar-mobile.visible {transform:translateX(0);}
        .modal {transition:opacity 0.2s ease-in-out, visibility 0.2s ease-in-out;}
        .modal.hidden {opacity:0;visibility:hidden;}
        .modal.visible {opacity:1;visibility:visible;}
        .modal-content {transform:scale(0.95);transition:transform 0.2s ease-in-out;}
        .modal.visible .modal-content {transform:scale(1);}
        .card {background:linear-gradient(135deg,#ffffff 0%,#f8faff 100%);border-radius:20px;transition:all 0.4s cubic-bezier(0.4,0,0.2,1);overflow:hidden;position:relative;border:1px solid rgba(255,255,255,0.7);box-shadow:0 10px 25px rgba(0,0,0,0.05);}
    </style>
</head>

<body class="flex relative overflow-x-hidden min-h-screen">

    <div id="sidebar-container" class="md:sticky md:top-0 md:h-screen w-72"></div>
    <div class="flex-1 flex flex-col min-h-screen">
        <div id="header-container"></div>
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-8" data-aos="fade-up">📚 Manajemen Buku</h1>
            <div class="flex justify-end mb-6" data-aos="fade-up" data-aos-delay="100">
                <button id="addBookBtn" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-xl shadow-lg transition duration-200">
                    <i class="bi bi-plus-circle mr-2"></i>Tambah Buku
                </button>
            </div>
            <div class="card p-6 overflow-x-auto" data-aos="fade-up" data-aos-delay="200">
                <table class="w-full text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-t-lg">
                        <tr>
                            <th scope="col" class="py-3 px-6 rounded-tl-lg">Cover</th>
                            <th scope="col" class="py-3 px-6">Judul</th>
                            <th scope="col" class="py-3 px-6">Mata Pelajaran</th>
                            <th scope="col" class="py-3 px-6">Kelas</th>
                            <th scope="col" class="py-3 px-6 text-center rounded-tr-lg">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="booksTableBody"></tbody>
                </table>
            </div>
        </main>
    </div>

    <div id="bookModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="modal-content bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 id="modalTitle" class="text-2xl font-bold text-gray-800">Tambah Buku</h3>
                <button onclick="closeModal('bookModal')" class="text-gray-400 hover:text-gray-600 transition duration-200">
                    <i class="bi bi-x-lg text-2xl"></i>
                </button>
            </div>
            <form id="bookForm">
                <input type="hidden" id="bookId">
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Buku</label>
                    <input type="text" id="judul" name="judul" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="mapel" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                    <input type="text" id="mapel" name="mapel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="cover" class="block text-sm font-medium text-gray-700 mb-1">URL Gambar Cover</label>
                    <input type="url" id="cover" name="cover" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal('bookModal')" class="px-6 py-2 rounded-lg text-gray-600 hover:bg-gray-200 transition duration-200">Batal</button>
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
                <h3 class="text-xl font-bold text-gray-800 mb-2">Hapus Buku</h3>
                <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus buku ini? Aksi ini tidak dapat dibatalkan.</p>
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
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                const html = await response.text();
                document.getElementById(elementId).innerHTML = html;
            } catch (e) {
                console.error(`Gagal memuat komponen dari ${url}:`, e);
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
            loadComponent('../layout/sidebar.html', 'sidebar-container');
            loadComponent('../layout/header.html', 'header-container');
            setTimeout(() => { AOS.init({duration:800,easing:'ease-out-quad',once:true,offset:50}); }, 500);
        });

        const bookModal = document.getElementById('bookModal');
        const deleteModal = document.getElementById('deleteModal');
        const addBookBtn = document.getElementById('addBookBtn');
        const bookForm = document.getElementById('bookForm');
        const booksTableBody = document.getElementById('booksTableBody');
        const modalTitle = document.getElementById('modalTitle');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        let bookToDeleteId = null;
        let isEditMode = false;

        function openModal(modalElementId) {document.getElementById(modalElementId).classList.remove('hidden');document.getElementById(modalElementId).classList.add('visible');}
        window.closeModal = function(modalElementId) {const modal=document.getElementById(modalElementId);modal.classList.remove('visible');modal.classList.add('hidden');if(modalElementId==='bookModal'){bookForm.reset();isEditMode=false;}}

        function loadBooks(){
            $.ajax({url:'<?= site_url("buku/getBooks") ?>', method:'GET', dataType:'json',
                success:function(data){
                    booksTableBody.innerHTML='';
                    data.forEach((book,index)=>{
                        const row=document.createElement('tr');
                        row.classList.add('border-b','hover:bg-gray-50');
                        row.setAttribute('data-aos','fade-up');
                        row.setAttribute('data-aos-delay',(index*50+300).toString());
                        row.innerHTML=`
                            <td class="py-4 px-6"><img src="${book.cover || 'https://via.placeholder.com/60x80.png?text=No+Cover'}" alt="Cover Buku" class="w-12 h-16 object-cover rounded-md shadow-md"></td>
                            <td class="py-4 px-6 font-medium text-gray-900">${book.judul}</td>
                            <td class="py-4 px-6">${book.mapel}</td>
                            <td class="py-4 px-6">${book.kelas}</td>
                            <td class="py-4 px-6 text-center space-x-2">
                                <button onclick="editBook(${book.id})" class="text-blue-600 hover:text-blue-800 transition duration-200" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                <button onclick="showDeleteModal(${book.id})" class="text-red-600 hover:text-red-800 transition duration-200" title="Hapus"><i class="bi bi-trash"></i></button>
                            </td>`;
                        booksTableBody.appendChild(row);
                    });
                }, error:function(){alert('Gagal memuat data buku!');}
            });
        }

        addBookBtn.addEventListener('click',()=>{
            modalTitle.textContent='Tambah Buku';
            document.getElementById('bookId').value='';
            openModal('bookModal');
        });

        bookForm.addEventListener('submit',(e)=>{
            e.preventDefault();
            const id=document.getElementById('bookId').value;
            const formData={id:id, judul:$('#judul').val(), mapel:$('#mapel').val(), kelas:$('#kelas').val(), cover:$('#cover').val()};
            $.ajax({
                url:'<?= site_url("buku/store") ?>',
                method:'POST',
                data:formData,
                success:function(){closeModal('bookModal');loadBooks();},
                error:function(){alert('Gagal menyimpan buku!');}
            });
        });

        window.editBook=function(id){
            $.ajax({url:'<?= site_url("buku/getBook") ?>/'+id, method:'GET', dataType:'json',
                success:function(book){
                    modalTitle.textContent='Edit Buku';
                    document.getElementById('bookId').value=book.id;
                    $('#judul').val(book.judul);
                    $('#mapel').val(book.mapel);
                    $('#kelas').val(book.kelas);
                    $('#cover').val(book.cover);
                    isEditMode=true;
                    openModal('bookModal');
                }
            });
        };

        window.showDeleteModal=function(id){bookToDeleteId=id;openModal('deleteModal');};
        confirmDeleteBtn.addEventListener('click',()=>{
            if(bookToDeleteId){
                $.ajax({url:'<?= site_url("buku/delete") ?>/'+bookToDeleteId, method:'POST',
                    success:function(){closeModal('deleteModal');loadBooks();},
                    error:function(){alert('Gagal menghapus buku!');}
                });
            }
        });

        window.toggleSidebar=function(){const sidebar=document.querySelector("#sidebar-container .sidebar");const overlay=document.getElementById("overlay");sidebar.classList.toggle("hidden");overlay.classList.toggle("hidden");};
        document.addEventListener('DOMContentLoaded',loadBooks);
    </script>
</body>
</html>
