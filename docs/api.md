# ? API documentation

Emlog Pro version supports the interface (API) call function, and developers can interact with the emlog system by calling the API. For example: docking with article publishing software to realize automatic publishing of articles; docking with WeChat applets to realize diversified article display; docking with browser plug-ins to realize more convenient note publishing functions, etc. For detailed interface description, please refer to the following content.

!> This document is written based on the latest version of emlog pro, the lower version may not be compatible, please upgrade to the latest version first.

## Interface authentication

### (1) API key authentication

* Request method: POST/GET is the same as the specific interface request method
* Parameters required for authentication:

| Parameter | Required | Description |
|----------|------|---------------------------------------|
| req_sign | Mandatory | Interface signature, see calculation signature rules below |
| req_time | Mandatory | Unix timestamp, php can use the time() function to obtain, such as: 1651591816 |

#### Calculate the signature rule

The unix timestamp and the API key are concatenated and then md5 encrypted. The API key can be found in the background system-settings-API interface settings

PHP code example:

```php
$apikey = '******'; // API key, which can be found in background system-settings-API interface settings
$req_time = time(); // unix timestamp, in seconds
$req_sign = md5($req_time . $apikey); // MD5 signature
```

### (2) cookie authentication

The request needs to be accompanied by the login status cookie after the user logs in to the emlog system, which is used to identify the current login status and the login user.

```
// emlog login status cookie looks like:
EM_AUTHCOOKIE_XXXXX=admin%7C0%7C2a12e9a651b7e44be3d2d3536f51eaaa; Path=/; HttpOnly;
```

## API list

### Post a comment

* Interface URL: https://yourdomain/index.php?action=addcom
* Request method: POST
* Interface authentication method: no authentication required
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
| resp | required | pass string "json" |

#### return result

```json
{
  "code": 1,
  "msg": "Comment content must contain Chinese",
  "data": ""
}
```

### User login

* Interface URL: https://yourdomain/admin/account.php?action=dosignin
* Request method: POST
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|--|--------|
| user | required | username, email |
| pw | Required | Password |
| persist | No | Remember me, stay logged in |
| login_code | No | Image Verification Code |
| resp | required | pass string "json" |

#### return result (with login success cookie)

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### User Registration

* Interface URL: https://yourdomain/admin/account.php?action=dosignup
* Request method: POST
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|--|-----|
| mail | Required | Email |
| passwd | required | password |
| repasswd | required | repeat password |
| login_code | No | Image Verification Code |
| mail_code | No | Email Verification Code |
| resp | required | pass string "json" |

#### return result

```json
{
  "code": 1,
  "msg": "Incorrect email format",
  "data": ""
}
```

### Retrieve password: Verify registered email address

* Interface URL: https://yourdomain/admin/account.php?action=doreset
* Request method: POST
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|--|-----|
| mail | Required | Email |
| login_code | No | Image Verification Code |
| resp | required | pass string "json" |

#### return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### Retrieve password: reset password

* Interface URL: https://yourdomain/admin/account.php?action=doreset2
* Request method: POST
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|--|-----|
| mail_code | yes | email verification code |
| passwd | required | password |
| repasswd | required | repeat password |
| resp | required | pass string "json" |

#### return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### User information interface

* Get the current login user information interface
* Interface URL: https://yourdomain/?rest-api=userinfo
* Request method: GET
* Interface authentication method: [cookie authentication]
* Return format: JSON
* Request parameters: none

#### return result

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

### Article publishing interface

* Article publishing interface, which can be used to connect with article publishing software
* Interface URL: https://yourdomain/?rest-api=article_post
* Request method: POST
* Interface authentication method: [API key authentication] or [cookie authentication]
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|------|------------------------------|
| title | required | article title |
| content | required | article content |
| excerpt | No | Article Summary |
| cover | No | Article cover |
| author_uid | No | The user ID of the author, which can be viewed on the background user management page |
| sort_id | No | Article category ID, which can be viewed on the background category management page |
| tags | No | Article tags, separated by multiple half-width commas, such as: PHP,MySQL |
| draft | No | Whether to publish as a draft, yes y, no n (default is n) |
| post_date | No | Release time, such as: `2022-05-03 23:30:16` |

#### return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": {
    "article_id": 14
  }
}
```

### Article editing interface

* Article editing interface
* Interface URL: https://yourdomain/?rest-api=article_update
* Request method: POST
* Interface authentication method: [API key authentication] or [cookie authentication]
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|------|------------------------------|
| id | Required | Article ID |
| title | required | article title |
| content | No | Article content |
| excerpt | No | Article Summary |
| cover | No | Article cover |
| author_uid | No | The user ID of the author, which can be viewed on the background user management page |
| sort_id | No | Article category ID, which can be viewed on the background category management page |
| tags | No | Article tags, separated by multiple half-width commas, such as: PHP,MySQL |
| draft | No | Whether to publish as a draft, yes y, no n (default is n) |
| post_date | No | Release time, such as: `2022-05-03 23:30:16` |

#### return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": ""
}
```

### Article list interface

* Get the list interface of articles
* Interface URL: https://yourdomain/?rest-api=article_list
* Request method: GET
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| parameter |Is it required | Description |
|---------|------|---------------------|
| page | No | The page number, starting from 1 by default |
| count | No | The number of articles per page, follow the background settings by default |
| sort_id | No | Article category ID, which can be viewed on the background category management page |
| keyword | No | Search keywords, only match article titles |
| tag | No | Article tag (pro 1.9.0+) |

#### return result

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
        "sort_name": "Sort Name",
        "views": 1,
        "comnum": 0,
        "top": "y",
        "sort": "n",
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

| Parameters | Description |
|-------------|----------------|
| id | Article ID |
| title | article title |
| cover | Article cover image |
| url | Article URL |
| description | Article summary |
| date | Release date |
| author_id | Author ID |
| author_name | author nickname |
| sort_id | sort ID |
| sort_name | sort name |
| views | Readings |
| comnum | number of comments |
| top | Top page yyes nno |
| sortop | sort top y yes n no |
| tags | tags (pro 1.9.0+) |

### Article details interface

* Get the detailed interface of the article
* Interface URL: https://yourdomain/?rest-api=article_detail
* Request method: GET
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|-----|------|------|
| id | is | article ID |

#### return result

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
      "content": "Content of the article",
      "cover": "Article Cover",
      "views": 2,
      "comnum": 0,
      "top": "n",
      "sort": "n",
      "tags": []
    }
  }
}
```

### Category list interface

* Interface to get all category lists (including subcategory columns)
* Interface URL: https://yourdomain/?rest-api=sort_list
* Request method: GET
* Interface authentication method: no authentication required
* Return format: JSON
* Request parameters: none

#### return result

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

### Note publishing interface

* Note publishing interface
* Interface URL: https://yourdomain/?rest-api=note_post
* Request method: POST
* Interface authentication method: [API key authentication] or [cookie authentication]
* Return format: JSON
* Request parameters:

| Parameter | Required | Description |
|------------|------|----------------------|
| t | required | note content |
| author_uid | No | The user ID of the author, which can be viewed on the background user management page |

#### return result

```json
{
  "code": 0,
  "msg": "ok",
  "data": {
    "note_id": 4
  }
}
```

# Common error messages

| Error message | Description |
|---------------------------|-----------------|
| sign error | signature error |
| api is closed | The API is not enabled, please enable it in the background setting |
| API function is not exist | API method does not exist |
| parameter error | Required parameter is missing |

### Error return example

```json
{
  "code": 1,
  "msg": "sign error",
  "data": ""
}
```

---

--end--