/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50729
 Source Host           : localhost:3306
 Source Schema         : studentcms

 Target Server Type    : MySQL
 Target Server Version : 50729
 File Encoding         : 65001

 Date: 19/09/2020 00:51:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `teacher_id` bigint(20) UNSIGNED NULL DEFAULT NULL COMMENT '授课老师',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `courses_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of courses
-- ----------------------------
INSERT INTO `courses` VALUES (1, '语文', 150, 1, '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `courses` VALUES (2, '数学', 150, 1, '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `courses` VALUES (3, '英语', 150, 1, '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `courses` VALUES (4, '物理', 100, 1, '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `courses` VALUES (5, '化学', 100, 1, '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `courses` VALUES (6, '生物', 100, 1, '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `courses` VALUES (7, '地理', 100, 1, '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `courses` VALUES (8, '政治', 100, 1, '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `courses` VALUES (9, '历史', 100, 1, '2020-09-15 22:09:05', '2020-09-15 22:09:05');

-- ----------------------------
-- Table structure for exams
-- ----------------------------
DROP TABLE IF EXISTS `exams`;
CREATE TABLE `exams`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` date NOT NULL COMMENT '考试时间',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of exams
-- ----------------------------
INSERT INTO `exams` VALUES (1, '第一次月考', '2002-12-19', '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `exams` VALUES (2, '第二次月考', '2002-08-25', '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `exams` VALUES (3, '第三次月考', '2009-06-27', '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `exams` VALUES (4, '第四次月考', '1981-05-31', '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `exams` VALUES (5, '第一学期半期考', '1996-06-13', '2020-09-15 22:09:05', '2020-09-15 22:09:05');
INSERT INTO `exams` VALUES (6, '第一学期期末考', '2014-09-16', '2020-09-15 22:09:05', '2020-09-15 22:09:05');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2020_09_05_130614_create_parents_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_09_05_133331_create_teachers_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_09_05_133519_create_courses_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_09_05_133902_create_exams_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_09_05_134323_create_scores_table', 1);

-- ----------------------------
-- Table structure for parents
-- ----------------------------
DROP TABLE IF EXISTS `parents`;
CREATE TABLE `parents`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` tinyint(4) NOT NULL,
  `relation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '与学生关系',
  `unit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '工作单位',
  `job` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '职业',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '联系电话',
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for scores
-- ----------------------------
DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `score` int(10) UNSIGNED NOT NULL COMMENT '成绩',
  `student_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属学生',
  `exam_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属考试',
  `course_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属课程',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scores
-- ----------------------------
INSERT INTO `scores` VALUES (4, 89, 3, 1, 1, '2020-09-13 00:09:42', '2020-09-16 20:53:45');
INSERT INTO `scores` VALUES (5, 67, 3, 1, 2, '2020-09-13 00:09:42', '2020-09-13 10:15:22');
INSERT INTO `scores` VALUES (6, 145, 3, 1, 3, '2020-09-13 00:09:42', '2020-09-15 22:11:21');
INSERT INTO `scores` VALUES (7, 87, 3, 1, 4, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (8, 65, 3, 1, 5, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (9, 67, 3, 1, 6, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (10, 78, 3, 1, 7, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (11, 78, 3, 1, 8, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (12, 65, 3, 1, 9, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (13, 100, 4, 1, 1, '2020-09-13 00:32:53', '2020-09-16 20:54:25');
INSERT INTO `scores` VALUES (14, 77, 4, 1, 2, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (15, 90, 4, 1, 3, '2020-09-13 00:32:53', '2020-09-15 22:12:04');
INSERT INTO `scores` VALUES (16, 77, 4, 1, 4, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (17, 66, 4, 1, 5, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (18, 55, 4, 1, 6, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (19, 55, 4, 1, 7, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (20, 89, 4, 1, 8, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (21, 65, 4, 1, 9, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (40, 95, 3, 5, 1, '2020-09-13 01:26:57', '2020-09-16 20:54:22');
INSERT INTO `scores` VALUES (41, 45, 3, 5, 2, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (42, 67, 3, 5, 3, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (43, 77, 3, 5, 4, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (44, 77, 3, 5, 5, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (45, 127, 3, 5, 6, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (46, 99, 3, 5, 7, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (47, 99, 3, 5, 8, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (48, 87, 3, 5, 9, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (49, 145, 3, 6, 1, '2020-09-13 01:57:55', '2020-09-16 20:53:48');
INSERT INTO `scores` VALUES (50, 98, 3, 6, 2, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (51, 135, 3, 6, 3, '2020-09-13 01:57:55', '2020-09-15 22:11:59');
INSERT INTO `scores` VALUES (52, 98, 3, 6, 4, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (53, 88, 3, 6, 5, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (54, 77, 3, 6, 6, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (55, 88, 3, 6, 7, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (56, 88, 3, 6, 8, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (57, 99, 3, 6, 9, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (67, 124, 7, 1, 1, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (68, 33, 7, 1, 2, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (69, 67, 7, 1, 3, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (70, 78, 7, 1, 4, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (71, 87, 7, 1, 5, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (72, 87, 7, 1, 6, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (73, 87, 7, 1, 7, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (74, 78, 7, 1, 8, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (75, 98, 7, 1, 9, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (76, 123, 14, 3, 1, '2020-09-13 20:13:39', '2020-09-16 20:53:52');
INSERT INTO `scores` VALUES (77, 120, 14, 3, 2, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (78, 76, 14, 3, 3, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (79, 89, 14, 3, 4, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (80, 89, 14, 3, 5, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (81, 87, 14, 3, 6, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (82, 67, 14, 3, 7, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (83, 89, 14, 3, 8, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (84, 87, 14, 3, 9, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (86, 89, 8, 1, 1, '2020-09-13 20:31:51', '2020-09-13 20:33:43');
INSERT INTO `scores` VALUES (87, 89, 8, 1, 2, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (88, 89, 8, 1, 3, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (89, 87, 8, 1, 4, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (90, 87, 8, 1, 5, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (91, 87, 8, 1, 6, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (92, 67, 8, 1, 7, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (93, 67, 8, 1, 8, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (94, 77, 8, 1, 9, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (95, 143, 17, 1, 1, '2020-09-18 23:32:47', '2020-09-18 23:32:47');
INSERT INTO `scores` VALUES (96, 136, 17, 1, 2, '2020-09-18 23:32:47', '2020-09-18 23:32:47');
INSERT INTO `scores` VALUES (97, 123, 17, 1, 3, '2020-09-18 23:32:47', '2020-09-18 23:32:47');
INSERT INTO `scores` VALUES (98, 78, 17, 1, 4, '2020-09-18 23:32:47', '2020-09-18 23:32:47');
INSERT INTO `scores` VALUES (99, 89, 17, 1, 5, '2020-09-18 23:32:47', '2020-09-18 23:32:47');
INSERT INTO `scores` VALUES (100, 89, 17, 1, 6, '2020-09-18 23:32:47', '2020-09-18 23:32:47');
INSERT INTO `scores` VALUES (101, 87, 17, 1, 7, '2020-09-18 23:32:47', '2020-09-18 23:32:47');
INSERT INTO `scores` VALUES (102, 67, 17, 1, 8, '2020-09-18 23:32:47', '2020-09-18 23:32:47');
INSERT INTO `scores` VALUES (103, 59, 17, 1, 9, '2020-09-18 23:32:47', '2020-09-18 23:32:47');
INSERT INTO `scores` VALUES (104, 134, 18, 1, 1, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (105, 135, 18, 1, 2, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (106, 135, 18, 1, 3, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (107, 78, 18, 1, 4, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (108, 87, 18, 1, 5, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (109, 67, 18, 1, 6, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (110, 87, 18, 1, 7, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (111, 67, 18, 1, 8, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (112, 89, 18, 1, 9, '2020-09-18 23:33:14', '2020-09-18 23:33:14');

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qq` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (1, '冯腊梅', '女', '18473148727', '93115124', '1990-01-13 04:12:15', '2018-07-03 01:44:06');
INSERT INTO `teachers` VALUES (2, '全志明', '女', '17000660696', '50186028', '2004-01-14 12:17:45', '1987-09-17 08:44:53');
INSERT INTO `teachers` VALUES (3, '沙桂芳', '男', '15887032489', '69714823', '2015-06-17 21:48:15', '2001-04-13 07:36:36');
INSERT INTO `teachers` VALUES (4, '白全安', '女', '13605675052', '29275291', '2006-05-19 00:28:51', '2009-11-26 02:07:20');
INSERT INTO `teachers` VALUES (5, '陆捷', '女', '17007552136', '83896951', '2005-09-29 07:35:12', '1975-07-25 08:39:12');
INSERT INTO `teachers` VALUES (6, '稽涛', '女', '15636615685', '35288132', '1999-06-30 14:39:06', '1995-12-16 05:03:15');
INSERT INTO `teachers` VALUES (7, '关秀荣', '女', '17084667774', '63028231', '2005-09-08 18:38:07', '1984-11-08 23:47:39');
INSERT INTO `teachers` VALUES (8, '舒雪梅', '男', '14577981418', '11208619', '1997-12-01 18:52:16', '1985-07-15 11:49:51');
INSERT INTO `teachers` VALUES (9, '李凯', '男', '13776078676', '51473274', '2003-10-21 19:32:15', '1977-12-21 02:51:54');
INSERT INTO `teachers` VALUES (10, '葛杨', '男', '17642832968', '40339045', '1972-04-21 05:51:34', '1993-01-26 02:26:36');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学号',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学生姓名',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `sex` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sysid` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `minzu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jingji` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hukou` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jishu` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '是否寄宿',
  `huji` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '户籍地址',
  `xianzz` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '现住址',
  `liushou` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否留守儿童',
  `liushouqk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '留守儿童情况',
  `liushoutgqk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '留守儿童托管情况',
  `biye` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '毕业学校',
  `ganbu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '曾担任干部情况',
  `huojiang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '获奖情况',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_uid_unique`(`uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$Vb33zNJpus2kRgVB3QAMOOzPXxyVS5iSkSok/lj4hag4lATNIYgj2', '系统管理员', 1, '男', '18179871320', '21774745', '2016-06-03', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '九方传媒有限公司', NULL, NULL, 'hDarXTxjHA', '1973-10-23 08:17:52', '2020-09-15 22:09:05');
INSERT INTO `users` VALUES (2, '30379731', '$2y$10$zsJgpp2OKVhEMeCybU1HPOct7NKeurL5CkMV4KkzIBzUAx5g5qjZS', '翁钟', 0, '男', '13315456838', '54726402', '1983-12-05', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '巨奥网络有限公司', NULL, NULL, 'PZc4AXQyGT', '1991-08-27 17:39:35', '2018-09-20 03:01:05');
INSERT INTO `users` VALUES (3, '32357788', '$2y$10$brAjHzRtwLEplX/ishyUieA3fK6PKRPf7Ru8dwLOv5cmBWyuUaVgO', '庞俊', 0, '男', '17183830622', '41764889', '2019-04-13', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '恒聪百汇传媒有限公司', NULL, NULL, 'F8oFF7nkak', '1981-08-09 21:25:21', '1981-06-17 18:44:18');
INSERT INTO `users` VALUES (4, '22989798', '$2y$10$LWG6y2rrh6BJsR6y6ejEpuuXEhmfSUeyzHsPYzBp4ijL.b2pcK48m', '裴建华', 0, '女', '17151408887', '66567354', '1971-08-10', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '商软冠联科技有限公司', NULL, NULL, 'Yq1rnwS4kG', '1976-09-24 14:45:56', '2018-08-20 23:36:52');
INSERT INTO `users` VALUES (5, '44669008', '$2y$10$NRtxuhf5NpU1vWKoQaADW.hYhiYteuMBWmENaVRXH4qd3rAo7u16W', '丁佳', 0, '男', '13572310970', '26795626', '2011-08-23', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '凌颖信息网络有限公司', NULL, NULL, '6xdCLk0bn2', '2006-01-27 03:18:21', '1993-07-11 04:00:32');
INSERT INTO `users` VALUES (6, '98815723', '$2y$10$PZXK.ooC3NbI9pBLdekwIeHPtFicBbKBzrsXVZO4GaBoFYVR6DwwG', '朱洁', 0, '男', '13554946616', '41512374', '1989-04-21', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '国讯传媒有限公司', NULL, NULL, 'dVxDVm7I4L', '1979-08-11 03:43:26', '1989-06-14 08:51:11');
INSERT INTO `users` VALUES (7, '15229991', '$2y$10$af874V4gfIpKmNcKMKFFT.sd8El7ewUST5gpu2xoCyhizD.QvM.tO', '关浩', 0, '女', '15621554935', '44349341', '2009-02-16', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '新格林耐特科技有限公司', NULL, NULL, 'OSPtXCpsJQ', '2014-10-27 22:06:34', '1974-12-14 13:27:42');
INSERT INTO `users` VALUES (8, '78581025', '$2y$10$BOTXVhjyeA9uRjdisyvLfu2DxB2HD77Zekogq5zcGKcD33HbL/IxW', '晋宁', 0, '女', '18931899416', '27097700', '1985-04-10', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '雨林木风计算机传媒有限公司', NULL, NULL, 'Rp8ke8Oadp', '1983-05-11 18:50:55', '2009-05-21 03:36:28');
INSERT INTO `users` VALUES (9, '29255149', '$2y$10$JsnjbMiWKaAr0unLfi6zKOAbJ.mOJQ/ECAbvCpjSUeczohIeJfgsC', '傅桂芝', 0, '女', '15033291482', '59470356', '1973-07-10', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '创联世纪网络有限公司', NULL, NULL, 'm0caKXEROx', '1996-08-29 16:45:21', '1984-07-25 20:07:46');
INSERT INTO `users` VALUES (10, '77950902', '$2y$10$WM12m3k547GDL6/E2bJQLOhwhtsKclxDP9WzXAs/qJFAyND0w7oGi', '仲军', 0, '女', '13157849013', '44830929', '2012-10-21', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '菊风公司信息有限公司', NULL, NULL, 'n4lNWkaz1t', '1973-12-28 19:58:03', '2000-04-30 13:53:28');
INSERT INTO `users` VALUES (11, '24923477', '$2y$10$3BKW5O9EQ.VY83fb7eHweeyCe0FfzDF08BFM5oEWhnEfG0nIgBH2G', '木雷', 0, '男', '15217117541', '34439471', '2019-06-10', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '同兴万点网络有限公司', NULL, NULL, 'QfZcJjimjf', '2011-04-20 03:11:26', '2001-05-12 04:07:15');
INSERT INTO `users` VALUES (12, '31126237', '$2y$10$9lYWjkw7xkKcUOVMaDziveiQl3Mc5yQXPFJfC7oMIvZGPjf1pSRrS', '屠祥', 0, '男', '15838154876', '25267152', '1990-04-10', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '浦华众城网络有限公司', NULL, NULL, '9le3xhSJdZ', '1997-07-26 23:07:28', '1990-02-18 21:17:50');
INSERT INTO `users` VALUES (13, '14742123', '$2y$10$Wc1PO/M1ZtIlIJ6zrJJtKOe84bV/hVZDhSa3QLcAClA3gFLztYUXm', '彭嘉', 0, '男', '14791316849', '92782730', '1999-12-27', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '昂歌信息科技有限公司', NULL, NULL, '9bVwLttZxf', '1996-04-24 13:48:22', '1990-04-01 11:39:48');
INSERT INTO `users` VALUES (14, '99508722', '$2y$10$Kspi8rqEOo3JVXTIZjQxOOimjUqxWbbZljBcNYim3I1uFC4KAo61K', '韩洪', 0, '女', '13287357417', '56150663', '1990-12-10', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '太极网络有限公司', NULL, NULL, 'OfjAOkm9xA', '2000-02-12 10:15:08', '2011-03-15 21:06:52');
INSERT INTO `users` VALUES (15, '83977365', '$2y$10$kHu14BOU6lGiYZ60oXqhFOJjMtTApJXwiqJzJ8wtboqDH.lQtSd4i', '金智敏', 0, '女', '13630653772', '36039355', '2008-02-24', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '和泰传媒有限公司', NULL, NULL, 'NG45I9VtVV', '2009-08-06 11:59:09', '2019-09-25 04:32:39');
INSERT INTO `users` VALUES (16, '62130869', '$2y$10$Kpi/8z/MFnm/0Es4KrLf5ufUBycO105XZhLFsDVSimYjx2akPgGeS', '郎嘉俊', 0, '女', '15271688389', '32102288', '2018-03-20', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '通际名联网络有限公司', NULL, NULL, '5bS0ReUseT', '2014-09-09 10:22:20', '1977-12-03 05:49:26');
INSERT INTO `users` VALUES (17, '38989546', '$2y$10$32wrRckY9oTLafwv3cqXju10.kWiBju6fvECaGBi/DFVjB7O4mxp.', '关磊', 0, '男', '15554274167', '67188651', '2013-12-03', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '海创科技有限公司', NULL, NULL, '65AXhxKKOX', '1994-04-21 01:50:11', '1989-12-21 04:36:30');
INSERT INTO `users` VALUES (18, '78751040', '$2y$10$qsULzqYYCgqA9eUfRLPvt.y5ckBkIhO/NHVlZN64xPcBUcmOnsNYS', '项淑华', 0, '女', '14584605370', '23420347', '1984-10-17', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '开发区世创信息有限公司', NULL, NULL, 'IdOGPo64rW', '2011-03-01 16:31:19', '2001-10-12 10:18:18');
INSERT INTO `users` VALUES (19, '92001862', '$2y$10$ZrozdLo2lJXCboT6Vy32HOdTPrCs0KB/7EJoS8Dk10Z4RvhNmv31G', '吕波', 0, '女', '14536805129', '96033981', '1999-04-11', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '明腾信息有限公司', NULL, NULL, 'Z6nyR8DzyK', '2019-09-09 21:08:31', '1978-09-15 16:52:38');
INSERT INTO `users` VALUES (20, '66970673', '$2y$10$lZWD7jNZnF8tB4KUNT/8FeOKf4Z.m01yGTVLPsL/Fey1Y7HUijYgi', '姜瑜', 0, '男', '15313571660', '67805583', '2018-01-06', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '天益科技有限公司', NULL, NULL, 'EkkmA8o8JO', '1988-08-12 19:02:43', '1991-07-08 09:36:22');

-- ----------------------------
-- Procedure structure for SP_QueryData
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_QueryData`;
delimiter ;;
CREATE PROCEDURE `SP_QueryData`(IN user_id varchar(16))
BEGIN
SET @sql = NULL;
SET @user_id = NULL;
SELECT
  GROUP_CONCAT(DISTINCT
    CONCAT(
      'MAX(IF(c.name = \'',
      c.name,
      '\', sc.score, 0)) AS \'',
      c.name, '\''
    )
  ) INTO @sql
FROM courses c;

SET @sql = CONCAT('SELECT u.uid uid, u.name name, ', @sql, 
                        'FROM scores sc 
												LEFT JOIN courses c on c.id=sc.course_id 
												LEFT JOIN users u on u.id=sc.student_id');
IF user_id is not null and user_id <> '' THEN
SET @user_id = user_id;
SET @sql = CONCAT(@sql,' where u.id=\'', @user_id, '\'');
END 	IF;
SET @sql = CONCAT(@sql,' GROUP BY u.uid');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
