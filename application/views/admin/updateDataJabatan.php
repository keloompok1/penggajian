
<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
    
</div>


    <div class="card" style="width: 65%; margin-bottom : 130px;" >
        <div class="card-body">
            <?php foreach ($jabatan as $j) : ?>
                <form action="<?php echo base_url('admin/dataJabatan/updateDataAksi/') ?>" method = "post">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="hidden" name="id_jabatan" class="form-control" value="<?php echo $j->id_jabatan ?>">
                        <input type="text" name="nama_jabatan" class="form-control" input value="<?php echo $j->nama_jabatan ?>">
                        <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>') ?>

                    </div>

                    <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="number" name="gaji_pokok" class="form-control" value="<?php echo $j->gaji_pokok ?>">
                            <?php echo form_error('gaji_pokok','<div class="text-small text-danger"></div>') ?>

                    </div>

                    <div class="form-group">
                            <label>Tunjangan Karyawan</label>
                            <input type="number" name="tj_karyawan" class="form-control" value="<?php echo $j->tj_karyawan ?>">
                            <?php echo form_error('tj_karyawan','<div class="text-small text-danger"></div>') ?>

                    </div>

                    <div class="form-group">
                            <label>Pajak Karyawan</label>
                            <input type="number" name="pajak_karyawan" class="form-control" value="<?php echo $j->pajak_karyawan ?>">
                            <?php echo form_error('pajak_karyawan','<div class="text-small text-danger"></div>') ?>

                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <?php endforeach; ?>
        
            
        </div>
    </div>
    </div>





