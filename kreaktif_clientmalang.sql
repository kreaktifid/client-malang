-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 04:58 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kreaktif_clientmalang`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_04_020252_create_questions_table', 1),
(4, '2019_04_04_020309_create_submissions_table', 1),
(5, '2019_04_04_020350_create_tasks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PUBLISH','DRAFT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `image`, `option1`, `option2`, `option3`, `option4`, `answer`, `status`, `id_quiz`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<p>Berikut ini disajikan ciri-ciri dari suatu teks bahasa</p>\r\n\r\n<ol>\r\n	<li>Memiliki gaya penulisan informasi yang persuasif atau dengan kata lain bersifat mengajak</li>\r\n	<li>Berisi penjabaran terkait informasi-informasi yang berhubungan dengan pengetahuan</li>\r\n	<li>Tulisan bersifat objektif dan tidak memihak</li>\r\n	<li>Penjelasan atau penjabaran informasi yang diberikan, disertai dengan data-data akurat dan berasal dari sumber yang tepercaya. Data tersebut berguna sebagai pendukung dari tulisan yang bersangkutan</li>\r\n	<li>Penulisan dan penyampaian teks dipaparkan secara lugas serta menggunakan bahasa baku sesuai dengan EYD</li>\r\n</ol>\r\n\r\n<p>Yang merupakan ciri-ciri dari suatu teks eksposisi adalah pada nomor...</p>', NULL, '1 dan 2', '2 dan 4', '1,2, dan 3', 'Semua benar', 'option3', 'DRAFT', 1, '2019-04-11 16:10:20', '2019-04-11 16:40:15', NULL),
(2, '<p>Urutan struktur teks eksposisi dari awal hingga akhir adalah...</p>', 'question-images/KZAA1z2CGb4kc2RRoQnMKPraEUh1BXf1sU1ORdLO.png', 'Tesis, argumentasi, penegasan kembali pendapat tesis', 'Tesis, penegasan kembali pendapat tesis', 'Tesis, argumentasi, penegasan kembali pendapat tesis, penutup', 'Tesis, argumentasi, kesimpulan', 'option1', 'PUBLISH', 1, '2019-04-11 16:29:53', '2019-04-11 21:09:00', NULL),
(3, '<p>Definisi yang tepat mengenai teks eksposisi adalah...</p>', 'question-images/5Cq2InzvwQrMKEkTey3y9wN40cPWkhAnttVyNRKf.jpeg', 'Teks yang berisi legenda raja-raja di Indonesia', 'Kisah tanah jawa', 'Teks yang menceritakan agenda-agenda di kehidupan penulis', 'Sebuah karangan atau paragraf yang mengandung informasi atau pengetahuan yang mencoba digambarkan dalam bentuk yang padat, singkat dan jelas.', 'option4', 'PUBLISH', 1, '2019-04-11 16:42:32', '2019-04-11 21:08:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_submission`
--

CREATE TABLE `question_submission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_submission`
--

INSERT INTO `question_submission` (`id`, `submission_id`, `question_id`, `answer`, `point`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'option3', 5, '2019-04-08 01:46:27', '2019-04-08 01:46:27'),
(2, 1, 2, 'option1', 5, '2019-04-08 01:46:27', '2019-04-08 01:46:27'),
(3, 1, 3, 'option4', 5, '2019-04-08 01:46:27', '2019-04-08 01:46:27'),
(4, 2, 1, 'option2', 0, '2019-04-08 23:27:34', '2019-04-08 23:27:34'),
(5, 2, 2, 'option2', 0, '2019-04-08 23:27:34', '2019-04-08 23:27:34'),
(6, 2, 3, 'option3', 0, '2019-04-08 23:27:34', '2019-04-08 23:27:34'),
(7, 3, 1, 'option1', 0, '2019-04-12 03:39:25', '2019-04-12 03:39:25'),
(8, 3, 2, 'option1', 5, '2019-04-12 03:39:25', '2019-04-12 03:39:25'),
(9, 3, 3, 'option4', 5, '2019-04-12 03:39:25', '2019-04-12 03:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Quiz1', 'Test1');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('PROGRESS','FINISH') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'FINISH', '2019-04-08 01:39:24', '2019-04-08 01:46:27'),
(2, 2, 'FINISH', '2019-04-09 23:19:31', '2019-04-08 23:27:34'),
(3, 2, 'FINISH', '2019-04-12 03:30:39', '2019-04-12 03:39:25'),
(4, 2, 'PROGRESS', '2019-04-18 03:33:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fathoni Nur Muhammad', 'thoninumad', '$2y$10$3oNpCHTOaFmv6hZLlrOW0uHCnJzG/ReJK/p3hn8E4zxY910PfEBKi', 'ADMIN', NULL, 'ACTIVE', NULL, '2019-04-11 11:38:52'),
(2, 'Syafrie Dwi Faisal', 'syafrie', '$2y$10$3oNpCHTOaFmv6hZLlrOW0uHCnJzG/ReJK/p3hn8E4zxY910PfEBKi', 'USER', NULL, 'ACTIVE', NULL, '2019-04-11 11:38:41'),
(3, 'Fanny Dwi Putra Pamungkas', 'fannydwip', '$2y$10$3oNpCHTOaFmv6hZLlrOW0uHCnJzG/ReJK/p3hn8E4zxY910PfEBKi', 'USER', NULL, 'INACTIVE', '2019-04-05 17:19:46', '2019-04-11 11:37:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_submission`
--
ALTER TABLE `question_submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_submission_id_foreign` (`submission_id`),
  ADD KEY `tasks_question_id_foreign` (`question_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question_submission`
--
ALTER TABLE `question_submission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question_submission`
--
ALTER TABLE `question_submission`
  ADD CONSTRAINT `tasks_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `tasks_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
