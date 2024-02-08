# &#x1F95D; Application Development - Common Methods and Functions

It can improve development efficiency and can be used directly for common methods and functions in template and plug-in development.

## Common methods

### Get GET and POST variables

It is recommended to use the core Input class to obtain variables submitted by GET and POST. Do not directly use $a = $_POST['xxxx'] to obtain variables, which may cause security issues such as SQL injection.

```php
// Read the string submitted via POST, the default value is set to empty
$var_name = Input::postStrVar('var_name', '');
// Read the number type submitted via POST, the default value is set to 0
$var_name = Input::postIntVar('var_name', 0);

// Read the string submitted through GET, the default value is set to empty
$var_name = Input::getStrVar('var_name', '');
// Read the number type submitted through GET, the default value is set to 0
$var_name = Input::getIntVar('var_name', 0);

// Read the array of numeric types submitted by POST, such as: name="ids[]", the default value is: []
$logs = Input::postIntArray('blog');
// Read the array of string type submitted by POST, such as: name="someting[]", the default value is: []
$logs = Input::postStrArray('blog');

// Read the string submitted through GET, POST, and COOKIE, the default value is set to empty
$var_name = Input::requestStrVar('var_name', '');
// Read the numeric type submitted through GET, POST, and COOKIE, the default value is set to 0
$var_name = Input::requestNumVar('var_name', 0);
```

### Get system settings

You can use the static method get of the Option class to obtain some system setting options, as follows:

```php
Option::get('att_maxsize') // Maximum limit of file upload
Option::get('att_type') // File types allowed to be uploaded
Option::get('att_imgmaxw') // Upload images to generate thumbnails, maximum size: width
Option::get('att_imgmaxh') //Upload images to generate thumbnails, maximum size: high
```

## Commonly used functions

### Send email notification

```php
$mail = 'xxx@qq.com';
$title = 'Email title';
$content = 'Email content';
Notice::sendMail($mail, $title, $content);
```

### Intercept content of specified length

```php
//Intercept content function of specified length
//The first parameter: the content to be intercepted
//Second parameter: interception length
//The third parameter: whether to filter the html tags in the content 1 to filter 0 not to filter
//As follows: intercept the first 180 characters of the log content and filter the html tags

echo subContent($value['log_description'], 180, 1);

```

### Get article URL

```php
// Get article URL
// Parameter 1: $article_id article ID
<?= Url::log($article_id)?>
```

### Get article category page URL

```php
// Get article URL
// Parameter 1: $sort_id classification ID
<?= Url::sort($sort_id)?>
```

### Get user IP

```php
// Get user IP
echo getIp();
```

### Get the first image in the content

```php
// Get the first image in the content
// Parameter $content: article content, which can be markdown or html format content
// Return: URL of the image
$imageUrl = getFirstImage($content);
```

### Get the user's Gravatar avatar

```php
// Get user IP
// Parameters: email
// Return: avatar URL
$avatar = getGravatar($email);
```

### Friendly time description

```php
// Get user IP
// Parameter: $timestamp unix timestamp
// Return: friendly time description, such as: 1 minute ago
echo smartDate($timestamp);
```

--end--