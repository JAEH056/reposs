<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('users/plantilla'); ?>

<?= $this->section('contenido'); ?>

<?php 

    $session = session();

    echo $session->username;
?>

<div class="card shadow-lg border-0 rounded-lg mt-5">


    <div class="card-header justify-content-center">
        <h3 class="fw-light my-4">Registrarse</h3>
    </div>

    <?php if (session()->getFlashdata('error') !== null) { ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php } ?>

    <div class="card-body">
        <!-- Registration form-->
        <form action="<?= base_url('users') ?>" method="post">
            <!-- Form Row-->
            <div class="row gx-3">
                <div class="col-md-6">
                    <!-- Form Group (first name)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputFirstName">Username</label>
                        <input class="form-control" id="inputFirstName" type="text" name="username" value="<?= set_value('username') ?>"
                            placeholder="Enter username" />
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Group (email address)            -->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control" id="inputEmailAddress" type="email" name="email" value="<?= set_value('email') ?>"
                            aria-describedby="emailHelp" placeholder="Enter email address" />
                    </div>
                </div>
            </div>
            <!-- Form Row    -->
            <div class="row gx-3">
                <div class="col-md-6">
                    <!-- Form Group (password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control" id="inputPassword" type="password" name="password"
                            placeholder="Enter password" />
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Group (confirm password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                        <input class="form-control" id="inputConfirmPassword" type="password"
                            placeholder="Confirm password" />
                    </div>
                </div>
            </div>
            <!-- Form Group (create account submit)-->
            <button class="btn btn-primary btn-block" type="submit">Registrarse</button>
            <a href="<?= base_url('users') ?>" class="btn btn-primary">Regresar</a>
        </form>
    </div>
    <div class="card-footer text-center">
        <div class="small"><a href="auth-login-basic.html">Have an account? Go to login</a></div>
    </div>
</div>

<?= $this->endSection(); ?>