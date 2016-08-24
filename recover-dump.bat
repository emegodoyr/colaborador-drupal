docker-compose run -T database \
   sh -c 'exec mysqldump -h"database" -P"3306" -u$MYSQL_USER -p"$MYSQL_PASSWORD" $MYSQL_DATABASE' > ./dump/back/colaborador.sql
git add dump/back/colaborador.sql
git commit -m 'backup local database'
git status