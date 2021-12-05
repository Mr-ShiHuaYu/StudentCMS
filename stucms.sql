/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50728
 Source Host           : localhost:3306
 Source Schema         : stucms

 Target Server Type    : MySQL
 Target Server Version : 50728
 File Encoding         : 65001

 Date: 05/12/2021 16:42:38
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
INSERT INTO `courses` VALUES (1, '语文', 150, 2, '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `courses` VALUES (2, '数学', 150, 3, '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `courses` VALUES (3, '英语', 150, 7, '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `courses` VALUES (4, '物理', 100, 5, '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `courses` VALUES (5, '化学', 100, 3, '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `courses` VALUES (6, '生物', 100, 1, '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `courses` VALUES (7, '地理', 100, 3, '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `courses` VALUES (8, '政治', 100, 7, '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `courses` VALUES (9, '历史', 100, 4, '2021-04-03 00:28:11', '2021-04-03 00:28:11');

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
INSERT INTO `exams` VALUES (1, '第一次月考', '2020-01-01', '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `exams` VALUES (2, '第二次月考', '2020-02-01', '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `exams` VALUES (3, '第三次月考', '2020-03-01', '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `exams` VALUES (4, '第四次月考', '2020-04-01', '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `exams` VALUES (5, '第一学期半期考', '2020-05-01', '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `exams` VALUES (6, '第一学期期末考', '2020-06-01', '2021-04-03 00:28:11', '2021-04-03 00:28:11');

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
INSERT INTO `role_menu` VALUES (1, 8);
INSERT INTO `role_menu` VALUES (2, 8);
INSERT INTO `role_menu` VALUES (1, 13);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', '超级管理员', 'web', '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `roles` VALUES (2, 'teacher', '老师', 'web', '2021-04-03 00:28:11', '2021-04-03 00:28:11');
INSERT INTO `roles` VALUES (3, 'student', '学生', 'web', '2021-12-04 16:16:57', '2021-12-04 16:17:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 312 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `scores` VALUES (115, 127.00, 3, 1, 3, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (116, 79.00, 3, 1, 4, '2020-09-19 17:21:48', '2020-10-20 22:53:03');
INSERT INTO `scores` VALUES (117, 89.00, 3, 1, 5, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (118, 95.00, 3, 1, 6, '2020-09-19 17:21:48', '2021-01-02 15:38:41');
INSERT INTO `scores` VALUES (119, 90.00, 3, 1, 7, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (120, 78.00, 3, 1, 8, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (121, 88.00, 3, 1, 9, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (124, 145.00, 4, 1, 3, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (125, 97.00, 4, 1, 4, '2020-09-19 17:22:16', '2020-10-24 19:16:02');
INSERT INTO `scores` VALUES (126, 94.00, 4, 1, 5, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (127, 89.00, 4, 1, 6, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (128, 76.00, 4, 1, 7, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (129, 79.00, 4, 1, 8, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (130, 89.00, 4, 1, 9, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (133, 143.00, 6, 1, 3, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (134, 89.00, 6, 1, 4, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (135, 87.00, 6, 1, 5, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (136, 88.00, 6, 1, 6, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (137, 77.00, 6, 1, 7, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (138, 77.00, 6, 1, 8, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (139, 75.00, 6, 1, 9, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
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
INSERT INTO `scores` VALUES (203, 79.00, 4, 2, 8, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (204, 87.00, 6, 2, 5, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (205, 89.00, 6, 2, 4, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (206, 143.00, 6, 2, 3, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (207, 127.00, 3, 2, 3, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (208, 79.00, 3, 2, 4, '2020-09-19 17:21:48', '2020-10-20 22:53:03');
INSERT INTO `scores` VALUES (209, 89.00, 3, 2, 5, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (210, 90.00, 3, 2, 6, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (211, 90.00, 3, 2, 7, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (212, 78.00, 3, 2, 8, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (213, 89.00, 3, 2, 9, '2020-09-19 17:21:48', '2020-09-19 17:21:48');
INSERT INTO `scores` VALUES (214, 140.00, 4, 2, 3, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (215, 92.00, 4, 2, 4, '2020-09-19 17:22:16', '2020-10-24 19:16:02');
INSERT INTO `scores` VALUES (216, 90.00, 4, 2, 5, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (217, 85.00, 4, 2, 9, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (218, 89.00, 4, 2, 7, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (219, 92.00, 6, 2, 6, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (220, 90.00, 6, 2, 7, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (221, 82.00, 4, 2, 6, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
INSERT INTO `scores` VALUES (222, 75.00, 6, 2, 9, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (223, 77.00, 6, 2, 8, '2020-09-20 09:35:53', '2020-09-20 09:35:53');
INSERT INTO `scores` VALUES (224, 135.00, 8, 1, 1, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (225, 116.00, 8, 1, 2, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (226, 125.00, 8, 1, 3, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (227, 82.00, 8, 1, 4, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (228, 69.00, 8, 1, 5, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (229, 75.00, 8, 1, 6, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (230, 77.00, 8, 1, 7, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (231, 75.00, 8, 1, 8, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (232, 66.00, 8, 1, 9, '2020-10-25 19:23:06', '2021-04-16 09:08:39');
INSERT INTO `scores` VALUES (233, 1.00, 2, 1, 1, '2020-11-03 11:22:17', '2020-11-03 11:22:17');
INSERT INTO `scores` VALUES (234, 10.00, 2, 1, 2, '2020-11-03 11:22:17', '2020-12-25 11:49:03');
INSERT INTO `scores` VALUES (235, 2.00, 2, 1, 3, '2020-11-03 11:22:17', '2021-04-19 21:44:16');
INSERT INTO `scores` VALUES (236, 1.00, 2, 1, 4, '2020-11-03 11:22:17', '2020-11-03 11:22:17');
INSERT INTO `scores` VALUES (237, 1.00, 2, 1, 5, '2020-11-03 11:22:17', '2020-11-03 11:22:17');
INSERT INTO `scores` VALUES (238, 1.00, 2, 1, 6, '2020-11-03 11:22:17', '2020-11-03 11:22:17');
INSERT INTO `scores` VALUES (239, 2.00, 2, 1, 7, '2020-11-03 11:22:17', '2020-11-03 11:22:17');
INSERT INTO `scores` VALUES (240, 12.00, 2, 1, 8, '2020-11-03 11:22:17', '2021-02-27 17:11:11');
INSERT INTO `scores` VALUES (241, 4.00, 2, 1, 9, '2020-11-03 11:22:17', '2020-11-03 11:22:17');
INSERT INTO `scores` VALUES (242, 3.00, 2, 2, 1, '2020-11-03 11:22:47', '2020-11-03 11:22:47');
INSERT INTO `scores` VALUES (243, 4.00, 2, 2, 2, '2020-11-03 11:22:47', '2020-11-03 11:22:47');
INSERT INTO `scores` VALUES (244, 3.00, 2, 2, 3, '2020-11-03 11:22:47', '2020-11-03 11:22:47');
INSERT INTO `scores` VALUES (245, 4.00, 2, 2, 4, '2020-11-03 11:22:47', '2020-11-03 11:22:47');
INSERT INTO `scores` VALUES (246, 3.00, 2, 2, 5, '2020-11-03 11:22:47', '2020-11-03 11:22:47');
INSERT INTO `scores` VALUES (247, 5.00, 2, 2, 6, '2020-11-03 11:22:47', '2021-04-16 09:09:33');
INSERT INTO `scores` VALUES (248, 2.00, 2, 2, 7, '2020-11-03 11:22:47', '2020-11-03 11:22:47');
INSERT INTO `scores` VALUES (249, 1.00, 2, 2, 8, '2020-11-03 11:22:47', '2020-11-03 11:22:47');
INSERT INTO `scores` VALUES (250, 1.00, 2, 2, 9, '2020-11-03 11:22:47', '2020-11-03 11:22:47');
INSERT INTO `scores` VALUES (251, 99.00, 3, 5, 1, '2020-11-09 00:18:32', '2020-11-09 00:18:32');
INSERT INTO `scores` VALUES (252, 88.00, 3, 5, 2, '2020-11-09 00:18:32', '2020-11-09 00:18:32');
INSERT INTO `scores` VALUES (253, 98.00, 3, 2, 1, '2020-11-09 12:48:59', '2020-11-09 12:48:59');
INSERT INTO `scores` VALUES (254, 89.00, 3, 2, 2, '2020-11-09 12:48:59', '2020-11-09 12:48:59');
INSERT INTO `scores` VALUES (255, 100.00, 6, 4, 1, '2020-11-14 05:14:41', '2020-11-14 05:14:41');
INSERT INTO `scores` VALUES (256, 100.00, 6, 4, 2, '2020-11-14 05:14:41', '2020-11-14 05:14:41');
INSERT INTO `scores` VALUES (257, 80.00, 6, 4, 3, '2020-11-14 05:14:41', '2020-11-14 05:14:41');
INSERT INTO `scores` VALUES (258, 58.00, 6, 4, 4, '2020-11-14 05:14:41', '2020-11-14 05:14:41');
INSERT INTO `scores` VALUES (259, 65.00, 6, 4, 5, '2020-11-14 05:14:41', '2020-11-14 05:14:41');
INSERT INTO `scores` VALUES (260, 65.00, 6, 4, 6, '2020-11-14 05:14:41', '2020-11-14 05:14:41');
INSERT INTO `scores` VALUES (261, 75.00, 6, 4, 7, '2020-11-14 05:14:41', '2020-11-14 05:14:41');
INSERT INTO `scores` VALUES (262, 76.00, 6, 4, 8, '2020-11-14 05:14:41', '2020-11-14 05:14:41');
INSERT INTO `scores` VALUES (263, 44.00, 6, 4, 9, '2020-11-14 05:14:41', '2020-11-14 05:14:41');
INSERT INTO `scores` VALUES (265, 132.00, 8, 6, 1, '2020-12-17 20:17:23', '2020-12-17 20:17:23');
INSERT INTO `scores` VALUES (266, 143.00, 8, 6, 2, '2020-12-17 20:17:23', '2020-12-17 20:17:23');
INSERT INTO `scores` VALUES (267, 145.00, 8, 6, 3, '2020-12-17 20:17:23', '2020-12-17 20:17:23');
INSERT INTO `scores` VALUES (268, 78.00, 8, 6, 4, '2020-12-17 20:17:23', '2020-12-17 20:17:23');
INSERT INTO `scores` VALUES (269, 87.00, 8, 6, 5, '2020-12-17 20:17:23', '2020-12-17 20:17:23');
INSERT INTO `scores` VALUES (270, 88.00, 8, 6, 6, '2020-12-17 20:17:23', '2020-12-17 20:17:23');
INSERT INTO `scores` VALUES (271, 88.00, 8, 6, 7, '2020-12-17 20:17:23', '2020-12-17 20:17:23');
INSERT INTO `scores` VALUES (272, 89.00, 8, 6, 8, '2020-12-17 20:17:23', '2020-12-17 20:17:23');
INSERT INTO `scores` VALUES (273, 98.00, 8, 6, 9, '2020-12-17 20:17:23', '2020-12-17 20:17:23');
INSERT INTO `scores` VALUES (274, 132.00, 10, 6, 1, '2020-12-17 20:17:53', '2020-12-17 20:17:53');
INSERT INTO `scores` VALUES (275, 112.00, 10, 6, 2, '2020-12-17 20:17:53', '2020-12-17 20:17:53');
INSERT INTO `scores` VALUES (276, 143.00, 10, 6, 3, '2020-12-17 20:17:53', '2020-12-17 20:17:53');
INSERT INTO `scores` VALUES (277, 89.00, 10, 6, 4, '2020-12-17 20:17:53', '2020-12-17 20:17:53');
INSERT INTO `scores` VALUES (278, 99.00, 10, 6, 5, '2020-12-17 20:17:53', '2020-12-17 20:17:53');
INSERT INTO `scores` VALUES (279, 98.00, 10, 6, 6, '2020-12-17 20:17:53', '2020-12-17 20:17:53');
INSERT INTO `scores` VALUES (280, 88.00, 10, 6, 7, '2020-12-17 20:17:53', '2020-12-17 20:17:53');
INSERT INTO `scores` VALUES (281, 87.00, 10, 6, 8, '2020-12-17 20:17:53', '2020-12-17 20:17:53');
INSERT INTO `scores` VALUES (282, 88.00, 10, 6, 9, '2020-12-17 20:17:53', '2020-12-17 20:17:53');
INSERT INTO `scores` VALUES (287, 115.00, 2, 6, 1, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (288, 135.00, 2, 6, 2, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (289, 138.00, 3, 6, 2, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (290, 128.00, 3, 6, 1, '2020-10-25 19:23:06', '2020-10-25 19:23:06');
INSERT INTO `scores` VALUES (291, 52.00, 3, 1, 1, '2020-12-26 18:43:46', '2020-12-26 18:43:46');
INSERT INTO `scores` VALUES (292, 66.00, 3, 1, 2, '2020-12-26 18:43:46', '2020-12-26 18:43:46');
INSERT INTO `scores` VALUES (303, 99.00, 9, 1, 1, '2020-12-27 14:57:08', '2020-12-27 14:57:08');
INSERT INTO `scores` VALUES (304, 1.00, 9, 1, 2, '2020-12-27 14:57:08', '2020-12-27 14:57:08');
INSERT INTO `scores` VALUES (305, 12.00, 9, 1, 3, '2020-12-27 14:57:08', '2021-03-28 13:01:46');
INSERT INTO `scores` VALUES (306, 1.00, 9, 1, 4, '2020-12-27 14:57:08', '2020-12-27 14:57:08');
INSERT INTO `scores` VALUES (307, 5.00, 9, 1, 5, '2020-12-27 14:57:08', '2020-12-27 14:57:08');
INSERT INTO `scores` VALUES (308, 1.00, 9, 1, 6, '2020-12-27 14:57:08', '2020-12-27 14:57:08');
INSERT INTO `scores` VALUES (309, 1.00, 9, 1, 7, '2020-12-27 14:57:08', '2020-12-27 14:57:08');
INSERT INTO `scores` VALUES (310, 1.00, 9, 1, 8, '2020-12-27 14:57:08', '2020-12-27 14:57:08');
INSERT INTO `scores` VALUES (311, 1.00, 9, 1, 9, '2020-12-27 14:57:08', '2020-12-27 14:57:08');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学号',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学生姓名',
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
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (2, 'test', '学生甲', '男', '110120119', '96308564', '2019-04-13', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '群英网络有限公司', NULL, NULL, 'xuP9LtEUXb', '2013-03-30 09:17:26', '2021-04-03 00:28:11');
INSERT INTO `students` VALUES (3, '11536946', '黎帅', '男', '13257950920', '23639283', '1985-12-11', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '联软传媒有限公司', NULL, NULL, 'shABRz7p2E', '2006-09-28 23:11:05', '2008-09-23 05:41:03');
INSERT INTO `students` VALUES (4, '90460066', '凌晶', '女', '18137801518', '20798288', '2000-02-02', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '维旺明科技有限公司', NULL, NULL, 'auZS1mpyXT', '2012-02-19 09:17:25', '1974-03-25 19:58:36');
INSERT INTO `students` VALUES (5, '42365184', '秦冰冰', '男', '13900316761', '87890951', '1973-01-27', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '创亿网络有限公司', NULL, NULL, 'BvRNJQ9aHo', '2007-05-03 08:22:12', '1972-04-18 09:30:02');
INSERT INTO `students` VALUES (6, '97827816', '欧玉英', '男', '17767230472', '98366073', '1997-08-17', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '飞利信信息有限公司', NULL, NULL, 'Pu8moX1Do3', '1986-12-12 16:33:45', '1979-04-17 17:56:59');
INSERT INTO `students` VALUES (7, '97452034', '窦成', '男', '17799603758', '14592028', '2018-09-23', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '昂歌信息传媒有限公司', NULL, NULL, 'KBYLJHOyER', '1972-04-19 20:05:45', '2007-08-13 02:06:51');
INSERT INTO `students` VALUES (8, '34185498', '赵娜', '女', '17197588113', '96107232', '1983-06-22', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '双敏电子信息有限公司', NULL, NULL, 'elc4Vcyu8K', '1989-03-10 12:26:16', '1988-12-29 20:13:34');
INSERT INTO `students` VALUES (9, '21983497', '项坤', '男', '15641596350', '84329003', '2010-03-10', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '信诚致远科技有限公司', NULL, NULL, '4a4dENCqwV', '1993-04-29 22:33:00', '1984-05-20 13:52:09');
INSERT INTO `students` VALUES (10, '94395183', '靳哲', '女', '15107678894', '66133427', '1991-04-23', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '华泰通安传媒有限公司', NULL, NULL, 'hGR7R3uenL', '2007-01-17 09:36:43', '2016-11-27 20:25:14');

-- ----------------------------
-- Table structure for system_menu
-- ----------------------------
DROP TABLE IF EXISTS `system_menu`;
CREATE TABLE `system_menu`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pid` bigint(20) NOT NULL DEFAULT 0 COMMENT '父ID',
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '菜单图标',
  `href` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '链接',
  `target` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '链接打开方式',
  `sort` int(11) NULL DEFAULT 0 COMMENT '菜单排序',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态(0:禁用,1:启用)',
  `remark` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '备注信息',
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_menu
-- ----------------------------
INSERT INTO `system_menu` VALUES (1, 0, '基础管理', '', '', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (2, 0, '成绩管理', 'fa fa-book', '', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (3, 0, '成绩分析', 'fa fa-line-chart', '', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (4, 10, '学生列表', 'fa fa-graduation-cap', 'user.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (5, 10, '老师列表', 'fa fa-user-plus', 'teacher.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (6, 2, '成绩查询', 'fa fa-search', 'score.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (7, 2, '成绩录入', 'fa fa-upload', 'score.create', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (8, 3, '总体分析', 'fa fa-pie-chart', 'analyze.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (9, 3, '个人分析', 'fa fa-line-chart', 'analyze.gerenfx', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (10, 1, '用户管理', 'fa fa-user-circle-o', '', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (11, 1, '课程列表', 'fa fa-list-ol', 'course.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (12, 1, '考试列表', 'fa fa-etsy', 'exam.index', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (13, 1, '管理员专属', 'fa fa-book', '', '', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (15, 13, '用户列表', 'fa fa-user', 'admin.index', NULL, 0, 1, NULL, NULL, NULL, NULL);

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
INSERT INTO `teachers` VALUES (1, '沿明霞', '女', '18693843205', '30921280', '2004-04-19 10:21:58', '1986-03-30 09:58:31');
INSERT INTO `teachers` VALUES (2, '季红', '女', '13202609640', '96133282', '2008-11-06 07:18:59', '2001-06-19 23:58:26');
INSERT INTO `teachers` VALUES (3, '米平', '女', '15794232443', '11986672', '1991-06-26 21:23:47', '1976-06-14 10:17:14');
INSERT INTO `teachers` VALUES (4, '蔺超', '男', '17194789423', '79603817', '2020-06-13 18:36:11', '1997-02-21 10:43:24');
INSERT INTO `teachers` VALUES (5, '房晨', '男', '17090885187', '97473593', '1995-07-28 19:13:58', '2002-07-07 07:57:39');
INSERT INTO `teachers` VALUES (6, '位静', '男', '17805364779', '33524284', '2017-09-23 12:58:34', '1983-11-22 23:31:43');
INSERT INTO `teachers` VALUES (7, '敖春梅', '女', '14527895864', '60040396', '1983-06-03 22:21:30', '1991-07-27 02:12:58');
INSERT INTO `teachers` VALUES (8, '符超', '女', '15696544875', '66254164', '2018-12-06 21:50:37', '1974-12-24 22:35:07');
INSERT INTO `teachers` VALUES (9, '卢明', '男', '15130718072', '37366540', '2005-03-03 16:47:24', '2019-11-27 02:32:24');
INSERT INTO `teachers` VALUES (10, '靳凤英', '女', '15607294664', '54964014', '2008-02-10 07:13:25', '1986-11-26 00:53:09');

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
INSERT INTO `user_has_roles` VALUES (3, 'App\\Models\\UserModel', 3);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '昵称',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `bind_user_id` bigint(20) NULL DEFAULT NULL COMMENT '学生表或老师表的外键ID',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_uid_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '系统管理员', '$2y$10$2jDad/OvKO9Q6sqow1KCmOQJ8eKhEDZVL6gWosUqbhRWIBkFSh7s.', 1, 'AxGEdfgaVRpw8r6KpYh0ecUgQob8Do6UTuI0NnbKVsnBnkEmXjaCdusYvq7e', '1971-11-20 08:23:59', '2021-04-03 00:28:11');
INSERT INTO `users` VALUES (2, 'teacher', '老师', '$2y$10$SrE4Ns8b/h.Bvq8b9WRdBe3SRBcR6yFYmJ50NG4B9ubkB.Az5p1wK', 2, 'LczYNivpBUj5zdOf9P4tILE1gOWxT4AQaPCS0azm1PiMRcOOFgey4LkYs7UM', '2013-03-30 09:17:26', '2021-12-05 12:29:27');
INSERT INTO `users` VALUES (3, 'student', '学生', '$2y$10$JZ0u6DzqpcWFNRCgr/PKxeWYF8vXf3JZX3wRBaMkmXJhFTNtFPzZG', 2, 'FYxVJ3rn0HlOeHZMOvDurS0xz6PQKjowHEgZnFLrLashZOgAKG0uLHQndewk', '2021-12-04 22:05:25', '2021-12-05 12:29:12');

SET FOREIGN_KEY_CHECKS = 1;
