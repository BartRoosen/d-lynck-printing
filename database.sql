create table dlp_picture (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    category int(11) not null,
    cover_picture tinyint not null default 0,
    path varchar(100) not null,
    comment text,
    deleted tinyint not null default 0
);

create table dlp_category (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    name varchar(50) not null,
    deleted tinyint not null default 0
);

create table dlp_tags (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    tag_name varchar(50) not null,
    deleted tinyint not null default 0
);

create table dlp_picture_tag (
    picture_id int(11) not null,
    tag_id int(11) not null
);