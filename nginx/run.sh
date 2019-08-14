#!/bin/bash

# Fail on any error
set -o errexit

# Example of using environment variable in configuration at runtime
if [ ! -n "$NGINX_ERROR_LOG_LEVEL" ] ; then
    NGINX_ERROR_LOG_LEVEL="warn"
fi
sed -i "s|\${NGINX_ERROR_LOG_LEVEL}|${NGINX_ERROR_LOG_LEVEL}|" /etc/nginx/nginx.conf

if [ ! -n "$SERVER_NAME" ] ; then
    SERVER_NAME="app"
fi
sed -i "s|\${SERVER_NAME}|${SERVER_NAME}|" /etc/nginx/nginx.conf

if [ ! -n "$FASTCGI_PASS_HOST" ] ; then
    FASTCGI_PASS_HOST="phpfpm"
fi
sed -i "s|\${FASTCGI_PASS_HOST}|${FASTCGI_PASS_HOST}|" /etc/nginx/nginx.conf

# Run nginx
nginx -g 'daemon off;'
