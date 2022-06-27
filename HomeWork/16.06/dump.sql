-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 07:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db3205`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `menu`, `title`, `text`, `image`) VALUES
(1, 7, 'Welcome to Miami', '<p>Ipsam, vero soluta consequatur qui impedit fuga magnam quisquam fugiat culpa quod quaerat tenetur dolore minima veritatis repellat temporibus accusamus dignissimos voluptatum saepe non maiores praesentium placeat fugit. Voluptatibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum eum asperiores nisi iste similique debitis sit delectus! Culpa fugit iusto non velit. Quasi vero dolores nesciunt officia possimus quos omnis vel tempora ex, neque tenetur quidem harum aliquid nisi mollitia sequi soluta consequatur ea animi reiciendis? Reiciendis enim officia facilis suscipit commodi. Qui dolorum repellat tempora. Possimus magnam excepturi tenetur beatae.</p>\r\n                    <p>Cumque cupiditate totam corrupti libero placeat ipsa autem repudiandae assumenda fugiat, repellat delectus, voluptate dolore repellendus et voluptatem optio molestias quia eos? Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>\r\n                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate earum, accusamus recusandae in dolorem minima accusantium! Voluptate sunt iusto magnam nesciunt necessitatibus. Minima temporibus sint non cumque odio. Obcaecati aut nemo aliquid unde laboriosam magni corrupti error reprehenderit labore dolore consequatur expedita, voluptatem a ad numquam cumque placeat, vitae, minima nihil molestiae aperiam ullam dignissimos explicabo earum? Pariatur corrupti amet aliquam dolorum laudantium magni quam ratione cum rem ipsam veniam fugiat non neque, ab repellendus, veritatis voluptatibus aspernatur iure. Nesciunt assumenda consectetur officia iusto ex?</p>\r\n                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consectetur minus illo provident numquam. Fuga voluptate optio delectus, atque, in ut a harum dolorem id, molestiae eius! Vitae officia sapiente qui quis sed blanditiis facilis ipsam optio. Minus, explicabo pariatur vel inventore repellendus ad iusto quaerat id asperiores, assumenda, dolorem nisi aperiam! Aperiam dicta debitis placeat, sunt quis totam dolorem cum facere facilis laboriosam repellat tenetur, architecto nulla doloribus voluptate ea a iusto nemo. Necessitatibus vero officiis vel, voluptatibus at reprehenderit voluptates veniam asperiores cum a, omnis soluta ex, non ad cupiditate?</p>', 'sun.jpg'),
(2, 8, 'Saytimiza xos gelmisooooooooz', '<p>Ipsam, vero soluta consequatur qui impedit fuga magnam quisquam fugiat culpa quod quaerat tenetur dolore minima veritatis repellat temporibus accusamus dignissimos voluptatum saepe non maiores praesentium placeat fugit. Voluptatibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum eum asperiores nisi iste similique debitis sit delectus! Culpa fugit iusto non velit. Quasi vero dolores nesciunt officia possimus quos omnis vel tempora ex, neque tenetur quidem harum aliquid nisi mollitia sequi soluta consequatur ea animi reiciendis? Reiciendis enim officia facilis suscipit commodi. Qui dolorum repellat tempora. Possimus magnam excepturi tenetur beatae.</p>\r\n                    <p>Cumque cupiditate totam corrupti libero placeat ipsa autem repudiandae assumenda fugiat, repellat delectus, voluptate dolore repellendus et voluptatem optio molestias quia eos? Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>\r\n                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate earum, accusamus recusandae in dolorem minima accusantium! Voluptate sunt iusto magnam nesciunt necessitatibus. Minima temporibus sint non cumque odio. Obcaecati aut nemo aliquid unde laboriosam magni corrupti error reprehenderit labore dolore consequatur expedita, voluptatem a ad numquam cumque placeat, vitae, minima nihil molestiae aperiam ullam dignissimos explicabo earum? Pariatur corrupti amet aliquam dolorum laudantium magni quam ratione cum rem ipsam veniam fugiat non neque, ab repellendus, veritatis voluptatibus aspernatur iure. Nesciunt assumenda consectetur officia iusto ex?</p>\r\n                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consectetur minus illo provident numquam. Fuga voluptate optio delectus, atque, in ut a harum dolorem id, molestiae eius! Vitae officia sapiente qui quis sed blanditiis facilis ipsam optio. Minus, explicabo pariatur vel inventore repellendus ad iusto quaerat id asperiores, assumenda, dolorem nisi aperiam! Aperiam dicta debitis placeat, sunt quis totam dolorem cum facere facilis laboriosam repellat tenetur, architecto nulla doloribus voluptate ea a iusto nemo. Necessitatibus vero officiis vel, voluptatibus at reprehenderit voluptates veniam asperiores cum a, omnis soluta ex, non ad cupiditate?</p>', 'sun.jpg'),
(3, 3, 'Haqqımızda', '<iframe width=\"100%\" height=\"400\" src=\"https://www.youtube.com/embed/t0Q2otsqC4I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n                    <p>Cumque cupiditate totam corrupti libero placeat ipsa autem repudiandae assumenda fugiat, repellat delectus, voluptate dolore repellendus et voluptatem optio molestias quia eos? Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>\r\n                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consectetur minus illo provident numquam. Fuga voluptate optio delectus, atque, in ut a harum dolorem id, molestiae eius! Vitae officia sapiente qui quis sed blanditiis facilis ipsam optio. Minus, explicabo pariatur vel inventore repellendus ad iusto quaerat id asperiores, assumenda, dolorem nisi aperiam! Aperiam dicta debitis placeat, sunt quis totam dolorem cum facere facilis laboriosam repellat tenetur, architecto nulla doloribus voluptate ea a iusto nemo. Necessitatibus vero officiis vel, voluptatibus at reprehenderit voluptates veniam asperiores cum a, omnis soluta ex, non ad cupiditate?</p>', ''),
(4, 1, 'About us', '<iframe width=\"100%\" height=\"400\" src=\"https://www.youtube.com/embed/t0Q2otsqC4I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n                    <p>Cumque cupiditate totam corrupti libero placeat ipsa autem repudiandae assumenda fugiat, repellat delectus, voluptate dolore repellendus et voluptatem optio molestias quia eos? Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>\r\n                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consectetur minus illo provident numquam. Fuga voluptate optio delectus, atque, in ut a harum dolorem id, molestiae eius! Vitae officia sapiente qui quis sed blanditiis facilis ipsam optio. Minus, explicabo pariatur vel inventore repellendus ad iusto quaerat id asperiores, assumenda, dolorem nisi aperiam! Aperiam dicta debitis placeat, sunt quis totam dolorem cum facere facilis laboriosam repellat tenetur, architecto nulla doloribus voluptate ea a iusto nemo. Necessitatibus vero officiis vel, voluptatibus at reprehenderit voluptates veniam asperiores cum a, omnis soluta ex, non ad cupiditate?</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `short` char(2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `short`, `status`) VALUES
(1, 'English', 'en', 1),
(2, 'Azerbaijani', 'az', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `lang`, `name`, `order`, `status`) VALUES
(1, 1, 'About', 2, 1),
(2, 1, 'Contact', 4, 1),
(3, 2, 'Haqqımızda', 2, 1),
(4, 2, 'Şəkillər', 3, 1),
(5, 2, 'Bizimlə əlaqə', 4, 1),
(6, 1, 'Photos', 3, 1),
(7, 1, 'Main Page', 1, 1),
(8, 2, 'Ana səhifə', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu` (`menu`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang` (`lang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`lang`) REFERENCES `language` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
