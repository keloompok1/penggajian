
<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
    
</div>

<body>
    <div class="card" style="width: 65%; margin-bottom : 130px;" >
        <div class="card-body">


            <div class="form-group">
                <form action="<?php echo base_url('admin/dataJabatan/tambahDataAksi') ?>" method = "post">
                    <label>Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control">
                    <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>') ?>

            </div>

            <div class="form-group">
                <form action="<?php echo base_url('admin/dataJabatan/tambahDataAksi') ?>" method = "post">
                    <label>Gaji Pokok</label>
                    <input type="text" name="gaji_pokok" class="form-control">
                    <?php echo form_error('gaji_pokok','<div class="text-small text-danger"></div>') ?>

            </div>

            <div class="form-group">
                <form action="<?php echo base_url('admin/dataJabatan/tambahDataAksi') ?>" method = "post">
                    <label>Tunjangan Karyawan</label>
                    <input type="text" name="tj_karyawan" class="form-control">
                    <?php echo form_error('tj_karyawan','<div class="text-small text-danger"></div>') ?>

            </div>

            <div class="form-group">
                <form action="<?php echo base_url('admin/dataJabatan/tambahDataAksi') ?>" method = "post">
                    <label>Pajak Karyawan</label>
                    <input type="text" name="pajak_karyawan" class="form-control">
                    <?php echo form_error('pajak_karyawan','<div class="text-small text-danger"></div>') ?>

            </div>
            
            <button type="submit" class="btn btn-success">Submit</button>
                </form>
            
        </div>
    </div>
    </div>

</body>



