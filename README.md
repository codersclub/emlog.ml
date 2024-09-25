<p align="center">
  <img src="./admin/views/images/logo.png" width=100 />
</p>

<p align="center">
  <a href="./README.zh.md">中文</a> | English
</p>

# emlog

A fast and stable lightweight blog and CMS website building system to create an easy-to-use cloud content management system.
---
<p align="center">
<a href="https://github.com/emlog/emlog/releases"><img alt="GitHub release" src="https://img.shields.io/github/release/emlog/emlog.svg?style=flat-square&include_prereleases" /></a>
<a href="https://github.com/emlog/emlog/commits"><img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/emlog/emlog.svg?style=flat-square" /></a>
</p>

## Main functions

- Markdown editor
- Multiple user roles
- Multimedia resource management
- Rich templates and plug-in ecosystem
- Powerful SEO functions
- Custom pages
- Built-in API
- Tags and categories

## Official website

Multilingual Emlog: <https://emlog.ru>

Chinese Emlog: <https://www.emlog.net>

## Environment requirements

* PHP5.6, PHP7, PHP8. (Recommended PHP7.4 and above)
* MySQL5.6 and above, or MariaDB 10.3 and above
* Recommended server environment: Linux + Nginx

* Server environment recommendation: Linux + nginx
* Server recommendation: Cloud server, such as: [Alibaba Cloud ECS](https://www.aliyun.com/daily-act/ecs/activity_selection?userCode=n4ts9qpa), [Rain Cloud - KVM](https://www.rainyun.com/MzI2NDkz_)

* Server management panel software recommendation: [Bt Panel](https://www.bt.cn/u/N0UABa) (Baota supports [one-click deployment of emlog](install_bt.md), which is very convenient)
* Browser recommendation: Chrome, Edge

## Universal installation

1. [Download the installation package](https://github.com/codersclub/Discuz.ML/archive/refs/heads/v3.5ML.zip), upload all the decompressed files to the web server root directory, or directly upload the zip installation package and decompress it online.
2. Access the site domain name with a browser, the program will automatically jump to the installation page, and you can install it according to the prompts.
3. The installation process will not create a database, so you need to create it by yourself, then click "Confirm Installation", and wait for the installation finished successfully.

## Other installations

- [One-click deployment of Baota Panel](/install/install_bt.md)
- [1Panel deployment](/install/install_1panel.md)
- [Docker deployment](/install/install_docker.md)
- [Soft router iStoreOS system deployment](https://www.bilibili.com/video/BV1mHpjeGEDu)

## Docker quick deployment

Use the image emlog/emlog:pro-latest-php7.4-apache to quickly start emlog. This image contains the latest version of emlog, Apache service, and necessary extensions, but does not include MySQL, which needs to be installed and created separately.

```bash
$ docker run --name emlog-pro -p 8080:80 -d emlog/emlog:pro-latest-php7.4-apache
```

## docker-compose

1. cp config.sample.php config.php
2. docker network create emlog_network
3. docker-compose up -d
4. http://localhost:8080

## License Agreement

The license under which Emlog software is released is the Free Software Foundation's GPLv3: [LICENSE](/license.txt)
