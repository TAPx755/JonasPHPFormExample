Drop Database if exists dbJonas;
Create Database if not exists dbJonas;
Use dbJonas;

CREATE TABLE tbl_article (
                        art_ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        art_grp varchar(256) NULL,
                        art_nr int NULL UNIQUE,
                        art_bez varchar(256) NULL,
                        art_vk decimal NULL,
                        art_ek decimal NULL,
                        art_quantityAv int NULL
);

CREATE TABLE tbl_booking (
                           booking_Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                           art_nr int NOT NULL,
                           booking_amount int NOT NULL,
                           booking_date DATE NOT NULL

);




