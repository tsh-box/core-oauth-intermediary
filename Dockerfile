FROM million12/nginx-php:php70
MAINTAINER Dominic Price (dominic.price@nottingham.ac.uk)
WORKDIR /opt/oauth-intermediary
COPY nginx-vhost.conf /etc/nginx/hosts.d/nginx-vhost.conf
COPY src/* /data/www/default/
COPY lib /opt/oauth-intermediary
COPY config.php /opt/oauth-intermediary/config.php
