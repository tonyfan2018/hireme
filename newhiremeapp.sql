-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-12-17 06:55:40
-- 服务器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `hiremeapp`
--

-- --------------------------------------------------------

--
-- 表的结构 `contact`
--

CREATE TABLE `contact` (
  `contactId` int(11) NOT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `subject` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `contact`
--

INSERT INTO `contact` (`contactId`, `firstname`, `lastname`, `email`, `subject`) VALUES
(4, 'WangYi', 'Zhang', 'ZhangWangyi@gmail.com', 'I like this website!'),
(5, 'qqq', 'www', 'qwer123@gmail.com', 'qwe');

-- --------------------------------------------------------

--
-- 表的结构 `corporation`
--

CREATE TABLE `corporation` (
  `corporationId` int(10) NOT NULL,
  `corEmail` varchar(100) NOT NULL,
  `corName` varchar(100) NOT NULL,
  `corIntro` text NOT NULL,
  `corAddress` varchar(100) NOT NULL,
  `corPassword` varchar(30) NOT NULL,
  `corAvatar` longblob DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `corporation`
--

INSERT INTO `corporation` (`corporationId`, `corEmail`, `corName`, `corIntro`, `corAddress`, `corPassword`, `corAvatar`, `userId`) VALUES
(3, 'lccstudio@gmail.com', 'LCC STUDIO', 'A Young Studio.', 'Toronto, ON, Canada', 'lccstudio', 0x44656661756c744176617461, 19);

-- --------------------------------------------------------

--
-- 表的结构 `corporation-portfolio`
--

CREATE TABLE `corporation-portfolio` (
  `commentId` int(11) NOT NULL,
  `portfolioId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `corporationId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `corporation-portfolio`
--

INSERT INTO `corporation-portfolio` (`commentId`, `portfolioId`, `studentId`, `corporationId`, `comment`, `date`) VALUES
(1, 22, 15, 3, 'Excellent work! I like it!', '2020-12-06');

-- --------------------------------------------------------

--
-- 表的结构 `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `images`
--

INSERT INTO `images` (`id`, `image`) VALUES
(37, 0x31),
(38, 0x32),
(39, 0x33),
(40, 0x34),
(41, 0x35),
(42, 0x36),
(43, 0x37),
(44, 0x38),
(54, 0x39),
(55, '');

-- --------------------------------------------------------

--
-- 表的结构 `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolioId` int(10) NOT NULL,
  `studentId` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `content` text DEFAULT NULL,
  `likes` int(45) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `portfolio`
--

INSERT INTO `portfolio` (`portfolioId`, `studentId`, `title`, `date`, `content`, `likes`, `comment`, `image`) VALUES
(22, 15, 'Bunny Girl Wandering', '2020-08-20', 'This is an illustration that combines cyberpunk style. The picture shows a girl with bunny ears looking towards the stairs in a subway station. Although this is a picture of a daily life scene, it brings a sense of technology to the picture because of the combination of cyberpunk expression style. And the picture composition also creates a special atmosphere.', 3, NULL, 0x31),
(23, 23, 'Letter M Logo Design Concept For Corporate Business', '2020-08-10', 'This logo design is based on the linear element, through the linear element of the capital letter \"M\" design.', 4, NULL, 0x32),
(25, 16, 'Beijing Opera illustrations', '2020-12-02', 'This is an illustration of Bejing Opera mask, which is an illustration design combined with traditional Chinese culture.', 12, NULL, 0x33),
(26, 17, 'CATKIN X Summer Palace ', '2020-04-16', 'Chinese Style Design: Summer Palace Retro Style beautiful 4D phoenix package more elegant mysterious. You will feel the charm of Chinese classical culture.', 22, NULL, 0x34),
(27, 18, 'Creative Posters', '2020-09-14', 'The design of this poster is to explore a new graphic design style, so there are many new elements in this poster design.', 18, NULL, 0x35),
(28, 19, 'Character illustration', '2020-10-07', 'This illustration uses the same gradient as the background for the character\'s hair during the practice. This technique of rendering 3D objects flat can bring a strong contrast to the picture.', 16, NULL, 0x36),
(29, 20, 'Olympic Poster Design', '2020-06-02', 'This poster uses the paper-cut effect to increase the layering of the poster, and it combines the landmarks of various countries with the torch.', 20, NULL, 0x37),
(30, 21, 'DNT Branding Design', '2020-09-21', 'Doers Not Talkers = DNT Dedicated to all the Doers out there. Quote David Della Rocco There\'s two kinds of people in this world when you boil it all down. You got your talkers and you got your doers. Most people are just talkers, all they do is talk. But when it is all said and done, it\'s the doers that change this world. And when they do that, they change us, and that\'s why we never forget them. So which one are you? Do you just talk about it, or do you stand up and do something about it? Because believe you me, all the rest of it is just coffee house bullshit. Talk gets you nowhere, action gets you anywhere. Stop being talkers! Be a Doer! Let’s do it!', 14, NULL, 0x38),
(31, 22, 'Air Force Cactus Jack', '2020-11-15', 'This is an illustration designed for Nike sneakers.', 32, NULL, 0x39),
(34, 15, 'Cyberpunk Style Life', '2020-08-13', 'This is the Instagram profile name of this incredible artist from Toronto who makes illustrations in a perfect cyberpunk style. The city is one of the backgrounds and recurring subjects in his works, a city very similar to that proposed in the two films by Blade Runner. The holographic projections of female subjects, more cyborgs than real women, are very reminiscent of a famous scene from the recent film chapter Blade Runner 2049 directed by Denis Villeneuve, in 2017.', 22, NULL, 0x31353032),
(35, 15, 'Roof by CLA RITY', '2020-06-05', 'A genre of science fiction and a lawless subculture in an oppressive society dominated by computer technology and big corporations.', 11, NULL, 0x31353033),
(36, 15, 'Female Warrior', '2019-11-13', '#Cyberpunk #Futuristic #City #Warrior Warrior Girl In Cyberpunk City.', 27, NULL, 0x31353034),
(37, 15, 'CYBERPUNK: ART, MOVEMENT or a REFLECTION of THE PRESENT', '2020-10-30', 'Our world is going digital, and as it does, the futuristic predictions that were so accurately depicted in the sci-fi world, are becoming a reality. From 3D printing and autonomous vehicles to space flight and human longevity, futuristic concepts are already an undeniable part of our everyday lives, and calling them visionary and revolutionary is falling short. “The future is here”, and fuck, if that is not true.', 31, NULL, 0x31353035),
(40, 15, 'GHOST', '2020-08-10', 'An illustration for my Overwatch fancomic ‘GHOST’. I designed some of the props with items from Sombra’s room on the Castillo map, and others are just computer stuff mashed together. As usual, there’s lots of stuff hiding around in the background, so take a peek!', 14, NULL, 0x31353036),
(41, 23, 'Aurora Borealis Logo Design', '2020-10-11', 'Abstract the image of the aurora and combine the logo design with the gradient of the aurora.', 43, NULL, 0x32333032),
(42, 23, 'ITV Studios', '2020-08-18', 'When ITV Productions became ITV Studios, Mammal redesigned their logo to reflect their positioning as the worldâ€™s leading creator and distributor of multi-platform entertainment.', 24, NULL, 0x32333033),
(43, 23, 'Università della Svizzera Italiana – EMScom Programme – Design by Moving Brands', '2020-09-18', 'The global creative company Moving Brands was engaged to develop this new corporate identity for EMScom programme at the Università della Svizzera Italiana (USI). The new corporate identity was designed to reflect the position and credibility among global C-level communications professionals.', 23, NULL, 0x32333034),
(44, 23, 'Monkey Logo', '2020-07-05', 'This is the logo of a personal webcomic of mine I have been working on for a couple years. Sadly I was absorbed into work and had to postpone it.', 15, NULL, 0x32333035),
(45, 23, 'Brazil', '2020-09-25', 'Oi! guys, this is my entry for Sticker Mule contest :)', 18, NULL, 0x32333036),
(46, 16, 'Chinese Allusions Dragon Legend', '2020-11-04', 'The inspiration for the illustrations comes from the Chinese classical legend—Prince Changqin. The prince was born and came to the world with a piano. One song and one song can lead the Phoenix to the Dragon. It is extremely beautiful, and it is combined with the earphone products to be more fit and echo.', 33, NULL, 0x31363032),
(47, 16, 'Mermaid Illustration', '2020-10-09', 'Illustrations for film characters.', 22, NULL, 0x31363033),
(48, 16, 'Mid-Autumn Packaging Illustration', '2020-09-10', 'Traditional Chinese style illustration combining elements of palace, osmanthus flower, Jade Rabbit, fairy, etc.', 25, NULL, 0x31363034),
(49, 16, 'Nine Color Deer Picture Book', '2020-10-09', 'The nine-color Deer was originally an ancient fairy tale, which told that a nine-color deer saved a drowning man, who later sold the nine-color deer for gold and silver. The king at first in order to satisfy the desire of the queen and to catch a deer of nine colors, finally moved by the nine colored deer kindness, to betray the people arrested nine colored deer, people in order to study the quality of the nine colored deer this good, whenever at this time, will take incense offerings to sacrifice it, nine colored deer guarding the whole forest and the people living here.', 17, NULL, 0x31363035);

-- --------------------------------------------------------

--
-- 表的结构 `portfolio-images`
--

CREATE TABLE `portfolio-images` (
  `ImageId` int(11) NOT NULL,
  `portfolioId` int(11) DEFAULT NULL,
  `portPic` longblob NOT NULL,
  `studentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `portfolio-images`
--

INSERT INTO `portfolio-images` (`ImageId`, `portfolioId`, `portPic`, `studentId`) VALUES
(8, 22, 0x30313032, 15),
(9, 22, 0x30313033, 15),
(14, 22, 0x30313034, 15),
(15, 22, 0x30313035, 15);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `studentId` int(10) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `major` varchar(45) NOT NULL,
  `school` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `studentAvatar` longblob DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`studentId`, `firstName`, `lastName`, `gender`, `major`, `school`, `email`, `password`, `address`, `studentAvatar`, `userId`) VALUES
(15, 'Isabella', 'Moner', 'female', 'illustration Design', 'Toronto University', 'IsabellaMoner@gmail.com', 'IsabellaMoner', 'Toronto, ON, Canada', 0x31, 1),
(16, 'Chang', 'Yan', 'female', 'illustration Design', 'Emily Carr University of Art + Design', 'ChangYan@gmail.com', 'ChangYan', '520 E 1st Ave, Vancouver, BC', 0x32, 2),
(17, 'Haitao', 'Huang', 'male', 'Graphic Design', 'OCAD University', 'HaitaoHuang@gmail.com', 'HaitaoHuang', 'Toronto, ON, Canada', 0x33, 3),
(18, 'Vengo', 'Gao', 'male', 'Graphic Design', 'School of Visual Arts', 'VengoGao@gmail.com', 'VengoGao', 'New York, NY 10010, United States', 0x34, 4),
(19, 'Hande', 'Ercel', 'female', 'illustration Design', 'NSCAD University', 'HandeErcel@gmail.com', 'HandeErcel', 'Halifax, NS, Canada', 0x35, 5),
(20, 'Donly', 'Ha', 'female', 'Graphic Design', 'Royal College of Art', 'DonlyHa@gmail.com', 'DonlyHa', 'London, United Kingdom', 0x36, 6),
(21, 'Jacky', 'Wam', 'male', 'Graphic Design', 'Polytechnic University of Milan', 'JackyWam@gmail.com', 'JackyWam', 'Milan, Italy', 0x37, 7),
(22, 'Luca', 'White', 'female', 'illustration Design', 'School of the Art Institute of Chicago', 'LucaWhite@gmail.com', 'LucaWhite', 'Chicago, Illinois, United States', 0x38, 8),
(23, 'Chen', 'Liu', 'male', 'Graphic Design', 'Sheridan College', 'ChenLiu@gmail.com', 'ChenLiu', 'Toronto, ON, Canada', 0x39, 9);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userType` varchar(80) NOT NULL,
  `userName` varchar(80) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userId`, `userType`, `userName`, `password`) VALUES
(1, 'student', 'IsabellaMoner@gmail.com', 'IsabellaMoner'),
(2, 'student', 'ChangYan@gmail.com', 'ChangYan'),
(3, 'student', 'HaitaoHuang@gmail.com', 'HaitaoHuang'),
(4, 'student', 'VengoGao@gmail.com', 'VengoGao'),
(5, 'student', 'HandeErcel@gmail.com', 'HandeErcel'),
(6, 'student', 'DonlyHa@gmail.com', 'DonlyHa'),
(7, 'student', 'JackyWam@gmail.com', 'JackyWam'),
(8, 'student', 'LucaWhite@gmail.com', 'LucaWhite'),
(9, 'student', 'ChenLiu@gmail.com', 'ChenLiu'),
(19, 'corporation', 'lccstudio@gmail.com', 'lccstudio');

--
-- 转储表的索引
--

--
-- 表的索引 `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- 表的索引 `corporation`
--
ALTER TABLE `corporation`
  ADD PRIMARY KEY (`corporationId`);

--
-- 表的索引 `corporation-portfolio`
--
ALTER TABLE `corporation-portfolio`
  ADD PRIMARY KEY (`commentId`);

--
-- 表的索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioId`);

--
-- 表的索引 `portfolio-images`
--
ALTER TABLE `portfolio-images`
  ADD PRIMARY KEY (`ImageId`);

--
-- 表的索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `corporation`
--
ALTER TABLE `corporation`
  MODIFY `corporationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `corporation-portfolio`
--
ALTER TABLE `corporation-portfolio`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 使用表AUTO_INCREMENT `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 使用表AUTO_INCREMENT `portfolio-images`
--
ALTER TABLE `portfolio-images`
  MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `studentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
