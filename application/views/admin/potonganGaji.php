<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
    
</div>

<?php echo $this->session->flashdata('pesan') ?>

<a class="btn btn-sm btn-success mb-2 mt-2" href="<?php echo base_url('admin/potonganGaji/tambahData')?>">
<i class="fas fa-plus"></i>Tambah Data</a>

<table class="table table-bordered table-striped">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Jenis Potongan</th>
        <th class="text-center">Jumlah</th>
        <th class="text-center">Action</th>
    </tr>

    <?php $no=1; foreach($pot_gaji as $r) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r->potongan ?></td>
            <td>Rp. <?php echo number_format($r->jmlh_potongan,0,',','.') ?></td>
            <td>
                <center>
                <a onclick="return confirm('Hapus Data?')" class="btn btn-sm btn-danger mb-2 mt-2" href="<?php echo base_url('admin/potonganGaji/deleteData/'.$r->id)?>">
                <i class="fas fa-trash"></i></a>
                </center>
            </td>

        </tr>
    <?php endforeach; ?>

</table><br><br><br><br><br>

</div>





