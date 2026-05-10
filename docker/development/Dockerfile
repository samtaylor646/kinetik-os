###############################################################################
# Path: /docker/development/Dockerfile
# Filename: Dockerfile | Version: v7.8.0
# Agent: DevOps-V
# Status: Production
# Logic: Multi-stage development container with PHP 8.4-FPM, Node 24 LTS, opcache JIT, Rancher Desktop optimization
###############################################################################

FROM php:8.4-fpm

WORKDIR /workspace

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl wget unzip zip \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libxpm-dev \
    libzip-dev libicu-dev libonig-dev libxml2-dev libexif-dev \
    vim nano htop procps \
    && rm -rf /var/lib/apt/lists/*

# Configure and install PHP extensions
RUN docker-php-ext-configure gd \
    --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install -j$(nproc) \
    gd mbstring opcache zip intl exif pdo pdo_mysql bcmath \
    ctype curl dom fileinfo filter hash iconv json libxml \
    openssl simplexml soap sockets tokenizer xml xmlreader xmlwriter

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer --version

# Install Node.js 24 LTS
RUN curl -fsSL https://deb.nodesource.com/setup_24.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

RUN node --version && npm --version && npm install -g npm@latest

# PHP development configuration
RUN { \
    echo '[PHP]'; \
    echo 'display_errors = On'; \
    echo 'display_startup_errors = On'; \
    echo 'error_reporting = E_ALL'; \
    echo 'log_errors = On'; \
    echo 'memory_limit = 512M'; \
    echo 'post_max_size = 128M'; \
    echo 'upload_max_filesize = 128M'; \
    echo 'max_execution_time = 300'; \
    echo 'max_input_time = 300'; \
    echo 'default_charset = "UTF-8"'; \
    echo ''; \
    echo '[Date]'; \
    echo 'date.timezone = UTC'; \
} > /usr/local/etc/php/conf.d/php-development.ini

# Opcache with JIT
RUN { \
    echo '[opcache]'; \
    echo 'opcache.enable = 1'; \
    echo 'opcache.enable_cli = 1'; \
    echo 'opcache.memory_consumption = 256'; \
    echo 'opcache.interned_strings_buffer = 16'; \
    echo 'opcache.max_accelerated_files = 20000'; \
    echo 'opcache.revalidate_freq = 0'; \
    echo 'opcache.validate_timestamps = 1'; \
    echo 'opcache.save_comments = 1'; \
    echo 'opcache.fast_shutdown = 1'; \
    echo 'opcache.jit = tracing'; \
    echo 'opcache.jit_buffer_size = 100M'; \
} > /usr/local/etc/php/conf.d/opcache.ini

# Create non-root user
ARG USERNAME=vscode
ARG USER_UID=1000
ARG USER_GID=$USER_UID

RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME \
    && apt-get update \
    && apt-get install -y sudo \
    && echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME \
    && chmod 0440 /etc/sudoers.d/$USERNAME \
    && rm -rf /var/lib/apt/lists/*

RUN chown -R $USERNAME:$USERNAME /workspace

# Create Kirby directories
RUN mkdir -p /workspace/storage/cache /workspace/storage/sessions \
    /workspace/storage/accounts /workspace/content /workspace/public/media \
    && chown -R $USERNAME:$USERNAME /workspace/storage \
    /workspace/content /workspace/public

# Configure Git
USER $USERNAME
RUN git config --global init.defaultBranch main \
    && git config --global core.autocrlf input \
    && git config --global pull.rebase false

USER root

# Install Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN { \
    echo '[xdebug]'; \
    echo 'xdebug.mode = debug,develop'; \
    echo 'xdebug.start_with_request = yes'; \
    echo 'xdebug.client_host = host.docker.internal'; \
    echo 'xdebug.client_port = 9003'; \
    echo 'xdebug.log = /tmp/xdebug.log'; \
    echo 'xdebug.idekey = VSCODE'; \
} > /usr/local/etc/php/conf.d/xdebug.ini

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

USER $USERNAME

EXPOSE 8000 3000 9003

HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD php -v || exit 1

CMD ["sleep", "infinity"]
