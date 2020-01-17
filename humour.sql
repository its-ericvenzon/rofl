-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2018 at 09:42 PM
-- Server version: 5.7.21-log
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(10) NOT NULL,
  `adusername` varchar(15) NOT NULL,
  `ademail` varchar(50) NOT NULL,
  `adpass` varchar(255) NOT NULL,
  `token` varchar(10) DEFAULT NULL,
  `tokenExpire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adusername`, `ademail`, `adpass`, `token`, `tokenExpire`) VALUES
(1, 'Stephen', 'stephen.graham@lethbridgecollege.ca', '$2y$10$h028j5ayz1xf2UmB4hleoO9JzeGBQ0iXLBLtUQxpTUwW5AoW6iXY2', NULL, '2018-04-19 21:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE `age` (
  `ageID` int(1) NOT NULL,
  `ageRange` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`ageID`, `ageRange`) VALUES
(1, '12 or under'),
(2, '13-17'),
(3, '18-25'),
(4, '26-35'),
(5, '36-45'),
(6, '46-55'),
(7, '56+');

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE `backup` (
  `backupID` int(5) NOT NULL,
  `hoID` int(10) DEFAULT NULL,
  `dayID` int(10) DEFAULT NULL,
  `timeID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryID` int(6) NOT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `country`) VALUES
(1, 'Andorra'),
(2, 'United Arab Emirates'),
(3, 'Afghanistan'),
(4, 'Antigua and Barbuda'),
(5, 'Anguilla'),
(6, 'Albania'),
(7, 'Armenia'),
(8, 'Angola'),
(9, 'Antarctica'),
(10, 'Argentina'),
(11, 'American Samoa'),
(12, 'Austria'),
(13, 'Australia'),
(14, 'Aruba'),
(15, 'Åland'),
(16, 'Azerbaijan'),
(17, 'Bosnia and Herzegovina'),
(18, 'Barbados'),
(19, 'Bangladesh'),
(20, 'Belgium'),
(21, 'Burkina Faso'),
(22, 'Bulgaria'),
(23, 'Bahrain'),
(24, 'Burundi'),
(25, 'Benin'),
(26, 'Saint Barthélemy'),
(27, 'Bermuda'),
(28, 'Brunei'),
(29, 'Bolivia'),
(30, 'Bonaire'),
(31, 'Brazil'),
(32, 'Bahamas'),
(33, 'Bhutan'),
(34, 'Bouvet Island'),
(35, 'Botswana'),
(36, 'Belarus'),
(37, 'Belize'),
(38, 'Canada'),
(39, 'Cocos [Keeling] Islands'),
(40, 'Democratic Republic of the Congo'),
(41, 'Central African Republic'),
(42, 'Republic of the Congo'),
(43, 'Switzerland'),
(44, 'Ivory Coast'),
(45, 'Cook Islands'),
(46, 'Chile'),
(47, 'Cameroon'),
(48, 'China'),
(49, 'Colombia'),
(50, 'Costa Rica'),
(51, 'Cuba'),
(52, 'Cape Verde'),
(53, 'Curacao'),
(54, 'Christmas Island'),
(55, 'Cyprus'),
(56, 'Czechia'),
(57, 'Germany'),
(58, 'Djibouti'),
(59, 'Denmark'),
(60, 'Dominica'),
(61, 'Dominican Republic'),
(62, 'Algeria'),
(63, 'Ecuador'),
(64, 'Estonia'),
(65, 'Egypt'),
(66, 'Western Sahara'),
(67, 'Eritrea'),
(68, 'Spain'),
(69, 'Ethiopia'),
(70, 'Finland'),
(71, 'Fiji'),
(72, 'Falkland Islands'),
(73, 'Micronesia'),
(74, 'Faroe Islands'),
(75, 'France'),
(76, 'Gabon'),
(77, 'United Kingdom'),
(78, 'Grenada'),
(79, 'Georgia'),
(80, 'French Guiana'),
(81, 'Guernsey'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greenland'),
(85, 'Gambia'),
(86, 'Guinea'),
(87, 'Guadeloupe'),
(88, 'Equatorial Guinea'),
(89, 'Greece'),
(90, 'South Georgia and the South Sandwich Islands'),
(91, 'Guatemala'),
(92, 'Guam'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Hong Kong'),
(96, 'Heard Island and McDonald Islands'),
(97, 'Honduras'),
(98, 'Croatia'),
(99, 'Haiti'),
(100, 'Hungary'),
(101, 'Indonesia'),
(102, 'Ireland'),
(103, 'Israel'),
(104, 'Isle of Man'),
(105, 'India'),
(106, 'British Indian Ocean Territory'),
(107, 'Iraq'),
(108, 'Iran'),
(109, 'Iceland'),
(110, 'Italy'),
(111, 'Jersey'),
(112, 'Jamaica'),
(113, 'Jordan'),
(114, 'Japan'),
(115, 'Kenya'),
(116, 'Kyrgyzstan'),
(117, 'Cambodia'),
(118, 'Kiribati'),
(119, 'Comoros'),
(120, 'Saint Kitts and Nevis'),
(121, 'North Korea'),
(122, 'South Korea'),
(123, 'Kuwait'),
(124, 'Cayman Islands'),
(125, 'Kazakhstan'),
(126, 'Laos'),
(127, 'Lebanon'),
(128, 'Saint Lucia'),
(129, 'Liechtenstein'),
(130, 'Sri Lanka'),
(131, 'Liberia'),
(132, 'Lesotho'),
(133, 'Lithuania'),
(134, 'Luxembourg'),
(135, 'Latvia'),
(136, 'Libya'),
(137, 'Morocco'),
(138, 'Monaco'),
(139, 'Moldova'),
(140, 'Montenegro'),
(141, 'Saint Martin'),
(142, 'Madagascar'),
(143, 'Marshall Islands'),
(144, 'Macedonia'),
(145, 'Mali'),
(146, 'Myanmar [Burma]'),
(147, 'Mongolia'),
(148, 'Macao'),
(149, 'Northern Mariana Islands'),
(150, 'Martinique'),
(151, 'Mauritania'),
(152, 'Montserrat'),
(153, 'Malta'),
(154, 'Mauritius'),
(155, 'Maldives'),
(156, 'Malawi'),
(157, 'Mexico'),
(158, 'Malaysia'),
(159, 'Mozambique'),
(160, 'Namibia'),
(161, 'New Caledonia'),
(162, 'Niger'),
(163, 'Norfolk Island'),
(164, 'Nigeria'),
(165, 'Nicaragua'),
(166, 'Netherlands'),
(167, 'Norway'),
(168, 'Nepal'),
(169, 'Nauru'),
(170, 'Niue'),
(171, 'New Zealand'),
(172, 'Oman'),
(173, 'Panama'),
(174, 'Peru'),
(175, 'French Polynesia'),
(176, 'Papua New Guinea'),
(177, 'Philippines'),
(178, 'Pakistan'),
(179, 'Poland'),
(180, 'Saint Pierre and Miquelon'),
(181, 'Pitcairn Islands'),
(182, 'Puerto Rico'),
(183, 'Palestine'),
(184, 'Portugal'),
(185, 'Palau'),
(186, 'Paraguay'),
(187, 'Qatar'),
(188, 'Réunion'),
(189, 'Romania'),
(190, 'Serbia'),
(191, 'Russia'),
(192, 'Rwanda'),
(193, 'Saudi Arabia'),
(194, 'Solomon Islands'),
(195, 'Seychelles'),
(196, 'Sudan'),
(197, 'Sweden'),
(198, 'Singapore'),
(199, 'Saint Helena'),
(200, 'Slovenia'),
(201, 'Svalbard and Jan Mayen'),
(202, 'Slovakia'),
(203, 'Sierra Leone'),
(204, 'San Marino'),
(205, 'Senegal'),
(206, 'Somalia'),
(207, 'Suriname'),
(208, 'South Sudan'),
(209, 'São Tomé and Príncipe'),
(210, 'El Salvador'),
(211, 'Sint Maarten'),
(212, 'Syria'),
(213, 'Swaziland'),
(214, 'Turks and Caicos Islands'),
(215, 'Chad'),
(216, 'French Southern Territories'),
(217, 'Togo'),
(218, 'Thailand'),
(219, 'Tajikistan'),
(220, 'Tokelau'),
(221, 'East Timor'),
(222, 'Turkmenistan'),
(223, 'Tunisia'),
(224, 'Tonga'),
(225, 'Turkey'),
(226, 'Trinidad and Tobago'),
(227, 'Tuvalu'),
(228, 'Taiwan'),
(229, 'Tanzania'),
(230, 'Ukraine'),
(231, 'Uganda'),
(232, 'U.S. Minor Outlying Islands'),
(233, 'United States'),
(234, 'Uruguay'),
(235, 'Uzbekistan'),
(236, 'Vatican City'),
(237, 'Saint Vincent and the Grenadines'),
(238, 'Venezuela'),
(239, 'British Virgin Islands'),
(240, 'U.S. Virgin Islands'),
(241, 'Vietnam'),
(242, 'Vanuatu'),
(243, 'Wallis and Futuna'),
(244, 'Samoa'),
(245, 'Kosovo'),
(246, 'Yemen'),
(247, 'Mayotte'),
(248, 'South Africa'),
(249, 'Zambia'),
(250, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `eduID` int(2) NOT NULL,
  `education` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`eduID`, `education`) VALUES
(1, 'Primary School'),
(2, 'Secondary School'),
(3, 'Post-Secondary'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `genderID` int(1) NOT NULL,
  `gender` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`genderID`, `gender`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreID` int(3) NOT NULL,
  `genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreID`, `genre`) VALUES
(1, 'Dirty jokes'),
(2, 'Ethnic jokes'),
(3, 'Family friendly'),
(4, 'Humorous'),
(5, 'Childish'),
(6, 'NSFW jokes'),
(7, 'One liners'),
(8, 'Puns'),
(9, 'Quotation'),
(10, 'Religious'),
(11, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `howoften`
--

CREATE TABLE `howoften` (
  `hoID` int(10) NOT NULL,
  `hoName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `howoften`
--

INSERT INTO `howoften` (`hoID`, `hoName`) VALUES
(1, 'Daily'),
(2, 'Weekly'),
(3, 'Biweekly'),
(4, 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inqID` int(10) NOT NULL,
  `inqEmail` varchar(50) NOT NULL,
  `inqMessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `joke`
--

CREATE TABLE `joke` (
  `jokeID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `jTypeID` int(10) NOT NULL,
  `nsfc` char(1) DEFAULT NULL,
  `jokeDesc` text NOT NULL,
  `datePosted` date NOT NULL,
  `rateNum` int(5) NOT NULL DEFAULT '0',
  `reportNum` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jokegenre`
--

CREATE TABLE `jokegenre` (
  `jokeGenreID` int(10) NOT NULL,
  `jokeID` int(10) NOT NULL,
  `genreID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jokerating`
--

CREATE TABLE `jokerating` (
  `jRatingID` int(5) NOT NULL,
  `userID` int(10) NOT NULL,
  `rating` int(5) DEFAULT NULL,
  `jokeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jokereport`
--

CREATE TABLE `jokereport` (
  `jokerepID` int(10) NOT NULL,
  `jokeID` int(10) NOT NULL,
  `reportID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `joketype`
--

CREATE TABLE `joketype` (
  `jTypeID` int(10) NOT NULL,
  `joketype` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joketype`
--

INSERT INTO `joketype` (`jTypeID`, `joketype`) VALUES
(1, 'Animal jokes'),
(2, 'Bar jokes'),
(3, 'Beer jokes'),
(4, 'Blonde jokes'),
(5, 'Dad jokes'),
(6, 'Dark humor'),
(7, 'Fat'),
(8, 'Irony '),
(9, 'Jewish jokes'),
(10, 'Knock knock jokes'),
(11, 'Nun jokes'),
(12, 'Puzzle jokes'),
(13, 'Rabbi jokes'),
(14, 'Riddles'),
(15, 'Satire'),
(16, 'Stereotypes'),
(17, 'Word plays'),
(18, 'Yo mama');

-- --------------------------------------------------------

--
-- Table structure for table `notiday`
--

CREATE TABLE `notiday` (
  `dayID` int(10) NOT NULL,
  `dayName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notiday`
--

INSERT INTO `notiday` (`dayID`, `dayName`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(10) NOT NULL,
  `notificationEmail` varchar(50) NOT NULL,
  `hoID` int(10) NOT NULL,
  `dayID` int(10) NOT NULL,
  `timeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notitime`
--

CREATE TABLE `notitime` (
  `timeID` int(10) NOT NULL,
  `timeName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notitime`
--

INSERT INTO `notitime` (`timeID`, `timeName`) VALUES
(1, '00:00'),
(2, '01:00'),
(3, '02:00'),
(4, '03:00'),
(5, '04:00'),
(6, '05:00'),
(7, '06:00'),
(8, '07:00'),
(9, '08:00'),
(10, '09:00'),
(11, '10:00'),
(12, '11:00'),
(13, '12:00'),
(14, '13:00'),
(15, '14:00'),
(16, '15:00'),
(17, '16:00'),
(18, '17:00'),
(19, '18:00'),
(20, '19:00'),
(21, '20:00'),
(22, '21:00'),
(23, '22:00'),
(24, '23:00');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `userID` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `passhash` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `countryID` int(6) NOT NULL,
  `ageID` int(1) NOT NULL,
  `eduID` int(2) NOT NULL,
  `genderID` int(1) NOT NULL,
  `active` char(1) NOT NULL,
  `dateStarted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(10) DEFAULT NULL,
  `tokenExpire` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(6) NOT NULL,
  `userID` int(10) NOT NULL,
  `repDesc` text,
  `dateReported` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `repSubID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `repsubject`
--

CREATE TABLE `repsubject` (
  `repSubID` int(10) NOT NULL,
  `repSubject` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repsubject`
--

INSERT INTO `repsubject` (`repSubID`, `repSubject`) VALUES
(1, 'Joke is offensive'),
(2, 'Saw this joke before / Repeatitive Joke'),
(3, 'Joke is Not Safe For Children'),
(4, 'Incomplete Joke'),
(5, 'Wrong Joke Type/Genre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`ageID`);

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`backupID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`eduID`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`genderID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `howoften`
--
ALTER TABLE `howoften`
  ADD PRIMARY KEY (`hoID`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inqID`);

--
-- Indexes for table `joke`
--
ALTER TABLE `joke`
  ADD PRIMARY KEY (`jokeID`),
  ADD KEY `jTypeID` (`jTypeID`),
  ADD KEY `userID` (`userID`) USING BTREE;

--
-- Indexes for table `jokegenre`
--
ALTER TABLE `jokegenre`
  ADD PRIMARY KEY (`jokeGenreID`),
  ADD KEY `jokeID` (`jokeID`),
  ADD KEY `genreID` (`genreID`);

--
-- Indexes for table `jokerating`
--
ALTER TABLE `jokerating`
  ADD PRIMARY KEY (`jRatingID`),
  ADD KEY `jokeID` (`jokeID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `jokereport`
--
ALTER TABLE `jokereport`
  ADD PRIMARY KEY (`jokerepID`),
  ADD KEY `reportID` (`reportID`),
  ADD KEY `jokeID` (`jokeID`,`reportID`);

--
-- Indexes for table `joketype`
--
ALTER TABLE `joketype`
  ADD PRIMARY KEY (`jTypeID`);

--
-- Indexes for table `notiday`
--
ALTER TABLE `notiday`
  ADD PRIMARY KEY (`dayID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `notitime`
--
ALTER TABLE `notitime`
  ADD PRIMARY KEY (`timeID`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `repSubID` (`repSubID`);

--
-- Indexes for table `repsubject`
--
ALTER TABLE `repsubject`
  ADD PRIMARY KEY (`repSubID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `age`
--
ALTER TABLE `age`
  MODIFY `ageID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `backup`
--
ALTER TABLE `backup`
  MODIFY `backupID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `eduID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `genderID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genreID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `howoften`
--
ALTER TABLE `howoften`
  MODIFY `hoID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inqID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joke`
--
ALTER TABLE `joke`
  MODIFY `jokeID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jokegenre`
--
ALTER TABLE `jokegenre`
  MODIFY `jokeGenreID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jokerating`
--
ALTER TABLE `jokerating`
  MODIFY `jRatingID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jokereport`
--
ALTER TABLE `jokereport`
  MODIFY `jokerepID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joketype`
--
ALTER TABLE `joketype`
  MODIFY `jTypeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notiday`
--
ALTER TABLE `notiday`
  MODIFY `dayID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notitime`
--
ALTER TABLE `notitime`
  MODIFY `timeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repsubject`
--
ALTER TABLE `repsubject`
  MODIFY `repSubID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `joke`
--
ALTER TABLE `joke`
  ADD CONSTRAINT `jTypeID` FOREIGN KEY (`jTypeID`) REFERENCES `joketype` (`jTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jokegenre`
--
ALTER TABLE `jokegenre`
  ADD CONSTRAINT `genreID` FOREIGN KEY (`genreID`) REFERENCES `genre` (`genreID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `reportSubjectID` FOREIGN KEY (`repSubID`) REFERENCES `repsubject` (`repSubID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
