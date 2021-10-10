CREATE DATABASE crudPHP;
USE crudPHP;

CREATE TABLE users_login (
  usename varchar(30) PRIMARY KEY,
  user_pass varchar(50)
)

CREATE TABLE users (
  name varchar(50),
  lastname varchar(50),
  city varchar(50),
  inscription_date varchar(50),
  email varchar(50)
)