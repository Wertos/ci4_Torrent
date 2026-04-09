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
            <a class="nav-link text-decoration-none" href="<?= base_url('admin'); ?>">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.DashBoard'); ?>"><i class="fas fa-dashboard"></i></span>
              <span class="menu"><?= lang('Admin.DashBoard'); ?></span>
            </a>
          </li>

          <!-- drodown menu start -->
<!--
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
-->
          <!-- dropdown menu end -->

          <!-- drodown menu start -->
          <li class="nav-item position-relative" href="#category" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="category">
            <a class="nav-link text-decoration-none" href="#category">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Category.catmanage'); ?>">
                <i class="fas fa-list"></i>
              </span>
              <span class="menu"><?= lang('Category.Categories'); ?></span>
            </a>
          </li>
          <div class="collapse" id="category">
            <li class="nav-item <?= setActive('/admin/categories'); ?>">
              <a class="nav-link text-decoration-none" href="<?= base_url('admin/categories'); ?>">
                <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Category.List'); ?>">
                  <i class="fas fa-list-tree"></i>
                </span>
                <span class="menu"><?= lang('Category.List'); ?></span>
              </a>
            </li>

            <li class="nav-item <?= setActive('/admin/categories/add'); ?>">
              <a class="nav-link text-decoration-none" href="<?= base_url('admin/categories/add'); ?>">
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
            <a class="nav-link text-decoration-none" href="#news">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.newsmanage'); ?>">
                <i class="fa-solid fa-newspaper"></i>
              </span>
              <span class="menu"><?= lang('News.news'); ?></span>
            </a>
          </li>
          <div class="collapse" id="news">
            <li class="nav-item <?= setActive('/admin/news/list'); ?>">
              <a class="nav-link text-decoration-none" href="<?= base_url('admin/news/list'); ?>">
                <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.listnews'); ?>">
                  <i class="fa-solid fa-list"></i>
                </span>
                <span class="menu"><?= lang('News.listnews'); ?></span>
              </a>
            </li>

            <li class="nav-item <?= setActive('/admin/news/add'); ?>">
              <a class="nav-link text-decoration-none" href="<?= base_url('admin/news/add'); ?>">
                <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('News.addnews'); ?>">
                  <i class="fa-solid fa-plus"></i>
                </span>
                <span class="menu"><?= lang('News.addnews'); ?></span>
              </a>
            </li>
          </div>
          <!-- dropdown menu end -->
          
          
          <li class="nav-item <?= setActive('/admin/users'); ?>">
            <a class="nav-link text-decoration-none" href="<?= base_url('admin/users'); ?>">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.UsersTitle'); ?>"><i class="fas fa-users"></i></span>
              <span class="menu"><?= lang('Admin.Users'); ?></span>
            </a>
          </li>

          <li class="nav-item <?= setActive('/admin/reports'); ?>">
            <a class="nav-link text-decoration-none" href="<?= base_url('admin/reports'); ?>">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.reports'); ?>"><i class="fas fa-share"></i></span>
              <span class="menu"><?= lang('Admin.report'); ?></span>
            </a>
          </li>

          <li class="nav-item <?= setActive('/admin/comments'); ?>">
            <a class="nav-link text-decoration-none" href="<?= base_url('admin/comments'); ?>">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Comment.commmanage'); ?>"><i class="fa-solid fa-comment"></i></span>
              <span class="menu"><?= lang('Comment.comments'); ?></span>
            </a>
          </li>

          <li class="nav-item <?= setActive('/admin/torrents'); ?>">
            <a class="nav-link text-decoration-none" href="<?= base_url('admin/torrents'); ?>">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="<?= lang('Torrent.tormanage'); ?>"><i class="fa-duotone fa-solid fa-arrow-up-arrow-down"></i></i></span>
              <span class="menu"><?= lang('Torrent.torrents'); ?></span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-decoration-none" href="<?= base_url('user/logout'); ?>">
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

<div class="text-center">
  <button onClick="CI4_Admin.Rebuild('css'); return false;" type="button" class="btn btn-outline-danger btn-sm">
  	<i class="fa-solid fa-rotate me-1"></i>
  	<i class="fa-brands fa-css3 me-1"></i>
    <b><?= lang('Admin.RebuildCSS'); ?></b>
  </button>
  <button onClick="CI4_Admin.Rebuild('js'); return false;" type="button" class="btn btn-outline-danger btn-sm">
  	<i class="fa-solid fa-rotate me-1"></i>
  	<i class="fa-brands fa-js me-1"></i>
    <b><?= lang('Admin.RebuildJS'); ?></b>
  </button>
</div>
            <div class="ms-auto d-flex align-items-center">
              <div class="nav-item d-none d-md-block me-2" data-bs-toggle="tooltip" data-bs-title="<?= lang('Admin.FullScreen'); ?>" data-bs-placement="left">
                <a href="#" class="nav-link" id="fullscreen">
                  <i class="fa-solid fa-expand"></i>
                </a>
              </div>

              <div class="dropdown">

                <a class="nav-link dropdown-toggle py-1 px-3 rounded-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle me-1"></i><?= $userdata->username; ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item pb-0 pt-0 fw-bold" href="/admin/user/edit/<?= $userdata->id; ?>"><i class="fa-solid fa-address-card me-2"></i><?= lang('Profile.profile'); ?></a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item pb-0 pt-0 fw-bold" href="<?= base_url('user/logout'); ?>"><i class="fa-solid fa-right-from-bracket me-2"></i><?= lang('Login.logout'); ?></a>
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
					<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
						<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
							<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
						</symbol>
						<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
							<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
						</symbol>
						<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
							<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</symbol>
					</svg>
					<?php if (session('error') !== null) : ?>
						<div class="alert alert-dismissible alert-danger" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
							<?= session('error') ?>
						</div>
					<?php elseif (session('errors') !== null) : ?>
						<div class="alert alert-dismissible alert-danger" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
							<?php if (is_array(session('errors'))) : ?>
								<?php foreach (session('errors') as $error) : ?>
									<?= $error ?>
								<?php endforeach ?>
							<?php else : ?>
								<?= session('errors') ?>
							<?php endif ?>
						</div>
					<?php endif ?>
					<?php if (session('message') !== null) : ?>
						<div class="alert alert-dismissible alert-success" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
							<?= session('message') ?>
						</div>
					<?php elseif (session('messages') !== null) : ?>
						<div class="alert alert-dismissible alert-success" role="alert">
							<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
							<?php if (is_array(session('messages'))) : ?>
								<?php foreach (session('messages') as $message) : ?>
									<?= $message ?>
								<?php endforeach ?>
							<?php else : ?>
								<?= session('messages') ?>
							<?php endif ?>
						</div>
					<?php endif ?>
<!-- Messages section end -->
