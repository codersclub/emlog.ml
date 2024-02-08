# &#x1f349; Template Development Guide

Emlog can easily replace templates. The template files are located in the content/templates directory. Each template is a separate folder. The folder is named after the English alias of the template. Templates installed through the app store and background upload are saved in this directory.

## Template file and directory description

* css folder: stores all CSS style files required for the template.
* js folder: stores all JS files required for the template.
* images folder: stores LOGO and other image resources required for the template.
* preview.jpg: Template preview displayed in the background template selection interface, 500x300 jpg format.
* header.php: Site header information, generally including page head information, top title, and navigation bar.
* echo_log.php: Article details page, showing the content of a single article.
* log_list.php: Home page, showing the article list.
* footer.php: information at the bottom of the site, displaying copyright information, etc.
* page.php: page, displays customized pages.
* side.php: Sidebar, this file is not necessary if you are making a single-column template.
* module.php: Function module: latest articles, comments, categories, tags, etc.
* 404.php customizes the error page when the 404 page is not found
* pw.php customizes the password input page for encrypted articles. If there is no such file, use the system default style [not required]
* plugins.php is the system call file of the template. After the template is enabled, this file will be automatically loaded by the system. Can be used to implement plug-in-like functionality. 【not necessary】
* options.php template settings configuration file can build richer settings. [not necessary]

## Template engine

emlog does not use any other third-party template engine and directly uses PHP's native syntax tags to embed HTML to generate dynamic pages. This not only reduces the learning burden of developers, but also greatly improves page loading and rendering efficiency.

```php
// embedded variables
<div><?= $value ?></div>

// loop
<?php foreach ($abc as $v) :?>
    <div><?= $v ?></div>
<?php endforeach;?>

// variable verification
<?php if($a == 'abc') :?>
    <div>hello</div>
<?php endif;?>

```

## Public code

### Direct access prohibited

The following line of code exists at the beginning of each PHP file in the template directory. Its function is to prevent the PHP script where the code is located from being directly accessed and executed. It must be retained.

```php
if(!defined('EMLOG_ROOT')) {exit('error!');}
```

or

```php
defined('EMLOG_ROOT') || exit('access denied!');
```

### Reference template file

The following two lines of code are used to call the side.php and footer.php codes in the template folder to the current location of the current file.

```php
require_once View::getView('side');
require_once View::getView('footer');

// View is a template view controller. View::getView('file name', 'file suffix') will return the corresponding file in the current template installation path.
// The second parameter of the getView function is the default parameter. If no value is passed in, the file path will be returned as the .php file suffix by default.
```

## File description

### header.php

Site header information generally includes page head information, top title, and navigation bar.

#### Header information

The content of the opening comment is necessary information for the template. This information will be displayed on the background template management interface and must be filled in completely.

* Template Name: Template name
* Description: Template introduction description
* Version:1.1
* Template Url: https://www.emlog.net/template/detail/982
* Author: Template author name
* Author Url: Author homepage URL

require_once View::getView('module'); // Load template common module.

#### Variables & Constants

| Variables & Constants | Type | Description |
|-------------------|----|------------------------------------------------------------------------------------|
| $site_title       | Variable | Site title (affected by background SEO optimization settings) |
| $site_key         | Variable | Site Keyword |
| $site_description | Variable | Output site browser description (affected by background SEO optimization settings) |
| $blogname         | Variables | Site title |
| $bloginfo         | Variables | Site subtitle |
| BLOG_URL          | Constant | The URL of the site homepage, the output format is https://emlog.net/ |
| TEMPLATE_URL      | Constant | URL of the template folder, used to load css, js and other content in the template. The output is in the form of http://emlog.net/blog/content/templates/default/ |

The above variables and constants can be output in the template in the following way

```php
<?= $page_url ?>
<?= BLOG_URL ?>
```

### footer.php

The information at the bottom of the site displays copyright, filing and other information.

#### Variables & Constants

| Variables, constants  | Type | Description |
|-----------------------|----|-------------|
| $icp                  | Variable | ICP registration number set in the background |
| $footer_info          | Variable | Page bottom information set in the background |
| Option::EMLOG_VERSION | Constant | Current emlog version number |

### log_list.php

Home page template, displaying the article list.

#### Variables & Methods

| Variables, constants, methods | Type | Description |
|-------------------------------------------|----|--------------------------------|
| $value['log_cover'] | Variable | Article cover image URL |
| $value['logid'] | Variable | The id of the current article |
| $value['log_url'] | Variable | Article address URL |
| $value['log_title'] | Variable | Article title |
| date('Y-n-j', $value['date']) | Variable | Article publication time, parameter 'Y-n-j G:i l' is used to define the date format |
| $value['log_description'] | Variable | Article summary (if there is no summary, the full text will be output) |
| $value['comnum'] | Variable | Number of comments on the current article |
| $value['views'] | Variable | Views of the current article |
| editflg($value['logid'],$value['author']) | Variable | Display the "Edit" link when the administrator or author logs in |
| topflg($value['top']) | Variable | Display the top mark, this function is located in the template module.php |
| $page_url | Variable | Display the page turning function of the current list page |
| blog_sort($value['logid']) | Method | Display the category to which the article belongs |
| blog_author($value['author']) | Method | Display the author of the article |
| blog_tag($value['logid']) | Method | Display the tag of the article |

The above variables and methods can be output in the template in the following way

```php
<?= $value['logid'] ?>
<?= blog_author($value['author']) ?>
```

### echo_log.php

Article details page template, displaying the content of a single article.

#### Variables & Methods

| Variables, constants, methods | Type | Description |
|-----------------------------------------------------------------------------|----|--------------------------------|
| $logid | Variable | ID of the current article |
| $log_title | Variable | Article title |
| $log_cover | Variable | Article cover image URL |
| date('Y-n-j', $date) | Variable | Article publication time, parameter 'Y-n-j G:i l' is used to define the date format |
| $log_content | Variable | Article summary (if there is no summary, the full text will be output) |
| $comnum | Variable | Number of comments on the current article |
| $views | Variable | Number of views of the current article |
| $page_url | Variable | Display the page turning function of the current list page |
| topflg($top) | Method | Display top mark |
| blog_tag($logid) | Method | Tag of the article |
| blog_author($author) | Method | The author of the article |
| blog_sort($logid) | Method | The category to which the article belongs |
| editflg($logid,$author) | Method | Displays the "Edit" link when an administrator or author is logged in. |
| neighbor_log($neighborLog) | Method | Output neighboring articles, that is, the previous article and the next article. |
| blog_comments($comments) | Method | Output the list of comments on this article |
| blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark) | Method | Output comment box |

### page.php

page to display a customized page. Variable definitions, etc. are the same as echo_log.php.

### side.php

The sidebar is mainly responsible for outputting the sidebar content based on the background widgets setting information. It is recommended that the code in this file remains unchanged.

### module.php

Template public code, including side widgets, comments, quotes, editing, etc.

This file consists of several functions, which are called by the template file and can be customized with functions to achieve more functions.

For example, when calling emlog cache in a custom function, assuming that user cache information is read, the form is: global $CACHE; $user_cache = $CACHE→readCache('user');

If you need to operate the database, the format is as follows: $DB = MySql::getInstance(); $res = $DB→query($sql);

### 404.php

Template for customizing 404 pages.

### pw.php

Used to customize the password input page for encrypted articles. If there is no such template file, the system default style will be used, which does not affect the normal use of the password input function. Please refer to the default template for template content.

### plugins.php

The system call file of the template. After the template is enabled, the file will be automatically loaded by the system. Can be used to implement plug-in-like functionality.

Sometimes templates also want to customize some functions in the system, including mounting functions at the plug-in's mounting point for function expansion. This file gives the template this ability, so that the template does not need to install additional supporting plug-ins. Richer features.

```php
<?php
/**
 * Template system call file
 * After the template is enabled, this file will be automatically loaded by the system. Can be used to implement plug-in-like functionality.
 */

if (!defined('EMLOG_ROOT')) {
    exit('error!');
}

/* eg:

function sameFunc() {
    echo "xxxx";
}

addAction('adm_head', 'sameFunc');

*/
```

### options.php

Configuration file for template settings, see the Open Template Settings section below.

## Custom template

Articles, categories, and pages: support custom templates. When creating categories, pages, and articles, users can choose custom templates supported by template themes to achieve richer page display.

### Naming rules for custom template files

* Category: The file name starts with log_list_, such as: log_list_abc.php
* Article: The file name starts with echo_log_, such as: echo_log_abc.php
* Page: The file name starts with page_, such as: page_abc.php

### Comment rules for custom template files

```php
<?php
/*@name The name of the custom template*/

```

The annotation content will appear in the drop-down selection box as the name of the custom template. Custom templates that meet the above specifications will appear in the drop-down selection box in the adding category and page creation scenarios to facilitate user selection.

## Template mount point

The following code format is the plug-in mounting point in the template. Refer to the default template. Be careful to keep it and do not delete it.

```php
<?php doAction('xxx') ?>
```

!> Note: Be sure to refer to the default template when developing templates to retain the following mount points to facilitate compatibility with other plug-ins.

| Mount point | Owned file | Change point description | Example |
|----------------------------------|------------- -|-----------------------------|----|
| doAction('index_head') | header.php | The mount point in the site head tag, used to mount js or css style files |
| doAction('index_footer') | footer.php | The mounting point at the bottom of the footer is used to mount the bottom information display plug-in |
| doAction('index_loglist_top') | log_list.php | The mount point at the top of the homepage article list, it is recommended to add it below the homepage navigation bar |
| doAction('log_related', $logData) | echo_log.php | Related article mounting point, added between the article content and comments |

## Template settings

> The template supports custom setting functions, providing richer setting functions for the template.

Place the `options.php` file in the template directory. The content format is as follows. You can add setting items arbitrarily. The opening comments cannot be deleted or changed. Please refer to the following:

```php
<?php
/*@support tpl_options*/

!defined('EMLOG_ROOT') && exit('access denied!');

$options = [
    /** This item must exist */
    'TplOptionsNavi' => [
        'type' => 'radio',
        'name' => 'Define setting item tab name',
        'values' => [
            'tpl-head' => 'Head settings',
        ],
        'icons' => array(
            'tpl-head' => 'ri-home-line',
        ),
        'description' => '<p>Template: Chen <br>Welcome to use this simple template, currently only supports setting the head logo</p>'
    ],
    'sale_qq' => [
        'labels' => 'tpl-head',
        'type' => 'text',
        'name' => 'QQ Consulting',
      'multi' => 'true',
        'values' => ['12345678'],
    ],
    'logotype' => [
        'labels' => 'tpl-head',
        'type' => 'radio',
        'name' => 'LOGO display mode',
        'values' => [
            '1' => 'Text',
            '0' => 'Picture',
        ],
        'default' => '1',
    ],
    'logoimg' => [
        'labels' => 'tpl-head',
        'type' => 'image',
        'name' => 'LOGO upload',
        'values' => [
            TEMPLATE_URL . 'images/logo.png',
        ],
        'description' => 'Upload a LOGO image. '
    ],
    'index_sort_list' => [
        'labels' => 'modules',
        'type' => 'sort',
        'name' => 'Category multiple selection',
        'multi' => 'true',
        'description' => ''
    ],
    'index_page_list' => [
        'labels' => 'modules',
        'type' => 'page',
        'name' => 'Page multiple selection',
        'multi' => 'true',
        'description' => ''
    ],
     'styles-lazyopts' => [
        'labels' => 'styles',
        'type' => 'checkbox',
        'name' => 'Image asynchronous lazy loading',
        'values' => [
            'view' => 'Views',
            'comnum' => 'Number of comments',
            'agree' => 'Number of likes',
        ],
        'default' => array('view', 'comnum'),
        'description' => '',
    ],
    'index_tag' => [
        'labels' => 'tpl-head',
        'type' => 'checkon',
        'name' => 'Whether the label list is displayed on the home page',
        'values' => ['1' => 'on'],
        'default' => '1',
        'description' => 'Click the setting switch, blue is on. '
    ],
    'index_post_list' => [
        'labels' => 'tpl-head',
        'type' => 'select',
        'name' => 'Search article',
        'new' => 'NEW',
        'pattern' => 'post',
        'description' => ''
    ],
    'index_cate_list' => [
        'labels' => 'tpl-head',
        'type' => 'select',
        'name' => 'Search category',
        'new' => 'NEW',
        'pattern' => 'cate',
        'description' => ''
    ],
    'index_page_list' => [
        'labels' => 'tpl-head',
        'type' => 'select',
        'name' => 'Search page',
        'new' => 'NEW',
        'pattern' => 'page',
        'description' => ''
    ],
    'index_block_list' => [
        'labels' => 'tpl-head',
        'type' => 'block',
        'name' => 'Drag multiple content blocks',
        'new' => 'NEW',
        'description' => ''
    ],
    'index-image_list' => [
        'labels' => 'tpl-head',
        'type' => 'block',
        'name' => 'Drag multiple image content blocks',
        'new' => 'NEW',
        'pattern' => 'image',
        'description' => ''
    ],
    'index-num_text' => [
        'labels' => 'tpl-head',
        'type' => 'text',
        'name' => 'Number text box',
        'new' => 'NEW',
        'pattern' => 'num',
        'unit' => 'second',
        'max' => '10',
        'min' => '1',
        'description' => ''
    ],
    'index-date_text' => [
        'labels' => 'tpl-head',
        'type' => 'text',
        'name' => 'Date text box',
        'new' => 'NEW',
        'date' => 'true',
        'description' => ''
    ],
];
```

### In options.php, what should be written in each element?

As shown above, in the *$options* array, the key is the id of the setting item, and the value is an array containing several elements. The type attribute and name attribute are required. name is the name of the setting item, and type is used to specify the type of the setting item. The supported types are as follows:

- radio: radio button
- checkbox: check button
- checkon: switch
- text: text
- image: picture
- page: page
- sort: classification
- tag: tag
- select: search selection
- block: multiple content blocks

1. For all types, the default attribute is used to specify the default value. When default is not specified, the first value in values is used. If neither is specified, a strange default value will be used.
2. For radio and chexkbox types, the values attribute is used to set the value and display name of each button.
3. Except for sort, you can specify depend as sort, which means that this option can set different values according to different categories. When specifying depend as sort, the unsorted attribute can be optional. When it is true, it means that uncategorized is included, and when it is false, it does not. Include, defaults to true.
4. Except for tag, you can specify depend as tag, which means that this option can set different values according to different tags, such as adding an icon to the tag.
5. Sort and page can set the multi attribute to true to indicate multiple selections.
6. (Optional) The description attribute is used to describe this option.
7. If type is text, you can set the multi attribute to true to indicate multi-line text, which is the difference between input and textarea. The optional attribute rich is used to support rich text. If this value is set, the editor will be loaded.
8.
If you want to use a numeric text box and the type is still text, you can set the pattern attribute to num. Max, min, and unit can be specified, that is, the maximum limit value, the minimum limit value, and the quantity unit. The minimum or maximum value can be set independently. For example, only the minimum value is set, the maximum value does not limit the input. The unit of measurement is displayed on the far right side of the text box.
9. If you use a date text box and the type is still text, you can set the date attribute to true.
10. If type is sort, page or tag, and multiple selection is set, the default value will be empty, otherwise it will be the first value of this type.
11. For type **select**, the pattern attribute is **required** and can be filled in: (1). post (2).cate (3)
    .page. Correspond to articles, categories, and pages respectively. This function module may query slowly when the data is very large. The content of the array obtained using the built-in function is the ID of the set type, for example, a set of article gids is obtained.
12. (Optional) The above **all types** support the *new* attribute, that is, a reminder logo will be displayed after the setting item name, and the effect can be seen in the default template. Fill in the value of this attribute freely, such as: NEW, new, etc. If it is empty or not filled in, it will not be displayed.
13. For type **block**, you can optionally set the pattern attribute. If the pattern attribute is not set, the default content is text. You can set the multi attribute to true to indicate multiple lines of text. Set the pattern attribute to image to use multiple image content blocks.
14. For how to write setting items, please refer to the code example at the beginning of the document.

### Add icon to settings menu

The icons array can be added to the TplOptionsNavi item, and an icon can be added before the parent setting name of the sidebar menu for your theme. The key names of the icons array are consistent with the TplOptionsNavi item values array. Using [Remixicon](https://remixicon.com/)
, go to the icon site to find the appropriate icon, and copy the attribute value in its class, for example class="ri-home-line"
, just copy ri-home-line. In addition, you need to add the following code to the template plugins.php to introduce the icon CSS.

```php
function optionIconFont() {
    echo sprintf('<link rel="stylesheet" href="%s">', 'https://cdn.bootcdn.net/ajax/libs/remixicon/3.5.0/remixicon.min.css?ver=' . Option::EMLOG_VERSION_TIMESTAMP);
}
addAction('adm_head', 'optionIconFont');
```

### How to call setting items in the template

The plug-in provides simple methods _g($key) or _em($key) to obtain settings, taking _g($key) as an example:

- Use _g('sidebar') to get the sidebar settings, the value obtained will be 0 or 1,
- Use _g('sortIcon') to get all the settings of the category icon, with the category id as the key array,
- Use _g('sortIcon.1') to get the sortIcon with category id 1 (if it exists). It should be noted that for the type of page, the page id will be obtained, for the type of sort, the category id will be obtained, and for the type of tag, the tag name will be obtained.

If no parameters are passed, all setting items will be obtained using the _g() method. For old templates migrated, you can use extract(_g()); to replace the original loaded option file.

An example is as follows: Configuration of site logo from default theme settings

```php

<?php if (_g('logotype') == 1): ?>
   <a class="blog-header-title" href="<?= BLOG_URL ?>"><?= $blogname ?></a>
   <div class="blog-header-subtitle subtitle-overflow" title="<?= $bloginfo ?>"><?= $bloginfo ?></div>
<?php else: ?>
   <a href="<?php echo BLOG_URL; ?>" title="<?php echo $bloginfo; ?>"><img src="<?php echo _g('logoimg'); ?>" alt="<?php echo $blogname; ?>"/></a>
<?php endif; ?>
```

If you need to obtain the data of multiple content blocks, provide the _getBlock($key, $type) method to obtain:

- $key is the same as the parameter provided by the _g() method
- $type is the data type of multi-content block, which is divided into title and content. This parameter can be omitted by default, and content will be obtained by default. title is the title filled in by the multi-content block. Content is the content. Use the built-in function to obtain the text of the multi-content block text type or the image URL set by the multi-content block image type.
- The return value type is array

Use Cases:

```php
_getBlock('image-block', 'content')
```

## Constants that can be used directly

| Variables, constants  | Type | Description |
|-----------------------|----|---------------------------------------------------------------|
| Option::EMLOG_VERSION | Constant | Get the current emlog version number |
| ROLE | Constant | Current user role (user group): admin administrator, writer registered user, visitor guest |
| ROLE_ADMIN | Constant | admin Administrator |
| ROLE_WRITER | Constant | writer registered user |
| ROLE_VISITOR | Constant | visitor visitor |
| UID | Constant | Current user UID |
| BLOG_URL | Constant | Site URL |
| ISLOGIN | Constant | Whether to log in, true to log in, false to not log in |
| TEMPLATE_URL | Constant | URL of the current template eg: http://localhost:8080/content/templates/default/ |
| TEMPLATE_PATH | Constant | The absolute path of the current template eg:/www/emlog/content/templates/default/ |

The above constants can be used in templates in the following ways

```php
// Output the current site URL
<?= BLOG_URL ?>

```

## Obtain common configuration information

| Configuration items | Get examples |
|----------------------|---------------------------------|
| Site title | Option::get('blogname') |
| Site subtitle | Option::get('bloginfo') |
| Site meta information: title | Option::get('site_title') |
| Site meta information: description | Option::get('site_description') |
| Site meta information: keyword | Option::get('site_key') |
| Site URL | Option::get('blogurl') |

Usage example:

```php
// Output the current site name
<?= Option::get('blogname')?>

```

## Common methods & functions

Methods and functions that can be used directly: [General methods and functions] (develop_func.md)

## Asynchronous request

The pro version supports asynchronous ajax requests and returns information in json format, making it easier for users to create comments, pop-up logins, registrations, password retrieval and other more friendly front-end interactive experiences.

### Post a comment

- [See API documentation for details: Post comments](api.md)

### User login

- [See API documentation for details: User login](api.md)

### User registration

- [See API documentation for details: User Registration](api.md)

### Retrieve password

- [See API documentation for details: Retrieve password](api.md)

## Reference demo

The default theme that comes with the emlog system is the best demo. You can modify it to develop your own theme, or refer to some elements and files of the theme.
The directory where the default template is located: content/templates/default

## Open source release

If the template you develop is open source on Github, please add topic to the repository: [emlog-template](https://github.com/topics/emlog-template)

## Publish to app store

The produced theme can be packaged and published to the official app store after testing.

1. Packaging: Go to the content/templates directory, find the template folder, directly use the zip compression tool to package the folder (be careful not to go into the folder to package), and name the packaged compressed package as:
   template_English_alias.zip, such as default.zip
2. Publish: Log in to the official website emlog.net - My - Application Development - Publish Template, fill in the necessary information according to the prompts, and then publish it, waiting for review.

---

--end--