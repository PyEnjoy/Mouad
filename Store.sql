-- Adminer 4.8.1 MySQL 8.0.27 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Comments`;
CREATE TABLE `Comments` (
  `id_cmnts` int NOT NULL AUTO_INCREMENT,
  `id_user` int unsigned NOT NULL,
  `id_product` int NOT NULL,
  `comment` text NOT NULL,
  `starts` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cmnts`),
  KEY `id_user` (`id_user`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Comments` (`id_cmnts`, `id_user`, `id_product`, `comment`, `starts`, `created_at`, `update_at`) VALUES
(6,	1,	1,	'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov',	1,	'2021-12-25 01:05:07',	NULL),
(7,	2,	1,	'aliquam vestibulum morbi blandit. Enim nunc faucibus a pellentesque sit amet porttitor. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Mattis aliquam faucibus purus in massa tempor nec feugiat nisl.',	5,	'2021-12-25 01:05:45',	NULL),
(8,	1,	2,	'Sollicitudin nibh sit amet commodo nulla. Justo donec enim diam vulputate ut pharetra sit amet. Egestas egestas fringilla phasellus faucibus scelerisque. Mauris augue neque gravida in fermentum et sollicitudin.',	2,	'2021-12-25 01:10:37',	NULL),
(9,	2,	2,	'At augue eget arcu dictum varius duis. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus. Enim sit amet venenatis urna cursus eget nunc scelerisque. Pretium viverra suspendisse potenti nullam ac tortor vitae.',	4,	'2021-12-25 01:10:46',	NULL),
(11,	1,	8,	'comment 3',	3,	'2022-01-14 12:51:59',	NULL);

DROP TABLE IF EXISTS `product_img`;
CREATE TABLE `product_img` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_product` int NOT NULL,
  `url_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `product_img_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `product_img` (`id`, `id_product`, `url_img`) VALUES
(1,	1,	'item-1.jpg'),
(2,	1,	'item-2.jpg'),
(3,	2,	'item-3.jpg'),
(4,	2,	'item-4.jpg'),
(14,	4,	'men.jpg'),
(15,	4,	'item-10.jpg'),
(16,	4,	'item-11.jpg'),
(17,	5,	'men.jpg'),
(18,	5,	'item-15.jpg'),
(19,	5,	'item-14.jpg'),
(20,	5,	'item-13.jpg'),
(21,	21,	'aq.jpg'),
(24,	22,	'1642096794.jpg'),
(27,	7,	'at.jpg-1.jpg'),
(30,	8,	'aq.jpg-1.jpg'),
(31,	8,	'at.jpg-1.jpg-1.jpg'),
(32,	8,	'a-1.jpg'),
(33,	9,	'aq-1.jpg'),
(35,	9,	'men-1.jpg'),
(38,	7,	'men-1-1-1-1.jpg'),
(39,	7,	'aq-1-1.jpg'),
(40,	7,	'at-1-1.jpg');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `titre` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `id_df_img` varchar(255) DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  PRIMARY KEY (`id`),
  KEY `id_df_img` (`id_df_img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `products` (`id`, `titre`, `price`, `id_df_img`, `content`, `create_time`, `update_time`) VALUES
(1,	'WOMEN\'S BOOTS SHOES bissa',	192.00,	'1',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.biss\r\n',	'2021-12-23 19:07:08',	'2022-01-14 09:09:45'),
(2,	'WOMEN\'S MINAM MEAGHAN',	150.00,	'3',	'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',	'2021-12-23 20:07:08',	'2021-12-23 20:07:08'),
(4,	'titre 1',	120.00,	'16',	'lorem content',	'2022-01-07 22:45:32',	'2022-01-14 09:10:00'),
(5,	'man ',	111.00,	'17',	'content',	'2022-01-08 12:08:39',	'2022-01-08 12:08:39'),
(6,	'WOMEN\'S BOOTS SHOES bissa',	192.00,	'2',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.biss\r\n',	'2022-01-13 17:42:51',	'2022-01-13 18:08:52'),
(7,	'demo1--',	145.00,	'27',	'demo 1 content\r\n',	'2022-01-13 17:43:36',	'2022-01-14 12:58:15'),
(8,	'demo10001',	145.00,	'31',	'demo 1 content\r\n',	'2022-01-13 17:44:24',	'2022-01-14 09:15:18'),
(9,	'demo1002',	145.00,	'33',	'demo 1 content\r\n',	'2022-01-13 17:45:26',	'2022-01-14 10:23:36'),
(14,	'zda',	12.00,	NULL,	'sa',	'2022-01-13 17:53:25',	'2022-01-13 17:53:25'),
(15,	'saa',	132.00,	NULL,	'saaa',	'2022-01-13 17:56:16',	'2022-01-13 17:56:16'),
(16,	'saa',	132.00,	NULL,	'saaa',	'2022-01-13 17:57:19',	'2022-01-13 17:57:19'),
(17,	'saa',	132.00,	NULL,	'saaa',	'2022-01-13 17:57:53',	'2022-01-13 17:57:53'),
(18,	'saa',	132.00,	NULL,	'saaa',	'2022-01-13 17:58:22',	'2022-01-13 17:58:22'),
(19,	'saa',	132.00,	NULL,	'saaa',	'2022-01-13 17:58:45',	'2022-01-13 17:58:45'),
(20,	'saa',	132.00,	NULL,	'saaa',	'2022-01-13 17:59:10',	'2022-01-13 17:59:10'),
(21,	'saa',	132.00,	NULL,	'saaa',	'2022-01-13 17:59:43',	'2022-01-13 17:59:43'),
(22,	'WOMEN\'S BOOTS SHOES bis',	191.00,	'1',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.bis',	'2022-01-13 17:59:54',	'2022-01-13 18:03:44');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1,	'user1',	'b3daa77b4c04a9551b8781d03191fe098f325e67',	'user'),
(2,	'user2',	'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4',	'user'),
(3,	'user3',	'0b7f849446d3383546d15a480966084442cd2193',	'user'),
(4,	'admin',	'd033e22ae348aeb5660fc2140aec35850c4da997',	'admin');

-- 2022-01-14 15:07:13
