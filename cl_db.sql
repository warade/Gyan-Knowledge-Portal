-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2016 at 12:41 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `UserID` int(11) NOT NULL,
  `FollowerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`UserID`, `FollowerID`) VALUES
(1, 18),
(1, 20),
(1, 21),
(18, 1),
(18, 20),
(18, 21),
(18, 26),
(19, 1),
(19, 18),
(19, 20),
(19, 21),
(19, 26),
(20, 18),
(20, 19),
(20, 21),
(20, 22),
(20, 26),
(21, 18),
(21, 19),
(21, 22),
(22, 24);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `ListID` int(11) NOT NULL,
  `likeness` enum('like','unlike','','') NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `ListID`, `likeness`, `UserID`) VALUES
(10, 50, 'like', 26),
(29, 52, 'like', 26),
(30, 52, 'like', 26),
(31, 52, 'like', 26);

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `ListID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ListURL` longtext NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`ListID`, `UserID`, `ListURL`, `stamp`) VALUES
(46, 24, '@kushal posted:<br>In 1968, Knuth published the first of three volumes with the general title The Art of Computer Programming [209, 210, 211]. The first volume ushered in the modern study of computer algorithms with a focus on the analysis of running time, and the full series remains an engaging and worthwhile reference for many of the topics presented here. According to Knuth, the word â€œalgorithmâ€ is derived from the name â€œal-KhowË†arizmË†Ä±,â€ a ninth-century Persian mathematician. Aho, Hopcroft, and Ullman [5] advocated the asymptotic analysis of algorithmsâ€” using notations that Chapter 3 introduces, including â€š-notationâ€”as a means of comparing relative performance. They also popularized the use of recurrence relations to describe the running times of recursive algorithms. Knuth [211] provides an encyclopedic treatment of many sorting algorithms. His comparison of sorting algorithms (page 381) includes exact step-counting analyses, like the one we performed here for insertion sort. Knuthâ€™s discussion of insertion sort encompasse', '2016-07-02 15:36:36'),
(47, 24, '@kushal posted:<br>its a amazing joke: ', '2016-07-02 15:36:52'),
(48, 19, '@sangita posted:<br>Breadth-first search is one of the simplest algorithms for searching a graph and\r\nthe archetype for many important graph algorithms. Primâ€™s minimum-spanningtree\r\nalgorithm (Section 23.2) and Dijkstraâ€™s single-source shortest-paths algorithm\r\n(Section 24.3) use ideas similar to those in breadth-first search.\r\nGiven a graph G D .V;E/ and a distinguished source vertex s, breadth-first\r\nsearch systematically explores the edges of G to â€œdiscoverâ€ every vertex that is\r\nreachable from s. It computes the distance (smallest number of edges) from s\r\nto each reachable vertex. It also produces a â€œbreadth-first treeâ€ with root s that\r\ncontains all reachable vertices. For any vertex  reachable from s, the simple path\r\nin the breadth-first tree from s to  corresponds to a â€œshortest pathâ€ from s to \r\nin G, that is, a path containing the smallest number of edges. The algorithm works\r\non both directed and undirected graphs.\r\nBreadth-first search is so named because it expands the frontier between discovered\r\nand undiscovered vertices uniformly across the breadth of the frontier. That\r\nis, the algorithm discovers all vertices at distance k from s before discovering any\r\nvertices at distance k C 1.\r\nTo keep track of progress, breadth-first search colors each vertex white, gray, or\r\nblack. All vertices start out white and may later become gray and then black. A\r\nvertex is discovered the first time it is encountered during the search, at which time\r\nit becomes nonwhite. Gray and black vertices, therefore, have been discovered, but\r\nbreadth-first search distinguishes between them to ensure that the search proceeds\r\nin a breadth-first manner.1 If .u; / 2 E and vertex u is black, then vertex \r\nis either gray or black; that is, all vertices adjacent to black vertices have been\r\ndiscovered. Gray vertices may have some adjacent white vertices; they represent\r\nthe frontier between discovered and undiscovered vertices.', '2016-07-02 15:50:19'),
(49, 19, '@sangita posted:<br>nothing much.. tell me about you!', '2016-07-02 17:21:17'),
(50, 18, '@rashmi posted:<br>rashmi one', '2016-07-02 19:57:02'),
(51, 18, '@rashmi posted:<br>rashmi two', '2016-07-02 19:57:06'),
(52, 20, '@akki posted:<br>akki one', '2016-07-02 19:57:27'),
(53, 20, '@akki posted:<br>akki two', '2016-07-02 19:57:33'),
(54, 21, '@shubhya posted:<br>shubhya one', '2016-07-02 19:58:08'),
(55, 21, '@shubhya posted:<br>shubhya two', '2016-07-02 19:58:16'),
(56, 19, '@sangita posted:<br>ho ka??', '2016-07-02 20:06:21'),
(57, 20, '@akki posted:<br>hello', '2016-07-03 06:15:06'),
(58, 20, '@akki posted:<br>nothing.....', '2016-07-03 10:20:06'),
(59, 26, '@kartik posted:<br>okay here igo', '2016-07-04 08:46:00'),
(60, 26, '@kartik posted:<br>ojij', '2016-07-04 08:46:04'),
(61, 20, '@akki posted:<br>hello', '2016-07-07 10:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `email` varchar(120) NOT NULL,
  `homecity` varchar(150) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `name`, `Username`, `Password`, `email`, `homecity`, `status`) VALUES
(18, 'Rashmi Warade', 'rashmi', 'rashmi', 'any', 'Nandura, Maharashtra, India.', 'active'),
(19, 'Sangita Warade', 'sangita', 'sangita', 'any', 'na', 'inactive'),
(20, 'Akshay Sarbhukan', 'akki', 'akki', 'any', 'Nandura, Maharashtra, India.', 'active'),
(21, 'Shubham Waghmare', 'shubhya', 'shubhya', 'any', 'n/a', 'inactive'),
(22, 'Sudhakar Warade', 'sudhakar', 'sudhakar', '', 'Nandura, Maharashtra, India.', 'inactive'),
(24, 'Kushal Dhande', 'kushal', 'kushal', 'any', 'Nandura, Maharashtra, India.', 'inactive'),
(25, 'Sudarshan', 'sudya', 'sudya', 'any', 'Nandura, Maharashtra, India.', 'inactive'),
(26, 'Kartikey', 'kartik', 'kartik', 'any', 'Noida, new delhi', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`UserID`,`FollowerID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`ListID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `ListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
