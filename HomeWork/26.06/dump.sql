-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 01:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `menu`, `title`, `text`, `image`) VALUES
(1, 7, 'Welcome to Miami!', '&lt;p&gt;Ipsam, vero soluta consequatur qui impedit fuga magnam quisquam fugiat culpa quod quaerat tenetur dolore minima veritatis repellat temporibus accusamus dignissimos voluptatum saepe non maiores praesentium placeat fugit. Voluptatibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum eum asperiores nisi iste similique debitis sit delectus! Culpa fugit iusto non velit. Quasi vero dolores nesciunt officia possimus quos omnis vel tempora ex, neque tenetur quidem harum aliquid nisi mollitia sequi soluta consequatur ea animi reiciendis? Reiciendis enim officia facilis suscipit commodi. Qui dolorum repellat tempora. Possimus magnam excepturi tenetur beatae.&lt;/p&gt;\r\n                    &lt;p&gt;Cumque cupiditate totam corrupti libero placeat ipsa autem repudiandae assumenda fugiat, repellat delectus, voluptate dolore repellendus et voluptatem optio molestias quia eos? Lorem ipsum dolor sit amet consectetur adipisicing elit. &lt;/p&gt;\r\n                    &lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate earum, accusamus recusandae in dolorem minima accusantium! Voluptate sunt iusto magnam nesciunt necessitatibus. Minima temporibus sint non cumque odio. Obcaecati aut nemo aliquid unde laboriosam magni corrupti error reprehenderit labore dolore consequatur expedita, voluptatem a ad numquam cumque placeat, vitae, minima nihil molestiae aperiam ullam dignissimos explicabo earum? Pariatur corrupti amet aliquam dolorum laudantium magni quam ratione cum rem ipsam veniam fugiat non neque, ab repellendus, veritatis voluptatibus aspernatur iure. Nesciunt assumenda consectetur officia iusto ex?&lt;/p&gt;\r\n                    &lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consectetur minus illo provident numquam. Fuga voluptate optio delectus, atque, in ut a harum dolorem id, molestiae eius! Vitae officia sapiente qui quis sed blanditiis facilis ipsam optio. Minus, explicabo pariatur vel inventore repellendus ad iusto quaerat id asperiores, assumenda, dolorem nisi aperiam! Aperiam dicta debitis placeat, sunt quis totam dolorem cum facere facilis laboriosam repellat tenetur, architecto nulla doloribus voluptate ea a iusto nemo. Necessitatibus vero officiis vel, voluptatibus at reprehenderit voluptates veniam asperiores cum a, omnis soluta ex, non ad cupiditate?&lt;/p&gt;', 6),
(2, 8, 'Saytimiza xos gelmisooooooooz', '&lt;p&gt;Ipsam, vero soluta consequatur qui impedit fuga magnam quisquam fugiat culpa quod quaerat tenetur dolore minima veritatis repellat temporibus accusamus dignissimos voluptatum saepe non maiores praesentium placeat fugit. Voluptatibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum eum asperiores nisi iste similique debitis sit delectus! Culpa fugit iusto non velit. Quasi vero dolores nesciunt officia possimus quos omnis vel tempora ex, neque tenetur quidem harum aliquid nisi mollitia sequi soluta consequatur ea animi reiciendis? Reiciendis enim officia facilis suscipit commodi. Qui dolorum repellat tempora. Possimus magnam excepturi tenetur beatae.&lt;/p&gt;\r\n                    &lt;p&gt;Cumque cupiditate totam corrupti libero placeat ipsa autem repudiandae assumenda fugiat, repellat delectus, voluptate dolore repellendus et voluptatem optio molestias quia eos? Lorem ipsum dolor sit amet consectetur adipisicing elit. &lt;/p&gt;\r\n                    &lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate earum, accusamus recusandae in dolorem minima accusantium! Voluptate sunt iusto magnam nesciunt necessitatibus. Minima temporibus sint non cumque odio. Obcaecati aut nemo aliquid unde laboriosam magni corrupti error reprehenderit labore dolore consequatur expedita, voluptatem a ad numquam cumque placeat, vitae, minima nihil molestiae aperiam ullam dignissimos explicabo earum? Pariatur corrupti amet aliquam dolorum laudantium magni quam ratione cum rem ipsam veniam fugiat non neque, ab repellendus, veritatis voluptatibus aspernatur iure. Nesciunt assumenda consectetur officia iusto ex?&lt;/p&gt;\r\n                    &lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consectetur minus illo provident numquam. Fuga voluptate optio delectus, atque, in ut a harum dolorem id, molestiae eius! Vitae officia sapiente qui quis sed blanditiis facilis ipsam optio. Minus, explicabo pariatur vel inventore repellendus ad iusto quaerat id asperiores, assumenda, dolorem nisi aperiam! Aperiam dicta debitis placeat, sunt quis totam dolorem cum facere facilis laboriosam repellat tenetur, architecto nulla doloribus voluptate ea a iusto nemo. Necessitatibus vero officiis vel, voluptatibus at reprehenderit voluptates veniam asperiores cum a, omnis soluta ex, non ad cupiditate?&lt;/p&gt;', 11),
(3, 3, 'Haqqımızda', '&lt;iframe width=&quot;100%&quot; height=&quot;400&quot; src=&quot;https://www.youtube.com/embed/t0Q2otsqC4I&quot; title=&quot;YouTube video player&quot; frameborder=&quot;0&quot; allow=&quot;accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture&quot; allowfullscreen&gt;&lt;/iframe&gt;\r\n                    &lt;p&gt;Cumque cupiditate totam corrupti libero placeat ipsa autem repudiandae assumenda fugiat, repellat delectus, voluptate dolore repellendus et voluptatem optio molestias quia eos? Lorem ipsum dolor sit amet consectetur adipisicing elit. &lt;/p&gt;\r\n                    &lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consectetur minus illo provident numquam. Fuga voluptate optio delectus, atque, in ut a harum dolorem id, molestiae eius! Vitae officia sapiente qui quis sed blanditiis facilis ipsam optio. Minus, explicabo pariatur vel inventore repellendus ad iusto quaerat id asperiores, assumenda, dolorem nisi aperiam! Aperiam dicta debitis placeat, sunt quis totam dolorem cum facere facilis laboriosam repellat tenetur, architecto nulla doloribus voluptate ea a iusto nemo. Necessitatibus vero officiis vel, voluptatibus at reprehenderit voluptates veniam asperiores cum a, omnis soluta ex, non ad cupiditate?&lt;/p&gt;', 8),
(4, 1, 'About us!!', '&lt;iframe width=&quot;100%&quot; height=&quot;400&quot; src=&quot;https://www.youtube.com/embed/t0Q2otsqC4I&quot; title=&quot;YouTube video player&quot; frameborder=&quot;0&quot; allow=&quot;accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture&quot; allowfullscreen&gt;&lt;/iframe&gt;\r\n                    &lt;p&gt;Cumque cupiditate totam corrupti libero placeat ipsa autem repudiandae assumenda fugiat, repellat delectus, voluptate dolore repellendus et voluptatem optio molestias quia eos? Lorem ipsum dolor sit amet consectetur adipisicing elit. &lt;/p&gt;\r\n                    &lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consectetur minus illo provident numquam. Fuga voluptate optio delectus, atque, in ut a harum dolorem id, molestiae eius! Vitae officia sapiente qui quis sed blanditiis facilis ipsam optio. Minus, explicabo pariatur vel inventore repellendus ad iusto quaerat id asperiores, assumenda, dolorem nisi aperiam! Aperiam dicta debitis placeat, sunt quis totam dolorem cum facere facilis laboriosam repellat tenetur, architecto nulla doloribus voluptate ea a iusto nemo. Necessitatibus vero officiis vel, voluptatibus at reprehenderit voluptates veniam asperiores cum a, omnis soluta ex, non ad cupiditate?&lt;/p&gt;', 3);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `alt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `alt`) VALUES
(1, 'sun.jpg', 'sun'),
(2, '1672939.jpg', '1672939'),
(3, '6743836.jpg', '6743836'),
(5, '6743691.jpg', '6743691'),
(6, '1913042.jpg', '1913042'),
(7, '6871827.jpg', '6871827'),
(8, '1742198.jpg', '1742198'),
(9, '564358.jpg', '564358'),
(10, '1537318.jpg', '1537318'),
(11, '1913081.jpg', '1913081'),
(12, 'hello.png', 'hello');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(4, 'tural', '$2y$10$kLNkrCrOQ/7h4VPidGxqn.Rftv0yxqOLXRSbm9maYI.nnQFzLfZZK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu` (`menu`),
  ADD KEY `image` (`image`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`image`) REFERENCES `image` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`lang`) REFERENCES `language` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
