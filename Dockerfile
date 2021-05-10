FROM php:7.4.16-fpm-alpine3.13

# Set working directory
WORKDIR /var/www

# Arguments defined in docker-compose.yml
ARG USER
ARG UID

# Install system dependencies
RUN set -xe && \
  ## redis requirements
  apk add --no-cache --update && \
  # git && \
  # git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis && \
  ## minimal build libraries
  apk add --no-cache --virtual \
    .build-deps $PHPIZE_DEPS && \
  ## intl build libraries (already loaded in PHP7.4)
  #   icu zlib icu-dev oniguruma-dev zlib-dev && \
  # docker-php-ext-configure intl && \
  # docker-php-ext-install intl && \
  # docker-php-ext-enable intl && \
  ## gd build libraries (already loaded in PHP7.4)
  #   freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  # docker-php-ext-configure gd && \
  # docker-php-ext-install gd && \
  # docker-php-ext-enable gd && \
  ## pdo_mysql bcmath
  docker-php-ext-install pdo_mysql bcmath && \
  ## redis
  pecl install redis && \
  docker-php-ext-enable redis

## enable xdebug
RUN pecl install xdebug && \
  docker-php-ext-enable xdebug

# Clear cache
RUN apk del --no-cache \
    # git \
    ## intl build libraries
    # icu-dev oniguruma-dev zlib-dev \
    ## gd build libraries
    # freetype-dev libpng-dev libjpeg-turbo-dev \
    .build-deps $PHPIZE_DEPS && \
  rm -rf /tmp/* /usr/local/lib/php/doc/* /var/cache/apk/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system USER to run Composer and Artisan Commands
RUN adduser -D -g "www-data root" -u $UID -h /home/$USER $USER
RUN mkdir -p /home/$USER/.composer && \
    chown -R $USER:$USER /home/$USER

# set production
# RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
# set development
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# RUN sed -E -i -e 's/memory_limit = 128M/memory_limit = 2048M/' "$PHP_INI_DIR/php.ini"

USER $USER