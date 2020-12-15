    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>



        <div class="row">
            <div class="col-lg">

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPinjamModal">Add New Pinjaman</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nama</th>
                            <th scope="col">No Induk Mahasiswa</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">No Handphone</th>
                            <th scope="col">tanggal pinjam</th>
                            <th scope="col">tanggal kembali</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pinjam as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['nim']; ?></td>
                                <td><?= $p['judul'] . ' ' .  ' | ' . ' ' . $p['kode_buku'] ?></td>
                                <td><?= $p['no_hp']; ?></td>
                                <td><?= date('d-m-Y', strtotime($p['tanggal_pinjam'])); ?></td>
                                <td><?= date('d-m-Y', strtotime($p['tanggal_kembali'])); ?></td>
                                <td><?= $p['status']; ?></td>
                                <td>
                                    <?php if ($p['status'] == 'Dipinjam') : ?>
                                        <a href="<?= base_url() ?>peminjam/kembali/<?= $p['id']; ?>" class="badge badge-pill badge-success" >Kembali</a>
                                    <?php else : ?>
                                        <a href="<?= base_url() ?>peminjam/delete/<?= $p['id']; ?>" class="badge badge-pill badge-danger" >Delete</a>
                                    <?php endif; ?>
                                    
                                </td>


                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="newPinjamModal" tabindex="-1" role="dialog" aria-labelledby="newPinjamModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPinjamModalLabel">Add New Pinjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('peminjam'); ?>" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama peminjam">
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" name="nim" id="nim" placeholder="Nomor Induk Mahasiswa peminjam">
                        </div>

                        <div class="form-group">
                            <select name="buku_id" id="buku_id" class="form-control">
                                <option value="">Select Buku</option>
                                <?php foreach ($buku as $b) : ?>
                                    <option value="<?= $b['id'] ?>"><?= $b['judul'] . ' ' .  ' | ' . ' ' . $b['kode_buku'];  ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="No Handphone peminjam">
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Tanggal Pinjam</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Tanggal Kembali</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">

                            </div>
                        </div>

                        <div class="form-group">
                            <select name="status" id="status" class="form-control">
                                <option value="Dipinjam">Pinjam</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Pinjam</button>

                    </div>
                </form>

            </div>
        </div>
    </div>