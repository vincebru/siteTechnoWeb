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
INSERT INTO `image` VALUES (0,'150','150','image/jpeg','Resource id #4'),(15,'12','25','image/jpeg','����\0JFIF\0\0\0\0\0\0��\06Photoshop 3.0\08BIM\0\0\0\0\0g\0nruLqptjySRsn6p4VhFX\0��ICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ �\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0\0�-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0�\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0�\0\0\0gXYZ\0\0�\0\0\0bXYZ\0\0�\0\0\0rTRC\0\0�\0\0\0@gTRC\0\0�\0\0\0@bTRC\0\0�\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0��\0\0\0\0\0�-XYZ \0\0\0\0\0\0\0\03\0\0�XYZ \0\0\0\0\0\0o�\0\08�\0\0�XYZ \0\0\0\0\0\0b�\0\0��\0\0�XYZ \0\0\0\0\0\0$�\0\0�\0\0��curv\0\0\0\0\0\0\0\Z\0\0\0��c�k�?Q4!�)�2;�FQw]�kpz���|�i�}���0����\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(��\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((��\0\0��\0\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0\0�9�����T�ˡ��\rb�O����4oRǷ��t|��s�.Ϟ�����G��ܗE��y�8�f�wz��5wy:��ypRBE��@EP@E\r)P@EC�(�9����ܭ�r^�����W�؛�EN�M~��o���Zr�>���0z��sd~���j���;��G��Q[|4������cf0z�\0f;��(�+�z��3�F�Ry�{���C��~z��a\\�e)�E\08㕃S��s=/;���{��o|p\Z4m�ǳv�����<�C�_{5�f�u�9��z6����೸���^�G=j�����C+ۆ^��q$�|��nFQ:̬��gS�����:��\Z\r�|�=\Zo2�e�ܧ�y�@E@\"�D���@o`o`��4��}�֌������O=��=�Z=�L�]�K�:}nff���t��[��Q���\"$P����0�\rNCC�r\Z���!��jp\Z����P@E2�����..�N�/7�����oQ�I=���af�[8��}o���\r�����o//��<�C��DH�\"�J(�!��\"\0�\0(�����\"F���#�r�������V�M\\�Ij�Yv��3����zq�rr����Eso��u������F�xGgʧ�QDI\"�QH�!��	D�����\n����\"��HI S�L�����ۡ���y��]_F��9�~|[�D��u��_���/[�v8����b-o�u�	/�BADH�\"�R(jp(js\n�U}6lE���$o�CS��P@E\0�\nw*3�3��{]<�~_{�����ѻZ7G�R�|ܛ]��:�F�}�G?���y�A�C�QDI\"��\Z���\0!�Y��n��e��m�6���+�u��@E5P�wi��Чm�A<׫��.3Yv�6���o�&�R����f�5v$�Z�̋]��$�M��+f]=��aZ�Hͯ��3;������\Z��t�bJT˫�kB�+�h��	Y���!���\"�R�L�F�:v]<Lt�]���&�F���\n8��/�pr{�m�%�|Q㈎�0�P\\���2#)#��F�����8N�иN�~\'ɽ\"�a����S�ʲ��\0�58\r\0T�zv�W��/���5b�/9��ej��S��9��MM���!�k�kڿ�S[��s�Ήw���\r괫����u������󳉹�R��r�9�t�x��C[>b7F\"`��ҋ�-���08*CQCC���H��������u�nw�D]�nql���n�-��qt���o9�t}]\\�<�-3G9�	W\n�(.�ZD��734��B�\\�1�QO\"��fv��k����-j�W<yV��i��q�$a�`{F6@g���������W�>.����zO��1n�Wř�v\\w#����>�)!��		{I�A�Ko7��9���U���a���g����FBV���#/=G�ʚbh��l��X�O�1�	�m����6@F�\ZCN������\0I鸽^��MǗ�*�d����Z�_�����^�=�G��Ӛ����k�#^� x�^��<k���d�N/nx��u���^��)�;z��KA���*�e:��6+4,c�ɢq\\��f4ѩ�NkR	뷭�\\$��D\\���z�^q������ֵ���,8;�b��\\����5�$̣d�YE$Ң	,�T}�\nД�:�r���>�ZM�ǩ����b)M��c���\"����\n}�����[;z��F�����&�ӹM,8\'�%��<���ŦĖkY�&C43X�U���i�گ�f�I�6�$�HM$RBy���5yK3A$�K^TY����-iVqo>ÑJ̯������-K㍀eCTШ̼���l�+�~�d�\r�f d����\01\0\0\0\0\0\01! \"203#@$%AP4BC6��\0\0\0����d?�wm�*���*Ȝ\\�G�l�����̬���Ǭ۳X\'X�\0�e���]���sT�W�VE��9��k9/�Y���H{G�/N��)z-|g��F�!��=�Ĕ���(��b��ed^-��6�����mfg�:C�!���&���V��-V�:�������l�8ԭ��U��iV�g\";�q��s+��#+_$>j7a�R�f�w3�<z1\'����wU�6X5�x����J8�-IR�;���c���+��O_����\Z�l�/�Z����Ԋ��\n5p��<k����p���J@S�b�?M���(%闆�ѕ*�`���-X���¬z#�1��̯ª2��B�v�h�B��1�P�l2D�z]I}\'r?��8��\0S}Ql6���չ��f�Z�X���,�1�=o�\Zv�y�㳕�发2�qǳ��)�&F�?;c�[�W+�ʵ�w�T���_�a��,A��w-d>��������E%mO��}#y���nu���5��1#�e~���h<����Q�j�}#�uf}Cz��յm[Vյm[VյmZ-�jڶ��jڴ[TPyJS���d��.^;���#�zk+񬌍�U�@�5-)���ӫ\r��N�>ƋO^�kE��i�]:�̹d?�+L��Me8����U[�3�A�\n��Xqx����^�R�����~���q[����?�x�K[|B�6����<�,����ѩ<6-���(Ԟ3�(�����2�*M�\Z��K�m�+��_�߇V9\'�l�#R૽ø윖M�����~��*,����R	����wOɹ/�405���v����\0/$��7�y�ݯOe0��6ѭ���Z!��_�~L��]�\0X���Y�Y+\rO�A����onbz��c\'�/�M��~�@�x���T��tXƀ)Q�\r#��,o�3��4��C�7����in�퍙{�%.wn�F8X���~\\�?,�M\'�8�O\r%�W�!Ⱦ&������2�1F\'yRo����=����R�i�d?�o�?$P�G�/(=��R��\0@*���ڌ�����T�\'ܮ+�:�y�tD��ʿ��@W��Ĝŵy�����-ٶ;��\\=.�,Q�<�M��\"b���F�߿RB�p�䥉�֠S���<� �\'��W��8��T����۫Ъc��G�������|����(*��\\���?-��p�\"P�@~w���Q�v��@�V�s7���7��(��r��K��6ޯ���Gy���Y�-��W�b��E���6�}�p���C���AW|b#	]���m��ceZ��k��s�t���c-��2�ɠɣ�ؠg�e>�:p�;���(�̄\r8T%�,�U���SO�!�O�%m�2��(U+�3����z<�\0��c�xf��`Y��F,�d�\"�۳����i� ��0��ߧ�_\"�W�(?�,�ӵ��F��Y�lN�60��\0O�2�C�\0��\'�m�㜩�`Z6Z\"5:`&2X���\n������_9Ӗh���0�\0��w9f�Z�郈��>��6����Zn�W���L���r~N��G�E\0��8�q�[��<��W%1HbxgϾ߆�S��ZȊ��U��<���e�i�6S�d}�O��(�1���c`)	�y�+r�g^��nR�E�Q}g�&�eyMNZ@��bx�Б�N��5����(�$�p��8��dNG����p�l���o\r�E��h�Z-����C�i~�u�C��`��)j�1{�}�R�ŏu�m�V�nMI�ЅB�q9��̏�YM}u@KEv�%V�l�­r�_����/	\n.RΉ�I\'�p���Yh؄�3��jo�$5Qm캓\'RXv�(�$Y�7��.�Yt���3�QY6֔~��[u<���@\'�j�_�W��\Z�PπAo�;��H�\">����Ɉ#ݙa�\'hg����z��i������),;�UZҲ�w�r�59�x��JpA�<z�/��9Rݚҷh��3���ܵ\\6�\Z�)X�JG�]�7�m�׷l(�Lq�4�>�ooN#Qda�Ibz3��u.��gdc��钒�Ɠe���N���fl��\0\Z!��hy��\'x!|CĹ��1��:3�n��ϬZ=A�i�G�3w�G	u#�>�}ښ~�S	/�L�`B,ħdӏ�.��P�Q��r1\"!��R�C�\'��\r�oF��hЏ������dC-I�\0 s���:c��֗UPעX;1�q�]��-;m��\"B��� ε��4�%aۘ���>e��Z-�E��:��K윑���;mG�.�Y�h�tM_�7�>�.񱑔���%r�����\0��\0�F1��)xó��~�\rS\Z���Y��߆��\00�_���\r�ə3&�h��h&�h&\Z�a&`�Vy)��F]��f�� ��X\'m�ذ9Vb׌l\0p�enV���ka0Z�ь�÷����>D�K�<�O�2�:t�+�\00�|�\r�ɓ&tΙ֩�3�t�M%�nM5�OV���S�j�Q&�޷\'#�\"r\"��gt�t�ur�\\��Q�C�ב���\'ri\'�}���]��\02\0\0\0\0\0\0\0!1\"03A#2Q @qa�4C������\0?����%=o pp6Q�����TYDQ��K�bS��/�q�7?g�\r�r���gx�D�*1̴`MI���T_�X��hg��b��i#2J;�bGӲ�]�LwX�yn�\0�C�w>Ud�Y��ҵ~�I�����UA�g|�L���*�Z\"�f�Zϕ]/�kZ�Io�>�G�����|�w��NaPȱ3�o�C6���\'�K�4k���8�V���*���ʻ�F59���za��ѭ�8n��|I7���UF�XpԦ��TO����x�x��G1ѫ�66�`�WIV�TY/�Ln�D�F�b��(���j��Bzm�\rS�&�\n�Tz����F�}g\'f��s�wR�@�D�juQ�#�U&�N�<�V!2�dM�5\Z��Q�|�7*�b����(1j�\r��\0��q�ո�2rn��\0T�s��9��^!7���M���\"4��~�+�=�\"7�#k�ko	�.ׯ�׎�\0L��v�z�q]�N�3ܜ��V~��uZ�uM�c��[��3�EzI�A���(���M�`��\0��<i.Ѫà�F��T��#���c�_�hEp�r(SI��[U,&#b��Va�Տ�|����Qq�(pz�M�l�0�Q�]��\Z�`����e��;y\"-�)\"x�2[+#vn��7���ŧd�)uM��T\Z���P!�\n�����\\�A�e���\0)\0\0\0\0\0\0\0\0\01!02@A \"3a#q��\0?�ʕL�J�ɽ�+�-�B�^��w�O+g �S{W�K��S���S�Ċ��h�;H������Et��$VU�l���C�D�e�M7L\Z���eD��d;vO��}��>�M��c�oiC�6�[(,J�w%x����C�5���Dݫ�P�l��B�P�AL�T}�eѿl���H�nNuvrm�y(�H*p5�zDTQ:�g/|�@p�Ϳ���<P���E[l�Z�w�5�5;��kP�m�[{&�H\">��Q�\0\0|�_�)4�W�t�ܛ��A��_�~DyI��>q�C������|2>��}��7S��yr(q�����\nUk�k�e%��\0����N���j|[��lEq��D�r(�F�+տ�߫�ͷ̯Ex�?��\0=\0\0\0\0\0\0!1AQ \"2aq#0@B�3PRbr��ѱ�$4Ss�����\0\0\0?�jGa?���}Nе}��x~L;Z�O�vQz.Ӱ�m?\'KI<\"P��d�1HW*_�x�����~^u��w��**x�O�vd��e�l��=���_qn{8~6��f�3Q��oc����-��<t�Q�w�q��5Rw�Gc�\"t��ғ�h���X�^��*$�=��e�+.aEa������9[qϥ�%��f�3$ҐFp�Pj,6��~,���.*I�[�D\r��DX�7��I�U��K��l�F����/�X|<Y�o��>t�J��{d\r�X0�������N�e�%o�g�\n��,�u!M�3��a�,��{�8�j$����7`V�4Xd�ܫ{��J��4�L̚�M�����mYf��n�=��/:�&f�N5 ��Q/�֑āݟ.�*`��X@-q�������t�\nT미h�u]�is�ӑ\"������B�LF|�P9Q��7�G��SC,L�Na��&#�Ֆ)9��F3�4��d�_��i��_���I.3����+b޵�n��kΖ9�0��ђ���7:����B!T�f�40��ˠn�m)q)������XyaVQ&�zX�����U��H�8��9V׬N\"i#Yf���*��� ���e� Tf>���oS<�]d��S\0�x�!I]U�f�rŖI@ע�\nO^��1�Z�W�Ǘ/��1S�k4�Y���<�]��O^��o��-��:�{�)��={#dI��k�e����i\Z�׷o�(\n�4[�Վ�3�Wg~�U���?ztc����_f�8_>���5�S,J���(��W��Oa�\0�� �?-�8��(�����v�UfC�t(�;f��5��R����j�h�\\�[�N�����έx�XrW,���G�K��z��PA�ɫ����\r}�8���k�P��rLm�\Z1N�dEf�4���^��үD��\\Ӆ�qV<~%���%�HE}��lLJ�h�$R���W٪R	N}C�׍Lв��j�ʭK����e�$�JΊ2�[�M1\"ğ��JХym_^ȧ<��2��p���k3�<is�V��Z�z��AM�}{4%A��(�P������]M$���q�����M������7���J�f:塇ġB�k[0�Crd�ǗlE������A�Oa�}�ᯠ�aQC:�ص0�S~�:�{��پ`����.;��2�w��Z�^8⽃Hֽ}ب���)�������[��\0�`���&l�b,G��]��h\"��tզP·�f/4<E���/nm\\[�:e��J���F�t�Sg�3FIm��,V��l?�}�\"���^��_j�Mݘ{3ְ�w�����y����Ʌ��\\��e������լ��~�2�������f�yu���o.���/���G���~�^�L�����\\T�(�Fk\n\'��Q|\\E^�!z��g]�6C��ڕlE����[A܌r���s�w<[���o]�ױ߻\'Z��Ed����W�AΛ/��|6n7\Zd���<$k&\'/ֿ�����SKZ��i�Z��+(���Hb}k�Gֻ��hf��*�ǭo��b��/Y1Q��\Z�[���b�(�V����Hp���%��U�?��\0�G[�J�8��x�;��QN��.mh@9=i�KX~�cG<��X�z����ŵ����\'��K��q1�T\nRQ��IX�\Z��M<[����V٫��C,�ʠiSG�*�cRb`��lj6&wι�ƷQGi��хT�\Z_�Z��Z&���E��ˍk�^�Yׯg+����m�n�RnF٨5�S܌~�af�o���Z�l\r`x�ξ/*��\Zm����SH(�M��&\\޴��~T���6l����>�-k���e����/֗�+���q�w�&L��Ti��ۍY乬8�a7����J��w$P����A*��䔵#&\ZH�G��~���X�i�qʎ��N�f����A#��}[��\0Af�C�Van�V�\Zd<��[�X�N��\"=;׽���y�\nE�Tr��W�>#G�ϯ��~A}����P�37Jee��r���w]�(#6��dr�v��>�w\0��mz �\Zla�*.u�ە͗S��OjE�z*�F�����¤vQ�3f״گ\n��\r\"1����;\0�O��ҳ��W�+\'�A���[�l+{�b&��)��C�	���c1r�ĥF�µ�s��X�5��\0�O<�a�f�i�O�P<\nx�9xV/�P���5���B.�\n���BѬ�ofk*�\n���nn��*{���~:�6<�^X�e7S��u�?z�x���<����V��:E�*cu�\\{\r�a�8��a��\Zԛ��ݔ��C|���`)��K�K��LW��ojQ;����.n:^�sH\nq�����2���\n�VC��-��Vg�Q�o6Ðiҵ�k0��R��ֲ�}��i�_AY�2�\r������5��7�5�ق�\Z�[bD?����;�C�\0Ǝ��+���2��t���\Z�U�#L�Z������<TwlV�*�#A��0�O�=��Y$ t��I=M~���?���8�5���_xA{x�\0�}+/���f6$Q/��h���N�\rwA#�\Z��x�ց��a)};��i�s^��6��Z裀�v��r��:kV�ZP�|$p�@�����V�Rq�>YxTj��ҙ�/�$�n\nQ���M0Qǵ�{ֈh��kDj�\0������%�:����Mk���w���ʳ^�~��l��.�t�e{�8R�@h��w2��j�@O�W��\0%�ȗ�֜!7��]sg���y��o�\\{\'�޻G��Ga�{�\0?�J�C�Սwp���e\0*�\\;7�?ָzփ�������Uӆ��\01�\0�����p����ڼz�W��W��W��V����\0*\0\0\0\0\0!1AQa q����0�@P������\0\0\0?!�6ug`����DW��M}!�Qݽ#���ԭ�	��q�+��ӶD�ķ^�দJ���*Wۦ���R��k2`��L���ex�\0��$f�M��^�p�!bpjf�o=�6���s��|/ۯ_�,Xg�?IA=�>�(�hpWϮ��Pm�/b�;\n�\\���Q��*4���6���m�[Cy�L�m��#_�;n+_�D˭+�<������\\�e@���-(�L�-�����%��Lź�\"z�$��[�1���/h�!X$����>�B�����(��ꃼ&�>�~����\\-i}�M�S$��䫧���d��B�Hm7�؂p�wu��}^\\���1:-3}��φ�i@U�3\\�S��Χ�t�PJ�$�6�M�e�|cg�����\0���̺�7��\\ô_9�g���/�1g�[[�9>bJ�*+{\0��T�C�*Y����fV\"�Pw�]�W2�AQ}�N:�;Mb�����,�-c�ۼ1[��0�\0�c�M����������R�\0�u�ek�\0�/An\"�w8�>���ɖ���%�I2 �����X\n�J�ݯ�1���K�N��YtW�f-	��/�tf���� J;𳇳��X�hq�t��t��}�|:�z���d<}@a��Ā���pᲟP��Q��w�[C�i��u�)!��Q���v���ˈ�\0WR�J�*\'EJ�*T�R�zB��Y�����0���%�q��c��t#���@�S\"�\0����������:a�ceJ��)^��sd �\'��3��r]�{ͪ��\0O�g��ن�4��������A{���0~�ܹ��0[/q~H�r�聈K�zN�J��L/�S�)��ت�%*��$B(x�M\0�qtմ���C�)m�q�nK��7LwY���G���\0Q�Kw^�/W8����&��l�N?B��,�0%��E\0ۂ#�ga��uD\"���\'��t�a��=����l��F�n�l�D\0�?ڶ�S5���0yG�t*��O�Q���\0����v�Z�.����>�\0���\r�Q\\&���K�t�%��~i��ĥ�`��zF�� ���*IH<�\0����,f˄	��BW��f����z@3H�V��A�X�J:��,�=ࠝ��5)���{�!��\0\n����>���^\'h@-����D>�����+�|pD�����X��hf(��?�Rk��o�=Uա���������/�=l�ߏ�Y��\'��?�nE���᷇Lՙ_�&\n�\'q�y=��W�]�UUW*�EHSgT���][���~�P�W�L#X�/i|nǽ�k�w��������+�@k�`�r��Uܕ*T�]�՛��\"{��^�{�nJ�nf�a��,FB)��������\0s�x�K�]�nT�\\3�N��3ޮ������B�E��v$\ZT�)ֿ���(M�e��߄��\Zu�U�Ӄw��#\r���v�ÿJ�T(�Ǉ�\r�P��eL)a���8%�R�܆�O���u���\0�hV������?���[f�]]<��U�!�o���CfM��MDV�Zp�t:W(����`���֥z1cu{���g��N�D�;K���\0	�g��s؂nI,}�,�nK�t{��R�u�S��>�p�f���Q0�\0�X��Ҙ��G�h��&\r$����\ri�C��%w�	]�W�0W��q`%��Ե!8���vf���b�]�Yeʊvv�4���<��}[th!Z��2�6ܯ�e(������v��6����h]�}�E�k�|��/]�i��(��O�h9�ۇ,\0�o�Kc��Q�\Z���]E�W�2�Gow��\\����l.)�x�ƀ�΂	�:u�9��l�\Z~�43 ��D����r\"�h^%nT��Y+�J��QOTOi��UGz/FX >	{t�Su2>�����	���۫i��/������T᎖i=�=4K����K0@=�\0�߾�d�񌥭Q��|G���%Z�8/4�~	8��n{���9�x_P��=�X�0{%���X�y��qQ�����)�s�����x�#4C�j+_%��T\"�l8�*	�&�4��	5]�9�L�����U5�yYe-[m��@�=�S_Ťۨ\r�PO%��Fv��ޝ3�������\Z,��*���^�@%��)�W��hҽ�^ \r�J�u�?���c+~��Q)m>b\n������;G��$��]�J�*THǮ�n�}���0T|�sj�fbz4��X��cVi`b	������\0�7����Fk�C�v�������8R(�EN\'H�C����6�{�=�2�i�\n��\\8�\0�R�J�,���r�K&2��g�fTn�\\E&��6���9eJ�\"��Q%tc*2���O�G@��A�SOi���ڙ]TV����������L#W��BZ�ab�|.���u�n\'o���ߑr�;�\0�|�>�	 E�D����MR*群ʠQ���e���[����T�R�D�5�,��r�\0S��;���S��}����̭� ���D���WF�O�z�(���\n��,**I�]��\0}���\\�}�\0:��wH����k-~Ъ�Q\0��._�=�˗�Te���\"i�/ur���1��L���*�*_a�\0CH� +߄�22��\0���١�f��R3X�1e.�R�1�M�o�ώ�pi���R���\0/�{XNBJ����gM������R�! @�:*T�6�0Ԣ)�ILB�dB���8B�Ĩx@׉b�A�T���\n�>��R\0�bع���ÿJ��w�h�����ŗ8�v1V)Q� \0+ϡ����\\��i����7�G?g�B� A@@�*��L�4�/��vY���Y\nP�:�T4[�Tj�r\0x��j�.�zZ��:��b��(hT��j�\0�QzƑ����y�huQ�J���p+���L�\0�7����r�KO�}\rb�]�Ԅ! �� ���w,�脂[9��v����8e�*�!|n(U�Ͱ+p��ٔ����`�۞��\0�^������js)�N�V��2�`r�ӡ�\"E,NH(T�R�$k\Z2�Иo+�2C�8C�>Ϡt\0��<0 ���i}G�L�j[�BP����c�\Z�%�ks��)�U\Z+|Gb����X�Ʋ?�k����/���,|���Knhk3�v����F|A]�K�\n�S�a\\TzB��\rI��]e�ߤ�3OG ����(�1	���_Jr�����_�����=��S��\"n�q]�K�	*]bV���v0Ɖea~K��U���NZI�A\"�5#<c�R��Q�XQPnO��\0\0\0\0\0���E&b�$�%�;��z+� ��e�zhF�c�&���@�B2�f�3Ĭ��1f�\n��f����\r��-v��4��冊\"��������)�\\�)�\"�Yh��/����.�8b<G�R�.���)�jx/��れ�}���c�Ye�j�!�H�ﾸ�0����(h�X��y%.���Q�غD�,��I��!��x�;m�����;U.;�\"��\"��Ǖ㞋g�\"�F�\0�Βq��y��fQ���j!��~J/�H+�k7�\0\nʳE��j�b>�\0���.���f�ȝ�i+��됔c�J�\nm��6�)�Zȇ�\n.���\0?	G�xm���í�5�.���u��}U;m<[��U��`T#e�\n`���\0(\0\0\0\0\0\0\0\0!1A0Qaq��� @�������\0?�\r�]��₃���d��i���}i���v[u���b�o\n�LY�R<K�4ݧ��a��X���\0~ҤG�����=�1;�P��B<���]�(%h`������t�,`	��w���g]{|�(:�|@c��u�ټLn��b�Iؗ��b��فG�d͟]�\0�j��=v���|Jg�Rmo���w�;�D�<�)�I�/\0A��E^3��M�~�\0r��7��>yamGJBQ�y\"\0�ox\0����9H�,�z�~&_�o�!�A˗�|�~��T����^����)�y�Y,i7���;���?��/c�UdG�Uh���Ip�ɩ�����,�\Z�?�{���c��ѷG�(�:�ޙq��X6��i�˯��+k�r��ox�9�I��$-f�?n���fTjTW�٣��C�[�7]ro��&6/OO��p�}_��bR���aD0X�˟�LAQd��=*<�f�m��K�v�z䊹K:�k�x�;N�/̯��.�&䡛�SX��\"��^zU�{E��fv��l�8@���=I^�h���uP���Ȩ�b��>8>���|��@k4F�.!�<��l�bkU�U��(�\nUu1������Ms����^S-4�����������\0\'\0\0\0\0\0\0\0\0\0\0!1 0AQaq�@������\0?&�\nۻ�X��۰�	�Kr4���,��}�ܐ���!B�-��/q�$X/G\"��)KƗ��-�KC�5�8�U\r��R�d�r�H�>e�����uqB��XQ``��N3����Ey4\Z�0R�C�1+�ZN��*�Mv!142�V��ͣ}64���>SQ���P�*刄\'$���P��T�hi�jk��U��t�\Z1�\rL�_�&�|��킂�5�N��>�R!����1���\'yܧ�.-V�Ԍ+���W؎k���]F6>�sz�\0���xa���.~b������wЫ���(Bc��;j� ��k�8�_\nx \'��\'\Z��j�Nc�\Z�X\"3H�L�U�	P�g��n�z��^z}�\r5r�eu��B���-j ��o�S�|��b�b�\r~�둓��FڄW����\0(\0\0\0\0\0\0!1AQaq�� ������0���\0\0\0?�t�p���v��훴��~�U|e�<A~�b>t�3��)/3�!RhZ�DB����}@�ʴ�+�R��PJ��?��j\r�\'�8�t�)�� \'q?�u2Or�	`\"���SY+��� @9��\n%��h�|X�ɀf���W�Zҥ~�T��R�D�R�h�R�CC�X�@kc1ln�`�mp#����\Z�HV.��v���!�o}���2���|\"�����}���$�.�שTv�F��?�A�2�p�|�mF�S4�O|�ѭkz.,�S���*l���bze%%{��RW��(m����-(�z��u{���K%�o�\r��a�*Gl`)K�ur�Me�v���R�YX`�ˋ�l;9Nbr�S��5b�q�c�wg�	��q��1_�*_��I��@��KRx���� ݂n�k����[ִU*00���6\0��	��\rս�\Z�T�hW,�p����d��WJV����wm�&b��P�]�	�\\_���Fz%�0��Z��f�R��\n�{�B�Ņ�[p ��gL�\"(�Yp)W6.e�*��`��[�XM�����J��w�Ke��\r\no*)\0\\ĺ��� ������\nŬ��F�7+�c0	T3��7ǉSEK��k�Z,CN��?:Yef�`�OL��h�P<�s�[`A�;�5�a1e��r�I5��9�U���̥vE�3�_�x4��,����`��b��Vdxj��p�*�h�S�����hq,E�T5�-��A�^f���ț�À���?(ǜ�N�9��l�������Ap6��e�η��8h³��V�G��A.鱶����yVxm��.7�s-E\Z��x\\��V��8�I��lٓ#}J�,�H��0�y�!)Fق�!l�ba�#,E�\'!P�X�Y��B�&0%_a���+�\0��E[�����������](�nW-�[���P��LKe�K0�X�����\r��孨-�}�;�,YD�o�{���v0��$I�1s�����ZUV}Cy|�L�J�j���rXU��R1]ͥ\"�~\'�?�K�g��@<a�\r?I����x%z��|%\'��H�G�\n���k��e��N`ط2���-!X1���7�p8y�D4q���\Z\0�(#��-��#t��q�L�t��-��j�ܿ6i1h��[w��b�\0�Ԩ߉^�ez���M �<�zO=Q:k)ԫ���+ĩ]�R�`���tߛ��A�\\� l��6�߯���31A�]�4���>��<���)���!V�W�43�\\\n�	R�W�R�iR���T�ZT�R�J�*V�K���f��`��ig��A��հF칰��~���\n�[�J(�a͟ ����E��h��U���k�J��jT�R�J��J��h�T�R�J�*T���W�MȷZ;��煕@x�_�M0�Rp9��J��u��\"ш��*�Ñ�z?�R�3¸e���9�A��PK������t<��~\n�Е�~5�iR�iZV�r�V�r�\\�nSr+/�g��\Z��t*Y��o	rj��Q�H�[U_v5n{�_�\0��\0EI��C�\\��_�U�c7{���=������Y�2��E>�^#\rocށzV�+Z�*T�Z֕�֕�Tt��\0n���w�gzP���ؿ��:\n��/�Z�U��0�O�\nn+r����Z��G�D��|���7h3�?ф J�ҥiP.iZT�R���g�ՠ�Ϫ-r�V�lʕ+�ZT�+Z����r��)��te�2mց蕼hs�@�0�\"+Hf{��R�X\"�$E+k�`����z�����I�&�	��=�Ag\"\n+J�\r�F��J��J�*K-\\������(�?�_�ըwo�T٪�J�R�J�*T�R�J�7��-�Mح+�Q�t/#��Y�q�Vc+G%ٳ�2��jJ@ݽ@. ����H�f��c�?����F��D&Z\Z�X]_qg4�\r@��J�*T����N�A~rƠ���#8!7d���$�e\\q�V�*T�R�JҠ����7�R�Σ�߫!�eO�)=��ԫ՜���}�_D�i�|%][F�c������,,Pn�^H~\0Ά��JҴ�T���2�?��-#�8��6��vg��c5�����Q5�R�J���ܛf���q��_����;\n��E^�b�b�B�e�/���4�^;�\0�&6�?ܹ\'\"�!��@��\Z��@J%�D��$���36�i�^�:Fp�C~���q�3\n�;��*T�D��EJek�qo7�ؿ�����@E~��Q�·�y����Q_M<��P9;[�P�_8{���\"\"P�;��3&��ͻ0�Ҕrۨ���HR�U����{D�/��	,�/�������t*y�����\nf�Q\n[�����J��]��e��)�e��A�GIl�8��k�+��r/��\rV��.������lsU\"�C��Q��Cq8g�$�ZV��i�7\"�X��bO�}��#�S��Z�X\\](�vV��Soo�6~�*�G.��S�n_�$�r�����G.̃�9\'��*�5[.[��D%V�x�`2x���Ç��aErVz��V�1�f�Q�7��~n;�nӐ�%��\0aAg	ye:*T���c�~�\n:K����%�)~�c���R�r����	�Q�TZQ�#g�x�\n��د_)�v�Ξ�w*V��Q5�)��ͩO���{h�*?����1[��mUO|�(�����l_��\0(#Х��Q�9b��ql`a�V����p�3���A�R��:!�Sb%�@��^%x��>��� ��W�rV9�¹�_1s�CT��+����	�o+�ܫ0?�\0Z��ᫀczs���p�X/���j���|�*a��_�\n-�z�����ϗE��~�ףI�lF�����@CC)̯�o�C{��?ut���6�}T���l4ӓ�XP�}��\Zm��6\'�����,lG����*(͇�%}��\'7�>.;�i��ڑ3�-���=&	�>�\n����_�28q�8<]e��k��y�Ӻ�Veh�Tu��c��$j��Igy>`�$��*��O�Y���K���k��Ab.\n@>�9:\n�uݟ���|�(U�����`�%EE�F�N!dC�`\0����z���2�!`�G4#�\09��\0��$U�BE)Y�Z��˳(�W!��Z�4�j�(��,\Z\"�_s0��e�wa��ۦW�n9�%U��V@�p\r�R�(N�rB�ݣ$�ʷ�,}e}׼��h������P\r��N�iL\ne�p��r��%�!Km����0!�m]3~�`Q�tK�����*#�����2���(<{x��j����kZ�����b�> *�l�k��ѳ�1 Z�+�\0�c��^;䇚��L]�l-�+D��^��ix�x���\"�J���()~�:���x�շ�8��u���Y���^�w�՘\ra|w�IZƺsp<P#O��S�v=���[Lm]QMVڴ?\\�.D���8dB�7hc%�K\r���k�	E�q��Ȫ�m>���hKtL����[-�.L%����x�/.��.t+e�������b�W�/�!Y�n^������pB�iϺ��q�S*Uj�.\'zb����:ʴ@t�>���Jeߩg\"xA�x�\02̜����z�u2ޫw�#(�Q[���e��E^���:��bbP�N@�A:0| �D�����\"�}M�?��R���7��y��r��\0HX�d�V��-(��ɩd��j���ip=�~\"���F��ǩ���~c,0�\"A��NP�|ޟ���T.U���$\'���̪6��!�ч�({�7��ނ6r��8�}�P_ܛ�R���e\n���j����i�b�\'��Ej��7�l{���ٍ0�$���F�0���t\ZK��e��/�I�$¨9ٷp���b�9-ǲ`\0{h���Y�&�=T\n�����O��x����Z�p��.��:�2�A�� �#FT�=�v����h\"\Zz�\nڦcd�\0�{gC(w{���1@ø�X���Ak��?���1ey��ܽ�=- d�4X#uj�0�\Z�P\n�ӭ�����b����?V\Z�\nj�r��V���~�p\r����\0�4�k��*TE6�E�e����ʋ���	Y����;����*�e��Ҿ��U��R�T��k-�8�^���j�_�i�����B�^.��]`x\'����bQl-�m4���h�A\r&�s�� ��K�ڏֱf~7�����[��W!n��� ��;��-��O؆����@ĥ)FD{�>�j��\0�0ǜ�\r�ʼ�+�\0@��\"������d\0D��3�r�\Z�{@���#��\r��<��@��8�(!�0�w0z�[@P���2���bS��M����Ƕ\Z!X,O$t&��vO�����>IH\"�[�b,�?�H4���f�Q�d���jK��q`�Ƒ�� �(�L+K��,|�g���g\"Ҡ}�`�B.pe�TjZ5��0����G\'Z�XN�ÿ�`�)�>���\r��]>�<S�<3ǣn���w��\0q%�U�����M�-\"A��n���̮^�Ć n���,m���6��FQOr�`S_�t{�`A����*����W�#���T��)`H�M��W�1 `\Z6m)���i������	�P4��3�l���r`YBC�������1>c��(���Z��7�e��(-�Ae_���J;K�L��&\0�;�)�pXj���<�rV��B|_�0���o<��Ef���V�C%��o�P6N���:D_���%�C��ӁM�w��(�[M��Ӹ&����J�e��ci�J����j\0Ê۸�iq�v&yr@[M��~5\\[���Oo�\r�r�n,a�oJ�e�\0�G�K�D�,^�� �,(;u���*$�C�_v���^K���ey�g��(��H�A��T�f�9�9��`E���\0&�(ܐw�r� ,�q���ly���OEw[ۙn�H���̗��\09o���\r��[0D-ռt��K�Xl\\]����k^h�\0TU�SaUX���X�z%#�=t7�����w���Tw�8�#L����E��<�r�� �ݧ��+;�/3��;N��q���\0IZ#���\\��*�5�g~�b��#����*���\Z���{T���D�oʪ�Z���W�d*��;�	�j\\�����9���PO��&�g�f��\0;R�y����,�nJ\0`�C��0�BT��%0P@�\"�d�B�^f�6M�(��m4/�������ݥ�<Z��=J+g>���g�Rm<��JݙG)�y�[����6\n>\"�p��>��}�u<�E��L��6�9V��U���n�hYe�����\"�%w=��W26^Lx��%�^U�w�ˇ�,�x.�0e�\r->e��U��~��J.��\0r� 89o�X��/�AC!wUGS��');
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
INSERT INTO `test_image` VALUES (4,'application/pdf','%PDF-1.4\n%äüöß\n2 0 obj\n<</Length 3 0 R/Filter/FlateDecode>>\nstream\nx�]�A\n�0���⯻H�$� .���ڊT�u��Mh� ���?o*�� \'�rʠ�ZU/r���Tc\'���]�K����O�U�,^N��o�hK��|�,��>��횚�-�&ܤ��c��i_���KVj�|< �G��<��\'\Z�\0�X3B\nendstream\nendobj\n\n3 0 obj\n158\nendobj\n\n4 0 obj\n<</Type/XObject\n/Subtype/Form\n/BBox[ -112 420 708 420.1 ]\n/Group<</S/Transparency/CS/DeviceRGB/K true>>\n/Length 8\n/Filter/FlateDecode\n>>\nstream\nx�\0\0\0\0\nendstream\nendobj\n\n5 0 obj\n<</CA 0.5\n   /ca 0.5\n>>\nendobj\n\n7 0 obj\n<</Length 8 0 R/Filter/FlateDecode/Length1 2380>>\nstream\nx��U}LUe���\\�^��̄����)��j�L���bk3r����kWXؘ�[i-����b��YmդRsM#1G�r����M)��Ž��w�s�p1����������}����&T�\r0�RR��.q��k�J--߰��y����zʂ��Ǘ?�������/��x�_��UVQS���Z�m���$P����3ȧUꪗ�*��9|�+��?~\"������5 ���s*���M*��\r�����v�il�t\"\rY:A���ѫ��W0�A�-�aɐa�e��(�sD�2����i|c��hsu/��r\n7�n�d@~�=f�|/�-z�W��\0�_�!Gbn�؉ti�dk}0�X��Ȕ�W� �u���s�?Ő���\\ðdFc8�Z.C���N�a�@��Ġ%�a��a�c�@�:{>A�rlF�q�J=�:r׿�5[�弄%��~J����Ag��\n�Y���Ђ��E��Fe�R&u.A��we�v�Q�fM���tP�18ʅ8�w�`��\nX��\'����Q��)�S� ��ǲJ�u��gF��v�A�g�([������^(�r�vi�qG:����ЉBr�TN�tK�Ϋa��LL�I=2�kˆހ���\r�#����Ym��T��<\'��E��N��j�=rP��)��TEͲ�Xg��ec<JۯH�q3�j���My��]\"�dt)5F�1:<q��nW���K�<ͤ.�����z܇H����#լsu��&,$���J=d�;�Ui�\'�ĿD�]Ɵ��|�L\"�]�m����t!i��������,��OrT���fn�0C~̑cr)8��h��]o�]>BX@.�&�P��9C\r0s�1���OTӰ��uL����F�_�|hJfD��d���~D�X���?ށ{��=v�ƛ�m�tϻAڤM�\rx{�����0Aa\\��؏e���`�X��✴2���?� �b��j\"R�-rN^�i�2���${X�\"���!��!�X�r����I���	x�E��\n`�|�&Hw�q�g��W%�3Ӌ�<\\�uR�:OJ\'I���>��{\\3|����%a���R\"f\Z�$�+������\Zt�4U��.c����K[�!�ɿ�R&��b��O�o�C�1ɥMR׸��t�}�<>��|Ҋ��8F�yȥM�_�˫*��y�s�����P�0��\"ؕ%��rT���9�G�(����\\�u����_�����_\nendstream\nendobj\n\n8 0 obj\n1210\nendobj\n\n9 0 obj\n<</Type/FontDescriptor/FontName/BAAAAA+tipografia#20barcelona#202013\n/Flags 5\n/FontBBox[-14 -154 404 699]/ItalicAngle 0\n/Ascent 699\n/Descent -154\n/CapHeight 699\n/StemV 80\n/FontFile2 7 0 R\n>>\nendobj\n\n10 0 obj\n<</Length 258/Filter/FlateDecode>>\nstream\nx�]��j� ��>���b�$�6� �Y�B�>�ѓT������˴�.��\\�s#]����1�Ǔ���j6\'\0�0+��K%��J�X�E$h�}���z2m��{������$�w��:	N�>�!��f��S��0�:�ܾ�HR{���� �K��-�2�EE	���3��R��˅!��_�Ɋq_܅�\"dRz*X�2s��\\G>%���u�?F���*�C�*�i2����)NO��!�sa�tϴV\\Hi�=�56���5�}�\nendstream\nendobj\n\n11 0 obj\n<</Type/Font/Subtype/TrueType/BaseFont/BAAAAA+tipografia#20barcelona#202013\n/FirstChar 0\n/LastChar 8\n/Widths[1000 331 308 303 384 119 362 254 332 ]\n/FontDescriptor 9 0 R\n/ToUnicode 10 0 R\n>>\nendobj\n\n12 0 obj\n<</F1 11 0 R\n>>\nendobj\n\n13 0 obj\n<</Font 12 0 R\n/XObject<</Tr4 4 0 R>>\n/ExtGState<</EGS5 5 0 R>>\n/ProcSet[/PDF/Text/ImageC/ImageI/ImageB]\n>>\nendobj\n\n1 0 obj\n<</Type/Page/Parent 6 0 R/Resources 13 0 R/MediaBox[0 0 595 842]/Group<</S/Transparency/CS/DeviceRGB/I true>>/Contents 2 0 R>>\nendobj\n\n14 0 obj\n<</Count 1/First 15 0 R/Last 15 0 R\n>>\nendobj\n\n15 0 obj\n<</Count 0/Title<FEFF0053006C00690064006500200031>\n/Dest[1 0 R/XYZ 0 842 0]/Parent 14 0 R>>\nendobj\n\n6 0 obj\n<</Type/Pages\n/Resources 13 0 R\n/MediaBox[ 0 0 595 842 ]\n/Kids[ 1 0 R ]\n/Count 1>>\nendobj\n\n16 0 obj\n<</Type/Catalog/Pages 6 0 R\n/OpenAction[1 0 R /XYZ null null 0]\n/Outlines 14 0 R\n>>\nendobj\n\n17 0 obj\n<</Creator<FEFF0044007200610077>\n/Producer<FEFF004C0069006200720065004F0066006600690063006500200034002E0032>\n/CreationDate(D:20141220185900+01\'00\')>>\nendobj\n\nxref\n0 18\n0000000000 65535 f \n0000002703 00000 n \n0000000019 00000 n \n0000000248 00000 n \n0000000268 00000 n \n0000000447 00000 n \n0000003011 00000 n \n0000000487 00000 n \n0000001781 00000 n \n0000001802 00000 n \n0000002009 00000 n \n0000002337 00000 n \n0000002545 00000 n \n0000002578 00000 n \n0000002846 00000 n \n0000002902 00000 n \n0000003110 00000 n \n0000003211 00000 n \ntrailer\n<</Size 18/Root 16 0 R\n/Info 17 0 R\n/ID [ <0D7383C875B64953C6C2D73833E431EA>\n<0D7383C875B64953C6C2D73833E431EA> ]\n/DocChecksum /5F3D250D4DFE1575C2055C65A43A84EB\n>>\nstartxref\n3378\n%%EOF\n'),(5,'application/pdf','%PDF-1.4\n%äüöß\n2 0 obj\n<</Length 3 0 R/Filter/FlateDecode>>\nstream\nx�]�A\n�0���⯻H�$� .���ڊT�u��Mh� ���?o*�� \'�rʠ�ZU/r���Tc\'���]�K����O�U�,^N��o�hK��|�,��>��횚�-�&ܤ��c��i_���KVj�|< �G��<��\'\Z�\0�X3B\nendstream\nendobj\n\n3 0 obj\n158\nendobj\n\n4 0 obj\n<</Type/XObject\n/Subtype/Form\n/BBox[ -112 420 708 420.1 ]\n/Group<</S/Transparency/CS/DeviceRGB/K true>>\n/Length 8\n/Filter/FlateDecode\n>>\nstream\nx�\0\0\0\0\nendstream\nendobj\n\n5 0 obj\n<</CA 0.5\n   /ca 0.5\n>>\nendobj\n\n7 0 obj\n<</Length 8 0 R/Filter/FlateDecode/Length1 2380>>\nstream\nx��U}LUe���\\�^��̄����)��j�L���bk3r����kWXؘ�[i-����b��YmդRsM#1G�r����M)��Ž��w�s�p1����������}����&T�\r0�RR��.q��k�J--߰��y����zʂ��Ǘ?�������/��x�_��UVQS���Z�m���$P����3ȧUꪗ�*��9|�+��?~\"������5 ���s*���M*��\r�����v�il�t\"\rY:A���ѫ��W0�A�-�aɐa�e��(�sD�2����i|c��hsu/��r\n7�n�d@~�=f�|/�-z�W��\0�_�!Gbn�؉ti�dk}0�X��Ȕ�W� �u���s�?Ő���\\ðdFc8�Z.C���N�a�@��Ġ%�a��a�c�@�:{>A�rlF�q�J=�:r׿�5[�弄%��~J����Ag��\n�Y���Ђ��E��Fe�R&u.A��we�v�Q�fM���tP�18ʅ8�w�`��\nX��\'����Q��)�S� ��ǲJ�u��gF��v�A�g�([������^(�r�vi�qG:����ЉBr�TN�tK�Ϋa��LL�I=2�kˆހ���\r�#����Ym��T��<\'��E��N��j�=rP��)��TEͲ�Xg��ec<JۯH�q3�j���My��]\"�dt)5F�1:<q��nW���K�<ͤ.�����z܇H����#լsu��&,$���J=d�;�Ui�\'�ĿD�]Ɵ��|�L\"�]�m����t!i��������,��OrT���fn�0C~̑cr)8��h��]o�]>BX@.�&�P��9C\r0s�1���OTӰ��uL����F�_�|hJfD��d���~D�X���?ށ{��=v�ƛ�m�tϻAڤM�\rx{�����0Aa\\��؏e���`�X��✴2���?� �b��j\"R�-rN^�i�2���${X�\"���!��!�X�r����I���	x�E��\n`�|�&Hw�q�g��W%�3Ӌ�<\\�uR�:OJ\'I���>��{\\3|����%a���R\"f\Z�$�+������\Zt�4U��.c����K[�!�ɿ�R&��b��O�o�C�1ɥMR׸��t�}�<>��|Ҋ��8F�yȥM�_�˫*��y�s�����P�0��\"ؕ%��rT���9�G�(����\\�u����_�����_\nendstream\nendobj\n\n8 0 obj\n1210\nendobj\n\n9 0 obj\n<</Type/FontDescriptor/FontName/BAAAAA+tipografia#20barcelona#202013\n/Flags 5\n/FontBBox[-14 -154 404 699]/ItalicAngle 0\n/Ascent 699\n/Descent -154\n/CapHeight 699\n/StemV 80\n/FontFile2 7 0 R\n>>\nendobj\n\n10 0 obj\n<</Length 258/Filter/FlateDecode>>\nstream\nx�]��j� ��>���b�$�6� �Y�B�>�ѓT������˴�.��\\�s#]����1�Ǔ���j6\'\0�0+��K%��J�X�E$h�}���z2m��{������$�w��:	N�>�!��f��S��0�:�ܾ�HR{���� �K��-�2�EE	���3��R��˅!��_�Ɋq_܅�\"dRz*X�2s��\\G>%���u�?F���*�C�*�i2����)NO��!�sa�tϴV\\Hi�=�56���5�}�\nendstream\nendobj\n\n11 0 obj\n<</Type/Font/Subtype/TrueType/BaseFont/BAAAAA+tipografia#20barcelona#202013\n/FirstChar 0\n/LastChar 8\n/Widths[1000 331 308 303 384 119 362 254 332 ]\n/FontDescriptor 9 0 R\n/ToUnicode 10 0 R\n>>\nendobj\n\n12 0 obj\n<</F1 11 0 R\n>>\nendobj\n\n13 0 obj\n<</Font 12 0 R\n/XObject<</Tr4 4 0 R>>\n/ExtGState<</EGS5 5 0 R>>\n/ProcSet[/PDF/Text/ImageC/ImageI/ImageB]\n>>\nendobj\n\n1 0 obj\n<</Type/Page/Parent 6 0 R/Resources 13 0 R/MediaBox[0 0 595 842]/Group<</S/Transparency/CS/DeviceRGB/I true>>/Contents 2 0 R>>\nendobj\n\n14 0 obj\n<</Count 1/First 15 0 R/Last 15 0 R\n>>\nendobj\n\n15 0 obj\n<</Count 0/Title<FEFF0053006C00690064006500200031>\n/Dest[1 0 R/XYZ 0 842 0]/Parent 14 0 R>>\nendobj\n\n6 0 obj\n<</Type/Pages\n/Resources 13 0 R\n/MediaBox[ 0 0 595 842 ]\n/Kids[ 1 0 R ]\n/Count 1>>\nendobj\n\n16 0 obj\n<</Type/Catalog/Pages 6 0 R\n/OpenAction[1 0 R /XYZ null null 0]\n/Outlines 14 0 R\n>>\nendobj\n\n17 0 obj\n<</Creator<FEFF0044007200610077>\n/Producer<FEFF004C0069006200720065004F0066006600690063006500200034002E0032>\n/CreationDate(D:20141220185900+01\'00\')>>\nendobj\n\nxref\n0 18\n0000000000 65535 f \n0000002703 00000 n \n0000000019 00000 n \n0000000248 00000 n \n0000000268 00000 n \n0000000447 00000 n \n0000003011 00000 n \n0000000487 00000 n \n0000001781 00000 n \n0000001802 00000 n \n0000002009 00000 n \n0000002337 00000 n \n0000002545 00000 n \n0000002578 00000 n \n0000002846 00000 n \n0000002902 00000 n \n0000003110 00000 n \n0000003211 00000 n \ntrailer\n<</Size 18/Root 16 0 R\n/Info 17 0 R\n/ID [ <0D7383C875B64953C6C2D73833E431EA>\n<0D7383C875B64953C6C2D73833E431EA> ]\n/DocChecksum /5F3D250D4DFE1575C2055C65A43A84EB\n>>\nstartxref\n3378\n%%EOF\n'),(6,'application/vnd.oasis.opendocument.graphics','PK\0\0\0\0(��E�.�+\0\0\0+\0\0\0\0\0\0mimetypeapplication/vnd.oasis.opendocument.graphicsPK\0\0\0\0(��E��q+\0\0\0\0\0\0\0Thumbnails/thumbnail.png�PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0�\0\0\0\0\0\0zA��\0\0�IDATx��	�$Uuƿ��af�t ;BX�#;�9�b\"�#F�$BX2j$ 8̠	����aQ�\0!2���,3�w��w�}�uW��^���w����U�{_�w�{�^U�8�adP�	���a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�(�>b ⷼr5ҿQ�Un{�6�&t�({m:Md��.hv�Q{�YP��?7�\\\"�X�?��qÎ�d�4k�]�/$Wl5/�X\Z�/�4���^=�I./�U=z��.Cׇ��*K��*?��ą�f����߷̏K6��Q����K��&-�R�.\rT����x5�BFF\"�Շ_�ə�\0n~,�M��G�����x`�؛�ׁ?U���1��?\0��V{�$��\"�?����\\�88O�R������y`=`.�v�����\'�丷?�$���\ZX���N��>�}q$�*�7���\rpp6�&y�3�-��bx�>)?q1���啦�C\'�6~��x�ד�_\0��j\np3�#=�|���F͒���B~O��]���S�����FH\"õ��鷀9�$�M7�P$W�n~�^}h]^kV�H�Ȫ�8JZ�\r�Qһ�/����\n\r��,��_u���]����t��R��o�i��Ī�Tn�lv�\"��8#��p�!����d�j޻ɭv��dSh��8A-A��҈�H��B�[����V���a[`�~U@�5��`�s.��\"?���4��\0\r۱G�ۋ��\0^�Z��u����5�������	���.��ҽ���]���}Rf�>>�{qM0�H��)���VR;���z���O\0�q��[�Y��\'�#)_�z��5Ǆ�Ja.e4#C��b��(󞻏�]��`����[�ȗ4���n_oy0M����M�0�z�t]���\0_���.�[���9؆K\Znz���B�JmI�iKZ���J��{��q�֭�f��i����E\0���F��Ka�:����2ڷ\rHi-����ܮ���(Mn���1�dN�?g-��k\n�f�)kQ��yi�N�!�a��\\(�/T;d�K&=�/9�3�kl=�����`�fHUMSv?�ߢ7�/w=+�Q�FXJ=Ak��|�\0��g��4�3�y�e���5����]i\\���\Z�ᾜ�ﵼ~Lx�H�/jh����저J�WҙVcٯC������V���\0�5��������Q��npRkH�U%V���~�������ح�)�Tu*�M�t�Mxm.��N�O��>�TI��6\"��y�\r��i;Sܚ#�W��ǦoU=���ʹ՚F��é��n�,=��_<��n�+�2�qЇ��:�PG���\r&ifS7�8~��pP�4�DE^�R��h\r�i=��%R�zF@(�>�<\Z:��a/y����g� �,T�>��bb�u�N<ac�l�Lx��[�D�tj�DF��C�Ũ��l.\\�i�{W�~?����E�~W[��[ѷQdKU\"�n?��B72C���3��ɱ7gK��ʴA�S�<腺Ds�\\d�.|ߗ��ُw��\\�k�}��q��b��3D\rst��WD���C;1K��׵������Xn�C�[�*�\Zxg�Z�Dv�D��)�H��B�����#`B\n��>!f��M�w˵3����]�v&;ڗr���퍻N�Q6e�\'�C/��q.N�A�Z�G���!Ҹ2�֊�W�&d��&��{X���+v��p\'=g�=r7���6L��\r��R.�4nv���>Ӹ�E��K�ͮ�w��w�?�0��Р	�x�$�͸��~7x��7z�# ��#l�%�?�\0���n��.bTؓ��c:\\�\\T�+̇���@C��5�G��Y���Z�Lef�B}��_��,:��Ǻٗ�Y�C/f;J��`� i���#x���\\)�\'�:�ؑ����.��Dc�g<�RY�����W�@�1g?8�ݔf�g+���u��Hq�1>�?Xa�K^.��(��10�g�d�\'�@|����e�!/e��>lM��aw8��llE�����Lv�FꬼE_���i��Fw�>*���l�̤C�M.��y�\Z���X�E�ek��A�\r9�����E�F@�N�	�>�!�_���[���;قu1�U&~<�z�Ft�c�z���?����nyO��eՑ��ُN�S*5;����t�fn��a���`F^of��|_���u8�Z�ӼN�\'�=��TW�2v�Đ��אq��u�GY��Lj�Ȳ�}.�3��\'����yOW��K�QChmn���]�1\Z�s,�Hxλݯf�MO�rӸssq��c�kZ^iQ�>�TM\\�^��yzñ�毬���Z�xnc�u���*�/4��6\Z����܏9p?���fq��\ZVk��4*�\0�/�\n��h����K��\Zm��U˹J�g*��J��;lq<I۞�k)��)�8���~\0�b�\ZG��$�$>���e�F�5�$�����^�2�~�Q�Y0Z��P�!�)Kί�7�I�>@ň�_�sS�*qD����Y�5�BH������J����b}Z������l[��o�iT��4��T�Ħ��\\�yփU*le]����.�t����q%��ۼ�;�ױV����t`Ko���W乱�{�fݝo�8����jbm�+׋x4��\r�~|���N�ܓp��m�m�\Z�u�z�sh8�i]kv\Z�zS�����=��o9J�~��V��1�%���n\Z�}�w�R;8��3t��(4�#���a�0B�>��#D���:��h���~r���$���\r�F#|�%�և�{��@��7��b��r_�߿\rP����	����ُk9<���\"�e�Ç�k��h_�H�i���Gw��T\nQ}\"\rOEg0��\Z�#�tw���U�ɇ���]��y�&V2�t1���P�\nƅ�e���ȫq2�qn�2e{��T(�hu��~���ǻ�*ѽ�a8�}��WFMG�b��������C���r�v\'1k�f��	�C9qj���h�\r�~,��&[l���OӣG���=D:�u<�/�����2�˗9,��#�g0 �\\�`���O��+Ǔ@�&R.�/��\0�GxR�6�в��ҽ�nߚzIa[c\n7Z�E{3�g��8��d�\0.p�^~��C��\"�����z��u��TK���s��zq��d�vtUSNW��\"�k<�,��R�4��#��3�q��yc\n\'��؏��ݓF��p-�7来y3N��3;��jh��ɻs6)�\Z:\'{ޘ�c�%�!����QaQ\"}ՇS�L0ݓ+�,��ڷ;/5R�!�z������GfN��\\�waDU�!>�\Z\r�|�a��K�(��n�vꥺ8�2���T���#��D�9��ӥV�j��RaE�Ԙ��S*�D��w�/�4Y�����F��T\'��Q�G�-�M�{8Ǜ��cd>���?��o�L��r��-3͛8�^���r��6����c~����DO$���_�1?������yԇ�i��N6�2��S6�\r�m�=���\Z�ޓI\'ys����\naB3>�z�����>>�wN/U��K�a�<���(�a�.����)����ټ~ p��[Rl�\r\r=�=��w�^�l&>�:]�e,�\0��w�B*�����\"(C���j��[}8/�|z�m&���>rp���y�m�Y�y%,�v�?Vq2Ӟ#���6&��x\\�~�\\@\Z�;�R[�k��:��#�_�/��~�h<�a?󨏖�)G�p\"C�:贘	�g�����ws���E0!��<���q�}�6rSf[X�	\Z�vj���O�$�����@�\\�����:��r7 ҰAC�_b��Smz���r!�/f��W�@��U\Z�D��W��P�Y�7� �Gb~�؜��9��\"�}_�4��p!a�v�oZ\"�/�\\V�\r=�h\0��D���y���S�O����8��:�=Ec<�Ӊy�-��X_���j��m�]Y�|Gw��\"�\Z�zk���%��A���n�>��f����RP��-�_U��;>˿�Pg��廔ǝ�G�,=�3ܾ0>hW6z����ob�S�n�cv�)���MO��Հ3�G?e�u����Q~��6�5�H�o�i��7W1�?�A��g��ǻطg�}g�6����p9����t�{̊�v����Q�yF�����=ةD�b��aV.���Z]�kq�\'ӧ���W\n�<�c5ݣ������r\r_�\0I�5o�nhh(y �qOL��:�e�ņ�t��&8s��چ�T�&�]��P��+R��[l���,f+:k�=�j0����7\Z=8�GB�9������;��%���㦏��b����쭒\r�Ac�F�����}�:�iVt� \r�7��L�35cZ�,\n��%���)�my��>��ȋ��<����\r��\\��DL}e��G�����#\'�$2����<��0�zL��kBF��1}!L�3v�������j�0B�>���W1�����c#��#�����>rb���%#oBL�c���KF�x��a�1}���#��L}f�]Ӈ����?521��0�1}�b�B�L�c��Ӈ���>6>g����bLF�G�y��G��0�zL}e��G.�~12�S?����c�0B�>ra�F&c���a�1}���O�^2�1}�ڨ�|����*�U�[�:�Aa�hy��2����Jx�8}��t����&�����[�[��l�8_p���+Ộ>rq/p<D&$�7m���qI�S/������q�ǔNw�+�\n�ʷ��Xx����8�\\}S_�����tq�=���p�U\rZ�X�(�M=-�0�}[Ǽ�gt����<�u�B��Iĝyr\Z|귀\'�A��gPC�]��)��v2֍�]����-N�{�.!��E�v�	,�ؓ~�����v�\\���xH��j\nìe�����6�)�,�u+�;�U�����]l_���#�����ʙx�$������m��m�ߠ�Y���D������.���m�iysD�ѻ�i�z>p,K]�P5_	̣��\rlB��(�1���\'w�νH�[���!u��]�6�F�����-0X�݁�*I,����׍������!�r����w6׼��D����C]���[�S�Q�Z���.�w��[���J��{X\n��l�4E��ڪi�nh��>�������F}�m��\Z�w��6]C}H뽴o�K͕���o��5�xm��wȌ�>V�9��\\�7�r!� ���e<�eK��1x$�O�^�Ӷ)I����xs�7��*�[b��@�ؑ�x�g_�b�,1\0��P����$��� ����q\Zp3��׵��k��K����?���ܱ���>�$Y|؇����eDj��#�F.i�x�%�؁�A\Zc��M�`\'�\n�=�G���E��x:O��ω�gU�E	9C}��_��l���,�Zw�\"�|6k��Dđ�w.����!0��p����%�U�3��vib\0�\0?��K����z��(�80���WeZ�sX/�с��(b\'�\0�Ϳ�f�����I�+��q˅�U�$\"ͩ����G\"��M�H��T�b�e�j�{IG�6`��q\Z�V ��1��@�D�z?��΢�*�K��w����J��0Nv2�v,;�6�K*\Z�x`�����f��j���n�2���\Z�/ta�W��+�ۣ���Z7�d�a�ۓK&5 �XՊc���zw���X<�aޛ�Rm0%m�&?�>��䦱C�I������T&{8p4�V�󈴟����\0テN�j�y\0r������ϸ�-�;b�v���.]Mq,f�\Z��dc���s,f`KՁlPh���>$v�0>V4\\C�Ɏ��p�D����?�׮^\0^��%�NLy��k��|.a#~6�񼊚���w�B�y�A2� ��í���[����F�,�2־N���F�\"��H���)C��Q�agG��9?d��%\Z{͙X-A�]f�~G�{C=2\Z���|� �[6���J0|���	k�!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��a�0}!LFӇ��\0��\r1cj�\0\0\0\0IEND�B`�PK\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0meta.xml�S�o�0��@^����,��4�Ti;tRo�����6%��gdd��8����{��ém�wa�Ԫ8A �i.ձ?���x�>��E2A�f}+��[���S��S��QT�VZ��VX�՝P���4M\'�F�_%xu��Ð�D�#�y��P]���q]o����F���;&�5Ԉ]Gꌰ�Z�Д�4֜����z�M\r�	B)���mes�㈍�n;�yh.zZ+��*3b?�>\ZΛkC�7�w�vu�.��\\���o��o;��j���-�Qa(̈�-���\"�1&1AO8�)�h���l�2����(8�ר9Ż$��&�n�7\\`����������:�(]2�o�[����=?\";n�u�E�\\�s~��r% \0���PiS=ʃ�C�`���w�R���s����h�wF�z0%�Ew_z��̹�J����C��\0PK����\0\0&\0\0PK\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0settings.xml�ZKs�8��H���{ ��*P�)B\Z��@fv�&����.I�ߏdL��82�����ku��E�>�����țN���Ч|�t���ʥ���N�ԃ��^\0W	J�%�Ho粱z�t\"�H$�\rN�\r�50����\\݈�VO^��Mg�T�p��bq�8=F1sk�zݍ߮����\"*8��MZ����Vo�G�7�͆��b�O��3w��z�(��e�V<B-���+�i�Ƭ�9�J�����dO���\"\'Nk�k7h]%�Y��P��䱑��h���ś�8i�~��J���\02��Y�T�P��\\9���+w�C�}��4�J��vQ�+��<U���Zq�����֪��������}x�鶊�hw�<â�o�)�Ўഌ[��4�~O&�؂� 2 �iM	�P�+�o���=9�$�aɂW\"*�> 3�\'bF�,��|�S�P����TW臥�P_�r3`��#�g �lA�%��q]�ˍ ���j,�<�p�h@9Q0@�����T�Хť�y�j{�]�2L�أO�:�m�	g�Z�tZn�˦�,\"��H�G���Eq߇z����R���wE,��È�x7���X�Y���L9G�����\r|~P���]��Tѓ7i%w����n}�������9�3�O8<͈Q�\0��68��Z+�\0#�S\n۞�\\K�P�$�C��$�Qj�jY�����{���EM�A\"$dJ_�ڦ��ٲC���u��Ő�Jmm��X�t�/�BQ\"�\rp�K��p|���s�d\\�\Z�[n���v�@Uc�K���FyJm�#�<ܜ\nd�N\r�$���ՃH�Y�#��v��qC9|���Jtl\\�i�Ϙ{��[��=!pe���%N�Xu#���D3�4C���<h����\'��Ho��[s���0%S�v�ҋ��ɹm	L�������]ń�>�7�(>���R9J�%CL��cE�?�;�,}��dgz����S�aF��lY#�r���A��H|������N�wDy��vn��?��m�m>������\\�9��\\#>3(g8�IpM��2��M��c��$:і3�ѻT�+a���Q�p�2E�9�CY��aL���1-E~Au �\'��H�!9�NL�8�=	x�;���F;�#�njB����6���.#f���Qe�ؓ���j[�EO1,��Μ��r��d�;�Z{�EEW��\"s�B�)�:�`�@E�e�G��#�_V��?�CY�]y�A9�v�N`��:?��!ٞ\\��n8�fݝ��p�����PK-J�\0\0�#\0\0PK\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0content.xml�Z�n�6��+-ڛ$˲Ǎ�h�.P �&-�JK�͆����D���~I��DS��(o�8;�!g�r�돛��1�S/\n�^	KI��z�������7�,�H�\')KV9.���B�w�11ҩ��ń!AĤ@9�LX��Zk�\'z.�#�������UYa�h�}f\rv�S��]�Hu�3�Uy#��1`=/�$;Vl()��R�r���:X��0���\n��\Z�X\\��T��$���DQXcs,QW��5�X�s�;S�$�[ՒcpWf��\\�F|=.:G�㢅�d�x�8��f��i�P�SW7Grٲ�������fW<�:��6�J8);�iЮ>c̚��f����ah�z}��Db�������2��C�.\n��G�v)\"D�� 4bi�Пoo�%��L���[fDNh�U\0lKТ�t���:\\C+㣐�qi(�`���h)s�~�)i\r]�4=s��38L�G���Fv:�W;�����T4��G�~�0�8�P�&.���5c�\"5�`ěs�D�j�Icw�(��!�|��HR���.�1?ȰaY9q��9��néM��lwĝ+\"������P�|��!�U39W��7��5�����~�g(�~�*f�&?��i+��ޏ�\'���`�c�9�F��|�zߡ���0�����K\"8�3��iC�������O��Q/<n�\r����w�\n�j��M�/pK�/g9*Y��8������Y\'��-��	���X���t0I<	��W��I�t�O��9J�m�Ǿ���8�-�9��Z�mΪ�$S,��8v��φ�i��*;���_������.8*�$��K��I7|��r{�x���V*~	�`�S�|�=�B�\nl�4=��)������:#��X�a����z���,�p����(�5�����o��� z�ÿ�-08�����:�d�#J�a��6���	w-WN:�8����\n�H�Q��\r-�����RuQ�xS˻Ӳ���w�����c��H--Fޝ�����o���ޞW�K\\��mݯ��WY;]��DT��y��<@�qO��4_Q�e�U?�癦��������-#� /ZGe�� Y�T�e����.�d6�Cw�;s��<X	c�y�۾�^���u8�V�r���0x�T�9���I8?��1�ͳdhxB��g���d\r��Y2tq2�����t���9=>C�3=��N��y��Q�d���A툫�v�ZR�s�>�FU;�]뚌���ꌹ��v���m�H�to���u�ͯ�ZQ�D1e��#�Z���$�\"U�����_�ይ��0U���+�J���\r��ˋ�s��q݂�P��\"=�m��*�(p-�O��b_O��7?���_��(ᗝy�-ϱ2hee�<+�.\'�8��\'q0r8��?C���E�/�$���\r_�a#lÖg��PK�	Y��\0\0#\0\0PK\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\n\0\0\0styles.xml�[_o��0t��)�eg7q79�Z,P�r-n�}=�es���������O�R�([r��I��$1gH��88#��یO�,��o��E�Mh����߿~���n��A�)��\"q��\\���qZN`r^.�ƫd��d�\"\'-*^���v���^�̈^l�t���Vt��NF��\\���fvg\'�l�NF^�ԝ�����%�S��\"+�b{Rl9˿�xk��El6����B�U0���4�8n��Jr͕��7+���4��Ud�|�는Wْ���EN���P�r�B}ݯF[��j\0�xM�h;��]S�%�Me��s3���{�Q�����+���y;PŒ��4��|!D#*N0ήō�p����(�F2E��e�	��E�\Z�M���=�|�w��h��w�HH�FC���*�A\r/I!UH:>��.Q2�*��!��u%���ę>�y�{F7�y�lp���A�և�h&7��0\r�i�L�Mrդ�TTyb��\0H��I��i��\n�iq�%����	3e9S}x��K�4S�z\'sGޭMө�����	�yy����fxb>�p7ޏDƔ��L\0��7�h9��w7ޟI!ʿt�̘7q.��!N�lK��aIA��_�^p\\��d�����A���zd2����?�)2��I}O$��u�h�d:J6d|	��N?��T�1sxF�T�JE�\'�$K�v����%���v��\"2~���搞*A0����R�~��9_~�r��6B�UJ�1b��Qlo�p�7Nf����Ƹ?��u~mUOhJ*^�ܭ���+I�5�=�[�	aU*7}\\�TR|�������w���K2���)㼡����|#�\r,��\\�r���V��H�7�l�I�|R)Q��PaX	/�Ģ]Ty�*�hzm8\r��\'���_JJ���XY\n�-�F�g\"���ղs�,O(&R,w�*(�.�R�Kڀi	@E�g<�VÎzh[�ԇ� ��L����5�\0iM/�W�G�B�1N�UEV0�J=CjR\r���u}�E�|?��<���1;�כX�׵�ԻY��~>��Q�nص��ݷ�����\r�?{��t|����R���f��E���XGp�x�mX�w�0μ=˄�J�f�E�S�1X+V^�D;`�G�#�o2�u����k\n�6W��B��o;�lG��*Kw��`{��AQ��%\n��B)����8M�V`� �j�P��I�+��w}��p)�]4��]/��~���U���=r�8�0�ˊs�&���p���GC�������18g������>\'K�4g��\rֶ?�	~2��1��w��k/;��	8DO�Ag\rI��������lM���9��gD��M\"ty6�����D�����I|ޟ�7\Z��Ά������3\"�6��4<D��@��-*��6`o�vV���\"���Dw�T)ݱ�@��u{`M��i~�G5rL7냘�vr�Bf���(	e�y�����B��JT\nEl*;��EWk)��گĺ[2�]��3ЙЕ���<_�vϴ�WuČYͺ���@�\n�M�����]nS��]��?��~����u���{�tYz�\0�܏o��������8��1��D�5�����n�X�u�U�aT��V�aP��+>���fŚC=�$I9�i�Q��>��c�A���M/��Lc�a\nҋ�8���l����u���������r�C�=��Q~�w��x�̸�`�lf\"��h�P�pֱ잕L���t��9d�>��ن�_jO-�?��E�o(>���ĵ�7H���YV��|w�	�1��gO`*��NzF�2��8`L�cH���5%=~��/$� ���6�SF�A��vCWj���?YMsM�v�<�n�^�m15����1�<��dȨ��5t\Z|h�T��is������N?���sqs[\nۧq�3H�8�����`���]��ӁAC�9���̡�NJ&kJ�׾r���Fs\r�M�ct�cX�^%T�H�6��k,ON����7ݼ���8y�TD3J�J����g)���/�7�V�s�6�C@�r���|�E}1 �{���o��+ٱo	�����B�sJ����#�7�&��M��& ;�����:��]�FG-�d\0����R�I.	s�q�6λ�8���[|\\���<0@l^�$�)]�R��⃅`0x\\5!#��&�k_��p\'����+�ָ[?��w��~�ì1ب�G0�j�`_J�,b��2�~ǭ��}��kcA@��:o��a����PK_zR��\0\0H6\0\0PK\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/images/Bitmaps/PK\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0Configurations2/toolpanel/PK\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/progressbar/PK\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\'\0\0\0Configurations2/accelerator/current.xml\0PK\0\0\0\0\0\0\0\0\0\0\0PK\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/floater/PK\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0Configurations2/statusbar/PK\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/toolbar/PK\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0Configurations2/popupmenu/PK\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Configurations2/menubar/PK\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0META-INF/manifest.xml���n� ��}��{`�iBMz��\'��\'E��T��/��&Ӕi�r���������\n1�{�/�\0Ծ1�U���^��c�;8���D�(�>L��b9��*�$Q9H�����:;@������\0{V�ٯ5ʡ?�su��-��K�Ěȼ�1��>@�T�hEC��b�\'`���]T�btb���%�OT�&A�%حp�:c�)��0�U��1��h������#���z��<���qzi/��`a}:���Q�����2�<��\n��A����PK�i�\0\0�\0\0PK\0\0\0\0\0(��E�.�+\0\0\0+\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0mimetypePK\0\0\0\0\0(��E��q+\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0Q\0\0\0Thumbnails/thumbnail.pngPK\0\0\0(��E����\0\0&\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�\0\0meta.xmlPK\0\0\0(��E-J�\0\0�#\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�\0\0settings.xmlPK\0\0\0(��E�	Y��\0\0#\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0� \0\0content.xmlPK\0\0\0(��E_zR��\0\0H6\0\0\n\0\0\0\0\0\0\0\0\0\0\0\0\0�&\0\0styles.xmlPK\0\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�/\0\0Configurations2/images/Bitmaps/PK\0\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0�/\0\0Configurations2/toolpanel/PK\0\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0*0\0\0Configurations2/progressbar/PK\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\'\0\0\0\0\0\0\0\0\0\0\0\0\0d0\0\0Configurations2/accelerator/current.xmlPK\0\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�0\0\0Configurations2/floater/PK\0\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0�0\0\0Configurations2/statusbar/PK\0\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0)1\0\0Configurations2/toolbar/PK\0\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0_1\0\0Configurations2/popupmenu/PK\0\0\0\0\0(��E\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�1\0\0Configurations2/menubar/PK\0\0\0(��E�i�\0\0�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�1\0\0META-INF/manifest.xmlPK\0\0\0\0\0\06\0\0\"3\0\0\0\0'),(7,'image/jpeg','����\0JFIF\0\0\0\0\0\0��\06Photoshop 3.0\08BIM\0\0\0\0\0g\0nruLqptjySRsn6p4VhFX\0��ICC_PROFILE\0\0\0lcms\0\0mntrRGB XYZ �\0\0\0\0)\09acspAPPL\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0\0�-lcms\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\ndesc\0\0\0�\0\0\0^cprt\0\0\\\0\0\0wtpt\0\0h\0\0\0bkpt\0\0|\0\0\0rXYZ\0\0�\0\0\0gXYZ\0\0�\0\0\0bXYZ\0\0�\0\0\0rTRC\0\0�\0\0\0@gTRC\0\0�\0\0\0@bTRC\0\0�\0\0\0@desc\0\0\0\0\0\0\0c2\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0text\0\0\0\0FB\0\0XYZ \0\0\0\0\0\0��\0\0\0\0\0�-XYZ \0\0\0\0\0\0\0\03\0\0�XYZ \0\0\0\0\0\0o�\0\08�\0\0�XYZ \0\0\0\0\0\0b�\0\0��\0\0�XYZ \0\0\0\0\0\0$�\0\0�\0\0��curv\0\0\0\0\0\0\0\Z\0\0\0��c�k�?Q4!�)�2;�FQw]�kpz���|�i�}���0����\0C\0\n\n\n		\n\Z%\Z# , #&\')*)-0-(0%()(��\0C\n\n\n\n(\Z\Z((((((((((((((((((((((((((((((((((((((((((((((((((��\0\0��\0\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\Z\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0\0�9�����T�ˡ��\rb�O����4oRǷ��t|��s�.Ϟ�����G��ܗE��y�8�f�wz��5wy:��ypRBE��@EP@E\r)P@EC�(�9����ܭ�r^�����W�؛�EN�M~��o���Zr�>���0z��sd~���j���;��G��Q[|4������cf0z�\0f;��(�+�z��3�F�Ry�{���C��~z��a\\�e)�E\08㕃S��s=/;���{��o|p\Z4m�ǳv�����<�C�_{5�f�u�9��z6����೸���^�G=j�����C+ۆ^��q$�|��nFQ:̬��gS�����:��\Z\r�|�=\Zo2�e�ܧ�y�@E@\"�D���@o`o`��4��}�֌������O=��=�Z=�L�]�K�:}nff���t��[��Q���\"$P����0�\rNCC�r\Z���!��jp\Z����P@E2�����..�N�/7�����oQ�I=���af�[8��}o���\r�����o//��<�C��DH�\"�J(�!��\"\0�\0(�����\"F���#�r�������V�M\\�Ij�Yv��3����zq�rr����Eso��u������F�xGgʧ�QDI\"�QH�!��	D�����\n����\"��HI S�L�����ۡ���y��]_F��9�~|[�D��u��_���/[�v8����b-o�u�	/�BADH�\"�R(jp(js\n�U}6lE���$o�CS��P@E\0�\nw*3�3��{]<�~_{�����ѻZ7G�R�|ܛ]��:�F�}�G?���y�A�C�QDI\"��\Z���\0!�Y��n��e��m�6���+�u��@E5P�wi��Чm�A<׫��.3Yv�6���o�&�R����f�5v$�Z�̋]��$�M��+f]=��aZ�Hͯ��3;������\Z��t�bJT˫�kB�+�h��	Y���!���\"�R�L�F�:v]<Lt�]���&�F���\n8��/�pr{�m�%�|Q㈎�0�P\\���2#)#��F�����8N�иN�~\'ɽ\"�a����S�ʲ��\0�58\r\0T�zv�W��/���5b�/9��ej��S��9��MM���!�k�kڿ�S[��s�Ήw���\r괫����u������󳉹�R��r�9�t�x��C[>b7F\"`��ҋ�-���08*CQCC���H��������u�nw�D]�nql���n�-��qt���o9�t}]\\�<�-3G9�	W\n�(.�ZD��734��B�\\�1�QO\"��fv��k����-j�W<yV��i��q�$a�`{F6@g���������W�>.����zO��1n�Wř�v\\w#����>�)!��		{I�A�Ko7��9���U���a���g����FBV���#/=G�ʚbh��l��X�O�1�	�m����6@F�\ZCN������\0I鸽^��MǗ�*�d����Z�_�����^�=�G��Ӛ����k�#^� x�^��<k���d�N/nx��u���^��)�;z��KA���*�e:��6+4,c�ɢq\\��f4ѩ�NkR	뷭�\\$��D\\���z�^q������ֵ���,8;�b��\\����5�$̣d�YE$Ң	,�T}�\nД�:�r���>�ZM�ǩ����b)M��c���\"����\n}�����[;z��F�����&�ӹM,8\'�%��<���ŦĖkY�&C43X�U���i�گ�f�I�6�$�HM$RBy���5yK3A$�K^TY����-iVqo>ÑJ̯������-K㍀eCTШ̼���l�+�~�d�\r�f d����\01\0\0\0\0\0\01! \"203#@$%AP4BC6��\0\0\0����d?�wm�*���*Ȝ\\�G�l�����̬���Ǭ۳X\'X�\0�e���]���sT�W�VE��9��k9/�Y���H{G�/N��)z-|g��F�!��=�Ĕ���(��b��ed^-��6�����mfg�:C�!���&���V��-V�:�������l�8ԭ��U��iV�g\";�q��s+��#+_$>j7a�R�f�w3�<z1\'����wU�6X5�x����J8�-IR�;���c���+��O_����\Z�l�/�Z����Ԋ��\n5p��<k����p���J@S�b�?M���(%闆�ѕ*�`���-X���¬z#�1��̯ª2��B�v�h�B��1�P�l2D�z]I}\'r?��8��\0S}Ql6���չ��f�Z�X���,�1�=o�\Zv�y�㳕�发2�qǳ��)�&F�?;c�[�W+�ʵ�w�T���_�a��,A��w-d>��������E%mO��}#y���nu���5��1#�e~���h<����Q�j�}#�uf}Cz��յm[Vյm[VյmZ-�jڶ��jڴ[TPyJS���d��.^;���#�zk+񬌍�U�@�5-)���ӫ\r��N�>ƋO^�kE��i�]:�̹d?�+L��Me8����U[�3�A�\n��Xqx����^�R�����~���q[����?�x�K[|B�6����<�,����ѩ<6-���(Ԟ3�(�����2�*M�\Z��K�m�+��_�߇V9\'�l�#R૽ø윖M�����~��*,����R	����wOɹ/�405���v����\0/$��7�y�ݯOe0��6ѭ���Z!��_�~L��]�\0X���Y�Y+\rO�A����onbz��c\'�/�M��~�@�x���T��tXƀ)Q�\r#��,o�3��4��C�7����in�퍙{�%.wn�F8X���~\\�?,�M\'�8�O\r%�W�!Ⱦ&������2�1F\'yRo����=����R�i�d?�o�?$P�G�/(=��R��\0@*���ڌ�����T�\'ܮ+�:�y�tD��ʿ��@W��Ĝŵy�����-ٶ;��\\=.�,Q�<�M��\"b���F�߿RB�p�䥉�֠S���<� �\'��W��8��T����۫Ъc��G�������|����(*��\\���?-��p�\"P�@~w���Q�v��@�V�s7���7��(��r��K��6ޯ���Gy���Y�-��W�b��E���6�}�p���C���AW|b#	]���m��ceZ��k��s�t���c-��2�ɠɣ�ؠg�e>�:p�;���(�̄\r8T%�,�U���SO�!�O�%m�2��(U+�3����z<�\0��c�xf��`Y��F,�d�\"�۳����i� ��0��ߧ�_\"�W�(?�,�ӵ��F��Y�lN�60��\0O�2�C�\0��\'�m�㜩�`Z6Z\"5:`&2X���\n������_9Ӗh���0�\0��w9f�Z�郈��>��6����Zn�W���L���r~N��G�E\0��8�q�[��<��W%1HbxgϾ߆�S��ZȊ��U��<���e�i�6S�d}�O��(�1���c`)	�y�+r�g^��nR�E�Q}g�&�eyMNZ@��bx�Б�N��5����(�$�p��8��dNG����p�l���o\r�E��h�Z-����C�i~�u�C��`��)j�1{�}�R�ŏu�m�V�nMI�ЅB�q9��̏�YM}u@KEv�%V�l�­r�_����/	\n.RΉ�I\'�p���Yh؄�3��jo�$5Qm캓\'RXv�(�$Y�7��.�Yt���3�QY6֔~��[u<���@\'�j�_�W��\Z�PπAo�;��H�\">����Ɉ#ݙa�\'hg����z��i������),;�UZҲ�w�r�59�x��JpA�<z�/��9Rݚҷh��3���ܵ\\6�\Z�)X�JG�]�7�m�׷l(�Lq�4�>�ooN#Qda�Ibz3��u.��gdc��钒�Ɠe���N���fl��\0\Z!��hy��\'x!|CĹ��1��:3�n��ϬZ=A�i�G�3w�G	u#�>�}ښ~�S	/�L�`B,ħdӏ�.��P�Q��r1\"!��R�C�\'��\r�oF��hЏ������dC-I�\0 s���:c��֗UPעX;1�q�]��-;m��\"B��� ε��4�%aۘ���>e��Z-�E��:��K윑���;mG�.�Y�h�tM_�7�>�.񱑔���%r�����\0��\0�F1��)xó��~�\rS\Z���Y��߆��\00�_���\r�ə3&�h��h&�h&\Z�a&`�Vy)��F]��f�� ��X\'m�ذ9Vb׌l\0p�enV���ka0Z�ь�÷����>D�K�<�O�2�:t�+�\00�|�\r�ɓ&tΙ֩�3�t�M%�nM5�OV���S�j�Q&�޷\'#�\"r\"��gt�t�ur�\\��Q�C�ב���\'ri\'�}���]��\02\0\0\0\0\0\0\0!1\"03A#2Q @qa�4C������\0?����%=o pp6Q�����TYDQ��K�bS��/�q�7?g�\r�r���gx�D�*1̴`MI���T_�X��hg��b��i#2J;�bGӲ�]�LwX�yn�\0�C�w>Ud�Y��ҵ~�I�����UA�g|�L���*�Z\"�f�Zϕ]/�kZ�Io�>�G�����|�w��NaPȱ3�o�C6���\'�K�4k���8�V���*���ʻ�F59���za��ѭ�8n��|I7���UF�XpԦ��TO����x�x��G1ѫ�66�`�WIV�TY/�Ln�D�F�b��(���j��Bzm�\rS�&�\n�Tz����F�}g\'f��s�wR�@�D�juQ�#�U&�N�<�V!2�dM�5\Z��Q�|�7*�b����(1j�\r��\0��q�ո�2rn��\0T�s��9��^!7���M���\"4��~�+�=�\"7�#k�ko	�.ׯ�׎�\0L��v�z�q]�N�3ܜ��V~��uZ�uM�c��[��3�EzI�A���(���M�`��\0��<i.Ѫà�F��T��#���c�_�hEp�r(SI��[U,&#b��Va�Տ�|����Qq�(pz�M�l�0�Q�]��\Z�`����e��;y\"-�)\"x�2[+#vn��7���ŧd�)uM��T\Z���P!�\n�����\\�A�e���\0)\0\0\0\0\0\0\0\0\01!02@A \"3a#q��\0?�ʕL�J�ɽ�+�-�B�^��w�O+g �S{W�K��S���S�Ċ��h�;H������Et��$VU�l���C�D�e�M7L\Z���eD��d;vO��}��>�M��c�oiC�6�[(,J�w%x����C�5���Dݫ�P�l��B�P�AL�T}�eѿl���H�nNuvrm�y(�H*p5�zDTQ:�g/|�@p�Ϳ���<P���E[l�Z�w�5�5;��kP�m�[{&�H\">��Q�\0\0|�_�)4�W�t�ܛ��A��_�~DyI��>q�C������|2>��}��7S��yr(q�����\nUk�k�e%��\0����N���j|[��lEq��D�r(�F�+տ�߫�ͷ̯Ex�?��\0=\0\0\0\0\0\0!1AQ \"2aq#0@B�3PRbr��ѱ�$4Ss�����\0\0\0?�jGa?���}Nе}��x~L;Z�O�vQz.Ӱ�m?\'KI<\"P��d�1HW*_�x�����~^u��w��**x�O�vd��e�l��=���_qn{8~6��f�3Q��oc����-��<t�Q�w�q��5Rw�Gc�\"t��ғ�h���X�^��*$�=��e�+.aEa������9[qϥ�%��f�3$ҐFp�Pj,6��~,���.*I�[�D\r��DX�7��I�U��K��l�F����/�X|<Y�o��>t�J��{d\r�X0�������N�e�%o�g�\n��,�u!M�3��a�,��{�8�j$����7`V�4Xd�ܫ{��J��4�L̚�M�����mYf��n�=��/:�&f�N5 ��Q/�֑āݟ.�*`��X@-q�������t�\nT미h�u]�is�ӑ\"������B�LF|�P9Q��7�G��SC,L�Na��&#�Ֆ)9��F3�4��d�_��i��_���I.3����+b޵�n��kΖ9�0��ђ���7:����B!T�f�40��ˠn�m)q)������XyaVQ&�zX�����U��H�8��9V׬N\"i#Yf���*��� ���e� Tf>���oS<�]d��S\0�x�!I]U�f�rŖI@ע�\nO^��1�Z�W�Ǘ/��1S�k4�Y���<�]��O^��o��-��:�{�)��={#dI��k�e����i\Z�׷o�(\n�4[�Վ�3�Wg~�U���?ztc����_f�8_>���5�S,J���(��W��Oa�\0�� �?-�8��(�����v�UfC�t(�;f��5��R����j�h�\\�[�N�����έx�XrW,���G�K��z��PA�ɫ����\r}�8���k�P��rLm�\Z1N�dEf�4���^��үD��\\Ӆ�qV<~%���%�HE}��lLJ�h�$R���W٪R	N}C�׍Lв��j�ʭK����e�$�JΊ2�[�M1\"ğ��JХym_^ȧ<��2��p���k3�<is�V��Z�z��AM�}{4%A��(�P������]M$���q�����M������7���J�f:塇ġB�k[0�Crd�ǗlE������A�Oa�}�ᯠ�aQC:�ص0�S~�:�{��پ`����.;��2�w��Z�^8⽃Hֽ}ب���)�������[��\0�`���&l�b,G��]��h\"��tզP·�f/4<E���/nm\\[�:e��J���F�t�Sg�3FIm��,V��l?�}�\"���^��_j�Mݘ{3ְ�w�����y����Ʌ��\\��e������լ��~�2�������f�yu���o.���/���G���~�^�L�����\\T�(�Fk\n\'��Q|\\E^�!z��g]�6C��ڕlE����[A܌r���s�w<[���o]�ױ߻\'Z��Ed����W�AΛ/��|6n7\Zd���<$k&\'/ֿ�����SKZ��i�Z��+(���Hb}k�Gֻ��hf��*�ǭo��b��/Y1Q��\Z�[���b�(�V����Hp���%��U�?��\0�G[�J�8��x�;��QN��.mh@9=i�KX~�cG<��X�z����ŵ����\'��K��q1�T\nRQ��IX�\Z��M<[����V٫��C,�ʠiSG�*�cRb`��lj6&wι�ƷQGi��хT�\Z_�Z��Z&���E��ˍk�^�Yׯg+����m�n�RnF٨5�S܌~�af�o���Z�l\r`x�ξ/*��\Zm����SH(�M��&\\޴��~T���6l����>�-k���e����/֗�+���q�w�&L��Ti��ۍY乬8�a7����J��w$P����A*��䔵#&\ZH�G��~���X�i�qʎ��N�f����A#��}[��\0Af�C�Van�V�\Zd<��[�X�N��\"=;׽���y�\nE�Tr��W�>#G�ϯ��~A}����P�37Jee��r���w]�(#6��dr�v��>�w\0��mz �\Zla�*.u�ە͗S��OjE�z*�F�����¤vQ�3f״گ\n��\r\"1����;\0�O��ҳ��W�+\'�A���[�l+{�b&��)��C�	���c1r�ĥF�µ�s��X�5��\0�O<�a�f�i�O�P<\nx�9xV/�P���5���B.�\n���BѬ�ofk*�\n���nn��*{���~:�6<�^X�e7S��u�?z�x���<����V��:E�*cu�\\{\r�a�8��a��\Zԛ��ݔ��C|���`)��K�K��LW��ojQ;����.n:^�sH\nq�����2���\n�VC��-��Vg�Q�o6Ðiҵ�k0��R��ֲ�}��i�_AY�2�\r������5��7�5�ق�\Z�[bD?����;�C�\0Ǝ��+���2��t���\Z�U�#L�Z������<TwlV�*�#A��0�O�=��Y$ t��I=M~���?���8�5���_xA{x�\0�}+/���f6$Q/��h���N�\rwA#�\Z��x�ց��a)};��i�s^��6��Z裀�v��r��:kV�ZP�|$p�@�����V�Rq�>YxTj��ҙ�/�$�n\nQ���M0Qǵ�{ֈh��kDj�\0������%�:����Mk���w���ʳ^�~��l��.�t�e{�8R�@h��w2��j�@O�W��\0%�ȗ�֜!7��]sg���y��o�\\{\'�޻G��Ga�{�\0?�J�C�Սwp���e\0*�\\;7�?ָzփ�������Uӆ��\01�\0�����p����ڼz�W��W��W��V����\0*\0\0\0\0\0!1AQa q����0�@P������\0\0\0?!�6ug`����DW��M}!�Qݽ#���ԭ�	��q�+��ӶD�ķ^�দJ���*Wۦ���R��k2`��L���ex�\0��$f�M��^�p�!bpjf�o=�6���s��|/ۯ_�,Xg�?IA=�>�(�hpWϮ��Pm�/b�;\n�\\���Q��*4���6���m�[Cy�L�m��#_�;n+_�D˭+�<������\\�e@���-(�L�-�����%��Lź�\"z�$��[�1���/h�!X$����>�B�����(��ꃼ&�>�~����\\-i}�M�S$��䫧���d��B�Hm7�؂p�wu��}^\\���1:-3}��φ�i@U�3\\�S��Χ�t�PJ�$�6�M�e�|cg�����\0���̺�7��\\ô_9�g���/�1g�[[�9>bJ�*+{\0��T�C�*Y����fV\"�Pw�]�W2�AQ}�N:�;Mb�����,�-c�ۼ1[��0�\0�c�M����������R�\0�u�ek�\0�/An\"�w8�>���ɖ���%�I2 �����X\n�J�ݯ�1���K�N��YtW�f-	��/�tf���� J;𳇳��X�hq�t��t��}�|:�z���d<}@a��Ā���pᲟP��Q��w�[C�i��u�)!��Q���v���ˈ�\0WR�J�*\'EJ�*T�R�zB��Y�����0���%�q��c��t#���@�S\"�\0����������:a�ceJ��)^��sd �\'��3��r]�{ͪ��\0O�g��ن�4��������A{���0~�ܹ��0[/q~H�r�聈K�zN�J��L/�S�)��ت�%*��$B(x�M\0�qtմ���C�)m�q�nK��7LwY���G���\0Q�Kw^�/W8����&��l�N?B��,�0%��E\0ۂ#�ga��uD\"���\'��t�a��=����l��F�n�l�D\0�?ڶ�S5���0yG�t*��O�Q���\0����v�Z�.����>�\0���\r�Q\\&���K�t�%��~i��ĥ�`��zF�� ���*IH<�\0����,f˄	��BW��f����z@3H�V��A�X�J:��,�=ࠝ��5)���{�!��\0\n����>���^\'h@-����D>�����+�|pD�����X��hf(��?�Rk��o�=Uա���������/�=l�ߏ�Y��\'��?�nE���᷇Lՙ_�&\n�\'q�y=��W�]�UUW*�EHSgT���][���~�P�W�L#X�/i|nǽ�k�w��������+�@k�`�r��Uܕ*T�]�՛��\"{��^�{�nJ�nf�a��,FB)��������\0s�x�K�]�nT�\\3�N��3ޮ������B�E��v$\ZT�)ֿ���(M�e��߄��\Zu�U�Ӄw��#\r���v�ÿJ�T(�Ǉ�\r�P��eL)a���8%�R�܆�O���u���\0�hV������?���[f�]]<��U�!�o���CfM��MDV�Zp�t:W(����`���֥z1cu{���g��N�D�;K���\0	�g��s؂nI,}�,�nK�t{��R�u�S��>�p�f���Q0�\0�X��Ҙ��G�h��&\r$����\ri�C��%w�	]�W�0W��q`%��Ե!8���vf���b�]�Yeʊvv�4���<��}[th!Z��2�6ܯ�e(������v��6����h]�}�E�k�|��/]�i��(��O�h9�ۇ,\0�o�Kc��Q�\Z���]E�W�2�Gow��\\����l.)�x�ƀ�΂	�:u�9��l�\Z~�43 ��D����r\"�h^%nT��Y+�J��QOTOi��UGz/FX >	{t�Su2>�����	���۫i��/������T᎖i=�=4K����K0@=�\0�߾�d�񌥭Q��|G���%Z�8/4�~	8��n{���9�x_P��=�X�0{%���X�y��qQ�����)�s�����x�#4C�j+_%��T\"�l8�*	�&�4��	5]�9�L�����U5�yYe-[m��@�=�S_Ťۨ\r�PO%��Fv��ޝ3�������\Z,��*���^�@%��)�W��hҽ�^ \r�J�u�?���c+~��Q)m>b\n������;G��$��]�J�*THǮ�n�}���0T|�sj�fbz4��X��cVi`b	������\0�7����Fk�C�v�������8R(�EN\'H�C����6�{�=�2�i�\n��\\8�\0�R�J�,���r�K&2��g�fTn�\\E&��6���9eJ�\"��Q%tc*2���O�G@��A�SOi���ڙ]TV����������L#W��BZ�ab�|.���u�n\'o���ߑr�;�\0�|�>�	 E�D����MR*群ʠQ���e���[����T�R�D�5�,��r�\0S��;���S��}����̭� ���D���WF�O�z�(���\n��,**I�]��\0}���\\�}�\0:��wH����k-~Ъ�Q\0��._�=�˗�Te���\"i�/ur���1��L���*�*_a�\0CH� +߄�22��\0���١�f��R3X�1e.�R�1�M�o�ώ�pi���R���\0/�{XNBJ����gM������R�! @�:*T�6�0Ԣ)�ILB�dB���8B�Ĩx@׉b�A�T���\n�>��R\0�bع���ÿJ��w�h�����ŗ8�v1V)Q� \0+ϡ����\\��i����7�G?g�B� A@@�*��L�4�/��vY���Y\nP�:�T4[�Tj�r\0x��j�.�zZ��:��b��(hT��j�\0�QzƑ����y�huQ�J���p+���L�\0�7����r�KO�}\rb�]�Ԅ! �� ���w,�脂[9��v����8e�*�!|n(U�Ͱ+p��ٔ����`�۞��\0�^������js)�N�V��2�`r�ӡ�\"E,NH(T�R�$k\Z2�Иo+�2C�8C�>Ϡt\0��<0 ���i}G�L�j[�BP����c�\Z�%�ks��)�U\Z+|Gb����X�Ʋ?�k����/���,|���Knhk3�v����F|A]�K�\n�S�a\\TzB��\rI��]e�ߤ�3OG ����(�1	���_Jr�����_�����=��S��\"n�q]�K�	*]bV���v0Ɖea~K��U���NZI�A\"�5#<c�R��Q�XQPnO��\0\0\0\0\0���E&b�$�%�;��z+� ��e�zhF�c�&���@�B2�f�3Ĭ��1f�\n��f����\r��-v��4��冊\"��������)�\\�)�\"�Yh��/����.�8b<G�R�.���)�jx/��れ�}���c�Ye�j�!�H�ﾸ�0����(h�X��y%.���Q�غD�,��I��!��x�;m�����;U.;�\"��\"��Ǖ㞋g�\"�F�\0�Βq��y��fQ���j!��~J/�H+�k7�\0\nʳE��j�b>�\0���.���f�ȝ�i+��됔c�J�\nm��6�)�Zȇ�\n.���\0?	G�xm���í�5�.���u��}U;m<[��U��`T#e�\n`���\0(\0\0\0\0\0\0\0\0!1A0Qaq��� @�������\0?�\r�]��₃���d��i���}i���v[u���b�o\n�LY�R<K�4ݧ��a��X���\0~ҤG�����=�1;�P��B<���]�(%h`������t�,`	��w���g]{|�(:�|@c��u�ټLn��b�Iؗ��b��فG�d͟]�\0�j��=v���|Jg�Rmo���w�;�D�<�)�I�/\0A��E^3��M�~�\0r��7��>yamGJBQ�y\"\0�ox\0����9H�,�z�~&_�o�!�A˗�|�~��T����^����)�y�Y,i7���;���?��/c�UdG�Uh���Ip�ɩ�����,�\Z�?�{���c��ѷG�(�:�ޙq��X6��i�˯��+k�r��ox�9�I��$-f�?n���fTjTW�٣��C�[�7]ro��&6/OO��p�}_��bR���aD0X�˟�LAQd��=*<�f�m��K�v�z䊹K:�k�x�;N�/̯��.�&䡛�SX��\"��^zU�{E��fv��l�8@���=I^�h���uP���Ȩ�b��>8>���|��@k4F�.!�<��l�bkU�U��(�\nUu1������Ms����^S-4�����������\0\'\0\0\0\0\0\0\0\0\0\0!1 0AQaq�@������\0?&�\nۻ�X��۰�	�Kr4���,��}�ܐ���!B�-��/q�$X/G\"��)KƗ��-�KC�5�8�U\r��R�d�r�H�>e�����uqB��XQ``��N3����Ey4\Z�0R�C�1+�ZN��*�Mv!142�V��ͣ}64���>SQ���P�*刄\'$���P��T�hi�jk��U��t�\Z1�\rL�_�&�|��킂�5�N��>�R!����1���\'yܧ�.-V�Ԍ+���W؎k���]F6>�sz�\0���xa���.~b������wЫ���(Bc��;j� ��k�8�_\nx \'��\'\Z��j�Nc�\Z�X\"3H�L�U�	P�g��n�z��^z}�\r5r�eu��B���-j ��o�S�|��b�b�\r~�둓��FڄW����\0(\0\0\0\0\0\0!1AQaq�� ������0���\0\0\0?�t�p���v��훴��~�U|e�<A~�b>t�3��)/3�!RhZ�DB����}@�ʴ�+�R��PJ��?��j\r�\'�8�t�)�� \'q?�u2Or�	`\"���SY+��� @9��\n%��h�|X�ɀf���W�Zҥ~�T��R�D�R�h�R�CC�X�@kc1ln�`�mp#����\Z�HV.��v���!�o}���2���|\"�����}���$�.�שTv�F��?�A�2�p�|�mF�S4�O|�ѭkz.,�S���*l���bze%%{��RW��(m����-(�z��u{���K%�o�\r��a�*Gl`)K�ur�Me�v���R�YX`�ˋ�l;9Nbr�S��5b�q�c�wg�	��q��1_�*_��I��@��KRx���� ݂n�k����[ִU*00���6\0��	��\rս�\Z�T�hW,�p����d��WJV����wm�&b��P�]�	�\\_���Fz%�0��Z��f�R��\n�{�B�Ņ�[p ��gL�\"(�Yp)W6.e�*��`��[�XM�����J��w�Ke��\r\no*)\0\\ĺ��� ������\nŬ��F�7+�c0	T3��7ǉSEK��k�Z,CN��?:Yef�`�OL��h�P<�s�[`A�;�5�a1e��r�I5��9�U���̥vE�3�_�x4��,����`��b��Vdxj��p�*�h�S�����hq,E�T5�-��A�^f���ț�À���?(ǜ�N�9��l�������Ap6��e�η��8h³��V�G��A.鱶����yVxm��.7�s-E\Z��x\\��V��8�I��lٓ#}J�,�H��0�y�!)Fق�!l�ba�#,E�\'!P�X�Y��B�&0%_a���+�\0��E[�����������](�nW-�[���P��LKe�K0�X�����\r��孨-�}�;�,YD�o�{���v0��$I�1s�����ZUV}Cy|�L�J�j���rXU��R1]ͥ\"�~\'�?�K�g��@<a�\r?I����x%z��|%\'��H�G�\n���k��e��N`ط2���-!X1���7�p8y�D4q���\Z\0�(#��-��#t��q�L�t��-��j�ܿ6i1h��[w��b�\0�Ԩ߉^�ez���M �<�zO=Q:k)ԫ���+ĩ]�R�`���tߛ��A�\\� l��6�߯���31A�]�4���>��<���)���!V�W�43�\\\n�	R�W�R�iR���T�ZT�R�J�*V�K���f��`��ig��A��հF칰��~���\n�[�J(�a͟ ����E��h��U���k�J��jT�R�J��J��h�T�R�J�*T���W�MȷZ;��煕@x�_�M0�Rp9��J��u��\"ш��*�Ñ�z?�R�3¸e���9�A��PK������t<��~\n�Е�~5�iR�iZV�r�V�r�\\�nSr+/�g��\Z��t*Y��o	rj��Q�H�[U_v5n{�_�\0��\0EI��C�\\��_�U�c7{���=������Y�2��E>�^#\rocށzV�+Z�*T�Z֕�֕�Tt��\0n���w�gzP���ؿ��:\n��/�Z�U��0�O�\nn+r����Z��G�D��|���7h3�?ф J�ҥiP.iZT�R���g�ՠ�Ϫ-r�V�lʕ+�ZT�+Z����r��)��te�2mց蕼hs�@�0�\"+Hf{��R�X\"�$E+k�`����z�����I�&�	��=�Ag\"\n+J�\r�F��J��J�*K-\\������(�?�_�ըwo�T٪�J�R�J�*T�R�J�7��-�Mح+�Q�t/#��Y�q�Vc+G%ٳ�2��jJ@ݽ@. ����H�f��c�?����F��D&Z\Z�X]_qg4�\r@��J�*T����N�A~rƠ���#8!7d���$�e\\q�V�*T�R�JҠ����7�R�Σ�߫!�eO�)=��ԫ՜���}�_D�i�|%][F�c������,,Pn�^H~\0Ά��JҴ�T���2�?��-#�8��6��vg��c5�����Q5�R�J���ܛf���q��_����;\n��E^�b�b�B�e�/���4�^;�\0�&6�?ܹ\'\"�!��@��\Z��@J%�D��$���36�i�^�:Fp�C~���q�3\n�;��*T�D��EJek�qo7�ؿ�����@E~��Q�·�y����Q_M<��P9;[�P�_8{���\"\"P�;��3&��ͻ0�Ҕrۨ���HR�U����{D�/��	,�/�������t*y�����\nf�Q\n[�����J��]��e��)�e��A�GIl�8��k�+��r/��\rV��.������lsU\"�C��Q��Cq8g�$�ZV��i�7\"�X��bO�}��#�S��Z�X\\](�vV��Soo�6~�*�G.��S�n_�$�r�����G.̃�9\'��*�5[.[��D%V�x�`2x���Ç��aErVz��V�1�f�Q�7��~n;�nӐ�%��\0aAg	ye:*T���c�~�\n:K����%�)~�c���R�r����	�Q�TZQ�#g�x�\n��د_)�v�Ξ�w*V��Q5�)��ͩO���{h�*?����1[��mUO|�(�����l_��\0(#Х��Q�9b��ql`a�V����p�3���A�R��:!�Sb%�@��^%x��>��� ��W�rV9�¹�_1s�CT��+����	�o+�ܫ0?�\0Z��ᫀczs���p�X/���j���|�*a��_�\n-�z�����ϗE��~�ףI�lF�����@CC)̯�o�C{��?ut���6�}T���l4ӓ�XP�}��\Zm��6\'�����,lG����*(͇�%}��\'7�>.;�i��ڑ3�-���=&	�>�\n����_�28q�8<]e��k��y�Ӻ�Veh�Tu��c��$j��Igy>`�$��*��O�Y���K���k��Ab.\n@>�9:\n�uݟ���|�(U�����`�%EE�F�N!dC�`\0����z���2�!`�G4#�\09��\0��$U�BE)Y�Z��˳(�W!��Z�4�j�(��,\Z\"�_s0��e�wa��ۦW�n9�%U��V@�p\r�R�(N�rB�ݣ$�ʷ�,}e}׼��h������P\r��N�iL\ne�p��r��%�!Km����0!�m]3~�`Q�tK�����*#�����2���(<{x��j����kZ�����b�> *�l�k��ѳ�1 Z�+�\0�c��^;䇚��L]�l-�+D��^��ix�x���\"�J���()~�:���x�շ�8��u���Y���^�w�՘\ra|w�IZƺsp<P#O��S�v=���[Lm]QMVڴ?\\�.D���8dB�7hc%�K\r���k�	E�q��Ȫ�m>���hKtL����[-�.L%����x�/.��.t+e�������b�W�/�!Y�n^������pB�iϺ��q�S*Uj�.\'zb����:ʴ@t�>���Jeߩg\"xA�x�\02̜����z�u2ޫw�#(�Q[���e��E^���:��bbP�N@�A:0| �D�����\"�}M�?��R���7��y��r��\0HX�d�V��-(��ɩd��j���ip=�~\"���F��ǩ���~c,0�\"A��NP�|ޟ���T.U���$\'���̪6��!�ч�({�7��ނ6r��8�}�P_ܛ�R���e\n���j����i�b�\'��Ej��7�l{���ٍ0�$���F�0���t\ZK��e��/�I�$¨9ٷp���b�9-ǲ`\0{h���Y�&�=T\n�����O��x����Z�p��.��:�2�A�� �#FT�=�v����h\"\Zz�\nڦcd�\0�{gC(w{���1@ø�X���Ak��?���1ey��ܽ�=- d�4X#uj�0�\Z�P\n�ӭ�����b����?V\Z�\nj�r��V���~�p\r����\0�4�k��*TE6�E�e����ʋ���	Y����;����*�e��Ҿ��U��R�T��k-�8�^���j�_�i�����B�^.��]`x\'����bQl-�m4���h�A\r&�s�� ��K�ڏֱf~7�����[��W!n��� ��;��-��O؆����@ĥ)FD{�>�j��\0�0ǜ�\r�ʼ�+�\0@��\"������d\0D��3�r�\Z�{@���#��\r��<��@��8�(!�0�w0z�[@P���2���bS��M����Ƕ\Z!X,O$t&��vO�����>IH\"�[�b,�?�H4���f�Q�d���jK��q`�Ƒ�� �(�L+K��,|�g���g\"Ҡ}�`�B.pe�TjZ5��0����G\'Z�XN�ÿ�`�)�>���\r��]>�<S�<3ǣn���w��\0q%�U�����M�-\"A��n���̮^�Ć n���,m���6��FQOr�`S_�t{�`A����*����W�#���T��)`H�M��W�1 `\Z6m)���i������	�P4��3�l���r`YBC�������1>c��(���Z��7�e��(-�Ae_���J;K�L��&\0�;�)�pXj���<�rV��B|_�0���o<��Ef���V�C%��o�P6N���:D_���%�C��ӁM�w��(�[M��Ӹ&����J�e��ci�J����j\0Ê۸�iq�v&yr@[M��~5\\[���Oo�\r�r�n,a�oJ�e�\0�G�K�D�,^�� �,(;u���*$�C�_v���^K���ey�g��(��H�A��T�f�9�9��`E���\0&�(ܐw�r� ,�q���ly���OEw[ۙn�H���̗��\09o���\r��[0D-ռt��K�Xl\\]����k^h�\0TU�SaUX���X�z%#�=t7�����w���Tw�8�#L����E��<�r�� �ݧ��+;�/3��;N��q���\0IZ#���\\��*�5�g~�b��#����*���\Z���{T���D�oʪ�Z���W�d*��;�	�j\\�����9���PO��&�g�f��\0;R�y����,�nJ\0`�C��0�BT��%0P@�\"�d�B�^f�6M�(��m4/�������ݥ�<Z��=J+g>���g�Rm<��JݙG)�y�[����6\n>\"�p��>��}�u<�E��L��6�9V��U���n�hYe�����\"�%w=��W26^Lx��%�^U�w�ˇ�,�x.�0e�\r->e��U��~��J.��\0r� 89o�X��/�AC!wUGS��');
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
