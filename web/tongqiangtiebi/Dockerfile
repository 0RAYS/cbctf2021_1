FROM php:7.2-apache

# 创建目录


# 复制文件,设置web权限
COPY ./html/ /var/www/html/
COPY ./run.sh /run.sh
#COPY ./sources.list /etc/apt/sources.list
RUN chmod 755 -R /var/www/html/  && chmod +x /run.sh

CMD /run.sh