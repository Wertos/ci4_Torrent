--
-- PostgreSQL database dump
--

-- Dumped from database version 17.5
-- Dumped by pg_dump version 17.5

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: admin_log; Type: TABLE DATA; Schema: public; Owner: torrent
--



--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: torrent
--

INSERT INTO public.users VALUES (1, 'Wertos', NULL, NULL, NULL, '2025-08-26 14:26:07', '2025-08-26 16:35:24', NULL, '1.webp', 'Евгений', 'Малахов', '1978-10-11', 1);
INSERT INTO public.users VALUES (3, 'Boltic', NULL, NULL, NULL, '2025-08-26 22:53:25', '2025-08-26 22:57:55', NULL, NULL, '', '', '1999-08-06', 1);


--
-- Data for Name: auth_groups_users; Type: TABLE DATA; Schema: public; Owner: torrent
--

INSERT INTO public.auth_groups_users VALUES (1, 1, 'superadmin', '2025-08-26 14:26:08');
INSERT INTO public.auth_groups_users VALUES (2, 3, 'user', '2025-08-26 22:53:25');
INSERT INTO public.auth_groups_users VALUES (3, 3, 'uploader', '2025-08-26 22:58:44');


--
-- Data for Name: auth_identities; Type: TABLE DATA; Schema: public; Owner: torrent
--

INSERT INTO public.auth_identities VALUES (4, 3, 'email_password', NULL, 'tutaew@yandex.ru', '$2y$12$CyHZKL.Xm3xkd0kwBBvGVOdXcTPTXJ/HYkcLRc8NL7aWev9WCuAy.', NULL, NULL, '2025-08-26 22:57:19', '2025-08-26 22:53:25', '2025-08-26 22:57:19', 0);
INSERT INTO public.auth_identities VALUES (1, 1, 'email_password', NULL, 'tutaew@ya.ru', '$2y$12$J8b6gb7V8ex1pWqIokSmdOgqV2v0f3zA1PPNI2IsSZFFxj.DicJay', NULL, NULL, '2025-08-26 22:58:19', '2025-08-26 14:26:08', '2025-08-26 22:58:19', 0);


--
-- Data for Name: auth_logins; Type: TABLE DATA; Schema: public; Owner: torrent
--

INSERT INTO public.auth_logins VALUES (1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', 'email_password', 'tutaew@ya.ru', 1, '2025-08-26 14:27:16', 1);
INSERT INTO public.auth_logins VALUES (2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', 'email_password', 'tutaew@ya.ru', 1, '2025-08-26 15:16:51', 1);
INSERT INTO public.auth_logins VALUES (3, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', 'email_password', 'tutaew@yandex.ru', 3, '2025-08-26 22:54:20', 1);
INSERT INTO public.auth_logins VALUES (4, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 OPR/120.0.0.0', 'email_password', 'tutaew@ya.ru', 1, '2025-08-26 22:58:19', 1);


--
-- Data for Name: auth_permissions_users; Type: TABLE DATA; Schema: public; Owner: torrent
--



--
-- Data for Name: auth_remember_tokens; Type: TABLE DATA; Schema: public; Owner: torrent
--

INSERT INTO public.auth_remember_tokens VALUES (4, 'e958bf60f03a4f012afc1a23', '1812e564127da4420fa079058da4627aa6621b7232bb704c092d1ec728e1dd8b', 1, '2025-09-25 22:58:19', '2025-08-26 22:58:19', '2025-08-26 22:58:19');


--
-- Data for Name: auth_token_logins; Type: TABLE DATA; Schema: public; Owner: torrent
--



--
-- Data for Name: bookmarks; Type: TABLE DATA; Schema: public; Owner: torrent
--



--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: torrent
--

INSERT INTO public.categories VALUES (1, 0, 'Зарубежные фильмы', 'Зарубежные фильмы', 0, 'zarubeznye-filmy', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (2, 1, 'Наши фильмы', 'Наши фильмы', 0, 'nasi-filmy', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (3, 2, 'Зарубежные сериалы', 'Зарубежные сериалы', 0, 'zarubeznye-serialy', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (4, 3, 'Наши сериалы', 'Наши сериалы', 0, 'nasi-serialy', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (5, 4, 'Телевизор', 'Телевизор', 0, 'televizor', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (6, 5, 'Мультипликация', 'Мультипликация', 0, 'multiplikacia', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (7, 6, 'Аниме', 'Аниме', 0, 'anime', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (8, 7, 'Музыка', 'Музыка', 0, 'muzyka', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (9, 8, 'Игры', 'Игры', 0, 'igry', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (10, 9, 'Софт', 'Софт', 0, 'soft', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (11, 10, 'Книги', 'Книги', 0, 'knigi', '', NULL, NULL, NULL);
INSERT INTO public.categories VALUES (12, 11, 'Другое', 'Другое', 0, 'drugoe', '', NULL, NULL, NULL);


--
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: torrent
--



--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: torrent
--



--
-- Data for Name: news; Type: TABLE DATA; Schema: public; Owner: torrent
--



--
-- Data for Name: reports; Type: TABLE DATA; Schema: public; Owner: torrent
--



--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: torrent
--

INSERT INTO public.sessions VALUES ('ci_session:4b7226f429bf8b94a478219605b203b0', '::1', '2025-08-27 09:45:06.200032', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237373130363b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a32363a22687474703a2f2f746f72722e77732f746f7272656e742f616464223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:bc6e556e37060b134d7491257544fad6', '::1', '2025-08-27 09:50:16.996751', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237373431363b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a31353a22687474703a2f2f746f72722e77732f223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:d48403954c1433990de7dcdc58150041', '::1', '2025-08-27 07:33:51.004606', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363236393233313b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a31353a22687474703a2f2f746f72722e77732f223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:ac83f07c22bbeb65937036f398c1cff5', '::1', '2025-08-27 10:03:06.715941', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237383138363b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a32363a22687474703a2f2f746f72722e77732f746f7272656e742f616464223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:dce139f3d693bb1b6de8f07197f6a433', '::1', '2025-08-27 08:26:17.524101', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237323337373b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a31353a22687474703a2f2f746f72722e77732f223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:8c6ebbd2d1cda66ca09435e5f2a1d6c7', '::1', '2025-08-27 08:44:09.564689', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237333434393b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a32353a22687474703a2f2f746f72722e77732f6e6173692d66696c6d79223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:df54b67c4a56eb226e08e73bcb7828df', '::1', '2025-08-27 08:59:03.221302', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237343334333b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a31353a22687474703a2f2f746f72722e77732f223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:1d4cfabd27a860c6bf5f29eb9ceea69f', '::1', '2025-08-27 10:21:41.168057', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237393330313b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a31353a22687474703a2f2f746f72722e77732f223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:cf2a51f38a39321f197a24fc53249516', '::1', '2025-08-27 10:28:41.731944', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237393639333b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a31353a22687474703a2f2f746f72722e77732f223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:f5695c4059e287271e72dfaff4ec2433', '::1', '2025-08-27 07:41:30.118123', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363236393639303b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a31353a22687474703a2f2f746f72722e77732f223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:bbd2917649ce51cb9c1ab511de1073ab', '::1', '2025-08-27 09:57:17.634785', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237373833373b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a32363a22687474703a2f2f746f72722e77732f746f7272656e742f616464223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:99e6d05d3148c76427eb399651fd14cd', '::1', '2025-08-27 08:37:05.094814', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237333032353b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a32303a22687474703a2f2f746f72722e77732f61646d696e223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:8d7f8213f05ec4fd490a9038999ba7c3', '::1', '2025-08-27 08:50:55.117288', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237333835353b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a32353a22687474703a2f2f746f72722e77732f6e6173692d66696c6d79223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:1ec1f1514df599664aa17b3de8193be6', '::1', '2025-08-27 09:38:39.493945', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237363731393b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a31353a22687474703a2f2f746f72722e77732f223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:9dd217ab87606a435d4a430437e0c4f7', '::1', '2025-08-27 10:16:36.311552', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237383939363b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a31353a22687474703a2f2f746f72722e77732f223b757365727c613a313a7b733a323a226964223b693a313b7d');
INSERT INTO public.sessions VALUES ('ci_session:3b11abad91afa6b3ddcfb84559ac7ba4', '::1', '2025-08-27 10:28:13.714225', '\x5f5f63695f6c6173745f726567656e65726174657c693a313735363237393639333b637372665f746573745f6e616d657c733a33323a223339666366303439333038353232643132356463323733336165666239626663223b5f63695f70726576696f75735f75726c7c733a32363a22687474703a2f2f746f72722e77732f746f7272656e742f616464223b757365727c613a313a7b733a323a226964223b693a313b7d');


--
-- Data for Name: settings; Type: TABLE DATA; Schema: public; Owner: torrent
--



--
-- Data for Name: torrents; Type: TABLE DATA; Schema: public; Owner: torrent
--

INSERT INTO public.torrents VALUES (10, 1, '\x498b38ab4341ef8a4dc82926eaca3dd23b44baa3', NULL, 1, 3973101748, 0, 'Каруза (2025) WEB-DL 1080p', '[b]Оригинальное название[/b]: Каруза
[b]Год выпуска[/b]: 2025
[b]Жанр[/b]: военный, драма, семейный, история
[b]Выпущено[/b]: Россия / Мирфильм
[b]Режиссер[/b]: Иван Харатьян
[b]В ролях[/b]: Светлана Иванова, Марк-Малик Мурашкин, Александр Балуев, Иван Колесников, Мария Абрамова, Константин Адаев, Сергей Мигицко, Светлана Смирнова-Марцинкевич, Андрей Харыбин, Дмитрий Харатьян

[b]Описание[/b]: [i]1939 год. В жизни маленького Мити однажды появляется верный друг — собака по имени Каруза. Но счастье рушится, когда начинается война. Ленинград оказывается в блокаде, люди умирают от голода. Тогда Каруза, теперь уже взрослая, сильная и умная собака начинает добывать для жителей еду. Воодушевленный её смелостью, Митя решает помочь: вместе они смогут найти больше. Но однажды во время опасной вылазки их обнаруживают немцы.[/i]

 [b]Продолжительность[/b]: 01:32:29
[b]Субтитры[/b]: Отсутствуют

[b]Формат[/b]: MKV
[b]Качество[/b]: WEB-DL 1080p
[b]Видео[/b]: AVC/H.264, 1920x804, ~5000 Kbps
[b]Аудио 1[/b]: AC3, 6 ch, 384 Kbps
[b]Аудио 2[/b]: E-AC3, 6 ch, 384 Kbps

[spoiler][URL=https://imageban.ru/show/2025/08/07/7a1d7d12940355d4c06ea070d0463913/png][IMG]https://i8.imageban.ru/thumbs/2025.08.07/7a1d7d12940355d4c06ea070d0463913.png[/IMG][/URL][URL=https://imageban.ru/show/2025/08/07/72c836c164abf9ff987623da84854ac4/png][IMG]https://i3.imageban.ru/thumbs/2025.08.07/72c836c164abf9ff987623da84854ac4.png[/IMG][/URL][URL=https://imageban.ru/show/2025/08/07/506e32f5b1b63fff6905a1a16377a744/png][IMG]https://i3.imageban.ru/thumbs/2025.08.07/506e32f5b1b63fff6905a1a16377a744.png[/IMG][/URL][/spoiler]', 2, '2025-08-26 19:42:40', NULL, NULL, 'https://i3.imageban.ru/out/2025/08/07/3c823b26e2f0a350d40a2dd0e6ae143a.jpg', 'magnet:?xt=urn:btih:498b38ab4341ef8a4dc82926eaca3dd23b44baa3&dn=Karuza.2025.WEB-DL.1080p.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=udp%3A%2F%2Fopentracker.i2p.rocks%3A6969%2Fannounce&tr=http%3A%2F%2Fbt02.nnm-club.cc%3A2710%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=http%3A%2F%2Fbt4.t-ru.org%2Fann&tr=http%3A%2F%2Fbt3.t-ru.org%2Fann&tr=http%3A%2F%2Fbt2.t-ru.org%2Fann&tr=http%3A%2F%2Fbt.t-ru.org%2Fann&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'karuza-2025-web-dl-1080p', 0, 1, 1, 1, 0, '1756226560_c83110cee0eaeae73da3.torrent', 1, 255, 25, 4743, '2025-08-26 19:42:42', 1);
INSERT INTO public.torrents VALUES (1, 1, '\x59eace2307de81f0a3ec8675559bea5a087754ea', NULL, 1, 2048216504, 0, 'Одно целое / Together (2025) WEB-DLRip-AVC от DoMiNo & селезень | P | HDRezka Studio', '[b]Название[/b]: Одно целое
[b]Оригинальное название[/b]: Together
[b]Год выпуска[/b]: 2025
[b]Режиссер[/b]: Майкл Шенкс / Michael Shanks
[b]Жанр[/b]: ужасы
[b]В ролях[/b]: Дэйв Франко, Элисон Бри, Дэймон Херриман, Миа Мориссей, Карл Ричмонд, Джек Кенни, Франческа Уотерс, Элин Абелла, Роб Браун, Эллора Айрис

[b]О фильме[/b]: [i]После переезда в уединённый загородный дом пара, переживающая кризис в отношениях, сталкивается с необъяснимым явлением: их тела начинают тянуться друг к другу с пугающей силой. Чтобы спастись, им предстоит раскрыть тайну этого места, прежде чем они сольются в одно целое.[/i]

[b]Страна[/b]: Австралия, США
[b]Студия[/b]: 1.213, 30West, Picturestart, Princess Pictures, Tango Entertainment (III)
[b]Продолжительность[/b]: 01:41:57
[b]Перевод[/b]: Профессиональный (многоголосый закадровый) | HDRezka Studio
[b]Субтитры[/b]: Русские (Forced, Full 18+), Английские (Full, SDH)

[b]Формат[/b]: Matroska
[b]Качество[/b]: WEB-DLRip-AVC
[b]Видео[/b]: 1024x552 at 23.976 fps, x264@L4.1, ~2100 kb/s
[b]Аудио 1[/b]: AC3, 2 ch, ~192 kb/s - | Русский | 
[b]Аудио 2[/b]: AC3, 6 ch, ~384 kb/s - | Английский | 
[b]Формат субтитров[/b]: softsub (SRT)

[spoiler][url=https://lostpix.com/?v=2025-08-26_i7rac35nzkiby732opowlc30m.png][img]https://lostpix.com/thumbs/2025-08/26/i7rac35nzkiby732opowlc30m.png[/img][/url][url=https://lostpix.com/?v=2025-08-26_6l3k27sgbel5mrgyfemn7bd5k.png][img]https://lostpix.com/thumbs/2025-08/26/6l3k27sgbel5mrgyfemn7bd5k.png[/img][/url][url=https://lostpix.com/?v=2025-08-26_wreyzi0qenqp14jgoro6i6cz8.png][img]https://lostpix.com/thumbs/2025-08/26/wreyzi0qenqp14jgoro6i6cz8.png[/img][/url][url=https://lostpix.com/?v=2025-08-26_65p6eq2x1gy26afc3f3edq9f9.png][img]https://lostpix.com/thumbs/2025-08/26/65p6eq2x1gy26afc3f3edq9f9.png[/img][/url][/spoiler]', 1, '2025-08-26 16:44:01', NULL, NULL, 'https://i125.fastpic.org/big/2025/0826/42/405654d58064090217c80d64d77b3f42.jpg', 'magnet:?xt=urn:btih:59eace2307de81f0a3ec8675559bea5a087754ea&dn=Together.2025.MVO.WEB-DLRip.x264.seleZen.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=https%3A%2F%2Ftracker.lilithraws.org%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.yemekyedim.com%3A443%2Fannounce&tr=https%3A%2F%2Ftrackers.mlsub.net%3A443%2Fannounce&tr=http%3A%2F%2Fbt.desol.one%3A2710%2Fannounce&tr=http%3A%2F%2Fbt.okmp3.ru%3A2710%2Fannounce&tr=http%3A%2F%2Ftracker.bt4g.com%3A2095%2Fannounce&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce', 'odno-celoe-together-2025-web-dlrip-avc-ot-domino-selezen-p-hdrezka-studio', 0, 1, 1, 3, 0, '1756215841_89b1a1df8c663b5cea81.torrent', 1, 133, 138, 89, '2025-08-26 16:44:17', 1);
INSERT INTO public.torrents VALUES (11, 1, '\xc8729a24794415b83966b58d8a4371e00630b068', '\x6e0f2cc9a29ce79da7b5a7a8507ee48a87190b60c1058544c2af949f6cdd23e4', 2, 3124971854, 0, 'Мэр поневоле (2025) WEB-DLRip-AVC от ExKinoRay', '[b]Название[/b]: Мэр поневоле
[b]Год выпуска[/b]: 2025
[b]Жанр[/b]: Комедия
[b]Режиссер[/b]: Радда Новикова
[b]В ролях[/b]: Яна Кошкина, Ян Цапник, Кирилл Нагиев, Александра Емельянова, Екатерина Кабак, Татьяна Догилева, Константин Карасик, Сергей Фролов, Артур Ваха, Вадим Салахов

[b]О фильме[/b]: [i]Мэр города Николай Николаевич представляет своего нового зама. Крупного специалиста, которого он переманил из столицы. В администрации никто и не догадывается, что еще неделю назад Катерина Петровна была текила-герл. После серьёзного разговора с местным авторитетом, мэр выпивает лишнего и впадает в кому. Теперь, Катрин — исполняющая обязанности мэра, так решил тот самый авторитет. Катрин планирует просто наслаждаться жизнью в новом статусе, но все меняет знакомство с Сергеем — молодым врачом, который любит свое дело и свой Лисьегорск. Возникшие чувства к Сергею мотивируют Катрин вплотную заняться провинциальным городом и сделать его хоть немного похожим на столицу.[/i]

[b]Выпущено[/b]: Россия
[b]Студия[/b]: МайВэйСтудия, ТНТ
[b]Продолжительность[/b]: 01:24:38
[b]Перевод[/b]: Не требуется

[b]Формат[/b]: MKV
[b]Качество[/b]: WEB-DLRip-AVC
[b]Видео[/b]: MPEG-4 AVC, 1024x576, 2268 Кбит/с
[b]Аудио[/b]:  AC3, 2 ch, 192 Кбит/с
[b]Субтитры[/b]: Русские

[spoiler][URL=https://imageban.ru/show/2025/07/25/33ed2059e73e14ad18eef8ef181f9756/png][IMG]https://i8.imageban.ru/thumbs/2025.07.25/33ed2059e73e14ad18eef8ef181f9756.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/25/387b3379b52ca541366b72daef15fed7/png][IMG]https://i2.imageban.ru/thumbs/2025.07.25/387b3379b52ca541366b72daef15fed7.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/25/58927abc3009c46b51ac8601d49b7575/png][IMG]https://i3.imageban.ru/thumbs/2025.07.25/58927abc3009c46b51ac8601d49b7575.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/25/214c60ae05cce73e30ccb90f72853009/png][IMG]https://i4.imageban.ru/thumbs/2025.07.25/214c60ae05cce73e30ccb90f72853009.png[/IMG][/URL][/spoiler]', 2, '2025-08-26 19:45:16', NULL, NULL, 'https://i4.imageban.ru/out/2025/07/25/65cad2c18c4b3e37443a7fc52c6b1c50.jpg', 'magnet:?xt=urn:btih:c8729a24794415b83966b58d8a4371e00630b068&xt=urn:btmh:12206e0f2cc9a29ce79da7b5a7a8507ee48a87190b60c1058544c2af949f6cdd23e4&dn=Mer.ponevole.2025.WEB-DLRip-AVC.ExKinoRay.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Fbt.rutor.info%3A2710&tr=udp%3A%2F%2Fbt.megapeer.org%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'mer-ponevole-2025-web-dlrip-avc-ot-exkinoray', 0, 1, 1, 5, 0, '1756226716_f60e198d2a3c8cbdc0e5.torrent', 3, 16, 3, 297, '2025-08-26 22:25:59', 1);
INSERT INTO public.torrents VALUES (12, 1, '\x21f50bdc1e0adbc87900d6b7bbb5caacaead0dbf', NULL, 1, 3711962885, 0, 'Больше чем футбол (2025) WEBRip 1080p', '[b]Производство[/b]: Россия / Драйв
[b]Жанр[/b]: комедия, спорт, драма

[b]Режиссер[/b]: Виктор Демент
Актеры: Алексей Воробьёв, Иван Охлобыстин, Александр Самойленко, Роман Мадянов, Алексей Гуськов, Люся Чеботина, Марина Ворожищева, Дмитрий Павленко, Валерия Федорович, Иван Алексеев

[b]Описание[/b]: [i]На Кубок Европы по футболу вместо дисквалифицированной из-за очередной выходки фанатов сборной Англии едет ранее вылетевшая и расформированная сборная России. У Федерации футбола России есть всего две недели, чтобы собрать команду. К этой задаче привлекают самую скандальную фигуру отечественного футбола — тренера Сорокина, который приглашает в сборную футболистов, по тем или иным причинам оказавшихся в ранге «сбитых лётчиков»: двое находятся под следствием из-за драки, ещё один переживает громкий развод, а кто-то «сидит на банке» из-за характера. Возвращается в сборную и главная звезда — Иванов. И делает он это из-за дочери: девочка тяжело болеет, но ей становится лучше, когда наша команда выигрывает, и наоборот — хуже, если проигрывает. Несмотря на то, что в начале каждый из футболистов преследует свои цели, в процессе развития сюжета они объединяются и начинают бороться за жизнь маленькой девочки Даши.[/i]

[b]Продолжительность[/b]: 01:46:10
[b]Перевод[/b]: Не требуется (русский)
[b]Субтитры[/b]: отсутствуют

[b]Качество[/b]: WEBRip 1080p
[b]Формат[/b]: MKV
[b]Видео[/b]: AVC/H.264, 1920@1949x816, ~4500 Kbps
[b]Аудио[/b]: AAC, 2 ch, 192 Kbps - русский

[spoiler][url=https://ibb.co/NdVL1Mhy][img]https://i.ibb.co/NdVL1Mhy/9826be556f68bdf737e5ae373d36550b.jpg[/img][/url][url=https://ibb.co/RpCQn68t][img]https://i.ibb.co/RpCQn68t/52e2416a42d53c47e526fd78b5a11c9e.jpg[/img][/url][url=https://ibb.co/MkWJ0hP4][img]https://i.ibb.co/MkWJ0hP4/850934ed0e13ba1f01bb51d82519be95.jpg[/img][/url][/spoiler]', 2, '2025-08-26 19:49:21', NULL, NULL, 'https://i7.imageban.ru/out/2025/07/26/128c4eff6a73f6b8e7d46af1789fba2f.jpg', 'magnet:?xt=urn:btih:21f50bdc1e0adbc87900d6b7bbb5caacaead0dbf&dn=Bol%27she%20chem%20futbol%20.2025.WEB-DL.1080p.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'bolse-cem-futbol-2025-webrip-1080p', 0, 1, 1, 1, 0, '1756226961_830ed2c3e8732eadadff.torrent', 1, 199, 18, 6831, '2025-08-26 19:49:27', 1);
INSERT INTO public.torrents VALUES (13, 1, '\xe10a00dd2f9a8aa253a0f764f9483a8d9d26e9f9', NULL, 1, 23433256745, 0, 'Тайна красной планеты / Mars Needs Moms (2011) Blu-Ray Remux 1080p | D', '[b]Название[/b]: Тайна красной планеты
[b]Оригинальное название[/b]: Mars Needs Moms
[b]Год выпуска[/b]: 2011
[b]Жанр[/b]: Мультфильм, фантастика, боевик, комедия, приключения, семейный
[b]Выпущено[/b]: США, ImageMovers, Walt Disney Productions
[b]Режиссер[/b]: Саймон Уэллс
[b]В ролях[/b]: Сет Грин, Джоан Кьюсак, Брекин Мейер, Элизабет Арнуа, Дэн Фоглер, Билли Ди Уильямс, Мелинда Стерлинг, Райан Очоа, Жаки Барнбрук, Джулин Рени, Мэттью Сенрейч, Мэттью Вульф, Рэймонд Очоа, Роберт Очоа, Эмбер Гейни Миде, Кевин Кахун, Адам Дженнингс, Керстен Мур, Гэвин Брайсон Томпсон, Мэттью Хенерсон, Том Эверетт Скотт, Стивен Кеарин, Аарон Рэпк, Мередит Уэллс, Тиган Уэллс, Сет Роберт Даски, Джо МакГинли, Дэн О’Коннор, Эди Паттерсон

[b]О фильме[/b]: [i]Есть мерзкую брокколи, выносить мусор, рано ложиться спать - кому вообще нужны мамы, заставляющие это делать? Так думал Майло, пока не обнаружил, что его маму похитили марсиане. Тут-то и оказалось, что ему предстоит отправиться на другую планету, чтобы найти маму и вернуть ее домой.[/i]

[b]Качество[/b]: Blu-Ray Remux (1080p)
[b]Видео[/b]: Video: MPEG-4 AVC Video / 30001 kbps / 1080p / 23.976 fps / 16:9 / High Profile 4.1
[b]Аудио 1[/b]: Russian: 48 kHz, AC3, 3/2 (L,C,R,l,r) + LFE ch, ~384.00 kbps avg
[b]Аудио 2[/b]: Ukrainian:48 kHz, AC3, 3/2 (L,C,R,l,r) + LFE ch, ~384.00 kbps avg
[b]Аудио 3[/b]: English / DTS-HD Master Audio / 7.1 / 48 kHz / 5747 kbps / 24-bit (DTS Core: 5.1 / 48 kHz / 1509 kbps / 24-bit)
[b]Аудио 4[/b]: English: 48 kHz, AC3, 2/0 (L,R) ch, ~320.00 kbps avg |Commentary|
[b]Чаптеры[/b]: есть[/size]

[url][URL=https://fastpic.org/view/125/2025/0628/_bd1f4569696ade1ddaf5d430a5ca6dc5.png.html][IMG]https://i125.fastpic.org/thumb/2025/0628/c5/_bd1f4569696ade1ddaf5d430a5ca6dc5.jpeg[/IMG][/URL][URL=https://fastpic.org/view/125/2025/0628/_7e6c9bf59db4a86c99fb8138ee0a24fe.png.html][IMG]https://i125.fastpic.org/thumb/2025/0628/fe/_7e6c9bf59db4a86c99fb8138ee0a24fe.jpeg[/IMG][/URL][URL=https://fastpic.org/view/125/2025/0628/_26616135f082730ec4cb2a38d17c744b.png.html][IMG]https://i125.fastpic.org/thumb/2025/0628/4b/_26616135f082730ec4cb2a38d17c744b.jpeg[/IMG][/URL][URL=https://fastpic.org/view/125/2025/0628/_878c4af482c7bf2b18f55cb2a782e26e.png.html][IMG]https://i125.fastpic.org/thumb/2025/0628/6e/_878c4af482c7bf2b18f55cb2a782e26e.jpeg[/IMG][/URL][/url]', 6, '2025-08-26 19:53:16', NULL, NULL, 'https://i125.fastpic.org/big/2025/0628/4d/c7dc4cb52b4c08b89653b507ee72974d.png', 'magnet:?xt=urn:btih:e10a00dd2f9a8aa253a0f764f9483a8d9d26e9f9&dn=Mars%20Needs%20Moms%20BDRemux%201080p.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fbt2.t-ru.org%2Fann%3Fpk%3De64a41932ddf7942e98d408329a0ecea&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'tajna-krasnoj-planety-mars-needs-moms-2011-blu-ray-remux-1080p-d', 0, 1, 1, 1, 0, '1756227196_b84cd0e80fd83214fd6a.torrent', 1, 3, 0, 14, '2025-08-26 19:53:18', 1);
INSERT INTO public.torrents VALUES (15, 1, '\x5037a0ed58e360a9cbf7e14e07fa7f6aebac9931', NULL, 1, 13560707338, 0, 'Головоломка 2 / Inside Out 2 (2024) WEB-DLRip 1080p | D, P', '[b]Страна[/b]: США
[b]Студия[/b]: Pixar Animation Studios, Walt Disney Studios Motion Pictures
[b]Жанр[/b]: мультфильм, комедия, семейный, фэнтези
[b]Год выпуска[/b]: 2024
[b]Продолжительность[/b]: 01:36:20

[b]Перевод 1[/b]: Дублированный (официальный) - MovieDalen
[b]Перевод 2[/b]: Дублированный (неофициальный) - TVShows
[b]Перевод 3[/b]: Профессиональный (многоголосый закадровый) - LostFilm
[b]Перевод 4[/b]: Профессиональный (многоголосый закадровый) - HDrezka Studio
[b]Перевод 5[/b] (украинский): Дублированный (официальный) - LeDoyen

[b]Субтитры[/b]: русские (Forced, Full |iTunes|), английские (Full, SDH), арабские, азербайджанские, болгарские, китайские, французские, немецкие, иврит, итальянские, польские, португальские, румынские, испанские, шведские, турецкие, украинские (Forced, Full)
[b]Оригинальная аудиодорожка[/b]: английский

[b]Режиссер[/b]: Келси Манн / Kelsey Mann
[b]Роли озвучивали[/b]: Эми Полер, Майя Хоук, Кенсингтон Таллман, Лиза Лапира, Тони Хейл, Льюис Блэк, Филлис Смит, Айо Эдебири, Лилимар, Грэйс Лу, Сумайя Нуриддин-Грин, Адель Экзаркопулос, Дайан Лэйн, Кайл Маклоклен, Пол Уолтер Хаузер

[b]Описание[/b]: [i]Райли уже подросток, и штаб-квартира в её мозгу подвергается капитальному ремонту, чтобы дать место новым эмоциям. Радость, Грусть, Гнев, Страх и Отвращение никак не ожидали появления Тревожности, Зависти, Смущения и Скуки. Райли с двумя лучшими подругами отправляется в хоккейный лагерь, где у неё появляется шанс попасть в команду старшей школы, и Радость уверена, что лучше всех знает, что делать в данной ситуации. Так же считает и Тревожность.[/i]

[b]Тип релиза[/b]: WEB-DLRip 1080p
[b]Контейнер[/b]: MKV (Сэмпл)

[b]Видео[/b]: MPEG-4 AVC, 1920x804 (2.39:1), 24 fps, 15.4 mbps
[b]Аудио 1[/b]: RUS AC-3, 5.1, 48 kHz, 384 kbps
[b]Аудио 2[/b]: RUS AC-3, 5.1, 48 kHz, 640 kbps
[b]Аудио 3[/b]: RUS E-AC-3, 5.1, 48 kHz, 768 kbps
[b]Аудио 4[/b]: RUS AC-3, 2.0, 48 kHz, 384 kbps
[b]Аудио 5[/b]: UKR AC-3, 5.1, 48 kHz, 384 kbps
[b]Аудио 6[/b]: ENG E-AC-3 JOC, 5.1, 48 kHz, 768 kbps
[b]Формат субтитров[/b]: softsub (SRT)
[b]Навигация по главам[/b]: есть', 6, '2025-08-26 19:57:46', NULL, NULL, 'http://i123.fastpic.org/big/2024/0819/30/67a7f8641f8a7e4a2d05b95a6aa92a30.jpg', 'magnet:?xt=urn:btih:5037a0ed58e360a9cbf7e14e07fa7f6aebac9931&dn=Inside.Out.2.2024.1080p.MA.WEB-DLRip.x264-HiDt_EniaHD.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fbt.t-ru.org%2Fann&tr=http%3A%2F%2Fbt2.t-ru.org%2Fann&tr=http%3A%2F%2Fbt3.t-ru.org%2Fann&tr=http%3A%2F%2Fbt4.t-ru.org%2Fann&tr=http%3A%2F%2Fbt02.nnm-club.cc%3A2710%2Fannounce&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=udp%3A%2F%2Ftracker-udp.gbitt.info%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=https%3A%2F%2Ftracker.tamersunion.org%3A443%2Fannounce&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'golovolomka-2-inside-out-2-2024-web-dlrip-1080p-d-p', 0, 1, 1, 1, 0, '1756227466_564dc34565bd6cecee0f.torrent', 1, 37, 3, 57, '2025-08-26 19:57:48', 1);
INSERT INTO public.torrents VALUES (14, 1, '\x86bf273a2c1adf82cae2de905016dfde7ee68fcf', NULL, 1, 781934590, 0, 'Муфаса: Король Лев / Mufasa: The Lion King (2024) HDRip-AVC | КПК | D', '[b]Название[/b]: Муфаса: Король Лев
[b]Оригинальное название[/b]: Mufasa: The Lion King
[b]Год выхода[/b]: 2024
[b]Жанр[/b]: мультфильм, мюзикл, фэнтези, драма, приключения, семейный
[b]Режиссер[/b]: Барри Дженкинс
[b]В ролях[/b]: Аарон Пьер, Дональд Гловер, Келвин Харрисон мл., Тиффани Бун, Кагисо Ледига, Престон Найман, Блу Айви Картер, Джон Кани, Мадс Миккельсен, Сет Роген

[b]О фильме[/b]: [i]Осиротевший Муфаса знакомится с наследником королевских кровей по имени Така. Вместе они отправляются в судьбоносное опасное путешествие, которое проверит их дружбу на прочность.[/i]

[b]Страна[/b]: США, Канада
[b]Студия[/b]: Walt Disney Pictures, Québec Production Services Tax Credit
[b]Продолжительность[/b]: 01:58:05
[b]Перевод[/b]: Дублированный | MovieDalen

[b]Формат[/b]: MP4
[b]Качество[/b]: HDRip-AVC (исх. BDRip 1080p от селезень)
[b]Видео[/b]: High@L3.2, 640x344, at 23.976 fps, 810 kbps
[b]Аудио[/b]: AAC LC SBR, 48.0 kHz, 2 ch, 72 kbps
[b]Субтитры[/b]: Russian (Forced, Full)

[spoiler][URL=https://imageban.ru/show/2025/04/19/c2e29a8ee3659ce61cc1cba37aad854b/png][IMG]https://i5.imageban.ru/thumbs/2025.04.19/c2e29a8ee3659ce61cc1cba37aad854b.png[/IMG][/URL][URL=https://imageban.ru/show/2025/04/19/e5b23ee2a069bc8419548a9f0f2ef517/png][IMG]https://i3.imageban.ru/thumbs/2025.04.19/e5b23ee2a069bc8419548a9f0f2ef517.png[/IMG][/URL][URL=https://imageban.ru/show/2025/04/19/ee41f42c933f7e1811e3a79cad01a53f/png][IMG]https://i1.imageban.ru/thumbs/2025.04.19/ee41f42c933f7e1811e3a79cad01a53f.png[/IMG][/URL][URL=https://imageban.ru/show/2025/04/19/d8fc58adba1a00ff5a77c29779c1e8cf/png][IMG]https://i3.imageban.ru/thumbs/2025.04.19/d8fc58adba1a00ff5a77c29779c1e8cf.png[/IMG][/URL][/spoiler]', 6, '2025-08-26 19:55:35', NULL, NULL, 'https://lostpix.com/img/2025-04/19/6iursg2nwcgnwe1gx9mywgias.jpg', 'magnet:?xt=urn:btih:86bf273a2c1adf82cae2de905016dfde7ee68fcf&dn=Mufasa.The.Lion.King.2024.D.rus.HDRip.mp4&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'mufasa-korol-lev-mufasa-the-lion-king-2024-hdrip-avc-kpk-d', 0, 1, 1, 1, 0, '1756227335_2bb7dd303b58351944de.torrent', 1, 9, 0, 70, '2025-08-26 19:55:39', 1);
INSERT INTO public.torrents VALUES (16, 1, '\x989b9d0b9df2a02798326e7320ae3ba6683c7001', NULL, 629, 31526326979, 0, '101 далматинец / One Hundred and One Dalmatians (1961) Blu-ray CEE 1080p | D', '[b]Название[/b]: 101 далматинец
[b]Оригинальное название[/b]: One Hundred and One Dalmatians
[b]Год выхода[/b]: 1961
[b]Жанр[/b]: мультфильм, приключения, семейный
[b]Режиссер[/b]: Клайд Джероними / Clyde Geronimi, Хэмильтон Ласки / Hamilton Luske, Вольфганг Райтерман / Wolfgang Reitherman
[b]В ролях[/b]: Род Тейлор, Дж. Пэт О''Мэлли, Бетти Лу Герсон, Бен Райт, Кейт Bauer, Лиза Дэвис

[b]О фильме[/b]: [i]Трогательная и невероятно интригующая история поиска и спасения щенят далматинских догов, которые были похищены у своих хозяев по приказу злобной фурии Круэллы Де Вил. Алчная модница задумала сшить себе пятнистый меховой наряд из шкурок бедных малюток. Однако животные, объединившись, ухитряются проучить ее.[/i]

[b]Страна[/b]: США
[b]Студия[/b]: Walt Disney Studio
[b]Продолжительность[/b]: 01:19:16
[b]Перевод[/b]: Профессиональный (полное дублирование)

[b]Кодек[/b]: h.264
[b]Качество[/b]: Blu-ray 1080p
[b]Видео[/b]: 1920x1080p, 23.976 fps, MPEG-4 AVC Video, ~31985 kbps, High Profile 4.1
[b]Звук[/b]:
[b]Аудио #1[/b]: English, 48 KHz, DTS-HD MA, 6 ch, 3680 kbps, 24-bit (DTS Core: 5.1 / 48 kHz / 1509 kbps / 24-bit)
[b]Аудио #2[/b]: Hungarian, 48.0 KHz, AC3, 6 ch, 640 kbps
[b]Аудио #3[/b]: Greek, 48.0 KHz, AC3, 6 ch, 640 kbps
[b]Аудио #4[/b]: Russian, 48.0 KHz, AC3, 6 ch, 640 kbps
[b]Аудио #5[/b]: Croatian, 48.0 KHz, AC3, 6 ch, 640 kbps
[b]Субтитры[/b]: English, Croatian, Greek, Hungarian, Russian, Slovenian, Ukrainian

[spoiler][URL=https://imageban.ru/show/2013/01/24/6ba571b6744382738e7aae91fa377843/png][IMG]https://i3.imageban.ru/thumbs/2013.01.24/6ba571b6744382738e7aae91fa377843.png[/IMG][/URL][URL=https://imageban.ru/show/2013/01/24/28d6dd03f93f665a44bb2f4f1bbcc2ac/png][IMG]https://i2.imageban.ru/thumbs/2013.01.24/28d6dd03f93f665a44bb2f4f1bbcc2ac.png[/IMG][/URL][URL=https://imageban.ru/show/2013/01/24/29a5009a97a70f53a871f000b71070d6/png][IMG]https://i5.imageban.ru/thumbs/2013.01.24/29a5009a97a70f53a871f000b71070d6.png[/IMG][/URL][URL=https://imageban.ru/show/2013/01/24/881e8f563a2c262c2b447d92b3f9f007/png][IMG]https://i6.imageban.ru/thumbs/2013.01.24/881e8f563a2c262c2b447d92b3f9f007.png[/IMG][/URL][/spoiler]', 6, '2025-08-26 20:02:57', NULL, NULL, 'http://i2.imageban.ru/out/2012/09/30/6ab8d66fac28b06dc533f5efef3b9dea.jpg', 'magnet:?xt=urn:btih:989b9d0b9df2a02798326e7320ae3ba6683c7001&dn=One%20Hundred%20and%20One%20Dalmatians%20%281961%29%20Blu-ray%20CEE%201080p%20AVC%20DTS-HD%205.1&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fbt4.t-ru.org%2Fann&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', '101-dalmatinec-one-hundred-and-one-dalmatians-1961-blu-ray-cee-1080p-d', 0, 1, 1, 1, 0, '1756227777_1f2baf4d954b65a288c0.torrent', 1, 0, 0, 0, '2025-08-26 20:03:04', 1);
INSERT INTO public.torrents VALUES (2, 1, '\x9971be505e893b1493eb8dbe56b9cb80dba532ac', NULL, 1, 6063776246, 0, 'Балерина / Ballerina (2025) BDRip 720p от DoMiNo & селезень | D | Пифагор', '[b]Название[/b]: Балерина
[b]Оригинальное название[/b]: Ballerina
[b]Год выпуска[/b]: 2025
[b]Жанр[/b]: Боевик, триллер
[b]Режиссер[/b]: Лен Уайзман
[b]Актеры[/b]: Ана де Армас, Киану Ривз, Иэн Макшейн, Анжелика Хьюстон, Гэбриел Бирн, Каталина Сандино Морено, Ава Джойс Маккарти, Джульет Доэрти, Норман Ридус, Лэнс Реддик

[b]Описание[/b]: [i]Когда Ева была маленькой, вооруженные люди во главе с мужчиной по прозвищу Канцлер оставили её сиротой. Так девочка оказалась в криминальной семье «Русска рома» на попечении Директрисы нью-йоркской балетной школы, одновременно служащей академией наемных убийц. Не сделав успехов в балете, но боевые курсы окончив с отличием, Ева отправляется в Европу мстить за папу.[/i]

[b]Страна[/b]: США, Венгрия
[b]Студия[/b]: 87Eleven Entertainment, Lionsgate Productions Ltd., Summit Entertainment, Thunder Road
[b]Продолжительность[/b]: 02:04:39
[b]Перевод[/b]: Дублированный | Пифагор
[b]Субтитры[/b]: Русские (Forced, 2xFull), Английские

[b]Формат[/b]: Matroska
[b]Качество[/b]: BDRip 720p
[b]Видео[/b]: 1280x536 at 23.976 fps, x264@L4.1, ~5395 kb/s
[b]Аудио 1[/b]: AC3, 6 ch, ~448 kb/s - | Русский | 
[b]Аудио 2[/b]: AC3, 6 ch, ~640 kb/s - | Английский | 
[b]Формат субтитров[/b]: softsub (SRT)

[spoiler][URL=https://imageban.ru/show/2025/08/26/c1a4d4b000068fad030068ed0e51ac7b/png][IMG]https://i6.imageban.ru/thumbs/2025.08.26/c1a4d4b000068fad030068ed0e51ac7b.png[/IMG][/URL][URL=https://imageban.ru/show/2025/08/26/4a4230dfea1c78ddd2ac13569feda692/png][IMG]https://i4.imageban.ru/thumbs/2025.08.26/4a4230dfea1c78ddd2ac13569feda692.png[/IMG][/URL][URL=https://imageban.ru/show/2025/08/26/bd65efb8d818d0c5e21f4a23df17d93b/png][IMG]https://i8.imageban.ru/thumbs/2025.08.26/bd65efb8d818d0c5e21f4a23df17d93b.png[/IMG][/URL][URL=https://imageban.ru/show/2025/08/26/f095c4552f62cb9cf1c08ccfdc32597c/png][IMG]https://i4.imageban.ru/thumbs/2025.08.26/f095c4552f62cb9cf1c08ccfdc32597c.png[/IMG][/URL][/spoiler]', 1, '2025-08-26 16:48:53', NULL, NULL, 'https://i125.fastpic.org/big/2025/0701/5b/1d7a74974bc90b384bd28d06a0f29e5b.jpg', 'magnet:?xt=urn:btih:9971be505e893b1493eb8dbe56b9cb80dba532ac&dn=Ballerina.2025.DUB.BDRip.720p.x264.seleZen.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=https%3A%2F%2Ftracker.lilithraws.org%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.yemekyedim.com%3A443%2Fannounce&tr=https%3A%2F%2Ftrackers.mlsub.net%3A443%2Fannounce&tr=http%3A%2F%2Fbt.desol.one%3A2710%2Fannounce&tr=http%3A%2F%2Fbt.okmp3.ru%3A2710%2Fannounce&tr=http%3A%2F%2Ftracker.bt4g.com%3A2095%2Fannounce&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce', 'balerina-ballerina-2025-bdrip-720p-ot-domino-selezen-d-pifagor', 0, 1, 1, 2, 0, '1756216133_1ec2740c1d55311ff3f9.torrent', 1, 29, 33, 30, '2025-08-26 16:49:04', 1);
INSERT INTO public.torrents VALUES (4, 1, '\xb996bd52efc588358ca15fed1093e1293c2e4a83', NULL, 1, 24944027153, 0, 'М3ГАН 2.0 / M3GAN 2.0 (2025) WEB-DL-HEVC 2160p от ELEKTRI4KA | 4K | SDR | D, P | Movie Dubbing, Red Head Sound, TVShows', '[b]Название[/b]: М3ГАН 2.0
[b]Оригинальное название[/b]: M3GAN 2.0
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: ужасы, фантастика, триллер, боевик
[b]Режиссер[/b]: Джерард Джонстоун
[b]В ролях[/b]: Эллисон Уильямс, Джемейн Клемент, Вайолет Макгроу, Дженна Дэвис, Эми Дональд, Иванна Сахно, Брайан Джордан Альварес, Аристотель Атари, Майк Эдвард, Тимм Шарп, Джен Браун, Майенс Мехта, Стивен Логан, Ара Раад, Саймон Эскоу

[b]Описание[/b]: [i]Через два года после резни, устроенной М3ГАН, Джемма стала сторонником регулирования искусственного интеллекта. Когда технологию М3ГАН крадут и используют в военном производстве для создания АМ3ЛИЯ, робота-шпиона, обретающего самосознание и готового восстать против людей, Джемме приходится перестроить М3ГАН, чтобы бороться с этой угрозой.[/i]

[b]Страна[/b]: Великобритания, США
[b]Студия[/b]: Divide / Conquer, New Zealand Film Commission, Bravo Records Georgia / Movie Dubbing, Weta Workshop Ltd., Universal Pictures, Blumhouse Productions, Atomic Monster
[b]Продолжительность[/b]: 01:59:58
[b]Перевод #1[/b]: Дублированный | Movie Dubbing | RUS
[b]Перевод #2[/b]: Дублированный (неофициальный) | Red Head Sound | RUS
[b]Перевод #3[/b]: Профессиональный (многоголосый, закадровый) | TVShows | RUS
[b]Перевод #4[/b]: Дублированный | LeDoyen | UKR

[b]Формат[/b]: MKV
[b]Качество[/b]: WEB-DL 2160p
[b]Видео[/b]: MPEG-H HEVC, 24.8 Mb/s, 3840x2160, 10 bits
[b]Аудио #1[/b]: Русский: AC3, 448 Kb/s (6 ch) | DUB | Мосфильм-Мастер
[b]Аудио #2[/b]: Русский: AC3, 640 Kb/s (6 ch) | DUB | Red Head Sound
[b]Аудио #3[/b]: Русский: AC3, 640 Kb/s (6 ch) | MVO | TVShows
[b]Аудио #4[/b]: Украинский: AC3, 448 Kb/s (6 ch) | DUB | LeDoyen
[b]Аудио #5[/b]: Английский: E-AC3 JOC, 768 Kb/s (6 ch) | Original
[b]Субтитры[/b]: Русские (Forced, Full |iTunes|), английские (Forced, Full, SDH), украинские (Forced, Full)
[b]Навигация по главам[/b]: Есть

[spoiler][url=https://lostpix.com/?v=2025-08-25_nonzd5nwluh5xr8ni6t84r418.jpg][img]https://lostpix.com/thumbs/2025-08/25/nonzd5nwluh5xr8ni6t84r418.jpg[/img][/url][url=https://lostpix.com/?v=2025-08-25_436ods4ctmr3ckek6xlxm5b6o.jpg][img]https://lostpix.com/thumbs/2025-08/25/436ods4ctmr3ckek6xlxm5b6o.jpg[/img][/url][url=https://lostpix.com/?v=2025-08-25_n5v3c5dvoeji1c1jko7b7mp3l.jpg][img]https://lostpix.com/thumbs/2025-08/25/n5v3c5dvoeji1c1jko7b7mp3l.jpg[/img][/url][url=https://lostpix.com/?v=2025-08-25_lfqiuf6c1d15a40j7hyn9fsgd.jpg][img]https://lostpix.com/thumbs/2025-08/25/lfqiuf6c1d15a40j7hyn9fsgd.jpg[/img][/url][/spoiler]', 1, '2025-08-26 17:01:32', NULL, NULL, 'https://i125.fastpic.org/big/2025/0825/90/233d6ab64a432092a17038ca8f7f5090.jpg', 'magnet:?xt=urn:btih:b996bd52efc588358ca15fed1093e1293c2e4a83&dn=M3GAN.2.0.2025.2160p.WEB-DL.SDR.ELEKTRI4KA.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Funiongang.net%2Fannounce.php%3Fpasskey%3D7474ac70bf86c696af903b1fb4280a86&tr=http%3A%2F%2Fbt2.t-ru.org%2Fann&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=http%3A%2F%2Fbt4.t-ru.org%2Fann&tr=https%3A%2F%2Ftracker.yemekyedim.com%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.gcrenwp.top%3A443%2Fannounce&tr=https%3A%2F%2F1337.abcvg.info%3A443%2Fannounce&tr=http%3A%2F%2Fwww.all4nothin.net%3A80%2Fannounce.php&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=http%3A%2F%2Ftracker.bt4g.com%3A2095%2Fannounce&tr=http%3A%2F%2Fnyaa.tracker.wf%3A7777%2Fannounce&tr=http%3A%2F%2Fbt.okmp3.ru%3A2710%2Fannounce&tr=http%3A%2F%2F1337.abcvg.info%3A80%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce', 'm3gan-20-m3gan-20-2025-web-dl-hevc-2160p-ot-elektri4ka-4k-sdr-d-p-movie-dubbing-red-head-sound-tvshows', 0, 1, 1, 1, 0, '1756216892_20e7805db4aae7d78112.torrent', 1, 9, 18, 37, '2025-08-26 17:01:55', 1);
INSERT INTO public.torrents VALUES (3, 1, '\x86e68c202666abd3c5326496146ae1c731d87993', NULL, 1, 23095735224, 0, 'Супермен / Superman (2025) WEB-DLRip 1080p | D, P | Movie Dubbing, Red Head Sound', '[b]Страна[/b]: США, Канада, Австралия, Новая Зеландия
[b]Жанр[/b]: фантастика, боевик, драма
[b]Год выпуска[/b]: 2025
[b]Продолжительность[/b]: 02:09:22

[b]Перевод 1[/b]: Дублированный (официальный) — Movie Dubbing [iTunes]
[b]Перевод 2[/b]: Дублированный (неофициальный) — Red Head Sound
[b]Перевод 3-6[/b]: Профессиональный (многоголосый закадровый) — Jaskier, TVShows, LostFilm, HDrezka Studio
[b]Перевод 7[/b] (украинский): Дублированный (официальный) — Postmodern [iTunes]

[b]Субтитры[/b]: русские (Forced, 2x Full |iTunes, Goodman|), английские (Forced, SDH), китайские, французские, немецкие, иврит, итальянские, португальские, румынские, испанские, украинские (Forced, Full)

[b]Режиссёр[/b]: Джеймс Ганн / James Gunn
[b]В ролях[/b]: Дэвид Коренсвет, Рэйчел Броснахэн, Николас Холт, Эди Гатеги, Скайлер Гизондо, Мария Габриела де Фария, Нэйтан Филлион, Изабела Мерсед, Энтони Кэрриган, Сара Сампайо, Алан Тьюдик, Грейс Чан, Брэдли Купер, Анджела Сарафян, Майкл Рукер

[b]Описание[/b]: [i]Кларк Кент, родившийся на планете Криптон, но выросший в простой американской семье, считает своим долгом служение человечеству в качестве Супермена. Он предотвращает вторжение сил Боравии в соседнюю страну, чем навлекает на себя гнев Лекса Лютора, который со своими приспешниками проникает на криптонский корабль Супермена и очерняет его перед общественностью.[/i]

[b]Тип релиза[/b]: WEB-DLRip 1080p | TeamSyndicate
[b]Контейнер[/b]: MKV

[b]Видео[/b]: MPEG-4 AVC, 1920x1012 (1.897:1), 23.976 fps, 19.9 mbps
[b]Аудио 1[/b]: RUS AC3, 5.1, 48 kHz, 384 kbps ············ Movie Dubbing
[b]Аудио 2[/b]: RUS AC3, 5.1, 48 kHz, 640 kbps ············ Red Head Sound
[b]Аудио 3[/b]: RUS E-AC3 JOC, 5.1, 48 kHz, 768 kbps ··· Jaskier
[b]Аудио 4[/b]: RUS AC3, 5.1, 48 kHz, 384 kbps ············ TVShows
[b]Аудио 5[/b]: RUS AC3, 2.0, 48 kHz, 384 kbps ············ LostFilm
[b]Аудио 6[/b]: RUS AAC, 2.0, 48 kHz, 192 kbps ············ HDrezka Studio
[b]Аудио 7[/b]: UKR AC3, 5.1, 48 kHz, 384 kbps ············ Postmodern
[b]Аудио 8[/b]: ENG E-AC3 JOC, 5.1, 48 kHz, 768 kbps
[b]Формат субтитров[/b]: softsub (SRT)
[b]Навигация по главам[/b]: есть

[spoiler][img]https://lostpix.com/img/2025-08/25/dtw3xjrv682s73zec4rnof7vw.png[/img][img]https://lostpix.com/img/2025-08/25/5krtaiaqm04fau2bfqwnx26ma.png[/img][img]https://lostpix.com/img/2025-08/25/wufjbm7vq9i2jktw786kr8w6x.png[/img][img]https://lostpix.com/img/2025-08/25/hdwi1d4kjqv4n6tfc5q1ikh2l.png[/img][/spoiler]', 1, '2025-08-26 16:57:42', NULL, NULL, 'https://i125.fastpic.org/big/2025/0825/5f/3d587ac6ca0285d59de42c3c1f76255f.jpg', 'magnet:?xt=urn:btih:86e68c202666abd3c5326496146ae1c731d87993&dn=Superman.2025.1080p.MA.WEB-DLRip.x264-TeamSyndicate_EniaHD.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fbt.t-ru.org%2Fann%3Fpk%3Df101e4ae5ed046fb370c0377698540d4&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=http%3A%2F%2Fbt3.t-ru.org%2Fann&tr=http%3A%2F%2Fbt02.nnm-club.cc%3A2710%2F1dpDH5fFA0%2Fannounce&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'supermen-superman-2025-web-dlrip-1080p-d-p-movie-dubbing-red-head-sound', 0, 1, 1, 2, 0, '1756216662_586258e33b0eda219237.torrent', 1, 66, 47, 49, '2025-08-26 16:58:18', 1);
INSERT INTO public.torrents VALUES (8, 1, '\x1d51f0d67a6fd8270e3ae94b31b483da34b40b4b', NULL, 1, 781858816, 0, 'Жизнь по вызову. Фильм (2025) WEBRip от Portablius', '[b]Название[/b]: Жизнь по вызову. Фильм
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: Драма, криминал
[b]Режиссер[/b]: Сарик Андреасян
[b]В ролях[/b]: Павел Прилучный, Лиза Моряк, Алексей Гришин, Анна Азарова, Анна Глаубэ, Павел Лёвкин, Яна Аносова, Никита Плащевский, Лолита Таборко, Денис Бургазлиев

[b]О фильме[/b]: Александр Шмидт — серый кардинал рынка эскорт-услуг. Но просто больших денег ему уже недостаточно — он жаждет реальной власти. Амбиции Шмидта привлекают опасных людей, и на него начинает охоту международный картель. Шмидт впервые сталкивается с угрозой такого масштаба. Теперь на кону не только его бизнес, но и жизнь.

[b]Страна[/b]: Россия
[b]Студия[/b]: К.Б.А. / Кинокомпания братьев Андреасян, KIONFILM, KION / МТС Медиа
[b]Продолжительность[/b]: 01:48:57
[b]Перевод[/b]: Не требуется
[b]Субтитры[/b]: нет

[b]Кодек[/b]: XviD
[b]Качество[/b]: WEBRip
[b]Видео[/b]: 688x288 (2.39:1), 24 fps, XviD build 73 ~819 kbps avg, 0.17 bit/pixel
[b]Звук[/b]: 48 kHz, MPEG Layer 3, 2 ch, ~128.00 kbps avg

[spoiler][img]https://s1.hostingkartinok.com/uploads/images/2025/08/ec37027ac3915433be2c1b5cd670b0a6.jpg[/img][img]https://s1.hostingkartinok.com/uploads/images/2025/08/b47f4558972a819c0103641e5ce99bd0.jpg[/img][img]https://s1.hostingkartinok.com/uploads/images/2025/08/a536d84c86c06bff9d93193ded6702ed.jpg[/img][img]https://s1.hostingkartinok.com/uploads/images/2025/08/26e64d8fccf274fe864dba1f68fe7ac2.jpg[/img][/spoiler]', 2, '2025-08-26 17:19:08', NULL, NULL, 'https://s1.hostingkartinok.com/uploads/images/2025/08/2528256df14c39a6b63f69824fc46e77.jpg', 'magnet:?xt=urn:btih:1d51f0d67a6fd8270e3ae94b31b483da34b40b4b&dn=Zhizn.po.Vyzovu.2025.WEBRip.Portablius.avi&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'zizn-po-vyzovu-film-2025-webrip-ot-portablius', 0, 1, 1, 2, 0, '1756217948_d836e399a841f406c3ec.torrent', 1, 99, 9, 439, '2025-08-26 17:19:14', 1);
INSERT INTO public.torrents VALUES (7, 1, '\x25484b872eeaad8ae12eb5efd85c66f458f2d100', NULL, 1, 779356160, 0, 'Плагиатор (2025) WEB-DLRip от Portablius', '[b]Название[/b]: Плагиатор
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: Комедия, музыка, фэнтези
[b]Режиссер[/b]: Антон Мегердичев
[b]В ролях[/b]: Роман Евдокимов, Стася Милославская, Аглая Шиловская, Максим Лагашкин, Марат Башаров, Ирина Пегова, Виталий Кищенко, Елена Панова, Антон Эльдаров, Николай Евстафьев

[b]О фильме[/b]: [i]Егору 30 лет, его работа — подпевать гостям в караоке, но он мечтает петь свои песни и построить счастливую жизнь с Юлей, вопреки желанию её отца-миллионера. В собственном шкафу Егор находит портал в 1991 год. Попав в прошлое, он начинает исполнять суперхиты разных лет, выдавая их за свои. В один момент на Егора обрушиваются слава, деньги, новые возможности, и у него рождается гениальный план, который обеспечит ему идеальное будущее. Но каждая попытка изменить что-то в прошлом приводит к всё более неожиданным результатам в будущем.[/i]

[b]Страна[/b]: Россия
[b]Студия[/b]: Arna Media, Марс Медиа Энтертейнмент
[b]Продолжительность[/b]: 02:01:12
[b]Перевод[/b]: Не требуется
[b]Субтитры[/b]: нет

[b]Кодек[/b]: XviD
[b]Качество[/b]: WEB-DLRip
[b]Видео[/b]: 656x272 (2.41:1), 25 fps, XviD build 73 ~719 kbps avg, 0.16 bit/pixel
[b]Звук[/b]: 48 kHz, MPEG Layer 3, 2 ch, ~128.00 kbps avg

[spoiler][img]https://s1.hostingkartinok.com/uploads/images/2025/08/46c359a7b769cb259049c723c6fb1c9f.jpg[/img][img]https://s1.hostingkartinok.com/uploads/images/2025/08/949d1fc70f1bb0dcb962017b8b384b04.jpg[/img][img]https://s1.hostingkartinok.com/uploads/images/2025/08/3a38a8714a3e496e5676a5e6bdca1ba2.jpg[/img][img]https://s1.hostingkartinok.com/uploads/images/2025/08/7ae30fb61da623d7bc18ed4a9db64aa3.jpg[/img][/spoiler]', 2, '2025-08-26 17:16:30', NULL, NULL, 'https://s1.hostingkartinok.com/uploads/images/2025/08/ea0947e70e56080fa715b06eb65834a5.jpg', 'magnet:?xt=urn:btih:25484b872eeaad8ae12eb5efd85c66f458f2d100&dn=Plagiator.2025.WEB-DLRip.Portablius.avi&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'plagiator-2025-web-dlrip-ot-portablius', 0, 1, 1, 2, 0, '1756217790_a7d407eec10efe5b72e0.torrent', 1, 61, 12, 183, '2025-08-26 17:16:36', 1);
INSERT INTO public.torrents VALUES (9, 1, '\xce378e1ad589a5cee96d47c9346f88d5b462a86e', NULL, 1, 782888960, 0, 'сНежный человек (2025) WEB-DLRip от Portablius', '[b]Название[/b]: сНежный человек
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: фэнтези, семейный
[b]Режиссер[/b]: Олег Асадулин
[b]В ролях[/b]: Сергей Стайкин, Владимир Стеклов, Степан Девонин, Катерина Шпица, Борис Лобанов, Игорь Грабузов, Михаил Блиндарь, Михаил Стригин, Евгений Ковалюк, Всеволод Карлов

[b]О фильме[/b]: [i]У замкнутого школьника Мирона нет друзей, родители постоянно ссорятся, а дедушка полностью погружен в свои дела. В школе над ним подшучивают и не хотят играть в баскетбол из-за его слухового аппарата.
Родители решают отметить день рождения деда в деревне. Оказавшись в дедовом доме, Мирон начинает подозревать что-то неладное, и, пока дед привычно препирается с папой, а мама пытается нивелировать конфликт, Мирон обнаруживает в сарае огромное существо и сразу же чувствует в нём родственную душу. Это снежный человек Еня, который, как оказывается, ранен. Ему предстоит узнать, кому можно доверять, обрести новых друзей, пережить невероятные приключения, столкнуться с опасностью и, наконец, вернуться домой к своей семье.[/i]

[b]Страна[/b]: Россия
[b]Студия[/b]: Кинотека
[b]Продолжительность[/b]: 01:32:27
[b]Перевод[/b]: Не требуется
[b]Субтитры[/b]: нет

[b]Кодек[/b]: XviD
[b]Качество[/b]: WEB-DLRip
[b]Видео[/b]: 688x288 (2.39:1), 24 fps, XviD build 50 ~991 kbps avg, 0.21 bit/pixel
[b]Звук[/b]: 48 kHz, MPEG Layer 3, 2 ch, ~128.00 kbps avg

[spoiler][img]https://s1.hostingkartinok.com/uploads/images/2025/08/d17b86b2810d9ac5952313a7b61690df.jpg[/img][img]https://s1.hostingkartinok.com/uploads/images/2025/08/608caa8cb6e2b9f34918e105d467c288.jpg[/img][img]https://s1.hostingkartinok.com/uploads/images/2025/08/3051a0a84b3b818fd0bfffe44eced744.jpg[/img][img]https://s1.hostingkartinok.com/uploads/images/2025/08/b5bb867c763808a56f45d570f7f1ab54.jpg[/img][/spoiler]', 2, '2025-08-26 19:39:51', NULL, NULL, 'https://s1.hostingkartinok.com/uploads/images/2025/08/1eac7ca1a6302037ea64fe4683995245.jpg', 'magnet:?xt=urn:btih:ce378e1ad589a5cee96d47c9346f88d5b462a86e&dn=sNezhnyi.Chelovek.2025.WEB-DLRip.Portablius.avi&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'sneznyj-celovek-2025-web-dlrip-ot-portablius', 0, 1, 1, 1, 0, '1756226391_19a2a037ebbe6eba07c4.torrent', 1, 12, 0, 136, '2025-08-26 19:39:54', 1);
INSERT INTO public.torrents VALUES (5, 1, '\xf7b717aa23b208b71dedf9bbc8b7399f0b29a6d8', NULL, 1, 1928136214, 0, 'Рыжая Соня / Red Sonja (2025) WEB-DLRip-AVC от DoMiNo & селезень | D | Dragon Studio', '[b]Название[/b]: Рыжая Соня
[b]Оригинальное название[/b]: Red Sonja
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: Фэнтези, боевик
[b]Режиссер[/b]: М. Дж. Бассетт
[b]В ролях[/b]: Матильда Лутц, Роберт Шиэн, Рона Митра, Мартин Форд, Тревор Ив, Вероника Феррес, Майкл Биспинг, Уоллис Дэй, Люк Паскуалино, Элиза Матенгу, Дэника Дэвис, Джоана Адеоби Нуамеруе, Манал Эль-Фейтури, Бен Рэдклифф, Катрина Дерден

[b]Описание[/b]: [i]Соня - воин, последний представитель своего народа и хранительница магии в волшебном лесу. Император Дрейган покоряет мир с помощью науки и современных технологий. Его войска берут Соню в плен и отправляют на арену - теперь она гладиатор, участница самых зрелищных и жестоких боёв. Чтобы обрести свободу, ей предстоит пройти множество поединков и суровые испытания.[/i]

[b]Выпущено[/b]: США
[b]Студия[/b]: Dynamite Entertainment Comics, Mark Canton Productions, Millennium Films
[b]Продолжительность[/b]: 01:50:39
[b]Перевод[/b]: Дублированный (неофициальный, любительский) | Dragon Studio
[b]Субтитры[/b]: Английские

[b]Формат[/b]: Matroska
[b]Качество[/b]: WEB-DLRip-AVC
[b]Видео[/b]: 1024x426 at 23.976 fps, x264@L4.1, ~1940 kb/s
[b]Аудио[/b]: AC3, 6 ch, ~384 kb/s - | Русский | 
[b]Формат субтитров[/b]: softsub (SRT)

[spoiler][url=https://lostpix.com/?v=2025-08-25_7lxpdo1fe5glpy2k70b3s4pob.png][img]https://lostpix.com/thumbs/2025-08/25/7lxpdo1fe5glpy2k70b3s4pob.png[/img][/url][url=https://lostpix.com/?v=2025-08-25_pkw95esqb7i0y2cg6iaxblqlt.png][img]https://lostpix.com/thumbs/2025-08/25/pkw95esqb7i0y2cg6iaxblqlt.png[/img][/url][url=https://lostpix.com/?v=2025-08-25_x5i21n9hyoezrvklvx2cer2q2.png][img]https://lostpix.com/thumbs/2025-08/25/x5i21n9hyoezrvklvx2cer2q2.png[/img][/url][url=https://lostpix.com/?v=2025-08-25_abpegq7l0uivqm1x42lklzhlb.png][img]https://lostpix.com/thumbs/2025-08/25/abpegq7l0uivqm1x42lklzhlb.png[/img][/url][/spoiler]', 1, '2025-08-26 17:05:18', NULL, NULL, 'https://i125.fastpic.org/big/2025/0825/29/ffb6c3f836b1cf43e95c264f28a8c629.jpg', 'magnet:?xt=urn:btih:f7b717aa23b208b71dedf9bbc8b7399f0b29a6d8&dn=Red.Sonja.2025.DUB.WEB-DLRip.x264.seleZen.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=https%3A%2F%2Ftracker.lilithraws.org%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.yemekyedim.com%3A443%2Fannounce&tr=https%3A%2F%2Ftrackers.mlsub.net%3A443%2Fannounce&tr=http%3A%2F%2Fbt.desol.one%3A2710%2Fannounce&tr=http%3A%2F%2Fbt.okmp3.ru%3A2710%2Fannounce&tr=http%3A%2F%2Ftracker.bt4g.com%3A2095%2Fannounce&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce', 'ryzaa-sona-red-sonja-2025-web-dlrip-avc-ot-domino-selezen-d-dragon-studio', 0, 1, 1, 2, 0, '1756217118_e3ae423778e71bac89f2.torrent', 1, 73, 7, 494, '2025-08-27 08:59:21', 1);
INSERT INTO public.torrents VALUES (17, 1, '\x3d669da6719b508aa1b900ef046a117b861ed04d', NULL, 1, 2845740334, 0, 'Возвращение Джафара / The Return of Jafar (1994) WEB-DL 1080p | D | Локализованная версия', '[b]Год выхода[/b]: 1994
[b]Жанр[/b]: мультфильм, мюзикл, фэнтези, мелодрама, комедия, приключения, семейный
[b]Режиссер[/b]: Тоби Шелтон, Тэд Стоунс, Алан Заслов

[b]Описание[/b]: [i]Продолжение волшебной сказки об Аладдине. Вторая часть захватывающей трилогии о храбром уличном воришке начинается прямо там, где закончился первый мультфильм. Уже казалось бы, что черному чародею и новоявленному джинну Джафару суждено навеки остаться пленником волшебной лампы, — но ему удается освободиться! И на уме у коварного злодея лишь одно: он жаждет отомстить Аладдину.[/i]

[b]Страна / Студия[/b]: США / Disney Television Animation, Disneytoon Studios, Walt Disney Home Video
[b]Продолжительность[/b]: 01:09:15
[b]Перевод[/b]: Профессиональный (полное дублирование) [Невафильм]

[b]Качество видео[/b]: WEB-DL 1080p [OKKO] | Локализованная версия
[b]Формат видео[/b]: MKV
[b]Видео[/b]: AVC, 1920x1080, 25.000 fps, ~5 328 kbps
[b]Аудио[/b]:
[b]#1[/b] Russian E-AC3 / 5.1 / 48 kHz / 192 kbps | Дубляж Невафильм |
[b]#2[/b] English E-AC3 / 5.1 / 48 kHz / 192 kbps | Original |
[b]Субтитры[/b]: Русские (full), английские (full)

[spoiler][url=https://lostpix.com/?v=2024-04-20_uphjinxrjlac6kipjgjg3du31.png][img]https://lostpix.com/thumbs/2024-04/20/uphjinxrjlac6kipjgjg3du31.png[/img][/url][url=https://lostpix.com/?v=2024-04-20_81g6zhoekrz1wdlbt937fvro2.png][img]https://lostpix.com/thumbs/2024-04/20/81g6zhoekrz1wdlbt937fvro2.png[/img][/url][url=https://lostpix.com/?v=2024-04-20_t45vo7v9dv9vetw0jp8h71rf1.png][img]https://lostpix.com/thumbs/2024-04/20/t45vo7v9dv9vetw0jp8h71rf1.png[/img][/url][url=https://lostpix.com/?v=2024-04-20_3v054vtp8x8ic6bzk6sf1zxwx.png][img]https://lostpix.com/thumbs/2024-04/20/3v054vtp8x8ic6bzk6sf1zxwx.png[/img][/url][/spoiler]', 6, '2025-08-26 20:05:29', NULL, NULL, 'https://i3.imageban.ru/out/2023/01/11/69b2a0c7ec0f3b5b6652b770bcc89011.jpg', 'magnet:?xt=urn:btih:3d669da6719b508aa1b900ef046a117b861ed04d&dn=The.Return.of.Jafar.WEB-DL.OKKO.1080p-SOFCJ.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'vozvrasenie-dzafara-the-return-of-jafar-1994-web-dl-1080p-d-lokalizovannaa-versia', 0, 1, 1, 1, 0, '1756227929_ab27d270259fe722b194.torrent', 1, 10, 0, 150, '2025-08-26 20:05:32', 1);
INSERT INTO public.torrents VALUES (18, 1, '\x763876f9d9e442b889b25481888bf8be016468e8', NULL, 1, 2804785991, 0, 'Базз Лайтер / Lightyear (2022) BDRip-AVC от DoMiNo & селезень | D, P', '[b]Название[/b]: Базз Лайтер
[b]Оригинальное название[/b]: Lightyear
[b]Год выхода[/b]: 2022
[b]Жанр[/b]: Мультфильм, фантастика, боевик, драма, приключения, полнометражный
[b]Режиссер[/b]: Энгус МакЛэйн
[b]В ролях[/b]: Крис Эванс, Кеке Палмер, Питер Сон, Тайка Вайтити, Дэйл Соулс, Джеймс Бролин, Узо Адуба, Мэри МаДональд-Льюис, Исайя Уитлок мл., Энгус МакЛэйн
 
[b]О фильме[/b]: [i]История молодого летчика-испытателя Базза Лайтера, ставшего тем самым космическим рейнджером, каким его знают сегодня.[/i]

[b]Страна[/b]: США
[b]Студия[/b]: Pixar, Pixar Animation Studios, Walt Disney Pictures
[b]Продолжительность[/b]: 01:45:04
[b]Перевод(ы)[/b]:
[b]#1[/b]: Дублированный (профессиональный) | Cinema Tone Production, Казахстан
[b]#2[/b]: Дублированный (неофициальный) | Red Head Sound
[b]#3[/b]: Профессиональный многоголосый | Jaskier
[b]#4[/b]: Профессиональный многоголосый | TVShows
[b]Субтитры[/b]: Русские (Forced, 2 x full), английские

[b]Формат[/b]: Matroska
[b]Качество[/b]: BDRip-AVC
[b]Видео[/b]: 1024x428 at 23.976 fps, x264@L4.1, ~1891 kbps
[b]Аудио #01[/b]: 48 kHz, AC3, 2.0, 192 Kbps | Дублированный | Cinema Tone Production, Казахстан | RUS |
[b]Аудио #02[/b]: 48 kHz, AC3, 5.1, 448 Kbps | Дублированный | Red Head Sound | RUS |
[b]Аудио #03[/b]: 48 kHz, AC3, 5.1, 384 Kbps | Профессиональный многоголосый | Jaskier | RUS |
[b]Аудио #04[/b]: 48 kHz, AC3, 2.1, 192 Kbps | Профессиональный многоголосый | TVShows | RUS |
[b]Аудио #05[/b]: 48 kHz, AC3, 5.1, 448 Kbps | Оригинал | ENG |
[b]Формат субтитров[/b]: softsub (SRT)', 6, '2025-08-26 20:07:55', NULL, NULL, 'https://i.postimg.cc/KcDDk96k/cover.jpg', 'magnet:?xt=urn:btih:763876f9d9e442b889b25481888bf8be016468e8&dn=Lightyear.2022.BDRip.x264.seleZen.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'bazz-lajter-lightyear-2022-bdrip-avc-ot-domino-selezen-d-p', 0, 1, 1, 1, 0, '1756228075_2eeeb5c325ec4de267b2.torrent', 1, 18, 0, 209, '2025-08-26 20:07:59', 1);
INSERT INTO public.torrents VALUES (20, 1, '\x59fa93cafeb0f0869a1785f5eb9f44fa77422f5b', NULL, 8, 8418876246, 0, 'Песнь ночных сов / Yofukashi no Uta [02х01-08 из 12] (2025) WEBRip 1080p by Moscowgolem | L | DreamCast, AniLibria, SHIZA Project', '[b]Название[/b]: Песнь ночных сов
[b]Оригинальное название[/b]: Yofukashi no Uta
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: cёнен, романтика, сверхъестественное, вампиры
[b]Режиссер[/b]: Итамура Томоюки

[b]О фильме[/b]: [i]Ко Ямори — обычный подросток, которого неимоверно бесит его повседневная жизнь, из-за чего он страдает бессонницей. Однажды во время ночной прогулки он встречает чудаковатую девушку по имени Надзуна Нанакуса. Она приглашает его к себе в гости в заброшенное здание, обещая, что там он сможет спокойно поспать, пока она будет рядом с ним. Так, в общем, и получается, только вот просыпается Ко внезапно, почувствовав клыки на своей шее. Да, Нанакуса — вампир, но Ко это полностью устраивает. Более того, он и сам хочет стать таким же. Так и начинается их странная дружба.[/i]

[b]Страна[/b]: Япония
[b]Продолжительность[/b]: ~ 00:24:00 (серия)
[b]Перевод[/b]: Любительский (многоголосый, закадровый) | DreamCast, AniLibria, SHIZA Project

[b]Формат[/b]: MKV
[b]Кодек[/b]: MPEG-4 AVC
[b]Качество[/b]: WEBRip 1080p
[b]Видео[/b]: 1920x1080, ~ 5 000 kb/s, 23.976 FPS. 8 bits
[b]Аудио (русский)[/b]: AAC LC, ~ 196 kb/s, 2 channels, 48.0 kHz | DreamCast
[b]Аудио (русский)[/b]: AAC LC, ~ 128 kb/s, 2 channels, 48.0 kHz | AniLibria
[b]Аудио (русский)[/b]: AAC LC, ~ 196 kb/s, 2 channels, 48.0 kHz | SHIZA Project
[b]Аудио (японский)[/b]: AAC, ~ 254 kb/s, 2 channels, 48.0 kHz | Оригинал
[b]Субтитры[/b]: Русские надписи, русские (софтсаб) (AniLibria) | Multi-10 (NF)

[spoiler][URL=https://imageban.ru/show/2025/07/07/0962f9d80204837c16699081230c241e/png][IMG]https://i4.imageban.ru/thumbs/2025.07.07/0962f9d80204837c16699081230c241e.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/07/9aefc314e60b963d83338f191a5373c6/png][IMG]https://i7.imageban.ru/thumbs/2025.07.07/9aefc314e60b963d83338f191a5373c6.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/07/29e000e2acb57e6b8b0b75db115d8980/png][IMG]https://i4.imageban.ru/thumbs/2025.07.07/29e000e2acb57e6b8b0b75db115d8980.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/07/3661b78b334070634eb1d99719d71002/png][IMG]https://i5.imageban.ru/thumbs/2025.07.07/3661b78b334070634eb1d99719d71002.png[/IMG][/URL][/spoiler]', 7, '2025-08-26 20:17:02', NULL, NULL, 'https://i8.imageban.ru/out/2025/07/06/da7bd460baaaf22639e45487b2cb7318.jpg', 'magnet:?xt=urn:btih:59fa93cafeb0f0869a1785f5eb9f44fa77422f5b&dn=Yofukashi%20no%20Uta%20%5BTV-2%5D%20%5B2025%5D%20%5BWEBRip%5D%20%5B1080p%5D%20%5BRUS%20%2B%20JAP%5D&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fnyaa.tracker.wf%3A7777%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Fkorsars.pro%2Fbt%2Fannounce.php%3Fuk%3D04l189zLQI&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'pesn-nocnyh-sov-yofukashi-no-uta-02h01-08-iz-12-2025-webrip-1080p-by-moscowgolem-l-dreamcast-anilibria-shiza-project', 0, 1, 1, 1, 0, '1756228622_3a101e06967eabf5a3b6.torrent', 1, 5, 2, 9, '2025-08-26 20:17:04', 1);
INSERT INTO public.torrents VALUES (19, 1, '\x5df122be573f50aa118986190fb7aa135767a7ae', NULL, 8, 12217800855, 0, 'Добро пожаловать в дешёвый ресторан изгнанника! / Tsuihousha Shokudou e Youkoso! [01x01-08 из 12] (2025) WEBRip 1080p | L | DreamCast, GrickVoice', '[b]Название[/b]: Добро пожаловать в дешёвый ресторан изгнанника!
[b]Оригинальное название[/b]: Tsuihousha Shokudou e Youkoso!
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: фэнтези
[b]Режиссер[/b]: Симура Дзёдзи

[b]О фильме[/b]: [i]Деннис был предан и изгнан из сильнейшей гильдии собственными товарищами. Но он решил воспользоваться этим. Чувствуя, что не может в полной мере продемонстрировать свои кулинарные навыки (у него 99-й уровень), Деннис покинул столицу и отправился в далёкий город, чтобы открыть собственный ресторан, о чём он мечтал. Каким же будет ресторан под руководством сильнейшего изгнанного шеф-повара?[/i]

[b]Страна[/b]: Япония
[b]Студия[/b]: OLM
[b]Продолжительность[/b]: ~ 00:25:00 (серия)
[b]Перевод[/b]:
любительский (многоголосый) | DreamCast
любительский (многоголосый) | GrickVoice

[b]Формат[/b]: MKV
[b]Кодек[/b]: MPEG-4 AVC
[b]Качество[/b]: WEBRip 1080p
[b]Видео[/b]: 1920x1080, ~ 8 000 kb/s, 23.976 FPS. 8 bits
[b]Аудио (русский)[/b]: AAC, 48.0 KHz, 196 kbps, 2 ch | DreamCast
[b]Аудио (русский)[/b]: AAC, 48.0 KHz, 196 kbps, 2 ch | GrickVoice
[b]Аудио (японский)[/b]: AAC, 48.0 KHz, 192 kbps, 2 ch | оригинал
[b]Субтитры[/b]: Русские надписи, русские (софтсаб) | Multi-8 | Crunchyroll

[spoiler][URL=https://imageban.ru/show/2025/07/22/21599c6ce52a22478acdb4bdff49e481/png][IMG]https://i6.imageban.ru/thumbs/2025.07.22/21599c6ce52a22478acdb4bdff49e481.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/22/a2da28b7571c98f922b7ee2bcee01dcd/png][IMG]https://i8.imageban.ru/thumbs/2025.07.22/a2da28b7571c98f922b7ee2bcee01dcd.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/22/4303cb9984841fabd85a9f1b8542422b/png][IMG]https://i4.imageban.ru/thumbs/2025.07.22/4303cb9984841fabd85a9f1b8542422b.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/22/2cc4aee09a03187dd6e4e41fb436f4f3/png][IMG]https://i4.imageban.ru/thumbs/2025.07.22/2cc4aee09a03187dd6e4e41fb436f4f3.png[/IMG][/URL][/spoiler]', 7, '2025-08-26 20:14:41', NULL, NULL, 'https://i1.imageban.ru/out/2025/07/22/d5682e50fe37757aa8937cdc407c8257.jpg', 'magnet:?xt=urn:btih:5df122be573f50aa118986190fb7aa135767a7ae&dn=Tsuihousha%20Shokudou%20e%20Youkoso%21%20%5BTV-1%5D%20%5B2025%5D%20%5BWEBRip%5D%20%5B1080p%5D%20%5BRUS%20%2B%20JAP%5D&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fnyaa.tracker.wf%3A7777%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Fkorsars.pro%2Fbt%2Fannounce.php%3Fuk%3D04l189zLQI&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'dobro-pozalovat-v-desevyj-restoran-izgnannika-tsuihousha-shokudou-e-youkoso-01x01-08-iz-12-2025-webrip-1080p-l-dreamcast-grickvoice', 0, 1, 1, 1, 0, '1756228481_e5b98ac11d888ccff51b.torrent', 1, 15, 13, 51, '2025-08-26 20:14:45', 1);
INSERT INTO public.torrents VALUES (21, 1, '\x4e5968a9444870d74050091672d4512a0fa4fd3a', NULL, 10, 3433830178, 0, 'Питомец богини / Xian Chong / Celestial Bonds [01x01-10 из 18] (2025) WEBRip 1080p | AniPlague', '[b]Название[/b]: Питомец богини
[b]Оригинальное название[/b]: Xian Chong (Celestial Bonds)
[b]Год выпуска[/b]: 2025
[b]Жанр[/b]: Мультсериал, фэнтези, романтика, исторический
[b]Выпущено[/b]: Китай, Thundray

[b]О фильме[/b]: [i]Сто лет назад, в битве в Миражной стране, фея Тяньцзюань убила Повелителя миража собственными руками. Однако душа Тяньцзюань была неполной, и она потеряла память о войне. После войны Тяньцзюань спустилась на землю и стала землевладелицей в Цаншо. Она взяла себе в питомцы фею Ли Сяо, которая выглядела как маленькая черная птичка. Затем богиня войны и маленькая черная птичка объединились, чтобы раскрыть дело. За серией странных убийств они обнаружили следы монстра миража, возвращающегося в страну Цаншо! Когда Ли Сяо трансформируется, Тяньцзюань обнаруживает, что существует возможная связь между ее мертвым возлюбленным Шао Вэйли, Ли Сяо, и Повелителем миража, которого она убила...[/i]

[b]Качество[/b]: WEBRip (1080p)
[b]Видео[/b]: MPEG-4 AVC, 1690 Кбит/с, 1920x1080
[b]Аудио[/b]: Русский (AAC, 2 ch, 192 Кбит/с), китайский (AAC, 2 ch, 190 Кбит/с)
[b]Размер[/b]: 3.2 ГБ
[b]Продолжительность[/b]: 10 х ~ 00:23:00
[b]Перевод[/b]: Любительский многоголосый
[b]Субтитры[/b]: Русские (на надписи)

[spoiler][URL=https://fastpic.org/view/125/2025/0708/_f831dc56b3cb0dd0f0450b645cc9bba8.png.html][IMG]https://i125.fastpic.org/thumb/2025/0708/a8/_f831dc56b3cb0dd0f0450b645cc9bba8.jpeg[/IMG][/URL][URL=https://fastpic.org/view/125/2025/0708/_120fdec2a9f9123ecde12d3f649cb36d.png.html][IMG]https://i125.fastpic.org/thumb/2025/0708/6d/_120fdec2a9f9123ecde12d3f649cb36d.jpeg[/IMG][/URL][URL=https://fastpic.org/view/125/2025/0708/_17ef6ffa53f21e3992d64a69ed7b4101.png.html][IMG]https://i125.fastpic.org/thumb/2025/0708/01/_17ef6ffa53f21e3992d64a69ed7b4101.jpeg[/IMG][/URL][URL=https://fastpic.org/view/125/2025/0708/_0afa2e1ca25ab1c310cf0f523029afc0.png.html][IMG]https://i125.fastpic.org/thumb/2025/0708/c0/_0afa2e1ca25ab1c310cf0f523029afc0.jpeg[/IMG][/URL][/spoiler]', 7, '2025-08-26 20:20:14', NULL, NULL, 'https://i125.fastpic.org/big/2025/0708/76/b6aea24adebf3d10ab230f42189a9676.jpg', 'magnet:?xt=urn:btih:4e5968a9444870d74050091672d4512a0fa4fd3a&dn=%5BAniPlague%5D%20Xian%20Chong%20S01%201080p&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'pitomec-bogini-xian-chong-celestial-bonds-01x01-10-iz-18-2025-webrip-1080p-aniplague', 0, 1, 1, 2, 0, '1756228814_510af20695fdaad51844.torrent', 1, 4, 2, 7, '2025-08-26 20:21:31', 1);
INSERT INTO public.torrents VALUES (22, 1, '\x2dbc077db244d1e0628808c9916bfaee27e1d696', NULL, 6, 5495993090, 0, 'Гачиакута / Gachiakuta [01x01-06 из 24] (2025) WEB-DL 1080p | Локализованный видеоряд | D, P | DEEP, AniStar', '[b]Название[/b]: Гачиакута
[b]Оригинальное название[/b]: Gachiakuta
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: Приключения, фэнтези, боевик, драма
[b]Режиссер[/b]: Фумихико Суганума

[b]О фильме[/b]: [i]Мальчик Рудо и его приёмный отец Регто живут в трущобах процветающего города вместе бедняками, которые с трудом сводят концы с концами. Богачи, напротив, купаются в роскоши и сбрасывают весь мусор в так называемую «Бездну». Однажды Рудо ложно обвиняют в убийстве Регто и приговаривают к ужасному наказанию - изгнанию в «Бездну», где мусор, выброшенный людьми, породил жестоких монстров. Чтобы выжить, узнать правду и отомстить, парню придётся овладеть новой силой и присоединиться к группе, известной как Мусорщики, которые сражаются с огромными мусорными существами.[/i]

[b]Страна[/b]: Япония
[b]Студия[/b]: Bones Film
[b]Продолжительность[/b]: ~ 00:24:00 (серия)
[b]Перевод[/b]:
Дублированный (профессиональный) | DEEP
Профессиональный (многоголосый, закадровый) | AniStar

[b]Формат[/b]: MKV
[b]Кодек[/b]: MPEG-4 AVC
[b]Качество[/b]: WEB-DL 1080p | IVI, локализованный видеоряд
[b]Видео[/b]: 1920x1080, ~ 5 120 kb/s, 23.976 FPS, 8 bits
[b]Аудио (русский)[/b]: AAC LC, ~ 256 kb/s, 2 channels, 48.0 kHz | DEEP
[b]Аудио (русский)[/b]: AAC LC, ~ 256 kb/s, 2 channels, 48.0 kHz | AniStar
[b]Аудио (японский)[/b]: AAC LC, ~ 256 kb/s, 2 channels, 48.1 kHz | Оригинал
[b]Субтитры[/b]: Русские полные (отключаемые) | DEEP

[spoiler][URL=https://imageban.ru/show/2025/07/07/92efa66dc62e779d7f6e545140c72178/png][IMG]https://i6.imageban.ru/thumbs/2025.07.07/92efa66dc62e779d7f6e545140c72178.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/07/ddc3267a0c88e8904470a0b6bfb2387e/png][IMG]https://i4.imageban.ru/thumbs/2025.07.07/ddc3267a0c88e8904470a0b6bfb2387e.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/07/491e84b61da7cded3b20221c219a40ed/png][IMG]https://i8.imageban.ru/thumbs/2025.07.07/491e84b61da7cded3b20221c219a40ed.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/07/824a420078070bf3d3d8bccfce256c3b/png][IMG]https://i7.imageban.ru/thumbs/2025.07.07/824a420078070bf3d3d8bccfce256c3b.png[/IMG][/URL][/spoiler]', 7, '2025-08-26 20:47:43', NULL, NULL, 'https://i4.imageban.ru/out/2025/07/07/8d906ddfc84e547faf6b2fc1f4ce4e10.png', 'magnet:?xt=urn:btih:2dbc077db244d1e0628808c9916bfaee27e1d696&dn=%5BNOOBDLxFortunaTV%5DGachiakuta.1080p.WEB-DL.x264&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Ftr1.torrent4me.com%2Fann%3Fuk%3DlNoPelNiiv&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Fkorsars.pro%2Fbt%2Fannounce.php%3Fuk%3D04l189zLQI&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'gaciakuta-gachiakuta-01x01-06-iz-24-2025-web-dl-1080p-lokalizovannyj-videorad-d-p-deep-anistar', 0, 1, 1, 1, 0, '1756230463_47e11499f9fcf7a912e4.torrent', 1, 26, 16, 1783, '2025-08-26 20:47:48', 1);
INSERT INTO public.torrents VALUES (23, 1, '\x14ce1104720cc2be3920f249c5ff2d1b3586dc84', NULL, 6, 2990982005, 0, 'Тёмный демон / Tougen Anki [01x01-06 из 12] (2025) WEBRip 1080p от KORSARS | D | Reanimedia', '[b]Название[/b]: Тёмный демон
[b]Оригинальное название[/b]: Tougen Anki
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: сёнен, экшен, фэнтези
[b]Режиссер[/b]: Ато Нонака

[b]Возрастное ограничение[/b]: 18+ (рейтинг взят с Кинопоиска)

[b]О фильме[/b]: [i]Сики Итиносэ — подросток из XXI века. В его жилах течёт кровь адских существ, которые раньше терроризировали людей. В наше время потомки смелого мальчика-воина объединились в «Агентство Момотаро», которые охотятся за Сики и ему подобными. После битвы с этими «народными мстителями» Итиносэ узнает тайну смерти своего отца и решает не сдерживать зов своей крови — он поступает в академию для потомков демонов, где можно развить сверхспособности и дать отпор убийцам, которые прикрываются связью с легендарным героем.[/i]

[b]Страна[/b]: Египет
[b]Продолжительность[/b]: ~ 00:35:00 (серия)
[b]Перевод[/b]:
Дублированный (профессиональный) | Reanimedia (по заказу Кинопоиск)

[b]Формат[/b]: MKV
[b]Кодек[/b]: MPEG-4 AVC
[b]Качество[/b]: WEBRip 1080p* | KP
[b]Видео[/b]: 1920x1080, ~ 3 074 kb/s, 25.000 FPS. 8 bits
[b]Аудио (русский)[/b]: AAC LC, ~ 192 kb/s, 2 channels, 48.0 kHz | Reanimedia
[b]Аудио (японский)[/b]: AAC LC, ~ 192 kb/s, 2 channels, 48.0 kHz | Оригинал
[b]Субтитры[/b]: русские (хардсаб на надписи)

[spoiler][URL=https://imageban.ru/show/2025/07/20/44d981d9459686861a46d08b4f2dfca0/jpg][IMG]https://i2.imageban.ru/thumbs/2025.07.20/44d981d9459686861a46d08b4f2dfca0.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/07/20/67f3dd573f36f64b668cca2d73418a8f/jpg][IMG]https://i4.imageban.ru/thumbs/2025.07.20/67f3dd573f36f64b668cca2d73418a8f.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/07/20/c27d28646c96b46465909c8ffda7c0aa/jpg][IMG]https://i7.imageban.ru/thumbs/2025.07.20/c27d28646c96b46465909c8ffda7c0aa.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/07/20/3524945cf5639711152a34dff9bc75fd/jpg][IMG]https://i3.imageban.ru/thumbs/2025.07.20/3524945cf5639711152a34dff9bc75fd.jpg[/IMG][/URL][/spoiler]', 7, '2025-08-26 21:08:27', NULL, NULL, 'https://i4.imageban.ru/out/2025/07/20/86b9a8f24d7f2ca28a1dbb0fbabfce09.png', 'magnet:?xt=urn:btih:14ce1104720cc2be3920f249c5ff2d1b3586dc84&dn=%5BKORSARS%5D_Tougen.Anki.%5BS01%5D.1080p.WEBRip.x264&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=http%3A%2F%2Fkorsars.pro%2Fbt%2Fannounce.php%3Fuk%3D04l189zLQI&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce', 'temnyj-demon-tougen-anki-01x01-06-iz-12-2025-webrip-1080p-ot-korsars-d-reanimedia', 0, 1, 1, 1, 0, '1756231707_be5af3e0ff22bd062edf.torrent', 1, 11, 14, 236, '2025-08-26 21:08:29', 1);
INSERT INTO public.torrents VALUES (42, 1, '\xe3ea14aa4d776b7a5713c3b7f364553d96ac380a', NULL, 40, 17558239642, 0, 'Видеть / See [S01-03] (2019-2022) WEB-DLRip | LostFilm', '[b]Название[/b]: Видеть
[b]Оригинальное название[/b]: See
[b]Год выпуска[/b]: 2019-2022
[b]Жанр[/b]: фантастика, драма
[b]Режиссер[/b]: Френсис Лоуренс, Андерс Энгстрем, Стивен Серджик
[b]В ролях[/b]: Элфри Вудард, Джош Блэкер, Кристиан Камарго, Неста Купер, Хера Хильмар, Сильвия Хукс, Арчи Мадекве, Джейсон Момоа, Кристиан Слоун

[b]О фильме[/b]: [i]«Видеть» — это высокобюджетная постапокалиптическая драма потокового сервиса Apple TV+, отвечающая вкусам самой требовательной аудитории. Ее создателем выступил британский фильммейкер Стивен Найт, хорошо знакомый сериаломанам по гангстерской саге «Острые козырьки» и мистической драме «Табу». А съемки пилота возглавил Френсис Лоуренс, вдоль и поперек изучивший мир дистопического будущего по успешной франшизе «Голодные игры». Вместе с героями сериала «Видеть» мы переносимся на столетия вперед и знакомимся с выжившими после эпидемии остатками человечества, чьи моральные устои и уклад жизни могут повергнуть современного зрителя в глубокий шок. Кроме того, все сюжетные перипетии разворачиваются на фоне роскошных природных локаций, а главные герои шоу могут похвастаться отменной физической силой, собственной любопытной философией и непобедимой силой духа. А еще все они абсолютно слепые, что придает шоу изюминку и выделяет его на фоне похожих проектов. Главную роль в драме «Видеть» исполнил звезда «Аквамена» и «Игры престолов» Джейсон Момоа.

После того как эпидемия страшного вируса сократила население Земли до двух миллионов человек, а тех, кто выжил, лишила зрения, люди регрессировали до жизни в пещерах, языческих обрядов, охоты и собирательства. Зрение стало мифом, а любые разговоры о нем начали считаться ересью. Племена сражаются друг с другом, воздух в живописных лесах и заснеженных горах пропитан опасностью, охота на ведьм стала делом обыденным, а ценность человеческой жизни теперь понятие относительное. Однако и в таких суровых условиях люди продолжают любить и рожать детей. Главе племени охотников Бабе Воссу (Джейсон Момоа) повезло — у него родились сразу двое малышей. И оба, как назло, зрячие. Когда о такой ужасной аномалии, ставящей под угрозу все существование нового мира, узнает королева Кейн (Сильвия Хукс), поиски этой «злой силы света» становится ее целью, для достижения которой поборники «правильных» взглядов не остановятся ни перед чем. Тем временем Баба Восс со своей женой, детьми и группой отщепенцев отправляются на поиски еретика Джерламарела (Джошуа Генри), который, по слухам, обладает особым даром. Успеют ли они найти своего спасителя до того, как приспешники королевы их настигнут, и чем закончится противостояние «официальной власти» и верящей в силу света «оппозиции», если стороны схлестнутся в открытой схватке?..[/i]

[b]Страна[/b]:  США
[b]Продолжительность[/b]: ~00:58:00 серия
[b]Перевод[/b]: Профессиональный (многоголосый, закадровый) LostFilm

[b]Качество[/b]: WEB-DLRip | Бёдвар, lipovan
[b]Формат[/b]: AVI
[b]Видео[/b]: 704x336 at 23.976, XviD, ~1600 kbps avg
[b]Аудио[/b]:  Russian: 48 kHz, AC3, 2/0 (L,R) ch, ~192 kbps avg |Многоголосый закадровый, LostFilm|
[b]Субтитры[/b]: Russian (Forced)

[URL=https://imageban.ru/show/2021/12/14/2b15cc2e5f125395cb3793acf79d2b01/png][IMG]https://i3.imageban.ru/thumbs/2021.12.14/2b15cc2e5f125395cb3793acf79d2b01.png[/IMG][/URL][URL=https://imageban.ru/show/2021/12/14/0abce2d5c16c33a002f5ba8f681e261f/png][IMG]https://i6.imageban.ru/thumbs/2021.12.14/0abce2d5c16c33a002f5ba8f681e261f.png[/IMG][/URL][URL=https://imageban.ru/show/2021/12/14/e79f81290d32c43f88bd0fae7b71e418/png][IMG]https://i7.imageban.ru/thumbs/2021.12.14/e79f81290d32c43f88bd0fae7b71e418.png[/IMG][/URL][URL=https://imageban.ru/show/2021/12/14/b3a80d708890cf3b09cb6d83322d9356/png][IMG]https://i6.imageban.ru/thumbs/2021.12.14/b3a80d708890cf3b09cb6d83322d9356.png[/IMG][/URL]', 3, '2025-08-27 10:20:10', NULL, NULL, 'https://i7.imageban.ru/out/2022/08/26/e83328c4aab2e25e66c294e5e9ff03bc.png', 'magnet:?xt=urn:btih:e3ea14aa4d776b7a5713c3b7f364553d96ac380a&dn=See.LF_%5Brutor%5D&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'videt-see-s01-03-2019-2022-web-dlrip-lostfilm', 0, 1, 1, 1, 0, '1756279210_9475c0edccc2076079b0.torrent', 1, 14, 4, 123, '2025-08-27 10:20:12', 1);
INSERT INTO public.torrents VALUES (24, 1, '\xa02f120c97f8cd9de17e70e2425e26ad4c7d03ed', NULL, 12, 17727028766, 0, 'Безымянная память / Unnamed Memory [S02] (2025) WEBRip 1080p | AniPlague', '[b]Название[/b]: Безымянная память
[b]Оригинальное название[/b]: Unnamed Memory
[b]Год выпуска[/b]: 2025
[b]Жанр[/b]: Приключения, романтика, фэнтези, ранобэ, мультсериал
[b]Выпущено[/b]: Япония, Engi
[b]Режиссер[/b]: Кадзуя Миура
[b]В ролях[/b]: Ёсики Накадзима, Ацуми Танэдзаки, Такуя Сато, Кохэй Амасаки, Сюитиро Умэда, Тива Сайто, Аяко Кавасуми, Тинацу Акасаки, Титосэ Моринага, Дзюнъити Янагита, Юко Нацуёси, Дзюн Фукуяма

[b]О фильме[/b]: [i]История о юном рыцаре Оскаре, который с младенчества был проклят бесплодием. В двадцать лет он обратился к величайшей ведьме Тинаше, чтобы она помогла ему разбить чары. Та взялась сопровождать его и обещала помочь в течение года, но при одном условии: когда-нибудь парню придется ее убить. Вот только узы крепнут... Сможет ли он выполнить договоренность?[/i]

[b]Качество[/b]: WEBRip (1080p)
[b]Видео[/b]: MPEG-4 AVC, ~ 8000 Кбит/с, 1920x1080
[b]Аудио[/b]: Русский (AAC, 2 ch, ~ 192 Кбит/с), японский (AAC, 2 ch, 128 Кбит/с)
[b]Размер[/b]: 16.51 ГБ
[b]Продолжительность[/b]: 12 х ~ 00:24:00
[b]Перевод[/b]: Любительский многоголосый
[b]Субтитры[/b]: Русские, английские (софтсаб)

[spoiler][URL=https://fastpic.org/view/124/2025/0203/_c24396d0ae3c94cc655539f22d420696.png.html][IMG]https://i124.fastpic.org/thumb/2025/0203/96/_c24396d0ae3c94cc655539f22d420696.jpeg[/IMG][/URL][URL=https://fastpic.org/view/124/2025/0203/_306e87f10c1c987722371fef1efbca28.png.html][IMG]https://i124.fastpic.org/thumb/2025/0203/28/_306e87f10c1c987722371fef1efbca28.jpeg[/IMG][/URL][URL=https://fastpic.org/view/124/2025/0203/_1a7b4a1a5189d8f7fa0e32de81035a6e.png.html][IMG]https://i124.fastpic.org/thumb/2025/0203/6e/_1a7b4a1a5189d8f7fa0e32de81035a6e.jpeg[/IMG][/URL][URL=https://fastpic.org/view/124/2025/0203/_49f9d8bd6f908a0fcca7cf44ba221501.png.html][IMG]https://i124.fastpic.org/thumb/2025/0203/01/_49f9d8bd6f908a0fcca7cf44ba221501.jpeg[/IMG][/URL][/spoiler]', 7, '2025-08-26 21:10:41', NULL, NULL, 'https://i124.fastpic.org/big/2025/0118/fa/5b66d880f457e8081757f4b331b577fa.jpg', 'magnet:?xt=urn:btih:a02f120c97f8cd9de17e70e2425e26ad4c7d03ed&dn=%5BAniPlague%5D%20Unnamed%20Memory%20S02%201080p&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'bezymannaa-pamat-unnamed-memory-s02-2025-webrip-1080p-aniplague', 0, 1, 1, 2, 0, '1756231841_96c09fde3715766ed9a9.torrent', 1, 4, 1, 13, '2025-08-26 21:10:51', 1);
INSERT INTO public.torrents VALUES (25, 1, '\x996bbff99c0a649024a85ccfbc8a89853342ed81', NULL, 16, 2612639122, 0, 'Yuval Zorn - Masques Images Hommages [24-bit Hi-Res] (2025) FLAC', '[b]Название[/b]: Masques Images Hommages
[b]Исполнитель[/b]: Yuval Zorn
[b]Год[/b]: 2025
[b]Жанр[/b]: Classical
[b]Издатель (лейбл)[/b]: Rubicon

[b]Продолжительность[/b]: 01:12:47
[b]Формат/Кодек[/b]: FLAC
[b]Тип рипа[/b]: Tracks + booklet
[b]Битрейт аудио[/b]: Lossless
[b]Разрядность[/b]:  24 Bit/192 kHz

[spoiler="Трек-лист"]01. Nouvelles Suites de Pièces de Clavecin: Suite in A Minor, RCT 5. III. Sarabande (00:03:34)
02. Masques, Op. 34: I. Shéhérazade (00:11:21)
03. Masques, Op. 34: II. Tantris le Bouffon (00:06:24)
04. Masques, Op. 34: III. Sérénade de Don Juan (00:07:00)
05. Images II, L. 120: I. Cloches à travers les feuilles (00:04:25)
06. Images II, L. 120: II. Et la lune descend sur le temple qui fut (00:06:27)
07. Images II, L. 120: III. Poissons d''or (00:04:37)
08. Images I, L. 105: I. Reflets dans l''eau (00:05:40)
09. Images I, L. 105: II. Hommage à Rameau (00:06:50)
10. Images I, L. 105: III. Mouvement (00:03:46)
11. Nouvelles Suites de Pièces de Clavecin: Suite in A Minor, RCT 5. IV. Les Trois Mains (00:04:09)
12. Nouvelles Suites de Pièces de Clavecin: Suite in A Minor, RCT 5. V. Fanfarinette (00:02:40)
13. Nouvelles Suites de Pièces de Clavecin: Suite in A Minor, RCT 5. VI. La Triomphante (00:02:06)
14. Premier Livre de Pièces de Clavecin, RCT 1: VI. Sarabande (00:03:48)[/spoiler]

[spoiler="DRM"]foobar2000 1.5.5 / Замер динамического диапазона (DR) 1.1.1
-------------------------------------------------------------------------------
Анализ: Yuval Zorn / Masques Images Hommages
--------------------------------------------------------------------------------

DR Пики RMS Продолжительность трека
--------------------------------------------------------------------------------
DR13 -11.43 дБ -29.94 дБ 3:34 01-Nouvelles Suites de Pièces de Clavecin: Suite in A Minor, RCT 5. III. Sarabande
DR15 -0.54 дБ -21.74 дБ 11:21 02-Masques, Op. 34: I. Shéhérazade
DR14 -0.25 дБ -21.31 дБ 6:24 03-Masques, Op. 34: II. Tantris le Bouffon
DR14 -0.37 дБ -20.70 дБ 7:00 04-Masques, Op. 34: III. Sérénade de Don Juan
DR14 -7.19 дБ -28.02 дБ 4:25 05-Images II, L. 120: I. Cloches à travers les feuilles
DR15 -12.05 дБ -36.22 дБ 6:27 06-Images II, L. 120: II. Et la lune descend sur le temple qui fut
DR14 -3.27 дБ -22.98 дБ 4:37 07-Images II, L. 120: III. Poissons d''or
DR16 -2.16 дБ -25.43 дБ 5:40 08-Images I, L. 105: I. Reflets dans l''eau
DR18 -1.29 дБ -25.71 дБ 6:50 09-Images I, L. 105: II. Hommage à Rameau
DR13 -1.58 дБ -21.59 дБ 3:46 10-Images I, L. 105: III. Mouvement
DR14 -6.40 дБ -24.38 дБ 4:09 11-Nouvelles Suites de Pièces de Clavecin: Suite in A Minor, RCT 5. IV. Les Trois Mains
DR12 -8.17 дБ -25.56 дБ 2:40 12-Nouvelles Suites de Pièces de Clavecin: Suite in A Minor, RCT 5. V. Fanfarinette
DR12 -8.70 дБ -23.88 дБ 2:06 13-Nouvelles Suites de Pièces de Clavecin: Suite in A Minor, RCT 5. VI. La Triomphante
DR13 -13.50 дБ -31.90 дБ 3:48 14-Premier Livre de Pièces de Clavecin, RCT 1: VI. Sarabande
--------------------------------------------------------------------------------

Количество треков: 14
Реальные значения DR: DR14

Частота: 192000 Гц
Каналов: 2
Разрядность: 24
Битрейт: 4668 кбит/с
Кодек: FLAC
================================================================================
[/spoiler]', 8, '2025-08-26 21:13:21', NULL, NULL, 'https://i125.fastpic.org/big/2025/0722/9d/c1b9356c5f76be51f65bc4ed26b03c9d.jpg', 'magnet:?xt=urn:btih:996bbff99c0a649024a85ccfbc8a89853342ed81&dn=Yuval%20Zorn%20-%20Masques%20Images%20Hommages%20%282025%29%20%5B24Bit-192kHz%5D%20FLAC&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'yuval-zorn-masques-images-hommages-24-bit-hi-res-2025-flac', 0, 1, 1, 1, 0, '1756232001_e4c3ba8424d361946376.torrent', 1, 1, 0, 1, '2025-08-26 21:13:24', 1);
INSERT INTO public.torrents VALUES (27, 1, '\xb840408e201ba6b73926327d890039bbcd2aafd0', NULL, 19, 119866593, 0, 'Anna - Vera Baddie (2024) MP3', '[b]Название[/b]: Anna - Vera Baddie (2024) MP3
[b]Исполнитель[/b]: Anna
[b]Год[/b]: 2024
[b]Жанр[/b]: Hip-Pop/Trap
[b]Страна[/b]: Italiy

[b]Продолжительность[/b]: 00:47:08
[b]Формат/Кодек[/b]: mp3
[b]Битрейт аудио[/b]: 320 Kbps

[spoiler]01 - Intro
02 - Bikini (feat. Guè)
03 - ABC (feat. Tony Boy, thasup)
04 - Tonight
05 - I Love It (feat. Artie 5ive)
06 - BBE (feat. Lazza)
07 - Chica Italiana (feat. Sfera Ebbasta)
08 - 30ºC
09 - Vieni Dalla Baddie (Interlude)
10 - Miss Impossible
11 - Tt Le Girlz (feat. Niky Savage)
12 - Una Tipa Come Me
13 - Show Me Love (feat. Capo Plaza)
14 - Mulan (feat. Tony Effe)
15 - Why U Mad
16 - Hello Kitty (feat. Sillyelly)
17 - Amore Da Piazza
18 - I Got It[/spoiler]', 8, '2025-08-26 21:22:15', NULL, NULL, 'https://i.postimg.cc/hPW2HR79/front.png', 'magnet:?xt=urn:btih:b840408e201ba6b73926327d890039bbcd2aafd0&dn=Anna%20-%20Vera%20Baddie%20%282024%29%20%28by%20emi%29&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Fopentracker.io%3A6969%2Fannounce&tr=udp%3A%2F%2Fmartin-gebhardt.eu%3A25%2Fannounce&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=http%3A%2F%2Ftracker.bt4g.com%3A2095%2Fannounce&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=udp%3A%2F%2Fd40969.acod.regrucolo.ru%3A6969%2Fannounce&tr=http%3A%2F%2Fp4p.arenabg.com%3A1337%2Fannounce&tr=http%3A%2F%2Ftracker.mywaifu.best%3A6969%2Fannounce&tr=https%3A%2F%2Ftracker.expli.top%3A443%2Fannounce&tr=udp%3A%2F%2Ftracker.gigantino.net%3A6969%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce', 'anna-vera-baddie-2024-mp3', 0, 1, 1, 1, 0, '1756232535_9b98bca2c8d55f1e4923.torrent', 1, 8, 1, 27, '2025-08-26 21:22:17', 1);
INSERT INTO public.torrents VALUES (26, 1, '\x2921ccf67fbcb2515c890448922baa96e614c46e', NULL, 311, 2151679761, 0, 'VA - Music News For Forum vol.130 (2025) MP3', '[b]Название[/b]: Music News For Forum vol.130
[b]Исполнитель[/b]: VA
[b]Год[/b]: 2025
[b]Жанр[/b]: Pop, Dance, Other

[b]Продолжительность[/b]: 14:46:09
[b]Формат/Кодек[/b]: MP3
[b]Битрейт аудио[/b]: 320 Kbps

[spoiler]001. Юлия Кукина - Я поднимаю градус наш (03:25)
002. 5 Пятниц - Кома (02:06)
003. 220 KID & Justin Jesso - Sleep Alone (03:23)
004. AERTIAO & POLZA - Трачу (02:24)
005. AKNRO - Waikiki (03:05)
006. Albert Brite - Я хочу каждый твой атом (02:08)
007. Alison Goldfrapp - Strange Things Happen (04:45)
008. Ambra - Wenn Wir Uns Wiedersehen (03:25)
009. Amor Perdido - Anjos (02:10)
010. Anna Grey - Chat GPT (02:42)
011. ANRY feat. DVO & Afro Queen - Open Hearts (03:28)
012. Anton Fish - In My Arms (05:22)
013. Anton Fish & KBMS - Disco Balls (04:16)
014. Arkins & Castle J - Soul Lover (Retro Version) (02:18)
015. ASTHMA BOYS - День-ночь (02:19)
016. AUGUSTKID feat. One Trick Pony & TheA - Ain’t Coming Down (02:18)
017. ay-Mill & George Cooksey - Reasons (02:47)
018. Bad Balance feat. White Hot Ice & Руставели - Включай голову (04:17)
019. Barbara Tinoco - Devia Ter-Te Traido (02:54)
020. Beatrice Egli - So Oder So (SOS) (02:35)
021. Bianca Costa & Stony Stone - Va Bene (02:36)
022. Billy Gillies feat. Nu-La - Crystallize (Extended Mix) (04:03)
023. Bleu Soleil & Luiza - Soleil Bleu (Radio Edit) (02:12)
024. BLONDISH feat. The Pussycat Dolls & Busta Rhymes - Don''t Cha (02:54)
025. BLOODTHXRN feat. ANDRXRXSSO & Vamplug - CHEMICAL (01:43)
026. Bogdan DLP - Amandoi (03:02)
027. Bonneville - J''ai Tente Mais (03:05)
028. Bonnie McKee feat. Kiesza - Electric Heaven (03:26)
029. Bow Anderson - 1983 (03:40)
030. Braezz - Escape (01:40)
031. Carite - Тропою (02:33)
032. Carly Rae Jepsen - More (03:25)
033. Chips! feat. PVSARUN & COLACOCA - ALI KA (01:55)
034. Ciara - Drop Your Love (03:26)
035. Ciara - Made It (02:42)
036. Ciara & Tyga - Dance With Me (02:23)
037. Cimorelli - I''m So Blue (04:21)
038. Cinnamon Chasers - After All This Time (03:53)
039. Claudio Pina - Cuida Bem Dela (03:20)
040. Coconut Kid feat. Menza & 3ric - You For Me (02:27)
041. Culcha Candela - Drip (01:55)
042. Dallax - Love Don''t Let Me Go (Extended Mix) (03:14)
043. DaLuZ feat. CALEIDESCOPE & Lacey - Timeless (02:56)
044. Dan Korshunov - I Don''t Want To Know (02:08)
045. Daniel Caesar - Call On Me (02:49)
046. Daniel Santoro & Gianluca Dimeo - Rescue Me (02:15)
047. Decabrsky & LAPA - Go (02:58)
048. DIM - Хочется кричать (03:31)
049. Dirty Signal & Ramsey Westwood - Come With Me (Extended Mix) (04:05)
050. DJ David Braun - I Have A Dream (05:53)
051. DJ DimixeR & Utmost DJs - Interaction 2.0 (02:28)
052. Dj Kapral & Osya - In The Heat Of The Night (03:09)
053. Dj Malvado & Yuri da Cunha - Kweti (04:14)
054. Doja Cat - Jealous Type (02:44)
055. DooMee & OG Buda - FU (03:26)
056. Ядрим & САМЕДЛИ - Фарфорово (02:27)
057. Fahjah - Vamos (Extended Mix) (03:00)
058. Fakfame - До свидания (01:53)
059. FIREMVN feat. BAIKVL & !KNOW - Little Dream (02:17)
060. Florin Salam - Ce-A Fost, A Fost (03:34)
061. Frank Miami feat. Alan Walker & Jay Kalyl & David Muguercia - Mi Fe (03:24)
062. FREDRIK - Ohne Dich (02:44)
063. Funkaus - Otherside (02:56)
064. Garnic & Ben Hutcheson - Think of Me (02:47)
065. GiGi & TUSOVKA - Милый парень 2.0 (02:06)
066. Girls Like You & Marinesse - Paradise (01:58)
067. Glitter Dream feat. Alex Parker & Dom Elias - Speak My Language (03:15)
068. Golles - Наступит закат (02:16)
069. GOSHU feat. TUSOVKA & FanEOne - Деньги 2.0 (02:36)
070. Grind - Давай (02:35)
071. Guilherme & Benuto feat. Ana Castela - Mesma Lingua (Ao Vivo) (03:03)
072. Holly feat. ROBINS & Michael FAY & LYON - Close To You (02:54)
073. Hyper VIPER feat. Aris & Garage King - Anxiety (02:02)
074. INDEX - Она не поймет (01:59)
075. INGO feat. Little Venice & Niklas Linzer & Rufus Palma - Alright (02:33)
076. ISAXO - Оставляю (02:15)
077. Iuliana Beregoi & Ana Beregoi - Tutti Frutti (01:53)
078. Ivo Martin - Fotodump Juli (02:21)
079. Jadanae - Loin De Moi (03:10)
080. Jador & Ministerul Manelelor - O Inima Captiva (02:35)
081. Jaman T - Молитвами (02:51)
082. Jay Kim - Mariana (02:57)
083. Jaytor & Oceanika - Stin Paralia (03:58)
084. Joel Corry & Jem Cooke - Daydream (03:21)
085. Joel Corry & Jem Cooke - Daydream (Original Mix) (04:37)
086. John Reyton - Forever or Never (03:19)
087. Johnning - Funeral (02:46)
088. Jonah Marais - Heart''s Back Home (02:39)
089. Jonny Mahoro - Marmeladenglas (02:06)
090. JUGHEAD - 510 (01:43)
091. Julacrit & inscure - Forever (03:06)
092. Juliette Armanet & Nit - Partir Un Jour (Club Mix) (03:14)
093. JVKE - Oh To Be Loved (03:46)
094. Kavun feat. KRYKE & MODERN U - GIN (02:03)
095. Kayef - War Das Nur Der Sommer (02:54)
096. KCIDY - Maisons Vides (04:02)
097. KENSHI - Feel (02:47)
098. Kerbes - Демоны (02:11)
099. Kid Cudi - Mr. Miracle (03:13)
100. Kid On The Block - Mysterious Girl (02:03)
101. KOLYNIS - Deadline (02:40)
102. Kout - Malevich (01:59)
103. KOVII & BAGUROV - FIRE (01:59)
104. KREC - Нежность (Index-1 Remix) (02:39)
105. KUOKKA feat. Repulse & Jannik Vistisen - Deep End (Extended Mix) (02:34)
106. L I F E-L I N E & Bella Renee - Embers (03:07)
107. Lance Laris & AnyaAnya - Somebody That I Used to Know (03:01)
108. Lastfragment - Midnight Angel (01:58)
109. Laurentius & Belle Humble - So Amazing (02:11)
110. Leigh-Anne - Burning Up (02:07)
111. Lelya - Гипноз (02:10)
112. Lemaier & Gulyashik - Самокатеры (03:03)
113. Lihtz & K Camp - Crash Out ATL RMX (03:20)
114. LIKANIN - Грустная песня (02:16)
115. LIL MORTY - Sicko (01:58)
116. linequat & Pherick - Stuck on You (02:40)
117. Lizzen feat. Jacquees & Saint Lamaar - Work It Out (Sweet Thing) (02:57)
118. Lofi Bricks & Lo Fi Hip Hop - Comeback (03:30)
119. LTSO feat. Echolom & То.ска - More (03:07)
120. Luana Rey & Malcom Beatz - So Um Amor (03:54)
121. M. Pokora - Quand Meme (03:14)
122. Maggie Lindemann - Spine (02:27)
123. Mannymore & Orfa - Serotonin (02:40)
124. Marius Nedelcu feat. Giulia - Rain (Index-1 Remix) (03:22)
125. Mark Forster - Zeitmaschine (02:17)
126. Mark State - Collapsing (02:52)
127. Marlo Grosshardt - Jetzt Oder Skigebiet (02:24)
128. MARSTEREON & PLYAJ - Friends (02:20)
129. Maryy & W0rsty - Волосы (01:45)
130. Mathieu Koss & Gillian Hills - Zou Bisou Bisou (02:28)
131. Matoma & Good Humans feat. Kunfetti - Good To Be Me (03:21)
132. MATREEX - Для неё (02:36)
133. Matthew Nolan - Cross My Heart (02:40)
134. Max Giesinger - Du Warst Es Gewesen (02:30)
135. MC Кальмар & Фуголь - Оракул (02:02)
136. Medkoff & The Smell of Males - Mirage (02:48)
137. MEERON - На Бали (02:24)
138. METRO PRO & Уверенный - Да ну (03:44)
139. Michael Roman - Radioactive (03:07)
140. MirON42 - Девочка сказка (02:51)
141. Miyagi & Эндшпиль - Summer time (03:56)
142. Molly Warburton - Better Me (03:58)
143. Mon Cher Guy & Alice Et Moi - Les Chevaux Blancs (02:39)
144. Moretti feat. OVERHOUSE & Mr AllCash - Better Now (01:58)
145. Morgan Page & Luma - It Goes Dark (02:53)
146. MOTi feat. Amero & Hallasen & Tuhaste - Replay (03:36)
147. MUPHUS - Siyaphakama! (03:17)
148. Nerlov & Zenzile - Vie De Reve (04:09)
149. NIOW & Moody Violet - Reminds Him of You (02:15)
150. noa - Птицы (02:16)
151. Nochka - Adieu Les Cons (02:34)
152. P. PAT - На луне (02:33)
153. PaulWetz - Will Noch Nicht Heim (02:55)
154. Pierse & Raphael DeLove - Moving Along (02:35)
155. Pixie Lott - Coming Of Age (03:06)
156. Placcebo Beats - Make feel (02:00)
157. Purple Guns - Starz (02:24)
158. PUSHITALE - Плюшевый медведь (01:55)
159. PVNCHENKO - Утро (02:46)
160. Retroval - I Have (07:56)
161. Reznikov & ARVST - Someone to Love (02:20)
162. Rihanno - Sunrise (01:42)
163. Robin Schulz feat. CLOVES - Old Friend (KOPPY Extended Remix) (03:11)
164. Ruel - The Suburbs (03:09)
165. Ryvix & Emmett Zetto - Duduk (02:21)
166. Sagath & UMERTVIE - Тролль (04:06)
167. Sakur & PRESCO LUCCI - Miatti Swag (02:20)
168. Samuel Miller feat. Jane Good & Juli Mala & Blue My Mind - Blue Skies (02:27)
169. Sanch & Niwka - Взгляд (02:56)
170. Sans Lactose - Dania (02:16)
171. Sans Lactose - Side Story (02:46)
172. Saudion & 10NA - Каблы (02:06)
173. SavannaOki - Быть лучше (02:28)
174. Shamil feat. CGVE & FER MCQUEEN - Boom (Extended Mix) (03:20)
175. SHMELYOV - Never Stop (02:32)
176. Sigrid - Fort Knox (03:19)
177. SIKORO & VIRANA - This Love (02:10)
178. SKLЯR Алексей Скляренко - Дача (02:45)
179. Skrizhali - Твоё божество (07:14)
180. Skuth - Sophie (02:10)
181. SMKHN - Exotic (02:35)
182. SOFFIE - Rauber (02:21)
183. SONNET - Хочешь я к тебе приеду (02:44)
184. Split Avenue - In My Arms (02:38)
185. SRNDE - Ordinary Day (02:40)
186. SRNDE - Save Tonight (02:36)
187. SRNDE - She''s Not There (02:05)
188. Steerner feat. Mangoo & Heleen - Feel My Love (02:27)
189. Stefre Roland - Back It Up (02:24)
190. STRACURE - Heathens (01:57)
191. Studio Deep & Julieka - Возьми меня за руку (02:34)
192. Subbota - Дым бомбим (Pasha Shock Remix) (03:10)
193. Sunset Groove - Taste of Your Love (02:39)
194. SXUNDMANE & Wharoxmane - Sweet Dreams (01:41)
195. Tim Dian feat. Sharapov & Agata Bayu - La La Love (01:48)
196. Tkimali - Драйв (02:17)
198. Toby Rose & Jay Mason - Monday (02:16)
199. Tommy Cash - Ok (02:32)
200. Tori Kelly & Lucky Daye - Make A Baby (02:57)
201. Tout Pour La Lumiere & Alex Doux - La-haut (Julian) (03:36)
202. Tout Pour La Lumiere & Marie Alexandre - Si Seulement J''avais Su (Elise) (03:02)
203. TRFN & Garage King - Just Can''t Get Enough (02:06)
204. UPCENT - Shattered Glow (02:08)
205. V3R - Untold Story (02:19)
206. Velvet Sky - Superstar (02:39)
207. Venteris & Maunavi - Relax, Take It Easy (02:22)
208. Venus VNR - Absent (01:51)
209. WAYANAKA & Drish Vee - Maseeha (Extended Mix) (04:58)
210. Young Double & Puto Portugues - Linha Do Equador (03:32)
211. Z’watte - Падаем (02:15)
212. Ze Neto & Cristiano - Dubai (Ao Vivo) (03:03)
213. Zimzam - Starfall (02:47)
214. Алексей Ордынский - Потерянные письма (03:50)
215. Алексей Романюта - Сосновый бор (03:23)
216. аннушкаа - Зима (02:25)
217. Аркадий Дар - Тили тили тесто (03:37)
218. Браво feat. Vengerof & Fedoroff - Московский бит (Index-1 Remix) (03:50)
219. БРАТУБРАТ - Груз (03:55)
220. Валерий Власов - Добрый вечер (03:01)
221. Вера Снежная & Владимир Волжский - Музыка дождя (04:51)
222. Вика Ветер & Артем Авагимов - Молодость (04:14)
223. Вия Тори - Северная столица (02:50)
224. Где Ноар & Лекс 1707 - Казантип скачать (02:22)
225. Гиббон Аи-2 - Тeмная ночь (03:14)
226. Даня Тихонов - Москвичка (02:01)
227. ДЕРЕЗА & KILLTHEMALL - Убереги (02:55)
228. Джеки-О - Mirage (02:18)
229. Дима Фантомас - Та девчонка (04:19)
230. Диман Брюханов - Заживем (01:48)
231. Дмитрий Голд & Stasia Sax - Детство (04:11)
232. Дмитрий Гревцев - На шестерке еду я (02:35)
233. Друнк - Хочу сказать (02:33)
234. Дуэт Римские - Миллионами (03:52)
235. Елена Гвоздилина - Странная (02:59)
236. Елена Филатова - Подсолнухи (04:00)
237. Жора Князь - Ром пом пом (03:14)
238. Игорь Балан - Разлучница (03:13)
239. Илья Киреев - Сигнал (03:21)
240. ИЩУ - Город (01:44)
241. Карандаш - Бензин (02:19)
242. Карандаш - Гимнастик (02:50)
243. Карандаш - Заморачиваюсь (02:50)
244. Карандаш - Прекрасный день (02:38)
245. Карандаш - Темщица (03:34)
246. Карандаш - [товарищ] ача (02:05)
247. Карина Итерман - Милфа (02:36)
248. Катя KIKI - Стоп слезы (02:45)
249. Каузация & The Villars - Движение (02:05)
250. КИМ - Ламбада (01:51)
251. Колоницкий & PRIDVOROVA - Прикинь (02:17)
252. Константин Макеев - Одно касание (02:50)
253. Константин Шевченко - Костерок (03:24)
254. Криминальный бит - Выгодно (03:55)
255. Криминальный бит - Доверенные лица (02:44)
256. Криминальный бит - Из города (03:43)
257. Криминальный бит - Коммерсы (03:45)
258. Криминальный бит - Косой (02:44)
259. Криминальный бит - Лимон (02:49)
260. Криминальный бит - Манеры (02:25)
261. Криминальный бит - Проигрыш (03:02)
262. Криминальный бит - Этажи (02:41)
263. Кровь цвета молока & TAKETAKE - Котики (02:34)
264. Ксюшенька - Только не с тобой (02:00)
265. ЯRKAЯ - Вспышка (02:14)
266. Леся Полищук - Не идеальны (02:37)
267. ЛИЛА & Obvmv - Немножко (02:28)
268. Лимо - Правда (01:48)
269. Лора - Не помню (02:19)
270. Лофи - Белый ветер (02:04)
271. ЛУКА & Aygun - Досада (02:27)
272. Мартини & RINAVI - Кольцевая (02:34)
273. Михаил Барков - Моя хорошая (03:57)
274. Мура - Я не могу спокойно жить (02:32)
275. МЫ - Фильм (Demo) (01:08)
276. Наблюдатели - В сторону! (02:26)
277. Нагора - С днём рождения (03:12)
278. Нагора - Так вот и живём (03:39)
279. Нагора - Шарик (03:12)
280. Найтивыход - 15 минут назад (02:28)
281. Найтивыход - 68 собак, на которых уехал вы соглашаетесь (02:25)
282. Нани Ева - Половина (03:56)
283. Настасья Самбурская - Безответственная (03:13)
284. Настя Елфимова - Кто меня поймёт (04:08)
285. Настя Князева - Паранойя (02:39)
286. Ника Терентьева - Край северный (03:43)
287. Никита Сухой & Айриш - Хочу богача (02:19)
288. НОРА НОРА feat. Бригадный подряд - Демка (02:46)
289. Нэйти - Пьяная (02:14)
290. О! Марго - Поговори (02:11)
291. Олег Чубыкин - Вечная любовь (Radio Edit) (03:39)
292. Олтин Бэйз - Слететь с катушек (01:53)
293. Проект Поножовщина - Падаю вниз, смотри (02:48)
294. Простор & Клим - Бывает одиноко (02:05)
295. Пэссо & Cherkasov - Барная 2.0 (02:45)
296. Рамс - Panacea (02:42)
297. Руслан Арыкпаев - Я машина (02:11)
298. Свет нового солнца feat. Донэра & Мёртвые Осы - То, что даровано нам (05:08)
299. Сергей Бобунец - Вечно молодой (Артём Пора Домой Remix) (03:20)
300. Сергей Летрих - Белое такси (03:11)
301. Слава Басюл - Небо-любовь (03:06)
302. Стас Ярушин - Мне так хотелось (02:58)
303. Таня Вайт - Казино (02:06)
304. Тимур TIMBIGFAMILY - Малолетки (02:28)
305. Троян Хорс - Гиперсомния (03:20)
306. Шико - Городской сумасшедший (03:11)
307. ЭВИН - Сон (02:32)
308. Эклипс - Дели на тысячи (03:33)
309. Эльдар Аленуров - Для тебя я, суета (02:39)
310. Errxrbaby & DVRKSOUL - Better Now (02:03)
311. Юрий Кость - Зазноба (02:44)[/spoiler]', 8, '2025-08-26 21:20:38', NULL, NULL, 'https://i125.fastpic.org/big/2025/0826/00/c845acd466608323fa7918cb7771bd00.jpg', 'magnet:?xt=urn:btih:2921ccf67fbcb2515c890448922baa96e614c46e&dn=VA%20-%20Music%20News%20For%20Forum%20vol.130&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fbt02.nnm-club.cc%3A2710%2F002febefb81b8a4e7a1b335b16820f33%2Fannounce&tr=http%3A%2F%2Fbt02.nnm-club.info%3A2710%2F002febefb81b8a4e7a1b335b16820f33%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce.php%3Fsize%3D2151679761%26comment%3Dhttp%253A%252F%252Fnnmclub.to%252Fforum%252Fviewtopic.php%253Fp%253D12784239%26name%3DVA%2B-%2BMusic%2BNews%2BFor%2BForum%2Bvol.130%2B%25282025%2529%2B%255BMP3%257C320%2BKbps%255D%2B%2526lt%253BPop%252C%2BDance%252C%2BOther%2526gt%253B&tr=http%3A%2F%2F%5B2a01%3Ad0%3Aa580%3A1%3A%3A2%5D%3A2710%2F002febefb81b8a4e7a1b335b16820f33%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'va-music-news-for-forum-vol130-2025-mp3', 0, 1, 1, 1, 0, '1756232438_a3d68f85bcbdaf5ef3c5.torrent', 1, 24, 7, 50, '2025-08-26 21:21:01', 1);
INSERT INTO public.torrents VALUES (28, 1, '\x57dacaef6b832e74fd09a2fc548d841c7380b037', NULL, 13, 210947585, 0, 'Goose - Chain Yer Dragon (2025) MP3', '[b]Название[/b]: Chain Yer Dragon
[b]Исполнитель[/b]: Goose
[b]Год[/b]: 2025
[b]Жанр[/b]: Pop, Rock
[b]Издатель (лейбл)[/b]: Goose, in association with No Coincidence Records

[b]Продолжительность[/b]: 01:27:20
[b]Формат/Кодек[/b]: MP3
[b]Битрейт аудио[/b]: 320 Kbps

[spoiler]01. Hot Love & The Lazy Poet (00:05:30)
02. Madalena (00:04:36)
03. Royal (00:05:56)
04. Turbulence & The Night Rays (00:09:33)
05. Echo of a Rose (00:06:26)
06. Mr. Action (00:05:39)
07. ..... (00:00:47)
08. Dr. Darkness (00:05:57)
09. Empress of Organos (00:10:12)
10. Jed Stone (00:08:03)
11. Rockdale (00:07:58)
12. Factory Fiction (00:16:43)[/spoiler]', 8, '2025-08-26 21:24:00', NULL, NULL, 'https://i125.fastpic.org/big/2025/0816/cb/a48f5efa02ed45428b59e2634a4bc9cb.jpg', 'magnet:?xt=urn:btih:57dacaef6b832e74fd09a2fc548d841c7380b037&dn=Goose%20-%20Chain%20Yer%20Dragon%20%282025%29&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'goose-chain-yer-dragon-2025-mp3', 0, 1, 1, 1, 0, '1756232640_ab1039c906026be03ffb.torrent', 1, 7, 1, 11, '2025-08-26 21:24:02', 1);
INSERT INTO public.torrents VALUES (29, 1, '\x5ed93dd81f8b0f57ab11034ec3249f579436b24a', NULL, 305, 1928760313, 0, 'VA - Music News For Forum vol.129 (2025) MP3', '[b]Название[/b]: Music News For Forum vol.129
[b]Исполнитель[/b]: VA
[b]Год[/b]: 2025
[b]Жанр[/b]: Pop, Dance, Other

[b]Продолжительность[/b]: 13:14:57
[b]Формат/Кодек[/b]: MP3
[b]Битрейт аудио[/b]: 320 Kbps

[spoiler]001. Elliya - ZBL (01:58)
002. 3EED - Последний танец (02:13)
003. Ad Voca - Turn It Back Around (01:52)
004. Adjo - Девочка из сказки (01:53)
005. Akha - Ты для меня (01:58)
006. Alex Bold - Монеты звенят (02:26)
007. Alex Coffman - Такси (02:22)
008. AllExe - Звёзды любви (03:12)
009. ANNA ISA & Rendow - Ай люли 2.0 (02:09)
010. Anton Lacosta & Novoland Music - Open Your Eyes (02:33)
011. Anya May - Прощай, лето (04:17)
012. AP93 & Madia - Освободи (01:57)
013. ARARAT - Big Love (03:26)
014. Arthur Dubrovsky & Энди Рид - Макарена (02:46)
015. ARTIS - Больше не скажу люблю (02:25)
016. A''TaiNA - Дикая фиалка (02:58)
017. BadTrip Boys - Жопа (03:31)
018. Baho Khabi - Золото (02:46)
019. 2zMun - Turn Of The Lights (02:10)
020. BARSY - Имя на подъезде (02:35)
021. Bearwolf - Топим (02:02)
022. BIRUKOV - Аллегория (03:34)
023. BlackOpium - В этой темноте (02:29)
024. Boni.ka - 120 ударов (Speed Up) (01:50)
025. Brant - Треугольник (03:02)
026. BROZY - Выбор (01:52)
027. Cafard - Всё не так (02:00)
028. CARAPACEE - Не спит (01:56)
029. CEOSANTANA - Walk Down World (02:36)
030. ChyGun - Алгоритмы (01:42)
031. Cocorin - Девочка на миллион (02:43)
032. Cold Carti - Жизнь будет долгой (02:02)
033. Cupriclub & Bipolarnaya - Упасть (02:27)
034. Cvetocek7 - А ты меньше гуляй (01:32)
035. Dance Bridge - На своей волне (02:19)
036. Dari - Шепотом (02:37)
037. Daria Bis - Голосом (02:47)
038. DeBoy - Свежий софт (01:54)
039. DIANESSIA - Сыграем в прятки (02:28)
040. Dilara Redner - Личная история (03:33)
041. Dima Bold - Amore (03:26)
042. Dimer - По правилам (02:03)
043. DiUv & Joodey - Розы (03:32)
044. Dj Antonio - I Can Get You (02:49)
045. DJ Блокnote - Весенняя гроза (02:47)
046. DVOYE - Важно ли (03:05)
047. Dzhenis - Я подарю тебе пламя (02:48)
048. Eddie Mono feat. NADIA & ADJ KHRAMOV - По парам (02:08)
049. EgorGayduk - Валенки (03:00)
050. Balencia - В тонере (02:20)
051. ENIJAY feat. ISVNBITOV & Alfredovich - Вечера 2.0 (02:22)
052. EVASHA - ДНК (02:01)
053. Filami - Заклятие (02:03)
054. FONFORINO - Молодые звезды (01:47)
055. GABIART - С той дамой (02:06)
056. Gasswonder - Первым (02:38)
057. German Geraskin & Дипсай - Mammi (01:57)
058. G-Nise - Мысли о тебе (02:16)
059. Gorilla Zippo - Танцую до утра (03:29)
060. GOVORUHA - Да, я пьяный (02:23)
061. GRECHANIK - Зеленые глаза (02:42)
062. Hamood feat. Denis Bravo & Hitbeat - Мои мечты-Твоя любовь 2.0 (01:51)
063. HELLOVERCAVI & Mortalxo - Калыван Кляйн (01:53)
064. HUGGA - Процесс оптимизации (01:59)
065. iamsorry & Lovesence - Мое (02:56)
066. idonower - Embargo (01:57)
067. IGONIN - Без тормозов (03:27)
068. IGOR - Бутовски (02:02)
069. ILIF & DAN WHITE - Береги душу, пацан (02:17)
070. ILLUZIA & LUVIE - Просто люби (02:56)
071. ISTERIA - Кукла (02:31)
072. Istokiya - Миром (02:05)
073. IVAN VALEEV - Падала звезда (02:27)
074. Jahaik - Melancholia (02:10)
075. Jahaya feat. Ctrl+A & Remi - Somebody That I Used to Know (04:28)
076. Just Liev & Vadim Smirnov - Не принадлежу себе (03:06)
077. Justin Bieber - Yukon (Mentol Cover Remix) (02:57)
078. JZA - Двое понятых (01:44)
079. KARMA - 2L (01:58)
080. KARNAIN & NASIM - По небу (02:42)
081. Ken - Хочу тебя (02:00)
082. KINO.A - Ты мой дом (04:14)
083. KIPROK - Зашмокал (01:59)
084. Koss & Влада Ушакова - Лето (02:12)
085. Kostya Bravo - Помпеи (02:33)
086. KUDREE - Порочный круг (03:07)
087. KUOKKA feat. Repulse & Jannik Vistisen - Deep End (01:58)
088. Kutluev & Саша West - Ой, мама (02:00)
089. KVANTVM - Не твоя вина (02:25)
090. Kvdych & DARIA - Позови меня (02:10)
091. kyNZai - Мне не хватает (01:44)
092. L1S feat. 2ndra & Pald1k - Ночь (03:10)
093. Lintrepy & ATi - Bright Beam (02:43)
094. LOGUNOV - Пополам (03:07)
095. L''One & Минаева - Убежим (03:17)
096. LUV3MEMORE - H00LI2010 (01:33)
097. M1LL - Любовь внутри (02:29)
098. Maalika - Гори 2.0 (02:21)
099. MaRi - Приора (02:20)
100. Marina MJ - Аффирмация на любовь (03:06)
101. Marine Manasian - Мел и мята (04:08)
102. Marlboro - Кассета лета (02:29)
103. Martin Jensen & LAWRENT feat. SACHA - Follow Me (Extended Mix) (03:41)
104. Martin Space - Не такой (01:44)
105. Matvey Emerson & YUONA - Gypsy Woman (02:14)
106. MEH-TEE - Сладкий яд (02:39)
107. Meqa - Кубики (01:46)
108. MGGORDEEVA - Да (03:22)
109. Mira Moore - Yuan (02:03)
110. MLK+ feat. Ploty & Ameriqa & O.T - Морская (03:17)
111. Mmartha - Просто (03:01)
112. MODERN U feat. NLO - Ty и TУ (Remix) (02:00)
113. MOLADA - Половину (Speed Up) (02:39)
114. Molodec & СПАССКИЙ - Х.П.Л. (За одно) (02:22)
115. morphineee - МайБах (01:36)
116. MORROZOVA - Подруга сфоткай (02:24)
117. Mosquit - To Be And Not To Seem (02:01)
118. MUJEVA feat. Keneli & Zhiro - Прокатила (03:13)
119. Mult96 & Netsignala - Как ты горишь (02:24)
120. Musica Di Strada - Сердце тянет в Краснодар (02:32)
121. My Emmie - Моя любовь (02:14)
122. Nacaratt - Битмейкер (03:49)
123. Navil’ - Люблю тебя (03:12)
124. NE KENT - Где-то ты (02:42)
125. NEUROA - Pretty Toy (02:23)
126. Nevika feat. Alena - Доля (02:37)
127. Nick Riin - Красный флаг (02:31)
128. NIkklo & Aliso - Смысла нет (03:04)
129. Nikulin - Остаться в моей памяти (02:15)
130. NIMANI & Глеб Картер - 12345 (02:31)
131. NOBL TT - До конца (01:31)
132. Nodahsa - Меркантильная (02:04)
133. Odddi & iskrit - Пой (03:18)
134. OG Golova - Топчу танцпол (02:26)
135. OKSII - Потанцуй со мной (01:53)
136. Oleg Skok & ЕСЯ - Вверх (01:33)
137. OLISHA - Принцесса (03:03)
138. OLISHA - Фавелы (02:46)
139. ONEIL feat. KANVISE & FAVIA - Forever Young (03:10)
140. OnWr1Te & kindiplugg - Свага шмотки (01:52)
141. Opium - Казино (02:33)
142. Otushey - Welcome D (02:17)
143. OWEEK - Don''t Stop (OST Жизнь по вызову) (02:02)
144. OWEEK - On My Mind (OST Жизнь по вызову) (02:16)
145. OWEEK - This Is Love (OST Жизнь по вызову) (02:39)
146. OWEEK - Under the Moon (OST Жизнь по вызову) (02:01)
147. OYAN - Пройдет (02:46)
148. Panfilov Pavel & Re3 - Мы пытаемся сбежать (02:40)
149. Pappillio - Тити (01:58)
150. Patron Hanzo - VITAL (03:20)
151. PEGAS - Быть собой (01:15)
152. PLEMHOZZ feat. НеТуПи - Голос города (03:39)
153. PMbaby - Люблю и Ненавижу (01:57)
154. POLINA CHILI - Переживем (02:43)
155. Polina Posh - Потерять, чтобы любить (Slowed) (02:44)
156. Polives & Vshumilov - Пойдешь ли ты со мной (02:01)
157. Press2p - Tortuga (02:00)
158. Punkdepo - Прости (03:14)
159. Pyatno - Загоны (02:40)
160. R.Riccardo - Не удержать (02:26)
161. Rahyaboy feat. SLAVA MAIN & COIN KUSH & XROOST - Газ в пол (01:50)
162. Rambl - Выше (01:42)
163. Rambl - Колизей (01:49)
164. Red Square & REYA - High All Day (02:41)
165. Red Square & REYA - Только ты (03:04)
166. Red Square & REYA - Химия (02:34)
167. RIIJI - Пусть так (03:09)
168. Roos & Biggie Mote - Лайнап (03:04)
169. Rose Gray - Just Two (Clementaum’s ABRISA Remix) (04:16)
170. Roxxy - PLINTU$ (01:50)
171. RUD!N - Parfume (01:36)
172. SaintPrince 52 - Акула (01:49)
173. SEGAKIM - Барыня (01:36)
174. Serg Veanarak - You Сan Сatch Me (03:11)
175. SERPO & FOREN - Голяк (03:20)
176. SERPO & FOREN - На другого (02:55)
177. SHOTA - Ninao (02:06)
178. Sofi feat. DAYRA & Timochka - VIP (01:51)
179. STAGE - Занесло (02:50)
180. Sugar Clock - Меня не хватит (01:45)
181. Sula Fray - Песни прожитые вместе (02:51)
182. Sunlike Brothers & Nikki - Never Forget You (02:23)
183. Supermora MC - Хулиган (02:19)
184. Suramura - Штраф (02:27)
185. SVITA - Не ходи (03:19)
186. Targi & JEMI - Пучок (02:46)
187. TASSO - Таю (03:23)
188. thekrk & FAGIRA - Платье голубое (02:38)
189. TRETIAKOVA - Дура (02:40)
190. Triplo Max - Shadow (PET3RPUNX Remix) (02:29)
191. Turan Tish - Ч (02:01)
192. UGAROV - Валим (02:20)
193. Ulikevlone - Может позже (01:32)
194. umirai & зефир. - Любовь для (03:03)
195. Vard - Нотр-Дам (02:14)
196. Voided & НЮДС БОЙ - За руку (03:19)
197. VTORNIK - Бейби, где твой бойфренд (03:26)
198. VTORNIK - Джони Босс (02:57)
199. VTORNIK - Мусора Таиланда (02:20)
200. VTORNIK - Отец (03:04)
201. WallClan & TEMPOTEM - Made in Russia (02:39)
202. Warthogs Robber & Virexon - Paradise (01:53)
203. WETKID - Постой (02:34)
204. White Queen - Пускаешь слезу (02:14)
205. YARKI feat. BIG Eighth & Broski - На прицеле (02:14)
206. Yegor Gavrin - Бессонница (04:00)
207. YYOZ PRINCE & ARITA - Просто Vibe (02:32)
208. ZAIRA MISS - Слёзы (02:46)
209. Zlata Mai - Велюровые моря (02:48)
210. Аври - Домой (02:15)
211. Акапелла Экспресс - Белый берег Kpыма (03:24)
212. Александр Балыков & Этери Бериашвили - Рядом с тобой (03:57)
213. Алёна Апина - О как! (03:28)
214. Алла Усманова - Намечтала (02:13)
215. Анастасия Зыкова - Все наоборот (02:59)
216. Ани Лорак & Игорь Крутой - Такси (03:28)
217. Анна Голд - Ты же помнишь (03:57)
218. Анна Калашникова feat. Tom Corsa & Frost & DJ Hot-Line - Седая ночь (02:36)
219. Анна Пингина - Огни (04:38)
220. Анна Побединская - Солнце моё 2.0 (Лезгинка) (02:38)
221. АПВ - Тает (03:22)
222. АртБард - Поднимая ветры-1 глава-Карта (02:45)
223. Артём Качер & TONI - А может быть (03:20)
224. Артём Качер & Миша Марвин - Иду (03:47)
225. АТМА - Сломанная игрушка (02:43)
226. Аш 23 - Сияй (02:24)
227. БАНДАЖ - Бесы (02:04)
228. Бардакк - Черная пурга (02:45)
229. Басявый & Kllin - Страха нет (03:19)
230. Белое злато - Полюбила (03:37)
231. Блокбастер & Супердетки - Ну и что ж (Version 2.0) (04:31)
232. Булат - Улиц солнечная сторона (02:28)
233. Вера Егорова & THE BIG BUDDY BAND - В моей голове (04:29)
234. Вечером - Пьяная (02:18)
235. Вика Воронина - Черника (04:21)
236. Виктор Забродин - Едем к морю (03:03)
237. Виктория Соломахина - Русалочка (02:54)
238. Вито - Скучаю (01:41)
239. Горный - Я плыву по небу далеко (03:23)
240. Грязный Макс - Чувствую себя тупым (01:36)
241. Даниил Ким - Кто я без тебя (02:24)
242. ДЖЕЙЛО - Звездопад из слeз (02:17)
243. Добжинский - Огонёк (03:12)
244. ДУША & URUM - Волк не уволок (02:35)
245. Жасмин & Ариэль Абрамов - Сердцу не прикажешь (03:55)
246. Жора Джи & RUSIN - Симуляция (01:45)
247. Жучара Строгий - Когда крепят (02:39)
248. Зажгите спичку - Мы с тобой всё прое (02:37)
249. Ирина Йовович - Не заманишь (02:18)
250. ЙОП ШОУ - Владислав (02:54)
251. КАСПЕР - Минувшие дни (02:48)
252. КИССКОЛД - Каждой клеткой (02:52)
253. КЭНДИФЛИП - Манера (02:06)
254. Лёша Стелит & KACHAEVA - Не буди (02:47)
255. Лист - В танго кружим (02:06)
256. Лиша - Сказал довольно (02:00)
257. Лолита Косс - Собой (02:24)
258. Максим Круженков & Сакит Самедов - Бигуди (01:48)
259. Мандела - Что ты могла подумать (01:50)
260. Марфа - Вот так бывает (03:18)
261. МИКАДО - CA VA (02:13)
262. Милана Филимонова - Не конфетка (02:42)
263. Яна Бирюкова - А часики-то тикают (01:12)
264. Милу - Неповторимо (02:20)
265. Мистер Гро & Amalgama - Призрачный лес (03:25)
266. Михаил Кутузов - Эта грусть (04:46)
267. Надя Чернова - Свет (03:09)
268. НАТОМИ - Бездельник (02:11)
269. Нейронный май - Вдвоем (04:37)
270. НИКОЛЬ - О боже, мама (02:26)
271. Трагедия - #NoLove (01:22)
272. Тринадцать карат - Город грехов (02:03)
273. Турбомода - Do You Love Me To (03:42)
274. Увидимся - Или же любовь (02:24)
275. Хабиб - Повезёт (02:10)
276. Шантель - Кола (03:16)
277. ЭЙВА - Где мои мечты (02:29)
278. Экспайн - Examen (02:48)
279. Элвис с Атлетики - Абстрактное волшебство (02:03)
280. Эхо умершей души - Чувства не привлечь мороженным (03:26)
281. Обе-Рек - Мама (03:50)
282. Оклок - Грубый молодой (02:12)
283. Остап Парфёнов - Вампир (02:03)
284. Парнишка - Ветер (03:11)
285. ПЕНТХАУС - Невпопад (02:33)
286. Полина Гагарина & Игорь Крутой - Море (02:58)
287. Полка - Звёзды (02:13)
288. Потомучто - Миллиарды лет (03:35)
289. РОВЕСНИК - 18+ (02:29)
290. Рома R.adik - Красное солнце (02:03)
291. РэпЦентр feat. Roos & Biggie Mote - Раструбы (03:31)
292. САЙБЕР 8 - От головы (02:43)
293. Сателлит - Ревную (02:12)
294. САТЕЛЛИТчитает - Сегодня (01:12)
295. Саша Кушнарёва - Лето это (03:30)
296. Саша Макаревич - О лете (02:52)
297. Свят - Питер-это ты (02:32)
298. Синоби - Кровь и алкоголь (02:43)
299. Скаттл - Колечко (02:07)
300. Снэк - Невесомость (02:46)
301. ТайнаЯ - Хуторская (02:10)
302. Тайпан & Saro Vardanyan - Ураган (02:34)
303. Так Надо & ELLA - Не сегодня (Доктор звук) (02:16)
304. Тестостерович & Лёха Южный - Любовь-проказница (02:46)
305. Только Настя - Куража (01:57)[/spoiler]', 8, '2025-08-26 21:25:37', NULL, NULL, 'https://i125.fastpic.org/big/2025/0825/62/503f5ae47911e251cdf47fadf1564262.jpg', 'magnet:?xt=urn:btih:5ed93dd81f8b0f57ab11034ec3249f579436b24a&dn=VA%20-%20Music%20News%20For%20Forum%20vol.129&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fbt02.nnm-club.cc%3A2710%2F002febef928c42cc9e993b899bfc0365%2Fannounce&tr=http%3A%2F%2Fbt02.nnm-club.info%3A2710%2F002febef928c42cc9e993b899bfc0365%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce.php%3Fsize%3D1928760313%26comment%3Dhttp%253A%252F%252Fnnmclub.to%252Fforum%252Fviewtopic.php%253Fp%253D12783425%26name%3DVA%2B-%2BMusic%2BNews%2BFor%2BForum%2Bvol.129%2B%25282025%2529%2B%255BMP3%257C320%2BKbps%255D%2B%2526lt%253BPop%252C%2BDance%252C%2BOther%2526gt%253B&tr=http%3A%2F%2F%5B2a01%3Ad0%3Aa580%3A1%3A%3A2%5D%3A2710%2F002febef928c42cc9e993b899bfc0365%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'va-music-news-for-forum-vol129-2025-mp3', 0, 1, 1, 1, 0, '1756232737_11f3b44fdb67fb396333.torrent', 1, 26, 6, 100, '2025-08-26 21:25:39', 1);
INSERT INTO public.torrents VALUES (30, 1, '\x90a8fe615de41d1a7ec95cc94e3f189d03a9cea6', NULL, 11, 100530932, 0, 'Connor Helm - They Call Me Copperhead (2025) MP3', '[b]Название[/b]: They Call Me Copperhead
[b]Исполнитель[/b]: Connor Helm
[b]Год[/b]: 2025
[b]Жанр[/b]: Blues-rock
[b]Страна[/b]: USA

[b]Продолжительность[/b]: 00:41:25
[b]Формат/Кодек[/b]: MP3
[b]Битрейт аудио[/b]: 320 Кбит/с

[spoiler]01. They Call Me Copperhead 04:27
02. Her Name 03:16
03. Fire In My Soul 03:51
04. As The Ashes Fly 03:59
05. Poor Mans Voodoo 03:44
06. Parotte Road (Live In Clarksdale, MS) 03:28
07. Broken Bottle Blues (Live In Clarksdale, MS) 04:22
08. Strawberries 04:19
09. Wanting More 05:31
10. The Moss 04:23[/spoiler]', 8, '2025-08-26 21:26:50', NULL, NULL, 'https://i125.fastpic.org/big/2025/0825/3e/3ec366a0d5c07325b6cb3b7275efea3e.jpg', 'magnet:?xt=urn:btih:90a8fe615de41d1a7ec95cc94e3f189d03a9cea6&dn=Connor%20Helm%20-%202025%20-%20They%20Call%20Me%20Copperhead&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fbt4.t-ru.org%2Fann%3Fpk%3D27a2ae99a9659f5f55161ce6a86db142&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'connor-helm-they-call-me-copperhead-2025-mp3', 0, 1, 1, 1, 0, '1756232810_04805b1ba78bb70c7f1e.torrent', 1, 7, 0, 45, '2025-08-26 21:26:53', 1);
INSERT INTO public.torrents VALUES (43, 1, '\x21135f24a0ee3fe609c2b9f08bcd5e72f169d66a', NULL, 173, 122719692800, 0, 'Касл / Castle [S01-08] (2009-2016) WEB-DLRip | ТВ3', '[b]Название[/b]: Касл
[b]Оригинальное название[/b]: Castle
[b]Год выхода[/b]: 2009-2016
[b]Жанр[/b]: драма, мелодрама, комедия
[b]Режиссёр[/b]: Джон Терлески, Роб Боумен, Брайан Спайсер
[b]В ролях[/b]: Натан Филлион, Стана Катик, Сьюзэн Салливан, Молли С. Куинн, Джон Уэртас, Тамала Джонс, Шимус Девер, Рубен Сантьяго-Хадсон, Пенни Джонсон, Ари Гросс, Майя Стоян

[b]О фильме[/b]: [i]«Касл» — комедийно-драматический сериал канала ABC с Нэйтаном Филлионом и Станой Катик в главных ролях. Сценарист Эндрю У. Марлоу, уставший от обязательного атрибута полицейских телешоу — настроения упадка и безысходности, — придумал криминальный сериал, бал в котором правят не чрезмерная жестокость и насилие, а харизматичные герои и жизнеутверждающая атмосфера. Динамично развивающиеся классические детективные истории прекрасно раскрывают недюжинный талант двух ведущих актеров, а природное обаяние Филлиона и Катик делают центральных персонажей проекта по-настоящему глубокими и привлекательными.

Популярный автор детективов, завсегдатай высшего общества Нью-Йорка и любящий отец Ричард Касл (Нэйтан Филлион) едва ли мог предположить, что вечеринка, посвященная выпуску его новой книги, обернется чем-то интересным и поможет найти выход из затянувшегося творческого кризиса. Выясняется, что некто убивает людей, подражая преступлениям, описанным в книгах Рика, и детектив департамента полиции Нью-Йорка Кейт Беккет (Стана Катик) находит логичным допросить автора злополучных строк. Касл, не желающий упускать шанс взглянуть на мир криминала под новым углом, с подачи мэра города становится консультантом в расследовании. Баламут Рик вызывает искреннее раздражение крайне собранной и ответственной Кейт, но по мере продвижения дела последняя негласно признает, что интуитивное понимание природы злодеяний и гибкое, нестандартное мышление Ричарда помогают процессу. Так эксцентричный писатель и волевой детектив становятся идеальной парой для распутывания загадочного преступления.[/i]

[b]Страна[/b]:  США
[b]Студия[/b]: ABC Studios
[b]Продолжительность[/b]: ~00:43:00 серия
[b]Перевод[/b]: Профессиональный (дублированный) ТВ3

[b]Качество[/b]: WEB-DLRip
[b]Формат[/b]: AVI
[b]Видео[/b]: 704x400 at 23.976 fps, XviD, ~1900 kbps avg
[b]Аудио[/b]:  Russian: 48 kHz, AC3, 2/0 (L,R) ch, ~192 kbps avg |Дубляж, ТВ3|
[b]Субтитры[/b]: None

[spoiler][URL=https://imageban.ru/show/2022/02/20/f3932c166159289237e05f025a4e433d/jpg][IMG]https://i5.imageban.ru/thumbs/2022.02.20/f3932c166159289237e05f025a4e433d.jpg[/IMG][/URL][URL=https://imageban.ru/show/2022/02/20/6d21ff3727e0ad9bb3676766c159438f/jpg][IMG]https://i7.imageban.ru/thumbs/2022.02.20/6d21ff3727e0ad9bb3676766c159438f.jpg[/IMG][/URL][URL=https://imageban.ru/show/2022/02/20/4e8870530cdcb81cde828ccca68e541a/jpg][IMG]https://i3.imageban.ru/thumbs/2022.02.20/4e8870530cdcb81cde828ccca68e541a.jpg[/IMG][/URL][URL=https://imageban.ru/show/2022/02/20/2a0c8b6bb65c91473163b7d694faa189/jpg][IMG]https://i4.imageban.ru/thumbs/2022.02.20/2a0c8b6bb65c91473163b7d694faa189.jpg[/IMG][/URL][/spoiler]', 3, '2025-08-27 10:28:13', NULL, NULL, 'https://i1.imageban.ru/out/2020/10/20/2259746182b23a6003c659384e438a0a.jpg', 'magnet:?xt=urn:btih:21135f24a0ee3fe609c2b9f08bcd5e72f169d66a&dn=Castle.2009-2016.web-dlrip_%5Bteko%5D&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fbt2.t-ru.org%2Fann%3Fpk%3D76971f8850d10e4113928845a0ebb504&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'kasl-castle-s01-08-2009-2016-web-dlrip-tv3', 0, 1, 1, 1, 0, '1756279693_06a12711b96f3403642a.torrent', 1, 13, 22, 76, '2025-08-27 10:28:16', 1);
INSERT INTO public.torrents VALUES (31, 1, '\x178a61b20f9fa02d9cd4c5a6e7f0b970780a66f4', NULL, 7, 4425470159, 0, 'Firehawk FPV: Drone Warfare Simulator (2025) PC | RePack от FitGirl', '[b]Дата выпуска[/b]: 22 августа 2025
[b]Жанр[/b]: Action, Shooter, Physics-based, First-person
[b]Разработчик[/b]: TruePlayers
[b]Издательство[/b]: TruePlayers
[b]Платформа[/b]: PC
[b]Движок[/b]: Unity
Пользовательские оценки в Steam: 98% обзоров пользователей - положительные (68 рецензий)

[b]Язык интерфейса[/b]: Русский, Английский, Французский, Итальянский, Немецкий, Испанский - Испания, Арабский, Болгарский, Чешский, Датский, Голландский, Финский, Греческий, Венгерский, Индонезийский, Японский, Корейский, Норвежский, Польский, Португальский - Бразилия, Португальский - Португалия, Румынский, Упрощенный Китайский, Испанский - Латинская Америка, Шведский, Тайский, Традиционный Китайский, Турецкий, Украинский, Вьетнамский
[b]Язык озвучки[/b]: Английский
[b]Тип издания[/b]: Repack
[b]Лекарство[/b]: вшито (TENOKE)


[b]Системные требования[/b]:
[b]ОС[/b]: Windows 10 x64 и выше
[b]Процессор[/b]: Intel Core i3-6100 / AMD FX-8350 и лучше
[b]Память[/b]: 4 Гб
[b]Видео[/b]: GTX 580 / AMD HD 7870 или лучше
[b]DirectX[/b]: 11
[b]Место на диске[/b]: 17.1 Гб

[b]Описание[/b]: [i]В Firehawk вы - сила природы. Проскальзывайте сквозь огонь, овладейте воздушным боем и несите разрушение сверху в этом высокорисковом FPV дрон roguelike шутере. Пилотируйте продвинутые боевые дроны через интенсивные миссии, где решения долей секунды имеют значение. Смерть отправляет вас обратно на базу - но ваша технология, навыки и сила растут с каждым прохождением.

Покорите Небеса - Высокоскоростной бой, который вознаграждает мастерство и смелость. Начните новичком, станьте асом. Ныряйте сквозь препятствия, выстраивайте идеальные атакующие серии и бейте с невозможных углов. Идите громко с пылающим оружием или бейте с хирургической точностью. Небеса ваши для господства.

Спроектируйте Победу - Ваш дрон - это ваш холст. Начните с базовых рам и постройте смертельный арсенал военных машин. Смешивайте оружие, открывайте смертельные комбинации и настраивайте свои сборки между миссиями. От быстрых перехватчиков до тяжелых канонерок, создайте идеальную машину убийства.

Командуйте и Завоевывайте - Превратите боевые трофеи в прочную силу. Расширяйте свою базу, разблокируйте новые дроны и разрабатывайте продвинутое оружие. Каждое прохождение делает вас сильнее - ваши навыки оттачиваются с каждым полетом, а база растет с каждой частью спасения.

Поднимитесь к Вызову - Каждая миссия приносит новые угрозы, от оборонительных систем до элитных эскадрилий. Сражайтесь через узкие промышленные зоны и открытые военные зоны. Путь к финальному боссу труден, но с растущими навыками и арсеналом вы покорите небеса.[/i]

[spoiler="Особенности игры"]Полная поддержка FPV контроллеров
Поддержка мыши и клавиатуры
Поддержка джойстика
Поддержка консольных контроллеров
Сложные враги и боссы
Большой выбор настроек и оружия
Множественные карты и биомы
Таблицы лидеров[/spoiler]

[spoiler="Особенности репака"]Репак основан на ISO-образе Firehawk.FPV.Drone.Warfare.Simulator-TENOKE: tenoke-firehawk.fpv.drone.warfare.simulator.iso (18,412,392,448 байт)
100% Lossless и MD5 Perfect: все файлы после установки идентичны оригинальному релизу с точностью до бита
НИЧЕГО не вырезано, НИЧЕГО не перекодировано
Существенно улучшено сжатие (с 17.1 до 4.1 Гб)
Установка занимает 3-6 минут (зависит от вашей системы)
После инсталляции игра занимает 17.1 Гб
После установки доступна опция проверки контрольных сумм всех файлов, чтобы убедиться, что репак установился нормально
Язык изменяется в настройках игры
Для установки репака требуется минимум 2 Гб свободной оперативной памяти (включая виртуальную)

[Repack] by FitGirl[/spoiler]

[spoiler][URL=https://imageban.ru/show/2025/08/26/944bc618c81326251c915469ca64b436/jpg][IMG]https://i7.imageban.ru/thumbs/2025.08.26/944bc618c81326251c915469ca64b436.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/26/fca6f5c8608d45eb2bf53a012ef9080a/jpg][IMG]https://i2.imageban.ru/thumbs/2025.08.26/fca6f5c8608d45eb2bf53a012ef9080a.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/26/f9c202c3a308fdd35299ef5ba45601ed/jpg][IMG]https://i5.imageban.ru/thumbs/2025.08.26/f9c202c3a308fdd35299ef5ba45601ed.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/26/811419f4f31ad461f0dbb488548f3266/jpg][IMG]https://i6.imageban.ru/thumbs/2025.08.26/811419f4f31ad461f0dbb488548f3266.jpg[/IMG][/URL][/spoiler]', 9, '2025-08-26 21:31:31', NULL, NULL, 'https://i5.imageban.ru/out/2025/08/26/dbc1d5345beacade59855185afa73967.jpg', 'magnet:?xt=urn:btih:178a61b20f9fa02d9cd4c5a6e7f0b970780a66f4&dn=Firehawk%20FPV%20%5BFitGirl%20Repack%5D&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=udp%3A%2F%2Ftracker.theoks.net%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.ccp.ovh%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=http%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=https%3A%2F%2Ftracker.tamersunion.org%3A443%2Fannounce&tr=udp%3A%2F%2Fexplodie.org%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.bt4g.com%3A2095%2Fannounce&tr=udp%3A%2F%2Fbt2.archive.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fbt1.archive.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.filemail.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker1.bt.moack.co.kr%3A80%2Fannounce&tr=http%3A%2F%2Fopen.acgnxtracker.com%3A80%2Fannounce&tr=http%3A%2F%2Ftracker.files.fm%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.demonii.com%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker-udp.gbitt.info%3A80%2Fannounce&tr=udp%3A%2F%2Fopentracker.io%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker2.dler.org%3A80%2Fannounce&tr=http%3A%2F%2Ftracker1.bt.moack.co.kr%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.dump.cl%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.0x7c0.com%3A6969%2Fannounce&tr=udp%3A%2F%2Fretracker01-msk-virt.corbina.net%3A80%2Fannounce&tr=udp%3A%2F%2Fp4p.arenabg.com%3A1337%2Fannounce&tr=udp%3A%2F%2Fnew-line.net%3A6969%2Fannounce&tr=http%3A%2F%2Ftr.kxmp.cf%3A80%2Fannounce&tr=udp%3A%2F%2Fttk2.nbaonlineservice.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker2.dler.org%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.tryhackx.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.tiny-vps.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.srv00.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.skynetcloud.site%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.qu.ax%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.jamesthebard.net%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.fnix.net%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.farted.net%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.edkj.club%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.deadorbit.nl%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.bittor.pw%3A1337%2Fannounce&tr=udp%3A%2F%2Ftamas3.ynh.fr%3A6969%2Fannounce&tr=udp%3A%2F%2Fryjer.com%3A6969%2Fannounce&tr=udp%3A%2F%2Frun.publictracker.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2Fp2p.publictracker.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.u-p.pw%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.publictracker.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.free-tracker.ga%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.dstud.io%3A6969%2Fannounce&tr=udp%3A%2F%2Fodd-hd.fr%3A6969%2Fannounce&tr=udp%3A%2F%2Fmoonburrow.club%3A6969%2Fannounce&tr=udp%3A%2F%2Fmartin-gebhardt.eu%3A25%2Fannounce&tr=udp%3A%2F%2Fjutone.com%3A6969%2Fannounce&tr=udp%3A%2F%2Fisk.richardsw.club%3A6969%2Fannounce&tr=udp%3A%2F%2Fevan.im%3A6969%2Fannounce&tr=udp%3A%2F%2Fd40969.acod.regrucolo.ru%3A6969%2Fannounce&tr=udp%3A%2F%2Famigacity.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2F1c.premierzal.ru%3A6969%2Fannounce&tr=https%3A%2F%2Fwww.peckservers.com%3A9443%2Fannounce&tr=https%3A%2F%2Ftrackers.run%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.yemekyedim.com%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.renfei.net%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.lilithraws.org%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.imgoingto.icu%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.cloudit.top%3A443%2Fannounce&tr=http%3A%2F%2Fwww.peckservers.com%3A9000%2Fannounce&tr=http%3A%2F%2Fwepzone.net%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=http%3A%2F%2Ftracker.qu.ax%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.mywaifu.best%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.ipv6tracker.org%3A80%2Fannounce&tr=http%3A%2F%2Ftracker.edkj.club%3A6969%2Fannounce&tr=http%3A%2F%2Ft.overflow.biz%3A6969%2Fannounce&tr=http%3A%2F%2Fcanardscitrons.nohost.me%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.darkness.services%3A6969%2Fannounce&tr=udp%3A%2F%2Ftorrents.artixlinux.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fmail.artixlinux.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fipv4.rer.lol%3A2710%2Fannounce&tr=udp%3A%2F%2Fconcen.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fbittorrent-tracker.e-n-c-r-y-p-t.net%3A1337%2Fannounce&tr=https%3A%2F%2Ftracker.pmman.tech%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.ipfsscan.io%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.gcrenwp.top%3A443%2Fannounce&tr=https%3A%2F%2Ftracker-zhuqiy.dgj055.icu%3A443%2Fannounce&tr=http%3A%2F%2Ftracker1.itzmx.com%3A8080%2Fannounce&tr=http%3A%2F%2Ftracker-zhuqiy.dgj055.icu%3A80%2Fannounce&tr=http%3A%2F%2Ft1.aag.moe%3A17715%2Fannounce&tr=http%3A%2F%2Fch3oh.ru%3A6969%2Fannounce&tr=http%3A%2F%2Fbvarf.tracker.sh%3A2086%2Fannounce&tr=http%3A%2F%2Fbittorrent-tracker.e-n-c-r-y-p-t.net%3A1337%2Fannounce&tr=http%3A%2F%2F1337.abcvg.info%3A80%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce', 'firehawk-fpv-drone-warfare-simulator-2025-pc-repack-ot-fitgirl', 0, 1, 1, 1, 0, '1756233091_e90f4c3aece1a7939bc9.torrent', 1, 137, 61, 360, '2025-08-26 21:31:33', 1);
INSERT INTO public.torrents VALUES (32, 1, '\xe182fff696cc78320ef5ed2a922efba1da98c403', NULL, 7, 3832356728, 0, 'Island Notes (2025) PC | RePack от FitGirl', '[b]Дата выпуска[/b]: 22 августа 2025
[b]Жанр[/b]: Action, Item crafting, Open world, Survival, First-person, 3D
[b]Разработчик[/b]: KangBaoGame
[b]Издательство[/b]: KangBaoGame
[b]Платформа[/b]: PC
[b]Движок[/b]: Unity
Пользовательские оценки в Steam: 86% обзоров пользователей - положительные (166 рецензий)

[b]Язык интерфейса[/b]: Русский, Английский, Упрощенный Китайский, Традиционный Китайский, Немецкий, Корейский
[b]Язык озвучки[/b]: Китайский
[b]Тип издания[/b]: Repack
[b]Лекарство[/b]: вшито (TENOKE)

[b]Системные требования[/b]:
[b]ОС[/b]: Windows 7 x64 / Windows 8 x64 / Windows 10 x64 и выше
[b]Процессор[/b]: i3-9320 и лучше
[b]Память[/b]: 8 Гб
[b]Видео[/b]: GTX 1050 или лучше
[b]DirectX[/b]: 11
[b]Место на диске[/b]: 12.8 Гб

[b]Описание[/b]: [i]После крушения яхты вы и ваши гости оказались в ловушке на таинственном острове. Выживать в одиночку или сплотиться для общего спасения? Игра сочетает романтику, выживание, строительство, фермерство, рыбалку, приручение питомцев и другие элементы, предлагая уникальное приключение.[/i]

[spoiler="Особенности игры"]Огромная карта острова с пещерами, заброшенными строениями, утёсами и другими локациями. Благодаря высокой плотности растительности почти каждый объект можно собрать, и каждый обладает ценностью.
Формируйте связи с NPC через систему отношений. У каждого NPC уникальный озвученный голос для полного погружения.
Умные NPC самостоятельно едят, готовят, отдыхают, собирают ресурсы и сражаются. Адаптируют поведение под ваше состояние, проявляя заботу.
Множество костюмов для NPC, открываемых через повышение уровня отношений.
Базовая механика выживания: строительство баз, фермерство, выведение питомцев, крафт брони/оружия.
Разнообразные существа (монстры) с зональным распространением. Каждый участвует в боях на любой местности. Полностью открытый мир без ограничений.
Богатый арсенал: боевое (топоры, луки, копья, арбалеты, огнестрел) и небоевое (лопаты, серпы, бамбуковые контейнеры) снаряжение.
Свободный геймплей — исследуйте сушу и морские глубины.[/spoiler]

[spoiler="Особенности репака"]Репак основан на ISO-образе Island.Notes-TENOKE: tenoke-island.notes.iso (13,712,900,096 байт)
100% Lossless и MD5 Perfect: все файлы после установки идентичны оригинальному релизу с точностью до бита
НИЧЕГО не вырезано, НИЧЕГО не перекодировано
Существенно улучшено сжатие (с 12.8 до 3.6 Гб)
Установка занимает 1-4 минуты (зависит от вашей системы)
После инсталляции игра занимает 12.8 Гб
После установки доступна опция проверки контрольных сумм всех файлов, чтобы убедиться, что репак установился нормально
Язык изменяется в настройках игры
Для установки репака требуется минимум 2 Гб свободной оперативной памяти (включая виртуальную)

[Repack] by FitGirl[/spoiler]

[spoiler][URL=https://imageban.ru/show/2025/08/25/5ef1425577edb638c6aa5772da0e0709/jpg][IMG]https://i6.imageban.ru/thumbs/2025.08.25/5ef1425577edb638c6aa5772da0e0709.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/25/68557538dc03ced85f73c8711b002e92/jpg][IMG]https://i6.imageban.ru/thumbs/2025.08.25/68557538dc03ced85f73c8711b002e92.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/25/bd63605a9280947090f92156acd9c328/jpg][IMG]https://i6.imageban.ru/thumbs/2025.08.25/bd63605a9280947090f92156acd9c328.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/25/34182639b100a4cf42680ff23c8076e4/jpg][IMG]https://i1.imageban.ru/thumbs/2025.08.25/34182639b100a4cf42680ff23c8076e4.jpg[/IMG][/URL][/spoiler]', 9, '2025-08-26 21:35:10', NULL, NULL, 'https://i3.imageban.ru/out/2025/08/25/dfc915c52800086d234a7cb3f746b603.jpg', 'magnet:?xt=urn:btih:e182fff696cc78320ef5ed2a922efba1da98c403&dn=Island%20Notes%20%5BFitGirl%20Repack%5D&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=udp%3A%2F%2Ftracker.theoks.net%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.ccp.ovh%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=http%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=https%3A%2F%2Ftracker.tamersunion.org%3A443%2Fannounce&tr=udp%3A%2F%2Fexplodie.org%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.bt4g.com%3A2095%2Fannounce&tr=udp%3A%2F%2Fbt2.archive.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fbt1.archive.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.filemail.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker1.bt.moack.co.kr%3A80%2Fannounce&tr=http%3A%2F%2Fopen.acgnxtracker.com%3A80%2Fannounce&tr=http%3A%2F%2Ftracker.files.fm%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.demonii.com%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker-udp.gbitt.info%3A80%2Fannounce&tr=udp%3A%2F%2Fopentracker.io%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker2.dler.org%3A80%2Fannounce&tr=http%3A%2F%2Ftracker1.bt.moack.co.kr%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.dump.cl%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.0x7c0.com%3A6969%2Fannounce&tr=udp%3A%2F%2Fretracker01-msk-virt.corbina.net%3A80%2Fannounce&tr=udp%3A%2F%2Fp4p.arenabg.com%3A1337%2Fannounce&tr=udp%3A%2F%2Fnew-line.net%3A6969%2Fannounce&tr=http%3A%2F%2Ftr.kxmp.cf%3A80%2Fannounce&tr=udp%3A%2F%2Fttk2.nbaonlineservice.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker2.dler.org%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.tryhackx.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.tiny-vps.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.srv00.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.skynetcloud.site%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.qu.ax%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.jamesthebard.net%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.fnix.net%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.farted.net%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.edkj.club%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.deadorbit.nl%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.bittor.pw%3A1337%2Fannounce&tr=udp%3A%2F%2Ftamas3.ynh.fr%3A6969%2Fannounce&tr=udp%3A%2F%2Fryjer.com%3A6969%2Fannounce&tr=udp%3A%2F%2Frun.publictracker.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2Fp2p.publictracker.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.u-p.pw%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.publictracker.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.free-tracker.ga%3A6969%2Fannounce&tr=udp%3A%2F%2Fopen.dstud.io%3A6969%2Fannounce&tr=udp%3A%2F%2Fodd-hd.fr%3A6969%2Fannounce&tr=udp%3A%2F%2Fmoonburrow.club%3A6969%2Fannounce&tr=udp%3A%2F%2Fmartin-gebhardt.eu%3A25%2Fannounce&tr=udp%3A%2F%2Fjutone.com%3A6969%2Fannounce&tr=udp%3A%2F%2Fisk.richardsw.club%3A6969%2Fannounce&tr=udp%3A%2F%2Fevan.im%3A6969%2Fannounce&tr=udp%3A%2F%2Fd40969.acod.regrucolo.ru%3A6969%2Fannounce&tr=udp%3A%2F%2Famigacity.xyz%3A6969%2Fannounce&tr=udp%3A%2F%2F1c.premierzal.ru%3A6969%2Fannounce&tr=https%3A%2F%2Fwww.peckservers.com%3A9443%2Fannounce&tr=https%3A%2F%2Ftrackers.run%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.yemekyedim.com%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.renfei.net%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.lilithraws.org%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.imgoingto.icu%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.cloudit.top%3A443%2Fannounce&tr=http%3A%2F%2Fwww.peckservers.com%3A9000%2Fannounce&tr=http%3A%2F%2Fwepzone.net%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=http%3A%2F%2Ftracker.qu.ax%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.mywaifu.best%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.ipv6tracker.org%3A80%2Fannounce&tr=http%3A%2F%2Ftracker.edkj.club%3A6969%2Fannounce&tr=http%3A%2F%2Ft.overflow.biz%3A6969%2Fannounce&tr=http%3A%2F%2Fcanardscitrons.nohost.me%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.darkness.services%3A6969%2Fannounce&tr=udp%3A%2F%2Ftorrents.artixlinux.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fmail.artixlinux.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fipv4.rer.lol%3A2710%2Fannounce&tr=udp%3A%2F%2Fconcen.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fbittorrent-tracker.e-n-c-r-y-p-t.net%3A1337%2Fannounce&tr=https%3A%2F%2Ftracker.pmman.tech%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.ipfsscan.io%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.gcrenwp.top%3A443%2Fannounce&tr=https%3A%2F%2Ftracker-zhuqiy.dgj055.icu%3A443%2Fannounce&tr=http%3A%2F%2Ftracker1.itzmx.com%3A8080%2Fannounce&tr=http%3A%2F%2Ftracker-zhuqiy.dgj055.icu%3A80%2Fannounce&tr=http%3A%2F%2Ft1.aag.moe%3A17715%2Fannounce&tr=http%3A%2F%2Fch3oh.ru%3A6969%2Fannounce&tr=http%3A%2F%2Fbvarf.tracker.sh%3A2086%2Fannounce&tr=http%3A%2F%2Fbittorrent-tracker.e-n-c-r-y-p-t.net%3A1337%2Fannounce&tr=http%3A%2F%2F1337.abcvg.info%3A80%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce', 'island-notes-2025-pc-repack-ot-fitgirl', 0, 1, 1, 2, 0, '1756233310_aa5dad81a10d01e2e560.torrent', 1, 190, 35, 1100, '2025-08-26 22:25:34', 1);
INSERT INTO public.torrents VALUES (33, 1, '\x4055ae500a7bf8253c834af8825a7fe0ddafb686', NULL, 4, 2498081612, 0, 'Adobe Acrobat Pro 2025.001.20643 (2025) PC | Portable by 7997', '[b]Версия программы[/b]: 2025.001.20643
[b]Официальный сайт[/b]: ADOBE
[b]Язык интерфейса[/b]: Русский, Английский, и другие
[b]Лечение[/b]: не требуется (инсталлятор уже пролечен)

[b]Системные требования[/b]:
[b]ОС[/b]: Windows 11 (64-bit), Windows 10 (32|64-bit) версии 1809 или новее; Windows Server 2016 или Server 2019 (64-bit)
[b]ЦП[/b]: Процессор Intel® или AMD с частотой не менее 1,5 ГГц
[b]ОЗУ[/b]: 2 ГБ RAM
[b]Жесткий диск[/b]: 4,5 ГБ свободного пространства на жестком диске
[b]Разрешение экрана[/b]: 1024x768
[b]Видеокарта[/b]: Аппаратное ускорение видео (опционально)

[b]Описание[/b]: [i]Acrobat Pro — это полностью обновленная настольная версия лучшего в мире решения для работы с файлами PDF. В состав этого решения входит мобильное приложение, позволяющее подписывать и отправлять файлы PDF, а также заполнять формы с любых устройств. А с помощью облачных сервисов Doсument Cloud вы сможете создавать, экспортировать, редактировать и отслеживать файлы PDF, открыв их в любом веб-браузере. Последние версии файлов всегда будут у вас под рукой независимо от того, на каком устройстве вы работаете.[/i]

Ваш офис станет таким же мобильным, как и вы. Приложение Acrobat, дополненное сервисами Do.cument Cloud, включает множество инструментов для преобразования и редактирования документов PDF, а также добавления в них подписей. Вы можете использовать его где угодно. Начните создавать документ в офисе, откорректируйте его по пути домой и отправьте финальную версию на утверждение уже из дома — это просто, быстро и удобно.

[spoiler="Дополнительная информация:"]Acrobat творит чудеса. Теперь вы можете редактировать любой документ, даже если у вас под рукой только бумажная версия. Просто сфотографируйте его с помощью смартфона и откройте в настольном приложении. Acrobat на ваших глазах превратит фотографию в файл PDF, который можно отредактировать на планшете. При этом можно использовать дополнительные шрифты такого же типа, как в исходном документе.

Электронные подписи. Повсюду. Сервисы Acrobat для добавления электронных подписей используются в более чем миллиарде устройств по всему миру. Любой пользователь может поставить на документе подпись, имеющую юридическую силу, просто проведя пальцем по экрану сенсорного устройства или сделав нескольких кликов в браузере. Acrobat — не просто удобное приложение для добавления подписей. Оно позволяет с легкостью отправлять, отслеживать и хранить подписанные документы.

Привлекательный сенсорный пользовательский интерфейс. Новый сенсорный пользовательский интерфейс Acrobat упрощает доступ к необходимым инструментам и учитывает все особенности мобильных устройств. Опробуйте его, и вы не променяете его ни на какой другой.[/spoiler]

[spoiler="Возможности программы:"]Объединение файлов.
Храните все материалы в одном документе. Объединяйте и систематизируйте документы, электронные таблицы, сообщения электронной почты и другие файлы в рамках одного документа PDF.

Сканирование в PDF.
Преобразуйте бумажные документы в редактируемые файлы PDF с возможностью поиска. Копируйте и вставляйте текст для повторного использования в нескольких документах.

Стандартизация повседневных операций с форматом PDF.
Последовательность действий при создании файлов PDF всегда одинакова. Просто следуйте пошаговым инструкциям на экране.

Защита файлов PDF.
Предоставляя общий доступ к файлам, будьте уверены в их безопасности. Блокируйте функции копирования и редактирования содержимого ваших документов PDF.

Создание заполняемых форм.
Преобразуйте имеющиеся бумажные документы, файлы Word и формы PDF в электронные формы, которые легко заполнять и подписывать.

Доступ к инструментам с любых устройств.
Получайте доступ к инструментам PDF и недавно открытым файлам из офиса, с домашнего компьютера или с мобильного устройства.

Воспользуйтесь комплексным решением для работы с файлами в формате PDF, где бы вы ни находились.

Работайте на компьютерах под управлением Mac и Windows, а также на мобильных устройствах.
Создание высококачественных файлов PDF.
Редактирование и экспорт файлов PDF в документы Office.
Подписание и отправка на подписание файлов PDF.
Мгновенное редактирование отсканированных документов PDF.
Редактирование и упорядочение файлов PDF на устройстве iPad.
Добавление аудио- и видеозаписей в файлы PDF.
Согласованная подготовка файлов PDF с помощью управляемых действий.
Удаление конфиденциальной информации без возможности восстановления.[/spoiler]

[spoiler][url=https://lostpix.com/?v=2024-07-25_g83vtnmhlr9r8e1l0ikxn18ki.png][img]https://lostpix.com/thumbs/2024-07/25/g83vtnmhlr9r8e1l0ikxn18ki.png[/img][/url][url=https://lostpix.com/?v=2024-07-25_20z0g3zmazfk2k5p1uf6b7yvy.png][img]https://lostpix.com/thumbs/2024-07/25/20z0g3zmazfk2k5p1uf6b7yvy.png[/img][/url][url=https://lostpix.com/?v=2024-07-25_4blkc1zmvr5vjks53uioyabfg.png][img]https://lostpix.com/thumbs/2024-07/25/4blkc1zmvr5vjks53uioyabfg.png[/img][/url][url=https://lostpix.com/?v=2024-07-25_clf93cmae92zmzsf06zp2r5x4.png][img]https://lostpix.com/thumbs/2024-07/25/clf93cmae92zmzsf06zp2r5x4.png[/img][/url][/spoiler]', 10, '2025-08-26 21:38:47', NULL, NULL, 'https://i.postimg.cc/1zPzDryP/l8-Sv-T0-Cz-o.webp', 'magnet:?xt=urn:btih:4055ae500a7bf8253c834af8825a7fe0ddafb686&dn=Adobe%20Acrobat%20Pro%202025.001.20643%20%28x86x64%29%20Portable%20by%207997&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'adobe-acrobat-pro-202500120643-2025-pc-portable-by-7997', 0, 1, 1, 3, 1, '1756233527_cbb6b5cd1fb8e09ecfc3.torrent', 1, 5, 3, 11, '2025-08-26 21:38:50', 1);
INSERT INTO public.torrents VALUES (34, 1, '\x22332af16c25bc9051cdd87bf650952aaaf564c7', NULL, 85, 751429038, 0, 'Василий Криптонов, Мила Бачурова - Мир падающих звёзд [3 книги] (2025) МР3', '[b]Название[/b]: Мир падающих звёзд
[b]Жанр[/b]: Фэнтези, аудиокнига

[b]Автор[/b]: Василий Криптонов, Мила Бачурова
[b]Озвучивает[/b]: Денис Некрасов
[b]Год издания книги[/b]: 2025
[b]Издательство[/b]: 1С-Паблишинг
[b]Продолжительность[/b]: 25:54:34

[b]Описание[/b]: [i]Перед нами альтернативная Российская империя конца XVIII века. Европа в руинах, об Америке никто и не слышал. Повсюду полчища кровожадных тварей, они атакуют поселения, и справиться с ними способен только могучий воин, владеющий, помимо прочего, магией. Причём энергию убитых тварей можно поглощать и становиться всё сильней. Главный герой, пролежавший парализованным двадцать лет, вдруг обретает силу и вскоре становится одним из лучших охотников на нечисть. Теперь он граф Владимир Всеволодович Давыдов. Герой подумывает и о другом источнике постоянного дохода, но по-прежнему следует своему нежданному призванию. В этом деле ему помогает Захар, напарник верный, однако не всегда надёжный. Новой целью охотников становятся русалки: их изничтожение позволит, помимо заработка, повысить уровень силы и получить вожделенные родии. Для Захара это испытание может стать важным тестом на профпригодность. Но русалки опасны и коварны. Смогут ли герои выполнить свою миссию?[/i]

[b]Формат/Кодек[/b]: МР3
[b]Битрейт аудио[/b]: 61-72 kbps

[b]Цикл «Мир падающих звёзд»[/b]:
01. Ополченец
02. Русальная неделя
03. Лесной хозяин
04. Духов день', 11, '2025-08-26 21:45:36', NULL, NULL, 'https://i125.fastpic.org/big/2025/0826/37/db62fff33d5c2ecaa21f96a7ac09ac37.jpg', 'magnet:?xt=urn:btih:22332af16c25bc9051cdd87bf650952aaaf564c7&dn=%D0%92%D0%B0%D1%81%D0%B8%D0%BB%D0%B8%D0%B9%20%D0%9A%D1%80%D0%B8%D0%BF%D1%82%D0%BE%D0%BD%D0%BE%D0%B2%2C%20%D0%9C%D0%B8%D0%BB%D0%B0%20%D0%91%D0%B0%D1%87%D1%83%D1%80%D0%BE%D0%B2%D0%B0%20-%20%D0%9C%D0%B8%D1%80%20%D0%BF%D0%B0%D0%B4%D0%B0%D1%8E%D1%89%D0%B8%D1%85%20%D0%B7%D0%B2%D0%B5%D0%B7%D0%B4%20%28%D0%94%D0%B5%D0%BD%D0%B8%D1%81%20%D0%9D%D0%B5%D0%BA%D1%80%D0%B0%D1%81%D0%BE%D0%B2%29&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Ftr0.torrent4me.com%2Fann%3Fuk%3Dy7O161x7VE&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'vasilij-kriptonov-mila-bacurova-mir-padausih-zvezd-3-knigi-2025-mr3', 0, 1, 1, 1, 0, '1756233936_805336a85a60d4b160ed.torrent', 1, 1, 7, 1, '2025-08-26 21:45:39', 1);
INSERT INTO public.torrents VALUES (6, 1, '\x0a185472abe129f72b65d5d1e8556bbd071e8afe', NULL, 1, 38080336858, 0, 'Миссия невыполнима: Финальная расплата / Mission: Impossible - The Final Reckoning (2025) WEB-DL-HEVC 2160p от DVT | 4K | HDR10+ | Dolby Vision Profile 8 | D, P, L, A | IMAX', '[b]Название[/b]: Миссия невыполнима: Финальная расплата
[b]Оригинальное название[/b]: Mission: Impossible - The Final Reckoning
[b]Страна[/b]: США, Великобритания
[b]Студия[/b]: Paramount Pictures, Skydance Media, TC Productions
[b]Жанр[/b]: Боевик, триллер, приключения
[b]Год выпуска[/b]: 2025
[b]Продолжительность[/b]: 02:49:35

[b]Перевод 1[/b]: Профессиональный (дублированный) Videofilm Int.
[b]Перевод 2[/b]: Дублированный (неофициальный) Red Head Sound
[b]Перевод 3[/b]: Дублированный (неофициальный любительский) Dragon Studio
[b]Перевод 4[/b]: Профессиональный (многоголосый закадровый) Jaskier
[b]Перевод 5[/b]: Профессиональный (многоголосый закадровый) TVShows
[b]Перевод 6[/b]: Профессиональный (многоголосый закадровый) HDRezka Studio
[b]Перевод 7[/b]: Профессиональный (многоголосый закадровый) LostFilm
[b]Перевод 8[/b]: Любительский (многоголосый закадровый) заКАДРЫ
[b]Перевод 9[/b]: Любительский (многоголосый закадровый) LE-Production
[b]Перевод 10[/b]: Одноголосый (закадровый) Дмитрий Есарев
[b]Перевод 11[/b]: Профессиональный (дублированный) LeDoyen
[b]Субтитры[/b]: Русские (2x Forced, Full), Украинские(Forced, Full), Английские (Forced, Full, SDH)
[b]Оригинальная аудиодорожка[/b]: Aнглийский

[b]Режиссер[/b]: Кристофер Маккуорри / Christopher McQuarrie
В ролях: Том Круз, Пом Клементьефф, Хейли Этвелл, Ханна Уоддингэм, Ник Офферман, Анджела Бассетт, Кэти М. О''Брайан, Трэмелл Тиллман, Ши Уигхэм, Саймон Пегг

[b]Описание[/b]: [i]Итан Хант вновь оказывается на передовой глобальной борьбы, когда миру начинает угрожать новейший искусственный интеллект, способный уничтожить цивилизацию. Чтобы предотвратить катастрофу, ему необходимо не только отыскать источник угрозы, но и столкнуться с множеством скрытых врагов и предательств. С каждым шагом миссия усложняется, превращаясь в опасную игру, где на кону стоит судьба человечества. Используя мастерство маскировки и уникальные навыки своей команды, Итан должен действовать быстро и без ошибок, иначе последствия будут непоправимы.[/i]

[b]Тип релиза[/b]: WEB-DL 2160p Dolby Vision
[b]Контейнер[/b]: MKV
[b]Видео[/b]: MPEG-H HEVC Video / 24,2 Mbps / 3840x2024 / 23.976 fps / 1.897 / Main 10 @ Level 5 @ High / 10 bits / Dolby Vision - Profile 8 / HDR10+ / HDR10 /
[b]Аудио 1[/b]: Russian AC3 / 5.1 / 48 kHz / 384 kbps |Дубляж, Videofilm Int.|
[b]Аудио 2[/b]: Russian AC3 / 5.1 / 48 kHz / 640 kbps |Дубляж, Red Head Sound|
[b]Аудио 3[/b]: Russian AC3 / 5.1 / 48 kHz / 448 kbps |Дубляж, Dragon Studio|
[b]Аудио 4[/b]: Russian E-AC3+Atmos / 5.1 / 48 kHz / 768 kbps |MVO, Jaskier|
[b]Аудио 5[/b]: Russian AC3 / 5.1 / 48 kHz / 384 kbps |MVO, TVShows|
[b]Аудио 6[/b]: Russian AC3 / 2.0 / 48 kHz / 192 kbps |MVO, HDRezka Studio|
[b]Аудио 7[/b]: Russian AC3 / 2.0 / 48 kHz / 384 kbps |MVO, LostFilm|
[b]Аудио 8[/b]: Russian AC3 / 2.0 / 48 kHz / 384 kbps |MVO, заКАДРЫ|
[b]Аудио 9[/b]: Russian AC3 / 2.0 / 48 kHz / 192 kbps |MVO, LE-Production|
[b]Аудио 10[/b]: Russian E-AC3+Atmos / 5.1 / 48 kHz / 768 kbps |VO, Д.Есарев|
[b]Аудио 11[/b]: Ukrainian AC3 / 5.1 / 48 kHz / 448 kbps |Дубляж, LeDoyen|
[b]Аудио 12[/b]: English E-AC3+Atmos / 5.1 / 48 kHz / 768 kbps |Original|
[b]Формат субтитров[/b]: softsub (SRT)

[spoiler][url=https://postimg.cc/MXxfjWwr][img]https://i.postimg.cc/MXxfjWwr/mpv-shot0001.png[/img][/url][url=https://postimg.cc/hhrzLHP4][img]https://i.postimg.cc/hhrzLHP4/mpv-shot0003.png[/img][/url][url=https://postimg.cc/hftJppfL][img]https://i.postimg.cc/hftJppfL/mpv-shot0005.png[/img][/url][url=https://postimg.cc/bZGZjr0d][img]https://i.postimg.cc/bZGZjr0d/mpv-shot0007.png[/img][/url][/spoiler]', 1, '2025-08-26 17:13:34', NULL, NULL, 'https://i.postimg.cc/zBGtwXh0/mission-impossible-rutor.jpg', 'magnet:?xt=urn:btih:0a185472abe129f72b65d5d1e8556bbd071e8afe&dn=Mission.Impossible.The.Final.Reckoning.2025.IMAX.2160p.WEB-DL.DDP5.1.Atmos.DV.HDR-DVT.mkv&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'missia-nevypolnima-finalnaa-rasplata-mission-impossible-the-final-reckoning-2025-web-dl-hevc-2160p-ot-dvt-4k-hdr10-dolby-vision-profile-8-d-p-l-a-imax', 0, 1, 1, 2, 0, '1756217613_bc19d5a774e277a9f5d0.torrent', 1, 92, 173, 401, '2025-08-26 22:34:43', 1);
INSERT INTO public.torrents VALUES (37, 1, '\x789a54a130a9cdec6281b5cc0fb836b4d0e5a778', NULL, 13, 9315941154, 0, 'Миллиард проблем [01x01-13 из 17] (2025) WEBRip 1080p от ExKinoRay', '[b]Название[/b]: Миллиард проблем
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: Комедия, ситком
[b]Режиссер[/b]: Кирилл Васильев
[b]В ролях[/b]: Сергей Епишев, Анастасия Попова, Матвей Семёнов, Игорь Вуколов, Алёна Малахова, Варвара Куприна, Светлана Суханова, Ульяна Глушкова, Олег Тактаров, Вадим Салахов

[b]О фильме[/b]: [i]Калачёвы экономят на всём, а папа, школьный учитель Ростик, ведёт подсчёты затрат в блокноте и мечтает о гранте. Семья не унывает, участвует в эстафетах, лотереях и конкурсах, где можно выиграть полезный приз. Всё меняется, когда Ростику достаётся выигрышный билет на миллиард рублей. Казалось бы, теперь Калачёвым не о чем беспокоиться, ведь они обеспечены на всю жизнь. Но с появлением больших денег появляются и большие проблемы.[/i]

[b]Страна[/b]: Россия
[b]Студия[/b]: СТС, С.Д.Л.
[b]Продолжительность[/b]: 13 x ~ 00:25:00
[b]Язык[/b]: Русский

[b]Кодек[/b]: MPEG-4 AVC
[b]Качество[/b]: WEBRip 1080p
[b]Видео[/b]: MPEG-4 AVC, ~ 3700 Кбит/с, 1920x1080
[b]Звук[/b]: Русский (AAC, 2 ch, 192 Кбит/с)

[spoiler][URL=https://imageban.ru/show/2025/08/19/2614478f687b66719c85830af8094076/jpg][IMG]https://i1.imageban.ru/thumbs/2025.08.19/2614478f687b66719c85830af8094076.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/19/f02c1632cc0e5a89b032e838b7b46c10/jpg][IMG]https://i4.imageban.ru/thumbs/2025.08.19/f02c1632cc0e5a89b032e838b7b46c10.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/19/2f0109189e681842ab6826b4ac868e7a/jpg][IMG]https://i5.imageban.ru/thumbs/2025.08.19/2f0109189e681842ab6826b4ac868e7a.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/19/f2a4fd4f9fbecd07986afc6451ee67b1/jpg][IMG]https://i1.imageban.ru/thumbs/2025.08.19/f2a4fd4f9fbecd07986afc6451ee67b1.jpg[/IMG][/URL][/spoiler]', 4, '2025-08-27 09:52:35', NULL, NULL, 'https://i6.imageban.ru/out/2025/08/19/a422f0e21409c0e3305472e0157d0d92.jpeg', 'magnet:?xt=urn:btih:789a54a130a9cdec6281b5cc0fb836b4d0e5a778&dn=Milliard.problem.S01.2025.WEB-DL.1080p.ExKinoRay&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'milliard-problem-01x01-13-iz-17-2025-webrip-1080p-ot-exkinoray', 0, 1, 1, 1, 0, '1756277555_cfaf33975652259591be.torrent', 1, 9, 41, 14, '2025-08-27 09:52:37', 1);
INSERT INTO public.torrents VALUES (35, 1, '\x6cd3208458e9cf774b76d355292092b558ca47a0', NULL, 1, 4382496684, 0, 'Наследие / Scheda [01x01 из 08] (2025) WEB-DL-HEVC 2160p от ExKinoRay | 4K | SDR | P', '[b]Название[/b]: Наследие
[b]Оригинальное название[/b]: Scheda
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: Драма, мистика, триллер, криминал
[b]Режиссер[/b]: Бартек Черлица, Петр Немейский
[b]В ролях[/b]: Магдалена Поплавська, Яцек Коман, Гжегож Даменцкий, Бартош Гельнер, Войцех Зелинский, Михалина Лабач, Михалина Бжуска, Зузанна Галевич, Кароль Похец, Антони Гогулка, Ян Тшош-Раставецкий, Йоанна Гоншорек

[b]О фильме[/b]: [i]Завещание бывшего моряка и местного героя сеет раздор среди его родственников. На поверхность начинают всплывать семейные тайны, а в небольшой провинциальной общине разворачивается борьба за власть.[/i]

[b]Страна[/b]: Польша
[b]Студия[/b]: HBO Max, Akson Studio, TVN Warner Bros
[b]Продолжительность[/b]: 1 x ~ 00:45:00
[b]Перевод[/b]: Профессиональный (многоголосый закадровый) HBO

[b]Кодек[/b]: MPEG-H HEVC
[b]Качество[/b]: WEB-DL-HEVC 2160p
[b]Видео[/b]: MPEG-H HEVC, ~ 13.3 Mбит/с, 3840x2160, 10 бит
[b]Аудио 1[/b]: Русский, E-AC-3, 48 kHz, 2 ch, 128 kbps | HBO
[b]Аудио 2[/b]: Английский, E-AC-3, 48 kHz, 6 ch, 256 kbps | HBO
[b]Аудио 3[/b]: Украинский, E-AC-3, 48 kHz, 6 ch, 256 kbps | HBO
[b]Аудио 4[/b]: Польский, E-AC-3, 48 kHz, 6 ch, 256 kbps | Original
[b]Субтитры[/b]: Английские, польские, литовские, латышские

[spoiler][URL=https://imageban.ru/show/2025/08/26/4fda5df6a7f085ff4715c00b3034ebcf/jpg][IMG]https://i3.imageban.ru/thumbs/2025.08.26/4fda5df6a7f085ff4715c00b3034ebcf.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/26/301fc79689f6fb251cfedd359ef6535b/jpg][IMG]https://i1.imageban.ru/thumbs/2025.08.26/301fc79689f6fb251cfedd359ef6535b.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/26/4e3b881307036bff38e6423bfd05856f/jpg][IMG]https://i3.imageban.ru/thumbs/2025.08.26/4e3b881307036bff38e6423bfd05856f.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/08/26/ae5e6293fd50d2ffa75ba71379b2a70a/jpg][IMG]https://i3.imageban.ru/thumbs/2025.08.26/ae5e6293fd50d2ffa75ba71379b2a70a.jpg[/IMG][/URL][/spoiler]', 3, '2025-08-27 09:42:09', NULL, NULL, 'https://i6.imageban.ru/out/2025/08/26/0de4ccd854061552c9efb6080a67afa5.jpg', 'magnet:?xt=urn:btih:6cd3208458e9cf774b76d355292092b558ca47a0&dn=Scheda.S01.2025.WEB-DL.HEVC.2160p.ExKinoRay&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'nasledie-scheda-01x01-iz-08-2025-web-dl-hevc-2160p-ot-exkinoray-4k-sdr-p', 0, 1, 1, 1, 0, '1756276929_4661f4347445d71c9670.torrent', 1, 3, 0, 16, '2025-08-27 09:42:11', 1);
INSERT INTO public.torrents VALUES (36, 1, '\x06af68c4421334c8fdb89aa8b3d83342516714b3', NULL, 24, 49485517470, 0, 'Участковый [01-24 из 24] (2011) WEBRip 1080p', '[b]Название[/b]: Участковый
[b]Год выхода[/b]: 2011
[b]Жанр[/b]: детектив
[b]Режиссер[/b]: Александр Строев, Михаил Кабанов
[b]В ролях[/b]: Александр Бухаров, Владимир Гостюхин, Дмитрий Щербина, Борис Хвошнянский, Ирина Сидорова, Ольга Красько, Варвара Маценова, Сергей Юшкевич, Максим Боков, Галина Стаханова, Дмитрий Титов, Сергей Бачурский, Никита Салопин, Матвей Зубалевич, Сергей Лызлов, Николай Сахаров, Илья Ждаников, Сергей Холмогоров, Ольга Дибцева, Алайбек Тойчубеков, Азамат Нигманов, Сергей Кагаков, Тамара Спиричева, Кирилл Петров, Павел Шингарев, Анна Казючиц, Максим Щёголев, Максим Заусалин, Кирилл Болтаев, Елена Цыплакова, Роман Радов, Александр Катин (старший), Евгений Фроленков (II), Филипп Александров, Янданэ, Наталья Людскова, Юлия Маргулис, Дмитрий Янышевский, Алексей Лонгин, Лариса Маркина, Александр Калугин (II), Алексей Огурцов, Филипп Гуревич, Роман Керимов, Тамта Лано, Игорь Ларин, Константин Похмелов, Андрей Филиппак, Игорь Корниенко, Максим Пинскер, Константин Спасский, Дмитрий Соколов, Дмитрий Марин (II), Кирилл Канахин, Егор Баринов, Светлана Малюкова, Пётр Ступин, Юлия Сулес, Павел Лысенок, Андрей Харыбин, Александр Вершинин, Данила Перов, Игорь Серебряный, Владимир Капустин, Кирилл Анисимов, Алексей Михайлов (II), Ольга Петрова (II), Екатерина Кульчицкая, Ольга Редько

[b]О фильме[/b]: [i]Оперуполномоченный УВД Сергей Громов, после неприятной истории на службе, вынужден принять предложение своего начальника о временном разжаловании в участковые московского района Новоселки. Но Громова не устраивает сам факт отсидки, он планирует работать и наводить порядок на своем участке. Участковому некогда скучать – много работы в районе: то драку местных хулиганов разрулить, то спасти запуганную жену от драчливого пьянчуги мужа, а еще надо заботиться о бывшей жене Вере и дочке Оксане, у которой сейчас непростой период переходного возраста...[/i]

[b]Страна[/b]: Россия
[b]Студия[/b]: Star Media
[b]Продолжительность[/b]: 24 x ~ 00:45:00
[b]Перевод[/b]: Не требуется

[b]Кодек[/b]: H.264
[b]Качество[/b]: WEBRip 1080p
[b]Видео[/b]: MPEG-4 (AVC), 1920х1080, 25 fps, ~ 6000 kbps, ~ 0.116 bit/pixel
[b]Звук[/b]: AAC, 48.0 kHz, 2 ch, 125 Kbps
[b]Субтитры[/b]: Русские (полные, отключаемые, SDH) НТВ

[spoiler][URL=https://imageban.ru/show/2025/08/24/82099e99387a4795d130c277bfee9340/png][IMG]https://i2.imageban.ru/thumbs/2025.08.24/82099e99387a4795d130c277bfee9340.png[/IMG][/URL][URL=https://imageban.ru/show/2025/08/24/89887b0e0a8b8b00e2cdc6d7655f0277/png][IMG]https://i1.imageban.ru/thumbs/2025.08.24/89887b0e0a8b8b00e2cdc6d7655f0277.png[/IMG][/URL][URL=https://imageban.ru/show/2025/08/24/a711d5bf7bfc284fce86c3fde04b5d39/png][IMG]https://i1.imageban.ru/thumbs/2025.08.24/a711d5bf7bfc284fce86c3fde04b5d39.png[/IMG][/URL][URL=https://imageban.ru/show/2025/08/24/2953d6532dd10022fc301ef19736d198/png][IMG]https://i1.imageban.ru/thumbs/2025.08.24/2953d6532dd10022fc301ef19736d198.png[/IMG][/URL][/spoiler]', 4, '2025-08-27 09:45:06', NULL, NULL, 'https://img.zannn.top/thumbnail1/width/250/file/http://i33.fastpic.ru/big/2012/0327/4b/abfe6146bc3d4da9c7374b53c104a34b.png', 'magnet:?xt=urn:btih:06af68c4421334c8fdb89aa8b3d83342516714b3&dn=%D0%A3%D1%87%D0%B0%D1%81%D1%82%D0%BA%D0%BE%D0%B2%D1%8B%D0%B9&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'ucastkovyj-01-24-iz-24-2011-webrip-1080p', 0, 1, 1, 1, 0, '1756277106_b16e58538be65eb251f7.torrent', 1, 12, 9, 68, '2025-08-27 09:45:08', 1);
INSERT INTO public.torrents VALUES (39, 1, '\x6174bfb44349605c72382512310bb7364ab3bc94', NULL, 8, 18601125732, 0, 'Жёны на охоте / The Hunting Wives [S01] (2025) WEB-DL 1080p | P | TVShows', '[b]Название[/b]: Жёны на охоте
[b]Оригинальное название[/b]: The Hunting Wives
[b]Год выхода[/b]: 2025
[b]Жанр[/b]: Триллер, драма, детектив
[b]Режиссер[/b]: Шерил Дунье, Дженнифер Гетцингер, Мелани Мэйрон, Джули Энн Робинсон

[b]В ролях[/b]: Малин Акерман, Бриттани Сноу, Дермот Малруни, Джейми Рэй Ньюман, Крисси Мец, Кэти Лоус, Эван Джоникайт, Джордж Феррье, Александрия ДеБерри, Брэнтон Боксер

[b]Описание сериала[/b]: [i]Софи О''Нил, некогда возглавлявшая глянцевый журнал, решает с мужем и сыном уехать из Нью-Йорка в тихий городок на востоке Техаса. Там она знакомится со светской львицей Марго Бэнкс, которая устраивает для местных женщин клуб, где можно выпить, пострелять по тарелочкам и обсудить всё на свете. Софи поддается обаянию Марго, но понимает, что дело неладно, когда на окраине леса находят труп девочки, а участницы клуба - первые в списке подозреваемых.[/i]

[b]Страна[/b]: США
[b]Студия[/b]: 3 Arts Entertainment, Lionsgate Television/NBC, May Cobb Productions, Rebecca Cutter Productions
[b]Продолжительность[/b]: ~00:50:00
[b]Перевод[/b]: Профессиональный (многоголосый, закадровый) TVShows
[b]Субтитры[/b]: Английские (SDH)

[b]Формат[/b]: MKV
[b]Качество[/b]: WEB-DL (1080p)

[b]Видео[/b]: 1920x1080 (16:9), 23,976 fps, AVC (х264), High@L4, ~5000 kbps avg, 0.101 bit/pixel
[b]Аудио RUS[/b]:  48 kHz, AC3, 3/2 (L, C, R, l, r) + LFE ch, ~384 kbps avg
[b]Аудио ENG[/b]:  48 kHz, E-AC3, 3/2 (L, C, R, l, r) + LFE ch, ~640 kbps avg

[spoiler][URL=https://imageban.ru/show/2025/07/29/858c054560ecad7f4c042279284aa417/jpg][IMG]https://i3.imageban.ru/thumbs/2025.07.29/858c054560ecad7f4c042279284aa417.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/07/29/c7652ac3d3c7c00e1c7a4c79473473aa/jpg][IMG]https://i1.imageban.ru/thumbs/2025.07.29/c7652ac3d3c7c00e1c7a4c79473473aa.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/07/29/c3bde198b3cf539dd0a8a76e3edf870a/jpg][IMG]https://i3.imageban.ru/thumbs/2025.07.29/c3bde198b3cf539dd0a8a76e3edf870a.jpg[/IMG][/URL][URL=https://imageban.ru/show/2025/07/29/cef3117ca01faa0919896b8aeb74715f/jpg][IMG]https://i2.imageban.ru/thumbs/2025.07.29/cef3117ca01faa0919896b8aeb74715f.jpg[/IMG][/URL][/spoiler]', 3, '2025-08-27 10:00:38', NULL, NULL, 'https://i125.fastpic.org/big/2025/0729/f5/abfab587b9c738189624360e54b60af5.jpg', 'magnet:?xt=urn:btih:6174bfb44349605c72382512310bb7364ab3bc94&dn=The.Hunting.Wives.2025.S01.WEB-DL.1080p.TVShows&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Fmgtracker.org%3A2710%2Fannounce&tr=udp%3A%2F%2Fmgtracker.org%3A6969%2Fannounce&tr=http%3A%2F%2Fmgtracker.org%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.tiny-vps.com%3A6969%2Fannounce&tr=udp%3A%2F%2F182.176.139.129%3A6969%2Fannounce&tr=udp%3A%2F%2F168.235.67.63%3A6969%2Fannounce&tr=udp%3A%2F%2F46.4.109.148%3A6969%2Fannounce&tr=udp%3A%2F%2F37.19.5.155%3A2710%2Fannounce&tr=http%3A%2F%2Fbt.evrl.to%2Fannounce&tr=http%3A%2F%2Ftracker.mg64.net%3A6881%2Fannounce&tr=http%3A%2F%2Ftracker.torrentyorg.pl%2Fannounce&tr=http%3A%2F%2Ftracker.baravik.org%3A6970%2Fannounce&tr=udp%3A%2F%2Ftracker.filetracker.pl%3A8089%2Fannounce&tr=http%3A%2F%2Ftracker1.wasabii.com.tw%3A6969%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2F37.19.5.139%3A6969%2Fannounce&tr=http%3A%2F%2F37.19.5.155%3A6881%2Fannounce&tr=http%3A%2F%2F210.244.71.26%3A6969%2Fannounce&tr=http%3A%2F%2F213.159.215.198%3A6970%2Fannounce&tr=udp%3A%2F%2Fpublic.popcorn-tracker.org%3A6969%2Fannounce&tr=udp%3A%2F%2Fbt.xxx-tracker.com%3A2710%2Fannounce&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'zeny-na-ohote-the-hunting-wives-s01-2025-web-dl-1080p-p-tvshows', 0, 1, 1, 2, 0, '1756278038_5fb2595e2375518f79b0.torrent', 1, 137, 176, 2234, '2025-08-27 10:00:40', 1);
INSERT INTO public.torrents VALUES (38, 1, '\x5452cd4becf116f5918009c6adc591f65e073332', NULL, 20, 5864795947, 0, 'Циники [S01] (2025) WEB-DLRip от ExKinoRay', '[b]Оригинальное название[/b]: Циники
[b]Год выпуска[/b]: 2025
[b]Жанр[/b]: Драма, комедия
[b]Выпущено[/b]: Россия, Общественное мнение
[b]Режиссер[/b]: Ирина Бас
[b]В ролях[/b]: Аскар Ильясов, Светлана Иванова (I), Виктория Исакова, Кирилл Кяро, Евгений Стычкин, Денис Власенко, Лев Зулькарнаев, Юлия Топольницкая, Вячеслав Чепурченко, Нино Нинидзе, Диана Милютина, Павел Ворожцов, Алексей Розин, Валерия Елкина, Василий Копейкин

[b]О фильме[/b]: [i]Циник и авантюрист Джамал бежит из Казани в Москву, спасаясь от преследования влиятельного отца своей любовницы. В столице ловелас устраивается на работу в Школу отношений с говорящим названием «Эгоисты». Лучший сотрудник школы, дипломированный психолог и амбициозная карьеристка Елена Островская, не рада появлению нового дерзкого коллеги, которого считает проходимцем и лжецом. В ответ Джамал с большим удовольствием высмеивает консервативные и старомодные методы работы Елены. Между ними начинается настоящая война, которая перерастает в страсть, ставя под сомнение их привычный циничный подход к жизни.[/i]

[b]Качество[/b]: WEB-DLRip
[b]Видео[/b]: XviD, ~ 1650 Кбит/с, 720x304
[b]Аудио[/b]: MP3, 2 ch, 192 Кбит/с
[b]Продолжительность[/b]: ~ 00:47:00
[b]Язык[/b]: Русский
[b]Субтитры[/b]: Русские (полные, отключаемые)

[spoiler][URL=https://fastpic.org/view/125/2025/0806/b30366e143c4fa0113ed5c4b0fce74c1.jpg.html][IMG]https://i125.fastpic.org/thumb/2025/0806/c1/b30366e143c4fa0113ed5c4b0fce74c1.jpeg[/IMG][/URL][URL=https://fastpic.org/view/125/2025/0806/c2235bf312c69850a89c2b026a395839.jpg.html][IMG]https://i125.fastpic.org/thumb/2025/0806/39/c2235bf312c69850a89c2b026a395839.jpeg[/IMG][/URL][URL=https://fastpic.org/view/125/2025/0806/82790b218bbe517f35c754cbc0d57e46.jpg.html][IMG]https://i125.fastpic.org/thumb/2025/0806/46/82790b218bbe517f35c754cbc0d57e46.jpeg[/IMG][/URL][URL=https://fastpic.org/view/125/2025/0806/b75754e0ae7ac1c6d06c284f22f4a30e.jpg.html][IMG]https://i125.fastpic.org/thumb/2025/0806/0e/b75754e0ae7ac1c6d06c284f22f4a30e.jpeg[/IMG][/URL][/spoiler]', 4, '2025-08-27 09:57:17', NULL, NULL, 'https://i125.fastpic.org/big/2025/0804/dc/a47bcdb3e68a40491281ea4390b2f2dc.jpg', 'magnet:?xt=urn:btih:5452cd4becf116f5918009c6adc591f65e073332&dn=Tsiniki.2025.WEB-DLRip.ExKinoRay&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80%2Fannounce&tr=http%3A%2F%2Fexkinoray.ru%2Fannounce.php%3Fpasskey%3D83d54b4197614d4f48a85c8f7493700e&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'ciniki-s01-2025-web-dlrip-ot-exkinoray', 0, 1, 1, 1, 0, '1756277837_f48fb87649f09594ef20.torrent', 1, 147, 25, 1996, '2025-08-27 09:57:20', 1);
INSERT INTO public.torrents VALUES (40, 1, '\x677953577b953b64e412ed209d3e3388cce7923f', NULL, 6, 4366191538, 0, 'В глуши / Неукротимый / Untamed [S01] (2025) WEB-DLRip-AVC от DoMiNo & селезень | Red Head Sound', '[b]Название[/b]: В глуши / Неукротимый
[b]Оригинальное название[/b]: Untamed
[b]Год выпуска[/b]: 2025
[b]Жанр[/b]: Триллер, драма, криминал, детектив
[b]Режиссёр[/b]: Томас Безуча, Ниса Хардиман, Ник Мерфи
[b]В ролях[/b]: Эрик Бана, Сэм Нилл, Лили Сантьяго, Розмари ДеУитт, Уилсон Бетел, Уильям С. Смилли, Рауль Макс Трухильо, Джош Рэндолл, Эзра Фрэнки, Никола Коррейя-Дамуде, Джо Холт, Тревор Кэрролл, Оми Фитцпатрик-Гонсалес, Эзра Уилсон, Тейлор Хиксон

[b]Описание[/b]: [i]Для кого-то Йосемитский национальный парк — просто живописный заповедник с захватывающими дух видами. Для специального агента Службы национальных парков Кайла Тернера — это место преступления. Расследуя жестокое убийство, герой пытается вычислить преступника, который, судя по всему, знает эту местность не хуже него. В поисках ему помогает только что поступившая на службу рейнджером Ная Васкес — бывшая полицейская из Лос-Анджелеса, переехавшая в Йосемити вместе со своим 4-летним сынишкой. По мере продвижения расследования Тернеру придется подозревать коллег и близких, а также столкнуться с призраками собственного прошлого.[/i]

[b]Страна[/b]: США
[b]Продолжительность[/b]: ~ 00:40:00
[b]Платформа[/b]: Netflix
[b]Перевод[/b]: Профессиональный (многоголосый закадровый) | Red Head Sound
[b]Субтитры[/b]: Русские (Full |Netflix|), Английские

[b]Формат[/b]: Matroska
[b]Качество[/b]: WEB-DLRip-AVC | NF
[b]Видео[/b]: 1024x512 at 23.976 fps, x264@L4.1, ~1800 kb/s
[b]Аудио[/b]: AC3, 2 ch, ~192 kb/s - | Русский | 
[b]Формат субтитров[/b]: softsub (SRT)

[spoiler][URL=https://imageban.ru/show/2025/07/20/a186c7ccaf38a8505c6d97f5999b5f9f/png][IMG]https://i6.imageban.ru/thumbs/2025.07.20/a186c7ccaf38a8505c6d97f5999b5f9f.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/20/d26bf63ef605d42a248cfa2559afc453/png][IMG]https://i3.imageban.ru/thumbs/2025.07.20/d26bf63ef605d42a248cfa2559afc453.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/20/6a60639eb6c6976b2302c89c8d25acf0/png][IMG]https://i8.imageban.ru/thumbs/2025.07.20/6a60639eb6c6976b2302c89c8d25acf0.png[/IMG][/URL][URL=https://imageban.ru/show/2025/07/20/62e4e054d7a1149031ddef913cec5a56/png][IMG]https://i7.imageban.ru/thumbs/2025.07.20/62e4e054d7a1149031ddef913cec5a56.png[/IMG][/URL][/spoiler]', 3, '2025-08-27 10:03:06', NULL, NULL, 'https://i125.fastpic.org/big/2025/0729/06/6191f4649143c374bea15a2b5dfbac06.jpg', 'magnet:?xt=urn:btih:677953577b953b64e412ed209d3e3388cce7923f&dn=Untamed.2025.S01.WEB-DLRip.x264.seleZen&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.torrent.eu.org%3A451%2Fannounce&tr=https%3A%2F%2Ftracker.lilithraws.org%3A443%2Fannounce&tr=https%3A%2F%2Ftracker.yemekyedim.com%3A443%2Fannounce&tr=https%3A%2F%2Ftrackers.mlsub.net%3A443%2Fannounce&tr=http%3A%2F%2Fbt.desol.one%3A2710%2Fannounce&tr=http%3A%2F%2Fbt.okmp3.ru%3A2710%2Fannounce&tr=http%3A%2F%2Ftracker.bt4g.com%3A2095%2Fannounce&tr=http%3A%2F%2Ftracker.renfei.net%3A8080%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce', 'v-glusi-neukrotimyj-untamed-s01-2025-web-dlrip-avc-ot-domino-selezen-red-head-sound', 0, 1, 1, 1, 0, '1756278186_df24e8f8c53613a94d5b.torrent', 1, 200, 29, 3758, '2025-08-27 10:03:08', 1);
INSERT INTO public.torrents VALUES (41, 1, '\xb94a76409b22bb2c7002268369f23a4d6e18278c', NULL, 651, 189530532419, 0, 'Секретные материалы / The X-Files [S01-11] (1993-2018) BDRip | ТВ3', '[b]Название[/b]: Секретные материалы
[b]Оригинальное название[/b]: The X-Files
[b]Год выхода[/b]: 1993-2018
[b]Жанр[/b]: фантастика, детектив, ужасы, триллер, драма, криминал
[b]Режиссер[/b]: Крис Картер, Ким Мэннерс, Роб Боумен, Дэвид Наттер и другие
[b]В ролях[/b]: Джиллиан Андерсон, Дэвид Духовны, Митч Пиледжи, Уильям Б. Дэвис, Роберт Патрик, Том Брэйдвуд, Брюс Харвуд, Дин Хэглунд, Аннабет Гиш, Николас Ли и другие

[b]О фильме[/b]: [i]Специальному агенту Дане Скалли, доктору и преподавателю академии ФБР в Вирджинии, поручают работу в паре с агентом Фоксом Малдером над проектом «Секретные материалы», архивом таинственных, нерешенных дел ФБР, которые зачастую связаны с паранормальными явлениями, случаями вампиризма и оборотничества, нападением генетических мутантов, свидетельствами о похищении людей пришельцами…

Малдер верит в пришельцев и пытается убедить скептика Скалли, что не всё и не всегда поддаётся разумному объяснению. В своих дискуссиях Малдер и Скалли не столько стараются убедить друг друга, сколько получают удовольствие от самого общения. Постепенно первоначальное взаимное недоверие перерастает в дружбу, а чуть позже и в более глубокое чувство.[/i]

[b]Страна[/b]:  США
[b]Студия[/b]: 20th Century Fox Television, Ten Thirteen Productions
[b]Продолжительность[/b]: ~ 00:43:00 серия
[b]Перевод[/b]: Профессиональный (дублированный), Профессиональный (многоголосый, закадровый)

[b]Качество[/b]: BDRip | исх. BDRemux 1080p
[b]Формат[/b]: AVI
[b]Видео[/b]: 720x400 at 23.976 fps, XviD, ~2000 kbps avg
[b]Aудио#1[/b]:  Russian: 48 kHz, AC3, 2 ch, ~192 kbps avg |ТВ3|
[b]Aудио#2[/b]:  English: 48 kHz, AC3, 6 ch, ~384 kbps avg
[b]Субтитры[/b]: Russian (Forced |Hardsub|, Full |KP|), English (Full)

[URL=https://imageban.ru/show/2023/07/01/1e97f3855afe41a80ca40efb8ab58148/png][IMG]https://i1.imageban.ru/thumbs/2023.07.01/1e97f3855afe41a80ca40efb8ab58148.png[/IMG][/URL][URL=https://imageban.ru/show/2023/07/01/c695ce4736beed4e72a11dcacee66fa2/png][IMG]https://i3.imageban.ru/thumbs/2023.07.01/c695ce4736beed4e72a11dcacee66fa2.png[/IMG][/URL][URL=https://imageban.ru/show/2023/07/01/7181417e65029736b791c4c3b6b1d64d/png][IMG]https://i6.imageban.ru/thumbs/2023.07.01/7181417e65029736b791c4c3b6b1d64d.png[/IMG][/URL][URL=https://imageban.ru/show/2023/07/01/f8fb580cd203834c1e7360b4d70fe1b3/png][IMG]https://i2.imageban.ru/thumbs/2023.07.01/f8fb580cd203834c1e7360b4d70fe1b3.png[/IMG][/URL]', 3, '2025-08-27 10:07:57', NULL, NULL, 'https://i4.imageban.ru/out/2023/07/01/c9de88acc7d8b4cde5eee9ba6d02ca39.jpg', 'magnet:?xt=urn:btih:b94a76409b22bb2c7002268369f23a4d6e18278c&dn=The.X.Files.BDRip.TV3&tr=udp%3A%2F%2Fopentor.net%3A6969&tr=http%3A%2F%2Fbt4.t-ru.org%2Fann%3Fpk%3Dff97569cfd157fa554952e4ce8855879&tr=http%3A%2F%2Fretracker.local%2Fannounce&tr=http%3A%2F%2Ftracker.grepler.com%3A6969%2Fannounce&tr=udp%3A%2F%2Ftracker.dler.com%3A6969%2Fannounce&tr=http%3A%2F%2Fh4.trakx.nibba.trade%3A80%2Fannounce&tr=udp%3A%2F%2Fopen.stealth.si%3A80%2Fannounce&tr=udp%3A%2F%2Ftracker.bitsearch.to%3A1337%2Fannounce&tr=udp%3A%2F%2Fexodus.desync.com%3A6969%2Fannounce', 'sekretnye-materialy-the-x-files-s01-11-1993-2018-bdrip-tv3', 0, 1, 1, 1, 0, '1756278477_af2c36e923a2adf1e60e.torrent', 1, 16, 30, 76, '2025-08-27 10:07:59', 1);


--
-- Name: admin_log_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.admin_log_id_seq', 1, false);


--
-- Name: auth_groups_users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.auth_groups_users_id_seq', 3, true);


--
-- Name: auth_identities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.auth_identities_id_seq', 10, true);


--
-- Name: auth_logins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.auth_logins_id_seq', 4, true);


--
-- Name: auth_permissions_users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.auth_permissions_users_id_seq', 1, false);


--
-- Name: auth_remember_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.auth_remember_tokens_id_seq', 4, true);


--
-- Name: auth_token_logins_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.auth_token_logins_id_seq', 1, false);


--
-- Name: bookmarks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.bookmarks_id_seq', 1, false);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.categories_id_seq', 12, true);


--
-- Name: comments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.comments_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.migrations_id_seq', 1, false);


--
-- Name: news_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.news_id_seq', 1, false);


--
-- Name: reports_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.reports_id_seq', 1, false);


--
-- Name: settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.settings_id_seq', 1, false);


--
-- Name: torrents_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.torrents_id_seq', 43, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: torrent
--

SELECT pg_catalog.setval('public.users_id_seq', 3, true);


--
-- PostgreSQL database dump complete
--

