    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>



        <div class="row">
            <div class="col-lg-6">
                <?= form_error('nama', '<div class="alert alert-danger" role="alert">', ' </div> '); ?>


                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKategoriModal">Add New Kategori Buku</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kategori as $k) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $k['nama']; ?></td>
                                <td>
                                    <a href="<?= base_url() ?>buku/editKategori/<?= $k['id']; ?>" class="badge badge-pill badge-success">Edit</a>
                                    <a href="<?= base_url() ?>buku/deleteKategori/<?= $k['id']; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Apakah Yakin Mau Di Hapus ?')">Delete</a>
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
    <div class="modal fade" id="newKategoriModal" tabindex="-1" role="dialog" aria-labelledby="newKategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newKategoriModalLabel">Add New Kategori Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('buku/kategori'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Kategori name">
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