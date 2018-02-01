#!/usr/bin/env bash
#/bin/bash
set -x
chown -R www-data.www-data /home/ubuntu/wp-"$DEPLOYMENT_GROUP_NAME"-files/plugins
chown -R www-data.www-data /home/ubuntu/wp-"$DEPLOYMENT_GROUP_NAME"-files/uploads
mkdir -p /home/ubuntu/wp-"$DEPLOYMENT_GROUP_NAME"-files
[ -z "$WORDPRESS_DB_PASSWORD" ] && echo "Need to set WORDPRESS_DB_PASSWORD" && exit 1;
[ -z "$WORDPRESS_DB_HOST" ] && echo "Need to set WORDPRESS_DB_HOST" && exit 1;
[ -z "$WORDPRESS_DB_USER" ] && echo "Need to set WORDPRESS_DB_USER" && exit 1;
[ -z "$WORDPRESS_DB_NAME" ] && echo "Need to set WORDPRESS_DB_NAME" && exit 1;
[ -z "$VIRTUAL_HOST" ] && echo "Need to set VIRTUAL_HOST" && exit 1;
[ -z "$LETSENCRYPT_HOST" ] && echo "Need to set LETSENCRYPT_HOST" && exit 1;
[ -z "$LETSENCRYPT_EMAIL" ] && echo "Need to set LETSENCRYPT_EMAIL" && exit 1;
[ -z "$DEPLOYMENT_GROUP_NAME" ] && echo "Need to set APPLICATION_NAME" && exit 1;


