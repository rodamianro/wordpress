#!/bin/sh
set -e

USER_ID=${UID:-1000}
GROUP_ID=${GID:-1000}

if [ ! -f /home/node/app ]; then
    chown -R ${USER_ID}:${GROUP_ID} /home/node/app || echo "Some files could not be changed"
fi

exec "$@"
