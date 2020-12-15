<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg-6">

            <input type="hidden" name="id" value="<?= $submenu['id']; ?>">

            <form action="" method="post">

                <?= $this->session->flashdata('message'); ?>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title'] ?>">
                        <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Menu</label>
                    <div class="col-sm-10">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- <div class="form-group">
                    Menu :
                    <input type="text" class="form-control" name="menu_id" id="menu_id" value="<?= $submenu['menu_id']; ?>">
                </div> -->

                <div class="form-group row">
                    <label for="url" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url'] ?>">
                        <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon'] ?>">
                        <?= form_error('icon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active">
                        <label class="form-check-label" for="is_active">
                            active ?
                        </label>
                    </div>
                </div>

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary"> Update </button>
            </form>
        </div>
    </div>
</div>
<!-- end container -->

</div>
<!-- end content -->