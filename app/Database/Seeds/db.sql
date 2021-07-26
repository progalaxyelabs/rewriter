create table generic_templates (
  generic_template_id int not null auto_increment,
  generic_template_name varchar(20) not null,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(generic_template_id)
);

create table generic_screens (
  generic_screen_id int not null auto_increment,
  generic_screen_name varchar(20) not null,
  generic_template_id int not null,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(generic_screen_id)
);

create table generic_forms (
  generic_form_id int not null auto_increment,
  generic_form_name varchar(20) not null,
  generic_screen_id int not null,
  config text,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(generic_form_id)
);

create table customers (
  customer_id int not null auto_increment,
  customer_full_name varchar(50) not null,
  customer_signin_name varchar(50) not null,
  customer_password varchar(255) not null,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(customer_id)
);

create table customer_biz (
  customer_biz_id int not null auto_increment,
  customer_id int not null,
  customer_biz_name varchar(50) not null,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(customer_biz_id)
);

create table biz_screens (
  biz_screen_id int not null auto_increment,
  biz_screen_name varchar(50) not null,
  customer_biz_id int not null,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(biz_screen_id)
);

create table biz_forms (
  biz_form_id int not null auto_increment,
  biz_form_name varchar(50) not null,
  biz_screen_id int not null,
  config text,
  created_at datetime not null default current_timestamp(),
  last_updated_at datetime not null default current_timestamp() on update current_timestamp(),
  primary key(biz_form_id)
);