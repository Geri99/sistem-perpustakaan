<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <input type="hidden" name="id" value="<?= $buku['id']; ?>">

            <form action="" method="post">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Kategori Buku</label>
                    <div class="col-sm-10">
                        <select name="kategori_id" id="kategori_id" class="form-control">
                            <option value="">Select Kategori Buku</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $buku['judul'] ?>">
                        <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku['penulis'] ?>">
                        <?= form_error('penulis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku['penerbit'] ?>">
                        <?= form_error('penerbit', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kode_buku" class="col-sm-2 col-form-label">Penerbit Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="valuenya" name="kode_buku" value="<?= $buku['kode_buku'] ?>">
                        <a href="javascript:void(0)" onclick="ff()" class="btn btn-primary">Generate kode</a>
                        <?= form_error('kode_buku', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun Buku</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="tahun" name="tahun" value="<?= $buku['tahun'] ?>">
                        <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="stok" class="col-sm-2 col-form-label">Stok Buku</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $buku['stok'] ?>">
                        <?= form_error('stok', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>



                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->