# dnmp
docker nginx+mysql+php+memcached+redis

我的博客：[https://www.timiguo.com](www.timiguo.com)


## 1.目录结构

```
/
├── mysqlCnf                mysql
│   └──  my.cnf               mysql配置文件
├── redis                   redis
│   └──  redis.conf          redis配置文件 开启全内存保存，最大64m
├── php-fpm                 php-fpm
│   ├── php.ini                php.ini
│   └── Dockerfile           build文件
├── nginx                   nginx
│   ├── cert                 证书目录
│   ├── fastcgi.conf         fastcgi配置
│   ├── logs                 访问日志目录
│   ├── nginx.conf           nginx配置
│   └── conf.d               nginx配置
│        └──  default.conf    网站配置        
├── mysql                   mysql数据目录
├── php                     php代码目录
└── memcached               memcached 最大64m
```

##2.启动方式

    docker-compose up -d


##3.php-fpm
php安装扩展为

- PHP版本7.2.12
- mysqli
- swoole1.10.4
- igbinary2.0.8
- memcached3.0.4
- redis4.2.0

## License
MIT
