DROP TABLE IF EXISTS monuments;

CREATE TABLE monuments (
    monument_id int(100) unsigned NOT NULL auto_increment,
    monument_name VARCHAR(255) NOT NULL,
    latitude float(10,6) NOT NULL,
    longitude float(10,6) NOT NULL,
    monument_description varchar(255) NOT NULL,
    monument_picture varchar(255) NOT NULL,
    PRIMARY KEY  (monument_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES monuments WRITE;

INSERT INTO monuments (monument_id, monument_name, latitude, longitude, monument_description, monument_picture) VALUES 
    (1, 'Albert Pike Statue', 38.894600, -77.015701, 'This is a test description for the monument', 'albertPikeStatue/image1.png'),
    (2, 'Washington Monument', 38.889500, -77.035301, '*Washington Monument description goes here', 'washingtonMonument/image1.png');
    
UNLOCK TABLES;