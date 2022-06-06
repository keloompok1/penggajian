<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>

</div>

<a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataJabatan/tambahData')?>">
    <i class="fas fa-plus">Tambah Data</i>
</a>
<table class="table table-bordered table-striped">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Jabatan</th>
        <th class="text-center">Gaji Pokok</th>
        <th class="text-center">Tunjangan Karyawan</th>
        <th class="text-center">Pajak Karyawan</th>
        <th class="text-center">Total Gaji</th>
        <th class="text-center">Action</th>
    </tr>

    <?php $no=1; foreach($jabatan as $j) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $j->nama_jabatan ?></td>
            <td><?php echo number_format($j->gaji_pokok,0,',','.') ?></td>
            <td><?php echo number_format($j->tj_karyawan,0,',','.') ?></td>
            <td><?php echo number_format($j->pajak_karyawan,0,',','.') ?></td>
            <td><?php echo number_format($j->gaji_pokok + $j->tj_karyawan - $j->pajak_karyawan ,0,',','.') ?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataJabatan/updateData/'.$j->id_jabatan)?>">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a onclick="return confirm('Hapus Data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataJabatan/deleteData/'.$j->id_jabatan)?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
</table><br><br><br><br><br>


</div>





