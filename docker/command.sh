#!/bin/bash

docker exec -it `docker ps |grep coder-dojo-poznan-httpd |awk '{ print $1 }'|tail -n+1` /var/www/html/bin/command $@
