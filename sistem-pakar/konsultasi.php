<h2>Konsultasi</h2>

<form method="post">

    Nama: <input type="text" name="nama"><br>
    Umur: <input type="text" name="umur"><br>
    Alamat: <input type="text" name="alamat"><br><br>

    <?php
    $rows = $db->get_results("SELECT * FROM tb_gejala");

    foreach ($rows as $row) {
        echo "<input type='checkbox' name='gejala[]' value='$row->kode_gejala'>
    $row->nama_gejala <br>";
    }
    ?>

    <button type="submit">Diagnosa</button>

</form>

<?php if ($_POST)
    include 'konsultasi_hasil.php'; ?>