FROM ctftraining/base_image_nginx_mysql_php_73

COPY src /var/www/html

RUN mv /var/www/html/flag.sh / \
    && chmod +x /flag.sh \
	&& mv /var/www/html/php.ini /usr/local/etc/php/ \
	&& rm -rf /var/www/html/php.ini