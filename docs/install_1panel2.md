# &#x1F354; 1Panel - manual emlog deployment

## Manually deploy emlog

### Create PHP running environment

Click the [Website] menu on the left side of 1Panel to enter the [Runtime Environment] management interface, and click the [Create Runtime Environment] button to create a PHP runtime environment.

[![](https://oss.emlog.net/img/1panel-011.png)](https://oss.emlog.net/img/1panel-011.png)

- As shown in the picture above, fill in the name and select the PHP version. PHP7.4 is recommended.
- Extension selection: mysqli, mbstring, gd, curl, zip. If you use the sg11 encryption theme plug-in, you need to select the sg11 extension.

### Create MySQL database

1. Install MySQL: Click the [Database] menu on the left side of 1Panel and fill in the instructions below to install the MySQL database.

[![](https://oss.emlog.net/img/1panel-002.png)](https://oss.emlog.net/img/1panel-002.png)

- Recommended version: MySQL5.6
- Set root password, it is recommended to keep the default port 3306
- Keep the port external access unchecked by default, and keep other default settings. Click OK to start the installation.

2. Create a database: After the MySQL service is installed, continue to click Database-Create Database to create a database for installing emlog, as shown in the figure below

[![](https://oss.emlog.net/img/1panel-006.png)](https://oss.emlog.net/img/1panel-006.png)

- Pay attention to the selection after the name: utf8mb4
- Set user and password, keep others as default

### Create web server

Click the [Website] menu on the left side of 1Panel, continue to click the [Website] submenu, and follow the guidance to install OpenResty

[![](https://oss.emlog.net/img/1panel-003.png)](https://oss.emlog.net/img/1panel-003.png)

- OpenResty (equivalent to nginx)
- Just keep the settings as default and click to confirm the installation.

After installing OpenResty, click [Create Website] under the website menu, select [Runtime Environment] at the top and fill in the domain name as shown below to create a website.

[![](https://oss.emlog.net/img/1panel-004.png)](https://oss.emlog.net/img/1panel-004.png)

- Just fill in your own domain name and keep the others as default.

### Upload files to install emlog

Then click [Configuration] of the newly created website to enter [Website Directory], and click the red circle in the picture below to enter the index folder of the website's main directory.

[![](https://oss.emlog.net/img/1panel-005.png)](https://oss.emlog.net/img/1panel-005.png)

- Upload the latest version of emlog code to the index directory.
- Pay attention to the file permissions. You need to modify the permissions of the entire index including subdirectories to: 775. The user group has read, write, and execute permissions.

Then visit the domain name you just created and fill in. If everything is normal, you can see the emlog installation interface. Follow the prompts to complete the installation.

[![](https://oss.emlog.net/img/1panel-007.png)](https://oss.emlog.net/img/1panel-007.png)

- Note that the database link is filled in with mysql:3306. This can be seen in the [Link Information] of the database management interface.
- Fill in the database username and password created above, which can be found on the database management page

### Other configurations - enable pseudo-static URL

- Click the [Website] menu on the left to enter the website management interface, click the domain name to enter the website settings
- Find the [pseudo-static] setting on the left side of the basic settings, select: emlog in the plan, and save it
- After setting up, you can turn on the relevant settings in the background SEO settings of emlog.

### Other configurations - enable HTTPS

- Click the [Website] menu on the left to enter the website management interface, click the domain name to enter the website settings
- Find the [HTTPS] setting on the left side of the basic settings and enable HTTPS
- Then follow the prompts to fill in the certificate-related configuration information.

### Manual deployment of emlog completed

At this point, the manual deployment of emlog is complete. You can explore more function settings by yourself.

--end--
