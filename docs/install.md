# 🍇 Installation Instructions

## Environment preparation

* PHP5.6, PHP7, PHP8, recommend PHP7.4
* MySQL5.6 and above, recommend MySQL5.6 or MariaDB 10.3 and above
* Recommended server environment: Linux + nginx
* Server recommendation: cloud server, such as: [Tencent Lightweight Application Server](https://url.cn/0EOuq6vG), [Aliyun ECS](https://www.aliyun.com/product/ecs?userCode=kjcf3grb ), [Hengchuang Hong Kong Cloud Server - No filing] (http://my.henghost.com/aff.php?aff=8851)
* Server management panel software recommendation: [Pagoda Panel](https://www.bt.cn/) (Pagoda supports one-click emlog deployment, which is very convenient)
* Browser recommendation: Chrome, Edge
* Recommended local development integration environment: [phpEnv](https://www.phpenv.cn/)

## Download the installation package

[Download the latest version of emlog](https://www.emlog.net/download/zip)

## installation steps

1. Upload all decompressed files to the web root directory of the server, or directly upload the zip installation package and decompress it online.
2. Access the site domain name on the browser, the program will automatically jump to the installation page, just follow the prompts to install.
3. The installation process will not create a database, you need to create it in advance, click to confirm the installation, and the installation is successful.

## Install with Docker

1. cp config.sample.php config.php
2. docker network create emlog_network
3. docker-compose up
4. http://localhost:8080

---

--end--