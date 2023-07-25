<?php

session_start();
/*
 * CKFinder Configuration File
 *
 * For the official documentation visit https://docs.ckeditor.com/ckfinder/ckfinder3-php/
 */

/*============================ PHP Error Reporting ====================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/debugging.html

// Production
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0);

// Development
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

/*============================ General Settings =======================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html

$config = array();

/*============================ Enable PHP Connector HERE ==============================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_authentication

$config['authentication'] = function () {
    return true;
};

/*============================ License Key ============================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_licenseKey

$config['licenseName'] = 'example.com';
$config['licenseKey']  = 'C87A-TKGV-EM18-LFOO-PBQN-2569-AJUF';

/*============================ CKFinder Internal Directory ============================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_privateDir

$config['privateDir'] = array(
    'backend' => 'default',
    'tags'   => '.ckfinder/tags',
    'logs'   => '.ckfinder/logs',
    'cache'  => '.ckfinder/cache',
    'thumbs' => '.ckfinder/cache/thumbs',
);

/*============================ Images and Thumbnails ==================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_images

$config['images'] = array(
    'maxWidth'  => 1920,
    'maxHeight' => 0,
    'quality'   => 80,
    'sizes' => array(
        'small'  => array('width' => 480, 'height' => 320, 'quality' => 80),
        'medium' => array('width' => 600, 'height' => 480, 'quality' => 80),
        'large'  => array('width' => 800, 'height' => 600, 'quality' => 80)
    )
);

/*=================================== Backends ========================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_backends

$config['backends'][] = array(
    'name'         => 'default',
    'adapter'      => 'local',
    'baseUrl'      => '/userfiles/',
	'root'         => dirname(dirname(dirname(__FILE__))).'/userfiles/', // Can be used to explicitly set the CKFinder user files directory.
    'chmodFiles'   => 0777,
    'chmodFolders' => 0755,
    'filesystemEncoding' => 'UTF-8',
);

/*================================ Resource Types =====================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_resourceTypes

$config['defaultResourceTypes'] = '';

$config['resourceTypes'][] = array(
    'name'              => 'Files', // Single quotes not allowed.
    'directory'         => 'files',
    'maxSize'           => 0,
    'allowedExtensions' => '7z,aiff,asf,avi,bmp,csv,doc,docx,fla,flv,gif,gz,gzip,jpeg,jpg,mid,mov,mp3,mp4,mpc,mpeg,mpg,ods,odt,pdf,png,ppt,pptx,pxd,qt,ram,rar,rm,rmi,rmvb,rtf,sdc,sitd,svg,swf,sxc,sxw,tar,tgz,tif,tiff,txt,vsd,wav,wma,wmv,xls,xlsx,zip',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'Images',
    'directory'         => 'images',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,svg',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'Article',
    'directory'         => 'images/article',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,svg',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'News',
    'directory'         => 'images/news',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,svg',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'Faq',
    'directory'         => 'images/faq',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,svg',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'Book',
    'directory'         => 'images/book',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,svg',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'Product',
    'directory'         => 'images/product',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,svg',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'Zip', // Single quotes not allowed.
    'directory'         => 'zip',
    'maxSize'           => 0,
    'allowedExtensions' => 'rar,zip',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

$config['resourceTypes'][] = array(
	'name'				=> 'System',
	'directory'			=> 'system',
	'maxSize'			=> 0,
	'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,svg,mp4,wmv,rar,zip,doc,docx,pdf,odt,txt,pot,pps,ppt,ppsx,pptx',
	'deniedExtensions'	=> '',
	'backend'			=> 'default'
);

$config['resourceTypes'][] = array(
    'name'              => 'Jump',
    'directory'         => 'jump',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,svg',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);

/*================================ Access Control =====================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_roleSessionVar

$config['roleSessionVar'] = 'CKFinder_UserRole';

// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_accessControl
$config['accessControl'][] = array(
    'role'                => '*',
    'resourceType'        => '*',
    'folder'              => '/',

    'FOLDER_VIEW'         => true,
    'FOLDER_CREATE'       => true,
    'FOLDER_RENAME'       => true,
    'FOLDER_DELETE'       => true,

    'FILE_VIEW'           => true,
    'FILE_CREATE'         => true,
    'FILE_RENAME'         => true,
    'FILE_DELETE'         => true,

    'IMAGE_RESIZE'        => true,
    'IMAGE_RESIZE_CUSTOM' => true
);


/*================================ Other Settings =====================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html

$config['overwriteOnUpload'] = false;
$config['checkDoubleExtension'] = true;
$config['disallowUnsafeCharacters'] = false;
$config['secureImageUploads'] = true;
$config['checkSizeAfterScaling'] = true;
$config['htmlExtensions'] = array('html', 'htm', 'xml', 'js');
$config['hideFolders'] = array('.*', 'CVS', '__thumbs');
$config['hideFiles'] = array('.*');
$config['forceAscii'] = false;
$config['xSendfile'] = false;

// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_debug
$config['debug'] = false;

/*==================================== Plugins ========================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_plugins

$config['pluginsDirectory'] = __DIR__ . '/plugins';
$config['plugins'] = array();

/*================================ Cache settings =====================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_cache

$config['cache'] = array(
    'imagePreview' => 24 * 3600,
    'thumbnails'   => 24 * 3600 * 30,
    'proxyCommand' => 0
);

/*============================ Temp Directory settings ================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_tempDirectory

$config['tempDirectory'] = sys_get_temp_dir();

/*============================ Session Cause Performance Issues =======================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_sessionWriteClose

$config['sessionWriteClose'] = true;

/*================================= CSRF protection ===================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_csrfProtection

$config['csrfProtection'] = true;

/*===================================== Headers =======================================*/
// https://docs.ckeditor.com/ckfinder/ckfinder3-php/configuration.html#configuration_options_headers

$config['headers'] = array();

/*============================== End of Configuration =================================*/

// Config must be returned - do not change it.
return $config;
