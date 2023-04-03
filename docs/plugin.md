# &#x1f353; Plugin Development Guide

Emlog supports the plug-in mechanism, so that developers can easily add the functions they need to the system.

## Implementation principle

During the whole operation of Emlog, we set some action events. When encountering these events, Emlog will automatically call all the plug-in functions bound to the event by the plug-in, so as to realize the function of the plug-in.

## Mount point function: doAction

```php
//This is Emlog adding article event, which will be triggered after adding an article, and the parameter is the $id number of the new article. Then the system will automatically pass $id into each hook function bound to this event.
doAction('save_log', $id);
```

This function is built into the Emlog core code, which is the legendary plug-in mount point. This function has a fixed parameter: $hook, $hook is the name of the executed action, and other parameters can be passed in sequentially when calling this function, and the function will be automatically sent to the hook function

## Add event call method Function: addAction

This function is a function used by the plug-in to mount the method to the mount point, and is written in the plug-in file. The function has two parameters: $hook, $actionFunc.

* $hook mount point name
* $actionFunc is the name of the function mounted on the mount point

```php
addAction('save_log', 'plugin_addlog');
```

In the above example, the plugin_addlog function is bound to the save_log event of the system. As long as the system executes to the save_log mount point, the plugin_addlog function will be called.

## Development specification

### File system

- Plugin directory: /content/plugins/
- Only plugins with "plugin-dir/plugin-name/plugin-name.php" directory structure are recognized.

For example: the default tips plug-in, its folder name is `tips`, and the program file name is `tips.php`

### Activation and deactivation

On the plug-in management page of the Emlog background, click the status button behind each plug-in to activate/deactivate the plug-in. And it will trigger activation and shutdown callback functions to complete some initialization work during activation and shutdown.

If the plugin needs it, you can add a file to the plugin: pluginname_callback.php , which is used to add activation and deletion callback functions:

* callback_init() is only called when the plugin is activated
* callback_rm() is only called when the plugin is removed and removed

For example:

tips_callback.php

```php
<?php
!defined('EMLOG_ROOT') && exit('access deined!');

// Called when the plugin is activated, the user can initialize the configuration
function callback_init() {
	$plugin_storage = Storage::getInstance('plugin_name');
	$r = $plugin_storage->getValue('key');
	if (empty($r)) {
		$default_data = [
			'ip'      => [],
			'time'    => [],
			'attempt' => [],
		];
		$plugin_storage->setValue('temp', json_encode($default_data), 'string');
	}
}

// Called when the plugin is deleted and disassembled, it can be used for data cleaning
function callback_rm() {
	$plugin_storage = Storage::getInstance('plugin_name'); //Use the English name of the plugin to initialize a storage instance
	$ak = $plugin_storage->deleteAllName('YES'); //For delete all data created by this plugin, please pass in uppercase "YES" to confirm deletion.
}
```

### Foreground display page

If you want the plugin to output a page in the foreground, you can add a file to the plugin: pluginname_show.php
At this time, the foreground display address of the plugin is: https://youdomain.com/?plugin=pluginname
This will be displayed on the page where the plugin is built in the pluginname_show.php file.

### Background configuration page

If you want the plugin to output a setting page in the background, you can add a file to the plugin: pluginname_setting.php
At this time, the background configuration address of the plugin is: https://youdomain.com/admin/plugin.php?plugin=pluginname

### Naming rules

* The `pluginname` (plugin name) mentioned above should be composed of lowercase English letters, numbers, underscores (_), and dashes (-), and can only start with a letter
* Function/Variable Naming Standard for all functions/variables of plugins are named with "plugin_name_" as a prefix

For example: $emlogplugin_var, emlogplugin_dosomething() use this naming method to avoid conflicts with functions or variables of other plugins.

### Plugin file name

The name of the plugin main file must be the same as the name of the folder where the plugin is located, for example:

```
emlogplugin/
      emlogplugin.php
      emlogplugin_setting.php
```

### Safety

Add a restriction statement at the beginning of the plug-in file. The plug-in function file needs to be added:

```php
!defined('EMLOG_ROOT') && exit('access deined!');
```

If this statement is not added, then directly accessing the program php file of the plug-in will reveal the physical path of the blog, posing a threat to the security of the blog.

If your plug-in needs to receive some parameters, please be sure to strictly filter the data of each variable. For example: get an int parameter from the outside, $id = $_GET['id']; it is not safe to write like this, you need to change For: $id = intval($_GET['id']);

If it is a character parameter, $action = $_GET['action']; It is not safe to write like this, it should be changed to: $action = addslashes($_GET['action']);

## Plugin data storage

If the plug-in needs to save settings and other information, it can use the `Storage` class provided by the system to complete the storage and reading of data, and the data will be stored in the storage table of the MySQL database.

### Data input

```php
	$plugin_storage = Storage::getInstance('plugin_name');//Use the English name of the plugin to initialize a storage instance
	$plugin_storage->setValue('key', 'xxx'); // Set the value of the key to xxx, which can store data with a maximum length of 65,535 characters.
```

#### Set the write data type

Data storage also supports the third parameter to specify the type of stored data, and the corresponding data type will be returned when reading. Currently, 4 types are supported, and the default is string type.

- string // return string when read
- number // return float type when read
- boolean // return boolean type when read
- array // return array

For example:

```php
	$plugin_storage = Storage::getInstance('plugin_name');
	$data = ['name' => 'tom', 'age' => 19];
	$plugin_storage->setValue('key', $data, 'array'); //Stored as an array type, so that the array will be serialized and stored in the database, and will be automatically deserialized when read.
```

### Read data

```php
	$plugin_storage = Storage::getInstance('plugin_name'); //Use the English name of the plugin to initialize a storage instance
	$ak = $plugin_storage->getValue('key'); // Read key value

```

### Clean up and delete data

```php
	$plugin_storage = Storage::getInstance('plugin_name'); //Use the English name of the plugin to initialize a storage instance
	$ak = $plugin_storage->deleteName('key') // Delete a row of data named as `key` created by this plugin
	$ak = $plugin_storage->deleteAllName('YES'); //Delete all data created by this plugin, please pass in uppercase "YES" to confirm deletion, generally used for plugin delete callback function.
```

## Mount point type

### 1. Plug-in mount

* Execution principle: sequentially execute the functions hung on the hook, and support multiple parameters
* Applicable scenarios: Insert specified content at the mount point, or perform certain actions.

```php
// Mount point name: adm_main_top
doAction('adm_main_top');
```

```php
// Plug-in development example: mount the `tips` function at the above mount point "adm_main_top", and insert a sentence in the management background.
addAction('adm_main_top', 'tips');
function tips() {
	echo "<div>Hello World</div>";
}
```

If a mount point needs with parameters, the parameters will be passed to the function mounted on it in order as the following example:

```php
// Mount point name: `save_log`, the mount point to save the article, with the parameter `$blogid`
doAction('save_log', $blogid);
```

```php
// Plug-in development example: mount the function `test_foo` to the above `save_log` mount point, and receive the passed first parameter `$blologid`
addAction('save_log', 'test_foo');
function test_foo($blogid) {
   
}
```

#### List of mount points (plug-in mount)

| Mount point | In file | Description |
|-----------------------------------------------|----------------------------------------|-------------------------------------|
| doAction('adm_main_top')	| admin/views/header.php | The top area of the background homepage is expanded, and the official tip plugin uses this mount point |
| doAction('adm_head')		| admin/views/header.php | Background header extension: can be used to add background css styles, load js, etc. |
| doAction('adm_menu')		| admin/views/header.php | Backstage sidebar first-level menu, only visible to the administrator, used for a separate page of the plugin. |
| doAction('user_menu')		| admin/views/header.php | Backstage sidebar first-level menu, only visible to registered users, used for a separate page of the plugin. |
| doAction('adm_menu_ext')	| admin/views/header.php | background sideThe sidebar expands the secondary menu for plugin individual pages. |
| doAction('save_log', $blogid）	| admin/article_save.php | Add new articles, modify article extension points |
| doAction('del_log', $key)	| admin/article.php | Delete article action extension point |
| doAction('adm_writelog_head', $key) | admin/article_write.php | Can add extended content in the upper part of the editor |
| doAction('comment_post')	| ./index.php | Post comment extension point (before writing a comment). Can be used for comment spam prevention |
| doAction('comment_saved’)	| include/model/comment_model.php | Post a comment extension point (after writing a comment). Follow-up actions for successful posting of comments, such as sending notification emails |
| doAction('log_related',$logData) | content/templates/default/echo_log.php | Read article page extension point, used to add article related content |
| doAction('index_head')	| Content/templates/default/header.php | Foreground header extension: can be used to add front-end css styles, load js, etc. |
| doAction('index_footer')	| content/templates/default/footer.php | extension point at the bottom of the home page |
| doAction('comment_reply', $commentId, $reply) | admin/comment.php | Reply to comment extension point |
| doAction('data_prebakup')	| admin/data.php | Extended backup database page, which can back up the tables added by the plugin |
| doAction('rss_display')	| rss.php | Rss output extension |
| doAction('attach_upload')	| include/lib/common.php | Extend attachment upload, such as adding image watermark effects, etc. |
| doAction('adm_comment_display') | admin/views/comment.php | Background comment display extension, which can be used to query the commenter's ip location |
| doAction('index_loglist_top')	| content/templates/default/log_list.php | The top extension point of the article list, such as displaying announcements, etc. |
| doAction('adm_footer')	| admin/views/footer.php | Background bottom extension: can be used to increase background js, etc. |
| doAction('adm_main_content')	| admin/views/index.php | Admin background home page information module extension |
| doAction('user_main_content')	| admin/views/index_user.php | Registered user background home page information module extension |
| doAction('login_ext')		| admin/views/signin.php | Background login page extension: can be used to add third-party login buttons such as QQ login |

### 2. Single takeover mount

* Execution principle: Execute the first function hung on the hook, execute only once, receive input input, and modify the incoming variable $ret)
* Applicable scenario: replace the core function, such as taking over the core file upload function, and changing the local upload to the cloud upload

```php
// Mount point name: upload_media, upload file mount point, with parameters $attach, $ret
doOnceAction('upload_media', $attach, $ret);
```

```php
// Plug-in development example: mount the function upload2qiniu to the upload_media mount point
addAction('upload_media', 'upload2qiniu');

function upload2qiniu($attach, &$result) {

}
```

#### Mount point list (single takeover mount)

| mount point | in file | description |
|------------------------------------------------------|------------------------|------------------------|
| doOnceAction('upload_media', $attach, $ret); | admin/media.php | Resource file upload mount point, which can be used for cloud storage plug-in development |
| doOnceAction('get_Gravatar', $email, $gravatar_url); | include/lib/common.php | Avatar mount point for commenters, which can be used to change the way the avatar is generated |

### 3. Take-over mount in turn

* Execution principle: Execute all functions hung on the hook, the previous execution result is used as the next input, and the value of the second variable passed in will be modified.
* Applicable scenario: modify the specified content, eg: different plug-ins modify and replace the content of the article.

```php
// Mount point name: article_content_echo, article content display mount point, with parameters $log_content, $log_content
// The first parameter $logData: Enter the original article data, the array structure includes title, content, article id and other information
// The second parameter $logData: The article data modified by the plug-in, complete the overwriting and replacement of content variables.
doMultiAction('article_content_echo', $logData, $logData);
```

#### List of mount points (rotate takeover mount)

| mount point | file in | description |
|--------------------------------------------------------------------|---------------------------------------|---------------------|
| doMultiAction('article_content_echo', $log_content, $log_content); | include/controller/log_controller.php | Article content input mount point, which can be used for article content replacement |

## Reference demo

The tips plug-in that comes with the Emlog system is also an official plug-in demonstration demo, which can be modified based on this plug-in to develop your own plug-in.
The directory where the tips plugin is located: content/plugins/tips

---

--end--