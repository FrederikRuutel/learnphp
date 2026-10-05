#!/usr/bin/env sh
cd "$(dirname "$0")" || exit 1
exec php -S localhost:8000 -t public public/index.php
