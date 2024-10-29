<?php
require_once '../style/header.php';

// Ambil data enum dari kolom role
$query = "SHOW COLUMNS FROM tb_users LIKE 'role'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
preg_match("/^enum\(\'(.*)\'\)$/", $row['Type'], $matches);
$enum_values = explode("','", $matches[1]);

// Mengambil semua pengguna
$sql = "SELECT * FROM tb_users";
$hasil = $conn->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manajemen Akun</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="pengaturan.php">Admin</a></li>
            <li class="breadcrumb-item active">Manajemen Akun</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="row justify-content-center my-4">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
              <div class="card mx-auto" style="width: 75%;">
                <img src="../assets/photo.jpg" class="card-img-top" alt="gambar pengguna">
                <div class="card-body text-center">
                  <h5 class="card-title">
                    <?php
                    if (isset($_SESSION['user'])) {
                      echo $_SESSION['user']['nama_lengkap'];
                    }
                    ?>
                  </h5>
                </div>
              </div>
            </div>
          </div>

          <!-- Data Admin -->
          <div class="table-responsive mt-3 mb-3">
            <h2 class="text-center">Data Admin</h2>
            <table id="usersTable" class="table table-bordered table-hover table-striped" style="margin: 20px;">
              <thead class="table-dark">
                <tr>
                  <th class="text-center align-middle">No</th>
                  <th class="text-center align-middle">Nama Lengkap</th>
                  <th class="text-center align-middle">Username</th>
                  <th class="text-center align-middle" style="min-width: 130px">Role</th>
                  <th class="text-center align-middle">Akses</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($user = $hasil->fetch_assoc()) : ?>
                  <tr>
                    <td class="text-center align-middle"><?= $no; ?></td>
                    <td class="text-center align-middle"><?= $user['nama_lengkap']; ?></td>
                    <td class="text-center align-middle"><?= $user['username']; ?></td>
                    <td class="text-center align-middle">
                      <select name="role" class="form-select role-dropdown" data-id="<?= $user['id'] ?>">
                        <?php foreach ($enum_values as $value) : ?>
                          <option value="<?= $value ?>" <?= $user['role'] == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                    <td class="text-center align-middle">
                      <div class="form-check form-switch">
                        <input class="form-check-input akses-toggle" type="checkbox" role="switch" id="akses-<?= $user['id'] ?>" <?= $user['akses'] ? 'checked' : '' ?> data-id="<?= $user['id'] ?>">
                      </div>
                    </td>
                  </tr>
                <?php $no++;
                endwhile; ?>
              </tbody>
            </table>
          </div>
          <!-- Akhir Data Admin -->
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once '../style/footer.php';
?>