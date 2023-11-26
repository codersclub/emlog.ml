## Emlog Pro template options plug-in usage documentation

> The template supports custom setting functions, providing richer setting functions for the template.

Place the `options.php` file in the template directory. The content format is as follows. You can add setting items arbitrarily. The opening comments cannot be deleted or changed. Please refer to the following:

```php
<?php
/*@support tpl_options*/

!defined('EMLOG_ROOT') && exit('access denied!');

$options = [
    /** 此项必需存在 */
    'TplOptionsNavi'   => [
        'type'         => 'radio',
        'name'         => 'Define setting item tab name',
        'values'       => [
            'tpl-head' => 'Head settings',
        ],
        'icons' => array(
            'tpl-head' => 'ri-home-line',
        ),
        'description'  => '<p>Template: Chen <br>Welcome to use this simple template, currently only supports setting the head logo</p>'
    ],
    'sale_qq'          => [
        'labels'       => 'tpl-head',
        'type'         => 'text',
        'name'         => 'QQ Consulting',
      	'multi'        => 'true',
        'values'       => ['12345678'],
    ],
    'logotype'         => [
        'labels'       => 'tpl-head',
        'type'         => 'radio',
        'name'         => 'LOGO display mode',
        'values'       => [
            '1' => 'Text',
            '0' => 'Picture',
        ],
        'default'      => '1',
    ],
    'logoimg'          => [
        'labels'       => 'tpl-head',
        'type'         => 'image',
        'name'         => 'LOGO upload',
        'values'       => [
            TEMPLATE_URL . 'images/logo.png',
        ],
        'description'  => 'Upload a LOGO image. '
    ],
    'index_sort_list' => [
        'labels'       => 'modules',
        'type'         => 'sort',
        'name'         => 'Category multiple selection',
        'multi'        => 'true',
        'description'  => ''
    ],
    'index_page_list' => [
        'labels'       => 'modules',
        'type'         => 'page',
        'name'         => 'Page multiple selection',
        'multi'        => 'true',
        'description'  => ''
    ],
     'styles-lazyopts' => [
        'labels'       => 'styles',
        'type'         => 'checkbox',
        'name'         => 'Image asynchronous lazy loading',
        'values'       => [
            'view'   => 'Views',
            'comnum' => 'Number of comments',
            'agree'  => 'Number of likes',
        ],
        'default' => array('view', 'comnum'),
        'description' => '',
    ],
    'index_tag'        => [
        'labels'       => 'tpl-head',
        'type'         => 'checkon',
        'name'         => 'Whether the label list is displayed on the home page',
        'values'       => ['1' => 'on'],
        'default'      => '1',
        'description'  => 'Click the setting switch, blue is on. '
    ],
    'index_post_list'  => [
        'labels'       => 'tpl-head',
        'type'         => 'select',
        'name'         => 'Search article',
        'new'          => 'NEW',
        'pattern'      => 'post',
        'description'  => ''
    ],
    'index_cate_list'  => [
        'labels'       => 'tpl-head',
        'type'         => 'select',
        'name'         => 'Search category',
        'new'          => 'NEW',
        'pattern'      => 'cate',
        'description'  => ''
    ],
    'index_page_list'  => [
        'labels'       => 'tpl-head',
        'type'         => 'select',
        'name'         => 'Search page',
        'new'          => 'NEW',
        'pattern'      => 'page',
        'description'  => ''
    ],
    'index_block_list' => [
        'labels'       => 'tpl-head',
        'type'         => 'block',
        'name'         => 'Drag multiple content blocks',
        'new'          =>  'NEW',
        'description'  => ''
    ],
    'index-image_list' => [
        'labels'       => 'tpl-head',
        'type'         => 'block',
        'name'         => 'Drag multiple image content blocks',
        'new'          => 'NEW',
        'pattern'      => 'image',
        'description'  => ''
    ],
    'index-num_text'   => [
        'labels'       => 'tpl-head',
        'type'         => 'text',
        'name'         => 'Number text box',
        'new'          =>  'NEW',
        'pattern'      => 'num',
        'unit'         => 'second',
        'max'          => '10',
        'min'          => '1',
        'description'  => ''
    ],
];
```

### In options.php, what should be written in each element?

As shown above, in the *$options* array, the key is the id of the setting item, and the value is an array containing several elements. The type attribute and name attribute are required. name is the name of the setting item, and type is used to specify the type of the setting item. The supported types are as follows:

- radio: radio button
- checkbox: check box
- checkon: switch
- text: text
- image: picture
- page: page
- sort: category
- tag: tag
- select: search selection
- block: multi content block

1. For all types, the default attribute is used to specify the default value. When default is not specified, the first value in values is used. If neither is specified, a strange default value will be used.
2. For radio and chexkbox types, the values attribute is used to set the value and display name of each button.
3. Except for sort, you can specify depend as sort, which means that this option can set different values according to different categories. When specifying depend as sort, the unsorted attribute can be optional. When it is true, it means that unclassified is included, and when it is false, it is not. Include, defaults to true.
4. Sort and page can set the multi attribute to true to indicate multiple selections.
5. (Optional) The description attribute is used to describe the option.
6. If type is text, you can set the multi attribute to true to indicate multi-line text, which is the difference between input and textarea. The optional attribute rich is used to support rich text. If this value is set, the editor will be loaded.
7. If you want to use a numeric text box and the type is still text, you can set the pattern attribute to num. Max, min, and unit can be specified, that is, the maximum limit value, the minimum limit value, and the quantity unit. The minimum or maximum value can be set independently. For example, only the minimum value is set, the maximum value does not limit the input. The unit of measurement is displayed on the far right side of the text box.
8. If type is sort, page or tag, and multiple selection is set, the default value will be empty, otherwise it will be the first value of this type.
9. For type **select**, the pattern attribute is **required** and can be filled in: (1). post (2).cate (3)
   .page. Correspond to articles, categories, and pages respectively. This function module may query slowly when the data is very large. The content of the array obtained using the built-in function is the ID of the set type, for example, a set of article gids is obtained.
10. (Optional) The above **all types** support the *new* attribute, that is, a reminder logo will be displayed after the setting item name, and the effect can be seen in the default template. Fill in the attribute value freely, such as: NEW, new, etc. If it is empty or not filled in, it will not be displayed.
11. For type **block**, you can optionally set the pattern attribute. If the pattern attribute is not set, the default content will be text. Set the pattern attribute to image to use multiple image content blocks.
12. For how to write setting items, please refer to the code example at the beginning of the document.


### Add icon to settings menu

The icons array can be added to the TplOptionsNavi item, and an icon can be added before the parent setting name of the sidebar menu for your theme. The key names of the icons array are consistent with the TplOptionsNavi item values array. I am using [Remixicon](https://remixicon.com/). Go to the icon site to find the appropriate icon and copy the attribute value in its class. For example, class="ri-home-line", just copy ri -home-line is enough. In addition, you need to add the following code to the template plugins.php to introduce the icon CSS.

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

If no parameters are passed, all settings will be obtained using the _g() method. For old templates migrated, you can use extract(_g()); to replace the original loaded option file.

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

