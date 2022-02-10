# street_project
街道项目
贴吧

使用技术: 
	服务器分布式,
	分库分表+主从复制(读写分离)
   	redis,锁
	MQ
	短信发送,邮件
	服务器部署,git同步
	爬虫

项目架构:
api:	给前端请求的接口
config:	项目配置目录
controller:	系统管理目录
crontab:	定时器目录
lib:	工具库
model:	模型
public: 	公共入口



数据库
	数据库分库 => 根据业务分库
	数据库分表 => 根据 %10 进行分表
	merge引擎分表
