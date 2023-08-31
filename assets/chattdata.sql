CREATE TABLE `chat` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `dateposted` varchar(200) NOT NULL
)

CREATE TABLE `department` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `department` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL
)

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `faculty` varchar(300) NOT NULL
)

CREATE TABLE `dm` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateposted` varchar(250) NOT NULL
)

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `receiver_name` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `dateposted` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL
)

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `firstname` varchar(200) NOT NULL,
  `othername` varchar(120) NOT NULL,
  `level` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateposted` varchar(50) NOT NULL,
  `profile_pic` varchar(300) NOT NULL DEFAULT 'avatar.jpg',
  `active` int(11) NOT NULL DEFAULT '1',
  `account_type` varchar(250) NOT NULL DEFAULT 'user'
)

CREATE TABLE `user_online` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `session` char(100) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `profile_pic` varchar(250) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0'
)