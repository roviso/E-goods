-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 08:16 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ongo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_address` text NOT NULL,
  `admin_phno` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_image`, `admin_address`, `admin_phno`, `admin_password`) VALUES
(1, 'Ravi Prajapati', 'ravi123@gmail.com', 'thump_1548572653.png', 'bhaktapur', '9860073000', '123456'),
(2, 'Adias', 'adias@gmail.com', 'thump_1548861483.jpg', 'dhulikhel', '016632525', 'helloworld');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `good_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`good_id`, `user_id`) VALUES
(13, 1),
(15, 8),
(7, 1),
(15, 9),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `good_id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `good_cat` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `good_title` text NOT NULL,
  `good_img1` text NOT NULL,
  `good_img2` text NOT NULL,
  `good_img3` text NOT NULL,
  `good_price` int(10) NOT NULL,
  `good_keywords` varchar(255) NOT NULL,
  `good_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`good_id`, `owner_id`, `good_cat`, `date`, `good_title`, `good_img1`, `good_img2`, `good_img3`, `good_price`, `good_keywords`, `good_desc`) VALUES
(5, 1, 1, '2019-01-26 12:17:44', 'women cloth', 'domi_1548505064.jpg', 'domi_1548505065.jpg', 'domi_1548505066.jpg', 3000, 'women cloth', '<p>newly imported cloth</p>'),
(6, 1, 1, '2019-01-25 05:45:48', 'jacket', 'a4.png', 'a4.png', 'a4.png', 1500, '0', 'wer'),
(7, 2, 2, '2019-01-25 14:02:04', 'watch', 'watch.jpeg.jpeg', 'watch.jpeg.jpeg', 'watch.jpeg.jpeg', 3000, '0', 'watch smart watch '),
(12, 1, 1, '2019-01-30 14:53:34', 'figuarine', 'domi_1548860013.jpg', 'domi_1548860014.jpg', 'domi_1548860015.jpg', 500, 'word word pages', '<p>whatttt</p>'),
(13, 3, 3, '2019-01-30 15:33:24', 'enter the void pictures', 'domi_1548862403.jpg', 'domi_1548862404.jpg', 'domi_1548862405.jpg', 10, 'enter the void pictures', '<p>enter the void pictures</p>'),
(15, 3, 2, '2019-01-30 16:13:42', 'bed', 'domi_1548864822.jpg', 'domi_1548864823.jpg', 'domi_1548864824.jpg', 50000, 'bed', '<p>bed very comfortable</p>'),
(16, 9, 2, '2019-01-31 09:15:11', 'asdjfk', 'domi_1548926110.jpg', 'domi_1548926111.jpg', 'domi_1548926112.jpg', 500, 'New item', '<p>nksdjflkjasdklfj</p>'),
(17, 10, 4, '2019-02-01 05:04:24', 'nikon d7000', 'domi_1548997463.jpg', 'domi_1548997464.jpg', 'domi_1548997465.jpg', 50000, 'camera dslr canon', '<p><span style=\"color: #404040; font-family: Arial, Helvetica, sans-serif; font-size: 14.004px;\">Nikon D7000 gives you 16.2 megapixels of vividly detailed images, a more sensitive DX-format CMOS sensor that delivers high ISO with low noise, plus various automatic and customizable settings to take your pictures and videos from great to gorgeous. Shoot up to 6 fps or record every second of the action with full HD 1080p D-Movies with Nikon&rsquo;s advanced autofocus system to impress and inspire.</span></p>'),
(18, 10, 4, '2019-02-01 05:06:09', 'The Canon EF 75-300mm telephoto zoom lens', 'domi_1548997568.jpg', 'domi_1548997569.jpg', 'domi_1548997570.jpg', 25000, 'lens camera canon dslr zoom', '<p><strong>Product Information&nbsp;</strong></p>\r\n<p>The Canon EF 75-300mm telephoto zoom lens is a lightweight and compact option ideal for shooting portraits, sports, and wildlife. It is compatible with full-frame and APS-C format Canon DSLRs. The Canon EF 75-300mm uses a DC motor instead of a USM to drive the AF. With a swift and sure autofocus thanks to that DC motor, this Canon telephoto lens delivers sharp images. It comes with a polarized filter that enables you to shoot easily through glass doors and underwater by minimizing brightness. Additionally, this 75-300mm telephoto lens can focus as close as 4.9 feet and another useful feature is that it has a UV filter which shields the equipment from dangerous ultraviolet rays.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Product Identifiers&nbsp;</strong></p>\r\n<p>Brand</p>\r\n<p>Canon</p>\r\n<p>MPN</p>\r\n<p>6473A003</p>\r\n<p>UPC</p>\r\n<p>0082966214073</p>\r\n<p>eBay Product ID (ePID)</p>\r\n<p>99692102</p>\r\n<p>&nbsp;</p>\r\n<p>Product Key Features&nbsp;</p>\r\n<p>Camera Technology</p>\r\n<p>Digital</p>\r\n<p>Camera Type</p>\r\n<p>SLR</p>\r\n<p>Focal Length</p>\r\n<p>75-300mm</p>\r\n<p>Series</p>\r\n<p>Canon EF</p>\r\n<p>Maximum Aperture</p>\r\n<p>f/4-5.6</p>\r\n<p>Focus Type</p>\r\n<p>Auto &amp; Manual</p>\r\n<p><strong>Type</strong></p>\r\n<p>Telephoto</p>\r\n<p>Product Line</p>\r\n<p>Canon EF</p>\r\n<p>Focal Length Type</p>\r\n<p>Zoom</p>\r\n<p>Additional Tech Characteristics</p>\r\n<p>III</p>\r\n<p>&nbsp;</p>\r\n<p>Dimensions&nbsp;</p>\r\n<p>Weight</p>\r\n<p>22.93oz.</p>\r\n<p>&nbsp;</p>\r\n<p>Additional Product Features&nbsp;</p>\r\n<p>Focal Length (mm)</p>\r\n<p>75-300mm</p>\r\n<p>Compatible Brand</p>\r\n<p>Canon</p>\r\n<p>Aperture</p>\r\n<p>&nbsp;</p>\r\n<p>F/4.0-5.6</p>'),
(19, 10, 3, '2019-02-01 05:10:30', 'Hasegawa 148 A-4C Sky Hawk #PT22', 'domi_1548997829.jpg', 'domi_1548997830.jpg', 'domi_1548997831.jpg', 3000, 'toy ', '<p>&nbsp;Plastic model that requires assembly and painting. Separately, tools, paint etc are necessary.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>+++About Shipping+++</p>\r\n<p>Please choose shipping method as follows.</p>\r\n<p>We will carefully deliver using the packing material.</p>\r\n<p>&nbsp;</p>\r\n<p>[Standard]SAL (with tracking number): 1-3 weeks</p>\r\n<p>&nbsp;</p>\r\n<p>[ebay Standard]Air (with tracking number) : 1-2 weeks</p>\r\n<p>&nbsp;</p>\r\n<p>[Expedited]EMS (with tracking number and insurance): 3-5 business days</p>\r\n<p>&nbsp;</p>\r\n<p>The shipping fee depends on the country.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>+++Payment+++</p>\r\n<p>We accept PayPal only.</p>\r\n<p>We usually ship within 3 business days of receiving cleared payment.</p>\r\n<p>Our return policy, In the only case of unopened item package.</p>\r\n<p>We ships from Japan This product. Import duties, taxes, and charges are not included in the item price or shipping cost. These charges are the buyer`s responsibility.</p>\r\n<p>&nbsp;</p>\r\n<p>+++International Buyers --- Please Note: +++</p>\r\n<p>*Import duties, taxes and charges are not included in the item price or shipping charges. These charges are the buyer`s responsibility.</p>\r\n<p>*Please check with your country`s customs office to determine what these additional costs will be prior to bidding/buying.</p>\r\n<p>*These charges are normally collected by the delivering freight (shipping) company or when you pick the item up do not confuse them for additional shipping charges.</p>\r\n<p>*If you are not sure about our item`s duties, Feel free to contact us.We will answer with respect to what we know.</p>'),
(20, 10, 1, '2019-02-01 05:12:00', 'Element sneakers size12 like brand new $25', 'domi_1548997919.jpg', 'domi_1548997920.jpg', 'domi_1548997921.jpg', 6000, 'Element sneakers shoes', '<p>Element sneakers size12 like brand new $25</p>'),
(21, 10, 1, '2019-02-01 05:16:43', 'Spaced Out Alien Halloween Costume ', 'domi_1548998202.jpg', 'domi_1548998203.jpg', 'domi_1548998204.jpg', 4000, 'Spaced Out Alien Halloween Costume ', '<p>Spaced Out Alien Halloween Costume&nbsp;</p>\r\n<p>New with Tags ($20.00)</p>\r\n<p>Size: Small (Ages 3 &amp; Up)</p>');

-- --------------------------------------------------------

--
-- Table structure for table `good_categories`
--

CREATE TABLE `good_categories` (
  `g_cat_id` int(11) NOT NULL,
  `g_cat_title` text NOT NULL,
  `g_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `good_categories`
--

INSERT INTO `good_categories` (`g_cat_id`, `g_cat_title`, `g_cat_desc`) VALUES
(1, 'Cloths', 'Clothes to wear in winter.'),
(2, '   Accessories   ', 'Accessories  of all kinds'),
(3, 'Others', 'miscellaneous goods'),
(4, 'Electronics', 'All electronics goods and stuff\r\n'),
(5, 'Auto-Mobiles', 'All automobile such as cars, bikes, scooters, etc');

-- --------------------------------------------------------

--
-- Table structure for table `intrested`
--

CREATE TABLE `intrested` (
  `good_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intrested`
--

INSERT INTO `intrested` (`good_id`, `user_id`) VALUES
(15, 8),
(12, 8),
(6, 8),
(15, 1),
(7, 1),
(15, 9),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `owner_id` int(10) NOT NULL,
  `good_id` int(10) NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `owner_id`, `good_id`, `type`, `message`, `status`, `date`) VALUES
(1, '', 0, 0, 'comment', 'hello what up', 'read', '2019-01-31 12:35:31'),
(2, '8', 1, 12, 'intrested', '', '', '2019-01-31 13:47:52'),
(3, '8', 1, 6, 'intrested', '', '', '2019-01-31 13:48:04'),
(4, '1', 3, 15, 'intrested', '', 'unread', '2019-01-31 14:08:37'),
(5, '1', 2, 7, 'intrested', '', 'unread', '2019-01-31 14:49:45'),
(6, '9', 3, 15, 'intrested', '', 'unread', '2019-01-31 15:00:57'),
(7, '9', 1, 6, 'intrested', '', 'unread', '2019-01-31 19:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'slide_1', '1.jpg'),
(2, 'slide_1', '2.jpg'),
(3, 'slide3', '1.jpg'),
(4, 'slide4', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_phno` varchar(255) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_address`, `user_phno`, `user_image`) VALUES
(1, 'Ravi', 'ravi123@gmail.com', '123456', 'Thimi, Bhaktapur', '9860073000', 'thump_1548915415.jpg'),
(2, 'ramcha', 'ramcha@gmail.com', '123456', 'dhilikhel', '9865543215', 'customer3.jpg'),
(3, 'Happy', 'happy@gmail.com', '123456', 'Kathmandu', '9852231654', 'thump_1548863139.jpg'),
(6, 'yarsyas', 'asdg@gmail.com', '123456', 'rty', '12346', 'thump_1548488761.jpg'),
(7, 'wandu', 'wandu23@gmail.com', '5555', 'dhulikhel', '9886666679', 'thump_1548571617.png'),
(8, 'Prakash', 'prakash@gmail.com', 'prakash', 'Swyambu', '9866666666', 'thump_1548915794.'),
(9, 'Avineak', 'ivawudal@gmail.com', '123456789', 'bhaktapur', '123456789', 'thump_1548926037.jpg'),
(10, 'Online Good', 'ongo@gmail.com', '123456', 'Dhulikhel', '9860031254', 'thump_1548997315.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD KEY `good_id` (`good_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`good_id`),
  ADD KEY `goods_ibfk_1` (`good_cat`);

--
-- Indexes for table `good_categories`
--
ALTER TABLE `good_categories`
  ADD PRIMARY KEY (`g_cat_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `good_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `good_categories`
--
ALTER TABLE `good_categories`
  MODIFY `g_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `goods` (`good_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`good_cat`) REFERENCES `good_categories` (`g_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
