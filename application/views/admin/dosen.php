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
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($dosen as $item) :
                                $no++
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $item->nip ?></td>
                                    <td><?= $item->nama ?></td>
                                    <td><?= $item->email ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#alamat<?= $item->id ?>" type="button">Alamat</button>
                                    </td>   
                                    <td>
                                        <img src="<?= base_url('upload/dosen/' . $item->gambar) ?>" alt="gambar" width="80">
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#editData<?= $item->id ?>" data-target="#editData<?= $item->id ?>" data-toggle="modal">Edit</a>
                                                <a class="dropdown-item" href="#hapusData<?= $item->id ?>" data-target="#hapusData<?= $item->id ?>" data-toggle="modal">Hapus</a>
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

<?php foreach ($dosen as $item) :  ?>
    <div class="modal fade" id="alamat<?= $item->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Alamat <?= $item->nama ?></h4>
                </div>
                <div class="modal-body">
                    <span>Alamat : <?= $item->alamat ?></span>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<div class="modal fade" id="tambahData">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Dosen</h3>
            </div>
            <form action="<?= base_url('tambahDosen') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nip</label>
                        <input type="text" name="nip" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
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