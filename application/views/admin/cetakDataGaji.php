<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tittle ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>

<center>
    <h1>PT. TRIMULYA JAYA DURI</h1>
    <h2>Daftar Gaji Karyawan</h2>
</center>

<?php 

if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $bulantahun = $bulan.$tahun;

}else{
    $bulan = date('m');
    $tahun = date('Y');
    $bulantahun = $bulan.$tahun;

}

?>

<table>
    <tr>
        <td>Bulan</td>
        <td>:</td>
        <td><?php echo $bulan ?></td>
    </tr>
        <td>Bulan</td>
        <td>:</td>
        <td><?php echo $tahun ?></td>
        
</table>

<table class="table table-bordered table striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama Karyawan</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tunjangan Karyawan</th>
            <th class="text-center">Pajak Karyawan</th>
            <th class="text-center">Potongan Gaji</th>
            <th class="text-center">Total Gaji</th>
        </tr>

        <?php foreach ($potongan as $p) {
            $tanpa_keterangan=$p->jmlh_potongan;
          }  ?>

        
    <?php $no=1; foreach ($cetakGaji as $g) : ?>
        <?php $potongan = $g->tanpa_keterangan * $tanpa_keterangan ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $g->nip ?></td>
            <td><?php echo $g->nama_karyawan ?></td>
            <td><?php echo $g->jenis_kelamin ?></td>
            <td><?php echo $g->nama_jabatan ?></td>
            <td>Rp. <?php echo number_format ($g->gaji_pokok,0,',','.') ?></td>
            <td>Rp. <?php echo number_format ($g->tj_karyawan,0,',','.') ?></td>
            <td>Rp. <?php echo number_format ($g->pajak_karyawan,0,',','.') ?></td>
            <td>Rp. <?php echo number_format ($potongan,0,',','.') ?></td>
            <td>Rp. <?php echo number_format ($g->gaji_pokok + $g->
            tj_karyawan - $g->pajak_karyawan - $potongan,0,',','.') ?></td>

            

        </tr>

    <?php endforeach; ?>
    </table>

    <table width="100%">
        <tr>
            <td></td>
            <td width="200px"> 
                <p>Pekanbaru, <?php echo date("d M Y") ?><br>Finance</p>
                <br>
                <br>
                <p>______________________</p>
            </td>
        </tr>
    </table><br><br><br><br><br>
    
</body>
</html>

<script type="text/javascript">window.print();</script>