CREATE DATABASE beauty;
CREATE USER 'brier' IDENTIFIED BY 'sunnyday';
GRANT ALL ON beauty.* TO 'brier'@'localhost';
USE beauty
CREATE TABLE `clients`
(
 `id`        int NOT NULL AUTO_INCREMENT ,
 `name`      varchar(45) NOT NULL ,
 `telephone` varchar(12) NOT NULL ,

PRIMARY KEY (`id`)
);

CREATE TABLE `visit`
(
 `id`      int NOT NULL AUTO_INCREMENT ,
 `client`  int NOT NULL ,
 `date`    date NOT NULL ,
 `time`    time NOT NULL ,
 `service` varchar(150) NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_13` (`client`),
CONSTRAINT `FK_13` FOREIGN KEY `fkIdx_13` (`client`) REFERENCES `clients` (`id`)
);

INSERT INTO Clients (name, telephone) VALUES
    ('Костенкова Арина', '+79914453421'),
    ('Крылова Анна', '+77813204211'),
    ('Грушко Евгения', '+74916201000');

INSERT INTO Visit (client, date, time, service) VALUES
    (1, '2020-04-13', '09:20', 'Педикюр'),
    (2, '2020-04-17', '14:20', 'Маникюр'),
    (3, '2020-04-20', '11:30', 'Наращивание ногтей'),
    (2, '2020-04-24', '14:20', 'Окрашивание');
