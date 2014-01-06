<?php
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Campus Free',

	// preloading 'log' component
	'preload'=>array('log'),
    
       'language'=>'fr',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.extensions.EAjaxUpload.*',
                'application.modules.rights.*',
                'application.modules.rights.components.*',
                'application.modules.user.models.*',
                'application.modules.user.components.*',
                'application.modules.information.models.*',
                'application.extensions.bootsrap.*',

	),
  
	'modules'=>array(
		
                // uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'campusfree',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                'information',
            
                'user'=>array(
                        'tableUsers' => 'users',
                        'tableProfiles' => 'profiles',
                        'tableProfileFields' => 'profiles_fields',
                             # encrypting method (php hash function)
                        'hash' => 'md5',

                        # send activation email
                        'sendActivationMail' => false,

                        # allow access for non-activated users
                        'loginNotActiv' => true,

                        # activate user on registration (only sendActivationMail = false)
                        'activeAfterRegister' => false,

                        # automatically login from registration
                        'autoLogin' => true,

                        # registration path
                        'registrationUrl' => array('/user/registration'),

                        # recovery password path
                        'recoveryUrl' => array('/user/recovery'),

                        # login form path
                        'loginUrl' => array('/user/login'),

                        # page after login
                        'returnUrl' => array('/user/profile'),

                        # page after logout
                        'returnLogoutUrl' => array('/user/login'),
        ),
            
                'rights'=>array(
                        'superuserName'=>'Admin', // Name of the role with super user privileges. 
                        'authenticatedName'=>'Authenticated',  // Name of the authenticated user role. 
                        'userIdColumn'=>'id', // Name of the user id column in the database. 
                        'userNameColumn'=>'username',  // Name of the user name column in the database. 
                        'enableBizRule'=>true,  // Whether to enable authorization item business rules. 
                        'enableBizRuleData'=>true,   // Whether to enable data for business rules. 
                        'displayDescription'=>true,  // Whether to use item description instead of name. 
                        'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 
                        'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 

                        'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested. 
                        'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights. 
                        'appLayout'=>'application.views.layouts.main', // Application layout. 
                        'cssFile'=>'rights.css', // Style sheet file to use for Rights. 
                        'install'=>false,  // Whether to enable installer. 
                        'debug'=>false, 
        ),		
	),

	// application components
	'components'=>array(
		'user'=>array(
                    'class'=>'RWebUser',
                    // enable cookie-based authentication
                    'allowAutoLogin'=>true,
                    'loginUrl'=>array('/user/login'),
                ),
               'authManager'=>array(
                    'class'=>'RDbAuthManager',
                    'connectionID'=>'db',
                    'defaultRoles'=>array('Authenticated', 'Guest'),
                ),
                'bootstrap'=>array(
                            'class'=>'bootstrap.components.Bootstrap',
                ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),


//                        'class'=>'RDbAuthManager',

		),
		
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=campusfree',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
//				array(
////					'class'=>'CFileLogRoute',
//					'levels'=>'error, warning',
//				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
            //configuration pour la gestion des mails
                'mail' => array(
                'class' => 'ext.yii-mail.YiiMail',
                'transportType'=>'smtp',
                'transportOptions'=>array(
                'host'=>'smtp.gmail.com',
                'username'=>'campusfrees@gmail.com',//adresse dédiée à campus free
                'password'=>'ismaelmoon',
                'port'=>'465',
                'encryption'=>'ssl',
                 ),
                'viewPath' => 'application.views.mail',
                'logging' => true,
                'dryRun' => false
                 ), 
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'campusfrees@gmail.com',
	),
);