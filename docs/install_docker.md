# &#x1F34B; Docker deployment

## Install docker environment

- [Docker installation documentation](https://docs.docker.com/engine/install/)
- [Docker Compose installation documentation](https://docs.docker.com/compose/install/)

## `docker` rapid deployment

It is only suitable for quick trial functions and is not recommended for use in production environments. The image does not include MySQL and requires additional installation and creation of a database.

   ```bash
   $ docker run --name emlog-pro -p 8080:80 -d emlog/emlog:pro-latest-php7.4-apache
   ```

## `docker-compose` deployment

1. Create a folder anywhere in the system. This document uses ~/emlog as an example.

    ```bash
    mkdir ~/emlog && cd ~/emlog
    ```
2. Create docker-compose.yaml with the following content:

    ```yaml
    version: '3'
    services:
      mysql:
        image: mysql/mysql-server:5.6
        container_name: mysql56
        command:
          - --default_authentication_plugin=mysql_native_password
          - --character-set-server=utf8mb4
          - --collation-server=utf8mb4_unicode_ci
        volumes:
          - ./db_data/mysql:/var/lib/mysql
        ports:
          - "3306:3306"
        restart: always
        environment:
          MYSQL_DATABASE: emlog
          MYSQL_USER: emlog
          MYSQL_PASSWORD: emlog
        networks:
          - emlog_network
      emlog:
        image: emlog/emlog:pro-latest-php7.4-apache
        container_name: emlog-pro
        restart: always
        environment:
          - EMLOG_DB_HOST=mysql
          - EMLOG_DB_NAME=emlog
          - EMLOG_DB_USER=emlog
          - EMLOG_DB_PASSWORD=emlog
          - EMLOG_DOMAIN_NAME=localhost
          - MAX_POST_BODY=50m
          - MAX_EXECUTION_TIME=300
        ports:
          - 80:80
        networks:
          - emlog_network
        volumes:
          - ./data:/app
        labels:
          createdBy: "Apps"
    networks:
      emlog_network:
        external: true
    ```

3. Create docker network
   ```bash
   docker network create emlog_network
   ```

4. Start emlog service

   ```bash
   docker-compose up -d
   ```

5. Visit the deployed emlog site: http://localhost

### Expand environment variables

| Variable name | Description |
|-------------------|-----------------------------------------------|
| MAX_POST_BODY     | Corresponds to PHP upload_max_filesize and post_max_size settings |
| MAX_EXECUTION_TIME | Corresponds to PHP max_execution_time setting |
| EMLOG_DOMAIN_NAME | Site domain name eg: www.emlog.net |

