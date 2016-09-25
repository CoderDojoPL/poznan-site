#!/bin/bash

docker rm -f `docker ps -a |grep coder-dojo-poznan |awk '{ print $1 }'|tail -n+1`
