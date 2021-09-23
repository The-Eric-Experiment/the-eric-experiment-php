# Dockerfile
FROM php:7.4-apache

RUN apt-get update --fix-missing
RUN apt-get install -y curl
RUN apt-get install -y build-essential libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
  && docker-php-ext-install gd

RUN curl -sL https://deb.nodesource.com/setup_12.x  | bash -
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update -qq && apt-get install -y nodejs yarn

RUN ln -s /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN chmod 755 /usr/local/bin/start-apache


RUN a2enmod rewrite
COPY . /var/www
WORKDIR /var/www
RUN ["mkdir", "build"]
RUN yarn
RUN yarn build
RUN chown -R www-data:www-data /var/www/build
# RUN chmod 644 /var/www/.htaccess 
RUN chmod 755 /var/www/build
CMD ["start-apache"]