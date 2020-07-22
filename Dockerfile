FROM helppc/web-application:latest


# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

WORKDIR /application
# Installing composer and prestissimo globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1 COMPOSER_MEMORY_LIMIT=-1

COPY . /application
RUN chown -R www-data:www-data /application
RUN rm -rf qa.sh
RUN rm -rf http-client
RUN composer install

RUN rm -rf /usr/bin/composer
