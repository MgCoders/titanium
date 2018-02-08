#!/usr/bin/env bash
#/bin/bash
set -x
cd /home/ubuntu/wp-REPLACE_PROJECT_NAME-deploy
cp ../conf/wp-REPLACE_PROJECT_NAME-deploy.env /home/ubuntu/wp-REPLACE_PROJECT_NAME-deploy/.env
docker-compose -f docker-compose.testing.yml pull && docker-compose -f docker-compose.testing.yml up -d
