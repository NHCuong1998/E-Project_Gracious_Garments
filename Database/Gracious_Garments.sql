CREATE DATABASE WebDoAn;

USE WebDoAn;

ALTER DATABASE WebDoAn
DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;

CREATE TABLE Account(
	ID int NOT NULL AUTO_INCREMENT,
	UserName varchar(20) NOT NULL,
	Password varchar(20) NOT NULL,
	Email varchar(100) NOT NULL,
	PhoneNumber varchar(20),
	Address varchar(1000),
	FullName varchar(100),
	Gender varchar(10),
	IsAdmin boolean DEFAULT 0 NOT NULL,
	ProfilePicture varchar(1000),
	Status boolean DEFAULT 1 NOT NULL,
	PRIMARY KEY (ID)
) ENGINE = INNODB;

CREATE TABLE Product(
	ID int NOT NULL AUTO_INCREMENT,
	Name varchar(50),
	Description varchar(1000),
	Price int,
	Quantity int,
	ID_ProductType int,
	ID_Model int,
	Size varchar(5),
	Colour varchar(30),
	Image varchar(10000),
	Status boolean DEFAULT 1 NOT NULL,
	IsTrending boolean DEFAULT 1,
	PRIMARY KEY (ID)
) ENGINE = INNODB;

CREATE TABLE ProductType(
	ID int NOT NULL AUTO_INCREMENT,
	Name varchar(100) NOT NULL,
	Gender varchar(10),
	Status boolean DEFAULT 1 NOT NULL,
	PRIMARY KEY (ID)
) ENGINE = INNODB;

CREATE TABLE Model(
	ID int NOT NULL AUTO_INCREMENT,
	NameModel varchar(100),
	ID_ProductType int NOT NULL,
	ID_Brand int NOT NULL,
	PRIMARY KEY (ID)
) ENGINE = INNODB;

CREATE TABLE Brand(
	ID int NOT NULL AUTO_INCREMENT,
	Name varchar(100),
	Status boolean DEFAULT 1 NOT NULL,
	PRIMARY KEY (ID)
) ENGINE = INNODB;

CREATE TABLE Invoice(
	ID int NOT NULL AUTO_INCREMENT,
	ID_Account int NOT NULL,
	IssuedDate datetime,
	FullName varchar(100),
	Address varchar(1000),
	PhoneAddress varchar(20),
	Total int,
	Status boolean DEFAULT 1 NOT NULL,
	PRIMARY KEY (ID)
) ENGINE = INNODB;

CREATE TABLE InvoiceDetail(
	ID_Invoice int NOT NULL,
	ID_Product int NOT NULL,
	Name_Product varchar(50),
	Quantity int,
	Price int,
	CONSTRAINT PK_Invoice PRIMARY KEY (ID_Invoice, ID_Product)
) ENGINE = INNODB;

CREATE TABLE Cart(
	ID_Account int NOT NULL,
	ID_Product int NOT NULL,
	Quantity int,
	CONSTRAINT PK_Cart PRIMARY KEY (ID_Account, ID_Product)
) ENGINE = INNODB;

CREATE TABLE ShippingAddress(
	ID int NOT NULL AUTO_INCREMENT,
	ID_Account int NOT NULL,
	FullName varchar(100),
	PhoneNumber varchar(20),
	Address varchar(1000),
	PRIMARY KEY (ID)
) ENGINE = INNODB;

CREATE TABLE Slide(
	ID int NOT NULL AUTO_INCREMENT,
	Image varchar(1000),
	Status boolean DEFAULT 1 NOT NULL,
	PRIMARY KEY (ID)
)ENGINE = INNODB;

ALTER TABLE ShippingAddress
ADD FOREIGN KEY (ID_Account) REFERENCES Account(ID);

ALTER TABLE Cart
ADD FOREIGN KEY (ID_Account) REFERENCES Account(ID);

ALTER TABLE Cart
ADD FOREIGN KEY (ID_Product) REFERENCES Product(ID);

ALTER TABLE InvoiceDetail
ADD FOREIGN KEY (ID_Invoice) REFERENCES Invoice(ID);

ALTER TABLE InvoiceDetail
ADD FOREIGN KEY (ID_Product) REFERENCES Product(ID);

ALTER TABLE Invoice
ADD FOREIGN KEY (ID_Account) REFERENCES Account(ID);

ALTER TABLE Product
ADD FOREIGN KEY (ID_ProductType) REFERENCES ProductType(ID);

ALTER TABLE Product
ADD FOREIGN KEY (ID_Model) REFERENCES Model(ID);

ALTER TABLE Model
ADD FOREIGN KEY (ID_ProductType) REFERENCES ProductType(ID);

ALTER TABLE Model
ADD FOREIGN KEY (ID_Brand) REFERENCES Brand(ID);

INSERT INTO Brand (ID, Name, Status) VALUES (1, 'Yame', 1);
INSERT INTO Brand (ID, Name, Status) VALUES (2, 'Uniqlo', 1);
INSERT INTO Brand (ID, Name, Status) VALUES (3, 'Nike', 1);
INSERT INTO Brand (ID, Name, Status) VALUES (4, 'Adidas', 1);
INSERT INTO Brand (ID, Name, Status) VALUES (5, 'Zara', 1);
INSERT INTO Brand (ID, Name, Status) VALUES (6, 'H&M', 1);

INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (1, 'Sportswear for Men', 'Men', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (2, 'Sportswear for Woman', 'Women', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (3, 'Shorts for Men', 'Men', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (4, 'Shorts for Women', 'Women', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (5, 'Dress', 'Women', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (6, 'T-shirt for Men', 'Men', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (7, 'T-Shirt for Women', 'Women', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (8, 'Pants for Men', 'Men', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (9, 'Pants for Women', 'Women', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (10, 'Hoodies for Men', 'Men', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (11, 'Hoodies for Woman', 'Women', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (12, 'Jackets for Men', 'Men', 1);
INSERT INTO ProductType (ID, Name, Gender, Status) VALUES (13, 'Jackets for Women', 'Women', 1);

INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (1, 'Adidas Sweater', 11, 4);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (2, 'Adidas Jacket', 12, 4);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (3, 'Adidas Short', 10, 4);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (4, 'Adidas Hoodies', 13, 4);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (5, 'Adidas T-Shirt', 7, 4);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (6, 'Adidas Pants', 9, 4);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (7, 'Adidas T-Shirt', 6, 4);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (8, 'Nike Hoodies', 10, 3);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (9, 'Nike Sportswear', 1, 3);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (10, 'Nike Short', 3, 3);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (11, 'Nike T-Shirt', 6, 3);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (12, 'Nike Pants', 8, 3);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (13, 'Nike T-Shirt', 7, 3);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (14, 'Nike Hoodies', 11, 3);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (15, 'Nike Pants', 9, 3);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (16, 'H&M T-Shirt', 6, 6);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (17, 'H&M Jackets', 12, 6);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (18, 'H&M Pants', 8, 6);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (19, 'H&M Pants', 9, 6);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (20, 'H&M Pants', 5, 6);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (21, 'Uniqlo Pants', 8, 2);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (22, 'Uniqlo Hoodies', 10, 2);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (23, 'Uniqlo Short', 4, 2);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (24, 'Uniqlo Pants', 9, 2);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (25, 'Uniqlo Dresses', 5, 2);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (26, 'Zara T-Shirt', 6, 5);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (27, 'Zara Pants', 8, 5);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (28, 'Zara Dresses', 5, 5);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (29, 'Zara T-shirt', 7, 5);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (30, 'Yame Hoodies', 10, 1);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (31, 'Yame Tshirt', 6, 1);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (32, 'Yame Pants', 8, 1);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (33, 'Yame Jackets', 13, 1);
INSERT INTO Model(ID, NameModel, ID_ProductType, ID_Brand) VALUE (34, 'Yame Tshirt', 7, 1);

INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (1, 'ADIDAS Z.N.E. HOODIE', 'You can still feel the vibration of the stands, the fans, the blood pumping through your veins. In the quiet of the locker room, let it all sink in after the game in the adidas Z.N.E Hoodie. Then head out and celebrate.', '100', '50',11, 1, 'XL', 'Black', '1.jpg', 1, 1 );
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (2,'OWN THE RUN HOODED WIND JACKET','Ignore the forecast. This adidas running jacket keeps you comfortable whatever the weather. The hooded jacket is water-repellent, so it can handle gusts of wind and sudden showers. Reflectivity on all sides lets you stand out in the gloom.', '70', '50',12 , 2, 'XL', 'Black','2', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (3, 'TIRO 19 TRAINING PANTS', 'Breathable track pants that are built to move.Train hard. Stay cool. These soccer pants battle the heat with breathable, quick-drying fabric. Cut for movement, they have a slim fit down the leg and stretchy ribbed details on the lower legs to promote clean footwork. Ankle zips allow you to pull them on or off over shoes.', '65', '45', 1, 3, 'M', 'Power Red / White', '3.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (4, 'ADIDAS ADICOLOR 3-STRIPES TIGHTS','What your color? Adicolor tells the story of the 3-Stripes in a spectrum of shades. Go sporty in these leggings. The classic mid rise pairs well with crop tops. Cotton jersey feels soft, stretchy and comfy.','40', '50',2, 1, 'S', 'Black / White', '4.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (5, 'TIRO 19 TRAINING PANTS', 'Train hard. Stay cool. These soccer pants battle the heat with breathable, quick-drying fabric. Cut for movement, they have a slim fit down the leg and stretchy ribbed details on the lower legs to promote clean footwork. Ankle zips allow you to pull them on or off over shoes.','45', '50', 1, 3, 'XL', 'Grey / White', '5.jpg', 1, 1);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (6, 'TIRO TRACK JACKET', 'Train hard. Stay dry. This soccer jacket is made of soft, sweat-wicking fabric that keeps you moving on the practice field. Stretch panels at the elbows and sides give you a full range of motion as you work.','50', '50', 13, 4, 'XL','Black / White', '6.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (7, 'TIRO 19 TRAINING JACKET', 'Train hard. Stay dry. This soccer jacket is made of soft, sweat-wicking fabric that keeps you moving through the toughest training sessions. Stretch panels at the elbows and sides give you unrestricted movement as you practice for the big one.', '50','50', 13, 4, 'XL', 'Grey / Clear Onix / White', '7.jpg',1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (8, 'TRAINING TEE HEAT.RDY', 'From hot outdoor workouts to steamy sessions in the studio. Beat the heat in this adidas training t-shirt. The featherlight fabric feels cool as the other side of the pillow. Mesh panels with a subtle zigzag pattern cover the areas where you sweat the most.', '70', '35', 7, 5, 'XL', 'Glory Blue','8.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (9, 'TRAINING 7/8 TIGHTS HEAT.RDY', 'Get out of your head and into your body. These adidas training tights keep you cool, no matter your workout of choice. That way your focus stays on your breath. Or your punching form. Or smoothing out the transitions between dance moves. The stretchy fabric supports your muscles with a compression fit. The laser-cut perforations are for equal parts comfort and style.', '68', '24', 9, 6, 'M', ' Tech Indigo', '9.jpg',1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (10, 'SST TRACK PANTS', 'A sporty essential infused with modern spirit. These track pants maintain all the authentic details for a true heritage look. They are designed in tricot, a fabric with a matte finish that is smooth and slightly stretchy for comfortable movement. A slim, tailored fit brings this style into the here and now.', '65', '84', 9, 6, 'M', 'Black', '10.jpg',1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (11, 'TREFOIL TEE', 'The Trefoil debuted in 1972, and it is been making headlines ever since. This t-shirt celebrates the iconic symbol with a contrast Trefoil logo printed on the chest. Cotton jersey gives it a soft and stretchy feel.', '30', '35', 6, 6, 'XL', 'White / Black', '11.jpg',1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (12, '3-STRIPES LEGGINGS', 'The instantly recognizable 3-Stripes have been synonymous with adidas since its inception. Celebrating its rich history, adidas reaches back into the archives to bring iconic designs to the modern streets.', '40', '12', 9, 10, 'S', 'Black', '12.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (13, 'OWN THE RUN 3-STRIPES PB TANK TOP', 'Fast runs, leisurely jogs and everything in between. This adidas singlet is made of lightweight fabric that absorbs moisture, so you do not have to think about it. Curved hems give you just the right amount of coverage.', '30', '72', 7, 5, 'M', 'Glory Blue', '13.jpg', 1, 0);


INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (14, 'Nike Sportswear Tech Fleece', 'Nike Sportswear Tech Fleece', '102', '34', 10, 8, 'XL', 'Dark Grey Heather', '14.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (15, 'Nike Sportswear Tech Fleece',' Nike Sportswear Tech Fleece Jogger gives you all-day comfort in a modern, tapered silhouette. Crafted with the lightweight warmth of Tech Fleece fabric, it features a stretchy waistband for the perfect fit.', '87', '54', 1, 9, 'M','Dark Grey Heather', '15.jpg', 1, 1);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (16, 'Nike Dri-FIT', 'The Nike Dri-FIT Shorts blend on-court playability with all-day wearability. Made from lightweight, breathable fabric with an effortless feel, they feature a premium Swoosh design cut and sewn into the fabric.', '56', '65', 3, 10, 'XL', 'Obsidian','16.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (17, 'Nike Dri-FIT', 'The Nike Dri-FIT T-Shirt delivers a soft feel, sweat-wicking performance and a great range of motion to get you through your workout in total comfort.', '75', '23', 6 , 11, 'M', 'White/Black','17', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (18, 'Nike SB Flex FTM', 'The Nike SB Flex FTM Cargo Trousers let you charge hard in stretchy, durable fabric. Adjustable cuffs and multiple pockets set you up for a long day on your board.', '104', '76', 8, 12 , 'XL', 'Medium Olive', '18.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (19, 'Nike Swoosh', 'The Nike Swoosh T-Shirt is made on soft, lightweight cotton with an all-over graphic and a bold Nike logo.', '40', '50', 6, 11, 'M', 'Black', '19.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (20, 'Nike Dri-FIT', 'The Nike Dri-FIT Top is built for the basketball court. Made from sweat-wicking fabric, it feels soft and lightweight and features a hem designed to keep you covered and let you move freely.', '41', '50', 7, 13, 'M', 'Black/White', '20.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (21, 'Nike Sportswear Windrunner Tech Fleece', 'The Nike Sportswear Windrunner Tech Fleece Women Full-Zip Hoodie updates an iconic silhouette with the lightweight warmth of Nike Tech Fleece fabric. It features the classic chevron design, inspired by the original Windrunner Jacket.', '115', '50', 11, 14, 'M', 'Mulberry Rose', '21.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (22, 'Nike Sportswear', 'Featuring bold a Swoosh graphic and ripstop woven material, the Nike Sportswear Swoosh Trousers give you lightweight comfort and modern, street-ready style.', '78', '50', 9, 15, 'XL', 'Black/White', '22.jpg', 1, 0);

INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (23, 'Regular Fit Collarless Shirt','Collarless shirt in woven cotton fabric. Open chest pocket, classic button placket, long sleeves with cuffs, and yoke at back. Rounded hem. Regular fit – a classic fit with good room for movement and a gently shaped waist for a comfortable, tailored silhouette.', '25', '50', 6, 16, 'XL', 'Uhite', '23.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (24, 'Printed Graphic T-shirt ','Straight-cut T-shirt in soft cotton jersey with a printed design. Narrow ribbing at neckline.', '18', '54', 6, 16, 'XL', 'Light Pink', '24.jpg', 1, 1);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (25, 'Shirt Jacket', 'Shirt jacket in airy cotton poplin. Collar, concealed zipper at front, and a yoke at back. Chest pockets with a flap, pleat, and concealed snap fasteners. Welt pocket at each side and long sleeves with button at cuffs. Unlined.', '30', '50', 12, 17, 'M', 'Black', '25.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (26, 'Patterned Windbreaker', 'Patterned windbreaker in woven fabric with a slight sheen. Double-layered hood with elasticized drawstring, zipper at front, and side pockets with zipper. Elasticized cuffs and elastic drawstring at hem. Printed designs on chest, one sleeve, and at back. Mesh lining.', '40', '50', 12, 17, 'XL', 'Dark green', '26.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (27, 'Cotton Cargo Joggers', 'Joggers in cotton twill. Elasticized drawstring waistband, side pockets, and back and leg pockets with flap and concealed snap fasteners. Tapered legs with seams at knees and ribbed hems.', '35', '54', 8, 18, 'S', 'Dark khaki green', '27.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (28, 'Twill Cargo Pants', 'Ankle-length pants in cotton twill. High waist, elasticized waistband, side pockets, and leg pockets with flap. Tapered legs with elasticized hems.', '18', '50', 9, 19, 'M', 'Khaki green', '28.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (29, 'Tie Belt Dress', 'Calf-length dress in airy, woven viscose fabric. Small stand-up collar with gathers, buttons at front, and short sleeves. Removable tie belt at waist and concealed side-seam pockets. Unlined.', '35', '50', 5, 20, 'XL', 'Green', '29.jpg', 1, 0);


INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (30, 'WIDE-FIT SWEATPANTS', 'Inspired by vintage athletic sweats. Elegant fleece-lined material that looks great with casual outfits.', '40', '42', 8, 21, 'M', 'Black', '30.jpg', 1, 1);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (31, 'WIDE-FIT LONG-SLEEVE SWEATSHIRT', 'Inspired by vintage athletic sweats. Elegant fleece-lined material that looks great with casual outfits.', '41', '50', 10, 22, 'XL', 'Grey', '31.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (32, 'DENIM RELAXED SHORTS', 'These easy-waist shorts are sailor pants made more casual and comfortable, to go perfectly with the current fashion.', '40', '52', 4, 23, 'M', 'Black', '32.jpg', 1, 1);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (33, 'SIMILAR ITEMS WOMEN LINEN COTTON RELAXED SHORTS', 'Paper bag design that gives you effortless styling. A pair that you can easily style with on-trend looks.', '20', '50', 4, 23, 'XL', 'Pink', '33.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (34, 'WOMEN SWEATPANTS', 'You will love how they look clean, while not showing the leg lines too much. Great for for inside and outside the house.', '19', '42', 8, 24, 'S', 'Light Blue', '34.jpg', 1 , 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (35, 'MERCERIZED COTTON V-NECK A-LINE LONG DRESS', 'This dress features mercerized 100% cotton for a lustrous finish that gives it a high-quality look.', '21', '46', 5, 25, 'XL', 'Black', '35', 1, 0);

INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (36, 'T-SHIRT WITH CONTRAST POCKET', 'Loose-fitting T-shirt made of a linen and cotton blend. Featuring short sleeves, a round neck, patch pocket with flap on the chest and side vents at the hem.', '32', '50', 6, 26, 'XL', 'Black', '36.jpg', 1, 1);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (37, 'ANDY WARHOL BEETHOVEN T-SHIRT', 'Round neck T-shirt with long sleeves and contrast ©®™ The Andy Warhol Foundation, Inc. print details.', '25', '64', 6, 26, 'S', 'White', '37.jpg', 1, 2);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (38, 'RUSTIC JOGGER WAIST TROUSERS', 'Jogger fit trousers in a linen blend. Featuring an elastic waistband with adjustable drawstrings, front pockets and a back patch pockets. Elastic cuffs.', '20', '45', 8, 27, 'M', 'Natural', '38.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (39, 'JOGGING TROUSERS WITH STRIPES', 'Skinny fit jogging trousers with an adjustable elastic waist. Front pockets with thermo-sealed zip closure and rear welt pockets. Matching side panels. Cuffed elastic hems.', '38', '54', 8, 27, 'XL', 'Navy Blue', '39.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (40, 'PRINTED DRESS', 'Midi dress with a straight-cut neckline and straps. Featuring pleated detail and button fastening on the straps.', '38', '50',5, 28, 'XL', 'Sand', '40.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (41, 'RUFFLED PRINTED DRESS', 'Short dress with a V-neckline and puff sleeves falling below the elbow. Ruffle trims, lining and a buttoned opening at the back.', '38', '42', 5, 28, 'S', 'ONLY ONE', '41.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (42, 'RIBBED HALTER TOPDETAILS', 'Halter top with ribbed trims.', '10', '74', 7, 29, 'x', 'Black', '42.jpg', 1, 0);

INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (43, 'Hoodie Coat Y2010 D01', '4-way stretch should make it comfortable to wear. Absorb sweat well, breathable.', '75', '35', 10, 30, 'S', 'Black', '43.jpg', 1, 1);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (44, 'Men T-shirts Y2010 Basic AM01', 'Good sweat absorbency feels cool', '30', '50', 6, 31, 'L', 'Black', 'p44.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (45, 'Men T-shirts Y2010 Basic AC01','Good insulation, high color fastness.Elastic, good hygroscopic and sweat absorbent.', '35', '45', 6, 31, 'L', 'Ash Gray', '45.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (46, 'Men T-shirts Y2010 Neck C01', 'Good sweat absorbency feels cool', '40', '50', 6, 31, 'XL', 'White', '46.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (47, 'Trousers No Style HG07', 'Good insulation, high color fastness.Elastic, good hygroscopic and sweat absorbent.', '70', '40', 8, 32, 'M', 'Black', '47.jpg', 1, 1);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (48, 'Adachi Women Jacket F01', 'Ignore the forecast. This adidas running jacket keeps you comfortable whatever the weather. The hooded jacket is water-repellent, so it can handle gusts of wind and sudden showers. Reflectivity on all sides lets you stand out in the gloom.', '65', '42', 13,  33, 'L', 'Black', '48.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (49, 'Adachi Basic T-shirt AH01', 'Unisex style, more comfortable & personality when wearing a couple.', '28', '50', 7, 34, 'L', 'Turquoise', '49.jpg', 1, 0);
INSERT INTO Product (ID, Name, Description, Price, Quantity, ID_ProductType, ID_Model, Size, Colour, Image, Status, IsTrending) VALUES (50, 'KiriMaru ST03 Women Jacket', 'Ignore the forecast. This adidas running jacket keeps you comfortable whatever the weather. The hooded jacket is water-repellent, so it can handle gusts of wind and sudden showers. Reflectivity on all sides lets you stand out in the gloom.', '65', '50', 13, 33, 'S','Green', '50.jpg', 1, 1);

INSERT INTO account (UserName, Password, Email, PhoneNumber, Address, FullName, Gender, IsAdmin, ProfilePicture, Status) VALUES ('admin', 'admin', 'admin@webdoan.com', '01234567890', 'Tp Hồ Chí Minh', 'Nguyễn Văn Ad Min', 'Male', 1, 'admin.jpg' , 1);
INSERT INTO account (UserName, Password, Email, PhoneNumber, Address, FullName, Gender, IsAdmin, ProfilePicture, Status) VALUES ('test1', '123456', 'test@gmail.com', '0905123456', 'Hà Nội', 'Nguyễn Văn A', 'Male', 0, 'test1.jpg', 1);
INSERT INTO account (UserName, Password, Email, PhoneNumber, Address, FullName, Gender, IsAdmin, ProfilePicture, Status) VALUES ('customer', '123456', 'customer@gmail.com', '0987654321', 'Huế', 'Trần Thị B', 'Female', 0, 'customer.jpg' , 1);

