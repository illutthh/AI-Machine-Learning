<?php
require_once 'functions.php';

/** LOGIN */
if ($mod == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");

    if ($row) {
        $_SESSION['login'] = $row->user;
        redirect_js("index.php");
    } else {
        print_msg("Salah kombinasi username dan password.");
    }
}

/** PASSWORD */ elseif ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru tidak sama.');
    else {
        $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
}

/** LOGOUT */ elseif ($act == 'logout') {
    unset($_SESSION['login']);
    header("location:index.php?m=login");
}

/** DIAGNOSA TAMBAH */ elseif ($mod == 'diagnosa_tambah') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    if ($kode == '' || $nama == '')
        print_msg("Field tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_diagnosa (kode_diagnosa, nama_diagnosa, keterangan)
        VALUES ('$kode','$nama','$keterangan')");
        redirect_js("index.php?m=diagnosa");
    }
}

/** DIAGNOSA HAPUS */ elseif ($act == 'diagnosa_hapus') {
    $db->query("DELETE FROM tb_diagnosa WHERE kode_diagnosa='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_diagnosa='$_GET[ID]'");
    header("location:index.php?m=diagnosa");
}

/** GEJALA TAMBAH */ elseif ($mod == 'gejala_tambah') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    if ($kode == '' || $nama == '')
        print_msg("Field tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_gejala (kode_gejala, nama_gejala)
        VALUES ('$kode','$nama')");
        redirect_js("index.php?m=gejala");
    }
}

/** GEJALA HAPUS */ elseif ($act == 'gejala_hapus') {
    $db->query("DELETE FROM tb_gejala WHERE kode_gejala='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_gejala='$_GET[ID]'");
    header("location:index.php?m=gejala");
}

/** RELASI TAMBAH */ elseif ($mod == 'relasi_tambah') {
    $kode_diagnosa = $_POST['kode_diagnosa'];
    $kode_gejala = $_POST['kode_gejala'];
    $mb = $_POST['mb'];
    $md = $_POST['md'];

    if ($kode_diagnosa == '' || $kode_gejala == '')
        print_msg("Field tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_relasi (kode_diagnosa, kode_gejala, mb, md)
        VALUES ('$kode_diagnosa','$kode_gejala','$mb','$md')");
        redirect_js("index.php?m=relasi");
    }
}

/** RELASI HAPUS */ elseif ($act == 'relasi_hapus') {
    $db->query("DELETE FROM tb_relasi WHERE ID='$_GET[ID]'");
    header("location:index.php?m=relasi");
}
?>