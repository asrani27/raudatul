/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : raudatul

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 21/06/2022 22:57:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alumni
-- ----------------------------
DROP TABLE IF EXISTS `alumni`;
CREATE TABLE `alumni`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tahun_lulus` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kontak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ipk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jurusan_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alumni
-- ----------------------------
INSERT INTO `alumni` VALUES (1, '123', 'adi', 'khj', 'kjhkj', '098765', 'kjh', '3,7', 12, '2022-06-21 18:22:27', '2022-06-21 18:44:20', 61);
INSERT INTO `alumni` VALUES (2, '1123', 'Derry', '-', '-', '-', '-', '-', 14, '2022-06-21 21:53:52', '2022-06-21 21:54:06', 62);

-- ----------------------------
-- Table structure for hasil_kuis
-- ----------------------------
DROP TABLE IF EXISTS `hasil_kuis`;
CREATE TABLE `hasil_kuis`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alumni_id` int(11) NULL DEFAULT NULL,
  `kuesioner_id` int(11) NULL DEFAULT NULL,
  `jawaban` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil_kuis
-- ----------------------------
INSERT INTO `hasil_kuis` VALUES (1, 1, 1, 'B Aja', '2022-06-21 19:36:19', '2022-06-21 19:36:27', '2022-06-21');
INSERT INTO `hasil_kuis` VALUES (2, 1, 2, 'Bkjn kj', '2022-06-21 19:36:19', '2022-06-21 19:38:28', '2022-06-21');
INSERT INTO `hasil_kuis` VALUES (3, 2, 1, 'Lumayan lah', '2022-06-21 21:55:08', '2022-06-21 21:55:08', '2022-06-21');
INSERT INTO `hasil_kuis` VALUES (4, 2, 2, 'cantik dosennya', '2022-06-21 21:55:08', '2022-06-21 21:55:08', '2022-06-21');

-- ----------------------------
-- Table structure for hasil_nilai
-- ----------------------------
DROP TABLE IF EXISTS `hasil_nilai`;
CREATE TABLE `hasil_nilai`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alumni_id` int(11) NULL DEFAULT NULL,
  `stakeholder_id` int(11) NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `penilai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `integritas` int(11) NULL DEFAULT NULL,
  `profesionalitas` int(11) NULL DEFAULT NULL,
  `komunikasi` int(11) NULL DEFAULT NULL,
  `kerjasama` int(11) NULL DEFAULT NULL,
  `pengembangan_diri` int(11) NULL DEFAULT NULL,
  `penguasaan_tik` int(11) NULL DEFAULT NULL,
  `bahasa_inggris` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil_nilai
-- ----------------------------
INSERT INTO `hasil_nilai` VALUES (1, 1, 1, '2022-06-21', 'udin', 671, 56, 45, 65, 87, 87, 67, '2022-06-21 20:30:48', '2022-06-21 20:33:44');
INSERT INTO `hasil_nilai` VALUES (2, 2, 1, '2022-06-21', 'angga', 60, 70, 50, 60, 70, 80, 90, '2022-06-21 21:56:51', '2022-06-21 21:56:51');

-- ----------------------------
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
INSERT INTO `jurusan` VALUES (11, 'MANAJEMEN INFORMATIKA', '001');
INSERT INTO `jurusan` VALUES (12, 'KOMPUTER AKUNTANSI', '002');
INSERT INTO `jurusan` VALUES (13, 'SISTEM INFORMASI', '003');
INSERT INTO `jurusan` VALUES (14, 'TEKNIK INFORMATIKA', '004');

-- ----------------------------
-- Table structure for kuesioner
-- ----------------------------
DROP TABLE IF EXISTS `kuesioner`;
CREATE TABLE `kuesioner`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pertanyaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kuesioner
-- ----------------------------
INSERT INTO `kuesioner` VALUES (1, 'Bagaimana Pengajaran di STMIK');
INSERT INTO `kuesioner` VALUES (2, 'Bagaimana Kesan Di STMIK?');

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  UNIQUE INDEX `role_users_user_id_role_id_unique`(`user_id`, `role_id`) USING BTREE,
  INDEX `role_users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
INSERT INTO `role_users` VALUES (1, 1);
INSERT INTO `role_users` VALUES (60, 2);
INSERT INTO `role_users` VALUES (61, 3);
INSERT INTO `role_users` VALUES (62, 3);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
INSERT INTO `roles` VALUES (2, 'stakeholder', '2022-06-21 18:38:16', '2022-06-21 18:38:16');
INSERT INTO `roles` VALUES (3, 'alumni', '2022-06-21 18:38:19', '2022-06-21 18:38:19');

-- ----------------------------
-- Table structure for stakeholder
-- ----------------------------
DROP TABLE IF EXISTS `stakeholder`;
CREATE TABLE `stakeholder`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bidang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kontak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stakeholder
-- ----------------------------
INSERT INTO `stakeholder` VALUES (1, 'ABC', '--', '-', 'Jl Pramuka', '12432', 'asrani@gmail.com', '2022-06-21 17:44:59', '2022-06-21 22:56:00', 60);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'superadmin', NULL, 'superadmin', '2022-06-21 22:53:36', '$2y$10$EWvbqYJVXAtHOlyX/IR9bOQ7EvE2yQ05gBxZmiFX.BkUYiyo8XHtS', 'vzemthOvMUOOnHjqAEf1uVvSVdLAtCYtzYbReg3cbpEepkNB4NwFX4AdBV8r', '2022-06-21 22:53:36', '2022-06-21 22:53:36');
INSERT INTO `users` VALUES (60, 'ABC', NULL, 'asrani@gmail.com', '2022-06-21 21:56:55', '$2y$10$jA15r26AOnH0OQcSFCBl0e3Sf6VEHRGhg0cjr4M62qsBefo810MB2', '7N5Zdhq7CVuADbVPkEsquCYNGHLN9Oz1AeJfvbzONxV0oPCOLg6ai7jUp1A0', '2022-06-21 21:56:55', '2022-06-21 21:56:55');
INSERT INTO `users` VALUES (61, 'adi', NULL, '123', '2022-06-21 19:38:37', '$2y$10$gC34ej4cw.8TBj98WeN8OuwItwxA/2isZvG.yWoI2WMVLk.FD2z2O', 'WRfCNMyMZFBdghfmhFcXIacCPMnMGzPLukRC4gTwVOcQv7jY9nA8y9htX9YW', '2022-06-21 19:38:37', '2022-06-21 19:38:37');
INSERT INTO `users` VALUES (62, 'Derry', NULL, '1123', '2022-06-21 21:55:11', '$2y$10$t9nIEGioVBsavVXrb8gXueHgwW3hnhmYcNgLMbAuEhcgTnnRWQLl6', 'iYnzuymjsX8wy8ghKjRCCL0b4dZSa51CAIpllWE5YMKv4ieyAGkk7vOnHJs2', '2022-06-21 21:55:11', '2022-06-21 21:55:11');

SET FOREIGN_KEY_CHECKS = 1;
