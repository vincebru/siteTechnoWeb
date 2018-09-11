-- MySQL dump 10.13  Distrib 5.6.19, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: siteTechnoWeb
-- ------------------------------------------------------
-- Server version	5.6.19-0ubuntu0.14.04.1

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
-- Table structure for table `element`
--

DROP TABLE IF EXISTS `element`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `element` (
  `element_id` int(3) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `content` text,
  `parent_id` int(3) DEFAULT NULL,
  `rank` int(9) DEFAULT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `element`
--

LOCK TABLES `element` WRITE;
/*!40000 ALTER TABLE `element` DISABLE KEYS */;
INSERT INTO `element` VALUES (1,'Page','Part 1',5,1),(2,'Page','Part 2',5,2),(3,'Menu','Lessons',NULL,NULL),(4,'Menu','Exercices',NULL,NULL),(5,'Lesson','HTML',3,1),(6,'Lesson','CSS',3,2),(7,'Lesson','PHP',3,3),(8,'Lesson','Database',3,4),(9,'Title','Client / Server',1,1),(10,'Paragraph','Amet tempor mollit aliquip pariatur excepteur commodo do ea cillum commodo Lorem et occaecat elit qui et. Aliquip labore ex ex esse voluptate occaecat Lorem ullamco deserunt. Aliqua cillum excepteur irure consequat id quis ea. Sit proident ullamco aute magna pariatur nostrud labore. Reprehenderit aliqua commodo eiusmod aliquip est do duis amet proident magna consectetur consequat eu commodo fugiat non quis. Enim aliquip exercitation ullamco adipisicing voluptate excepteur minim exercitation minim minim commodo adipisicing exercitation officia nisi adipisicing. Anim id duis qui consequat labore adipisicing sint dolor elit cillum anim et fugiat.',1,2),(11,'Title','File structure',1,3),(12,'Paragraph','Quis magna Lorem anim amet ipsum do mollit sit cillum voluptate ex nulla tempor. Laborum consequat non elit enim exercitation cillum aliqua consequat id aliqua. Esse ex consectetur mollit voluptate est in duis laboris ad sit ipsum anim Lorem. Incididunt veniam velit elit elit veniam Lorem aliqua quis ullamco deserunt sit enim elit aliqua esse irure. Laborum nisi sit est tempor laborum mollit labore officia laborum excepteur commodo non commodo dolor excepteur commodo. Ipsum fugiat ex est consectetur ipsum commodo tempor sunt in proident.',1,4),(13,'Link','All TAGS',1,5),(14,'Title','Welcome page',1,6),(15,'Image','Welcome image',1,7),(16,'Title','Your production',1,8),(17,'Form','index.php?action=saveForm&lesson=html&page=html1',1,9),(18,'Input','Github Link',1,10);
/*!40000 ALTER TABLE `element` ENABLE KEYS */;
UNLOCK TABLES;



DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `answer_id` int(3) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `user_id` int(3) NOT NULL,
  `group_id` int(3),
  `creation_date` date,
  `complementary_data` varchar(1023) NOT NULL,
  `rank` int(9) DEFAULT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `element_id` int(3) NOT NULL,
  `width` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `mime` varchar(100) NOT NULL,
  `file` blob NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (0,'150','150','image/jpeg','Resource id #4'),(15,'12','25','image/jpeg','ÿØÿà\0JFIF\0\0\0\0\0\0ÿí\06Photoshop 3.0\08BIM\0\0\0\0\0g\0nruLqptjySRsn6p4VhFX\0ÿâICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ Ü\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0öÖ\0\0\0\0\0Ó-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0ü\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0\0\0\0gXYZ\0\0¤\0\0\0bXYZ\0\0¸\0\0\0rTRC\0\0Ì\0\0\0@gTRC\0\0Ì\0\0\0@bTRC\0\0Ì\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0öÖ\0\0\0\0\0Ó-XYZ \0\0\0\0\0\0\0\03\0\0¤XYZ \0\0\0\0\0\0o¢\0\08õ\0\0XYZ \0\0\0\0\0\0b™\0\0·…\0\0ÚXYZ \0\0\0\0\0\0$ \0\0„\0\0¶Ïcurv\0\0\0\0\0\0\0\Z\0\0\0ËÉc’kö?Q4!ñ)2;’FQw]íkpz‰±š|¬i¿}ÓÃé0ÿÿÿÛ\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(ÿÛ\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((ÿÂ\0\0öà\0\"\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÚ\0\0\0\0\0ç9¾“›×ïTáË¡Şñ\rb÷OÉõ´ß4oRÇ·¥Ít|ÔÎsÙ.Ïİêù¾ŸGÓóÜ—EÎíyı8®f·wzü©5wy:èïypRBE’@EP@E\r)P@ECŒ(ê9®“˜ÃÜ­Ör^Ÿ±Ãä×WËØ›×ENİM~õŞo¢æíZrÅ>Ç§é0z¦àsd~÷²jô¸ú;ÜÇGÃâ£Q[|4‘’«˜”cf0z—\0f;Ğêœ(î+œzéú3ÍF¿Ryû{¾ÄñCµÓ~z¸Îa\\²e)á€E\08ã•ƒS‘Òs=/;‹¸ı{Ùøo|p\Z4mÙÇ³v­ªºıû<ßCÎ_{5îfåu»9“èz6ÔÌÑßà³¸æú^ÆG=j®Ç¯¬ŠC+Û†^©Îq$ì´|ônFQ:Ì¬†gSåéêâ’æ¯:÷\Z\r›|Ø=\Zo2«eùÜ§£yù@E@\"ˆDÀ³@o`o`âî²µë4±×}ÆÖŒëùëO=§ó½=“Z=ıLš]…Kø:}nffÛÜåtŸ[­šQÛòÉ\"$PƒÂô0¹\rNCCÑr\Zœ†‡!©Àjp\ZˆËĞÒP@E2­šÆîÖ..ëNß/7Óüû¨¡oQ°I=áÏîafÑ[8û¬}oÚùæ\r¦îãôùo//§™<äC²óDH¡\"€J( !¨ \"\0Š\0(À¡©À \"F¢„Š#«r™±‹±‹·VİM\\ÜIjôYv–…3îÄøğzqµrróŸÑóİEsoùÇuÃÒÚúõëFîxGgÊ§„QDI\"€QH !¡À	D´Š­¸€\n˜¡¨ \"€ŠHI S»LÑÉÕÍÇÛ¡¹‘éy¸¼]_F®9¿~|[ñDøñuêæ_£›—/[Êv8·éäÍb-oşuõ	/BADH¡\"€R(jp(js\nÓU}6lE­˜‡$o®CSÔP@E\0¤\nw*3´3éÜ{]<á~_{ÄÒĞóûÑ»Z7G£RÅ|Ü›]—è:œF}ÍG?¬äóyÂA¾C„QDI\"„‰\Zœ†§\0!°Y§§n†Ôeíømş6—Õ+ùušœ@E5PÚwióïĞ§móA<×«âû.3Yv±6¯’¼o†&ƒRËÉìôfé5v$ä¯Z«Ì‹]»Ê$‚M®+f]=£¨aZ‹HÍ¯¬Ó3;€“‡¡¡à\Z»t¼bJTË«ÎkB‹+ÓhßŸ	Y¢†§!©À€\"†R¹L³Få:v]<Ltü]ÈâÍ&¾F­íÁ\n8¯¿/×pr{ım™%|Qãˆ‡0P\\ˆÔ÷2#)#F§‰àÙì8N¾Ğ¸N«~\'É½\"Îa·ÍèòS¡Ê²Ğà\0ä58\r\0TzvêW°ë/ìöù5bÖ/9˜Íejñ´»ŞS™é9÷²MM¾öç!ĞkïkÚ¿ÅS[˜îsºÎ‰w¼®›\rê´«”¶ñÜu¸”šş’ó³‰¹™R‘ÒrÛ9¥tåx¥»C[>b7F\"`ÁÛÒ‹ò-éù¤08*CQCCš¹¥H¤Œšµ‹óÑéu©nw¼D]ënql¾ÔÃnî-éçqt¼ßÙo9–t}]\\ğ¶<¢-3G9®	W\nÎ(.µZD›¥734ÊèBí\\é1ÏQO\"°Èfv¶²k¯·-j’W<yV¢œi²¶qÆ$aà`{F6@g²Ä·ùııœêWû>.¼ÔôëzO³—1n¢WÅ™Æv\\w#ÕíËù>ã)!³ä		{IêAÓKo7Á²9ëìØUˆ½“a´°î“g—¡…î„FBVƒ è#/=G¥ÊšbhªÉlµç¦XêO±1²	¬m”ŠÖÆ6@FÙ\ZCNí·óàÿ\0Ié¸½^ï‡³ÔòMÇ—¦*êd·’úÛZö_ÂöÚïÚ^£=’G³äÓšåÚñÏkÃ#^Ã x^€ç<kœñ…äd‹N/nx¢®uš•±^â»ì)§;z©®KAù×Å*æe:Œè6+4,cìÉ¢q\\µÙf4Ñ©¥NkR	ë·­ö\\$›ßD\\ñéğz…^qïñ°Öæú¬Öµ«ÒÔ,8;•bšş\\éÄ÷5ã$Ì£d’YE$Ò¢	,ÊT}Ù\nĞ”Ì:ÒréáÓ>ÅZM‹Ç©ÍöÖÃb)M©Äcô¢™\"†œ–¥\n}µ‰¯­“[;z£F¸ê÷áË&‘Ó¹M,8\'ƒ%œö<ÓÅÚÅ¦Ä–kY¶&C43XíU´®‰iÃÚ¯±fóIÍ6Ã$‘HM$RBy ˜±5yK3A$¬K^TY’¼‰±-iVqo>Ã‘JÌ¯‰²«™‰”-Kã€eCTĞ¨Ì¼¾•“lÚ+ƒ~ÕdÁ\rˆf d°ŸÿÄ\01\0\0\0\0\0\01! \"203#@$%AP4BC6ÿÚ\0\0\0±øçòd?•wmŠ*šÊş*Èœ\\áGšl†³²öªÌ¬¾éãÇ¬Û³X\'Xÿ\0èeè³ğŸË]ÍßÄsTÖWñVEâç„9¤Èk9/êYÛû‰H{G‘/N¯ú)z-|gË÷FÂ!©ˆ=ªÄ”¸¼(¸ñb‰¹ed^-ò¡Í6í––ëâmfgÚ:Cİ!¶’&óı­V¾«-V¾:øëßíº—¢ßğl½8Ô­™£U©åiV†g\";Õq’Ûs+øë#+_$>j7a«Rßf»w3î<z1\'Ó¾¯éwU°6X5‰x²½·J8Ü-IRò;îÇúcÙÁõ+à°á¹O_½—¢\Z¹l¦/Zµ¬„èÔŠúƒ\n5p‚¨<kµŒ§Õp‚µÑJ@S§bá?M½¼Á(%é—†Ñ•*ş`‚£Ú-XÀ§¤Â¬z#„1­­Ì¯Âª2±òBæ«v×hùBöŒ1ŞPÇl2Döz]I}\'r?§×8±ÿ\0S}Ql6’ÌÕ¹ˆÁf›ZíXÍÂä,ä1ı=o¡\Zv†yÛã³•Éå‘2ùqÇ³˜ë—)š&F®?;cé[­W+›Êµëw²T²ô¨_Çaéı,Aôñw-d>¡úÀìæôËÃE%mO»†}#y‘Èönu£æ£5öœ1#Ñe~‘‘şh<Öâô¶Q‹jä}#uf}Cz–Õµm[VÕµm[VÕµmZ-«jÚ¶­«jÚ´[TPyJS—¥üd­ó.^;“¶#‡zk+ñ¬ŒóUş@ã5-)µœ½Ó«\r°¶N˜>Æ‹O^ŸkE¢Ñiö]:µÌ¹d?+Lı¥Me8¬Œ‰óU[Ü3ÒAí\nŞXqx›Íşš^¾Rå“¢ãÉÊ~¯êšÊq[ƒ©üÕ?xÍK[|B”6À“é‹ı<¼,ü¥Ìä±Ñ©<6-«’œ(Ô3ê(Äšß§ø2“*Mî\Z¶ıK±mä+ÄÖ_éß‡V9\'€l”#Rà«½Ã¸ìœ–MŠÓäÕ~¿Ë*,öÉR	å²ú¿úwOÉ¹/†405˜Óv»ª£ÿ\0/$ñ7„y İ¯Oe0¶¬6Ñ­ÏøîZ!‘Ş_À~L‰à]Ò\0XûÆªYéY+\rO‘Aø›ÂÒonbz¤»c\'İ/ãMıÒ~Õ@åxËøÉT¹œtXÆ€)Q°\r#®,oÔ3ó4£²Cñ7€ù«Úin°í™{%.wnF8XıÎß~\\‘?,ºM\'8³O\r%ÑWã!È¾&ğÈşíîĞ2ş1F\'yRoŞ¿§»=÷úıçRæiùd?•o‰?$PşGñ/(=µR’´\0@*êÚÎÚŒßøÖ³öTá\'Ü®+İ:ßyøtDü²Ê¿ü±@W¹‡ÄœÅµyàÌÕñù-Ù¶;Íú\\=.ú,Q©<³M¥\"bºÔÇFËß¿RBŒp¶ä¥‰·Ö S±ö<á ã\'©›W·‹8ªµT¤ñ‰çíÛ«ĞªcÅÛGû’áÔÓòÈ|×àŸ–(*êÂ\\Áö¾?-´Âp•\"P–@~wê¨íßQœv²î†@V¬s7¬Æë7ëË(õãr­ĞK³’6Ş¯«éñGyçÚõYÁ-§«WÍbÁåE—§©6Ù}¹p¦Ÿ–Cæ¿ü±AW|b#	]µ«m™®ceZÔ¼k‰ßsútï¢ÚËc-¬¶2ØÉ É£§Ø gŒe>¸:p¼;¸âÖ(ëÌ„\r8T%°,ÊU¾äøSOË!òOË%mÑ2§(U+Ã3›îéÆz<ÿ\0ŠöcŸxfÄ¢`Y­F,ådù\"¶Û³×îÏÂiÓ Åç0âß§ƒ_\"ä´W¡(?ı,ÁÓµŠïFÁšY©lNú60•ÿ\0OÏ2³Cÿ\0–¤\'µmğãœ©ã`Z6Z\"5:`&2Xª°±\nÁûØö¯_9Ó–hØáù0Ñ\0ºw9f„Z—éƒˆ´>£6‹¾÷ÒZníWÚÒ÷Lï¼Îßr~Nª‚G˜E\0ÃÑ8Æq»[ Ê<ÖåW%1HbxgÏ¾ß†ÖSã•ZÈŠ³’U•Â<­—»e®i‡6S©d}–O‘(Ë1ıİòc`)	õyÇ+rÀg^ğnRøEôQ}gï&ÖeyMNZ@ºªbxÛĞ‘ûN¥á5£¼«€(Ö$šp”Ñ8´ádNGš™Ûpãl‚Øo\r‹E¢Ñh´Z-‚ÃöCñi~Ùu…CÏö`£)jÄ1{»}—RğšÅu”mŞVÃnMIâĞ…BÀq9¢ÒÌÛYM}u@KEvÛ%V¹lËÂ­rÙ_çÉÌÊ/	\n.RÎ‰ÇI\'­pË÷ì¬YhØ„å3¿°joª$5Qmìº“\'RXvö(Ù$YË7Ÿ™.½YtÜäİ3ÎQY6Ö”~ë¬Ì[u<¸³”@\'–j¯_éWş£\ZÚPÏ€Ao¥;¼†H’\">§ªÎäÉˆ#İ™aé\'hg„ÚÂøz¡¡iŸ¶ışã©),;ûUZÒ²úwòrë59»xäßJpAà<z/¹³9RİšÒ·hÖÕ3¤ªÜµ\\6¬\ZÔ)X³JGÈ]²7·mí×·l(¶Lqú4ğª>ñooN#QdaôIbz3ıÇu.ş—gdc°§é’’’Æ“e¥„ùN± òfl˜ÿ\0\Z!«’hy…˜\'x!|CÄ¹ş1ƒÉ:3¿n¦Ï¬Z=AØiõGº3wñ™G	u#£>}Úš~—S	/óLí`B,Ä§dÓ˜.ş¹PìQœr1\"!”RÁCâ\'óû\réoF˜hĞ’›ö¯ïŒÙdC-Iÿ\0 sÔÊé:c‹¶Ö—UP×¢X;1q”]¤Ú-;míİ\"BŠ—€ Îµ˜½4–%aÛ˜¨üÁ>e½´Z-‹E¢Ñ:„ÔKìœ‘ä±ı™;mG©.¹YÄhÇtM_ª7Ç>ß.ñ±‘”‚§Ø%r¸âÌÀÿ\0áÿ\0»F1š)xÃ³†Ñ~©\rS\Z•ùÍY“Éß†æÿ\00ğ_ÉàŞ\ràÉ™3&Šh¦‚h&‚h&\Zé¦a&`¢Vy)¶ÙF]œâf­© ûŸX\'mØ°9Vb×Œl\0p¹enVéºÌşka0Z§ÑŒ¶Ã·†¥Ä>DùKÆ<ÁOò2‚:tÊ+ÿ\00¢|ı\ràÉ“&tÎ™Ö©3¦tÒM%¹nM5ÔOV¬éS’j£Q&ÖŞ·\'#§\"r\"†İgtätòur·\\¢Q—C£×‘ŸÉé\'ri\'š}é÷­]ÿÄ\02\0\0\0\0\0\0\0!1\"03A#2Q @qa4C‘¡ÁğÿÚ\0?¯ğ„â%=oÂ pp6Q÷Š¯ìÍTYDQ¼¥KËbSˆ‚/ÂqŞ7?gˆ\r´r˜åºgx¬Dú*1Ì´`MI¿•ãT_ÀX¤¶hgÏÚbâÛi#2J;åbGÓ²€]áLwX©ynÿ\0…Cìw>Ud¼Y‹¾Òµ~œI¢š‰ĞêUA²g|¬Lä¤*çZ\" fóZÏ•]/¿kZIo±>¦GûŠÃæ»|¦wÊÄNaPÈ±3Éo•C6÷ÂÅ\'âK¸4kˆ¶Ó8¶V›ß*¸İËÊ»šF59Â’è›æza¤æ­Ñ­É8n›˜|I7ùUFïXpÔ¦·‹TOÂÅçŞxˆxê²G1Ñ«Õ66É`åWIVİTY/ï¹LnõDöFÎb©½(ø‡Îj ŞBzmÕ\rSÊ&ı\n­Tz…ˆèÕFœ}g\'fõ¢sœwRö@ùDôjuQê#£U&ªNë<×V!2êƒdMú5\ZªÜQ”|£7*œb®¤ó¿ü(1j¸\rÚÿ\0ú¨q–Õ¸‰2rn©ñ¼\0Tî³së†İ9»¿^!7øMõ‹Ÿ\"4¼Ö~Ÿ+İ=†\"7ê#kÊko	Ï.×¯¢×ÿ\0Låùvìz¦q]íNâ3ÜœâíV~ò£ĞuZÔuM×c×[™†3åEzIıA¢¢(½ øM®`ñÿ\0®¤<i.ÑªÃ àF™«T‚Î#¦ÖßcÂ_—hEp¸r(SI¼Ö[U,&#b¥ÕVaÑÕ‡|ªœªŸQqû(pz©M·l©0¶Q’]›”\Z¦`§î»óÓe¬Š;y\"-´)\"x¨2[+#vnÏà7ıªƒÅ§dŸ)uMğ±ÛT\Z©½îP!ï\n£ºïÉê\\ıAÇeï·ÿÄ\0)\0\0\0\0\0\0\0\0\01!02@A \"3a#qÿÚ\0?ŠÊ•LJšÉ½Š+å-ÔBŒ^©ßwÑO+g «S{WÊK¡³S–¨S«ÄŠÙÈhÔ;H£»¨Š˜ïEt¶$VU¢lš”ÖC±DeòM7L\ZâÇeD”Ãd;vO²€}ª¤>”M ñc¶oiC±6Ê[(,Jïw%x™œ® C±5ú±Dİ«ÈP¿lŠBë©PíALœT}¼eÑ¿lŠ†åH‡nNuvrmèy(¿H*p5ÊzDTQ:£g/|´@p…Í¿¥ìğ‘<P…ˆÁE[lZì£w5¸5;úÀkPŸm×[{&¸H\">›ËQº\0\0|ğ_”)4W§tÛÜ›¡ÖA¡¶_È~DyIÈä>q¿Cƒ”ƒ¯×Ú|2>èáœ}¦›7SÉÔyr(q“øœµ\nUkªkµe%Ğÿ\0‰˜èŸúNÆÄßj|[¦ØlEqœ†D r( Fš+Õ¿´ß«ˆÍ·Ì¯Exƒ?ÿÄ\0=\0\0\0\0\0\0!1AQ \"2aq#0@B3PRbr‘¡Ñ±Á$4Ss‚¢ğÿÚ\0\0\0?ìjGa?—¸…}NĞµ}ıx~L;ZìOå´vQz.Ó°õm?\'KI<\"P™÷dò©1HW*_ºxµ©ñÊë‘~^uÊèwœ‡**xŠOå´vdòÓe¨lËÉ=ö _qn{8~6ºïfš3Q‡•ocü«Æî±-‹ğ±<tçQÂw¯q—ä5Rw‚Gc§\"t¤óÒ“×hìÊİXìµ^™*$ñ=µe‹+.aEa‰‡¢ŠŒ9[qÏ¥Ä%›fâ³3$ÒFp×Pj,6˜†~,€ Ë.*I˜[ØD\r¿­DX‰7–¾IüU÷œK½®l«FÓ–êŞ/ñX|<Y·o–÷>t³J²‘{d\râ¥X0ø¼÷œÒ¸Nâe˜%oàgà\n±½,Øu!MÛ3õaÓ,­¼{³8àj$›¾ÎÜ7`Vû4XdıÜ«{ƒJşŞ4é‡LÌšM©“îÒ¼mYf£nŒ=å™Â/:Ä&fËN5 öQ/ŞÖ‘ÄİŸ.œ*`ÆX@-q¡¨üµ¤õí³tì\nTë¯¸h¥u]ÓisÈÓ‘\"ıİÉï¥BøLF|£P9Q€ï7åGËóSC,LèNa—•&#ìÕ–)9ÍéF3¯4­dƒ_»ÄiÔã†_¥ÔÓI.3ìõ‹¤+bŞµønòÅkÎ–9’0æîÑ’¦âÄ7:ßúÚíB!Tïf¸40“áË n­m)q)›…à—¹áXyaVQ&ëzX¦™°²›U¸¦H§8™æ9V×¬N\"i#Yf’ö¿*¸™÷ “–úe¨ Tf>ñ×ÊoS<±]dóÔS\0™x¯!I]Uóf©rÅ–I@×¢çŸ\nO^ÈÙ1òµZ­WØÇ—/º1Säk4ŒYº“ï<ë]ºìO^ÈÙoÔÛ-°õ:Ë{Ñ)£µ={#dIõ¢kÓe‡ü³­i\Zö×·oÒ(\nó4[ò£²ÕÉ3¤Wg~¾U…ÃÇ?ztcí°äßë_f8_>½Ëï5áS,J¨¢Ú(°áW»Oaÿ\0•° à?-–8ŞÉ(³µ¹vğUfC’t(Ë;fñ5“õRúö‰ò¦jÌhµ\\ş[–N½ºÔ¢ÈÎ­xïXrW,†ù¶GëKëÚzõ«PAñÉ«…ßÅâ\r}â8“këPÈÈrLm¿\Z1N¹dEfı4¾½¥^¦¯Ò¯DŸ‡\\Ó…ñqV<~%è’È%—HE}Ÿ‰lLJ¸hÙ$RÚßÈWÙªR	N}CÃ×LĞ²º›j§Ê­KëÙ‰Óe¾$¯JÎŠ2ß[M1\"ÄŸ„ÓJĞ¥ym_^È§<†Å2­ƒpø‹Ğk3ı<isÆVÆùZ¤zòøAMëµ}{4%A¡à(‰P¬‡‘¥Íá]M$ò±øq³Ùç¿ìãM½ŞåäÃ7®Ñë´Jñ¸f:å¡‡Ä¡B½k[0«CrdàÇ—lE‹¤‘ŞÊAáOa›}–á¯ ¬aQC:İØµ0ŒS~£:¬{‹ÛÙ¾`¦†‘ê.;Ôò2¯wŠßZß^8â½ƒHÖ½}Ø¨Úú)‘¸©±í€Éå[Ùÿ\0Ë`¶Öİ&lµb,GÁŠ]£×h\"‚¿tÕ¦PÂ·˜f/4<Eš¸ï/nm\\[È:eõöJ¤¿‚Fğt¬Sg¼3FIm¦‚,Vóñl?­}›\"Íìâ^ùé_j»Mİ˜{3Ö°øw’¥‹ş´yô¤âÉ…ÛÔ\\”ùe¾„óí¼ÍâÕ¬à~í2°ï¡ï¥€òf·yuùo.úõ¢/‚ş»G®ÔÂ‹»~«^ÑL°ş¥«£\\T’(ÑFk\n\'®¿Q|\\E^Ş!z³Ùg]š6C—úÚ•lEüµ¥–[AÜŒrõ¬òsïšw<[‡ÁŠo]£×±ß»\'ZîšŞEd“¨çëW—AÎ›/†ú|6n7\ZdàÀÑ<$k&\'/Ö¿áÅØüçSKZ¡ñi¥Z÷ø+(¹®ñ¢Hb}kÂGÖ»ıhfûÇ*‚Ç­o¾Ïb¯ú/Y1QüÇ\Z“[®ÜbË(Vµº°éHp²‡%´à¾UŠ?¸ÿ\0µG[ŸJš8¼Œx;­éQNÛç.mh@9=i•KX~¡cG<í«Xéz…ö›ğÅµ©ğóÉ\'³á»K–¨q1™T\nRQ¨¤IX¢\Z…½M<[õİëíVÙ«øœC,ÓÊ iSG›*¢cRb`ß•lj6&wÎ¹³Æ·QGiõ¢Ñ…T°\Z_­ZßÓZ&Úğ§“éEùğ¬‹Ëkğ^ÍY×¯g+‹Šºê‡mÃn´RnFÙ¨5ºSÜŒ~ËafÃo•šçZ‚l\r`xÍÎ¾/*•Æ\Zmëõ˜åSH(•MóÅ&\\Ş´ÓË~TØÙï6l÷¬»’>ì-kø«íeÄş–³/Ö—+ç½éqŸwĞ&L·¬Ti‡“ÛYä¹¬8Äa7³áü›J“±w$P¬—¢A*±ùä”µ#&\ZHİG—º~”îÜXßi¥qÊöçNíf¶À£éA#ñ”}[©ø\0AfCçVanÉVÔ\Zd<¶È[ÖX›N¼ş\"=;×½úy¯\nE¿Trø¹W¥>#G¦Ï¯¾Ì~A}‘ä½ôáP‚37JeeĞr åÔw]¦(#6éËdrâv›ğ>ãw\0Ìümz ñ\Zlaæ*.uÚÛ•Í—S®ÁOjEíz*ÜF”±¦¬ÆÂ¤vQ–3f×´Ú¯\nµÜ\r\"1½¨­ü;\0øOÀÒ³æïWı+\'ËA¯¨«[Èl+{¨b&ÁÜ)¦ÃCƒ	»ñc1r™Ä¥F÷Âµ˜sûçXü5Šÿ\0µO<aÂfüiÛOéP<\nx·9xV/øPÍ…¿5¨£…B.ì›\nÆÊĞBÑ¬„ofk*Ö\n‹±ïnn¹½*{­ŒÍ~:Ú6<…^X˜e7SşÕuõ?z»xÁÊ<ÁØÙëV¥ˆ:Eî*cuö\\{\rçaî®8Òûa§í\ZÔ›¶İ”‹ƒC|×ËÀ`)ÛÙK§KÖåLW½™ojQ;æËÂ˜áØ.n:^·sH\nqğĞÄçà2ƒ–¤\nÊVC™ƒ-ÅéVgÌQ§o6ÃiÒµàk0àúR¯¸Ö²}Èƒi²_AYš2õ\r…»†¾Ğõ5îÃ7“5ëÙ‚·\Z‹[bD?‘ì‹·;ÑCÿ\0Æ„·+¿Äö2–ït«\ZU¼#LßZÈ¯—º¿Î<TwlVı*Í#A÷‡0çOß=ïY$ t¬ÎI=M~‹·Ø?£ë´Ò8æ5 ãë_xA{xÿ\0Í}+/–ÁÄf6$Q/ªh“§ËNÂ\rwA#‡\ZÈÜx“Öößa)};“i£s^Íä6òëZè£€Úv‡ôr©¢:kVåZP‘|$pé@ô ËÀÑVéRq–>YxTjÛÒ™ª/¥$®n\nQÎÛÂM0QÇµ¯{ÖˆhÛèkDjî\0´›öÃğÃ%®:Ñ•­úMk ó«æ½wõ¹ãÊ³^~÷ñ¢lÇË.µtŠe{è8RŒ@håÔw2æ·Ëjï@O¢Wáºÿ\0%¶È— Öœ!7à©]sgÒúÔy‰oé\\{\'´Ş»G®ÑGaø{î\0?·JïC›Õwpéşµe\0*á\\;7­?Ö¸zÖƒ«˜ô¶‚·‚UÓ†•ÿ\01ÿ\0 ¡¼šäpîÕ÷ŸÚ¼zúWûW‹ûW‹ûV¦õÿÄ\0*\0\0\0\0\0!1AQa q¡‘Á0±@PğÑáñÿÚ\0\0\0?!×6ug`ñËÏDW‡¿M}!‚Qİ½#óÓôÔ­º	Úøqş+ü¯Ó¶DœÄ·^Òà¦¦Jüçõ*WÛ¦™€ƒRïúk2`±ìL´ªÆexÿ\0¿ô$fıMô›®^±p¾!bpjf¥o=Î6ÎÛÀsù•|/Û¯_ ,XgÀ?IA=ñ>å(åhpWÏ®úßPm£/b¦;\nê\\¾‹—QÂ*4İö™6ä¿áÒmé[CyÌLĞmóü#_í¸;n+_©DË­+ô<ë­ôô“şÑ\\Ìe@öšÜ-(ÜLé-ô²™„Š%«LÅºÁ\"z$ıÂ[¢1ó±ç²/hå!X$İËğ©>úB°¤é»Ş(´‚êƒ¼& >à~îÕÍÌ\\-i}¼MĞS$ùÑä«§Åæ®d‚ûBÏHm7Ø‚p wuà”}^\\ãÉï1:-3}ÒøÏ†Ÿi@U¤3\\ÌS¢ÏÎ§°t—PJ„$ã6M‰eË|cg† ¬À¿\0ÉĞøÌºÁ7³ó\\Ã´_9Õg‰™è/å1g¾[[Ì9>bJ©*+{\0·åTC÷*Y†ÀÉÇfV\"¢Pw†]ÀW2ÉAQ}ÄN:à;Mbšœ«Øû,É-cİÛ¼1[»†0†\0¨c‰M¤’şæÍØ²Š±ãR \0·uâekÿ\0ì/An\"áw8ÙîŸ¨>¿•ÆÉ–İÊú%–I2 ñòÅÖúX\nüJ°İ¯ê1ğØK³NòÈYtWÙf-	¼®/ÌtfÕúœü J;ğ³‡³¥ëXşhqtû¥t£Ë}á‚|:öz“¦ßd<}@aƒÆÄ€¾Ìªpá²ŸP•·Q­ˆw‡[C¯i©Ñu)!ÆQö„Ìv˜ƒÚËˆÿ\0WR¥J•*\'EJ•*T©R¥zB¿ƒY´ßÕÕË0º—´%–qêİc™¸t#„Áï@òS\"ê\0™‡çŸôúôÙÕÛà:aåceJ¶ã)^†Ësd Æ\'·Ò3³¯r]û{Íªíÿ\0O¬gØèÙ†¥4²™¤¸íÖåó¡A{íãŞ0~¬Ü¹“÷0[/q~H r÷èˆKïzNÚJÀL/¿Sı)¦Øªú%*ˆÊ$B(x“M\0ÆqtÕ´«–‹Cî)mqÚnK›7LwY‰æ€çGØåÿ\0Q§Kw^ì†/W8™¢³¼&ñlí¯N?BÙç,Õ0%ÇÅE\0Û‚#‰ga—üuD\"ÛØï\'Ÿğt²a»è= ‚ÃlÆìFÀn³lÜD\0Ş?Ú¶·S5Ğû‹0yG¸t*¤–O‚Qˆ»ÿ\0üÌ÷¢v©Z„.­úš±>ÿ\0ÎëÑ\rƒQ\\&Ş¼ÅKìt¯%Ëà~iş”Ä¥·`ÔùzFØ÷ À½*IH<ÿ\0¨Ñ,fË„	š‡BWå÷f¢³ùz@3HÏVòËA•X…J:Á¾,Â=à şµ5)ˆíü{ô!Ğÿ\0\n‚âÀÓ>‚ş·^\'h@-ÇÌÓÖD>ßû›‘â+ƒ|pD‹‚šŒ˜X‚•hf(¥?©Rkàoæ=UÕ¡ÂüÅ×¶–ÈÛ/ê=lßà¯Y¿¤\'Œû?înE„óŠá·‡LÕ™_†&\nì\'qúy=¦ôWş]ÅUUW*óEHSgTğ†][±ù~ÚP¨WüL#X÷/i|nÇ½„k¸wñŠ«Á÷¨³+Ä@k§`ïr©®UÜ•*T©]‰Õ›¢ç\"{³æ^„{ŒnJùnf›aĞ,FB)’¿”ÛÓ—Øÿ\0s„x›KÒ] nTº\\3±N½Ÿ3Ş®ÀıÇş¥ÇB–EÊÂv$\ZTË)Ö¿û¦Ò(MÖeëŸØß„ËÊ\Zu‘U‹Óƒwò‰ä#\ràÜÙvùÃ¿JôT(ÂÇ‡»\r¦P¥áeL)a³‚8%øR×Ü†¾Oõ ÀuÀóÿ\0±hV«Šşô‚áö?ÜáÚ[fğ]]<ÃÂUù!šo½ûCfMøˆMDV­Zpèt:W(—¥“¬`‚€±Ö¥z1cu{øú”g±á†NÖDì;Kó¼Ñÿ\0	ægÎ×sØ‚nI,}×,¥nKşt{¹ï¹R¥u¯SõÖ>îpœfòåÌQ0Ã\0şX–»Ò˜ÙÑG„híªæ&\r$ÅãĞ\riüC©è%w•	]úW 0WÃ‰q`%•Ôµ!8şÃŞvfœ‡Ìbõ]YeÊŠvvŒ4Úö<ä}[th!Z‡±2É6Ü¯¯e(ş¼€±İÄvŒŞ6ô’…h]°} Eßk€|µÖ/]Çiş‹(ˆ€Oîh9‡Û‡,\0ØoÙKcÒÄQÖ\Z‡óÄ]E«W2¼Gow´Î\\«Ÿ‰¨l.)›x‚Æ€§Î‚	Ò:u÷9™él¼\Z~³43 ¶«D³ŠİÇr\"Çh^%nTŒƒY+¥J‹QOTOi£ÓUGz/FX >	{t¼Su2>¹ˆâş¢	îÕÔÛ«i¡Ã/ ˜ÆïËÒTá–i=¼=4Kõ„×K0@=å\0Áß¾‰d†ñŒ¥­QºÅ|G²ıŠ%Zµ8/4£~	8Àæ‚n{³ö€9¬x_PîÌ=¡X‚0{%¦óæX“yûŒqQ·›úñÍ)‡sâ½…ÍÏxé#4Cµj+_%Ã÷T\"l8•*	·&§4ÔÓ	5]æ9óL¦²«ÆU5àyYe-[m÷ @ü=¢S_Å¤Û¨\rÚPO%ó…FvŞ3•¶äÕµÏİ\Z,Òä*ªª»^§@%€í)ÚW´¯hÒ½¥^ \r¥J‡u‹?ö‰c+~ŞÓQ)m>b\nÎé·íöö;G–Ë$ª‘]áJ•*THÇ®³n¢}‘Óş0T|¤sj¼fbz4çåXåÎcVi`b	™§ ÿ\0á7š’áŞFkĞC¥vĞà¢½á8R(‡EN\'H¢C•¨ŠÆ6½{Ì=2±iÛ\nšÅ\\8ÿ\0ÙR¥J•,ŒÔrŞK&2±¯g¼fTnğ\\E&Øñ6¹…Ù9eJæ\"˜ùQ%tc*2 ÄÍOÁG@¢ŒA©SOi¸°ŠÚ™]TVµ¢ˆ¹‚Şéîû›L#WçÒBZ™abÉ|.ÍÖæuın\'oæšÅß‘rË;ÿ\0¹|ñ>Ü	 EäDòÚşâMR*ç¾¤Â™Ê Q¹‡áe¡ì’ã„[‹€ïæT©R¥D±5‡,‡Ârÿ\0Sš¹; «Sô}çÄÅòÌ­â ˜’¥D•’ºWF¿O²zŠ(±öª\nÏÁ,**Iå]½ÿ\0}“”Æ\\»}ú\0:ÄâwHÕıÎñk-~ĞªÔQ\0€ƒ._Ñ=İË—èšTeÁí£\"i²/urªö–1íİL³ôĞ*º*_aí\0CHá +ß„ì22ÿ\0¨Â‚Ù¡âfŠİR3X¨1e.ÉRº1šMºo†Ï¬pi’ûÃRìÉÿ\0/´{XNBJà›½ºgMğèş÷R„! @:*TĞ6Â0Ô¢)—ILBĞdBİø¾8Bâ—Ä¨x@×‰b¥A³TË¹ä\nš>óŞR\0İbØ¹¼Š¨Ã¿J‰ªwÓh¤Ó®ÈıÅ—8î‰v1V)QÈ \0+Ï¡Ëö‘\\ıi²şıº7ûG?g©Bè A@@•*¡îL§4Ã/ÍÄvYüıÂY\nPí:àT4[ÒTjèr\0xˆÌj¿.ÓzZ¶³:ş¥b¸î(hTå‘jÿ\0·QzÆ‘¬¥°ÜyĞhuQJ¦ú—p+ĞÙÂLÿ\0ß7ñéö½röKOĞ}\rbü]·Ô„! ‚ ƒ£Šw,¬è„‚[9Àç´v—ÒèÓ8e¼*¾!|n(UûÍ°+pÔóÙ”ıÁ·‹`¢ÛÇŞ\0š^ÀÜ—Üµ¥js)øNÒV“´2Í`r¸Ó¡Ü\"E,NH(TşR’$k\Z2ıĞ˜o+¶2CÖ8CèŠ>Ï t\0ˆ£<0 öƒÚi}GèLƒj[‰BPªŠéí®cÜ\ZÜ%òks„)˜U\Z+|Gbıš¹¶XïÆ²?¹k¡äãñ/âü—,|¤­Knhk3ÈvÄÖğÆF|A]¥Kß\n™S‚a\\TzBĞî\rI÷]e¬ß¤ı3OG Å¡Çè(õ1	ğÃÂ_JrŸêÊÛé«_¹¨¾çí=¡SÚø\"néq]âKê	*]bV±¾ğ½ˆv0Æ‰ea~K‚€U¬ş¢NZIå¶A\"Ç5#<cÊRàèQ¾XQPnOÿÚ\0\0\0\0\0£³ùE&b¥$é˜%®;®²z+® †©eé£zhFöc«&®³‡@B2Ëf¾3Ä¬·ˆ1f›\nŠf‚úì‚Ë\r¾Ê-vÓó4â±éå†Š\"’»¯¦›¨²Ë)š\\»)ñ³\"šYh¾é/†©íŠÛ.¾8b<GˆRº.£)éjx/Øã‚Œ—}¸ÍÌcŠYe®jµ!ŸHËï¾¸¯0‚õšÎ(hX¤†y%.ŞãŠì¦Q‰ØºDÀ,òŞI©!¯Êx’;m†é§â××;U.;ù\"‚›\"ºÛÇ•ã‹gš\"®F¡\0­Î’q¢®y²õfQ¸®†j!¾Û~J/ãH+Ák7ÿ\0\nÊ³E’Éj†b>ÿ\0Áş.²Øæ¦fºÈŞi+øë”cóJş\nm¦ß6ß)ÏZÈ‡¡\n.ÄÑÿ\0?	G×xm–ÓøÃ­õ5°.ğ®Èîu©}U;m<[¡ U©¶`T#eì\n`”ÿÄ\0(\0\0\0\0\0\0\0\0!1A0Qaq¡± @‘ÁÑáğÿÚ\0?Ñ\r–]µŞâ‚ƒñÑÁd†§iƒõ©}i¯ÄÌv[uŸ³©b«o\n›LYí‰R<K4İ§¬©aµ©Xë“àÿ\0~Ò¤G™ Ûé=¡1;‰P—ÏB<½ì]û(%h`ğ×ëöšÉtµ,`	¾“wö„õg]{|â(:»|@cÃíušÙ¼Ln¨Âb“IØ—„¤bÔê‚ÙGîdÍŸ]ÿ\0Ÿj…=vóˆëÆ|Jg±Rmoè÷w†;¬Dê<³)òIÚ/\0Aë»E^3ã„ã‡Mˆ~ÿ\0rÁã7Ëü>yamGJBQšy\"\0¸ox\0„ºğæ9H¸,µzè~&_»o–!™AË—È|ä~¢ÖTˆ„^°¡“©)Úyå‰Y,i7˜¹ä;àš¿?¨ê/câUdG‰Uh²ùIpÉ©³±çù¬, \Zã?–{ÙÃŞc˜èÑ·G´(:’Ş™qÎÂˆßX6Ãßi¯Ë¯–ã+kñrõ£oxü9ÔI¾$-fÆ?nø‹àfTjTWõÙ£©òC˜[¤7]ro»¤&6/OOã·pÛ}_ÒöbRœËËaD0X›ËŸ¯LAQd–Û=*<Üf¶m‰´KévêzäŠ¹K:ækçxè;NÃ/Ì¯©ú.æ&ä¡›œSX•º\"ÈĞ^zUí{E²fv…Ôl±8@—±ú=I^ƒh£á§ÚuPş¾ÑÈ¨×bú·>8>ĞĞ÷|¼·@k4F¼.!Õ<©ªlëbkUÖUáú(€\nUu1Â×åøšàMsÛÏû^S-4›×ƒÀš—©—ÃÿÄ\0\'\0\0\0\0\0\0\0\0\0\0!1 0AQaq¡@ÁÑğ‘±ÿÚ\0?&É\nÛ»‹XüÉÛ°î	ÓKr4Š‡¬,—„}ä°ÜŒŒ„!B£-ÌÖ/qğ$X/G\"—…)KÆ—Ä-ÚKC¶5‰8€U\r¿ÓRödĞr£H>eŸÀšßéuqBÁ XQ``”é´N3£¨áEy4\ZŒ0RîC¦1+¦ZN„Í*†Mv!142ˆV–Í£}64˜èÚ>SQ™¬P—*åˆ„\'$µ‘¬P±ÄTèhiÂjkáÀUıştÓ\Z1½\rLó_¡&ß|‡í‚‚¿5ÂNóò>¸R!ƒŒíÁ1²¤\'yÜ§».-VŸÔŒ+¿ÀñWØk·°ñ™¬]F6>Šszÿ\0ÃÂÈxa¯†¾.~bˆ‰öü³wĞ«–¸¦(BcÈ;jã ÚÂkº8›_\nx \'ÒË\'\ZíìjÍNcö\ZªX\"3HÄL™U¡	P†gÃônzŠ®^Âˆz}Í\r5rÎeu¾“B“¢Š-j ÒŞoäSÔ|Êøbá¸b×\r~Üë‘“ƒáFÚ„WÏÿÄ\0(\0\0\0\0\0\0!1AQaq‘ ±¡ÁÑáğ0ñÿÚ\0\0\0?ÄtˆpŒ¤¾v›ší›´ŸÁ~¦U|eƒ<A~Ùb>t¯3Ğ™)/3ˆ!RhZôDBìÑàà}@¯Ê´­+ğ©R´©PJ•¥?øôj\rÃ\'‚8Ìtª)å›á \'q?âu2Or¯	`\" ¿³SY+ü£ş @9€†\n%÷›h…|X¶É€fÆäßW÷ZÒ¥~ùT¯üRåD¹R¥hÛR¥CCÜX¼@kc1lnÁ`–mp#Á—ÜË\ZHV.½Œv”¹”!®o}‰—Ê2ˆ‚À|\"±±óş‘}Ôãî$«.‚×©Tv¥Fìğ?¹AÜ2ÊpÓ|»mFÁS4ÛO|¿Ñ­kz.,ÆS¸ˆ *l¿‚Ñbze%%{îRW¹ï(mŠ×Ñ€-(¤z®ãu{„ıÊK%oñ½\rïÃaâ*Gl`)KÉurñ”MeÊv¬ÖçRõYX`¹Ë‹Äl;9NbrSÂÇ5bÃqôˆcwgù	üêqŠ¾1_É*_¨úI¬@øµKRxşÓ İ‚näkÛÁ÷í[Ö´U*00ğïò6\0ñî	­Á\rÕ½ˆ\Z„T hW,ñpà‘Šdú‹WJV ’‹±wmÁ&b¦æP²]³	½\\_»¸¦Fz%Ø0ÆäZŒÂf•R­\nâ{·B­Å…[p °ûgL\"(Yp)W6.e—*³ş`† [ËXMø´¨ÊÜJó­wæKe¨ê\r\no*)\0\\ÄºÕ®× ¨ˆ²‰Û\nÅ¬¿ÃFÒ7+ñc0	T3±³7Ç‰SEK¢ök¦Z,CNÎş?:YefÓ`ñOL¯h¯P<¨s·[`Aš;5a1e‘ŸrI5±É9âU ·ãÌ¥vEğ3ø_Ôx4ìÃ,¨ô•Í`ú¡b®òVdxjÒá¾pÇ*‰hóSá·óú•­hq,EÀT5Ú-á§ÔA ^f¶ØÃÈ›ÆÃ€·³¢?(Çœ›NÖ9óçlÁ¬ÀïÜëÒAp6ÉÜeĞÎ·Îø8hÂ³èVşG–ÙA.é±¶®¤ÅãyVxmÍÍ.7¡s-E\Z‘îx\\«ÑV’›8ÌI•èlÙ“#}JÒ,œHÒÇ0òy¤!)FÙ‚¡!l·baË#,E–\'!PåXÊYš­Bã&0%_a«¤+Û\0€ÉE[Úş£³ëææêşˆ ](«nW-ó[³ş¿PÛğLKeñK0ÄXúÏÔò”±ë\rëêå­¨-—}É;Ì,YDò¨oÄ{¢‡•v0™›$Ià1s›ìüÅôZUV}Cy|ñL›Jj¿¸rXUãâR1]Í¥\"Ø~\'ı?K‰g¶¸@<aã\r?Ià³êx%z„|%\'¦HøGÆ\nÚºœkìe˜ÀN`Ø·2µ«•-!X1˜¡ç7àp8y”D4q™ÙÊ\Z\0 (#ú­-ìË#t·ßqÏLÏt¥ä-ş¥jØÜ¿6i1h˜ş[wêàb¿\0•Ô¨ß‰^¥ez³×M ñ <ÏzO=Q:k)Ô«ÃÆ•+Ä©]éRª`¢¸ştß› ¤AÒ\\î lÏÙ6‘ß¯úŸÃ31Aº]è4úÁç>ó<’£â)ÃâŞ!V¶Wü43 \\\n•	R®WáR¥iR´­âT©ZT©R¥J•*V¸K•‹ïfä”`¾ŒigüAÉÃÕ°Fì¹°‹è~¦äË\nã¾[ñJ(êaÍŸ æò­ù”E’Ğhµ´U¥¯k JĞüjT©R¥J•¥J•­hšT©R¥J•*T­ÈÌWìMÈ·Z;ù‹ç…•@x‘_áM0¬Rp9ÁòJ¤¤u±˜\"Ñˆí±*ÆÃ‘ä–z?©Rõ3Â¸eÁó¯9üAèÄPK½§‰Š°Át<¯ğ~\nĞĞ•¥~5­iR¥iZV‰r¢V¡r¥\\­nSr+/îgÍÜ\Z¬ t*Y»µo	rj£–QàHŞ[U_v5n{¹_å\0¨€\0EIš‡Cı\\²§_ÔUê™c7{‡î””æà=ƒøˆÓäY‰2èôE>³^#\rocŞzV+Z•*T©ZÖ•øÖ•¥Tt£ÿ\0nº‚”wîgzP´Ÿ¼Ø¿Ÿê:\nâÍ/©ZÙU„º0ñ£Oø\nn+rãú½ZÙ€G©D´µ|Î¯Ä7h3¦?Ñ„ J†Ò¥iP.iZT©R´¨šgªÕ í”Ïª-rÊVÀlÊ•+©ZT­+Z•®÷¨rŠÆ)¦æte­2mÖè•¼hs‹@ğ0­\"+Hf{©‡RX\"›$E+kí`şåú”z´œ ±ëIÜ&ò	€Ë=óAg\"\n+J„\r©F•¥J•¥J‰*K-\\†¶¿ú¥´(Ø?ë_îÕ¨woùTÙª“JåR¥J•*T©R¥J•7¡Ê-ıMØ­+ÄQ€t/#»­Y€qÆVc+G%Ù³Ç2áõjJ@İ½@. ÊÆĞÃHfúßcú?¨¾©“FÉøD&Z\ZX]_qg4ñ\r@üëJ•*T©¾•¦NöA~rÆ Ìíâ#8!7dè‹–$‚e\\q‰Vş*T©R¥JÒ Ê£»õ7åR’Î£’ß«!ËeOê)=…èÔ«Õœ¼ÅÛ}Ô_D±i°|%][FğcøÁú€´Ø,,Pnè^H~\0Î†›êJÒ´­T¨î2µ?øÑ-#¨8Àæ®6ó·vg§c5¼·‰„©Q5©R¥J•®äÜ›fş¯qı„_öòĞÕ;\n°ıE^©b›bËBÌe–/Ãş÷4ë^;Œ\0&6ù?Ü¹\'\"”!¼¨@†\Z• @J%‰D®´$«Šİ36±i†^‰:FpæC~ÎÔäqŸ3\n‹;¸•*T©D¯‡EJek½qo7æØ¿”û²Åí¡@E~—êQë–Â·¦yº²—ÃQ_M<’ñ€P9;[ŒPÇ_8{£–\"\"Pµ;®¢3&¬¡Í»0âÒ”rÛ¨¦¸²HR¹UÀ‡{Dì/Ü¬	,Ü/»««•Àùà¹t*î³µy‡©¨±Å\nfÒQ\n[ºª¶ùÄJ“¦]äİeÂË)¦eø…A©GIl»8µ¿k˜+Úr/™\rV„ñ.š‹©êåÔlsU\"ƒC¢ğ§QïúCq8gÂ$©ZV•­i¹7\"ßX±ŸbOø}´ñ#¿SõZ”X\\](ğ°³vV‘’Sooİ6~à*¢G.áìSên_â$²r©°«õÈG.ÌƒÌ9\'´â*ã5[.[«ØD%VÉxâ`2xêÆéÃ‡Ä¬aErVzÅÇVÔ1¸f Q°7µŒ~n;¯nÓ‹%âê\0aAg	ye:*T­Šîcó±~ã\n:K Òø‹%²)~ÇcŒùƒRñr„¸–È	àQêTZQ¯#g£xŠ\n’êØ¯_)v²Î¥w*V„©Q5­)“úÍ©O¸Ÿô{hà*?«úŠ½1[„ëmUO|Î(•ığÆÄl_†ÿ\0(#Ğ¥ÒùQ¶9b…Ğql`a°Vñ÷øpÛ3´…›AíRêÄ:!Sb%ğ@•©^%x•â>Å÷Ù ÛäW¶rV9ÍÂ¹”_1söCTÌğ+àÛÓ	ğo+õÜ«0?Ú\0ZÁá«€czsú«ªpÃX/”Œ¹jŒ½Æ|£*a¼©_…\n-Îz•‡¸ëâ˜Ï—EÑè~¥×£I®lF’…Œ¿ú@CC)Ì¯o„C{’¾?utº©å6ª}T‡ËÎl4Ó“ÄXPİ}ÍÚ\Zm –6\'²¥ ½³,lG¤¨€•*(Í‡†%}—ã\'7¹>.;±iáÚ‘3-Á“Ú=&	Á>º\n£ƒÆ_Ñ28qÊ8<]eêå kìíy€Óº•Veh—TuàÓc§¶$jâÃIgy>`É$ˆø*šáOîYª×öKô¦©kÓ·Ab.\n@>æ9:\n§uİŸÜÄ³|Ë(UÔì›úÛñ¦`%EE¥F·N!dCà`\0¬æÜÃz®«¯2®!`‹G4#ÿ\09Ûÿ\0Çæ$U“BE)YæZ£á¯Ë³(W!†öZ4ÕjîŠ(•ƒ,\Z\"©_s0­ùe‘wa’¸Û¦WŸn9 %UñˆóV@´p\r÷R­(NørBİ£$©Ê·õ,}e}×¼Ïîh·”²†şà¢P\r„¾N¼iL\ne¶pñrÓ³%ø!Kmƒ½ùŸ0!m]3~é`Q‡tKä¦îÊïê*#’öÃÃã2’¬(<{x”çjéù•¥kZèòŠô½ôbí> *îl·køï¾Ñ³ı1 Z›+ÿ\0ŠcÙ“^;ä‡šá‡L]‰l-™+D²‹^Â½§ixãxÜô„Ã\"¡J¥ĞŞ()~å: İÌx€Õ·ú8ºÏu¼¦¤Y€¢Ş^Øw†Õ˜\ra|wÌIZÆºsp<P#Oˆò¼S‡v=‹¥©[Lm]QMVÚ´?\\².D™²€8dBÁ7hc%ƒK\rà«ÛËk	Eìq˜şÈªÆm>¡äàhKtL™„¥Ø[-ö.L%ò÷‚Öx°/.±æ.t+eâø™õ´åò¾bàW/˜!Y›n^»è—¶˜ºğpBØiÏº‹q¦S*Uj‘.\'zb¢·¢Ş:Ê´@tà>µàJeß©g\"xA xÿ\02ÌœöÏÔzÇu2Ş«wó#(§Q[¢ÕíeËëE^òÖÄ:ˆ£bbPîN@‡A:0| ùDá¤À™íê\"¤}M°?–ã¦RÇÂË7À™yŒÍr½ÿ\0HXªd®Vîñ-(‚¹É©dªÕjò”ÌÜip=¹~\"¢×ôFªåÇ©•ª~c,0è\"Aœ¢NP¶|ŞŸÙßÒT.Uö‚á$\'”û°Ìª6°§!–Ñ‡Û({7á—Ş‚6r´8Ì}ÓP_Ü›ÓRåÁŠe\n»‹»jÀØİĞişbÜ\'›EjòÌ7…l{‰œ¹Ù0î¦$¸Öè·FŒ0Á¹µt\ZK€Ğe‚Î/‰Iî$Â¨9Ù·pšÏÛbô9-Ç²`\0{hÚê€Y&ğ=T\nƒŒ·ú•OìÌx½²®ÀZÊpîÃ.ŠÔ:Û2ãA„¨ Ğ#FT¢=àvıè¤h\"\Zzï\nÚ¦cd¤\0ù{gC(w{û‰¢1@Ã¸÷XÙ•çAkÀı?ÌÜõ1ey´¿Ü½³=- d4X#uj¶0Õ\ZäP\n«Ó­ Ûöš¼b‹ıÆë?V\Z•\nj¡rº¤Vú–Œ~‡p\rìÃæè\0÷4Ñk¨“*TE6§E­eáô¤ŠÊ‹¼½¸	Y€¥ŞãŒ;ÓÊÆô*õe¼°Ò¾²ÃU­±RÍTâÇk-·8‹^š¡Õjó_¨i¬ƒŞßÔBµ^.ôî]`x\'´ÀûˆbQl-Óm4˜¨ÛhA\r&à¯sğš ÚáK»ÚÖ±f~7¨¤¶ˆ·[À’W!nÏßà äÏ;¿¨-…ôOØ†ƒ¥ÔĞ@Ä¥)FD{‰>°jñÿ\0ë0Çœ½\rªÊ¼ñ+ÿ\0@éà\"À²ç¬íîd\0DîŞ3Ÿrû\Zâ{@½¢Û#¸Ï\râç<š†@½Â8ë(!0§w0z¤[@Píãµ2‚ÆôbS¶ªM´¦ôÛÇ¶\Z!X,O$t&³ƒvOüû‰¶Æ>IH\"²[üb,ê?¸H4ßƒfæQ‰d‚ˆ©jK§¨q`¬Æ‘Š¸ ˜(ïL+Küû,|ÎgıÙg\"Ò }á`”B.pe¾TjZ5µç0€º·ÜG\'ZœXNöÃ¿²`ß)±>™üş\rÚ†]>´<SÃ<3Ç£n‰’ëwÄ…\0q%ÛU†ôãıüMÌ-\"Aîánû‹ˆÌ®^£Ä† n¡ç,m¬Èø6FQOrŠ`S_ät{¹`AŸÙÁÀ*ä¥Ûì¼¹W“#‘ì—ëT²Ê)`HÜM˜¦Wú1 `\Z6m)–Ši¾£â£ÒÆá	¡P4¦ñ3¬l‡«Úr`YBCÁÏòÇòìà1>c¯õ(ĞùéZ†Ã7şe‹ë(-ÅAe_ú’í›J;KƒL³Ö&\0€;¬)õpXj€¸„<ƒrVòñB|_÷0®—ºo<¡ÏEfÛìÁVŞC%ŒÕoÇP6N¢ÄÜ:D_‹–¨%×Cø˜ÓM›wÓä(”[MßÓ¸&ƒ²âüJ†eŒ§ciğJ‰®¥šj\0ÃŠÛ¸Ëiq°v&yr@[M£ì~5\\[¡æ—Oo\r¯r¯n,a¯oJ‚eÿ\0áGêK£Dê,^ ¹ ¼,(;u˜Ôí˜*$»Cæ_v‚ÖÜ^Kú©ey‡gøó(ëHšAŞÑTÁfÆ9€9ø©`E‡‡ÿ\0&Á(Üw‘rÙ ,ıqÊçly–ºÊOEw[Û™nşH¬òÌ—©È\09o³ù”\rŞË[0D-Õ¼t˜õK‚Xl\\]Âá÷«k^h•\0TUßSaUXœæÄXˆz%#î=t7±šû©¿w€şàTwå8ş#LâÖØïE³Ş<¾r™ èİ§³+;Ğ/3 °;N½Äq¡—†\0IZ#‚†½\\äÍ*–5é¸g~b€¢#³‹èâ*¤Ââ\Zğú{Túß—DøoÊªÁZ´…ĞW©d*ƒğ;ó	öj\\­†ü„¤9Š¹¹PO……&Şg¢fˆÿ\0;RÄy³Åó¤,ønJ\0`ƒCâÈ0œBT°é%0P@ó‡ˆ\"ÙdàBÙ^fé±6M‚(Ôîm4/¡£¿ ªŒÏİ¥Å<Z’=J+g>˜Ãög†Rm<ÂüJİ™G)æy[–Ø€‚6\n>\"•pÀµ>ÌÜ}—u< EÁ±L’û6÷9Vû‰U’ÂnåhYeş£Ù•ş\"­%w=ÅáW26^Lx‰ë%°^U‡wÜË‡ó,‹x.ı0e±\r->e˜ºU¨ê±~şâJ.‚ÿ\0rœ 89oßX›„/¥AC!wUGSÿÙ');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `input`
--

DROP TABLE IF EXISTS `input`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `input` (
  `element_id` int(3) NOT NULL,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `input`
--

LOCK TABLES `input` WRITE;
/*!40000 ALTER TABLE `input` DISABLE KEYS */;
INSERT INTO `input` VALUES (18,'12');
/*!40000 ALTER TABLE `input` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `code`
--

DROP TABLE IF EXISTS `code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `code` (
  `element_id` int(3) NOT NULL,
  `language` varchar(100) NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson_session_group`
--

DROP TABLE IF EXISTS `lesson_session_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson_session_group` (
  `lesson_id` int(3) NOT NULL,
  `session_group_id` int(3) NOT NULL,
  PRIMARY KEY (`lesson_id`,`session_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_session_group`
--

LOCK TABLES `lesson_session_group` WRITE;
/*!40000 ALTER TABLE `lesson_session_group` DISABLE KEYS */;
INSERT INTO `lesson_session_group` VALUES (5,1);
/*!40000 ALTER TABLE `lesson_session_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link` (
  `element_id` int(3) NOT NULL,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` VALUES (13,'coucou');
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `element_id` int(3) NOT NULL,
  `code` varchar(100) NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (3,'Lesson'),(4,'Exercice');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(3) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'ADMIN','admin'),(2,'STUDENT','Student');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session_group`
--

DROP TABLE IF EXISTS `session_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session_group` (
  `session_group_id` int(3) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`session_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_group`
--

LOCK TABLES `session_group` WRITE;
/*!40000 ALTER TABLE `session_group` DISABLE KEYS */;
INSERT INTO `session_group` VALUES (1,'2018','2018 session');
/*!40000 ALTER TABLE `session_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_cell`
--

DROP TABLE IF EXISTS `table_cell`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_cell` (
  `element_id` int(3) NOT NULL,
  `span` varchar(100) NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_cell`
--

LOCK TABLES `table_cell` WRITE;
/*!40000 ALTER TABLE `table_cell` DISABLE KEYS */;
INSERT INTO `table_cell` VALUES (15,'1');
/*!40000 ALTER TABLE `table_cell` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_image`
--

DROP TABLE IF EXISTS `test_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mime` varchar(100) NOT NULL,
  `file` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_image`
--

LOCK TABLES `test_image` WRITE;
/*!40000 ALTER TABLE `test_image` DISABLE KEYS */;
INSERT INTO `test_image` VALUES (4,'application/pdf','%PDF-1.4\n%Ã¤Ã¼Ã¶ÃŸ\n2 0 obj\n<</Length 3 0 R/Filter/FlateDecode>>\nstream\nxœ]ÎA\nÂ0Ğıœâ¯»HÒ$­ .ÄêºğÚŠT¥uáõMh­ ³˜?o*· \'·rÊ ²ZU/rÊğTc\'ŒÁ]¾Kıíç©OÙUÚ,^NšÉoƒhKåà|¡,Âù>†íšš†-ı&Ü¤Òüc–‘i_ş°ç„KVj°|< ¯G‡î…<Œ»\'\Zù\0¢X3B\nendstream\nendobj\n\n3 0 obj\n158\nendobj\n\n4 0 obj\n<</Type/XObject\n/Subtype/Form\n/BBox[ -112 420 708 420.1 ]\n/Group<</S/Transparency/CS/DeviceRGB/K true>>\n/Length 8\n/Filter/FlateDecode\n>>\nstream\nxœ\0\0\0\0\nendstream\nendobj\n\n5 0 obj\n<</CA 0.5\n   /ca 0.5\n>>\nendobj\n\n7 0 obj\n<</Length 8 0 R/Filter/FlateDecode/Length1 2380>>\nstream\nxœåU}LUeÿ½ç\\à^‰Ì„ê®°œ)„ÔjÒL´š¹bk3ré¯ĞâkWXØ˜¡[i-­åĞÅb­¡YmÕ¤RsM#1G¬r™ùÕÇM)’Å½çéwŞs¸p1İú»÷Ş÷¼Ïóœç}ßóñ¾§&T„\r0‘RR¨¾.qªÀk€J--ß°î¥İy­¤ßâzÊ‚µÇ—?æš©³ Œ‚/­xò_‘ŸUVQS×¹ıZòm¾¼ª$Pïİì¼3È§Uêª—à*’Ş9|ø+Á–?~\"¿ŒüÙêªõ5 À§ßs*şìÁM*Şæ\rÓŸàÅÿv†ilõt\"\rY:A±ÃÖÑ«‚óW0A’-–aÉa®eœÍ(æsDü2¢íîÂi|c±îhsu/Èûr\n7ânød@~—=f¯|/á-z‡Wİä\0’_­!GbnÄØ‰ti–dk}0ÉXŠåÈ”²WÎ âu†±Åsä?Å¨½\\Ã°dFc8ÅZ.CŸ¼ÍNËaÆ@ğÅÄ %Œa«aÇcğ@é:{>A†rlFÃqÅJ=à:r×¿İ5[Úå¼„%¢Ù~JË„›Agùª\nÎYø·¡Ğ‚ÙÈE±FeáR&u.AŸ”we”v¦Q…fMãâËtP¨18Ê…8wÛ`¯š\nXƒˆ\'¨·Q¨’)ùS„ ÷ÉÇ²JÄuÿîgF®æv­A‡gå([“ˆóú^(rØviƒqG:ã•§òĞ‰BrîTN¦tK§Î«aô÷LLî‹I=2ÈkË†Ş€‹‘é²\rÑ#£¤“åYm¸T˜È<\'•’E³°NèŞj—=rPŠ±)ÒåTEÍ²ßXgøàec<JÛ¯H£q3œj£ÛMyà‚]\"»dt)5Fá1:<q‡ÛnWÄÒ˜KŞ<Í¤.–íòîÄzÜ‡H™ÎÈ#Õ¬suîÅ&,$õ”–J=då;åUi”\'ØÄ¿DÓ]ÆŸ­ó³|ÊL\"µ]Ëm¶ô¤t!iò÷½£¯ËİÑ,ßÊOrTšä¹fnƒ0C~Ì‘cr)8‚Úhùš]o·]>BX@.ˆ&¶P‡“9C\r0s‰1õ´ÃOTÓ°’ÊuLú®¶¡Fö_µ|hJfDÒød —è~DªXú°¶?Ş{ùåš=väÆ›Úmì¨tÏ»AÚ¤M·\rx{Ø÷ÇËğ0Aa\\µØeìëè`Ïï—XÙ–âœ´2İíÒ?á ¶b‰Âj\"R²-rN^çi±2ƒÜÛ${XÆ\"”ÕÒ!İÖ!‰Xİr—½÷I¬”ç¥	x“E«\n`ª|Î&HwñqÔg×ùW%ß3Ó‹ê<\\úuR:OJ\'Iï˜¾½Æí°>³Û{\\3|ö×ÓØ%a£³R\"f\Z£$İ+£Æ®»µŞ\Zt¨4U­¨.c…±ÙøK[ò!ÏÉ¿æR&ÙöbëOéoCŒ1É¥MR×¸´‡t–}¢<>ÒÀ|ÒŠ´â8FÔyÈ¥MÊ_•Ë«*şœyós‹‚¥µåP¬0–Ã\"Ø•%ìÉrT¡’œ9˜G¹(¢´”½\\®u®¤‰Ë_ÇîøÁÖ_\nendstream\nendobj\n\n8 0 obj\n1210\nendobj\n\n9 0 obj\n<</Type/FontDescriptor/FontName/BAAAAA+tipografia#20barcelona#202013\n/Flags 5\n/FontBBox[-14 -154 404 699]/ItalicAngle 0\n/Ascent 699\n/Descent -154\n/CapHeight 699\n/StemV 80\n/FontFile2 7 0 R\n>>\nendobj\n\n10 0 obj\n<</Length 258/Filter/FlateDecode>>\nstream\nxœ]ËjÄ †÷>…ËébĞ$“6… ”YôBÓ>€Ñ“T˜¨³ÈÛ×Ë´….”ï\\şs#]îµòäÍ1€Ç“ÒÒÁj6\'\00+ŠK%üÍJ¿X¸E$h‡}õ°ôz2m‹È{ˆ­Şíøğ$Íwˆ¼:	Né>»!ØÃfíĞSÄ–0…:ÏÜ¾ğHR{ÂÊïÇ ùKøØ-à2ÙEE	«å×3 –R†ÛË…!Ğò_¬ÉŠq_Ü…Ì\"dRz*Xà2s¹Ê\\G>%®›Èuö?F¾Ïş*òCâ*Õi2ÓÔÿÖ)NOõ³!›sa»tÏ´V\\Hiø=¹56ªÒû5Ü}\nendstream\nendobj\n\n11 0 obj\n<</Type/Font/Subtype/TrueType/BaseFont/BAAAAA+tipografia#20barcelona#202013\n/FirstChar 0\n/LastChar 8\n/Widths[1000 331 308 303 384 119 362 254 332 ]\n/FontDescriptor 9 0 R\n/ToUnicode 10 0 R\n>>\nendobj\n\n12 0 obj\n<</F1 11 0 R\n>>\nendobj\n\n13 0 obj\n<</Font 12 0 R\n/XObject<</Tr4 4 0 R>>\n/ExtGState<</EGS5 5 0 R>>\n/ProcSet[/PDF/Text/ImageC/ImageI/ImageB]\n>>\nendobj\n\n1 0 obj\n<</Type/Page/Parent 6 0 R/Resources 13 0 R/MediaBox[0 0 595 842]/Group<</S/Transparency/CS/DeviceRGB/I true>>/Contents 2 0 R>>\nendobj\n\n14 0 obj\n<</Count 1/First 15 0 R/Last 15 0 R\n>>\nendobj\n\n15 0 obj\n<</Count 0/Title<FEFF0053006C00690064006500200031>\n/Dest[1 0 R/XYZ 0 842 0]/Parent 14 0 R>>\nendobj\n\n6 0 obj\n<</Type/Pages\n/Resources 13 0 R\n/MediaBox[ 0 0 595 842 ]\n/Kids[ 1 0 R ]\n/Count 1>>\nendobj\n\n16 0 obj\n<</Type/Catalog/Pages 6 0 R\n/OpenAction[1 0 R /XYZ null null 0]\n/Outlines 14 0 R\n>>\nendobj\n\n17 0 obj\n<</Creator<FEFF0044007200610077>\n/Producer<FEFF004C0069006200720065004F0066006600690063006500200034002E0032>\n/CreationDate(D:20141220185900+01\'00\')>>\nendobj\n\nxref\n0 18\n0000000000 65535 f \n0000002703 00000 n \n0000000019 00000 n \n0000000248 00000 n \n0000000268 00000 n \n0000000447 00000 n \n0000003011 00000 n \n0000000487 00000 n \n0000001781 00000 n \n0000001802 00000 n \n0000002009 00000 n \n0000002337 00000 n \n0000002545 00000 n \n0000002578 00000 n \n0000002846 00000 n \n0000002902 00000 n \n0000003110 00000 n \n0000003211 00000 n \ntrailer\n<</Size 18/Root 16 0 R\n/Info 17 0 R\n/ID [ <0D7383C875B64953C6C2D73833E431EA>\n<0D7383C875B64953C6C2D73833E431EA> ]\n/DocChecksum /5F3D250D4DFE1575C2055C65A43A84EB\n>>\nstartxref\n3378\n%%EOF\n'),(5,'application/pdf','%PDF-1.4\n%Ã¤Ã¼Ã¶ÃŸ\n2 0 obj\n<</Length 3 0 R/Filter/FlateDecode>>\nstream\nxœ]ÎA\nÂ0Ğıœâ¯»HÒ$­ .ÄêºğÚŠT¥uáõMh­ ³˜?o*· \'·rÊ ²ZU/rÊğTc\'ŒÁ]¾Kıíç©OÙUÚ,^NšÉoƒhKåà|¡,Âù>†íšš†-ı&Ü¤Òüc–‘i_ş°ç„KVj°|< ¯G‡î…<Œ»\'\Zù\0¢X3B\nendstream\nendobj\n\n3 0 obj\n158\nendobj\n\n4 0 obj\n<</Type/XObject\n/Subtype/Form\n/BBox[ -112 420 708 420.1 ]\n/Group<</S/Transparency/CS/DeviceRGB/K true>>\n/Length 8\n/Filter/FlateDecode\n>>\nstream\nxœ\0\0\0\0\nendstream\nendobj\n\n5 0 obj\n<</CA 0.5\n   /ca 0.5\n>>\nendobj\n\n7 0 obj\n<</Length 8 0 R/Filter/FlateDecode/Length1 2380>>\nstream\nxœåU}LUeÿ½ç\\à^‰Ì„ê®°œ)„ÔjÒL´š¹bk3ré¯ĞâkWXØ˜¡[i-­åĞÅb­¡YmÕ¤RsM#1G¬r™ùÕÇM)’Å½çéwŞs¸p1İú»÷Ş÷¼Ïóœç}ßóñ¾§&T„\r0‘RR¨¾.qªÀk€J--ß°î¥İy­¤ßâzÊ‚µÇ—?æš©³ Œ‚/­xò_‘ŸUVQS×¹ıZòm¾¼ª$Pïİì¼3È§Uêª—à*’Ş9|ø+Á–?~\"¿ŒüÙêªõ5 À§ßs*şìÁM*Şæ\rÓŸàÅÿv†ilõt\"\rY:A±ÃÖÑ«‚óW0A’-–aÉa®eœÍ(æsDü2¢íîÂi|c±îhsu/Èûr\n7ânød@~—=f¯|/á-z‡Wİä\0’_­!GbnÄØ‰ti–dk}0ÉXŠåÈ”²WÎ âu†±Åsä?Å¨½\\Ã°dFc8ÅZ.CŸ¼ÍNËaÆ@ğÅÄ %Œa«aÇcğ@é:{>A†rlFÃqÅJ=à:r×¿İ5[Úå¼„%¢Ù~JË„›Agùª\nÎYø·¡Ğ‚ÙÈE±FeáR&u.AŸ”we”v¦Q…fMãâËtP¨18Ê…8wÛ`¯š\nXƒˆ\'¨·Q¨’)ùS„ ÷ÉÇ²JÄuÿîgF®æv­A‡gå([“ˆóú^(rØviƒqG:ã•§òĞ‰BrîTN¦tK§Î«aô÷LLî‹I=2ÈkË†Ş€‹‘é²\rÑ#£¤“åYm¸T˜È<\'•’E³°NèŞj—=rPŠ±)ÒåTEÍ²ßXgøàec<JÛ¯H£q3œj£ÛMyà‚]\"»dt)5Fá1:<q‡ÛnWÄÒ˜KŞ<Í¤.–íòîÄzÜ‡H™ÎÈ#Õ¬suîÅ&,$õ”–J=då;åUi”\'ØÄ¿DÓ]ÆŸ­ó³|ÊL\"µ]Ëm¶ô¤t!iò÷½£¯ËİÑ,ßÊOrTšä¹fnƒ0C~Ì‘cr)8‚Úhùš]o·]>BX@.ˆ&¶P‡“9C\r0s‰1õ´ÃOTÓ°’ÊuLú®¶¡Fö_µ|hJfDÒød —è~DªXú°¶?Ş{ùåš=väÆ›Úmì¨tÏ»AÚ¤M·\rx{Ø÷ÇËğ0Aa\\µØeìëè`Ïï—XÙ–âœ´2İíÒ?á ¶b‰Âj\"R²-rN^çi±2ƒÜÛ${XÆ\"”ÕÒ!İÖ!‰Xİr—½÷I¬”ç¥	x“E«\n`ª|Î&HwñqÔg×ùW%ß3Ó‹ê<\\úuR:OJ\'Iï˜¾½Æí°>³Û{\\3|ö×ÓØ%a£³R\"f\Z£$İ+£Æ®»µŞ\Zt¨4U­¨.c…±ÙøK[ò!ÏÉ¿æR&ÙöbëOéoCŒ1É¥MR×¸´‡t–}¢<>ÒÀ|ÒŠ´â8FÔyÈ¥MÊ_•Ë«*şœyós‹‚¥µåP¬0–Ã\"Ø•%ìÉrT¡’œ9˜G¹(¢´”½\\®u®¤‰Ë_ÇîøÁÖ_\nendstream\nendobj\n\n8 0 obj\n1210\nendobj\n\n9 0 obj\n<</Type/FontDescriptor/FontName/BAAAAA+tipografia#20barcelona#202013\n/Flags 5\n/FontBBox[-14 -154 404 699]/ItalicAngle 0\n/Ascent 699\n/Descent -154\n/CapHeight 699\n/StemV 80\n/FontFile2 7 0 R\n>>\nendobj\n\n10 0 obj\n<</Length 258/Filter/FlateDecode>>\nstream\nxœ]ËjÄ †÷>…ËébĞ$“6… ”YôBÓ>€Ñ“T˜¨³ÈÛ×Ë´….”ï\\şs#]îµòäÍ1€Ç“ÒÒÁj6\'\00+ŠK%üÍJ¿X¸E$h‡}õ°ôz2m‹È{ˆ­Şíøğ$Íwˆ¼:	Né>»!ØÃfíĞSÄ–0…:ÏÜ¾ğHR{ÂÊïÇ ùKøØ-à2ÙEE	«å×3 –R†ÛË…!Ğò_¬ÉŠq_Ü…Ì\"dRz*Xà2s¹Ê\\G>%®›Èuö?F¾Ïş*òCâ*Õi2ÓÔÿÖ)NOõ³!›sa»tÏ´V\\Hiø=¹56ªÒû5Ü}\nendstream\nendobj\n\n11 0 obj\n<</Type/Font/Subtype/TrueType/BaseFont/BAAAAA+tipografia#20barcelona#202013\n/FirstChar 0\n/LastChar 8\n/Widths[1000 331 308 303 384 119 362 254 332 ]\n/FontDescriptor 9 0 R\n/ToUnicode 10 0 R\n>>\nendobj\n\n12 0 obj\n<</F1 11 0 R\n>>\nendobj\n\n13 0 obj\n<</Font 12 0 R\n/XObject<</Tr4 4 0 R>>\n/ExtGState<</EGS5 5 0 R>>\n/ProcSet[/PDF/Text/ImageC/ImageI/ImageB]\n>>\nendobj\n\n1 0 obj\n<</Type/Page/Parent 6 0 R/Resources 13 0 R/MediaBox[0 0 595 842]/Group<</S/Transparency/CS/DeviceRGB/I true>>/Contents 2 0 R>>\nendobj\n\n14 0 obj\n<</Count 1/First 15 0 R/Last 15 0 R\n>>\nendobj\n\n15 0 obj\n<</Count 0/Title<FEFF0053006C00690064006500200031>\n/Dest[1 0 R/XYZ 0 842 0]/Parent 14 0 R>>\nendobj\n\n6 0 obj\n<</Type/Pages\n/Resources 13 0 R\n/MediaBox[ 0 0 595 842 ]\n/Kids[ 1 0 R ]\n/Count 1>>\nendobj\n\n16 0 obj\n<</Type/Catalog/Pages 6 0 R\n/OpenAction[1 0 R /XYZ null null 0]\n/Outlines 14 0 R\n>>\nendobj\n\n17 0 obj\n<</Creator<FEFF0044007200610077>\n/Producer<FEFF004C0069006200720065004F0066006600690063006500200034002E0032>\n/CreationDate(D:20141220185900+01\'00\')>>\nendobj\n\nxref\n0 18\n0000000000 65535 f \n0000002703 00000 n \n0000000019 00000 n \n0000000248 00000 n \n0000000268 00000 n \n0000000447 00000 n \n0000003011 00000 n \n0000000487 00000 n \n0000001781 00000 n \n0000001802 00000 n \n0000002009 00000 n \n0000002337 00000 n \n0000002545 00000 n \n0000002578 00000 n \n0000002846 00000 n \n0000002902 00000 n \n0000003110 00000 n \n0000003211 00000 n \ntrailer\n<</Size 18/Root 16 0 R\n/Info 17 0 R\n/ID [ <0D7383C875B64953C6C2D73833E431EA>\n<0D7383C875B64953C6C2D73833E431EA> ]\n/DocChecksum /5F3D250D4DFE1575C2055C65A43A84EB\n>>\nstartxref\n3378\n%%EOF\n'),(6,'application/vnd.oasis.opendocument.graphics','PK\0\0\0\0(”EŸ.Ä+\0\0\0+\0\0\0\0\0\0mimetypeapplication/vnd.oasis.opendocument.graphicsPK\0\0\0\0(”EÌ÷q+\0\0\0\0\0\0\0Thumbnails/thumbnail.png‰PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0µ\0\0\0\0\0\0zA Œ\0\0ÓIDATxœí	ô$UuÆ¿êîafØt ;BXÔ#;£9Èb\" #F$BX2j$ 8Ì 	²Š‘aQá\0!2²¯Ã,3ÿw¥ÎwÏ}çuW×ë®^«Ó÷wúôé®åUÕ{_İwß{·^Uâ8†adPö	…Æôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„(”>b â·¼r5Ò¿Q³Un{·6&tß({m:Md´é.hv¶Q{çYPŠ ?7«\\\"™Xã’?‘·qÃádÁ4kü]®/$Wl5/ÙX\ZÕ/Œ4‘¥¢^=I./ëU=zËÓ.C×‡Ëî*K¥’*?·ªÄ…åf‰¤³Ûß·ÌK6ªßQ–—´˜Kõ–&-—Rı.\rÂTâş…”x5ïBFF\"ÃÕ‡_ŠÉ™¬\0n~,á’M÷GñÇ³õàx`•Ø›À×?U¤“­1Ùß?\0îV{“$²ø\"ğ?À¯€é\\µ88OËR–¼¬¥çğy`=`.ğv¦³Øø†\'åä¸·?ó$“”ş\ZX›ø•NÑ¢>œ}q$ú*Ã7ìÿü\rpp6ÿ&yı3à-ş–bx©>)?q1ïÿüå•¦ÌC\'«6~­·x²×“À_\0³¸j\np3ğ#=œ|ïÜüFÍ’«äB~Oßí]ÈæÀSèïâù”FH\"Ãµ‘æé·€9º$¹M7¡P$Wñn~¸^}h]^kVİH‘Èª 8JZ\råQÒ»ù/¯èÚ\n\rÆà,İì_uã½Š]€ıÛt¡³Rà÷oi¨äÄªßTnŸlvğ\"¯õ8#ûÆpõ!õÂ§ñ¯d÷jŞ»É­v»ŞdSh«ÿ8A-AÍóÒˆåHŠêBı[Óôı»V¾“Úa[`à~U@Â5Ôë`ğs.™Ô\"?–ßî4œå\0\rÛ±G…Û‹šß\0^çZÑôuÀû€“5Á¢›¡û§	—êí.¹œÒ½À§]‡™}Rf‰>>À{qM0µH€)µŠîŒ»VR;ú€z£O\0—q¡œ[òY˜­\'é#)_ÁzÊÑ5Ç„ªJa.e4#CÜÅb¸ú(ó»¿]áÍ`ıÜĞ[ÓÈ—4—Ÿ¢n_oy0M—éÖÿMø0ğ¡zÿt]à„\0_÷Ö.àª[ø»ª9Ø†K\Znz‘ËôBÄJmI·iKZ ¯òJ¥¦{Š¦q¶Ö­…f¸şi’¯²E\0­ªôFÿ–Kaş:£’äû2Ú·\rHi-õşÖèÜ®…×Ğ(Mn÷™À1´dN?g-°Êk\nf¦)kQµyi‚NÕ!´aÎï¹\\(‰/T;dõK&=û/9»3¿kl=®ËúÛå`ÓfHUMSv?¿ß¢7ã/w=+ÇQ®FXJ=Akœä|ö\0şŒg›Î4ñ3–y’eï¢£ñ5·›ºè]i\\±¡»\Zºá¾œÆïµ¼~Lx‡HŠ/jh‘ªõ½ì €JôWÒ™VcÙ¯C•ÈöìüØVî÷\0óš5 ŠÎĞõ‘¶®QöªnpRkHÖU%V‹¼…~—è©°†íØ­Ù)âTu*°M…tîMxm.×äNŸO±º>€TIõ•6\"’²y\r¢i;SÜš#ØWû¯Ç¦oU=’£€Í´ÕšFªÈÃ©’nö,=Ü§_<Á¬nè+´2„qĞ‡ğŠ:ÂPGøú\r&ifS7ï£8~¥½pPÏ4«DE^§R‚Ïh\rÑi=¸ø%RözF@(¤>¤<\Z:ºÇa/y½¨¿­g³ «,T¨>ö¢bb¯u“N<acà»l³Lx‰Ù[¿DÇtjDF€êCîÅ¨½¦l.\\·iÓ{WÊ~?à—ÀêEó~W[Ò[Ñ·QdKU\"Òn?Ÿ¹B72C¸ÔÇ3ü¼É±7gKºÏÊ´AŠSË<è…ºDsÇ\\d¬.|ß—¹ÙÙwûÁ\\Çk…}ö¯q  bö£3D\rst¬®WDÚÂÜC;1Kô¶×µîèÉòè¦ÈXnC¯[Ó*ü\ZxgåZ¡Dv¦D¤)‰H¯ÉBöÿ“º½#`B\n¥>!fà–MºwËµ3¥îø¿]ãv&;Ú—rôø‹í»NáQ6eÀ\'ØC/´q.N¤AªZÿGÿÈò!Ò¸2ÖŠßWë·&d€ğ&Ãë{X·¿ø+v¯úp\'=g’=r7Ÿ¾©6L¬Ë\rÔÇR.Ú4nv¿†£>Ó¸íE•ŒK–Í®áwÙë›w£?0°íĞ 	©x­$¨Í¸”Ã~7x†ê7zæ# ‘ê#lÃ%‹?Â\0­—ônö«.bTØ“µÃc:\\ç\\T¿+Ì‡çàŸ@Cÿú5ÔGÓóYÎîó•Z•Lef†B}¸_ñÒ,:…ÒÇºÙ—–Y‚C/f;J´ğ`Ó iü„ş#x®åé\\)ø\'Ø:İØ‘§Ô×ú.º§Dc©g<ÊRY¦€«WÛ@Ì1g?8òİ”f¤g+Èßõu—Hqô1>ù?XaˆK^.©(Á10°gódª\'â@|ƒ£·še³!/e”á>lM¼Êaw8ĞüllEÌãšèéLv›Fê¬¼E_õ¼ÔiÇôFw¡>*šìél§Ì¤CóM.¬éyî¬\ZŠ£X½E¹ekÌå†Aµ\r9²˜¥µ˜EF@âNş	Ç>Ä!¸_ÃÃÒ[Í;Ù‚u1­U&~<ãzõFt¯cúz©¤’?Éø ªnyO áeÕ‘º‹ÙNS*5;·õØït§fn”í¬¬a­†ö`F^ofÃğ˜|_­•î¬u8šZ©Ó¼NÏ\'Ø=úñTWÛ2v£Ä‘Š×q¢uùGYLjõÈ²¬}.á3• \'»œÄÇyOW´³K¬QChmn¼¿]á1\Zİs,ŸHxÎ»İ¯f²MOòrÓ¸ssq‘Šc­kZ^iQº>âTM\\Ë^µ†yzÃ±æ¯¬ºŒÁZ·xncšuø”Í*¯/4 ó6\Z’¹ŞÈÜ9p?½ÙáfqíÑ\ZVkÏú4*û\0º/©\nÍÿh‹²†¤KçÁ\Zm¡¸UË¹JŠg*—ïJÿô;lq<IÛÎk)°µ)¦8¬ú–~\0‡b©\ZGø­$ñ$>·ÊÛeF£5$¾ğÃÍ^¦2“~ñQ¬Y0ZâÀPõ!å´)KÎ¯°7×IÎ>@ÅˆÛ_ãsS²*qD¾Äşò—YÀ5ÏBH¸×ñ·£ÃÏJö—ø¯b}Z·¼ÊãÂÛl[º¨oéiT¹Ë4ö…TôÄ¦ëáª\\õyÖƒU*le]òšÍÿÑ.Ît«Œµğq%±†Û¼ƒ;×±Vÿ±–ıt`Ko¼±·Wä¹±î{«fİoÏ8·šÛjbmŸ+×‹x4úó\r±~|‡ßıN¯Ü“pµúmàmé\ZÒuæ—zÓsh8¿i]kv\ZµzSäáôÏÍ=µëo9Jİ~º²VµÜ1½%òŒßn\Z”}õw‰R;8‡á3tÿÔ(4¦#„éÃaú0B˜>Œ¦#D¿õá:ª½hıÇÃ~rµ¡¿$öš²\r«F#|°%ıÖ‡ë{èş@é²é7şbíòr_òŠß¿\rP¯’—	£§˜Ùk9<ÖÍá\"eìÃ‡kıÌh_î‰H÷i°“ìGw¦•T\nQ}\"\rOEg0şÇ\ZÎ#øtw÷½ôUïÉ‡úÔ]í¬yëŠ&V2øt1¿ŸæPß\nÆ…Ìe°ô„ÚÈ«q2‹qnÛ2e{ç•T(ñhu·Æ~¬ğÆÇ»©*Ñ½›a8½}¾ÈWFMG×b¾ßÁˆµø˜‚C„¾çrçv\'1k¸f»ó	¼C9qj¬ÕĞh×\rÆ~,ÓÇ&[lØ™§OÓ£G· ï=D:êu<Ğ/ëÏÙİú2ßË—9,¼š#øg0 ¹\\Ÿ`µêOøù+Ç“@ä&R.Ü/€ı\0íGxRÊ6‘Ğ²›€Ò½ânßšzIa[c\n7Zë¾E{3äg‚â8“â¨dÜ\0.pä^~şC§ñ\"…–ÈÀìzÑèˆuêŸùTKÓù“s¥†zqÜÍdÕvtUSNW—ó\"àk<“,ëèR4Ÿâ#¸—3üq·úyc\n\'‘ÁØ—ùİ“F©¤p-Ò7æ¥y3N«3;”´jhŠ¸É»s6)°\Z:\'{Ş˜Üc½%†!îÅ÷ÌQaQ\"}Õ‡SƒL0İ“+—,ş‹Ú·;/5Ró¾‚!é·zóí‡÷§šÆGfNáß\\ºwaDU†!>Â\Z\rÅ|èaõK¯(ëãnûvê¥º8Â2çƒùôT–÷à#’ÚD9…áÓ¥V’jŠìRaE“Ô˜ß×S*–Dúªw‘/õ4YÉÙùàäFù½T\'ˆQÇG¶-èMŸ{8Ç›ş¥cd>’ëµ?¿€o‡Lıòr¯“-3Í›8^ª³ğ§rÂÓ6Å•æ§èc~…¿»ŸDO$²€‘_”1?óĞÅúª¼yÔ‡›i¹N6“2¸’S6Ú\rÈm½=ıÊÙ\Z’Ş“I\'ys¬£õô\naB3>÷z¯“•ûø>>¿wN/Uš²KØa…<®ƒ›(÷aÎ.ÎÀ)ŠŸÃËÙ¼~ p˜ô[Rlî\r\r=Ä=§¿wÛ^ªl&>à:]ûe,»\0ü³w½B*ÍøĞ×ü\"(C€ı¨jıÒ[}8/õ|z‹m&ó’ÕÙ>rpšä´y÷mé‰YÀy%,Èvğ?Vq2Ó#æóœî¤6&¯Äx\\Á~ô\\@\Z±;²R[Ñkãá:åê#—_Õ/úİ~‰h<úa?ó¨–¹)G¯p\"Cñ:è´˜	üg§û¶ƒ¸wsÄøƒE0!°Ë<Ñ¤qğ}Ï6rSf[XÄ	\Zòvj‰¼O½$ªçˆ¼ú@Œ\\Ğÿ±²ş:³Ür7 Ò°AC_bççSmz©·ër!‰/fåÒWä@‹ÔU\Z²D WùİPÆY—7Û Gb~ÈØœõ½9àš\"Ù}_«4øâp!av†oZ\"»/æ\\VÛ\r=€h\0õ‹D­«şy¤˜îSÖO…İÌÓ8§Ï:ü=Ec<—Ó‰y‘-Àé”X_ÜÂâjÙÏm‹]YÂ|Gw¥è\"Í\Z¨zk»¹ï%¾äAê£Ë†né«>äÂfÀ¦»ÈRPËØ-ñ_U¹„;>Ë¿¯Pg«šå»”ÇÔGÎ,=î½’²3Ü¾0>hW6z«ìï„ob¿Sï„nêcv§)ôŒŒÏMOÍÖÕ€3¡G?eùu†ØÒÈQ~Çï6Ã5ÒH©oÄiüª7W1£?ËA»ëgÅìŒÇ»Ø·g }g±6ø¤ép9šÍÓ–t·{ÌŠòv”ÈÔŞQıyF¹‡“˜=Ø©DäbÏïaV.ˆıˆZ]¤kqø\'Ó§†ºØW\nû<Šc5İ£¦•ˆ¼Ëòr\r_ê\0Ió5o nhh(y ÑqOL¤¯:‰e’Å†¶t¬«&8sá‘úÚ†ÎT²&ã]»¥Púè+R«[l•‰¸,f+:kü=òj0Œè†ÎÏ7\Z=8ÆGB—9¾ŸşÈê…ó;÷ä%êı¦ã¦‘b–—„´ì­’\rŞAcóF÷‡ƒé£}Ê:çiVt­ \rû7²·Lí35cZí,\nàÓ%¦ö)åmy‰˜>úÇÈ‹¦<ŒªÙ\r¦\\ŒDL}eä«ÓGûŒñ€é#\'¹$2òÆ¦<˜ı0ŒzL¹ÈkBF¾Š1}!Lí3vÆ¦œŒ‹jú0B˜>úÊÈW1¦öéác#ƒé#¹ìÁÈ˜>rböÃè%#oBLícş‡ÑKFŞxÀôa„1}äÂê#“±L}fä]Ó‡Âô‘‹?521ÿÃ0ê1}äbìBÈLıcäÅÓ‡ÆôÑ>6>gô˜‘¯bLFÓGÿyãÓGÌÿ0ŒzL}eä«ÓG.¬~12‰S?ÂŒ¼ñ€éÃcú0B˜>raã·F&cçœÂôa„1}äÂâO^2ò1}ôÚ¨¿|¦œä*ïUÀ[ı:‘AaúhyÇà2ı›õşJx¯8}…ŒtÃÇôÑ&òşÛÿå[±[–·lğ8_pÜñË+á»˜>rq/p<D&$Ö7m—ŸqI©S/¤ƒ×İõqÓÇ”Nw”+ß\n¼Ê·œÖXxé÷«‹8’\\}S_İñ™§tq¶=£¯úpùU\rZËXß(ÛM=-Å0™}[Ç¼§gtš¾ìş<ğuàB¨ìIÄyr\Z|ê·€\'¸AúgPCö]úª)§–v2ÖË]«¢ßå-Nò{³.!ÕÄEÀvÀ	,øØ“~¬—™ˆãvà\\şîÌxH‚›j\nÃ¬eúª¹¶ä6ú)ß,œu+¸;şUı›ÙşÀ]l_”šé#¹§ßÌ¶Ê™xš$ñû€³€mêñmÙß YÓõDÊÿŸí‡èã.àŞÖmºiysDîÑ»øiŠz>p,K]øP5_	Ì£æŞ\rlB›‘(ã1àª¼\'wüÎ½H¤[àŸÊ!u‡³]ö6¦F·¼ª§±-0XÙİ¤*I,Äıü¤×ş »ïÊï!·r ±Õşw6×¼ÃùDŞ÷æ”ÈC]—¢ì[òœSùQëZ’ÎÀ.úw˜Œ[û¶ÌJá¡å{X\n‰ñlş4E»³ÚªiËnhŒ›>ö¾Ûÿ£¬ìF}äm·‹\Zæw­»6]C}Hë½´oéKÍ•€õõo®Š5ÙxmàİwÈŒ›>VÓ9‰İ\\í7©r!à àşÈe<ä”eKÕô1x$ÇO®^îºÓ¶)I¹¾Ãxsù7—»*Î[bşé@‰Ø‘šxg_èbğ,1\0ÇÓP½³•$û¼· Æã§°›q\Zp3°¨×µŒ”k¢¼Kø·ı»?â¾ëäÜ±¿Œ¡>¤$Y|Ø‡ı½ªeDj§°#ÿF.ißxˆ%»Ø®A\Zc¨‰MÊ`\'à\nà£=ÒG¤ÇEŒüx:O²Ï‰ÀgU»E	9C}€¹_á İlà«À™,’Zw¥\"à|6k¯ò–´DÄ‘´w.Ó«¬à£!0†úp·µÌô%ÏU°3‰¸vib\0–\0?âÂ–•K¤–ìàzö(80–ú€WeZ‘sX/ÌÑ·¼(b\'¶\0¾Í¿ófĞÒí•ÑÄIú+—êqË…ÆUğ$\"Í©À»€ãG\"†¤M•H€ÜTÊb»e¯jµ{IGò6`°Èq\ZöV ·Ã1¶ú@½D’z?ÇíÎ¢Ó*ËK­œw£ JÌ0Nv2êv,;Ğ6ã¡K*\ZÊx`¼õúŠf’ƒj—ŸÎnÓ2´ğ\Zæ/ta…WãÆ+µÛ£¦¸¸Z7îŸdøaìÛ“K&5 ²XÕŠcÌõzwµÊÛX<ÌaŞ›ØRm0%mÍ&?®>Éçä¦±CåIº™ÜÌ×ÓT&{8p4ÇVÄóˆ´Ÿ£ âÀ\0ãƒ†NËjÂy\0r¼ÁÅÀìÏ¸ø-ğ;b’vì÷Ù.]Mq,fã\Z¨dcàÀs,f`KÕlPh³áè«>$vá0>V4\\C•Éü§p†D¶©©ã¹?°×®^\0^äç%ùNLyŠâkÀ†|.a#~6Öñ¼Šššœ²w¬B‹y¾A2« „ËÃ­½Ç[ªÚîÂFì,İ2Ö¾Nù½«FŒ\"¥‰H˜Ê)CÌóQµagGìµÚ9?dµ¢%\Z{Í™X-Aì]fµ~G·{C=2\ZÊŠğ|Ô É[6éòÎJ0|™£¤	k¿!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡Âôa„0}!LFÓ‡âÿ\0—ú\r1cjû\0\0\0\0IEND®B`‚PK\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0meta.xmlSÍo›0¿ï¯@^¯à, Ò4íTi;tRo±İÔØÈ6%ûïgdd¦8à÷ûò{ÏÅÃ©m¢wa¬Ôª8A Ši.Õ±?Ÿ¾Åx¨>úåE2A¹f}+”‹[áêÈS•¥S©½QT×VZªêVXêÕP…®Ñ4M\'§Fª_%xu®£Ã›D›#ÄyÃP] œq]oš€âŠFŒâÃ;&¼5Ôˆ]GêŒ°¾Z»Ğ”Û4Öœµ–Öúz¤M\rÑ	B)œş´mes«ãˆ™n;ïyh.zZ+ÙŞ*3b?¤>\ZÎ›kCñ™7Ğw½vuü.Åğ\\¬Áÿo›Ÿo;¯Ájñ¨–-ÇQa(Ìˆ-ö†¢\"§1&1AO8£)¡h›àûl‡2œå¼Â(8£×¨9Å»$ÍĞ&Ûnï7\\`“«àÒùóŞ­êú:Ë(]2ØoÖ[áĞóñ„=?\";n‹u’Eá\\Şs~¢½r% \0Îø£PÂ›iS=ÊƒßC“`šÄwRõ§ıs¶ÛïÒhØwFz0%¨Ew_zÙğ˜Ì¹şJğ¢éğÚC¯ş\0PKŸ÷·\0\0&\0\0PK\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0settings.xmlİZKsâ8¾ï¯H¹ö°{ †¼*P)BÂ†\Z’°@fvö&ì´‘Õ.IáßdL†›82ŞÚÚò°¥ïku·úE®>½ìè„¤È›Ní¸ê÷Ğ§|ÖtÆİÊ¥ó©õËN§Ôƒ†^\0W	Jé%òHoç²±zİt\"ÁH$•\rN\rå50¾ŞÖØ\\İˆÉVO^åÏMg®TØpİÅbq¼8=F1skõzİß®—†¤†\"*8áæMZù”Îò¢¬VoîGÄ7¡Í†ÕÁbÁOªÕ3wõ÷zµ(ËËeÖV<B-ó„ı¤+ÂiÆ¬İ9õJªı²×ßdOŒµá\"\'Nkík7h]%ÊYı¨Pñ‘£ä±‘±éhÊÆ…Å›÷8iû~Şó…J£€¶\02ÆĞY¿TËP¿¤\\9­óó+wåCÈ}˜ª4èJíâ´vQş+õÕ<Uô³óZqéï€Îæ©òŸÖª—õ¼ø•€„Ê}x›é¶Š÷hwË<Ã¢ço‰)•Ğà´Œ[Ôì4ñ‡ ~O&úØ‚Ÿ 2 ÜiM	“P¿+oëøè=9â$£aÉ‚W\"*ˆ> 3¸\'bF¹,Ä|ïS™PÓãäğTWè‡¥³P_¢r3`‘¼#Üg ÛlA–%º¯q]ıË ³‘¾j,Û<öpËh@9Q0@¶ŒÕÖ×TÛĞ¥Å¥Úyµj{š]®2L”Ø£O–:ïmã	g×Z±tZnî¯Ë¦,\"ù¯HÓGïü÷Eqß‡zÀ¶ÒñR†°ƒwE,îìÃˆx7áØã›XıYçáíL9G¡¯å½Ó\r|~PàŒ]áıTÑ“7i%wõÇğªn}š™„‹ĞÄ9á3âªO8<ÍˆQä\0Äé68³¿Z+Æ\0#¥S\nÛ‡\\Kó®¡Pí$Càš$ˆQjñjYşï†âğ{†º¥EMÛA\"$dJ_«Ú¦ıàÙ²CïêÂuŸàÅ÷JmmªÕXè¿t×/ˆBQ\"Ç\rpŒK¯–p|ûÎñ­œsôd\\î\Zš[nªµÌv®@UcĞK¨ªÿFyJm#ë¥<Üœ\nd½N\ré$¨ü¥ÕƒHÄYû#£¥v²å“qC9|º¿¦Jtl\\áiØÏ˜{üú[¤ø=!pe’Á%NìXu#ˆ®ôD3ö4C»±¦<hÑ—ÖÖ\'óìHoˆœ[sú–œ0%Sšv¤Ò‹‰ÚÉ¹m	LÀïâ¡ú×ìñ]Å„ú>ğ7ß(>ÌëëR9Jé%CL…­cE†?µ;´,}ˆ dgz— æèS¯aF¹™lY#Ürïş¢AôıH|ªÁ¬ïÏÌNówDyö—vn›‰?ƒàm©m>ˆ¸§¢½ı\\±9Í\\#>3(g8¼IpM¼ç2šßM½cîÂ$:Ñ–3âŒÑ»Tí+aŠÜÅQÔp”2E9úCYÓí˜aL”«§1-E~Au µ\'¶´Hü!9ÛNL‡8Õ=	xâ;“­¤F;µ#ênjBçÿ€¤6Ÿ–ó¦.#f‚„óQe×Ø“şŒ£j[íEO1,ˆÎœæãrûd¹;Z{ÃEEWÑÈ\"sÌB”)·:‘`Œ@EÛeèG§î#ò_VŸæ?òCYÆ]y„A9v½N`üú:?éŒ!Ù\\õ±n8îfİÿ˜p³ş§¦õPK-Jõ\0\0•#\0\0PK\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0content.xmlİZÁnã6½÷+-Ú›$Ë²Ç½hÑ.P Š&-öJK”Í†’şDı¿~I‡¤DS¶å(oŠ8;ä¼!g‡r’ë›œö1„S/\nú^	KI±˜z¿ßòÇŞÇÙ7×,ËH‚\')KV9.¤Ÿ°BÂw´11Ò©·âÅ„!AÄ¤@9™LX‰‹Zkâ¢\'z.Ó#äí¬®Á®¶ÄÙUYaºhŞ}f\rvµSÖ]•HuÕ3ÖUy#¨Ÿ1`=/‘$;Vl()¦ŞRÊr†ëõ:XÇã‹0ººº\nµÔ\ZœX\\¹âT£Ò$Ä«ÉDQXcs,QWûÖ5©XåsÌ;Sƒ$Ú[Õ’cpWf·\\F|=.:G×ã¢…æd‰xç8Óàf¨Äi÷P‰SW7GrÙ²¾ãğ„úãöfW<ï:—Â6¨J8);»iĞ®>cÌšªÌf×æúıahÚz}¾æDbîÀ“£ğÑÄ2ÎòC¤.\náãGòv)\"D‹Â 4biëĞŸooî’%ÎÑLû¤[fDNhçU\0lKĞ¢‚t…İÛ:\\C+ã£ã’qi(ë`–åh)sÚ~„)i\r]ğ4=sâ38LüG‚×¼Fv:˜W;©úçT4ÈÍG¢~¨0ö8Pİ&.¾°¹5c«\"5ë`Ä›s¢DˆjµIcwµ(û‚!«|ìŒĞHRÓúä².†1?È°aY9q´›9ç›nÃ©MÊÒlwÄ+\"–‡âáş·PÉ|•ò!©U39W7«ï5æ¡íÈà~ãg(Á~Š*f×&?Ùîi+»§Şˆ\'˜²õ`•c¯9¤FÂÎ|šzß¡’‰ï›0ÓçõœK\"8è3²ÁiC ²‰ÀàåÆOùœQ/<nÑ\rô«¼w‡\nÑjÒî€Mï/pK‡/g9*Yıˆ8Ñûá¦ÁY\'Ûğ-Œû	ÿ‰şXçÌÁt0I<	‰óWÙÄIõt½OˆÒ9JÚmÛÇ¾‰Ÿ8Æ-¤9¢×Z¶mÎª­$S,ñõ8v×êÏ†½iÙÉ*;«û¹_¢…ãî¾ê‚ï©.8*—$©»KÄÕI7|£¤r{ŠxêÕãV*~	æ’`ÑSÀ|œ=€BÁ\nlÈ4=Ş)ƒõ‡¾şñ:#”ÖXÛa¡™şñz›ä¤ğ—˜,–p†ÄÁå(É5ŸÇ¼o‡£‹ z‰Ã¿î-08ˆ´ÖÛã:óªdã#Ja¬×6–´¬	w-WN:ñ8µ€–\nòH£Q¿”\r-ÕïÃå­RuQ¤xSË»Ó²û´¼wã÷²òıc´´H--FŞ–áÿ±òoêâıŞWK\\ßïmİ¯ìİWY;]»£DT™¦y«Œ<@áqO«„4_QŠeÏU?Ğç™¦éëõÔû÷Ÿ¿-#Î /ZGeŠæ Y“TÕeúÁ…É.­d6îCwñ;s‰¯<X	cÁyí›Û¾á^òŞåu8úVórÌÓğ0x¢T°9†÷®I8?†â“1ïÍ³dhxB†ÆgÉĞèd\r‚áY2tq2†â³äçòtüœé9=>CÃ3=§¯NÈĞyÓQÿdŞ×Aíˆ«»vØZR«s–>ÙFU;›]ëšŒª ™êŒ¹›«väÕåmHáto¼—uéÍ¯±ZQõD1e½û#èZœîÕ$º\"U­ĞŠÔ_¢á‹­¤©0Uëõƒ+µJª«®\rƒËË‹ºs£Úqİ‚¥P’Ê\"=áœmªø*«(p-°Oˆb_OÎÙ7?şå®â_Áêµ(á—yÂ-Ï±2heeø<+ñ.\'Ñ8ˆ‡\'q0r8ã—Ñ?CËÀ›Eı/ $´Á·\r_˜a#lÃ–g™ıPKò	Y‚¤\0\0#\0\0PK\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\n\0\0\0styles.xmlİ[_oã¸ï§0t¸¾)’eg7q79ôZ,Pàr-n¯}=Ğes—ŠŠíı÷Øï×OÒR”([räÄIö²$1gHÎü88#ùÃÛŒOî©,™Èo¼éEèMh‹„å«ïß¿~ô¯¼nÿôA¤)‹é\"q•Ñ\\ù¥ÚqZN`r^.ñÆ«d¾¤då\"\'-*^ˆ‚ævÒÂå^è­Ìˆ^lìtÍìÎVt«ÆNFŞÎ\\²¿³fvg\'’lÆNF^ÀÔŠ±“·%÷SáÇ\"+ˆb{Rl9Ë¿Üxk¥ŠEl6›‹ÍìBÈU0½¾¾4µ8nøŠJrÍ•Äå7+ƒéÅ4°¼Ud¬|ÈëŠ”WÙ’ÊÑĞENµ´PírÜBîœ}İ¯F[×ıj\0æxMäh;ÓÌ]S™%ãMe–¸s3¢Öç{ÜQÿ¸û©µ+™İy;PÅ’£Õ4Üî|!D#*N0Î®ÅÂp˜Ï÷æ(ûF2E¥Ãe	ÄEÖ\ZğMàğé=š|£wÆøh­wÀHHÎFC¼¦*üA\r/I!UH:>èÂ.Q2Ö*ãÃ!©–u%“¤—Ä™>Àyı{F7ßylpÜ®÷A‡Ö‡¦h&7ö0\räiÜL£MrÕ¤²TTybÎÁ\0H·•I„ëi‹Î\nîiqñˆ%ëüç¬Ğ	3e9S}xÿúK€4Séz\'sGŞ­MÓ©€’˜ú	yyûÁ„×fxb>£p7ŞDÆ”‹œL\0´™7h9ÁĞw7ŞŸI!Ê¿tÙÌ˜7q.˜Š!N¥lK“ƒaIA©­_î²¥à^p\\¢ŸdßäÉËA‘öøzd2üşŠæ€?Ä)2’÷I}O$Óæu‚h°d:J6d|	áşN?“ÿTÇ1sxFˆTîJE³\'É$Kôv“„ó%‰¿ËvÈû\"2~””€æ*A0äœõ¸¹Rß~À¨9_~¡r¢ÿ6BşUJ±1b¸ıQlo¼p‚7Nf¡‡ÆİÆ¸?ÅÁu~mUOhJ*^ßÜ­¨µ–+IŠ5‹=Ë[ö	aU*7}\\¿TR|¡ú¸€Ëİw³ù»K2÷Œ)ã¼¡¼®Ó|#‹\r,å‹Â\\ãráãçV¨‚H¢7ël¥Iç|R)Q‹–PaX	/ÖÄ¢]Ty¬*íhzm8\r–˜\'®¿Ô_JJàŠò³XY\nŞ-àFîg\"å¹ôÕ²s„,O(&R,wô*(ˆ.‹RÂKÚ€i	@E‰g<¬VÃzh[•Ô‡ú ßÄLƒ¤’í5…\0iM/ÙW GóBé1NòUEV0”J=CjR\rû—ƒu}¸E|?Œ´<¸¶å1;Ô×›XÚ×µ¥Ô»YÂß~>ÜïQœnØµáêİ·¡®ÙşÎ\ré?{íùt|ÁŒëæRÈã²ÍfãİEû„ñXGp–x®mX‚wú0Î¼=Ë„JŠfâE„Sé1X+V^ÆD;`ÊG¦#µo2úu£Á°§k\nš6Wó×B²¯o;à¬lGÿ¹*KwÚ’`{ÁŸAQ¦Ñ%\nã–B)¼½÷Ñ8M•V`Ÿ ÙjíPÌ¬I¢+–€w}ˆºp)ñ·]4ºÄ]/Ñê~â°İUà¬ì×=rÙ8Ü0ûËŠsª&†ˆãp—óÌGCÒ÷§ïÿı½18gÇæôœŒå>\'K 4gı†Â\rÖ¶?Á	~2·´1¡©wæ—ßk/;¦é	8DOÀAg\rI¡À¥„·‡ĞìlM¿9„ægDèêM\"ty6„¢‹ù›DèİÙš½I|ŞŸŸ7\Z§¯Î†ĞüÆéë3\"ô6ãô4<D—¬@íëŠ-*¼6`o¨vV¨°©\"ê¢´DwÔT)İ±¦@©‡u{`MÍüi~¯G5rL7ëƒ˜êvrçBf„·«(	e±y®“‹œBÚÙJT\nEl*;‡¤EWk)ªÕÚ¯Äº[2©]±Ç3Ğ™Ğ•ü¾¹<_çvÏ´¦WuÄŒYÍº¸Úñ@ã\nMš®‹‰]nSŸµ]¯ö?ª ~ö¡œÎuŸ¨·{ÓtYz£\0ÔÜoÚ†š”–Şâ8Ğò1€ºDí¤5µ‹„Ò†nèX«u“U¸aT¹áVºaP»¡+>À¢í‹fÅšC=ğ$I9£iQŠû>›ìc¨Aœæ×M/±üLcµa\nÒ‹é8÷ö¾lû•Èæuÿ ãñÔöØÅôr Cê=°¦Q~¤wöşxïÌ¸í`ëlf\"ù©hšPóœpÖ±ì•L›ô³t»¡9dì>êÙ†é_jO-ú?µè¿Eáo(>şÎşÄµğ7HÕ¢¿YVœì|w™	®1ÉÅgO`*şíNzFÏ2âÑ8`LùcH¹Éî5%=~­«/$ï ‘œ¬6ÎSFŸA¼œvCWjó ®Ûæ?YMsMşv•<¡nè^ûm15¦ø«†1†<ŸŸdÈ¨Òô5t\Z|hšTöÂis¼™‹ÈØãˆN?èÙsqs[\nÛ§q3HÓ8¾¾ş¶Î`Œ“›]öÛÓACè9ßÇõÌ¡ÏNJ&kJ’×¾rŒ‚¾Fs\rÁMÇctšcXŒ^%T½Hİ6‰ík,ON‡î™ÂÊ7İ¼§ÃÄ8yüTD3JÊJ¾„¿ßg)±ûŞ/é7ğVŠs¶6¤C@¯r¦êú|ìE}1 Ø{å®şˆo›á+Ù±o	çõ¡®ƒB¶sJÿº½#¦7&ö†Mšö& ;ª÷«‹:ƒ¶]›FG-Ÿd\0Š¬ıR¾I.	sñq´6Î»¤8’õ×[|\\ ÁÄ<0@l^®$¾)]ÕRÈ³âƒ…`0x\\5!#¥Ò&¹k_¨¥p\'´Ÿİ÷+Ö¸[?½•wé~”Ã¬1Ø¨üG0°j®`_J­,b¼÷2°~Ç­­}¶ÖkcA@ôá:o«îaôìöÿPK_zR©Û\0\0H6\0\0PK\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/images/Bitmaps/PK\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0Configurations2/toolpanel/PK\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/progressbar/PK\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\'\0\0\0Configurations2/accelerator/current.xml\0PK\0\0\0\0\0\0\0\0\0\0\0PK\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/floater/PK\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0Configurations2/statusbar/PK\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/toolbar/PK\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0Configurations2/popupmenu/PK\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/menubar/PK\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0META-INF/manifest.xml­“ÁnÃ †ï}Šˆ{`ëiBMz¨´\'è€\'EƒÀTÍÛ/‰Ô&Ó”iÕrÃØşÿ‡ãÍÙâ\n1{å/¬\0Ô¾1ØUìãü^¾±c½;8…¦…Dò¾(†>L°b9¢ô*™$Q9H’´ô°ñ:;@’ßëåäôˆ\0{VïŠÙ¯5Ê¡?ösu›­-ƒ¢KÅÄšÈ¼í 1ª¤>@ÅTÖhEC™¸bÃ\'`¾ää]Tábtbâó%»OTÆ&A÷%Ø­p§:cş)¤ø0ÈU‚‰1ı”h¢á¶ÓæÂÚ#İ˜zÛã<¶¦Ëqzi/”Ö`a}:ÇøûQşçõÇçš2<®—\n£ùAüø£õPKçªi\0\0Ş\0\0PK\0\0\0\0\0(”EŸ.Ä+\0\0\0+\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0mimetypePK\0\0\0\0\0(”EÌ÷q+\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Q\0\0\0Thumbnails/thumbnail.pngPK\0\0\0(”EŸ÷·\0\0&\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0“\0\0meta.xmlPK\0\0\0(”E-Jõ\0\0•#\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0€\0\0settings.xmlPK\0\0\0(”Eò	Y‚¤\0\0#\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Å \0\0content.xmlPK\0\0\0(”E_zR©Û\0\0H6\0\0\n\0\0\0\0\0\0\0\0\0\0\0\0\0¢&\0\0styles.xmlPK\0\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0µ/\0\0Configurations2/images/Bitmaps/PK\0\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0ò/\0\0Configurations2/toolpanel/PK\0\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0*0\0\0Configurations2/progressbar/PK\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\'\0\0\0\0\0\0\0\0\0\0\0\0\0d0\0\0Configurations2/accelerator/current.xmlPK\0\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0»0\0\0Configurations2/floater/PK\0\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0ñ0\0\0Configurations2/statusbar/PK\0\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0)1\0\0Configurations2/toolbar/PK\0\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0_1\0\0Configurations2/popupmenu/PK\0\0\0\0\0(”E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0—1\0\0Configurations2/menubar/PK\0\0\0(”Eçªi\0\0Ş\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Í1\0\0META-INF/manifest.xmlPK\0\0\0\0\0\06\0\0\"3\0\0\0\0'),(7,'image/jpeg','ÿØÿà\0JFIF\0\0\0\0\0\0ÿí\06Photoshop 3.0\08BIM\0\0\0\0\0g\0nruLqptjySRsn6p4VhFX\0ÿâICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ Ü\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0öÖ\0\0\0\0\0Ó-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0ü\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0\0\0\0gXYZ\0\0¤\0\0\0bXYZ\0\0¸\0\0\0rTRC\0\0Ì\0\0\0@gTRC\0\0Ì\0\0\0@bTRC\0\0Ì\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0öÖ\0\0\0\0\0Ó-XYZ \0\0\0\0\0\0\0\03\0\0¤XYZ \0\0\0\0\0\0o¢\0\08õ\0\0XYZ \0\0\0\0\0\0b™\0\0·…\0\0ÚXYZ \0\0\0\0\0\0$ \0\0„\0\0¶Ïcurv\0\0\0\0\0\0\0\Z\0\0\0ËÉc’kö?Q4!ñ)2;’FQw]íkpz‰±š|¬i¿}ÓÃé0ÿÿÿÛ\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(ÿÛ\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((ÿÂ\0\0öà\0\"\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÚ\0\0\0\0\0ç9¾“›×ïTáË¡Şñ\rb÷OÉõ´ß4oRÇ·¥Ít|ÔÎsÙ.Ïİêù¾ŸGÓóÜ—EÎíyı8®f·wzü©5wy:èïypRBE’@EP@E\r)P@ECŒ(ê9®“˜ÃÜ­Ör^Ÿ±Ãä×WËØ›×ENİM~õŞo¢æíZrÅ>Ç§é0z¦àsd~÷²jô¸ú;ÜÇGÃâ£Q[|4‘’«˜”cf0z—\0f;Ğêœ(î+œzéú3ÍF¿Ryû{¾ÄñCµÓ~z¸Îa\\²e)á€E\08ã•ƒS‘Òs=/;‹¸ı{Ùøo|p\Z4mÙÇ³v­ªºıû<ßCÎ_{5îfåu»9“èz6ÔÌÑßà³¸æú^ÆG=j®Ç¯¬ŠC+Û†^©Îq$ì´|ônFQ:Ì¬†gSåéêâ’æ¯:÷\Z\r›|Ø=\Zo2«eùÜ§£yù@E@\"ˆDÀ³@o`o`âî²µë4±×}ÆÖŒëùëO=§ó½=“Z=ıLš]…Kø:}nffÛÜåtŸ[­šQÛòÉ\"$PƒÂô0¹\rNCCÑr\Zœ†‡!©Àjp\ZˆËĞÒP@E2­šÆîÖ..ëNß/7Óüû¨¡oQ°I=áÏîafÑ[8û¬}oÚùæ\r¦îãôùo//§™<äC²óDH¡\"€J( !¨ \"\0Š\0(À¡©À \"F¢„Š#«r™±‹±‹·VİM\\ÜIjôYv–…3îÄøğzqµrróŸÑóİEsoùÇuÃÒÚúõëFîxGgÊ§„QDI\"€QH !¡À	D´Š­¸€\n˜¡¨ \"€ŠHI S»LÑÉÕÍÇÛ¡¹‘éy¸¼]_F®9¿~|[ñDøñuêæ_£›—/[Êv8·éäÍb-oşuõ	/BADH¡\"€R(jp(js\nÓU}6lE­˜‡$o®CSÔP@E\0¤\nw*3´3éÜ{]<á~_{ÄÒĞóûÑ»Z7G£RÅ|Ü›]—è:œF}ÍG?¬äóyÂA¾C„QDI\"„‰\Zœ†§\0!°Y§§n†Ôeíømş6—Õ+ùušœ@E5PÚwióïĞ§móA<×«âû.3Yv±6¯’¼o†&ƒRËÉìôfé5v$ä¯Z«Ì‹]»Ê$‚M®+f]=£¨aZ‹HÍ¯¬Ó3;€“‡¡¡à\Z»t¼bJTË«ÎkB‹+ÓhßŸ	Y¢†§!©À€\"†R¹L³Få:v]<Ltü]ÈâÍ&¾F­íÁ\n8¯¿/×pr{ım™%|Qãˆ‡0P\\ˆÔ÷2#)#F§‰àÙì8N¾Ğ¸N«~\'É½\"Îa·ÍèòS¡Ê²Ğà\0ä58\r\0TzvêW°ë/ìöù5bÖ/9˜Íejñ´»ŞS™é9÷²MM¾öç!ĞkïkÚ¿ÅS[˜îsºÎ‰w¼®›\rê´«”¶ñÜu¸”šş’ó³‰¹™R‘ÒrÛ9¥tåx¥»C[>b7F\"`ÁÛÒ‹ò-éù¤08*CQCCš¹¥H¤Œšµ‹óÑéu©nw¼D]ënql¾ÔÃnî-éçqt¼ßÙo9–t}]\\ğ¶<¢-3G9®	W\nÎ(.µZD›¥734ÊèBí\\é1ÏQO\"°Èfv¶²k¯·-j’W<yV¢œi²¶qÆ$aà`{F6@g²Ä·ùııœêWû>.¼ÔôëzO³—1n¢WÅ™Æv\\w#ÕíËù>ã)!³ä		{IêAÓKo7Á²9ëìØUˆ½“a´°î“g—¡…î„FBVƒ è#/=G¥ÊšbhªÉlµç¦XêO±1²	¬m”ŠÖÆ6@FÙ\ZCNí·óàÿ\0Ié¸½^ï‡³ÔòMÇ—¦*êd·’úÛZö_ÂöÚïÚ^£=’G³äÓšåÚñÏkÃ#^Ã x^€ç<kœñ…äd‹N/nx¢®uš•±^â»ì)§;z©®KAù×Å*æe:Œè6+4,cìÉ¢q\\µÙf4Ñ©¥NkR	ë·­ö\\$›ßD\\ñéğz…^qïñ°Öæú¬Öµ«ÒÔ,8;•bšş\\éÄ÷5ã$Ì£d’YE$Ò¢	,ÊT}Ù\nĞ”Ì:ÒréáÓ>ÅZM‹Ç©ÍöÖÃb)M©Äcô¢™\"†œ–¥\n}µ‰¯­“[;z£F¸ê÷áË&‘Ó¹M,8\'ƒ%œö<ÓÅÚÅ¦Ä–kY¶&C43XíU´®‰iÃÚ¯±fóIÍ6Ã$‘HM$RBy ˜±5yK3A$¬K^TY’¼‰±-iVqo>Ã‘JÌ¯‰²«™‰”-Kã€eCTĞ¨Ì¼¾•“lÚ+ƒ~ÕdÁ\rˆf d°ŸÿÄ\01\0\0\0\0\0\01! \"203#@$%AP4BC6ÿÚ\0\0\0±øçòd?•wmŠ*šÊş*Èœ\\áGšl†³²öªÌ¬¾éãÇ¬Û³X\'Xÿ\0èeè³ğŸË]ÍßÄsTÖWñVEâç„9¤Èk9/êYÛû‰H{G‘/N¯ú)z-|gË÷FÂ!©ˆ=ªÄ”¸¼(¸ñb‰¹ed^-ò¡Í6í––ëâmfgÚ:Cİ!¶’&óı­V¾«-V¾:øëßíº—¢ßğl½8Ô­™£U©åiV†g\";Õq’Ûs+øë#+_$>j7a«Rßf»w3î<z1\'Ó¾¯éwU°6X5‰x²½·J8Ü-IRò;îÇúcÙÁõ+à°á¹O_½—¢\Z¹l¦/Zµ¬„èÔŠúƒ\n5p‚¨<kµŒ§Õp‚µÑJ@S§bá?M½¼Á(%é—†Ñ•*ş`‚£Ú-XÀ§¤Â¬z#„1­­Ì¯Âª2±òBæ«v×hùBöŒ1ŞPÇl2Döz]I}\'r?§×8±ÿ\0S}Ql6’ÌÕ¹ˆÁf›ZíXÍÂä,ä1ı=o¡\Zv†yÛã³•Éå‘2ùqÇ³˜ë—)š&F®?;cé[­W+›Êµëw²T²ô¨_Çaéı,Aôñw-d>¡úÀìæôËÃE%mO»†}#y‘Èönu£æ£5öœ1#Ñe~‘‘şh<Öâô¶Q‹jä}#uf}Cz–Õµm[VÕµm[VÕµmZ-«jÚ¶­«jÚ´[TPyJS—¥üd­ó.^;“¶#‡zk+ñ¬ŒóUş@ã5-)µœ½Ó«\r°¶N˜>Æ‹O^ŸkE¢Ñiö]:µÌ¹d?+Lı¥Me8¬Œ‰óU[Ü3ÒAí\nŞXqx›Íşš^¾Rå“¢ãÉÊ~¯êšÊq[ƒ©üÕ?xÍK[|B”6À“é‹ı<¼,ü¥Ìä±Ñ©<6-«’œ(Ô3ê(Äšß§ø2“*Mî\Z¶ıK±mä+ÄÖ_éß‡V9\'€l”#Rà«½Ã¸ìœ–MŠÓäÕ~¿Ë*,öÉR	å²ú¿úwOÉ¹/†405˜Óv»ª£ÿ\0/$ñ7„y İ¯Oe0¶¬6Ñ­ÏøîZ!‘Ş_À~L‰à]Ò\0XûÆªYéY+\rO‘Aø›ÂÒonbz¤»c\'İ/ãMıÒ~Õ@åxËøÉT¹œtXÆ€)Q°\r#®,oÔ3ó4£²Cñ7€ù«Úin°í™{%.wnF8XıÎß~\\‘?,ºM\'8³O\r%ÑWã!È¾&ğÈşíîĞ2ş1F\'yRoŞ¿§»=÷úıçRæiùd?•o‰?$PşGñ/(=µR’´\0@*êÚÎÚŒßøÖ³öTá\'Ü®+İ:ßyøtDü²Ê¿ü±@W¹‡ÄœÅµyàÌÕñù-Ù¶;Íú\\=.ú,Q©<³M¥\"bºÔÇFËß¿RBŒp¶ä¥‰·Ö S±ö<á ã\'©›W·‹8ªµT¤ñ‰çíÛ«ĞªcÅÛGû’áÔÓòÈ|×àŸ–(*êÂ\\Áö¾?-´Âp•\"P–@~wê¨íßQœv²î†@V¬s7¬Æë7ëË(õãr­ĞK³’6Ş¯«éñGyçÚõYÁ-§«WÍbÁåE—§©6Ù}¹p¦Ÿ–Cæ¿ü±AW|b#	]µ«m™®ceZÔ¼k‰ßsútï¢ÚËc-¬¶2ØÉ É£§Ø gŒe>¸:p¼;¸âÖ(ëÌ„\r8T%°,ÊU¾äøSOË!òOË%mÑ2§(U+Ã3›îéÆz<ÿ\0ŠöcŸxfÄ¢`Y­F,ådù\"¶Û³×îÏÂiÓ Åç0âß§ƒ_\"ä´W¡(?ı,ÁÓµŠïFÁšY©lNú60•ÿ\0OÏ2³Cÿ\0–¤\'µmğãœ©ã`Z6Z\"5:`&2Xª°±\nÁûØö¯_9Ó–hØáù0Ñ\0ºw9f„Z—éƒˆ´>£6‹¾÷ÒZníWÚÒ÷Lï¼Îßr~Nª‚G˜E\0ÃÑ8Æq»[ Ê<ÖåW%1HbxgÏ¾ß†ÖSã•ZÈŠ³’U•Â<­—»e®i‡6S©d}–O‘(Ë1ıİòc`)	õyÇ+rÀg^ğnRøEôQ}gï&ÖeyMNZ@ºªbxÛĞ‘ûN¥á5£¼«€(Ö$šp”Ñ8´ádNGš™Ûpãl‚Øo\r‹E¢Ñh´Z-‚ÃöCñi~Ùu…CÏö`£)jÄ1{»}—RğšÅu”mŞVÃnMIâĞ…BÀq9¢ÒÌÛYM}u@KEvÛ%V¹lËÂ­rÙ_çÉÌÊ/	\n.RÎ‰ÇI\'­pË÷ì¬YhØ„å3¿°joª$5Qmìº“\'RXvö(Ù$YË7Ÿ™.½YtÜäİ3ÎQY6Ö”~ë¬Ì[u<¸³”@\'–j¯_éWş£\ZÚPÏ€Ao¥;¼†H’\">§ªÎäÉˆ#İ™aé\'hg„ÚÂøz¡¡iŸ¶ışã©),;ûUZÒ²úwòrë59»xäßJpAà<z/¹³9RİšÒ·hÖÕ3¤ªÜµ\\6¬\ZÔ)X³JGÈ]²7·mí×·l(¶Lqú4ğª>ñooN#QdaôIbz3ıÇu.ş—gdc°§é’’’Æ“e¥„ùN± òfl˜ÿ\0\Z!«’hy…˜\'x!|CÄ¹ş1ƒÉ:3¿n¦Ï¬Z=AØiõGº3wñ™G	u#£>}Úš~—S	/óLí`B,Ä§dÓ˜.ş¹PìQœr1\"!”RÁCâ\'óû\réoF˜hĞ’›ö¯ïŒÙdC-Iÿ\0 sÔÊé:c‹¶Ö—UP×¢X;1q”]¤Ú-;míİ\"BŠ—€ Îµ˜½4–%aÛ˜¨üÁ>e½´Z-‹E¢Ñ:„ÔKìœ‘ä±ı™;mG©.¹YÄhÇtM_ª7Ç>ß.ñ±‘”‚§Ø%r¸âÌÀÿ\0áÿ\0»F1š)xÃ³†Ñ~©\rS\Z•ùÍY“Éß†æÿ\00ğ_ÉàŞ\ràÉ™3&Šh¦‚h&‚h&\Zé¦a&`¢Vy)¶ÙF]œâf­© ûŸX\'mØ°9Vb×Œl\0p¹enVéºÌşka0Z§ÑŒ¶Ã·†¥Ä>DùKÆ<ÁOò2‚:tÊ+ÿ\00¢|ı\ràÉ“&tÎ™Ö©3¦tÒM%¹nM5ÔOV¬éS’j£Q&ÖŞ·\'#§\"r\"†İgtätòur·\\¢Q—C£×‘ŸÉé\'ri\'š}é÷­]ÿÄ\02\0\0\0\0\0\0\0!1\"03A#2Q @qa4C‘¡ÁğÿÚ\0?¯ğ„â%=oÂ pp6Q÷Š¯ìÍTYDQ¼¥KËbSˆ‚/ÂqŞ7?gˆ\r´r˜åºgx¬Dú*1Ì´`MI¿•ãT_ÀX¤¶hgÏÚbâÛi#2J;åbGÓ²€]áLwX©ynÿ\0…Cìw>Ud¼Y‹¾Òµ~œI¢š‰ĞêUA²g|¬Lä¤*çZ\" fóZÏ•]/¿kZIo±>¦GûŠÃæ»|¦wÊÄNaPÈ±3Éo•C6÷ÂÅ\'âK¸4kˆ¶Ó8¶V›ß*¸İËÊ»šF59Â’è›æza¤æ­Ñ­É8n›˜|I7ùUFïXpÔ¦·‹TOÂÅçŞxˆxê²G1Ñ«Õ66É`åWIVİTY/ï¹LnõDöFÎb©½(ø‡Îj ŞBzmÕ\rSÊ&ı\n­Tz…ˆèÕFœ}g\'fõ¢sœwRö@ùDôjuQê#£U&ªNë<×V!2êƒdMú5\ZªÜQ”|£7*œb®¤ó¿ü(1j¸\rÚÿ\0ú¨q–Õ¸‰2rn©ñ¼\0Tî³së†İ9»¿^!7øMõ‹Ÿ\"4¼Ö~Ÿ+İ=†\"7ê#kÊko	Ï.×¯¢×ÿ\0Låùvìz¦q]íNâ3ÜœâíV~ò£ĞuZÔuM×c×[™†3åEzIıA¢¢(½ øM®`ñÿ\0®¤<i.ÑªÃ àF™«T‚Î#¦ÖßcÂ_—hEp¸r(SI¼Ö[U,&#b¥ÕVaÑÕ‡|ªœªŸQqû(pz©M·l©0¶Q’]›”\Z¦`§î»óÓe¬Š;y\"-´)\"x¨2[+#vnÏà7ıªƒÅ§dŸ)uMğ±ÛT\Z©½îP!ï\n£ºïÉê\\ıAÇeï·ÿÄ\0)\0\0\0\0\0\0\0\0\01!02@A \"3a#qÿÚ\0?ŠÊ•LJšÉ½Š+å-ÔBŒ^©ßwÑO+g «S{WÊK¡³S–¨S«ÄŠÙÈhÔ;H£»¨Š˜ïEt¶$VU¢lš”ÖC±DeòM7L\ZâÇeD”Ãd;vO²€}ª¤>”M ñc¶oiC±6Ê[(,Jïw%x™œ® C±5ú±Dİ«ÈP¿lŠBë©PíALœT}¼eÑ¿lŠ†åH‡nNuvrmèy(¿H*p5ÊzDTQ:£g/|´@p…Í¿¥ìğ‘<P…ˆÁE[lZì£w5¸5;úÀkPŸm×[{&¸H\">›ËQº\0\0|ğ_”)4W§tÛÜ›¡ÖA¡¶_È~DyIÈä>q¿Cƒ”ƒ¯×Ú|2>èáœ}¦›7SÉÔyr(q“øœµ\nUkªkµe%Ğÿ\0‰˜èŸúNÆÄßj|[¦ØlEqœ†D r( Fš+Õ¿´ß«ˆÍ·Ì¯Exƒ?ÿÄ\0=\0\0\0\0\0\0!1AQ \"2aq#0@B3PRbr‘¡Ñ±Á$4Ss‚¢ğÿÚ\0\0\0?ìjGa?—¸…}NĞµ}ıx~L;ZìOå´vQz.Ó°õm?\'KI<\"P™÷dò©1HW*_ºxµ©ñÊë‘~^uÊèwœ‡**xŠOå´vdòÓe¨lËÉ=ö _qn{8~6ºïfš3Q‡•ocü«Æî±-‹ğ±<tçQÂw¯q—ä5Rw‚Gc§\"t¤óÒ“×hìÊİXìµ^™*$ñ=µe‹+.aEa‰‡¢ŠŒ9[qÏ¥Ä%›fâ³3$ÒFp×Pj,6˜†~,€ Ë.*I˜[ØD\r¿­DX‰7–¾IüU÷œK½®l«FÓ–êŞ/ñX|<Y·o–÷>t³J²‘{d\râ¥X0ø¼÷œÒ¸Nâe˜%oàgà\n±½,Øu!MÛ3õaÓ,­¼{³8àj$›¾ÎÜ7`Vû4XdıÜ«{ƒJşŞ4é‡LÌšM©“îÒ¼mYf£nŒ=å™Â/:Ä&fËN5 öQ/ŞÖ‘ÄİŸ.œ*`ÆX@-q¡¨üµ¤õí³tì\nTë¯¸h¥u]ÓisÈÓ‘\"ıİÉï¥BøLF|£P9Q€ï7åGËóSC,LèNa—•&#ìÕ–)9ÍéF3¯4­dƒ_»ÄiÔã†_¥ÔÓI.3ìõ‹¤+bŞµønòÅkÎ–9’0æîÑ’¦âÄ7:ßúÚíB!Tïf¸40“áË n­m)q)›…à—¹áXyaVQ&ëzX¦™°²›U¸¦H§8™æ9V×¬N\"i#Yf’ö¿*¸™÷ “–úe¨ Tf>ñ×ÊoS<±]dóÔS\0™x¯!I]Uóf©rÅ–I@×¢çŸ\nO^ÈÙ1òµZ­WØÇ—/º1Säk4ŒYº“ï<ë]ºìO^ÈÙoÔÛ-°õ:Ë{Ñ)£µ={#dIõ¢kÓe‡ü³­i\Zö×·oÒ(\nó4[ò£²ÕÉ3¤Wg~¾U…ÃÇ?ztcí°äßë_f8_>½Ëï5áS,J¨¢Ú(°áW»Oaÿ\0•° à?-–8ŞÉ(³µ¹vğUfC’t(Ë;fñ5“õRúö‰ò¦jÌhµ\\ş[–N½ºÔ¢ÈÎ­xïXrW,†ù¶GëKëÚzõ«PAñÉ«…ßÅâ\r}â8“këPÈÈrLm¿\Z1N¹dEfı4¾½¥^¦¯Ò¯DŸ‡\\Ó…ñqV<~%è’È%—HE}Ÿ‰lLJ¸hÙ$RÚßÈWÙªR	N}CÃ×LĞ²º›j§Ê­KëÙ‰Óe¾$¯JÎŠ2ß[M1\"ÄŸ„ÓJĞ¥ym_^È§<†Å2­ƒpø‹Ğk3ı<isÆVÆùZ¤zòøAMëµ}{4%A¡à(‰P¬‡‘¥Íá]M$ò±øq³Ùç¿ìãM½ŞåäÃ7®Ñë´Jñ¸f:å¡‡Ä¡B½k[0«CrdàÇ—lE‹¤‘ŞÊAáOa›}–á¯ ¬aQC:İØµ0ŒS~£:¬{‹ÛÙ¾`¦†‘ê.;Ôò2¯wŠßZß^8â½ƒHÖ½}Ø¨Úú)‘¸©±í€Éå[Ùÿ\0Ë`¶Öİ&lµb,GÁŠ]£×h\"‚¿tÕ¦PÂ·˜f/4<Eš¸ï/nm\\[È:eõöJ¤¿‚Fğt¬Sg¼3FIm¦‚,Vóñl?­}›\"Íìâ^ùé_j»Mİ˜{3Ö°øw’¥‹ş´yô¤âÉ…ÛÔ\\”ùe¾„óí¼ÍâÕ¬à~í2°ï¡ï¥€òf·yuùo.úõ¢/‚ş»G®ÔÂ‹»~«^ÑL°ş¥«£\\T’(ÑFk\n\'®¿Q|\\E^Ş!z³Ùg]š6C—úÚ•lEüµ¥–[AÜŒrõ¬òsïšw<[‡ÁŠo]£×±ß»\'ZîšŞEd“¨çëW—AÎ›/†ú|6n7\ZdàÀÑ<$k&\'/Ö¿áÅØüçSKZ¡ñi¥Z÷ø+(¹®ñ¢Hb}kÂGÖ»ıhfûÇ*‚Ç­o¾Ïb¯ú/Y1QüÇ\Z“[®ÜbË(Vµº°éHp²‡%´à¾UŠ?¸ÿ\0µG[ŸJš8¼Œx;­éQNÛç.mh@9=i•KX~¡cG<í«Xéz…ö›ğÅµ©ğóÉ\'³á»K–¨q1™T\nRQ¨¤IX¢\Z…½M<[õİëíVÙ«øœC,ÓÊ iSG›*¢cRb`ß•lj6&wÎ¹³Æ·QGiõ¢Ñ…T°\Z_­ZßÓZ&Úğ§“éEùğ¬‹Ëkğ^ÍY×¯g+‹Šºê‡mÃn´RnFÙ¨5ºSÜŒ~ËafÃo•šçZ‚l\r`xÍÎ¾/*•Æ\Zmëõ˜åSH(•MóÅ&\\Ş´ÓË~TØÙï6l÷¬»’>ì-kø«íeÄş–³/Ö—+ç½éqŸwĞ&L·¬Ti‡“ÛYä¹¬8Äa7³áü›J“±w$P¬—¢A*±ùä”µ#&\ZHİG—º~”îÜXßi¥qÊöçNíf¶À£éA#ñ”}[©ø\0AfCçVanÉVÔ\Zd<¶È[ÖX›N¼ş\"=;×½úy¯\nE¿Trø¹W¥>#G¦Ï¯¾Ì~A}‘ä½ôáP‚37JeeĞr åÔw]¦(#6éËdrâv›ğ>ãw\0Ìümz ñ\Zlaæ*.uÚÛ•Í—S®ÁOjEíz*ÜF”±¦¬ÆÂ¤vQ–3f×´Ú¯\nµÜ\r\"1½¨­ü;\0øOÀÒ³æïWı+\'ËA¯¨«[Èl+{¨b&ÁÜ)¦ÃCƒ	»ñc1r™Ä¥F÷Âµ˜sûçXü5Šÿ\0µO<aÂfüiÛOéP<\nx·9xV/øPÍ…¿5¨£…B.ì›\nÆÊĞBÑ¬„ofk*Ö\n‹±ïnn¹½*{­ŒÍ~:Ú6<…^X˜e7SşÕuõ?z»xÁÊ<ÁØÙëV¥ˆ:Eî*cuö\\{\rçaî®8Òûa§í\ZÔ›¶İ”‹ƒC|×ËÀ`)ÛÙK§KÖåLW½™ojQ;æËÂ˜áØ.n:^·sH\nqğĞÄçà2ƒ–¤\nÊVC™ƒ-ÅéVgÌQ§o6ÃiÒµàk0àúR¯¸Ö²}Èƒi²_AYš2õ\r…»†¾Ğõ5îÃ7“5ëÙ‚·\Z‹[bD?‘ì‹·;ÑCÿ\0Æ„·+¿Äö2–ït«\ZU¼#LßZÈ¯—º¿Î<TwlVı*Í#A÷‡0çOß=ïY$ t¬ÎI=M~‹·Ø?£ë´Ò8æ5 ãë_xA{xÿ\0Í}+/–ÁÄf6$Q/ªh“§ËNÂ\rwA#‡\ZÈÜx“Öößa)};“i£s^Íä6òëZè£€Úv‡ôr©¢:kVåZP‘|$pé@ô ËÀÑVéRq–>YxTjÛÒ™ª/¥$®n\nQÎÛÂM0QÇµ¯{ÖˆhÛèkDjî\0´›öÃğÃ%®:Ñ•­úMk ó«æ½wõ¹ãÊ³^~÷ñ¢lÇË.µtŠe{è8RŒ@håÔw2æ·Ëjï@O¢Wáºÿ\0%¶È— Öœ!7à©]sgÒúÔy‰oé\\{\'´Ş»G®ÑGaø{î\0?·JïC›Õwpéşµe\0*á\\;7­?Ö¸zÖƒ«˜ô¶‚·‚UÓ†•ÿ\01ÿ\0 ¡¼šäpîÕ÷ŸÚ¼zúWûW‹ûW‹ûV¦õÿÄ\0*\0\0\0\0\0!1AQa q¡‘Á0±@PğÑáñÿÚ\0\0\0?!×6ug`ñËÏDW‡¿M}!‚Qİ½#óÓôÔ­º	Úøqş+ü¯Ó¶DœÄ·^Òà¦¦Jüçõ*WÛ¦™€ƒRïúk2`±ìL´ªÆexÿ\0¿ô$fıMô›®^±p¾!bpjf¥o=Î6ÎÛÀsù•|/Û¯_ ,XgÀ?IA=ñ>å(åhpWÏ®úßPm£/b¦;\nê\\¾‹—QÂ*4İö™6ä¿áÒmé[CyÌLĞmóü#_í¸;n+_©DË­+ô<ë­ôô“şÑ\\Ìe@öšÜ-(ÜLé-ô²™„Š%«LÅºÁ\"z$ıÂ[¢1ó±ç²/hå!X$İËğ©>úB°¤é»Ş(´‚êƒ¼& >à~îÕÍÌ\\-i}¼MĞS$ùÑä«§Åæ®d‚ûBÏHm7Ø‚p wuà”}^\\ãÉï1:-3}ÒøÏ†Ÿi@U¤3\\ÌS¢ÏÎ§°t—PJ„$ã6M‰eË|cg† ¬À¿\0ÉĞøÌºÁ7³ó\\Ã´_9Õg‰™è/å1g¾[[Ì9>bJ©*+{\0·åTC÷*Y†ÀÉÇfV\"¢Pw†]ÀW2ÉAQ}ÄN:à;Mbšœ«Øû,É-cİÛ¼1[»†0†\0¨c‰M¤’şæÍØ²Š±ãR \0·uâekÿ\0ì/An\"áw8ÙîŸ¨>¿•ÆÉ–İÊú%–I2 ñòÅÖúX\nüJ°İ¯ê1ğØK³NòÈYtWÙf-	¼®/ÌtfÕúœü J;ğ³‡³¥ëXşhqtû¥t£Ë}á‚|:öz“¦ßd<}@aƒÆÄ€¾Ìªpá²ŸP•·Q­ˆw‡[C¯i©Ñu)!ÆQö„Ìv˜ƒÚËˆÿ\0WR¥J•*\'EJ•*T©R¥zB¿ƒY´ßÕÕË0º—´%–qêİc™¸t#„Áï@òS\"ê\0™‡çŸôúôÙÕÛà:aåceJ¶ã)^†Ësd Æ\'·Ò3³¯r]û{Íªíÿ\0O¬gØèÙ†¥4²™¤¸íÖåó¡A{íãŞ0~¬Ü¹“÷0[/q~H r÷èˆKïzNÚJÀL/¿Sı)¦Øªú%*ˆÊ$B(x“M\0ÆqtÕ´«–‹Cî)mqÚnK›7LwY‰æ€çGØåÿ\0Q§Kw^ì†/W8™¢³¼&ñlí¯N?BÙç,Õ0%ÇÅE\0Û‚#‰ga—üuD\"ÛØï\'Ÿğt²a»è= ‚ÃlÆìFÀn³lÜD\0Ş?Ú¶·S5Ğû‹0yG¸t*¤–O‚Qˆ»ÿ\0üÌ÷¢v©Z„.­úš±>ÿ\0ÎëÑ\rƒQ\\&Ş¼ÅKìt¯%Ëà~iş”Ä¥·`ÔùzFØ÷ À½*IH<ÿ\0¨Ñ,fË„	š‡BWå÷f¢³ùz@3HÏVòËA•X…J:Á¾,Â=à şµ5)ˆíü{ô!Ğÿ\0\n‚âÀÓ>‚ş·^\'h@-ÇÌÓÖD>ßû›‘â+ƒ|pD‹‚šŒ˜X‚•hf(¥?©Rkàoæ=UÕ¡ÂüÅ×¶–ÈÛ/ê=lßà¯Y¿¤\'Œû?înE„óŠá·‡LÕ™_†&\nì\'qúy=¦ôWş]ÅUUW*óEHSgTğ†][±ù~ÚP¨WüL#X÷/i|nÇ½„k¸wñŠ«Á÷¨³+Ä@k§`ïr©®UÜ•*T©]‰Õ›¢ç\"{³æ^„{ŒnJùnf›aĞ,FB)’¿”ÛÓ—Øÿ\0s„x›KÒ] nTº\\3±N½Ÿ3Ş®ÀıÇş¥ÇB–EÊÂv$\ZTË)Ö¿û¦Ò(MÖeëŸØß„ËÊ\Zu‘U‹Óƒwò‰ä#\ràÜÙvùÃ¿JôT(ÂÇ‡»\r¦P¥áeL)a³‚8%øR×Ü†¾Oõ ÀuÀóÿ\0±hV«Šşô‚áö?ÜáÚ[fğ]]<ÃÂUù!šo½ûCfMøˆMDV­Zpèt:W(—¥“¬`‚€±Ö¥z1cu{øú”g±á†NÖDì;Kó¼Ñÿ\0	ægÎ×sØ‚nI,}×,¥nKşt{¹ï¹R¥u¯SõÖ>îpœfòåÌQ0Ã\0şX–»Ò˜ÙÑG„híªæ&\r$ÅãĞ\riüC©è%w•	]úW 0WÃ‰q`%•Ôµ!8şÃŞvfœ‡Ìbõ]YeÊŠvvŒ4Úö<ä}[th!Z‡±2É6Ü¯¯e(ş¼€±İÄvŒŞ6ô’…h]°} Eßk€|µÖ/]Çiş‹(ˆ€Oîh9‡Û‡,\0ØoÙKcÒÄQÖ\Z‡óÄ]E«W2¼Gow´Î\\«Ÿ‰¨l.)›x‚Æ€§Î‚	Ò:u÷9™él¼\Z~³43 ¶«D³ŠİÇr\"Çh^%nTŒƒY+¥J‹QOTOi£ÓUGz/FX >	{t¼Su2>¹ˆâş¢	îÕÔÛ«i¡Ã/ ˜ÆïËÒTá–i=¼=4Kõ„×K0@=å\0Áß¾‰d†ñŒ¥­QºÅ|G²ıŠ%Zµ8/4£~	8Àæ‚n{³ö€9¬x_PîÌ=¡X‚0{%¦óæX“yûŒqQ·›úñÍ)‡sâ½…ÍÏxé#4Cµj+_%Ã÷T\"l8•*	·&§4ÔÓ	5]æ9óL¦²«ÆU5àyYe-[m÷ @ü=¢S_Å¤Û¨\rÚPO%ó…FvŞ3•¶äÕµÏİ\Z,Òä*ªª»^§@%€í)ÚW´¯hÒ½¥^ \r¥J‡u‹?ö‰c+~ŞÓQ)m>b\nÎé·íöö;G–Ë$ª‘]áJ•*THÇ®³n¢}‘Óş0T|¤sj¼fbz4çåXåÎcVi`b	™§ ÿ\0á7š’áŞFkĞC¥vĞà¢½á8R(‡EN\'H¢C•¨ŠÆ6½{Ì=2±iÛ\nšÅ\\8ÿ\0ÙR¥J•,ŒÔrŞK&2±¯g¼fTnğ\\E&Øñ6¹…Ù9eJæ\"˜ùQ%tc*2 ÄÍOÁG@¢ŒA©SOi¸°ŠÚ™]TVµ¢ˆ¹‚Şéîû›L#WçÒBZ™abÉ|.ÍÖæuın\'oæšÅß‘rË;ÿ\0¹|ñ>Ü	 EäDòÚşâMR*ç¾¤Â™Ê Q¹‡áe¡ì’ã„[‹€ïæT©R¥D±5‡,‡Ârÿ\0Sš¹; «Sô}çÄÅòÌ­â ˜’¥D•’ºWF¿O²zŠ(±öª\nÏÁ,**Iå]½ÿ\0}“”Æ\\»}ú\0:ÄâwHÕıÎñk-~ĞªÔQ\0€ƒ._Ñ=İË—èšTeÁí£\"i²/urªö–1íİL³ôĞ*º*_aí\0CHá +ß„ì22ÿ\0¨Â‚Ù¡âfŠİR3X¨1e.ÉRº1šMºo†Ï¬pi’ûÃRìÉÿ\0/´{XNBJà›½ºgMğèş÷R„! @:*TĞ6Â0Ô¢)—ILBĞdBİø¾8Bâ—Ä¨x@×‰b¥A³TË¹ä\nš>óŞR\0İbØ¹¼Š¨Ã¿J‰ªwÓh¤Ó®ÈıÅ—8î‰v1V)QÈ \0+Ï¡Ëö‘\\ıi²şıº7ûG?g©Bè A@@•*¡îL§4Ã/ÍÄvYüıÂY\nPí:àT4[ÒTjèr\0xˆÌj¿.ÓzZ¶³:ş¥b¸î(hTå‘jÿ\0·QzÆ‘¬¥°ÜyĞhuQJ¦ú—p+ĞÙÂLÿ\0ß7ñéö½röKOĞ}\rbü]·Ô„! ‚ ƒ£Šw,¬è„‚[9Àç´v—ÒèÓ8e¼*¾!|n(UûÍ°+pÔóÙ”ıÁ·‹`¢ÛÇŞ\0š^ÀÜ—Üµ¥js)øNÒV“´2Í`r¸Ó¡Ü\"E,NH(TşR’$k\Z2ıĞ˜o+¶2CÖ8CèŠ>Ï t\0ˆ£<0 öƒÚi}GèLƒj[‰BPªŠéí®cÜ\ZÜ%òks„)˜U\Z+|Gbıš¹¶XïÆ²?¹k¡äãñ/âü—,|¤­Knhk3ÈvÄÖğÆF|A]¥Kß\n™S‚a\\TzBĞî\rI÷]e¬ß¤ı3OG Å¡Çè(õ1	ğÃÂ_JrŸêÊÛé«_¹¨¾çí=¡SÚø\"néq]âKê	*]bV±¾ğ½ˆv0Æ‰ea~K‚€U¬ş¢NZIå¶A\"Ç5#<cÊRàèQ¾XQPnOÿÚ\0\0\0\0\0£³ùE&b¥$é˜%®;®²z+® †©eé£zhFöc«&®³‡@B2Ëf¾3Ä¬·ˆ1f›\nŠf‚úì‚Ë\r¾Ê-vÓó4â±éå†Š\"’»¯¦›¨²Ë)š\\»)ñ³\"šYh¾é/†©íŠÛ.¾8b<GˆRº.£)éjx/Øã‚Œ—}¸ÍÌcŠYe®jµ!ŸHËï¾¸¯0‚õšÎ(hX¤†y%.ŞãŠì¦Q‰ØºDÀ,òŞI©!¯Êx’;m†é§â××;U.;ù\"‚›\"ºÛÇ•ã‹gš\"®F¡\0­Î’q¢®y²õfQ¸®†j!¾Û~J/ãH+Ák7ÿ\0\nÊ³E’Éj†b>ÿ\0Áş.²Øæ¦fºÈŞi+øë”cóJş\nm¦ß6ß)ÏZÈ‡¡\n.ÄÑÿ\0?	G×xm–ÓøÃ­õ5°.ğ®Èîu©}U;m<[¡ U©¶`T#eì\n`”ÿÄ\0(\0\0\0\0\0\0\0\0!1A0Qaq¡± @‘ÁÑáğÿÚ\0?Ñ\r–]µŞâ‚ƒñÑÁd†§iƒõ©}i¯ÄÌv[uŸ³©b«o\n›LYí‰R<K4İ§¬©aµ©Xë“àÿ\0~Ò¤G™ Ûé=¡1;‰P—ÏB<½ì]û(%h`ğ×ëöšÉtµ,`	¾“wö„õg]{|â(:»|@cÃíušÙ¼Ln¨Âb“IØ—„¤bÔê‚ÙGîdÍŸ]ÿ\0Ÿj…=vóˆëÆ|Jg±Rmoè÷w†;¬Dê<³)òIÚ/\0Aë»E^3ã„ã‡Mˆ~ÿ\0rÁã7Ëü>yamGJBQšy\"\0¸ox\0„ºğæ9H¸,µzè~&_»o–!™AË—È|ä~¢ÖTˆ„^°¡“©)Úyå‰Y,i7˜¹ä;àš¿?¨ê/câUdG‰Uh²ùIpÉ©³±çù¬, \Zã?–{ÙÃŞc˜èÑ·G´(:’Ş™qÎÂˆßX6Ãßi¯Ë¯–ã+kñrõ£oxü9ÔI¾$-fÆ?nø‹àfTjTWõÙ£©òC˜[¤7]ro»¤&6/OOã·pÛ}_ÒöbRœËËaD0X›ËŸ¯LAQd–Û=*<Üf¶m‰´KévêzäŠ¹K:ækçxè;NÃ/Ì¯©ú.æ&ä¡›œSX•º\"ÈĞ^zUí{E²fv…Ôl±8@—±ú=I^ƒh£á§ÚuPş¾ÑÈ¨×bú·>8>ĞĞ÷|¼·@k4F¼.!Õ<©ªlëbkUÖUáú(€\nUu1Â×åøšàMsÛÏû^S-4›×ƒÀš—©—ÃÿÄ\0\'\0\0\0\0\0\0\0\0\0\0!1 0AQaq¡@ÁÑğ‘±ÿÚ\0?&É\nÛ»‹XüÉÛ°î	ÓKr4Š‡¬,—„}ä°ÜŒŒ„!B£-ÌÖ/qğ$X/G\"—…)KÆ—Ä-ÚKC¶5‰8€U\r¿ÓRödĞr£H>eŸÀšßéuqBÁ XQ``”é´N3£¨áEy4\ZŒ0RîC¦1+¦ZN„Í*†Mv!142ˆV–Í£}64˜èÚ>SQ™¬P—*åˆ„\'$µ‘¬P±ÄTèhiÂjkáÀUıştÓ\Z1½\rLó_¡&ß|‡í‚‚¿5ÂNóò>¸R!ƒŒíÁ1²¤\'yÜ§».-VŸÔŒ+¿ÀñWØk·°ñ™¬]F6>Šszÿ\0ÃÂÈxa¯†¾.~bˆ‰öü³wĞ«–¸¦(BcÈ;jã ÚÂkº8›_\nx \'ÒË\'\ZíìjÍNcö\ZªX\"3HÄL™U¡	P†gÃônzŠ®^Âˆz}Í\r5rÎeu¾“B“¢Š-j ÒŞoäSÔ|Êøbá¸b×\r~Üë‘“ƒáFÚ„WÏÿÄ\0(\0\0\0\0\0\0!1AQaq‘ ±¡ÁÑáğ0ñÿÚ\0\0\0?ÄtˆpŒ¤¾v›ší›´ŸÁ~¦U|eƒ<A~Ùb>t¯3Ğ™)/3ˆ!RhZôDBìÑàà}@¯Ê´­+ğ©R´©PJ•¥?øôj\rÃ\'‚8Ìtª)å›á \'q?âu2Or¯	`\" ¿³SY+ü£ş @9€†\n%÷›h…|X¶É€fÆäßW÷ZÒ¥~ùT¯üRåD¹R¥hÛR¥CCÜX¼@kc1lnÁ`–mp#Á—ÜË\ZHV.½Œv”¹”!®o}‰—Ê2ˆ‚À|\"±±óş‘}Ôãî$«.‚×©Tv¥Fìğ?¹AÜ2ÊpÓ|»mFÁS4ÛO|¿Ñ­kz.,ÆS¸ˆ *l¿‚Ñbze%%{îRW¹ï(mŠ×Ñ€-(¤z®ãu{„ıÊK%oñ½\rïÃaâ*Gl`)KÉurñ”MeÊv¬ÖçRõYX`¹Ë‹Äl;9NbrSÂÇ5bÃqôˆcwgù	üêqŠ¾1_É*_¨úI¬@øµKRxşÓ İ‚näkÛÁ÷í[Ö´U*00ğïò6\0ñî	­Á\rÕ½ˆ\Z„T hW,ñpà‘Šdú‹WJV ’‹±wmÁ&b¦æP²]³	½\\_»¸¦Fz%Ø0ÆäZŒÂf•R­\nâ{·B­Å…[p °ûgL\"(Yp)W6.e—*³ş`† [ËXMø´¨ÊÜJó­wæKe¨ê\r\no*)\0\\ÄºÕ®× ¨ˆ²‰Û\nÅ¬¿ÃFÒ7+ñc0	T3±³7Ç‰SEK¢ök¦Z,CNÎş?:YefÓ`ñOL¯h¯P<¨s·[`Aš;5a1e‘ŸrI5±É9âU ·ãÌ¥vEğ3ø_Ôx4ìÃ,¨ô•Í`ú¡b®òVdxjÒá¾pÇ*‰hóSá·óú•­hq,EÀT5Ú-á§ÔA ^f¶ØÃÈ›ÆÃ€·³¢?(Çœ›NÖ9óçlÁ¬ÀïÜëÒAp6ÉÜeĞÎ·Îø8hÂ³èVşG–ÙA.é±¶®¤ÅãyVxmÍÍ.7¡s-E\Z‘îx\\«ÑV’›8ÌI•èlÙ“#}JÒ,œHÒÇ0òy¤!)FÙ‚¡!l·baË#,E–\'!PåXÊYš­Bã&0%_a«¤+Û\0€ÉE[Úş£³ëææêşˆ ](«nW-ó[³ş¿PÛğLKeñK0ÄXúÏÔò”±ë\rëêå­¨-—}É;Ì,YDò¨oÄ{¢‡•v0™›$Ià1s›ìüÅôZUV}Cy|ñL›Jj¿¸rXUãâR1]Í¥\"Ø~\'ı?K‰g¶¸@<aã\r?Ià³êx%z„|%\'¦HøGÆ\nÚºœkìe˜ÀN`Ø·2µ«•-!X1˜¡ç7àp8y”D4q™ÙÊ\Z\0 (#ú­-ìË#t·ßqÏLÏt¥ä-ş¥jØÜ¿6i1h˜ş[wêàb¿\0•Ô¨ß‰^¥ez³×M ñ <ÏzO=Q:k)Ô«ÃÆ•+Ä©]éRª`¢¸ştß› ¤AÒ\\î lÏÙ6‘ß¯úŸÃ31Aº]è4úÁç>ó<’£â)ÃâŞ!V¶Wü43 \\\n•	R®WáR¥iR´­âT©ZT©R¥J•*V¸K•‹ïfä”`¾ŒigüAÉÃÕ°Fì¹°‹è~¦äË\nã¾[ñJ(êaÍŸ æò­ù”E’Ğhµ´U¥¯k JĞüjT©R¥J•¥J•­hšT©R¥J•*T­ÈÌWìMÈ·Z;ù‹ç…•@x‘_áM0¬Rp9ÁòJ¤¤u±˜\"Ñˆí±*ÆÃ‘ä–z?©Rõ3Â¸eÁó¯9üAèÄPK½§‰Š°Át<¯ğ~\nĞĞ•¥~5­iR¥iZV‰r¢V¡r¥\\­nSr+/îgÍÜ\Z¬ t*Y»µo	rj£–QàHŞ[U_v5n{¹_å\0¨€\0EIš‡Cı\\²§_ÔUê™c7{‡î””æà=ƒøˆÓäY‰2èôE>³^#\rocŞzV+Z•*T©ZÖ•øÖ•¥Tt£ÿ\0nº‚”wîgzP´Ÿ¼Ø¿Ÿê:\nâÍ/©ZÙU„º0ñ£Oø\nn+rãú½ZÙ€G©D´µ|Î¯Ä7h3¦?Ñ„ J†Ò¥iP.iZT©R´¨šgªÕ í”Ïª-rÊVÀlÊ•+©ZT­+Z•®÷¨rŠÆ)¦æte­2mÖè•¼hs‹@ğ0­\"+Hf{©‡RX\"›$E+kí`şåú”z´œ ±ëIÜ&ò	€Ë=óAg\"\n+J„\r©F•¥J•¥J‰*K-\\†¶¿ú¥´(Ø?ë_îÕ¨woùTÙª“JåR¥J•*T©R¥J•7¡Ê-ıMØ­+ÄQ€t/#»­Y€qÆVc+G%Ù³Ç2áõjJ@İ½@. ÊÆĞÃHfúßcú?¨¾©“FÉøD&Z\ZX]_qg4ñ\r@üëJ•*T©¾•¦NöA~rÆ Ìíâ#8!7dè‹–$‚e\\q‰Vş*T©R¥JÒ Ê£»õ7åR’Î£’ß«!ËeOê)=…èÔ«Õœ¼ÅÛ}Ô_D±i°|%][FğcøÁú€´Ø,,Pnè^H~\0Î†›êJÒ´­T¨î2µ?øÑ-#¨8Àæ®6ó·vg§c5¼·‰„©Q5©R¥J•®äÜ›fş¯qı„_öòĞÕ;\n°ıE^©b›bËBÌe–/Ãş÷4ë^;Œ\0&6ù?Ü¹\'\"”!¼¨@†\Z• @J%‰D®´$«Šİ36±i†^‰:FpæC~ÎÔäqŸ3\n‹;¸•*T©D¯‡EJek½qo7æØ¿”û²Åí¡@E~—êQë–Â·¦yº²—ÃQ_M<’ñ€P9;[ŒPÇ_8{£–\"\"Pµ;®¢3&¬¡Í»0âÒ”rÛ¨¦¸²HR¹UÀ‡{Dì/Ü¬	,Ü/»««•Àùà¹t*î³µy‡©¨±Å\nfÒQ\n[ºª¶ùÄJ“¦]äİeÂË)¦eø…A©GIl»8µ¿k˜+Úr/™\rV„ñ.š‹©êåÔlsU\"ƒC¢ğ§QïúCq8gÂ$©ZV•­i¹7\"ßX±ŸbOø}´ñ#¿SõZ”X\\](ğ°³vV‘’Sooİ6~à*¢G.áìSên_â$²r©°«õÈG.ÌƒÌ9\'´â*ã5[.[«ØD%VÉxâ`2xêÆéÃ‡Ä¬aErVzÅÇVÔ1¸f Q°7µŒ~n;¯nÓ‹%âê\0aAg	ye:*T­Šîcó±~ã\n:K Òø‹%²)~ÇcŒùƒRñr„¸–È	àQêTZQ¯#g£xŠ\n’êØ¯_)v²Î¥w*V„©Q5­)“úÍ©O¸Ÿô{hà*?«úŠ½1[„ëmUO|Î(•ığÆÄl_†ÿ\0(#Ğ¥ÒùQ¶9b…Ğql`a°Vñ÷øpÛ3´…›AíRêÄ:!Sb%ğ@•©^%x•â>Å÷Ù ÛäW¶rV9ÍÂ¹”_1söCTÌğ+àÛÓ	ğo+õÜ«0?Ú\0ZÁá«€czsú«ªpÃX/”Œ¹jŒ½Æ|£*a¼©_…\n-Îz•‡¸ëâ˜Ï—EÑè~¥×£I®lF’…Œ¿ú@CC)Ì¯o„C{’¾?utº©å6ª}T‡ËÎl4Ó“ÄXPİ}ÍÚ\Zm –6\'²¥ ½³,lG¤¨€•*(Í‡†%}—ã\'7¹>.;±iáÚ‘3-Á“Ú=&	Á>º\n£ƒÆ_Ñ28qÊ8<]eêå kìíy€Óº•Veh—TuàÓc§¶$jâÃIgy>`É$ˆø*šáOîYª×öKô¦©kÓ·Ab.\n@>æ9:\n§uİŸÜÄ³|Ë(UÔì›úÛñ¦`%EE¥F·N!dCà`\0¬æÜÃz®«¯2®!`‹G4#ÿ\09Ûÿ\0Çæ$U“BE)YæZ£á¯Ë³(W!†öZ4ÕjîŠ(•ƒ,\Z\"©_s0­ùe‘wa’¸Û¦WŸn9 %UñˆóV@´p\r÷R­(NørBİ£$©Ê·õ,}e}×¼Ïîh·”²†şà¢P\r„¾N¼iL\ne¶pñrÓ³%ø!Kmƒ½ùŸ0!m]3~é`Q‡tKä¦îÊïê*#’öÃÃã2’¬(<{x”çjéù•¥kZèòŠô½ôbí> *îl·køï¾Ñ³ı1 Z›+ÿ\0ŠcÙ“^;ä‡šá‡L]‰l-™+D²‹^Â½§ixãxÜô„Ã\"¡J¥ĞŞ()~å: İÌx€Õ·ú8ºÏu¼¦¤Y€¢Ş^Øw†Õ˜\ra|wÌIZÆºsp<P#Oˆò¼S‡v=‹¥©[Lm]QMVÚ´?\\².D™²€8dBÁ7hc%ƒK\rà«ÛËk	Eìq˜şÈªÆm>¡äàhKtL™„¥Ø[-ö.L%ò÷‚Öx°/.±æ.t+eâø™õ´åò¾bàW/˜!Y›n^»è—¶˜ºğpBØiÏº‹q¦S*Uj‘.\'zb¢·¢Ş:Ê´@tà>µàJeß©g\"xA xÿ\02ÌœöÏÔzÇu2Ş«wó#(§Q[¢ÕíeËëE^òÖÄ:ˆ£bbPîN@‡A:0| ùDá¤À™íê\"¤}M°?–ã¦RÇÂË7À™yŒÍr½ÿ\0HXªd®Vîñ-(‚¹É©dªÕjò”ÌÜip=¹~\"¢×ôFªåÇ©•ª~c,0è\"Aœ¢NP¶|ŞŸÙßÒT.Uö‚á$\'”û°Ìª6°§!–Ñ‡Û({7á—Ş‚6r´8Ì}ÓP_Ü›ÓRåÁŠe\n»‹»jÀØİĞişbÜ\'›EjòÌ7…l{‰œ¹Ù0î¦$¸Öè·FŒ0Á¹µt\ZK€Ğe‚Î/‰Iî$Â¨9Ù·pšÏÛbô9-Ç²`\0{hÚê€Y&ğ=T\nƒŒ·ú•OìÌx½²®ÀZÊpîÃ.ŠÔ:Û2ãA„¨ Ğ#FT¢=àvıè¤h\"\Zzï\nÚ¦cd¤\0ù{gC(w{û‰¢1@Ã¸÷XÙ•çAkÀı?ÌÜõ1ey´¿Ü½³=- d4X#uj¶0Õ\ZäP\n«Ó­ Ûöš¼b‹ıÆë?V\Z•\nj¡rº¤Vú–Œ~‡p\rìÃæè\0÷4Ñk¨“*TE6§E­eáô¤ŠÊ‹¼½¸	Y€¥ŞãŒ;ÓÊÆô*õe¼°Ò¾²ÃU­±RÍTâÇk-·8‹^š¡Õjó_¨i¬ƒŞßÔBµ^.ôî]`x\'´ÀûˆbQl-Óm4˜¨ÛhA\r&à¯sğš ÚáK»ÚÖ±f~7¨¤¶ˆ·[À’W!nÏßà äÏ;¿¨-…ôOØ†ƒ¥ÔĞ@Ä¥)FD{‰>°jñÿ\0ë0Çœ½\rªÊ¼ñ+ÿ\0@éà\"À²ç¬íîd\0DîŞ3Ÿrû\Zâ{@½¢Û#¸Ï\râç<š†@½Â8ë(!0§w0z¤[@Píãµ2‚ÆôbS¶ªM´¦ôÛÇ¶\Z!X,O$t&³ƒvOüû‰¶Æ>IH\"²[üb,ê?¸H4ßƒfæQ‰d‚ˆ©jK§¨q`¬Æ‘Š¸ ˜(ïL+Küû,|ÎgıÙg\"Ò }á`”B.pe¾TjZ5µç0€º·ÜG\'ZœXNöÃ¿²`ß)±>™üş\rÚ†]>´<SÃ<3Ç£n‰’ëwÄ…\0q%ÛU†ôãıüMÌ-\"Aîánû‹ˆÌ®^£Ä† n¡ç,m¬Èø6FQOrŠ`S_ät{¹`AŸÙÁÀ*ä¥Ûì¼¹W“#‘ì—ëT²Ê)`HÜM˜¦Wú1 `\Z6m)–Ši¾£â£ÒÆá	¡P4¦ñ3¬l‡«Úr`YBCÁÏòÇòìà1>c¯õ(ĞùéZ†Ã7şe‹ë(-ÅAe_ú’í›J;KƒL³Ö&\0€;¬)õpXj€¸„<ƒrVòñB|_÷0®—ºo<¡ÏEfÛìÁVŞC%ŒÕoÇP6N¢ÄÜ:D_‹–¨%×Cø˜ÓM›wÓä(”[MßÓ¸&ƒ²âüJ†eŒ§ciğJ‰®¥šj\0ÃŠÛ¸Ëiq°v&yr@[M£ì~5\\[¡æ—Oo\r¯r¯n,a¯oJ‚eÿ\0áGêK£Dê,^ ¹ ¼,(;u˜Ôí˜*$»Cæ_v‚ÖÜ^Kú©ey‡gøó(ëHšAŞÑTÁfÆ9€9ø©`E‡‡ÿ\0&Á(Üw‘rÙ ,ıqÊçly–ºÊOEw[Û™nşH¬òÌ—©È\09o³ù”\rŞË[0D-Õ¼t˜õK‚Xl\\]Âá÷«k^h•\0TUßSaUXœæÄXˆz%#î=t7±šû©¿w€şàTwå8ş#LâÖØïE³Ş<¾r™ èİ§³+;Ğ/3 °;N½Äq¡—†\0IZ#‚†½\\äÍ*–5é¸g~b€¢#³‹èâ*¤Ââ\Zğú{Túß—DøoÊªÁZ´…ĞW©d*ƒğ;ó	öj\\­†ü„¤9Š¹¹PO……&Şg¢fˆÿ\0;RÄy³Åó¤,ønJ\0`ƒCâÈ0œBT°é%0P@ó‡ˆ\"ÙdàBÙ^fé±6M‚(Ôîm4/¡£¿ ªŒÏİ¥Å<Z’=J+g>˜Ãög†Rm<ÂüJİ™G)æy[–Ø€‚6\n>\"•pÀµ>ÌÜ}—u< EÁ±L’û6÷9Vû‰U’ÂnåhYeş£Ù•ş\"­%w=ÅáW26^Lx‰ë%°^U‡wÜË‡ó,‹x.ı0e±\r->e˜ºU¨ê±~şâJ.‚ÿ\0rœ 89oßX›„/¥AC!wUGSÿÙ');
/*!40000 ALTER TABLE `test_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `title`
--

DROP TABLE IF EXISTS `title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `title` (
  `element_id` int(3) NOT NULL,
  `level` varchar(100) NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title`
--

LOCK TABLES `title` WRITE;
/*!40000 ALTER TABLE `title` DISABLE KEYS */;
INSERT INTO `title` VALUES (9,'1'),(11,'1'),(14,'1'),(16,'1');
/*!40000 ALTER TABLE `title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(3) NOT NULL,
  `session_group_id` int(3) DEFAULT NULL,
  `work_group_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'test','test','test','test@test.com','098f6bcd4621d373cade4e832627b4f6',2,1,NULL),(2,'admin','admin','admin','admin@admin.com','21232f297a57a5a743894a0e4a801fc3',1,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_group`
--

DROP TABLE IF EXISTS `work_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_group` (
  `work_group_id` int(3) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`work_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_group`
--

LOCK TABLES `work_group` WRITE;
/*!40000 ALTER TABLE `work_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `work_group` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-03 23:04:16
