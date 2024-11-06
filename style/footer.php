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
<!-- bs-custom-file-input -->
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<!-- icheck -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.css" integrity="sha512-J5tsMaZISEmI+Ly68nBDiQyNW6vzBoUlNHGsH8T3DzHTn2h9swZqiMeGm/4WMDxAphi5LMZMNA30LvxaEPiPkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

<!-- Halaman Data_Ansor -->

<!-- Modal untuk preview kartu anggota -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview Kartu Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <!-- Preview Kartu Anggota -->
                <img id="cardPreview" src="" alt="Preview Kartu Anggota" class="img-fluid mb-3">

                <!-- Tombol Download Kartu Anggota -->
                <a id="downloadButton" href="#" class="btn btn-primary mt-2">
                    Download Kartu Anggota
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function previewCard(id) {
        // Set URL gambar di modal
        const previewImage = document.getElementById('cardPreview');
        const downloadButton = document.getElementById('downloadButton');

        // Atur URL untuk gambar pratinjau
        previewImage.src = `../kartu/card.php?id=${id}`;

        // Atur URL untuk unduhan dengan parameter `download=true`
        downloadButton.href = `../kartu/card.php?id=${id}&download=true`;

        // Tampilkan modal
        $('#previewModal').modal('show');
    }
</script>

<!-- Akhir Halaman Data_Ansor -->

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

    // Field Data Anggota & Pekerjaan Istri
    function toggleMarriageFields() {
        const marriageDetails = document.getElementById('marriageDetails');
        const nama_istri = document.getElementById('nama_istri');
        const anak_laki = document.getElementById('anak_laki');
        const anak_perempuan = document.getElementById('anak_perempuan');
        const nama_istriLabel = document.getElementById('nama_istriLabel');
        const anak_lakiLabel = document.getElementById('anak_lakiLabel');
        const anak_perempuanLabel = document.getElementById('anak_perempuanLabel');

        const pekerjaanIstriFields = document.getElementById('pekerjaanIstriFields');
        const pekerjaanIstri = document.getElementById('pekerjaanIstri');
        const pendapatanIstri = document.getElementById('pendapatanIstri');
        const pekerjaanIstriLabel = document.getElementById('pekerjaanIstriLabel');
        const pendapatanIstriLabel = document.getElementById('pendapatanIstriLabel');

        const selectedStatusPernikahan = document.querySelector('input[name="status_pernikahan"]:checked').value;

        document.getElementById('pekerjaanIstri').onchange = function() {
            if (this.value !== '21') {
                pendapatanIstriFields.style.display = 'block';
                pendapatanIstri.required = true;
                pendapatanIstriLabel.classList.add('required-label');
            } else {
                pendapatanIstriFields.style.display = 'none';
                pendapatanIstri.required = false;
                pendapatanIstriLabel.classList.remove('required-label');
            }
        }

        // Show fields and mark as required if "Menikah" is selected
        if (selectedStatusPernikahan === '2') {
            marriageDetails.style.display = 'block';
            pekerjaanIstriFields.style.display = 'block';
            nama_istri.required = true;
            anak_laki.required = true;
            anak_perempuan.required = true;
            pekerjaanIstri.required = true;

            // Add red asterisk to labels
            nama_istriLabel.classList.add('required-label');
            anak_lakiLabel.classList.add('required-label');
            anak_perempuanLabel.classList.add('required-label');
            pekerjaanIstriLabel.classList.add('required-label');
        } else {
            // Hide fields and remove required attribute
            marriageDetails.style.display = 'none';
            pekerjaanIstriFields.style.display = 'none';
            nama_istri.required = false;
            anak_laki.required = false;
            anak_perempuan.required = false;
            pekerjaanIstri.required = false;
            pendapatanIstri.required = false;

            // Remove red asterisk from labels
            nama_istriLabel.classList.remove('required-label');
            anak_lakiLabel.classList.remove('required-label');
            anak_perempuanLabel.classList.remove('required-label');
            pekerjaanIstriLabel.classList.remove('required-label');
            pendapatanIstriLabel.classList.remove('required-label');
        }
    }

    // Initialize the form on page load to check if a status is already selected
    document.addEventListener('DOMContentLoaded', toggleMarriageFields);

    // Field Alamat
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch data kecamatan saat halaman dimuat
        fetch('../config/districts.php')
            .then(response => response.json())
            .then(data => {
                const kecamatanSelect = document.getElementById('kecamatan');
                kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

                if (data.status === "success") {
                    data.data.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.districts_id;
                        option.textContent = district.districts_name;
                        kecamatanSelect.appendChild(option);
                    });
                } else {
                    alert('Tidak ada data kecamatan ditemukan.');
                }
            })
            .catch(error => console.error('Error:', error));

        // Fetch data desa saat kecamatan berubah
        document.getElementById('kecamatan').addEventListener('change', function() {
            const districtsId = this.value;
            const desaSelect = document.getElementById('desa');

            if (!districtsId) {
                desaSelect.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';
                return;
            }

            // Fetch desa berdasarkan kecamatan yang dipilih
            fetch(`../config/villages.php?districts_id=${districtsId}`)
                .then(response => response.json())
                .then(data => {
                    desaSelect.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';

                    if (data.status === "success") {
                        data.data.forEach(village => {
                            const option = document.createElement('option');
                            option.value = village.villages_id;
                            option.textContent = village.villages_name;
                            desaSelect.appendChild(option);
                        });
                    } else {
                        alert('Tidak ada data desa ditemukan.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });


    // Field Kepengurusan Ranting
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch data kecamatan saat halaman dimuat
        fetch('../config/districts.php')
            .then(response => response.json())
            .then(data => {
                const kecamatanSelect = document.getElementById('namaKecamatanRanting');
                kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

                if (data.status === "success") {
                    data.data.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.districts_id;
                        option.textContent = district.districts_name;
                        kecamatanSelect.appendChild(option);
                    });
                } else {
                    alert('Tidak ada data kecamatan ditemukan.');
                }
            })
            .catch(error => console.error('Error:', error));

        // Fetch data desa saat kecamatan berubah
        document.getElementById('namaKecamatanRanting').addEventListener('change', function() {
            const districtsId = this.value;
            const desaSelect = document.getElementById('namaDesaRanting');

            if (!districtsId) {
                desaSelect.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';
                return;
            }

            // Fetch desa berdasarkan kecamatan yang dipilih
            fetch(`../config/villages.php?districts_id=${districtsId}`)
                .then(response => response.json())
                .then(data => {
                    desaSelect.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';

                    if (data.status === "success") {
                        data.data.forEach(village => {
                            const option = document.createElement('option');
                            option.value = village.villages_id;
                            option.textContent = village.villages_name;
                            desaSelect.appendChild(option);
                        });
                    } else {
                        alert('Tidak ada data desa ditemukan.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });


    // Field Pekerjaan Suami
    document.getElementById('jenisPekerjaan').onchange = function() {
        const jobFields = document.getElementById('jobFields');
        const pendapatanLabel = document.getElementById('pendapatanSuamiLabel');
        const sistemKerjaLabel = document.getElementById('sistemKerjaLabel');
        const namaInstansiLabel = document.getElementById('namaInstansiLabel');
        const alamatInstansiLabel = document.getElementById('alamatInstansiLabel');

        const pendapatan = document.getElementById('pendapatanSuami');
        const sistemKerja = document.getElementById('sistemKerja');
        const namaInstansi = document.getElementById('namaInstansi');
        const alamatInstansi = document.getElementById('alamatInstansi');

        if (this.value !== '21') {
            jobFields.style.display = 'block';
            pendapatanLabel.classList.add('required-label');
            sistemKerjaLabel.classList.add('required-label');
            namaInstansiLabel.classList.add('required-label');
            alamatInstansiLabel.classList.add('required-label');
            pendapatan.required = true;
            sistemKerja.required = true;
            namaInstansi.required = true;
            alamatInstansi.required = true;
        } else {
            jobFields.style.display = 'none';
            pendapatanLabel.classList.remove('required-label');
            sistemKerjaLabel.classList.remove('required-label');
            namaInstansiLabel.classList.remove('required-label');
            alamatInstansiLabel.classList.remove('required-label');
            pendapatan.required = false;
            sistemKerja.required = false;
            namaInstansi.required = false;
            alamatInstansi.required = false;
        }
    };

    // Field Pendidikan Terakhir
    document.getElementById('pendidikanTerakhir').onchange = function() {
        const jurusanSmkField = document.getElementById('jurusanSmkField');
        const bidangStudiField = document.getElementById('bidangStudiField');

        const jurusanSmkLabel = document.getElementById('jurusanSmkLabel');
        const bidangStudiLabel = document.getElementById('bidangStudiLabel');

        const jurusanSmk = document.getElementById('jurusanSmk');
        const bidangStudi = document.getElementById('bidangStudi');

        if (this.value === '4') {
            jurusanSmkField.style.display = 'block';
            bidangStudiField.style.display = 'none';
            jurusanSmkLabel.classList.add('required-label');
            bidangStudiLabel.classList.remove('required-label');
            jurusanSmk.required = true;
            bidangStudi.required = false;
        } else if (this.value === '5' || this.value === '6' || this.value === '7') {
            jurusanSmkField.style.display = 'none';
            bidangStudiField.style.display = 'block';
            jurusanSmkLabel.classList.remove('required-label');
            bidangStudiLabel.classList.add('required-label');
            jurusanSmk.required = false;
            bidangStudi.required = true;
        } else {
            jurusanSmkField.style.display = 'none';
            bidangStudiField.style.display = 'none';
            jurusanSmkLabel.classList.remove('required-label');
            bidangStudiLabel.classList.remove('required-label');
            jurusanSmk.required = false;
            bidangStudi.required = false;
        }
    };

    // Field Riwayat Pelatihan Kaderisasi
    function toggleUpload(uploadId, sectionClass) {
        // Sembunyikan semua upload-section pada kategori yang dipilih
        document.querySelectorAll(`.${sectionClass}`).forEach(el => el.style.display = 'none');
        // Tampilkan hanya elemen upload yang dipilih
        document.getElementById(uploadId).style.display = 'block';
    }

    // fungsi untuk menangani toggle radio button
    document.addEventListener('DOMContentLoaded', function() {
        let lastChecked = null; // Variabel untuk menyimpan radio button terakhir yang dipilih

        // Fungsi untuk menangani toggle radio button
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('click', function() {
                if (lastChecked === this) {
                    // Jika radio yang sama diklik, batalkan pilihan
                    this.checked = false;
                    lastChecked = null; // Reset lastChecked
                    toggleUpload('', this.name); // Sembunyikan upload section
                } else {
                    lastChecked = this; // Simpan radio yang baru dipilih
                }
            });
        });

        // Fungsi untuk menampilkan atau menyembunyikan upload section
        function toggleUpload(uploadId, sectionClass) {
            // Sembunyikan semua upload-section berdasarkan kategori
            document.querySelectorAll(`.${sectionClass}`).forEach(el => el.style.display = 'none');

            if (uploadId) {
                // Tampilkan hanya elemen yang dipilih
                document.getElementById(uploadId).style.display = 'block';
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        bsCustomFileInput.init();
    });

    // Validasi duplikat nomor wa
    $(document).ready(function() {
        $('#no_telp').on('blur', function() {
            var noTelp = $(this).val();

            // Lakukan pengecekan hanya jika input tidak kosong
            if (noTelp !== '') {
                $.ajax({
                    url: '../config/check_phone.php',
                    method: 'POST',
                    data: {
                        no_telp: noTelp
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.exists) {
                            // Jika nomor telepon sudah terdaftar
                            Swal.fire({
                                title: 'Ganti Nomor Hp Anda!',
                                text: 'Nomor Hp yang anda masukkan sudah terdaftar. Gunakan nomor lain.',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });

                            // Tambahkan kelas invalid-feedback
                            $('#no_telp').addClass('is-invalid');
                        } else {
                            // Nomor telepon valid, hilangkan pesan error
                            $('#no_telp').removeClass('is-invalid');
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Gagal memeriksa nomor telepon. Coba lagi.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    });

    // Akhir Halaman Form Pendaftaran

    // Halaman Data Pribadi
    function loadMemberCard(id) {
        document.getElementById('memberCardImage').src = `../kartu/card.php?id=${id}`;
    }

    <?php if ($anggota_id): ?>
        loadMemberCard(<?php echo $anggota_id; ?>);
    <?php endif; ?>

    // Akhir Halaman Data Pribadi

    // Validasi form
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const formSuccess = urlParams.get('form_success');

        if (formSuccess) {
            Swal.fire({
                title: 'Form Berhasil Dikirim',
                text: 'Terima kasih telah mengisi form pendaftaran',
                icon: 'success',
                confirmButtonText: 'OK',
            }).then(() => {
                // Hapus parameter dari URL setelah popup ditutup
                window.history.replaceState({}, document.title, window.location.pathname);
            });
        }

        const forms = document.querySelectorAll('form');

        forms.forEach((form) => {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault(); // Hentikan submit jika ada kesalahan
                    event.stopPropagation();

                    // Tambahkan kelas Bootstrap untuk menunjukkan error
                    form.classList.add('was-validated');

                    // Scroll ke elemen pertama yang invalid
                    const firstInvalidField = form.querySelector(':invalid');
                    if (firstInvalidField) {
                        firstInvalidField.focus();
                        firstInvalidField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }

                    // Tampilkan SweetAlert jika ada error
                    Swal.fire({
                        title: 'Data belum lengkap!',
                        text: 'Pastikan semua data telah terisi dengan benar!',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                    });

                } else {
                    // Jika validasi lolos, jalankan submit form dan SweetAlert konfirmasi
                    event.preventDefault(); // Mencegah submit asli
                    Swal.fire({
                        title: 'Submit Formulir?',
                        text: 'Pastikan semua data yang anda masukkan benar',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Kirim form setelah konfirmasi
                        }
                    });
                }
            }, false);
        });
    });
</script>

<!-- select2 -->
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 pada semua elemen dengan kelas 'select2'
        $('.select2').select2({
            allowClear: true,
            width: '100%'
        });
    });
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

    //datatables
    $(document).ready(function() {
        $('#usersTable').DataTable({
            "paging": true, // Aktifkan paginasi
            "searching": true, // Aktifkan pencarian
            "ordering": true, // Aktifkan sorting
            "info": true, // Menampilkan informasi jumlah data
            "lengthMenu": [10, 25, 50, 100], // Opsi jumlah data per halaman
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json"
            }
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