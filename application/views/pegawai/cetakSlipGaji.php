<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tittle ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>

<center>
    <h1>PT. TRIMULYA JAYA DURI</h1>
    <h2>Slip Gaji Karyawan</h2>
    <hr style="width: 50%; border-width: 5px; color: black"> 
</center>


<?php foreach ($potongan as $p) {
    $potongan=$p->jmlh_potongan;
} ?>
    

<?php $no=1; foreach ($print_slip as $ps) :?>

    <?php $potongan_gaji=$ps->tanpa_keterangan * $potongan; ?>

<table style="width: 100%;">
    <tr>
        <td>NIP</td>
        <td>:</td>
        <td><?php echo $ps->nama_karyawan ?></td>
    </tr>
    <tr>
        <td width="20%">Nama</td>
        <td width="2%">:</td>
        <td><?php echo $ps->nama_karyawan ?></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?php echo $ps->nama_jabatan ?></td>
    </tr>
    <tr>
        <td>Bulan</td>
        <td>:</td>
        <td><?php echo substr($ps->bulan, 0,2) ?></td>
    </tr>
    <tr>
        <td>Tahun</td>
        <td>:</td>
        <td><?php echo substr($ps->bulan, 2,4)  ?></td>
    </tr>
</table>

<table class="table table-striped table-bordered">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Keterangan</th>
        <th class="text-center">Jumlah</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Gaji Pokok</td>
        <td>Rp. <?php echo number_format($ps->gaji_pokok,0,',','.' ) ?></td>
    </tr>

    <tr>
        <td>2</td>
        <td>Tunjangan Karyawan</td>
        <td>Rp. <?php echo number_format($ps->tj_karyawan,0,',','.' ) ?></td>
    </tr>
    <tr>
        <td>3</td>
        <td>Pajak Karyawan</td>
        <td>Rp. <?php echo number_format($ps->pajak_karyawan,0,',','.' ) ?></td>
    </tr>
    <tr>
        <td>4</td>
        <td>Denda</td>
        <td>Rp. <?php echo number_format($potongan_gaji,0,',','.' ) ?></td>
    </tr>
    <tr>
        <th colspan="2" style="text-align: right;" >Total Gaji</th>
        <td>Rp. <?php echo number_format($ps->gaji_pokok + $ps->tj_karyawan - $ps->pajak_karyawan - $potongan_gaji,0,',','.' ) ?></td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td></td>
        <td>
            <p>Karyawan</p>
            <br>
            <br>
            <br>
            <br>
            <p class="font-weight-bold"><?php echo $ps->nama_karyawan ?></p>
        </td>   
        <td width="200px">
            <p>Pekanbaru, <?php echo date("d M Y") ?><br>Finance,</p>
            <br>
            <br>
            <br>
            <p>_______________________</p>
        </td>
    </tr>



</table>

<?php endforeach; ?>
    
</body>
</html>
<script type="text/javascript">
    window.print();
</script>