FROM php:7.2.12-fpm-alpine3.8
MAINTAINER timi https://github.com/ttllpp/dnmp
RUN apk add m4 autoconf gcc libc-dev zlib zlib-dev libmemcached-libs libmemcached-dev make

#install igbinary
RUN curl -L -o /tmp/igbinary-2.0.8.tgz https://pecl.php.net/get/igbinary-2.0.8.tgz\
&& tar xvf /tmp/igbinary-2.0.8.tgz \
&& rm -r /tmp/igbinary-2.0.8.tgz \
&& mkdir -pv /usr/src/php/ext \
&& mv igbinary-2.0.8 /usr/src/php/ext/igbinary \
&& docker-php-ext-install igbinary 

#install memcached
RUN curl -L -o /tmp/memcached-3.0.4.tgz https://pecl.php.net/get/memcached-3.0.4.tgz \
&& tar zxvf /tmp/memcached-3.0.4.tgz \
&& rm -r /tmp/memcached-3.0.4.tgz \
&& cd memcached-3.0.4 \
&& phpize \
&& ./configure  --enable-memcached-igbinary --enable-memcached-json --with-zlib-dir \
&& make \
&& make install \
&& echo "extension=memcached.so" >> /usr/local/etc/php/conf.d/ext.ini \
&& rm -r ../memcached-3.0.4
#install redis
RUN curl -L -o /tmp/redis.tar.gz https://pecl.php.net/get/redis-4.2.0.tgz\
&& tar xvf /tmp/redis.tar.gz \
&& rm -r /tmp/redis.tar.gz \
&& mkdir -pv /usr/src/php/ext \
&& mv redis-4.2.0 /usr/src/php/ext/redis \
&& docker-php-ext-install redis

#install swoole
RUN curl -L -o /tmp/swoole-1.10.4.tgz https://pecl.php.net/get/swoole-1.10.4.tgz\
&& tar xvf /tmp/swoole-1.10.4.tgz \
&& rm -r /tmp/swoole-1.10.4.tgz \
&& mkdir -pv /usr/src/php/ext \
&& mv swoole-1.10.4 /usr/src/php/ext/swoole \
&& docker-php-ext-install swoole

RUN docker-php-ext-install mysqli
#install protobuf
RUN curl -L -o /tmp/protobuf-3.6.1.tgz https://pecl.php.net/get/protobuf-3.6.1.tgz\
&& tar xvf /tmp/protobuf-3.6.1.tgz \
&& rm -r /tmp/protobuf-3.6.1.tgz \
&& mkdir -pv /usr/src/php/ext \
&& mv protobuf-3.6.1 /usr/src/php/ext/protobuf \
&& docker-php-ext-install protobuf

RUN mkdir -p /data
RUN ln -s /var/www/html/wwwroot /data
WORKDIR /data/wwwroot
EXPOSE 9000

CMD ["/usr/local/sbin/php-fpm", "-c", "/usr/local/etc/php/php.ini"]