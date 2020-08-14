# load MySQL image
FROM mysql

EXPOSE 3306
# copy database initialization script
COPY init.sql /docker-entrypoint-initdb.d/init.sql
