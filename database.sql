/**
 * Author:  afsanchezs
 * Created: 14/12/2019
 */

CREATE DATABASE IF NOT EXISTS tienda;
USE tienda;

CREATE TABLE IF NOT EXISTS users(
id              int(255) auto_increment not null,
role            varchar(20),
name            varchar(100),
surname         varchar(200),
email           varchar(255),
password        varchar(255),
image           varchar(255),
created_at      datetime,
updated_at      datetime,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL, 'admin', 'Admin', 'Admin', 'admin@admin.com', 'administrador', null, CURTIME(), CURTIME(), NULL);

CREATE TABLE IF NOT EXISTS categories(
id              int(255) auto_increment not null,
category_id     int(255), 
name            varchar(100) not null,
image           varchar(255),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_categories PRIMARY KEY(id),
CONSTRAINT fk_sub_category FOREIGN KEY(category_id) REFERENCES categories(id) 
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS products(
id              int(255) auto_increment not null,
category_id     int(255) not null,
name            varchar(100) not null,
description     text,
weight          float(100,2) not null,
price           float(100,2) not null,
image1          varchar(255),
image2          varchar(255),
image3          varchar(255),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_products PRIMARY KEY(id),
CONSTRAINT fk_product_category FOREIGN KEY(category_id) REFERENCES categories(id)
)ENGINE=InnoDb;