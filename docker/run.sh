#!/bin/bash

pgsql=`docker ps -a |grep coder-dojo-poznan-pgsql |awk '{ print $1 }'`
httpd=`docker ps -a |grep coder-dojo-poznan-httpd |awk '{ print $1 }'`

if [ -z "`docker ps |grep coder-dojo-poznan-pgsql |awk '{ print $1 }'`" ]
then
	if [ -z "$pgsql" ]
	then
	docker run -d -e DBNAME='db' -e DBUSER='root:password' -p 3044:5432 --name coder-dojo-poznan-pgsql -i -t pgsql-9.4
	else
	docker start $pgsql
	fi
fi

if [ -z "`docker ps |grep coder-dojo-poznan-httpd |awk '{ print $1 }'`" ]
then
	if [ -z "$httpd" ]
	then
	docker run -d -p 2044:80 --privileged -v "`pwd`":/var/www/html --link coder-dojo-poznan-pgsql -i -t coder-dojo-poznan-httpd
	else
	docker start $httpd
	fi
fi
