<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

    <div class="row">

        <div class="col-lg-6">

            <input type="hidden" name="id"  value="<?= $kategori['id'];?>">

            <form action="" method="post">

                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $kategori['nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Ubah Kategori</button>
            </form>
        </div>
    </div>
</div>
<!-- end container -->

</div>
<!-- end content -->