#!/usr/bin/env bash
vendor/bin/linter src tests && vendor/bin/codefixer src tests && vendor/bin/codesniffer src tests && vendor/bin/phpstan analyse -c phpstan.neon --memory-limit=512M src && vendor/bin/tester -C tests/php.ini -p php --colors 1 -C tests
