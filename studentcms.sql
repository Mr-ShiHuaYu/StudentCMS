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

 Date: 20/09/2020 23:05:13
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
INSERT INTO `courses` VALUES (1, '语文', 150, 1, '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `courses` VALUES (2, '数学', 150, 1, '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `courses` VALUES (3, '英语', 150, 1, '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `courses` VALUES (4, '物理', 100, 1, '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `courses` VALUES (5, '化学', 100, 1, '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `courses` VALUES (6, '生物', 100, 1, '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `courses` VALUES (7, '地理', 100, 1, '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `courses` VALUES (8, '政治', 100, 1, '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `courses` VALUES (9, '历史', 100, 1, '2020-09-20 22:45:25', '2020-09-20 22:45:25');

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
INSERT INTO `exams` VALUES (1, '第一次月考', '2003-11-09', '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `exams` VALUES (2, '第二次月考', '2001-11-06', '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `exams` VALUES (3, '第三次月考', '2005-08-22', '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `exams` VALUES (4, '第四次月考', '1993-06-12', '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `exams` VALUES (5, '第一学期半期考', '1977-03-21', '2020-09-20 22:45:25', '2020-09-20 22:45:25');
INSERT INTO `exams` VALUES (6, '第一学期期末考', '1996-09-09', '2020-09-20 22:45:25', '2020-09-20 22:45:25');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 203 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scores
-- ----------------------------
INSERT INTO `scores` VALUES (4, 143, 3, 1, 1, '2020-09-13 00:09:42', '2020-09-19 22:03:28');
INSERT INTO `scores` VALUES (5, 67, 3, 1, 2, '2020-09-13 00:09:42', '2020-09-13 10:15:22');
INSERT INTO `scores` VALUES (6, 145, 3, 1, 3, '2020-09-13 00:09:42', '2020-09-15 22:11:21');
INSERT INTO `scores` VALUES (7, 87, 3, 1, 4, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (8, 65, 3, 1, 5, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (9, 67, 3, 1, 6, '2020-09-13 00:09:42', '2020-09-13 00:09:42');
INSERT INTO `scores` VALUES (10, 87, 3, 1, 7, '2020-09-13 00:09:42', '2020-09-19 23:45:44');
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
INSERT INTO `scores` VALUES (86, 143, 2, 1, 1, '2020-09-13 20:31:51', '2020-09-13 20:33:43');
INSERT INTO `scores` VALUES (87, 89, 2, 1, 2, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (88, 89, 2, 1, 3, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (89, 87, 2, 1, 4, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (90, 87, 2, 1, 5, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (91, 87, 2, 1, 6, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (92, 67, 2, 1, 7, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (93, 67, 2, 1, 8, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
INSERT INTO `scores` VALUES (94, 77, 2, 1, 9, '2020-09-13 20:31:52', '2020-09-13 20:31:52');
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
INSERT INTO `scores` VALUES (105, 136, 18, 1, 2, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (106, 135, 18, 1, 3, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (107, 78, 18, 1, 4, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (108, 87, 18, 1, 5, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (109, 67, 18, 1, 6, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (110, 87, 18, 1, 7, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (111, 67, 18, 1, 8, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (112, 89, 18, 1, 9, '2020-09-18 23:33:14', '2020-09-18 23:33:14');
INSERT INTO `scores` VALUES (113, 119, 3, 2, 1, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (114, 128, 3, 2, 2, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (115, 127, 3, 2, 3, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (116, 78, 3, 2, 4, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (117, 89, 3, 2, 5, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (118, 90, 3, 2, 6, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (119, 90, 3, 2, 7, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (120, 78, 3, 2, 8, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (121, 88, 3, 2, 9, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (122, 134, 4, 2, 1, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (123, 132, 4, 2, 2, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (124, 145, 4, 2, 3, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (125, 98, 4, 2, 4, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (126, 94, 4, 2, 5, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (127, 89, 4, 2, 6, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (128, 76, 4, 2, 7, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (129, 79, 4, 2, 8, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (130, 89, 4, 2, 9, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (131, 123, 6, 2, 1, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (132, 134, 6, 2, 2, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (133, 143, 6, 2, 3, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (134, 89, 6, 2, 4, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (135, 87, 6, 2, 5, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (136, 88, 6, 2, 6, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (137, 77, 6, 2, 7, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (138, 77, 6, 2, 8, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (139, 75, 6, 2, 9, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (140, 125, 4, 3, 1, '2020-09-20 09:38:30', '2020-09-20 09:38:30');
INSERT INTO `scores` VALUES (141, 134, 4, 3, 2, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (142, 122, 4, 3, 3, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (143, 78, 4, 3, 4, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (144, 78, 4, 3, 5, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (145, 89, 4, 3, 6, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (146, 87, 4, 3, 7, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (147, 67, 4, 3, 8, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (148, 67, 4, 3, 9, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (149, 130, 4, 4, 1, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (150, 132, 4, 4, 2, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (151, 133, 4, 4, 3, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (152, 89, 4, 4, 4, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (153, 98, 4, 4, 5, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (154, 88, 4, 4, 6, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (155, 87, 4, 4, 7, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (156, 67, 4, 4, 8, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (157, 89, 4, 4, 9, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (158, 135, 2, 2, 1, '2020-09-20 10:37:37', '2020-09-20 10:37:37');
INSERT INTO `scores` VALUES (159, 135, 2, 2, 2, '2020-09-20 10:37:37', '2020-09-20 10:37:37');
INSERT INTO `scores` VALUES (160, 135, 2, 2, 3, '2020-09-20 10:37:37', '2020-09-20 10:37:37');
INSERT INTO `scores` VALUES (161, 88, 2, 2, 4, '2020-09-20 10:37:37', '2020-09-20 10:37:37');
INSERT INTO `scores` VALUES (162, 89, 2, 2, 5, '2020-09-20 10:37:37', '2020-09-20 10:37:37');
INSERT INTO `scores` VALUES (163, 87, 2, 2, 6, '2020-09-20 10:37:37', '2020-09-20 10:37:37');
INSERT INTO `scores` VALUES (164, 89, 2, 2, 7, '2020-09-20 10:37:37', '2020-09-20 10:37:37');
INSERT INTO `scores` VALUES (165, 90, 2, 2, 8, '2020-09-20 10:37:37', '2020-09-20 10:37:37');
INSERT INTO `scores` VALUES (166, 95, 2, 2, 9, '2020-09-20 10:37:37', '2020-09-20 10:37:37');
INSERT INTO `scores` VALUES (167, 127, 2, 3, 1, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (168, 135, 2, 3, 2, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (169, 135, 2, 3, 3, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (170, 78, 2, 3, 4, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (171, 78, 2, 3, 5, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (172, 88, 2, 3, 6, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (173, 90, 2, 3, 7, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (174, 95, 2, 3, 8, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (175, 89, 2, 3, 9, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (176, 135, 2, 4, 1, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (177, 143, 2, 4, 2, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (178, 136, 2, 4, 3, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (179, 78, 2, 4, 4, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (180, 89, 2, 4, 5, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (181, 86, 2, 4, 6, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (182, 94, 2, 4, 7, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (183, 87, 2, 4, 8, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (184, 82, 2, 4, 9, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (185, 145, 2, 5, 1, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (186, 132, 2, 5, 2, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (187, 132, 2, 5, 3, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (188, 78, 2, 5, 4, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (189, 76, 2, 5, 5, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (190, 76, 2, 5, 6, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (191, 88, 2, 5, 7, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (192, 89, 2, 5, 8, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (193, 88, 2, 5, 9, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (194, 134, 2, 6, 1, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (195, 122, 2, 6, 2, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (196, 124, 2, 6, 3, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (197, 67, 2, 6, 4, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (198, 67, 2, 6, 5, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (199, 77, 2, 6, 6, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (200, 89, 2, 6, 7, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (201, 88, 2, 6, 8, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (202, 95, 2, 6, 9, '2020-09-20 22:49:55', '2020-09-20 22:49:55');

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
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (1, '钟玉梅', '女', '18417344968', '99137248', '1989-12-10 18:04:47', '2009-02-23 11:29:02');
INSERT INTO `teachers` VALUES (2, '田瑞', '男', '15122311631', '86796789', '2003-05-25 03:05:04', '2016-09-16 08:38:10');
INSERT INTO `teachers` VALUES (3, '冉文娟', '男', '17022473085', '28851489', '2007-09-21 13:38:42', '1972-01-30 22:51:33');
INSERT INTO `teachers` VALUES (4, '吉磊', '女', '17086568406', '36485159', '2012-10-24 02:33:45', '2004-01-12 23:33:12');
INSERT INTO `teachers` VALUES (5, '佟桂英', '女', '15751462060', '50076984', '2011-06-10 06:27:00', '2005-05-03 09:02:31');
INSERT INTO `teachers` VALUES (6, '冉文', '女', '18740961251', '90918355', '2009-11-25 13:06:04', '1978-01-21 01:44:26');
INSERT INTO `teachers` VALUES (7, '苟瑜', '女', '18907719340', '21218432', '1990-07-11 10:42:28', '2009-07-09 09:43:05');
INSERT INTO `teachers` VALUES (8, '钱秀云', '女', '17192286519', '97065668', '2004-11-30 00:06:14', '2018-03-20 02:53:07');
INSERT INTO `teachers` VALUES (9, '台芳', '男', '15610004350', '64722893', '1989-02-26 05:37:15', '1978-10-20 05:50:54');
INSERT INTO `teachers` VALUES (10, '童淑英', '男', '18079183598', '61427694', '2015-01-14 08:42:28', '2013-10-05 13:31:03');
INSERT INTO `teachers` VALUES (11, '鞠飞', '男', '15327406305', '99673131', '1975-07-10 21:01:07', '1984-06-27 04:38:22');
INSERT INTO `teachers` VALUES (12, '郜平', '女', '13429330275', '82023448', '1972-07-11 18:51:29', '1983-11-29 23:50:14');
INSERT INTO `teachers` VALUES (13, '穆林', '男', '15253941830', '44795319', '1998-12-26 14:50:40', '1995-09-05 23:33:16');
INSERT INTO `teachers` VALUES (14, '车博涛', '男', '17052427688', '84139447', '1987-12-10 00:47:33', '2017-09-02 17:24:21');
INSERT INTO `teachers` VALUES (15, '褚博涛', '女', '15158826161', '67553524', '1970-08-03 12:09:04', '1998-12-11 15:14:25');
INSERT INTO `teachers` VALUES (16, '白娜', '女', '17114806635', '94095657', '1988-04-07 04:03:24', '1995-03-15 01:44:23');
INSERT INTO `teachers` VALUES (17, '鞠桂珍', '男', '17609913579', '75178299', '2014-01-10 02:06:25', '1975-12-25 07:01:53');
INSERT INTO `teachers` VALUES (18, '官亮', '女', '13813197369', '36806423', '1992-09-01 23:22:05', '2005-12-07 00:01:17');
INSERT INTO `teachers` VALUES (19, '竺桂荣', '男', '17188206425', '69086530', '2016-05-21 16:16:09', '2013-09-20 15:20:42');
INSERT INTO `teachers` VALUES (20, '高建华', '男', '17173888073', '77169107', '1982-06-29 17:48:17', '1974-03-03 22:40:37');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学号',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学生姓名',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `sex` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sysid` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `minzu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jingji` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hukou` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jishu` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '是否寄宿',
  `huji` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '户籍地址',
  `xianzz` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '现住址',
  `liushou` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否留守儿童',
  `liushouqk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '留守儿童情况',
  `liushoutgqk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '留守儿童托管情况',
  `biye` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '毕业学校',
  `ganbu` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '曾担任干部情况',
  `huojiang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '获奖情况',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_uid_unique`(`uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$/hcwLgDrVl5AK69/GuQW7u24oK0Z0d/hJskc0BZ/m1kvP8OqfFgja', '系统管理员', 1, '男', '110120119', '30058098', '1978-03-21', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '飞海科技网络有限公司', NULL, NULL, 'HjJcFppOWQzOwNT4VANuWaAbdIwFeM7NzuNnzBAHrqBAyERfbcYiIf5xwT1Z', '1998-11-05 12:52:00', '2020-09-20 22:45:25');
INSERT INTO `users` VALUES (2, 'test', '$2y$10$gUUW21Jc9CCgIUj1Qqjd6eP0W8obqt1V73alojT7tS83gu3rl2/ha', '测试学生', 0, '男', '110120119', '88961715', '1996-09-22', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '盟新网络有限公司', NULL, NULL, 'GTlRYnM82sP8kGk3izUMvy6PmSIA9GhuwTMxji36StRElwdsHq5WJ3tlQg5I', '1981-11-04 19:14:44', '2020-09-20 22:45:25');
INSERT INTO `users` VALUES (3, '81364551', '$2y$10$Zx.I5/7BGksADe/fs9rVze.FDupzkqnTDELloB6SmzpOQ0Q.2eFQ2', '郑哲', 0, '男', '15290457860', '50288475', '1990-03-03', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '海创传媒有限公司', NULL, NULL, '4L3TFN16EK', '1971-10-05 18:22:29', '1996-01-17 02:53:18');
INSERT INTO `users` VALUES (4, '98569092', '$2y$10$lD2g2/3PFYaqUVdqYGcULeq53qcShueDNW2FrshBsWLEfkW21jdDe', '崔晨', 0, '男', '17800640524', '44087867', '1995-06-13', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '维旺明网络有限公司', NULL, NULL, 'reZ8aamhI4', '1974-03-10 08:22:56', '2009-09-03 13:10:36');
INSERT INTO `users` VALUES (5, '80531779', '$2y$10$mTAeWOhuSuDuvoka5f8/leeOeR5vvIzvbKQWHvXUsGvwEYI.TSZzi', '伏依琳', 0, '女', '15378576943', '50919306', '2008-02-19', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '和泰科技有限公司', NULL, NULL, '4Gso1MYP2k', '1970-01-24 07:21:42', '1978-03-10 12:42:03');
INSERT INTO `users` VALUES (6, '56472319', '$2y$10$/GGwaQOYTPUChgmfSlzRmeUNEl0U.BdabE1ZL/TpEXWE/nSrv99sS', '戴桂英', 0, '男', '15921340694', '68206962', '2009-06-21', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '维涛网络有限公司', NULL, NULL, 'jzNbOkHeKN', '1998-02-15 18:52:45', '1992-05-23 13:30:34');
INSERT INTO `users` VALUES (7, '45218921', '$2y$10$4WwG.hcQl1CWog0Osb6t7.4QN3qb6CQnmsd..x4yQyzvoBS.IeZDO', '胡博涛', 0, '男', '17093998219', '98222721', '2009-04-06', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '晖来计算机信息有限公司', NULL, NULL, 'SYIBxoY4hq', '1977-04-16 21:44:02', '1992-10-11 20:09:30');
INSERT INTO `users` VALUES (8, '48641393', '$2y$10$H4/dglAVj.TFyRiz9Ag7ueryLPeCQnJfRS7L/wAh12NIJ7YDu2RrK', '戴桂珍', 0, '男', '18646600067', '72041449', '1976-09-12', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '时刻科技有限公司', NULL, NULL, 'MyUNgUpjbK', '2002-11-27 21:47:11', '1987-03-16 00:20:13');
INSERT INTO `users` VALUES (9, '72066599', '$2y$10$RplIVBoTDeQmhMpn5Pl8TudjsJtG15JMR1EfmPcgAQvqRsZ.awWDu', '江超', 0, '男', '18470521123', '42354273', '1973-04-02', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '中建创业科技有限公司', NULL, NULL, 'HBuD4rWACa', '1985-06-15 06:13:09', '1994-11-19 10:34:11');
INSERT INTO `users` VALUES (10, '82090314', '$2y$10$uwRHf.KVQgJvSYJkELwJ4uY3GO/gE5S5r8Sdmeh0134Tn5Gq5xkf2', '路丽', 0, '男', '17057242537', '50749346', '2006-02-06', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '恩悌科技有限公司', NULL, NULL, '6aKMppWalT', '2010-01-08 03:43:55', '1979-05-05 22:58:23');
INSERT INTO `users` VALUES (11, '76146314', '$2y$10$d6e8TrTjLUy.Pm/8UF.xnevs8O7Hlbe2h7vvQztGU0BD97GtpBsjK', '栗超', 0, '女', '18279712334', '73115389', '1996-11-25', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '天开网络有限公司', NULL, NULL, 'URPcsBxVhu', '2005-07-03 07:11:44', '1972-02-17 00:28:44');
INSERT INTO `users` VALUES (12, '62436043', '$2y$10$O28LOOqP3nzY0XfyivoqYe3ANMtENV20ojYjjSGniZWHWHheCIE8O', '康文娟', 0, '男', '13402771213', '31571130', '2001-08-10', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '精芯科技有限公司', NULL, NULL, '4etlMM0e8l', '2001-04-06 13:04:33', '1994-11-13 14:50:58');
INSERT INTO `users` VALUES (13, '85599516', '$2y$10$GBpeNTunJ55tUZURfwfyMO1OC1WeBYnOUtfQ1LVhqQkJXbXsJw5q.', '马桂荣', 0, '女', '15952138012', '36818357', '2016-09-10', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '信诚致远网络有限公司', NULL, NULL, 'BwoTHB1KMs', '1991-05-27 16:34:57', '1999-03-07 18:02:07');
INSERT INTO `users` VALUES (14, '28682371', '$2y$10$d07XFIGR0w6NLPn9tr2VXeUkzSAa/O95B00xRXMuedtiOkqDeYwmW', '符智敏', 0, '男', '18873906988', '23443889', '1993-09-27', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '艾提科信网络有限公司', NULL, NULL, 'YPqiQMy2jg', '2000-02-18 14:57:11', '2020-05-28 16:40:28');
INSERT INTO `users` VALUES (15, '48478671', '$2y$10$TQ.iYjHiWvGDRxgM9tDkieSj9Tus62VaHIYX0zkmWRhAGzrYG7a/i', '僧红梅', 0, '女', '15926201114', '61045426', '2003-08-11', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '佳禾科技有限公司', NULL, NULL, 'gJnhOBDTRZ', '1997-02-11 07:11:33', '1973-12-31 01:32:15');
INSERT INTO `users` VALUES (16, '53009746', '$2y$10$JuzNeyCymC/zHa.xFsa8FOPnFrab29Mm5UT9x/H2FZenlDd4NowNC', '甄捷', 0, '男', '17192321529', '59087714', '2011-03-23', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '晖来计算机信息有限公司', NULL, NULL, 'pN2aoCmP2r', '2017-05-17 00:12:56', '2018-07-30 02:53:19');
INSERT INTO `users` VALUES (17, '51493932', '$2y$10$Cuve0R4oNTpU2GBHvqaD/OZftSdNc2bDOtY0AMY01jvVo/Xfz5HxC', '官正豪', 0, '男', '14543995012', '93964130', '1993-09-29', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, 'MBP软件科技有限公司', NULL, NULL, 'x0fyuFNiGd', '1985-06-12 08:03:52', '2018-09-02 12:12:19');
INSERT INTO `users` VALUES (18, '38090877', '$2y$10$sreIN.ZtYtYwTdC4RmF.aurkSdAMjxBUGPwG4ljN7ngmURNokxAF2', '卓浩', 0, '男', '14769794943', '54846617', '1970-12-07', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '太极传媒有限公司', NULL, NULL, 'A0qJI8eMUn', '2001-03-29 22:38:56', '1981-08-13 04:18:55');
INSERT INTO `users` VALUES (19, '78475288', '$2y$10$vIdN0/RUJACsj/joecu2.eJL6fa4B4FYNnlIUnHzmS3zRFuFV.Oqi', '秦海燕', 0, '女', '15586789302', '35445925', '2010-07-14', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '迪摩网络有限公司', NULL, NULL, 'SMNrSQ4DoI', '1984-10-11 20:20:45', '2011-03-15 09:39:47');
INSERT INTO `users` VALUES (20, '90835219', '$2y$10$wiea5tDMOsZHeuLKGR0/lesON4MwVnhRpUdFO8iWUegS0CZEcy9zS', '鞠婷婷', 0, '女', '13282954054', '22344752', '1993-05-29', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '银嘉科技有限公司', NULL, NULL, '4gimVVU39M', '2015-12-17 23:55:06', '2019-05-13 10:09:25');

-- ----------------------------
-- View structure for v_score
-- ----------------------------
DROP VIEW IF EXISTS `v_score`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_score` AS SELECT sc.id,u.id sid,u.name,e.name exam,c.name course,sc.score FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 order by e.id,c.id ;

SET FOREIGN_KEY_CHECKS = 1;
