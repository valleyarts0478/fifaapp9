# PHP 8.0 FPM ベース
FROM php:8.0-fpm

# 必要ライブラリと PHP 拡張をインストール
RUN apt-get update && apt-get install -y \
        libonig-dev \
        libzip-dev \
        unzip \
        curl \
        git \
        default-mysql-client \
        nginx \
    && docker-php-ext-install pdo pdo_mysql mbstring zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 作業ディレクトリ
WORKDIR /var/www/html

# Composer をインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# コンテナ起動時に PHP-FPM と Nginx を両方起動
COPY ./docker/start-container.sh /usr/local/bin/start-container.sh
RUN chmod +x /usr/local/bin/start-container.sh

CMD ["start-container.sh"]
