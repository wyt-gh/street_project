<?php
$shard_data = Common::getSharding(); //获取分库分表配置
$database_sum = count($shard_data);

$sql = array();

foreach ($shard_data as $key => $value) //库
{
    for ($i = 1; $i < $value['table_shard']; $i++) //表
    {
        //用户表
        $table = 'user_' . $i;
        $sql[$key][$i] = "CREATE TABLE IF NOT EXISTS `{$table}`(
        `uid` int(1) NOT NULL COMMENT 'uid',
        `name` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名称',
        `avatar` varchar(80) NOT NULL DEFAULT '' COMMENT '用户头像',
        `create_time` int(10) DEFAULT '0' COMMENT '注册时间',
        
        UNIQUE KEY `uid` (`uid`)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;" ;
    }

}