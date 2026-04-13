<h2>Data Gejala</h2>

<a href="?m=gejala_tambah">Tambah</a>

<table border="1">
    <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>

    <?php
    $rows = $db->get_results("SELECT * FROM tb_gejala");

    foreach ($rows as $row) {
        echo "<tr>
    <td>$row->kode_gejala</td>
    <td>$row->nama_gejala</td>
    <td>
    <a href='aksi.php?act=gejala_hapus&ID=$row->kode_gejala'>Hapus</a>
    </td>
    </tr>";
    }
    ?>
</table>