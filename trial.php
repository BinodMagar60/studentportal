<?php 


CREATE TABLE announcements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    description TEXT,
    user_whom ENUM('everyone', 'teacher', 'student'),
    user_class VARCHAR(10),
    user_section VARCHAR(10),
    target_user_id INT
);
?>