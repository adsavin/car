<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\Util;
use \yii\bootstrap\Modal;
use yii\widgets\Pjax;

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
        <?php if (Yii::$app->language == "lo"): ?>
            <style>
                body {
                    font-family: "Phetsarath OT", "Saysettha OT";
                }
            </style>
        <?php endif; ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-primary navbar-fixed-top',
                ],
            ]);

            $alllangs = Util::$LANGUAGES;
            $language = [];
            $language[] = [
                'label' => Html::img("images/en.png", ["class" => 'responsive']),
                'url' => ['/site/switchlang', ["lang" => 'en']]
            ];
            foreach ($alllangs as $key => $value) {
                $language[] = [
                    'label' => Html::img("images/$key.png", ["class" => 'responsive']),
                    'url' => ['/site/switchlang', ["lang" => $key]]
                ];
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => substr(Yii::$app->language, 0, 2) === "en" ? Html::img("images/en.png", ["class" => 'responsive']) :
                                Html::img("images/" . Yii::$app->language . ".png", ["class" => 'responsive']), 'items' => $language],
                    ['label' => '<b id="btnshowhidelogo" class="glyphicon glyphicon-indent-left"></b>',
                        'url' => '#', 'linkOptions' => ["id" => 'btnshowhide', 'class' => 'hidden-xs'],
                        'visible' => !Yii::$app->user->isGuest,
                    ]
                ],
            ]);

            $items = [
                ['label' => '<b class="glyphicon glyphicon-home"></b> ' . Yii::t('app', 'Home'), 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->can("Administrator")) {
                $items[] = ["label" => Yii::t('app', "Setting"), "items" => [
                        ['label' => Yii::t('app', 'Products Unit'), 'url' => ['/product-unit']],
                        ['label' => Yii::t('app', 'Products Category'), 'url' => ['/product-category']],
                        ['label' => Yii::t('app', 'Products Group'), 'url' => ['/product-group']],
                        ['label' => Yii::t('app', 'Products'), 'url' => ['/product']],
                        ['label' => Yii::t('app', 'Products Serial'), 'url' => ['/product-serial']],
                        '<li class="divider"></li>',
                        ['label' => Yii::t('app', 'Users'), 'url' => ['/user/admin']],
                        ['label' => Yii::t('app', 'Roles'), 'url' => ['/admin'], 'linkOptions' => ['target' => '_blank']]
                    ]
                ];
//                $items[] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/admin']];
//                $items[] = ['label' => Yii::t('app', 'Roles'), 'url' => ['/admin'], 'linkOptions' => ['target' => '_blank']];
            }
            if (Yii::$app->user->can("user-role")) {
                $items[] = ['label' => Yii::t('app', 'Translate'), 'items' => [
                        ['label' => Yii::t('app', 'Missing'), 'url' => ['/source-message']],
                        ['label' => Yii::t('app', 'Edit'), 'url' => ['/translate']],
                ]];
            }
            $items = array_merge($items, [
                ['label' => Yii::t('app', 'About'), 'url' => ['/site/about'], 'visible' => Yii::$app->user->isGuest],
                ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact'], 'visible' => Yii::$app->user->isGuest],
                Yii::$app->user->isGuest ?
                        ['label' => Yii::t('app', 'Login'), 'url' => ['/user/security/login']] :
                        ['label' => Yii::$app->user->identity->username, 'items' => [
                        [ 'label' => Yii::t('app', "Profile"), 'url' => ['/user/settings/profile']],
                        [ 'label' => Yii::t('app', 'Logout'), 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ]],
//                ['label' => Yii::t('app', 'Register'), 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $items,
            ]);
            NavBar::end();
            ?>
            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <div id="flash" class="row">
                    <div class="col-lg-12">
                        <?php
                        foreach (Util::$FLASH_LEVEL as $level) {
                            $flash = Yii::$app->session->getFlash($level);
                            if ($flash) {
                                echo yii\bootstrap\Alert::widget(['options' => ['class' => 'alert-' . $level], 'body' => $flash]);
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div id="leftpart" class="hidden-lg hidden-md hidden-sm hidden-xs  hidden-print">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><?= Yii::t('app', 'Menu') ?></div>
                            <div class="panel-body">
                                <ul class="nav nav-stacked nav-pills">
                                    <li class="item">Home</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="rightpart" class="col-lg-12">
                        <?= $content ?>
                    </div>
                </div>                
            </div>
        </div>
        <?php
        Modal::begin([
            'header' => '<h3>Title</h3>',
//            'toggleButton' => ['label' => 'click me'],
            'id' => 'modalbox'
        ]);
        Pjax::begin(["timeout" => 10000]);
        ?>
        <div class="row">
            <div id="modalcontainer" class="col-lg-12">

            </div>
        </div>
        <?php
        Pjax::end();
        Modal::end();
        ?>

        <footer class="footer hidden-print">
            <div class="container">
                <p class="pull-left">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>        
        <?php $this->endBody() ?>
        <?php
        $this->registerJs('$("#btnshowhide").click(function(e) {
                                e.preventDefault();                    
                                if ($("#leftpart").hasClass("col-lg-3")) {
                                    $("#leftpart").prop("class", "hidden-lg hidden-md hidden-sm hidden-xs");                        
                                    $("#rightpart").prop("class", "col-lg-12 col-md-12 col-sm-12 col-xs-12");    
                                    $("#btnshowhidelogo").prop("class", "glyphicon glyphicon-indent-left");
                                } else {                        
                                    $("#leftpart").prop("class", "col-lg-3 col-md-3 col-sm-4 col-xs-4");
                                    $("#rightpart").prop("class", "col-lg-9 col-md-9 col-sm-8 col-xs-8");
                                    $("#btnshowhidelogo").prop("class", "glyphicon glyphicon-indent-right");
                                }
                            });
                            $("input.form-control").first().focus();
                            $("#flash").fadeOut(30000, function() {
                                $("#flash").addClass("hidden");
                            }); 
                            
                            function selectItem(modalbody) {
                                $("#modalbox .modal-boy").html(modalbody);
                            }
            ');
        ?>
    </body>
</html>
<?php $this->endPage() ?>
