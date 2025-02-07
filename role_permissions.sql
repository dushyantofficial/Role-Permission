-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 11:14 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `role_permissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign_answers`
--

CREATE TABLE `campaign_answers`
(
    `id`          bigint(20) UNSIGNED NOT NULL,
    `user_id`     int(11) NOT NULL,
    `question_id` int(11) NOT NULL,
    `answer`      text COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`  timestamp NULL DEFAULT NULL,
    `updated_at`  timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_answers`
--

INSERT INTO `campaign_answers` (`id`, `user_id`, `question_id`, `answer`, `created_at`, `updated_at`)
VALUES (1, 41, 1, 'fgfdg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (2, 41, 2, 'fghfg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (3, 41, 3, 'fghg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (4, 41, 4, 'fhf', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (5, 41, 5, 'fhgfg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (6, 41, 6, 'fghfg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (7, 41, 7, 'fghf', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (8, 41, 8, 'fghfg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (9, 41, 9, 'fghfg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (10, 41, 10, 'fghfg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (11, 41, 11, 'fhf', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (12, 41, 12, 'fghfg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (13, 41, 13, 'fghfg', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (14, 41, 14, 'fghgf', '2023-08-14 04:59:53', '2023-08-14 04:59:53'),
       (15, 42, 14, 'fghgfhgfhgfhfhfh', '2023-08-16 00:45:07', '2023-08-16 00:45:07'),
       (16, 43, 5, 'Test Demo', '2023-08-16 00:47:59', '2023-08-16 00:47:59'),
       (17, 43, 7, 'Test Demo', '2023-08-16 00:47:59', '2023-08-16 00:47:59'),
       (18, 43, 8, 'Test Demo', '2023-08-16 00:47:59', '2023-08-16 00:47:59'),
       (19, 43, 13, 'Test Demo', '2023-08-16 00:47:59', '2023-08-16 00:47:59'),
       (20, 43, 14, 'Test Demo', '2023-08-16 00:47:59', '2023-08-16 00:47:59'),
       (21, 44, 1, 'hgjhgjhg', '2023-08-16 00:55:35', '2023-08-16 00:55:35'),
       (22, 44, 6, 'ghjghjh', '2023-08-16 00:55:35', '2023-08-16 00:55:35'),
       (23, 44, 7, 'ghjhgjg', '2023-08-16 00:55:35', '2023-08-16 00:55:35'),
       (24, 44, 11, 'ghjhgjh', '2023-08-16 00:55:35', '2023-08-16 00:55:35'),
       (25, 44, 12, 'ghjhg', '2023-08-16 00:55:35', '2023-08-16 00:55:35'),
       (26, 44, 13, 'ghjhgjhg', '2023-08-16 00:55:35', '2023-08-16 00:55:35'),
       (27, 45, 1, 'dfsdfsd', '2023-08-16 03:35:16', '2023-08-16 03:35:16'),
       (28, 45, 2, 'sdfdsfds', '2023-08-16 03:35:16', '2023-08-16 03:35:16'),
       (29, 45, 3, 'weqweq', '2023-08-16 03:35:16', '2023-08-16 03:35:16'),
       (30, 45, 9, 'asdsf', '2023-08-16 03:35:16', '2023-08-16 03:35:16'),
       (31, 45, 10, 'sdfsdf', '2023-08-16 03:35:16', '2023-08-16 03:35:16'),
       (32, 45, 13, 'sdfsdf', '2023-08-16 03:35:16', '2023-08-16 03:35:16'),
       (33, 45, 14, 'sdfdsf', '2023-08-16 03:35:16', '2023-08-16 03:35:16'),
       (34, 46, 7, 'ertretre', '2023-08-16 05:11:26', '2023-08-16 05:11:26'),
       (35, 46, 8, 'sdfdsf', '2023-08-16 05:11:26', '2023-08-16 05:11:26'),
       (36, 46, 9, 'sdfsdf', '2023-08-16 05:11:26', '2023-08-16 05:11:26'),
       (37, 46, 10, 'sdffds', '2023-08-16 05:11:26', '2023-08-16 05:11:26'),
       (38, 46, 11, 'dsfdsf', '2023-08-16 05:11:26', '2023-08-16 05:11:26'),
       (39, 46, 12, 'dsfsdf', '2023-08-16 05:11:26', '2023-08-16 05:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_ideas`
--

CREATE TABLE `campaign_ideas`
(
    `id`                         bigint(20) UNSIGNED NOT NULL,
    `sd_name`                    varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sd_email`                   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sd_occupation`              varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sd_contact_number`          varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sd_company_university`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sd_country`                 varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `id_title`                   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `id_description`             varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
    `id_problem_statement`       varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
    `id_proposed_solution`       varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
    `id_category`                varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `id_stage_of_idea`           varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `id_type_of_idea`            varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `id_sector_tech_area`        longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`id_sector_tech_area`)),
    `id_sector_tech_area_remark` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `id_idea_objective`          varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `id_idea_objective_remark`   varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `attachment`                 text COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    `consent`                    tinyint(4) DEFAULT NULL,
    `created_at`                 datetime                                DEFAULT NULL,
    `updated_at`                 datetime                                DEFAULT NULL,
    `user_ip`                    varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_ideas`
--

INSERT INTO `campaign_ideas` (`id`, `sd_name`, `sd_email`, `sd_occupation`, `sd_contact_number`,
                              `sd_company_university`, `sd_country`, `id_title`, `id_description`,
                              `id_problem_statement`, `id_proposed_solution`, `id_category`, `id_stage_of_idea`,
                              `id_type_of_idea`, `id_sector_tech_area`, `id_sector_tech_area_remark`,
                              `id_idea_objective`, `id_idea_objective_remark`, `attachment`, `consent`, `created_at`,
                              `updated_at`, `user_ip`)
VALUES (1, 'Dushyant', 'dushyant@gmail.com', 'Developer', '16546465', 'HNGU', 'India', 'Test Demo', 'Test Demo',
        'Test Demo', 'Test Demo', 'technology', 'development', 'idea',
        '[\"hydrogen\",\"storage\",\"digitalization\",\"others\"]', 'Test Demo', 'other', 'Test Demo', NULL, 1,
        '2023-08-11 07:13:01', '2023-08-11 07:13:01', '27.57.89.87'),
       (31, 'Raj', 'raj@gmail.com', 'Developer', '145263987', 'GTU', 'India', 'Test Demo', 'Test Demo', 'Test Demo',
        'Test Demo', 'product', 'concept', 'newidea', '[\"energy\",\"desalination\",\"hydrogen\",\"storage\"]', NULL,
        'other', NULL, '\"[\\\"32902acwanet_table.xlsx\\\"]\"', 1, '2023-08-14 06:42:22', '2023-08-14 06:42:22',
        '122.172.101.234'),
       (35, 'Paresh', 'paresh@gmail.com', 'Developer', '451263987', 'HNGU', 'India', 'Test Demo', 'Test Demo',
        'Test Demo', 'Test Demo', 'product', 'concept', 'newidea',
        '[\"energy\",\"desalination\",\"hydrogen\",\"others\"]', 'Test Demo', 'other', 'Test Demo',
        '\"[\\\"91831acwanet_table.xlsx\\\"]\"', 1, '2023-08-14 07:00:26', '2023-08-14 07:00:26', '122.172.101.234'),
       (41, 'dfgfdg', 'dfgdqw@gmail.com', 'sdfsdfsdf', '16546465', 'fdgfd', 'dfgfdg', 'dfgdfgfd', 'dfgfddfg', 'dfgfdgf',
        'fdgfd', 'product', 'concept', 'newidea', '[\"hydrogen\",\"storage\",\"digitalization\",\"others\"]',
        'fdgdfgdg', 'other', 'Test Demo', '\"[\\\"72928acwanet_table.xlsx\\\"]\"', 1, '2023-08-14 10:29:53',
        '2023-08-14 10:29:53', '122.172.101.234'),
       (42, 'fdgdfg', 'dfgdd@gmail.com', 'fdgfg', '132456464', 'dfgfd', 'dfgfg', 'ghjh', 'hgjhg', 'ghjgh', 'ghjgh',
        'product', 'concept', 'newidea', '[\"energy\",\"desalination\",\"others\"]', 'cvbcv', 'other', 'cvbvcb',
        '\"[\\\"60555acwanet_table.xlsx\\\"]\"', 1, '2023-08-16 06:15:07', '2023-08-16 06:15:07', '122.170.18.187'),
       (43, 'Vishal', 'vishal@gmail.com', 'Student', '14253698', 'HNGU', 'India', 'Test Demo', 'Test Demo', 'Test Demo',
        'Test Demo', 'product', 'pilot', 'idea', '[\"energy\",\"digitalization\",\"others\"]', 'Test Demo', 'other',
        'Test Demo', '\"[\\\"85076acwanet_table.xlsx\\\"]\"', 1, '2023-08-16 06:17:59', '2023-08-16 06:17:59',
        '122.170.18.187'),
       (44, 'fghgf', 'fghgf@gmail.com', 'fghf', '321465465', 'fghhf', 'fghgh', 'dfgdfg', 'fgfg', 'dfg', 'dfgfd',
        'product', 'pilot', 'newidea', '[\"energy\",\"storage\",\"digitalization\"]', NULL, 'other', NULL,
        '\"[\\\"29695acwanet_table.xlsx\\\"]\"', 1, '2023-08-16 06:25:35', '2023-08-16 06:25:35', '122.170.18.187'),
       (45, 'Test Demo', 'kk.greatideas@gmail.com', 'qeweqwe', '07359616992', 'test', 'India', 'rewrw4rwe', 'gdfgfg',
        'fufufyufy', 'ufyyjyjy', 'product', 'concept', 'newidea', '[\"energy\",\"hydrogen\",\"digitalization\"]', NULL,
        'other', NULL, '\"[\\\"399142023-05-31 O&M Challenge.pdf\\\"]\"', 1, '2023-08-16 09:05:16',
        '2023-08-16 09:05:16', '182.77.112.240'),
       (46, 'rtytfghhfg', 'rtytry@gmail.com', 'trytr', '123231211', 'rtytr', 'rtyrty', 'rtyy', 'rty', 'rtytry',
        'rtytry', 'product', 'concept', 'newidea', '[\"energy\"]', NULL, 'other', NULL,
        '\"[\\\"51689acwanet_table.xlsx\\\"]\"', 1, '2023-08-16 10:41:26', '2023-08-16 10:41:26', '106.213.43.145');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_new`
--

CREATE TABLE `campaign_new`
(
    `id`                   int(11) NOT NULL,
    `campaign_title`       varchar(255) NOT NULL,
    `campaign_description` text         NOT NULL,
    `campaign_banner`      varchar(255) NOT NULL,
    `start_date`           date DEFAULT NULL,
    `end_date`             date DEFAULT NULL,
    `created_at`           timestamp NULL DEFAULT current_timestamp (),
    `updated_at`           timestamp NULL DEFAULT current_timestamp ()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign_new`
--

INSERT INTO `campaign_new` (`id`, `campaign_title`, `campaign_description`, `campaign_banner`, `start_date`, `end_date`,
                            `created_at`, `updated_at`)
VALUES (1, 'CAMPAIGN TITLE',
        'Introduction this campaign is inspired by our mission to empower young minds in the kingdom with the objective of inspiring them to share their ideas in our sector ETC.',
        'oW0Si9KjwgojR4REbDHJVQ0ZuWUtBDO0uvwEDuTW.png', '2023-08-25', '2023-08-29', '2023-08-25 00:36:13',
        '2023-08-25 05:52:07'),
       (15, '12345', '12345', 'zyxpKQwcDLlC23ILNukNKge6wrBlFubkfoaAKAgk.png', NULL, NULL, '2023-08-26 04:59:27',
        '2023-08-26 04:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_new_question`
--

CREATE TABLE `campaign_new_question`
(
    `id`              int(11) NOT NULL,
    `campaign_new_id` int(11) NOT NULL,
    `label_name`      text DEFAULT NULL,
    `question`        text         NOT NULL,
    `type`            varchar(255) NOT NULL,
    `input_type`      varchar(255) NOT NULL,
    `input_value`     text DEFAULT NULL,
    `status`          int(11) NOT NULL,
    `created_at`      timestamp NULL DEFAULT current_timestamp (),
    `updated_at`      timestamp NULL DEFAULT current_timestamp ()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign_new_question`
--

INSERT INTO `campaign_new_question` (`id`, `campaign_new_id`, `label_name`, `question`, `type`, `input_type`,
                                     `input_value`, `status`, `created_at`, `updated_at`)
VALUES (1, 1, '[null]', 'Title', 'idea_details', 'text', '[null]', 1, '2023-08-25 01:14:13', '2023-08-25 04:18:50'),
       (2, 1, '[null]', 'Description', 'idea_details', 'text', '[null]', 1, '2023-08-25 01:16:17',
        '2023-08-25 01:16:17'),
       (3, 1, '[null]', 'Problem Statement', 'idea_details', 'text', '[null]', 1, '2023-08-25 01:16:41',
        '2023-08-25 01:16:41'),
       (4, 1, '[null]', 'Proposed Solution', 'idea_details', 'text', '[null]', 1, '2023-08-25 01:16:56',
        '2023-08-25 01:16:56'),
       (5, 1, '[\"Product123\",\"Service123\",\"Technology123\"]', 'Category', 'idea_details', 'radio',
        '[\"product123\",\"service123\",\"technology123\"]', 1, '2023-08-25 01:18:21', '2023-08-25 04:54:40'),
       (6, 1, '[\"Ideation\\/Concept\",\"Pilot\",\"Development\"]', 'Stage of Idea', 'idea_details', 'radio',
        '[\"ideation_concept\",\"pilot\",\"Development\"]', 1, '2023-08-25 01:20:05', '2023-08-25 01:20:05'),
       (7, 1, '[\"New Idea\",\"Enhancing an existing idea\"]', 'Type of Idea', 'idea_details', 'radio',
        '[\"new_idea\",\"enhancing_existing_idea\"]', 1, '2023-08-25 01:21:29', '2023-08-25 01:21:29'),
       (8, 1,
        '[\"Renewable Energy\",\"Desalination\",\"Green Hydrogen\",\"Energy Storage\",\"Digitalization\",\"Other, please specify\"]',
        'Sector/Technology /Focus Area', 'idea_details', 'checkbox',
        '[\"renewable_energy\",\"desalination\",\"green_hydrogen\",\"energy_storage\",\"digitalization\",\"other\"]', 1,
        '2023-08-25 01:25:18', '2023-08-25 01:25:18'),
       (9, 1, '[\"Solving a problem\\/process\",\"Advancing a current system\",\"Other, please specify\"]',
        'Idea Objective: Please Specify', 'idea_details', 'radio',
        '[\"solving_a_problem\\/process\",\"advancing_a_current_system\",\"other\"]', 1, '2023-08-25 01:26:58',
        '2023-08-25 01:26:58'),
       (17, 1, '[null]', 'dfds', 'idea_details', 'date', '[null]', 1, '2023-08-26 01:53:44', '2023-08-26 04:58:20'),
       (19, 15, '[\"fh\",\"ghgf\",\"fh\",\"ty\"]', 'fgh', 'idea_details', 'radio', '[\"fhg\",\"fgh\",\"fgh\",\"tyu\"]',
        1, '2023-08-26 05:09:12', '2023-08-26 05:09:26'),
       (20, 15, '[\"wer\"]', 'erw', 'criteria_description', 'radio', '[\"werre\",\"dgd\",\"werw\"]', 1,
        '2023-08-26 05:28:19', '2023-08-26 05:28:19'),
       (21, 15, '[null]', 'dfgdf', 'idea_details', 'date', '[null]', 1, '2023-08-26 05:37:14', '2023-08-26 05:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_sub_idea_details`
--

CREATE TABLE `campaign_sub_idea_details`
(
    `id`                       int(11) NOT NULL,
    `campaign_idea_details_id` int(11) NOT NULL,
    `label_name`               text NOT NULL,
    `label_value`              text NOT NULL,
    `created_at`               timestamp NULL DEFAULT current_timestamp (),
    `updated_at`               timestamp NULL DEFAULT current_timestamp ()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign_sub_idea_details`
--

INSERT INTO `campaign_sub_idea_details` (`id`, `campaign_idea_details_id`, `label_name`, `label_value`, `created_at`,
                                         `updated_at`)
VALUES (1, 5, 'Product', 'product', '2023-08-24 10:08:23', '2023-08-24 10:08:23'),
       (2, 5, 'Service', 'service', '2023-08-24 10:08:23', '2023-08-24 10:08:23'),
       (3, 5, 'Technology', 'technology', '2023-08-24 10:09:25', '2023-08-24 10:09:25'),
       (4, 6, 'Ideation/Concept', 'ideation_concept', '2023-08-24 10:09:25', '2023-08-24 10:09:25'),
       (5, 6, 'Pilot', 'pilot', '2023-08-24 10:10:35', '2023-08-24 10:10:35'),
       (6, 6, 'Development', 'development', '2023-08-24 10:10:35', '2023-08-24 10:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses`
(
    `id`               bigint(20) UNSIGNED NOT NULL,
    `resume_id`        bigint(20) UNSIGNED NOT NULL,
    `course_name`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `institution_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `start_date`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `end_date`         varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `check`            text COLLATE utf8mb4_unicode_ci         NOT NULL DEFAULT '0',
    `status`           varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`       timestamp NULL DEFAULT NULL,
    `updated_at`       timestamp NULL DEFAULT NULL,
    `deleted_at`       timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `resume_id`, `course_name`, `institution_name`, `start_date`, `end_date`, `description`,
                       `check`, `status`, `created_at`, `updated_at`, `deleted_at`)
VALUES (1, 3, 'sdffsd', 'sdfsd', '2023-01', 'Present',
        'Leverage agile frameworks to provide a robust synopsis for high level overviews.\r\n                                Iterative approaches to corporate strategy foster collaborative thinking to further the\r\n                                overall value proposition.',
        '1', 'active', '2023-09-24 00:37:45', '2024-01-10 10:36:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education`
(
    `id`              bigint(20) UNSIGNED NOT NULL,
    `resume_id`       bigint(20) UNSIGNED NOT NULL,
    `degree_name`     varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `college_name`    varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `university_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `grade`           varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `start_date`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `end_date`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `city_name`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `check`           int(11) NOT NULL DEFAULT 0,
    `status`          varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`      timestamp NULL DEFAULT NULL,
    `updated_at`      timestamp NULL DEFAULT NULL,
    `deleted_at`      timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `resume_id`, `degree_name`, `college_name`, `university_name`, `grade`, `start_date`,
                         `end_date`, `city_name`, `description`, `check`, `status`, `created_at`, `updated_at`,
                         `deleted_at`)
VALUES (1, 3, 'Hello', 'BCA', 'GTU', 'c', '2023-02', '2024-01', 'Deesa',
        'Leverage agile frameworks to provide a robust synopsis for high level overviews.\r\n                                Iterative approaches to corporate strategy foster collaborative thinking to further the\r\n                                overall value proposition.',
        0, 'active', '2023-09-18 01:48:43', '2024-01-10 10:33:10', NULL),
       (2, 2, 'fgfh', 'fghg', 'fgh', '', '2023-02', '2023-09', 'fgh', NULL, 0, 'active', '2023-09-18 01:48:47',
        '2023-09-23 10:01:36', '2023-09-23 10:01:36'),
       (3, 2, 'fgfh', 'fghg', 'fgh', '', '2023-02', '2023-06', 'fgh', NULL, 0, 'De-Active', '2023-09-18 01:48:57',
        '2023-09-18 01:55:04', '2023-09-18 01:55:04'),
       (4, 4, 'Hello', 'BCA', 'GTU', 'b', '2023-01', 'Present', 'Deesa',
        'Leverage agile frameworks to provide a robust synopsis for high level overviews.\r\n                                Iterative approaches to corporate strategy foster collaborative thinking to further the\r\n                                overall value proposition.',
        1, 'active', '2023-09-18 05:46:49', '2023-09-29 05:44:10', NULL),
       (5, 3, 'Hello', 'ewrwe', 'GTU', 'b', '2023-01', 'Present', 'werrwe',
        'Leverage agile frameworks to provide a robust synopsis for high level overviews.\n                                Iterative approaches to corporate strategy foster collaborative thinking to further the\n                                overall value proposition.',
        1, 'active', '2023-09-23 23:51:11', '2023-12-26 09:21:00', NULL),
       (6, 4, 'ert', 'rtgre', 'ert', 'b', '2023-02', 'Present', 'ertt', 'erttr', 1, 'active', '2023-09-27 04:12:47',
        '2023-09-27 04:12:47', NULL),
       (7, 9, 'gfdg', 'dfgdfg', 'dfgdfg', 'b', '2023-02', '2024-01', 'dfgdfg', 'dfgfdg', 0, 'active',
        '2024-01-10 10:33:43', '2024-01-10 10:33:43', NULL),
       (8, 9, 'sdfdsf', 'sdfsd', 'sdfdsf', 'b', '2023-01', 'Present', 'sdfds', NULL, 1, 'active', '2024-01-10 10:34:11',
        '2024-01-10 10:34:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs`
(
    `id`         bigint(20) UNSIGNED NOT NULL,
    `uuid`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `connection` text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `queue`      text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `payload`    longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `exception`  longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `failed_at`  timestamp                               NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_resizes`
--

CREATE TABLE `image_resizes`
(
    `id`                    bigint(20) UNSIGNED NOT NULL,
    `image`                 varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `image_type`            text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `image_original_width`  varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `image_original_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `image_width`           varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `image_height`          varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `image_size`            varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `compress_image_size`   varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at`            timestamp NULL DEFAULT NULL,
    `updated_at`            timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_resizes`
--

INSERT INTO `image_resizes` (`id`, `image`, `image_type`, `image_original_width`, `image_original_height`,
                             `image_width`, `image_height`, `image_size`, `compress_image_size`, `created_at`,
                             `updated_at`)
VALUES (4, 'Screenshot_20231225_152122.jpg', 'resize_image', NULL, NULL, '500', '500', NULL, NULL,
        '2023-12-27 07:04:10', '2023-12-27 07:04:10'),
       (5, 'image (3).jpg', 'resize_image', NULL, NULL, '50', '50', NULL, NULL, '2023-12-27 07:42:25',
        '2023-12-27 07:42:25'),
       (6, 'lx1VM23S9klSmoP3dFIgJy6HXUCLyKHS4GSymLtn.png', 'default_image', '1923', '1096', NULL, NULL, NULL, NULL,
        '2023-12-27 09:15:59', '2023-12-27 09:15:59'),
       (7, 'image (2).jpg', 'resize_image', '1923', '1096', '1050', '950', NULL, NULL, '2023-12-27 09:19:02',
        '2023-12-27 09:19:02'),
       (8, 'XH9m0JVLlAYvQJf2RwSCH01u8KrDDVr9usceNSCW.jpg', 'default_image', '500', '500', NULL, NULL, NULL, NULL,
        '2023-12-27 09:24:03', '2023-12-27 09:24:03'),
       (9, 'zCnEjOeo5hccirMLHKO0Jx6pZ5yhADsfVaVi607D.jpg', 'default_image', '500', '500', NULL, NULL, '43.060546875',
        NULL, '2023-12-27 09:27:30', '2023-12-27 09:27:30'),
       (10, 'image (3).jpg', 'resize_image', '500', '500', '150', '150', '43.060546875', NULL, '2023-12-27 09:33:53',
        '2023-12-27 09:33:53'),
       (11, 'image (2).jpg', 'resize_image', '1923', '1096', '650', '562', '738.4462890625', '41.7099609375',
        '2023-12-27 09:44:18', '2023-12-27 09:44:18'),
       (12, 'gwb7BAFE0sqrJ02x4dmS13v96OA9sQMkTThnCSbJ.webp', 'default_image', '736', '1104', NULL, NULL, '88.58', NULL,
        '2023-12-27 10:01:18', '2023-12-27 10:01:18'),
       (15, 'image (5).jpg', 'resize_image', '500', '450', '1852', '1750', '42.25', '422.51', '2023-12-27 10:31:05',
        '2023-12-27 10:31:05'),
       (16, 'uFwUPlOxbucBdKZy2sb3gkM2XcUjUrorH6yfAjPU.png', 'default_image', '1600', '1200', NULL, NULL, '384.39', NULL,
        '2023-12-27 10:34:47', '2023-12-27 10:34:47'),
       (20, 'nSrpMo379KHT3K6QwBjzveLyTina5uRK1mfEjouE.png', 'resize_image', '1600', '1200', '750', '650', '384.39',
        '189.38', '2023-12-27 10:38:29', '2023-12-27 10:38:29'),
       (22, 'user1-128x128.jpg', 'resize_image', '128', '128', '120', '120', '2.69', '3.23', '2023-12-27 12:08:32',
        '2023-12-27 12:08:32'),
       (23, 'user1-128x128.jpg', 'resize_image', '128', '128', '100', '100', '2.69', '2.79', '2023-12-27 12:09:31',
        '2023-12-27 12:09:31'),
       (24, '1.jpg', 'resize_image', '128', '128', '500', '500', '3.51', '34.43', '2023-12-27 12:10:34',
        '2023-12-27 12:10:34'),
       (25, 'b9B8LHszibJIRSJB90vwwu0yjrhRhHvsyGnzim55.jpg', 'default_image', '128', '128', NULL, NULL, '3.51', NULL,
        '2023-12-27 12:11:11', '2023-12-27 12:11:11'),
       (26, 'snehal.webp', 'resize_image', '189', '189', '1', '1', '2.07', '0.06', '2023-12-27 12:32:06',
        '2023-12-27 12:32:06'),
       (27, 'snehal.webp', 'resize_image', '189', '189', '501', '501', '2.07', '7.16', '2023-12-27 12:32:38',
        '2023-12-27 12:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations`
(
    `id`        int(10) UNSIGNED NOT NULL,
    `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch`     int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (1, '2014_10_12_000000_create_users_table', 1),
       (2, '2014_10_12_100000_create_password_resets_table', 1),
       (3, '2019_08_19_000000_create_failed_jobs_table', 1),
       (4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
       (5, '2023_07_10_063758_create_permission_tables', 1),
       (6, '2023_07_10_064849_create_products_table', 2),
       (7, '2023_08_10_061206_create_campaign_ideas_table', 3),
       (8, '2023_08_12_080854_create_questions_bank_table', 4),
       (9, '2023_08_12_092627_create_campaign_answers_table', 4),
       (10, '2023_09_16_095117_create_resumes_table', 5),
       (11, '2023_09_16_101734_create_work_experiences_table', 6),
       (12, '2023_09_16_101800_create_education_table', 7),
       (13, '2023_09_16_101912_create_projects_table', 8),
       (14, '2023_09_23_064124_create_courses_table', 9),
       (16, '2023_10_30_054200_create_payments_table', 10),
       (17, '2023_10_31_105030_create_payment_histories_table', 11),
       (18, '2023_11_01_104119_create_payment_refunds_table', 12),
       (19, '2023_12_12_065029_create_user_chats_table', 13),
       (20, '2023_12_27_113148_create_image_resizes_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions`
(
    `permission_id` bigint(20) UNSIGNED NOT NULL,
    `model_type`    varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id`      bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles`
(
    `role_id`    bigint(20) UNSIGNED NOT NULL,
    `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id`   bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES (1, 'App\\Models\\User', 19),
       (1, 'App\\Models\\User', 29),
       (2, 'App\\Models\\User', 6),
       (2, 'App\\Models\\User', 11),
       (2, 'App\\Models\\User', 12),
       (2, 'App\\Models\\User', 13),
       (2, 'App\\Models\\User', 14),
       (2, 'App\\Models\\User', 15),
       (2, 'App\\Models\\User', 20),
       (2, 'App\\Models\\User', 23),
       (2, 'App\\Models\\User', 27),
       (3, 'App\\Models\\User', 5),
       (4, 'App\\Models\\User', 24),
       (5, 'App\\Models\\User', 25),
       (9, 'App\\Models\\User', 26);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets`
(
    `email`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`)
VALUES ('dushyant@gmail.com', '$2y$10$uiOeV0sWcxcQJ/mh/kwCNO6rvx10Q6K.TbDbK5Mr6QLK.4ygolkSm', '2023-11-01 04:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments`
(
    `id`             bigint(20) UNSIGNED NOT NULL,
    `user_id`        bigint(20) UNSIGNED NOT NULL,
    `amount`         double                                  NOT NULL,
    `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`         varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `payment_date`   varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at`     timestamp NULL DEFAULT NULL,
    `updated_at`     timestamp NULL DEFAULT NULL,
    `deleted_at`     timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount`, `transaction_id`, `payment_status`, `status`, `payment_date`,
                        `created_at`, `updated_at`, `deleted_at`)
VALUES (7, 15, 150, 'pay_MvUwgs4qHHjAzy', 'captured', 'refunded', '1698904672', '2023-10-31 05:50:47',
        '2023-12-27 12:22:19', NULL),
       (10, 15, 1520, 'pay_MvUcWbmv2rGn5G', 'captured', 'refunded', '1698903526', '2023-10-31 23:07:27',
        '2023-12-27 12:22:37', NULL),
       (12, 14, 15, 'pay_NGvairUe0m1uYk', 'captured', 'paid', '1703583650', '2023-10-31 23:42:49',
        '2023-12-26 09:41:00', NULL),
       (14, 5, 150, 'pay_Mv6IzESSiTnlhX', 'captured', 'refunded', '1698817898', '2023-11-01 00:21:15',
        '2023-11-02 00:04:49', NULL),
       (15, 6, 142, 'pay_Mv7IIQkSSppbhm', 'captured', 'refunded', '1698821380', '2023-11-01 01:18:58',
        '2023-11-02 00:56:17', NULL),
       (16, 5, 1000, 'pay_MvA8fu9BmZb8n9', 'captured', 'refunded', '1698831399', '2023-11-01 04:05:50',
        '2023-12-26 09:24:43', NULL),
       (20, 5, 6000, 'pay_NHMrVu10eF2eN4', 'captured', 'paid', '1703679687', '2023-12-26 09:25:46',
        '2023-12-27 12:21:39', NULL),
       (21, 5, 18522, NULL, NULL, 'pending', NULL, '2024-01-01 10:11:59', '2024-01-01 10:11:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_histories`
--

CREATE TABLE `payment_histories`
(
    `id`                bigint(20) UNSIGNED NOT NULL,
    `user_id`           bigint(20) UNSIGNED NOT NULL,
    `payment_id`        bigint(20) UNSIGNED NOT NULL,
    `amount`            double NOT NULL,
    `transaction_id`    varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `entity`            varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `currency`          varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`            varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `order_id`          varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `invoice_id`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `international`     varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `method`            varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `amount_refunded`   varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `refund_status`     varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `captured`          varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `description`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `card_id`           varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `bank`              varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `wallet`            varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `vpa`               varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email`             varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `contact`           varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `notes`             text COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    `fee`               varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tax`               varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `error_code`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `error_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `error_source`      varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `error_step`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `error_reason`      varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `payment_date`      varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at`        timestamp NULL DEFAULT NULL,
    `updated_at`        timestamp NULL DEFAULT NULL,
    `deleted_at`        timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_histories`
--

INSERT INTO `payment_histories` (`id`, `user_id`, `payment_id`, `amount`, `transaction_id`, `entity`, `currency`,
                                 `status`, `order_id`, `invoice_id`, `international`, `method`, `amount_refunded`,
                                 `refund_status`, `captured`, `description`, `card_id`, `bank`, `wallet`, `vpa`,
                                 `email`, `contact`, `notes`, `fee`, `tax`, `error_code`, `error_description`,
                                 `error_source`, `error_step`, `error_reason`, `payment_date`, `created_at`,
                                 `updated_at`, `deleted_at`)
VALUES (5, 15, 10, 1520, 'pay_Mv5A9kHM0Gcbjp', 'payment', 'INR', 'captured', NULL, NULL, '0', 'paylater', '0', NULL,
        '1', 'Rozerpay', NULL, NULL, 'kkbk', NULL, 'hello33@gmail.com', '+919452639555', '[]', '3588', '548', NULL,
        NULL, NULL, NULL, NULL, '1698813875', '2023-10-31 23:14:47', '2023-10-31 23:14:47', NULL),
       (7, 14, 12, 15, 'pay_Mv5eD9hoReJIPR', 'payment', 'INR', 'captured', NULL, NULL, '0', 'netbanking', '0', NULL,
        '1', 'Rozerpay', NULL, 'KKBK', NULL, NULL, 'dfgfd@gmail.com', '+919452639555', '[]', '36', '6', NULL, NULL,
        NULL, NULL, NULL, '1698815582', '2023-10-31 23:43:13', '2023-10-31 23:43:13', NULL),
       (9, 5, 14, 150, 'pay_Mv6IzESSiTnlhX', 'payment', 'INR', 'captured', NULL, NULL, '0', 'paylater', '0', NULL, '1',
        'Rozerpay', NULL, NULL, 'kkbk', NULL, 'dushyant@gmail.com', '+919452639555', '[]', '354', '54', NULL, NULL,
        NULL, NULL, NULL, '1698817898', '2023-11-01 00:21:50', '2023-11-01 00:21:50', NULL),
       (10, 6, 15, 142, 'pay_Mv7IIQkSSppbhm', 'payment', 'INR', 'captured', NULL, NULL, '0', 'wallet', '0', NULL, '1',
        'Rozerpay', NULL, NULL, 'mobikwik', NULL, 'rajesh@gmail.com', '+919865323212', '[]', '336', '52', NULL, NULL,
        NULL, NULL, NULL, '1698821380', '2023-11-01 01:19:56', '2023-11-01 01:19:56', NULL),
       (11, 6, 16, 1000, 'pay_MvA8fu9BmZb8n9', 'payment', 'INR', 'captured', NULL, NULL, '0', 'wallet', '0', NULL, '1',
        'Rozerpay', NULL, NULL, 'freecharge', NULL, 'rajesh@gmail.com', '+919409552885', '[]', '2360', '360', NULL,
        NULL, NULL, NULL, NULL, '1698831399', '2023-11-01 04:06:51', '2023-11-01 04:06:51', NULL),
       (12, 15, 10, 1520, 'pay_MvBs3ymCT7OO9s', 'payment', 'INR', 'captured', NULL, NULL, '0', 'wallet', '0', NULL, '1',
        'Rozerpay', NULL, NULL, 'airtelmoney', NULL, 'hello33@gmail.com', '+919412563955', '[]', '3588', '548', NULL,
        NULL, NULL, NULL, NULL, '1698837498', '2023-11-01 05:48:29', '2023-11-01 05:48:29', NULL),
       (17, 15, 10, 1520, 'pay_MvUcWbmv2rGn5G', 'payment', 'INR', 'captured', NULL, NULL, '0', 'wallet', '0', NULL, '1',
        'Rozerpay', NULL, NULL, 'jiomoney', NULL, 'hello33@gmail.com', '+919410259922', '[]', '3588', '548', NULL, NULL,
        NULL, NULL, NULL, '1698903526', '2023-11-02 00:08:56', '2023-11-02 00:08:56', NULL),
       (21, 15, 7, 150, 'pay_MvUwgs4qHHjAzy', 'payment', 'INR', 'captured', NULL, NULL, '0', 'wallet', '0', NULL, '1',
        'Rozerpay', NULL, NULL, 'mobikwik', NULL, 'hello33@gmail.com', '+919410259922', '[]', '354', '54', NULL, NULL,
        NULL, NULL, NULL, '1698904672', '2023-11-02 00:28:07', '2023-11-02 00:28:07', NULL),
       (23, 14, 12, 15, 'pay_NGvairUe0m1uYk', 'payment', 'INR', 'captured', NULL, NULL, '0', 'paylater', '0', NULL, '1',
        'Rozerpay', NULL, NULL, 'amazonpay', NULL, 'dfgfd@gmail.com', '+919409552901', '[]', '36', '6', NULL, NULL,
        NULL, NULL, NULL, '1703583650', '2023-12-26 09:41:00', '2023-12-26 09:41:00', NULL),
       (24, 5, 20, 6000, 'pay_NHMrVu10eF2eN4', 'payment', 'INR', 'captured', NULL, NULL, '0', 'paylater', '0', NULL,
        '1', 'Rozerpay', NULL, NULL, 'kkbk', NULL, 'dushyant@gmail.com', '+919562232322', '[]', '14160', '2160', NULL,
        NULL, NULL, NULL, NULL, '1703679687', '2023-12-27 12:21:39', '2023-12-27 12:21:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_refunds`
--

CREATE TABLE `payment_refunds`
(
    `id`              bigint(20) UNSIGNED NOT NULL,
    `refund_id`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `user_id`         bigint(20) UNSIGNED NOT NULL,
    `payment_id`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `amount`          double                                  NOT NULL,
    `entity`          varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `currency`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `notes`           text COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    `receipt`         varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `batch_id`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`          varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `speed_processed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `speed_requested` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `payment_date`    varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at`      timestamp NULL DEFAULT NULL,
    `updated_at`      timestamp NULL DEFAULT NULL,
    `deleted_at`      timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_refunds`
--

INSERT INTO `payment_refunds` (`id`, `refund_id`, `user_id`, `payment_id`, `amount`, `entity`, `currency`, `notes`,
                               `receipt`, `batch_id`, `status`, `speed_processed`, `speed_requested`, `payment_date`,
                               `created_at`, `updated_at`, `deleted_at`)
VALUES (8, 'rfnd_MvUDGdWCvLRNd8', 15, 'pay_MvBs3ymCT7OO9s', 1520, 'refund', 'INR', NULL, NULL, '', 'processed',
        'normal', 'normal', '1698902092', '2023-11-01 23:44:52', '2023-11-01 23:44:52', NULL),
       (9, 'rfnd_MvUFDjSVBYeVsW', 14, 'pay_Mv5eD9hoReJIPR', 15, 'refund', 'INR', NULL, NULL, '', 'processed', 'normal',
        'normal', '1698902203', '2023-11-01 23:46:43', '2023-11-01 23:46:43', NULL),
       (10, 'rfnd_MvUYKupcvXMg6p', 5, 'pay_Mv6IzESSiTnlhX', 150, 'refund', 'INR', NULL, NULL, '', 'processed', 'normal',
        'normal', '1698903288', '2023-11-02 00:04:49', '2023-11-02 00:04:49', NULL),
       (12, 'rfnd_MvVKMRo8Zj7pt1', 6, 'pay_MvUt7V7403J6Vs', 150, 'refund', 'INR', NULL, NULL, '', 'processed', 'normal',
        'normal', '1698906016', '2023-11-02 00:50:16', '2023-11-02 00:50:16', NULL),
       (13, 'rfnd_MvVQhhnP3GU1nw', 6, 'pay_Mv7IIQkSSppbhm', 142, 'refund', 'INR', NULL, NULL, '', 'processed', 'normal',
        'normal', '1698906376', '2023-11-02 00:56:17', '2023-11-02 00:56:17', NULL),
       (14, 'rfnd_NHMsPtQQmDr6gG', 15, 'pay_MvUwgs4qHHjAzy', 150, 'refund', 'INR', NULL, NULL, '', 'processed',
        'normal', 'normal', '1703679738', '2023-12-27 12:22:19', '2023-12-27 12:22:19', NULL),
       (15, 'rfnd_NHMsjUADHDLcTm', 15, 'pay_MvUcWbmv2rGn5G', 1520, 'refund', 'INR', NULL, NULL, '', 'processed',
        'normal', 'normal', '1703679756', '2023-12-27 12:22:37', '2023-12-27 12:22:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions`
(
    `id`         bigint(20) UNSIGNED NOT NULL,
    `name`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES (1, 'role-list', 'web', '2023-07-10 01:41:45', '2023-07-10 01:41:45'),
       (2, 'role-create', 'web', '2023-07-10 01:41:45', '2023-07-10 01:41:45'),
       (3, 'role-edit', 'web', '2023-07-10 01:41:45', '2023-07-10 01:41:45'),
       (4, 'role-delete', 'web', '2023-07-10 01:41:45', '2023-07-10 01:41:45'),
       (5, 'product-list', 'web', '2023-07-10 01:41:45', '2023-07-10 01:41:45'),
       (6, 'product-create', 'web', '2023-07-10 01:41:45', '2023-07-10 01:41:45'),
       (7, 'product-edit', 'web', '2023-07-10 01:41:45', '2023-07-10 01:41:45'),
       (8, 'product-delete', 'web', '2023-07-10 01:41:45', '2023-07-10 01:41:45'),
       (9, 'permission-edit', 'web', '2023-07-12 01:38:02', '2023-07-12 02:06:39'),
       (10, 'permission-delete', 'web', '2023-07-12 01:47:21', '2023-07-12 01:47:21'),
       (12, 'user-block', 'web', '2023-07-14 00:16:01', '2023-07-14 00:16:01'),
       (15, 'Hello', 'web', '2023-09-29 05:06:12', '2023-09-29 05:06:21'),
       (19, 'ttt', 'web', '2024-02-09 09:12:27', '2024-02-09 09:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens`
(
    `id`             bigint(20) UNSIGNED NOT NULL,
    `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `tokenable_id`   bigint(20) UNSIGNED NOT NULL,
    `name`           varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`          varchar(64) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `abilities`      text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `last_used_at`   timestamp NULL DEFAULT NULL,
    `created_at`     timestamp NULL DEFAULT NULL,
    `updated_at`     timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products`
(
    `id`         bigint(20) UNSIGNED NOT NULL,
    `name`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `detail`     text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `sequence`   int(11) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `sequence`, `created_at`, `updated_at`)
VALUES (2, 'Test-Demo', 'Hello11', 1, '2023-07-12 00:44:36', '2024-01-10 07:52:33'),
       (4, 'Chhatraliya', 'ertr', 2, '2023-09-15 22:40:23', '2024-01-10 07:52:33'),
       (7, 'fghf', 'gd', NULL, '2024-01-10 09:58:19', '2024-02-09 09:11:34'),
       (8, 'sdfgfd', 'fdgdf', NULL, '2024-02-09 09:10:32', '2024-02-09 09:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `professional_skills`
--

CREATE TABLE `professional_skills`
(
    `id`                  bigint(20) UNSIGNED NOT NULL,
    `resume_id`           bigint(20) UNSIGNED NOT NULL,
    `professional_skills` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `professional_per`    int(11) NOT NULL,
    `color`               varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `status`              varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`          timestamp NULL DEFAULT NULL,
    `updated_at`          timestamp NULL DEFAULT NULL,
    `deleted_at`          timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professional_skills`
--

INSERT INTO `professional_skills` (`id`, `resume_id`, `professional_skills`, `professional_per`, `color`, `status`,
                                   `created_at`, `updated_at`, `deleted_at`)
VALUES (1, 3, 'CSS', 80, 'bg-primary', 'active', '2023-09-17 01:21:44', '2023-09-27 04:08:25', NULL),
       (2, 2, '3', 78, '', 'De-Active', '2023-09-17 01:21:53', '2023-09-17 01:35:29', '2023-09-17 01:35:29'),
       (3, 3, 'Laravel', 79, 'bg-danger', 'active', '2023-09-17 06:03:53', '2023-09-29 23:30:44', NULL),
       (4, 3, 'Boostrap', 100, 'bg-info', 'active', '2023-09-17 06:10:02', '2023-10-17 07:10:51', NULL),
       (5, 3, 'JQuery', 12, 'bg-warning', 'active', '2023-09-17 06:54:47', '2023-09-23 23:29:26', NULL),
       (6, 7, 'JQuery', 98, '', 'De-Active', '2023-09-17 06:55:53', '2023-10-17 07:10:58', NULL),
       (7, 4, 'HTML', 89, 'bg-dark', 'active', '2023-09-17 07:17:25', '2023-09-23 23:29:52', NULL),
       (8, 2, 'CSS', 67, '', 'active', '2023-09-17 07:27:24', '2023-09-17 07:27:24', NULL),
       (9, 2, 'JQuery', 67, '', 'active', '2023-09-17 07:27:30', '2023-09-23 10:02:06', '2023-09-23 10:02:06'),
       (10, 2, 'CSS', 67, '', 'active', '2023-09-17 07:27:35', '2023-09-27 00:43:37', NULL),
       (11, 2, 'Python', 56, '', 'De-Active', '2023-09-17 07:29:38', '2023-09-27 04:04:31', NULL),
       (12, 2, 'Android', 56, '', 'active', '2023-09-17 07:33:54', '2023-09-27 00:44:20', NULL),
       (13, 2, 'Django', 89, '', 'active', '2023-09-17 07:36:19', '2023-09-25 00:48:22', NULL),
       (14, 2, 'Codeigniter', 67, '', 'De-Active', '2023-09-17 07:40:25', '2023-09-27 00:46:10', NULL),
       (15, 2, 'MySql', 89, '', 'active', '2023-09-17 07:40:57', '2023-09-17 20:57:42', NULL),
       (16, 3, 'HTML', 78, 'bg-dark', 'De-Active', '2023-09-23 21:32:15', '2023-09-27 00:39:23', NULL),
       (17, 3, 'Boostrap', 89, 'bg-info', 'De-Active', '2023-09-23 23:24:21', '2023-09-30 05:56:48', NULL),
       (18, 4, 'HTML', 79, 'bg-primary', 'active', '2023-09-24 06:15:24', '2023-09-24 06:15:24', NULL),
       (19, 3, 'CSS', 65, 'bg-success', 'De-Active', '2023-09-24 23:23:12', '2023-09-30 05:54:52', NULL),
       (20, 3, 'Python', 50, 'bg-dark', 'active', '2023-09-24 23:30:30', '2023-09-27 00:46:13', NULL),
       (21, 7, 'Boostrap', 79, 'bg-success', 'active', '2023-09-27 04:09:29', '2023-10-28 00:00:56',
        '2023-10-28 00:00:56'),
       (22, 9, 'C++', 98, 'bg-success', 'active', '2023-09-29 23:27:20', '2023-09-29 23:27:20', NULL),
       (23, 4, 'HTML', 53, 'bg-success', 'active', '2023-10-16 07:15:35', '2023-10-16 07:15:35', NULL),
       (24, 6, 'Boostrap', 98, 'bg-info', 'active', '2023-12-11 04:15:13', '2023-12-11 04:15:13', NULL),
       (25, 9, 'C++', 100, 'bg-warning', 'active', '2023-12-11 04:16:13', '2023-12-11 04:16:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects`
(
    `id`           bigint(20) UNSIGNED NOT NULL,
    `resume_id`    bigint(20) UNSIGNED NOT NULL,
    `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `technology`   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `city_name`    varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `start_date`   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `end_date`     varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `check`        int(11) NOT NULL DEFAULT 0,
    `status`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`   timestamp NULL DEFAULT NULL,
    `updated_at`   timestamp NULL DEFAULT NULL,
    `deleted_at`   timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `resume_id`, `project_name`, `company_name`, `technology`, `city_name`, `start_date`,
                        `end_date`, `description`, `check`, `status`, `created_at`, `updated_at`, `deleted_at`)
VALUES (1, 3, 'sdf', 'Webilok', 'Java', 'Deesa', '2023-05', '2024-01',
        'Leverage agile frameworks to provide a robust synopsis for high level overviews.\r\n                                Iterative approaches to corporate strategy foster collaborative thinking to further the\r\n                                overall value proposition.',
        0, 'active', '2023-09-18 06:11:32', '2024-01-10 10:35:14', NULL),
       (2, 2, 'sdf', 'Webilok', 'Java', 'Deesa', '2023-05', 'Present', NULL, 1, 'active', '2023-09-18 06:12:03',
        '2023-09-18 06:17:38', '2023-09-18 06:17:38'),
       (3, 2, 'Test', 'Webilok123', 'Java', 'Deesa123', '2023-05', 'Present', NULL, 1, 'active', '2023-09-18 06:13:16',
        '2023-09-23 10:01:24', '2023-09-23 10:01:24'),
       (4, 4, 'dfgdfg', 'dfgdfgfd', 'Php', 'Deesa', '2023-01', '2023-08', NULL, 0, 'active', '2023-10-03 05:56:51',
        '2023-10-03 05:56:51', NULL),
       (5, 4, 'sfs', 'sdfsdf', 'Kotlin', 'sdfds', '2024-01', 'Present', NULL, 1, 'active', '2024-02-09 09:00:45',
        '2024-02-09 09:00:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions`
(
    `id`          bigint(20) UNSIGNED NOT NULL,
    `lable_name`  varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `question`    varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `type`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `input_type`  varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `input_value` text COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    `status`      int(11) NOT NULL,
    `created_at`  timestamp NULL DEFAULT NULL,
    `updated_at`  timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `lable_name`, `question`, `type`, `input_type`, `input_value`, `status`, `created_at`,
                         `updated_at`)
VALUES (1, 'Innovation', 'The level of novelty and ingenuity in the proposed solution.', 'criteria_description', 'text',
        NULL, 1, '2023-08-12 09:49:37', '2023-08-12 09:49:37'),
       (2, 'Feasibility',
        'Is the solution feasible, taking into consideration technical, economic, and social factors ?',
        'criteria_description', 'text', NULL, 1, NULL, NULL),
       (3, 'Impact', 'The potential for the solution to generate positive environmental, social, and economic impact.',
        'criteria_description', 'text', NULL, 1, '2023-08-12 09:50:55', '2023-08-12 09:50:55'),
       (4, 'Sustainability',
        'The degree to which the solution aligns with sustainable principles and contributes to a circular economy.',
        'criteria_description', 'text', NULL, 1, '2023-08-12 09:50:55', '2023-08-12 09:50:55'),
       (5, 'Scalability',
        'The potential for the solution to be implemented on a large scale and have a significant impact on the clean technology industry',
        'criteria_description', 'text', NULL, 1, '2023-08-12 09:51:49', '2023-08-12 09:51:49'),
       (6, 'Disruption',
        'The extent to which the proposed solution challenges the status quo and accelerates the clean technology transformation through a disruptive approach',
        'criteria_description', 'text', NULL, 1, '2023-08-12 09:52:10', '2023-08-12 09:52:10'),
       (7, 'Potential',
        'The potential for the startup to attract investment or funding, based on the strength and experience of its team, business model, technology, growth prospects, and overall fundability',
        'criteria_description', 'text', NULL, 1, '2023-08-12 09:52:10', '2023-08-12 09:52:10'),
       (8, 'Ease of implementation', 'How easily can the idea be implemented ?', 'evaluation_criteria', 'text', NULL, 1,
        NULL, NULL),
       (9, 'Time to implement', 'How long will it take for implementation?', 'evaluation_criteria', 'text', NULL, 1,
        NULL, NULL),
       (10, 'Desirability & Usability',
        'How likely is the internal customer (of this idea) to use and implement the solution?', 'evaluation_criteria',
        'text', NULL, 1, '2023-08-12 11:02:25', '2023-08-12 11:02:25'),
       (11, 'Practicality', 'Is the idea practical in terms of development?', 'evaluation_criteria', 'text', NULL, 1,
        '2023-08-12 11:02:44', '2023-08-12 11:02:44'),
       (12, 'Disruption',
        'The extent to which the proposed solution challenges the status quo and accelerates the clean technology transformation through a disruptive approach',
        'evaluation_criteria', 'text', NULL, 1, '2023-08-12 11:03:26', '2023-08-12 11:03:26'),
       (13, 'Sustainability',
        'The degree to which the solution aligns with sustainable principles and contributes to a circular economy.',
        'evaluation_criteria', 'text', NULL, 1, '2023-08-12 11:04:27', '2023-08-12 11:04:27'),
       (14, 'IP Potential', 'Can the idea be protected?', 'evaluation_criteria', 'text', NULL, 1, '2023-08-12 11:04:27',
        '2023-08-12 11:04:27'),
       (15, 'Title', 'Title', 'idea_details', 'text', NULL, 1, '2023-08-24 11:31:44', '2023-08-24 11:31:44'),
       (16, 'Description', 'Description', 'idea_details', 'text', NULL, 1, '2023-08-24 11:31:44',
        '2023-08-24 11:31:44'),
       (17, 'Problem Statement', 'Problem Statement', 'idea_details', 'text', NULL, 1, '2023-08-24 11:34:04',
        '2023-08-24 11:34:04'),
       (18, 'Proposed Solution', 'Proposed Solution', 'idea_details', 'text', NULL, 1, '2023-08-24 11:34:38',
        '2023-08-24 11:34:38'),
       (19, 'Category', 'Category', 'idea_details', 'radio', NULL, 1, '2023-08-24 11:35:12', '2023-08-24 11:35:12'),
       (20, 'Stage of Idea', 'Stage of Idea', 'idea_details', 'radio', NULL, 1, '2023-08-24 11:35:12',
        '2023-08-24 11:35:12'),
       (21, 'Type of Idea', 'Type of Idea', 'idea_details', 'radio', NULL, 1, '2023-08-24 11:36:00',
        '2023-08-17 11:36:00'),
       (22, 'Sector/Technology /Focus Area', 'Sector/Technology /Focus Area', 'idea_details', 'checkbox', NULL, 1,
        '2023-08-24 11:42:23', '2023-08-24 11:42:23'),
       (23, 'Idea Objective: Please Specify', 'Idea Objective: Please Specify', 'idea_details', 'radio', NULL, 1,
        '2023-08-24 11:42:23', '2023-08-24 11:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `questions_settings`
--

CREATE TABLE `questions_settings`
(
    `id`            int(11) NOT NULL,
    `user_id`       int(11) NOT NULL,
    `sort_order`    text NOT NULL,
    `sort_no`       text NOT NULL,
    `page`          text NOT NULL,
    `search_word`   text NOT NULL,
    `search_option` text NOT NULL,
    `created_at`    timestamp NULL DEFAULT current_timestamp (),
    `updated_at`    datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes`
(
    `id`          bigint(20) UNSIGNED NOT NULL,
    `name`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `about_me`    text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `dob`         date                                    NOT NULL,
    `age`         varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `address`     varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sequence`    int(11) DEFAULT NULL,
    `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`  timestamp NULL DEFAULT NULL,
    `updated_at`  timestamp NULL DEFAULT NULL,
    `deleted_at`  timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `name`, `destination`, `about_me`, `dob`, `age`, `email`, `phone`, `address`, `sequence`,
                       `profile_pic`, `created_at`, `updated_at`, `deleted_at`)
VALUES (1, 'Dushyant Chhatraliya', '787', 'Hello123', '2023-09-05', '0', 'fgh78hf@gmail.com', '74857488', 'lorwada',
        NULL, 'CngEaksVHEPn5fti7vyyS6F699O3cV3WIPZeQWAZ.png', '2023-09-16 22:17:26', '2023-09-17 00:08:06',
        '2023-09-17 00:08:06'),
       (2, 'Dushyant Chhatraliya98', 'Laravel-Developer', 'fghhfg8989', '2023-09-08', '0', 'fghhgf2@gmail.com',
        '748574889056767756765', 'lorwada898', NULL, 'nvPyZSiq42rrecrm4llFlb64CJugXrN6xD7NgIv9.png',
        '2023-09-16 22:18:02', '2023-09-23 09:54:00', '2023-09-23 09:54:00'),
       (3, 'Dushyant Chhatraliya', 'Laravel-Developer',
        'Hello! I’m dushyant. I am passionate about UI/UX design and Web Design. I am a skilled Front-end Developer and master of Graphic Design tools such as Photoshop and Sketch.',
        '1998-08-11', '26', 'dushyant@gmail.com', '7485748890', '140, City Center, New York, U.S.A', 1,
        'iKXinpmuANOstEHM59fbxJLef0v0wUKwxJ9Pm60z.jpg', '2023-09-16 22:20:07', '2024-04-11 05:29:43', NULL),
       (4, 'Dushyant Chhatraliya', 'Laravel-Developer', 'fghhfg', '2021-09-08', '2', 'fghh2@gmail.com', '7485748890',
        'lorwada', 4, 'dPmNatkD6NCxqrfeD23JooscF3mE08yKEc8tEpPJ.jpg', '2023-09-16 22:20:27', '2024-01-27 07:15:54',
        NULL),
       (5, 'Dushyant Chhatraliya', 'fghghf', 'fghhfg', '2023-09-08', '0', 'f@gmail.com', '7485748890', 'lorwada', NULL,
        'miPK7oMvJDsl5qulyJAt9cP6B45dmj2xjTNsmSfw.png', '2023-09-16 22:22:43', '2023-09-17 00:14:52',
        '2023-09-17 00:14:52'),
       (6, 'Dushyant Chhatraliya', 'Web-Developer', 'fghhfg', '2023-09-08', '1', 'fw@gmail.com', '7485748890',
        'lorwada', 3, 'WmDNhlhbHxalmTpIYEGH1cbzV4nr2imGXKn3avfa.png', '2023-09-16 22:24:29', '2024-01-27 07:15:54',
        NULL),
       (7, 'dushyant', 'BackEnd-Developer', 'vbnb', '2023-09-15', '0', 'dushyantchhatraliysa@gmail.com', '7485748890',
        'at post lorwada', 5, 'Dnvq6FzTBX1O8FKA0o87aAHntTrx4Tqvsr3KzYzx.jpg', '2023-09-16 22:28:43',
        '2023-10-04 06:00:04', '2023-10-04 06:00:04'),
       (8, 'ghj', 'App-Developer', 'ghj', '2023-09-13', '0', 'du@gmail.com', '7485748890', 'at post lorwada', NULL,
        'qSlCt74OA5Xp2TlDHllErcAnLuwqf7XGPlcJxLHa.png', '2023-09-16 22:30:54', '2023-09-25 00:02:38',
        '2023-09-25 00:02:38'),
       (9, 'dushyant', 'Web-Developer', 'fdgfd', '2022-12-31', '1', 'admin@gmail.com', '7485748890', 'lorwada', 2,
        '1nH3mcBLK7iUrU3lN0ejAmkEtN24hprZLdiOTTEA.jpg', '2023-09-16 22:52:47', '2024-01-27 07:15:54', NULL),
       (10, 'Dushyant Chhatraliya', 'fdgfd', 'dfg', '2023-09-14', '0', 'dushyantchhatraliyua@gmail.com', '7485748890',
        'lorwada', NULL, '3CbeNYvKaL3ob39VdiUzkSYfQgI6uU8Wt0ZWp6QB.jpg', '2023-09-17 00:05:55', '2023-09-27 04:16:56',
        '2023-09-27 04:16:56'),
       (11, 'Dushyant Chhatraliya', 'fdgfd', 'dfg', '2023-09-14', '0', 'dushyantchhatralolkiya@gmail.com', '7485748890',
        'lorwada', NULL, 'tvUdJal1Rw6ftSMehaMdU4LKKkwfBDSBIW3oVFLF.jpg', '2023-09-17 00:07:07', '2023-09-24 07:39:34',
        '2023-09-24 07:39:34'),
       (12, 'Dushyant Chhatraliya', 'fdgfdg', 'fdgfdgfdgfd', '2023-09-12', '0', 'dushyantchhdfgatraliya@gmail.com',
        '7485748890', 'lorwada', NULL, 'Rr5tKK3xA3030aZ8QMju1KEIMSjNStnwXIkE8QgQ.jpg', '2023-09-17 00:07:50',
        '2023-09-24 07:40:17', '2023-09-24 07:40:17'),
       (13, 'dushyant', 'ghjhg', 'hgjh', '2023-09-12', '0', 'dushyantchhatraliya@gmail.comszds', '7485748890',
        'at post lorwada', NULL, '4wSbEHiTLUEkv0gsp6M8TObmwnRSup2z6Id9W4XS.jpg', '2023-09-17 00:27:56',
        '2023-09-24 07:39:44', '2023-09-24 07:39:44'),
       (14, 'Dushyant Chhatraliya', 'Laravel-Developer', 'Hhhhh', '2022-12-31', '1', 'dushyantchhatraliya@gmail.com',
        '9409552901', 'Lorwada,bhildi highway road,385530,ta:deesa,dist:bk', NULL,
        'QZ8qQTHvrHRylfun3zkSBqVelFzEUiBgOdKzFMRy.jpg', '2023-09-28 01:19:01', '2023-09-28 01:19:34',
        '2023-09-28 01:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles`
(
    `id`         bigint(20) UNSIGNED NOT NULL,
    `name`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES (1, 'Admin', 'web', '2023-07-10 01:43:16', '2023-07-10 01:43:16'),
       (2, 'User', 'web', '2023-07-10 01:48:02', '2023-07-10 01:48:02'),
       (3, 'Super-Admin', 'web', '2023-07-10 07:06:15', '2023-07-10 07:06:15'),
       (4, 'Customer', 'web', '2023-07-13 02:31:03', '2023-07-13 02:31:03'),
       (5, 'Seller', 'web', '2023-07-13 02:42:06', '2023-07-13 06:18:18'),
       (8, 'Test1223', 'web', '2023-10-05 03:50:01', '2023-10-05 03:51:37'),
       (9, 'Darshan', 'web', '2023-12-07 01:27:21', '2023-12-07 01:27:21'),
       (10, 'fghf', 'web', '2023-12-07 01:27:36', '2023-12-07 01:27:36'),
       (11, 'User1', 'web', '2023-12-07 06:41:06', '2023-12-07 06:41:52'),
       (12, 'rwtre', 'web', '2023-12-07 06:55:24', '2023-12-07 06:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions`
(
    `permission_id` bigint(20) UNSIGNED NOT NULL,
    `role_id`       bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`)
VALUES (1, 1),
       (1, 2),
       (1, 3),
       (1, 4),
       (1, 9),
       (1, 12),
       (2, 1),
       (2, 2),
       (2, 3),
       (2, 4),
       (2, 8),
       (2, 12),
       (3, 1),
       (3, 2),
       (3, 3),
       (3, 9),
       (3, 11),
       (3, 12),
       (4, 1),
       (4, 3),
       (4, 10),
       (5, 1),
       (5, 2),
       (5, 3),
       (5, 5),
       (5, 8),
       (6, 1),
       (6, 2),
       (6, 3),
       (6, 5),
       (7, 1),
       (7, 2),
       (7, 3),
       (7, 5),
       (8, 1),
       (8, 3),
       (8, 5),
       (9, 3),
       (10, 3),
       (12, 1),
       (12, 3),
       (15, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `id`                bigint(20) UNSIGNED NOT NULL,
    `name`              varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `profile_pic`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email`             varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `status`            varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `theme_color`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `background_color`  varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `font_color`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user_status`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `chatting_replay`   datetime                                DEFAULT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password`          varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token`    varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at`        timestamp NULL DEFAULT NULL,
    `updated_at`        timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile_pic`, `email`, `status`, `theme_color`, `background_color`, `font_color`,
                     `user_status`, `chatting_replay`, `email_verified_at`, `password`, `remember_token`, `created_at`,
                     `updated_at`)
VALUES (5, 'Dushyant', 'd1keUCBiZXkZOKATfsLSJd6fuehK4Qepp53aB29N.webp', 'dushyant@gmail.com', 'active', 'light',
        'rgba(231,118,44,0.82)', '#000000', 'online', '2024-01-01 15:47:33', NULL,
        '$2y$10$yGzI8Ybqo9OsXgMfsZa.AOK1no3qjvye0SYO94jBXo26cuqwAZdwG', NULL, '2023-07-10 23:35:12',
        '2024-06-10 09:13:23'),
       (6, 'Rajesh', NULL, 'rajesh@gmail.com', 'Block', NULL, NULL, NULL, NULL, '2023-12-14 17:52:45', NULL,
        '$2y$10$V63VHj67egub4BwSS.TD.uAmAygJA5K0DALC1aqqDDCpsS.3ON86y', NULL, '2023-07-13 02:30:20',
        '2023-12-14 12:22:45'),
       (11, 'dfgfdg', NULL, 'dushyant232@gmail.com', 'active', NULL, NULL, NULL, NULL, '2023-12-15 11:41:31', NULL,
        '$2y$10$Ij0rvPffyAxly21470lDO.i7w/KiL7iVyEVC3tNf0G2aff41DqRm2', NULL, '2023-10-05 02:08:46',
        '2023-12-15 06:11:31'),
       (12, 'dfgdf', NULL, 'dfggf@gmail.com', 'active', NULL, NULL, NULL, NULL, NULL, NULL,
        '$2y$10$ikxZ5by0jzPWNxobaKP7DuvI2YlGRdEWtYJ0k41d97PVjgvZtNXNy', NULL, '2023-10-05 02:12:47',
        '2024-05-30 04:37:47'),
       (13, 'sdfsd', NULL, 'sdfsd@gmail.com', 'active', NULL, NULL, NULL, NULL, NULL, NULL,
        '$2y$10$DPYfV4awoG8Gx.GDmtPyv.2G3ImM.zB7Q.rqo1WpZ/0Mf7sGHvSsO', NULL, '2023-10-05 02:13:56',
        '2024-04-24 04:30:15'),
       (14, 'dfgdfg', NULL, 'dfgfd@gmail.com', 'active', NULL, NULL, NULL, NULL, NULL, NULL,
        '$2y$10$EvOrOrhSmY1XK2KrVwkSCeAKUTxkZr9pi4sUDCRGjIunblPv.XP2m', NULL, '2023-10-05 02:14:42',
        '2023-10-05 02:14:42'),
       (15, 'Hello23', NULL, 'Hello33@gmail.com', 'active', NULL, NULL, NULL, NULL, NULL, NULL,
        '$2y$10$GLwmteawS51yVRWSVqaUEejyY4zIwirB3t3JAVPdLeNYZEbCxdWLu', NULL, '2023-10-05 02:17:29',
        '2023-10-18 00:31:28'),
       (19, 'D', NULL, 'dushyant12@gmail.com', 'active', NULL, NULL, NULL, NULL, '2024-02-02 17:30:11', NULL,
        '$2y$10$uPHmagcrORHIkXdIfkaoG.qh6cGW3BNygzsrDtkqqhALudFxJg3b.', NULL, '2023-11-01 04:11:57',
        '2024-02-02 12:00:11'),
       (20, 'Vishal', 't52OKLXbOdoYDVjk1NWkZlfAQtwvOrslRb5064ci.png', 'vishal@gmail.com', 'active', 'light', '#312525',
        '#000000', 'online', '2024-01-11 15:14:05', NULL,
        '$2y$10$yGzI8Ybqo9OsXgMfsZa.AOK1no3qjvye0SYO94jBXo26cuqwAZdwG', NULL, '2023-11-01 04:17:34',
        '2024-01-11 09:44:05'),
       (23, 'Paresh', 'Qf6S5VmpO0nn9N838WXM6ZPxemDHSiUcxV47FTHr.webp', 'paresh@gmail.com', 'active', NULL, NULL, NULL,
        'offline', '2023-12-22 17:32:53', NULL, '$2y$10$tJr8p.lfF0OD9h3aBNTj6u6CQ8RzSv6.WVL90Y1hLcun1rElVrePS', NULL,
        '2023-12-15 07:45:09', '2023-12-22 12:02:53'),
       (24, 'Praful Rajput', NULL, 'praful@gmail.com', 'active', NULL, NULL, NULL, 'offline', NULL, NULL,
        '$2y$10$MZtKrRLC5KHc6rTbcRf.Seblg6pLfYAU5e63d1lhVu3tVLxKVVeZy', NULL, '2023-12-26 06:31:59',
        '2023-12-26 06:31:59'),
       (25, 'Prakash Parmar', NULL, 'prakash@gmail.com', 'active', 'light', '#e21717', '#000000', 'offline', NULL, NULL,
        '$2y$10$q8vgtJWrQ34xWJ/Qs1ETJuaX0OQJNw0J4MLJ7wrW9QMi01h17tk3K', NULL, '2023-12-26 06:33:52',
        '2023-12-26 09:54:22'),
       (26, 'test', NULL, 'test@gmail.com', 'active', NULL, NULL, NULL, 'offline', NULL, NULL,
        '$2y$10$wQ5pJIM2x0SYSJ7pz/41QuacJ5zYiAjIxGaeAAPLO7Yl1iuw8r6ai', NULL, '2023-12-26 06:49:55',
        '2023-12-26 06:49:55'),
       (27, 'Tejas Vyas', NULL, 'tejas@gmail.com', 'active', NULL, NULL, NULL, 'offline', NULL, NULL,
        '$2y$10$q.OtMAlpLmhFYLg6psIfmexMdrOw5pHF3VYjvwc9y.ZPXyIDCjpmK', NULL, '2024-01-05 10:47:47',
        '2024-01-05 10:47:47'),
       (29, 'gfytry', NULL, 'dushyant23@gmail.com', 'active', NULL, NULL, NULL, 'offline', '2024-01-10 17:06:00', NULL,
        '$2y$10$cokpPq4bhcGbBcs5kkQC.eV4rWqkeR2JDrfBdGc/5NsbrNyplqfhm', NULL, '2024-01-10 11:35:02',
        '2024-01-10 11:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_chats`
--

CREATE TABLE `user_chats`
(
    `id`          bigint(20) UNSIGNED NOT NULL,
    `sender_id`   bigint(20) UNSIGNED NOT NULL,
    `receiver_id` bigint(20) UNSIGNED NOT NULL,
    `message`     text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `document`    text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `time`        time                            DEFAULT NULL,
    `date`        date                            DEFAULT NULL,
    `read_at`     datetime                        DEFAULT NULL,
    `created_at`  timestamp NULL DEFAULT NULL,
    `updated_at`  timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_chats`
--

INSERT INTO `user_chats` (`id`, `sender_id`, `receiver_id`, `message`, `document`, `time`, `date`, `read_at`,
                          `created_at`, `updated_at`)
VALUES (1, 5, 20, 'fgd', NULL, '10:47:00', '2023-12-25', NULL, '2023-12-25 05:17:36', '2023-12-25 05:17:36'),
       (2, 20, 5, 'gh', NULL, '10:47:00', '2023-12-25', NULL, '2023-12-25 05:17:54', '2023-12-25 05:17:54'),
       (3, 20, 5, 'gjgh', NULL, '10:48:00', '2023-12-25', NULL, '2023-12-25 05:18:12', '2023-12-25 05:18:12'),
       (4, 20, 5, 'fff', NULL, '10:50:00', '2023-12-25', NULL, '2023-12-25 05:20:48', '2023-12-25 05:20:48'),
       (5, 20, 5, 'uyyt', NULL, '10:54:00', '2023-12-25', NULL, '2023-12-25 05:24:45', '2023-12-25 05:24:45'),
       (6, 20, 5, 'okl', NULL, '10:55:00', '2023-12-25', NULL, '2023-12-25 05:25:26', '2023-12-25 05:25:26'),
       (7, 5, 20, 'cvv', NULL, '10:55:00', '2023-12-25', NULL, '2023-12-25 05:25:34', '2023-12-25 05:25:34'),
       (8, 20, 5, 'ju', NULL, '10:59:00', '2023-12-25', NULL, '2023-12-25 05:29:50', '2023-12-25 05:29:50'),
       (9, 5, 20, 'gh', NULL, '11:00:00', '2023-12-25', NULL, '2023-12-25 05:30:14', '2023-12-25 05:30:14'),
       (10, 20, 5, 'nbbm', NULL, '11:02:00', '2023-12-25', NULL, '2023-12-25 05:32:26', '2023-12-25 05:32:26'),
       (11, 5, 20, NULL, '[\"4UDte0vsv0SFRTbRlE0oUMFSsr4oyl4GCZGMqryE.jpg\"]', '14:55:00', '2023-12-25', NULL,
        '2023-12-25 09:25:47', '2023-12-25 09:25:47'),
       (12, 20, 5, 'ok', NULL, '14:56:00', '2023-12-25', NULL, '2023-12-25 09:26:15', '2023-12-25 09:26:15'),
       (13, 20, 5, 'popopo', NULL, '15:06:00', '2023-12-25', NULL, '2023-12-25 09:36:56', '2023-12-25 09:36:56'),
       (14, 5, 20, 'ok', NULL, '15:07:00', '2023-12-25', NULL, '2023-12-25 09:37:20', '2023-12-25 09:37:20'),
       (15, 5, 20, NULL,
        '[\"IzV6itXeftJCHKMDUZUaHD9mxl532CAFUSxI9as2.jpg\",\"u2Qne2b59lWCCFIEyxKOYonkWD3iJFNCr51off6h.jpg\",\"oLOHafHoqDJnobVDjEEeUAz3J66gVf0GwdZvm1pj.jpg\",\"Zoy8HFbXU49bUx4FRR5El73O7Iblx9TTtVDUryoA.jpg\",\"5VdBemzj8Pu6ZsTcXlHxJN2ZhLKEWsvqUFRtgRDu.jpg\",\"lkG85X4LgtrYVEVb3fIPo71RGs2SeaEmNBUtHcUB.jpg\",\"yPEQGpklbp2hP4Y317X27avVe7em0ShrP6PUQQ11.jpg\",\"6FXdPaR1HvXBWbuJT3TqYrrDWhyH6LKh6pf4se10.jpg\",\"oEaMxynycO5qfJoQ7s5CuqGVSdSEbejvLOZ4TCIq.jpg\",\"SuP679rR8FdscmkahPhKHs1SZMfo0RZjgru0WQzG.jpg\",\"tSg1gov82109Mgvm5v7CqpidpqsWPPVCPSBigNy7.jpg\",\"WjV5c3IHh2RDQzsDZgPS3Ri8zonCSNAevGVTBExC.jpg\",\"2wDzyaqMfCIZ8tma7xdxllHFOot9ZxQSYWMYfhV7.jpg\",\"tE2p5njUlkktlnm2xhKr7YR6oB2PDpyDSB0fNPzQ.jpg\"]',
        '16:13:00', '2023-12-25', NULL, '2023-12-25 10:43:14', '2023-12-25 10:43:14'),
       (16, 5, 20, 'ok', NULL, '16:13:00', '2023-12-25', NULL, '2023-12-25 10:43:44', '2023-12-25 10:43:44'),
       (17, 20, 5, 'ok', NULL, '16:13:00', '2023-12-25', NULL, '2023-12-25 10:43:57', '2023-12-25 10:43:57'),
       (18, 5, 20, 'dgdg', NULL, '17:01:00', '2023-12-25', NULL, '2023-12-25 11:31:29', '2023-12-25 11:31:29'),
       (19, 20, 5, 'dfg', NULL, '17:01:00', '2023-12-25', NULL, '2023-12-25 11:31:35', '2023-12-25 11:31:35'),
       (20, 5, 20, NULL, '[\"gnCdsdTMkDZxUkZYsNwrZdhSumcDkMy4TlseKaZr.zip\"]', '17:06:00', '2023-12-25', NULL,
        '2023-12-25 11:36:22', '2023-12-25 11:36:22'),
       (21, 5, 20, 'fdgfgfdgfd', NULL, '17:16:00', '2023-12-25', NULL, '2023-12-25 11:46:02', '2023-12-25 11:46:02'),
       (22, 5, 20, 'dfgdf', NULL, '17:16:00', '2023-12-25', NULL, '2023-12-25 11:46:05', '2023-12-25 11:46:05'),
       (23, 5, 20, 'dfgfd', NULL, '17:16:00', '2023-12-25', NULL, '2023-12-25 11:46:07', '2023-12-25 11:46:07'),
       (24, 5, 20, 'dfgfd', NULL, '17:16:00', '2023-12-25', NULL, '2023-12-25 11:46:09', '2023-12-25 11:46:09'),
       (25, 20, 5, 'fdg', NULL, '17:16:00', '2023-12-25', NULL, '2023-12-25 11:46:15', '2023-12-25 11:46:15'),
       (26, 20, 5, NULL,
        '[\"uZ1PvglM1TLn7hCFThCEMp29EhYMiLw3HYi7T1Wt.docx\",\"4d3wYa9r4lKCwEmCjrGYWntr6KtPkUWSAXBAGSya.mp4\",\"dwo1pfIuMDjqK61PVBTRPcDPdsD1jFXKhyzlHMsT.webp\"]',
        '17:17:00', '2023-12-25', NULL, '2023-12-25 11:47:00', '2023-12-25 11:47:00'),
       (27, 20, 5, 'gh', NULL, '17:18:00', '2023-12-25', NULL, '2023-12-25 11:48:46', '2023-12-25 11:48:46'),
       (28, 5, 20, 'fg', NULL, '17:18:00', '2023-12-25', NULL, '2023-12-25 11:48:57', '2023-12-25 11:48:57'),
       (29, 20, 5, 'dszdfsf', NULL, '17:19:00', '2023-12-25', NULL, '2023-12-25 11:49:23', '2023-12-25 11:49:23'),
       (30, 20, 5, 'oko', NULL, '10:42:00', '2023-12-26', NULL, '2023-12-26 05:12:13', '2023-12-26 05:12:13'),
       (31, 5, 20, 'pplpl', NULL, '10:42:00', '2023-12-26', NULL, '2023-12-26 05:12:35', '2023-12-26 05:12:35'),
       (32, 25, 20, 'hello', NULL, '14:46:00', '2023-12-26', NULL, '2023-12-26 09:16:33', '2023-12-26 09:16:33'),
       (33, 25, 20, 'Hello', NULL, '14:46:00', '2023-12-26', NULL, '2023-12-26 09:16:54', '2023-12-26 09:16:54'),
       (34, 5, 19, NULL,
        '[\"gFpdr1OK0L9LWQRWA6CtKqn6AVqczfIg791ukwCD.jpg\",\"EhOXV4yz4Vh1XKhbmoAyYvn80wLWbT9DBBoo3j40.pdf\",\"wUp1ytyBoickWzRGmBS5JCr4CEWDJ4CcfojWkf6o.xlsx\",\"x6qxST8utdZiJgFwSCcfPzsqAu6HOARflsY4WN51.jpg\"]',
        '15:57:00', '2023-12-26', NULL, '2023-12-26 10:27:17', '2023-12-26 10:27:17'),
       (35, 5, 19, 'ok se', NULL, '15:57:00', '2023-12-26', NULL, '2023-12-26 10:27:53', '2023-12-26 10:27:53'),
       (36, 5, 19, 'dd', NULL, '15:58:00', '2023-12-26', NULL, '2023-12-26 10:28:13', '2023-12-26 10:28:13'),
       (37, 5, 19, 'sdsd', NULL, '15:58:00', '2023-12-26', NULL, '2023-12-26 10:28:39', '2023-12-26 10:28:39'),
       (38, 5, 19, 'xc', NULL, '15:58:00', '2023-12-26', NULL, '2023-12-26 10:28:47', '2023-12-26 10:28:47'),
       (39, 5, 19, NULL,
        '[\"ySsmU7CAjcY5dupD7CBLYN6smHXku1IyoK6oIP4N.jpg\",\"0UTXOaAukM1IfBZhiQlknKnJkpqwl4EGSSUdctYe.jpg\",\"TgwXe4kVwe0Z9Zy8UqJb2xvg8lWeQetl7079eInw.jpg\",\"QhA7QmYwUduYaVgGtGhWCasIMFSi0dM2jJX8BgvA.png\"]',
        '16:00:00', '2023-12-26', NULL, '2023-12-26 10:30:42', '2023-12-26 10:30:42'),
       (40, 5, 20, 'sdfds', NULL, '16:21:00', '2023-12-26', NULL, '2023-12-26 10:51:54', '2023-12-26 10:51:54'),
       (41, 20, 5, 'dfgfd', NULL, '16:26:00', '2023-12-26', NULL, '2023-12-26 10:56:12', '2023-12-26 10:56:12'),
       (42, 5, 20, 'kljl', NULL, '16:26:00', '2023-12-26', NULL, '2023-12-26 10:56:37', '2023-12-26 10:56:37'),
       (43, 20, 5, 'done', NULL, '16:27:00', '2023-12-26', NULL, '2023-12-26 10:57:25', '2023-12-26 10:57:25'),
       (44, 5, 20, 'fdsfg', NULL, '17:10:00', '2023-12-26', NULL, '2023-12-26 11:40:52', '2023-12-26 11:40:52'),
       (45, 5, 20, NULL, '[\"I16aelhW1ahO0mL2u90ndQt2KcUkNIjppjXTvvd9.jpg\"]', '17:11:00', '2023-12-26', NULL,
        '2023-12-26 11:41:00', '2023-12-26 11:41:00'),
       (46, 5, 20, 'dfgd', NULL, '17:11:00', '2023-12-26', NULL, '2023-12-26 11:41:50', '2023-12-26 11:41:50'),
       (47, 20, 5, 'ffdsg', NULL, '17:12:00', '2023-12-26', NULL, '2023-12-26 11:42:07', '2023-12-26 11:42:07'),
       (48, 20, 5, 'fghfg', NULL, '17:12:00', '2023-12-26', NULL, '2023-12-26 11:42:15', '2023-12-26 11:42:15'),
       (49, 20, 5, 'ok', NULL, '17:12:00', '2023-12-26', NULL, '2023-12-26 11:42:56', '2023-12-26 11:42:56'),
       (50, 5, 20, 'Hello', NULL, '10:52:00', '2023-12-28', NULL, '2023-12-28 05:22:56', '2023-12-28 05:22:56'),
       (51, 5, 20, 'Good Morning', NULL, '10:53:00', '2023-12-28', NULL, '2023-12-28 05:23:08', '2023-12-28 05:23:08'),
       (52, 20, 5, 'Hello', NULL, '11:12:00', '2023-12-28', NULL, '2023-12-28 05:42:31', '2023-12-28 05:42:31'),
       (53, 20, 5, 'Good Morning', NULL, '11:13:00', '2023-12-28', NULL, '2023-12-28 05:43:14', '2023-12-28 05:43:14'),
       (54, 5, 20, NULL, '[\"JXsp3OHBl44OTMR84Wv1PMCyIMH7ipYRFHSl1IpX.webp\"]', '11:38:00', '2023-12-28', NULL,
        '2023-12-28 06:08:16', '2023-12-28 06:08:16'),
       (55, 5, 19, 'Hello', NULL, '10:23:00', '2023-12-30', NULL, '2023-12-30 04:53:49', '2023-12-30 04:53:49'),
       (56, 5, 19, NULL,
        '[\"iPKuAysodHK28NpaaflQmIEzX3CjdSfmryDdG1Je.jpg\",\"zTshL26Z7hBGw7RP0BwEwp1vrHgzcwUExqtld7Sh.jpg\",\"V82aSfDTN9tfNb2fiYNvxX8lSgCRkK4LOydsFUPD.jpg\",\"dpz3Mu8JvSboaIW1hp0OkV5F4AV9M0au0J75ipG0.jpg\",\"K0kA9uKwfj4sFKm8JAocx0pTQPTBT5cAmw2MYO6a.jpg\",\"QJNxSbZtqwQhopOCgOrTG15eUeh1K9mTybvb2Iqt.jpg\",\"uksbqaL4Uo4CfZ0dKCo4Hf3knUT8gwTfjsFMi2xC.jpg\",\"oohyi4kKhKelL7tuoSC8M583NnbMLASXT589z70P.jpg\",\"YwVIgn8IjCLV00KM25lxlZYhu5SSCBzikmZffmsN.jpg\",\"67XG8Kkzjo5wOLkVXfNxUeYZrtS8sqSJcqSKNUh4.jpg\"]',
        '10:26:00', '2023-12-30', NULL, '2023-12-30 04:56:27', '2023-12-30 04:56:27'),
       (57, 5, 19, 'hello', NULL, '15:42:00', '2024-01-01', NULL, '2024-01-01 10:12:45', '2024-01-01 10:12:45'),
       (58, 5, 19, 'Happy New Year 2024', NULL, '15:43:00', '2024-01-01', NULL, '2024-01-01 10:13:04',
        '2024-01-01 10:13:04'),
       (59, 5, 20, 'Happy New Year 2024', NULL, '15:43:00', '2024-01-01', NULL, '2024-01-01 10:13:29',
        '2024-01-01 10:13:29'),
       (60, 20, 5, 'Happy New Year 2024', NULL, '15:45:00', '2024-01-01', NULL, '2024-01-01 10:15:16',
        '2024-01-01 10:15:16'),
       (61, 5, 20, NULL,
        '[\"vKeFNHow8bF7TlBzTQx9WybKbouqCgPOEIW3t8Mv.jpg\",\"V3SRApbCbqMJG7GxPdF9eeqqlttPkidv4AbXkM7H.jpg\",\"zw3UdrzxzoPJF9Dc41XMpjKGbVKHR6jsMJApO2eN.jpg\",\"MhrbrhS3MNDxyTw9ugp7B3pAPpIfXAGA3Tj8v3TU.jpg\",\"d1SzEJUjyEVaTBjO2YTbj6c4tuNTkUwJCSQ9dQkJ.jpg\",\"zp51VjsQYRrJUnxypsso0802mTjPw37v0oYEiYrE.jpg\"]',
        '15:46:00', '2024-01-01', NULL, '2024-01-01 10:16:37', '2024-01-01 10:16:37'),
       (62, 20, 5, NULL,
        '[\"T815irPrJjlBMe9kwzwfccNwumQHlSzLfXCT5NNh.pdf\",\"nLHsoGYnIS1Oh5fbUB1hsiHO0cKGMFGTxWwUUnmD.jpg\",\"SlafMKJNp82X4YHIJpMsu63BHu31TYYuWBWJoo5F.png\",\"904twMJL4EAANA9Egt0U56Cjz4UrUfAKbYXhvqp8.png\"]',
        '15:47:00', '2024-01-01', NULL, '2024-01-01 10:17:33', '2024-01-01 10:17:33'),
       (63, 5, 20, 'hfgh', NULL, '12:08:00', '2024-01-08', NULL, '2024-01-08 06:38:43', '2024-01-08 06:38:43'),
       (64, 5, 20, 'hjk', NULL, '12:20:00', '2024-01-08', NULL, '2024-01-08 06:50:39', '2024-01-08 06:50:39'),
       (65, 5, 20, 'rr', NULL, '12:45:00', '2024-01-08', NULL, '2024-01-08 07:15:45', '2024-01-08 07:15:45'),
       (66, 5, 19, NULL, '[\"XADgL0V29YBPYxHp2KNi2XECsKz1sA7d70Duh1ps.docx\"]', '11:24:00', '2024-01-10', NULL,
        '2024-01-10 05:54:06', '2024-01-10 05:54:06'),
       (67, 5, 29, 'fghfgh', NULL, '17:06:00', '2024-01-10', NULL, '2024-01-10 11:36:00', '2024-01-10 11:36:00'),
       (68, 5, 20, 'sdas', NULL, '17:18:00', '2024-01-10', NULL, '2024-01-10 11:48:25', '2024-01-10 11:48:25'),
       (69, 5, 20, NULL, '[\"IMHno6zvb9YqdDjOXGtgFFeIEMfEsaBF8eKrP3oU.xlsx\"]', '17:18:00', '2024-01-10', NULL,
        '2024-01-10 11:48:49', '2024-01-10 11:48:49'),
       (70, 5, 20, NULL,
        '[\"CstKKDcCxO3HFggREZJQvhJ8Dqrtvb0tfcuo9DED.mp4\",\"nPSHL22tKu4p545aNA4cltLJz5rjc2efKlZD3Wh7.jpg\",\"4PyDmzraHN6AQvwr2OuOBc5oLFGpJyrNnu9CR5yD.docx\",\"IctLR7hAVo4r7aqc5FcaF5hxmDF2pR0wu3z0pr47.docx\",\"aTPTLzPELmjmP6gxEcIWAVkmsKMtzxOfYct8JZxL.jpg\",\"yZcPJt8k2FKlEKVoiQ8KOUXo3TQmlUGCKxb81obC.png\",\"kHHVme9H2Gntv0r6H6B7O1ZFqEAvodZpd2aVDn9C.jpg\",\"90qMLcG8Y3itjXtvDfVJhAv0OJOo4KeKR4CywIWs.jpg\",\"tNvY6iOV5bMFh2vgz5GO5FWRPsEqKms7XhmvmMo1.webp\",\"Alq7t4UjMPEtgbx7beTc5CLb9EtZo7OOjPJdCPBp.png\"]',
        '17:19:00', '2024-01-10', NULL, '2024-01-10 11:49:08', '2024-01-10 11:49:08'),
       (71, 5, 20, 'tytryr', NULL, '15:13:00', '2024-01-11', NULL, '2024-01-11 09:43:48', '2024-01-11 09:43:48'),
       (72, 5, 20, 'hj', NULL, '15:14:00', '2024-01-11', NULL, '2024-01-11 09:44:05', '2024-01-11 09:44:05'),
       (73, 5, 19, 'Test', NULL, '12:40:00', '2024-01-27', NULL, '2024-01-27 07:10:14', '2024-01-27 07:10:14'),
       (74, 5, 19, NULL, '[\"ASgIbOyuqIp4316sdSMzaCxnbPBOAATUkY10T5l5.pdf\"]', '17:30:00', '2024-02-02', NULL,
        '2024-02-02 12:00:11', '2024-02-02 12:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences`
(
    `id`           bigint(20) UNSIGNED NOT NULL,
    `resume_id`    bigint(20) UNSIGNED NOT NULL,
    `destination`  varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `start_date`   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `end_date`     varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`  text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `check`        int(11) NOT NULL DEFAULT 0,
    `status`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`   timestamp NULL DEFAULT NULL,
    `updated_at`   timestamp NULL DEFAULT NULL,
    `deleted_at`   timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `resume_id`, `destination`, `company_name`, `start_date`, `end_date`,
                                `description`, `check`, `status`, `created_at`, `updated_at`, `deleted_at`)
VALUES (5, 3, 'Laravel-Developer', 'Webilok', '2021-05', '2024-01',
        'Leverage agile frameworks to provide a robust synopsis for high level overviews.\r\n                                Iterative approaches to corporate strategy foster collaborative thinking to further the\r\n                                overall value proposition.',
        0, 'active', '2023-09-23 22:08:32', '2024-01-10 10:29:51', NULL),
       (6, 3, 'Laravel-Developer', 'The Great Idea Tech', '2022-05', 'Present',
        'Leverage agile frameworks to provide a robust synopsis for high level overviews.\r\n                                Iterative approaches to corporate strategy foster collaborative thinking to further the\r\n                                overall value proposition.',
        1, 'De-Active', '2023-09-23 22:08:34', '2024-01-10 10:31:22', NULL),
       (18, 6, 'Web-Developer', 'dfg', '2023-01', 'Present', 'fdgdgdg', 1, 'active', '2023-09-27 04:11:01',
        '2024-01-10 10:30:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign_answers`
--
ALTER TABLE `campaign_answers`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_ideas`
--
ALTER TABLE `campaign_ideas`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_new`
--
ALTER TABLE `campaign_new`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_new_question`
--
ALTER TABLE `campaign_new_question`
    ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_new_id` (`campaign_new_id`);

--
-- Indexes for table `campaign_sub_idea_details`
--
ALTER TABLE `campaign_sub_idea_details`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
    ADD PRIMARY KEY (`id`),
  ADD KEY `courses_resume_id_foreign` (`resume_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
    ADD PRIMARY KEY (`id`),
  ADD KEY `education_resume_id_foreign` (`resume_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image_resizes`
--
ALTER TABLE `image_resizes`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
    ADD PRIMARY KEY (`permission_id`, `model_id`, `model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
    ADD PRIMARY KEY (`role_id`, `model_id`, `model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
    ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
    ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `payment_histories`
--
ALTER TABLE `payment_histories`
    ADD PRIMARY KEY (`id`),
  ADD KEY `payment_histories_user_id_foreign` (`user_id`),
  ADD KEY `payment_histories_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `payment_refunds`
--
ALTER TABLE `payment_refunds`
    ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professional_skills`
--
ALTER TABLE `professional_skills`
    ADD PRIMARY KEY (`id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
    ADD PRIMARY KEY (`id`),
  ADD KEY `projects_resume_id_foreign` (`resume_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_settings`
--
ALTER TABLE `questions_settings`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
    ADD PRIMARY KEY (`permission_id`, `role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_chats`
--
ALTER TABLE `user_chats`
    ADD PRIMARY KEY (`id`),
  ADD KEY `user_chats_sender_id_foreign` (`sender_id`),
  ADD KEY `user_chats_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
    ADD PRIMARY KEY (`id`),
  ADD KEY `work_experiences_resume_id_foreign` (`resume_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign_answers`
--
ALTER TABLE `campaign_answers`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `campaign_ideas`
--
ALTER TABLE `campaign_ideas`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `campaign_new`
--
ALTER TABLE `campaign_new`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `campaign_new_question`
--
ALTER TABLE `campaign_new_question`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `campaign_sub_idea_details`
--
ALTER TABLE `campaign_sub_idea_details`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_resizes`
--
ALTER TABLE `image_resizes`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int (10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_histories`
--
ALTER TABLE `payment_histories`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment_refunds`
--
ALTER TABLE `payment_refunds`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `professional_skills`
--
ALTER TABLE `professional_skills`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `questions_settings`
--
ALTER TABLE `questions_settings`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_chats`
--
ALTER TABLE `user_chats`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaign_new_question`
--
ALTER TABLE `campaign_new_question`
    ADD CONSTRAINT `campaign_new_question_ibfk_1` FOREIGN KEY (`campaign_new_id`) REFERENCES `campaign_new` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
    ADD CONSTRAINT `courses_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
    ADD CONSTRAINT `education_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
    ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
    ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
    ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_histories`
--
ALTER TABLE `payment_histories`
    ADD CONSTRAINT `payment_histories_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON
DELETE
CASCADE;

--
-- Constraints for table `payment_refunds`
--
ALTER TABLE `payment_refunds`
    ADD CONSTRAINT `payment_refunds_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professional_skills`
--
ALTER TABLE `professional_skills`
    ADD CONSTRAINT `professional_skills_ibfk_1` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
    ADD CONSTRAINT `projects_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
    ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON
DELETE
CASCADE;

--
-- Constraints for table `user_chats`
--
ALTER TABLE `user_chats`
    ADD CONSTRAINT `user_chats_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_chats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON
DELETE
CASCADE;

--
-- Constraints for table `work_experiences`
--
ALTER TABLE `work_experiences`
    ADD CONSTRAINT `work_experiences_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
