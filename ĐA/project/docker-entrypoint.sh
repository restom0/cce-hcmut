#!/bin/sh
set -e

# Laravel refuses to boot without an APP_KEY. If the environment did not supply
# one, fall back to .env.example and generate a throwaway key so the container
# comes up on a fresh clone.
if [ -z "${APP_KEY}" ] && [ ! -f .env ]; then
  cp .env.example .env
  php artisan key:generate --force
fi

# Off by default: the compose file seeds the database from db_banhang_data.sql,
# which already contains the shop's tables. Migrating on top would collide. Set
# RUN_MIGRATIONS=true when starting against an empty database instead.
if [ "${RUN_MIGRATIONS}" = "true" ]; then
  php artisan migrate --force
fi

exec "$@"
