<section class="employee-area mt-3 section-padding2">
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between lh-condensed pb-3">
                    <div class="d-flex">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
                    </div>
                </div>

                <?= $this->session->flashdata('message'); ?>

                <div class="table-responsive">
                    <table id="dtHorizontalExample" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nip</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($bkd as $row) :
                                $no++
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['nip'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#editData<?= $row['id'] ?>" data-target="#editData<?= $row['id'] ?>" data-toggle="modal">Edit</a>
                                                <a class="dropdown-item" href="#hapusData<?= $row['id'] ?>" data-target="#hapusData<?= $row['id'] ?>" data-toggle="modal">Hapus</a>
                                                <a class="dropdown-item" href="#">Detail</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="tambahData">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Data</h3>
            </div>
            <form action="<?= base_url('tambahData') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih Dosen</label>
                        <select name="id_dosen" class="form-control">
                            <option disabled selected> Pilih Dosen</option>

                            <?php foreach ($dosen as $item) : ?>
                                <option value="<?= $item->id ?>"> <?= $item->nip ?> | <?= $item->nama ?> </option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Ajaran</label>
                        <select name="tahun_ajaran" id="" class="form-control">
                            <option disabled selected> Pilih Tahun Ajaran</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="semester" id="" class="form-control">
                            <option selected disabled> Pilih Semester</option>
                            <option value="1">1 (satu)</option>
                            <option value="2">2 (dua)</option>
                            <option value="3">3 (tiga)</option>
                            <option value="4">4 (empat)</option>
                            <option value="5">5 (lima)</option>
                            <option value="6">6 (enam)</option>
                            <option value="7">7 (Tujuh)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Pendidikan</label>
                        <input type="file" name="bukti_pendidikan" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Pengabdian</label>
                        <input type="file" name="bukti_pengabdian" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Penelitian</label>
                        <input type="file" name="bukti_penelitian" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Penunjang</label>
                        <input type="file" name="penunjang" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Print Out Sister</label>
                        <input type="file" name="print_sister" id="" class="form-control">
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