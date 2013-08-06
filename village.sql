/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50153
Source Host           : localhost:3306
Source Database       : hi

Target Server Type    : MYSQL
Target Server Version : 50153
File Encoding         : 65001

Date: 2013-07-30 07:45:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `village`
-- ----------------------------
DROP TABLE IF EXISTS `village`;
CREATE TABLE `village` (
  `address_id` char(6) DEFAULT NULL,
  `village_moo` varchar(10) DEFAULT NULL,
  `village_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `hos_guid` varchar(38) DEFAULT NULL,
  `village_code` varchar(10) NOT NULL DEFAULT '',
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `out_region` char(1) DEFAULT NULL,
  `village_guid` varchar(38) DEFAULT NULL,
  `doctor_code` varchar(9) DEFAULT NULL,
  `stroke_color` int(11) DEFAULT NULL,
  `fill_color` int(11) DEFAULT NULL,
  `entry_datetime` datetime DEFAULT NULL,
  `out_region_date` date DEFAULT NULL,
  `pcucode` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`village_code`),
  KEY `ix_hos_guid` (`hos_guid`) USING BTREE,
  KEY `ix_village_code` (`village_code`) USING BTREE,
  KEY `ix_village_guid` (`village_guid`) USING BTREE,
  KEY `hos_guid` (`hos_guid`) USING BTREE,
  KEY `village_code` (`village_code`) USING BTREE,
  KEY `village_guid` (`village_guid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of village
-- ----------------------------
INSERT INTO `village` VALUES ('302301', '1', 'ศูนย์กลาง', '{ED7CF432-9C02-4D40-9054-47D3C5C3BC35}', '30230101', '15.7417', '102.2731', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '2', 'โนนรัง', '{AF314210-580C-47DD-A42D-A2787008FA9E}', '30230102', '15.7556', '102.2658\r\n', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '3', 'แก่งโก', '{83020C37-E662-47B5-9129-1887C41C5F50}', '30230103', '15.75670', '102.25130', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '4', 'หนองบง', '{91D7F1DF-224E-41AC-8D70-29B17CB8F128}', '30230104', '15.72410', '102.26091', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '5', 'หนองขามนาดี', '{036ED0C9-84D4-4DA5-A788-ED3F191D79D3}', '30230105', '15.70545', '102.30623\r\n', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '6', 'หนองสะเดา', '{BA8F6BAA-6545-48C0-9E81-FCC2A5B501EA}', '30230106', '15.7742', '102.2695', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '7', 'ฤทธิ์รักษา', '{6B769EDF-AA81-4866-863D-DBFD723E46B9}', '30230107', '15.7546', '102.2546\r\n', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '8', 'หนองแขมพัฒนา', '{CCA08750-7FE8-4F1B-A6FD-0F296E72B6D7}', '30230108', '15.70440', '102.30849\r\n', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '9', 'แก่งขาม', '{779B106F-4B9E-4545-BB78-9C1C18C9584B}', '30230109', '15.74881', '102.25780', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '10', 'หนองเม็กน้อย', '{F95B5253-34F0-412B-ACF3-F02AE0EB5577}', '30230110', '15.70219', '102.30658', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '11', 'ไร่พัฒนา', '{4E669E56-6A9E-4D99-AC54-279AF01E0FA3}', '30230111', '15.7296', '102.2943\r\n', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302301', '12', 'เจริญสุข', '{EC610184-DF8C-4D38-83F9-AA63A45A042D}', '30230112', '15.74887', '102.25424\r\n', null, null, null, null, null, null, null, '99962');
INSERT INTO `village` VALUES ('302303', '1', 'หัวบึง', '{458877B4-16A9-4BF4-859E-41C31FF626B4}', '30230301', null, null, null, null, '0003', null, null, '2013-05-22 11:14:51', null, '02833');
INSERT INTO `village` VALUES ('302303', '2', 'โนนระเวียง', '{84779CFD-3089-411C-87D2-C13BF8D9511A}', '30230302', null, null, null, null, '0004', null, null, '2013-05-22 11:31:59', null, '02833');
INSERT INTO `village` VALUES ('302303', '3', 'หนองบัวกอง', '{BF0888E1-B399-4822-9B71-9AE796D58A6D}', '30230303', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '4', 'พะไล', '{B681DA70-94A3-4753-9CC8-7BEA6E28A7F7}', '30230304', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '5', 'ศาลาหนองขอน', '{6389548D-B229-4711-B777-5395AC7B1BDB}', '30230305', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '6', 'หนองโคบาล', '{2D5308E4-BBC9-4DD1-9289-AE32A7D7E6E1}', '30230306', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '7', 'ห้วยยาง', '{737D1AAD-0F95-4883-A3EF-5A9375B9F4C3}', '30230307', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '8', 'ศิลาทอง', '{BC8F8F40-5E23-497B-855F-35ECD86E5CA8}', '30230308', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '9', 'หนองเต่า', '{BF546C77-D951-481F-9F30-99526838B47A}', '30230309', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '10', 'หนองโพธิ์', '{DA6A4C49-2F42-4438-8D2B-0A58A7044E70}', '30230310', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '11', 'หนองขามน้อย', '{3E261DB3-2F27-4B58-84E7-12B0E8A8B968}', '30230311', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '12', 'บะระเวียง', '{DDE5FDC9-1267-4520-AE2A-D16D6993FF99}', '30230312', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '13', 'หนองโคบาลเหนือ', '{432A6E73-A5A9-48F2-8588-F447CF239E4B}', '30230313', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '14', 'ราชมงคล', '{35DE2FA0-D6CF-41E1-A6F9-7D89A253DEBA}', '30230314', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302303', '15', 'หนองเต่าพัฒนา', '{E23DE91D-FEE2-43D3-A129-4A33C6185A66}', '30230315', null, null, null, null, null, null, null, null, null, '02833');
INSERT INTO `village` VALUES ('302304', '1', 'สีสุก', '{A51196A3-FDA6-4C4E-B50D-C7E74B20F199}', '30230401', null, null, null, null, null, null, null, null, null, '02834');
INSERT INTO `village` VALUES ('302304', '2', 'คร้อ', '{E5F61FF5-1D1D-4A68-A5EE-F1B2AA20C387}', '30230402', null, null, null, null, '0001', null, null, null, null, '02834');
INSERT INTO `village` VALUES ('302304', '3', 'หนองเอี่ยน', '{28852A12-FC63-4A4B-B568-20AE48889B1F}', '30230403', null, null, null, null, null, null, null, null, null, '02834');
INSERT INTO `village` VALUES ('302304', '4', 'โนนดู่', '{4C4D5A22-435C-4FC8-9C08-944FD8D0B7C6}', '30230404', '15.6786529596677', '102.148874999733', null, null, null, '255', '16711680', null, null, '02834');
INSERT INTO `village` VALUES ('302304', '5', 'ดอนไผ่', '{E0BA035B-6959-4F99-993E-273FBFD06989}', '30230405', null, null, null, null, '0005', null, null, null, null, '02834');
INSERT INTO `village` VALUES ('302304', '6', 'โนนฟักทอง', '{56EFEA32-7970-4A4F-9A0B-E56192293A48}', '30230406', null, null, null, null, '0002', null, null, null, null, '02834');
INSERT INTO `village` VALUES ('302304', '7', 'โสกสนวน', '{FF6AAA16-4E54-4E2B-8DDD-B5723B187444}', '30230407', '15.6418158226204', '102.171635571449', null, null, null, '255', '16711680', '2012-08-06 12:21:55', null, '02834');
INSERT INTO `village` VALUES ('302304', '8', 'โนนสูง', '{734536C8-A524-4BBE-8548-5283F414FB2D}', '30230408', null, null, null, null, null, null, null, null, null, '02834');
INSERT INTO `village` VALUES ('302304', '9', 'อัมพวันพัฒนา', '{A408AA0E-4F44-47A6-BD15-6AC2B495C4A6}', '30230409', null, null, null, null, '0003', null, null, null, null, '02834');
INSERT INTO `village` VALUES ('302305', '1', 'หนองบัว', '{163A71D8-9A99-4453-9296-E079ABDAB3A0}', '30230501', '15.703500473128', '102.198793888092', null, null, '0002', '255', '16711680', '2013-06-17 17:15:48', null, '02835');
INSERT INTO `village` VALUES ('302305', '2', 'โนนสะอาด', '{9D2E5EE7-5DBC-4F51-8F28-6EBD7EE8A519}', '30230502', '15.6936159694699', '102.204651832581', null, null, '0002', '255', '16711680', '2013-06-17 17:16:15', null, '02835');
INSERT INTO `village` VALUES ('302305', '3', 'หนองโน', '{1D7A9CD0-4047-4D69-8F4E-930B0D29E863}', '30230503', '15.6994826919427', '102.207827568054', null, null, '0001', '255', '16711680', '2013-06-17 17:16:26', null, '02835');
INSERT INTO `village` VALUES ('302305', '4', 'หัวหนอง', '{C53FDF18-6786-4320-9E7B-A708882AE284}', '30230504', '15.7059895985979', '102.230497598648', null, null, '0001', '255', '16711680', '2013-06-17 17:16:36', null, '02835');
INSERT INTO `village` VALUES ('302305', '5', 'หนองปรือ', '{FE805870-B13A-46C7-A6A4-DD879B7402E4}', '30230505', '15.7239703027049', '102.239788770676', null, null, '0003', '255', '16711680', '2013-06-17 17:16:46', null, '02835');
INSERT INTO `village` VALUES ('302305', '6', 'กุดปลาฉลาด', '{13DDECF9-C076-4171-83CB-DF3657A0A076}', '30230506', '15.7171747953205', '102.233630418777', null, null, '0004', '255', '16711680', '2013-06-17 17:23:19', null, '02835');
INSERT INTO `village` VALUES ('302305', '7', 'โมกมัน', '{B0CD6CF9-CCC4-49E2-8C0D-2F5436E62E89}', '30230507', '15.7180526471797', '102.158195972443', null, null, '0004', '255', '16711680', '2013-06-17 17:22:20', null, '02835');
INSERT INTO `village` VALUES ('302305', '8', 'โนนอุดม', '{2D051997-C2F0-49B5-953A-94EBE374E2E9}', '30230508', '15.719725719065', '102.168989181519', null, null, '0004', '255', '16711680', '2013-06-17 17:22:56', null, '02835');
INSERT INTO `village` VALUES ('302305', '9', 'หนองปรือใหม่', '{EC852A15-27C2-414E-B4AF-303FDE3ED9F1}', '30230509', '15.7223075931387', '102.238233089447', null, null, '0003', '255', '16711680', '2013-06-20 12:23:15', null, '02835');
INSERT INTO `village` VALUES ('302302', '1', 'โนนสำราญ', '{EF1F0145-0E95-4854-9B92-5FABD98108FE}', '30230201', null, null, null, null, '0008', null, null, '2013-06-12 13:11:08', null, '02833');
INSERT INTO `village` VALUES ('302302', '2', 'หนองโดน', '{073549FF-3164-487B-A1E6-0455C61BC4BC}', '30230202', null, null, null, null, '0003', null, null, '2013-06-12 13:10:57', null, '02833');
INSERT INTO `village` VALUES ('302302', '3', 'หนองโสมง', '{F6D68BA1-A6E0-4597-B33C-355CEA1C0E5B}', '30230203', null, null, null, null, '0009', null, null, '2013-06-12 13:10:45', null, '02833');
INSERT INTO `village` VALUES ('302302', '4', 'แก้งสนามนาง', '{9E7EEB84-4BCF-4193-9FF3-78DE504A3CAC}', '30230204', null, null, null, null, '0009', null, null, '2013-06-12 13:10:35', null, '02833');
INSERT INTO `village` VALUES ('302302', '5', 'หนองจาน', '{3ED52DA6-FE07-485E-AFAC-5635B530CCC1}', '30230205', null, null, null, null, '0003', null, null, '2013-06-12 13:10:24', null, '02833');
INSERT INTO `village` VALUES ('302302', '6', 'หินลาด', '{C5C37DAE-6729-49C7-82F7-17C98C1E1787}', '30230206', null, null, null, null, '0003', null, null, '2013-06-12 13:10:08', null, '02833');
INSERT INTO `village` VALUES ('302302', '7', 'นาแค', '{3119F03F-2425-4FD1-9DC4-84E807F1A28E}', '30230207', null, null, null, null, '0002', null, null, '2013-06-12 13:11:20', null, '02833');
INSERT INTO `village` VALUES ('302302', '8', 'โสกน้ำขุ่น', '{4E991398-3A3F-4FD6-8853-C48B68DC9939}', '30230208', null, null, null, null, '0008', null, null, '2013-06-12 13:11:31', null, '02833');
INSERT INTO `village` VALUES ('302302', '9', 'กอก', '{847E21F7-D275-4905-A22D-C1C32735F4FC}', '30230209', null, null, null, null, '0008', null, null, '2013-06-12 13:11:43', null, '02833');
INSERT INTO `village` VALUES ('302302', '10', 'โนนทับญวน', '{E2FB7154-955D-46F2-93FD-6BCDA7DCCCD2}', '30230210', null, null, null, null, '0009', null, null, '2013-06-12 13:11:53', null, '02833');
INSERT INTO `village` VALUES ('302302', '11', 'ไทยสามัคคีธรรม', '{4A71776E-9C6E-4743-A9F4-1075BBC58FAE}', '30230211', null, null, null, null, '0002', null, null, '2013-06-07 09:57:59', null, '02833');
