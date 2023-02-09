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
                            $no = 1;
                            foreach ($rps as $item) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item->nama ?></td>
                                    <td><?= $item->nip ?></td>
                                    <td>
                                        <a href="<?= base_url('upload/rps/' . $item->fileRPS) ?>">View</a>
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
                <h3>Tambah Data RPS</h3>
            </div>
            <form action="<?= base_url('tambahRPS') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih Dosen</label>
                        <select name="id_dosen" id="" class="form-control">
                            <option selected disabled> Pilih Dosen</option>
                            <?php foreach ($dosen as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->nip, " | ", $item->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">File RPS</label>
                        <input type="file" name="fileRPS" id="fileRPS" class="form-control">
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