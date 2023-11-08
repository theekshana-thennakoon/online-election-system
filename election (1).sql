-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 08:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `election`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `pwd`) VALUES
(1, 'theekshanathennakoon79@gmail.com', '$2y$10$G98mUmuBBnY1OgwHffzRouWsE39nBjth1Vdez1mPjyQfxMdIds5lm');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `namee` text NOT NULL,
  `names` text NOT NULL,
  `namet` text NOT NULL,
  `number` int(11) NOT NULL,
  `constituency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `pid`, `namee`, `names`, `namet`, `number`, `constituency`) VALUES
(1, 26, 'Thennakoon Mudiyanselage Nipun Theekshana Thennakoon', 'තෙන්නකෝන් මුදියන්සේලාගේ නිපුන් තීක්ෂණ තෙන්නකෝන්', 'தென்னகோன் முதியன்சேலகே நிபுன் தீட்சண தென்னகோன்', 0, ''),
(3, 26, 'Kalu Arachchillage Janitha Sujani Lakmini Wijesundara', 'කළු ආරච්චිල්ලාගේ ජනිතා සුජානි ලක්මිනි විජේසුන්දර', 'களு ஆராச்சிலகே ஜெனிதா சுஜானி லக்மினி விஜேசுந்தர', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `electiondate`
--

CREATE TABLE `electiondate` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electiondate`
--

INSERT INTO `electiondate` (`id`, `date`) VALUES
(1, '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` int(11) NOT NULL,
  `namee` mediumtext NOT NULL,
  `names` mediumtext NOT NULL,
  `namet` mediumtext NOT NULL,
  `symbol` varchar(100) NOT NULL,
  `filenumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `namee`, `names`, `namet`, `symbol`, `filenumber`) VALUES
(1, 'All Ceylon Tamil Congress', 'අකිල ඉලංකෙයි තමිල් කොංග්‍රස්', 'mfpy  ,yq;if  jkpo; fhq;fpu];', 'Bicycle', 1),
(2, 'Akhila Ilankai Tamil Mahasabha', 'අකිල ඉලංකෙයි ද්‍රවිඩ මහා සභා', 'mfpy  ,yq;if  jkpou; kfhrig', 'Ship', 2),
(3, 'Ape janabala Pakshaya', 'අකප් ජනබල පක්ෂය', 'vq;fs;  kf;fs;  rf;jp  fl;rp', 'Flag', 32),
(4, 'New Independent Front', 'අභිනව නිවහල් පෙරමුණ', 'Gjpa  Rje;jpu  Kd;dzp', 'Till', 19),
(5, 'Arunalu Peoples Alliance', 'අරුණළු ජනතා පෙරමුණ', 'mUzY  kf;fs;  Kd;dzp', 'Water Tap', 79),
(6, 'All Ceylon Makkal Congress', 'අහිල ඉලංගෙයි මහජන කොංග්‍රසය', 'mfpy  ,yq;if  kf;fs; fhq;fpu];', 'Peacock', 3),
(7, 'Ilankai Tamil Arasu Kadchi', 'ඉලංකෙයි තමිල් අරසු කච්චි', ',yq;ifj;  jkpo;  muRf;  fl;rp', 'House', 5),
(8, 'Eros Democratic front', 'ඊරෝස් ප්‍රජාතන්ත්‍රවාදී පෙරමුණ', '<Nuh];  [dehaf  Kd;dzp', 'MegaPhone', 90),
(9, 'Eelavar Democratic Front', 'ඊලවර් ප්‍රජාතන්ත්‍රවාදී පෙරමුණ', '<otu;  [dehaf  Kd;dzp', 'Plough', 6),
(10, 'Eelam People\'s Democratic Party', 'ඊලාම් ජනතා ප්‍රජාතන්ත්‍රවාදී පක්ෂය', '<o  kf;fs;  [dehaff;  fl;rp', 'Veena', 7),
(11, 'United Congress Party', 'එක්සත් කොන්ග්‍රස් පක්ෂය', 'If;fpa  fhq;fpu];  fl;rp', 'Camel', 85),
(12, 'United People\'s Freedom Alliance', 'එක්සත් ජනතා නිදහස් සන්ධානය', 'If;fpa  kf;fs;  Rje;jpu Kd;dzp', 'Betel Leaf', 10),
(13, 'United Republican Front', 'එක්සත් ජනරජ පෙරමුණ', 'If;fpa  FbauR  Kd;dzp', 'Pencil', 30),
(14, 'United National Freedom Front', 'එක්සත් ජාතික නිදහස් පෙරමුණ', 'If;fpa  Njrpa  Rje;jpu Kd;dzp', 'Comb of Plantains', 70),
(15, 'United National Party', 'එක්සත් ජාතික පක්ෂය', 'If;fpa  Njrpaf;  fl;rp', 'Elephant', 11),
(16, 'United National Alliance', 'එක්සත් ජාතික සන්ධානය', 'If;fpa  Njrpa  $l;likg;G', 'Pair of Scales', 48),
(17, 'Democratic Unity Alliance', 'එක්සත්  ප්‍රජාතන්ත්‍රවාදී සන්ධානය', '[dehaf  If;fpa  Kd;dzp', 'Two Leaves', 14),
(18, 'United People\'s Party', 'එක්සත් මහජන  පක්ෂය', 'If;fpa  kf;fs;  fl;rp', 'Mobile Phone', 16),
(19, 'Eksath Lanka Podujana Pakshaya', 'එක්සත් ලංකා පොදුජන පක්ෂය', 'vf;rj;  yq;fh  nghJ[d  gf;\\a', 'Cup', 15),
(20, 'Eksath Lanka Maha Saba Party', 'එක්සත් ලංකා මහා සභා පක්ෂය', 'vf;rj;  yq;fh  kfhrgh  fl;rp', 'Cobra', 17),
(21, 'United Left Front', 'එක්සත් වාමාංශික පෙරමුණ', 'If;fpa  ,lJrhup  Kd;dzp', 'Canoe', 71),
(22, 'United Socialist Party', 'එක්සත් සමාජවාදී පක්ෂය', 'If;fpa  Nrhrypr  fl;rp', 'Tri-shaw', 18),
(23, 'United Peace Alliance', 'එක්සත් සාම සන්ධානය', 'If;fpa  rkhjhd  $l;likg;G', 'Butterfly', 49),
(24, 'Up-Country People\'s Front', 'කඳුරට ජනතා පෙරමුණ', 'kiyaf  kf;fs;  Kd;dzp', 'Mammoty', 20),
(25, 'Workers National Front', 'කම්කරු ජාතික පෙරමුණ', 'njhopyhsu;  Njrpa  Kd;dzp', 'Sickle', 72),
(26, 'People\'s Liberation Front', 'ජනතා විමුක්ති පෙරමුණ', 'kf;fs;  tpLjiy  Kd;dzp', 'Bell', 21),
(27, 'Peoples Servant\'s Party', 'ජනතා සේවක පක්ෂය', 'kf;fs;  Nrtfu;  fl;rp', 'Guitar', 78),
(28, 'Democratic Tamil National Alliance', 'ජන්නායක තමිළ් තේසිය කූට්ටනි', '[dehaf  jkpo;  Njrpa  $l;lzp', 'Brass Lamp', 22),
(29, 'Jana Setha Peramuna', 'ජනසෙත පෙරමුණ', '[dnrj  nguKz', 'Tractor', 24),
(30, 'National Congress', 'ජාතික කොංග්‍රසය', 'Njrpa  fhq;fpu];', 'Horse', 25),
(31, 'Jathika Jana Balawegaya', 'ජාතික ජනබලවේගය', 'Njrpa  kf;fs;  rf;jp', 'Compass', 13),
(32, 'National Peoples Party', 'ජාතික ජනතා පක්ෂය', 'Njrpa  kf;fs;  fl;rp', 'Electric Bulb', 26),
(33, 'National Freedom Front', 'ජාතික නිදහස් පෙරමුණ', 'Njrpa  Rje;jpu  Kd;dzp', 'Panchaudaya', 27),
(34, 'National Democratic Front', 'ජාතික ප්‍රජාතන්ත්‍රවාදී පෙරමුණ', 'Njrpa  [dehaf  Kd;dzp', 'Motor car', 50),
(35, 'Jathika Sangwardhena Peramuna', 'ජාතික සංවර්ධන පෙරමුණ', '[hjpf  rq;tu;jd  nguKd', 'Coconut', 28),
(36, 'National Unity Alliance', 'ජාතික සමගි පෙරමුණ', 'Njrpa  If;fpa  Kd;dzp', 'Pigeon', 73),
(37, 'Thamizh Makkal Koottani', 'තමිල් මක්කල් කූට්ටනි', 'jkpo;  kf;fs;  $l;lzp', 'Deer', 83),
(38, 'Thamil Makkal Thesiya Kuttani', 'තමිල් මක්කල් තේසිය කූට්ටනි', 'jkpo;  kf;fs;  Njrpa  $l;lzp', 'Fish', 8),
(39, 'Thamil Makkal Viduthalai Pulikal', 'තමිළ් මක්කල් විඩුදලෛප් පුළිකල්', 'jkpo;  kf;fs;  tpLjiyg;  Gypfs;', 'Boat', 31),
(40, 'Tamil Ptrogressive Alliance', 'දමිල ප්‍රගතිශීලී සන්ධානය', 'jkpo;  Kw;Nghf;F  $l;lzp', 'Touch Light', 82),
(41, 'Social Democratic Party of Tamils', 'දෙමල සමාජ ප්‍රජාතන්ත්‍ර පක්ෂය', 'jkpou;  r%f  [dehaff;  fl;rp', 'Candle', 39),
(42, 'Dewana Parapura', 'දෙවන පරපුර', ',uz;lhtJ  jiyKiw', 'Pen', 86),
(43, 'Deshapremi Eksath Jathika Pakshaya', 'දේශප්‍රේමී එක්සත් ජාතික පක්ෂය', 'ehw;Wg;gw;whsu;  If;fpa  Njrpa fl;rp', 'Rainosiras', 88),
(44, 'Desha Vimukthi Janatha Party', 'දේශ විමුක්ති ජනතා පක්ෂය', 'Njr  tpKf;jp  [djh  gf;\\a', 'Ear of paddy', 33),
(45, 'Tamil Eelam Liberation Organization', 'ද්‍රවිඩ ඊලාම් විමුක්ති සන්විධානය', 'jkpo;  <o  tpLjiy  ,af;fk;', 'Light House', 34),
(46, 'Tamil United Liberation Front', 'ද්‍රවිඩ එක්සත් විමුක්ති පෙරමුණ', 'jkpou;  tpLjiyf;  $l;lzp', 'Sun', 35),
(47, 'New Democratic Front', 'නව ප්‍රජාතන්ත්‍රවාදී පෙරමුණ', 'Gjpa  [dehaf  Kd;dzp', 'Swan', 36),
(48, 'New Democratic Marxist Leninist Party', 'නව ප්‍රජාතන්ත්‍රවාදී මාක්ස් ලෙනින් වාදී පක්ෂය', 'Gjpa  [dehaf  khf;rpr nydpdprf;  fl;rp', 'Kettle', 80),
(49, 'Nawa Lanka Nidahas Pakshaya', 'නව ලංකා නිදහස් පක්ෂය', 'et  yq;fh  epj`];  gf;\\a', 'Rabbit', 84),
(50, 'Nawa Sama Samaja Party', 'නව සමසමාජ පක්ෂය', 'et  rkrkh[f;  fl;rp', 'Table', 37),
(51, 'Nawa Sihala Urumaya', 'නව සිහළ උරුමය', 'et  rp`y  cWka', 'Bow and Arrow', 38),
(52, 'Freedom Peoples Front', 'නිදහස් ජනතා පෙරමුණ', 'Rje;jpu  kf;fs;  Kd;dzp', 'Helicopter', 89),
(53, 'Pivithuru Hela Urumaya', 'පිවිතුරු හෙළ උරුමය', 'gptpj;JU  n`y  cWka', 'Flower', 76),
(54, 'Puravesi Peramuna', 'පුරවැසි පෙරමුණ', 'gpui[fs;  Kd;dzp', 'Omnibus', 40),
(55, 'Frontline Socialist Party', 'පෙරටුගාමී සමාජවාදී පක්ෂය', 'Kd;dpiy  Nrh\\yp]  fl;rp', 'Sledge Hammer', 23),
(56, 'People\'s Alliance', 'පොදුජන එක්සත් පෙරමුණ', 'nghJrd  If;fpa  Kd;dzp', 'Chair', 41),
(57, 'Democratic United National Front', 'ප්‍රජාතන්ත්‍රවාදී එක්සත් ජාතික පෙරමුණ', '[dehaf  If;fpa  Njrpa Kd;dzp', 'Eagle', 42),
(58, 'Democratic People Congress', 'ප්‍රජාතන්ත්‍රවාදී ජනතා කොංග්‍රසය', '[dehaf  kf;fs;  fhq;fpu];', 'Post Box', 91),
(59, 'Democratic Peoples Front', 'ප්‍රජාතන්ත්‍රවාදී ජනතා පෙරමුණ', '[dehaf  kf;fs;  Kd;dzp', 'Ladder', 43),
(60, 'Democratic People\'s Liberation Front', 'ප්‍රජාතන්ත්‍රවාදී ජනතා විමුක්ති පෙරමුණ', '[dehaf  kf;fs;  tpLjiy Kd;dzp', 'Anchor', 44),
(61, 'Democratic National Alliance', 'ප්‍රජාතන්ත්‍රවාදී ජාතික සන්ධානය', '[dehaf  Njrpa  $l;lzp', 'Trophy', 45),
(62, 'Democratic Party', 'ප්‍රජාතන්ත්‍රවාදී පක්ෂය', '[dehaff;  fl;rp', 'Flaming torch', 68),
(63, 'Democratic Left Front', 'ප්‍රජාතන්ත්‍රවාදී වාමාංශික පෙරමුණ', '[dehaf  ,lJrhup  Kd;dzp', 'Clock', 46),
(64, 'Maubima Janatha Pakshaya', 'මව්බිම ජනතා පක්ෂය', 'nksgpk  [djh  gf;\\a', 'Aeroplane', 67),
(65, 'Mahajana Eksath Peramuna', 'මහජන එක්සත් පෙරමුණ', 'k`[d  vf;rj;  nguKd', 'Cart Wheel', 47),
(66, 'National Front for Good Governance', 'යහපාලනය සඳහා වූ ජාතික පෙරමුණ', 'ey;yhl;rpf;fhd  Njrpa  Kd;dzp', 'Double Flag', 74),
(67, 'Ceylon Worker\'s Congress (P.Wing)', 'ලංකා කම්කරු කොංග්‍රසය (දේශපාලන අංශය)', ',yq;if  njhopyhsu;  fhq;fpu]; (murpay;  gpupT)', 'Cockerel', 51),
(68, 'Lanka Janatha Party', 'ලංකා ජනතා පක්ෂය', ',yq;if  kf;fs;  fl;rp', 'Dayamond', 77),
(69, 'Lanka Sama Samaja Party', 'ලංකා සම සමාජ පක්ෂය', 'yq;fh  rkrkh[f;  fl;rp', 'Key', 52),
(70, 'Liberal Democratic  Party', 'ලිබරල් ප්‍රජාතන්ත්‍රවාදී පක්ෂය', 'ypguy;  [dehaf  fl;rp', 'Book', 53),
(71, 'Sri Lanka Labour Party', 'ශ්‍රී ලංකා කම්කරු පක්ෂය', 'yq;fh  njhopyhsu;  fl;rp', 'Kangaroo', 55),
(72, 'Sri Lanka Freedom Party', 'ශ්‍රී ලංකා නිදහස් පක්ෂය', 'yq;fh  Rje;jpuf;  fl;rp', 'Hand', 58),
(73, 'Sri Lanka Podujana Peramuna', 'ශ්‍රී ලංකා පොදුජන පෙරමුණ', 'yq;fh  nghJ[d  nguKd', 'Flower Bud', 56),
(74, 'Sri Lanka Progressive Front', 'ශ්‍රී ලංකා ප්‍රගතිශීලී පෙරමුණ', 'yq;fh  Kw;Nghf;F  Kd;dzp', 'Flower Vase', 60),
(75, 'Sri Lanka Mahajana Pakshaya', 'ශ්‍රී ලංකා මහජන පක්ෂය', 'yq;fh  kf;fs;  fl;rp', 'Eye', 61),
(76, 'Sri Lanka Muslim Congress', 'ශ්‍රී ලංකා මුස්ලිම් කොංග්‍රසය.', 'yq;fh  K];ypk;  fhq;fpu];', 'Tree', 62),
(77, 'Communist Party of Sri Lanka', 'ශ්‍රී ලංකාවේ කොමියුනිස්ට් පක්ෂය', 'yq;fh  nfhkpA+dp];l;  fl;rp', 'Star', 63),
(78, 'Social Democratic Party of Sri Lanka', 'රී ලංෙcකව් සමcජ ප්‍රජcතන්රවcී eක්ෂය', 'yq;fh  r%f  [dehaff; fl;rp', 'Kite', 87),
(79, 'Socialist Party of Sri Lanka', 'ශ්‍රී ලංකාවේ සමාජ ප්‍රජාතන්ත්රවාදී පක්ෂය', ',yq;if  Nrhryprf;  fl;rp', 'Balloon', 75),
(80, 'Samagi Jana Balawegaya', 'සමගි ජන බලවේගය', 'If;fpa  kf;fs;  rf;jp', 'Telephone', 4),
(81, 'Samaththuva Kadchi', 'සමත්තූව කච්චි', 'rkj;Jtf;  fl;rp', 'Shield', 81),
(82, 'Samabima Party', 'සමබිම පක්ෂය', 'rk  epyk;  fl;rp', 'Envelop', 59),
(83, 'Socialist Alliance', 'සමාජවාදී ජනතා පෙරමුණ', 'Nrh\\yp]  kf;fs;  Kd;dzp', 'Clay Lamp', 65),
(84, 'Socialist People?s Forum', 'සමාජවාදී ජනතා සංසදය', 'Nrhrypr  kf;fs;  kd;wk;', 'Umbrella', 54),
(85, 'Socialist Equality Party', 'සමාජවාදී සමානතා පක්ෂය', 'Nrhrypr  rkj;Jtf;  fl;rp', 'Pair of Scissors', 66),
(86, 'Sinhaladeepa Jathika Peramuna', 'සිංහලදීප ජාතික පෙරමුණ', 'rpq;fsjPg  [hjpf;f  nguKz', 'Sword', 69);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `nic`, `status`, `date`) VALUES
(1, '200031302175', 'voted', '2023-09-16 09:30'),
(2, '200084403519', 'voted', '2023-09-16 09:47'),
(3, '200105903021', 'voted', '2023-10-02 10:12'),
(4, '200114802363', 'pending_vote', '2023-10-04 11:49');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `f_count` int(11) NOT NULL,
  `s_count` int(11) NOT NULL,
  `t_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `pid`, `count`, `candidate_id`, `f_count`, `s_count`, `t_count`) VALUES
(1, 26, 3, 0, 0, 0, 0),
(2, 0, 0, 3, 2, 0, 0),
(3, 0, 0, 1, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electiondate`
--
ALTER TABLE `electiondate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `electiondate`
--
ALTER TABLE `electiondate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
