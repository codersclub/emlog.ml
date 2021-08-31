# emlog 6.0.0 升级 pro 版本操作指南


## 第一步：准备工作

* 备份你网站的全部文件，及数据库。
* 确保你的PHP版本在7.0或者以上版本。

## 第二步：清理文件

* 只保留根目录下 config.php 及 content 文件夹，其他都删除

## 第三步：执行sql修改数据库表

```sql
INSERT INTO `emlog_options` (`option_name`, `option_value`) VALUES ('emkey','');
```
如果你的数据库表前缀不是 "emlog_" 替换即可

## 第三步：覆盖文件

* 下载最新版本emlog pro安装包，下载页面：https://www.emlog.net/register （页面底部）
* 上传除install.php 和 config.php 外的全部文件

## 第四步：访问网站后台，重建缓存

* 访问 http://你的域名/admin ，登录后左侧点击菜单系统--->数据--->更新缓存

