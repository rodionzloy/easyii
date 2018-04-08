<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\assets\AdminAsset;

$asset = AdminAsset::register($this);
$moduleName = $this->context->module->id;
?>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::t('easyii', 'Control Panel') ?> - <?= Html::encode($this->title) ?></title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?= $asset->baseUrl ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= $asset->baseUrl ?>/favicon.ico" type="image/x-icon">
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?= Url::to(['/admin/default']) ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>RT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="/img/logo.png" width="150px" style="margin-top: 10px"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li><a href="<?= Url::to(['/']) ?>" class="pull-left"><i class="glyphicon glyphicon-home"></i> <?= Yii::t('easyii', 'Open site') ?></a></li>
            <li><a href="<?= Url::to(['/admin/sign/out']) ?>" class="pull-right"><i class="glyphicon glyphicon-log-out"></i> <?= Yii::t('easyii', 'Logout') ?></a></li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Меню</li>
        <?php foreach(Yii::$app->getModule('admin')->activeModules as $module) : ?>
            <li class="<?= ($moduleName == $module->name ? 'active' : '') ?>">
                <a href="<?= Url::to(["/admin/$module->name"]) ?>">
                    <?php if($module->icon != '') : ?>
                        <i class="glyphicon glyphicon-<?= $module->icon ?>"></i>
                    <?php endif; ?>
                    <span><?= $module->title ?></span>
                    <?php if($module->notice > 0) : ?>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">
                                <?= $module->notice ?>
                            </small>
                        </span>
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach; ?>
        <li class="<?= ($moduleName == 'admin' && $this->context->id == 'settings') ? 'active' :'' ?>">
            <a href="<?= Url::to(['/admin/settings']) ?>">
                <i class="glyphicon glyphicon-cog"></i>
                <span><?= Yii::t('easyii', 'Settings') ?></span>
            </a>
        </li>
        <?php if(IS_ROOT) : ?>
            <li class="<?= ($moduleName == 'admin' && $this->context->id == 'modules') ? 'active' :'' ?>">
                <a href="<?= Url::to(['/admin/modules']) ?>">
                    <i class="glyphicon glyphicon-folder-close"></i>
                    <span><?= Yii::t('easyii', 'Modules') ?></span>
                </a>
            </li>
            <li class="<?= ($moduleName == 'admin' && $this->context->id == 'admins') ? 'active' :'' ?>">
                <a href="<?= Url::to(['/admin/admins']) ?>">
                    <i class="glyphicon glyphicon-user"></i>
                    <span><?= Yii::t('easyii', 'Admins') ?></span>
                </a>
            </li>
            <li class="<?= ($moduleName == 'admin' && $this->context->id == 'system') ? 'active' :'' ?>">
                <a href="<?= Url::to(['/admin/system']) ?>">
                    <i class="glyphicon glyphicon-hdd"></i>
                    <span><?= Yii::t('easyii', 'System') ?></span>
                </a>
            </li>
            <li class="<?= ($moduleName == 'admin' && $this->context->id == 'logs') ? 'active' :'' ?>">
                <a href="<?= Url::to(['/admin/logs']) ?>">
                    <i class="glyphicon glyphicon-align-justify"></i>
                    <span><?= Yii::t('easyii', 'Logs') ?></span>
                </a>
            </li>
        <?php endif; ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $this->title ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php foreach(Yii::$app->session->getAllFlashes() as $key => $message) : ?>
            <div class="alert alert-<?= $key ?>"><?= $message ?></div>
        <?php endforeach; ?>
        
        <div class="box">
            <div class="box-body">
                <?= $content ?>
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
