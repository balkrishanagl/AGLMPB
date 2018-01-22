-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2018 at 06:01 AM
-- Server version: 5.6.23-72.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myproper_botique`
--

-- --------------------------------------------------------

--
-- Table structure for table `ask_experts`
--

CREATE TABLE IF NOT EXISTS `ask_experts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_budget` varchar(50) DEFAULT NULL,
  `customer_preference` text,
  `customer_pref_location` varchar(50) DEFAULT NULL,
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ask_experts`
--

INSERT INTO `ask_experts` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_budget`, `customer_preference`, `customer_pref_location`, `inserted_on`) VALUES
(2, 'Mithun', 'mithun@doodleblue.com', '9876543210', '5 - 7 Lac', 'Test', 'Test', '2017-09-06 07:28:06'),
(3, 'Vineeth', 'vineeth@doodleblue.com', '9876543210', '5 - 6 Lac', 'I need a apartment with 2 BHK and parking within Anna nagar. Please assist me.', 'Anna nagar', '2017-09-06 07:37:16'),
(4, '', '', '', '', '', '', '2017-10-28 07:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `name`) VALUES
(1, 'chennai');

-- --------------------------------------------------------

--
-- Table structure for table `contact_builder`
--

CREATE TABLE IF NOT EXISTS `contact_builder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `developer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact_builder`
--

INSERT INTO `contact_builder` (`id`, `developer_id`, `project_id`, `customer_name`, `customer_email`, `customer_phone`, `inserted_on`) VALUES
(1, 9, 118, 'Mithun', 'mithun@globeshout.com', '9876543210', '2017-09-26 12:40:23'),
(2, 1, 12, 'Mithun Testing', 'mithun@globeshout.com', '9876543210', '2017-09-26 18:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE IF NOT EXISTS `developers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `developer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_address` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `allowed_listings` int(11) NOT NULL,
  `used_listings` int(11) DEFAULT '0',
  `paid_ads` enum('0','1') NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `developer_id`, `name`, `contact_name`, `contact_email`, `contact_phone`, `contact_address`, `description`, `allowed_listings`, `used_listings`, `paid_ads`, `status`) VALUES
(1, 6, 'Radiance Reality  Developers', 'Radiance Reality ', 'radiancereality@gmail.com', '9876543210', 'Radiance Reality  Developers', 'Radiance Realty is a Real Estate Construction Firm in Chennai, built on Tradition and Legacy; driven by the Verve and Vigour of Youth. A Formidable Force in Indian Real Estate with a Nationwide presence dedicated to creating Premium Housing Solutions designed for the 21st century, Radiance Realty is a firm that passionately cares about exceeding the Customer’s Expectations. \r\nEach Project is designed and built on a Strong Foundation of Innovation, Perfection and Exuberance. Radiance Realty focuses on delivering Luxurious Lifestyle Options that are suited to the Modern Homeowner. With over 50 years of experience in the Real Estate segment, Radiance Realty has been a part of many New Beginnings and hopes to be a part of yours as well.', 10, 0, '0', 'enabled'),
(2, 7, 'WISDOM PROPERTIES', ' (PLOTS)', 'WISDOMPROPERTIES@gmail.com', '1236547890', 'WISDOM PROPERTIES (PLOTS)WISDOM PROPERTIES (PLOTS) 123', 'For over a decade, Wisdom Properties, the market leader, has played a major role in the real estate industry. We are a professionally managed company that has promoted several projects in and around Chennai, Tamilnadu. We are optimum and modest realtors promoting secured plots in ideal locations worthy of our customers'' investments.\r\nInvesting in a Wisdom Properties promoted land is an assured appreciation of property year after year as we take efforts to hand over CLEAR TITLE lands at affordable rates in prime locations. Commitment towards quality with honest, reliable and dependable dealings that is endorsed by major housing finance companies helps us bring your dream come true.', 10, 0, '0', 'enabled'),
(3, 8, 'ASHOK GROUP ', 'ASHOK GROUP', 'ASHOKGROUP@gmail.com', '2136547891', 'ASHOK GROUP (PLOTS)13254', 'Ashok Nandavanam Private Limited is a second generation real-estate company with over 2 decades experience in selling government approved residential and commercial plots in Chennai. Our projects and layouts are located in prime areas of Chennai and its suburbs and offer phenomenal return on investment over reasonable periods of time.\r\n\r\nAs a leading real estate and plot promoter in Chennai, we bring a wealth of local expertise, top-notch professionalism and experienced leadership at every touch point. We offer plots at reasonable rates, since we purchase land directly from their owners, develop the same and sell it to customers. This gives us the leverage to offer competitive prices at all times.', 10, 0, '0', 'enabled'),
(5, 10, 'ANANDA GREEN MANTRA', 'ANANDA ', 'ANANDAGREENMANTRA@gmail.com', '1236547891', 'ANANDA GREEN MANTRA (PLOTS)1234566', '  We are Layout Developers in Chennai with noticeable footprints in Bengaluru and Hyderabad. We are Ananda Green Mantra, known for our high proficiency and commitment.  \r\nWe develop lands to well-designed, secured gated communities. We give our habitats a green touch by taking care that the environment is not destroyed. We never compromise on providing an eco-friendly atmosphere to our valuable clients.', 10, 0, '0', 'enabled'),
(6, 11, 'TVH', 'TVH', 'TVH@gmail.com', '1234569870', 'TVH21245', 'TVH has come a long way since it was formed in 1997. What was once a small team of Civil Engineers with big dreams, has today become one of South India’s most respected realty companies. With ongoing projects across South India, marketing offices in Chennai Coimbatore, the team at TVH has its eyes set on the future to expand. A synergy of extensive experience, professional expertise and constant focus on innovation, TVH has many firsts to its credit, including Coimbatore’s largest residential gated community, the tallest residential building in Chennai, one of Chennai’s first truly green homes and lots more. Incorporating the very latest technology combined with green building practices into every project ensures that all TVH buildings are future ready.', 1, 0, '0', 'enabled'),
(7, 12, 'BLESSING LIFESPACES', 'BLESSING', 'BLESSINGLIFESPACES@gmail.com', '12345698710', 'BLESSING LIFESPACES 24334', 'Blessing builders an ISO 9001: 2008 construction company is 14 years old construction company and is one among the reputed builders in Chennai. Blessing builders is formed by its Managing directors Mr. Alexander and Mr. Samuel and after all these years they have made the company a best construction company in Chennai because of their hard work and client friendly nature. Being a best builders in Chennai, Blessing Builders has completed more than 20 prestigious projects which get them listed as best builders in Chennai.', 10, 0, '0', 'enabled'),
(8, 13, 'DRA', 'DRA', 'DRA@gmail.com', '4561239871', 'DRA 123344', 'Our management has collective industry experience of over 100 years and rich expertise across various functions of real estate development. All of which come together to spell NICE to our customers, employees, vendors and other stakeholders. From being the harbingers of apartment complex concept in Bangalore to developers of South India’s first ever township, DRA has proven its expertise, and made an indelible mark across the cities of Bangalore, Chennai, Goa and Mysore.\r\nDRA delivers Quality & Value leading to invaluable trust of our clients by: -\r\nMaintaining transparency in all our transactions,\r\nApplying appropriate and efficient technologies,\r\nMonitoring & evaluating processes & procedures continuously,\r\nEnsuring timely completion of projects,\r\nThis will be achieved through continual improvement and dedication by our trained team of people.', 10, 0, '0', 'enabled'),
(9, 14, 'SRIPA AQUA', 'SRIPA ', 'SRIPAAQUA@gmail.com', '1236547891', 'SRIPA AQUA1234455', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distrib', 10, 0, '0', 'disabled'),
(10, 15, 'KRITICONS', 'KRITICONS', 'KRITICONS@gmail.com', '2314567891', 'KRITICONS c123567', ' Kriticons is one of the promising builders in the field of Real Estate. The group mainly focuses on delivering high quality spaces and have been powering the goals of emerging and dynamic middle class ', 10, 0, '0', 'enabled'),
(11, 16, 'SHIRIDI SHELTERS', 'SHIRIDI ', 'SHIRIDI@gmailcom', '2361459871', ' SHIRIDI SHELTERS 11324', 'Shirdi Shelters is a renowned real estate developer having its base in Chennai. It is led by Mr. V. Chandran, who had a vision to redefine the skyline of Chennai with elegant living structures. Over t', 10, 0, '0', 'enabled'),
(12, 17, 'MAHALAKSHMI BUILDERS', 'MAHALAKSHMI ', 'MAHALAKSHMIBUILDERS@gmail.com', '1236547891', 'MAHALAKSHMI BUILDERS1324', 'Mahalakshmi Builders is a name in the market of Real Estate and promoting business on which you can keep your trust with closed eyes. The Company has created their strong foundation on the basis of th', 10, 0, '0', 'enabled'),
(13, 18, 'MGP BUILDERS', 'MGP ', 'MGPBUILDERS@gmail.com', '9562314785', 'MGP BUILDERS 13345', 'We at MGP are committed to providing our clients with a comprehensive range of products including single family detached / attached residences, low / high-rise apartments, commercial complexes and sub', 10, 0, '0', 'enabled'),
(14, 19, 'RWD', 'RWD', 'RWD@gmail.com', '9654123654', 'RWD 1324', 'Ramky Wavoo Developers is one of the best Builders in Chennai are mainly engaged in promoting residential apartments in Chennai.', 10, 0, '0', 'enabled'),
(15, 20, 'LOKAA', 'LOKAA', 'LOKAA@gmail.com', '9785461235', 'LOKAA 1637', 'At Lokaa, being extraordinary is the mantra. Because that is what the world deserves. Every Lokaa creation is one-of-a-kind, be it a luxury home or a commercial building', 10, 0, '0', 'enabled'),
(16, 21, 'ADVAITA', 'ADVAITA', 'ADVAITA@gmail.com', '9564123741', 'ADVAITA 12344556', ' Over the years, Advaitaa Homes India Pvt Ltd has earned a formidable reputation for delivering quality, effectiveness and value. The ability to cross-reference information from an enormous database, c ', 8, 0, '0', 'enabled'),
(17, 22, 'SOBHA', 'SOBHA', 'SOBHA@gmail.com', '9875641235', 'SOBHA 1233', 'We are one of the largest and only backward integrated real estate players in the country. Since inception, we have strived for benchmark quality, customer centric approach, robust engineering, in-hou', 10, 0, '0', 'enabled'),
(18, 23, 'SPERO', 'SPERO', 'SPERO@gmail.com', '9564123785', 'SPERO 1257778', 'SPERO is spearheading a new era of real estate with our dynamic business model and revolutionary vision. Each and every Spero project is responsibly sourced and immaculately executed, keeping you in m', 10, 0, '0', 'enabled'),
(19, 24, 'NAVIN''S', 'NAVIN''S', 'NAVIN''S@gmail.com', '9546781236', 'NAVIN''S 123454', ' NAVIN''S, A name that has created some of the finest homes and office spaces since 1989. Today, over 100 projects stand testimony to a passion called Navins ', 10, 0, '0', 'enabled'),
(20, 25, 'ANKUR CONSTRUCTIONS', 'ANKUR CONSTRUCTIONS', 'ANKURCONSTRUCTIONS@gmail.com', '1236547894', 'ANKUR CONSTRUCTIONS 1234', ' At Ankur Constructions, we believe in delivering the finest quality in every project we handle. All our projects adhere to our strict quality standards thereby providing excellent value for money for  ', 10, 0, '0', 'enabled'),
(21, 26, 'Mahindra', 'MAHINDRA', 'MAHINDRA@gmail.com', '6543217891', 'MAHINDRA 12345', ' Mahindra Lifespaces is one of the most reputed residential property developer in India, Offering you world class affordable apartments in Mumbai, Bengaluru, Chennai, Nagpur, Pune, Gurgaon, and Hyderab ', 10, 0, '0', 'enabled'),
(22, 27, 'RAUNAQ FOUNDATIONS', 'RAUNAQ', 'RAUNAQFOUNDATIONS@gmail.com', '8794561231', 'RAUNAQ FOUNDATIONS 1234355', ' Raunaq Foundations is part of Group Raunaq, which includes diverse businesses that have been steeped in the tradition of focusing on quality and supreme customer service. The construction branch of Gr ', 10, 0, '0', 'enabled'),
(23, 28, 'TVS EMERALD', 'TVS ', 'TVSEMERALD@gmail.com', '8807787878', 'Emerald Haven Realty Limited, 1st Floor, Greenways Tower,  119, St.Mary''s Road, Abhiramapuram, Chennai-600018', ' The TVS Group, the holding company of TVS Emerald, is one of India''s leading business houses, with over 50 group companies, close to 40,000 employees, and a turnover of over USD 6 billion. Started by  ', 10, 0, '0', 'enabled'),
(24, 29, 'VSU', 'VSU', 'VSU@gmail.com', '4561239871', 'VSU 1323242', ' It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distrib ', 10, 0, '0', 'enabled'),
(25, 30, 'Casa Grand', 'CASA GRAND', 'casagrand@gmail.com', '4547812568', 'CASA GRANDE 132435', ' Casagrand Builder Private Limited (est. 2004), is an ISO-certified real estate enterprise committed to building aspirations and delivering value. In the last thirteen years, we have developed over 9 million sqft of prime residential real estate across Chennai, Bengaluru, and Coimbatore. Over 4000 happy families across 68 landmark properties stand testimony to our commitment. ', 10, 0, '1', 'enabled'),
(26, 31, 'Bhaggyam Constructions', 'BHAGGYAM CONSTRUCTIONS', 'BhaggyamConstructions@gmail.com', '3214569874', 'Bhaggyam Constructions 132435', ' Bhaggyam builders are leading in basic construction & technologies field from past 20years. Find best residential flats and Apartments around OMR & Sholinganalur with us ', 10, 0, '0', 'enabled'),
(27, 32, 'Vijayshanthi', 'VIJAYSHANTHI', 'vijayshanthi@gmail.com', '2145367894', 'Vijayshanthi 1134234', 'Vijay Shanthi Builders Limited was started in 1977 as a partnership firm in the name of Shri Shanthi Constructions by Late Mr. V. C. Jain. With an aspiration to create “homes for all”, Vijay Shanthi w', 10, 0, '1', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
  `facilities_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`facilities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facilities_id`, `name`, `img_url`) VALUES
(1, 'Lift', '1516362760lift.png'),
(2, 'Swimming Pool', '1516363020swiming_pool.png'),
(3, 'Parking', '1516363544car_park.png'),
(4, 'Gym', '1516365372gym.png'),
(19, 'Play Area', '1516353003537029-200.png'),
(20, 'Tennis Court', '1516368970tennis.png'),
(21, 'jogging Track', '1516367634jogging_track.png'),
(27, 'Test', '15064368301487856210_167.jpg'),
(28, 'Test2', '1506436903Project-Photo-7-Kochar-Panchsheel-Chennai-5021231_488_1366.jpg'),
(29, 'walkingTrack', '151635319512965-200.png'),
(30, 'gazebos', '1516366822gazebos.png'),
(31, 'vasthu', '1516368802vasthu.png');

-- --------------------------------------------------------

--
-- Table structure for table `facility_maps`
--

CREATE TABLE IF NOT EXISTS `facility_maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1317 ;

--
-- Dumping data for table `facility_maps`
--

INSERT INTO `facility_maps` (`id`, `facility_id`, `project_id`) VALUES
(263, 2, 111),
(280, 2, 112),
(281, 4, 112),
(282, 19, 112),
(283, 21, 112),
(287, 2, 114),
(288, 3, 114),
(289, 4, 114),
(290, 2, 116),
(291, 3, 116),
(294, 1, 118),
(295, 1, 119),
(296, 2, 119),
(297, 3, 119),
(298, 4, 119),
(308, 2, 120),
(309, 3, 120),
(310, 4, 120),
(349, 2, 125),
(350, 4, 125),
(351, 19, 125),
(352, 2, 121),
(353, 4, 121),
(354, 19, 121),
(363, 2, 122),
(364, 4, 122),
(510, 4, 1),
(937, 3, 17),
(1096, 1, 2),
(1097, 2, 2),
(1098, 3, 2),
(1099, 4, 2),
(1100, 19, 2),
(1101, 20, 2),
(1102, 21, 2),
(1103, 27, 2),
(1104, 21, 3),
(1239, 21, 4),
(1240, 21, 5),
(1241, 1, 6),
(1242, 2, 6),
(1243, 3, 6),
(1244, 4, 6),
(1245, 19, 6),
(1246, 20, 6),
(1247, 21, 6),
(1248, 1, 7),
(1249, 2, 7),
(1250, 3, 7),
(1251, 4, 7),
(1252, 19, 7),
(1253, 20, 7),
(1254, 21, 7),
(1255, 1, 8),
(1256, 2, 8),
(1257, 3, 8),
(1258, 4, 8),
(1259, 20, 8),
(1260, 1, 9),
(1261, 2, 9),
(1262, 3, 9),
(1263, 4, 9),
(1264, 19, 9),
(1265, 20, 9),
(1266, 1, 10),
(1267, 2, 10),
(1268, 3, 10),
(1269, 1, 11),
(1270, 2, 11),
(1271, 3, 11),
(1272, 4, 11),
(1273, 19, 11),
(1274, 20, 11),
(1275, 1, 12),
(1276, 2, 12),
(1277, 3, 12),
(1278, 4, 12),
(1279, 19, 12),
(1280, 20, 12),
(1281, 1, 13),
(1282, 2, 13),
(1283, 4, 13),
(1284, 19, 13),
(1285, 21, 13),
(1286, 1, 14),
(1287, 2, 14),
(1288, 3, 14),
(1289, 4, 14),
(1290, 19, 14),
(1291, 20, 14),
(1292, 21, 14),
(1293, 2, 15),
(1294, 3, 16),
(1295, 3, 18),
(1296, 3, 19),
(1297, 19, 19),
(1298, 3, 20),
(1299, 19, 20),
(1300, 21, 20),
(1301, 1, 22),
(1302, 3, 22),
(1303, 19, 22),
(1304, 1, 21),
(1305, 2, 21),
(1306, 3, 21),
(1307, 4, 21),
(1308, 19, 21),
(1309, 20, 21),
(1310, 1, 23),
(1311, 2, 23),
(1312, 3, 23),
(1313, 4, 23),
(1314, 19, 23),
(1315, 20, 23),
(1316, 21, 23);

-- --------------------------------------------------------

--
-- Table structure for table `featured_pages`
--

CREATE TABLE IF NOT EXISTS `featured_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `img_url` varchar(200) NOT NULL,
  `slot` enum('1','2','3','4','5','6','7') NOT NULL DEFAULT '7',
  `status` enum('enable','disable') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `featured_pages`
--

INSERT INTO `featured_pages` (`id`, `name`, `description`, `img_url`, `slot`, `status`) VALUES
(1, 'Luxury Villas', 'All Luxury Villas', '1506342024cover.JPG', '1', 'enable'),
(2, 'Budget Apartments', 'A handpicked list of low cost Apartments', '1506346565apartment-buildings.jpg', '2', 'enable'),
(3, 'Projects by Casa Grande', 'A curated list of projects of Casa Grande', '1506448708Project-Photo-7-Kochar-Panchsheel-Chennai-5021231_488_1366.jpg', '3', 'enable'),
(4, 'Gated Communities by Kochar Homes', 'A curated list of projects of Kochar Homes', '1506449244apartment-buildings.jpg', '4', 'enable'),
(5, 'test', 'test', '', '7', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `featured_pages_maps`
--

CREATE TABLE IF NOT EXISTS `featured_pages_maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `featured_page_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `featured_pages_maps`
--

INSERT INTO `featured_pages_maps` (`id`, `featured_page_id`, `project_id`) VALUES
(1, 1, 118),
(4, 2, 114),
(5, 1, 114),
(6, 3, 7),
(7, 3, 8),
(8, 3, 9),
(9, 3, 10),
(10, 3, 12),
(11, 4, 112),
(12, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `home_images`
--

CREATE TABLE IF NOT EXISTS `home_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` enum('banner','footer') NOT NULL,
  `developer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `options` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `home_images`
--

INSERT INTO `home_images` (`id`, `name`, `type`, `developer_id`, `project_id`, `options`) VALUES
(1, '1516126204olympia_sequel.jpg', 'banner', 7, 3, 1),
(3, '1516126422radiance_mercury.jpg', 'banner', 6, 2, 1),
(4, '1516126665tvh_ouranya.jpg', 'banner', 7, 4, 1),
(5, '1516126710vijayshanthi_art.jpg', 'banner', 13, 8, 1),
(6, '1516126204olympia_sequel.jpg', 'banner', 7, 8, 2),
(7, '1516126422radiance_mercury.jpg', 'banner', 6, 4, 2),
(8, '1516126665tvh_ouranya.jpg', 'banner', 7, 3, 2),
(9, '1516126710vijayshanthi_art.jpg', 'banner', 13, 2, 2),
(10, '1516126204olympia_sequel.jpg', 'banner', 7, 8, 3),
(11, '1516126422radiance_mercury.jpg', 'banner', 6, 2, 3),
(12, '1516126665tvh_ouranya.jpg', 'banner', 7, 4, 3),
(13, '1516126710vijayshanthi_art.jpg', 'banner', 13, 3, 3),
(14, '1516126204olympia_sequel.jpg', 'banner', 7, 3, 4),
(15, '1516126422radiance_mercury.jpg', 'banner', 6, 2, 4),
(16, '1516126665tvh_ouranya.jpg', 'banner', 7, 4, 4),
(17, '1516126710vijayshanthi_art.jpg', 'banner', 13, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`keyword_id`, `name`) VALUES
(1, 'Tambaram'),
(2, 'OMR'),
(3, 'Apartments'),
(25, 'Nungambakkam');

-- --------------------------------------------------------

--
-- Table structure for table `keyword_maps`
--

CREATE TABLE IF NOT EXISTS `keyword_maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE IF NOT EXISTS `listings` (
  `listing_id` int(11) NOT NULL AUTO_INCREMENT,
  `developer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `bhk` int(5) NOT NULL,
  `bathrooms` int(5) NOT NULL,
  `price` int(11) NOT NULL,
  `sqft_price` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `super_build_area` int(11) DEFAULT NULL,
  `carpet_area` int(11) DEFAULT NULL,
  `description` text,
  `available_listings` int(11) NOT NULL DEFAULT '1',
  `property_type_id` int(11) NOT NULL,
  `property_status` int(11) NOT NULL,
  `img_url` varchar(500) DEFAULT NULL,
  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`listing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`listing_id`, `developer_id`, `project_id`, `bhk`, `bathrooms`, `price`, `sqft_price`, `size`, `super_build_area`, `carpet_area`, `description`, `available_listings`, `property_type_id`, `property_status`, `img_url`, `status`, `updated_on`) VALUES
(2, 7, 1, 3, 4, 450002, 953, 3002, 1248, 1452, 'test addrsdsd', 18, 3, 2, '1515591220dean_profile_icon.jpg', 'enabled', '2018-01-10 13:33:40'),
(3, 7, 5, 0, 0, 420000, 695, 596, 0, 0, '', 0, 4, 1, NULL, 'enabled', '2018-01-10 13:35:27'),
(4, 7, 4, 0, 0, 740000, 1200, 2033, 0, 0, '', 0, 4, 1, NULL, 'enabled', '2018-01-10 13:39:44'),
(5, 13, 8, 3, 0, 9600000, 7750, 1147, 0, 0, '', 0, 3, 2, NULL, 'enabled', '2018-01-10 13:50:05'),
(6, 13, 9, 3, 0, 3318000, 3335, 1298, 0, 0, '', 0, 3, 2, NULL, 'enabled', '2018-01-10 13:52:02'),
(7, 17, 17, 2, 0, 3900000, 3000, 1052, 0, 0, '', 0, 0, 2, NULL, 'enabled', '2018-01-10 14:04:50'),
(8, 16, 16, 3, 0, 5900000, 4500, 1050, 0, 0, '', 0, 0, 2, NULL, 'enabled', '2018-01-10 14:07:07'),
(9, 15, 10, 3, 0, 6000000, 3650, 986, 0, 0, '', 0, 0, 1, NULL, 'enabled', '2018-01-10 14:10:37'),
(10, 15, 13, 3, 0, 8500000, 4650, 1045, 0, 0, '', 0, 0, 2, NULL, 'enabled', '2018-01-10 14:12:01'),
(11, 6, 2, 3, 0, 1750000, 3499, 966, 0, 0, '', 0, 0, 1, NULL, 'enabled', '2018-01-22 05:24:43'),
(12, 30, 7, 2, 0, 2452000, 3450, 590, 0, 0, '', 0, 0, 2, NULL, 'enabled', '2018-01-10 14:37:51'),
(13, 31, 6, 3, 0, 6300000, 5250, 1200, 0, 0, '', 0, 0, 2, NULL, 'enabled', '2018-01-10 14:44:59'),
(14, 25, 23, 4, 0, 17900000, 5999, 3119, 0, 0, '', 0, 0, 1, NULL, 'enabled', '2018-01-12 08:42:35'),
(15, 32, 22, 4, 0, 119400000, 20000, 6300, 0, 0, '', 0, 0, 1, NULL, 'enabled', '2018-01-12 08:46:50'),
(16, 32, 20, 4, 0, 2500000, 1790, 4154, 0, 0, '', 0, 0, 1, NULL, 'enabled', '2018-01-12 10:04:28'),
(17, 32, 19, 4, 0, 3000000, 3200, 2380, 0, 0, '', 0, 0, 1, NULL, 'enabled', '2018-01-12 10:45:30'),
(19, 32, 18, 2, 0, 16200000, 15000, 1094, 0, 0, '', 0, 0, 1, NULL, 'enabled', '2018-01-12 10:54:58'),
(20, 7, 3, 0, 0, 237000, 395, 600, 0, 0, '', 0, 4, 1, NULL, 'enabled', '2018-01-22 05:25:01'),
(21, 28, 14, 4, 0, 8589000, 5550, 1486, 0, 0, '', 0, 0, 1, NULL, 'enabled', '2018-01-12 11:38:04'),
(29, 28, 11, 2, 2, 2630000, 4367, 580, 580, 500, 'TVS Emerald Green Acres by Emerald Haven Development Limited is built for all the generations remaining relevant for years to come. With one of the most sought after locations, Kolapakkam in Chennai, lush greenery all around it and a host of luxurious amenities, TVS Emerald Green Acres is the pick of the present and a portal to the future. It is thoughtfully planned with apartments and the elegant villas with abundant space for ventilation. It has been designed to provide you with the greatest luxury anyone can offer, space. Easily accessible, yet away from the hustle and bustle of the city, TVS Emerald Green Acres provides you with a fun and peaceful lifestyle in Chennai.', 1, 3, 1, NULL, 'enabled', '2018-01-17 10:14:05'),
(30, 28, 11, 3, 3, 5210000, 4367, 1193, 1193, 1193, 'GreenAcres offers you 2 & 3 BHKs with more variations in the form of Smart, Spacious, Premium & Elite homes. Our fourth floor apartments comes up with balcony garden. You’ll find enough choice here to give a comfortable living space to all your dear ones. Take a look at the different units below', 3, 3, 1, NULL, 'enabled', '2018-01-17 10:16:37'),
(31, 28, 15, 2, 2, 8680000, 5841, 1485, 1486, 1486, 'GreenAcres offers you, and your future generations, two choices for independent living, all impeccable in their own way. Begin the lifestyle of several lifetimes by taking a closer look at the spaces below', 1, 2, 1, NULL, 'enabled', '2018-01-17 10:19:23'),
(32, 28, 15, 3, 3, 10300000, 5841, 1769, 1769, 1769, 'GreenAcres offers you, and your future generations, two choices for independent living, all impeccable in their own way. Begin the lifestyle of several lifetimes by taking a closer look at the spaces below', 3, 2, 1, NULL, 'enabled', '2018-01-17 10:21:05'),
(33, 28, 12, 2, 2, 6550000, 5874, 1115, 1115, 1115, 'Strategically located at Pallavaram in Chennai, TVS Emerald LightHouse by Emerald Haven Realty Limited offers internationally styled condominiums equipped with all world-class facilities required for a luxurious, convenient and happy life. Inspired by the condominiums in Singapore, it is a perfect combination of innovative architecture and ideal location with all the basic facilities nearby. A exclusive Tower Lounge on the 12th and 13th floor offering a splendid view of the city. Well-equipped with all the modern amenities, residents are invited to unwind and build a strong sense of community', 2, 3, 2, NULL, 'enabled', '2018-01-17 10:26:14'),
(34, 28, 12, 3, 3, 9040000, 6402, 1412, 1412, 1412, 'Strategically located at Pallavaram in Chennai, TVS Emerald LightHouse by Emerald Haven Realty Limited offers internationally styled condominiums equipped with all world-class facilities required for a luxurious, convenient and happy life. Inspired by the condominiums in Singapore, it is a perfect combination of innovative architecture and ideal location with all the basic facilities nearby. A exclusive Tower Lounge on the 12th and 13th floor offering a splendid view of the city. Well-equipped with all the modern amenities, residents are invited to unwind and build a strong sense of community', 3, 3, 2, NULL, 'enabled', '2018-01-17 10:38:13'),
(35, 28, 14, 2, 2, 6923000, 6568, 1054, 1054, 1054, 'With a villa or a row house at GreenHills, apart from exclusive features such as home automation and solar energy systems, you also enjoy all the facilities that the 6.12-acres’ wide home has to offer.', 2, 2, 1, NULL, 'enabled', '2018-01-17 10:50:18'),
(37, 1, 33, 2, 2, 2000000, 2650, 1500, 1450, 1400, 'villa mylapore', 2, 3, 1, NULL, 'enabled', '2018-01-17 12:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `zone` enum('north','east','west','south','central') NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `city_id`, `name`, `zone`, `status`) VALUES
(1, 1, 'Adyar', '', 'enabled'),
(2, 1, 'Ambattur', '', 'enabled'),
(3, 1, 'Egmore', '', 'enabled'),
(4, 1, 'Guduvancherry', '', 'enabled'),
(5, 1, 'Kandigai', '', 'enabled'),
(6, 1, 'Karapakkam', '', 'enabled'),
(7, 1, 'Kelambakkam', '', 'enabled'),
(8, 1, 'Kotturpuram', '', 'enabled'),
(9, 1, 'Kovilambakkam', '', 'enabled'),
(10, 1, 'Madhavaram', '', 'enabled'),
(11, 1, 'Madipakkam', '', 'enabled'),
(12, 1, 'Manapakkam', '', 'enabled'),
(13, 1, 'Mannivakkam', '', 'enabled'),
(14, 1, 'Medavakkam', '', 'enabled'),
(15, 1, 'MMDA Colony', '', 'enabled'),
(16, 1, 'MWC', '', 'enabled'),
(17, 1, 'Nungambakkam', '', 'enabled'),
(18, 1, 'Oragadam', '', 'enabled'),
(19, 1, 'Pallavaram', '', 'enabled'),
(20, 1, 'Pallikaranai', '', 'enabled'),
(21, 1, 'Perumbakkam', '', 'enabled'),
(22, 1, 'Perungalathur', '', 'enabled'),
(23, 1, 'Perungudi', '', 'enabled'),
(24, 1, 'Poonamalle', '', 'enabled'),
(25, 1, 'Porur', '', 'enabled'),
(26, 1, 'Radial Road', '', 'enabled'),
(27, 1, 'Rajakilpakkam', '', 'enabled'),
(28, 1, 'Rathinamangalam', '', 'enabled'),
(29, 1, 'Saidapet', '', 'enabled'),
(30, 1, 'Sunguvarchathiram', '', 'enabled'),
(31, 1, 'Sunguvarchathiram', '', 'enabled'),
(32, 1, 'T Nagar', '', 'enabled'),
(33, 1, 'Tambaram', '', 'enabled'),
(34, 1, 'Thiruvanmiyur', '', 'enabled'),
(35, 1, 'Thoraipakkam', '', 'enabled'),
(36, 1, 'Urapakkam', '', 'enabled'),
(37, 1, 'Valasaravakkam', '', 'enabled'),
(38, 1, 'Velachery', '', 'enabled'),
(39, 1, 'Vengai Vasal', '', 'enabled'),
(40, 1, 'test', 'south', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE IF NOT EXISTS `login_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` enum('developer','admin') NOT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `name`, `user_name`, `password`, `user_type`, `img_path`, `status`) VALUES
(1, 'admin', 'jayashri.a@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'admin', NULL, 'enabled'),
(2, 'Navin Housing & Properties ', 'aina.kp2@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1515059858logo.png', 'enabled'),
(5, 'sharad agl', 'aina.kp3@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1515403914Anvesh-Soni.png', 'enabled'),
(6, 'Radiance Reality  Developers', 'aina.kp4@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516353643radiance.jpg', 'enabled'),
(7, 'WISDOM PROPERTIES', 'aina.kp5@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516353675wisdom_props.jpg', 'enabled'),
(8, 'ASHOK GROUP', 'aina.kp6@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516353742ashoknandavanam.jpg', 'enabled'),
(10, 'ANANDA GREEN MANTRA', 'aina.kp7@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516353766ananda_greenmantra.jpg', 'enabled'),
(11, 'TVH', 'aina.kp8@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516353859tvh.jpg', 'enabled'),
(12, 'BLESSING LIFESPACES', 'aina.kp9@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516354174blessing_builders_logo.png', 'enabled'),
(13, 'DRA', 'aina.kp10@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516353883dra.jpg', 'enabled'),
(14, 'SRIPA AQUA', 'aina.kp11@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1515586120600px-No_image_available_svg.png', 'enabled'),
(15, 'KRITICONS', 'aina.kp12@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516353906kriticons.jpg', 'enabled'),
(16, 'SHIRIDI SHELTERS', 'aina.kp13@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1515586367medium.jpg', 'enabled'),
(17, 'MAHALAKSHMI BUILDERS', 'aina.kp14@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1515586996medium_(1).jpg', 'enabled'),
(18, 'MGP BUILDERS', 'aina.kp15@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1515587218230315025720MGP.PNG', 'enabled'),
(19, 'RWD', 'aina.kp16@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1515587383medium_(2).jpg', 'enabled'),
(20, 'LOKAA', 'aina.kp17@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1515587499eQQuiMNK.png', 'enabled'),
(21, 'ADVAITA', 'aina.kp18@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516353980advaita.jpg', 'enabled'),
(22, 'SOBHA', 'aina.kp19@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1515587841medium_(3).jpg', 'enabled'),
(23, 'SPERO', 'aina.kp20@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516347440spero_realty_logo.png', 'enabled'),
(24, 'NAVIN''S', 'aina.kp21@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516354125navins.jpg', 'enabled'),
(25, 'ANKUR CONSTRUCTIONS', 'aina.kp22@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516354135ankur_cons.jpg', 'enabled'),
(26, 'Mahindra', 'aina.kp23@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516354146mahindra.jpg', 'enabled'),
(27, 'RAUNAQ FOUNDATIONS', 'aina.kp24@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516354254raunaq.jpg', 'enabled'),
(28, 'TVS EMERALD', 'aina.kp25@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516354272tvs.jpg', 'enabled'),
(29, 'VSU', 'aina.kp26@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516354368vsu.jpg', 'enabled'),
(30, 'Casa Grand', 'aina.kp27@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516354300casagrand.jpg', 'enabled'),
(31, 'Bhaggyam Constructions', 'aina.kp28@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516354310bhaggyam.jpg', 'enabled'),
(32, 'Vijayshanthi', 'aina.kp29@adglobal360.com', '84084bddfc520e01dd29538423159a4d90f2befc', 'developer', '1516345778vijayshanthi.jpg', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE IF NOT EXISTS `login_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(5) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nearby_location_maps`
--

CREATE TABLE IF NOT EXISTS `nearby_location_maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `nearby_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `nearby_location_maps`
--

INSERT INTO `nearby_location_maps` (`id`, `location_id`, `nearby_id`) VALUES
(6, 14, 4),
(7, 14, 6),
(8, 14, 10),
(9, 14, 11),
(10, 14, 12),
(11, 14, 13),
(12, 10, 4),
(13, 16, 11),
(14, 16, 14),
(15, 1, 1),
(16, 1, 2),
(17, 18, 4),
(18, 3, 2),
(19, 21, 14),
(20, 6, 23),
(21, 33, 19),
(22, 22, 33),
(23, 16, 4),
(24, 35, 6);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `offers_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `validity` date NOT NULL,
  PRIMARY KEY (`offers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `popular_locations`
--

CREATE TABLE IF NOT EXISTS `popular_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `popular_locations`
--

INSERT INTO `popular_locations` (`id`, `location_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `developer_id` int(11) NOT NULL,
  `project_mgr_name` varchar(50) DEFAULT NULL,
  `project_mgr_email` varchar(100) DEFAULT NULL,
  `project_mgr_phone` varchar(15) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `property_type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  `address` varchar(200) NOT NULL,
  `price_min` int(11) NOT NULL,
  `price_max` int(11) NOT NULL,
  `gated_community` enum('0','1') NOT NULL DEFAULT '0',
  `total_units` int(11) DEFAULT NULL,
  `size_min` int(11) NOT NULL,
  `size_max` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `description` text NOT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `property_status` int(11) NOT NULL,
  `sale_type` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `brochure_path` varchar(200) DEFAULT NULL,
  `offers_id` int(11) DEFAULT NULL,
  `project_logo` varchar(255) NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `developer_id`, `project_mgr_name`, `project_mgr_email`, `project_mgr_phone`, `location_id`, `property_type_id`, `name`, `status`, `address`, `price_min`, `price_max`, `gated_community`, `total_units`, `size_min`, `size_max`, `latitude`, `longitude`, `description`, `img_path`, `category`, `property_status`, `sale_type`, `posted_by`, `brochure_path`, `offers_id`, `project_logo`, `posted_date`) VALUES
(2, 6, 'Radian', 'radiance_marketing@gmail.com', '9876543210', 21, 3, 'RADIANCE MERCURY', 'enabled', 'Perumbakkam', 1700000, 5100000, '1', 533, 966, 1475, 12.893515052158316, 80.20262002944946, 'Radiance Mercury Apartments, an abode of magnificent Apartments in Chennai with all modern features required for a contemporary lifestyle. These Residential Apartments in Chennai flaunts a resort like environment. It is now easy to experience how modern comforts blend seamlessly with magnificent ambience and how lifestyle amenities combine with refreshing green views. Radiance Mercury by Radiance Realty Developers India Ltd in Perumbakkam ensures privacy and exclusivity to its residents.', '1516188332radiance_mercury_img1.jpg', 0, 0, 0, 0, NULL, NULL, '1516360520radiance_mercury.jpg', '2018-01-10 12:59:40'),
(3, 7, 'wisdom', 'info@wisdom.com', '09876543210', 18, 4, 'Sai Sathyasai Nagar oragadam', 'enabled', 'oragadam', 420000, 700000, '1', 153, 600, 3000, 15.32, 20.63, 'Situated on the banks of Palar river and Vegavathy river running across, Kanchipuram has a very lovely climate all through the year making it an ideal place for living', '1516191399gallery.jpg', 0, 0, 0, 0, NULL, NULL, '1516360548wisdom_saisatyasai.jpg', '2018-01-10 13:02:19'),
(4, 7, 'test', 'test@wisdom.com', '9876543211', 4, 4, 'Sai Baba Nagar', 'enabled', 'guduvancherry', 740000, 910000, '1', 96, 725, 2033, 62.34, 72.16, 'test', '1516191462sri_saibaba_nagar.jpg', 0, 0, 0, 0, NULL, NULL, '1516369164wisdom_saibabanagar.jpg', '2018-01-10 13:10:33'),
(5, 7, 'test', 'test1@wisdom.com', '9876543212', 4, 4, 'Sai Sathyasai Nagar guduvancherry', 'enabled', 'guduvancherry', 237000, 430000, '1', 170, 600, 3000, 12.924553431877696, 79.87886667251587, 'Guduvanchery is most prominent residential location of Chennai is situated on the GST Road and popularly known as heart of New Chennai. Guduvanchery is the most preferred residential area in Chennai because of its peaceful and clear environment, water source, connectivity to most part of Chennai as well as other parts of Tamilnadu by rail and road', '1516361932wisdom_saisatyasai_img2.jpg', 0, 0, 0, 0, NULL, NULL, '1516369217wisdom_saisatyasai.jpg', '2018-01-10 13:15:29'),
(6, 31, 'BHAGGYAM ', 'BHAGGYAM_marketing@gmail.com', '9876543110', 6, 3, 'PRAGATHI ', 'enabled', 'Karapakkam', 6300000, 8500000, '0', 288, 1200, 1614, 12.911896, 80.231933, 'Bhaggyam Pragathi is a CMDA approved project built under Chennai Corporation limits. Pragathi has an easy access to IT Express way on OMR and ECR and to companies such as PayPal and Accenture.', '1516191534bhaggyam_pragathi_img1.jpg', 0, 0, 0, 0, NULL, NULL, '1516369269bhaggyam_pragathi.jpg', '2018-01-10 13:15:57'),
(7, 30, 'CasaGrand Manager', 'casagrandmarketing@gmail.com', '9876543210', 33, 3, 'FERNS ', 'enabled', 'Tambaram', 2500000, 5100000, '1', 288, 590, 1549, 12.932207857294324, 80.08566498756409, 'Casagrand Builder Private Limited (est. 2004), is an ISO-certified real estate enterprise committed to building aspirations and delivering value. In the last twelve years, we have developed over 9 million sqft of prime residential real estate across Chennai, Bengaluru and Coimbatore. Over 4000 happy families across 68 landmark properties stand testimony to our commitment.', '1516191612casagrand_ferns_img2.jpg', 0, 0, 0, 0, NULL, NULL, '1516369284casagrand_ferns.jpg', '2018-01-10 13:26:27'),
(8, 13, 'Tuxedo', 'Tuxedo@Tuxedo.com', '09876543212', 38, 3, 'Tuxedo ', 'enabled', 'Tuxedo', 9600000, 10000000, '1', 56, 1147, 1639, 13.038806, 80.238213, 'Tuxedo is an unmatched Residential property located in Velachery, Chennai. The project offers plenty of benefits that includes prime location, comfortable and lavish lifestyle, great amenities, healthy surroundings and high return. Location Advantages- Tuxedo is strategically located and provides direct connectivity to nearly all other major points in and around Chennai. It is one of the most reputable address of the city with easy access to many famed schools, shopping areas, hospitals, recreational areas, public gardens and several other public amenities.', '1516191695dra_tuxedo_img1.jpg', 0, 0, 0, 0, NULL, NULL, '1516369299dra_tuxedo.jpg', '2018-01-10 13:27:22'),
(9, 13, 'Prisine Pavillion', 'Prisine@test.com', '987654323', 16, 3, 'Pristine Pavillion', 'enabled', 'Prisine Pavillion\r\n', 3318000, 4796000, '1', 177, 898, 1298, 12.746684, 80.025889, 'Presenting a First-Of-Its-Kind real estate investment opportunity crafted for smart investors like you who aren''t satisfied with average of conventional apartments. Tap into the lucrative fully managed Serviced Apartments business at Pristine Pavilion 3, adj. Mahindra World City.', '1516191740dra_pristinepavillion_img2.jpg', 0, 0, 0, 0, NULL, NULL, '1516369310dra_pristinepavillion.jpg', '2018-01-10 13:31:28'),
(10, 15, 'Green Lakes', 'Green@test.com', '987654324', 36, 3, 'Green Lakes', 'enabled', 'Green Lakes\r\n', 4000000, 600000, '1', 74, 986, 1197, 12.856657, 80.076864, 'The best asset on earth that you can own is at Green Lakes in urapakkam. The residential apartment has the right blend of luxury and style with state-of-the-art modern amenities and features for a comfortable life for your loved ones. These stunning apartments are crafted to perfection, the golden rays of the sun welcome you every morning with cool breeze that brings with it positivity and happiness. The surrounding of this abode gives the occupants a heavenly experience, every member will be looking forward to a blissful living each day of their lives. ', '1516192378kriticons_greenlakes_img1.jpg', 0, 0, 0, 0, NULL, NULL, '1516369327kriticons_greenlakes.jpg', '2018-01-10 13:35:57'),
(11, 28, 'Rajaram', 'arr@tvsemerald.com', '9876543210', 22, 3, 'Green Acres Apartments', 'enabled', 'Perungalathur', 3300000, 10000000, '1', 352, 580, 2267, 12.874973, 80.10786, 'TVS Emerald Green Acres by Emerald Haven Development Limited is built for all the generations remaining relevant for years to come. With one of the most sought after locations, Kolapakkam in Chennai, lush greenery all around it and a host of luxurious amenities, TVS Emerald Green Acres is the pick of the present and a portal to the future. It is thoughtfully planned with apartments and the elegant villas with abundant space for ventilation. It has been designed to provide you with the greatest luxury anyone can offer, space. Easily accessible, yet away from the hustle and bustle of the city, TVS Emerald Green Acres provides you with a fun and peaceful lifestyle in Chennai.', '1516192450tvs_greenacres_img1.jpg', 0, 0, 0, 0, NULL, NULL, '1516369345tvs_greenacres.jpg', '2018-01-10 13:41:05'),
(12, 28, 'Rajaram', 'rsr@tvsemerald.com', '8807787878', 19, 3, 'Light House', 'enabled', 'pallavaram', 6550000, 8860000, '1', 279, 706, 1505, 12.953312516136902, 80.16249552369118, 'Strategically located at Pallavaram in Chennai, TVS Emerald LightHouse by Emerald Haven Realty Limited offers internationally styled condominiums equipped with all world-class facilities required for a luxurious, convenient and happy life. Inspired by the condominiums in Singapore, it is a perfect combination of innovative architecture and ideal location with all the basic facilities nearby.', '1516192663light_house_banner1.jpg', 0, 0, 0, 0, NULL, NULL, '1516369376tvs.jpg', '2018-01-10 13:42:44'),
(13, 15, 'Aristo', 'Aristo@test.com', '987654325', 36, 3, 'Aristo', 'enabled', 'Aristo\r\n', 6000000, 8500000, '1', 52, 1045, 1417, 12.864355547470858, 80.0678014755249, 'Kriticons Aristo is one of the residential developments of Kriticons, located in Chennai. It offers spacious and well-designed 2BHK and 3BHK apartments. The project is well equipped with all modern amenities to facilitate the needs of the residents.', '1516160669kriticons_aristo.jpg', 0, 0, 0, 0, NULL, NULL, '1516369392kriticons_aristo.jpg', '2018-01-10 13:43:57'),
(14, 28, 'Rajaram', 'arr@tvsemerald.com', '9876543222', 22, 2, 'Green Hills Villas', 'enabled', 'Perungalathur', 33000000, 10000000, '1', 352, 580, 2287, 12.874872395572394, 80.10787099599838, 'Welcome to GreenHills. Where green and serene are close by, and so is work. Located at Nedungundram, it has the hills in the vicinity and work areas in close proximity, with the major IT corridors nearby. Closer home, in the gated community, you will find even more greenery, with specially planted trees and thoughtful landscaping, that allow you both relaxation and exercise. At home, you will find all the amenities you need, and then some more. Choose from villas, row houses and apartments. Either way, you will have joy all around you.', '1516346530tvs_greenhills_img3.jpg', 0, 0, 0, 0, NULL, NULL, '1516369416tvs_greenhills.jpg', '2018-01-10 13:46:46'),
(15, 28, 'Rajaram', 'arrtvsemerald@gmail.com', '9876543222', 22, 2, 'Green Acres Villa', 'enabled', 'Perungalathur', 8680000, 11500000, '1', 21, 1486, 1967, 12.874872395572394, 80.10787099599838, 'GreenAcres offers you, and your future generations, two choices for independent living, all impeccable in their own way. Begin the lifestyle of several lifetimes by taking a closer look at the spaces below.', '1516197326tvs_greenhills_img3.jpg', 0, 0, 0, 0, NULL, NULL, '1516369432tvs_greenacres.jpg', '2018-01-10 13:48:51'),
(16, 16, 'Whitfiled Mudra', 'Whitfiled.Mudra@test.com', '987654326', 14, 3, 'Whitfiled Mudra', 'enabled', 'Whitfiled Mudra\r\n', 5900000, 9000000, '1', 115, 1050, 1600, 12.930398840777524, 80.19004583358765, 'Shirdi Whitefield Mudra Phase II Apartments, an abode of magnificent Apartments in Chennai with all modern features required for a contemporary lifestyle. These Residential Apartments in Chennai flaunts a resort like environment. It is now easy to experience how modern comforts blend seamlessly with magnificent ambience and how lifestyle amenities combine with refreshing green views. Shirdi Whitefield Mudra Phase II by Shirdi Shelters in Medavakkam ensures privacy and exclusivity to its residents. The reviews of Shirdi Whitefield Mudra Phase II clearly indicates that this is one of the best Residential property in Chennai.\r\n', '1516197547shirdishelters_whitefield_img1.jpg', 0, 0, 0, 0, NULL, NULL, '1516369456shirdishelters_whitefield.jpg', '2018-01-10 13:51:17'),
(17, 17, 'Aandham', 'Aandham@test.com', '987654327', 35, 3, 'Aandham', 'disabled', 'Anand Nagar Plot .44 2nd Cross Street Thoraipakkam Chennai 600097', 3900000, 5200000, '1', 25, 1052, 1160, 12.941974228552882, 80.23550927639008, 'Thoraipakkam, also known as Okkiyam Thuraipakkam is an upcoming area in Chennai. The locality is situated on the Old Mahabalipuram Road, also called as Rajiv Gandhi Salai which is the first six-lane road here. Thoraipakkam Pallavaram Radial Road is connected to the IT corridor of Chennai thus enabling easy commuting advantages for the working class\r\n', '1516197671DQ_Thoraipakkam_22_08_16-1.jpg', 0, 0, 0, 0, NULL, NULL, '', '2018-01-10 13:59:23'),
(18, 32, 'SOLITAIRE', 'SOLITAIRE@test.com', '987654328', 32, 3, 'SOLITAIRE', 'enabled', 'SOLITAIRE\r\n', 16200000, 16800000, '1', 4, 1083, 1094, 13.04396492787579, 80.25626957416534, 'Solitaire is located in Padmanaba Street in T.Nagar, with Pondy Bazaar and Ranganathan Street just an arm''s length away. Right from the Mambalam Railway Station to Kodambakkam high road, many of the city''s busy localities are in close proximity to the property.', '', 0, 0, 0, 0, NULL, NULL, '1516369483vijayshanthi_solitaire.jpg', '2018-01-10 14:05:01'),
(19, 32, 'Boulevard', 'Boulevard@test.com', '9876543211', 5, 3, 'Boulevard', 'enabled', 'Boulevard\r\n', 3000000, 5000000, '1', 321, 1170, 2380, 12.853048528804765, 80.14222741127014, 'Vijay Shanthi Builders is proud to present Boulevard premium apartments at Kandigai, Melakottaiyur, Chennai. Top-notch amenities and premium fittings have been the hallmark of any Vijay Shanthi home. With 70%, open space Boulevard is no exception. Each well-ventilated modern apartment is built in a maximum plinth area, granting the benefits of utmost value for money. The Boulevard complex is complete with every premium amenity possible. Vijay Shanthi true to its words has made 469 families happy with the happy homes in its phase 1 which will be soon reaching completion. We intend to create more and more happy families by providing them with their dream homes with our Boulevard.', '1516197808boulevard1.jpg', 0, 0, 0, 0, NULL, NULL, '1516369610vijayshanthi_boulevard.jpg', '2018-01-10 14:09:05'),
(20, 32, 'Fortune Square', 'Fortune.Square@test.com', '9876543212', 28, 3, 'Fortune Square', 'enabled', 'Fortune Square\r\n', 2500000, 4100000, '1', 161, 600, 4154, 12.868445194712207, 80.1392662525177, 'Fortune Square, a gated community of residential plots strategically set in Rathinamangalam near Tambaram. Choose from 161 DTCP-approved construction-ready plots ranging from 587-4154 sq. ft. It’s the perfect foundation for your dream home. The location, Rathinamangalam is a fast-developing locality that enjoys excellent connectivity to all major parts of the city through a network of link roads.', '1516197839fortune-square.png', 0, 0, 0, 0, NULL, NULL, '1516369620vijayshanthi_fortunesquare.jpg', '2018-01-10 14:11:52'),
(21, 26, 'Karthi', 'mahindramarketing@gmail.com', '9874563210', 16, 3, 'Nova', 'enabled', 'Mahindra World City', 2000000, 3200000, '1', 726, 589, 836, 12.724305193910109, 79.986771941185, 'Nova offers 1.5 and 2.5 BHK apartments for sale in Chennai. Each apartment is aesthetically designed to make the most of natural light and ventilation resulting in bright and spacious apartments. Installed with smart fixtures and fittings, each of these apartments for sale in Chennai at Nova, is finely crafted with great attention to quality and detail. The very best of apartment living is at your fingertips.', '15161980961.jpg', 0, 0, 0, 0, NULL, NULL, '1516369657mahindra_nova.jpg', '2018-01-10 14:14:10'),
(22, 32, 'The Art', 'The.Art@gmail.com', '9876543213', 17, 3, 'The Art', 'enabled', 'The Art\r\n', 119400000, 123000000, '1', 21, 5500, 6300, 13.064203747280056, 80.23871434852481, 'Making a statement of luxury in impeccable style, Vijay Shanthi presents ''The Art''- Chennai''s most expensive and luxurious homes located on Kothari Road in Nungambakkam. Inspired by Pablo Picasso''s Cubist style of painting, it is a creation that is perpetually endless in aura and style. Every home at ''The Art'' is spread across 5498 – 5969 Sq.ft. of amazing space to celebrate your finest moments and features only one apartment on every floor assuring you of absolute privacy at all times. Spread across a sprawling 51,000 sq. ft.\r\n', '1516193497vijayshanthi_theart_img1.jpg', 0, 0, 0, 0, NULL, NULL, '1516369637vijayshanthi_theart.jpg', '2018-01-10 14:18:55'),
(23, 25, 'Ankur', 'ankurmarketing@gmail.om', '987654123', 35, 2, 'The Nook Villas', 'enabled', 'Thoraipakkam', 2100000, 3200000, '0', 21, 589, 836, 12.943364911980765, 80.23378595709801, 'The NOOK has been designed with you in mind. 21 exquisite independent and semi-independent villas, that define luxury, have been carved out to not only provide you the space, but also capture the aura that \r\nsurrounds it. \r\n\r\nEach villament is testimony to architectural marvel and epitomises Ankur’s core philosophy of trust, value and excellence.	The interior design spells class and leaves you spellbound. We have left no stone unturned to go that extra mile to bring you the benefits you deserve.', '1516189907completed-nook9.jpg', 0, 0, 0, 0, NULL, NULL, '1516369687ankur_nookvillas.jpg', '2018-01-10 14:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `project_managers`
--

CREATE TABLE IF NOT EXISTS `project_managers` (
  `pm_id` int(11) NOT NULL AUTO_INCREMENT,
  `developer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project_managers`
--

INSERT INTO `project_managers` (`pm_id`, `developer_id`, `name`, `phone`, `email`, `status`) VALUES
(1, 1, 'Mithun', '9876543210', 'mithun@globeshout.com', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `project_showcase`
--

CREATE TABLE IF NOT EXISTS `project_showcase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `project_showcase`
--

INSERT INTO `project_showcase` (`id`, `project_id`) VALUES
(1, 12),
(2, 14),
(3, 13),
(4, 9),
(5, 8),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `project_upload`
--

CREATE TABLE IF NOT EXISTS `project_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `brochure` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=239 ;

--
-- Dumping data for table `project_upload`
--

INSERT INTO `project_upload` (`id`, `project_id`, `path`, `brochure`) VALUES
(2, 110, '15049659281487222381pasport.jpg', 'no'),
(6, 111, '1504966343above-adventure-aerial-air.jpg', 'no'),
(7, 111, '1504966343validus_poster.png', 'no'),
(24, 112, '1505902697Jones_Dawn_Villas.jpg', 'no'),
(25, 112, '1505902697Casa_Grande_Bellisimo.jpg', 'no'),
(27, 114, '1505978114kochar_Arjun_garden-ilovepdf-compressed.pdf', 'yes'),
(28, 114, '1505978114arun_garden_project1.JPG', 'no'),
(29, 114, '1505978114arun_garden_project2.JPG', 'no'),
(30, 114, '1505978114arun_garden_project3.JPG', 'no'),
(31, 114, '1505978114arun_garden_project4.JPG', 'no'),
(32, 116, '1506091302Delta.pdf', 'yes'),
(33, 116, '15060913021487856210_167.jpg', 'no'),
(37, 118, '1506162997Greenlake_brochure.pdf', 'yes'),
(38, 118, '1506162997cover.JPG', 'no'),
(39, 118, '1506162997images.jpg', 'no'),
(40, 119, '1507198140Greenlake_brochure.pdf', 'yes'),
(41, 119, '1507198140images.jpg', 'no'),
(42, 119, '1507198140site_plan_2.JPG', 'no'),
(55, 121, '1515389597Status_API.pdf', 'yes'),
(56, 121, '1515389597Anvesh-Soni.png', 'no'),
(57, 122, '1515395267Social-Placeholder.jpg', 'yes'),
(58, 122, '1515395267Aishwarya_Bhatia.png', 'no'),
(59, 122, '15154140721515149000bulding.png', 'no'),
(60, 122, '1515414252123.png', 'no'),
(61, 1, '1515589094Aishwarya_Bhatia.png', 'no'),
(62, 2, '1515589180RADIANCE-MERCURY-brochure.pdf', 'yes'),
(64, 6, '1515590157pragathi-e-brochure.pdf', 'yes'),
(66, 7, '1515590787Casagrand-Ferns-Ebrochure.pdf', 'yes'),
(68, 14, '1515592346tvs.jpg', 'no'),
(74, 15, '1515592845pragathi-e-brochure.pdf', 'yes'),
(79, 21, '1515593650pragathi-e-brochure.pdf', 'yes'),
(81, 23, '1515594134thenook.pdf', 'yes'),
(82, 23, '1515594134nook1.jpg', 'no'),
(83, 1, '1515741076Utkarsh.png', 'no'),
(86, 3, '1516159113wisdom_saisatyasai_img3.jpg', 'no'),
(90, 5, '1516159193wisdom_saisatyasai_img1.jpg', 'no'),
(91, 5, '1516159193wisdom_saisatyasai_img2.jpg', 'no'),
(92, 5, '1516159193wisdom_saisatyasai_img3.jpg', 'no'),
(94, 2, '1516159273radiance_mercury_img2.jpg', 'no'),
(95, 2, '1516159273radiance_mercury_img3.jpg', 'no'),
(96, 2, '1516159273radiance_mercury_img4.jpg', 'no'),
(97, 2, '1516159273radiance_mercury_img5.jpg', 'no'),
(99, 11, '1516159500tvs_greenacres_img2.jpg', 'no'),
(100, 11, '1516159500tvs_greenacres_img3.jpg', 'no'),
(101, 11, '1516159500tvs_greenacres_img4.jpg', 'no'),
(104, 14, '1516159620tvs_greenacres_img3.jpg', 'no'),
(105, 14, '1516159620tvs_greenacres_img4.jpg', 'no'),
(106, 14, '1516159620tvs_greenhills_img1.jpg', 'no'),
(107, 14, '1516159620tvs_greenhills_img2.jpg', 'no'),
(108, 14, '1516159620tvs_greenhills_img3.jpg', 'no'),
(109, 14, '1516159620tvs_greenhills_img4.jpg', 'no'),
(111, 15, '1516159673tvs_greenhills_img4.jpg', 'no'),
(112, 7, '1516159807casagrand_ferns_img1.jpg', 'no'),
(114, 7, '1516159807casagrand_ferns_img3.jpg', 'no'),
(122, 6, '1516160205bhaggyam_pragathi_img2.jpg', 'no'),
(123, 6, '1516160205bhaggyam_pragathi_img3.jpg', 'no'),
(128, 10, '1516160536kriticons_greenlakes_img2.jpg', 'no'),
(129, 10, '1516160536kriticons_greenlakes_img3.jpg', 'no'),
(130, 13, '1516160669kriticons_aristo_img1.jpg', 'no'),
(131, 13, '1516160669kriticons_aristo_img2.jpg', 'no'),
(132, 13, '1516160669kriticons_aristo_img3.jpg', 'no'),
(133, 13, '1516160669kriticons_greenlakes_img1.jpg', 'no'),
(134, 13, '1516160669kriticons_greenlakes_img2.jpg', 'no'),
(135, 13, '1516160669kriticons_greenlakes_img3.jpg', 'no'),
(136, 16, '1516160768shirdishelters_whitefield_img1.jpg', 'no'),
(137, 16, '1516160768shirdishelters_whitefield_img2.jpg', 'no'),
(138, 16, '1516160768shirdishelters_whitefield_img3.jpg', 'no'),
(139, 16, '1516160768shirdishelters_whitefield_img4.jpg', 'no'),
(140, 23, '1516160973ankur_nookvillas_img1.jpg', 'no'),
(141, 23, '1516160973ankur_nookvillas_img2.jpg', 'no'),
(162, 30, '1516170064603171.pdf', 'yes'),
(163, 12, '1516180837block-1a1a.jpg', 'no'),
(164, 12, '1516180837TVS-Emerald-LightHouse-Brochure.pdf', 'yes'),
(165, 17, '1516187677DQ_Thoraipakkam_22_08_16-1.jpg', 'no'),
(166, 18, '1516187992solitaire1.png', 'no'),
(167, 19, '1516188118boulevard.jpg', 'no'),
(169, 31, '15058926891487856210_167.jpg', 'no'),
(170, 31, '15058926891487856210_167.jpg', 'no'),
(171, 31, '15058926891487856210_167.jpg', 'no'),
(172, 31, '1504965928677.pdf', 'yes'),
(173, 33, '15058926891487856210_167.jpg', 'no'),
(174, 33, '15058926891487856210_167.jpg', 'no'),
(175, 33, '15058926891487856210_167.jpg', 'no'),
(176, 33, '1504965928677.pdf', 'yes'),
(177, 4, '1516191462sri_saibaba_nagar1.jpg', 'no'),
(178, 8, '1516191695dra_tuxedo_img2.jpg', 'no'),
(179, 9, '1516191740dra_pristinepavillion_img1.jpg', 'no'),
(180, 9, '1516191740dra_pristinepavillion_img3.jpg', 'no'),
(181, 34, '15058926891487856210_167.jpg', 'no'),
(182, 34, '15058926891487856210_167.jpg', 'no'),
(183, 34, '15058926891487856210_167.jpg', 'no'),
(184, 34, '1504965928677.pdf', 'yes'),
(185, 35, '15058926891487856210_167.jpg', 'no'),
(186, 35, '15058926891487856210_167.jpg', 'no'),
(187, 35, '15058926891487856210_167.jpg', 'no'),
(188, 35, '1504965928677.pdf', 'yes'),
(189, 36, '15058926891487856210_167.jpg', 'no'),
(190, 36, '15058926891487856210_167.jpg', 'no'),
(191, 36, '15058926891487856210_167.jpg', 'no'),
(192, 36, '1504965928677.pdf', 'yes'),
(193, 11, '1516192419tvs_greenacres_img1.jpg', 'yes'),
(194, 22, '1516193497vijayshanthi_theart_img2.jpg', 'no'),
(195, 22, '1516193497vijayshanthi_theart_img3.jpg', 'no'),
(196, 22, '1516193497vijayshanthi_theart_img4.jpg', 'no'),
(197, 22, '1516193497vijayshanthi_theart_img5.jpg', 'no'),
(201, 21, '1516193601mahindra_nova_img5.jpg', 'no'),
(202, 20, '1516193692vijayshanthi_fortunesquare.jpg', 'no'),
(203, 20, '1516193692vijayshanthi_fortunesquare_img1.jpg', 'no'),
(204, 20, '1516193692vijayshanthi_fortunesquare_img2.jpg', 'no'),
(205, 20, '1516193692vijayshanthi_fortunesquare_img3.jpg', 'no'),
(206, 20, '1516193692vijayshanthi_fortunesquare_img4.jpg', 'no'),
(207, 15, '1516197326tvs_greenhills_img2.jpg', 'no'),
(208, 12, '1516358870tvs_greenhills_img1.jpg', 'no'),
(209, 12, '1516358870tvs_greenhills_img2.jpg', 'no'),
(210, 12, '1516358870tvs_greenhills_img3.jpg', 'no'),
(211, 12, '1516358870tvs_greenhills_img4.jpg', 'no'),
(212, 3, '1516358947wisdom_saisatyasai_img1.jpg', 'no'),
(213, 3, '1516358947wisdom_saisatyasai_img2.jpg', 'no'),
(214, 3, '1516358947wisdom_saisatyasai_img3.jpg', 'no'),
(215, 4, '1516358972wisdom_saisatyasai_img1.jpg', 'no'),
(216, 4, '1516358972wisdom_saisatyasai_img2.jpg', 'no'),
(217, 4, '1516358972wisdom_saisatyasai_img3.jpg', 'no'),
(218, 6, '1516359033bhaggyam_pragathi_img2.jpg', 'no'),
(219, 7, '1516359060casagrand_ferns_img2.jpg', 'no'),
(220, 8, '1516359091dra_pristinepavillion_img1.jpg', 'no'),
(221, 8, '1516359091dra_pristinepavillion_img2.jpg', 'no'),
(222, 8, '1516359091dra_pristinepavillion_img3.jpg', 'no'),
(223, 9, '1516359123dra_tuxedo_img1.jpg', 'no'),
(224, 9, '1516359123dra_tuxedo_img2.jpg', 'no'),
(225, 21, '1516359157mahindra_nova_img1.jpg', 'no'),
(226, 21, '1516359157mahindra_nova_img2.jpg', 'no'),
(227, 21, '1516359157mahindra_nova_img3.jpg', 'no'),
(228, 21, '1516359157mahindra_nova_img4.jpg', 'no'),
(229, 21, '1516359157mahindra_nova_img5.jpg', 'no'),
(230, 10, '1516359161kriticons_aristo_img1.jpg', 'no'),
(231, 10, '1516359161kriticons_aristo_img2.jpg', 'no'),
(232, 10, '1516359161kriticons_aristo_img3.jpg', 'no'),
(233, 19, '1516360011vijayshanthi_boulevard_img1.jpg', 'no'),
(234, 19, '1516360011vijayshanthi_boulevard_img2.jpg', 'no'),
(235, 19, '1516360011vijayshanthi_boulevard_img3.jpg', 'no'),
(236, 19, '1516360011vijayshanthi_boulevard_img4.jpg', 'no'),
(237, 18, '1516360346vijayshanthi_solitaire_img2.jpg', 'no'),
(238, 18, '1516360346vijayshanthi_solitaire_img3.jpg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE IF NOT EXISTS `property_types` (
  `property_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  PRIMARY KEY (`property_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`property_type_id`, `name`, `description`, `img_path`, `status`) VALUES
(1, 'Individual', '', NULL, 'enabled'),
(2, 'Villa', '', NULL, 'enabled'),
(3, 'Apartments', '', NULL, 'enabled'),
(4, 'Plots', '', NULL, 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `search_ads`
--

CREATE TABLE IF NOT EXISTS `search_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `developer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adImage` varchar(255) NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `search_ads`
--

INSERT INTO `search_ads` (`id`, `developer_id`, `project_id`, `name`, `adImage`, `status`, `created_at`) VALUES
(1, 30, 7, 'test ad', '1516191534bhaggyam_pragathi_img1.jpg', 'enabled', '2018-01-19 05:26:48'),
(2, 32, 19, 'testings', '1516363667ad2.jpg', 'enabled', '2018-01-19 09:24:43'),
(3, 32, 19, 'testing ads', '1516356071ad2.jpg', 'disabled', '2018-01-19 10:01:11'),
(4, 32, 20, 'testing ads', '1516356071ad2.jpg', 'disabled', '2018-01-19 10:01:11'),
(5, 30, 7, 'Test', '1516364727casagrand_ferns.jpg', 'disabled', '2018-01-19 12:25:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
