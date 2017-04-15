/*
Navicat MySQL Data Transfer

Source Server         : wampo
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : uptu

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-10-14 00:31:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `allowed`
-- ----------------------------
DROP TABLE IF EXISTS `allowed`;
CREATE TABLE `allowed` (
  `edit_faculty` int(1) NOT NULL,
  PRIMARY KEY (`edit_faculty`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of allowed
-- ----------------------------
INSERT INTO `allowed` VALUES ('0');

-- ----------------------------
-- Table structure for `branch`
-- ----------------------------
DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `department_id` smallint(2) NOT NULL,
  `course` varchar(10) NOT NULL,
  `depatment` varchar(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `branchName` varchar(30) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of branch
-- ----------------------------
INSERT INTO `branch` VALUES ('10', 'BTECH', 'CS', 'CSE', 'Computer Sc. & Engg.');
INSERT INTO `branch` VALUES ('13', 'BTECH', 'CS', 'IT', 'Information Technology');
INSERT INTO `branch` VALUES ('14', 'MCA', 'CS', 'MCA', 'Master of Computer Application');

-- ----------------------------
-- Table structure for `collegeheads`
-- ----------------------------
DROP TABLE IF EXISTS `collegeheads`;
CREATE TABLE `collegeheads` (
  `collegeId` int(3) NOT NULL,
  `emailId` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`collegeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of collegeheads
-- ----------------------------
INSERT INTO `collegeheads` VALUES ('2', 'rajatsri94@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f');

-- ----------------------------
-- Table structure for `colleges`
-- ----------------------------
DROP TABLE IF EXISTS `colleges`;
CREATE TABLE `colleges` (
  `collegeId` varchar(10) NOT NULL,
  `collegeName` varchar(100) NOT NULL,
  PRIMARY KEY (`collegeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colleges
-- ----------------------------
INSERT INTO `colleges` VALUES ('007', 'ABC');
INSERT INTO `colleges` VALUES ('25', 'ASD');

-- ----------------------------
-- Table structure for `coordinators`
-- ----------------------------
DROP TABLE IF EXISTS `coordinators`;
CREATE TABLE `coordinators` (
  `userId` varchar(50) NOT NULL,
  `branchId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of coordinators
-- ----------------------------

-- ----------------------------
-- Table structure for `info_branch`
-- ----------------------------
DROP TABLE IF EXISTS `info_branch`;
CREATE TABLE `info_branch` (
  `branchId` varchar(50) NOT NULL,
  `branchName` varchar(100) NOT NULL,
  PRIMARY KEY (`branchId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of info_branch
-- ----------------------------
INSERT INTO `info_branch` VALUES ('00', 'Civil Engg.');
INSERT INTO `info_branch` VALUES ('07', 'Mining Engg.');
INSERT INTO `info_branch` VALUES ('10', 'Computer Sc. & engg.');
INSERT INTO `info_branch` VALUES ('11', 'Computer Science');
INSERT INTO `info_branch` VALUES ('12', 'Comp. Engg. & Information Technology');
INSERT INTO `info_branch` VALUES ('13', 'Information Technology');
INSERT INTO `info_branch` VALUES ('14', 'Master of Computer Application');
INSERT INTO `info_branch` VALUES ('15', 'Computer Engg.');
INSERT INTO `info_branch` VALUES ('16', 'Information Science');
INSERT INTO `info_branch` VALUES ('20', 'Electrical Engg.');
INSERT INTO `info_branch` VALUES ('21', 'Electrical & Electronics engg.');
INSERT INTO `info_branch` VALUES ('22', 'Instrumentation & Control Engg.');
INSERT INTO `info_branch` VALUES ('23', 'Instrumentation Engg.');
INSERT INTO `info_branch` VALUES ('30', 'Electronics Engg.');
INSERT INTO `info_branch` VALUES ('31', 'Electronics & Communication Engg.');
INSERT INTO `info_branch` VALUES ('32', 'Electronics & Instrumentation Engg.');
INSERT INTO `info_branch` VALUES ('33', 'Electronics & Telecommunication Engg.');
INSERT INTO `info_branch` VALUES ('34', 'Electronics, Instrumentation & Controll Engg.');
INSERT INTO `info_branch` VALUES ('35', 'Applied Electronics & Instrumentation Engg.');
INSERT INTO `info_branch` VALUES ('40', 'Mechanical Technology');
INSERT INTO `info_branch` VALUES ('41', 'Manufacturing Technology');
INSERT INTO `info_branch` VALUES ('42', 'Metallurgical Engg.');
INSERT INTO `info_branch` VALUES ('43', 'Mechanical & Industrial Engg.');
INSERT INTO `info_branch` VALUES ('44', 'Production Engg.');
INSERT INTO `info_branch` VALUES ('45', 'Industrial & Production Engg.');
INSERT INTO `info_branch` VALUES ('46', 'Production & Industrial Engg.');
INSERT INTO `info_branch` VALUES ('50', 'Bachelor of Pharmacy');
INSERT INTO `info_branch` VALUES ('51', 'Chemical Engg.');
INSERT INTO `info_branch` VALUES ('52', 'Bio-Chemical Engg.');
INSERT INTO `info_branch` VALUES ('53', 'Chemical & Alcohol Technology');
INSERT INTO `info_branch` VALUES ('54', 'Bio-Technology');
INSERT INTO `info_branch` VALUES ('55', 'Chemical & Bio Engg,');
INSERT INTO `info_branch` VALUES ('60', 'Textile Chemistry');
INSERT INTO `info_branch` VALUES ('61', 'Textile Technology');
INSERT INTO `info_branch` VALUES ('62', 'Man-made Fibre Technology');
INSERT INTO `info_branch` VALUES ('63', 'Textile Engg.');
INSERT INTO `info_branch` VALUES ('64', 'Carpet Technology');
INSERT INTO `info_branch` VALUES ('65', 'Bachelor of Fashion & Apparel Design (BFAD)');
INSERT INTO `info_branch` VALUES ('70', 'MBA');
INSERT INTO `info_branch` VALUES ('72', 'MBA (Rural Development)');
INSERT INTO `info_branch` VALUES ('74', 'BHMCT');
INSERT INTO `info_branch` VALUES ('80', 'Agricultural Engg.');
INSERT INTO `info_branch` VALUES ('81', 'Architecture');
INSERT INTO `info_branch` VALUES ('82', 'Food Technology & Engg.');
INSERT INTO `info_branch` VALUES ('83', 'Sugar Technology');
INSERT INTO `info_branch` VALUES ('84', 'Oil Technology');
INSERT INTO `info_branch` VALUES ('85', 'Paint Technology');
INSERT INTO `info_branch` VALUES ('86', 'Leather Technology');
INSERT INTO `info_branch` VALUES ('87', 'Plastic Technology');
INSERT INTO `info_branch` VALUES ('88', 'Ceramic Technology');
INSERT INTO `info_branch` VALUES ('89', 'Agriculture Engineering');

-- ----------------------------
-- Table structure for `info_college`
-- ----------------------------
DROP TABLE IF EXISTS `info_college`;
CREATE TABLE `info_college` (
  `collegeId` int(3) NOT NULL,
  `collegeName` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`collegeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of info_college
-- ----------------------------
INSERT INTO `info_college` VALUES ('1', 'Anand Engineering College', 'AGRA');
INSERT INTO `info_college` VALUES ('2', 'Faculty of Engineering & Technology', 'AGRA');
INSERT INTO `info_college` VALUES ('3', 'Hindustan Institute of Technology and Management', 'AGRA');
INSERT INTO `info_college` VALUES ('4', 'RAJA BALWANT SINGH ENGINEERING TECHNICAL CAMPUS, BICHPURI, AGRA', 'AGRA');
INSERT INTO `info_college` VALUES ('5', 'RAJA BALWANT SINGH MANAGEMENT TECHNICAL CAMPUS, AGRA', 'AGRA');
INSERT INTO `info_college` VALUES ('6', 'Agra Public Institute of Technology & Computer Education (Deptt. of Pharmacy)', 'AGRA');
INSERT INTO `info_college` VALUES ('7', 'Shivdan Singh Institute of Technology & Management', 'ALIGARH');
INSERT INTO `info_college` VALUES ('10', 'United College of Engineering & Research', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('11', 'United Institute of Management', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('12', 'Pharmacy College', 'AZAMGARH');
INSERT INTO `info_college` VALUES ('13', 'Shri Gopichand College Of Pharmacy', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('14', 'Shri Ram Murti Smarak College of Engineering & Technology', 'BAREILLY');
INSERT INTO `info_college` VALUES ('16', 'Rakshpal Bahadur Management Institute', 'BAREILLY');
INSERT INTO `info_college` VALUES ('17', 'Kunwar Satyavira College Of Engineering and Management, Bijnor', 'BIJNOR');
INSERT INTO `info_college` VALUES ('18', 'Babu Banarsi Das Institute Of Engineering Technology & Research Centre', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('19', 'Marathwada Inst. of Technology , ', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('26', 'Jhunjhunwala Business School', 'FAIZABAD');
INSERT INTO `info_college` VALUES ('27', 'Ajay Kumar Garg Engineering College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('28', 'Ideal Institute of Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('29', 'KIET GROUP OF INSTITUTIONS(KRISHNA INSTITUTE OF ENGINEERING AND TECHNOLOGY)', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('30', 'Inderprastha Engineering College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('32', 'Abes Engineering College , Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('33', 'Raj Kumar Goel Institute Of Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('35', 'Babu Banarsi Das Institute Of Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('36', 'Institute of Management Studies', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('37', 'Institute of Management Education', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('38', 'Institute of Technology & Science', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('39', 'Institute of Management & Research', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('40', 'Technical Education & Research Institute, Post Graduate College', 'GHAZIPUR');
INSERT INTO `info_college` VALUES ('41', 'Acharya Narendra Dev College of Pharmacy', 'GONDA');
INSERT INTO `info_college` VALUES ('42', 'M.M.M. Engineering College', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('43', 'Bundelkhand Institute of Engineering & Technology, ', 'JHANSI');
INSERT INTO `info_college` VALUES ('44', 'Uttar Pradesh Textile Technology Institute', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('45', 'Harcourt Butler Technological Institute', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('46', 'Maharana Pratap Engineering College', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('47', 'Dr. Virendra Swarup Institute Of Computer Studies', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('48', 'Dayanand Academy Of Management Studies', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('50', 'College Of Management Studies', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('51', 'Faculty Of Architecture, U P Technical University (Formerly: Lucknow College Of Architecture & GCA)', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('52', 'Institute of Engineering & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('53', 'Azad Institute of Engg. & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('54', 'Babu Banarasi Das National Institute of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('56', 'Babu Banarasi Das Northern India Institute of Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('57', 'International Institute For Special Education (IISE)', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('58', 'Institute Of Environment & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('59', 'Lal Bahadur Shastri Institute of Management & Development Studies,', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('60', 'Gyan Institute of Management & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('61', 'Sherwood College of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('62', 'Motilal Rastogi School of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('64', 'Hindustan College Of Science & Technology', 'MATHURA');
INSERT INTO `info_college` VALUES ('65', 'B.S.A.College Of Engineering & Technology', 'MATHURA');
INSERT INTO `info_college` VALUES ('66', 'Rajeev Academy For Pharmacy', 'MATHURA');
INSERT INTO `info_college` VALUES ('67', 'Hindustan Institute Of Management & Computer Studies', 'MATHURA');
INSERT INTO `info_college` VALUES ('68', 'Meerut Institute Of Engineering & Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('69', 'Radha Govind Engineering College', 'MEERUT');
INSERT INTO `info_college` VALUES ('70', 'College Of Engg. & Rural Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('72', 'IIMT Management College', 'MEERUT');
INSERT INTO `info_college` VALUES ('74', 'Dewan Institute Of Management Studies', 'MEERUT');
INSERT INTO `info_college` VALUES ('75', 'Institute Of Informatics & Management Sciences', 'MEERUT');
INSERT INTO `info_college` VALUES ('76', 'Ghanshyam Binani Academy of Management Sciences', 'MIRZAPUR');
INSERT INTO `info_college` VALUES ('77', 'Dr. K.N. Modi Institute Of Engineering & Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('78', 'Dr. K.N. Modi Institute Of Pharmaceutical Education & Research', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('79', 'Unique Institute Of Management & Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('81', 'Institute Of Foreign Trade And Management', 'MORADABAD');
INSERT INTO `info_college` VALUES ('82', 'Moradabad Institute Of Technology', 'MORADABAD');
INSERT INTO `info_college` VALUES ('83', 'S.D.College of Engineering & Technology', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('84', 'Bhagwant Institute Of Technology', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('85', 'S.D. College Of Management Studies', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('88', 'Apeejay Institute Of Technology, School Of Architecture & Planning,', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('90', 'I.E.C. College Of Engineering & Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('91', 'J.S.S. Academy Of Technical Education', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('92', 'Priyadarshani College Of Computer Sciences', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('93', 'Ram Eesh Institute Of Vocational And Technical Education, ', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('94', 'Galgotias Institute Of Management And Technology (GIMT) ', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('95', 'Mahatama Gandhi Mission College Of Engineering & Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('96', 'Vishveshwarya Institute Of Engineering & Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('97', 'Galgotias College Of Engg. & Technology, ', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('98', 'Institute Of Management Studies, ', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('99', 'Harlal Institute Of Management & Technology (HIMT)', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('100', 'Amity School of Computer Sciences', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('103', 'Shobhit Institute Of Engineering & Technology', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('104', 'Kamla Nehru Institute Of Technology', 'SULTANPUR');
INSERT INTO `info_college` VALUES ('106', 'School Of Management Sciences', 'VARANASI');
INSERT INTO `info_college` VALUES ('107', 'Institute of Computer Science & Technology', 'VARANASI');
INSERT INTO `info_college` VALUES ('108', 'Rajarshi School of Management and Technology (RSMT)', 'VARANASI');
INSERT INTO `info_college` VALUES ('109', 'Aligarh College of Engineering and Technology', 'ALIGARH');
INSERT INTO `info_college` VALUES ('110', 'Institute Of Engineering & Rural Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('112', 'Indian Institute Of Carpet Technology', 'S.R.NAGAR');
INSERT INTO `info_college` VALUES ('113', 'Integrated Academy of Management & Technology (INMANTEC)', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('114', 'Institute of Professional Excellence & Management', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('115', 'Advance Institute Of Management', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('116', 'Jaipuria Institute Of Management', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('117', 'Ram Chameli Chadha Vishvas (Post Graduate) Girls College, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('118', 'Nandani Nagar Mahavidayala College of Pharmacy, ', 'GONDA');
INSERT INTO `info_college` VALUES ('119', 'Maharana Pratap Mangla Devi Insititute of Computer Science Tech. & Mgt.', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('120', 'Institute Of Technology & Management', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('121', 'Subhash Institute Of Software Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('122', 'Shri Ramswaroop Memorial College Of Engineering & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('123', 'Saroj Institute of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('124', 'Institute Of Co-Operative & Corporate Management, Research & Training', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('126', 'Sachdeva Institute of Technology', 'MATHURA');
INSERT INTO `info_college` VALUES ('127', 'IIMT Engineering College', 'MEERUT');
INSERT INTO `info_college` VALUES ('128', 'Bharat Institute Of Technology (School Of Engineering)', 'MEERUT');
INSERT INTO `info_college` VALUES ('129', 'Forte Institute of Technology (FIT)', 'MEERUT');
INSERT INTO `info_college` VALUES ('132', 'Greater Noida Institute Of Technology (Engineering Institute)', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('133', 'Noida Institute Of Engg. & Technology (Engineering Institute)', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('134', 'Sacred Heart Institute Of Managament & Technology, ', 'SITAPUR');
INSERT INTO `info_college` VALUES ('135', 'Kamla Nehru Institute of Physical & Social Sciences', 'SULTANPUR');
INSERT INTO `info_college` VALUES ('136', 'S.D.College Of Pharmacy And Vocational Studies, ', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('138', 'B.B.S.College of Enginering and Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('139', 'Kali Charan Nigam Institute Of Technology', 'BANDA');
INSERT INTO `info_college` VALUES ('140', 'Institute Of Environment & Management', 'BARABANKI');
INSERT INTO `info_college` VALUES ('141', 'Sagar Institute of Technology & Management', 'BARABANKI');
INSERT INTO `info_college` VALUES ('142', 'Khandelwal College of Management Science and Technology', 'BAREILLY');
INSERT INTO `info_college` VALUES ('143', 'Ims Engineering College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('144', 'Prasad Institute f Technology', 'JAUNPUR');
INSERT INTO `info_college` VALUES ('145', 'SR Group of Institutions(College Of Science and Engineering)', 'JHANSI');
INSERT INTO `info_college` VALUES ('146', 'B.D.S.Institute of Management', 'MEERUT');
INSERT INTO `info_college` VALUES ('148', 'Teerthanker Mahaveer Institute of Management & Technology', 'MORADABAD');
INSERT INTO `info_college` VALUES ('149', 'Centre For Management Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('150', 'College of Engineering & Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('151', 'Global Institute of Information Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('152', 'Mangalmay Institute of Management and Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('153', 'Skyline Institute of Engineering & Technology, ', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('154', 'Faculty of Management And Technology', 'VARANASI');
INSERT INTO `info_college` VALUES ('155', 'Ewing Christian Institute of Management & Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('156', 'Central Institute of Computer & Management Education', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('157', 'Institute of Hotel Managememt Catering Technology & Applied Nutrition', 'MEERUT');
INSERT INTO `info_college` VALUES ('158', 'Janhit Institute of Education & Information', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('159', 'J.P. Institute of Hotel Management & Catering Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('161', 'Krishna Engineering College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('162', 'Shambhunath Institute of Engg. & Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('163', 'Dr. M.C. Saxena College of Engineering & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('164', 'Pranveer Singh Institute of Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('165', 'Kanpur Institute of Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('166', 'Dr. Ambedkar Institute of Technology for Handicapped', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('167', 'Rajarshi Rananjay Sinh College of Pharmacy', 'SULTANPUR');
INSERT INTO `info_college` VALUES ('168', 'Smt. Vidyawati College of Pharmacy', 'JHANSI');
INSERT INTO `info_college` VALUES ('169', 'Rakshpal Bahadur College of Pharmacy', 'BAREILLY');
INSERT INTO `info_college` VALUES ('170', 'I.T.S. Paramedical College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('171', 'Shri R.L.T. Institute of Pharmaceutical Science & Technology College', 'ETAWAH');
INSERT INTO `info_college` VALUES ('172', 'Lloyd Institute of Management & Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('173', 'Rajiv Academy For Technology & Management', 'MATHURA');
INSERT INTO `info_college` VALUES ('174', 'Kishan Institute of Information Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('175', 'Al-Barkaat Institute of Management Studies', 'ALIGARH');
INSERT INTO `info_college` VALUES ('176', 'I.I.L.M. Academy for Higher Learning', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('177', 'Indira Gandhi Institute of Co-Operative Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('179', 'Jeevandeep Institute of Management & Technology, ', 'VARANASI');
INSERT INTO `info_college` VALUES ('180', 'M.P. Institute of Management & Computer Application', 'VARANASI');
INSERT INTO `info_college` VALUES ('181', 'S.T.E.P.- H.B.T.I.', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('182', 'Kalka Institute For Research & Advanced Studies (Kiras )', 'MEERUT');
INSERT INTO `info_college` VALUES ('183', 'Pt. Sujan Singh Degree College', 'MEERUT');
INSERT INTO `info_college` VALUES ('184', 'Institute of Management Sciences', 'VARANASI');
INSERT INTO `info_college` VALUES ('185', 'Iimt Hotel Management College', 'MEERUT');
INSERT INTO `info_college` VALUES ('186', 'Kamla Nehru Institute of Management & Technology', 'SULTANPUR');
INSERT INTO `info_college` VALUES ('187', 'Feroze Gandhi Institute of Engg. & Technology', 'RAIBAREILLY');
INSERT INTO `info_college` VALUES ('188', 'Advance Institute of Biotech & Paramedical Sciences', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('189', 'Central Institute of Plastic Enginerring & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('190', 'Doeacc Society', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('191', 'Invertis Institute of Engg. & Technology', 'BAREILLY');
INSERT INTO `info_college` VALUES ('192', 'Ganeshi Lal Bajaj Institute of Technology & Management', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('193', 'United College of Engg. & Research', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('194', 'H.R.Institute of Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('195', 'K.N.G.D. Modi Engieering College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('196', 'College of Engineering, Science & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('197', 'Azad Institute of Pharmacy & Research', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('198', 'Iimt College of Medical Sciences', 'MEERUT');
INSERT INTO `info_college` VALUES ('199', 'KIET GROUP OF INSTITUTIONS(KIET SCHOOL OF PHARMACY)', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('200', 'Maharana Pratap College Of Pharmacy', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('201', 'Nkbr College of Pharmacy & Research Centre', 'MEERUT');
INSERT INTO `info_college` VALUES ('202', 'Hygia Institute of Pharmaceutical Education And Research', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('203', 'Rameshwaram Institute of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('204', 'R. V. Northland Institute', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('205', 'Institute of Pharmacy', 'VARANASI');
INSERT INTO `info_college` VALUES ('206', 'Translam Institute of Pharmaceutical Education & Research', 'MEERUT');
INSERT INTO `info_college` VALUES ('207', 'Vishveshwarya Institute of Medical Sciences', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('210', 'Vivek College of Technical Education', 'BIJNOR');
INSERT INTO `info_college` VALUES ('211', 'Rakshpal Bahadur Management Institute', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('212', 'United Institute of Management', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('213', 'Hindustan Institute of Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('214', 'Himt College of Pharmacy', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('215', 'Shree Ganpati Institute of Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('216', 'Iimt College of Engineering', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('217', 'D.J.College of Pharmacy', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('219', 'Bhagwant Institute of Pharmacy', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('220', 'Hi-Tech Institute of Engineering & Technology, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('221', 'Institute of Engineering And Technology', 'SITAPUR');
INSERT INTO `info_college` VALUES ('222', 'I.T.S.Engineering College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('223', 'Vivekanand Institute of Technology And Science', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('224', 'Lord Krishna College of Engineering', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('225', 'Accurate Institute of Management & Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('226', 'DJ College of Engineering & Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('227', 'Innovative College of Pharmacy', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('228', 'Sanjivnie College of Pharmacy', 'BAHRAICH');
INSERT INTO `info_college` VALUES ('229', 'Vidya College of Engineering', 'MEERUT');
INSERT INTO `info_college` VALUES ('230', 'Dronacharya Group of Institution', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('231', 'R. D. Engineering College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('232', 'Adarsh Vijendra Institute of Pharmaceutical Sciences', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('233', 'R.K Pharmacy College', 'AZAMGARH');
INSERT INTO `info_college` VALUES ('234', 'Aligarh College of Pharmacy', 'ALIGARH');
INSERT INTO `info_college` VALUES ('235', 'Rajeev Gandhi College of Pharmacy', 'MAHARAJGANJ');
INSERT INTO `info_college` VALUES ('236', 'Sir Madan Lal Institute of Pharmacy', 'ETAWAH');
INSERT INTO `info_college` VALUES ('237', 'H.R. Institute of Hotel Management', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('238', 'N. I. M. T. Institute of Hospital And Farma Management', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('239', 'Ishwar Chand Vidya Sagar Institute of Technology', 'MATHURA');
INSERT INTO `info_college` VALUES ('240', 'Sunderdeep Engineering College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('241', 'Shambhunath Institute of Pharmacy', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('243', 'College Of Pharmacy', 'AGRA');
INSERT INTO `info_college` VALUES ('244', 'Anand College Of Pharmacy', 'AGRA');
INSERT INTO `info_college` VALUES ('245', 'H.R.Institute of Pharmacy', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('246', 'Dayanand Dinanath College, Institute of Pharmacy', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('247', 'IIMT College of Pharmacy', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('248', 'Society of Advanced Management Studies, Institute of Hotel Management', 'VARANASI');
INSERT INTO `info_college` VALUES ('249', 'SRI Ram College of Management', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('250', 'B.B.S. Institute of Management Studies', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('252', 'Sanjay Institute of Engineering and Management', 'MATHURA');
INSERT INTO `info_college` VALUES ('253', 'Mewar Institute', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('254', 'Bhabha Institute of Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('255', 'J.S. Institute of Management and Technology', 'SIKOHABAD');
INSERT INTO `info_college` VALUES ('256', 'Dns College of Engineering And Technology', 'J.P.NAGAR');
INSERT INTO `info_college` VALUES ('257', 'Saraswati Institute of Technology And Management', 'UNNAO');
INSERT INTO `info_college` VALUES ('258', 'Institute of Pharmacy', 'SITAPUR');
INSERT INTO `info_college` VALUES ('259', 'Sunderdeep College of Pharmacy', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('260', 'IBNE Seena Pharmacy College', 'HARDOI');
INSERT INTO `info_college` VALUES ('261', 'Shakti College of Pharmacy, Dulhinpur', 'BALRAMPUR');
INSERT INTO `info_college` VALUES ('262', 'Institute of Pharmaceutical Sciences & Research (Ipsr)', 'UNNAO');
INSERT INTO `info_college` VALUES ('263', 'Vidya School of Business', 'MEERUT');
INSERT INTO `info_college` VALUES ('264', 'B.N. Degree College (MBA)', 'HARDOI');
INSERT INTO `info_college` VALUES ('265', 'Sir Madanlal Institute of Management', 'ETAWAH');
INSERT INTO `info_college` VALUES ('266', 'LTR Institute of Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('267', 'Sanjay College of Pharmacy', 'MATHURA');
INSERT INTO `info_college` VALUES ('269', 'Sherwood College of Pharmacy', 'BARABANKI');
INSERT INTO `info_college` VALUES ('270', 'IEC Institute of Hotel Management', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('271', 'Bharat Institute of Technology (School of Management)', 'MEERUT');
INSERT INTO `info_college` VALUES ('272', 'Greater Noida Institute of Technology(MBA Institute)', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('273', 'Noida Institute of Engineering & Technology(MCA Institute)', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('274', 'Narvadeshwar Management College', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('275', 'M.D. College, Sikandra', 'AGRA');
INSERT INTO `info_college` VALUES ('276', 'Deen Dayal College of Management', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('277', 'Patronage Institute of Management Studies', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('278', 'Aryan Institute Of Management And Computer Studies', 'AGRA');
INSERT INTO `info_college` VALUES ('279', 'Sri Ram Institute Of Management', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('280', 'Apex Institute Of Technology', 'RAMPUR');
INSERT INTO `info_college` VALUES ('281', 'Sherwood College Of Engineering Research & Technology', 'BARABANKI');
INSERT INTO `info_college` VALUES ('282', 'J.P.Institute Of Engineering & Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('283', 'Ldc Institute Of Technical Studies', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('284', 'United Institute of Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('285', 'Institute Of Technology & Management', 'MEERUT');
INSERT INTO `info_college` VALUES ('286', 'Vishveshwarya Institute of Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('287', 'Naraina College of Engineering & Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('288', 'Venkateshwara Institute of Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('289', 'Institute of Engineering & Management', 'MATHURA');
INSERT INTO `info_college` VALUES ('290', 'Abes Institute Of Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('291', 'Dit School Of Engineering', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('292', 'Meerut Institute Of Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('293', 'Rama Institute Of Engg. & Tech.', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('295', 'B.B.S Institute of Pharmaceutical & allied Sciences', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('297', 'DCET Business School (DBS)', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('299', 'Doon College of Education, Saharanpur', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('300', 'Saraswati Higher Education & Technical College of Pharmacy', 'VARANASI');
INSERT INTO `info_college` VALUES ('301', 'Sagar Institute of Technology & Management Department of Pharmacy', 'BARABANKI');
INSERT INTO `info_college` VALUES ('303', 'Dr. M.C.Saxena College Of Pharmacy', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('305', 'Aryabhatt College Of Engineering & Technology,', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('306', 'Disha Institute Of Science & Technology', 'BIJNOR');
INSERT INTO `info_college` VALUES ('307', 'Dayanad Dinanath College Of Management, ', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('308', 'Ishwar Chand Vidya Sagar Institute of Management , ', 'MATHURA');
INSERT INTO `info_college` VALUES ('309', 'Raj Kumar Goel Engineering College', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('310', 'Dr. Rizvi College Of Engineering, Karari', 'KAUSHAMBI');
INSERT INTO `info_college` VALUES ('311', 'Dewan V.S. Institute Of Engineering & Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('312', 'Abss Institute Of Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('315', 'United Institute Of Pharmacy, U.C.E.R', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('316', 'Aryakul College Of Pharmacy & Research', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('318', 'Vidya Institute of Fashion Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('319', 'Rakshpal Bahadur College of Engineering & Technology', 'BAREILLY');
INSERT INTO `info_college` VALUES ('320', 'Inverties Institute of Engineering & Management', 'BAREILLY');
INSERT INTO `info_college` VALUES ('321', 'Translam Institute of Technology & Management', 'MEERUT');
INSERT INTO `info_college` VALUES ('323', 'Spectrum Institute Of Pharmaceutical Sciences And Research (Sipsar)', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('324', 'Anjali College of Pharmacy and Science', 'AGRA');
INSERT INTO `info_college` VALUES ('326', 'Sunder Deep College of Hotel Management', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('327', 'Sunder Deep College of Architechture', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('328', 'Sunder Deep College Of Engineering & Technology, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('329', 'Ghaziabad Institute of Management & Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('330', 'Saraswati Institute Of Engineering & Technology, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('331', 'D.S.Institute Of Technology & Management, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('332', 'Maharaja Agrasain Institute of Technology, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('333', 'Raj Kumar Goel Institute Of Technology For Women, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('334', 'Rishi Chadha Vishvas Girls Institute Of Technology , ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('335', 'Shamli Institute Of Engineering & Technology, ', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('336', 'Roorkee Engineering & Management Technology Institute, ', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('337', 'R.B. Institute Of Technology', 'AGRA');
INSERT INTO `info_college` VALUES ('338', 'K. P. Engineering College', 'AGRA');
INSERT INTO `info_college` VALUES ('339', 'ACN College of Engineering & Management Studies', 'ALIGARH');
INSERT INTO `info_college` VALUES ('340', 'Vivekananda College Of Technology & Management', 'ALIGARH');
INSERT INTO `info_college` VALUES ('341', 'Institute Of Technology & Management', 'ALIGARH');
INSERT INTO `info_college` VALUES ('342', 'United College of Engineering & Management', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('343', 'Allahabad Institute of Engineering & Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('344', 'Shri Gopi Chand Institute Of Technology & Management', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('345', 'Seth Vishambhar Nath Institute Of Engineering & Technology', 'BARABANKI');
INSERT INTO `info_college` VALUES ('346', 'Institute Of Technology (Exclusive Engg. College For Girls)', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('348', 'PSIT College of Engineering', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('349', 'Maharana Institute Of Professional Studies', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('350', 'Indus Institute Of Technology & Management', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('351', 'Krishna Institute Of Technology, ', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('352', 'Krishna Girls Engineering College', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('353', 'Apollo Institute of Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('354', 'Bhabha Institute of Science & Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('355', 'Bhabha College Of Engineering', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('356', 'Sri Krishna Yogi Raj Technical Institute', 'HATHRAS');
INSERT INTO `info_college` VALUES ('357', 'Aryavart Institute Of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('358', 'Rameshwaram Institute of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('359', 'Prasad Institute of Management and Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('360', 'Goel Institute Of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('361', 'R.R. Institute of Modern Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('362', 'Lucknow Institute Of Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('363', 'Ambalika Institute Of Management & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('364', 'S P Memorial Institute Of Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('366', 'Nikhil Institute of Engineering & Management', 'MATHURA');
INSERT INTO `info_college` VALUES ('367', 'Bon Maharaj Engineering College', 'MATHURA');
INSERT INTO `info_college` VALUES ('368', 'Excel Institute Of Management & Technology', 'MATHURA');
INSERT INTO `info_college` VALUES ('369', 'IAMR College of Engineering', 'MEERUT');
INSERT INTO `info_college` VALUES ('370', 'Shanti Institute Of Technology,', 'MEERUT');
INSERT INTO `info_college` VALUES ('371', 'IIMT Institute Of Engineering & Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('372', 'Kishan Institute of Engineering & Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('373', 'Neelkanth Institute of Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('374', 'Rishi Institute of Engineering & Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('375', 'Shree Bankey Bihari Institute Of Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('376', 'Bansal Institute Of Engineering & Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('377', 'Gyan Bharti Institute Of Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('379', 'ESAR College of Engineering', 'MEERUT');
INSERT INTO `info_college` VALUES ('380', 'Modinagar Institute of Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('381', 'Krishna Institute Of Management & Technology', 'MORADABAD');
INSERT INTO `info_college` VALUES ('382', 'Kamla Nehru Institute of Physical & Social Sciences', 'SULTANPUR');
INSERT INTO `info_college` VALUES ('383', 'Rajarshi Rananjay Sinh Institute of Management & Technology', 'SULTANPUR');
INSERT INTO `info_college` VALUES ('384', 'Saraswati Higher Education & Technical College Of Engineering', 'VARANASI');
INSERT INTO `info_college` VALUES ('385', 'Murti Devi Memorial College', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('386', 'M.K.R.P.G. Institute of Technology, ', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('387', 'SR Group of Institutions (College of Pharmacy)', 'JHANSI');
INSERT INTO `info_college` VALUES ('389', 'Oxford College Of Pharmacy', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('390', 'K.R.S. College of Pharmacy', 'GONDA');
INSERT INTO `info_college` VALUES ('391', 'Mahatma Gandhi Institute Of Pharmacy', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('392', 'Goel Institute Of Pharmacy & Sciences', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('393', 'Varanasi College of Pharmacy', 'VARANASI');
INSERT INTO `info_college` VALUES ('394', 'College of Business Studies', 'AGRA');
INSERT INTO `info_college` VALUES ('395', 'Vtech Institute Of Integrated Technology, ', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('396', 'Aryakul Collge of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('397', 'T.D.L.College of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('398', 'Bhalchandra Institute Of Education & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('399', 'A C M E Institute Of Management & Technology', 'BAREILLY');
INSERT INTO `info_college` VALUES ('403', 'K.R.S. College of Management', 'GONDA');
INSERT INTO `info_college` VALUES ('404', 'Indradev Institute Of Education & Technology', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('405', 'Aryabhatt College Of Management & Technology', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('406', 'M.C.A.T. Education', 'MEERUT');
INSERT INTO `info_college` VALUES ('407', 'Shree Bankey Bihari Institute Of Management', 'MEERUT');
INSERT INTO `info_college` VALUES ('408', 'Chandra Mauli Institute Of Management Sciences & Technology, ', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('409', 'Shamli Institute Of Management & Computer Technology', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('410', 'R.S.D. Academy (College Of Management & Technology)', 'MORADABAD');
INSERT INTO `info_college` VALUES ('411', 'H.M.F.A.Memorial Institute Of Engineering & Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('412', 'Aryan Institute Of Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('413', 'Vedant Institute of Management & Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('414', 'Bhagwati Institute Of Technology & Science', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('415', 'Alpine College Of Engineering, ', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('416', 'GNIT Girls Institute of Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('418', 'Vidya Bhavan College For Engineering Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('419', 'Prabhat Engineering College', 'RAMABAI NAGAR');
INSERT INTO `info_college` VALUES ('421', 'Surya School Of Planning & Engineering Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('422', 'Bansal Institute Of Engineering & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('423', 'School of Management Science (SMS Institute of Technology)', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('424', 'Institute Of Advanced Management & Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('425', 'Meerut International Institute Of Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('426', 'Doon College of Engineering & Technology', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('427', 'Dayanand Dinanath Institute of Technology', 'UNNAO');
INSERT INTO `info_college` VALUES ('428', 'Kashi Institute Of Technology', 'VARANASI');
INSERT INTO `info_college` VALUES ('429', 'Naraina Vidya Peeth Engineering & Management Institute', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('430', 'Maharana Institute Of Technology & Science', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('431', 'B.N.College of Engineering & Technology(BNCET)', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('433', 'Meerut Institute Of Engineering & Technology (MCA Institute)', 'MEERUT');
INSERT INTO `info_college` VALUES ('434', 'Jagran Institute Of Management', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('435', 'Meerut Institute of Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('436', 'K. P. College Of Management', 'AGRA');
INSERT INTO `info_college` VALUES ('437', 'B.B.S. Institute of Management & Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('438', 'Vivek College Of Management & Technology', 'BIJNOR');
INSERT INTO `info_college` VALUES ('439', 'Mewar Girls Business School, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('440', 'Naraina Vidya Peeth Management Institute , ', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('441', 'Central Institute of Management & Technology, ', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('442', 'Sardar Bhagat Singh College Of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('443', 'Excel School Of Business,', 'MATHURA');
INSERT INTO `info_college` VALUES ('444', 'Mahaveer Institute Of Technology, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('445', 'Dr. Ram Manohar Lohia Institute , ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('446', 'Institute Of Professional Studies & Research (IPSR),', 'UNNAO');
INSERT INTO `info_college` VALUES ('447', 'Gokaran Narvadeshwar Institute Of Technology & Management', 'BARABANKI');
INSERT INTO `info_college` VALUES ('448', 'Neelam College of Engineering & Technology', 'AGRA');
INSERT INTO `info_college` VALUES ('449', 'K.S. Jain Institute Of Engineering & Technology, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('450', 'Shri Ram Murti Smarak Women College Of Engineering & Technology, ', 'BAREILLY');
INSERT INTO `info_college` VALUES ('451', 'Women Institute of Engineering & Technology, ', 'SITAPUR');
INSERT INTO `info_college` VALUES ('452', 'Bhagwant Institute Of Technology For Women', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('453', 'Kunwar Hari Bansh Singh College of Pharmacy, ', 'JAUNPUR');
INSERT INTO `info_college` VALUES ('455', 'Navneet College Of Technology & Management, ', 'AZAMGARH');
INSERT INTO `info_college` VALUES ('456', 'Pratap College Of Management, ', 'FATEHPUR');
INSERT INTO `info_college` VALUES ('458', 'I.E.C. College of Engineering & Technology (MCA Institute)', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('459', 'Academy Of Business & Engineering Sciences,', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('460', 'Anupama College Of Engineering, ', 'AGRA');
INSERT INTO `info_college` VALUES ('461', 'Chatrapati Shahu ji Maharaj College of Engineering and Technology, ', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('463', 'NIMT Mahila Techinal College for Pharmacy, ', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('464', 'NIMT Mahila Techinal College for Hotel Management & Catering Tech.', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('465', 'Himalayan Institute of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('467', 'Madhu Vachaspati Institute Of Engineering And Technology', 'KAUSHAMBI');
INSERT INTO `info_college` VALUES ('468', 'Satyam College Of Engineering,', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('469', 'Satyam College Of Management,', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('470', 'Devprayag Institute Of Technical Studies, ', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('471', 'Eshan College Of Engg, Farah,', 'MATHURA');
INSERT INTO `info_college` VALUES ('472', 'Institute Of Technology And Management, ', 'MAHARAJGANJ');
INSERT INTO `info_college` VALUES ('473', 'G.C.R.G. Memorial Trusts Group Of Institutions,Faculty Of Engineering, ', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('474', 'Shri Siddhi Vinayak Institute Of Technology,', 'BAREILLY');
INSERT INTO `info_college` VALUES ('475', 'Shri Jeet Ram Smarak Institute Of Engg. Andtechnology,', 'BAREILLY');
INSERT INTO `info_college` VALUES ('476', 'Future Institute Of Engineering And Technology,', 'BAREILLY');
INSERT INTO `info_college` VALUES ('477', 'Sunder Deep College of Engg And Research Centre', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('478', 'ACME College Of Engg.Muradnagar , ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('479', 'Rajshree Institute Of Management & Technology,  ', 'BAREILLY');
INSERT INTO `info_college` VALUES ('480', 'North India Institute Of Technology, ', 'BIJNOR');
INSERT INTO `info_college` VALUES ('481', 'K.L.S. Institute of Engg and Technology, ', 'BIJNOR');
INSERT INTO `info_college` VALUES ('482', 'Millennium Institute Of Technology', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('483', 'Institute Of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('484', 'Lucknow Model Institute Of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('485', 'S.R. Institute Of Management & Technology,', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('486', 'A.N.A. College Of Engineering & Management Studies, ', 'BAREILLY');
INSERT INTO `info_college` VALUES ('487', 'Panchwati Institute Of Engineering & Technology, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('488', 'Shrinathji Institute For Technical Education,', 'MEERUT');
INSERT INTO `info_college` VALUES ('489', 'Dr. Z.H. Institute Of Technology & Management,', 'AGRA');
INSERT INTO `info_college` VALUES ('490', 'Suyash Institute Of Information Technology, ', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('491', 'Shriram Institute Of Technology,', 'MEERUT');
INSERT INTO `info_college` VALUES ('492', 'KCC Institute Of Technology & Management, ', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('493', 'Maharaja Agrasen College Of Engineering And Technology, Moradabad Highway,', 'J.P.NAGAR');
INSERT INTO `info_college` VALUES ('494', 'Sri Sri Institute Of Technology And Management (S.S.I.T.M.) ,', 'KANSHIRAM NAGAR');
INSERT INTO `info_college` VALUES ('495', 'Focus Institute Of Engineering & Management, ', 'BAREILLY');
INSERT INTO `info_college` VALUES ('496', 'FIT Engineering College,', 'MEERUT');
INSERT INTO `info_college` VALUES ('497', 'Om Sai Institute Of Technology & Science', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('498', 'Delhi Institute Of Engineering & Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('499', 'Veer Kunwar Institute Of Technology', 'BIJNOR');
INSERT INTO `info_college` VALUES ('500', 'Trident Et Group Of Institutions, Faculty Of Engineering', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('501', 'R.V. Institute Of Technology', 'BIJNOR');
INSERT INTO `info_college` VALUES ('502', 'Dev Bhoomi Groups Of Institutions,Faculty Of Engineering', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('503', 'P.K. Institute Of Technology & Management, ', 'MATHURA');
INSERT INTO `info_college` VALUES ('504', 'Asia School Of Engineering & Management', 'BARABANKI');
INSERT INTO `info_college` VALUES ('505', 'Allenhouse Institute Of Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('506', 'International College Of Engineering, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('507', 'R.D. Foundation Group Of Institutions,Faculty Of Engineering', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('508', 'Babu Banarasi Das Educational Society Group Of Institutions, Faculty Of Engineering', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('509', 'Shri Girraj College Of Engineering & Management, ', 'MATHURA');
INSERT INTO `info_college` VALUES ('510', 'Trident Et Group Of Institutions, Faculty Of Management', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('511', 'G.L. Bajaj Institute Of Engineering & Technology, ', 'MATHURA');
INSERT INTO `info_college` VALUES ('512', 'Mass College Of Engineering And Management, ', 'HATHRAS');
INSERT INTO `info_college` VALUES ('513', 'R.V. Northland Institute Of Technology,', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('514', 'Shanti Nikatan Trusts Group Of Instituions', 'MEERUT');
INSERT INTO `info_college` VALUES ('515', 'Dr. K.N. Modi Girls Engineering College, ', 'MODINAGAR');
INSERT INTO `info_college` VALUES ('516', 'Kailash Institute Of Pharmacy & Management , ', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('517', 'KIPM College Of Management, ', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('518', 'SSLD Varshney Engineering College', 'ALIGARH');
INSERT INTO `info_college` VALUES ('519', 'Bhagwant Institute Of Technology , ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('520', 'Indraprastha Institute Of Management And Technology', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('521', 'Kothiwal institute of Technology and Professional Studies', 'MORADABAD');
INSERT INTO `info_college` VALUES ('522', 'MAHARANA PRATAAP COLLEGE OF ENGINEERING', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('523', 'Vision Institute of Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('524', 'Vision Institute of Technology', 'ALIGARH');
INSERT INTO `info_college` VALUES ('525', 'Buddha Institute of Technology', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('526', 'Dr. M.C. Saxena Institute of Engineering and Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('527', 'Sunrise Institute of Engineering Technology & Management', 'UNNAO');
INSERT INTO `info_college` VALUES ('528', 'Ram-Eesh Institute of Engineering and Technology,Gautam Buddh Nagar', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('529', 'Lucknow Institute Of Technology & Management,', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('531', 'Rama Institute Of Technology, ', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('532', 'Murli Manohar Agrawal Institute Of Technology,', 'MATHURA');
INSERT INTO `info_college` VALUES ('533', 'R.V. Northland Institute Of Management,', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('534', 'Mahaveer Institute Of Technology And Management,', 'RAIBAREILLY');
INSERT INTO `info_college` VALUES ('535', 'Rajendra Prasad College of Management,', 'AZAMGARH');
INSERT INTO `info_college` VALUES ('536', 'Shree jee Baba Institute of Professional Studies', 'MATHURA');
INSERT INTO `info_college` VALUES ('537', 'V K Jain Institute Of Management', 'KANSHIRAM NAGAR');
INSERT INTO `info_college` VALUES ('538', 'Aks Management College, Bakshi-Ka-Talab,', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('539', 'St. Bosco College Of Management,', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('540', 'Krishna Institute Of Management, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('541', 'Amardeep College Of Engineering And Management', 'FIROZABAD');
INSERT INTO `info_college` VALUES ('542', 'Shri Krishna College Of Engineering, ', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('543', 'Baba Kadhera Singh College Of Engineering And Technology, ', 'MATHURA');
INSERT INTO `info_college` VALUES ('544', 'Kalka Engineering College, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('545', 'Jahangirabad Educational Trust Group Of Institutions , Faculty Engineering , ', 'BARABANKI');
INSERT INTO `info_college` VALUES ('546', 'Seth Sriniwas Agarwal Institute Of Engineering And Technology, ', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('547', 'Chaudhary Beeri Singh College Of Engineering And Management, ', 'AGRA');
INSERT INTO `info_college` VALUES ('548', 'Dewan V.S. Institute Of Hotel Management & Technology, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('549', 'Radha Govind Institute Of Pharmacy, ', 'MORADABAD');
INSERT INTO `info_college` VALUES ('550', 'Kanpur Institute Of Technology & Pharmacy', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('551', 'Kashi Institute Of Pharmacy , ', 'VARANASI');
INSERT INTO `info_college` VALUES ('552', 'Chandra Shekhar Singh College Of Pharmacy, ', 'KAUSHAMBI');
INSERT INTO `info_college` VALUES ('554', 'Naraina Vidya Peeth Group Of Institutions', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('556', 'Naraina Vidya Peeth Group Of Institutions', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('557', 'Shanti Niketan Group Of Institutions,', 'MEERUT');
INSERT INTO `info_college` VALUES ('558', 'Regency Institute of Management & Technology,', 'SITAPUR');
INSERT INTO `info_college` VALUES ('559', 'Sir Madan Lal Institute of Management studies,', 'ETAWAH');
INSERT INTO `info_college` VALUES ('560', 'Adharshila College Of Management Studies', 'MEERUT');
INSERT INTO `info_college` VALUES ('561', 'Hari College Of Management', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('562', 'Sri Ram Instiute of Management and Technology, ', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('563', 'Kanpur Instiute of Business management, ', 'UNNAO');
INSERT INTO `info_college` VALUES ('564', 'Vidyadeep Institute of Management', 'MEERUT');
INSERT INTO `info_college` VALUES ('565', 'Shri Giriraj Maharaj College, ', 'MATHURA');
INSERT INTO `info_college` VALUES ('566', 'Future Institute Of Management And Technology, ', 'BAREILLY');
INSERT INTO `info_college` VALUES ('567', 'Bora Institute of Management Sciences,', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('568', 'Seth Sri Nivas Agarwal Institute of Management', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('569', 'Institute Of Planning & Management,', 'JAUNPUR');
INSERT INTO `info_college` VALUES ('570', 'College Of Innovative Management & Science', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('571', 'Dr. B.R. Ambedkar Pooja College Of Pharmacy', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('572', 'Lucknow Institute Of Pharmcy', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('574', 'KNGD Modi Institute Of Pharmaceutical Education & Research', 'MODINAGAR');
INSERT INTO `info_college` VALUES ('575', 'Malti Memorial Trusts Csm “Group Of Institutions”, Faculty Of B. Pharmacy, ', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('576', 'Faculty of Management, CSM Group of Institutions,', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('577', 'Shriji Instiute of Management & Technology, ', 'BAREILLY');
INSERT INTO `info_college` VALUES ('578', 'Lord Krishna College of Management, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('579', 'HLM College,', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('580', 'H R Institute of Professional Studies', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('581', 'Shri Giriraj Maharaj Institute of Management, ', 'MATHURA');
INSERT INTO `info_college` VALUES ('582', 'Sun Institute Of Management And Technology', 'SHAHJAHANPUR');
INSERT INTO `info_college` VALUES ('583', 'Lakshya Institute Of Management & Information Technology, ', 'SHAHJAHANPUR');
INSERT INTO `info_college` VALUES ('584', 'Bansi College of Management & Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('585', 'Maharaja Agrasen Mahavidyalaya Institute Of Management, ', 'BAREILLY');
INSERT INTO `info_college` VALUES ('586', 'Dev Bhoomi Groups Of Institutions,Faculty Of Computer Application', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('587', 'R.D. Foundations Group of Institutions, Faculty of Management', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('588', 'Prince Institute Of Innovetive Technology', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('589', 'Asian College of Management', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('590', 'Trivedi Institute Of Management & Technology', 'FATEHPUR');
INSERT INTO `info_college` VALUES ('591', 'Triveni Institute Of Management Education', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('592', 'Venkateshwara School Of Pharmacy, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('593', 'Vinayak Vidyapeeth, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('594', 'Apex College Of Technical Education, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('595', 'Srajan Institute Of Management & Technology, ', 'BAREILLY');
INSERT INTO `info_college` VALUES ('596', 'Centre For Hotel Management & Catering Technology, ', 'MODINAGAR');
INSERT INTO `info_college` VALUES ('597', 'Khandelwal College Of Architecture & Design, ', 'BAREILLY');
INSERT INTO `info_college` VALUES ('598', 'Moradabad Educational Trust (Met)- Group Of Institutions - Faculty Of Pharmacy, ', 'MORADABAD');
INSERT INTO `info_college` VALUES ('599', 'Jahangirabad Educational Trusts Group Of Institutions,Faculty Of Management', 'BARABANKI');
INSERT INTO `info_college` VALUES ('600', 'Charak Institute Of Business Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('602', 'Aashlar Business School', 'MATHURA');
INSERT INTO `info_college` VALUES ('603', 'Shri RLT Instiute of Management', 'ETAWAH');
INSERT INTO `info_college` VALUES ('604', 'Prem Prakash Gupta Institute of Management', 'BAREILLY');
INSERT INTO `info_college` VALUES ('605', 'Unnati Management College, ', 'MATHURA');
INSERT INTO `info_college` VALUES ('606', 'Vidya Institute of Training and Development', 'MEERUT');
INSERT INTO `info_college` VALUES ('607', 'Dr Virendra Swaroop Institute of Professional Studies', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('608', 'ACME Institute of planning & Management', 'BAREILLY');
INSERT INTO `info_college` VALUES ('609', 'JP School Of Business, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('610', 'Abes Institute Of Business Management, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('611', 'Shakumbari College, ', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('612', 'Braj Institute Of Management & Technology', 'ALIGARH');
INSERT INTO `info_college` VALUES ('613', 'Institute of Higher Studies', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('614', 'Shree Satya Instiute of Management', 'MORADABAD');
INSERT INTO `info_college` VALUES ('615', 'Instiute of Management Studies, ', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('616', 'Dhampur Institute of Technology & Management', 'BIJNOR');
INSERT INTO `info_college` VALUES ('617', 'Uttam Institute of Management Studies', 'AGRA');
INSERT INTO `info_college` VALUES ('618', 'Five School of Business,', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('619', 'Baran Instiute of Management', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('620', 'GCRG Memorial Trusts Group of Institutions Faculty of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('621', 'Dev Bhoomi Groups Of Institutions,Faculty Of Management,', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('622', 'Modern Institute Of Technology & Management, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('623', 'Bharti Institute of Management andTechnology, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('624', 'AL Haaj A R Sani Institute Of Management And Technology,', 'MATHURA');
INSERT INTO `info_college` VALUES ('625', 'Sanskar College of Management & Computer Application,', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('626', 'Prakash Deep Institute of Management and Technology, ', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('627', 'MKRPG Instiute of Technology,', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('628', 'Venketeshwara School of Computer Science, ', 'MEERUT');
INSERT INTO `info_college` VALUES ('629', 'Greater Noida Institute Of Technology (MCA Institute), ', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('630', 'Abhinav Institute of Managemant and Technology, ', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('631', 'Moradabad Educational Trust (MET) Group of Institutions Faculty of Architecture', 'MORADABAD');
INSERT INTO `info_college` VALUES ('633', 'M.P. School of Engineering', 'VARANASI');
INSERT INTO `info_college` VALUES ('634', 'Institute of Architecture and Town Planning', 'SITAPUR');
INSERT INTO `info_college` VALUES ('635', 'Jyoti College of Management Science and Technology', 'BAREILLY');
INSERT INTO `info_college` VALUES ('636', 'Saharanpur Institute of Advanced Studies', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('637', 'Asian Institute of Engineering and Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('638', 'Durga Prasad Baljeet Singh College of Computer Application', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('639', 'Raj Kumar Goel Institute of Technology ( MBA Institute )', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('640', 'Dr Virendra Swarup Memorial Trust Group of Institutions', 'UNNAO');
INSERT INTO `info_college` VALUES ('641', 'Ashoka Institute of Technology & Management', 'VARANASI');
INSERT INTO `info_college` VALUES ('643', 'Abhay Memorial Trust Group of Institutions', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('644', 'S V S Group of Institutions', 'MEERUT');
INSERT INTO `info_college` VALUES ('645', 'Ideal Institute of Management & Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('646', 'Ayodhya Prasad Management Institute & Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('647', 'Indraprastha Institute of Technology', 'J.P.NAGAR');
INSERT INTO `info_college` VALUES ('648', 'Babu Sundar Singh Institute of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('649', 'M.G. Institute of Management & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('650', 'Azad Engineering College', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('651', 'Dr. G.P.R.D. Patel Institute of Technology And Management', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('653', 'Prem Prakash Gupta Institute of Engineering', 'BAREILLY');
INSERT INTO `info_college` VALUES ('654', 'Sarvottam Institute of Technology & Management', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('655', 'Sanskriti Institute of Management & Technology', 'MATHURA');
INSERT INTO `info_college` VALUES ('656', 'G L Bajaj Group of Institutions', 'MATHURA');
INSERT INTO `info_college` VALUES ('657', 'Krishnarpit Institute of Pharmacy', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('658', 'Zacistha Educational Institute Of Pharmacy', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('659', 'Heritage Institute of Hotel & Tourism', 'AGRA');
INSERT INTO `info_college` VALUES ('660', 'Goel Institute of Higher Studies', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('661', 'Krishnarpit Institute of Management & Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('662', 'S S Institute of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('663', 'KCC Institute of Management', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('664', 'Yesh Raj Institute of Education & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('665', 'Muzaffarnagar Institute of Technology', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('666', 'SRM Business School', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('667', 'Saraswati Institute of Business Management & Research', 'UNNAO');
INSERT INTO `info_college` VALUES ('668', 'Edify Institute of Management & Technology', 'MATHURA');
INSERT INTO `info_college` VALUES ('669', 'Seth Vishambhar Nath Institute of Management Studies & Research', 'BARABANKI');
INSERT INTO `info_college` VALUES ('670', 'Lucknow Model Institute of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('671', 'Brahmanand Group of Institutions', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('672', 'ITM Institute of Architecture and Town Planning', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('673', 'ITM School of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('674', 'Shree College of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('675', 'New Era College of Science & Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('676', 'Globel Institute of Management', 'KANPUR DEHAT');
INSERT INTO `info_college` VALUES ('679', 'ITERC College of Management', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('680', 'City College of Management & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('681', 'Lloyd Business School', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('682', 'BIMT College', 'MEERUT');
INSERT INTO `info_college` VALUES ('684', 'GNIT Management School', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('685', 'INJ Business School', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('686', 'Accurate Institute of Advanced Management', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('687', 'ANA College of Managemet Studies', 'BAREILLY');
INSERT INTO `info_college` VALUES ('688', 'Devprayag Institute of Management', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('689', 'Institute of Information Management & Technology', 'ALIGARH');
INSERT INTO `info_college` VALUES ('690', 'School of Management, Dronacharya Group of Institutions', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('691', 'C-Impact Institute of Management & Tech.', 'AGRA');
INSERT INTO `info_college` VALUES ('692', 'Skyline Institute of Management & Technology', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('693', 'Sanskriti School of Business', 'MATHURA');
INSERT INTO `info_college` VALUES ('694', 'Sanskriti Institute of Hotel Management', 'MATHURA');
INSERT INTO `info_college` VALUES ('695', 'Shri Ram Group of Colleges', 'MUZAFFARNAGAR');
INSERT INTO `info_college` VALUES ('696', 'Institute of Engineering & Rural Technology', 'SITAPUR');
INSERT INTO `info_college` VALUES ('697', 'Agra Public College of Technology & Management', 'AGRA');
INSERT INTO `info_college` VALUES ('698', 'Dwarikadheesh Research Education And Management School', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('699', 'R. D. Engineering & Management College, Duhai', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('700', 'Abes Institute of Management', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('702', 'MIT College of Management', 'MORADABAD');
INSERT INTO `info_college` VALUES ('703', 'Shri Siddhi Vinayak Institute of Management', 'BAREILLY');
INSERT INTO `info_college` VALUES ('704', 'Shree jee Goverdhan Maharaj College of Professional Studies', 'MATHURA');
INSERT INTO `info_college` VALUES ('705', 'Jms Group of Institutions', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('706', 'Agra Vanasthali Mahavidyalaya', 'AGRA');
INSERT INTO `info_college` VALUES ('707', 'Tirupati Institute of Professional Studies', 'MEERUT');
INSERT INTO `info_college` VALUES ('708', 'SSLD Varshney Institute Of Management & Engineering', 'ALIGARH');
INSERT INTO `info_college` VALUES ('709', 'Gauri Vidyapeeth Business School', 'MEERUT');
INSERT INTO `info_college` VALUES ('710', 'Ch. Harchand Singh College Of Management', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('711', 'Vishweshraiya College Of Education', 'MEERUT');
INSERT INTO `info_college` VALUES ('712', 'IIMT College Of Management,', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('713', 'IIMT Professional College,', 'MEERUT');
INSERT INTO `info_college` VALUES ('714', 'Kanpur Institute Of Management Studies', 'UNNAO');
INSERT INTO `info_college` VALUES ('715', 'SR Group of Institutions(College of Engineering Management & Technology),', 'Jhansi');
INSERT INTO `info_college` VALUES ('716', 'Mahaveer Institute of Engineering and Technology', 'MEERUT');
INSERT INTO `info_college` VALUES ('717', 'FMG Academy Group of Institutions', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('718', 'Heeralal Yadav Institute of Technology & Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('719', 'Axis Institute Of Technology & Management', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('720', 'Axis Institute of Fashion Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('721', 'Axis Institute of Architecture,', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('722', 'Axis Buisness School', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('723', 'Axis Institute of Planning and Management', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('725', 'Sharda Institute of Management & Technology', 'KANPUR NAGAR');
INSERT INTO `info_college` VALUES ('726', 'Institute of Mangement & Science', 'J.P.NAGAR');
INSERT INTO `info_college` VALUES ('727', 'Shambhunath Institute of Management', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('728', 'Faculty of Management Studies, Meerut College,', 'MEERUT');
INSERT INTO `info_college` VALUES ('729', 'Shree Bankey Bihari Institute of Architecture', 'MEERUT');
INSERT INTO `info_college` VALUES ('730', 'Stallion College For Engineering & Technology', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('731', 'H. R. Institute of Engineering and Technology', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('732', 'Rudra Group of Institutions', 'MEERUT');
INSERT INTO `info_college` VALUES ('733', 'Hierank Business School', 'NOIDA');
INSERT INTO `info_college` VALUES ('734', 'Dr. Bhimrao Ambedkar Engineering College of Information Technology', 'BANDA');
INSERT INTO `info_college` VALUES ('735', 'Dr. Bhimrao Ambedkar Engineering College of Information Technology', 'BIJNOR');
INSERT INTO `info_college` VALUES ('736', 'Manyawar Kansi Ram Engineering College of Information Technology', 'AZAMGARH');
INSERT INTO `info_college` VALUES ('737', 'Manyawar Kansi Ram Engineering College of Information Technology', 'AMBEDKAR NAGAR');
INSERT INTO `info_college` VALUES ('738', 'Global Educational & Welfare Society Group of Institutions', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('739', 'JRE Group of Institutions Plot no.5,6,7,& 8, Knowledge Park-IV, Greater Noida.', 'Greater Noida');
INSERT INTO `info_college` VALUES ('740', 'Prayag Institute of Technology & Management', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('741', 'J.K. Institute of Pharmacy and Management, Khurja, Bulandshahr', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('742', 'Amarjyoti Institute of Management Science, Gatumbudh Nagar', 'GAUTAM BUDDH NAGAR');
INSERT INTO `info_college` VALUES ('743', 'Bhavdiya Institute of Business Management', 'FAIZABAD');
INSERT INTO `info_college` VALUES ('744', 'Rhans College of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('745', 'Sri Rammurti Smarak College of Engg. & Tech.', 'UNNAO');
INSERT INTO `info_college` VALUES ('746', 'Kunwar Haribansh Singh Institute of Management', 'JAUNPUR');
INSERT INTO `info_college` VALUES ('747', 'Raj School of Management & Sciences', 'VARANASI');
INSERT INTO `info_college` VALUES ('748', 'Ansal Technical Campus', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('749', 'Madhu Vachaspati School of Management', 'KAUSHAMBI');
INSERT INTO `info_college` VALUES ('750', 'Infinity institute of Technology', 'ALLAHABAD');
INSERT INTO `info_college` VALUES ('751', 'KIPM-College of Engineering & Technology', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('752', 'Nandini Nagar Technical Campus', 'GONDA');
INSERT INTO `info_college` VALUES ('753', 'Lakshya Technical Campus', 'SHAHJAHANPUR');
INSERT INTO `info_college` VALUES ('754', 'DNM-Institute of Engineering & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('755', 'Basudev Institute of Management & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('756', 'Institute of Management Research & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('757', 'Utkarsh College of Management Education', 'BAREILLY');
INSERT INTO `info_college` VALUES ('758', 'Shine College Of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('759', 'Dr. Om Prakash Institute of Management & Technology', 'FARRUKHABAD');
INSERT INTO `info_college` VALUES ('760', 'Lotus Institute OF Management', 'BAREILLY');
INSERT INTO `info_college` VALUES ('761', 'M.V.D. Educational & Law College', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('762', 'Noble Institute of Management & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('763', 'Maa Bhagwata Kunwar Institute of Management', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('764', 'Smt.Fulehra Smarak college of Pharmacy', 'BALLIA');
INSERT INTO `info_college` VALUES ('765', 'Remote Sensing Application Centre Lucknow', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('766', 'Purvanchal Institute of Architecture & Design', 'GORAKHPUR');
INSERT INTO `info_college` VALUES ('780', 'Landmark Technical Campus Dedoli, Amroha, J.P. Nagar', 'J.P.NAGAR');
INSERT INTO `info_college` VALUES ('781', 'Hardayal Technical Campus Mathura', 'MATHURA');
INSERT INTO `info_college` VALUES ('782', 'Shivam Technical, Khurja, Buland Shaher', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('783', 'R.D. Engineering College, Duhai, Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('784', 'Rama Engineering Technical Campus, Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('785', 'G & R Institute of Management and Technology, Bhulandshar', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('786', 'Mangalmay Institute of Engineering and Technology, Knowledge Park, Gr. Noida', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('787', 'Dev Technical Campus, Kuberpur, Agra', 'AGRA');
INSERT INTO `info_college` VALUES ('788', 'Ideal School of Architecture, Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('789', 'Dayanand Vidhyapeeth Education, meerut', 'MEERUT');
INSERT INTO `info_college` VALUES ('790', 'School of Buisness Management, Khurja Road, Bulanshar', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('791', 'Disha Bharti College of Management & Educational, Shahranpur', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('792', 'Institiute of Advanced Management and Research, Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('793', 'JIMS Management Technical Campus, Knowledge Park, Greater Noida', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('794', 'JKEC Instute of Management, Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('795', 'DIT School of Business, Gr. Noida', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('796', 'Adhunik College of Engineering , Duhai, Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('797', 'Adhunik Institute of Productivity Management & Research , Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('798', 'Anand college of Architecture,  Agra.', 'AGRA');
INSERT INTO `info_college` VALUES ('799', 'ACE College of Engineering & Management,Etmadpura,Agra.', 'AGRA');
INSERT INTO `info_college` VALUES ('800', 'Jag Mohan  Institute of Management & Technology, Baghpat.', 'BAGHPAT');
INSERT INTO `info_college` VALUES ('801', 'G.L Bajaj Institute of Management & Research Gr. Noida', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('802', 'Nitra Technical Campus', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('803', 'Greater Noida Institute of Business Management, Greater Noida.', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('804', 'APS College of Education & Technology, Meerut', 'MEERUT');
INSERT INTO `info_college` VALUES ('805', 'Accurate Institute of Architercture & Panning, Gr. Noida.', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('806', 'Brahmanand  Institute of Research Technology & Management,Bulandshahar', 'BULANDSHAHAR');
INSERT INTO `info_college` VALUES ('807', 'NCR Technical Campus ,Aligarh', 'ALIGARH');
INSERT INTO `info_college` VALUES ('808', 'Dulari Devi Institute of Pharmacy,  Aligarh', 'ALIGARH');
INSERT INTO `info_college` VALUES ('809', 'P.K. Institute of Technology & Management, Mathura', 'MATHURA');
INSERT INTO `info_college` VALUES ('810', 'Greater. Noida College of Technology Gr. Noida', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('811', 'Forth Dimention College of Architecture, Saharanpur', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('812', 'CBS College of Management,Agra', 'AGRA');
INSERT INTO `info_college` VALUES ('813', 'Krishna College of Management Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('814', 'Janhit Group of Institutions, Saharanpur.', 'SAHARANPUR');
INSERT INTO `info_college` VALUES ('815', 'Amani', 'BIJNOR');
INSERT INTO `info_college` VALUES ('817', 'AR Institute of Management & Technology', 'LUCKNOW');
INSERT INTO `info_college` VALUES ('818', 'IILM College of Management Studies, Greater Noida', 'GREATOR NOIDA');
INSERT INTO `info_college` VALUES ('819', 'Shri Sai College of Education', 'Meerut');
INSERT INTO `info_college` VALUES ('820', 'Ajay Kumar Garg Institute of Management,Ghaziabad', 'GHAZIABAD');
INSERT INTO `info_college` VALUES ('821', 'Mahaveer College of Pharmacy', 'MEERUT');
INSERT INTO `info_college` VALUES ('822', 'Eshan College of Management', 'MATHURA');
INSERT INTO `info_college` VALUES ('823', 'Ishan Institute Of Architecture & Planning', '823');
INSERT INTO `info_college` VALUES ('824', 'Ishan Institute Of Management& Technology', '824');
INSERT INTO `info_college` VALUES ('825', 'IMS,J.P Nagar', '825');
INSERT INTO `info_college` VALUES ('826', 'SGITIMT College Of Architecture', '826');
INSERT INTO `info_college` VALUES ('827', 'Mascot Institute Of Management', '827');
INSERT INTO `info_college` VALUES ('828', 'Dayal Group Of Institutions', '828');
INSERT INTO `info_college` VALUES ('829', 'IILM Academy Of Higher Learning', '829');
INSERT INTO `info_college` VALUES ('830', 'Devi Memorial Institute', 'Kanpur');
INSERT INTO `info_college` VALUES ('831', 'Vivekanand College Of Architecture,Ghaziabad', '831');
INSERT INTO `info_college` VALUES ('832', 'Kamal Inatitute Of Technilogy', '832');
INSERT INTO `info_college` VALUES ('833', 'Shiva Institute of Management Studies,Ghaziabad', 'Ghaziabad');
INSERT INTO `info_college` VALUES ('834', 'Integrated Academy of Management & Technology,Ghaziabad', '834');
INSERT INTO `info_college` VALUES ('835', 'L.T.R Institute of Management', 'Meerut');
INSERT INTO `info_college` VALUES ('836', 'Bhagwant Institute of Technology, Ghaziabad', 'Ghaziabad');
INSERT INTO `info_college` VALUES ('837', 'Sanskriti Engineering College', '837');
INSERT INTO `info_college` VALUES ('838', 'Pharmacy College Saifai, District- Etawah', 'ETAWAH');
INSERT INTO `info_college` VALUES ('839', 'Govt. Engg. College Kannauj District- Kannauj', 'KANNAUJ');
INSERT INTO `info_college` VALUES ('840', 'Govt. Engg. College Mainpuri, District- Mainpuri', 'MAINPURI');
INSERT INTO `info_college` VALUES ('841', 'Govt. Engg. College Sonbhadra, District- Sonbhadra', 'SONBHADRA');

-- ----------------------------
-- Table structure for `info_course`
-- ----------------------------
DROP TABLE IF EXISTS `info_course`;
CREATE TABLE `info_course` (
  `courseId` varchar(10) NOT NULL,
  `courses` varchar(20) NOT NULL,
  PRIMARY KEY (`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of info_course
-- ----------------------------
INSERT INTO `info_course` VALUES ('1', 'B.ARCH');
INSERT INTO `info_course` VALUES ('10', 'MAM');
INSERT INTO `info_course` VALUES ('11', 'M.ARCH');
INSERT INTO `info_course` VALUES ('2', 'B.FAD');
INSERT INTO `info_course` VALUES ('3', 'B.HMCT');
INSERT INTO `info_course` VALUES ('4', 'B.PHARM');
INSERT INTO `info_course` VALUES ('5', 'B.TECH');
INSERT INTO `info_course` VALUES ('6', 'MBA');
INSERT INTO `info_course` VALUES ('7', 'MCA');
INSERT INTO `info_course` VALUES ('8', 'M.PHARM');
INSERT INTO `info_course` VALUES ('9', 'M.TECH');

-- ----------------------------
-- Table structure for `info_subject`
-- ----------------------------
DROP TABLE IF EXISTS `info_subject`;
CREATE TABLE `info_subject` (
  `branchId` varchar(50) NOT NULL,
  `subjectId` varchar(50) NOT NULL,
  `subjectName` varchar(100) NOT NULL,
  `semester` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of info_subject
-- ----------------------------
INSERT INTO `info_subject` VALUES ('10', 'AUC301', 'Human Values & Professional Ethics', '3');
INSERT INTO `info_subject` VALUES ('10', 'AUC302', 'Cyber Security', '3');
INSERT INTO `info_subject` VALUES ('10', 'NAS301', 'Mathematics', '3');
INSERT INTO `info_subject` VALUES ('10', 'NCS301', 'Data Structures Using C', '3');
INSERT INTO `info_subject` VALUES ('10', 'NCS302', 'Discrete Structures And Graph ', '3');
INSERT INTO `info_subject` VALUES ('10', 'NCS303', 'Computer Based Numerical And S', '3');
INSERT INTO `info_subject` VALUES ('10', 'NCS351', 'Data Structures Using C Lab', '3');
INSERT INTO `info_subject` VALUES ('10', 'NCS353', 'Numerical Techniques Lab', '3');
INSERT INTO `info_subject` VALUES ('10', 'NCS355', 'Advance Programming Lab', '3');
INSERT INTO `info_subject` VALUES ('10', 'NCS401', 'Operating System', null);
INSERT INTO `info_subject` VALUES ('10', 'NCS402', 'Theory Of Automata and Formal Language', null);
INSERT INTO `info_subject` VALUES ('10', 'NCS403', 'Computer Graphics', null);
INSERT INTO `info_subject` VALUES ('10', 'NCS451', 'Operating System Lab', null);
INSERT INTO `info_subject` VALUES ('10', 'NCS453', 'Computer Graphics Lab', null);
INSERT INTO `info_subject` VALUES ('10', 'NCS455', 'Functional and Logic Programming Lab', null);
INSERT INTO `info_subject` VALUES ('10', 'NEC309', 'Digital Logic Design', null);
INSERT INTO `info_subject` VALUES ('10', 'NEC359', 'Digital Logic Design Lab', null);
INSERT INTO `info_subject` VALUES ('10', 'NEC409', 'Introduction to Microprocessor', null);
INSERT INTO `info_subject` VALUES ('10', 'NEC459', 'Microprocessor Lab', null);
INSERT INTO `info_subject` VALUES ('10', 'NHU301', 'Industrial Psychology', null);
INSERT INTO `info_subject` VALUES ('10', 'NHU302', 'Industrial Sociology', null);
INSERT INTO `info_subject` VALUES ('10', 'NHU401', 'Industrial Psychology', null);
INSERT INTO `info_subject` VALUES ('10', 'NHU402', 'Industrial Sociology', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE031', 'Introduction to Soft Computing (Neural Network, Fuzzy Logic and Genetic Algorithm', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE032', 'Nano Sciences', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE033', 'Laser Systems and Applications', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE034', 'Space Sciences', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE036', 'Nuclear Science', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE037', 'Material Science', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE038', 'Discrete Mathematics', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE039', 'Applied Linear Algebra', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE041', 'Introduction to Soft Computing (Neural Network, Fuzzy Logic and Genetic Algorithm', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE042', 'Nano Sciences', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE043', 'Laser Systems and Applications', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE044', 'Space Sciences', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE045', 'Polymer Science & Technology', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE046', 'Nuclear Science', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE047', 'Material Science', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE048', 'Discrete Mathematics', null);
INSERT INTO `info_subject` VALUES ('10', 'NOE049', 'Applied Linear Algebra', null);

-- ----------------------------
-- Table structure for `subjects`
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `userId` varchar(50) NOT NULL,
  `subjectId` varchar(50) NOT NULL,
  `confirm` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`,`subjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES ('1', 'AUC302', '0');
INSERT INTO `subjects` VALUES ('1', 'NAS301', '0');
INSERT INTO `subjects` VALUES ('10', 'AUC301', '1');
INSERT INTO `subjects` VALUES ('10', 'AUC302', '0');
INSERT INTO `subjects` VALUES ('10', 'NAS301', '0');
INSERT INTO `subjects` VALUES ('11', 'AUC301', '0');
INSERT INTO `subjects` VALUES ('11', 'AUC302', '0');
INSERT INTO `subjects` VALUES ('11', 'NAS301', '0');
INSERT INTO `subjects` VALUES ('13', 'AUC302', '0');
INSERT INTO `subjects` VALUES ('13', 'NCS301', '0');
INSERT INTO `subjects` VALUES ('13', 'NOE033', '0');
INSERT INTO `subjects` VALUES ('13', 'NOE034', '0');
INSERT INTO `subjects` VALUES ('13', 'NOE036', '0');
INSERT INTO `subjects` VALUES ('2', 'AUC301', '0');
INSERT INTO `subjects` VALUES ('2', 'AUC302', '0');
INSERT INTO `subjects` VALUES ('2', 'NAS301', '0');
INSERT INTO `subjects` VALUES ('2', 'NCS301', '0');
INSERT INTO `subjects` VALUES ('3', 'AUC301', '0');
INSERT INTO `subjects` VALUES ('3', 'AUC302', '0');
INSERT INTO `subjects` VALUES ('3', 'NAS301', '0');
INSERT INTO `subjects` VALUES ('3', 'NCS301', '0');
INSERT INTO `subjects` VALUES ('4', 'AUC301', '0');
INSERT INTO `subjects` VALUES ('4', 'AUC302', '0');
INSERT INTO `subjects` VALUES ('4', 'NAS301', '0');
INSERT INTO `subjects` VALUES ('4', 'NCS301', '0');
INSERT INTO `subjects` VALUES ('5', 'AUC301', '0');
INSERT INTO `subjects` VALUES ('5', 'AUC302', '0');
INSERT INTO `subjects` VALUES ('5', 'NAS301', '0');
INSERT INTO `subjects` VALUES ('5', 'NCS301', '0');
INSERT INTO `subjects` VALUES ('8', 'AUC301', '1');
INSERT INTO `subjects` VALUES ('8', 'AUC302', '2');
INSERT INTO `subjects` VALUES ('8', 'NAS301', '1');
INSERT INTO `subjects` VALUES ('8', 'NCS301', '2');
INSERT INTO `subjects` VALUES ('9', 'AUC301', '0');
INSERT INTO `subjects` VALUES ('9', 'AUC302', '0');
INSERT INTO `subjects` VALUES ('9', 'NAS301', '0');
INSERT INTO `subjects` VALUES ('9', 'NCS301', '0');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `collegeId` varchar(10) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `dept_code` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `fathername` varchar(40) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(12) NOT NULL,
  `designation` varchar(40) DEFAULT NULL,
  `qualification` varchar(40) NOT NULL,
  `teach_exp` varchar(50) NOT NULL,
  `industrial_exp` varchar(2) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL,
  `district` varchar(40) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `userdef` int(1) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', null, '00', 'tert', 'gd', '2015-10-07', 'Female', 'Professor', 'M.Tech', '8', '6', '645', 'kshiftij.hz@live.com', '160A/106\r\nAllenganj\r\nAllahabad', 'Uttar Pradesh', 'yup', '211002', '3');
INSERT INTO `users` VALUES ('8', '2', null, '10', 'Mr. abcsadbhajksdhjashd', 'Mr. xyz', '2015-10-08', 'Male', 'Assistant Associate', 'B.Tech', '3', '2', '8743964456', 'kshitij.hz@live.comr', '160A/106\r\nAllenganj\r\nAllahabad', 'Uttar Pradesh', 'up', '211002', '3');
INSERT INTO `users` VALUES ('9', '2', null, '07', 'Mr. ksjjj', 'Mr. szsdf', '2015-10-06', 'Male', 'Assistant Associate', 'Ph.D', '3', '2', '8743964456', 'ksahitij.hz@live.com', 'jkfanhkj', 'Uttar Pradesh', 'ald', '211002', '3');
INSERT INTO `users` VALUES ('10', '2', '202cb962ac59075b964b07152d234b70', '10', 'Mr. ks', 'Mr. gfxd', '2015-10-08', 'Male', 'Assistant Professor', 'B.Tech', '1', '3', '08743964456', 'kddshitij.hz@live.com', '160A/106\r\nAllenganj\r\nAllahabad', 'Uttar Pradesh', 'ald', '211002', '3');
INSERT INTO `users` VALUES ('11', '2', '202cb962ac59075b964b07152d234b70', '10', 'Mr. qwerty', 'Mr. asdsfdgf', '2015-10-07', 'Male', 'Head Of Department', 'M.Tech', '1', '3', '08743964456', 'kshitij.hz@live.com', '160A/106\r\nAllenganj\r\nAllahabad', 'Uttar Pradesh', 'ald', '211002', '3');
INSERT INTO `users` VALUES ('12', '2', null, '10', 'Mr ss', 'Mr. de', '0000-00-00', '', null, '', '', '', '', '', null, null, null, null, '3');
INSERT INTO `users` VALUES ('13', '2', 'e2fc714c4727ee9395f324cd2e7f331f', '10', 'Mr. Rajat Srivastava', 'Mr. Zombie', '1994-08-07', 'Male', 'Head Of Department', 'B.Tech', '12', '12', '9910364830', 'rajatsri94@gmail.com', 'asda', 'asdklasjdl', 'lkasjdlka', '208009', '3');
