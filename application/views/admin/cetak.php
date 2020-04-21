<?php
$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        <?= $title; ?>
    </title>
    </head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>ID Pel</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Keterangan</th>
            <th>Geser Meter</th>
            <th>Tanggal Bayar</th>
            <th>Biaya</th>
            <th>Dok. Awal</th>
            <th>Dok. Akhir</th>
        </tr>';

$no = 1;
foreach ($user as $row) {
    $html .= '<tr>
            <td>' . $no++ . '</td>
            <td>' . $row->id_pelanggan . '</td>
            <td>' . $row->nama . '</td>
            <td>' . $row->alamat . '</td>
            <td>' . $row->keterangan . '</td>
            <td>' . $row->pk_geser_meter . '</td>
            <td>' . $row->tanggal_pembayaran . '</td>
            <td>' . number_format($row->biaya) . '</td>
            <td><img src="' . base_url("assets/img/$row->dokumentasi") . '" width="80"></td>
            <td><img src="' . base_url("assets/img/$row->dok_akhir") . '" width="80"></td>
        </tr>';
}

$html .= '</table>

                
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
