# ? Template Development Guide

Emlog can easily replace the template. The template theme file is located in the content\templates\ folder of the installation directory. Each template is a separate folder, and the folder is named after the template. Templates uploaded and installed through the app store and background are stored in this directory.

## Template file and directory description

* css folder: Store all CSS style files required by the template.
* js folder: Store all JS files required by the template.
* images folder: store the images required by the template.
* header.php: page header, generally includes page head information and top header navigation.
* echo_log.php: Display the content of a single article.
* log_list.php: display the list of articles.
* footer.php: information at the bottom of the page.
* module.php: Sidebar module: latest articles, comments, categories, tags, etc.
* page.php: display custom pages.
* preview.jpg: Template preview image displayed on the background template selection interface, in 300×225 jpg format.
* side.php: template sidebar file, if making a single-column template, this file is not necessary.
* 404.php Custom error page when 404 page not found
* pw.php Custom encrypted article input password page [not required, without this file, use the system default style]

## template engine

emlog does not use any other third-party template engine, and directly uses PHP's native syntax tags to embed HTML to generate dynamic pages. This not only reduces the learning burden for developers, but also greatly improves the efficiency of page loading and rendering.

```php
// eg: embedded variables
<div><?= $value ?></div>

// eg: loop
<?php foreach ($abc as $v) :?>
    <div><?= $v ?></div>
<?php endforeach;?>

// eg: judgment
<?php if($a == 'abc') :?>
    <div>hello</div>
<?php endif;?>

```

## Common code

By previewing each file in the entire template, you will find that the following codes exist in multiple files at the same time, and these codes have the following purposes:

```php
//This line of code exists at the beginning of each php file in the template directory, and its function is to prevent the php script where the code is located from being directly accessed and executed.
if(!defined('EMLOG_ROOT')) {exit('error!');}
```

```php
//The function of these two lines of code is to call the codes of side.php and footer.php under the template folder to the current location of the current file.
//View is the template view controller of emlog, View::getView('file name','file suffix') will return the corresponding file under the current template installation path.
//The second parameter of the getView function is the default parameter. If no value is passed in, the file path will be returned by default as the suffix of the .php file.
require_once View::getView('side');
require_once View::getView('footer');
```

```php
// The following code format is the plug-in mount point in the template, refer to the default template, pay attention to keep it, do not delete it
<?php doAction('xxx') ?>
```

## file description

### header.php

#### header information

The content of the comment at the beginning is the necessary information of the template, which will be displayed on the background template management interface, and must be filled in completely.

* Template Name: template name
* Description: template introduction description
* Template URL: https://www.emlog.net/template/detail/982
* Author: template author
* Author Url: Author's homepage

require_once View::getView('module'); // Load template common module.

#### Variables & Constants

| Variables & Constants | Type | Description |
|-------------------|-----|------------------------------------------------------------------------------------|
| $site_title | variable | site title (affected by background seo optimization settings) |
| $site_key | variable | site key |
| $site_description | variable | output site browser description (affected by background seo optimization settings) |
| $blogname | variable | site title |
| $bloginfo | variable | site subtitle |
| BLOG_URL | Constant | The URL of the homepage of the site, the output is in the form of https://emlog.net/ |
| TEMPLATE_URL | Constant | The URL of the template folder, used to load the css, js and other content in the template, the output is like http://emlog.net/blog/content/templates/default/ |

The above variables and constants can be output in the template in the following way

```php
<?= $page_url?>
<?= BLOG_URL ?>
```

###footer.php

#### Variables & Constants

| variable, constant | type | description |
|-----------------------|-----|-------------|
| $icp | variable | ICP record number set in background |
| $footer_info | Variables | Information at the bottom of the page set in the background |
| Option::EMLOG_VERSION | Constant | Current emlog version number |

###log_list.php

| variable, constant, method | type | description |
|--------------------------------------------|----- |----------------------------------|
| $value['log_cover'] | variable | article cover image URL |
| $value['logid'] | variable | the id of the current post |
| $value['log_url'] | variable | article address URL |
| $value['log_title'] | variable | post title |
| date('Y-n-j', $value['date']) | variable | article release time, the parameter 'Y-n-j G:i l' is used to define the date format |
| $value['log_description'] | variable | article abstract (full text output without abstract) |
| $value['comnum'] | variable | number of comments for the current post |
| $value['views'] | variable | views of the current article |
| editflg($value['logid'],$value['author']) | variable | show "edit" link when admin or author is logged in |
| topflg($value['top']) | variable | display top mark, this function is located in the template module.php |
| $page_url | variable | display the page turning function of the current list page |
| blog_sort($value['logid']) | Method | Display the category of the article |
| blog_author($value['author']) | method | show the author of the post |
| blog_tag($value['logid']) | Method | Display the tag of the post |

!> The above variables and methods can be output in the template in the following way

```php
<?= $value['logid'] ?>
<?= blog_author($value['author']) ?>
```

### echo_log.php

The function of this file is consistent with the list page, but the parameters are different, pay attention to the distinction. $logid This variable is the id of the current article

| variable, constant, method | type | description |
|-----------------------------------------------------------------------------|-----|--------------------------------|
| $log_title | variable | post title |
| $log_cover | variable | post cover image URL |
| date('Y-n-j', $date)| Variables | Article release time, the parameter 'Y-n-j G:i l' is used to define the date format |
| $log_content | variable | article abstract (full text output without abstract) |
| $comnum | variable | number of comments for the current post |
| $views | variable | views of the current post |
| $page_url | variable | display the page turning function of the current list page |
| topflg($top) | method | show top flag |
| blog_tag($logid) | method | tag of the post |
| blog_author($author) | method | the author of the post |
| blog_sort($logid) | method | category of the post |
| editflg($logid,$author) | Method | Displays the "Edit" link when an admin or author is logged in. |
| neighbor_log($neighborLog) | Method | Output the adjacent articles, that is, the previous and next articles. |
| blog_comments($comments) | method | output a list of comments on this article |
| blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark) | Method | Output post comment box |

###page.php

The writing method of this file is similar to that of echo_log.php and will not be repeated here.

###side.php

The sidebar is mainly responsible for outputting the content of the sidebar according to the setting information of the background widgets. It is recommended that the code in this file remain unchanged.

###module.php

Template public code, including side widgets, comments, quotes, edits, etc.

This file is composed of several functions, which are called by the template file, and more functions can be realized by customizing functions inside.

For example, when calling emlog cache in a custom function, assuming that user cache information is read, the form is as follows: global $CACHE; $user_cache = $CACHE→readCache('user');

If you need to operate the database, the form is as follows: $DB = MySql::getInstance(); $res = $DB→query($sql);

###404.php

Templates for custom 404 pages.

###pw.php

It is used to customize the password input page of encrypted articles. If there is no template file, the system default style will be used, which will not affect the normal use of the password input function. For the template content, please refer to the default template.

## Foreground template mount point

#### Note: Be sure to refer to the default template when developing the template to retain the following mount points for compatibility with other plugins.

| Mount point | Belonging file | Change in point description | Example |
|-----------------------------------|--------------|-----------------------------|-----|
| doAction('index_head') | header.php | The mount point in the head tag of the site, used to mount js or css style files |
| doAction('index_footer') | footer.php | Mount point at the bottom of the footer, used to mount bottom information display plugins |
| doAction('index_loglist_top') | log_list.php | Mount point at the top of the home page article list, it is recommended to add it under the home page navigation bar |
| doAction('log_related', $logData) | echo_log.php | Related post mount point, added between post content and comments |

Example of adding a mount point:

```php
<?php doAction('index_footer') ?>
```

## Constants that can be used directly

| variable, constant | type | description |
|-----------------------|-----|-----------------------------------------------|
| Option::EMLOG_VERSION | Constant | Get the current emlog version number |
| ROLE | Constant | Current user role (user group): admin administrator, writer registered user, visitor visitor |
| ROLE_ADMIN | constant | admin administrator |
| ROLE_WRITER | constant | writer registered user |
| ROLE_VISITOR | constant | visitor visitor |
| UID | constant | current user UID |
| BLOG_URL | Constant | Full URL of the site |
| ISLOGIN | Constant | Whether to log in, true to log in, false not to log in |

The above constants can be used in templates in the following way

```php
// Output the current site URL
<?= BLOG_URL ?>

```

## Asynchronous request

By default, emlog's comment publishing, user registration, and user login interfaces will jump to the page regardless of error or success, which brings inconvenience to building a more friendly asynchronous ajax interaction request. Pro2.0 began to support asynchronous requests and return json information.

### Post a comment

* Interface URL: https://www.yourdomain.com/index.php?action=addcom
* Request method: POST
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|--|-----|
| gid | required | article id |
| comname | required | name of commenter |
| comment | Mandatory | Comment content |
| commail | No | Commenter's Email |
| comurl | No | Commenter's home page address |
| imgcode | No | Image Verification Code |
| pid | No | Replied comment ID |
| resp | Required | Pass the string "json", and the data in json format will be returned |

#### return result

```json
{
  "code": 1,
  "msg": "Comment content must contain Chinese",
  "data": ""
}
```

#### js call case, for reference

```js
const submitBtn = document.getElementById('submit-btn');

submitBtn.addEventListener('click', async () => {
    const params = new URLSearchParams({
        gid: document.getElementById('gid').value,
        comname: document.getElementById('comname').value,
        comment: document.getElementById('comment').value,
        commail: document.getElementById('commail').value,
        comurl: document.getElementById('comurl').value,
        imgcode: document.getElementById('imgcode').value,
        pid: document.getElementById('pid').value,
        resp: 'json',
    });

    try {
        const response = await fetch('https://www.yourdomain.com/index.php?action=addcom', {
            method: 'POST',
            body: params,
        });

        const data = await response.json();

        if (data.code === 1) {
            console.error(data.msg);
        } else if (data.code === 0) {
            console.log(data.data);
        } else {
            console.error('Unknown error');
        }
    } catch (error) {
        console.error(error);
    }
});

```

### User login

* Interface URL: https://www.yourdomain.com/admin/account.php?action=dosignin
* Request method: POST
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|--|-------|
| user | required | username, email |
| pw | Required | Password |
| persist | No | Remember me, stay logged in |
| login_code | No | Image Verification Code |
| resp | Required | Pass the string "json", and the data in json format will be returned |

#### return result (with login success cookie)

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### User Registration

* Interface URL: https://www.yourdomain.com/admin/account.php?action=dosignup
* Request method: POST
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|--|-----|
| mail | Required | Email |
| passwd | required | password |
| repasswd | required | repeat password |
| login_code | No | Image Verification Code |
| mail_code | No | Email Verification Code |
| resp | Required | Pass the string "json", and the data in json format will be returned |

#### return result

```json
{
  "code": 1,
  "msg": "Incorrect email format",
  "data": ""
}
```

## Template settings plugin

The template setting plug-in provides richer setting functions for the template. This plug-in is jointly maintained by emlog official and enthusiast Blue Leaf, please feel free to use it.

https://www.emlog.net/plugin/detail/377

### How to make the template recognized by the plugin?

Put *options.php* in the template directory, the content format is as follows, you can add settings items **arbitrarily**, pay attention to the $options variable and comments:

```php
<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
	'sidebar' => array(
		'type' => 'radio',
		'name' => 'sidebar position',
		'values' => array(
			'left' => 'left',
			'right' => 'right'
		),
		'default' => 'right',
	),
	'sortIcon' => array(
		'type' => 'image',
		'name' => 'category icon settings',
		'values' => array(
			TEMPLATE_URL . 'images/star.png',
		),
		'depend' => 'sort',
		'unsorted' => true,
		'description' => 'Set different small icons for different categories, preferably 20×20',
	),
);
```

### In options.php, what should each element write?

As shown above, in the *$options* array, the key is the id of the setting item, and the value is an array containing several elements. Among them, the type attribute and name attribute are mandatory, name is the name of the setting item, and type is used to specify the type of the setting item. The supported types are as follows:

> - radio: radio buttons
> - checkbox: check button
> - text: text
> - image: image
> - page: page
> - sort: classification
> - tag: tag

1. For all types, the default attribute is used to specify the default value. When default is not specified, the first value in values will be used. If none is specified, a strange default value will be used.
2. For radio and chexkbox, the values attribute is used to set the value and display name of each button.
3. In addition to sort, you can specify depend as sort, which means that this option can set different values ​​according to different categories. When specifying depend as sort, you can choose the unsorted attribute. When it is true, it means that it includes uncategorized. include, defaults to true.
4. For sort and page, the multi attribute can be set to true, indicating multiple selections.
5. The description attribute is optional and used to describe the option.
6. If the type is text, you can set the multi attribute to true to indicate multi-line text, which is the difference between input and textarea. The optional attribute rich is used to support rich text. If this value is set, the editor will be loaded.
7. If type is sort, page or tag, and multiple selection is set, the default value will be empty, otherwise it will be the first value of this type.

### How to call the setting item in the template

The plugin provides a simple method _g($key) to get settings

like:

- Use _g('sidebar') to get the sidebar settings, the value will be 0 or 1,
- Use _g('sortIcon') to get all the settings of the classification icon, an array with the classification id as the key,
- Use _g('sortIcon.1') to get the sortIcon with category id 1 (if it exists). It should be noted that if the type is page, the page id will be obtained; if the type is sort, the category id will be obtained; if the type is tag, the tag name will be obtained.

If no parameters are passed, all setting items will be obtained by using the _g() method. For old template migration, you can use extract(_g()); to replace the original loading option file.

## Common functions

```php
//subContent intercepts the content function of the specified length
//The first parameter: the content to be intercepted
//The second parameter: interception length
//The third parameter: whether to filter the html tags in the content 1 to filter 0 not to filter
//As follows: intercept the first 180 characters of the log content, and filter the html tags
<?php echo subContent($value['log_description'], 180, 1); ?>

```

## Reference demo

The default theme that comes with the emlog system is the best demo, and you can modify it based on this theme to develop your own theme, or refer to some elements and files of this theme.
The directory where the default template is located: content/templates/default

---

--end--