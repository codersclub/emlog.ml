# 模板开发基础指南

本文分析emlog下的模板基本结构以及基本变量、函数的作用，详细了解本文，有助于更快掌握emlog5的模板开发基础。

emlog的模板位于安装目录content\templates\文件夹下，每个模板都是一个单独的文件夹，文件夹以模板名字命名。通过后台上传安装的模板都保存在这个目录下。

## 模板文件目录说明

* images文件夹：存放模板所需图片。
* css 文件夹：存放模板所需的所有样式文件。
* js 文件夹：存放模板所需的所有JS文件。
* header.php：页面头部。
* echo_log.php：显示日志内容。
* log_list.php：显示日志列表内容。
* footer.php：页面底部。
* main.css：模板的css文件。
* module.php：模板公共代码，包含侧边widgets、评论、引用、编辑等，该文件是模板最核心的模块。
* page.php：自定义的页面内容的模板。
* preview.jpg：在后台模板选择界面显示的模板预览图，300×225 jpg格式。
* side.php：模板侧边栏文件，如制作单栏模板则该文件不是必须的。
* 404.php 自定义404页面未找到时的报错页面
* t.php：显示微语内容【仅用于5.3.1】


## 公共代码分析

通过预览整个模板中的各个文件，你会发现以下代码同时存在于多个文件中，这些代码分别有以下用途： 
```php
//此行代码存在于模板目录下的每个php文件起始部分(事实上为了安全起见，该行代码也在admin目录下的几乎所有php文件起始部分存在)，其作用是防止代码所在的php脚本被直接访问执行。 
if(!defined('EMLOG_ROOT')) {exit('error!');}
```
```php
//这两行代码作用是调用模板文件夹下的side.php和footer.php的代码到当前文件的当前位置。
//View是emlog的模板视图控制器，View::getView('文件名','文件后缀')将返回当前模板安装路径下对应的文件。
//getView函数的第二个参数为缺省参数，在不传入值的情况下，将默认作为.php文件后缀返回文件路径。
require_once View::getView('side'); 
require_once View::getView('footer'); 
```
### header.php

开头注释内容是模板信息，该信息显示在模板选择界面

* Template Name:模板名称
* Description:模板介绍描述
* Template Url:https://www.emlog.net/template/ 模板的网址
* Author:模板作者
* Author Url:作者或模板发布的URL
* Sidebar Amount:标记该模板有几个侧边栏，一般为1，有些模板有两个侧边栏则标记2。这样可以在后台widgets里识别管理（仅5.3.1支持）。



之后是具体代码部分：

require_once View::getView('module');

加载模板公共代码.

* $site_title：站点标题 * $site_key：关键字 * $site_description：输出博客设置的摘要 * BLOG_URL：博客首页的URL，输出形如http://simue.com/blog/ * TEMPLATE_URL：模板文件夹的URL，用于加载模板内的css、js及其他内容，输出形如http://simue.com/blog/content/templates/simue-tuso/ * BLOG_URL.Option::get('topimg')：这句可以无视，因为只默认模板可以自定义banner，其它模板没这功能（卡片语：很没营养的设定，嗯。）

<?php echo $curpage == CURPAGE_HOME ? 'current' : 'common';?> 判断当前是否首页，是则给导航加current类，用于表现当前位置。

<?php if($istwitter == 'y'):?>…….<?php endif;?> 如后台设置在前台显示碎语，则输出…….中的内容。

<?php echo $curpage == CURPAGE_TW ? 'current' : 'common';?> 判断当前URL是否为碎语并选择加类名。

<?php foreach ($navibar as $key ⇒ $val):?>…….<?php endforeach;?> 输出自定义页面的链接

### footer.php

Option::EMLOG_VERSION：获得版本号。

$icp：获得后台设置的ICP备案号。

<?php doAction('index_footer'); ?> 页脚底部挂载点加入。

### log_list.php

<?php doAction('index_loglist_top'); ?> 页脚底部挂载点加入。

$value['logid'] 该变量为当前日志的id

<?php topflg($value['top']); ?> 显示置顶标记，该函数位于模板module.php内。

<?php echo $value['log_url']; ?> 输出日志URL

<?php echo $value['log_title']; ?> 输出日志标题

<?php blog_author($value['author']); ?>

输出日志的作者，该函数位于模板module.php内。

<?php echo gmdate('Y-n-j G:i l', $value['date']); ?>

输出日志发布时间，参数'Y-n-j G:i l'用于定义日期格式。

<?php blog_sort($value['logid']); ?>

输出日志所属的分类，该函数位于模板module.php内。

<?php editflg($value['logid'],$value['author']); ?>

当管理员或作者登陆时显示“编辑”链接，该函数位于模板module.php内。

<?php echo $value['log_description']; ?>

输出日志摘要（没有摘要则输出全文）。

<?php blog_att($value['logid']); ?>

如日志有附件则输出附件，该函数位于模板module.php内。

<?php blog_tag($value['logid']); ?> 输出日志的标签，该函数位于模板module.php内。

<?php echo $value['comnum']; ?> 输出当前日志的评论数

<?php echo $value['tbcount']; ?> 输出当前日志的引用量

<?php echo $value['views']; ?> 输出当前日志的浏览量

<?php echo $page_url;?> 显示当前列表页的翻页功能。

<?php include View::getView('side'); include View::getView('footer'); ?>

加入侧边栏及加入页脚。

### echo_log.php

该文件功能函数与列表页一致，但参数有区别，注意区分。 $logid 该变量为当前日志的id

<?php topflg($top); ?> 显示置顶标记，该函数位于模板module.php内。

<?php echo $log_title; ?> 输出日志标题。

<?php blog_author($author); ?> 输出日志的作者，该函数位于模板module.php内。

<?php echo gmdate('Y-n-j G:i l', $date); ?> 输出日志发布时间，参数'Y-n-j G:i l'用于定义日期格式。

<?php blog_sort($logid); ?> 输出日志所属的分类，该函数位于模板module.php内。

<?php editflg($logid,$author); ?> 当管理员或作者登陆时显示“编辑”链接，该函数位于模板module.php内。

<?php echo $log_content; ?> 输出日志全文内容。

<?php blog_att($logid); ?> 如日志有附件则输出附件，该函数位于模板module.php内。

<?php blog_tag($logid); ?> 输出日志的标签，该函数位于模板module.php内。

<?php echo $comnum; ?> 日志页显示评论数

<?php echo $tbcount; ?> 日志页显示引用数

<?php echo $views; ?> 日志页显示浏览量

<?php doAction('log_related', $logData); ?> 相关日志的挂载点，与3.x版本不同，4.0带第二参数。

<?php neighbor_log($neighborLog); ?> 输出邻近，就是上一篇及下一篇，该函数位于模板module.php内。

<?php blog_trackback($tb, $tb_url, $allow_tb); ?> 输出该日志被引用的信息列表，与3.x不同注意区分。

<?php blog_comments($comments); ?> 输出该日志评论列表，与3.x不同注意区分。

<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?> 输出发表评论框，与3.x不同注意区分。

### page.php

该文件写法与echo_log.php类似，不再重复。

### side.php

侧边栏，主要负责根据后台widgets设置信息输出侧边栏内容。建议该文件内代码保持不变。

module.php

模板公共代码，包含侧边widgets、评论、引用、编辑等。 该文件由若干函数组成，被博客前台文件调用，可在内自定义函数实现更多功能。 如在自定义函数内调用emlog缓存时，假设读取user缓存信息，则形如： global $CACHE; $user_cache = $CACHE→readCache('user'); 如需要操作数据库，则形如： $DB = MySql::getInstance(); $res = $DB→query($sql); 以上两点与3.x不同，请注意区分。

### 404.php

用于自定义404页面的模板。

最后附：前台模板部分挂载点一览

doAction('index_footer'); 页脚底部挂载点

doAction('index_loglist_top'); 首页日志列表顶部挂载点

doAction('log_related', $logData); 相关日志挂载点

doAction('diff_side'); 侧边栏挂载点


### t.php (仅5.3.1支持)

与之前相同的内容不再重复。 <?php echo $avatar; ?> 输出头像。

<?php echo $author; ?> 输出作者名。

<?php echo $val['t'];?> 输出碎语内容。

<?php echo DYNAMIC_BLOGURL; ?> 根据当前url输出博客地址，主要用于js，解决跨域问题。

<?php echo $tid;?> 输出碎语所在数据库中的id号。

<?php echo $val['date'];?> 发布碎语的时间。

$reply_code ：其值为‘n’或‘y’，后台设置是否启用碎语回复验证码。

<?php echo $rcode; ?> 输出验证码。