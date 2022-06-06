<div class="container-fluid" style="margin-bottom: 100px">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
    
</div>

<div class="card" style="width: 65%; margin-bottom : 100px">
    <div class="card-body">
        <form method="POST" action="<?php echo base_url('admin/dataKaryawan/tambahDataAksi') ?>" enctype="multipart/form-data" >

            <div class="form-group">
                <label>NIP</label>
                <input type="number" name="nip" class="form-control">
                <?php echo form_error('nip','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control">
                <?php echo form_error('nama_karyawan','<div class="text-small text-danger"></div>') ?>

            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
                <?php echo form_error('email','<div class="text-small text-danger"></div>') ?>

            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <?php echo form_error('password','<div class="text-small text-danger"></div>') ?>

            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="">
                    <option>--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <?php echo form_error('jenis_kelamin','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jenis_jabatan" class="form-control">
                <?php echo form_error('jenis_jabatan','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Hak Akses</label>
                <select name="hak_akses" class="form-control">
                    <option value="">--Pilih Hak Akses</option>
                    <option value="1">Admin</option>
                    <option value="2">Pegawai</option>
                </select>
                <?php echo form_error('hak_akses','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat_karyawan" class="form-control">
                <?php echo form_error('alamat_karyawan','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control">
                <?php echo form_error('tanggal_masuk','<div class="text-small text-danger"></div>') ?>
            </div>
            
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        

    </div>
</div>

</div>
