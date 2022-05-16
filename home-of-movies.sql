-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 05:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home-of-movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `Gid` int(10) UNSIGNED NOT NULL,
  `Genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`Gid`, `Genre`) VALUES
(1, 'Romance'),
(2, 'Horror'),
(3, 'Sport'),
(4, 'Drama'),
(5, 'Mystery'),
(6, 'Crime'),
(7, 'Documentary'),
(8, 'Action'),
(9, 'Comedy'),
(10, 'Adventure'),
(11, 'Cartoon'),
(12, 'Musical'),
(13, 'Fiction'),
(15, 'Fantasy'),
(16, 'Fantasy'),
(17, 'Animation'),
(18, 'Boollywood'),
(19, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `Mid` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Genreid` int(10) UNSIGNED DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Image` varchar(500) NOT NULL,
  `Ratings` decimal(2,1) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Mid`, `Title`, `Genreid`, `Description`, `Image`, `Ratings`, `Year`) VALUES
(4, '007', 8, 'James Bond has left active service. His peace is short-lived when Felix Leiter, an old friend from the CIA, turns up asking for help.', '007.jpg', '7.4', 2021),
(5, '1917', 4, 'Two soldiers, assigned the task of delivering a critical message to another battalion, risk their lives for the job in order to prevent them from stepping right into a deadly ambush.', '1917.jpg', '8.3', 2019),
(6, 'A Dark Place', 5, 'When a young boy goes missing in a sleepy backwoods town, a local sanitation truck driver, Donald, plays detective, embarking on a precarious and obsessive investigation.', 'adarkplace.jpg', '6.2', 2018),
(7, 'After', 1, 'Tessa Young is a dedicated student, dutiful daughter and loyal girlfriend to her high school sweetheart. Entering her first semester of college, Tessa\'s guarded world opens up when she meets Hardin Scott.', 'after.jpg', '5.3', 2019),
(8, 'Antim', 4, 'A man from humble origins works his way up to an influential position within organised crime. Nothing seems able to stop him until he runs into a police officer who takes his job to uphold justice very seriously.', 'antim.jpg', '7.3', 2021),
(9, 'Ant-Man', 10, 'Scott, a master thief, gains the ability to shrink in scale with the help of a futuristic suit. Now he must rise to the occasion of his superhero status and protect his secret from unsavoury elements.', 'antman.jpg', '7.3', 2015),
(10, 'Avatar', 8, 'Jake, who is paraplegic, replaces his twin on the Na\'vi inhabited Pandora for a corporate mission. After the natives accept him as one of their own, he must decide where his loyalties lie.', 'avatar.jpg', '7.8', 2009),
(12, 'Bad Boys', 9, 'Marcus, a family man, and Mike, a ladies\' man, are partners in the Miami police. Things get complicated when they assume each other\'s identity while investigating a drug deal.', 'badboy.jpg', '6.9', 1995),
(13, 'Brave Heart', 4, 'William Wallace, a Scottish rebel, along with his clan, sets out to battle King Edward I of England, who killed his bride a day after their marriage.', 'braveheart.jpg', '8.3', 1995),
(14, 'Crazy Rich', 1, 'Rachel, a professor, dates a man named Nick and looks forward to meeting his family. However, she is shaken up when she learns that Nick belongs to one of the richest families in the country.', 'crazyrich.jpg', '6.9', 2018),
(15, 'Dora', 10, 'Dora and her group of friends, including Boots the Monkey, go to the forest to look for the lost city of gold. She meets numerous challenges and dangerous situations on the way.', 'dora.jpg', '6.1', 2019),
(33, 'Dunkrik', 8, 'During World War II, soldiers from the British Empire, Belgium and France try to evacuate from the town of Dunkirk during a arduous battle with German forces.', 'dunkrik.jpg', '7.8', 2017),
(34, 'Fight Club', 4, 'Unhappy with his capitalistic lifestyle, a white-collared insomniac forms an underground fight club with Tyler, a careless soap salesman. Soon, their venture spirals down into something sinister.', 'fightclub.jpg', '8.8', 1999),
(35, 'Avengers', 8, 'After Thanos, an intergalactic warlord, disintegrates half of the universe, the Avengers must reunite and assemble again to reinvigorate their trounced allies and restore balance.', 'avengers.jpg', '8.4', 2019),
(36, 'Matrix', 8, 'To find out if his reality is a physical or mental construct, Mr. Anderson, aka Neo, will have to choose to follow the white rabbit once more.', '61d5888146fab5.31005372.jpg', '5.7', 2021),
(37, 'Free Guy', 10, 'When a bank teller discovers he\'s actually a background player in an open-world video game, he decides to become the hero of his own story -- one that he can rewrite himself.', '61d58ace73e4c6.58623402.jpg', '7.9', 2021),
(38, 'Pushpa: The Rise', 4, 'Violence erupts between red sandalwood smugglers and the police charged with bringing down their organization.', '61d58b29542c46.53549480.jpg', '8.1', 2021),
(39, 'Moonlight', 4, 'Chiron, a young African-American boy, finds guidance in Juan, a drug dealer, who teaches him to carve his own path.', '61d5bf4e408512.73600581.jpg', '7.4', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Uid` int(10) UNSIGNED NOT NULL,
  `Uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `favorite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Uid`, `Uname`, `email`, `password`, `favorite`) VALUES
(3, 'Abbas Dorra', 'abbas666@gmail.com', 'uxxxu', 'Die Hard'),
(4, 'Nick Dzeko', 'Dzeko12career@hotmail.com', 'xuuux', 'Die Hard'),
(5, 'Amal Rahme', 'rahme89@gmail.com', 'rahmeamal', 'Beauty and the Beast'),
(6, 'Mark Musk', 'elanmark@outlook.com', '12qwzx', 'Goal'),
(9, 'Moe Salah', 'moeliverpool@gmail.com', 'moemoe', 'Goal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Gid`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`Mid`),
  ADD KEY `Genreid` (`Genreid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `Gid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `Mid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`Genreid`) REFERENCES `genre` (`Gid`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
