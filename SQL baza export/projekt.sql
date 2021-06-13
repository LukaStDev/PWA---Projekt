-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 08:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--
CREATE DATABASE IF NOT EXISTS `projekt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `date` varchar(32) NOT NULL DEFAULT current_timestamp(),
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` tinytext NOT NULL,
  `content` text NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `date`, `author`, `title`, `summary`, `content`, `image_link`, `category_id`, `archive`) VALUES
(23, '2021-06-13 17:48:48', 'Mantis Tobaggan', 'How did I end up here', 'What do you get when you combine sleepwalking and a bottle of Vodka? Waking up at the beach at 11\'o clock in the morning', 'I had a few, that much you already know. But it was the first and only time I indulged in such an excessive ammount of alcohol. That was for a few reasons, I was on holiday in Spain and I had just recieved my bonus at the temp company so money was eager to escape my wallet. Now this story would\'ve been a lot more impressive had the beach in question been very distant from the club I was drinking in. As it stands it was located 10 kilometeres away. Not close by any means but not impossible for the drunk, insane, determined or any combination of the three. As you can imagine I don\'t have a clue how I travelled to it as my phone\'s battery was empty prior to me making the journey so I am unable to check google maps for clues about my route and means of transport. But what is interesting is that upon waking up I noticed something. To my left, to my right, behind me, in front of me, practically in every direction there were people who, let\'s just say that they werem\'t very worried about public decency. They were also either indifferent or oblivious to my presence and my probbably fatally poisoned mind. Making a hasty retreat I swore never to return to that place ever again. So yeah, that\'s the story of how I discovered a nudist beach close to my holiday house. ', 'slike/beach_spot.jpg', 42, 0),
(31, '2021-06-13 18:19:42', 'Corporate Shill', 'Join the Infobip team!', 'We are hiring in our offices in Croatia.', 'At Infobip we dream big. We value creativity, persistence and innovation, passionately believing that it is through teamwork that we can reach greater heights.\r\n\r\nSince 2006, we have been innovating at the edge of technological possibilities and are now shaping global communications of the future. Through 60+ countries, Infobip\'s platform is used by almost 70% of the population, making it the largest network of its kind and the only full-stack cloud communication platform (cPaaS) globally. \r\n\r\nJoin us on our mission to create life changing interactions between humans and online services with new and unseen solutions!', 'slike/infobip.jpg', 314, 0),
(33, '2021-06-13 18:25:26', 'Even Bigger Lorem Ipsum Fan', 'Lorem Ipsum Sid Dolor Amet 2: Electric Boogaloo', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent laoreet mauris in lectus maximus blandit. Vestibulum vitae metus eu arcu efficitur mollis. Sed id magna eget neque malesuada posuere quis sit amet risus. Pellentesque libero turpis, suscip', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent laoreet mauris in lectus maximus blandit. Vestibulum vitae metus eu arcu efficitur mollis. Sed id magna eget neque malesuada posuere quis sit amet risus. Pellentesque libero turpis, suscipit nec nulla id, hendrerit tempus ex. Duis id orci eros. In hac habitasse platea dictumst. Aliquam feugiat est at feugiat dictum. Curabitur eleifend, turpis ut sodales luctus, est nibh sagittis metus, a bibendum nibh lacus et tellus. Suspendisse potenti. Integer blandit egestas orci. Aliquam ante arcu, sagittis at pellentesque vel, lacinia venenatis sapien. Sed vestibulum ligula vel purus mollis elementum.\r\n\r\nMaecenas non ex ornare, mattis nibh at, porttitor arcu. Vestibulum accumsan tempus ante, vel hendrerit arcu viverra sed. Phasellus venenatis purus nec sapien pulvinar, ut luctus sem accumsan. Morbi nisi enim, imperdiet vitae diam vel, suscipit condimentum purus. Donec tempor odio ex, bibendum rhoncus augue accumsan vel. Aenean mollis nunc ipsum, at fringilla nisl gravida ut. Suspendisse varius, velit nec aliquam sodales, risus dui imperdiet massa, in venenatis ipsum ex egestas odio. Curabitur ac facilisis leo, nec laoreet nunc. Ut nec dignissim eros, ut pellentesque dolor. ', 'slike/external-content.duckduckgo.com.png', 42, 0),
(34, '2021-06-13 18:19:42', 'Corporate Shill', 'Join the Infobip team!', 'We are hiring in our offices in Croatia.', 'At Infobip we dream big. We value creativity, persistence and innovation, passionately believing that it is through teamwork that we can reach greater heights.\r\n\r\nSince 2006, we have been innovating at the edge of technological possibilities and are now shaping global communications of the future. Through 60+ countries, Infobip\'s platform is used by almost 70% of the population, making it the largest network of its kind and the only full-stack cloud communication platform (cPaaS) globally. \r\n\r\nJoin us on our mission to create life changing interactions between humans and online services with new and unseen solutions!', 'slike/infobip.jpg', 314, 0),
(36, '2021-06-13 18:19:42', 'Corporate Shill', 'Join the Infobip team!', 'We are hiring in our offices in Croatia.', 'At Infobip we dream big. We value creativity, persistence and innovation, passionately believing that it is through teamwork that we can reach greater heights.\r\n\r\nSince 2006, we have been innovating at the edge of technological possibilities and are now shaping global communications of the future. Through 60+ countries, Infobip\'s platform is used by almost 70% of the population, making it the largest network of its kind and the only full-stack cloud communication platform (cPaaS) globally. \r\n\r\nJoin us on our mission to create life changing interactions between humans and online services with new and unseen solutions!', 'slike/infobip.jpg', 314, 0),
(37, '2021-06-13 18:23:55', 'Lorem Ipsum fan', 'Lorem Ipsum Sid Dolor Amet', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent laoreet mauris in lectus maximus blandit. Vestibulum vitae metus eu arcu efficitur mollis. Sed id magna eget neque malesuada posuere quis sit amet risus. Pellentesque libero turpis, suscipit nec nulla id, hendrerit tempus ex. Duis id orci eros. In hac habitasse platea dictumst. Aliquam feugiat est at feugiat dictum. Curabitur eleifend, turpis ut sodales luctus, est nibh sagittis metus, a bibendum nibh lacus et tellus. Suspendisse potenti. Integer blandit egestas orci. Aliquam ante arcu, sagittis at pellentesque vel, lacinia venenatis sapien. Sed vestibulum ligula vel purus mollis elementum.\r\n\r\nMaecenas non ex ornare, mattis nibh at, porttitor arcu. Vestibulum accumsan tempus ante, vel hendrerit arcu viverra sed. Phasellus venenatis purus nec sapien pulvinar, ut luctus sem accumsan. Morbi nisi enim, imperdiet vitae diam vel, suscipit condimentum purus. Donec tempor odio ex, bibendum rhoncus augue accumsan vel. Aenean mollis nunc ipsum, at fringilla nisl gravida ut. Suspendisse varius, velit nec aliquam sodales, risus dui imperdiet massa, in venenatis ipsum ex egestas odio. Curabitur ac facilisis leo, nec laoreet nunc. Ut nec dignissim eros, ut pellentesque dolor. ', 'slike/external-content.duckduckgo.com.jpg', 42, 0),
(38, '2021-06-13 18:25:26', 'Even Bigger Lorem Ipsum Fan', 'Lorem Ipsum Sid Dolor Amet 2: Electric Boogaloo', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent laoreet mauris in lectus maximus blandit. Vestibulum vitae metus eu arcu efficitur mollis. Sed id magna eget neque malesuada posuere quis sit amet risus. Pellentesque libero turpis, suscip', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent laoreet mauris in lectus maximus blandit. Vestibulum vitae metus eu arcu efficitur mollis. Sed id magna eget neque malesuada posuere quis sit amet risus. Pellentesque libero turpis, suscipit nec nulla id, hendrerit tempus ex. Duis id orci eros. In hac habitasse platea dictumst. Aliquam feugiat est at feugiat dictum. Curabitur eleifend, turpis ut sodales luctus, est nibh sagittis metus, a bibendum nibh lacus et tellus. Suspendisse potenti. Integer blandit egestas orci. Aliquam ante arcu, sagittis at pellentesque vel, lacinia venenatis sapien. Sed vestibulum ligula vel purus mollis elementum.\r\n\r\nMaecenas non ex ornare, mattis nibh at, porttitor arcu. Vestibulum accumsan tempus ante, vel hendrerit arcu viverra sed. Phasellus venenatis purus nec sapien pulvinar, ut luctus sem accumsan. Morbi nisi enim, imperdiet vitae diam vel, suscipit condimentum purus. Donec tempor odio ex, bibendum rhoncus augue accumsan vel. Aenean mollis nunc ipsum, at fringilla nisl gravida ut. Suspendisse varius, velit nec aliquam sodales, risus dui imperdiet massa, in venenatis ipsum ex egestas odio. Curabitur ac facilisis leo, nec laoreet nunc. Ut nec dignissim eros, ut pellentesque dolor. ', 'slike/external-content.duckduckgo.com.png', 42, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(42, 'Nightlife'),
(314, 'IT work');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `pass`, `permission`) VALUES
(49, 'Bastard operator', 'From hell', 'root', '$2y$10$DAnyF6wU0p5z0kVKT59zr.eu45./LXO2HBOho.zQStpCc.EdtjxxO', 1),
(50, 'John', 'Doe', 'default', '$2y$10$YgZ9ZS.PkjwGDZ2RvAJqgeI05zjpR3jqSB0C2R9JglQW/sXRHmW5e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
