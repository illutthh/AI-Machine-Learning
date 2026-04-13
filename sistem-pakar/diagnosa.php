<h2>Data Diagnosa</h2>

<a href="?m=diagnosa_tambah">Tambah</a>

<table border="1">
    <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>

    <?php
    $rows = $db->get_results("SELECT * FROM tb_diagnosa");

    foreach ($rows as $row) {
        echo "<tr>
    <td>$row->kode_diagnosa</td>
    <td>$row->nama_diagnosa</td>
    <td>
    <a href='aksi.php?act=diagnosa_hapus&ID=$row->kode_diagnosa'>Hapus</a>
    </td>
    </tr>";
    }
    ?>
</table>