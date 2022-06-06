<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
    
</div>
<?php echo $this->session->flashdata('pesan') ?>

<a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataKaryawan/tambahData') ?>">
    <i class="fas fa-plus">Tambah Karyawan</i>
</a>

<table class="table table-striped table-bordered">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIP</th>
        <th class="text-center">Nama Karyawan</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Jabatan</th>
        <th class="text-center">Hak Akses</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Tanggal Masuk</th>
        <th class="text-center">Photo</th>
        <th class="text-center">Action</th>

    </tr>
    <?php $no=1; foreach($karyawan as $p) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $p->nip ?></td>
            <td><?php echo $p->nama_karyawan ?></td>
            <td><?php echo $p->jenis_kelamin ?></td>
            <td><?php echo $p->jenis_jabatan ?></td>
            
            <?php if($p->hak_akses=='1') { ?>
                    <td>Admin</td>
                <?php }else{ ?>
                    <td>Pegawai</td>
                <?php } ?>
            
            <td><?php echo $p->alamat_karyawan ?></td>
            <td><?php echo $p->tanggal_masuk ?></td>
            <td><img src="<?php echo base_url().'assets/photo/'.$p->photo?>" width="77px"></td>

                

            <td>
            <center>
                     <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataKaryawan/updateData/'.$p->id_karyawan)?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a onclick="return confirm('Hapus Data?')" class="btn btn-sm btn-danger" 
                    href="<?php echo base_url('admin/dataKaryawan/deleteData/'.$p->id_karyawan)?>">
                        <i class="fas fa-trash"></i>
                    </a
                 </center>
            </td>
        </tr>
    <?php endforeach; ?>
    

</table><br><br><br><br><br>



</div>





