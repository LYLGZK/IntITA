-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-08-14 16:50:40
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table intita.teacher
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `foto_url` varchar(100) NOT NULL DEFAULT 'noname.png',
  `subjects` varchar(100) NOT NULL,
  `profile_text_first` text NOT NULL,
  `profile_text_short` text NOT NULL,
  `profile_text_last` text NOT NULL,
  `readMoreLink` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `rate_knowledge` int(2) NOT NULL,
  `rate_efficiency` int(2) NOT NULL,
  `rate_relations` int(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table intita.teacher: ~11 rows (approximately)
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` (`teacher_id`, `first_name`, `middle_name`, `last_name`, `foto_url`, `subjects`, `profile_text_first`, `profile_text_short`, `profile_text_last`, `readMoreLink`, `email`, `tel`, `skype`, `rate_knowledge`, `rate_efficiency`, `rate_relations`, `user_id`, `rating`) VALUES
	(1, 'Олександра', 'Василівна', 'Сіра', 'teacher1.jpg', 'кройка и шитье сроков; програмування самоубийств', '<p><em></em>Народилася і виросла в Сакраменто, у 18 років вона переїхала до Лос-Анджелеса й незабаром стала\n</p>\n<p>                                викладачем. У 2007, 2008 і 2010 рр.. вона виграла кілька номінацій премії AVN Awards\n</p>\n<p>                                (також була названа «Найкращою програмісткою» у 2007 році за версією XRCO).\n</p>\n<p>                                Паралельно з вікладауцью роботою та роботою програміста в Саша Грей грає головну роль в тестванні Інтернету.<br>\n</p>\n<p>                                Марина Енн Генціс народилася у родині механіка. Її батько мав грецьке походження.\n</p>\n<p>                                Батьки дівчинки розлучилися коли їй було 5 років, надалі її виховувала мати, яка вступила\n</p>\n<p>                                в повторний шлюб у 2000 роц. Марина не ладнала з вітчимом, і, коли їй виповнилося 16 років,\n</p>\n<p>                                дівчина повідомила матері, що збирається покинути будинок. Достеменно невідомо, втекла вона з свого\n</p>\n<p>                    будинку або ж її відпустила мати. Сама Олександра пізніше зізнавалася, що в той час робила все те,\n</p>\n<p>                    що не подобалося її батькам і що вони їй забороняли.<br>\n</p>\n<p>                    Главный бухгалтер акционерного предприятия, специализирующегося на:\n</p>\n<ul>\n	<li>оказании полезных услуг горизонтального характера;</li>\n	<li>торговле, внешнеэкономической и внутреннеэкономической;</li>\n	<li>позитивное обучение швейного мастерства;</li>\n</ul>', '<p>Профессиональный преподаватель бухгалтерского и налогового учета Национальноготранспортного университета кафедры финансов, учета и аудита со стажем преподавательской работы более 25 лет. Закончила аспирантуру, автор 36 научных работ в области учета и аудита, в т.ч. уникальной обучающей методики написания бухгалтерских проводок: <span>"Как украсть и не сесть" </span> и <span>"Как украсть и посадить другого" </span>.</p><p>Главный бухгалтер акционерного предприятия, специализирующегося на:<ul><li>оказании полезных услуг горизонтального характера;</li><li>торговле, внешнеэкономической и внутреннеэкономической;</li><li>позитивное обучение швейного мастерства;</li></ul></p>', '<p>Олександра Сіра <del>виконала гол</del>овну роль у фільмі оскароносного режисера</p><p>                        Стівена Содерберга «Дівчина за викликом»[27][28]. Олександра грає дівчину на ім\'я Челсі, яка надає</p><p>                        ескорт послуги заможним людям. Содерберг взяв її на роль після того, як прочитав статтю про неї у</p><p>                        журналі Los Angeles, коментуючи це так: «She\'s kind of a new breed, I think. She doesn\'t really <del>fit </del></p><p><del><strong>                        the typical mold of someone who goes into the adult film <em>business. … I\'d never heard anybody talk </em></strong></del></p><p><del><em><strong>                        about the business the way that she ta</strong></em></del>lked about it». Журналіст Скотт Маколей каже, що можливо</p><p>                        Грей вибрала саме цю роль через свій інтерес до незалежних режисерів, таких як Жан-Люк Годар,</p><p>                        Хармоні Корін, Девід Гордон Грін, Мікеланджело Антоніоні, Аньєс Варда та Вільям Клейн.</p><p><br>Коли Олександра  готувалася до ролі у «Дівчині за викликом»,</p><p>                        Содерберг попросив її подивитися «Жити своїм життям» і «Божевільний П\'єро»[29].</p><p>                        У фільмі «Жити своїм життям» піднімаються проблеми проституції, звідки Грей могла</p><p>                        взяти щось і для своєї ролі, в той час як у «Божевільному П\'єро» показані відносини,</p><p>                        схожі на ті, що відбуваються між Челсі, її хлопцем і клієнтами.</p>', '/profile/index/?idTeacher=6', 'teacher1@gmail.com', '/067/56-569-56, /093/26-45-65', 'teacher1', 6, 6, 6, 38, 6),
	(2, 'Константин', 'Константинович', 'Константинопольский', 'teacher2.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '<p>Hello!</p>', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы. <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>', '<h2>Hello!</h2>', '/profile/index/?idTeacher=1', 'teacher2@gmail.com', '/067/56-569-56, /093/26-45-65', 'teacher2', 4, 6, 4, 39, 5),
	(3, 'Любовь', 'Анатольевна', 'Ктоятакая-Замухриншская', 'teacher3.jpg', 'Бухгалтер с «О» и до первой отсидки; Программирование своего позитивного прошлого', '', '<p>Практикующий главный бухгалтер. Учредитель ПП <span>«Логика тут безсильна»</span>;</p>\r\n<p>Образование высшее - ДонГУ (1987г.)</p>\r\n<p>Опыт работы 27 лет, в т. ч. преподавания - 9 лет.</p>\r\n<ul><li>специалист по позитивной энергетике;</li><li>эксперт по эффективному ремонту баянов;</li><li>мастер психотерапии для сложных бабушек и дедушек;</li></ul>', '', '/profile/index/?idTeacher=5', 'teacher3@gmail.com', '/067/56-569-56, /093/26-45-65', 'teacher3', 5, 7, 4, 40, 5),
	(4, 'Василий', 'Васильевич', 'Меняетпроффесию', 'teacher4.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы. <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>', '', '/profile/index/?idTeacher=2', 'teacher4@gmail.com', '/067/56-569-56, /093/26-45-65', 'teacher4', 4, 2, 5, 41, 4),
	(5, 'Ия', 'Тожевна', 'Воваяготова', 'teacher5.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы. <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>', '', '/profile/index/?idTeacher=3', 'teacher5@gmail.com', '/067/56-569-56, /093/26-45-65', 'teacher5', 5, 6, 5, 42, 5),
	(6, 'Петросян', 'Петросянович', 'Забугорный', 'teacher6.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '<p>hello!</p>', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы. <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>', '<h3>hello2!</h3>', '/profile/index/?idTeacher=4', 'teacher6@gmail.com', '/067/56-569-56, /093/26-45-65', 'teacher6', 2, 5, 2, 43, 3),
	(8, 'Викладач', 'Викладач', 'Викладач', 'noname.png', '', '', '', '', '', '1111111111111111111111111111111111111111@gmail.com', '', '', 1, 1, 1, 110, 1),
	(9, 'Антон', 'Олексійович', 'Грядченко', 'noname.png', '', '', '', '', '', 'antongriadchenko@gmail.com', '', '', 9, 6, 9, 109, 8),
	(10, 'Ярослав', 'Іванович', 'Плаксій', 'noname.png', '', '', '', '', '', 'yaroslav.plaksii@gmail.com', '', '', 10, 9, 9, 108, 9),
	(11, 'Юрій', 'Ігорович', 'Мітюшкін', 'noname.png', '', '', '', '', '', 'permmemo@gmail.com', '', '', 9, 9, 9, 117, 9),
	(12, 'Михайло', 'Васильович', 'Чухно', 'noname.png', '', '', '', '', '', 'chuhno.mv@gmail.com', '', '', 0, 0, 0, 130, NULL);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
