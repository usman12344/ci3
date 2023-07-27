        <!-- Begin Page Content -->
        <div class="container-fluid ">



            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="row">
                <div class="col-lg-6">

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#MenuSubMenut">
                        Add New Menu
                    </button>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Url</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($submenu as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $m['title']; ?></td>
                                    <td><?= $m['menu']; ?></td>
                                    <td><?= $m['url']; ?></td>
                                    <td><?= $m['icon']; ?></td>
                                    <td><?= $m['is_active']; ?></td>
                                    <td>
                                        <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#EditSubMenu<?= $m['id']; ?>">
                                            Edit
                                        </button>
                                        <a href="<?= base_url(); ?>menu/hapussubmenu/<?= $m['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">hapus</a>
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

        <!-- Modal tambah -->
        <div class="modal fade" id="MenuSubMenut" tabindex="-1" aria-labelledby="MenuSubMenutLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="MenuSubMenutLabel">Add New SubMenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu/subMenu'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Sub menu title">
                            </div>
                            <div class="form-group">
                                <select class="custom-select custom-select-sm mb-3" name="menu_id" id="menu_id">
                                    <option selected>Open this select menu</option>
                                    <?php foreach ($menu as $sm) : ?>
                                        <option value="<?= $sm['id'] ?>"><?= $sm['menu'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="url" name="url" placeholder="Sub name url">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub name icon">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add New Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Modal edit -->
        <?php $no = 0;
        foreach ($submenu as $m) : $no++; ?>
            <div class="modal fade" id="EditSubMenu<?= $m['id']; ?>" tabindex="-1" aria-labelledby="EditSubMenuLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditSubMenuLabel">Edit SubMenu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('menu/ubahMenu'); ?>" method="post">
                            <input type="hidden" name="id" value="<?= $m['id']; ?>">
                            <div class="modal-body">

                                <div class="form-group">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Sub menu title" value="<?= $m['title'] ?>">
                                </div>
                                <div class="form-group">
                                    <select class="custom-select custom-select-sm mb-3" name="menu_id" id="menu_id">
                                        <!-- <option selected><?= $m['menu'] ?></option> -->
                                        <?php foreach ($menu as $sm) : ?>
                                            <option value="<?= $sm['id']; ?>" <?= $sm['id'] == $m['menu_id'] ? "selected" : null ?>><?= $sm['menu'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Sub name url" value="<?= $m['url'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub name icon" value="<?= $m['icon'] ?>">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked value="<?= $m['url'] ?>">
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Edit Menu</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>