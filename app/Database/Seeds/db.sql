create table templates (
    id int not null auto_increment,
    name varchar(20) not null,
    created_at datetime not null default current_timestamp(),
    last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
    primary key(id)
);
insert into templates (name)
values ("Grocery Stores"),
    ("Restaurant"),
    ("Function Hall");
create table screens (
    id int not null auto_increment,
    name varchar(20) not null,
    template_id int not null,
    created_at datetime not null default current_timestamp(),
    last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
    primary key(id)
);
create table forms (
    id int not null auto_increment,
    name varchar(20) not null,
    screen_id int not null,
    created_at datetime not null default current_timestamp(),
    last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
    primary key(id)
);