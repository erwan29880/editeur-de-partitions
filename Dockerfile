FROM php:8.0-apache


RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd
	
	
RUN apt-get install -y zlib1g-dev libzip-dev 
RUN docker-php-ext-install pdo pdo_mysql mysqli zip
RUN a2enmod rewrite

RUN sed -i '/#!\/bin\/sh/aecho "$(hostname -i)\t$(hostname) $(hostname).localhost" >> /etc/hosts' /usr/local/bin/docker-php-entrypoint
RUN rm -rf /var/lib/apt/lists/*

EXPOSE 80/tcp
