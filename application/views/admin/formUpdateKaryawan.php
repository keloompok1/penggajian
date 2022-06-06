<div class="container-fluid">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle ?></h1>
    
</div>

<div class="card" style="width: 65%; margin-bottom : 100px">
    <div class="card-body">

    <?php foreach ($karyawan as $p) : ?>
        <form method="POST" action="<?php echo base_url('admin/dataKaryawan/updateDataAksi') ?>" enctype="multipart/form-data" >

            <div class="form-group">
                <label>NIP</label>
                <input type="hidden" name="id_karyawan" class="form-control" value="<?php echo $p->id_karyawan ?>">
                <input type="number" name="nip" class="form-control" value="<?php echo $p->nip ?>">
                <?php echo form_error('nip','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control" value="<?php echo $p->nama_karyawan ?>">
                <?php echo form_error('nama_karyawan','<div class="text-small text-danger"></div>') ?>

            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $p->email ?>">
                <?php echo form_error('email','<div class="text-small text-danger"></div>') ?>

            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <?php echo form_error('password','<div class="text-small text-danger"></div>') ?>

            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" >
                <option value="<?php echo $p->jenis_kelamin ?>"><?php echo $p->jenis_kelamin ?></option>
                    <option>--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <?php echo form_error('jenis_kelamin','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jenis_jabatan" class="form-control" value="<?php echo $p->jenis_jabatan?>">
                <?php echo form_error('jenis_jabatan','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Hak Akses</label>
                <select name="hak_akses" class="form-control">
                    <option value="<?php echo $p->hak_akses ?>">
                    <?php if($p->hak_akses=='1') {
                        echo "Admin";
                    }else {
                        echo "Pegawai";
                    } ?>
                    
                    <?php echo $p->hak_akses ?></option>
                    <option value="1">Admin</option>
                    <option value="2">Pegawai</option>
                </select>
                <?php echo form_error('hak_akses','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat_karyawan" class="form-control" value="<?php echo $p->alamat_karyawan?>">
                <?php echo form_error('alamat_karyawan','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $p->tanggal_masuk?>">
                <?php echo form_error('tanggal_masuk','<div class="text-small text-danger"></div>') ?>
            </div>
            
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <?php endforeach; ?>

    </div>
</div>

</div>
