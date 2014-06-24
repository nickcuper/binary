<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Binary Test',
    // preloading 'log' component
    'preload' => array('log'),
    'aliases' => array(
        'bootstrap' => 'ext.bootstrap',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'bootstrap.*',
        'bootstrap.components.*',
        'bootstrap.models.*',
        'bootstrap.controllers.*',
        'bootstrap.helpers.*',
        'bootstrap.widgets.*',
        'bootstrap.extensions.*',
        'bootstrap.behaviors.*',
    ),
    
    'defaultController' => 'employees',
    
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'first',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii', // since 0.9.1
            ),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        /* 'db'=>array(
          'connectionString' => 'sqlite:protected/data/blog.db',
          'tablePrefix' => 'tbl_',
          ), */
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=binary_sql',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.BsApi'
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'urlManager' => array(
            'baseUrl' => '',
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'login' => 'site/login',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'clientScript' => array(
            'packages' => array(
                'jquery' => array(// jQuery CDN - provided by (mt) Media Temple
                    'baseUrl' => 'http://code.jquery.com/',
                    'js' => array(YII_DEBUG ? 'jquery-2.0.2.js' : 'jquery-2.0.2.min.js'),
                ),
                'bootstrap' => array(
                    'baseUrl' => '//netdna.bootstrapcdn.com/bootstrap/3.1.1/',
                    'css' => array('css/bootstrap.min.css'), // , 'css/bootstrap-theme.min.css'
                    'js' => array('js/bootstrap.min.js'),
                ),
                'theme' => array(
                    'baseUrl' => '//netdna.bootstrapcdn.com/bootstrap/3.1.1/',
                    'css' => array('css/bootstrap-theme.min.css'), // , 'css/bootstrap-theme.min.css'
                ),
                'font-awesome' => array(
                    'baseUrl' => '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/',
                    'css' => array(YII_DEBUG ? 'font-awesome.css' : 'font-awesome.min.css'),
                ),
            ),
        ),
        
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
);
