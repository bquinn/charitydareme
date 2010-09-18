-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2010 at 05:05 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `dare_to_give`
--

-- --------------------------------------------------------

--
-- Table structure for table `dare`
--


DROP TABLE IF EXISTS `pledge`;
DROP TABLE IF EXISTS `dare`;
DROP TABLE IF EXISTS `charity`;

CREATE TABLE IF NOT EXISTS `charity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(2000) NOT NULL,
  `image_thumbnail` varchar(2000) NOT NULL,
  `amount_raised` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `dare` (
  `dare_id` int(11) NOT NULL AUTO_INCREMENT,
  `darer` bigint(20) NOT NULL,
  `victim` bigint(20) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `initialcontribution` decimal(5,2) NOT NULL,
  `target` decimal(5,2) DEFAULT NULL,
  `enddate` date NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT 'P', -- pending by default
  `completeddate` date DEFAULT NULL,
  `charity_id` int(11) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dare_id`),
  FOREIGN KEY (`charity_id`) REFERENCES charity(id)
) TYPE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `pledge` (
  `pledge_id` int(11) NOT NULL AUTO_INCREMENT,
  `dare_id` int(11) NOT NULL,
  `donor` bigint(20) NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `comment` varchar(2000) NULL,
  `pledge_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paypal_pre_approval_key` varchar(200) NULL,
  `paypal_pre_approval_time` timestamp NULL,
  `paypal_user_id` varchar(200) NULL,
  `paypal_payment_time` timestamp NULL,
  `paypal_payment_status` varchar(1) NOT NULL DEFAULT 'A' -- Awaiting Preapproval, Preapproved, Sent
  PRIMARY KEY (`pledge_id`),
  FOREIGN KEY (`dare_id`) REFERENCES dare(dare_id)
) TYPE=InnoDB  DEFAULT CHARSET=latin AUTO_INCREMENT=1 ;
