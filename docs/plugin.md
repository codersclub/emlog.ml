# &#x1f353; Plugin Development Guide

Emlog supports the plug-in mechanism, so that developers can easily add the functions they need to the system.

## Implementation principle

During the whole operation of Emlog, we set some action events. When encountering these events, Emlog will automatically call all the plug-in functions bound to the event by the plug-in, so as to realize the function of the plug-in.

## Mount point function: doAction

```php
//This is Emlog adding article event, which will be triggered after adding an article, and the parameter is the $id number of the new article. Then the system will automatically pass $id into each hook function bound to this event.
doAction('save_log', $id);
```

This function is built into the emlog core code and is the legendary plug-in mounting point. This function has a fixed parameter: $hook, $hook is the name of the action to be performed,
other parameters can be passed in sequentially when calling this function, and the function will automatically send it to the hook function.

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

The comment content at the beginning of the tips.php file is the necessary information for the plug-in. This information will be displayed in the background plug-in management interface, so be sure to fill it out completely.

```php
<?php
/*
Plugin Name: Tips
Version: 3.0
Plugin URL: https://www.emlog.net/plugin/detail/xxx
Description: Display a usage tip on the backend homepage, which can also be used as a demo for plug-in development.
Author: emlog
Author URL: https://www.emlog.net
*/
```

### Event callbacks

In the plug-in management page in Admin CP, users can enable, disable, delete and update plug-ins. Some of these operations will trigger corresponding callback functions.
Developers can add a file to the plug-in: `pluginname_callback.php` to define callback functions for specific events to implement plug-in initialization, plug-in data cleaning, data structure update and other operations.

| Event         | Callback function |
|---------------|-------------------|
| Start plug-in | callback_init()   |
| Delete plugin | callback_rm()     |
| Update plugin | callback_up()     |

For example:

tips_callback.php

```php
<?php
!defined('EMLOG_ROOT') && exit('access denied!');

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

// Called when the plug-in is updated and can be used for database changes, etc.
function callback_up() {
    ...
}
```

#### &#x2618; Green plug-in

Use the event callback mechanism to create green plug-ins. The so-called green plug-ins must do the following:

1. Do not modify, add, or delete core data table fields during startup and use of the plug-in.
2. When installing plug-ins, you do not need to add additional custom mount points for the plug-in. Officially reserved mount points are used (some themes lack mount points, and users can be guided to add official mount points).
3. When deleting a plug-in, all data of the plug-in will be cleared, including self-built database tables and configuration information.

### Plug-in front-end display page

If you want the plugin to output a page in the foreground, you can add a file to the plugin: pluginname_show.php
At this time, the plugin foreground display URL is: https://yourdomain/?plugin=pluginname or https://yourdomain/plugin/pluginname (if the pseudo-static rules enabled)
In this way, the front-end display page of the plug-in can be built in the pluginname_show.php file.

### Plug-in background settings page (visible only to administrators)

If you want the plugin to have a settings page in the background, you can:

1. Add the file in the plugin: pluginname_setting.php
2. The file should contain a function named plugin_setting_view, which can output the setting content.
   At this time, the background configuration address of the plug-in is: https://yourdomain/admin/plugin.php?plugin=pluginname

### Plug-in backend function page (visible to all users)

If you want the plug-in to have a functional page in the background, you can:

1. Add the file in the plugin: pluginname_user.php
2. The file must contain a function named plugin_user_view, which can output functional content
    At this time, the background function address of the plug-in is: https://yourdomain/admin/plugin_user.php?plugin=pluginname

This page can be used to build some background functions for ordinary registered users. For example, the article collection plug-in uses this feature.

### Naming rules

* The pluginname mentioned above should be composed of lowercase English letters, numbers, underscores (_), and dashes (-), and can only start with letters.
* Function/variable naming standards All functions/variables of the plug-in are named with "plug-in name_" as the prefix

For example: $emlogplugin_var, emlogplugin_dosomething() Using this naming method can avoid conflicts with functions or variables of other plug-ins.

### Plug-in file name

- It is recommended to use a custom prefix when naming plug-in files to avoid conflicts with other plug-ins, such as: myprefix_tips, where myprefix_ is a custom prefix.
- The name of the plug-in main file must be the same as the name of the folder where the plug-in is located, such as:

```
myprefix_tips/
      myprefix_tips.php
      myprefix_tips_setting.php
      myprefix_tips_callback.php
```

### Safety

Add a restriction statement at the beginning of the plug-in file. The plug-in function file needs to add:

```php
!defined('EMLOG_ROOT') && exit('access denied!');
```

If this statement is not added, direct access to the plug-in program file php will expose the physical path of the blog, posing a threat to the security of the blog.

If your plug-in needs to receive some parameters, be sure to strictly filter the data of each variable. For example: Get an external int parameter, $id = $_GET['id'];
It is unsafe to write this way. Change it to: $id = intval($_GET['id']);

If it is a character parameter, $action = $_GET['action']; is also unsafe to write like this. Change it to: $action = addslashes($_GET['action']);

## Plug-in data storage (1): Storage

If the plug-in needs to save settings and other information, it can use the Storage class provided by the system to complete the storage and reading of data. The data will be stored in the storage table of the MySQL database.
This storage method is suitable for storing key-value type key-value pair data, such as plug-in settings, etc.

### Data input

```php
	$plugin_storage = Storage::getInstance('plugin_name');//Use the English name of the plugin to initialize a storage instance
	$plugin_storage->setValue('key', 'xxx'); // Set the value of the key to xxx, which can store data with a maximum length of 65,535 characters.
```

Set the write data type: The data storage also supports the third parameter to specify the type of stored data. When reading, the corresponding data type will be returned. Currently, 4 types are supported, and the default is string type.

- string //Return string when reading
- number //Return float type when reading
- boolean // Returns Boolean type when reading
- array // Return array

For example:

```php
	$plugin_storage = Storage::getInstance('plugin_name');
	$data = ['name' => 'tom', 'age' => 19];
	$plugin_storage->setValue('key', $data, 'array'); //Stored as an array type, so that the array will be serialized and stored in the database, and will be automatically deserialized when read.
```

### Read data

```php
    $plugin_storage = Storage::getInstance('plugin_name'); //Initialize a storage instance using the English name of the plug-in
    $ak = $plugin_storage->getValue('key'); // Read key value
	
    // If you are reading an array, please first determine whether the read value is empty to avoid warning errors.
    $config = $plugin_storage->getValue('config');
    $test_key = !empty($config) ? $config['test_key'] : '';
```

### Clean up and delete data

```php
    $plugin_storage = Storage::getInstance('plugin_name'); //Use the English name of the plugin to initialize a storage instance
    $ak = $plugin_storage->deleteName('key') // Delete a row of data named as `key` created by this plugin
    $ak = $plugin_storage->deleteAllName('YES'); //Delete all data created by this plugin, please pass in uppercase "YES" to confirm deletion, generally used for plugin delete callback function.
```

## Plug-in data storage (2): self-built data table

If the above Storage data storage method cannot meet the storage requirements of more complex data structures, the plug-in can build its own database table to store data.

### Create plug-in data table

Use the [event callback] mechanism mentioned above to create the plug-in's own table in the custom callback function. A simple example is given below.

```php
<?php
!defined('EMLOG_ROOT') && exit('access denied!');

// Initialize plug-in data table
function callback_init() {
    $db = MySql::getInstance();
    $charset = 'utf8mb4';
    $type = 'InnoDB';
    $table = DB_PREFIX . 'stats';
    $add = "ENGINE=$type DEFAULT CHARSET=$charset;";
    $sql = "
	CREATE TABLE IF NOT EXISTS `$table` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`gid` int(11) unsigned NOT NULL,
		`title` varchar(255) NOT NULL default '',
		`views` bigint(11) unsigned NOT NULL default 0,
		`comments` bigint(11) unsigned NOT NULL default 0,
		`date` date NOT NULL,
		PRIMARY KEY (`id`),
		UNIQUE KEY `date_gid` (`date`,`gid`)
	)" . $add;
    $db->query($sql);
}

// Delete plugin data table when plugin is deleted
function callback_rm() {
	$sql = "DROP TABLE IF EXISTS `" . DB_PREFIX . "stats`";
    $db = MySql::getInstance();
    $db->query($sql);
}

```

The following PHP code is a complete callback example for maintaining the plug-in's self-built database table. It can be directly used in your own plug-in xxxx_callback.php by modifying the corresponding table creation statement.

```php

<?php
/**
 * Plugin callback
 */
!defined('EMLOG_ROOT') && exit('error!');

/**
 * Plugin activation callback
 */
function callback_init(){
    Init_Database_Callback::instance()->pluginInit();
}

/**
 * Plug-in update callback
 */
function callback_up(){
    Init_Database_Callback::instance()->pluginUp();
}

/**
 * Plug-in deletion callback
 */
function callback_rm(){
    Init_Database_Callback::instance()->pluginRm();
}

/**
 * Data table operation class
 */
class Init_Database_Callback {
    //Example
    private static $instance;
    //Database instance
    private $db;
    //Data table configuration
    private $option = [
        //Data table name
        "tableName"             => DB_PREFIX."toEverColor_list",
        //Whether to delete the data table when uninstalling the plug-in - true/false corresponds to delete/not delete, the default is false (not deleted)
        "checkDeleteTable"      => false,
        //Data table field information, field => sql statement, please do not write it wrong, the program will create and detect fields based on this
        "fieldData"             => [
            "id"            => "`id` int(50) NOT NULL AUTO_INCREMENT",
            "gid"           => "`gid` int(50) NOT NULL COMMENT 'Article ID'",
            "color"         => "`color` varchar(200) DEFAULT NULL COMMENT 'Color'",
            "weight"        => "`weight` enum('n','y') DEFAULT 'n' COMMENT 'Whether to bold (default is not bold)'",
            "font_size"     => "`font_size` int(50) DEFAULT NULL COMMENT 'Font size'",
            "line_through"  => "`line_through` enum('n','y') DEFAULT 'n' COMMENT 'Strikethrough'",
        ]
    ];

    /**
     * Private constructor, guaranteed singleton
     */
    private function __construct(){
        //Database instance assignment
        $this->db = Database::getInstance();
    }

    /**
     * Singleton entry
     */
    public static function instance(){
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Check if the data table exists
     */
    public function checkDataTable() {
        if (isset($this->option['tableName'])) {
            $query = $this->db->query("SHOW TABLES LIKE '{$this->option['tableName']}'");
            if ($this->db->num_rows($query) > 0) {
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * Detect whether the field exists in the data table - specify the field name
     */
    public function checkDataField($fieldName = '') {
        if (!empty($fieldName) && $this->checkDataTable()) {
            $query = $this->db->query("SHOW COLUMNS FROM {$this->option['tableName']} LIKE '{$fieldName}'");
            if ($this->db->num_rows($query) > 0) {
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * Data table creation function
     */
    private function addDataTable() {
        if (!empty($this->option) && is_array($this->option) && isset($this->option['fieldData']) && is_array($this->option['fieldData'])) {
            $sql = "CREATE TABLE IF NOT EXISTS {$this->option['tableName']} (";
            foreach ($this->option['fieldData'] as $field => $fieldSql) {
                $sql .= $fieldSql . ',';
            }
            $sql .= " PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Title color change table';";
            $this->db->query($sql);
        }
    }

    /**
     * Detect whether the data table field exists, create the field if it does not exist
     */
    private function addDataTableField() {
        if (!empty($this->option) && is_array($this->option) && isset($this->option['fieldData']) && is_array($this->option['fieldData'])) {
            $preForeachData = '';
            foreach ($this->option['fieldData'] as $field => $fieldSql) {
                if (!$this->checkDataField($field)) {
                    $after = !empty($preForeachData) ? " AFTER {$preForeachData}" : '';
                    $this->db->query("ALTER TABLE {$this->option['tableName']} ADD COLUMN {$fieldSql}{$after}");
                }
                $preForeachData = $field;
            }
        }
    }

    /**
     * Plug-in enable execution function
     */
    public function pluginInit() {
        if ($this->checkDataTable()) {
            $this->addDataTableField();
        } else {
            $this->addDataTable();
        }
    }

    /**
     * Plug-in update execution function
     */
    public function pluginUp() {
        $this->addDataTableField();
    }

    /**
     * Plug-in uninstall execution function
     */
    public function pluginRm() {
        if (isset($this->option['checkDeleteTable']) && $this->option['checkDeleteTable'] === true) {
            $this->db->query("DROP TABLE {$this->tableName}");
        }
    }
}

```

### Read plug-in data table

```php
<?php
   // Read plug-in data
   function getDetail($id) {
   $db = MySql::getInstance();
   $row = $db->once_fetch_array("SELECT * FROM " . DB_PREFIX . "stats WHERE id = " . $id);

    $row['xxxx']
    ...
}

```

## Plug-in data storage (3): Extend core table fields

It is not supported yet. Currently, you can use the above two methods instead, and it will be supported in the future.

#### &#x1F534;Important hint

!> Plug-ins must not modify emlog core database tables and fields, including adding fields to core tables. Especially adding fields that don't have default values.

## Mount point type

### 1. Plug-in mounting

* Execution principle: sequentially execute the functions hung on the hook, supporting multiple parameters
* Applicable scenario: Insert specified content at the mount point location, or perform certain actions.

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
// Mount point name: `save_log`, the mount point is to save the article, with the parameter `$blogid`
doAction('save_log', $blogid);
```

```php
// Plug-in development example: mount the function `test_foo` to the above `save_log` mount point, and receive the passed first parameter `$blologid`
addAction('save_log', 'test_foo');
function test_foo($blogid) {
   
}
```

#### Mount point list (plug-in mount)

##### Background related mount points

| Mount point                                        | File location              | Description |
|----------------------------------------------------|----------------------------|-------------------------------------------------------------------------------------------------------------------|
| doAction('adm_main_top')                           | admin/views/header.php     | The top area of the background homepage is expanded, and the official tips plug-in uses this mount point |
| doAction('adm_head')                               | admin/views/header.php     | Background header extension: can be used to add background css styles, load js, etc. |
| doAction('adm_menu')                               | admin/views/header.php     | Backend sidebar first-level menu extension, only visible to administrators. |
| doAction('login_head')                             | admin/views/user_head.php  | Header extension for login and registration pages, which can be used to add login style css, etc. |
| doAction('user_menu')                              | admin/views/uc_header.php  | Personal center top menu extension, only visible to registered users. |
| doAction('adm_menu_ext')                           | admin/views/header.php     | The background sidebar extends the secondary menu, which is used for the separate page of the plug-in. |
| doAction('adm_footer')                             | admin/views/footer.php     | Background bottom extension: can be used to add background js, etc. |
| doAction('adm_main_content')                       | admin/views/index.php      | Administrator backend home page information module extension |
| doAction('user_main_content')                      | admin/views/index_user.php | Registered user background homepage information module extension |
| doAction('login_ext')                              | admin/views/signin.php     | Backend login page extension: can be used to add third-party login buttons such as QQ login |
| doAction('adm_comment_display')                    | admin/views/comment.php    | Background comment display extension, which can be used to query the commenter's IP location |
| doAction('blogger_ext')                            | admin/views/blogger.php    | Backend personal information editing page extension point |
| doAction('save_log', $blogid, $pubPost, $postDate) | admin/article_save.php     | Publish the article, modify the article extension point, pass the article ID, whether to publish directly, and the complete data parameters of the article |
| doAction('del_log', $key)                          | admin/article.php          | Delete article operation extension point |
| doAction('adm_writelog_bar')                       | admin/article_write.php    | Article writing page: area below the title, development specifications:<br>1. Only text links are supported, and no more than 8 Chinese characters,<br>2. Link style and [Upload and insert pictures] The links should be consistent (including color, font size, icon size),<br>3. Interaction uses click to expand and collapse, or click to pop up the modal window |
| doAction('adm_writelog_head')                      | admin/article_write.php    | Article writing page: area below the abstract |
| doAction('adm_writelog_side')                      | admin/article_write.php    | Article writing page: area below the right sidebar |
| doAction('comment_reply', $commentId, $reply)      | admin/comment.php          | Reply to comment extension point |
| doAction('post_note')                              | admin/twitter.php          | Note publishing extension point |
| doAction('attach_upload')                          | include/lib/common.php     | Extended attachment upload, such as adding image watermark effects, etc. |

##### Front-end related mount points

| Mount point                      | File Location | Description |
|----------------------------------|-------------------------------------------|--------------------------------------|
| doAction('comment_post')         | include/controller/comment_controller.php | Post comment extension point (before writing a comment). Can be used to prevent spam comments |
| doAction('comment_saved')        | include/model/comment_model.php | Post comment extension point (after writing a comment). Used for follow-up actions after successfully publishing a comment, such as sending a notification email |
| doAction('log_related',$logData) | content/templates/default/echo_log.php | Front-end template: article details page extension point, used to add article-related content |
| doAction('index_head')           | Content/templates/default/header.php | Front-end template: Head extension: can be used to add front-end css styles, load js, etc. |
| doAction('index_footer')         | content/templates/default/footer.php | Front-end template: bottom expansion point |
| doAction('index_loglist_top')    | content/templates/default/log_list.php | Front-end template: extension point at the top of the article list, such as displaying announcements, etc. |
| doAction('rss_display')          | rss.php | RSS output extension |

Example:

```php
function tips_css() {
    echo "<style>
    #tip{
        background:url(../content/plugins/tips/icon_tips.gif) no-repeat left 3px;
        padding:3px 18px;
        margin:5px 0px;
        font-size:12px;
        color:#999999;
    }
    </style>\n";
}
// Add CSS style to the head of the management background
addAction('adm_head', 'tips_css');
```

### 2. Single takeover mount

* Execution principle: Execute the first function hung on the hook, execute only once, receive input data, and modify the incoming variable $ret)
* Applicable scenario: Replace the core function, such as taking over the core file upload function, and changing the local upload to the cloud upload

```php
// Mount point name: upload_media, upload file mount point, with parameters $attach, $ret
doOnceAction('upload_media', $attach, $ret);
```

```php
// Plug-in development example: mount the function upload2qiniu to the "upload_media" mount point
addAction('upload_media', 'upload2qiniu');

function upload2qiniu($attach, &$result) {

}
```

#### Mount point list (single takeover mount)

| Mount point | File Location | Description |
|------------------------------------------------------|------------------------|------------------------|
| doOnceAction('upload_media', $attach, $ret);         | admin/media.php        | Resource file upload mount point, which can be used for cloud storage plug-in development |
| doOnceAction('get_Gravatar', $email, $gravatar_url); | include/lib/common.php | Avatar mount point for commenters, which can be used to change the way the avatar is generated |

### 3. Take-over mounting in turn

* Execution principle: Execute all functions hung on the hook. The previous execution result is used as the input of the next one, and the value of the second variable passed in will be modified.
* Applicable scenario: modify the specified content, eg: different plug-ins modify and replace the article content differently.

```php
// Mount point name: article_content_echo, article content display mount point, with parameters $log_content, $log_content
// The first parameter $logData: Enter the original article data, the array structure includes title, content, article id and other information
// The second parameter $logData: The article data modified by the plug-in, complete the overwriting and replacement of content variables.
doMultiAction('article_content_echo', $logData, $logData);
```

#### List of mount points (rotate takeover mount)

| Mount point | File location | Description |
|--------------------------------------------------------------------|---------------------------------------|---------------------|
| doMultiAction('article_content_echo', $log_content, $log_content); | include/controller/log_controller.php | Article content input mount point, which can be used for article content replacement |

Example:

```php
//Replace `aaaa` in the article content with `bbbb`, and store the replaced article content in the `$result` variable
function content_replace($logData, &$result){
   $result = str_replace('aaaa', 'bbbb', $logData['log_content'])
}
addAction('article_content_echo', 'content_replace');
```

## Common methods & functions

Methods and functions that can be used directly: [General methods and functions](develop_func.md)

## Reference demo

The tips plug-in that comes with the Emlog system is also the official plug-in demonstration demo. You can modify it to develop your own plug-in based on this plug-in.
The directory where the tips plug-in is located: content/plugins/tips

## Open source release

If the plug-in you develop is open source on Github, please add a topic to the repository: [emlog-plugin](https://github.com/topics/emlog-plugin)

## Publish to app store

The produced plug-in can be packaged and released to the official app store after testing.

1. Packaging: Go to the content/plugins directory, find the folder of the plug-in, directly use the zip compression tool to package the folder (be careful not to go into the folder to package), and name the packaged compressed package as:
   `plugin_english_alias.zip`, such as: `tips.zip`
2. Publish: Log in to the official website emlog.net,
   then go to - My - Application Development - Publish plug-in,
   and fill in all the necessary information according to the prompts,
   and then publish it, waiting for review.

