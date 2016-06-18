-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 18, 2016 at 09:33 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `myDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `comment`, `user_id`, `name`, `created_time`) VALUES
  (37, 21, 'Just started everybody!!', 14, 'Lebron James', '2016-06-17 01:12:25'),
  (47, 20, 'Thank you!! I will try my best.', 14, 'Lebron James', '2016-06-17 01:25:24'),
  (51, 20, 'Youre Welcome', 13, 'Kurt King', '2016-06-17 01:29:23'),
  (52, 21, 'Nice dunk', 13, 'Kurt King', '2016-06-17 01:29:35'),
  (53, 21, 'Lebron, stop playing so well.', 15, 'Steph Currry', '2016-06-17 01:32:21'),
  (54, 20, 'What about me!!', 15, 'Steph Currry', '2016-06-17 01:32:34'),
  (57, 22, 'Youre a crybaby steph', 13, 'Kurt King', '2016-06-17 01:34:12'),
  (58, 21, 'What a block!!! ', 13, 'Kurt King', '2016-06-17 01:34:40'),
  (61, 22, 'Yeah steph, you played awful tonight..', 17, 'Cool Kid', '2016-06-17 05:30:43'),
  (62, 21, 'Lebron, your stats were incredible!!', 17, 'Cool Kid', '2016-06-17 05:31:18'),
  (63, 22, 'This is a test comment', 18, 'test account', '2016-06-17 06:43:44'),
  (64, 20, 'Get out of here steph!', 17, 'Cool Kid', '2016-06-17 06:47:23'),
  (65, 27, 'Get out of here test account', 13, 'Kurt King', '2016-06-17 07:07:34'),
  (66, 27, 'Commenting', 13, 'Kurt King', '2016-06-17 15:21:12'),
  (67, 29, 'Posting a comment to check out the new color scheme\r\n', 13, 'Kurt King', '2016-06-17 23:05:06'),
  (69, 28, '    $var = mysqli_real_escape_string($var);\r\n', 13, 'Kurt King', '2016-06-18 00:59:19'),
  (70, 32, 'Decided to add some more stuff. ', 13, 'Kurt King', '2016-06-18 00:59:37'),
  (71, 31, 'Yuhh!! Awesome game.', 13, 'Kurt King', '2016-06-18 01:02:17'),
  (72, 32, 'Day three of testing more stuff.', 13, 'Kurt King', '2016-06-18 19:32:48'),
  (73, 31, 'Still need to quit crying as much. ', 13, 'Kurt King', '2016-06-18 19:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `likes` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `name`, `profile_image`, `user_id`, `content`, `likes`, `created_time`) VALUES
  (20, 'Kurt King', 'https://cdn-co.milespartnership.com/sites/default/master/files/MaroonBells.HeatherRousseau%5B1%5D_1.jpg', 13, 'Game 6 of the NBA finals is starting now!!! Lebron needs to step it up! Go CAVS!!', 5, '2016-06-17 05:31:24'),
  (21, 'Lebron James', 'http://dsz7vodgjx60a.cloudfront.net/wp-content/uploads/2015/04/24094746/lebron-james-cavaliers-celtics-game-3-first-round.jpg', 14, 'About to play in game 6 of the nba finals!! Woohoo.. Coming for you steph.', 4, '2016-06-17 05:32:25'),
  (22, 'Steph Currry', 'http://www.knbr.com/wp-content/uploads/sites/82/2015/11/CURRY-PROF.jpg', 15, 'The cavs are crushing us right now. :(', 20, '2016-06-17 15:34:13'),
  (26, 'Cool Kid', 'http://www.jaszymcallister.com/wp-content/uploads/2015/06/shutterstock_221103952.jpg', 17, 'This is a cool kids story', 4, '2016-06-17 15:34:39'),
  (27, 'test account', 'http://www.gettyimages.pt/gi-resources/images/Homepage/Hero/PT/PT_hero_42_153645159.jpg', 18, 'This is a test story', 6, '2016-06-18 00:46:46'),
  (28, 'Kurt King', 'https://cdn-co.milespartnership.com/sites/default/master/files/MaroonBells.HeatherRousseau%5B1%5D_1.jpg', 13, 'Today is a new day. Heres my next story', 0, '2016-06-17 22:53:44'),
  (29, 'Kurt King', 'https://cdn-co.milespartnership.com/sites/default/master/files/MaroonBells.HeatherRousseau%5B1%5D_1.jpg', 13, 'I had a great day today at work. I got a lot accomplished and will enjoy payday. I cannot wait to relax and have an enjoyable weekend. I really am just trying to type as much text out as possible to see how a post with a lot of text looks. Hope this is enough. What do you think? Is it enough to get an idea of how well everything formats regardless of the amount of text a user enters.', 3, '2016-06-18 00:46:42'),
  (31, 'Lebron James', 'http://dsz7vodgjx60a.cloudfront.net/wp-content/uploads/2015/04/24094746/lebron-james-cavaliers-celtics-game-3-first-round.jpg', 14, 'We crushed it last night!! See you in game 7. #MVP', 4, '2016-06-18 00:46:37'),
  (32, 'Kurt King', 'https://cdn-co.milespartnership.com/sites/default/master/files/MaroonBells.HeatherRousseau%5B1%5D_1.jpg', 13, 'Just finished working on my Web Tech project. I made a lot of progress today.', 8, '2016-06-18 00:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `gender` enum('Male','Female','Optional') NOT NULL,
  `verification_question` varchar(255) NOT NULL,
  `verification_answer` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `email`, `Name`, `dob`, `gender`, `verification_question`, `verification_answer`, `location`, `profile_pic`) VALUES
  (13, 'liveking', '$2y$10$P27HrK3IhFl4YXv06UNct.LEBugA9ply3Kk8ehjzp2mjUDrqQD8Qm', 'kurtaking@gmail.com', 'Kurt King', '4 June, 1992', 'Male', 'What is your favorite food?', 'Mexican Food', 'San Antonio, Texas', 'https://cdn-co.milespartnership.com/sites/default/master/files/MaroonBells.HeatherRousseau%5B1%5D_1.jpg'),
  (14, 'lebronjames', '$2y$10$DCJl2uu0u2NctqT2wh2CDuYNkxobWwn/Yw2grpntdODbHCkB3uuJq', 'lebronjames@gmail.com', 'Lebron James', '13 June, 2016', 'Male', 'What is your favorite sport?', 'Basketball', 'Cleveland, Ohio', 'http://dsz7vodgjx60a.cloudfront.net/wp-content/uploads/2015/04/24094746/lebron-james-cavaliers-celtics-game-3-first-round.jpg'),
  (15, 'stephcurry', '$2y$10$Ri6K8X5/5fH5LRHBF6wdaecsItQnIXXF3zO5zmUMo486/6gmWuEfy', 'stephcurry@gmail.com', 'Steph Currry', '16 June, 2016', 'Male', 'fdafs', 'fdaf', 'San Francisco, CA', 'http://www.knbr.com/wp-content/uploads/sites/82/2015/11/CURRY-PROF.jpg'),
  (17, 'CoolKid2', '$2y$10$z9gW1T/QObWRIZwgGqXbr.pSyQHf/mMeffTFNArcf85G9nV26l6S.', 'coolkid@gmail.com', 'Cool Kid', '15 June, 2016', 'Male', 'fdasf', 'dfasdf', 'San Antonio, TX', 'http://www.jaszymcallister.com/wp-content/uploads/2015/06/shutterstock_221103952.jpg'),
  (18, 'testaccount', '$2y$10$gZGIvGPiqQn1MpggsezDSOK1WnJwbSNu.ynrNmh.eWEP6jDq8oB4W', 'testaccount@gmail.com', 'test account', '28 June, 2016', 'Male', 'testaccount', 'testaccount', 'testaccount, AL', 'http://www.gettyimages.pt/gi-resources/images/Homepage/Hero/PT/PT_hero_42_153645159.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;