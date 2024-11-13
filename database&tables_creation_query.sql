create database PHP_project;
use PHP_project;

create table categories(
category_id int primary key auto_increment,
category_name varchar(255)
);

create table brands(
brand_id int primary key auto_increment,
brand_name varchar(255)
);

create table products(
product_id int primary key auto_increment,
product_name varchar(255),
product_price int,
product_model varchar(255),
product_specification varchar(255),
product_image varchar(255),
category_id int,
brand_id int,
FOREIGN KEY (category_id) REFERENCES categories(category_id),
FOREIGN KEY (brand_id) REFERENCES brands(brand_id)
);
