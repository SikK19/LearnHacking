FROM php:8.0-apache
COPY ./src/server.crt /etc/ssl/certs/server.crt
COPY ./src/passphrase-script.sh /etc/ssl/passphrase-script.sh
COPY ./src/server.key /etc/ssl/private/server.key
RUN sed -i '/SSLCertificateFile.*snakeoil\.pem/c\SSLCertificateFile \/etc\/ssl\/certs\/server.crt' /etc/apache2/sites-available/default-ssl.conf && sed -i '/SSLCertificateKeyFile.*snakeoil\.key/cSSLCertificateKeyFile /etc/ssl/private/server.key\' /etc/apache2/sites-available/default-ssl.conf
RUN a2enmod ssl && a2enmod socache_shmcb
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf
WORKDIR /var/www/html
RUN a2ensite default-ssl
RUN apt-get update && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli