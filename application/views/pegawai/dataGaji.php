<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
    
</div>

<table class="table table-striped table-bordered">
    <tr>
        <th>Bulan/Tahun</th>
        <th>Gaji Pokok</th>
        <th>Tunjangan Karyawan</th>
        <th>Pajak Karyawan</th>
        <th>Potongan Gaji</th>
        <th>Total Gaji</th>
        <th>Cetak Slip</th>
    </tr> 

    <?php foreach($potongan as $p) : ?>
        <?php $potongan = $p->jmlh_potongan; ?>
    <?php endforeach ?>

    <?php foreach($gaji as $g) : ?>
    <?php $pot_gaji = $g->tanpa_keterangan * $potongan ?>
        <tr>
            <td><?php echo $g->bulan ?></td>
            <td><?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
            <td><?php echo number_format($g->tj_karyawan,0,',','.') ?></td>
            <td><?php echo number_format($g->pajak_karyawan,0,',','.') ?></td>
            <td><?php echo number_format($pot_gaji,0,',','.') ?></td>
            <td><?php echo number_format($g->gaji_pokok + $g->tj_karyawan - $g->pajak_karyawan - 
            $pot_gaji,0,',','.') ?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('pegawai/dataGaji/cetakSlip/'.$g->id_kehadiran)?>">
                        <i class="fas fa-print"></i>
                    </a>
                </center>
            </td>
            
            

        </tr>
    <?php endforeach; ?>
</div>





