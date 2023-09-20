CREATE TABLE users (
  user_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(200) NOT NULL,
  lastname VARCHAR(120) NOT NULL,
  username VARCHAR(40) NOT NULL,
  bio VARCHAR(100) NOT NULL,
  email VARCHAR(200) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL,
  university VARCHAR(100) NOT NULL,
  registration_date TIMESTAMP NOT NULL,
  profile_pic_id VARCHAR(300) NOT NULL DEFAULT 'assets/UserPics/userDefaultProfile.png',
  `status` TINYINT(1) NOT NULL DEFAULT 0
);
CREATE TABLE `conversation` (
  convor_id INT(11) NOT NULL PRIMARY KEY,
  user1_id INT(11),
  user2_id INT(11),
  `timestamp` TIMESTAMP NOT NULL,
  firstuserto_deleteconvo INT(11) TINYINT(1) DEFAULT 0,
  seconduserto_deleteconvo INT(11) TINYINT(1) DEFAULT 0,
  FOREIGN KEY (user1_id) REFERENCES users(user_id),
  FOREIGN KEY (user2_id) REFERENCES users(user_id)
);
CREATE TABLE messages (
  message_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  conversation_id INT(11) NOT NULL,
  sender_id INT(11) NOT NULL,
  receiver_id INT(11) NOT NULL,
  `message` TEXT NOT NULL,
  `timestamp` TIMESTAMP(6) NOT NULL,
  read_status TINYINT(1) DEFAULT 0,
  multimedia_status TINYINT(1) DEFAULT 0,
  FOREIGN KEY (conversation_id) REFERENCES `conversation`(convor_id),
  FOREIGN KEY (sender_id) REFERENCES users(user_id)
);
CREATE TABLE friends (
  friendship_id INT(11) PRIMARY KEY AUTO_INCREMENT,
  user_id INT(11) NOT NULL,
  friend_id INT(11) NOT NULL,
  friend_status TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (user_id, friend_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (friend_id) REFERENCES users(user_id)
);
CREATE TABLE friendship_requests (
  request_id INT(11) PRIMARY KEY AUTO_INCREMENT,
  from_user_id INT(11) NOT NULL,
  to_user_id INT(11) NOT NULL,
  status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
  FOREIGN KEY (from_user_id) REFERENCES users(user_id),
  FOREIGN KEY (to_user_id) REFERENCES users(user_id)
);
CREATE TABLE notification (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  receiver_id INT(11),
  sender_id INT(11),
  message_id INT(11),
  time_stamp TIMESTAMP,
  FOREIGN KEY (receiver_id) REFERENCES users(user_id),
  FOREIGN KEY (sender_id) REFERENCES users(user_id),
  FOREIGN KEY (message_id) REFERENCES messages(message_id)
);