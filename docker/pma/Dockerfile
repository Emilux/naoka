FROM phpmyadmin/phpmyadmin

RUN a2enmod ssl

RUN rm -f /etc/apache2/sites-available/000-default.conf
ADD ./apache/sites-available/000-default.conf /etc/apache2/sites-available

EXPOSE 443