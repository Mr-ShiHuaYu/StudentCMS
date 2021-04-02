/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50729
 Source Host           : localhost:3306
 Source Schema         : stucms

 Target Server Type    : MySQL
 Target Server Version : 50729
 File Encoding         : 65001

 Date: 02/04/2021 23:54:08
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
INSERT INTO `courses` VALUES (1, '语文', 150, 8, '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `courses` VALUES (2, '数学', 150, 6, '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `courses` VALUES (3, '英语', 150, 8, '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `courses` VALUES (4, '物理', 100, 2, '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `courses` VALUES (5, '化学', 100, 5, '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `courses` VALUES (6, '生物', 100, 4, '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `courses` VALUES (7, '地理', 100, 5, '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `courses` VALUES (8, '政治', 100, 10, '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `courses` VALUES (9, '历史', 100, 5, '2021-04-02 23:54:00', '2021-04-02 23:54:00');

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
INSERT INTO `exams` VALUES (1, '第一次月考', '2020-01-01', '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `exams` VALUES (2, '第二次月考', '2020-02-01', '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `exams` VALUES (3, '第三次月考', '2020-03-01', '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `exams` VALUES (4, '第四次月考', '2020-04-01', '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `exams` VALUES (5, '第一学期半期考', '2020-05-01', '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `exams` VALUES (6, '第一学期期末考', '2020-06-01', '2021-04-02 23:54:00', '2021-04-02 23:54:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2020_09_05_130614_create_parents_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_09_05_133331_create_teachers_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_09_05_133519_create_courses_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_09_05_133902_create_exams_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_09_05_134323_create_scores_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_10_16_192223_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (8, '2020_10_31_212117_create_system_menu_table', 1);

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
INSERT INTO `role_menu` VALUES (1, 1);
INSERT INTO `role_menu` VALUES (1, 2);
INSERT INTO `role_menu` VALUES (1, 3);
INSERT INTO `role_menu` VALUES (1, 4);
INSERT INTO `role_menu` VALUES (1, 5);
INSERT INTO `role_menu` VALUES (1, 6);
INSERT INTO `role_menu` VALUES (1, 7);
INSERT INTO `role_menu` VALUES (1, 8);
INSERT INTO `role_menu` VALUES (1, 9);
INSERT INTO `role_menu` VALUES (1, 10);
INSERT INTO `role_menu` VALUES (1, 11);
INSERT INTO `role_menu` VALUES (1, 12);
INSERT INTO `role_menu` VALUES (2, 1);
INSERT INTO `role_menu` VALUES (2, 2);
INSERT INTO `role_menu` VALUES (2, 3);
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
INSERT INTO `roles` VALUES (1, '超级管理员', 'web', '2021-04-02 23:54:00', '2021-04-02 23:54:00');
INSERT INTO `roles` VALUES (2, '学生', 'web', '2021-04-02 23:54:00', '2021-04-02 23:54:00');

-- ----------------------------
-- Table structure for scores
-- ----------------------------
DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `score` double(5, 2) NOT NULL COMMENT '成绩',
  `student_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属学生',
  `exam_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属考试',
  `course_id` bigint(20) UNSIGNED NOT NULL COMMENT '所属课程',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `system_menu` VALUES (10, 1, '用户管理', 'fa fa-user-circle-o', '', '', 0, 1, NULL, NULL, NULL, NULL);
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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (1, '尤林', '男', '17183230655', '47791748', '1972-09-05 05:20:42', '2010-10-21 20:25:44');
INSERT INTO `teachers` VALUES (2, '邢芳', '女', '17056816023', '59446449', '2012-08-26 13:59:56', '1982-11-26 02:05:52');
INSERT INTO `teachers` VALUES (3, '阮彬', '女', '13083713650', '80277254', '1991-05-31 03:50:20', '1990-02-23 08:29:40');
INSERT INTO `teachers` VALUES (4, '吕磊', '男', '17610580504', '84433575', '2000-03-21 19:22:14', '1979-02-10 14:08:39');
INSERT INTO `teachers` VALUES (5, '乐丽丽', '女', '13821557146', '36397178', '2007-05-28 02:15:56', '1995-09-26 19:53:07');
INSERT INTO `teachers` VALUES (6, '邓晧', '女', '15053863194', '53937473', '2011-08-18 23:00:21', '1988-08-01 00:05:23');
INSERT INTO `teachers` VALUES (7, '糜帆', '男', '15073507215', '47436524', '1989-12-29 13:09:03', '1993-04-15 21:05:34');
INSERT INTO `teachers` VALUES (8, '关彬', '男', '13887838388', '55420378', '2004-11-13 06:41:55', '1988-09-13 02:50:46');
INSERT INTO `teachers` VALUES (9, '冀淑珍', '男', '18526637815', '30328061', '1998-07-08 12:09:14', '1998-07-02 12:25:10');
INSERT INTO `teachers` VALUES (10, '扬明', '男', '15828060542', '60231182', '2014-08-07 07:25:01', '1993-12-13 23:45:12');

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
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$3i6NJnApZ77hSTKNd6Pcae4PBL5qfxyG7miiK4c/lPyja3uqSsgNS', '系统管理员', 1, '男', '110120119', '73756307', '2018-08-04', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '易动力网络有限公司', NULL, NULL, '6CllCCOANe', '1983-05-02 10:13:08', '2021-04-02 23:54:00');
INSERT INTO `users` VALUES (2, 'test', '$2y$10$tBWBZfn3EnNR4xuh53AlHO61VaC.nb527XcwwDIvbyzuQQ4jrXd0W', '测试学生', 0, '男', '110120119', '99234711', '2000-10-29', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '昊嘉信息有限公司', NULL, NULL, 'WkhK6WHMT6', '2019-06-19 13:03:52', '2021-04-02 23:54:00');
INSERT INTO `users` VALUES (3, '11545003', '$2y$10$BJtoR4MG4gU5YAhgfmrLXeuY9eTEtp4i1cj5B02EW5gyMe4PN5Mou', '汪杰', 0, '男', '13344131612', '23771063', '2005-07-24', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '网新恒天传媒有限公司', NULL, NULL, 'YlQPpugdvw', '1977-04-22 05:03:53', '1974-02-08 00:02:38');
INSERT INTO `users` VALUES (4, '31692632', '$2y$10$//njO.qVe1vf/tZXIUTDgeA2zb6TpTXvjRYiHgrXUADN9YwKfz/UG', '路慧', 0, '男', '15358404984', '66515048', '1993-05-24', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '新宇龙信息传媒有限公司', NULL, NULL, 'tVzcUXdRqK', '2018-05-01 09:31:22', '2002-09-18 09:02:43');
INSERT INTO `users` VALUES (5, '44190073', '$2y$10$52x4JCXmLMV21v5IY7gqtOqkwdR6trUHCgEWp8pfAtJjosP6utZ1e', '奚兵', 0, '男', '17088515500', '62966821', '1998-08-31', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '迪摩信息有限公司', NULL, NULL, 'rkc9SQDcfp', '1993-05-18 22:12:28', '1986-07-22 18:16:21');
INSERT INTO `users` VALUES (6, '30571857', '$2y$10$c1PwpZsA9edfePtw4qh/rew/nRwTkG3OTGNta8hM5CkjkJh/BVcLS', '连楠', 0, '女', '15658024276', '25708728', '1992-02-06', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '诺依曼软件传媒有限公司', NULL, NULL, 'vmoVpc7S52', '2016-09-03 16:27:10', '2020-07-31 05:52:41');
INSERT INTO `users` VALUES (7, '59148275', '$2y$10$C1Q12Gue7P7RNocZU.LM2Oy/JYujMWZNaco3kHEymf6s5NfAWiBYO', '焦凯', 0, '男', '18095938864', '42955873', '1996-01-03', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '南康传媒有限公司', NULL, NULL, 'UhnOR9DYn9', '1982-04-07 13:31:16', '1998-10-28 09:06:14');
INSERT INTO `users` VALUES (8, '89500052', '$2y$10$Z2AlUqiPD9RKY9JKd36SV.qA8TsVpqTcArJAV6diigccnIfjq3o.e', '施萍', 0, '男', '17010987913', '66257203', '2008-02-16', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '东方峻景信息有限公司', NULL, NULL, 'Bem6gXc4Hh', '1998-08-31 19:03:30', '2012-10-03 08:36:17');
INSERT INTO `users` VALUES (9, '21535011', '$2y$10$Oncm9aAsr7IHETJ/2IoQOefOf.Fr59LksgLDq7Gqi6BJegFG9ybhe', '植博涛', 0, '男', '17861472402', '59143351', '1998-09-28', '汉', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '鸿睿思博信息有限公司', NULL, NULL, 'DTFMGx1W9y', '2005-03-05 03:36:26', '1981-11-07 12:40:55');
INSERT INTO `users` VALUES (10, '15506599', '$2y$10$jAf3ykSLpEEL1qpu5C.Lk.TBMSpfKwtIRjWE/rBotf2B386n66FLm', '官梅', 0, '女', '13593307530', '62759648', '2002-01-25', '畲', NULL, NULL, '0', NULL, NULL, 0, NULL, NULL, '佳禾科技有限公司', NULL, NULL, 'CF0nk56zn2', '2010-02-25 00:56:54', '1975-04-17 12:26:14');

SET FOREIGN_KEY_CHECKS = 1;
