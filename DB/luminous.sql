-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2020 at 07:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luminous`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laravel'),
(2, 'PHP'),
(3, 'JavaScript'),
(4, 'Vue JS');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `comment_post_id` int(10) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`, `comment_status`) VALUES
(1, 2, 'sumon', 'sumon@gmail.com', 'test comment', '2020-11-28', 'approved'),
(2, 2, 'sumon', 'sumon@gmail.com', 'test comment', '2020-11-28', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_category_id` int(10) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_view_count` int(10) DEFAULT NULL,
  `post_comment_count` int(10) DEFAULT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_view_count`, `post_comment_count`, `post_status`) VALUES
(2, 3, '1914 translation by H. Rackham', 'admin', '2020-11-30', '41249a7543d9398e.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'javascript', 0, 0, 'published'),
(3, 1, 'The standard Lorem Ipsum passage, used since the 1500s', 'admin', '2020-11-30', '41249a7543d9398e.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'laravel', 1, 0, 'published'),
(4, 2, 'নতুন কি থাকছে পিএইচপি ৮ এ?', 'admin', '2020-11-30', 'php-8-is-here-blog.png', 'Quisque malesuada nulla velit, vel auctor libero efficitur at. Nunc dictum sapien ac dignissim convallis. Sed ut metus ex. In malesuada justo vitae dolor auctor dapibus. Curabitur non orci vitae ante aliquet bibendum. Nunc ac finibus lorem. Nulla facilisi. Nullam vitae posuere dolor, eget elementum urna. Ut vitae efficitur nisi. Cras vitae orci a purus semper tempus. Curabitur venenatis nisl nec aliquet scelerisque. Aliquam erat volutpat.\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum non malesuada purus. Sed a tortor mauris. Nullam quam erat, euismod non porttitor sit amet, ullamcorper sed nisl. Nunc imperdiet nisl quis mauris vestibulum, at ullamcorper tellus suscipit. Etiam cursus, diam at hendrerit varius, orci turpis euismod lectus, quis accumsan est dolor sed mauris. Donec lorem purus, gravida tincidunt elit et, placerat volutpat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean maximus nibh ac neque vehicula dictum. Aenean suscipit dolor eros, sodales vehicula justo dapibus eu.\r\nFusce pulvinar dolor est, et molestie orci faucibus in. Nulla faucibus suscipit odio nec maximus. In hac habitasse platea dictumst. Duis sem elit, facilisis at nunc non, placerat tristique risus. Nulla in pretium odio. Quisque at ex rutrum, pharetra metus ac, condimentum turpis. Sed pellentesque nibh non odio sollicitudin, eget commodo nisi faucibus. In accumsan mi eu magna facilisis, et vestibulum mauris interdum. Maecenas eget enim nisi. Donec eget est diam. Aliquam tempor velit non est ullamcorper vulputate. Vivamus mattis auctor justo. Sed sit amet lorem ac tellus auctor porta vitae vitae ante. Donec bibendum vel ligula a feugiat.\r\nAenean odio felis, ullamcorper quis mi eget, gravida ultricies erat. Suspendisse risus neque, suscipit vel auctor non, congue ut libero. Curabitur pulvinar enim nunc, vitae tempus velit aliquet at. Donec lacinia hendrerit nisl, eget egestas turpis scelerisque quis. Sed in ex posuere, vulputate libero eget, congue arcu. Vestibulum tortor lorem, pharetra ac malesuada nec, maximus a nunc. Quisque auctor egestas nunc ac condimentum. Aenean est dolor, ornare in lectus at, suscipit tempor massa. Vivamus at magna tempus, efficitur orci in, viverra metus. In sodales turpis vitae risus auctor, ut scelerisque quam rutrum. Aliquam venenatis sapien ac ante viverra cursus. Quisque eu eros vulputate, sollicitudin ex a, tristique justo. Sed et semper nisi, ac gravida metus. Sed ultrices pulvinar ornare. Aenean nec venenatis mauris, iaculis auctor neque. Cras maximus justo a enim rhoncus fermentum.', 'laravel', 1, 0, 'published'),
(5, 1, 'Why do we use it?', 'admin', '2020-12-01', '1ccf6e69f5eaf87a.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'php8', 2, 0, 'published'),
(6, 4, 'Vue JS ', 'admin', '2020-11-30', '41249a7543d9398e.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat tortor quis felis molestie accumsan. Vivamus commodo, erat et suscipit vulputate, nunc lacus scelerisque felis, ut suscipit nibh lacus vel purus. Sed sagittis eget ex ac venenatis. Proin a eros interdum, mollis turpis ac, tincidunt dolor. In sapien ligula, rhoncus eget fermentum ut, molestie sit amet dui. Maecenas tristique porta turpis at facilisis. In sed sem eget nunc euismod scelerisque. Vestibulum ac neque fringilla, aliquet purus dignissim, venenatis leo. Praesent nisi nibh, scelerisque vel fringilla at, dignissim vitae lectus. Phasellus sit amet velit dui. Vestibulum tincidunt auctor nisl ut commodo.\r\nAliquam libero lorem, varius vitae massa eu, tempor molestie purus. Proin a auctor lacus. Quisque congue massa nec erat maximus finibus. Maecenas ullamcorper euismod nunc eget bibendum. Quisque dignissim, risus sed hendrerit condimentum, est dolor ultrices tortor, in imperdiet nisl nunc nec sapien. Cras pretium quam metus, vitae condimentum est sollicitudin laoreet. Suspendisse potenti. Duis porta auctor risus, eu fermentum purus egestas ac. Pellentesque blandit leo in porttitor porttitor. Nam nec dolor lacinia, congue leo in, mollis nibh. Mauris neque ligula, consequat sed eleifend sit amet, tincidunt ut leo. Donec ante nibh, fringilla id iaculis faucibus, sollicitudin id velit. Cras lacinia mattis metus, non egestas nulla. Aenean suscipit lorem at lectus fringilla ultrices.\r\nPhasellus varius congue viverra. Aliquam et finibus turpis. Morbi a risus pulvinar, condimentum dui sodales, eleifend sapien. Nullam ut elit ut lectus placerat porta eget ac magna. Phasellus ac dignissim tortor, accumsan viverra purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae erat vitae magna elementum ornare dictum et elit. In imperdiet urna mauris, vitae ullamcorper nisl cursus id.', 'vuejs', 1, 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text DEFAULT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'admin', '$2y$10$tclCfm7NVGAiV70UmPzvBuRLjRQhsWImW8QAXcx.IkRQ/MJ8dEov.', 'Admin', 'User', 'admin@gmail.com', 'admin.png', 'admin', 'sdsd'),
(2, 'user', '$2y$12$Fi58tvdUWw1LKrG23tdd6ODBFoPy1G2NUVpPyW9VhynGsE2uMVfXm', 'User', '', 'user@user.com', NULL, 'subscriber', NULL),
(3, 'sazzad', '$2y$12$eKgP6LhmQxVdWh1qPRYEaOi1K7EOZzH.BSFpUskjxLMVg0IoDXByq', NULL, NULL, 'sazzad@gmail.com', NULL, 'subscriber', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(10) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '716724cfa04d1f78b1e42248b3d4554a', 1606760150),
(2, '0b77b8efb3bbb302cc57f4e0bab55166', 1606756889),
(3, '2393f376c05db3bf354bed168187c42a', 1606760014);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
