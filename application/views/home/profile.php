<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

    </div>
</section>
<section id="about" class="about ">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
            <h2>Profile</h2>
            <h3>Halo, <?= $profile->nama_customer ?>!</h3>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <h5>Akun</h5>
                <form method="POST" action="<?= site_url('profile/password') ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?= $akun->email ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Lama</label>
                        <input type="password" name="password_old" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-8">
                <h5>Profile</h5>
                <form method="POST" action="<?= site_url('profile/customer') ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama_customer" class="form-control" value="<?= $profile->nama_customer ?>" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?= $profile->tanggal_lahir ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor Telpon</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number" value="<?= $profile->phone_number ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option disabled value=""> -- Apakah gender anda -- </option>
                            <option value="Men" <?= $profile->jenis_kelamin == 'Men' ? 'selected' : '' ?>> Laki-laki </option>
                            <option value="Women" <?= $profile->jenis_kelamin == 'Women' ? 'selected' : '' ?>> Perempuan </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" required class="form-control"><?= $profile->nama_customer ?></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Ubah Profile</button>
                    </div>
                </form>
            </div>
        </div>
</section>