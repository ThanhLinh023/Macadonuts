-- All role
INSERT INTO allrole VALUES(1, 'admin');
INSERT INTO allrole VALUES(2, 'customer');
-- Cake type 
INSERT INTO cake_type VALUES('mar', 'Macaron');
INSERT INTO cake_type VALUES('don', 'Donut');
-- Cake
--  + Macaron
INSERT INTO cake(cake_id, cake_name, price, note, image, cake_type) VALUES('mar_choco', 'Chocolate Macaron', 25000, 'Made with real cocoa powder','choco_maca.png' ,'mar');
INSERT INTO cake(cake_id, cake_name, price, note, image, cake_type) VALUES('mar_vani', 'Vanilla Macaron', 25000, 'Filled with a dreamy buttercream filling','vani_maca.png' ,'mar');
INSERT INTO cake(cake_id, cake_name, price, note, image, cake_type) VALUES('mar_coffee', 'Coffee Macaron', 25000, 'Coffee macaron is always popular and feature a beautiful beige color','coffee_maca.png' ,'mar');
INSERT INTO cake(cake_id, cake_name, price, note, image, cake_type) VALUES('mar_cookie_cream', 'Cookies and Cream Macaron', 25000, 'This recipe is a must-try for Oreo lovers!','cookies_cream_maca.png' ,'mar');
INSERT INTO cake VALUES('mar_cherry', 'Cherry Macaron', 45000, 'Cherry macarons are a more unusual flavor to add to your macaron repertoire.','cherry_maca.png' ,'mar', 1, 25000);
--  + Donut
INSERT INTO cake(cake_id, cake_name, price, note, image, cake_type) VALUES('don_yeast', 'Yeast Donuts', 25000, 'This donut type uses yeast as a leavener, giving it a light and airy interior.','yeast_donuts.png' ,'don');
INSERT INTO cake(cake_id, cake_name, price, note, image, cake_type) VALUES('don_cake', 'Cake Donuts', 25000, 'These have a dense base that will hold all your favorite toppings, from sprinkles to bacon','cake_donuts.png' ,'don');
INSERT INTO cake(cake_id, cake_name, price, note, image, cake_type) VALUES('don_potato', 'Potato Donuts', 25000, 'This donut type uses mashed potatoes or potato starch instead of flour.','potato_donuts.png' ,'don');
INSERT INTO cake(cake_id, cake_name, price, note, image, cake_type) VALUES('don_holes', 'Donuts Holes', 25000, 'They may be filled with cream, sprinkled with powdered sugar, or glazed.','hole_donuts.png' ,'don');
INSERT INTO cake VALUES('don_beignet', 'Beignet', 45000, 'This deep-fried yeasted doughnut is of French origin.','beignet_donuts.png' ,'don', 1, 25000);
-- Vouchers
insert into vouchers values ('cake005', 0.2, 179000);
insert into vouchers values ('bigsaleoff', 0.2, 179000);
insert into vouchers values ('chrismas', 0.2, 179000);
insert into vouchers values ('thanksgiving', 0.2, 179000);



-- Trigger add total of order_detail to total_money of cake_order
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
-- Test data
insert into cake_order(order_id, user_id, order_date) values(4281, 6779, '2023-11-18');
insert into order_detail(order_id, cake_id, quantity) values(4281, 'don_cake', 3);
insert into order_detail(order_id, cake_id, quantity) values(4281, 'don_potato', 2);
insert into order_detail(order_id, cake_id, quantity) values(4281, 'mar_choco', 3);


insert into cake_order(order_id, user_id, order_date) values(3672, 6779, '2023-11-19');
insert into order_detail(order_id, cake_id, quantity) values(3672, 'mar_cherry', 3);
insert into order_detail(order_id, cake_id, quantity) values(3672, 'don_yeast', 2);
insert into order_detail(order_id, cake_id, quantity) values(3672, 'mar_coffee', 3);


select cake_order.order_id, cake.cake_name, quantity, price, total from order_detail
left join cake_order on cake_order.order_id = order_detail.order_id
left join cake on order_detail.cake_id = cake.cake_id
left join users on cake_order.user_id = users.user_id
where users.user_id = 6779;

select order_id, total_money from cake_order 
left join users on cake_order.user_id = users.user_id
where users.user_id = 6779;