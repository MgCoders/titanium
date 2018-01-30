#!/usr/bin/env bash
#/bin/bash
set -x
cd /home/ubuntu/wp-titanium-deploy
cp ../conf/wp-calcium-titanium.env /home/ubuntu/wp-titanium-deploy/.env
echo docker-compose up
docker-compose build && docker-compose up -d
