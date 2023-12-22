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
    percentDiscount float default 0,
    paid int default 0,
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
create table revenue_report
(
	month_check int unique,
    year_check int unique,
    sold_mar int,
    sold_don int,
    revenue int
);

alter table cake add constraint check_price check(price > 0);
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


-- Trigger add total of order_detail to total_money of cake_order. Add number of sold cake to revenue_report table
DELIMITER //
create trigger before_order_detail_insert
before insert on order_detail
for each row
begin
	declare current_order_total int;
    declare cake_price int;
    declare isDis int;
    declare dis_price int;
    select total_money into current_order_total
    from cake_order
    where order_id = new.order_id;
    select price, isDiscount, discount_price into cake_price, isDis, dis_price from cake
    where cake_id = new.cake_id;
    if (isDis = 1) then
		set new.total = new.quantity * dis_price;
    else
		set new.total = new.quantity * cake_price;
    end if;
    update cake_order set total_money = current_order_total + new.total
    where order_id = new.order_id;
end;
//
DELIMITER ;
-- Update total_money when delete an order detail
DELIMITER //
CREATE TRIGGER after_delete_order_detail
AFTER DELETE ON order_detail
FOR EACH ROW
BEGIN
    DECLARE current_total_money int;

    SELECT total_money INTO current_total_money
    FROM cake_order
    WHERE order_id = OLD.order_id;

    UPDATE cake_order
    SET total_money = current_total_money - OLD.total
    WHERE order_id = OLD.order_id;
    
    IF NOT EXISTS (
        SELECT 1
        FROM order_detail
        WHERE order_id = OLD.order_id
    ) THEN
        DELETE FROM cake_order
        WHERE order_id = OLD.order_id;
    END IF;
END;
//
DELIMITER ;
-- Auto update value in revenue_report table
DELIMITER //
CREATE TRIGGER update_revenue_report
AFTER INSERT ON order_detail
FOR EACH ROW
BEGIN
	DECLARE or_date DATETIME;
    DECLARE month_val INT;
    DECLARE year_val INT;
    DECLARE record_count INT;
    
    SELECT order_date into or_date
    from cake_order
    where order_id = NEW.order_id;
    SET month_val = MONTH(or_date);
    SET year_val = YEAR(or_date);
    
    SELECT COUNT(*) INTO record_count
    FROM revenue_report
    WHERE month_check = month_val AND year_check = year_val;

    IF record_count > 0 THEN
        IF NEW.cake_id LIKE 'mar%' THEN
            UPDATE revenue_report
            SET sold_mar = sold_mar + NEW.quantity
            WHERE month_check = month_val AND year_check = year_val;
        ELSEIF NEW.cake_id LIKE 'don%' THEN
            UPDATE revenue_report
            SET sold_don = sold_don + NEW.quantity
            WHERE month_check = month_val AND year_check = year_val;
        END IF;
    ELSE
        INSERT INTO revenue_report (month_check, year_check, sold_mar, sold_don, revenue)
        VALUES (month_val, year_val, IF(NEW.cake_id LIKE 'mar%', NEW.quantity, 0),
                IF(NEW.cake_id LIKE 'don%', NEW.quantity, 0), 0);
    END IF;
    update revenue_report set revenue = revenue + new.total
	where month_check = month_val and year_check = year_val;
END;
//
DELIMITER ;

drop table users;
drop table cake;
drop table order_detail;
drop table cake_order;
drop table cake_type;
drop table allrole;
drop table revenue_report;