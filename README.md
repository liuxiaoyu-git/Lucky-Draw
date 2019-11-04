1)oc new-project lucky-draw

2)部署一个mysql
oc new-app mysql-ephemeral --name mysql -p MYSQL_USER=openshift -p MYSQL_PASSWORD=password -p MYSQL_ROOT_PASSWORD=password -p MYSQL_DATABASE=sampledb

3)创建表
根据table.sql创建表

4)创建应用和相关route
oc new-app https://github.com/liuxiaoyu-git/Lucky-Draw --name=lucky-draw --env MYSQL_SERVICE_HOST=mysql.lucky-draw.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=sampledb DATABASE_USER=openshift DATABASE_PASSWORD=password
oc expose svc lucky-draw 
