#!/usr/bin/env bash
#/bin/bash
set -x
chown -R www-data.www-data /home/ubuntu/wp-"$DEPLOYMENT_GROUP_NAME"-files/plugins
chown -R www-data.www-data /home/ubuntu/wp-"$DEPLOYMENT_GROUP_NAME"-files/uploads
cd /home/ubuntu/wp-"$DEPLOYMENT_GROUP_NAME"-deploy
cp ../conf/"$DEPLOYMENT_GROUP_NAME".env /home/ubuntu/wp-"$DEPLOYMENT_GROUP_NAME"-deploy/.env
echo docker-compose up
docker-compose build && docker-compose up -d
