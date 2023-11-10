-- All role
INSERT INTO allrole VALUES(1, 'admin');
INSERT INTO allrole VALUES(2, 'customer');
-- Cake type 
INSERT INTO cake_type VALUES('mar', 'Macaron', 100);
INSERT INTO cake_type VALUES('don', 'Donut', 100);
-- Cake
--  + Macaron
INSERT INTO cake VALUES('mar_choco', 'Chocolate Macaron', 25000, 'Made with real cocoa powder','choco_maca.png' ,'mar', 20);
INSERT INTO cake VALUES('mar_vani', 'Vanilla Macaron', 25000, 'Filled with a dreamy buttercream filling','vani_maca.png' ,'mar', 20);
INSERT INTO cake VALUES('mar_coffee', 'Coffee Macaron', 25000, 'Coffee macaron is always popular and feature a beautiful beige color','coffee_maca.png' ,'mar', 20);
INSERT INTO cake VALUES('mar_cookie_cream', 'Cookies and Cream Macaron', 25000, 'This recipe is a must-try for Oreo lovers!','cookies_cream_maca.png' ,'mar', 20);
INSERT INTO cake VALUES('mar_cherry', 'Cherry Macaron', 25000, 'Cherry macarons are a more unusual flavor to add to your macaron repertoire.','cherry_maca' ,'mar', 20);
--  + Donut
INSERT INTO cake VALUES('don_yeast', 'Yeast Donuts', 25000, 'This donut type uses yeast as a leavener, giving it a light and airy interior.','yeast_donuts.png' ,'don', 20);
INSERT INTO cake VALUES('don_cake', 'Cake Donuts', 25000, 'These have a dense base that will hold all your favorite toppings, from sprinkles to bacon','cake_donuts.png' ,'don', 20);
INSERT INTO cake VALUES('don_potato', 'Potato Donuts', 25000, 'This donut type uses mashed potatoes or potato starch instead of flour.','potato_donuts.png' ,'don', 20);
INSERT INTO cake VALUES('don_holes', 'Donuts Holes', 25000, 'They may be filled with cream, sprinkled with powdered sugar, or glazed.','hole_donuts.png' ,'don', 20);
INSERT INTO cake VALUES('don_beignet', 'Beignet', 25000, 'This deep-fried yeasted doughnut is of French origin.','beignet_donuts.png' ,'don', 20);