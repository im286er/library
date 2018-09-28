-- MySQL dump 10.13  Distrib 5.5.54, for Linux (x86_64)
--
-- Host: localhost    Database: lib
-- ------------------------------------------------------
-- Server version	5.5.54-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lib_admin_access`
--

DROP TABLE IF EXISTS `lib_admin_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lib_admin_access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned DEFAULT NULL,
  `node_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lib_admin_access`
--

LOCK TABLES `lib_admin_access` WRITE;
/*!40000 ALTER TABLE `lib_admin_access` DISABLE KEYS */;
INSERT INTO `lib_admin_access` VALUES (1,1,1),(2,1,2),(3,1,5),(4,1,6),(5,1,7),(6,1,8),(7,1,9);
/*!40000 ALTER TABLE `lib_admin_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lib_admin_group`
--

DROP TABLE IF EXISTS `lib_admin_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lib_admin_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort` int(10) unsigned DEFAULT '50',
  `status` tinyint(1) unsigned DEFAULT '0',
  `isdelete` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lib_admin_group`
--

LOCK TABLES `lib_admin_group` WRITE;
/*!40000 ALTER TABLE `lib_admin_group` DISABLE KEYS */;
INSERT INTO `lib_admin_group` VALUES (1,'后台管理','layui-icon-component',1,1,0),(2,'栏目管理','layui-icon-layouts',2,1,0),(3,'12','21',50,1,0);
/*!40000 ALTER TABLE `lib_admin_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lib_admin_role`
--

DROP TABLE IF EXISTS `lib_admin_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lib_admin_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `isdelete` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lib_admin_role`
--

LOCK TABLES `lib_admin_role` WRITE;
/*!40000 ALTER TABLE `lib_admin_role` DISABLE KEYS */;
INSERT INTO `lib_admin_role` VALUES (1,'测试组',1,0),(2,'安全组',1,0),(3,'算法组',1,0);
/*!40000 ALTER TABLE `lib_admin_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lib_admin_role_user`
--

DROP TABLE IF EXISTS `lib_admin_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lib_admin_role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lib_admin_role_user`
--

LOCK TABLES `lib_admin_role_user` WRITE;
/*!40000 ALTER TABLE `lib_admin_role_user` DISABLE KEYS */;
INSERT INTO `lib_admin_role_user` VALUES (1,1,3);
/*!40000 ALTER TABLE `lib_admin_role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lib_admin_user`
--

DROP TABLE IF EXISTS `lib_admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lib_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(40) DEFAULT NULL,
  `realname` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `login_account` int(10) unsigned DEFAULT '0',
  `last_login_time` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `isdelete` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lib_admin_user`
--

LOCK TABLES `lib_admin_user` WRITE;
/*!40000 ALTER TABLE `lib_admin_user` DISABLE KEYS */;
INSERT INTO `lib_admin_user` VALUES (1,'admin','张三','1491674319@qq.com','e10adc3949ba59abbe56e057f20f883e',41,1538125997,1,0),(3,'test','小权','1491674319@qq.com','e10adc3949ba59abbe56e057f20f883e',8,1537087030,1,0);
/*!40000 ALTER TABLE `lib_admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lib_label_article`
--

DROP TABLE IF EXISTS `lib_label_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lib_label_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label_id` int(10) unsigned DEFAULT NULL,
  `author_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `content` text,
  `read_account` int(10) unsigned DEFAULT '0',
  `create_time` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `isdelete` tinyint(1) unsigned DEFAULT '0',
  `update_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lib_label_article`
--

LOCK TABLES `lib_label_article` WRITE;
/*!40000 ALTER TABLE `lib_label_article` DISABLE KEYS */;
INSERT INTO `lib_label_article` VALUES (1,1,1,'HK enters a new era with high-speed rail','The Hong Kong Special Administrative Region\'s Chief Executive Carrie Lam Cheng Yuet-ngor has welcomed a new era in the SAR with the commencement of high-speed rail, linked with the country\'s extensive express rail network.','<div id=\"Content\">\n          \n          <figure class=\"image\"> \n <img src=\"http://img2.chinadaily.com.cn/images/201809/22/5ba61bb4a310c4ccaa004f5a.jpeg\" data-from=\"newsroom\" data-mimetype=\"image/jpeg\" id=\"img-5ba61bb4a310c4ccaa004f5a\"> \n <figcaption>\n   Carrie Lam leaves Hong Kong West Kowloon Station for Guangzhou South \nStation on the Vibrant Express train after attending the opening \nceremony for Guangzhou-Shenzhen-Hong Kong\" High Speed Rail (Hong Kong \nSection) held at the West Kowloon Station Saturday. [Provided to China \nDaily] \n </figcaption> \n</figure> \n<p><strong>Carrie Lam: New transport service tostrengthen coordinated development and boost exchanges in the Bay Area</strong></p> \n<p>The Hong Kong Special Administrative Region\'s Chief Executive Carrie \nLam Cheng Yuet-ngor has welcomed a new era in the SAR with the \ncommencement of high-speed rail, linked with the country\'s extensive \nexpress rail network.</p> \n<p>Lam made the remarks at the opening ceremony for the high-speed rail \nservice at Hong Kong\'s West Kowloon Station Saturday morning.</p> \n<p>The opening of the Hong Kong section of the Guangzhou-Shenzhen-Hong \nKong Express Rail Link, to be operational on Sunday, connects Hong Kong,\n Shenzhen and Guangzhou, three poster cities driving the rapid \ndevelopment of the Guangdong-Hong Kong-Macao Greater Bay Area.</p> \n\n        </div>',0,1537617980,1,0,1537617980),(2,1,1,'Prime-time ban proposed for overseas-mad','Radio and television stations in China could be banned from broadcasting overseas-made movies and TV shows during prime time, according to proposals by the State regulator.','<div id=\"Content\">\n          \n          <figure class=\"image\"> \n <img src=\"http://img2.chinadaily.com.cn/images/201809/22/5ba5bc0ba310c4ccaa004a7f.jpeg\" data-from=\"newsroom\" data-mimetype=\"image/jpeg\" id=\"img-5ba5bc0ba310c4ccaa004a7f\"> \n <figcaption>\n   A child watches TV. [Photo/VCG] \n </figcaption> \n</figure> \n<p>Radio and television stations in China could be banned from \nbroadcasting overseas-made movies and TV shows during prime time, \naccording to proposals by the State regulator.</p> \n<p>It has also suggested a complete ban on overseas news programs.</p> \n<p>A draft regulation released on Thursday by the National Radio and \nTelevision Administration stipulate that broadcasters will not be \nallowed to air overseas audiovisual programs between 7 pm and 10 pm \nwithout approval from the regulator.</p> \n<p>Importing and broadcasting overseas news and current affairs programs would also be made illegal, it adds.</p> \n<p>The draft, which is open to public feedback until Oct 19, does not \nclearly define \"overseas\", or jingwai in Chinese. However, according to \nChina\'s Exit and Entry Administration Law, jingwai refers to any region \nother than the Chinese mainland, indicating that the regulation would \napply to movies and shows from Hong Kong, Macao and Taiwan.</p> \n<p>Overseas-made programs including films, TV shows, animation and \ndocumentaries should not exceed 30 percent of the total daily broadcast \ntime for their specific categories, according to the document.</p> \n<p>The proposed regulations also state that the overseas programs \ncarried by online content providers should not account for more than 30 \npercent of the available programs in one genre.</p> \n<p>Movies and TV shows that are imported and distributed should enrich \npeople\'s spiritual and cultural lives, contain global outstanding \ncultural achievements and promote equal exchanges of Chinese and foreign\n cultures, the administration said.</p> \n<p>A strict ban is proposed for products made by individuals or overseas\n organizations engaged in activities that offend the dignity, honor and \ninterests of China, undermine social stability, or harm relations \nbetween ethnic groups.</p> \n<p>The document calls for radio and TV administrators at county level or\n above to set up comprehensive supervision systems and take the \nnecessary measures to control and rectify any violations of the existing\n regulations.</p> \n<p>If an organization breaks the rules on the importation or broadcast \nof a program, its legal representative could be summoned and issued a \nwarning, the draft says, adding that in special circumstances, the \nauthorities could terminate a broadcast or substitute the content.</p>\n        </div>',0,1537618021,1,0,1537618021),(3,2,1,'\'Red tourism\' a top travel priority for ','\"Red tourism\" will stay highly popular, as will cultural tourism, during the upcoming Mid-Autumn Festival and National Day holidays, according to a recent forecast.','<div id=\"Content\">\n          \n          <figure class=\"image\"> \n <img src=\"http://img2.chinadaily.com.cn/images/201809/21/5ba48727a310c4ccaa002eda.jpeg\" data-from=\"newsroom\" data-mimetype=\"image/jpeg\" id=\"img-5ba48727a310c4ccaa002eda\"> \n <figcaption>\n   A file photo of Hukou waterfalls, part of the Yellow River in Jixian \ncounty, North China\'s Shanxi province. [Photo provided to China Daily] \n </figcaption> \n</figure> \n<p>\"Red tourism\" will stay highly popular, as will cultural tourism, \nduring the upcoming Mid-Autumn Festival and National Day holidays, \naccording to a recent forecast.</p> \n<p>Leading Chinese mapping service provider Amap and more than 80 local \ntraffic authorities jointly issued the forecast on travel for the \nholidays.</p> \n<p>Tian\'anmen Square (and the Monument to the People\'s Heroes), \nTai\'erzhuang ancient town in Zaozhuang, Shandong province and the former\n residence of Mao Zedong in Xiangtan, Hunan province will be the top \nthree red sites attracting tourists.</p> \n<p>The top 10 sites where tourists get lost easily were also named, and \nthe top three of them were the memorial hall for the Tai\'erzhuang \nbattle, Kunming Chi in Xi\'an, Shaanxi province and the Juzizhou Islet \nscenic area in Changsha, Hunan province.</p> \n<p>The area around the Hukou waterfalls, part of the Yellow River in \nJixian county, North China\'s Shanxi province will be the most congested \narea during the festivals, as average speed of vehicles will only be 14 \nkilometers per hour.</p> \n<p>Xitang ancient town in East China\'s Zhejiang province will be the \nsecond most congested area, with vehicles moving at an average of 20 \nkilometers per hour. The Shaolin Temple area in Henan province will be \nthe third most congested area.</p> \n<p>A traffic peak will appear from 6 to 9 pm on Sept 21 before the \nMid-Autumn Festival, and another traffic peak will appear from 9 to 12 \nam on Oct 1. The return peak will appear from 4 to 6 pm on Oct 5.</p>\n        </div>',1,1537618066,1,0,1537618066),(4,2,1,' China-made C919 landing gear delivered ','BEIJING - The first China-made landing gear for the C919 large passenger aircraft has been delivered to the developer, according to the State-owned Aviation Industry Corporation of China (AVIC).','<div id=\"Content\">\n           \n\n\n\n          <figure class=\"image\"> \n <img src=\"http://img2.chinadaily.com.cn/images/201809/22/5ba5d1f5a310c4ccaa004b37.jpeg\" data-from=\"newsroom\" data-mimetype=\"image/jpeg\" id=\"img-5ba5d1f5a310c4ccaa004b37\"> \n <figcaption>\n   The first China-made landing gear for the C919 large passenger aircraft has been delivered to the developer. [Photo/VCG] \n </figcaption> \n</figure> \n<p>BEIJING - The first China-made landing gear for the C919 large \npassenger aircraft has been delivered to the developer, according to the\n State-owned Aviation Industry Corporation of China (AVIC).</p> \n<p>The domestically-made nose landing gear and main landing gear have \nundergone various tests before being delivered on Wednesday by a \nChina-Germany joint venture to the Commercial Aircraft Corporation of \nChina (COMAC), the developer of C919, said AVIC.</p> \n<p>They were made by Liebherr LAMC Aviation (Changsha) Co Ltd in \nChangsha, Central China\'s Hunan province, which focuses on developing \nlanding gear systems for the country\'s aircraft projects.</p> \n<p>Liebherr LAMC Aviation (Changsha) Co Ltd is a 50-50 joint venture of \nthe AVIC Landing Gear Advanced Manufacturing Corp and Liebherr \nAerospace.</p> \n<p>To date, the company has created the assembly and test lines for the \nC919 landing gear, a major step forward for the joint venture to become \nthe first-tier supplier of domestic large passenger aircraft.</p> \n<p>Before this, the company also delivered the landing gear for the ARJ21 new regional jetliners.</p> \n<p>Both the C919 and ARJ21 aircraft are developed by the state-owned COMAC.</p> \n<p>The parent companies have decided that Liebherr LAMC Aviation \n(Changsha) Co Ltd would bid for the Sino-Russian joint C929 wide-body \nlarge passenger aircraft project.</p>\n        </div>',1,1537622540,1,0,1537622540),(5,1,1,' GOP, Kavanaugh accuser in standoff over','WASHINGTON  — A high-stakes standoff between Republicans and the woman accusing Brett Kavanaugh of a three-decade-old sexual attack stretched into the weekend after US Senate Judiciary Committee chairman said his panel would vote Monday on Kavanaugh\'s Sup','<figure class=\"image\"> \n <img src=\"http://img2.chinadaily.com.cn/images/201809/22/5ba5d73ca310c4ccaa004c17.jpeg\" data-from=\"newsroom\" id=\"img-5ba5d73ca310c4ccaa004c17\"> \n <figcaption>\n   US Supreme Court nominee Judge Brett Kavanaugh listens during his US \nSenate Judiciary Committee confirmation hearing on Capitol Hill in \nWashington, Sept 4, 2018. [Photo/Agencies] \n </figcaption> \n</figure> \n<p>WASHINGTON&nbsp; — A high-stakes standoff between Republicans and the \nwoman accusing Brett Kavanaugh of a three-decade-old sexual attack \nstretched into the weekend after US Senate Judiciary Committee chairman \nsaid his panel would vote Monday on Kavanaugh\'s Supreme Court nomination\n without a deal on her conditions for testifying.</p> \n<p>Nearly two hours after a deadline set by Chairman Chuck Grassley \nexpired Friday night, the Iowa Republican tweeted that he\'d \"just \ngranted another extension\" for Christine Blasey Ford to agree to terms \nfor telling his panel and a captivated nation about her allegation. He \nprovided no details of the extension, and participants from both sides \ndidn\'t immediately return messages requesting clarification.</p> \n<p>\"She shld decide so we can move on I want to hear her. I hope u \nunderstand,\" he wrote just before midnight in a comment directed at \nKavanaugh.</p> \n<p>Earlier, Grassley had rejected proposals by Ford\'s attorneys that \nonly senators interrogate Ford and that she appear after Kavanaugh \nshould she appear. Ford lawyer Debra Katz requested another day to \ndecide and said Grassley\'s deadline\'s \"sole purpose is to bully Dr. Ford\n and deprive her of the ability to make a considered decision that has \nlife-altering implications for her and her family.\"</p> \n<p>In backing away from his deadline, Grassley underscored the \nsensitivity with which Senate Republicans have tried handling Ford. Less\n than seven weeks before elections in which Democrats could capture \ncongressional control, moderate female voters will be pivotal in many \nraces and the #MeToo movement has elevated the political potency of how \nwomen alleging abuse are treated.</p> \n<p>The late-night brinkmanship between Grassley and Ford left in \nquestion whether she would appear before the GOP-run committee and \ndescribe her allegation to millions of voters. Now a 51-year-old \nCalifornia psychology professor, Ford says an inebriated Kavanaugh \npinned her on a bed, muffled her cries and tried removing her clothes \nwhen both were teenagers in the 1980s.</p> \n<p>Kavanaugh, a District of Columbia Circuit Court of Appeals judge, has repeatedly denied the accusation.</p> \n<p>Grassley\'s move capped a tumultuous day US President Donald Trump \nbegan with an incendiary tweet of his own, stating that if the long-ago \nincident was \"as bad as she says,\" she or \"her loving parents\" surely \nwould have reported it to law enforcement.</p> \n<p>The Judiciary committee\'s 11 Republicans — all men — have been \nseeking an outside female attorney to interrogate Ford, mindful of the \nelection-season impression that could be left by men trying to pick \napart a woman\'s assertion of a sexual attack.</p> \n<p>He also rejected her proposal that she testify after Kavanaugh, a \nposition lawyers consider advantageous because it gives them a chance to\n rebut accusations.</p> \n<p>\"We are unwilling to accommodate your unreasonable demands,\" Grassley said in a written statement.</p> \n<p>Grassley\'s stance underscored a desire by Trump and GOP leaders to \nusher Kavanaugh, 51, onto the high court by the Oct. 1 start of its new \nsession and before the November elections.</p> \n<p>Trump\'s searing tweet reproaching Ford defied the Senate Republican \nstrategy, and the advice of White House aides, of not disparaging her \nwhile firmly defending his nominee and the tight timetable for \nconfirming him.</p> \n<p>It brought blistering rejoinders from Democrats and a mix of silence \nand sighs of regret from his own party. Republican Sen. Susan Collins of\n Maine, who hasn\'t declared support for Kavanaugh, called the remark \n\"appalling.\"</p> \n<p>It was also the latest provocation — from a man who\'s faced a litany \nof sexual misconduct allegations himself — of moderate female voters \nwhose support Republicans will need to fend off Democrats in the \napproaching midterm elections.</p> \n<p>At a campaign rally in Missouri later Friday, Trump didn\'t mention \nFord but said Kavanaugh was born to be on the Supreme Court and \"it\'s \ngoing to happen.\" The Judiciary panel\'s top Democrat expressed fury at \nGrassley\'s negotiating position with Ford and maintained Democrats\' \neffort to build the battle into a larger election-year question about \nthe treatment of women.</p> \n<p>\"Bullying a survivor of attempted rape in order to confirm a nominee —\n particularly at a time when she\'s receiving death threats — is an \nextreme abuse of power,\" said Sen. Dianne Feinstein of California.</p> \n<p>Female interrogators \"are sensitive to the particulars of Dr. Ford\'s \nallegations\" and would \"generate the most insightful testimony and will \nhelp de-politicize the hearing,\" said a letter Grassley\'s staff sent \nFord\'s lawyers.</p> \n<p>Grassley said he\'d schedule a hearing for Wednesday, not Thursday, as Ford prefers.</p> \n<p>He also rebuffed other Ford requests, including calling additional \nwitnesses. Ford wants an appearance by Mark Judge, a Kavanaugh friend \nwho Ford asserts was at the high school party and in the bedroom where \nKavanaugh\'s assault occurred. Ford eventually escaped.</p> \n<p>Grassley consented to other Ford demands, including that she be \nprovided security and that Kavanaugh not be in the hearing room when she\n testifies.</p> \n<p>Ford\'s request for security comes after her lawyers said she has \nrelocated her family due to death threats. She planned to meet with FBI \nagents in the San Francisco area to discuss those threats, said a person\n close to her who would describe her plans only anonymously.</p> \n<p>The GOP letter to Ford\'s lawyers said Kavanaugh and his family have \nreceived death threats too, \"And they\'re getting worse each day.\"</p> \n<p>Kavanaugh had seemed to gain momentum among Republican senators this \nweek, with growing numbers saying it was approaching time to vote and \nthose who\'d voiced concern about Ford\'s charges stopping short of \nexpressing opposition to Kavanaugh. But with the slender 51-49 GOP \nmajority and the unpredictability of how Ford and Kavanaugh would come \nacross to millions of American voters should she agree to testify, his \napproval remains in question.</p> \n<p>Minutes after Trump\'s tweet Friday, Senate Majority Leader Mitch \nMcConnell played verbal hardball of his own, drawing a standing ovation \nwhen he assured a gathering of evangelical activists that the \nconservative Kavanaugh would soon be a justice.</p> \n<p>\"We\'re going to plow right through and do our jobs,\" he said at the Values Voter Summit.</p> \n<p>Trump\'s tweet infuriated many who\'ve long argued that women are \nfrequently overwhelmed, confused and ashamed by sexual attacks and keep \nsilent or even bury the memory without confiding with anyone. Using a \ncombination of Justice Department statistics and Census Bureau surveys, \nthe government says fewer than 1 in 4 rapes and sexual assaults were \nreported to police in 2016.</p> \n<p>Ford has said she never mentioned the alleged incident to anyone \nuntil 2012, when she revealed it during a marriage counseling session \nwith her husband.</p>',2,1537622575,1,0,1537622575),(6,2,1,'China honors army role models to boost m','BEIJING -- China\'s Central Military Commission (CMC) has added two more honorees to the list of army heroes and role models, whose portraits are hung at major military facilities as a reminder of their contribution to the country.','<figure class=\"image\"> \n <img src=\"http://img2.chinadaily.com.cn/images/201809/22/5ba5e7e8a310c4ccaa004d30.jpeg\" data-from=\"newsroom\" data-mimetype=\"image/jpeg\" id=\"img-5ba5e7e8a310c4ccaa004d30\"> \n <figcaption>\n   A file photo of Zhang Chao [Photo/cri.cn] \n </figcaption> \n</figure> \n<p>BEIJING -- China\'s Central Military Commission (CMC) has added two \nmore honorees to the list of army heroes and role models, whose \nportraits are hung at major military facilities as a reminder of their \ncontribution to the country.</p> \n<p>The portraits of deceased explosion mechanics scientist Lin Junde and\n fighter jet pilot Zhang Chao will be hung together with those of eight \nother army heroes and role models at military units above the company \nlevel across the country, according to a document issued by the \nPolitical Work Department under the CMC.</p> \n<p>The document specified rules and standards for the hanging of the \nportraits at facilities such as military history venues, cultural \ncenters and corridors. It also said officers and soldiers should be \norganized to learn from the deeds and spirits of the heroes and role \nmodels.</p> \n<p>Lin died in 2012 at the age of 74 and was posthumously awarded the \nhonorary title of \"Outstanding Scientist Dedicated to National \nDefense-related Scientific and Technological Development\" in 2013. He \nhad spent 52 years working in the Gobi Desert in northwest China, \nparticipating in the nuclear tests there.</p> \n<p>The other honoree Zhang died in 2016 when flying a J-15 carrier-based\n aircraft in a carrier-landing simulation. He was later given the title \n\"Pioneer in Building a Strong Army.\"</p> \n<figure class=\"image\"> \n <img src=\"http://img2.chinadaily.com.cn/images/201809/22/5ba5e7e8a310c4ccaa004d32.jpeg\" data-from=\"newsroom\" data-mimetype=\"image/jpeg\" id=\"img-5ba5e7e8a310c4ccaa004d32\"> \n <figcaption>\n   A file photo of Lin Junde [Photo/CCTV] \n </figcaption> \n</figure>',4,1537622716,1,0,1537622716),(7,2,1,' Prime-time ban proposed for overseas-ma','Radio and television stations in China could be banned from broadcasting overseas-made movies and TV shows during prime time, according to proposals by the State regulator.','<div id=\"Content\">\n          \n          <figure class=\"image\"> \n <img src=\"http://img2.chinadaily.com.cn/images/201809/22/5ba5bc0ba310c4ccaa004a7f.jpeg\" data-from=\"newsroom\" data-mimetype=\"image/jpeg\" id=\"img-5ba5bc0ba310c4ccaa004a7f\"> \n <figcaption>\n   A child watches TV. [Photo/VCG] \n </figcaption> \n</figure> \n<p>Radio and television stations in China could be banned from \nbroadcasting overseas-made movies and TV shows during prime time, \naccording to proposals by the State regulator.</p> \n<p>It has also suggested a complete ban on overseas news programs.</p> \n<p>A draft regulation released on Thursday by the National Radio and \nTelevision Administration stipulate that broadcasters will not be \nallowed to air overseas audiovisual programs between 7 pm and 10 pm \nwithout approval from the regulator.</p> \n<p>Importing and broadcasting overseas news and current affairs programs would also be made illegal, it adds.</p> \n<p>The draft, which is open to public feedback until Oct 19, does not \nclearly define \"overseas\", or jingwai in Chinese. However, according to \nChina\'s Exit and Entry Administration Law, jingwai refers to any region \nother than the Chinese mainland, indicating that the regulation would \napply to movies and shows from Hong Kong, Macao and Taiwan.</p> \n<p>Overseas-made programs including films, TV shows, animation and \ndocumentaries should not exceed 30 percent of the total daily broadcast \ntime for their specific categories, according to the document.</p> \n<p>The proposed regulations also state that the overseas programs \ncarried by online content providers should not account for more than 30 \npercent of the available programs in one genre.</p> \n<p>Movies and TV shows that are imported and distributed should enrich \npeople\'s spiritual and cultural lives, contain global outstanding \ncultural achievements and promote equal exchanges of Chinese and foreign\n cultures, the administration said.</p> \n<p>A strict ban is proposed for products made by individuals or overseas\n organizations engaged in activities that offend the dignity, honor and \ninterests of China, undermine social stability, or harm relations \nbetween ethnic groups.</p> \n<p>The document calls for radio and TV administrators at county level or\n above to set up comprehensive supervision systems and take the \nnecessary measures to control and rectify any violations of the existing\n regulations.</p> \n<p>If an organization breaks the rules on the importation or broadcast \nof a program, its legal representative could be summoned and issued a \nwarning, the draft says, adding that in special circumstances, the \nauthorities could terminate a broadcast or substitute the content.</p>\n        </div>',3,1537622756,1,0,1537622756),(8,1,1,' Prime-time ban proposed for overseas-made TV, radio shows','阿风俗的','发送到爱上范德萨',9,1537625101,1,0,1537629329);
/*!40000 ALTER TABLE `lib_label_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lib_label_list`
--

DROP TABLE IF EXISTS `lib_label_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lib_label_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `sort` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `isdelete` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lib_label_list`
--

LOCK TABLES `lib_label_list` WRITE;
/*!40000 ALTER TABLE `lib_label_list` DISABLE KEYS */;
INSERT INTO `lib_label_list` VALUES (1,'国际问题',1,1,0),(2,'经济问题',2,1,0);
/*!40000 ALTER TABLE `lib_label_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lib_node`
--

DROP TABLE IF EXISTS `lib_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lib_node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT NULL,
  `group_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `title` varchar(40) DEFAULT NULL,
  `sort` int(10) unsigned DEFAULT '50',
  `status` tinyint(1) unsigned DEFAULT '0',
  `isdelete` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lib_node`
--

LOCK TABLES `lib_node` WRITE;
/*!40000 ALTER TABLE `lib_node` DISABLE KEYS */;
INSERT INTO `lib_node` VALUES (1,0,1,'Admin','后台模块',1,1,0),(2,1,1,'AdminGroup','分组管理',1,1,0),(3,2,0,'add','新增',1,1,0),(4,2,0,'forbid','禁用',2,1,0),(5,2,0,'normal','正常',3,1,0),(6,2,0,'isdelete','删除',4,1,0),(7,2,0,'recycle','回收站',5,1,0),(8,2,0,'recover','恢复',6,1,0),(9,2,0,'delete','彻底删除',7,1,0),(10,1,1,'Node','节点管理',2,1,0),(11,10,0,'forbid','禁用',1,1,0),(12,10,0,'normal','正常',2,1,0),(13,1,1,'AdminRole','角色管理',3,1,0),(14,13,0,'add','新增',1,1,0),(15,13,0,'forbid','禁用',2,1,0),(16,13,0,'normal','正常',3,1,0),(17,13,0,'isdelete','删除',4,1,0),(18,13,0,'recycle','回收站',5,1,0),(19,13,0,'recover','恢复',6,1,0),(20,13,0,'delete','彻底删除',7,1,0),(21,13,0,'access','权限列表',8,1,0),(22,13,0,'user','用户列表',9,1,0),(23,1,1,'AdminUser','用户管理',4,1,0),(24,23,0,'add','新增',1,1,0),(25,23,0,'forbid','禁用',2,1,0),(26,23,0,'normal','正常',3,1,0),(27,23,0,'isdelete','删除',4,1,0),(28,23,0,'recycle','回收站',5,1,0),(29,23,0,'recover','恢复',6,1,0),(30,23,0,'delete','彻底删除',7,1,0),(31,1,2,'LabelList','栏目列表',2,1,0),(32,31,0,'add','新增',1,1,0),(33,31,0,'forbid','禁用',2,1,0),(34,31,0,'normal','正常',3,1,0),(35,31,0,'isdelete','删除',4,1,0),(36,31,0,'recycle','回收站',5,1,0),(37,31,0,'recover','恢复',6,1,0),(38,31,0,'delete','彻底删除',7,1,0),(39,1,2,'LabelArticle','文章管理',2,1,0),(40,39,0,'add','新增',1,1,0),(41,39,0,'forbid','禁用',2,1,0),(42,39,0,'normal','正常',3,1,0),(43,39,0,'isdelete','删除',4,1,0),(44,39,0,'recycle','回收站',5,1,0),(45,39,0,'recover','恢复',6,1,0),(46,39,0,'delete','彻底删除',7,1,0);
/*!40000 ALTER TABLE `lib_node` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-28 17:34:48
