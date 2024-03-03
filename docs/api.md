# &#x1f34e; API documentation

Emlog
pro version supports the interface (API) calling function, and developers can interact with the Emlog system by calling the API. For example: docking with article publishing software to realize automatic publication of articles; docking with WeChat applet to realize diversified article display; docking with browser plug-ins to realize more convenient note publishing function, etc. For detailed interface description, please refer to the following content.

!> This document is written based on the latest version of Emlog Pro. Lower versions may not be compatible. Please upgrade to the latest version first.

## Interface authentication

### (1) API key authentication

* Request method: POST/GET is the same as the specific interface request method
* Parameters required for authentication:

| Parameters | Is it required | Description |
|----------|------|---------------------------------------|
| req_sign | Required | Interface signature, see the signature calculation rules below |
| req_time | Required | Unix timestamp, PHP can use the time() function to obtain it, such as: 1651591816 |

#### Compute signature rules

Concatenate the unix timestamp and API key and perform md5 encryption. The API key can be found in the background System-Settings-API Interface Settings.

PHP code example:

```php
$apikey = '******'; // API key, which can be found in the background system-settings-API interface settings
$req_time = time(); // Unix timestamp, unit: seconds
$req_sign = md5($req_time . $apikey); // MD5 signature
```

### (2) Cookie authentication

The request needs to be accompanied by a login status cookie after the user logs in to the Emlog system, which is used to identify the current login status and logged in user.

```
// Emlog login status cookie looks like:
EM_AUTHCOOKIE_XXXXX=admin%7C0%7C2a12e9a651b7e44be3d2d3536f51eaaa; Path=/; HttpOnly;
```

## API list

### User login

* User login interface
* Interface URL: https://yourdomain/admin/account.php?action=dosignin
* Request method: POST
* Interface authentication method: no authentication required
*Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|------------|------|-------------------|
| user       | required | username, email |
| pw         | required | password |
| persist    | No       | Remember me, keep logged in status (passed value: 1) |
| login_code | No       | Image verification code |
| resp       | required | Pass the string "json" |

####

Return results (with login success cookie attached)

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### User registration

* User registration interface
* Interface URL: https://yourdomain/admin/account.php?action=dosignup
* Request method: POST
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|------------|------|--------------|
| mail       | required | email |
| passwd     | required | password |
| repasswd   | required | repeat password |
| login_code | No       | Image verification code |
| mail_code  | No       | Email verification code |
| resp       | required | Pass the string "json" |

#### Return result

```json
{
  "code": 1,
  "msg": "Incorrect email format",
  "data": ""
}
```

### Retrieve password: Verify registration email

* Retrieve password: Verify registration email interface
* Interface URL: https://yourdomain/admin/account.php?action=doreset
* Request method: POST
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|------------|------|--------------|
| mail       | required | email |
| login_code | No       | Image verification code |
| resp       | required | Pass the string "json" |

#### Return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### Retrieve password: Reset password

* Retrieve password: Reset password interface
* Interface URL: https://yourdomain/admin/account.php?action=doreset2
* Request method: POST
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|-----------|------|--------------|
| mail_code | Yes | Email verification code |
| passwd | required | password |
| repasswd | required | repeat password |
| resp | required | Pass the string "json" |

#### Return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### Get user information

* Get current logged in user information interface
* Interface URL: https://yourdomain/?rest-api=userinfo
* Request method: GET
* Interface authentication method: [cookie authentication]
* Return format: JSON
* Request parameters: none

#### Return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": {
    "userinfo": {
      "uid": "1",
      "nickname": "emer",
      "role": "admin",
      "photo": "../content/uploadfile/202303/ad7b1678085402.jpg",
      "email": "",
      "description": "",
      "ip": "172.18.0.1",
      "create_time": "1677640065"
    }
  }
}
```

### Modify user information

* The currently logged in user can modify user information and change password interface
* Interface URL: https://yourdomain/admin/blogger.php?action=update
* Request method: POST
* Interface authentication method: [cookie authentication]
* Return format: JSON
* Request parameters:

| Parameters  | Is it required | Description |
|-------------|------|-----------------|
| name        | Yes | Nickname |
| email       | Yes | Login email |
| description | No  | Personal description |
| username    | No  | Login username |
| newpass     | No  | New password, passed when changing the password |
| repeatpass  | No  | Re-enter the new password and pass it when changing the password |

#### Return results

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### Upload avatar

* User upload avatar interface
* Interface URL: https://yourdomain/admin/blogger.php?action=update_avatar
* Request method: POST
* Interface authentication method: [cookie authentication]
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|-------|------|----------------------------------|
| image | Yes | Image submitted by the form, PHP gets: $_FILES["image"] |

#### Return results

```json
{
    "code": 0,
    "msg": "ok",
    "data": "..\/content\/uploadfile\/202310\/ad7b1696580183.jpg"
}
```

### Post a comment

* Post comment interface
* Interface URL: https://yourdomain/index.php?action=addcom
* Request method: POST
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|---------|------|--------------|
| gid     | required | article id |
| comname | required | reviewer name |
| comment | required | comment content |
| mail    | No       | Commenter's email address |
| comurl  | No       | Reviewer's homepage address |
| imgcode | No       | Image verification code |
| pid     | No       | Replied comment ID |
| resp    | required | Pass the string "json" |

#### Return results

```json
{
  "code": 1,
  "msg": "Comments must contain Chinese",
  "data": ""
}
```

### comment list

* Get the comment list interface
* Interface URL: https://yourdomain/?rest-api=comment_list
* Request method: GET
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|------|------|--------------------|
| id   | No   | Article id, leave it blank to return all comments |
| page | No   | Comment paging, you need to enable the comment paging function in the background setting |

#### Return results

```json
{
    "code": 0,
    "msg": "ok",
    "data": {
        "comments": {
            "1": {
                "cid": "1",
                "gid": "1",
                "pid": "0",
                "top": "n",
                "poster": "snow",
                "uid": "0",
                "comment": "stay hungry stay foolish",
                "mail": "",
                "url": "",
                "ip": "",
                "agent": "",
                "hide": "n",
                "date": "57 minutes ago",
                "content": "stay hungry stay foolish",
                "children": [],
                "level": 0
            }
        },
        "commentStacks": [],
        "commentPageUrl": ""
    }
}
```

<a name="post_article"></a>
### Article publishing

* Article publishing interface, which can be used to interface with article publishing software
* Interface URL: https://yourdomain/?rest-api=article_post
* Request method: POST
* Interface authentication method: [API key authentication] or [cookie authentication]
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|------------|------|------------------------------|
| title      | required | article title |
| content    | required | article content |
| excerpt    | No | Article summary |
| cover      | No | Article cover |
| author_uid | No | The user ID of the author, which can be viewed on the background user management page |
| sort_id    | No | Article classification ID, which can be viewed on the background classification management page |
| tags       | No | Article tags, multiple half-width commas separated, such as: PHP, MySQL |
| draft      | No | Whether to publish as a draft, yes y, no n (default is n) |
| post_date  | No | Posting time, such as: `2022-05-03 23:30:16` |

#### Return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": {
    "article_id": 14
  }
}
```

### Article editing

* Article editing interface
* Interface URL: https://yourdomain/?rest-api=article_update
* Request method: POST
* Interface authentication method: [API key authentication] or [cookie authentication]
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|------------|------|------------------------------|
| id         | required | article ID |
| title      | required | article title |
| content    | No | Article content |
| excerpt    | No | Article summary |
| cover      | No | Article cover |
| author_uid | No | The user ID of the author, which can be viewed on the background user management page |
| sort_id    | No | Article classification ID, which can be viewed on the background classification management page |
| tags       | No | Article tags, multiple half-width commas separated, such as: PHP, MySQL |
| draft      | No | Whether to publish as a draft, yes y, no n (default is n) |
| post_date  | No | Posting time, such as: `2022-05-03 23:30:16` |

#### Return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### Article list

* Get the list interface of articles
* Interface URL: https://yourdomain/?rest-api=article_list
* Request method: GET
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|---------|------|--------------------------------------------------|
| page    | No | Page number, starting from 1 by default |
| count   | No | Number of articles per page, default follows background settings |
| sort_id | No | Article classification ID, which can be viewed on the background classification management page |
| keyword | No | Search keywords, only match article titles |
| tag     | No | Article tag (pro 1.9.0+) |
| order   | No | Article sorting, the default is to sort in reverse order of time, views: sort in reverse order of views, comnum: sort in reverse order of number of comments |

#### Return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": {
    "articles": [
      {
        "id": 31908,
        "title": "Here is the title of the article",
        "cover": "",
        "url": "https://www.emlog.dev/post/31908",
        "description": "Here is the summary content of the article",
        "date": "2021-10-11 08:04:11",
        "author_id": 3,
        "author_name": "Zhang San",
        "sort_id": 53,
        "sort_name": "Category Name",
        "views": 1,
        "comnum": 0,
        "top": "y",
        "sortop": "n",
        "tags": [
          {
            "name": "emlog",
            "url": "http://localhost:8080/?tag=emlog"
          }
        ]
      }
    ]
  }
}
```

| Parameter | Description |
|-------------|----------------|
| id          | Article ID |
| title       | article title |
| cover       | Article cover image |
| url         | Article URL |
| description | Article summary |
| date        | Release date |
| author_id   | Author ID |
| author_name | Author nickname |
| sort_id     | Category ID |
| sort_name   | Category name |
| views       | Number of readings |
| comnum      | Number of comments |
| top         | Top page: y=yes, n=no |
| sortop      | Category top: y=yes n=no |
| tags        | Tags (pro 1.9.0+) |

### Article details

* Get article details interface
* Interface URL: https://yourdomain/?rest-api=article_detail
* Request method: GET
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|----|------|------|
| id | Yes | Article ID |

#### Return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": {
    "article": {
      "title": "Title of the article",
      "date": "2022-06-04 10:42:12",
      "id": 54215,
      "sort_id": -1,
      "sort_name": "",
      "type": "blog",
      "author_id": "1",
      "author_name": "snowsun",
      "content": "<p>The content of the article</p>",
      "excerpt": "<p>Here is the abstract of the article</p>",
      "cover": "Article cover",
      "views": 2,
      "comnum": 0,
      "top": "n",
      "sortop": "n",
      "tags": []
    }
  }
}
```

### Category List

* Get the interface of all categories list (including sub-category columns)
* Interface URL: https://yourdomain/?rest-api=sort_list
* Request method: GET
* Interface authentication method: no authentication required
*Return format: JSON
* Request parameters: none

#### Return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": {
    "sorts": [
      {
        "lognum": "0",
        "sortname": "Sports",
        "description": "",
        "alias": "sport",
        "sid": 1,
        "taxis": 0,
        "pid": 0,
        "template": "",
        "children": [
          {
            "lognum": "0",
            "sortname": "Football",
            "description": "",
            "alias": "football",
            "sid": 2,
            "taxis": 0,
            "pid": 1,
            "template": ""
          }
        ]
      }
    ]
  }
}
```

### Note release

* Note publishing interface
* Interface URL: https://yourdomain/?rest-api=note_post
* Request method: POST
* Interface authentication method: [API key authentication] or [cookie authentication]
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|------------|------|----------------------|
| t          | Required | Note content |
| author_uid | No | The user ID of the author, which can be viewed on the background user management page |

#### Return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": {
    "note_id": 4
  }
}
```

### Note list

* Get the list interface of notes
* Interface URL: https://yourdomain/?rest-api=note_list
* Request method: GET
* Interface authentication method: [API key authentication] or [cookie authentication]
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|------------|------|----------------------|
| page       | No | Page number, starting from 1 by default |
| count      | No | Number of articles per page, default follows background settings |
| author_uid | No | The user ID of the author, which can be viewed on the background user management page |

#### Return results

```json
{
    "code": 0,
    "msg": "ok",
    "data": {
        "notes": [
            {
                "t": "<h1>test note</h1>",
                "t_raw": "# test note",
                "date": "47 seconds ago",
                "author_id": 1,
                "author_name": "emer"
            },
            ...
            ,
        ]
    }
}
```

### Resource file upload

* Upload pictures, zip packages and other resource files
* Interface URL: https://yourdomain/?rest-api=upload
* Request method: POST
* Interface authentication method: [API key authentication]
* Return format: JSON
* Request parameters:

| Parameters | Is it required | Description |
|------------|------|----------------------|
| file       | required | file, the media file to be uploaded (binary file) |
| author_uid | No | The user ID of the author, which can be viewed on the background user management page |
| sid        | No | Resource classification ID |

#### Return results

```json
{
    "code": 0,
    "msg": "ok",
    "data": {
        "media_id": 80,
        "url": "http://yourdomain/content/uploadfile/202307/7e6f1690266418.png",
        "file_info": {
            "file_name": "icon-1024.png",
            "mime_type": "image/png",
            "size": 258642,
            "width": 1024,
            "height": 1024,
            "file_path": "../content/uploadfile/202307/7e6f1690266418.png",
            "thum_file": "../content/uploadfile/202307/thum-7e6f1690266418.png"
        }
    }
}
```

## Common error messages

- Error return format: json

| Error message | Description | http status code |
|---------------------------|-----------------|---------|
| sign error    | Signature error | 401 |
| api is closed | The API is not enabled, please enable it in the background setting | 400 |
| API function is not exist | API method that does not exist | 400 |
| parameter error | The required parameter is missing | 400 |

### Error return example

```json
{
  "code": 1,
  "msg": "sign error",
  "data": ""
}
```

---

## Call example

### PHP call example

PHP call example (release notes)

```php
<?php

// API key can be found in the background system-settings-API interface settings
$apikey = 'your_api_key';
// unix timestamp in seconds
$req_time = time();
// MD5 signature calculation
$req_sign = md5($req_time . $apikey);

//Request parameters
$data = array(
    't' => 'This is a test note',
    'author_uid' => '1',
    'req_time' => $req_time,
    'req_sign' => $req_sign
);

//Request URL
$url = 'https://yourdomain/?rest-api=note_post';

$ch = curl_init();
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));// Set request parameters
curl_setopt($ch, CURLOPT_URL, $url);// Set the request URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// Set the return result not to be output directly
$response = curl_exec($ch);// Execute the request and obtain the response data
curl_close($ch);// Close curl

echo $response; // Output the response result
```

### python call example

python calling example (release notes)

```python
import time
import hashlib
import requests

# API key, which can be found in the background system-settings-API interface settings
apikey = 'your_api_key'
# unix timestamp in seconds
req_time = str(int(time.time()))
# MD5 signature calculation
req_sign = hashlib.md5((req_time + apikey).encode('utf-8')).hexdigest()

# Request parameters
data = {
    't': 'This is a test note',
    'author_uid': '1',
    'req_time': req_time,
    'req_sign': req_sign
}

# Request URL
url = 'https://yourdomain/?rest-api=note_post'
response = requests.post(url, data=data)
print(response.text) # Output the response result
```

### js call example

js call example (post a comment)

```js
// Used jquery
// Get form data
const gid = $('#gid').val();
const comname = $('#comname').val();
const comment = $('#comment').val();
const commail = $('#commail').val();
const comurl = $('#comurl').val();
const imgcode = $('#imgcode').val();
const pid = $('#pid').val();
const resp = $('#resp').val();

// Send POST request
$.post('https://yourdomain/index.php?action=addcom', {
    gid: gid,
    comname: comname,
    comment: comment,
    commail: commail,
    comurl: comurl,
    imgcode: imgcode,
    pid: pid,
    resp: resp
}).done(function (response) {
    if (response.code === 0) {
        alert('Comment successful!');
        // Refresh the page or other operations
    } else {
        alert(response.msg);
    }
}).fail(function (jqXHR, textStatus, errorThrown) {
    console.log('Request failed: ' + textStatus);
});
```

### File upload example

PHP implementation example of uploading images

```php
<?php

// API key can be found in the background system-settings-API interface settings
$apikey = 'your_api_key';
// unix timestamp in seconds
$req_time = time();
// MD5 signature calculation
$req_sign = md5($req_time . $apikey);

// Request URL
$url = 'https://yourdomain/?rest-api=upload';

// The file path to upload
$file_path = '/path/to/your/file.png';

// Construct POST data
$post_data = array(
    'file' => new CURLFile($file_path),
    'sid' => 1, // Resource classification ID, you can omit it if not needed
    'req_time' => $req_time,
    'req_sign' => $req_sign
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);// Set the request URL
curl_setopt($ch, CURLOPT_POST, 1);// Set to POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);// Set POST data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// Set the return result not to be output directly
$response = curl_exec($ch);// Execute the request and obtain the response data

// Check if an error occurred
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Parse response data in JSON format
    $json_response = json_decode($response, true);
    if ($json_response['code'] === 0) {
        echo 'Upload successful! Media ID: ' . $json_response['data']['media_id'];
        echo 'File URL: ' . $json_response['data']['url'];
    } else {
        echo 'Upload failed: ' . $json_response['msg'];
    }
}

curl_close($ch);// Close curl

```
