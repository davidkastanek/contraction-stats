FROM ubuntu:18.04

RUN apt-get update --fix-missing && apt-get update && apt-get install -y tzdata && apt-get install -y php php-sqlite3 composer
ENV TZ Europe/Prague

COPY . /app/

#RUN apt-get install -y php-xdebug
#RUN printf "xdebug.remote_enable=1\nxdebug.remote_autostart=0\nxdebug.remote_connect_back=1\nxdebug.remote_port=9000\nxdebug.remote_addr_header=\"HTTP_X_XDEBUG_REMOTE_ADDRESS\"" >> /etc/php/7.2/mods-available/xdebug.ini

RUN cd /app && composer install && rm -f db.sqlite && touch db.sqlite && vendor/bin/doctrine orm:schema-tool:create
