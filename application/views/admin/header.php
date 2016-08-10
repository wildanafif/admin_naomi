<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Naomi Administrator</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css"
              rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->

        <link
            href="<?= base_url() ?>assets/plugins/fontawesome/css/font-awesome.min.css"
            rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <!--     <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        -->
        <!-- Theme style -->
        <link href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css"
              rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
                 folder instead of downloading all of them to reduce the load. -->
        <link href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css"
              rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/plugins/table/bootstrap-table.css"
              rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/naomi.css" rel="stylesheet"
              type="text/css" />

        <script src="<?= base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>

        <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"
              rel="stylesheet" type="text/css" />
        <style>
            #progress {
                position: relative;
                width: 400px;
                border: 1px solid #ddd;
                padding: 1px;
                border-radius: 3px;
            }

            #bar {
                background-color: #B4F5B4;
                width: 0%;
                height: 20px;
                border-radius: 3px;
            }

            #percent {
                position: absolute;
                display: inline-block;
                top: 3px;
                left: 48%;
            }
        </style>

    </head>
    <body class="skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper"><header class="main-header"> <!-- Logo --> <a
                    href="index2.html" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>P</b>S</span> <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Pencarian </b>Skripsi</span> </a> <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation"> <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">



                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu"><a href="#" class="dropdown-toggle"
                                                                   data-toggle="dropdown"> <span class="hidden-xs">Naomi Operator</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header"><img src="unesa.png" class="img-circle"
                                                                 alt="User Image" />
                                        <p>Naomi Operator</p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer"><a href="#" onclick="confirm_exit_window();"
                                                               class="btn btn-warning btn-flat" style="color: #fff;">Keluar</a></li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav> </header> <!-- Left side column. contains the sidebar --> <aside
                class="main-sidebar"> <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar"> <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header" style="font-size: 19px; text-align: center;"><b>Menu</b></li>

                        <li id="dashboard"
                            class="<?php
                            if ($aktif == 'beranda') {
                                echo "active";
                            }
                            ?>"><a href="<?= base_url() ?>administrator_naomi/"
                            style="border-bottom: 3px solid white; font-size: 20px;"> <i
                                    class="fa fa-home"></i> <span>&nbsp; Home</span> </a>
                        </li>

                        <li
                            class="<?php
                            if ($aktif == 'layanan') {
                                echo "active";
                            }
                            ?>"><a href="<?= base_url() ?>administrator_naomi/services"
                            id="link_cari_keyword"
                            style="border-bottom: 3px solid white; font-size: 20px;"> <i
                                    class="fa fa-key"></i> <span>&nbsp; Service /Layanan</span> </a>
                        </li>


                        <li
                            class="<?php
                            if ($aktif == 'produk') {
                                echo "active";
                            }
                            ?>"
                            style="border-bottom: 3px solid white; font-size: 20px;"><a
                                href="<?= base_url() ?>admin_produk" id="link_cari_judul"><i
                                    class="fa fa-book"></i> <span>&nbsp;&nbsp;Produk</span></a>
                        </li>

                        <li
                            class="<?php
                            if ($aktif == 'promosi') {
                                echo "active";
                            }
                            ?>"
                            style="border-bottom: 3px solid white; font-size: 20px;"><a
                                href="<?= base_url() ?>admin_promosi"><i class="fa fa-book"></i> <span>&nbsp;&nbsp;Promosi</span></a>
                        </li>

                        <li
                            class="<?php
                            if ($aktif == 'artikel') {
                                echo "active";
                            }
                            ?>"
                            style="border-bottom: 3px solid white; font-size: 20px;"><a
                                href="<?= base_url() ?>admin_artikel"><i class="fa fa-book"></i> <span>&nbsp;&nbsp;Artikel</span></a>
                        </li>
                         <li
                            class="<?php
                            if ($aktif == 'galeri') {
                                echo "active";
                            }
                            ?>"
                            style="border-bottom: 3px solid white; font-size: 20px;"><a
                                href="<?= base_url() ?>admin_galeri"><i class="fa fa-book"></i> <span>&nbsp;&nbsp;Galeri</span></a>
                        </li>

                        <li id="active_class_author"><a href="#" id="link_cari_author"
                                                        style="border-bottom: 3px solid white; font-size: 20px;"> <i
                                    class="fa fa-user"></i> <span>&nbsp;&nbsp;Author</span> </a></li>
                        <li id="active_class_tahun"><a href="#" id="link_cari_tahun"
                                                       style="border-bottom: 3px solid white; font-size: 20px;"> <i
                                    class="fa fa-calendar-o"></i> <span>&nbsp;&nbsp;Tahun</span> </a></li>
                        <li id="active_class_semua"><a href="#" id="link_cari_semua"
                                                       style="border-bottom: 3px solid white; font-size: 20px;"> <i
                                    class="fa fa-desktop"></i> <span>&nbsp;&nbsp;Semua data skripsi</span>
                            </a></li>
                        <li><a href="#" id="exit"
                               style="border-bottom: 3px solid white; font-size: 20px;"> <i
                                    class="fa fa-power-off"></i> <span>&nbsp;&nbsp;Keluar</span> </a></li>

                    </ul>
                </section> <!-- /.sidebar --> </aside>