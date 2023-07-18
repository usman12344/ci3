        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg-8">
                    <?php echo form_open_multipart('user/edit'); ?>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= $user['email']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?= $user['name']; ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Picture</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->