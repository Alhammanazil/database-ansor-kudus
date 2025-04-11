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

<style>
  .container-fluid {
    padding-left: 2rem;
    padding-right: 2rem;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row pt-2 justify-content-center">
        <div class="col-md-11">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manajemen Akun</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master</a></li>
                <li class="breadcrumb-item active">Manajemen Akun</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container-fluid">
    <div class="row pt-2 justify-content-center">
      <div class="col-md-11">

        <div class="card">
            <div class="card-header">
          <h3 class="card-title">Data Role Anggota</h3>
            </div>
            <div class="card-body">
          <table id="data-ansor" class="table-bordered table-striped table-hover">
              <thead class="text-left btn-dark">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Role</th>
                <th>Akses</th>
            </tr>
              </thead>
              <tbody>
            <?php if ($hasil->num_rows > 0): ?>
                <?php $no = 1; ?>
                <?php while ($user = $hasil->fetch_assoc()): ?>
              <tr>
                  <td class="text-left"><?php echo $no++; ?></td>
                  <td><?php echo htmlspecialchars($user['nama_lengkap']); ?></td>
                  <td><?php echo htmlspecialchars($user['username']); ?></td>
                  <td>
                <select name="role" class="form-select role-dropdown" data-id="<?php echo $user['id']; ?>">
                    <?php foreach ($enum_values as $value): ?>
                  <option value="<?php echo $value; ?>" <?php echo $user['role'] == $value ? 'selected' : ''; ?>>
                      <?php echo ucfirst($value); ?>
                  </option>
                    <?php endforeach; ?>
                </select>
                  </td>
                  <td class="text-center">
                <div class="form-check form-switch">
                    <input class="form-check-input akses-toggle" type="checkbox" role="switch" id="akses-<?php echo $user['id']; ?>" <?php echo $user['akses'] ? 'checked' : ''; ?> data-id="<?php echo $user['id']; ?>">
                </div>
                  </td>
              </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
              <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                </tr>
            <?php endif; ?>
              </tbody>
          </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once '../style/footer.php';
?>