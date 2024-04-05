FROM mysql

ENV MYSQL_USER=alyconr
ENV MYSQL_PASSWORD=alyconrpassword

ENV MYSQL_ROOT_PASSWORD=rootpassword

COPY init.sql /docker-entrypoint-initdb.d/init.sql 

EXPOSE 3306

CMD ["mysqld"]



