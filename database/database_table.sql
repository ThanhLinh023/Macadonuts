create database webmacadonuts;
use webmacadonuts;
create table users
(
	user_id varchar(255) not null unique,
    username varchar(255) unique,
    name varchar(255),
    phone varchar(20),
    password varchar(255),
    email varchar(255) unique,
    user_role int,
    constraint primary key(user_id)
);
create table allrole
(
	role_id int not null,
    name varchar(255),
    constraint primary key(role_id)
);
create table cake
(
	cake_id varchar(255) not null unique,
    cake_name varchar(255),
    price int,
    note varchar(255),
    image varchar(255),
    cake_type varchar(255),
    isDiscount int default 0,
    discount_price int default 0,
    constraint primary key(cake_id)
);
create table cake_type
(
	type_id varchar(255) not null,
    type_name varchar(255),
    constraint primary key(type_id)
);
create table order_detail
(
	order_id varchar(255) not null,
    cake_id varchar(255) not null,
    quantity int,
    total int,
    constraint primary key(order_id, cake_id)
);
create table cake_order
(
	order_id varchar(255) not null,
    user_id varchar(255),
    total_money int default 0,
    order_date datetime,
    constraint primary key(order_id)
);
create table revenue_report
(
	month_check int, 
    year_check int,
    sold_quantity int,
    revenue int
);
create table vouchers
(
	voucher_code varchar(50) unique not null,
    discount_percentage float,
    min_order int,
    constraint primary key(voucher_code)
);


alter table users add constraint fk_user_role foreign key (user_role) references allrole(role_id);
alter table cake add constraint fk_cake_type foreign key (cake_type) references cake_type(type_id);
alter table order_detail add constraint fk_detail_cake foreign key (cake_id) references cake(cake_id);
alter table order_detail add constraint fk_detail_order foreign key (order_id) references cake_order(order_id);
alter table cake_order add constraint fk_user_order foreign key (user_id) references users(user_id);


alter table users drop constraint fk_user_role;
alter table cake drop constraint fk_cake_type;
alter table order_detail drop constraint fk_detail_cake;
alter table order_detail drop constraint fk_detail_order;
alter table cake_order drop constraint fk_user_order;



drop table users;
drop table cake;
drop table order_detail;
drop table cake_order;
drop table cake_type;
drop table allrole;
drop table revenue_report;