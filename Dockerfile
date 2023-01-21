FROM php:7.4-apache
WORKDIR /var/www/html
COPY private/ private/
COPY public_html/ public_html/
EXPOSE 80
