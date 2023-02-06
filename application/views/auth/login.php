<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url() ?>assets/img/logo.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents pt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="mb-4">
                            <h3><strong>Portal Akademik Dosen</strong></h3>
                            <p class="mb-4">Selamat Datang Di Portal Akademik Dosen Informatika</p>
                        </div>
                        <form action="<?= base_url('login') ?>" method="post">
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>

                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <button class="btn text-white btn-block btn-primary" type="submit">Login</button>
                        </form>
                        <span style="font-size: 12px;">
                            Dengan menggunakan ePortal Akademik Dosen Informatika, saya setuju dengan <a href="#">Syarat Ketentuan Penggunaan Aplikasi</a> dan <a href="#">Kebijakan Privasi</a> berikut.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>