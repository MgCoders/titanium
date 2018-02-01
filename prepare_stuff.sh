#!/usr/bin/env bash
#/bin/bash
set -x
mkdir -p /home/ubuntu/wp-"$DEPLOYMENT_GROUP_NAME"-files
if [ ! -f /home/ubuntu/conf/wp-"$DEPLOYMENT_GROUP_NAME"-deploy.env ]; then
    echo "/home/ubuntu/conf/wp-"$DEPLOYMENT_GROUP_NAME"-deploy.env not found" && exit 1;
fi

