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
    :root {--primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);}
    body {font-family:'Inter',sans-serif;background:#f6f9ff;color:#334155;overflow-x:hidden;}
    .sidebar {background:var(--primary-gradient);}
    .modal.hidden {opacity:0;visibility:hidden;}
    .modal.visible {opacity:1;visibility:visible;}
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
              <th class="py-3 px-6 rounded-tl-lg">Cover</th>
              <th class="py-3 px-6">Judul</th>
              <th class="py-3 px-6">Mata Pelajaran</th>
              <th class="py-3 px-6">Kelas</th>
              <th class="py-3 px-6 text-center rounded-tr-lg">Aksi</th>
            </tr>
          </thead>
          <tbody id="booksTableBody"></tbody>
        </table>
      </div>
    </main>
  </div>

  <!-- Modal Buku -->
  <div id="bookModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="modal-content bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg mx-4">
      <div class="flex justify-between items-center mb-6">
        <h3 id="modalTitle" class="text-2xl font-bold text-gray-800">Tambah Buku</h3>
        <button onclick="closeModal('bookModal')" class="text-gray-400 hover:text-gray-600">
          <i class="bi bi-x-lg text-2xl"></i>
        </button>
      </div>
      <form id="bookForm">
        <input type="hidden" id="bookId">
        <div class="mb-4">
          <label for="judul" class="block text-sm">Judul Buku</label>
          <input type="text" id="judul" name="judul" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
          <label for="mapel" class="block text-sm">Mata Pelajaran</label>
          <input type="text" id="mapel" name="mapel" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
          <label for="kelas" class="block text-sm">Kelas</label>
          <input type="text" id="kelas" name="kelas" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-6">
          <label for="cover" class="block text-sm">URL Gambar Cover</label>
          <input type="url" id="cover" name="cover" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="flex justify-end space-x-4">
          <button type="button" onclick="closeModal('bookModal')" class="px-6 py-2 rounded-lg text-gray-600 hover:bg-gray-200">Batal</button>
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Hapus -->
  <div id="deleteModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="modal-content bg-white p-8 rounded-2xl shadow-xl w-full max-w-sm mx-4 text-center">
      <h3 class="text-xl font-bold mb-4">Hapus Buku</h3>
      <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menghapus buku ini?</p>
      <div class="flex justify-center space-x-4">
        <button type="button" onclick="closeModal('deleteModal')" class="px-6 py-2 rounded-lg text-gray-600 hover:bg-gray-200">Batal</button>
        <button type="button" id="confirmDeleteBtn" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg">Hapus</button>
      </div>
    </div>
  </div>

  <!-- Modal Bab -->
  <!-- Modal Bab -->
<div id="babModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="modal-content bg-white p-8 rounded-2xl shadow-xl w-full max-w-2xl mx-4">
    <div class="flex justify-between items-center mb-6">
      <h3 id="babModalTitle" class="text-2xl font-bold text-gray-800">Kelola Bab</h3>
      <button onclick="closeModal('babModal')" class="text-gray-400 hover:text-gray-600">
        <i class="bi bi-x-lg text-2xl"></i>
      </button>
    </div>
    <div>
      <button onclick="showBabForm()" class="mb-4 bg-green-600 text-white px-4 py-2 rounded-lg shadow">
        <i class="bi bi-plus-circle"></i> Tambah Bab
      </button>
      <table class="w-full text-left text-gray-500">
        <thead class="bg-gray-50">
          <tr>
            <th class="py-2 px-4">Judul Bab</th>
            <th class="py-2 px-4">Urutan</th>
            <th class="py-2 px-4">Isi</th>
            <th class="py-2 px-4 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody id="babTableBody"></tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Form Bab -->
<div id="babFormModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="modal-content bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg mx-4">
    <div class="flex justify-between items-center mb-6">
      <h3 id="babFormTitle" class="text-2xl font-bold text-gray-800">Tambah Bab</h3>
      <button onclick="closeModal('babFormModal')" class="text-gray-400 hover:text-gray-600">
        <i class="bi bi-x-lg text-2xl"></i>
      </button>
    </div>
    <form id="babForm">
      <input type="hidden" id="babId" name="id_bab">
      <input type="hidden" id="id_buku" name="id_buku">
      <div class="mb-4">
        <label class="block text-sm">Judul Bab</label>
        <input type="text" id="judul_bab" name="judul_bab" class="w-full px-4 py-2 border rounded-lg" required>
      </div>
      <div class="mb-4">
        <label class="block text-sm">Urutan</label>
        <input type="number" id="urutan" name="urutan" class="w-full px-4 py-2 border rounded-lg" required>
      </div>
      <div class="mb-6">
        <label class="block text-sm">Isi Bab</label>
        <textarea id="isi" name="isi" class="w-full px-4 py-2 border rounded-lg" rows="4"></textarea>
      </div>
      <div class="flex justify-end space-x-4">
        <button type="button" onclick="closeModal('babFormModal')" class="px-6 py-2 rounded-lg text-gray-600 hover:bg-gray-200">Batal</button>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">Simpan</button>
      </div>
    </form>
  </div>
</div>



  <div id="overlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden" onclick="toggleSidebar()"></div>

  <script>
    let currentBookId = null;
    
    async function loadComponent(url, elementId){
      const res = await fetch(url); if(!res.ok) return;
      document.getElementById(elementId).innerHTML = await res.text();
    }
    document.addEventListener('DOMContentLoaded',()=>{
      loadComponent('../layout/sidebar.html','sidebar-container');
      loadComponent('../layout/header.html','header-container');
      setTimeout(()=>{AOS.init({duration:800,once:true});},500);
      loadBooks();
    });

    const booksTableBody=document.getElementById('booksTableBody');
    // let bookToDeleteId=null,currentBookId=null;

    function openModal(id){document.getElementById(id).classList.remove('hidden');document.getElementById(id).classList.add('visible');}
    function closeModal(id){document.getElementById(id).classList.remove('visible');document.getElementById(id).classList.add('hidden');}

    function loadBooks(){
      $.getJSON('<?= site_url("admin/buku/getBooks") ?>',data=>{
        booksTableBody.innerHTML='';
        data.forEach((book,i)=>{
          const row=document.createElement('tr');
          row.classList.add('border-b','hover:bg-gray-50');
          row.innerHTML=`
            <td class="py-4 px-6"><img src="${book.cover||'https://via.placeholder.com/60x80.png?text=No+Cover'}" class="w-12 h-16 rounded-md"></td>
            <td class="py-4 px-6 font-medium">${book.judul}</td>
            <td class="py-4 px-6">${book.mapel}</td>
            <td class="py-4 px-6">${book.kelas}</td>
            <td class="py-4 px-6 text-center space-x-2">
              <button onclick="editBook(${book.id})" class="text-blue-600"><i class="bi bi-pencil-square"></i></button>
              <button onclick="showDeleteModal(${book.id})" class="text-red-600"><i class="bi bi-trash"></i></button>
              <button onclick="manageBab(${book.id},'${book.judul}')" class="text-green-600"><i class="bi bi-journal-text"></i></button>
            </td>`;
          booksTableBody.appendChild(row);
        });
      });
    }

    // === Buku CRUD ===
    $('#addBookBtn').click(()=>{openModal('bookModal');});
    $('#bookForm').submit(e=>{
      e.preventDefault();
      $.post('<?= site_url("admin/buku/store") ?>',{
        id:$('#bookId').val(),judul:$('#judul').val(),mapel:$('#mapel').val(),kelas:$('#kelas').val(),cover:$('#cover').val()
      },()=>{closeModal('bookModal');loadBooks();});
    });
    function editBook(id){
      $.getJSON('<?= site_url("admin/buku/getBook") ?>/'+id,book=>{
        $('#bookId').val(book.id);$('#judul').val(book.judul);$('#mapel').val(book.mapel);$('#kelas').val(book.kelas);$('#cover').val(book.cover);
        openModal('bookModal');
      });
    }
    function showDeleteModal(id){bookToDeleteId=id;openModal('deleteModal');}
    $('#confirmDeleteBtn').click(()=>{
      $.post('<?= site_url("admin/buku/delete") ?>/'+bookToDeleteId,()=>{closeModal('deleteModal');loadBooks();});
    });

    // === Bab CRUD ===
    

function manageBab(bukuId, judul){
  currentBookId = bukuId;
  $('#babModalTitle').text("Kelola Bab - " + judul);
  $('#id_buku').val(currentBookId);
  loadBab(bukuId);
  openModal('babModal');
}

function loadBab(bukuId){
  $.getJSON('<?= site_url("admin/bab/getBabByBuku/") ?>'+bukuId, function(data){
    const tbody = $('#babTableBody');
    tbody.html('');
    data.forEach(bab=>{
      tbody.append(`
        <tr class="border-b">
          <td class="py-2 px-4">${bab.judul_bab}</td>
          <td class="py-2 px-4">${bab.urutan||'-'}</td>
          <td class="py-2 px-4">${bab.isi ? bab.isi.substring(0,30)+'...' : ''}</td>
          <td class="py-2 px-4 text-center space-x-2">
            <button onclick="editBab(${bab.id_bab})" class="text-blue-600"><i class="bi bi-pencil-square"></i></button>
            <button onclick="deleteBab(${bab.id_bab})" class="text-red-600"><i class="bi bi-trash"></i></button>
          </td>
        </tr>
      `);
    });
  });
}

function showBabForm(){
  $('#babForm')[0].reset();
  $('#babId').val('');
  $('#babFormTitle').text('Tambah Bab');
  $('#id_buku').val(currentBookId);
  openModal('babFormModal');
}

function editBab(id){
  $.getJSON('<?= site_url("admin/bab/getBab/") ?>'+id, function(bab){
    $('#babId').val(bab.id_bab);
    $('#judul_bab').val(bab.judul_bab);
    $('#urutan').val(bab.urutan);
    $('#isi').val(bab.isi);
    $('#babFormTitle').text('Edit Bab');
    $('#id_buku').val(currentBookId);
    openModal('babFormModal');
  });
}

$('#babForm').submit(function(e){
    e.preventDefault();
    $.ajax({
        url: '<?= site_url("admin/bab/store") ?>',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(res){
            if(res.status === 'success'){
                closeModal('babFormModal');
                loadBab(currentBookId);
            } else {
                console.error("Gagal menyimpan bab:", res.message);
                alert("Gagal menyimpan bab!\nLihat console untuk detail error.");
            }
        },
        error: function(xhr){
            console.error("AJAX Error:", xhr.responseText);
            alert("Gagal menyimpan bab!\nLihat console untuk detail error.");
        }
    });
});


function deleteBab(id){
  if(confirm("Hapus bab ini?")){
    $.post('<?= site_url("admin/bab/delete/") ?>'+id,()=>{loadBab(currentBookId);});
  }
}


  </script>
</body>
</html>
