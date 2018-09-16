<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="<?= base_url(); ?>assets/manage/./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Manage Donasi Online</title>
    <!-- Icons-->
    <link href="<?= base_url(); ?>assets/manage/node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/manage/node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/manage/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/manage/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?= base_url(); ?>assets/manage/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/manage/pace-progress/css/pace.min.css" rel="stylesheet">
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8" style="top:8em">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>

                <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control" type="email" name="email" required placeholder="Masukan Email Anda">
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control" type="password" name="password" required placeholder="Masukan Password Anda">
                </div>
                <div class="row">
                  <div class="col-6">
                    <!-- <button class="btn btn-primary px-4" type="button">Login</button> -->
                    <input type="submit" class="btn btn-primary px-4" style="width:50%" value="Login">
                  </div>
                  <!-- <div class="col-6 text-right">
                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                  </div> -->
                </div>
                </form>
              </div>
            </div>
            <!-- <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <button class="btn btn-primary active mt-3" type="button">Register Now!</button>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url(); ?>assets/manage/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/pace-progress/pace.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
  </body>
</html>