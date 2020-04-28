create table dlp_picture (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    category int(11) not null,
    path varchar(100) not null,
    comment text,
    deleted tinyint not null default 0
);

alter table dlp_picture
    add column cover_picture tinyint not null default 0 after category;

create table dlp_category (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    name varchar(50) not null,
    deleted tinyint not null default 0
);