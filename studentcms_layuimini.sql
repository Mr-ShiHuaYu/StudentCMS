/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50729
 Source Host           : localhost:3306
 Source Schema         : studentcms_layuimini

 Target Server Type    : MySQL
 Target Server Version : 50729
 File Encoding         : 65001

 Date: 22/12/2020 19:11:03
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
INSERT INTO `courses` VALUES (1, '语文', 150, 3, '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `courses` VALUES (2, '数学', 150, 2, '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `courses` VALUES (3, '英语', 150, 7, '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `courses` VALUES (4, '物理', 100, 7, '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `courses` VALUES (5, '化学', 100, 8, '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `courses` VALUES (6, '生物', 100, 8, '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `courses` VALUES (7, '地理', 100, 1, '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `courses` VALUES (8, '政治', 100, 6, '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `courses` VALUES (9, '历史', 100, 1, '2020-10-31 22:40:09', '2020-10-31 22:40:09');

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
INSERT INTO `exams` VALUES (1, '第一次月考', '2020-01-01', '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `exams` VALUES (2, '第二次月考', '2020-02-01', '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `exams` VALUES (3, '第三次月考', '2020-03-01', '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `exams` VALUES (4, '第四次月考', '2020-04-01', '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `exams` VALUES (5, '第一学期半期考', '2020-05-01', '2020-10-31 22:40:09', '2020-10-31 22:40:09');
INSERT INTO `exams` VALUES (6, '第一学期期末考', '2020-06-01', '2020-10-31 22:40:09', '2020-10-31 22:40:09');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (2, '2020_09_05_130614_create_parents_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_09_05_133331_create_teachers_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_09_05_133519_create_courses_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_09_05_133902_create_exams_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_09_05_134323_create_scores_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_10_16_192223_create_permission_tables', 2);
INSERT INTO `migrations` VALUES (12, '2014_10_12_000000_create_users_table', 3);
INSERT INTO `migrations` VALUES (16, '2020_10_31_212117_create_system_menu_table', 4);

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
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for role_menu
-- ----------------------------
DROP TABLE IF EXISTS `role_menu`;
CREATE TABLE `role_menu`  (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_menu
-- ----------------------------
INSERT INTO `role_menu` VALUES (2, 1);
INSERT INTO `role_menu` VALUES (2, 2);
INSERT INTO `role_menu` VALUES (2, 3);
INSERT INTO `role_menu` VALUES (1, 9);
INSERT INTO `role_menu` VALUES (1, 10);
INSERT INTO `role_menu` VALUES (1, 2);
INSERT INTO `role_menu` VALUES (1, 8);
INSERT INTO `role_menu` VALUES (1, 7);
INSERT INTO `role_menu` VALUES (1, 6);
INSERT INTO `role_menu` VALUES (1, 5);
INSERT INTO `role_menu` VALUES (1, 4);
INSERT INTO `role_menu` VALUES (1, 1);
INSERT INTO `role_menu` VALUES (1, 3);
INSERT INTO `role_menu` VALUES (1, 12);
INSERT INTO `role_menu` VALUES (1, 11);
INSERT INTO `role_menu` VALUES (2, 4);
INSERT INTO `role_menu` VALUES (2, 5);
INSERT INTO `role_menu` VALUES (2, 6);
INSERT INTO `role_menu` VALUES (2, 7);
INSERT INTO `role_menu` VALUES (2, 9);
INSERT INTO `role_menu` VALUES (2, 10);
INSERT INTO `role_menu` VALUES (2, 11);
INSERT INTO `role_menu` VALUES (2, 12);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, '超级管理员', 'web', '2020-10-23 22:30:47', '2020-10-23 22:30:47');
INSERT INTO `roles` VALUES (2, '学生', 'web', '2020-10-23 22:30:47', '2020-10-23 22:30:47');

-- ----------------------------
-- Table structure for scores
-- ----------------------------
DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `score` float(5, 2) UNSIGNED NOT NULL COMMENT '成绩',
  `student_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属学生',
  `exam_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属考试',
  `course_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属课程',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 203 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scores
-- ----------------------------
INSERT INTO `scores` VALUES (42, 67.00, 3, 5, 3, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (43, 77.00, 3, 5, 4, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (44, 77.00, 3, 5, 5, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (45, 127.00, 3, 5, 6, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (46, 99.00, 3, 5, 7, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (47, 99.00, 3, 5, 8, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (48, 87.00, 3, 5, 9, '2020-09-13 01:26:57', '2020-09-13 01:26:57');
INSERT INTO `scores` VALUES (51, 135.00, 3, 6, 3, '2020-09-13 01:57:55', '2020-09-15 22:11:59');
INSERT INTO `scores` VALUES (52, 98.00, 3, 6, 4, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (53, 88.00, 3, 6, 5, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (54, 77.00, 3, 6, 6, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (55, 88.00, 3, 6, 7, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (56, 88.00, 3, 6, 8, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (57, 99.00, 3, 6, 9, '2020-09-13 01:57:55', '2020-09-13 01:57:55');
INSERT INTO `scores` VALUES (78, 76.00, 14, 3, 3, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (79, 89.00, 14, 3, 4, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (80, 89.00, 14, 3, 5, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (81, 87.00, 14, 3, 6, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (82, 67.00, 14, 3, 7, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (83, 89.00, 14, 3, 8, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (84, 87.00, 14, 3, 9, '2020-09-13 20:13:39', '2020-09-13 20:13:39');
INSERT INTO `scores` VALUES (115, 127.00, 3, 2, 3, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (116, 79.00, 3, 2, 4, '2020-09-19 17:21:48', '2020-10-20 22:53:03');
INSERT INTO `scores` VALUES (117, 89.00, 3, 2, 5, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (118, 90.00, 3, 2, 6, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (119, 90.00, 3, 2, 7, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (120, 78.00, 3, 2, 8, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (121, 88.00, 3, 2, 9, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (124, 145.00, 4, 2, 3, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (125, 97.00, 4, 2, 4, '2020-09-19 17:22:16', '2020-10-24 19:16:02');
INSERT INTO `scores` VALUES (126, 94.00, 4, 2, 5, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (127, 89.00, 4, 2, 6, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (128, 76.00, 4, 2, 7, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (129, 79.00, 4, 2, 8, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (130, 89.00, 4, 2, 9, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (133, 143.00, 6, 2, 3, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (134, 89.00, 6, 2, 4, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (135, 87.00, 6, 2, 5, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (136, 88.00, 6, 2, 6, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (137, 77.00, 6, 2, 7, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (138, 77.00, 6, 2, 8, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (139, 75.00, 6, 2, 9, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (142, 122.00, 4, 3, 3, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (143, 79.00, 4, 3, 4, '2020-09-20 09:38:31', '2020-09-21 08:29:34');
INSERT INTO `scores` VALUES (144, 78.00, 4, 3, 5, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (145, 89.00, 4, 3, 6, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (146, 87.00, 4, 3, 7, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (147, 67.00, 4, 3, 8, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (148, 67.00, 4, 3, 9, '2020-09-20 09:38:31', '2020-09-20 09:38:31');
INSERT INTO `scores` VALUES (151, 133.00, 4, 4, 3, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (152, 89.00, 4, 4, 4, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (153, 98.00, 4, 4, 5, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (154, 88.00, 4, 4, 6, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (155, 87.00, 4, 4, 7, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (156, 67.00, 4, 4, 8, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (157, 89.00, 4, 4, 9, '2020-09-20 09:39:43', '2020-09-20 09:39:43');
INSERT INTO `scores` VALUES (169, 135.00, 2, 3, 3, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (170, 78.00, 2, 3, 4, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (171, 78.00, 2, 3, 5, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (172, 88.00, 2, 3, 6, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (173, 90.00, 2, 3, 7, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (174, 95.00, 2, 3, 8, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (175, 89.00, 2, 3, 9, '2020-09-20 10:38:07', '2020-09-20 10:38:07');
INSERT INTO `scores` VALUES (178, 136.00, 2, 4, 3, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (179, 78.00, 2, 4, 4, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (180, 89.00, 2, 4, 5, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (181, 86.00, 2, 4, 6, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (182, 94.00, 2, 4, 7, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (183, 87.00, 2, 4, 8, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (184, 82.00, 2, 4, 9, '2020-09-20 22:47:55', '2020-09-20 22:47:55');
INSERT INTO `scores` VALUES (187, 132.00, 2, 5, 3, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (188, 78.00, 2, 5, 4, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (189, 76.00, 2, 5, 5, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (190, 76.00, 2, 5, 6, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (191, 88.00, 2, 5, 7, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (192, 89.00, 2, 5, 8, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (193, 88.00, 2, 5, 9, '2020-09-20 22:49:33', '2020-09-20 22:49:33');
INSERT INTO `scores` VALUES (196, 124.00, 2, 6, 3, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (197, 67.00, 2, 6, 4, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (198, 67.00, 2, 6, 5, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (199, 77.00, 2, 6, 6, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (200, 89.00, 2, 6, 7, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (201, 88.00, 2, 6, 8, '2020-09-20 22:49:55', '2020-09-20 22:49:55');
INSERT INTO `scores` VALUES (202, 95.00, 2, 6, 9, '2020-09-20 22:49:55', '2020-09-20 22:49:55');

-- ----------------------------
-- Table structure for scores_import
-- ----------------------------
DROP TABLE IF EXISTS `scores_import`;
CREATE TABLE `scores_import`  (
  `姓名` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `语文` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `数学` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `英语` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `物理` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `化学` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `生物` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `政治` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `历史` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `地理` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scores_import
-- ----------------------------
INSERT INTO `scores_import` VALUES ('连熔巧', '86', '98', '130.5', '58', '85', '77', '74', '69', '83');
INSERT INTO `scores_import` VALUES ('陈辉', '79.5', '102', '114.5', '50', '80', '75.5', '81', '60', '71');
INSERT INTO `scores_import` VALUES ('陈聪', '89', '102', '97.5', '53', '79', '81.5', '73', '69', '65');
INSERT INTO `scores_import` VALUES ('陈家颉', '99', '97', '125', '52', '62', '59', '74', '73', '65');
INSERT INTO `scores_import` VALUES ('曾琳', '88.5', '103', '122', '64', '78', '66.5', '71', '52', '58');
INSERT INTO `scores_import` VALUES ('林诗涵', '81', '80', '120', '66', '59', '70', '72', '76', '78');
INSERT INTO `scores_import` VALUES ('王潇语', '90.5', '95', '120', '61', '70', '69', '74', '61', '57');
INSERT INTO `scores_import` VALUES ('林婷玉', '104', '57', '127.5', '51', '51', '67.5', '72', '80', '79');
INSERT INTO `scores_import` VALUES ('雷林韬', '86', '88', '110', '58', '76', '69', '67', '69', '55');
INSERT INTO `scores_import` VALUES ('王茁轩', '83', '93', '129', '67', '58', '67.5', '55', '56', '69');
INSERT INTO `scores_import` VALUES ('张咪', '85', '80', '127', '56', '74', '69.5', '67', '65', '47');
INSERT INTO `scores_import` VALUES ('俞誉熔', '91', '90', '101.5', '50', '58', '80', '81', '57', '58');
INSERT INTO `scores_import` VALUES ('郑锦浩', '77.5', '107', '106.5', '59', '74', '57', '58', '61', '63');
INSERT INTO `scores_import` VALUES ('李上满', '74', '97', '111.5', '48', '59', '67', '62', '74', '70');
INSERT INTO `scores_import` VALUES ('梅栩宁', '82', '100', '110', '56', '59', '62', '71', '72', '50');
INSERT INTO `scores_import` VALUES ('陈琳', '95', '88', '121', '55', '64', '49', '64', '61', '64');
INSERT INTO `scores_import` VALUES ('袁媛', '87', '105', '87.5', '66', '67', '57', '49', '70', '70');
INSERT INTO `scores_import` VALUES ('许慧萍', '90', '94', '98.5', '43', '66', '62', '74', '71', '58');
INSERT INTO `scores_import` VALUES ('阮碧珍', '100.5', '62', '113.5', '36', '57', '72', '75', '65', '67');
INSERT INTO `scores_import` VALUES ('林伟涛', '94.5', '75', '111', '45', '60', '58', '65', '68', '69');
INSERT INTO `scores_import` VALUES ('范甘熠', '84', '63', '119.5', '47', '61', '69', '70', '56', '71');
INSERT INTO `scores_import` VALUES ('兰李韩', '75.5', '93', '110.5', '43', '57', '67', '70', '67', '56');
INSERT INTO `scores_import` VALUES ('钟伟', '76.5', '89', '97', '69', '63', '57', '71', '61', '55');
INSERT INTO `scores_import` VALUES ('樊敏敏', '94.5', '81', '111', '40', '65', '71', '67', '60', '49');
INSERT INTO `scores_import` VALUES ('陆俊杰', '85', '94', '116', '40', '71', '58.5', '58', '48', '59');
INSERT INTO `scores_import` VALUES ('邱冰怡', '90.5', '77', '88', '67', '67', '68.5', '60', '44', '66');
INSERT INTO `scores_import` VALUES ('李旭卿', '98', '82', '100.5', '44', '56', '53', '84', '63', '46');
INSERT INTO `scores_import` VALUES ('钟涵斌', '79', '58', '119', '44', '71', '63', '73', '59', '57');
INSERT INTO `scores_import` VALUES ('钟洋', '90', '83', '100.5', '45', '65', '60', '67', '66', '46');
INSERT INTO `scores_import` VALUES ('林娜', '95', '82', '107.5', '47', '58', '53', '66', '63', '50');
INSERT INTO `scores_import` VALUES ('李江', '93', '75', '117', '43', '81', '50', '48', '63', '50');
INSERT INTO `scores_import` VALUES ('黄颖', '103', '61', '102.5', '34', '61', '64', '69', '68', '57');
INSERT INTO `scores_import` VALUES ('周霞', '97', '53', '114', '44', '66', '49.5', '69', '62', '63');
INSERT INTO `scores_import` VALUES ('徐清', '101', '64', '102.5', '50', '65', '58', '60', '64', '50');
INSERT INTO `scores_import` VALUES ('吴宇轩', '76', '93', '89', '42', '72', '60', '62', '56', '57');
INSERT INTO `scores_import` VALUES ('林依榕', '90', '57', '115', '48', '44', '64', '62', '67', '60');
INSERT INTO `scores_import` VALUES ('吴子欣', '94', '41', '110.5', '38', '41', '64', '80', '77', '59');
INSERT INTO `scores_import` VALUES ('黄丽云', '99', '47', '109', '43', '50', '52.5', '61', '75', '59');
INSERT INTO `scores_import` VALUES ('郭挺炜', '84.5', '71', '113', '44', '60', '62.5', '64', '47', '48');
INSERT INTO `scores_import` VALUES ('郑墁臻', '89', '71', '108.5', '31', '55', '55', '68', '59', '46');
INSERT INTO `scores_import` VALUES ('杨含雅', '85', '49', '90.5', '39', '70', '76', '68', '49', '51');
INSERT INTO `scores_import` VALUES ('梅琦雯', '86', '50', '114', '37', '51', '58', '78', '53', '42');
INSERT INTO `scores_import` VALUES ('陈维锐', '74.5', '88', '113', '37', '29', '42', '61', '65', '58');
INSERT INTO `scores_import` VALUES ('缪媛媛', '88.5', '54', '123', '36', '43', '54', '59', '64', '41');
INSERT INTO `scores_import` VALUES ('林雨欣', '86.5', '75', '110', '45', '35', '57', '55', '57', '39');
INSERT INTO `scores_import` VALUES ('李昔妍', '80', '61', '121.5', '48', '34', '47.5', '59', '55', '47');
INSERT INTO `scores_import` VALUES ('雷秋冰', '85', '40', '112.5', '40', '50', '57', '72', '48', '42');
INSERT INTO `scores_import` VALUES ('林思萌', '84', '68', '119', '30', '34', '38', '55', '57', '58');
INSERT INTO `scores_import` VALUES ('陈林永睿', '86', '52', '88', '32', '48', '52', '70', '68', '46');
INSERT INTO `scores_import` VALUES ('张欣怡', '94', '43', '106.5', '29', '34', '41', '68', '50', '67');
INSERT INTO `scores_import` VALUES ('叶坤', '81.5', '56', '113.5', '40', '48', '39', '55', '46', '33');
INSERT INTO `scores_import` VALUES ('骆俊豪', '89.5', '53', '84', '52', '37', '40.5', '48', '60', '42');
INSERT INTO `scores_import` VALUES ('刘树芳', '66', '58', '104', '48', '32', '39.5', '49', '42', '47');
INSERT INTO `scores_import` VALUES ('谢伊禾', '83', '34', '98.5', '32', '21', '45.5', '54', '54', '55');
INSERT INTO `scores_import` VALUES ('郑碧盈', '82', '65', '118.5', '47', '35', '34.5', '51', '', '33');

-- ----------------------------
-- Table structure for system_menu
-- ----------------------------
DROP TABLE IF EXISTS `system_menu`;
CREATE TABLE `system_menu`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pid` bigint(20) NOT NULL DEFAULT 0 COMMENT '父ID',
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '菜单图标',
  `href` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '链接',
  `target` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '链接打开方式',
  `sort` int(11) NULL DEFAULT 0 COMMENT '菜单排序',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态(0:禁用,1:启用)',
  `remark` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '备注信息',
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_menu
-- ----------------------------
INSERT INTO `system_menu` VALUES (1, 0, '基本信息管理', '', '', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (2, 0, '成绩管理', 'fa fa-book', '', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (3, 0, '成绩分析', 'fa fa-line-chart', '', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (4, 10, '学生列表', 'fa fa-graduation-cap', 'user.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (5, 10, '老师列表', 'fa fa-user-plus', 'teacher.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (6, 2, '成绩查询', 'fa fa-search', 'score.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (7, 2, '成绩录入', 'fa fa-upload', 'score.create', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (8, 3, '总体分析', 'fa fa-pie-chart', 'analyze.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (9, 3, '个人分析', 'fa fa-line-chart', 'analyze.gerenfx', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (10, 1, '用户管理', 'fa fa-user-circle-o', 'analyze.gerenfx', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (11, 1, '课程列表', 'fa fa-list-ol', 'course.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (12, 1, '考试列表', 'fa fa-etsy', 'exam.index', '', 0, 1, NULL, NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `teachers` VALUES (21, '郜玉珍', '女', '18169031293', '71556864', '1971-01-17 23:29:02', '2008-10-20 04:38:09');
INSERT INTO `teachers` VALUES (22, '汤梅', '女', '18700626848', '63545918', '1991-12-24 07:49:22', '1980-12-04 15:28:14');
INSERT INTO `teachers` VALUES (23, '柯嘉俊', '男', '13772856849', '62992284', '1971-04-19 19:57:23', '1971-11-14 08:09:32');
INSERT INTO `teachers` VALUES (24, '康桂珍', '男', '17074854453', '99808289', '1976-11-18 06:09:53', '1974-09-24 08:05:12');
INSERT INTO `teachers` VALUES (25, '翟婷婷', '女', '15651281936', '47382955', '2009-05-03 18:47:11', '1992-05-28 13:45:30');
INSERT INTO `teachers` VALUES (26, '邱金凤', '男', '15727778289', '14317253', '1987-08-27 09:56:42', '1981-09-17 05:36:42');
INSERT INTO `teachers` VALUES (27, '贾振国', '女', '13351713534', '31074714', '2014-01-08 08:01:41', '1991-02-22 06:02:03');
INSERT INTO `teachers` VALUES (28, '路玉', '男', '17083553228', '28347625', '1970-08-20 20:21:53', '2009-12-17 21:08:58');
INSERT INTO `teachers` VALUES (29, '熊振国', '男', '14786332820', '57023853', '2007-05-09 10:17:14', '1990-01-11 22:00:07');
INSERT INTO `teachers` VALUES (30, '应红', '女', '13216556546', '43864740', '1971-09-14 07:19:52', '2013-01-21 02:59:24');
INSERT INTO `teachers` VALUES (31, '金志文', '女', '15030051196', '81573184', '1996-06-30 14:59:53', '1980-07-15 09:37:37');
INSERT INTO `teachers` VALUES (32, '姬宇', '女', '17162443587', '68115755', '2012-09-08 12:18:03', '1970-11-25 04:15:38');
INSERT INTO `teachers` VALUES (33, '吕雪', '女', '15045060369', '37192924', '1978-04-12 13:06:40', '2014-10-20 20:23:08');
INSERT INTO `teachers` VALUES (34, '池莉', '女', '18042336954', '12090240', '1984-12-02 03:15:21', '2004-07-21 18:41:45');
INSERT INTO `teachers` VALUES (35, '冯瑞', '男', '17095250668', '54451147', '1995-06-05 18:49:19', '1993-02-25 10:13:09');
INSERT INTO `teachers` VALUES (36, '邓嘉', '男', '18784522521', '61657710', '1998-10-25 14:07:52', '1999-08-09 07:30:30');
INSERT INTO `teachers` VALUES (37, '夏雪梅', '女', '18623507387', '27159743', '1977-04-03 11:34:16', '2009-08-05 20:34:50');
INSERT INTO `teachers` VALUES (38, '贺兵', '男', '17041811829', '91054746', '1982-08-15 22:41:33', '1989-04-17 10:01:29');
INSERT INTO `teachers` VALUES (39, '贺敏静', '女', '15648122091', '45985555', '1978-08-02 01:13:36', '1972-09-21 05:18:44');
INSERT INTO `teachers` VALUES (40, '苑利', '女', '18290225191', '89079440', '1989-12-08 14:22:35', '2006-02-05 10:07:32');
INSERT INTO `teachers` VALUES (41, '欧阳斌', '男', '13268684748', '88502525', '1992-08-18 16:24:07', '1991-01-24 12:11:16');
INSERT INTO `teachers` VALUES (42, '简晧', '女', '17081204472', '96034996', '1988-05-15 18:37:01', '1975-09-18 04:05:46');
INSERT INTO `teachers` VALUES (43, '保华', '男', '13820590038', '35506185', '2020-10-25 02:15:54', '2010-11-06 07:32:29');
INSERT INTO `teachers` VALUES (44, '倪玉英', '女', '18080359519', '80457439', '1999-06-01 01:47:53', '2013-09-23 03:09:28');
INSERT INTO `teachers` VALUES (45, '颜凯', '女', '17198517031', '29476878', '2011-12-22 23:09:51', '1999-07-23 15:13:51');
INSERT INTO `teachers` VALUES (46, '全娟', '男', '13809243716', '20437763', '2007-11-10 17:08:27', '1982-08-05 23:31:40');
INSERT INTO `teachers` VALUES (47, '窦钟', '男', '15862807805', '70818524', '2007-08-14 17:01:01', '2015-05-28 03:30:35');
INSERT INTO `teachers` VALUES (48, '桂洁', '男', '17090771510', '88733248', '2000-05-13 22:21:43', '2001-09-22 09:08:29');
INSERT INTO `teachers` VALUES (49, '易鹏', '女', '17075116855', '21855772', '1986-09-07 22:13:14', '2009-08-20 07:20:50');
INSERT INTO `teachers` VALUES (50, '穆旭', '男', '15608468673', '69770204', '2008-11-22 00:02:00', '2019-10-09 00:44:43');
INSERT INTO `teachers` VALUES (51, '邵玲', '男', '18115067683', '47165739', '1989-08-05 16:25:05', '1975-09-26 06:48:15');
INSERT INTO `teachers` VALUES (52, '景楠', '男', '17086572575', '83558879', '2005-12-07 21:45:29', '2011-07-11 00:23:05');
INSERT INTO `teachers` VALUES (53, '乔昱然', '女', '14734636842', '57993085', '1988-08-17 12:02:38', '2014-07-01 08:31:43');
INSERT INTO `teachers` VALUES (54, '郁成', '男', '13469780137', '15832057', '2005-08-16 16:39:39', '1990-01-12 19:34:54');
INSERT INTO `teachers` VALUES (55, '盖凤英', '女', '15388470489', '19154982', '1970-10-11 14:44:06', '2017-09-29 16:42:40');
INSERT INTO `teachers` VALUES (56, '赖桂珍', '女', '15349851312', '30507032', '1998-04-07 01:16:44', '1981-11-10 19:10:20');
INSERT INTO `teachers` VALUES (57, '项瑶', '男', '15782841390', '11200176', '2019-09-09 06:51:04', '1995-03-18 11:07:56');
INSERT INTO `teachers` VALUES (58, '苑明霞', '女', '15138380723', '86179876', '1999-04-11 13:58:51', '2011-01-01 21:39:17');
INSERT INTO `teachers` VALUES (59, '郭洋', '男', '13746890314', '38957469', '2003-03-26 16:46:38', '1996-02-09 22:08:09');
INSERT INTO `teachers` VALUES (60, '高桂花', '女', '13020360963', '37491592', '1983-05-04 03:56:56', '1977-05-13 20:56:56');

-- ----------------------------
-- Table structure for user_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `user_has_permissions`;
CREATE TABLE `user_has_permissions`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `user_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`user_id`, `model_type`) USING BTREE,
  CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_has_roles`;
CREATE TABLE `user_has_roles`  (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `user_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`user_id`, `model_type`) USING BTREE,
  CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_has_roles
-- ----------------------------
INSERT INTO `user_has_roles` VALUES (1, 'App\\Models\\UserModel', 1);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 2);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 3);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 4);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 6);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 7);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 8);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 9);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 10);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 11);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 12);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 13);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 14);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 15);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 16);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 17);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 18);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 19);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 20);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 21);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 22);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 23);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 24);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 25);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 26);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 27);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 28);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 29);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 30);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 31);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 32);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 33);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 34);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 35);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 36);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 37);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 38);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 39);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 40);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 41);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 42);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 43);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 44);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 45);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 46);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 47);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 48);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 49);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 50);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 51);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 52);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 53);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 54);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 55);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 56);
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 57);

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$Iv8xoraATlEwnzWD/R.iyuqFhzrfrizOCviKTeL306oW3ONOwU8LK', '系统管理员', 1, '男', '110120119', '26996713', '1985-03-14', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '迪摩科技有限公司', NULL, NULL, 'sXShMknc7R', '1996-07-30 05:19:56', '2020-10-31 22:44:10');
INSERT INTO `users` VALUES (2, 'test', '$2y$10$bMYv3EE1TWu2tqY2guNWROeKuFqC9IiWTqUr.JWKCqnO3NSf//AEO', '测试学生', 0, '男', '110120119', '84456113', '1972-06-10', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '济南亿次元信息有限公司', NULL, NULL, 'qiHRJF2ehE', '2018-06-03 09:14:56', '2020-10-31 22:44:10');
INSERT INTO `users` VALUES (3, '61638572', '$2y$10$9aD.yaCvHDm/.NoNFV6CB.lp7RzBQyCCmqCZg3HvaIq/ushL26i8S', '乔杰', 0, '女', '15766012743', '13672487', '1993-03-25', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '良诺传媒有限公司', NULL, NULL, '1g4UFI2SXv', '1995-01-17 11:46:44', '1974-07-29 16:22:20');
INSERT INTO `users` VALUES (4, '14184118', '$2y$10$5SfIoX8KcE9Je3hvRodHyeXmRCybLgJ/vBhsiWplkFl8jFEDf8Xxq', '曲杰', 0, '女', '18404418908', '68564160', '1995-05-11', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '太极信息有限公司', NULL, NULL, 'tW0LcCs6aq', '2000-06-12 06:07:21', '1980-07-07 04:44:50');
INSERT INTO `users` VALUES (5, '76908792', '$2y$10$V/7G3OKQKGwIF6jY4b1TX.MxLpp4kIjiOQq4SX.ms9OAP6CZRDIm6', '池文', 0, '女', '17182473282', '31380321', '2007-02-11', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '立信电子科技有限公司', NULL, NULL, '3tclI5G5TI', '2005-07-08 09:03:52', '1976-07-09 03:13:28');
INSERT INTO `users` VALUES (6, '35806963', '$2y$10$7qBgh0itL/8ZB4w5c6F5WeaSizkR5l.UP3MYizPtn.11.ur87opNG', '赖钟', 0, '男', '13586054844', '20933096', '1998-09-22', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '易动力传媒有限公司', NULL, NULL, 'uIWPapKWC0', '2006-08-02 01:20:47', '1985-11-04 01:11:19');
INSERT INTO `users` VALUES (7, '93785620', '$2y$10$Wgj82RNovwq7iaZ7Xm0fAuNxdk0tBL8Zdq.TgAWTlWHzPE54dcRfG', '隋明霞', 0, '男', '13923464267', '54900502', '2003-04-01', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '浙大万朋传媒有限公司', NULL, NULL, 'Cb8lnNpzNZ', '1979-01-02 04:50:33', '1987-12-19 12:06:09');
INSERT INTO `users` VALUES (8, '73531992', '$2y$10$xktcRKVDWgJQ6f0AEpS8rudnENXtUj4Z7AeJomMJ.dBev42C7nQ.2', '潘怡', 0, '女', '15158973257', '55819510', '1996-12-12', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '精芯网络有限公司', NULL, NULL, 'OBeLTe08BR', '2018-11-21 08:14:05', '2020-06-09 08:40:23');
INSERT INTO `users` VALUES (9, '22594491', '$2y$10$WuXYsaqkHhhA0SicIuhf1.J6c.25t5vjjC9U3sy0Dn5/K..YLKAny', '晋刚', 0, '女', '18025939966', '43992628', '1997-02-02', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '华远软件网络有限公司', NULL, NULL, 'RImbpHCRIx', '1998-07-18 01:44:47', '1995-05-29 07:48:08');
INSERT INTO `users` VALUES (10, '52849704', '$2y$10$iGnhDRaFALzCJAezK5sQE..0zW5AEuieGC5d2VIRBYJCtttjuO/L6', '成哲彦', 0, '男', '18672853787', '35289492', '1975-04-05', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '昊嘉信息有限公司', NULL, NULL, 'zu7HuoRaRQ', '1997-10-09 14:02:13', '1981-03-27 03:22:01');

-- ----------------------------
-- View structure for v_score
-- ----------------------------
DROP VIEW IF EXISTS `v_score`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_score` AS SELECT sc.id,u.id sid,u.name,e.name exam,c.name course,sc.score FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 order by e.id,c.id ;

SET FOREIGN_KEY_CHECKS = 1;
