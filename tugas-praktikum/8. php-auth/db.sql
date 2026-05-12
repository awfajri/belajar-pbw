CREATE DATABASE my_blog;
USE my_blog;

CREATE TABLE user (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    name varchar(50),
    email varchar(100),
    password varchar(100)
);