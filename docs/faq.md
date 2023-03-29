# 🍬Pro version FAQ

## Is pro compatible with past templates and plugins?

Compatible, no need for special adaptation, most of the old template plug-ins are developed based on php5.6, you can switch the php version to php5.6

## Can old versions 5.3.1 and 6.0.0 be upgraded to pro?

Yes, please refer to the following upgrade guide:

* 6.0.0 Upgrade guide: [6.0.0 Upgrade pro guide](600toPro.md)
* 5.3.1 Upgrade guide: [5.3.1 Upgrade pro guide](531toPro.md)

## What editor does the pro version use?

I use the Markdown editor, which is a lightweight markup language that allows people to write documents in plain text that is easy to read and write.
The emergence of Markdown allows us to return to the content itself without having to worry about various text styles and layout issues, focusing on the structure of the article itself rather than the style. Since its release, it has been loved by many professional content creators.

* Get familiar with the syntax of markdown before starting: [Basic syntax of Markdown](https://www.markdown.xyz/basic-syntax/)
* This is a markdown video tutorial, take 5 minutes to understand it: https://www.bilibili.com/video/BV1734y1e7QC
* What if I still like the original WYSIWYG editor? It can be installed and used: [Rich Text Editor Plugin](https://www.emlog.net/plugin/detail/362).

## How to set the text color in the default editor of pro

Markdown can set text color through HTML tags. However, it should be noted that Markdown itself does not support directly setting the text color, and it needs to be embedded in HTML code to achieve it. For example:

```html
<span style="color:red">This is a line of red words</span>
<span style="color:blue">This is a line of blue words</span>
<span style="color:green">This is a line of green words</span>
```

Enter the above code directly in the editor to set the text color.

## How to hide the management background login page?

Add the following configuration code at the end of config.php in the root directory (if it already exists, just modify it)

```php
const ADMIN_PATH_CODE = 'xxx';
```

* Replace xxx with 8-16 alphanumeric characters without special characters.
* After the modification is completed, you can only visit: http://yourdomain/admin/account.php?action=signin&s=xxx to log in to the background.
* Modifications may affect the new user registration function, and we do not recommend using this function.

## How to retrieve password?

If users of the pro version fill in the email address and configure the email notification function, they can directly use the password retrieval function on the background login page.

You can also use the emlog password reset tool to reset the password:

* [Tool Download](https://oss.emlog.net/download/passwd.zip)

Instructions:

1. Unzip the downloaded zip package.
2. Upload the decompressed passwd.php file to the root directory of emlog
3. Visit in the browser: http://domain name of your website/passwd.php Follow the prompts to reset the password. Be sure to delete this file after resetting.

## How to upload very large files?

* Modify the php configuration file php.ini, change upload_max_filesize and post_max_size to 2000M (can be modified to the size you want), and then restart PHP.
* nginx: Modify the configuration file nginx.conf, add client_max_body_size 20000M; (can be modified to the size you want), and then restart nginx.
* Apache: modify the configuration file httpd.conf, the linux server can generally be in the /etc/httpd/conf/ directory, modify the field (if there is no one, add) LimitRequestBody 1048576000 (limited to 1000M), and restart the apache service

## The background editor and other icons cannot be displayed normally, how to solve the problem that they are all small squares?

When deploying emlog on Windows server IIS, you will encounter an error that the browser cannot find the font file (woff/woff2). This will cause the browser to fail to load the font icon, mainly because the server IIS does not recognize the woff/woff2 file type. Here is the solution:

1. Open IIS, click the MIME type in the main interface:
2. Manually add the MIME type:
     *.woff application/x-font-woff
     *.woff2 application/x-font-woff
3. After adding, just refresh the page.

If the instructions are too simple to understand, you can also search for: "IIS fonts are not displayed". There are also many articles on the Internet that solve this problem, you can refer to them.

## The style of the home page is lost, and only the text content is left. How to solve it?

Repair method: Enter the management background, click the system menu on the left to enter the basic setting page, and check whether the site address setting is correct.
This problem is generally caused by the wrong site address setting, or enabling https, changing the domain name, etc., which makes the previously set site address inaccessible, and then the css style file cannot be loaded.

## What is the reason why both the App Store and Check for Updates prompts a network error?

![](https://oss.emlog.net/img/WX20230311-143937.png)

- Generally, it is because the host or server cannot request the official service of emlog. You can submit a work order to the service provider to check whether the host or server can request the official website domain name: https://www.emlog.net
- Some other virtual hosts restrict external outsourcing requests, and it is recommended to replace the cloud server.

## What is the reason for the SQL statement error

![](https://oss.emlog.net/img/WX20230311-145914.png)

- You can check whether the plug-in is caused by disabling the plug-ins one by one. If you locate the plug-in problem, you can delete the plug-in or contact the plug-in author to solve it.
- You can replace the default template to check whether it is caused by the template, if so, please contact the template author to solve it.

---

--the end--