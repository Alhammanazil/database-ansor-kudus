<?php
require_once '../style/header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row pt-2 justify-content-center">
                <div class="col-md-11">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard Admin Kecamatan <?php echo $data['kecamatan']; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Admin Kecamatan</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row pt-2 justify-content-center">
                <div class="col-md-11">
                    <div class="row">

                        <!-- Total Pendaftar -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $total_pendaftar; ?></h3>
                                    <p>Total Pendaftar</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-contacts"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Total Pendaftar Kecamatan [Filter] -->
                        <div class="col-lg-3 col-6">
                            <!-- kotak kecil -->
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3><?php echo $total_pendaftar_kecamatan; ?></h3>
                                    <p>Pendaftar Kecamatan <?php echo $data['kecamatan']; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-home"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Total Kecamatan -->
                        <div class="col-lg-3 col-6">
                            <!-- kotak kecil -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>9</h3>
                                    <p>Total Kecamatan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-map"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Total Desa -->
                        <div class="col-lg-3 col-6">
                            <!-- kotak kecil -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>123</h3>
                                    <p>Total Desa</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-location"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Dashboard Card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <?php
    require_once '../style/footer.php';
    ?>