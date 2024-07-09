FROM php:8.3-fpm

ARG user
ARG uid

RUN apt-get update && apt-get install -y \
    procps \
    curl \
    libonig-dev \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-install mbstring pcntl bcmath zip

COPY --from=composer:2.5.5 /usr/bin/composer /usr/local/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

RUN apt-get install sudo
RUN apt-get install --reinstall bash
RUN apt-get install --reinstall bash-completion

USER $user

VOLUME /home/$user

WORKDIR /home/$user

EXPOSE 80
EXPOSE 22
EXPOSE 443
