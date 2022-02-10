<?php

//参数 反斜杠统一处理
if (!get_magic_quotes_gpc()) {
    function addslashesDeep($var) {
        return is_array($var) ? array_map('addslashesDeep', $var) : addslashes($var);
    }
    $_GET = addslashesDeep($_GET);
    $_POST = addslashesDeep($_POST);
}

require_once dirname( __FILE__ ) . '/common.inc.php';

$uid = isset($_GET['uid']) ? intval($_GET['uid']) : null;
$token = isset($_GET['token']) ? $_GET['token'] : null;
$params = (empty($_REQUEST)) ? file_get_contents('php://input') : $_REQUEST;

//调用方法
foreach ($params as $cotrl => $func) {
//    if ()
}