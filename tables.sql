create database gallery;
use gallery;

create table user (
    id int auto_increment primary key,
    name varchar(255),
    password varchar(255),
    email varchar(255),
    created_at datetime,
    updated_at datetime,
    remember_token varchar(255)    
);

create table album (
    id int auto_increment primary key,
    user_id int NOT NULL,
    title varchar(255),
    description text,
    created_at datetime,
    updated_at datetime
);

create table photo (
    id int auto_increment primary key,
    album_id int NOT NULL,
    title varchar(255),
    description text,
    filename varchar(255),

    height int,
    width int,


    created_at datetime,
    updated_at datetime    
);

create table gallery (
    id int auto_increment primary key,
    user_id int NOT NULL,
    title varchar(255),
    description text,
    created_at datetime,
    updated_at datetime
);

create table gallery_photo (
    gallery_id int NOT NULL,
    photo_id int NOT NULL,
    created_at datetime,
    updated_at datetime    
);