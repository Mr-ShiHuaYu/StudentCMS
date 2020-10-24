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

 Date: 24/10/2020 15:13:27
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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of exams
-- ----------------------------
INSERT INTO `exams` VALUES (2, '第二次月考', '2020-02-01', '2020-09-20 22:45:25', '2020-10-09 22:35:10');
INSERT INTO `exams` VALUES (3, '第三次月考', '2020-04-01', '2020-09-20 22:45:25', '2020-10-09 22:36:12');
INSERT INTO `exams` VALUES (4, '第四次月考', '2020-05-01', '2020-09-20 22:45:25', '2020-10-09 22:36:24');
INSERT INTO `exams` VALUES (5, '第一学期半期考', '2020-03-01', '2020-09-20 22:45:25', '2020-10-09 22:35:57');
INSERT INTO `exams` VALUES (6, '第一学期期末考', '2020-06-01', '2020-09-20 22:45:25', '2020-10-09 22:36:36');
INSERT INTO `exams` VALUES (8, '第一次月考', '2020-01-01', '2020-10-07 11:41:19', '2020-10-09 22:34:59');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 203 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `scores` VALUES (125, 98.00, 4, 2, 4, '2020-09-19 17:22:16', '2020-09-19 17:22:16');
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
-- Table structure for system_menu
-- ----------------------------
DROP TABLE IF EXISTS `system_menu`;
CREATE TABLE `system_menu`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `pid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父ID',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '名称',
  `icon` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '菜单图标',
  `href` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '链接',
  `target` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '_self' COMMENT '链接打开方式',
  `sort` int(11) NULL DEFAULT 0 COMMENT '菜单排序',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态(0:禁用,1:启用)',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注信息',
  `create_at` timestamp(0) NULL DEFAULT NULL COMMENT '创建时间',
  `update_at` timestamp(0) NULL DEFAULT NULL COMMENT '更新时间',
  `delete_at` timestamp(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `title`(`title`) USING BTREE,
  INDEX `href`(`href`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统菜单表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of system_menu
-- ----------------------------
INSERT INTO `system_menu` VALUES (1, 10, '用户管理', 'fa fa-user-circle-o', '', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (2, 1, '学生列表', 'fa fa-graduation-cap', 'user.index', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (3, 1, '老师列表', 'fa fa-user-plus', 'teacher.index', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (4, 0, '成绩管理', 'fa fa-book', '', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (5, 4, '成绩查询', 'fa fa-search', 'score.index', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (6, 4, '成绩录入', 'fa fa-upload', 'score.create', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (7, 0, '成绩分析', 'fa fa-line-chart', '', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (8, 7, '总体分析', 'fa fa-pie-chart', 'analyze.index', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (9, 7, '个人分析', 'fa fa-line-chart', 'analyze.gerenfx', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (10, 0, '基本信息管理', '', '', '_self', 1, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (11, 10, '课程列表', 'fa fa-list-ol', 'course.index', '_self', 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES (12, 10, '考试列表', 'fa fa-etsy', 'exam.index', '_self', 0, 1, NULL, NULL, NULL, NULL);

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
INSERT INTO `user_has_roles` VALUES (2, 'App\\Models\\UserModel', 5);
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
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'zhuolina', '$2y$10$ZEH/ZawHohJNPI86PCGbZ.iXFKYE0UXZY8zXMJzX1d1itwufwIBOC', '系统管理员', 1, '男', '110120119', '99766558', '1994-12-06', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2mB4u8mL6c1mXTDg4pM5wZRKnmTtoKTciMhrKEnHeMcGz56lSgOcaOKjYRkw', '1970-08-07 19:41:20', '2020-09-25 19:31:00');
INSERT INTO `users` VALUES (2, '3072190323', '$2y$10$Z/DO.RWBNUwE69YFf3Ctsux3fFxfrHCvwj7zuBIVRJLAuhIJCbr5q', '王茁轩', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'wY6E0BXIFJ1NsxjOH5uhoo0dSq6e7cCoJcdiNeWEXGN5VEc4S6Qz1hVubQAC', '1975-03-08 12:23:57', '2015-09-21 02:17:17');
INSERT INTO `users` VALUES (3, '3072330171', '$2y$10$4IKi8NIlXm6ngrjkLoKsCuKtz/Fs6sMl6fDB.NaxeVTlOm/BE4wM.', '兰李韩', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'fBvbQ4JaeK', '1988-12-05 02:49:48', '1995-03-20 18:36:28');
INSERT INTO `users` VALUES (4, '3072190327', '$2y$10$S2WfknhYJ/2q32AKZF9Q9O1C9Qy9NU.5XJ14zVlirb2XSEZUi6u1q', '曾琳', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2kXya7JG7C', '2013-11-12 18:02:31', '2017-12-15 19:41:46');
INSERT INTO `users` VALUES (5, '3072430171', '$2y$10$Ao6VM/Fr9P0N0wqs2fcW6ewho7lowVBBNQCMM5Lyn5j8/kCmWpPnu', '许慧萍', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '7R5UH5IRlU', '1999-01-27 10:30:19', '2020-09-18 23:53:58');
INSERT INTO `users` VALUES (6, '3072330102', '$2y$10$iCMM2HwL.M8U7iis.db5aO7.QXij4qZii6LZtLGUYbW393polHKYa', '陈家颉', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'HkSQy3uLVn', '1983-04-20 10:41:35', '2006-12-05 17:52:11');
INSERT INTO `users` VALUES (7, '3072430322', '$2y$10$XNlXR/0pIytfiHAwQ0v6neRVDVde3hmhtXiqQe0zeupBMDtXdB2Fq', '连熔巧', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '3TzprftPLh', '2012-05-23 09:50:09', '1989-12-26 16:38:45');
INSERT INTO `users` VALUES (8, '3072330026', '$2y$10$kqqW5f6.yIBsbsvYfJrs4e8ZC86PPYpgfEb.GXUpRQvUQwWBgPr.G', '张咪', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'NeQaJSUD7P', '1977-07-12 08:42:09', '2001-05-13 13:06:25');
INSERT INTO `users` VALUES (9, '3072190082', '$2y$10$MbXLQhmPJSHeGDwhFGJ2AuTQMESOxGBLhrgNKs5N08rwyodaA2ol.', '雷林韬', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'rrNusvPSyP', '1995-12-24 19:57:13', '1975-11-18 05:23:22');
INSERT INTO `users` VALUES (10, '3072430083', '$2y$10$bNJYhLFyykP49hq2UxM9tOhlv8U4JoOr8kPMKOzW7pfyKUCT.SQJ.', '缪媛媛', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'C26CW5E16z', '1976-01-01 02:48:22', '1985-10-19 16:10:44');
INSERT INTO `users` VALUES (11, '3072190171', '$2y$10$lGIirTwAp5Efr/J73MeVhebMfVR7zhlCJ7kC7qHr/a0Uqx.0uCBIO', '陈林永睿', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'U7w4mM1qNn', '1988-01-16 15:55:05', '1991-05-31 01:58:58');
INSERT INTO `users` VALUES (12, '3072430389', '$2y$10$sJONlWTV4DzHa3xuCW5dQebCrHLnEHz2CbQLjLVzFfsAifKnyD42W', '陈维锐', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '028dwJSSkY', '2020-06-14 15:27:57', '1997-12-27 15:11:09');
INSERT INTO `users` VALUES (13, '3072190503', '$2y$10$XLrPSdWd2R85ywWmtk6QquLw4qpBfrP/RMpRd/2hAfqB0DGzcDCsK', '吕奕凯', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '5M1cKuZLtm', '2005-05-05 01:49:22', '1995-02-20 13:57:22');
INSERT INTO `users` VALUES (14, '3072190145', '$2y$10$JLUl8L1nrZ1OX8D5c.0oDONKsEQKZ6TTBrI/WK0f5vuwsnyAlt04m', '李上满', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'sUyKiw95Ir', '2003-10-26 16:00:02', '2002-10-15 16:07:21');
INSERT INTO `users` VALUES (15, '3072190329', '$2y$10$S0FU0LvchkxeurG/qpMn6.vBsaxytKObSZ1WdqlE6ehEoYosd.WpO', '陆俊杰', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'yFRUkmS6kV', '1972-04-11 10:59:09', '1970-11-23 12:04:25');
INSERT INTO `users` VALUES (16, '3072190489', '$2y$10$1aXET4XI1n43SbdY0EVRr.0/3ce5.4wf2sKsAmIaVoPANrrp9kTru', '王潇语', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '8YPJvVAC9V', '1984-05-30 20:12:43', '1979-09-29 14:29:16');
INSERT INTO `users` VALUES (17, '3072430137', '$2y$10$lejqvLA2aghDNmt4YiYHmeV7zTppqN99kB//DpxMUhCkHtN7MKKnC', '李江', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'BPxaw1dx7v', '2001-04-01 02:19:31', '2002-06-01 17:43:18');
INSERT INTO `users` VALUES (18, '3072190022', '$2y$10$ClxelLKpVexDwRLTLnbjQ.dC5RBizQxqSTJVw689CwKovzscG9eRW', '梅琦雯', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'yIIQdvURHd', '1986-05-23 20:25:59', '2016-08-01 16:39:11');
INSERT INTO `users` VALUES (19, '3072430223', '$2y$10$/47mgRcLZxlYA0r3FXZ1feKdvCKdzLO3ksbUyV4t.usjXazfM.NRy', '樊敏敏', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'yWAWfzjh2s', '2002-05-01 12:37:18', '2020-03-06 01:19:03');
INSERT INTO `users` VALUES (20, '3072430020', '$2y$10$LK9KGDlEUfYNTp3zUD3X9.E9qTgoAFZvmElll64VrBwHmeio02Cm6', '梅栩宁', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'mCIIMG0UdB', '1970-09-22 15:26:52', '1988-07-10 22:42:05');
INSERT INTO `users` VALUES (21, '3072060101', '$2y$10$.KzFIZUkatois5ceLkc7XOf15Bb/uzW92eiZbcay5iPMKuQMbLvgG', '陈聪', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'c5AIqnegzI', '1971-03-07 08:37:08', '1990-03-03 03:05:20');
INSERT INTO `users` VALUES (22, '3072430325', '$2y$10$C9FEiU1ddEuvIQoM7JQ6ee9fI1dASYnYym17PFI6Dy5zaBG.kfmlS', '林娜', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'GnRAPtORgd', '2008-02-04 10:18:19', '1973-02-23 21:28:32');
INSERT INTO `users` VALUES (23, '3072430406', '$2y$10$50d54zPyoJuLOwrD7gqvxeF4t5EOKWIakXdHbgtngksQAKRwRgEGy', '阮碧珍', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '9rq1bjiJBs', '1998-01-06 17:18:52', '1982-04-16 09:01:15');
INSERT INTO `users` VALUES (24, '3072010218', '$2y$10$W1LSz5K7cIcYy7COrWhEpe73PxKFE7dlP/4chReNuIF7klYjNOFQa', '袁媛', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'eLJz8rvJP3', '1993-10-16 01:45:04', '2014-09-30 14:43:03');
INSERT INTO `users` VALUES (25, '3072190023', '$2y$10$2MxoUOGO/j49IFqcPGASqea0nrSxESmVbmFHPftGgqu.QXB2s.3Ny', '林诗涵', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'QYacq11YMT', '2007-05-20 13:04:29', '1987-12-28 18:00:13');
INSERT INTO `users` VALUES (26, '3072430390', '$2y$10$HqA5XTbIkI44JVsj6WtLCeNjsptwNd5A2dsbpNyyfxX5nHkQeYYtC', '郑墁臻', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'LBrldBxpWO', '1977-10-15 15:24:27', '2010-12-17 22:45:43');
INSERT INTO `users` VALUES (27, '3072430218', '$2y$10$qxQqwh21yGQLBwI.Tjzm2u2q3s0AnwV4djDHfS/k4E3gbmJ5ErTN6', '郑碧盈', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'HJWKot1uvW', '1996-04-21 19:09:19', '1989-12-03 10:54:45');
INSERT INTO `users` VALUES (28, '3072120003', '$2y$10$yUOql7mlhYvf.Dmm7EJM1uuxrKngUvJxu3xA7X7MYwY3xguwafDs2', '范甘熠', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '7M0oQ09IDd', '1979-08-20 08:21:28', '2011-05-18 03:45:54');
INSERT INTO `users` VALUES (29, '3072330181', '$2y$10$gtFsBaXRRSwDnQfbHcCD/.KrHNrrh0zUyA/J6YyvmWxcV5PVCB.5S', '钟伟', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'QpxG1brLiu', '1975-12-30 18:24:13', '1972-03-02 05:36:39');
INSERT INTO `users` VALUES (30, '3072070126', '$2y$10$.TC1Shx/HW1fv1iwzfBs6u7AVP8Xnd27dfi8rn/b8P4Kn6Qt2RhLa', '钟涵斌', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'svFQ6DwhSe', '2009-07-29 23:03:19', '1979-03-28 01:16:19');
INSERT INTO `users` VALUES (31, '3072430415', '$2y$10$CfygY2.6M3Gyn5qFcAG2juvTU6cWrlk8zE/PEOAYV.wdhU9lVokji', '叶坤', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 's3Nyfs7Rtz', '1972-06-02 05:47:19', '1990-06-07 04:48:34');
INSERT INTO `users` VALUES (32, '3072190085', '$2y$10$W6ku/9qUDw0PD.pvnrk/UeRUm39giABp85H8xt.l.lq5XILHOgZ/G', '林伟涛', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'ACfR3L1ESf', '2011-09-17 13:37:59', '1992-02-03 13:57:59');
INSERT INTO `users` VALUES (33, '3072060307', '$2y$10$zEzpXHRo2DhUN4NywLAE/.NxTmEpuBGWCKVzCI0XkPc2fsUr8o.4q', '陈辉', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'SQfusAdt5L', '1981-03-07 06:54:38', '2018-01-25 15:53:23');
INSERT INTO `users` VALUES (34, '3072060426', '$2y$10$57RncyxTY/Q4OKR3TUF6Ze3mgP.AuCYryWimzg1MSfABP5u0VUzMm', '黄颖', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'iupw7PeXkT', '1991-03-02 06:58:35', '1971-01-28 21:51:59');
INSERT INTO `users` VALUES (35, '3072330075', '$2y$10$I3EIpmCSQEEHsYdYFyf9FODzKND1WXAWhCzkUQtt0F/1sXeSIKbo2', '钟洋', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'You9pttQKE', '1983-03-13 00:24:48', '2007-05-17 01:38:00');
INSERT INTO `users` VALUES (36, '3072190025', '$2y$10$vo7iiXo.V/he6GFTsbQVzuYxKdimH2tMzCDYDfO/W/Ru3dW/WHx86', '雷秋冰', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'wwyGD08hIk', '2012-08-22 22:46:59', '2013-02-22 21:10:46');
INSERT INTO `users` VALUES (37, '3072430084', '$2y$10$.tkL.uYWZEia/u73ngHwMOoBLsajYcIaDHX8KOtNXT9oMV2aqK5pa', '吴子欣', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'upgrC9r41O', '1970-04-13 05:22:00', '2009-07-17 06:33:19');
INSERT INTO `users` VALUES (38, '3072990065', '$2y$10$JdFeavOORZHtmFDAVPIH7OSufUqU5zDzuDLlV9YE4mAw8hFdriOey', '林婷玉', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'eq2LFORrrr', '1977-02-19 01:49:23', '1995-09-10 19:34:51');
INSERT INTO `users` VALUES (39, '3072430154', '$2y$10$n6iXzJCmZn5kyRYTHmTzBe8PVX7XwuT3MnpFukd8Izlf1SEhcVPy.', '郭挺炜', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'RD8RtgA5Ww', '1979-11-26 07:14:20', '1981-01-26 17:19:25');
INSERT INTO `users` VALUES (40, '3072070332', '$2y$10$NLZ/0t89FFNcE8aqfX4.iez5HTgF1MvKwNcOSZewpXyKY55N0oCP2', '郑锦浩', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'AUj1GBkQU1', '1996-08-16 18:24:04', '2016-03-01 06:07:32');
INSERT INTO `users` VALUES (41, '3072130020', '$2y$10$ltAUO67TNzpAeLCG4JIoGuVemUYcEIJ74SXyvI0aQwAP17pV1qF9e', '黄丽云', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'pH4tkNr1eg', '1975-08-02 17:38:21', '2012-11-06 08:40:30');
INSERT INTO `users` VALUES (42, '3072190341', '$2y$10$hhuhNOB3OCsCfKvKp0ng6.WuLzAxNqpeqUDw4DWFIfUDkNUdlgBsq', '张欣怡', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'RIjmKeDJH4', '1989-08-21 18:51:57', '2007-02-10 16:19:06');
INSERT INTO `users` VALUES (43, '3072430029', '$2y$10$z0oieV3hVTUF5NeDzAdN0eTen8VRMysvOTTYwu.ibCUDwXBXCyE1e', '刘树芳', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'ymCtRJA515', '2011-11-19 01:55:43', '1989-09-04 05:11:20');
INSERT INTO `users` VALUES (44, '3072330362', '$2y$10$NIv2oqMSoErqyz4KIWYoouY8..5WIGdBB22Lz8at6JeM1nIuhSHdq', '林思萌', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '4T5HYXGqfT', '1980-08-28 06:31:37', '1970-07-27 15:25:21');
INSERT INTO `users` VALUES (45, '3072190492', '$2y$10$NxHQAtykVG50UwQ3rp2V2uU/m2yIeuxGndPtNLdw0JVW0kwhkpXIy', '李旭卿', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'dNULtsmahp', '2008-01-23 01:32:08', '1995-09-24 18:22:11');
INSERT INTO `users` VALUES (46, '3072190061', '$2y$10$sdUud2ixKxYtTFe/HtvgaONTprMT3f/RVloS2.O7Xtz.2usPOIOAm', '陈琳', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'WL9wRGW5RE', '2004-01-02 17:33:15', '2005-07-19 18:13:46');
INSERT INTO `users` VALUES (47, '3072070206', '$2y$10$e2QarCjDGMSVATpLrs7yVeP9lagUsSMwahKlAXXKY04IjsKNmU8Zq', '谢伊禾', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'oL5djKLEKg', '1977-10-31 11:34:08', '2010-09-23 13:36:40');
INSERT INTO `users` VALUES (48, '3072060347', '$2y$10$iwBHU2SxSkpwZnIbzb4Ny.iFaXzm6EC27wHGcIVHyMZE3Uqxlw9l2', '徐清', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'lb14FWNuX4', '1988-11-23 04:08:02', '1991-09-26 13:14:56');
INSERT INTO `users` VALUES (49, '3072030233', '$2y$10$R5/8uNwZjqHqFOTknu94NuQN6slhqxBMW///A2sYFZGJQH1l3gT9a', '李昔妍', 0, '男', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'C0TwsC7YES', '1986-08-19 07:25:55', '2009-05-18 19:01:08');
INSERT INTO `users` VALUES (50, '3072430160', '$2y$10$Q7O7wL52PHmXhkiLJz4wluNDxpamqPVrOLb83n..CoS8NyrqmwFIe', '吴宇轩', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'GUIx8my9OI', '2000-12-02 18:22:24', '1997-03-24 08:19:21');
INSERT INTO `users` VALUES (51, '3072430170', '$2y$10$cTLvwLyW0/UR0uNTDXP95.2c64pVX.4a2UC8AXGcInmmPtdYlGC8a', '周霞', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'KbVn03dBKJ', '1980-03-14 01:23:10', '2006-03-28 18:20:26');
INSERT INTO `users` VALUES (52, '3072050048', '$2y$10$6phDr/GlmXXoTdwIK.WfuuTlx4p4p21rwrKhqK3op6jGz4YqBsRdu', '俞誉熔', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Gp5gBkoDVB', '1990-10-25 06:15:33', '2011-11-23 01:18:06');
INSERT INTO `users` VALUES (53, '3072030105', '$2y$10$ePIiY6vIBUAG2ZtwNH0Tq..4puUzvoOZb5yzckjYk8iK3zyGpVfZC', '杨含雅', 0, '女', '', '', '0000-00-00', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '9bK5ui8b9V', '1976-11-28 11:40:01', '1979-10-24 23:14:55');
INSERT INTO `users` VALUES (54, '3072190015', '$2y$10$shA4xxSazoXFaTJTJIEPzOjeX.i8jhj4jkChIaD3jbOmivHLWE5.a', '林雨欣', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'aRcV0tPhCe', '1999-04-21 23:33:59', '1997-05-07 18:59:49');
INSERT INTO `users` VALUES (55, '3072430431', '$2y$10$f9h3eikMkYrHfG24ciYGQ.EBmBFCEu3aOJaWe0hFtPCC/XgmWXC0W', '邱冰怡', 0, '男', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Bu1Vn7WNrW', '2007-12-30 05:02:23', '2002-02-19 10:56:57');
INSERT INTO `users` VALUES (56, '3072300054', '$2y$10$ItJAR96BMJsaurVhR5n.Fe.tKzfsrMGZRSh/3q5hV1q8jnN.QuE06', '林依榕', 0, '女', '', '', '0000-00-00', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'WUp65VzOQD', '1991-06-24 12:30:52', '1977-09-19 15:46:42');
INSERT INTO `users` VALUES (57, '', '', '', 0, '', '', '', '0000-00-00', '', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- View structure for v_score
-- ----------------------------
DROP VIEW IF EXISTS `v_score`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_score` AS SELECT sc.id,u.id sid,u.name,e.name exam,c.name course,sc.score FROM scores sc LEFT JOIN courses c ON c.id = sc.course_id LEFT JOIN users u ON u.id = sc.student_id LEFT JOIN exams e ON e.id = sc.exam_id WHERE u.is_admin = 0 order by e.id,c.id ;

SET FOREIGN_KEY_CHECKS = 1;
