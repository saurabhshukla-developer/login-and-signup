create database job_task1;
use job_task1;

create table users(
    `id` int(11) primary key auto_increment,
    `name` varchar(255) not null,
    `email` varchar(255) not null,
    `password` varchar(255) not null,
    `contact_number` varchar(255) not null,
    `user_type` varchar(255) not null,
    `status` boolean default 1,
    `cookie_value` varchar(255) default null,
    `cookie_expire` timestamp,
    `created_at` timestamp default current_timestamp
);
