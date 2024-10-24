<?php
require 'config.php';

// Ambil data RT
$rt_query = "SELECT rt_id, rt_name FROM tb_rt";
$rt_result = mysqli_query($conn, $rt_query);

// Ambil data RW
$rw_query = "SELECT rw_id, rw_name FROM tb_rw";
$rw_result = mysqli_query($conn, $rw_query);
