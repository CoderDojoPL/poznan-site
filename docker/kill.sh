#!/bin/bash

docker kill `docker ps |grep coder-dojo-poznan |awk '{ print $1 }' |tail -n+1`
