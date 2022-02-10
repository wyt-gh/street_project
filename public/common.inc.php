<?php
/**
 * 通用
 */

header( "Cache-Control: no-cache, must-revalidate" );
header( "Expires: Mon, 9 May 1983 09:00:00 GMT" );
header( 'P3P: CP="CAO PSA OUR"' );
header( "Content-type: text/html; charset=utf-8" );
header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With');
header( "Access-Control-Allow-Origin:*" );

/**
 * 调试环境配置
 */
//error_reporting(E_ALL); //打开全部错误监视
//ini_set('display_errors', 0); //禁止把错误输出到页面
//ini_set('log_errors', 1); //设置错误信息输出到文件
if (defined("DEBUG_EVN") && DEBUG_EVN) {
    error_reporting(E_ALL^E_NOTICE);
    ini_set('error_log', '/data/logs/php_error_'.date("Ymd").'.log');
    //ini_set('display_errors', 'On');//debug环境直接输出错误
}
else {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    ini_set('error_log', '/data/logs/php_error_'.date("Ymd").'.log');
}

define( 'ROOT_DIR' , dirname( dirname( __FILE__ ) ) );
define( 'CONFIG_DIR', ROOT_DIR . '/config' );
define( 'MOD_DIR', ROOT_DIR . '/model' );
define( 'LIB_DIR', ROOT_DIR . '/lib' );
define( 'API_DIR', ROOT_DIR . '/api' );
define( 'CONTROLLER_DIR', ROOT_DIR . '/controller' );
define( 'PUBLIC_DIR', ROOT_DIR . '/public' );

/**
 * 引入核心文件
 */
require_once ROOT_DIR . '/config.php';

/**
 * 自动加载
 */
spl_autoload_register(function ($class_name) {
    $file_dir_arr = array(LIB_DIR .'core', LIB_DIR , MOD_DIR);
    $file_dir = '';
    foreach ($file_dir_arr as $v) {
        $file_path_tmp = $v . $class_name . '.php';
        if (file_exists($file_path_tmp)) {
            $file_dir = $v;
            break;
        }
    }
    if (!empty($file_dir)) {
        require_once $file_dir . $class_name . '.php';
    }
});