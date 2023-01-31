<div class="container">
    <?= $this->session->flashdata('message'); ?>
    <table id="dtHorizontalExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nip</th>
                <th>Nama</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($bkd as $row) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nip'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><a href="<?= base_url('upload/bkd/' . $row['file']) ?>">Lihat</a></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-pen"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#tambahData" data-toggle="modal" data-target="#tambahData">Tambah</a>
                                <a class="dropdown-item" href="#editData<?= $row['id'] ?>" data-target="#editData<?= $row['id'] ?>" data-toggle="modal">Edit</a>
                                <a class="dropdown-item" href="#hapusData<?= $row['id'] ?>" data-target="#hapusData<?= $row['id'] ?>" data-toggle="modal">Hapus</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambahData">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Data</h3>
            </div>
            <form action="<?= base_url('tambahData') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="">NIP</label>
                        <input type="text" class="form-control" name="nip" required>
                    </div>
                    <div class="form-group">
                        <label for="">FIle BKD</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($bkd as $row) { ?>
    <div class="modal fade" id="editData<?= $row['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Data</h3>
                </div>
                <form action="<?= base_url('editData') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $row['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">NIP</label>
                            <input type="text" class="form-control" name="nip" value="<?= $row['nip'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">FIle BKD</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($bkd as $row) { ?>
    <div class="modal fade" id="hapusData<?= $row['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Hapus Data</h3>
                </div>
                <form action="<?= base_url('hapusData') ?>" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <h3 class="alert alert-danger ">Apakah Anda Yakin ingin menghapus data BKD <?= $row['nama'] ?></h3>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>