# &#x1f36c; Emlog Pro FAQ

## Can old versions of emlog5.3.1 and 6.0.0 be upgraded to pro?

Yes, please refer to the following upgrade guide:

* 6.0.0 upgrade guide: [upgrade 6.0.0 to pro](600toPro.md)
* 5.3.1 upgrade guide: [upgrade 5.3.1 to pro](531toPro.md)

The old version of templates and plug-ins can be used in the emlog pro version without special adaptation. In addition, the old template plug-ins are mostly developed based on php5.6, and the PHP version can be switched to php5.6.

## What editor does the Pro version use by default?

The Markdown editor is used. Markdown is a lightweight markup language that allows people to write documents in a plain text format that is easy to read and write.
The emergence of Markdown eliminates the need to worry about various text styles and layout issues. Instead, we return to the content itself and focus on the structure of the article itself rather than the style. Since its release, it has been deeply loved by the majority of professional content creators.

* Before you start, you can familiarize yourself with the syntax of markdown: [Basic Syntax of Markdown](https://www.markdown.xyz/basic-syntax/)
* This is a markdown video tutorial, take 5 minutes to understand it: https://www.bilibili.com/video/BV1734y1e7QC
* What if I still prefer the original WYSIWYG editor? You can install and use: [Rich Text Editor Plug-in](https://www.emlog.net/plugin/detail/362).

## How to set text color in default editor?

Markdown can set text color through HTML tags. However, it should be noted that Markdown itself does not support directly setting the text color, and requires embedding HTML code to achieve this. For example:

```html
<span style="color:red">This is a line of red words</span>
<span style="color:blue">This is a line of blue text</span>
<span style="color:green">This is a line of green words</span>
```

Enter the above code directly into the editor to set the text color.

## How to insert video (MP4) in the editor?

Insert the following html code in the editor and replace the mp4 address with the address of your video.

```html

<video class="video-js" controls preload="auto" width="100%" data-setup='{"aspectRatio":"16:9"}'>
    <source src="http://xxxx.com/content/uploadfile/202109/62351631420620.mp4" type='video/mp4'>
</video>
```

## How to insert audio (MP3) in the editor?

Insert the following html code in the editor and replace the mp3 address with the address of your audio mp3.

```html

<audio src="http://localhost:8080/content/uploadfile/202303/08361680144922.mp3" preload="none" controls loop>
    Your browser does not support the audio tag.
</audio>
```

## The background editor and other icons cannot be displayed normally. They are all small squares. How to solve this problem?

![](https://oss.emlog.net/img/iis-error.png)

If you deploy emlog on a Windows operating system IIS server, you may encounter an error caused by the browser not being able to find the font file (woff/woff2). This will cause the browser to be unable to load the font icon.
This is because the server IIS does not recognize the woff/woff2 file type. The following is the solution (you can also search for: "IIS fonts are not displayed". There are many articles on the Internet that solve this problem):

1. Open IIS and click MIME type in the main interface:
2. Add MIME type manually:
    * .woff application/x-font-woff
    * .woff2 application/x-font-woff
3. After adding it, just refresh the page.

If the above method fails to solve the problem, check whether static CDN is enabled. emlog is a dynamic system and does not support static CDN. Enabling it may cause cross-domain problems in font loading, failure to load, and icons that cannot be displayed. Please turn off CDN.

## How to hide the management background login page?

Add the following configuration code at the end of config.php in the root directory (if it already exists, just modify it)

```php
const ADMIN_PATH_CODE = 'xxx';
```

* Replace xxx with 8-16 digit alphanumeric characters and must not contain special characters.
* After the modification is completed, you can only visit: http://yourdomain/admin/account.php?action=signin&s=xxx to log in to the backend.
* The modification may affect the new user registration function, and we do not recommend using this function.

## What should I do if I forget my password?

If pro version users fill in their email address and configure the email notification function, they can use the password retrieval function directly on the background login page.

You can also use the emlog password reset tool to reset your password:

* [Tool download](https://oss.emlog.net/download/passwd.zip)

Instructions:

1. Unzip the downloaded zip package.
2. Upload the decompressed passwd.php file to the root directory of emlog.
3. Visit in the browser: your website’s domain name/passwd.php and follow the prompts to reset your password. Be sure to delete this file after the reset.

## How to upload very large files?

* Modify the php configuration file php.ini, change upload_max_filesize and post_max_size to 2000M (can be modified to the size you want), and then restart PHP.
* nginx: Modify the configuration file nginx.conf, add client_max_body_size 20000M; (can be modified to the size you want) in the http{} section, and then restart nginx.
* Apache: Modify the configuration file httpd.conf. Linux servers can generally be in the /etc/httpd/conf/ directory and modify the fields (add them if they are not available) LimitRequestBody
  1048576000 (limited to 1000M), and restart the apache service

## How to solve the problem that the garbled style of the homepage is lost after enabling HTTPS?

Repair method: Enter the management background, click the system menu on the left to enter the basic settings page, and check whether the site address setting is correct.
This problem is usually caused by an incorrect site address setting, or after enabling https, changing the domain name, etc., causing the previously set site address to be inaccessible, and thus the css style file cannot be loaded.

## Why does the App Store and Check for Updates both prompt network errors?

![](https://oss.emlog.net/img/WX20230311-143937.png)

This problem occurs because the system cannot access the emlog official website server. The solution is as follows:

1. Confirm whether the server PHP supports the curl extension, and check whether there is the word curl in the software information section of the homepage. If not, please install it.
2. You can try to solve the problem by switching the PHP version.
3. Submit a work order to the service provider: Check whether the host or server can request the official domain name: https://www.emlog.net. You can ask it to try: telnet emlog.net
   443
4. Some other virtual hosts restrict outbound contract requests, so it is recommended to replace the cloud server.

## The application store cannot download the installation package, prompt: Installation failed, unable to download the installation package

If you can see the product list in the app store, but cannot download and install it, it is usually because the maximum execution time (max_execution_time) of PHP is set too short, causing the execution to time out. You can adjust the max_execution_time setting of php.ini to 300, then restart PHP and try again.

## What is the reason for SQL statement error?

![](https://oss.emlog.net/img/WX20230311-145914.png)

- You can change the default template to check whether it is caused by the template. If so, please contact the template author to solve the problem.
- You can check whether the plug-in is caused by disabling plug-ins one by one. If a plug-in problem is located, you can delete the plug-in or contact the plug-in author to solve it.

# How to change the domain name of the site?

You can search and install the [Toolbox] plug-in in the app store: https://www.emlog.net/plugin/detail/622

After installing and enabling the plug-in, you can use the domain name change function provided by the plug-in.

## How to migrate the site when changing servers?

1. Package and download all the files of the old server site, and export the database backup in emlog background-system-data.
2. Install an emlog with the same version number on the new server.
3. In the new emlog background-system-data, import the database backed up in step 1.
4. Upload and overwrite the content directory of the old server to the new server.
5. If everything goes well, the migration is complete after completing the above steps.

## How to configure the server to support URL rewriting (pseudo-static rules)?

### Nginx server

```
location / {
   index index.php index.html;
   if (!-e $request_filename){
      rewrite ^/(.*)$ /index.php last;
   }
}
```

### Apache server

Just enable .htaccess support and check the http.conf configuration file:

1. Make sure the mod_rewrite module is loaded and remove the # comment symbol before the following configuration line
   ```
   LoadModule rewrite_module modules/mod_rewrite.so
   ```
2. Set the AllowOverride directive to All
   ```
   AllowOverride All
   ```

### Windows IIS Server

IIS6

```
[ISAPI_Rewrite]
# 3600 = 1 hour
CacheClockRate 3600
RepeatLimit 32
RewriteRule /robots.txt(.*) /robots.txt$1 [L]
RewriteRule /rss.php(.*) /rss.php$1 [L]
RewriteRule /tb.php(.*) /tb.php$1 [L]
RewriteRule /favicon.ico /favicon.ico [L]
RewriteRule /xmlrpc.php(.*) /xmlrpc.php$1 [L]
RewriteRule /wlwmanifest.xml /wlwmanifest.xml [L]
RewriteRule /(t|m)$ /$1/ [R] RewriteRule /(admin|content|include|t|m)/(.*) /$1/$2 [L]
RewriteRule /install.php(.*) /install.php$1 [L]
RewriteRule /up(d.d.d)to(d.d.d).php(.*) /up$1to$2.php$3 [L]
RewriteRule ^/$ /index.php [L]
RewriteRule /(.*) /index.php/$1 [L]
```

IIS7/8/10, create the file web.config, fill in the following content, and put it in the root directory

```xml
<?xml version="1.0" encoding="UTF-8"?>
<configuration>
    <system.webServer>
        <rewrite>
            <rules>
                <rule name="emlog Rewrite" stopProcessing="true">
                    <match url="^(.*)" ignoreCase="false" />
                    <conditions logicalGrouping="MatchAll">
                        <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />
                        <add input="{REQUEST_FILENAME}" matchType="IsDirectory" ignoreCase="false" negate="true" />
                    </conditions>
                    <action type="Rewrite" url="/index.php" />
                </rule>
            </rules>
        </rewrite>
    </system.webServer>
</configuration>
```

## How to change the default browser icon &#x1F335;?

There is a favicon.ico file in the root directory. Just replace it with a file of the same name you made. Remember to clear the browser cache after replacing it. It is recommended to use online tools to make your own site icon, such as: https://www.logosc.cn/logo/favicon

## How to add the public security registration number at the bottom of the homepage?

Enter the left menu of the background: System - Settings, find [Home Page Bottom Information] in the basic settings, fill in the following code (if there are already other codes, just append them directly at the end), and replace xxxxxxx and "京" with your own Local police registration information and number.

```html
<a target="_blank" href="https://beian.mps.gov.cn/#/query/webSearch?code=xxxxxxx">
<img src="https://beian.mps.gov.cn/img/logo01.dd7ff50e.png" alt="icp" style="width: 16px;" width="16">
<span style="color:#939393;">Beijing Public Network Security No. xxxxxxx</span>
</a>
```

--the end--

