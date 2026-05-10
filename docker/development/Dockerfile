
FROM php:8.4-fpm

WORKDIR /workspaces/kinetik-os

RUN apt-get update && apt-get install -y \
    git curl wget unzip zip libpng-dev libwebp-dev libjpeg62-turbo-dev \
    libzip-dev libicu-dev libonig-dev libxml2-dev sudo \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install -j$(nproc) gd opcache zip intl exif

# Opcache & JIT Activation
RUN { \
    echo 'opcache.enable=1'; \
    echo 'opcache.enable_cli=1'; \
    echo 'opcache.jit=tracing'; \
    echo 'opcache.jit_buffer_size=100M'; \
    } > /usr/local/etc/php/conf.d/opcache.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN curl -fsSL https://deb.nodesource.com/setup_24.x | bash - && apt-get install -y nodejs

ARG USERNAME=vscode
RUN groupadd --gid 1000 $USERNAME && useradd --uid 1000 --gid 1000 -m $USERNAME \
    && echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME

RUN chown -R $USERNAME:$USERNAME /workspaces

USER $USERNAME