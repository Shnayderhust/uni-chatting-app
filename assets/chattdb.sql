-- @block
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL PRIMARY KEY,
  `firstname` varchar(200) NOT NULL,
  `othername` varchar(120) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(300) NOT NULL DEFAULT 'avatar.jpg',
  `status` BOOLEAN NOT NULL DEFAULT '0',
)

-- @block
CREATE TABLE `conversation` (
  `conver_id` int(11) NOT NULL PRIMARY KEY,
  `user1_id` INT,
  `user2_id` INT,
  `timestamp` TIMESTAMP NOT NULL
  FOREIGN KEY(user1_id) REFERENCES users(user_id),
  FOREIGN KEY(user2_id) REFERENCES users(user_id),
)

-- @block
CREATE TABLE `messages` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `conversation_id` NOT NULL,
  `sender_id` INT NOT NULL,
  `reciever_id` INT NOT NULL,
  `message` TEXT NOT NULL,
  `timestamp` TIMESTAMP NOT NULL,
  `read_status` BOOLEAN,
  FOREIGN KEY(conversation_id) REFERENCES conversation(conver_id),
  FOREIGN KEY(sender_id) REFERENCES users(user_id)
)

CREATE TABLE `contact`(
  `user_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  PRIMARY KEY(`user_id`, `contact_id`),
  FOREIGN KEY(user_id) REFERENCES users(user_id),
  FOREIGN KEY(contact_id) REFERENCES users(user_id)
);

CREATE TABLE `notification`(
  `id` INT PRIMARY KEY,
  `recipt_id` INT,
  `sender_id` INT,
  `message_id` INT,
  `time_stamp` TIMESTAMP,
  FOREIGN KEY(reciever_id) REFERENCES users(user_id),
  FOREIGN KEY(sender_id) REFERENCES users(user_id),
  FOREIGN KEY(message_id) REFERENCES message(message_id)
);

-- @block
-- Future Features
-- CREATE TABLE `university` (
--   `id` int(11) NOT NULL PRIMARY KEY,
--   `university` varchar(200) NOT NULL,
-- )

-- CREATE TABLE `course` (
--   `id` int(11) NOT NULL PRIMARY KEY,
--   `course` varchar(300) NOT NULL
-- )