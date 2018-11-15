-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 06:04 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(60, 'Ruby'),
(59, 'PHP'),
(58, 'JAVA'),
(56, 'HTML'),
(57, 'CSS'),
(61, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copyright`
--

CREATE TABLE `tbl_copyright` (
  `id` int(11) NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_copyright`
--

INSERT INTO `tbl_copyright` (`id`, `copyright`) VALUES
(1, 'My Blog Site ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'About Us', '<p>&nbsp; About Us&nbsp; A street accident is a regular phenomenon in the highways and cities of our country. Every year it kills hundreds of lives. The indirect effect of this invisible monster is the downfall and untold suffering of hundreds of thousands of other people who are family members of those victims.&nbsp;A number&nbsp;of factors are&nbsp;responsible for this mishap including the inattentiveness of drivers, the working of a driver over too long a time at a stretch, the bad conditions of the streets, and most importantly, the maudlin competitiveness of the drivers. In Bangladesh, every day we find the news of road accident in our daily newspapers and the screen of television. It really makes us very shocked. Last month I faced such type of pathetic road accident. It occurred in Mirpur road near Kolabagan bus stand. When I was standing on the road and waiting for the bus. Then I saw a little boy who was trying to cross the busy road. When he was crossing the road at that time a bus was coming towards him with a great speed. But within a short time, it ran over the body of the boy and at once the boy was seriously injured. After sometimes when he was taken to the hospital, the doctor declared him death. Really, it made me more pathetic and I cannot forget it easily.</p>\r\n<p>&nbsp;</p>\r\n<p>A street accident is a regular phenomenon in the highways and cities of our country. Every year it kills hundreds of lives. The indirect effect of this invisible monster is the downfall and untold suffering of hundreds of thousands of other people who are family members of those victims.&nbsp;A number&nbsp;of factors are&nbsp;responsible for this mishap including the inattentiveness of drivers, the working of a driver over too long a time at a stretch, the bad conditions of the streets, and most importantly, the maudlin competitiveness of the drivers. In Bangladesh, every day we find the news of road accident in our daily newspapers and the screen of television. It really makes us very shocked. Last month I faced such type of pathetic road accident. It occurred in Mirpur road near Kolabagan bus stand. When I was standing on the road and waiting for the bus. Then I saw a little boy who was trying to cross the busy road. When he was crossing the road at that time a bus was coming towards him with a great speed. But within a short time, it ran over the body of the boy and at once the boy was seriously injured. After sometimes when he was taken to the hospital, the doctor declared him death. Really, it made me more pathetic and I cannot forget it easily.</p>\r\n<p>&nbsp;</p>'),
(2, 'Privacy', '<p>By signing up for the Shopify services or any of the services of Shopify Inc. or its affiliates (&ldquo;Shopify&rdquo;) you are agreeing to be bound by the following terms and conditions (&ldquo;Terms of Service&rdquo;). The services offered by Shopify under the Terms of Service include various products and services to help you sell goods and services to buyers, whether online (&ldquo;Online Services&rdquo;), in person (&ldquo;POS Services&rdquo;), or both. Any such services offered by Shopify are referred to in these Terms of Services as the &ldquo;Services&rdquo;. Any new features or tools which are added to the current Services shall be also subject to the Terms of Service. You can review the current version of the Terms of Service at any time at&nbsp;<a class="body-link" href="https://www.shopify.com/legal/terms" target="_blank">https://www.shopify.com/legal/terms</a>. Shopify reserves the right to update and change the Terms of Service by posting updates and changes to the Shopify website. You are advised to check the Terms of Service from time to time for any updates or changes that may impact you.</p>\r\n<p>You must read, agree with and accept all of the terms and conditions contained in this Terms of Service agreement, including Shopify&rsquo;s&nbsp;<a class="body-link" href="https://www.shopify.com/legal/aup" target="_blank">Acceptable Use Policy (&ldquo;AUP&rdquo;)</a>&nbsp;and&nbsp;<a class="body-link" href="https://www.shopify.com/legal/privacy" target="_blank">Privacy Policy</a>, and, if applicable,&nbsp;<a class="body-link" href="https://www.shopify.com/legal/dpa" target="_blank">Data Processing Addendum (&ldquo;DPA&rdquo;)</a>&nbsp;before you may become a Shopify user.</p>\r\n<p><strong>Everyday language summaries are provided for convenience only and are not legally binding. Please read the &ldquo;Terms of Service&rdquo; for the complete picture of your legal requirements. By using Shopify or any Shopify services, you are agreeing to these terms. Be sure to occasionally check back for updates.</strong></p>'),
(3, 'DMCA', '<p>A street accident is a regular phenomenon in the highways and cities of our country. Every year it kills hundreds of lives. The indirect effect of this invisible monster is the downfall and untold suffering of hundreds of thousands of other people who are family members of those victims.&nbsp;A number&nbsp;of factors are&nbsp;responsible for this mishap including the inattentiveness of drivers, the working of a driver over too long a time at a stretch, the bad conditions of the streets, and most importantly, the maudlin competitiveness of the drivers. In Bangladesh, every day we find the news of road accident in our daily newspapers and the screen of television. It really makes us very shocked. Last month I faced such type of pathetic road accident. It occurred in Mirpur road near Kolabagan bus stand. When I was standing on the road and waiting for the bus. Then I saw a little boy who was trying to cross the busy road. When he was crossing the road at that time a bus was coming towards him with a great speed. But within a short time, it ran over the body of the boy and at once the boy was seriously injured. After sometimes when he was taken to the hospital, the doctor declared him death. Really, it made me more pathetic and I cannot forget it easily.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>A</strong> street accident is a regular phenomenon in the highways and cities of our country. Every year it kills hundreds of lives. The indirect effect of this invisible monster is the downfall and untold suffering of hundreds of thousands of other people who are family members of those victims.&nbsp;A number&nbsp;of factors are&nbsp;responsible for this mishap including the inattentiveness of drivers, the working of a driver over too long a time at a stretch, the bad conditions of the streets, and most importantly, the maudlin competitiveness of the drivers. In Bangladesh, every day we find the news of road accident in our daily newspapers and the screen of television. It really makes us very shocked. Last month I faced such type of pathetic road accident. It occurred in Mirpur road near Kolabagan bus stand. When I was standing on the road and waiting for the bus. Then I saw a little boy who was trying to cross the busy road. When he was crossing the road at that time a bus was coming towards him with a great speed. But within a short time, it ran over the body of the boy and at once the boy was seriously injured. After sometimes when he was taken to the hospital, the doctor declared him death. Really, it made me more pathetic and I cannot forget it easily.</p>\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `catId`, `title`, `body`, `image`, `author`, `tags`, `date`, `userId`) VALUES
(52, 56, 'HTML 1st Post', '<p>The rainy season comes after the summer. The months of Ashadh-Shravan i.e. June to August is the rainy season. In this season the sky remains cloudy. Sometimes there is lightning and thunders-storm. It drizzles and rains cats and dogs for some hours. It becomes very difficult to go from one place to another. The communication systems are damaged badly.</p>\r\n<p>In this season the rivers, canals, tanks and other low land are full of water. The rivers go in spate and over-flood its bank causing havoc to the low lying villages. This causes much inconvenience to the people and they become homeless and take with their family members to nearby high places. After flood effects are much as epidemic starts. Markets cannot sit at regular intervals. The food stuff becomes dearth. The poor homeless people cannot buy food for want of money. Fuel also becomes scarce.&nbsp;&nbsp;The venomenous snakes, mosquitoes, flies, frogs and insects causes&rsquo; trouble. The roads become muddy and slushy.</p>\r\n<p>In this season the fields take a new look and the fields are full of flowers and fruits.&nbsp;&nbsp;It is the time for the cultivators to plough their lands and sow the seeds. The main crop rice is sown in this season apart from jute. Vegetables, pine apples, guava, jam are available in plenty.</p>\r\n<p>In spite of these difficulties the rainy season brings happiness to the minds of the people of the villages particularly the farmers.</p>', 'uploads/5fe22989ae.png', 'alamin rony', 'html, programming', '2018-10-25 19:20:51', 23),
(53, 57, 'CSS post will be here', '<p>The rainy season comes after the summer. The months of Ashadh-Shravan i.e. June to August is the rainy season. In this season the sky remains cloudy. Sometimes there is lightning and thunders-storm. It drizzles and rains cats and dogs for some hours. It becomes very difficult to go from one place to another. The communication systems are damaged badly.</p>\r\n<p>In this season the rivers, canals, tanks and other low land are full of water. The rivers go in spate and over-flood its bank causing havoc to the low lying villages. This causes much inconvenience to the people and they become homeless and take with their family members to nearby high places. After flood effects are much as epidemic starts. Markets cannot sit at regular intervals. The food stuff becomes dearth. The poor homeless people cannot buy food for want of money. Fuel also becomes scarce.&nbsp;&nbsp;The venomenous snakes, mosquitoes, flies, frogs and insects causes&rsquo; trouble. The roads become muddy and slushy.</p>\r\n<p>In this season the fields take a new look and the fields are full of flowers and fruits.&nbsp;&nbsp;It is the time for the cultivators to plough their lands and sow the seeds. The main crop rice is sown in this season apart from jute. Vegetables, pine apples, guava, jam are available in plenty.</p>\r\n<p>In spite of these difficulties the rainy season brings happiness to the minds of the people of the villages particularly the farmers.</p>', 'uploads/c1b406addf.jpg', 'alamin rony', 'css, programming', '2018-10-25 19:29:07', 23),
(54, 59, 'PHP tutorial for begginers', '<p>The rainy season comes after the summer. The months of Ashadh-Shravan i.e. June to August is the rainy season. In this season the sky remains cloudy. Sometimes there is lightning and thunders-storm. It drizzles and rains cats and dogs for some hours. It becomes very difficult to go from one place to another. The communication systems are damaged badly.</p>\r\n<p>In this season the rivers, canals, tanks and other low land are full of water. The rivers go in spate and over-flood its bank causing havoc to the low lying villages. This causes much inconvenience to the people and they become homeless and take with their family members to nearby high places. After flood effects are much as epidemic starts. Markets cannot sit at regular intervals. The food stuff becomes dearth. The poor homeless people cannot buy food for want of money. Fuel also becomes scarce.&nbsp;&nbsp;The venomenous snakes, mosquitoes, flies, frogs and insects causes&rsquo; trouble. The roads become muddy and slushy.</p>\r\n<p>In this season the fields take a new look and the fields are full of flowers and fruits.&nbsp;&nbsp;It is the time for the cultivators to plough their lands and sow the seeds. The main crop rice is sown in this season apart from jute. Vegetables, pine apples, guava, jam are available in plenty.</p>\r\n<p>In spite of these difficulties the rainy season brings happiness to the minds of the people of the villages particularly the farmers.</p>', 'uploads/74ff2c7369.jpg', 'alamin rony', 'php, programming', '2018-10-25 19:30:22', 23),
(55, 58, 'Java post will be here', '<p>The rainy season comes after the summer. The months of Ashadh-Shravan i.e. June to August is the rainy season. In this season the sky remains cloudy. Sometimes there is lightning and thunders-storm. It drizzles and rains cats and dogs for some hours. It becomes very difficult to go from one place to another. The communication systems are damaged badly.</p>\r\n<p>In this season the rivers, canals, tanks and other low land are full of water. The rivers go in spate and over-flood its bank causing havoc to the low lying villages. This causes much inconvenience to the people and they become homeless and take with their family members to nearby high places. After flood effects are much as epidemic starts. Markets cannot sit at regular intervals. The food stuff becomes dearth. The poor homeless people cannot buy food for want of money. Fuel also becomes scarce.&nbsp;&nbsp;The venomenous snakes, mosquitoes, flies, frogs and insects causes&rsquo; trouble. The roads become muddy and slushy.</p>\r\n<p>In this season the fields take a new look and the fields are full of flowers and fruits.&nbsp;&nbsp;It is the time for the cultivators to plough their lands and sow the seeds. The main crop rice is sown in this season apart from jute. Vegetables, pine apples, guava, jam are available in plenty.</p>\r\n<p>In spite of these difficulties the rainy season brings happiness to the minds of the people of the villages particularly the farmers.</p>', 'uploads/e3a3f854ef.jpg', 'alamin rony', 'java, programming', '2018-10-25 19:30:47', 23),
(56, 60, 'Ruby tutorial for begginers', '<p>The rainy season comes after the summer. The months of Ashadh-Shravan i.e. June to August is the rainy season. In this season the sky remains cloudy. Sometimes there is lightning and thunders-storm. It drizzles and rains cats and dogs for some hours. It becomes very difficult to go from one place to another. The communication systems are damaged badly.</p>\r\n<p>In this season the rivers, canals, tanks and other low land are full of water. The rivers go in spate and over-flood its bank causing havoc to the low lying villages. This causes much inconvenience to the people and they become homeless and take with their family members to nearby high places. After flood effects are much as epidemic starts. Markets cannot sit at regular intervals. The food stuff becomes dearth. The poor homeless people cannot buy food for want of money. Fuel also becomes scarce.&nbsp;&nbsp;The venomenous snakes, mosquitoes, flies, frogs and insects causes&rsquo; trouble. The roads become muddy and slushy.</p>\r\n<p>In this season the fields take a new look and the fields are full of flowers and fruits.&nbsp;&nbsp;It is the time for the cultivators to plough their lands and sow the seeds. The main crop rice is sown in this season apart from jute. Vegetables, pine apples, guava, jam are available in plenty.</p>\r\n<p>In spite of these difficulties the rainy season brings happiness to the minds of the people of the villages particularly the farmers.</p>', 'uploads/f737e7d7bc.png', 'alamin rony', 'ruby, programming', '2018-10-25 19:31:28', 23),
(57, 61, 'Python post will be here', '<p>The rainy season comes after the summer. The months of Ashadh-Shravan i.e. June to August is the rainy season. In this season the sky remains cloudy. Sometimes there is lightning and thunders-storm. It drizzles and rains cats and dogs for some hours. It becomes very difficult to go from one place to another. The communication systems are damaged badly.</p>\r\n<p>In this season the rivers, canals, tanks and other low land are full of water. The rivers go in spate and over-flood its bank causing havoc to the low lying villages. This causes much inconvenience to the people and they become homeless and take with their family members to nearby high places. After flood effects are much as epidemic starts. Markets cannot sit at regular intervals. The food stuff becomes dearth. The poor homeless people cannot buy food for want of money. Fuel also becomes scarce.&nbsp;&nbsp;The venomenous snakes, mosquitoes, flies, frogs and insects causes&rsquo; trouble. The roads become muddy and slushy.</p>\r\n<p>In this season the fields take a new look and the fields are full of flowers and fruits.&nbsp;&nbsp;It is the time for the cultivators to plough their lands and sow the seeds. The main crop rice is sown in this season apart from jute. Vegetables, pine apples, guava, jam are available in plenty.</p>\r\n<p>In spite of these difficulties the rainy season brings happiness to the minds of the people of the villages particularly the farmers.</p>', 'uploads/ce2acdb71c.png', 'alamin rony', 'Python, programming', '2018-10-25 19:32:12', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(51, '4th slider', 'uploads/slider/2bbaeced3b.jpg'),
(50, '3rd slider', 'uploads/slider/de496ac630.jpg'),
(49, '2nd slider', 'uploads/slider/4a06fbd4be.jpg'),
(48, '1st slider', 'uploads/slider/5bf2b17b47.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkdin` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `facebook`, `twitter`, `linkdin`, `google`) VALUES
(1, 'https://www.facebook.com/alamen.rony', 'www.twitter.com/rony', 'www.linkdin.com/rony', 'www.google.com/rony');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`adminID`, `adminName`, `adminUser`, `adminPass`, `email`, `details`, `role`) VALUES
(23, 'alamin rony', 'admin', '202cb962ac59075b964b07152d234b70', 'alaminrony49@gmail.com', '<p>I am rony</p>', 0),
(24, '', 'author', '202cb962ac59075b964b07152d234b70', 'salam@gmail.com', '', 1),
(25, '', 'editor', '202cb962ac59075b964b07152d234b70', 'rubel@gmail.com', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'My Blog Website', 'Learn to know & develop your Skill', 'uploads/Logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
