<?php
/* @var $this Controller */

Yii::app()->clientScript
        ->registerPackage('jquery')
        ->registerPackage('bootstrap')
        ->registerPackage('theme')
        ->registerPackage('font-awesome');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style>
            body {
                margin-top: 60px;
            }
            .bg-info, .bg-danger, .bg-success{
                padding: 15px;
            }
        .form-signin {
            margin: 0 auto;
            max-width: 330px;
            padding: 15px;
        }
        .form-signin .form-signin-heading, .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            -moz-box-sizing: border-box;
            font-size: 16px;
            height: auto;
            padding: 10px;
            position: relative;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            margin-bottom: -1px;
        }
        .form-signin input[type="password"] {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            margin-bottom: 10px;
        }

        </style>
    </head>

    <body>


        <?php
        $this->widget('bootstrap.widgets.BsNavbar', array(
            'collapse' => true,
            'brandLabel' => BsHtml::icon(BsHtml::GLYPHICON_HOME),
            'brandUrl' => Yii::app()->homeUrl,
            'position' => BsHtml::NAVBAR_POSITION_FIXED_TOP,
            'items' => array(
                
                array(
                    'class' => 'bootstrap.widgets.BsNav',
                    'type' => 'navbar',
                    'activateParents' => true,
                    'items' => array(
                        array(
                            'label' => 'Login',
                            'url' => '/login' ,
                            'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                            'visible' => Yii::app()->user->isGuest
                        ),
                        array(
                            'label' => 'Logout (' . Yii::app()->user->name . ')',
                            'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                            'url' => array(
                                '/site/logout'
                            ),
                            'visible' => !Yii::app()->user->isGuest
                        )
                    ),
                    'htmlOptions' => array(
                        'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT
                    )
                ),
                array(
                    'class' => 'bootstrap.widgets.BsNav',
                    'type' => 'navbar',
                    'activateParents' => true,
                    'items' => array(
                        array(
                            'label' => 'List employee',
                            'url' => array( '/employees/index'),
                            'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                        ),
                        array(
                            'label' => 'Tree employee',
                            'url' => array( '/employees/tree'),
                            'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                        ),
                        array(
                            'label' => 'Create employee',
                            'url' => array('/employees/create' ),
                            'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                            'visible' => !Yii::app()->user->isGuest
                        ),
                    ),
                    'htmlOptions' => array(
                        'pull' => BsHtml::NAVBAR_NAV_PULL_LEFT
                    )
                )
            )
        ));
        ?>




<?php echo $content; ?>





    </body>
</html>