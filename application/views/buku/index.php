            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>



                <div class="row">
                    <div class="col-lg">
                        <div class="row">
                            <div class="col-lg-3">
                                <?php if (validation_errors()) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= validation_errors(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>



                        <?= $this->session->flashdata('message'); ?>

                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newBukuModal">Add New Daftar Buku</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">kategori Buku</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Kode Buku</th>
                                    <th scope="col">Tahun terbit</th>
                                    <th scope="col">Stok Buku</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($buku as $b) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $b['nama']; ?></td>
                                        <td><?= $b['judul']; ?></td>
                                        <td><?= $b['penulis']; ?></td>
                                        <td><?= $b['penerbit']; ?></td>
                                        <td><?= $b['kode_buku']; ?></td>
                                        <td><?= $b['tahun']; ?></td>
                                        <td><?= $b['stok']; ?></td>
                                        <td>
                                            <a href="<?= base_url('buku/edit/') . $b['id']; ?>" class="badge badge-pill badge-success">Edit</a>
                                            <a href="<?= base_url('buku/delete/') . $b['id']; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Apakah Yakin Mau Di Hapus ?')">Delete</a>
                                        </td>

                                    </tr>
                                    <?php $i++ ?>
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
            <div class="modal fade" id="newBukuModal" tabindex="-1" role="dialog" aria-labelledby="newBukuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newBukuModalLabel">Add New Daftar Buku</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?= base_url('buku'); ?>" method="post">
                            <div class="modal-body">

                                <div class="form-group">
                                    <select name="kategori_id" id="kategori_id" class="form-control">
                                        <option value="">Select kategori Buku</option>
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul buku">

                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Penulis buku">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit buku">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="kode_buku" id="valuenya" placeholder="Generate Kode Buku ....">
                                    <a href="javascript:void(0)" onclick="ff()" class="btn btn-primary">Generate kode</a>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" name="tahun" id="tahun" placeholder="Tahun Terbit buku">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok buku">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>