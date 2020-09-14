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

 Date: 13/09/2020 23:31:22
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
  `teacher_id` bigint(20) UNSIGNED NULL DEFAULT NULL COMMENT '授课老师',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `courses_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of courses
-- ----------------------------
INSERT INTO `courses` VALUES (1, '语文', 3, '2020-09-12 09:07:48', '2020-09-12 09:09:11');
INSERT INTO `courses` VALUES (2, '数学', 1, '2020-09-12 09:07:48', '2020-09-12 09:07:48');
INSERT INTO `courses` VALUES (3, '英语', 1, '2020-09-12 09:07:48', '2020-09-12 09:07:48');
INSERT INTO `courses` VALUES (4, '物理', 1, '2020-09-12 09:07:48', '2020-09-12 09:07:48');
INSERT INTO `courses` VALUES (5, '化学', 1, '2020-09-12 09:07:48', '2020-09-12 09:07:48');
INSERT INTO `courses` VALUES (6, '生物', 1, '2020-09-12 09:07:48', '2020-09-12 09:07:48');
INSERT INTO `courses` VALUES (7, '地理', 1, '2020-09-12 09:07:48', '2020-09-12 09:07:48');
INSERT INTO `courses` VALUES (8, '政治', 1, '2020-09-12 09:07:48', '2020-09-12 09:07:48');
INSERT INTO `courses` VALUES (9, '历史', 1, '2020-09-12 09:07:48', '2020-09-12 09:07:48');
INSERT INTO `courses` VALUES (10, '化研', 4, '2020-09-13 20:12:37', '2020-09-13 20:12:37');

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
INSERT INTO `exams` VALUES (1, '第一次月考', '2005-03-16', '2020-09-13 03:03:45', '2020-09-13 03:03:45');
INSERT INTO `exams` VALUES (2, '第二次月考', '1991-02-26', '2020-09-13 03:03:45', '2020-09-13 03:03:45');
INSERT INTO `exams` VALUES (3, '第三次月考', '1974-09-16', '2020-09-13 03:03:45', '2020-09-13 03:03:45');
INSERT INTO `exams` VALUES (4, '第四次月考', '1982-05-22', '2020-09-13 03:03:45', '2020-09-13 03:03:45');
INSERT INTO `exams` VALUES (5, '第一学期半期考', '2016-07-02', '2020-09-13 03:03:45', '2020-09-13 03:03:45');
INSERT INTO `exams` VALUES (6, '第一学期期末考', '2015-01-11', '2020-09-13 03:03:45', '2020-09-13 03:03:45');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (67, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (68, '2020_09_05_130614_create_parents_table', 1);
INSERT INTO `migrations` VALUES (69, '2020_09_05_133331_create_teachers_table', 1);
INSERT INTO `migrations` VALUES (70, '2020_09_05_133519_create_courses_table', 1);
INSERT INTO `migrations` VALUES (71, '2020_09_05_133902_create_exams_table', 1);
INSERT INTO `migrations` VALUES (72, '2020_09_05_134323_create_scores_table', 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parents
-- ----------------------------
INSERT INTO `parents` VALUES (1, '张三', 45, '父子', NULL, NULL, NULL, 32, '2020-09-10 21:20:07', '2020-09-10 21:20:07');
INSERT INTO `parents` VALUES (3, '张三', 45, '父子', NULL, NULL, NULL, 3, '2020-09-10 21:52:18', '2020-09-10 21:52:18');
INSERT INTO `parents` VALUES (5, '张三', 45, '父子', NULL, NULL, NULL, 10, '2020-09-10 23:59:53', '2020-09-10 23:59:53');

-- ----------------------------
-- Table structure for scores
-- ----------------------------
DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `score` tinyint(4) NOT NULL COMMENT '成绩',
  `student_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属学生',
  `exam_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属考试',
  `course_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属课程',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 96 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scores
-- ----------------------------
INSERT INTO `scores` VALUES (4, 60, 3, 1, 1, '2020-09-13 00:09:42', '2020-09-13 20:21:18');
INSERT INTO `scores` VALUES (5, 67, 3, 1, 2, '2020-09-13 00:09:42', '2020-09-13 10:15:22');
INSERT INTO `scores` VALUES (6, 98, 3, 1, 3, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (7, 87, 3, 1, 4, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (8, 65, 3, 1, 5, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (9, 67, 3, 1, 6, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (10, 78, 3, 1, 7, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (11, 78, 3, 1, 8, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (12, 65, 3, 1, 9, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (13, 33, 4, 1, 1, '2020-09-13 00:32:53', '2020-09-13 12:09:54');
INSERT INTO `scores` VALUES (14, 77, 4, 1, 2, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (15, 88, 4, 1, 3, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (16, 77, 4, 1, 4, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (17, 66, 4, 1, 5, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (18, 55, 4, 1, 6, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (19, 55, 4, 1, 7, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (20, 89, 4, 1, 8, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (21, 65, 4, 1, 9, '2020-09-13 00:32:53', '2020-09-13 00:32:53');
INSERT INTO `scores` VALUES (22, 76, 5, 4, 1, '2020-09-13 00:34:07', '2020-09-13 00:34:07');
INSERT INTO `scores` VALUES (23, 77, 5, 4, 2, '2020-09-13 00:34:07', '2020-09-13 00:34:07');
INSERT INTO `scores` VALUES (24, 89, 5, 4, 3, '2020-09-13 00:34:07', '2020-09-13 00:34:07');
INSERT INTO `scores` VALUES (25, 98, 5, 4, 4, '2020-09-13 00:34:07', '2020-09-13 00:34:07');
INSERT INTO `scores` VALUES (26, 90, 5, 4, 5, '2020-09-13 00:34:07', '2020-09-13 00:34:07');
INSERT INTO `scores` VALUES (27, 99, 5, 4, 6, '2020-09-13 00:34:07', '2020-09-13 00:34:07');
INSERT INTO `scores` VALUES (28, 87, 5, 4, 7, '2020-09-13 00:34:07', '2020-09-13 00:34:07');
INSERT INTO `scores` VALUES (29, 76, 5, 4, 8, '2020-09-13 00:34:07', '2020-09-13 00:34:07');
INSERT INTO `scores` VALUES (30, 65, 5, 4, 9, '2020-09-13 00:34:07', '2020-09-13 00:34:07');
INSERT INTO `scores` VALUES (31, 89, 3, 4, 1, '2020-09-13 01:04:49', '2020-09-13 01:04:49');
INSERT INTO `scores` VALUES (32, 87, 3, 4, 2, '2020-09-13 01:04:49', '2020-09-13 01:04:49');
INSERT INTO `scores` VALUES (33, 65, 3, 4, 3, '2020-09-13 01:04:49', '2020-09-13 01:04:49');
INSERT INTO `scores` VALUES (34, 67, 3, 4, 4, '2020-09-13 01:04:49', '2020-09-13 01:04:49');
INSERT INTO `scores` VALUES (35, 87, 3, 4, 5, '2020-09-13 01:04:49', '2020-09-13 01:04:49');
INSERT INTO `scores` VALUES (36, 98, 3, 4, 6, '2020-09-13 01:04:49', '2020-09-13 01:04:49');
INSERT INTO `scores` VALUES (37, 76, 3, 4, 7, '2020-09-13 01:04:49', '2020-09-13 01:04:49');
INSERT INTO `scores` VALUES (38, 57, 3, 4, 8, '2020-09-13 01:04:49', '2020-09-13 01:04:49');
INSERT INTO `scores` VALUES (39, 87, 3, 4, 9, '2020-09-13 01:04:49', '2020-09-13 01:04:49');
INSERT INTO `scores` VALUES (40, 0, 3, 5, 1, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (41, 45, 3, 5, 2, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (42, 67, 3, 5, 3, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (43, 77, 3, 5, 4, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (44, 77, 3, 5, 5, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (45, 127, 3, 5, 6, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (46, 99, 3, 5, 7, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (47, 99, 3, 5, 8, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (48, 87, 3, 5, 9, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (49, 89, 3, 6, 1, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (50, 98, 3, 6, 2, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (51, 89, 3, 6, 3, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (52, 98, 3, 6, 4, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (53, 88, 3, 6, 5, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (54, 77, 3, 6, 6, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (55, 88, 3, 6, 7, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (56, 88, 3, 6, 8, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (57, 99, 3, 6, 9, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (58, 99, 4, 4, 1, '2020-09-13 02:11:42', '2020-09-13 02:11:42');
INSERT INTO `scores` VALUES (59, 99, 4, 4, 2, '2020-09-13 02:11:42', '2020-09-13 02:11:42');
INSERT INTO `scores` VALUES (60, 99, 4, 4, 3, '2020-09-13 02:11:42', '2020-09-13 02:11:42');
INSERT INTO `scores` VALUES (61, 99, 4, 4, 4, '2020-09-13 02:11:42', '2020-09-13 02:11:42');
INSERT INTO `scores` VALUES (62, 88, 4, 4, 5, '2020-09-13 02:11:42', '2020-09-13 02:11:42');
INSERT INTO `scores` VALUES (63, 88, 4, 4, 6, '2020-09-13 02:11:42', '2020-09-13 02:11:42');
INSERT INTO `scores` VALUES (64, 88, 4, 4, 7, '2020-09-13 02:11:42', '2020-09-13 02:11:42');
INSERT INTO `scores` VALUES (65, 88, 4, 4, 8, '2020-09-13 02:11:42', '2020-09-13 02:11:42');
INSERT INTO `scores` VALUES (66, 88, 4, 4, 9, '2020-09-13 02:11:42', '2020-09-13 02:11:42');
INSERT INTO `scores` VALUES (67, 124, 7, 1, 1, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (68, 33, 7, 1, 2, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (69, 67, 7, 1, 3, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (70, 78, 7, 1, 4, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (71, 87, 7, 1, 5, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (72, 87, 7, 1, 6, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (73, 87, 7, 1, 7, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (74, 78, 7, 1, 8, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (75, 98, 7, 1, 9, '2020-09-13 09:49:20', '2020-09-13 09:49:20');
INSERT INTO `scores` VALUES (76, 57, 14, 3, 1, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (77, 120, 14, 3, 2, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (78, 76, 14, 3, 3, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (79, 89, 14, 3, 4, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (80, 89, 14, 3, 5, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (81, 87, 14, 3, 6, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (82, 67, 14, 3, 7, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (83, 89, 14, 3, 8, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (84, 87, 14, 3, 9, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (85, 67, 14, 3, 10, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (86, 89, 8, 1, 1, '2020-09-13 20:31:51', '2020-09-13 20:33:43');
INSERT INTO `scores` VALUES (87, 89, 8, 1, 2, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (88, 89, 8, 1, 3, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (89, 87, 8, 1, 4, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (90, 87, 8, 1, 5, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (91, 87, 8, 1, 6, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (92, 67, 8, 1, 7, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (93, 67, 8, 1, 8, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (94, 77, 8, 1, 9, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (95, 77, 8, 1, 10, '2020-09-13 20:31:52', '2020-09-13 20:31:52');

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
INSERT INTO `teachers` VALUES (1, '时雪', '女', '17007375433', '69808282', '1996-05-07 12:13:18', '1976-10-17 05:41:03');
INSERT INTO `teachers` VALUES (2, '徐智勇', '女', '15248909855', '52920774', '2002-01-05 03:48:39', '2020-09-10 23:41:51');
INSERT INTO `teachers` VALUES (3, '柏红霞', '女', '13951810416', '27685687', '1989-10-03 00:43:53', '2020-02-25 06:52:42');
INSERT INTO `teachers` VALUES (4, '敖楠', '女', '18094093949', '57705102', '1977-03-05 02:08:18', '2003-02-28 14:50:56');
INSERT INTO `teachers` VALUES (5, '滕红', '女', '15820302133', '41788401', '1977-02-15 04:38:19', '2017-12-24 01:27:59');
INSERT INTO `teachers` VALUES (6, '畅华', '男', '15958713250', '16570782', '2001-11-18 14:56:00', '2000-07-28 13:36:04');
INSERT INTO `teachers` VALUES (8, '管荣', '女', '17634835289', '84710750', '1998-04-16 01:17:21', '2003-01-31 19:56:30');

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
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$zruwG14as35el7fZgJV6heze2Hcd10NRCu0f1j9Y4yRrbf7AjOlgW', '系统管理员', 1, '男', '18179871320', '13046369', '2002-07-09', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '创联世纪信息有限公司', NULL, NULL, '8p14MwRn7Jdst1No7J43qsnPFrbevgN5JowVppo67KgdxloNbp6wIpQUQSec', '1989-01-29 13:14:14', '2020-09-09 22:34:59');
INSERT INTO `users` VALUES (2, '69299701', '$2y$10$fklQwLK36zEVhc/jzH4VR.fH4ySnEHBmUK4Em1iK3Z35oB14yNQ7.', '管波', 0, '男', '18582312404', '99296209', '1994-11-09', '汉', '家庭经济状况1', '户口所在地', '1', '户籍地址', '现住址', 0, '留守儿童情', '留守儿童托管情况', '超艺信息有限公司', '曾担任班干部的情况', '获奖情况', 'PKrJrkSAQ9', '1996-06-13 23:03:11', '2020-09-11 22:21:01');
INSERT INTO `users` VALUES (3, '42626416', '$2y$10$LseoUBFLjotEwFflO/tMLersqfP4raq4qkowS4VCH8KF.4mbqtqrK', '柏智明', 0, '男', '17180383406', '65791172', '1982-06-13', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '南康科技有限公司', NULL, NULL, '8HRAv13ruhUcawufGIB7rDM9BM5TmTBOcn83u9aIISg2vrrHNrlJJCJxRaug', '1994-07-19 10:13:30', '2020-09-10 21:52:05');
INSERT INTO `users` VALUES (4, '44181897', '$2y$10$pNlh8g2s8EeNi5LfAm7kQ.Yb6f/b7rr/PbB7pRuoAY/Jga8uLTRve', '周阳', 0, '女', '17198594837', '31122985', '1994-03-22', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '方正科技传媒有限公司', NULL, NULL, 'JKOOG0CTnk', '2016-08-26 21:14:26', '1981-02-17 02:40:29');
INSERT INTO `users` VALUES (5, '61360406', '$2y$10$oDNf2v4JFweVqr9RX.iv3uF90y4OSKR/ji35GSPdZUp3A6/AghIe6', '胡晧', 0, '女', '18731670478', '75436196', '1987-10-16', '畲', NULL, NULL, '0', NULL, NULL, 1, NULL, NULL, '艾提科信科技有限公司', NULL, NULL, 'A4XiGfxXgh', '2016-08-12 17:18:40', '2020-09-11 22:36:40');
INSERT INTO `users` VALUES (7, '86086630', '$2y$10$gKn06B0G1BpbpEP7AKt1jOt8f5vK4cxVmJuYYI0JI3oodvVnu6NZ.', '鄢畅', 0, '男', '18753256344', '93087616', '1983-07-08', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '华成育卓信息有限公司', NULL, NULL, 'yREzRveT4S', '1993-11-06 16:50:58', '2006-11-13 20:26:27');
INSERT INTO `users` VALUES (8, '29786124', '$2y$10$T1uM6i9gwZ1kYQ4FeCK6oeH/7jWHMIprlaW6jbJszNgLAJjoJvurK', '吕明霞', 0, '女', '17190950841', '84552806', '2017-01-13', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '创汇科技有限公司', NULL, NULL, 'Fdu6xc5cwxidJH8rQMFqjB1KlPwwZB2KZHw3Hzc0mtsA9fq33xxR8BhieB30', '1988-10-21 09:17:21', '1994-04-07 04:22:48');
INSERT INTO `users` VALUES (9, '42746992', '$2y$10$ulpG5.gchdK0iaK44NTZFemqxOgfh/f0vkElgMGIPqW2cdWC3hmjm', '韦淑华', 0, '男', '17686416244', '70019089', '2001-03-31', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '良诺传媒有限公司', NULL, NULL, 'SJLzJ9rU9i', '2010-04-09 14:25:26', '2020-09-10 21:49:00');
INSERT INTO `users` VALUES (10, '34533333', '$2y$10$KHFtZT3oHIJXwOYqT2Fld.PFHhTr4WRkivCFcqVQbxMdQf0NFpB5K', '葛哲', 0, '女', '15832458858', '11526012', '1991-11-01', '畲', NULL, NULL, '0', NULL, NULL, 1, NULL, NULL, '中建创业信息有限公司', NULL, NULL, 'VyViwnVI0U', '1970-06-08 06:55:06', '2020-09-10 23:59:53');
INSERT INTO `users` VALUES (11, '87912899', '$2y$10$MecKLEmk9skRyxjTJp90KuTbQxJvtxvXmai8u093iRvxTY9CMMdcO', '秦晨', 0, '女', '13787632181', '14632878', '1988-09-21', '畲', NULL, NULL, '0', NULL, NULL, 1, NULL, NULL, '网新恒天传媒有限公司', NULL, NULL, 'PVLJeHT7Ij', '2003-11-14 23:07:48', '2020-09-11 22:39:20');
INSERT INTO `users` VALUES (12, '55222194', '$2y$10$/BQa..onQoSVcMCWKpQDseogO4FGbiz3XCa8ilE4AQSB6TJz9GqEO', '陶建', 0, '男', '17093951106', '73301469', '2016-07-02', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '精芯网络有限公司', NULL, NULL, 'QqqgQl4Ssf', '1978-11-15 01:46:13', '2016-10-11 01:04:26');
INSERT INTO `users` VALUES (13, '94753488', '$2y$10$qfNZtKvbM98xe0YioraG9exn36FrctcNXlfpkWZmDTqrXJfvh.h6i', '巫志新', 0, '男', '13133341462', '11578044', '1993-08-06', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '信诚致远科技有限公司', NULL, NULL, '5v8eTNL7Wv', '1994-11-22 19:10:52', '1973-09-30 17:47:06');
INSERT INTO `users` VALUES (14, '33943734', '$2y$10$QEM0r.L1BRhQ87MGkOaCPeiOT4qZa5ZxBmYMJI055lntAYrS4U3Wi', '金丽娟', 0, '男', '17032208651', '43060314', '2016-07-21', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '创亿网络有限公司', NULL, NULL, 'bgEMPtK9Wr', '1994-04-24 06:47:07', '1986-01-05 20:50:36');
INSERT INTO `users` VALUES (15, '74236572', '$2y$10$r8JqS1a9jpTX7fH76fefaeDjREpnYtfzjwXULizL5.SumkkeJwpYG', '易洪', 0, '女', '17190019496', '98131300', '2019-06-29', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '超艺网络有限公司', NULL, NULL, 'RVrZldtYcc', '2004-04-15 05:38:46', '2015-04-15 02:34:11');
INSERT INTO `users` VALUES (16, '71889947', '$2y$10$O1zDd.6IEYs9wcZl8qLMI.ggCPGYuYj6t3aKBR7Dr7hx/W7kzWeXu', '关云', 0, '男', '17190699942', '25268289', '1980-05-30', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '艾提科信网络有限公司', NULL, NULL, '1pXSf4Zj2j', '2017-12-29 03:40:16', '1988-01-14 17:07:01');
INSERT INTO `users` VALUES (17, '89147808', '$2y$10$Mk7FIMnL49SoeK1I2Bk6yOW/PPYPr33RIImEdlr2unB7EfsXphINm', '李阳', 0, '男', '17002205047', '61117906', '1990-06-30', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '天益信息有限公司', NULL, NULL, 'dzPWotehAb', '2002-01-23 04:35:14', '1998-12-10 14:47:23');
INSERT INTO `users` VALUES (18, '15906724', '$2y$10$alW6WvKfPcDyLaI5vI.AOOoWH6eCKJ1xbcUUYKpRqdrgJRfuxSHFu', '于鹰', 0, '女', '15282879630', '24326134', '2009-08-30', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '商软冠联网络有限公司', NULL, NULL, 'fv2zMgQK8S', '1994-07-13 21:00:44', '1988-12-06 16:11:05');
INSERT INTO `users` VALUES (19, '99353843', '$2y$10$4jZ.r6S2.5myPrYwb5xb8emuMQSIqRhbVwzlth1FlYrwyhLn/T5sS', '邓利', 0, '男', '17013003896', '49545567', '2017-06-08', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '合联电子科技有限公司', NULL, NULL, 'UPBLr6buFF', '1989-08-02 10:17:55', '2011-07-24 03:07:44');
INSERT INTO `users` VALUES (20, '71288522', '$2y$10$tuy4CPwSjzDHW9QM9XfzmeRZCYKjTkFLlakV2YEiTjQs0VWFhqF02', '莫彬', 0, '女', '17693136098', '50221128', '1987-08-05', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '济南亿次元信息有限公司', NULL, NULL, '0nlKaxZsVk', '2010-05-24 06:33:26', '2003-03-03 09:14:26');
INSERT INTO `users` VALUES (21, '43442812', '$2y$10$1qzmYaRVnfe3tFVi5GSpHeLVXmsK5CnSImPb.1YQqCIP/z/zqdz.G', '傅芬', 0, '男', '17087616963', '64706685', '1999-02-08', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '新格林耐特网络有限公司', NULL, NULL, '4O5Ymzdsx0', '2005-04-13 21:41:28', '1982-07-30 16:05:20');
INSERT INTO `users` VALUES (22, '19488215', '$2y$10$HYrZ58X.FqhyMV1L761rRu2.WJCIO//pHfYizjDLbiLAvhrF/xcBq', '练华', 0, '女', '17080866130', '55977953', '2015-05-04', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '时刻信息有限公司', NULL, NULL, 'BzSueOGpMN', '1975-07-13 11:04:53', '2000-01-16 00:43:46');
INSERT INTO `users` VALUES (23, '28978240', '$2y$10$tP5PwQVYLho8VACRxmE21OwUx152.gUpm0FX97d5PMSTJXY8Mu0rm', '姚馨予', 0, '男', '15023487832', '50155755', '2012-10-28', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '彩虹科技有限公司', NULL, NULL, 'mNnMqYzL8j', '2004-09-17 04:26:28', '2013-08-16 15:31:48');
INSERT INTO `users` VALUES (24, '96379736', '$2y$10$dH9myBIM.Il5MkSDziITU.yy.uk5fVIc1zYHDnDbeYseMSIgEdWSm', '翁桂芳', 0, '男', '18162263730', '15777255', '2006-06-07', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, 'MBP软件科技有限公司', NULL, NULL, '1mr9gVMD8k', '2016-08-01 06:32:26', '2016-04-06 22:38:18');
INSERT INTO `users` VALUES (25, '98489085', '$2y$10$wDag3ngiXem3SX0CX4tDWeFyNcEGhXgmPWrpGYY9WziVTn.MTNufG', '翟晨', 0, '女', '17078599240', '74673382', '1983-11-05', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '黄石金承科技有限公司', NULL, NULL, 'P6sPpPtfFu', '1998-12-19 01:38:28', '2014-10-30 07:31:25');
INSERT INTO `users` VALUES (26, '72496547', '$2y$10$oDeDIsY/OI90wnDnISQXcOwxvgk2gx0v/EoIIQinD7Er.kgvmNq/e', '卜玲', 0, '男', '18772433106', '75807236', '2014-08-25', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '创汇传媒有限公司', NULL, NULL, 'ZajFyS0PP3', '1990-08-19 10:11:45', '1987-07-01 06:59:08');
INSERT INTO `users` VALUES (27, '92541836', '$2y$10$zHpCAqNYTRfBIG6vNidblee1H5geHhmiia92lW3HAr4XrSM6SvfTq', '邓君', 0, '男', '18343939625', '69545573', '1987-11-03', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '银嘉网络有限公司', NULL, NULL, 'Qz0r84gkbB', '1993-05-26 18:37:46', '1981-03-30 11:34:41');
INSERT INTO `users` VALUES (28, '65063156', '$2y$10$7RtBdaEyzlxnJw7MGdnNr.qAonH11t7Oyh9iwgwNIwdPwUeqQJTKm', '季刚', 0, '男', '14747527793', '96739019', '1988-05-17', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '银嘉科技有限公司', NULL, NULL, 'y1a9u8HgJv', '2014-06-07 00:03:41', '1983-11-24 10:35:23');
INSERT INTO `users` VALUES (29, '26748350', '$2y$10$HwtY0ViO9YIvqWdaslnhGeU0AEaX5Ci81IpDM2geCK80/lgtwMURu', '井雪梅', 0, '男', '13464010224', '18067866', '1974-12-18', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '华成育卓信息有限公司', NULL, NULL, '3gLKsbt8Of', '2009-05-14 03:44:44', '1970-01-31 08:47:23');
INSERT INTO `users` VALUES (30, '90266637', '$2y$10$7PlpKAfdcKhEkU6TpOFQEuK93dLytjifB8uAEuYyobSe604OAk8n.', '孟博', 0, '男', '17183572660', '82243059', '2008-05-13', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '晖来计算机信息有限公司', NULL, NULL, 'NE5japYeFB', '2018-12-25 01:21:57', '1979-03-28 05:32:31');
INSERT INTO `users` VALUES (31, '99094009', '$2y$10$NHY2lAiLTvht7QfAsEqBCu/MiZ96u/3w5dbLDQ86KQTUrUn5jzIhG', '丛旭', 0, '男', '17764667129', '98585581', '2002-11-30', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '方正科技信息有限公司', NULL, NULL, 'kEymAbknMl', '2020-06-26 16:40:40', '2002-02-08 22:52:35');
INSERT INTO `users` VALUES (32, '61058994', '$2y$10$jvk1gZD6BWbvPIlbGI7o8u0sOeH6wh9HcMBKMbIrB7BFbJgxthJxG', '俞新华', 0, '男', '18820767904', '46244060', '1970-05-11', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '新格林耐特信息有限公司', NULL, NULL, '5LNaOBmwDm', '2004-09-01 20:33:10', '2020-09-10 21:20:07');
INSERT INTO `users` VALUES (33, '62977109', '$2y$10$0dKdjhCKRNeb/aPJRJp9SOk2tlm.9fRIqhN.PmmSzrcSU.eas8yzi', '植晶', 0, '男', '13832857100', '51062850', '1989-08-18', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '佳禾传媒有限公司', NULL, NULL, 'nF5WYYfKVo', '2013-01-24 06:29:21', '1995-03-30 08:10:55');
INSERT INTO `users` VALUES (34, '70102570', '$2y$10$c.2SEqkrSpUSYb7LaCFeLexLf8lTrXACazoD/KeNjXBdtx9qI1EEq', '包爱华', 0, '女', '13912038526', '28011900', '2020-04-14', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '菊风公司科技有限公司', NULL, NULL, 'uP6IW1FuiO', '1980-10-10 08:59:59', '1988-01-13 00:52:23');
INSERT INTO `users` VALUES (35, '79467452', '$2y$10$WUAsoMNFT52e.F5BdZ8fxOhPXTILKY8yIkmP41BX2QwFRMq9IYP0y', '屈建明', 0, '女', '17079445292', '26804751', '1988-05-19', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '彩虹科技有限公司', NULL, NULL, 'ghLhVmaUJH', '1978-12-25 23:52:42', '2002-06-23 00:26:04');
INSERT INTO `users` VALUES (36, '92922690', '$2y$10$/PXqc4KL17SfsyAeJz4iiuu3WbpVm7ix53JdDYdAnEB1vEwqVPV0m', '屠君', 0, '男', '17189135115', '71202992', '1989-10-22', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '合联电子科技有限公司', NULL, NULL, 'iNVOTTAGrp', '1978-04-21 10:42:11', '2008-07-30 06:47:59');
INSERT INTO `users` VALUES (37, '88533884', '$2y$10$w1PW0xLJ.myTjvhHOtn08uTGicfStZlXbQz9irI1Kq1WIC.CX0maa', '卜艳', 0, '男', '18231366281', '31394436', '1987-05-24', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '新格林耐特信息有限公司', NULL, NULL, 'GiG9wmOTFZ', '1972-02-22 21:18:23', '1996-09-28 21:38:33');
INSERT INTO `users` VALUES (38, '58356537', '$2y$10$u59g9NU9CfDgKxTa2wd9ou38O7ohCpyCCY4D7P/yTWgV4AzLpEW1e', '方晨', 0, '男', '17017963860', '77210881', '1986-01-15', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '数字100信息有限公司', NULL, NULL, '4P7O9T7TSM', '2000-02-28 02:28:51', '1974-07-10 17:10:21');
INSERT INTO `users` VALUES (39, '90516179', '$2y$10$0qNFPgdQQgW0u1bHCIhrEeG1hOskLKVfc0qypQrr0IXnjifXGGTJy', '陶桂香', 0, '女', '13395451994', '54574555', '2020-06-07', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '易动力信息有限公司', NULL, NULL, 'XZ9fpZASBo', '2015-12-19 19:09:53', '1981-04-30 17:25:21');
INSERT INTO `users` VALUES (40, '27134099', '$2y$10$goiwF1RprhbkjYWPpcNTO.Q3iewkeLbM5WUzxIGDQG3Gzs/MiUUlq', '糜翔', 0, '男', '18584597692', '85805387', '2015-11-16', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '群英网络有限公司', NULL, NULL, '5t8ZFknjfd', '1986-06-22 23:15:01', '1970-10-26 15:00:50');
INSERT INTO `users` VALUES (41, '60415860', '$2y$10$ElVoGypBdGr6SJxSW1rKzexRLv12Uz891Y/1aSHM8XUG0j/HujQoi', '高正诚', 0, '女', '13119106359', '59066585', '1987-02-01', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '时刻传媒有限公司', NULL, NULL, 'tsEjkBAFLS', '2019-07-02 09:25:16', '2016-09-25 10:58:35');
INSERT INTO `users` VALUES (42, '91254882', '$2y$10$t/4yGsVyBewndqni/6q.VO6qHyITIYRTmdlC/69I42M/TMFlr6yqa', '谢文', 0, '男', '18231419658', '84308288', '1972-04-20', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '创亿科技有限公司', NULL, NULL, 'LHfjEi5Hbp', '1988-10-20 19:48:50', '1985-04-21 06:54:28');
INSERT INTO `users` VALUES (43, '15201378', '$2y$10$yChnBUbAkCcvPrjYvPZxkOBurmUSpKa39b7S.T3URp1GEPJ3IteQ6', '柳霞', 0, '女', '17013538542', '79508133', '2014-03-16', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '超艺传媒有限公司', NULL, NULL, '8Mjz3eXM6k', '1979-10-28 18:44:15', '1978-04-17 10:18:56');
INSERT INTO `users` VALUES (44, '63603812', '$2y$10$7yghk0t.XetEZglTX.QV1uQxgefuPhFqPk4kgrfh9mH2qqohHvy9W', '单玉梅', 0, '男', '15581801030', '46104260', '1970-12-05', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '鸿睿思博网络有限公司', NULL, NULL, 'ITzPqEYFYg', '1997-01-17 03:16:07', '2018-08-16 15:16:08');
INSERT INTO `users` VALUES (45, '98666890', '$2y$10$EvQZy2nqpDvgdhF3MVIpl.pHBKc2.TADeiLXCeuh95OhKqtNo2LPG', '倪阳', 0, '男', '17095412789', '60284419', '1984-03-21', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '快讯传媒有限公司', NULL, NULL, 'MOYyr91Zug', '2007-03-20 02:24:15', '1992-11-22 02:20:40');
INSERT INTO `users` VALUES (46, '98407053', '$2y$10$u8Up2on9BZyhGJCJg0wG6.zO9oXi6DyUMsNskYgftt4EqVjXm7WvG', '陈琳', 0, '男', '15947969038', '39315875', '1997-02-14', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '凌云传媒有限公司', NULL, NULL, '7BaPb8N0xd', '2016-03-26 23:27:57', '1989-11-23 01:20:46');
INSERT INTO `users` VALUES (47, '30856335', '$2y$10$Sv7V8cMH1eSJYFs6/rNarO/4T2gdz8goUuXj3nq0AKSGcWyvzrf9i', '宋洋', 0, '女', '17006352157', '18316497', '1970-01-23', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '七喜网络有限公司', NULL, NULL, 'vnF4lNqPIT', '1983-11-26 01:55:48', '1984-09-20 11:50:35');
INSERT INTO `users` VALUES (48, '18405235', '$2y$10$gW/i/wqZNiGIWSi9cgEI7ePlR/7x0uxElu6NAEXQnOLSXoNtD/7FC', '孟丽娟', 0, '男', '18793448043', '47755100', '2007-08-28', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '数字100网络有限公司', NULL, NULL, 'ZlF7jZbAnC', '1980-12-12 21:02:43', '1972-08-10 10:00:09');
INSERT INTO `users` VALUES (49, '34858055', '$2y$10$p/hJLElN38YqtLjLXzWWm.go/UslKw9t.z0tkyHWLn2mNLz.7CPYC', '郎莹', 0, '男', '13769785520', '41173515', '1975-11-01', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '创联世纪网络有限公司', NULL, NULL, 'KdSRIE0rg0', '2015-04-29 12:31:24', '2002-09-12 21:56:23');
INSERT INTO `users` VALUES (50, '81619218', '$2y$10$9VZofzXlSnuc7bIsu8MuZOzXNWy3bsNCd/.ubNVaDuNVf0sWN/Hb2', '左桂花', 0, '女', '17664597731', '69641366', '2004-02-29', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '恒聪百汇科技有限公司', NULL, NULL, '33YoCGqu8z', '1984-06-12 06:52:53', '1983-07-16 13:02:14');
INSERT INTO `users` VALUES (51, '3042013024', '$2y$10$WmiSUTcB7w5q9NL3mR8IrO5ITfcRquqGYgHb4ZElXxxRg3vw5zHbG', 's佟欢s', 0, '男', '13850863745', '27102160', '2000-12-05', '畲', '家庭经济状况1', '户口所在地', '2', '户籍地址', '现住址', 1, '留守儿童情', '留守儿童托管情况', NULL, NULL, NULL, NULL, '2020-09-10 22:32:27', '2020-09-10 22:32:27');
INSERT INTO `users` VALUES (53, '3042013025', '$2y$10$1FPwJ.kD786CiZG/epTHVO.5QXkbteclu2.VGavhNsWgXXTYr5p5K', '鲁文彬', 0, '男', '13850863745', '27102160', '2000-12-05', '畲', '家庭经济状况1', '户口所在地', '2', '户籍地址', '现住址', 1, '留守儿童情', '留守儿童托管情况', NULL, NULL, NULL, NULL, '2020-09-10 22:33:29', '2020-09-10 22:33:29');
INSERT INTO `users` VALUES (56, '3042013026', '$2y$10$gF6ARJuJhXzEyJhUnjBSzee1sC08MHc1D3Obe1KaSO4JScxFabCke', '柏智明', 0, '男', '17180383406', '97811759', '2000-12-05', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-13 13:22:21', '2020-09-13 13:22:21');

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
