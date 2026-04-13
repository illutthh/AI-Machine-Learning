<h2>Relasi</h2>

<table border="1">
    <tr>
        <th>Diagnosa</th>
        <th>Gejala</th>
        <th>MB</th>
        <th>MD</th>
    </tr>

    <?php
    $rows = $db->get_results("SELECT * FROM tb_relasi");

    foreach ($rows as $row) {
        echo "<tr>
    <td>$row->kode_diagnosa</td>
    <td>$row->kode_gejala</td>
    <td>$row->mb</td>
    <td>$row->md</td>
    </tr>";
    }
    ?>
</table>