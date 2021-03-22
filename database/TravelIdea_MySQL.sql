SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
--
-- Table structure for table `categories`
--

CREATE DATABASE travel_ideas

INSERT INTO `users` (`id`,`name`,`email`,`password`) VALUES
(1,'Catherine','Catherine@outlook.com','werjioo'),
(2,'Benoit','Benoit@outlook.com','iioooiih');

INSERT INTO `ideas` (`id`, `user_id`, `title`, `destination`, `start_date`, `end_date`) VALUES
(1,1,'I plan to visit Tokyo Disney','Tokyo','2021-10-10','2021-10-20'),
(2,1,'Going to visit Singapore','Singapore','2022-10-10','2022-10-20'),
(3,2,'Shall we go to Paris','Paris','2022-09-09','2022-09-15'),
(4,2,'Let us visit Beijing together','Beijing','2022-09-09','2022-09-15');

INSERT INTO `comments` (`id`,`user_id`,`idea_id`,`comment`) VALUES
(1,1,1,'Looking forward to visit Tokyo'),
(2,2,1,'Tokyo is amazing');

INSERT INTO `tags` (`id`,`idea_id`,`tag_name`) VALUES
(1,1,'Tokyo'),
(2,1,'Japan');