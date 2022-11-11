SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Databáze: `coffe_lmsoft_cz`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `drinks`
--

create database coffe_lmsoft_cz;
use coffe_lmsoft_cz;

CREATE TABLE IF NOT EXISTS `drinks` (
  `ID` int(5) NOT NULL auto_increment,
  `date` date NOT NULL,
  `id_people` int(11) NOT NULL,
  `id_types` int(5) NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `fk_types` (`id_types`),
  KEY `fk_people` (`id_people`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=138 ;

--
-- Vypisuji data pro tabulku `drinks`
--

INSERT INTO `drinks` (`ID`, `date`, `id_people`, `id_types`) VALUES
(11, '2022-09-29', 2, 1),
(12, '2022-09-29', 2, 1),
(13, '2022-09-29', 1, 2),
(14, '2022-09-29', 2, 1),
(15, '2022-09-29', 2, 2),
(16, '2022-09-29', 2, 1),
(17, '2022-09-29', 2, 1),
(18, '2022-09-29', 2, 3),
(19, '2022-09-29', 2, 1),
(20, '2022-09-29', 2, 1),
(21, '2022-09-29', 2, 2),
(22, '2022-09-30', 2, 5),
(23, '2022-09-30', 2, 1),
(24, '2022-09-30', 2, 1),
(25, '2022-09-30', 1, 1),
(26, '2022-10-05', 1, 1),
(27, '2022-10-05', 2, 2),
(28, '2022-10-05', 1, 1),
(29, '2022-10-05', 1, 3),
(30, '2022-10-05', 1, 1),
(31, '2022-10-05', 1, 1),
(32, '2022-10-05', 1, 1),
(33, '2022-10-05', 1, 2),
(34, '2022-10-05', 1, 3),
(35, '2022-10-05', 1, 4),
(36, '2022-10-05', 1, 5),
(37, '2022-10-05', 1, 4),
(38, '2022-10-05', 3, 3),
(39, '2022-10-05', 1, 2),
(40, '2022-10-05', 1, 2),
(41, '2022-10-05', 2, 5),
(42, '2022-10-05', 2, 5),
(43, '2022-10-05', 1, 1),
(44, '2022-10-05', 1, 2),
(45, '2022-10-05', 1, 5),
(46, '2022-10-06', 1, 2),
(47, '2022-10-06', 1, 2),
(48, '2022-10-06', 1, 3),
(49, '2022-10-06', 1, 4),
(50, '2022-10-06', 1, 5),
(51, '2022-10-06', 1, 2),
(52, '2022-10-06', 1, 2),
(53, '2022-10-06', 1, 5),
(54, '2022-10-06', 1, 3),
(55, '2022-10-06', 1, 3),
(56, '2022-10-06', 1, 3),
(57, '2022-10-06', 1, 3),
(58, '2022-10-06', 1, 5),
(59, '2022-10-06', 1, 5),
(60, '2022-10-06', 1, 5),
(61, '2022-10-06', 1, 5),
(62, '2022-10-06', 1, 1),
(63, '2022-10-06', 1, 3),
(64, '2022-10-06', 1, 5),
(65, '2022-10-06', 1, 4),
(66, '2022-10-06', 1, 2),
(67, '2022-10-06', 1, 5),
(68, '2022-10-06', 1, 2),
(69, '2022-10-06', 1, 5),
(70, '2022-10-06', 1, 2),
(71, '2022-10-06', 1, 5),
(72, '2022-10-06', 1, 1),
(73, '2022-10-06', 1, 4),
(74, '2022-10-06', 1, 2),
(75, '2022-10-06', 1, 4),
(76, '2022-10-06', 2, 1),
(77, '2022-10-06', 2, 4),
(78, '2022-10-06', 2, 1),
(79, '2022-10-06', 2, 4),
(80, '2022-10-07', 1, 1),
(81, '2022-10-07', 1, 2),
(82, '2022-10-07', 1, 3),
(83, '2022-10-07', 1, 1),
(84, '2022-10-07', 1, 4),
(85, '2022-10-10', 1, 1),
(86, '2022-10-10', 1, 1),
(87, '2022-10-10', 1, 4),
(88, '2022-10-10', 1, 4),
(89, '2022-10-10', 1, 3),
(90, '2022-10-12', 3, 1),
(91, '2022-10-12', 3, 4),
(92, '2022-10-14', 1, 1),
(93, '2022-10-14', 1, 1),
(94, '2022-10-14', 1, 4),
(95, '2022-10-14', 1, 1),
(96, '2022-10-15', 2, 1),
(97, '2022-10-15', 2, 1),
(98, '2022-10-15', 1, 3),
(99, '2022-10-15', 1, 3),
(100, '2022-10-15', 1, 3),
(101, '2022-10-15', 2, 3),
(102, '2022-10-15', 1, 1),
(103, '2022-10-15', 1, 4),
(104, '2022-10-15', 1, 3),
(105, '2022-10-15', 1, 3),
(106, '2022-10-15', 2, 3),
(107, '2022-10-15', 1, 3),
(108, '2022-10-15', 1, 3),
(109, '2022-10-15', 1, 3),
(110, '2022-10-15', 1, 3),
(111, '2022-10-15', 1, 3),
(112, '2022-10-15', 1, 3),
(113, '2022-10-15', 2, 1),
(114, '2022-10-15', 3, 1),
(115, '2022-10-15', 1, 1),
(116, '2022-10-15', 1, 3),
(117, '2022-10-15', 1, 3),
(118, '2022-10-15', 1, 1),
(119, '2022-10-15', 1, 1),
(120, '2022-10-15', 1, 3),
(121, '2022-10-15', 1, 2),
(122, '2022-10-15', 1, 4),
(123, '2022-10-15', 1, 1),
(124, '2022-10-15', 1, 3),
(125, '2022-10-15', 1, 5),
(126, '2022-10-15', 1, 3),
(127, '2022-10-15', 1, 3),
(128, '2022-10-16', 1, 3),
(129, '2022-10-16', 1, 3),
(130, '2022-10-16', 1, 4),
(131, '2022-10-16', 1, 1),
(132, '2022-10-16', 1, 1),
(133, '2022-10-16', 2, 1),
(134, '2022-10-16', 2, 2),
(135, '2022-10-16', 2, 3),
(136, '2022-10-16', 2, 4),
(137, '2022-10-16', 2, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `ID` int(5) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `people`
--

INSERT INTO `people` (`ID`, `name`, `email`) VALUES
(1, 'Masopust Lukáš', 'masopust@spsejecna.cz'),
(2, 'Molič Jan', 'molic@spsejecna.cz'),
(3, 't', 'e');

-- --------------------------------------------------------

--
-- Struktura tabulky `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `ID` int(5) NOT NULL auto_increment,
  `typ` varchar(50) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `types`
--

INSERT INTO `types` (`ID`, `typ`) VALUES
(1, 'Mléko'),
(2, 'Espresso'),
(3, 'Coffe'),
(4, 'Long'),
(5, 'Doppio+');

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `drinks`
--
ALTER TABLE `drinks`
  ADD CONSTRAINT `fk_people` FOREIGN KEY (`id_people`) REFERENCES `people` (`ID`),
  ADD CONSTRAINT `fk_types` FOREIGN KEY (`id_types`) REFERENCES `types` (`ID`);

select people.name, types.typ, count(drinks.ID) as pocet
from drinks inner join people on drinks.id_people = people.ID 
left join types on drinks.id_types = types.ID
group by people.name, types.typ;

select people.name, types.typ, count(drinks.ID) as pocet, month(date) as mesic
from drinks inner join people on drinks.id_people = people.ID 
inner join types on drinks.id_types = types.ID
where people.ID = 1
group by people.name, types.typ, month(date);

Alter table types
add davky float;

Alter table people
add password varchar(158);

Alter table people
add admin boolean;

UPDATE `coffe_lmsoft_cz`.`types` SET davky = 0.05 WHERE (`ID` = '1');
UPDATE `coffe_lmsoft_cz`.`types` SET `davky` = 0.07 WHERE (`ID` = '2');
UPDATE `coffe_lmsoft_cz`.`types` SET `davky` = '0.14' WHERE (`ID` = '3');
UPDATE `coffe_lmsoft_cz`.`types` SET `davky` = '0.14' WHERE (`ID` = '4');
UPDATE `coffe_lmsoft_cz`.`types` SET `davky` = '0.21' WHERE (`ID` = '5');

create table resetPassword(
id int primary key auto_increment,
docastny_psd varchar(158),
people_id int not null,
constraint people_fk foreign key (people_id) references people(ID),
datum date
);

UPDATE `coffe_lmsoft_cz`.`people` SET `admin` = '0' WHERE (`ID` = '1');
UPDATE `coffe_lmsoft_cz`.`people` SET `admin` = '0' WHERE (`ID` = '2');
UPDATE `coffe_lmsoft_cz`.`people` SET `admin` = '0' WHERE (`ID` = '3');
INSERT INTO `coffe_lmsoft_cz`.`people` (`name`, `email`, `password`, `admin`) VALUES ('coffemaster', 'prokop.svacina@gmail.com', '1234', '1');


