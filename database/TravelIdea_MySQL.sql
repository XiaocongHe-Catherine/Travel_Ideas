SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(150) NOT NULL,
  'destination' varchar(150) NOT NULL,
  'start_date' datetime;
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;
