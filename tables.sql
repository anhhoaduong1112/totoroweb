CREATE DATABASE IF NOT EXISTS c2224779_Ghibliweb;

USE c2224779_Ghibliweb;

CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(25)  NOT NULL,
 `email` varchar(50) ,
 `password` varchar(50)  NOT NULL,
 `created_date` datetime NOT NULL,
 PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `movies` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `movie_name` varchar(25)  NOT NULL,
 `intro` varchar(125),
 PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `movie_img` (
 `id` int NOT NULL AUTO_INCREMENT,
 `movie_id` int(11) NOT NULL,
 `img_src` varchar(50)  NOT NULL,
 PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `cart`;

CREATE TABLE IF NOT EXISTS `cart` (
 `id` int NOT NULL AUTO_INCREMENT,
 `movie_img_id` int(11) NOT NULL,
 `product_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `products`;

CREATE TABLE IF NOT EXISTS `products`(
 `id` int NOT NULL AUTO_INCREMENT,
 `item` varchar(25) NOT NULL,
 `img_src` varchar(100) NOT NULL,
 `price` int NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `orders` (
 `id` int NOT NULL AUTO_INCREMENT,
 `order_no` int NOT NULL,
 `user_id` int(11) NOT NULL,
 `no_items` int(11) NOT NULL,
 `amount` int(11) NOT NULL,
 PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `order_item` (
 `id` int NOT NULL AUTO_INCREMENT,
 `order_no` int NOT NULL,
 `user_id` int(11) NOT NULL,
 `product_id` int(11) NOT NULL,
 `movie_img_id` int(11) NOT NULL,
 PRIMARY KEY (`id`)
);

TRUNCATE TABLE `movies`;
TRUNCATE TABLE `movie_img`;
TRUNCATE TABLE `products`;

INSERT  INTO `movies`(movie_name)
VALUES
('My Neighbor Totoro'),
("Howl's Moving Castle"),
("Kiki's Delivery Service"),
('Princess Mononoke'),
('Ponyo'),
('Spirited Away');


INSERT INTO `movie_img`(movie_id, img_src)
VALUES
 (1,'./assets/totoro01.jpg'),
 (1,'./assets/totoro02.jpg'),
 (1,'./assets/totoro03.jpg'),
 (1,'./assets/totoro04.jpg'),
 (1,'./assets/totoro05.jpg'),
 (2,'./assets/howl01.png'),
 (2,'./assets/howl02.png'),
 (2,'./assets/howl03.png'),
 (2,'./assets/howl04.png'),
 (2,'./assets/howl05.png'),
 (2,'./assets/howl06.png'),
 (2,'./assets/howl07.png'),
 (3,'./assets/kiki01.png'),
 (3,'./assets/kiki02.png'),
 (3,'./assets/kiki03.png'),
 (3,'./assets/kiki04.png'),
 (3,'./assets/kiki05.png'),
 (3,'./assets/kiki06.png'),
 (4,'./assets/momonoke01.png'),
 (4,'./assets/momonoke02.png'),
 (4,'./assets/momonoke03.png'),
 (4,'./assets/momonoke04.png'),
 (4,'./assets/momonoke05.png'),
 (4,'./assets/momonoke06.png'),
 (5,'./assets/ponyo01.png'),
 (5,'./assets/ponyo02.png'),
 (5,'./assets/ponyo03.png'),
 (5,'./assets/ponyo04.png'),
 (5,'./assets/ponyo05.png'),
 (5,'./assets/ponyo06.png'),
 (5,'./assets/ponyo07.jpg'),
 (5,'./assets/ponyo08.jpg'),
 (6,'./assets/spirtedaway01.png'),
 (6,'./assets/spirtedaway02.png'),
 (6,'./assets/spirtedaway03.png'),
 (6,'./assets/spirtedaway04.png'),
 (6,'./assets/spirtedaway05.png'),
 (6,'./assets/spirtedaway06.png'),
 (6,'./assets/spirtedaway07.png');


INSERT INTO `products` (item, img_src, price)
VALUES
('Backpack', './assets/products/backpack.png', 40),
('Black tote bag', './assets/products/black_tote.png', 20),
('White tote bag', './assets/products/white_tote.png', 20),
('Hat', './assets/products/hat.png', 15),
('White cap', './assets/products/white_cap.png', 15),
('Notebook', './assets/products/notebook.png', 15),
('Phone case', './assets/products/phonecase.png', 15),
('Cup', './assets/products/cup.png', 22),
('Black t-shirt', './assets/products/black_tshirt.png', 50),
('White t-shirt', './assets/products/white_tshirt.png', 50);
