-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2013 at 11:33 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `crimsonbookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `smandatory` int(1) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `isbn10` varchar(11) NOT NULL,
  `isbn13` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(255) NOT NULL,
  `long_name` text NOT NULL,
  `professor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `book_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `price` varchar(255) NOT NULL,
  `book_condition` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `contenders` int(10) NOT NULL,
  `copies` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_id` bigint(10) NOT NULL,
  `listing_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_starred`
--

CREATE TABLE `user_starred` (
  `user_id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
