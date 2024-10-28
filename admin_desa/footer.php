</div>
</section>
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <strong>Copyright &copy;</strong> Website Ansor Kudus
  <div class="float-right d-none d-sm-inline-block">
    <b>Versi</b> 1.0
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/adminlte/dist/js/adminlte.js"></script>
<!-- JsBarcode -->
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>

<!-- Halaman Dashboard -->
<script>
  $('#data-desa').DataTable({
    fixedColumns: true
  });
</script>

<script>
  function confirmDelete(id) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Anda tidak akan dapat mengembalikan data ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '../config/delete_foto.php?id=' + id;
      }
    })
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'deleted') {
      Swal.fire({
        icon: 'success',
        title: 'Data berhasil dihapus!',
        showConfirmButton: false,
        timer: 1500
      });
    } else if (status === 'failed') {
      Swal.fire({
        icon: 'error',
        title: 'Gagal menghapus data!',
        text: 'Silakan coba lagi.',
      });
    }
  });
</script>

<script>
  // Fungsi untuk generate pratinjau gambar dengan barcode
  function generatePreview(noPeserta, namaOperator, imagePath) {
    const canvas = document.getElementById('cardCanvas');
    const context = canvas.getContext('2d');

    // Gambar template ID Card
    const templateImg = new Image();
    templateImg.src = imagePath; // Gunakan path gambar yang dikirimkan dari PHP

    templateImg.onload = () => {
      canvas.width = templateImg.width;
      canvas.height = templateImg.height;
      context.drawImage(templateImg, 0, 0);

      // Nomor Peserta
      context.font = 'bold 14px Arial';
      context.fillStyle = '#000';
      context.fillText(noPeserta, 86, 263); // Posisi x, y yang sudah Anda sesuaikan

      // Nama Peserta
      context.font = 'bold 14px Arial';
      // Mengukur lebar teks dan menghitung posisi x agar berada di tengah
      const textWidth = context.measureText(namaOperator).width;
      const centerX = (canvas.width / 2) - (textWidth / 2);

      context.fillText(namaOperator, centerX, 280); // Menggambar nama di posisi tengah

      // Barcode
      const barcodeCanvas = document.createElement('canvas');
      JsBarcode(barcodeCanvas, noPeserta, {
        format: "CODE128",
        displayValue: false,
        width: 1,
        height: 10,
        margin: 0
      });
      context.drawImage(barcodeCanvas, 41.5, 296, 130, 30); // Sesuaikan posisi x, y, width, height

      // Tampilkan modal
      $('#previewModal').modal('show');
    }
  }

  // Reset canvas ketika modal ditutup
  $('#previewModal').on('hidden.bs.modal', function() {
    const canvas = document.getElementById('cardCanvas');
    const context = canvas.getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);
  });
</script>

<!-- Akhir Halaman Dashboard -->

<!-- Halaman Form Pendaftaran -->
<script>
  function nextStep(current, next) {
    $('#' + current).collapse('hide');
    $('#' + next).collapse('show');
    document.getElementById(next).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
  }

  function prevStep(current, prev) {
    $('#' + current).collapse('hide');
    $('#' + prev).collapse('show');
  }
</script>
<!-- Akhir Halaman Form Pendaftaran -->

<!-- Halaman Data Pribadi -->
<script>
  $('#data-pribadi').DataTable({
    fixedColumns: true
  });
</script>
<!-- Akhir Halaman Data Pribadi -->

<!-- Halaman Data Anggota -->
<script>
  $('#data-ansor').DataTable({
    fixedColumns: true
  });
</script>
<!-- Akhir Halaman Data Anggota -->

<!-- Halaman Pengaturan -->
<script>
  $(document).ready(function() {
    // Mengubah role
    $('.role-dropdown').change(function() {
      var userId = $(this).data('id');
      var newRole = $(this).val();

      $.ajax({
        url: '../config/update_user.php',
        type: 'POST',
        data: {
          id: userId,
          type: 'role',
          value: newRole
        },
        success: function(response) {
          var result = JSON.parse(response);
          if (result.status === 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil!',
              text: 'Role berhasil diperbarui.',
              timer: 2000,
              showConfirmButton: false
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Gagal!',
              text: 'Gagal memperbarui role: ' + result.message,
            });
          }
        },
        error: function() {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Terjadi kesalahan saat memperbarui role.',
          });
        }
      });
    });

    // Mengubah akses
    $('.akses-toggle').change(function() {
      var userId = $(this).data('id');
      var newAkses = $(this).is(':checked') ? 1 : 0;

      $.ajax({
        url: '../config/update_user.php',
        type: 'POST',
        data: {
          id: userId,
          type: 'akses',
          value: newAkses
        },
        success: function(response) {
          var result = JSON.parse(response);
          if (result.status === 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil!',
              text: 'Akses berhasil diperbarui.',
              timer: 2000,
              showConfirmButton: false
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Gagal!',
              text: 'Gagal memperbarui akses: ' + result.message,
            });
          }
        },
        error: function() {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Terjadi kesalahan saat memperbarui akses.',
          });
        }
      });
    });
  });
</script>
<!-- Akhir Halaman Pengaturan -->

<!-- Halaman Foto -->

<script>
  $(document).ready(function() {
    // Inisialisasi Select2
    $('#no_peserta').select2().on('select2:select', function(e) {
      const noPeserta = $(this).val();
      if (noPeserta) {
        fetch(`get_nama_peserta.php?no_peserta=${noPeserta}`)
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              document.getElementById('nama_lengkap').value = data.nama_lengkap;
            } else {
              alert(data.message);
            }
          })
          .catch(error => {
            console.error('Error fetching participant name:', error);
          });
      } else {
        document.getElementById('nama_lengkap').value = '';
      }
    });
  });
</script>

<!-- Akhir Halaman Foto -->

<!-- Logout -->
<script>
  document.getElementById('logout-link').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah link melakukan aksi default

    Swal.fire({
      title: 'Logout',
      text: "Anda akan keluar dari sesi saat ini.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, keluar',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '../config/logout.php';
      }
    });
  });
</script>

</body>

</html>