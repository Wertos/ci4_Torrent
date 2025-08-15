<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>

<?= doctype('html5') ?>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <?php Arifrh\Themes\Themes::renderCSS(); ?>
  	<script type="text/javascript">window.CI4_Admin = {};</script>
  </head>
  <body>
    <div class="wrapper">
      <div id="overlay"></div>
      <!-- sidebar start -->
      <div class="sidebar shadow">
        <div class="admin_brand d-flex justify-content-between align-items-baseline">
          <div>
            <a class="d-inline nav-link fw-bold" target="_blank" href="<?= base_url(); ?>">
              <i class="fas fa-house me-4 ms-1"></i><?= lang('Site.site'); ?>
            </a>
          </div>
          <div class="d-block d-md-none">
            <a href="javascript:void(0)" id="close_sidebar"><i class="fas fa-times-circle fa-lg"></i></a>
          </div>
        </div>

        <ul class="nav nav-pills flex-column">
          <li class="nav-item <?= activate_menu('Home', 'index'); ?>">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.DashBoard'); ?>"><i class="fas fa-dashboard"></i></span>
              <span class="menu"><?= lang('Admin.DashBoard'); ?></span>
            </a>
          </li>

          <!-- drodown menu start -->
          <li class="nav-item position-relative" href="#setting" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="setting">
            <a class="nav-link" href="#setting">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Site.setting'); ?>">
                <i class="fa-solid fa-gears"></i>
              </span>
              <span class="menu"><?= lang('Admin.setting'); ?></span>
            </a>
          </li>
          <div class="collapse" id="setting">
            <li class="nav-item <?= activate_menu('TorrentController', 'AdminSetting'); ?>">
              <a class="nav-link" href="<?= base_url('admin/config/site'); ?>">
                <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.sitesetting'); ?>">
                  <i class="fa-solid fa-gear"></i>
                </span>
                <span class="menu"><?= lang('Admin.sitesetting'); ?></span>
              </a>
            </li>

            <li class="nav-item <?= activate_menu('TorrentController', 'TorrentSetting'); ?>">
              <a class="nav-link" href="<?= base_url('admin/config/torrent'); ?>">
                <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.torrentsetting'); ?>">
                  <i class="fa-solid fa-download"></i>
                </span>
                <span class="menu"><?= lang('Admin.torrentsetting'); ?></span>
              </a>
            </li>
          </div>
          <!-- dropdown menu end -->

          <!-- drodown menu start -->
          <li class="nav-item position-relative" href="#category" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="category">
            <a class="nav-link" href="#category">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Category.Categories'); ?>">
                <i class="fas fa-list"></i>
              </span>
              <span class="menu"><?= lang('Category.Categories'); ?></span>
            </a>
          </li>
          <div class="collapse" id="category">
            <li class="nav-item <?= activate_menu('CategoryController', 'CatList'); ?>">
              <a class="nav-link" href="<?= base_url('admin/categories'); ?>">
                <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Category.List'); ?>">
                  <i class="fas fa-list-tree"></i>
                </span>
                <span class="menu"><?= lang('Category.List'); ?></span>
              </a>
            </li>

            <li class="nav-item <?= activate_menu('CategoryController', 'CatAddShow'); ?>">
              <a class="nav-link" href="<?= base_url('admin/categories/add'); ?>">
                <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Category.Create'); ?>">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="menu"><?= lang('Category.Create'); ?></span>
              </a>
            </li>
          </div>
          <!-- dropdown menu end -->


          <!-- drodown menu start -->
          <li class="nav-item position-relative" href="#news" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="news">
            <a class="nav-link" href="#news">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.news'); ?>">
                <i class="fa-solid fa-newspaper"></i>
              </span>
              <span class="menu"><?= lang('News.news'); ?></span>
            </a>
          </li>
          <div class="collapse" id="news">
            <li class="nav-item <?= activate_menu('NewsController', 'NewsList'); ?>">
              <a class="nav-link" href="<?= base_url('admin/news/list'); ?>">
                <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.listnews'); ?>">
                  <i class="fa-solid fa-list"></i>
                </span>
                <span class="menu"><?= lang('News.listnews'); ?></span>
              </a>
            </li>

            <li class="nav-item <?= activate_menu('NewsController', 'NewsAddView'); ?>">
              <a class="nav-link" href="<?= base_url('admin/news/add'); ?>">
                <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.addnews'); ?>">
                  <i class="fa-solid fa-plus"></i>
                </span>
                <span class="menu"><?= lang('News.addnews'); ?></span>
              </a>
            </li>
          </div>
          <!-- dropdown menu end -->
          
          
          <li class="nav-item <?= activate_menu('UserController', 'UserList'); ?>">
            <a class="nav-link" href="<?= base_url('admin/users'); ?>">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.UsersTitle'); ?>"><i class="fas fa-users"></i></span>
              <span class="menu"><?= lang('Admin.Users'); ?></span>
            </a>
          </li>

          <li class="nav-item <?= activate_menu('ReportController', 'ReportList'); ?>">
            <a class="nav-link" href="<?= base_url('admin/reports'); ?>">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.reports'); ?>"><i class="fas fa-share"></i></span>
              <span class="menu"><?= lang('Admin.report'); ?></span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/logout'); ?>">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Login.logout'); ?>"><i class="fas fa-sign-out"></i></span>
              <span class="menu"><?= lang('Login.logout'); ?></span>
            </a>
          </li>

        </ul>
      </div>
      <!-- sidebar end -->
      <div class="content">
        <!-- top navbar start -->
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow">
          <div class="container-fluid px-3">

            <button class="navbar-toggler border-0" type="button" id="show_sidebar_phone">
              <span class="navbar-toggler-icon"></span>
            </button>


            <a class="navbar-brand d-none d-md-block" href="javascript:void(0)" id="show_sidebar_pc">
              <i class="fas fa-bars fa-lg"></i>
            </a>

            <div class="fw-bold text-secondary d-md-none d-block"><?= lang('Admin.AdminHome'); ?></div>


            <div class="ms-auto d-flex align-items-center">

              <div class="nav-item d-none d-md-block me-2" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.FullScreen'); ?>" data-bs-placement="left">
                <a href="#" class="nav-link" id="fullscreen">
                  <i class="fa-solid fa-expand"></i>
                </a>
              </div>

              <div class="dropdown">

                <a class="nav-link dropdown-toggle py-1 px-3 rounded-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle me-1"></i><?= $userdata->username; ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#"><i class="fa-solid fa-address-card me-2"></i>Profile</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear me-2"></i>Account</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="<?= base_url('user/logout'); ?>"><i class="fa-solid fa-right-from-bracket me-2"></i><?= lang('Login.logout'); ?></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <!-- top navbar end -->
        <!-- main content start -->
        <main class="bg-secondary bg-opacity-25 min-vh-100">
          <div class="container-fluid p-3 p-md-4">
<!-- Messages section start -->
					<?php if (session('error') !== null) : ?>
						<div class="alert alert-dismissible alert-danger" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
							<?= esc(session('error')) ?>
						</div>
					<?php elseif (session('errors') !== null) : ?>
						<div class="alert alert-dismissible alert-danger" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
							<?php if (is_array(session('errors'))) : ?>
								<?php foreach (session('errors') as $error) : ?>
									<?= esc($error) ?><br />
								<?php endforeach ?>
              <?php else : ?>
                <?= esc(session('errors')) ?>
              <?php endif ?>
            </div>
					<?php endif ?>
          <?php if (session('message') !== null) : ?>
						<div class="alert alert-dismissible alert-success" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
							<?= esc(session('message')) ?>
						</div>
          <?php endif ?>
<!-- Messages section end -->
