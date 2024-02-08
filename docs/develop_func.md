# 🥝 应用开发 - 通用方法和函数

能够提高开发效率，可以直接用于模板和插件开发的通用方法和函数。

## 常用方法

### 获取 GET 和 POST 变量

推荐使用核心的 Input 类来获取 GET 和 POST 提交的变量，不要直接使用 $a = $_POST['xxxx'] 的方式来获取，可能造成 SQL 注入等安全问题。

```php
// 读取通过 POST 提交的字符串，默认值设置为空
$var_name = Input::postStrVar('var_name', '');
// 读取通过 POST 提交的数字类型，默认值设置为 0
$var_name = Input::postIntVar('var_name', 0);

// 读取通过 GET 提交的字符串，默认值设置为空
$var_name = Input::getStrVar('var_name', '');
// 读取通过 GET 提交的数字类型，默认值设置为 0
$var_name = Input::getIntVar('var_name', 0);

// 读取 POST 提交的数字类型的数组，如: name="ids[]"，默认值为：[]
$logs = Input::postIntArray('blog');
// 读取 POST 提交的字符串类型的数组，如: name="someting[]"，默认值为：[]
$logs = Input::postStrArray('blog');

// 读取通过 GET, POST, and COOKIE 提交的字符串，默认值设置为空
$var_name = Input::requestStrVar('var_name', '');
// 读取通过 GET, POST, and COOKIE 提交的数字类型，默认值设置为 0
$var_name = Input::requestNumVar('var_name', 0);
```

### 获取系统设置

使用 Option 类的静态方法 get 可以获取系统的一些设置选项，如下：

```php
Option::get('att_maxsize') // 文件上传最大限制
Option::get('att_type') // 允许上传的文件类型
Option::get('att_imgmaxw') // 上传图片生成缩略图，最大尺寸:宽
Option::get('att_imgmaxh') // 上传图片生成缩略图，最大尺寸:高
```

## 常用函数

### 发送邮件通知

```php
$mail = 'xxx@qq.com';
$title = '邮件标题';
$content = '邮件内容';
Notice::sendMail($mail, $title, $content);
```

### 截取指定长度的内容

```php
//截取指定长度的内容函数
//第一个参数：要截取的内容
//第二个参数：截取长度
//第三个参数：是否过滤内容中的html标签 1过滤 0不过滤
//如下：截取日志内容的前180个字符，并过滤html标签

echo subContent($value['log_description'], 180, 1);

```

### 获取文章URL

```php
// 获取文章URL
// 参数1：$article_id 文章ID
<?= Url::log($article_id)?>
```

### 获取文章分类页URL

```php
// 获取文章URL
// 参数1：$sort_id 分类ID
<?= Url::sort($sort_id)?>
```

### 获取用户IP

```php
// 获取用户IP
echo getIp();
```

### 获取内容中的第一张图片

```php
// 获取内容中的第一张图片
// 参数$content：文章内容，可以是 markdown 或者 html 格式内容
// 返回：图片的 URL
$imageUrl = getFirstImage($content);
```

### 获取用户的Gravatar头像

```php
// 获取用户IP
// 参数：email
// 返回：头像 URL
$avatar = getGravatar($email);
```

### 友好的时间描述

```php
// 获取用户IP
// 参数：$timestamp unix 时间戳
// 返回：友好的时间描述，如：1分钟前
echo smartDate($timestamp);
```

--end--