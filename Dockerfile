# Dockerfile
# https://github.com/eriksoderblom/alpine-apache-php
FROM alpine:3.17

RUN apk --no-cache --update add \
    apache2 \
    apache2-ssl \
    curl \
    php81-apache2 \
    # php81-bcmath \
    # php81-bz2 \
    # php81-calendar \
    php81-common \
    php81-ctype \
    php81-curl \
    # php81-dom \
    php81-gd \
    # php81-iconv \
    # php81-mbstring \
    # php81-mysqli \
    # php81-mysqlnd \
    php81-openssl \
    # php81-pdo_mysql \
    # php81-pdo_pgsql \
    php81-sqlite3 \
    php81-pdo_sqlite \
    # php81-phar \
    # php81-session \
    # php81-xml \
    && mkdir /htdocs

RUN apk add nodejs yarn --repository="http://dl-cdn.alpinelinux.org/alpine/v3.15/main/"
ENV NODE_OPTIONS --openssl-legacy-provider

EXPOSE 80 443

RUN mkdir -p /build-temp
COPY . /build-temp
WORKDIR /build-temp

RUN yarn

RUN yarn build

RUN mv /build-temp/build/* /htdocs
COPY configs/.htaccess /htdocs/.htaccess

# RUN a2enmod rewrite

WORKDIR /htdocs

RUN chown -R www-data:www-data /htdocs
RUN chmod 644 /htdocs/.htaccess
RUN chmod 755 /htdocs

RUN rm -rf /build-temp

ADD docker-entrypoint.sh /

HEALTHCHECK CMD wget -q --no-cache --spider localhost

RUN ["chmod", "+x", "/docker-entrypoint.sh"]

ENTRYPOINT ["/docker-entrypoint.sh"]
