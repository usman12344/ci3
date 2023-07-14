        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="card" style="width: 18rem;">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <h5 class="card-title"><?= $user['email']; ?></h5>
                    <p class="card-text">Member Since <?= date('D F Y', $user['date_created']); ?></p>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->