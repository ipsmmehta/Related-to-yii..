// Custom dropdown 
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<style>
    @media only screen and (min-width: 668px) {
  .dropdown:hover .dropdown-menu {
    display: block;
  }
}
</style>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php


    if(Yii::$app->user->isGuest)
    {
    }else{
        // for Loged In Users
        /*
         $this->beginContent('@app/views/layouts/nav_log.php');  
            // You may need to put some content here  
         $this->endContent(); 
          */ 
}
        ?> <?php 
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        if(!Yii::$app->user->isGuest)
        {
        ?>
        <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?r=site/index">Home</a></li>
        <li><a href="index.php?r=site/user">About</a></li>
        <li><a href="index.php?r=site/testfrm" >Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown 2<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li> <li role="separator" class="divider"></li>
            <li><a href="#">Another action</a></li> <li role="separator" class="divider"></li>
            <li><a href="#">Something else here</a></li> <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li> <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>  <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
         <?php
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                
                Yii::$app->user->isGuest ? (
                   
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        
       
        NavBar::end();
    
  
    
   
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
