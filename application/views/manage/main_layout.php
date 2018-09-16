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
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="donasipay.online">
    <meta name="author" content="nuridincs">
    <meta name="keyword" content="donasi online">
    <title>Gama Tambun</title>
    <!-- Icons-->
    <link href="<?= base_url(); ?>assets/manage/node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/manage/node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/manage/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/manage/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?= base_url(); ?>assets/manage/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/manage/pace-progress/css/pace.min.css" rel="stylesheet">
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    <?php $this->load->view('manage/layout/header'); ?>
    <?php $this->load->view('manage/layout/content'); ?>
    <?php $this->load->view('manage/layout/footer'); ?>

    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url(); ?>assets/manage/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/pace-progress/pace.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url(); ?>assets/manage/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
    <script src="<?= base_url(); ?>assets/manage/js/main.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables.net-bs4/js/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables.net-bs4/js/datatables.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
  </body>
</html>