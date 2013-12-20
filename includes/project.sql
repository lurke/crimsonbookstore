-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2012 at 11:21 AM
-- Server version: 5.5.28
-- PHP Version: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `auth_id` int(11) NOT NULL,
  `auth_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`auth_id`, `auth_name`) VALUES
(1, 'John H. Hubbard');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture` mediumtext NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `department` int(255) NOT NULL,
  KEY `userid` (`id`),
  KEY `title` (`title`),
  KEY `department` (`department`),
  KEY `class` (`course`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `course`, `author`, `title`, `picture`, `ISBN`, `description`, `department`) VALUES
(1, '', 'John H. Hubbard', 'Vector Calculus, Linear Algebra, and Differential Forms: A Unified Approach', 'http://matrixeditions.com/VectorCalculusCover-web-large.jpg', '9780971576650', 'Chapters 1 through 6 of this book cover  the standard topics in multivariate calculus and a first course in linear algebra. The book can also be used for a course in analysis, using the proofs in the appendix.<br/><br/>\r\n \r\nThe organization and selection of material differs from the standard approach in three ways, reflecting the following guiding principles.<br/><br/>\r\n\r\nFirst,  we  believe that at this level linear algebra should be more a convenient setting and language for multivariate calculus than a subject in its own right. The guiding principle of this unified approach is that locally, a nonlinear function behaves like its derivative.<br/><br/>\r\n\r\nThus whenever we have a question about a nonlinear function we will answer it by looking carefully at a linear transformation:  its derivative.  In this approach, everything learned about linear algebra pays off twice: first for understanding linear equations, then as a tool for understanding nonlinear equations.<br/><br/>\r\n\r\nWe discuss abstract vector spaces in section 2.6, but the emphasis is on Rn, as we believe that most students find it easiest to move from the concrete to the abstract.<br/><br/>\r\n\r\nSecond, we emphasize computationally effective algorithms, and prove theorems by showing that these algorithms work.<br/><br/>\r\n\r\nWe feel this better reflects the way this mathematics is\r\nused today, in both applied and pure mathematics. Moreover, it can be done with no loss of rigor.<br/><br/> \r\n\r\nFor linear equations, row reduction  is the central\r\ntool from which everything else follows; we use row reduction to prove all the standard results about dimension and rank.  For nonlinear equations, the  cornerstone is Newton''s method, the best and most widely used method for solving nonlinear equations; we use it both as a computational tool and in proving the  inverse and implicit function theorems. We include a section on numerical methods of integration, and we encourage the use of computers  both to reduce tedious calculations and as an aid in visualizing curves and surfaces.<br/><br/>\r\n  \r\nThird, we use differential forms to generalize the fundamental theorem of calculus to higher\r\ndimensions.<br/><br/>\r\n\r\nThe great conceptual simplifications gained by doing electromagnetism in the language of forms is a central\r\nmotivation for using forms. We  apply the language of forms to electromagnetism and potentials in section 6.11 and 6.12, which are expanded in this fourth edition.', 1),
(2, '', 'Stephen G. Kochan', 'Programming in C (3rd Edition)', 'http://www-fp.pearsonhighered.com/assets/hip/images/bigcovers/0672326663.jpg', '0672326663', 'Learn the C programming language from one of the best. Stephen Kochan''s Programming in C is thorough with easy-to-follow instructions that are sure to benefit beginning programmers. This book provides readers with practical examples of how the C programming language can be used with small, fast programs, similar to the programming used by large game developers such as Nintendo. If you want a one-stop-source for C programming, this book is it.The book is appropriate for all introductory-to-intermediate courses on programming in the C language, including courses covering C programming for games and small-device platforms.', 2),
(3, '', 'James Morris', 'Biology - How Life Works', 'http://jacketupload.macmillanusa.com/jackets/high_res/jpgs/9781429218702.jpg', '1464121931', 'Ordinarily, textbooks are developed by first writing chapters, then making decisions about art and images, and finally, once the book is complete, assembling a test bank and ancillary media. This process dramatically limits the integration across resources, and reduces art, media, and assessments to ancillary material, rather than essential resources for student learning.<br/><br/>\r\n\r\nBiology: How Life Works is the first project to develop three pillars—the text, the visual program, and the assessment—at the same time. All three pillars were developed in parallel to make sure that each idea is addressed in the most appropriate medium, and to ensure authentic integration. These three pillars are all tied to the same set of core concepts, share a common language, and use the same visual palette. In this way, the text, visual program, and assessments are integral parts of student learning, rather than just accessories to the text.<br/><br/>\r\n\r\n<b>RETHINKING THE TEXT</b><br/><br/>\r\nIntegrated<br/>\r\nBiology: How Life Works moves away from a focus on disparate topics, towards an integrated approach. Chemistry is presented in context, structure and function are covered together, the flow of information in a cell is introduced where it makes the most conceptual sense, and cases serve as a framework for connecting and assimilating information.<br/><br/>\r\n\r\nSelective<br/>\r\nBiology: How Life Works was envisioned not as a reference book for all of biology, but a resource focused on foundational concepts, terms, and experiments. This allows students to more easily identify, understand, and apply critical concepts, and develop a framework on which to build their understanding of biology.<br/><br/>\r\n\r\nThematic<br/>\r\nBiology: How Life Works was written with six themes in mind. Introduced in Chapter 1 and revisited throughout, these themes provide a framework that helps students see biology as a set of connected concepts. In particular, the theme of evolution is emphasized for its ability to explain and predict so many patterns in biology.<br/><br/>\r\n\r\n<b>RETHINKING THE VISUAL PROGRAM</b><br/><br/>\r\nIntegrated<br/>\r\nAcross Biology: How Life Works—whether students are looking at a figure in the book, watching an animation, or interacting with a simulation—they always see a consistent use of color, shapes, and design.<br/><br/>\r\n\r\nEngaging<br/>\r\nEvery image—still and in motion—engages students by being vibrant, clear, and approachable. The result is a visual environment that is expertly designed to pull students in, deepens their interest, and helps them see a world of biological processes.<br/><br/>\r\n\r\nA Visual Framework<br/>\r\nTo help students think like biologists, the visual program is designed to be a framework for students to hang the concepts and connect ideas. Individual figures present foundational concepts; Visual Synthesis figures tie multiple concepts across chapters together; animations bring these figures to life; and simulations let students interact with the concepts. Collectively, this visual framework allows students to move seamlessly back and forth between the big picture and the details.<br/><br/>\r\n\r\nRETHINKING THE ASSESSMENT<br/><br/>\r\nRange<br/>\r\nDeveloped by a broad community of leading science educators, the assessments for Biology: How Life Works address all types of learning, from recall to synthesis. They are designed to be used in a variety of settings and come in a wide range of formats (multiple choice, true/false, free response).<br/><br/>\r\n\r\nIntegrated<br/>\r\nAssessment is seamlessly integrated into the text and the visual program (both in print and interactive). Each time an instructor asks a student to engage with Biology: How Life Works—whether it is reading a chapter, watching an animation, or working through an experiment—the opportunity to assess that experience exists.<br/><br/>\r\n\r\nConnected<br/>\r\nMany of the questions and activities for Biology: How Life Works are organized in sets called Progressions.  Questions in a Progression are aligned with one or more core concepts, and are designed to move a student from basic knowledge to higher order skills and deeper understanding.  Progressions questions can be used individually or in a series as pre-class quizzes, in-class clicker questions or activities, post-class homework, or exams.  When used in sequence, Progressions provide a connected learning path for students.', 4),
(4, '', 'David Halliday', 'Fundamentals of Physics (Regular Edition)', 'http://1.bp.blogspot.com/-SCMyFheYM7k/TVbpwpJZ9DI/AAAAAAAAAEg/8fdpL8BAi6I/s1600/2850-1.jpg', '0470044721', 'No other book on the market today can match the 30-year success of Halliday, Resnick and Walker''s Fundamentals of Physics! In a breezy, easy-to-understand style the book offers a solid understanding of fundamental physics concepts, and helps readers apply this conceptual understanding to quantitative problem solving. This book offers a unique combination of authoritative content and stimulating applications.\r\n* Problem-solving tactics are provided to help the reader solve problems and avoid common errors.\r\n* This new edition features several thousand end of chapter problems that were rewritten to streamline both the presentations and answers.\r\n* Chapter Puzzlers open each chapter with an intriguing application or question that is explained or answered in the chapter.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE IF NOT EXISTS `Department` (
  `deptid` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(255) NOT NULL,
  `dept_description` longtext NOT NULL,
  `dept_img` mediumtext NOT NULL,
  `popularity` int(11) NOT NULL,
  KEY `popularity` (`popularity`),
  KEY `deptid` (`deptid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`deptid`, `dept_name`, `dept_description`, `dept_img`, `popularity`) VALUES
(1, 'Mathematics', 'The Mathematics Department hopes that all students will take mathematics courses. This said, be careful to take only those courses that are appropriate for your level of experience. Incoming students should take advantage of Harvard’s Mathematics Placement Test and of the science advising available in the Science Center the week before classes begin. Members of the Mathematics Department will be available during this period to consult with students. Generally, students with a strong precalculus background and some calculus experience will begin their mathematics education here with a deeper study of calculus and related topics.', 'img/Math.gif', 0),
(2, 'Computer Science', 'Computer scientists at Harvard investigate a wide range of topics, including groundbreaking work in provably secure cryptography, the implementation of sensor nets, developments at the interface of economics and computer science, and discoveries in VLSI.', 'img/Cs.jpg', 0),
(3, 'History', 'While history has always been an important component of educating Harvard students, it was not a department, in its own right, until 1839.  For the first 200 years, Harvard University taught the events of the past through courses in classics, philosophy, politics, and economics.<br/><br/>\r\nIt was not until the nineteenth century that there was an idea of history as being a distinct field of study within academia.  Even after the codification of the history department at Harvard, our students and faculty still drew upon the courses and resources within other departments, a tradition that still exists to this day.  Many of our current faculty members share appointments with other departments on campus and are involved in interdisciplinary collaborations with committees, programs and institutions both at Harvard and around the world.', 'img/History.gif\r\n', 0),
(4, 'Biology', 'Harvard offers a broad range of exciting opportunities for undergraduates to explore the diversity of living systems. Students enter the life sciences through a set of interdisciplinary foundational courses and then pursue a more specialized plan of study in one of nine concentrations. From neurobiology to stem cells, from chemistry to evolutionary biology, undergraduates can explore the interesting and important questions of the life sciences. We emphasize hands-on experiences and encourage students to engage in original research in any of the more than 1000 faculty laboratories that are affiliated with Harvard. We offer a variety of resources to support students, including a team of dedicated advisors who help students navigate coursework, research opportunities, and life beyond Harvard.', 'img/Biology.jpg', 0),
(5, 'Physics', 'From those pioneering days and throughout the Department''s long and illustrious history, its faculty and students have been engaged in groundbreaking research and standard-setting instruction, contributing importantly to Harvard''s reputation as one of the premier institutions of higher learning in the world. Among Harvard''s 43 Nobel laureates, 10 are or were physics faculty members. Today, the latest generation of Harvard physicists continues to bring new insights into the exploration of fundamental problems involving physics at all length scales, and to provide outstanding and innovative educational opportunities to the many talented men and women who enroll in Harvard''s flexible undergraduate and graduate programs.', 'img/Physics.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `to_user` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `to_user` (`to_user`),
  KEY `from_user` (`from_user`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`to_user`, `message`, `from_user`, `time`) VALUES
('michaelchen92067', 'asdfasdf', 'michaelchen92067', '2012-12-09 05:33:40'),
('michaelchen92067', 'asdfsd', 'michaelchen92067', '2012-12-09 05:50:06'),
('michaelchen92067', 'dafsdfasdfasdf', 'michaelchen92067', '2012-12-09 05:53:33'),
('michaelchen92067', 'asdfas', 'michaelchen92067', '2012-12-09 06:19:23'),
('michaelchen92067', 'adsfasdf', 'michaelchen92067', '2012-12-09 06:30:40'),
('michaelchen92067', 'HeyÂ Michael,\r\n                   \r\nI am interested in your listing ofÂ John H. Hubbard''sÂ Vector Calculus, Linear Algebra, and Differential Forms: A Unified Approach.Â Please get back to me.\r\n\r\nThanks! \r\nMichael', 'michaelchen92067', '2012-12-09 06:52:38'),
('michaelchen92067', 'hiasdf;laskdjf;asdf', 'joey', '2012-12-09 06:53:12'),
('michaelchen92067', 'HeyÂ Michael,\r\n                   \r\nI am interested in your listing ofÂ Stephen G. Kochan''sÂ Programming in C (3rd Edition).Â Please get back to me.\r\n\r\nThanks! \r\nMichael', 'michaelchen92067', '2012-12-09 12:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `userid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`bookid`),
  KEY `userid` (`userid`),
  KEY `bookid` (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`userid`, `bookid`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `pub_id` int(11) NOT NULL,
  `pub_name` mediumtext NOT NULL,
  `pub_address` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`pub_id`, `pub_name`, `pub_address`) VALUES
(1, 'Matrix Editions', '214 University Ave. \r\nIthaca, NY 14850 \r\nUSA');

-- --------------------------------------------------------

--
-- Table structure for table `sellerbooks`
--

CREATE TABLE IF NOT EXISTS `sellerbooks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `bookid` int(10) NOT NULL,
  `price` decimal(10,0) unsigned NOT NULL,
  `user_img` text NOT NULL,
  `cond` text NOT NULL,
  `user_desc` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sellerbooks`
--

INSERT INTO `sellerbooks` (`id`, `userid`, `bookid`, `price`, `user_img`, `cond`, `user_desc`, `date`) VALUES
(1, 1, 2, '79', 'http://ecx.images-amazon.com/images/I/41IcmN4ZG0L._SL500_AA300_.jpg', 'NEW', 'blah blah blah', '2012-12-06 19:08:34'),
(2, 1, 1, '45', 'http://www.math.cornell.edu/~allenk/courses/12spring/2240/cover.jpg', 'DEAD', 'asdfa', '2012-12-06 20:02:31'),
(8, 1, 1, '45', '', 'NEW', 'asdfasdfasdfa', '2012-12-09 15:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `Textbooks`
--

CREATE TABLE IF NOT EXISTS `Textbooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `ISBN` bigint(20) unsigned NOT NULL,
  `description` longtext NOT NULL,
  `department` int(11) NOT NULL,
  `picture` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `Textbooks`
--

INSERT INTO `Textbooks` (`id`, `course`, `title`, `author`, `ISBN`, `description`, `department`, `picture`) VALUES
(1, ' Mathematics 121 ', ' A simple non-Euclidean geometry and its Physical basis', ' Yaglom', 0, '', 0, ''),
(2, ' History 81f ', ' The fourth estate: a history of women in the Middle Ages', ' Shahar, Shulamith ', 41504605, '', 0, ''),
(3, ' Mathematics 121 ', ' A course in mathematics for students of physics', ' Bamberg, Paul G ', 52125017, '', 0, ''),
(4, ' Mathematics 231a ', ' Algebraic topology', 'Â Â Â  Hatcher, Allen', 52179160, '', 0, ''),
(5, ' History 81f ', ', [28] p', 'Â Â Â  Davis, Natalie Zemon  Women on the margins : three seventeenth-century lives', 67495520, '', 0, ''),
(6, ' United States in the World 31 ', ' social policy', ' Howard, Christopher  The welfare state nobody knows: debunking myths about U', 69112180, '', 0, ''),
(7, ' South Asian Studies 190 ', ' Languages of belonging : Islam, regional identity, and the making of Kashmir', ' Zutshi, Chitralekha', 195219392, '', 0, ''),
(8, ' History 81f ', ' The personal correspondence of Hildegard of Bingen', ' Hildegard Saint ', 195308220, '', 0, ''),
(9, ' French C ', ' L'' Ã©tudiant Ã©tranger: roman', ' Labro, Philippe', 207070761, '', 0, ''),
(10, ' History 2404 ', ' More wives than one: transformation of the Mormon marriage system, 1840-1910', ' Daynes, Kathryn M ', 252026810, '', 0, ''),
(11, ' Mathematics 233a ', ' The geometry of schemes', 'Â Â Â  Eisenbud, David ', 387986375, '', 0, ''),
(12, ' History 81f ', ' xii, 579 p', ' Becoming visible : women in European history', 395419506, '', 0, ''),
(13, ' Mathematics 121 ', ' Affine and projective geometry', 'Â Â Â  Bennett, M  K', 471113158, '', 0, ''),
(14, ' History 81f ', ' European Jewry and the First Crusade', ' Chazan, Robert ', 520055667, '', 0, ''),
(15, ' History 81f ', ' Women and gender in early modern Europe', ' Wiesner, Merry E ', 521384591, '', 0, ''),
(16, ' History 81f ', ' Gender, church, and state in early modern Germany: essays', ' Wiesner, Merry E ', 582292824, '', 0, ''),
(17, ' South Asian Studies 190 ', ' Kashmir : roots of conflict, paths to peace', ' Bose, Sumantra', 674011732, '', 0, ''),
(18, ' Mathematics 243 ', ' Evolutionary Dynamics', ' Nowak, Martin', 674023382, '', 0, ''),
(19, ' History 81f ', ' Judaism in practice: from the Middle Ages through the early modern period', ' Fine, Lawrence ', 691057869, '', 0, ''),
(20, ' United States in the World 31 ', ' How policies make citizens : senior political activism and the American welfare state', ' Campbell, Andrea Louise', 691091897, '', 0, ''),
(21, ' South Asian Studies 190 ', ' Hindu rulers, Muslim subjects : Islam, rights, and the history of Kashmir', ' Rai, Mridu', 691116873, '', 0, ''),
(22, ' History 81f ', ' History & feminism: a glass half full', ' Zinsser, Judith P ', 805797513, '', 0, ''),
(23, ' History 81f ', ' Voices of the matriarchs : listening to the prayers of early modern Jewish women', ' Weissler, Chava', 807036161, '', 0, ''),
(24, ' History 2404 ', ' The Mormon question: polygamy and constitutional conflict in nineteenth-century America', ' Gordon, Sarah Barringer', 807826618, '', 0, ''),
(25, ' History 81f ', ' Marie of the Incarnation: selected writings', ' Marie de l''Incarnation mÃ¨re ', 809104288, '', 0, ''),
(26, ' South Asian Studies 190 ', ' Fighting for faith and nation : dialogues with Sikh militants', ' Mahmood, Cynthia Keppley', 812233611, '', 0, ''),
(27, ' History 81f ', ' Tradition and crisis: Jewish society at the end of the Middle Ages', ' Katz, Jacob', 815628277, '', 0, ''),
(28, ' United States in the World 31 ', ' Families that work : policies for reconciling parenthood and employment', ' Gornick, Janet C ', 871543567, '', 0, ''),
(29, ' United States in the World 31 ', ' Beyond smoke and mirrors: Mexican immigration in an era of economic integration', ' Massey, Douglas S ', 871545896, '', 0, ''),
(30, ' History 81f ', ' A medieval woman''s mirror of honor: the treasury of the city of ladies', ' Christine de Pisan ', 892551445, '', 0, ''),
(31, ' History 2404 ', ' Waiting for world''s end: the diaries of Wilford Woodruff', ' Woodruff, Wilford', 941214923, '', 0, ''),
(32, ' History 81f ', ' On the purification of women: churching in northern France, 1100-1500', ' Rieder, Paula M ', 1403969698, '', 0, ''),
(33, ' History 2404 ', ' The New Mormon history: revisionist essays on the past', ' Quinn, D  Michael', 1560850116, '', 0, ''),
(34, ' History 2404 ', ' Excavating Mormon pasts: the new historiography of the last half century', ' Bringhurst, Newell G ', 1589580907, '', 0, ''),
(35, ' South Asian Studies 190 ', ' The Sikhs of the Punjab: unheard voices of State and Guerilla violence', ' Pettigrew, Joyce ', 1856493555, '', 0, ''),
(36, ' History 81f ', ' Egodocuments and history: autobiographical writing in its social context since the Middle Ages', ' Dekker, Rudolf ', 9065504397, '', 0, ''),
(37, ' Spanish 259 ', ' Eva PerÃ³n: una biografÃ­a polÃ­tica', 'Â Â Â  Zanatta, Loris ', 9500731932, '', 0, ''),
(38, ' French C ', ' Pause-cafÃ©: French in review, moving toward fluency', 'Â Â Â  Megharbi, Pellet, Blyth, Foerster', 9780072407846, '', 0, ''),
(39, ' Mathematics 121 ', ' Visualizing quaternions', ' Hanson, Andrew (Andrew J )', 9780120884001, '', 0, ''),
(40, ' History 2404 ', ' Massacre at Mountain Meadows: an American tragedy', ' Walker, Ronald W  (Ronald Warren)', 9780195160345, '', 0, ''),
(41, ' History 2404 ', ' Mormonism: a very short introduction', 'Â Â Â  Bushman, Richard L ', 9780195310306, '', 0, ''),
(42, ' United States in the World 31 ', ' The unsustainable American state', ' Jacobs, Lawrence R ', 9780195392135, '', 0, ''),
(43, ' United States in the World 31 ', ' The Tea Party and the remaking of Republican conservatism', ' Skocpol, Theda ', 9780199832637, '', 0, ''),
(44, ' History 81f ', ' Believe not every spirit : possession, mysticism, & discernment in early modern Catholicism ', ' Sluhovsky, Moshe', 9780226762821, '', 0, ''),
(45, ' South Asian Studies 190 ', ' Religion, caste, and politics in India', 'Â Â Â  Jaffrelot, Christophe ', 9780231702607, '', 0, ''),
(46, ' Culture and Belief 52 ', ' Evangelical disenchantment: nine portraits of faith and doubt', 'Â Â Â  Hempton, David ', 9780300140675, '', 0, ''),
(47, ' Government 30 ', ' American government: power and purpose', ' Lowi', 9780393912074, '', 0, ''),
(48, ' Government 30 ', ' The enduring debate: classic and contemporary readings in American politics', ' Canon, David', 9780393932171, '', 0, ''),
(49, ' Government 30 ', ' American government: power and purpose', 'Â Â Â  Lowi, Theodore', 9780393932997, '', 0, ''),
(50, ' South Asian Studies 190 ', ' War and nationalism in South Asia: the Indian state and the Nagas', ' Franke, Marcus', 9780415437417, '', 0, ''),
(51, ' South Asian Studies 190 ', ' Communalism, caste, and Hindu nationalism: the violence in Gujarat', ' Shani, Ornit ', 9780521865135, '', 0, ''),
(52, ' United States in the World 31 ', ' Creating a class: college admissions and the education of elites', ' Stevens, Mitchell L ', 9780674026735, '', 0, ''),
(53, ' History 2404 ', ' On Zion''s mount: Mormons, Indians, and the American landscape', ' Farmer, Jared', 9780674027671, '', 0, ''),
(54, ' History 2404 ', ' Empires, nations, and families: a history of the North American West, 1800-1860', ' Hyde, Anne Farrar', 9780803224056, '', 0, ''),
(55, ' United States in the World 31 ', ' America works: the exceptional U', ' Freeman, Richard B  (Richard Barry)', 9780871542830, '', 0, ''),
(56, ' United States in the World 31 ', ' Whither opportunity?: rising inequality, schools, and children''s life chances', ' Duncan, Greg J ', 9780871543721, '', 0, ''),
(57, ' United States in the World 31 ', ' Reaching for a new deal: ambitious governance, economic meltdown, and polarized politics in Obama''s first two years', ' Skocpol, Theda', 9780871548559, '', 0, ''),
(58, ' Mathematics 121 ', ' Vector calculus, linear algebra, and differential forms: a unified approach', ' Hubbard, John H ', 9780971576650, '', 0, ''),
(59, ' United States in the World 31 ', ' Winner-take-all politics: how Washington made the rich richer-and turned its back on the middle class', ' Hacker, Jacob S ', 9781416588696, '', 0, ''),
(60, ' South Asian Studies 190 ', ' Curfewed night: one Kashmiri journalist''s frontline account of life, love, and war in his homeland', ' Peer, Basharat', 9781439109106, '', 0, ''),
(61, ' United States in the World 31 ', ' The great divergence: America''s growing inequality crisis and what we can do about it', ' Noah, Timothy ', 9781608196333, '', 0, ''),
(62, ' South Asian Studies 190 ', ' When a tree shook Delhi: the 1984 carnage and its aftermath', ' Mitta, Manoj ', 9788174366191, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `hash`, `active`) VALUES
(1, 'Michael', 'Chen', 'michaelchen92067', '$1$GeGPajyg$8DKExa4NbwUqxzrjHIna9.', 'michaelchen01@college.harvard.edu', '', 1),
(3, '', '', 'joebiden', '$1$RkBe2bN2$yASegp3B0tRn7d38ByQZj/', 'joe@lol.com', '', 1),
(4, 'Joe', 'Schmoe', 'joey', '$1$5MMI.qqV$0vU9uTzgS9PP8wuAUmaa30', 'michaelchen01@college.harvard.edu', '072b030ba126b2f4b2374f342be9ed44', 1),
(7, 'Dude', 'Sucks', 'dude', '$1$b3mzx4BU$Tt8nTqz8FAQc05Jl7dz4r.', 'michaelchen01@college.harvard.edu', 'fe7ee8fc1959cc7214fa21c4840dff0a', 1),
(8, 'b', 'b', 'b', '$1$tBKoDPni$XBbMWuSvFvPtYASdQ2oOV1', 'michaelchen01@college.harvard.edu', 'ab88b15733f543179858600245108dd8', 1),
(9, 'Mitchel', 'Cole', 'mcole', '$1$HANXkK88$7j7xZhH4byw7qKI65fYbq.', 'mcole@college.harvard.edu', '3d2d8ccb37df977cb6d9da15b76c3f3a', 1),
(10, 'a', 'a', 'a', '$1$//HQn2RD$jcZXdq/V6Qziy4epX13d90', 'michaelchen01@college.harvard.edu', 'e4a6222cdb5b34375400904f03d8e6a5', 1),
(11, 'c', 'c', 'c', '$1$ztU7ubaB$GRhD0jwa11BbZWweMk/vz1', 'michaelchen01@college.harvard.edu', 'e0ec453e28e061cc58ac43f91dc2f3f0', 1),
(12, 'Serguei', 'Balanovich', 'sergs', '$1$p2fC4GeG$MEnV6H3id2G3VkPtp50bv0', 'sbalanovich@college.harvard.edu', '53fde96fcc4b4ce72d7739202324cd49', 0),
(18, 'sergs', 'bala', 'sergsb', '$1$EyevJ0tQ$4MaHj7Je2NzF8Swky0tLk0', 'nig@college.harvard.edu', '6da37dd3139aa4d9aa55b8d237ec5d4a', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
