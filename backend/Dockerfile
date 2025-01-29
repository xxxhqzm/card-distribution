FROM php:7.4-cli

WORKDIR /var/www/html

COPY . /var/www/html

# Expose port 80 for access
EXPOSE 80

# Run PHP built-in server
CMD ["php", "-S", "0.0.0.0:80", "index.php"]
