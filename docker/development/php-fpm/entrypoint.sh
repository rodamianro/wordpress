#!/bin/sh
set -e

USER_ID=${UID:-1000}
GROUP_ID=${GID:-1000}

if [ ! -f /var/www/public/wp-config.php ]; then
    echo "WordPress not found - installing..."
    wp core download --allow-root
    chown -R ${USER_ID}:${GROUP_ID} /var/www/public
fi

echo "Fixing file permissions with UID=${USER_ID} and GID=${GROUP_ID}..."
chown -R ${USER_ID}:${GROUP_ID} /var/www || echo "Some files could not be changed"

exec "$@"
