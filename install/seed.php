<?php
require "../config/config.php";
require "../main/database.php";

$db = Database::getConnection();

$query = <<<EOF
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица forum.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_id` int(10) unsigned DEFAULT NULL,
  `comment` text,
  `user_id` mediumint(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_comments_themes` (`theme_id`),
  KEY `FK_comments_users` (`user_id`),
  KEY `created_at` (`created_at`),
  CONSTRAINT `FK_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_comments_themes` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы forum.comments
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
REPLACE INTO `comments` (`id`, `theme_id`, `comment`, `user_id`, `created_at`) VALUES
  (1, 1, 'Я я понимаю значение этого символа.', 2, '2014-09-26 10:03:49'),
  (2, 1, 'Я тоже. И что он значит?', 3, '2014-09-26 10:04:01'),
  (3, 1, 'Он значит многое. А ты сам не знаешь?', 2, '2014-09-26 10:04:17'),
  (4, 1, 'К сожалению, нет. Скажи мне.', 3, '2014-09-26 10:04:36'),
  (5, 1, 'Почему это ты не знаешь сам?', 2, '2014-09-26 10:05:11'),
  (6, 1, 'Ребята, расскажите лучше о значении других символов.', 4, '2014-09-26 10:08:02'),
  (7, 1, 'Сергей, сорри, но это оффтопом будет. Создай новую тему.', 3, '2014-09-26 10:08:40'),
  (8, 1, 'Спасибо, Дон. Создам новую тему о каком-то символе. А как отреагирует сайт этот на такой коммент? Вот: <script>alert(3)</script>', 4, '2014-09-26 10:09:38'),
  (9, 1, 'Да вроде нормально! А как вот на этот? Вот: <script type="text/javascript">alert(555)</script>', 5, '2014-09-26 10:10:26'),
  (10, 1, '<script>alert(1)</script>', 6, '2014-09-26 10:10:57'),
  (11, 1, 'Ребята, вам лучше запретить юзерам использовать в качестве имени символы, кроме букв и пробелов.', 3, '2014-09-26 10:11:51'),
  (12, 1, 'Хорошо, друзья. Мы реализуем эту возможность в ближайшем релизе!', 7, '2014-09-26 10:12:20'),
  (13, 1, 'Это хорошо! Спасибо!', 2, '2014-09-26 10:12:52'),
  (14, 1, 'Рад, что вы читаете наш сайт, Дон!', 1, '2014-09-26 10:13:11'),
  (15, 1, 'Мы добавили этот функционал! Теперь система не дает создавать пользователя с непонятным именем, содержащем символы <, ", \' и т.п.', 7, '2014-09-26 10:51:51'),
  (16, 1, 'Ребята, вам нужно еще добавить защиту, чтобы юзер не мог отправить сообщение с одними пробелами.', 8, '2014-09-26 10:54:00'),
  (17, 1, 'Спасибо, мы это уже реализовали!', 7, '2014-09-26 10:54:20'),
  (18, 6, 'Ребята, кто из вас деплоился на heroku?', 13, '2014-09-26 13:03:13'),
  (19, 6, 'Владимир, я пробовала создать проект на Ruby on Rails. Очень понравилось!', 14, '2014-09-26 13:03:39'),
  (20, 9, 'Ребята, кто из вас использовал в работе Angular?', 12, '2014-09-26 12:11:32'),
  (21, 9, 'Владислав, мне приходилось его использовать. Рекомендую, если применяете пока только jQuery. В любом случае знание этого фронт-енд фреймворка не повредит.', 18, '2014-09-26 12:12:27'),
  (22, 3, 'Обожаю PHP Storm! Спасибо, что сообщили об этом. Буду обновляться!', 19, '2014-09-26 12:13:01'),
  (23, 3, 'Да, я тоже люблю эту IDE!', 17, '2014-09-26 12:13:13'),
  (24, 3, 'О... я тоже! Присоединяюсь к вам. Создатели этого продукта - мега-молодцы!', 4, '2014-09-26 12:13:38'),
  (25, 10, 'Ребята, не плохо было бы поддерживать разрывы строк в комментариях.', 17, '2014-09-26 13:49:45'),
  (26, 10, 'Ольга, спасибо за коммент! Мы работаем над этим.', 20, '2014-09-26 13:50:09'),
  (27, 10, 'Да, это было бы здорово! А то предположим, захочу я опубликовать текст стихотворения: \r\n\r\nНе позволяй душе лениться,\r\nЧтоб воду в ступе не толочь.\r\nДуша обязана трудиться,\r\nИ день и ночь, и день и ночь.\r\n\r\nПри отсутствии разрывов строк тут будет настоящая каша, а не стихотворение.', 21, '2014-09-26 13:51:53'),
  (28, 10, 'Дмитрий, благодаря нашей доработке, теперь комментарии с переносом строк отображаются корректно.', 20, '2014-09-26 13:53:39'),
  (29, 10, 'Ребята, спасибо, теперь комментарии стало читать удобнее!', 17, '2014-09-26 13:54:08'),
  (30, 7, 'Спасибо за статью. Очень актуальна, особенно в период сдачи отчетности.', 17, '2014-09-26 15:11:29'),
  (31, 7, 'Пожалуйста, Ольга! Мы рады, что вам нравится наша статья.', 15, '2014-09-26 15:12:07'),
  (32, 7, 'А будет статья про парсинг .doc-документов?', 17, '2014-09-26 15:12:43'),
  (33, 7, 'Да, Ольга, планирую написать ее в ближайшем времени.', 15, '2014-09-26 15:13:05'),
  (34, 1, 'Мы планируем также написать статью про символ ~, если кому-то это будет интересно.', 20, '2014-09-26 15:14:57'),
  (35, 3, 'Мы тоже в компании используем этот редактор. Удобно!', 20, '2014-09-26 15:15:51');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Дамп структуры для таблица forum.themes
CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments_num` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_themes_users` (`user_id`),
  KEY `created_at` (`created_at`),
  CONSTRAINT `FK_themes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы forum.themes: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
REPLACE INTO `themes` (`id`, `user_id`, `title`, `content`, `created_at`, `comments_num`) VALUES
  (1, 1, 'Значение символа "@"', 'В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. В этой статье мы расскажем о значении символа @ в жизни каждого землянина. ', '2014-09-26 10:03:33', 18),
  (2, 9, 'Что нового в Laravel 5?', 'Несколько месяцев назад в студии, где я работаю, было принято решение всей командой перебраться на Laravel. Последние пару лет популярность этого фреймворка неустанно росла, и, как оказалось, не напрасно!\r\n\r\nЯ не считаю себя гуру в php и фреймворках. До этого пару раз работал с первым и вторым зендом, бессмертным битриксом, сталкивался с Yii и Symphony, изобретал велосипеды сам, но каждый раз у меня оставалось смутное чувство неудовлетворенности.\r\n\r\nНапример, Zend Framework всегда вызывал у меня желание побыстрее выполнить задачу и забыть о нем как о страшном сне. Сторонники этого фреймворка конечно не согласятся со мной, и я ни в коем случае не хочу критиковать их выбор. Каждому свое. У меня Zend Framework всегда вызывал ощущение, что код писался не людьми и не для людей. ', '2014-09-26 12:40:50', 0),
  (3, 8, ' 16 сентября в 03:39 Новый PhpStorm 8: развиваемся вместе.', 'Сегодня мы расскажем о релизе PhpStorm 8 — новой версии IDE для разработки на PHP от JetBrains.\r\n\r\nКак один из ключевых инструментов PHP разработчика, PhpStorm постоянно развивается и оттачивает встроенные инструменты, чтобы пользователи могли следовать последним тенденциям веб-разработок (а иногда и задавать их).\r\n\r\nРелиз PhpStorm 8 упрощает использование многих популярных и активно развивающихся веб-технологий для бэкэнд- и фронтэнд-разработки на протяжении всего жизненного цикла — от прототипирования до развертывания и поддержки.', '2014-09-26 12:41:40', 4),
  (4, 10, 'Увлекательный эксперимент получения Франкенштейна', 'Всем привет. Я — Ден. Работаю PHP Developer в DataArt. Область моих профессиональных интересов — Web Development и Linux. Сегодня я хотел бы поговорить с вами о «скрещивании ежа с ужом». \r\nIntro\r\n\r\nНа первый взгляд может показаться, что это безумство и, в некотором роде, архитектурный костыль. Но, если посмотреть с другой стороны, это один из вариантов выхода из часто встречающейся тупиковой ситуации: заказчик хочет WordPress и ничего другого не признает. Скорее всего, что-то он такое услышал, нагуглил, увидел, посоветовал сосед гуру кодер Джон (ну, или Вася).\r\nА программисты наотрез отказываются натягивать на движок блога, с, мягко говоря, не самой лучшей архитектурой, функционал, допустим, интернет-магазина, форума, и вдобавок — REST API для партнёров этого магазина, и сверху — еще пачку кронов с бизнес-логикой.\r\n\r\nДавайте поставим задачу найти такой выход, чтобы удовлетворить всех участников проблемы, и чтобы наш продукт заводился и нормально работал.\r\n\r\nОдин из вариантов, который я нашел проводя исследование, на эту тему— скрещивание WordPress и Yii.', '2014-09-26 12:42:49', 0),
  (5, 11, 'Парсер BBCode без регулярных выражений', 'Здравствуйте. Хотел бы поделится своим опытом с сообществом Habrahabr. Речь пойдет о разработке не очень сложного парсера BBCode, который преобразует его в HTML. Парсер, который мы будем писать — это типичный конечный автомат.\r\nПрошу не судить слишком строго, так как это мой первый опыт в написании статей на хабре.\r\n\r\nРассмотрим, чем отличаются обработчики BBCode, основанные на регулярных выражениях, от обработчиков, основанных на конечном автомате, а также их плюсы и минусы.\r\n\r\nПарсер на регулярных выражениях:\r\n\r\n+ Прост в написании;\r\n+ Малый объем кода;\r\n— Может некорректно обрабатывать BBCode (при правильном написании обрабатывает корректно);\r\n— Медленно работает (обычно обрабатывает текст в несколько проходов, скорость зависит от объема текста, а также от набора поддерживаемых тегов).\r\n\r\nПарсер на конечном автомате:\r\n\r\n— Трудный в написании;\r\n— Большой объем кода;\r\n+ Обработка BBCode идет строго по матрице состояний;\r\n+ Быстро работает (обрабатывает текст в один проход, скорость зависит только от объема текста).\r\n\r\nНа самом деле парсер на регулярках может работать быстрее, так как это нативная функция php. Но если поддерживаемых тегов много, то конечный автомат будет работать быстрее, так как он практически не зависит от набора тегов.\r\n', '2014-09-26 13:02:15', 0),
  (6, 12, 'Деплой php+MySQL на heroku', 'Всем доброго времени суток. Хочу поделиться с вами своим опытом развертывания php+mysql приложения на сервисе heroku. Если вы первый раз о таком слышите, вам сюда.\r\n\r\nПоехали\r\n\r\nИтак, представим, что у нас есть уже готовое php+mysql приложение. Для начала регистрируемся здесь. На почту придет письмо с подтверждением регистрации. Далее переходим по ссылке, вводим пароль и подтверждение, жмем save. Первый этап пройден, идем дальше.\r\n\r\nПосле успешной регистрации сервис предлагает нам скачать клиент. Естественно, для каждой ОСи свой вариант установки. Далее будем рассматривать пример для UNIX.', '2014-09-26 13:02:49', 2),
  (7, 15, 'Простой экспорт в Excel XLSX', 'Итак, кому интересно, как заполнить XLSX без больших и сложных библиотек, прошу под кат.\r\n\r\nНедавно передо мной возникла задача экспортировать непредсказуемый по размеру объем табличных данных в формате XLSX. Как любой здравомыслящий программист, первым делом полез искать готовые решения.\r\nПочти сразу наткнулся на библиотеку PHPExcel. Мощное решение, с кучей разных функций и возможностей. Порывшись еще немного нашел отзывы программистов о ней. В частности, на форумах встречаются жалобы на скорость работы и отказ работать с большим объемом данных. Отметил библиотеку как один из вариантов решения и начал искать дальше.\r\nНаходил еще несколько библиотек для работы с XLSX, но все они были или забытыми, т.к. не обновлялись по 2-3 года, или обязательно тянули за собой сторонние библиотеки, или использовали DOM для работы с файлами, что мне не очень нравилось. Каждый раз, натыкаясь на очередную библиотеку и изучая механизмы ее работы, ловил себя на мысли, что все это «из пушки по воробьям». Не нужно мне такое сложное решение!\r\nПризнаюсь честно, изучив поверхностно каждое из найденных решений, не стал ставить и тестировать ни одного. Мне нужно было более простое и надежное, как танк, решение.', '2014-09-26 13:04:10', 4),
  (8, 10, 'Заметка про проверку PHP', 'PHP — скриптовый язык программирования общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством хостинг-провайдеров и является одним из лидеров среди языков программирования, применяющихся для создания динамических веб-сайтов.\r\n\r\nВ случае с компиляторами и интерпретаторами к исходному коду и тестированию, как правило, предъявляются повышенные требования качества и надёжности. Тем не менее, в исходном коде интерпретатора PHP нашлись подозрительные места.\r\n\r\nВ данной статье будут рассмотрены результаты проверки интерпретатора PHP, полученные с помощью PVS-Studio 5.18.', '2014-09-26 12:05:27', 0),
  (9, 9, 'Обработка POST запросов AngularJs в Symfony2', 'Использование Symfony2 и AngularJs в связке является хорошей идеей, но есть одна проблема — решение из коробки обладает проблемой в коммуникации. В этом посте будет рассказано о том, как автоматически декодировать JSON-запросы и использовать полученные данные при помощи Request Symfony используя библиотеку symfony-json-request-transformer (на самом деле всего-то один класс).', '2014-09-26 12:06:01', 2),
  (10, 10, 'Интерактивная консоль с автодополнением на PHP', 'В этой маленькой статье я покажу, как использовать в своём PHP-скрипте консоль с автодополнением по нажатию Tab. Из подобных статей на хабре нашёл только статью от CKOPOBAPKuH, и у неё несколько другое направление, хотя суть — та же.\r\n\r\nНа самом деле, никакой магии тут нет, из сложностей — сформулировать для себя, как должна работать ваша консоль. Поэтому минимум слов, минимум кода, только самое необходимое.\r\n\r\nЕсть вопрос: можно ли (и если можно, то как) сделать свою консоль с командами и подсказками на PHP.\r\nЕсть ответ: можно, но соответствующее расширение (readline) для PHP доступно только на Linux, увы.', '2014-09-26 12:06:45', 5),
  (11, 16, 'История одного взлома или чем плохи ftp/ssh-пароли/код в БД', 'Ваш сайт на выделенном сервере? Вы авторизуетесь в ssh по паролю? Вы пользуетесь обычным ftp? А может быть в вашей системе еще и код в БД хранится? Что ж, я расскажу, чем это может быть чревато.\r\n\r\nВ середине июня текущего года ко мне обратился владелец интернет-магазина часов, который заметил в футере своего сайта «левые ссылки», которых там быть не должно и ранее не наблюдалось.\r\n\r\nСайт крутится на одной коммерческой CMS написанной на php, достаточно популярной, но немного (много?) «кривой». Кривость заключается в смешении логики и представления, хранении части кода в бд и последующем исполнении через eval, использовании plain-sql запросов и прочих радостей, «облегчающих» жизнь программистов. Исходный код CMS способен ввергнуть в трепетный ужас даже искушенного кодера: многокилометровые функции с множеством условий не меньшей длины, глобальные переменные, eval-ы и куча других прелестей поджидают заглянувшего сюда смельчака. Несмотря на ужасную программную архитектуру, админка CMS достаточна продумана — создается впечатление, что ТЗ на систему писал профи, а реализовывал студент. Узнали используемую вами CMS? Сочувствую…', '2014-09-26 12:08:57', 0),
  (12, 17, 'Автоматическое определение пола по имени', 'Продолжая рассказывать о технологиях, которые используются в нашем сервисе email-маркетинга Pechkin-mail.ru, мы просто обязаны упомянуть об автоматическом определении пола подписчика по имени. Еще в 2007 году, разрабатывая сервис sms-рассылок, мы очень хотели реализовать возможность автоматического подставления окончаний в прилагательные “Уважаемый”, “Дорогой” и так далее. Обычно такая подстановка осуществляется на основании дополнительного поля в адресной базе клиента. Однако, как нам кажется, это полный отстой.\r\nНа это есть 3 причины:\r\n\r\n    заставлять подписчика задавать свой пол глупо (чем больше полей в форме, тем ниже вероятность ее заполнения)\r\n    определять вручную — долго, а значит дорого\r\n    от ошибок человек не застрахован ровно так же, как и машина.\r\n', '2014-09-26 12:10:20', 0),
  (13, 10, 'Свой сервис скриншотов для спокойного сна', 'Довольно часто в разработке, да и не только, нужно поделиться с кем-нибудь скриншотом. Поэтому удивить кого-либо сервисами Clip2Net, Joxi или Gyazo уже сложно.\r\n\r\nНо есть несколько нюансов, которые могут мешать их использовать. Для меня это реклама или множество мусорной информации вокруг скриншота (например, из какого окна браузера и когда я его сделал — я параноик), десяток кликов до заветной ссылки в браузере и буфере обмена. А хранить свой скриншот с изображением самой важной и сверх секретной информации непонятно где — это вообще непонятно как.\r\n\r\nНужно так: нажал горячую клавишу для прямоугольника или экрана, или для окна с прокруткой и все. Картинка открылась в браузере, а ссылка на нее скопировалась в буфер обмена. Все это на своем хостинге рядом со своими сайтами. Опционально на скриншоте можно еще порисовать разные стрелочки и кружочки.\r\n\r\nЭти задачи отлично решает программка Fast Stone Capture плюс свой FTP, куда можно загружать созданные скриншоты. Но есть нюансы, о которых, если подумать, можно перестать спокойно спать. Под катом рассказываю о нюансах и как их решить, если вам тоже нужны только картинки, только на своем сервере и, чтобы спать спокойно. ', '2014-09-26 12:11:04', 0);
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;


-- Дамп структуры для таблица forum.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы forum.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `created_at`) VALUES
  (1, 'Джонни', '2014-09-26 10:03:33'),
  (2, 'Келли', '2014-09-26 10:03:49'),
  (3, 'Дон', '2014-09-26 10:04:01'),
  (4, 'Сергей', '2014-09-26 10:08:02'),
  (5, 'Хелен', '2014-09-26 10:10:26'),
  (6, '<script>alert(1)</script>', '2014-09-26 10:10:57'),
  (7, 'Пайтон', '2014-09-26 10:12:20'),
  (8, 'Петр', '2014-09-26 10:54:00'),
  (9, 'Денис', '2014-09-26 12:40:50'),
  (10, 'Ден', '2014-09-26 12:42:49'),
  (11, 'Леонардо', '2014-09-26 13:02:15'),
  (12, 'Владислав', '2014-09-26 13:02:49'),
  (13, 'Владимир', '2014-09-26 13:03:13'),
  (14, 'Светлана', '2014-09-26 13:03:39'),
  (15, 'Оксана', '2014-09-26 13:04:09'),
  (16, 'Лера Коновалова', '2014-09-26 12:08:57'),
  (17, 'Ольга', '2014-09-26 12:10:20'),
  (18, 'Георгий', '2014-09-26 12:12:27'),
  (19, 'Николай', '2014-09-26 12:13:01'),
  (20, 'Дэн', '2014-09-26 13:50:09'),
  (21, 'Дмитрий', '2014-09-26 13:51:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
EOF;

$stmt = $db->query($query);

if ($stmt) {
  echo 'Тестовые данные успешно загружены.';
}
