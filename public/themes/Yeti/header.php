<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>

<?= doctype('html5') ?>
<html lang="ru">
  <head>
		<meta charset="<?= setting('App.charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="generator" content="<?= setting('Torrent.appname');?>">
		<?php if (setting('Torrent.siteDescr')) :?>
		<meta name="description" content="<?= setting('Torrent.siteDescr'); ?>"/>
		<meta property="og:description" content="<?= setting('Torrent.siteDescr'); ?>">
		<meta property="twitter:description" content="<?= setting('Torrent.siteDescr'); ?>">
		<?php endif; ?>
		<?php if (setting('Torrent.siteKeyword')) :?>
		<meta name="keywords" content="<?= setting('Torrent.siteKeyword'); ?>" />
		<?php endif; ?>
    <title><?= $page_title ?></title>
		<meta name="apple-mobile-web-app-title" content="<?= setting('Torrent.siteName'); ?>">
		<meta name="application-name" content="<?= setting('Torrent.siteName'); ?>"/>
		<meta property="og:site_name" content="<?= setting('Torrent.siteName'); ?>">
		<meta property="og:image" content="<?= $ogimage ?>" />
		<meta property="og:type" content="website">
		<meta property="og:title" content="<?= $page_title ?>">
    <?php Arifrh\Themes\Themes::renderCSS(); ?>
  	<script type="text/javascript">
  		window.CI4 = {};
  		CI4.urihash = window.location.hash;
  	</script>
  </head>
  <body>
			<div class="ms-1 page-header bg-primary text-center" id="banner">
				<div class="logo pt-4 pb-3">
					<a href="<?= base_url('/'); ?>"><img src="<?= base_url('themes/Yeti/img/logo.png'); ?>"></a>
				</div>
				<?php if ($news) : ?>
				<div id="news" class="position-absolute top-0 end-0" style="width:35%;">
				<ul class="p-1 me-4">
					<li class="ms-1 text-truncate w-100 text-start text-white">&nbsp;<?= lang('News.news'); ?></li>
					<?php	foreach ($news as $item) : ?>
					<li class="ms-2 text-truncate w-100 text-start text-white border-bottom" style="border-image: linear-gradient(to right, #eeeeee 0%, #008cba 100%) 1;">
					  <span class="badge bg-secondary"><i class="bi bi-newspaper me-1"></i><?= toDate($item->created_at); ?></span>
					  <a title="<?= $item->title; ?>" class="text-white me-1" href="<?= base_url('news/' . $item->id . '-' . $item->url); ?>">
						<?= $item->title; ?>
					  </a>
					</li>
					<?php	endforeach; ?>
				</ul>
				</div>
				<?php endif; ?>
			</div>
			<hr class="ms-1 mt-0 mb-0 p-0">
			<div class="ms-1 bs-docs-section clearfix">
				<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
					<div class="container-fluid">
						<div class="collapse navbar-collapse" id="navbarColor01">
							<ul class="navbar-nav w-50">
								<li class="nav-item">
									<a class="nav-link fs-7 <?= setActive('/'); ?>" href="<?= base_url('/')?>"><?= lang('Site.SiteHome'); ?></a>
								</li>
								<li class="nav-item">
									<a class="nav-link fs-7 <?= setActive('/rules');; ?>" href="<?= base_url('rules')?>"><?= lang('Site.rules'); ?></a>
								</li>
								<li class="nav-item">
									<a class="nav-link fs-7 <?= setActive('/secure'); ?>" href="<?= base_url('secure')?>"><?= lang('Site.secure'); ?></a>
								</li>
								<li class="nav-item">
									<a class="nav-link fs-7 <?= setActive('/about'); ?>" href="<?= base_url('about')?>"><?= lang('Site.about'); ?></a>
								</li>
							</ul>
							<div class="w-100">
								<div class="float-end w-75">
								  <div class="input-group" id="search-cat">
								  	<a data-bs-trigger="hover" data-bs-toggle="dropdown" id="search-cat-btn" data-orig-text="<?= lang('Category.Category.name'); ?>" data-cat="0" class="btn btn-success dropdown-toggle" aria-expanded="false"><i class="bi bi-list" title="<?= lang('Browse.searchdesc'); ?>"></i> <span><?= lang('Category.Category.name'); ?></span></a>
											<ul class="dropdown-menu bg-success list-inline w-75 p-3" id="#navbarNavDarkDropdown">
											  <li class="list-inline-item"><a id="search-cat-reset" class="dropdown-item" href="javascript:void(0);"><i class="bi bi-x-lg"></i> <?= lang('Category.reset'); ?></a></li>
										  	<?php foreach ($catList as $cat): ?>
												<li class="list-inline-item"><a id="search-cat-<?= $cat->id; ?>" data-select="<?= ($cat->id == (isset($catId) ? $catId : 0)) ? 'true' : 'false'; ?>" data-id="<?= $cat->id; ?>" class="dropdown-item cat" href="javascript:void(0);"><?= $cat->name; ?></a></li>
												<?php endforeach; ?>
											</ul>
								  	<input value="<?= isset($searchString) ? $searchString : null; ?>" class="w-50 form-control" type="search" id="search-cat-text" data-error="<?= lang('Category.sform-error'); ?>" placeholder="<?= lang('Category.search-plh'); ?>">
								  	<button class="btn btn-secondary btn-sm" type="button" id="search-cat-submit"><i class="bi bi-search"></i> <?= lang('Category.search'); ?></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</nav>
			</div>
<!-- BreadCrumb section start -->
			<nav aria-label="breadcrumb" class="ms-1" style="--bs-breadcrumb-divider: '&raquo;'">
				<?= $breadcrumb; ?> 
			</nav>
<!-- BreadCrumb section end -->
		<div class="container-fluid px-5 mx-auto">
			<div class="row mx-5">
				<div class="col-9">
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
