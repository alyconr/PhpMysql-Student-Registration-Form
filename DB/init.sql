CREATE USER IF NOT EXISTS 'alyconr'@'%';
GRANT ALL PRIVILEGES ON school.* TO 'alyconr'@'%';
FLUSH PRIVILEGES;
CREATE DATABASE IF NOT EXISTS  school;

USE school;

CREATE TABLE IF NOT EXISTS student (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    mobile VARCHAR(255) NOT NULL   
);

INSERT INTO student (name, mobile) VALUES ('alyconr', 1234567890);



