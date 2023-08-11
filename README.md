<p align="center">
  <img src="./admin/views/images/logo.png" width=100 />
</p>

<p align="center">
  中文 | <a href="./README.en.md">English</a>
</p>

# emlog

emlog is a lightweight blog and CMS website building system, dedicated to creating a better personal cloud content management system.

## Overview

- [x] Markdown editor, auto save, more comfortable and worry-free creation
- [x] User registration, login, contribution, management
- [x] Multimedia resource manager, support upload management of pictures, audio, video, files, etc.
- [x] Draft box
- [x] Template themes to create a personalized site
- [x] Rich plugin extensions
- [x] Support article URL customization, better SEO effect
- [x] Flexible sidebar component (widgets) management, easy to combine and customize your favorite components
- [x] Custom pages to easily create message boards, navigation bars, personal profiles, etc.
- [x] Multi-person co-writing, easy management of multiple writers in the background
- [x] tag, secondary classification
- [x] Data caching technology, faster site access
- [x] Site data backup/restore

## Requirements

* PHP5.6\PHP7\PHP8, PHP7.4 recommended
* MySQL5.6+, 5.6 is recommended
* Recommended server environment: Linux + nginx

## Installation Notes

1. Upload all the decompressed files to the web root directory of the server or virtual host, or upload the zip archive and decompress it online.
2. Visit the pre-resolved domain name on the browser, the program will automatically jump to the emlog installation page, and follow the prompts to install it.
3. The installation process will not create a database, you need to create it in advance, click to confirm the installation, the installation is successful.

## Docker

### Start via `docker run`

```bash
$ docker run --name emlog-pro -p 8080:80 -d emlog/emlog:pro-latest-php7.4-apache
```

### Start via `docker-compose`

1. cp config.sample.php config.php
2. docker network create emlog_network
3. docker-compose up
4. http://localhost:8080

## Special thanks

[![Jet Brains](https://raw.githubusercontent.com/kainonly/ngx-bit/main/resource/jetbrains.svg)](https://www.jetbrains.com/)

Thanks for non - commercial open source development authorization by Jet Brains

## License Agreement

The license under which the Emlog software is released is the Free Software Foundation's GP Lv3 (or later): [LICENSE](/license.txt)
