<?php

$selected = $_POST['gejala'];

$hasil = [];

$diagnosa = $db->get_results("SELECT * FROM tb_diagnosa");

foreach ($diagnosa as $d) {

    $cf_total = 0;
    $first = true;

    foreach ($selected as $g) {

        $r = $db->get_row("SELECT * FROM tb_relasi 
        WHERE kode_diagnosa='$d->kode_diagnosa' 
        AND kode_gejala='$g'");

        if ($r) {
            $cf = $r->mb - $r->md;

            if ($first) {
                $cf_total = $cf;
                $first = false;
            } else {
                $cf_total = $cf_total + $cf * (1 - $cf_total);
            }
        }
    }

    $hasil[$d->nama_diagnosa] = $cf_total;
}

arsort($hasil);

echo "<h3>Hasil Diagnosis:</h3>";

foreach ($hasil as $nama => $nilai) {
    echo "$nama : " . round($nilai * 100, 2) . "%<br>";
}
?>