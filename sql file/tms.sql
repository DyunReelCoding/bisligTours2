-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 09:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-05-13 11:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `FromDate` varchar(100) NOT NULL,
  `ToDate` varchar(100) NOT NULL,
  `Comment` mediumtext NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(2, 1, 'anuj@gmail.com', '05/18/2017', '05/31/2017', '\"Lorem ipsum dolor sit amet, cpariatur. Excepteur sint ', '2017-05-13 19:01:10', 2, 'u', '2017-05-13 21:30:23'),
(3, 2, 'anuj@gmail.com', '05/16/2017', '05/31/2017', 'casf esd sg gd gdfh df', '2017-05-13 20:20:01', 2, 'a', '2017-05-13 23:04:40'),
(4, 1, 'anuj@gmail.com', '05/16/2017', '05/31/2017', 'dwef  fwe', '2017-05-13 20:32:54', 2, 'a', '2017-05-13 21:36:39'),
(5, 1, 'anuj@gmail.com', '05/16/2017', '05/31/2017', 'dwef  fwe', '2017-05-13 20:33:17', 1, NULL, '2017-05-13 23:11:35'),
(6, 2, 'anuj@gmail.com', '05/14/2017', '05/24/2017', 'test demo', '2017-05-13 21:18:37', 2, 'a', '2017-05-14 07:58:28'),
(7, 4, 'sarita@gmail.com', '05/26/2017', '05/30/2017', 'est laborum.\" velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\" velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-05-14 05:09:11', 2, 'a', '2017-05-14 07:47:39'),
(8, 2, 'sarita@gmail.com', '05/27/2017', '05/28/2017', 'ubub5u6', '2017-05-14 05:10:24', 2, 'a', '2017-05-14 05:13:03'),
(9, 1, 'demo@test.com', '05/19/2017', '05/21/2017', 'demo test demo test', '2017-05-14 07:45:11', 1, NULL, '2017-05-14 07:47:45'),
(10, 5, 'abc@g.com', '05/22/2017', '05/24/2017', 'test test t test test ttest test ttest test ttest test ttest test ttest test ttest test ttest test ttest test ttest test ttest test ttest test ttest test t', '2017-05-14 07:56:26', 1, NULL, '2017-05-14 07:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `MobileNumber` char(10) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`id`, `FullName`, `EmailId`, `MobileNumber`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(1, 'anuj', 'anuj.lpu1@gmail.com', '2354235235', 'The standard Lorem Ipsum passage, used since the 1500s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2017-05-13 22:23:53', 1),
(2, 'efgegter', 'terterte@gmail.com', '3454353453', 'The standard Lorem Ipsum passage', 'nventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat volup', '2017-05-13 22:27:00', 1),
(3, 'fwerwetrwet', 'fwsfhrtre@hdhdhqw.com', '8888888888', 'erwt wet', 'nventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat volup', '2017-05-13 22:28:11', 1),
(4, 'Test', 'test@gm.com', '4747474747', 'Test', 'iidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiidiid', '2017-05-14 07:54:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblissues`
--

CREATE TABLE `tblissues` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Issue` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminremarkDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblissues`
--

INSERT INTO `tblissues` (`id`, `UserEmail`, `Issue`, `Description`, `PostingDate`, `AdminRemark`, `AdminremarkDate`) VALUES
(4, 'anuj@gmail.com', 'Cancellation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', '2017-05-13 22:03:33', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '2017-05-13 23:50:40'),
(5, 'sarita@gmail.com', 'Cancellation', 'tbt 3y 34y4 3y3hgg34t', '2017-05-14 05:12:14', 'sg sd gs g sdgfs ', '2017-05-14 07:52:07'),
(6, 'demo@test.com', 'Refund', 'demo test.com demo test.comdemo test.comdemo test.comdemo test.com', '2017-05-14 07:45:37', NULL, '0000-00-00 00:00:00'),
(7, 'abc@g.com', 'Refund', 'test test ttest test ttest test ttest test ttest test ttest test t', '2017-05-14 07:56:46', 'vetet ert erteryre', '2017-05-14 07:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`) VALUES
(1, 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Welcome to Bislig Tours. Bislig Tours (hereafter referred to as \"we,\" \"us,\" or \"our\") provides the services (\"Service\") to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time on our website. In addition, when using particular Bislig Tours services, you shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which may be subject to change, are hereby incorporated by reference into the TOS. In case of any inconsistency between the TOS and any guidelines or rule, the TOS will prevail.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(2) USE OF SERVICES</FONT><BR><BR></STRONG>You agree to use the services provided by Bislig Tours solely for lawful purposes and in accordance with our TOS. You are responsible for ensuring that all information you provide during your use of the Service is accurate, complete, and up-to-date. You agree not to misuse the Service or engage in any activity that disrupts or interferes with the functioning of the website or services.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(3) ACCOUNT RESPONSIBILITY</FONT><BR><BR></STRONG>If you create an account with Bislig Tours, you are responsible for maintaining the confidentiality of your account details, including your username and password. You agree to notify us immediately if you become aware of any unauthorized access or use of your account. You are also responsible for all activities that occur under your account, regardless of whether you authorized such activities.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(4) BOOKING AND PAYMENT</FONT><BR><BR></STRONG>By booking a tour with Bislig Tours, you agree to provide accurate billing information, including your name, email address, and payment details. All payments for tours must be made in full before the commencement of the service unless otherwise agreed upon. We reserve the right to cancel or reschedule bookings if payments are not received in a timely manner.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(5) CANCELLATION POLICY</FONT><BR><BR></STRONG>If you need to cancel a tour or service, please refer to our cancellation policy. Cancellation fees may apply depending on the timing of your cancellation and the specific terms of your booking. Please review the specific terms before making a booking to avoid any confusion.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(6) LIMITATION OF LIABILITY</FONT><BR><BR></STRONG>To the maximum extent permitted by law, Bislig Tours is not responsible for any damages, losses, or liabilities arising from your use of the Service. We do not guarantee the availability of tours or services, and we are not liable for any cancellations, delays, or changes that occur due to unforeseen circumstances.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(7) PRIVACY POLICY</FONT><BR><BR></STRONG>Your privacy is important to us. Please review our Privacy Policy to understand how we collect, use, and protect your personal information.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(8) CHANGES TO TERMS</FONT><BR><BR></STRONG>We may update these TOS from time to time to reflect changes in our services or legal requirements. We will notify you of significant changes by posting a notice on our website or by sending you a notification. Your continued use of the Service after any changes constitutes your acceptance of the new TOS.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(9) CONTACT INFORMATION</FONT><BR><BR></STRONG>If you have any questions about these Terms of Service, please contact us at:<BR> Email: [Your email address]<BR> Phone: [Your phone number]<BR> Address: [Your business address]</FONT></P>\r\n'),
(2, 'privacy', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) INTRODUCTION</FONT><BR><BR></STRONG>Welcome to Bislig Tours. We value your privacy and are committed to protecting the personal information you share with us. This Privacy Policy explains how we collect, use, and safeguard your data when you use our services. By accessing or using our website, you agree to the terms of this Privacy Policy.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(2) INFORMATION WE COLLECT</FONT><BR><BR></STRONG>We collect the following types of information when you use our services: <BR>\r\n- Personal Information: When you book a tour or sign up for our services, we collect personal details such as your name, email address, phone number, and payment information. <BR>\r\n- Non-Personal Information: We may also collect non-personal data such as your browser type, IP address, and information about how you interact with our website.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(3) HOW WE USE YOUR INFORMATION</FONT><BR><BR></STRONG>Your information is used for the following purposes:<BR>\r\n- To process bookings and reservations <BR>\r\n- To communicate with you about your bookings, inquiries, or promotions <BR>\r\n- To improve our services and website experience <BR>\r\n- To send marketing materials and updates (you can opt-out at any time)<BR>\r\n- To comply with legal obligations and resolve disputes</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(4) HOW WE PROTECT YOUR INFORMATION</FONT><BR><BR></STRONG>We take reasonable measures to protect the security of your personal information. However, please note that no method of transmission over the internet is 100% secure, and we cannot guarantee absolute security. We implement physical, electronic, and procedural safeguards to help protect your data.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(5) SHARING YOUR INFORMATION</FONT><BR><BR></STRONG>We do not sell, rent, or share your personal information with third parties except in the following situations:<BR>\r\n- To service providers who assist us in operating our website and services (e.g., payment processors, email providers). These third parties are obligated to protect your information.<BR>\r\n- To comply with legal requirements or respond to a lawful request by public authorities.<BR>\r\n- To protect our rights, property, or safety, or the rights, property, or safety of others.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(6) COOKIES</FONT><BR><BR></STRONG>Our website uses cookies to enhance user experience, track visitors, and analyze website traffic. Cookies are small files stored on your device that help us improve the functionality of our site. You can manage cookie settings in your browser, but disabling cookies may affect your ability to use certain features of the site.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(7) DATA RETENTION</FONT><BR><BR></STRONG>We retain your personal information only for as long as necessary to fulfill the purposes outlined in this Privacy Policy. Once the information is no longer required, it will be securely deleted or anonymized.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(8) YOUR RIGHTS</FONT><BR><BR></STRONG>You have the right to access, update, or delete your personal information. If you wish to exercise these rights or have any questions about your data, please contact us at the details provided below. You can also withdraw your consent for marketing communications at any time by following the unsubscribe instructions in our emails.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(9) CHANGES TO THIS PRIVACY POLICY</FONT><BR><BR></STRONG>We may update this Privacy Policy from time to time. Any changes will be posted on our website, and the \"Last Updated\" date at the top of the policy will be revised accordingly. We encourage you to review this policy periodically to stay informed about how we protect your personal information.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(10) CONTACT INFORMATION</FONT><BR><BR></STRONG>If you have any questions or concerns about this Privacy Policy or how we handle your personal data, please contact us at:<BR> Email: [Your email address]<BR> Phone: [Your phone number]<BR> Address: [Your business address]</FONT></P>\r\n'),
(3, 'aboutus', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ABOUT BISLIG TOURS</FONT><BR><BR></STRONG>Welcome to Bislig Tours! We are a premier tour operator specializing in providing unforgettable travel experiences in and around Bislig City. Our team is passionate about showcasing the beauty, culture, and history of our region, offering a variety of curated tours to suit every type of traveler. Whether you\'re here for adventure, relaxation, or cultural exploration, we have something special for you.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(2) OUR MISSION</FONT><BR><BR></STRONG>At Bislig Tours, our mission is to offer high-quality, personalized tours that give you an authentic and memorable experience. We aim to provide our guests with the opportunity to explore Bislig\'s most stunning natural landmarks, vibrant communities, and unique attractions, all while ensuring the highest standards of safety and customer satisfaction. We believe in sustainable tourism practices that benefit both travelers and local communities.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(3) WHAT WE OFFER</FONT><BR><BR></STRONG>We offer a range of tours designed to suit different interests, including: <BR>\r\n- Eco-Tours: Explore Bislig\'s natural wonders, including rivers, waterfalls, and forests. <BR>\r\n- Cultural Tours: Learn about the rich history and traditions of the Bislig community. <BR>\r\n- Adventure Tours: Get your adrenaline pumping with activities like hiking, rafting, and ziplining. <BR>\r\n- Customized Tours: Create a personalized itinerary based on your preferences and interests.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(4) WHY CHOOSE US?</FONT><BR><BR></STRONG>We believe that every traveler is unique, and we strive to create tailored experiences that cater to your specific needs. Our team is made up of experienced local guides who are passionate about sharing their knowledge and love for Bislig with visitors. We are committed to offering tours that are both enriching and sustainable, ensuring that your visit leaves a positive impact on the local community and environment.</FONT></P>\r\n\r\n<P align=justify><FONT size=2><STRONG><FONT color=#990000>(5) CONTACT US</FONT><BR><BR></STRONG>For more information about our tours or to make a booking, please don’t hesitate to contact us. We look forward to welcoming you to Bislig and making your travel experience unforgettable! <BR>\r\nEmail: [Your email address] <BR>\r\nPhone: [Your phone number] <BR>\r\nWebsite: [Your website URL]</FONT></P>\r\n'),
(11, 'contact', '										<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">CONTACT US: BISLIG TOURS@GMAIL.COM</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) NOT NULL,
  `PackageType` varchar(150) NOT NULL,
  `PackageLocation` varchar(100) NOT NULL,
  `PackagePrice` int(11) NOT NULL,
  `PackageFetures` varchar(255) NOT NULL,
  `PackageDetails` mediumtext NOT NULL,
  `PackageImage` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Tinuy An Falls', 'General', 'BISLIG CITY', 100, 'Air Conditioning ,Balcony / Terrace,Cable / Satellite / Pay TV available,Ceiling Fan,Hairdryer', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 'Tinuy-an_Falls,_April_2011.jpg', '2017-05-13 14:23:44', '2024-11-17 02:11:49'),
(2, 'SIAN FALLS', 'Test', 'BISLIG CITY', 5433, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test demo test ', 'sian-falls.jpg', '2017-05-13 15:24:26', '2024-11-17 02:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `MobileNumber` char(10) NOT NULL,
  `EmailId` varchar(70) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(1, 'Anuj kumar', '1111111111', 'anuj@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', '2017-05-10 10:38:17', '2017-05-13 19:36:08'),
(3, 'sarita', '9999999999', 'sarita@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', '2017-05-10 10:50:48', '2017-05-14 07:40:19'),
(7, 'test', '7676767676', 'test@gm.com', 'f925916e2754e5e03f75dd58a5733251', '2017-05-10 10:54:56', '0000-00-00 00:00:00'),
(8, 'Anuj kumar', '9999999999', 'demo@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-05-14 07:17:44', '0000-00-00 00:00:00'),
(9, 'XYZabc', '3333333333', 'xyz@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-05-14 07:25:13', '2017-05-14 07:25:42'),
(10, 'Anuj Kumar', '4543534534', 'demo@test.com', 'f925916e2754e5e03f75dd58a5733251', '2017-05-14 07:43:23', '2017-05-14 07:46:57'),
(11, 'XYZ', '8888888888', 'abc@g.com', 'f925916e2754e5e03f75dd58a5733251', '2017-05-14 07:54:32', '2017-05-14 07:55:17'),
(12, 'JONRIEL', 'BALOYO', 'iamkirito50@gmail.com', '9d44c79f566ea47bc69ce88982e5b068', '2024-11-17 02:00:40', '0000-00-00 00:00:00'),
(13, 'jon', '1234', 'jon@gmail.com', '7340b06c59bfc780342aeceeafc09bbc', '2024-11-17 02:18:27', '0000-00-00 00:00:00'),
(14, 'jon', '123', 'jonriel@gmail.com', '9d44c79f566ea47bc69ce88982e5b068', '2024-11-17 02:56:08', '0000-00-00 00:00:00'),
(15, 'jonriel', '1234', 'jonriel123@gmail.com', '1dc8ae73587982012f3c9b5157fa2ffa', '2024-11-18 04:09:29', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissues`
--
ALTER TABLE `tblissues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblissues`
--
ALTER TABLE `tblissues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
