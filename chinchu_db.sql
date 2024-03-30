-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 12:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chinchu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_user` varchar(100) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` double NOT NULL,
  `prod_image` text NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cart_user`, `prod_id`, `prod_name`, `prod_price`, `prod_image`, `prod_qty`, `prod_amount`) VALUES
(3, '', 20, 'Fairlovely', 40, 'uploads/face cream.webp', 1, 40),
(9, 'manju', 19, 'Foundation', 190, 'uploads/liquid.webp', 1, 190);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_image` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_desc`) VALUES
(2, 'electronic', 'uploads/Electronic.jpg', 'application electronic'),
(3, 'cosmetics', 'uploads/makeup-cosmetics.webp', 'cosmetic product'),
(5, 'Grocery', 'uploads/grocery.jpg', 'Your new healthy grocery'),
(6, 'Baby store', 'uploads/baby kits.webp', 'first cry'),
(10, 'Accessories', 'uploads/women items.jpg', 'women items and accessries'),
(11, 'Jewellery set', 'uploads/jewllery.webp', 'American gold set'),
(12, 'Food Drinks', 'uploads/bar-35-food-drinks.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `con_name` varchar(255) NOT NULL,
  `con_email` varchar(255) NOT NULL,
  `con_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(20) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_email`, `contact_comment`) VALUES
(1, 'Divya', 'divya@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_address` text NOT NULL,
  `order_type` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_user` varchar(100) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` double NOT NULL,
  `prod_image` text NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_name`, `order_address`, `order_type`, `order_status`, `order_user`, `prod_id`, `prod_name`, `prod_price`, `prod_image`, `prod_qty`, `prod_amount`) VALUES
(1, 'manju', 'pkd', 'cod', 1, 'manju', 21, 'laptop', 50000, 'uploads/laptop.jpg', 1, 50000),
(2, 'manju', 'pkd', 'cod', 1, 'manju', 24, 'Earrings', 150, 'uploads/Earrings.jpg', 1, 150),
(3, 'manju', 'pkd', 'cod', 1, 'manju', 29, 'Potato', 35, 'uploads/potato.webp', 1, 35),
(4, 'manju', 'pkd', 'cod', 1, 'manju', 18, 'Sunflower oil', 150, 'uploads/sunflower.jpeg', 1, 150),
(5, 'manju', 'pkd', 'cod', 1, 'manju', 19, 'Foundation', 190, 'uploads/liquid.webp', 1, 190);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` double NOT NULL,
  `prod_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `prod_name`, `prod_price`, `prod_image`) VALUES
(18, 5, 'Sunflower oil', 150, 'uploads/sunflower.jpeg'),
(19, 3, 'Foundation', 190, 'uploads/liquid.webp'),
(20, 3, 'Fairlovely', 40, 'uploads/face cream.webp'),
(21, 2, 'laptop', 50000, 'uploads/laptop.jpg'),
(22, 2, 'Iphone', 60000, 'uploads/iPhone image.webp'),
(23, 6, 'Baby oil', 200, 'uploads/baby-oil.webp'),
(24, 4, 'Earrings', 150, 'uploads/Earrings.jpg'),
(27, 4, 'Accessories', 149, 'uploads/pic1.jpg'),
(29, 5, 'Potato', 35, 'uploads/potato.webp'),
(31, 11, 'Necklace', 500, 'uploads/ds-283_3_.jpg'),
(32, 10, 'Shoes', 699, 'uploads/shoes.jpg'),
(33, 3, 'Lipstick', 300, 'uploads/lipstic.webp'),
(35, 3, 'Eyebrow', 500, 'uploads/51iCQBuo3SL.jpg'),
(36, 10, 'Bag', 250, 'uploads/bags.webp'),
(37, 10, 'Stylish side bag', 600, 'uploads/sling bags.webp'),
(38, 5, 'Broccoli', 25, 'uploads/Broccoli.webp'),
(39, 12, 'Diary milk silk', 250, 'uploads/-dairy-milk-silk.webp'),
(40, 12, 'Cadbury dairy milk chocolate', 150, 'uploads/-Dairy-Milk-Chocolate.jpg'),
(41, 12, 'Nutes', 150, 'uploads/Nutes.webp'),
(42, 12, 'Almond', 250, 'uploads/almond.jpg'),
(43, 5, 'Tomato', 15, 'uploads/Tomato_je.jpg'),
(44, 5, 'Apple', 50, 'uploads/apple.webp'),
(45, 5, 'Green apple', 160, 'uploads/green apple.jpg'),
(46, 5, 'Green chilli', 10, 'uploads/chilli.jpg'),
(47, 6, 'Baby clothes', 250, 'uploads/clothes.jpg'),
(48, 6, 'Newborn baby shoes', 100, 'uploads/shooes for baby.webp'),
(49, 2, 'Vivo  v20', 20000, 'uploads/vivo.jpg'),
(50, 2, 'Samsung s20 ultra', 22000, 'uploads/Mobile-Phone.webp'),
(51, 11, 'Ring', 19000, 'uploads/ring image.webp'),
(52, 12, 'Good day', 25, 'uploads/butter cookie.webp'),
(53, 12, 'cookies', 200, 'uploads/milk chocolate.webp'),
(54, 5, 'Basmati rice', 220, 'uploads/rice 1kg.jpg'),
(55, 5, 'Red label ', 180, 'uploads/red label.jpg'),
(56, 10, 'Hair band', 60, 'uploads/bands.webp'),
(57, 10, 'Birthday decoration items', 250, 'uploads/birthday-decoration.webp'),
(58, 10, 'Wedding chappal', 350, 'uploads/chappal.webp'),
(59, 11, 'Maroon fashion jewellery set', 1500, 'uploads/js-combo-4.jpg'),
(60, 11, 'Bahubali collection set', 1000, 'uploads/gold plated.jpeg'),
(61, 11, 'Long necklace', 20000, 'uploads/81+aEuZFKTL._AC_UY1100_.jpg'),
(62, 11, 'Nose pin', 850, 'uploads/SBNP18R_13_3.webp'),
(63, 5, 'Horlicks', 200, 'uploads/Horlicks.webp'),
(64, 5, 'Milma butter ', 150, 'uploads/87647-370x370.jpg'),
(65, 5, 'Milma milk', 28, 'uploads/test-Milk-Milma,(dark-Blue)-500-Ml.jpg'),
(66, 5, 'Dried pasta', 180, 'uploads/pasta.webp'),
(67, 3, 'Mascara', 39, 'uploads/-mascara.jpg'),
(68, 3, 'Eyesahdow', 799, 'uploads/DesertRose.webp'),
(69, 3, 'Blush', 300, 'uploads/blush.webp'),
(70, 2, 'Fridge', 20000, 'uploads/fridge.jpg'),
(71, 5, 'Carrot', 15, 'uploads/carrot.jpg'),
(72, 5, 'Cucumber', 25, 'uploads/cucumber.jpg'),
(73, 6, 'Baby doll', 250, 'uploads/baby doll.webp'),
(74, 6, 'Penguin', 300, 'uploads/-black-penguin.webp'),
(75, 3, 'Nail polish', 180, 'uploads/productImage.jpg'),
(76, 6, 'Winter care', 200, 'uploads/WhatsAppImage2023-08-22at14.35.47.webp'),
(77, 5, 'Salt', 50, 'uploads/salt.jpg'),
(78, 5, 'Oreo', 30, 'uploads/oreo.webp'),
(79, 5, 'Maggi', 12, 'uploads/WhatsAppImage2022-12-15at10.49.14.webp'),
(80, 5, 'Pringles', 120, 'uploads/pringles.webp'),
(81, 11, 'Bangles', 150000, 'uploads/stone-studded-openable-bangle-pair-v1-jkw1129.webp'),
(82, 11, 'Earring', 250, 'uploads/il_570xN.4029924056_rkqf.webp'),
(83, 12, '5Star', 100, 'uploads/5 star.webp'),
(84, 3, 'Sunscreen', 200, 'uploads/sunscreen.webp'),
(85, 2, 'Poco m3 pro', 21000, 'uploads/poco.webp');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(20) NOT NULL,
  `reg_name` varchar(50) NOT NULL,
  `reg_email` varchar(50) NOT NULL,
  `reg_phone` varchar(15) NOT NULL,
  `reg_username` varchar(100) NOT NULL,
  `reg_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `reg_name`, `reg_email`, `reg_phone`, `reg_username`, `reg_password`) VALUES
(5, 'chinju', 'chinju2@gamil.com', '123', 'manju', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
