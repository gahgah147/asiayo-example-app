# 使用 PHP 官方映像
FROM php:8.1-fpm

# 安裝必要的擴展
RUN apt-get update && apt-get install -y \
	libcurl4-openssl-dev \
	libpng-dev \
	libjpeg-dev \
	libfreetype6-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install gd \
	&& docker-php-ext-install pdo pdo_mysql curl

# 設定工作目錄
WORKDIR /var/www

# 複製專案檔案到容器中
COPY . .

# 安裝 Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 安裝相依套件
RUN composer install

# 開放端口
EXPOSE 9000

CMD ["php-fpm"]