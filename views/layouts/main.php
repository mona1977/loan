<?php
/*
   DEVELOPER: SURENDRA GUPTA
   Date : 10-FEB-2020
   
*/

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

    <div class="body-wrap">

        <?php $this->beginBody() ?>

        <div class="wrap">

            <div class="top-bar-black">
                <?= $this->render('/_top_bar', [
                ]) ?>
            </div>

            <?php
            NavBar::begin([
                'brandLabel' => '<img src="' . Yii::$app->request->getBaseUrl() . '/img/creditstar-logo-156x34.png" alt="Creditstar" class="top-logo">',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-fixed-top navbar-white',
                ],
            ]);
            echo Nav::widget([
                'options' => [
                    'class' => 'navbar-nav navbar-right',
                ],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Users', 'url' => ['/user/index']],
                    ['label' => 'Loans', 'url' => ['/loan/index']],
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container breadcrumbs-bar">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Creditstar <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>

    </div>

    </body>
</html>
<?php $this->endPage() ?>
