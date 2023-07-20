        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('user/changepassword') ?>" method="post" class="col-lg-8">
                <div class="form-group">
                    <label for="currentpassword">Current Password</label>
                    <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="input Current Password">
                    <?php echo form_error('currentpassword', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password1">New Password</label>
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="input Password">
                    <?php echo form_error('password1', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password2">Repeat Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="input Repeat">
                    <?php echo form_error('password2', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>

            </form>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->