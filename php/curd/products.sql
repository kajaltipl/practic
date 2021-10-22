CREATE TABLE `products` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Product 1', 5000, 'product.jpg'),
(2, 'Product 2', 10000, 'product.jpg'),
(3, 'Product 3', 8000, 'product.jpg'),
(4, 'Product 4', 11500, 'product.jpg'),
(5, 'Product 5', 7000, 'product.jpg'),
(6, 'Product 6', 12000, 'product.jpg'),
(7, 'Product7', 18000, 'product.jpg'),
(8, 'Product8', 16000, 'product.jpg'),
(9, 'Product9', 13000, 'product.jpg'),
(10, 'Product10', 12000, 'product.jpg'),
(11, 'Product11', 7000, 'product.jpg'),
(12, 'Product12', 15500, 'product.jpg'),
(13, 'Product13', 11000, 'product.jpg'),
(14, 'Product14', 6000, 'product.jpg'),
(15, 'Product15', 4000, 'product.jpg'),
(16, 'Product16', 8200, 'product.jpg');
