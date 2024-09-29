-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 11, 2024 at 06:45 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_siopay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can` enum('all','kyc','accounts') NOT NULL DEFAULT 'all'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`, `can`) VALUES
(1, 3, '2023-11-19 16:55:31', '2023-11-19 16:55:31', 'kyc'),
(2, 4, '2023-11-19 17:03:21', '2023-11-19 17:03:21', 'accounts'),
(3, 1, '2023-11-19 17:03:21', '2023-11-19 17:03:21', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_name` varchar(255) NOT NULL,
  `beneficiary_phone_number` varchar(255) NOT NULL,
  `beneficiary_country` varchar(255) NOT NULL,
  `extra_datas` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_accounts`
--

CREATE TABLE `beneficiary_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_account_number` varchar(255) NOT NULL,
  `beneficiary_account_name` varchar(255) NOT NULL,
  `beneficiary_bank_name` varchar(255) NOT NULL,
  `beneficiary_bank_code` varchar(255) NOT NULL,
  `extra_datas` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_alt` varchar(255) DEFAULT NULL,
  `current_location` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive','decommisioned') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_alt` varchar(255) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `phone`, `phone_alt`, `address1`, `address2`, `zip`, `city`, `state`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, '0802222222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-10 11:33:50', '2023-10-10 11:33:50'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-19 16:55:31', '2023-11-19 16:55:31'),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-19 17:03:21', '2023-11-19 17:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `dispatchers`
--

CREATE TABLE `dispatchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_alt` varchar(255) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agency_type` varchar(255) NOT NULL DEFAULT 'person',
  `business_name` varchar(255) DEFAULT NULL,
  `tax_id_code` varchar(255) DEFAULT NULL,
  `vat_no` varchar(255) DEFAULT NULL,
  `pec` varchar(255) DEFAULT NULL,
  `sdi` varchar(255) DEFAULT NULL,
  `kyc_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispatchers`
--

INSERT INTO `dispatchers` (`id`, `user_id`, `name`, `phone`, `phone_alt`, `address1`, `address2`, `zip`, `city`, `state`, `country`, `location_id`, `created_at`, `updated_at`, `agency_type`, `business_name`, `tax_id_code`, `vat_no`, `pec`, `sdi`, `kyc_status`) VALUES
(1, 1, 'Apollos Technologies', '07050737402', '07050737402', 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', NULL, '2023-10-08 06:51:44', '2023-10-08 07:45:24', 'person', NULL, NULL, NULL, NULL, NULL, 0),
(4, 2, 'Apollos Technologies', '07050737402', '07050737402', 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', NULL, '2023-10-08 06:51:44', '2023-11-27 09:32:22', 'person', NULL, NULL, NULL, NULL, NULL, 0),
(5, 3, 'Apollos Technologies', '07050737402', '07050737402', 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', NULL, '2023-10-08 06:51:44', '2023-10-08 07:45:24', 'person', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `e_u_funds_transfer_rates`
--

CREATE TABLE `e_u_funds_transfer_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `s_country_eu` varchar(255) NOT NULL,
  `rx_country_eu` varchar(255) NOT NULL,
  `calc` enum('perc','fixed') NOT NULL,
  `commision` double NOT NULL DEFAULT 1,
  `ex_rate` double NOT NULL DEFAULT 1,
  `min_amt` double NOT NULL DEFAULT 0,
  `max_amt` double NOT NULL DEFAULT 999,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_u_funds_transfer_rates`
--

INSERT INTO `e_u_funds_transfer_rates` (`id`, `name`, `s_country_eu`, `rx_country_eu`, `calc`, `commision`, `ex_rate`, `min_amt`, `max_amt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Platinum', 'Italy', 'United Kingdom', 'perc', 2, 1, 1, 999, 1, '2023-10-25 09:49:31', '2023-10-25 09:49:31'),
(2, 'Premiumr', 'Italy', 'Hungary', 'fixed', 1, 1, 10, 999, 1, '2023-10-28 14:42:13', '2023-10-28 14:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `e_u_fund_transfer_orders`
--

CREATE TABLE `e_u_fund_transfer_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `walk_in_customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dispatcher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `e_u_funds_transfer_rate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tracking_id` varchar(255) DEFAULT NULL,
  `rx_surname` varchar(255) DEFAULT NULL,
  `rx_name` varchar(255) DEFAULT NULL,
  `rx_phone` varchar(255) DEFAULT NULL,
  `rx_email` varchar(255) DEFAULT NULL,
  `rx_bank_name` varchar(255) DEFAULT NULL,
  `rx_bank_routing_no` varchar(255) DEFAULT NULL,
  `rx_bank_swift_code` varchar(255) DEFAULT NULL,
  `rx_bank_account_name` varchar(255) DEFAULT NULL,
  `rx_bank_account_number` varchar(255) DEFAULT NULL,
  `rx_country` varchar(255) DEFAULT NULL,
  `s_country` varchar(255) DEFAULT NULL,
  `s_amount` double DEFAULT NULL,
  `rx_amount` double DEFAULT NULL,
  `tx_status` enum('unpaid','pending','done','rejected') NOT NULL DEFAULT 'unpaid',
  `tx_reference` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_u_fund_transfer_orders`
--

INSERT INTO `e_u_fund_transfer_orders` (`id`, `walk_in_customer_id`, `customer_id`, `dispatcher_id`, `e_u_funds_transfer_rate_id`, `tracking_id`, `rx_surname`, `rx_name`, `rx_phone`, `rx_email`, `rx_bank_name`, `rx_bank_routing_no`, `rx_bank_swift_code`, `rx_bank_account_name`, `rx_bank_account_number`, `rx_country`, `s_country`, `s_amount`, `rx_amount`, `tx_status`, `tx_reference`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 'SIO-EUR86502243', NULL, NULL, '08188223228', 'walshak1999@gmail.com', 'zenith', '2827', NULL, 'wal', '22737373737', 'United Kingdom', 'Italy', 100, 100, 'done', 'pi_3O5xr4CPuHcGXdFK1LyPTppj', '2023-10-27 19:46:43', '2023-10-28 14:38:50'),
(2, 2, 1, 1, 1, 'SIO-EUR86452198', NULL, NULL, '07050737402', 'walshak1999@gmail.com', 'zenith', '2827', NULL, 'wal', '22737373737', 'United Kingdom', 'Italy', 100, 100, 'rejected', 'pi_3O6E8XCPuHcGXdFK1nigA9KO', '2023-10-28 14:08:46', '2023-10-28 14:37:20'),
(3, 5, 1, 1, 1, 'SIO-EUR34125856', NULL, NULL, '07050737402', 'walshak1999@gmail.com', 'zenith', '2827', NULL, 'wal', '22737373737', 'United Kingdom', 'Italy', 55, 55, 'pending', '23', '2023-11-19 07:37:08', '2023-11-19 07:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intl_funds_transfer_rates`
--

CREATE TABLE `intl_funds_transfer_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `s_country` varchar(255) NOT NULL,
  `rx_country` varchar(255) NOT NULL,
  `s_currency` varchar(255) NOT NULL,
  `rx_currency` varchar(255) NOT NULL,
  `ex_rate` double NOT NULL DEFAULT 1,
  `calc` enum('perc','fixed') NOT NULL,
  `commision` double NOT NULL DEFAULT 1,
  `min_amt` double NOT NULL DEFAULT 0,
  `max_amt` double NOT NULL DEFAULT 999,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intl_funds_transfer_rates`
--

INSERT INTO `intl_funds_transfer_rates` (`id`, `name`, `s_country`, `rx_country`, `s_currency`, `rx_currency`, `ex_rate`, `calc`, `commision`, `min_amt`, `max_amt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Premium-momo mobile money', 'Italy', 'Nigeria', 'EUR - Euro', 'NGN - Nigerian Naira', 1200, 'perc', 2, 1, 999, 1, '2023-10-25 09:39:56', '2023-10-25 09:39:56'),
(2, 'Bronze pickup', 'Italy', 'Nigeria', 'EUR - Euro', 'NGN - Nigerian Naira', 1400, 'perc', 5, 10, 970, 1, '2023-10-28 14:46:52', '2023-10-28 14:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `intl_fund_transfer_orders`
--

CREATE TABLE `intl_fund_transfer_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `walk_in_customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dispatcher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `e_u_funds_transfer_rate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tracking_id` varchar(255) DEFAULT NULL,
  `rx_surname` varchar(255) DEFAULT NULL,
  `rx_name` varchar(255) DEFAULT NULL,
  `rx_phone` varchar(255) DEFAULT NULL,
  `rx_email` varchar(255) DEFAULT NULL,
  `rx_bank_name` varchar(255) DEFAULT NULL,
  `rx_bank_routing_no` varchar(255) DEFAULT NULL,
  `rx_bank_swift_code` varchar(255) DEFAULT NULL,
  `rx_bank_account_name` varchar(255) DEFAULT NULL,
  `rx_bank_account_number` varchar(255) DEFAULT NULL,
  `rx_country` varchar(255) DEFAULT NULL,
  `s_country` varchar(255) DEFAULT NULL,
  `rx_currency` varchar(255) DEFAULT NULL,
  `s_currency` varchar(255) DEFAULT NULL,
  `s_amount` double DEFAULT NULL,
  `rx_amount` double DEFAULT NULL,
  `tx_status` enum('unpaid','pending','done','rejected') NOT NULL DEFAULT 'unpaid',
  `tx_reference` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intl_fund_transfer_orders`
--

INSERT INTO `intl_fund_transfer_orders` (`id`, `walk_in_customer_id`, `customer_id`, `dispatcher_id`, `e_u_funds_transfer_rate_id`, `tracking_id`, `rx_surname`, `rx_name`, `rx_phone`, `rx_email`, `rx_bank_name`, `rx_bank_routing_no`, `rx_bank_swift_code`, `rx_bank_account_name`, `rx_bank_account_number`, `rx_country`, `s_country`, `rx_currency`, `s_currency`, `s_amount`, `rx_amount`, `tx_status`, `tx_reference`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 'SIO-EUR74379852', NULL, NULL, '07050737402', 'walshak1999@gmail.com', 'zenith', '2827', NULL, 'wal', '22737373737', 'Nigeria', 'Italy', 'NGN - Nigerian Naira', 'EUR - Euro', 100, 120000, 'rejected', 'pi_3O60KICPuHcGXdFK0Y07LX2s', '2023-10-27 23:14:03', '2023-10-28 10:24:17'),
(2, 2, 1, 1, 1, 'SIO-INTL80180491', NULL, NULL, '08188223228', 'walshak1999@gmail.com', 'zenith', '2827', NULL, 'wal', '22737373737', 'Nigeria', 'Italy', 'NGN - Nigerian Naira', 'EUR - Euro', 200, 240000, 'pending', '29', '2023-10-28 07:05:54', '2023-11-19 07:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `document_front` varchar(255) DEFAULT NULL,
  `document_back` varchar(255) DEFAULT NULL,
  `external_applicant_id` varchar(255) DEFAULT NULL,
  `document_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document_number` varchar(255) DEFAULT NULL,
  `document_issue_date` date DEFAULT NULL,
  `document_expiry_date` date DEFAULT NULL,
  `selfie` text DEFAULT NULL,
  `proof_of_address_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `proof_of_address` text DEFAULT NULL,
  `kyc_level` int(11) NOT NULL DEFAULT 0,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `rejection_reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `personal_information` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `user_id`, `document_front`, `document_back`, `external_applicant_id`, `document_type_id`, `document_number`, `document_issue_date`, `document_expiry_date`, `selfie`, `proof_of_address_type_id`, `proof_of_address`, `kyc_level`, `status`, `rejection_reason`, `created_at`, `updated_at`, `personal_information`) VALUES
(1, 2, NULL, NULL, 'hahaha_', 1, '242324', '2023-11-01', '2024-01-05', 'uu.jpg', 2, 'pp.pdf', 1, 'approved', 'test', NULL, '2024-06-19 08:14:18', NULL),
(7, 13, 'documents/AvesPNt6nGE5XiMd7p5knU6Q5u8TmHxiVihxtxRD.jpg', 'documents/Clhe7ThawsXvNngwhNFVMfitINFsgZif6UrAPKVL.jpg', '1ef2e2a5-dc65-6822-9131-61f30cf21728', 2, NULL, NULL, NULL, 'selfies/2i4Wgpq0jSIwH7EChQAgTBm8SAjtNS9KNDOalZBi.jpg', 2, 'proofs_of_address/IBKKsEIvW2ddB8XGDWvUyXiVS2EHKGNz17AeSEiK.jpg', 0, 'rejected', 'Step: poa,  Document: Unknown Status: failed Errors: Country in PoA document not verified. Errors: Name in PoA document not verified. Errors: Uploaded document is outdated., ', '2024-06-19 10:54:58', '2024-06-24 15:35:44', '{\"firstname\":\"ismoil\",\"lastname\":\"sulaimon\",\"othername\":null,\"email\":\"joc@gmail.com\",\"phone\":\"+413333333333333\",\"address\":\"piazzza porce\",\"nationality\":\"Campione d\'Italia\",\"place_of_birth\":\"a\",\"occupation\":\"a\",\"fiscal_code\":\"a\",\"gender\":\"Male\"}'),
(8, 15, NULL, NULL, '1ef2e715-ddad-6f15-ab6d-635bfb17192a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'pending', NULL, '2024-06-19 19:23:12', '2024-06-19 19:23:13', '{\"firstname\":\"sulaimon\",\"lastname\":\"ismoil\",\"othername\":null,\"email\":\"jocsmart@outlook.com\",\"phone\":\"+413666666666633\",\"address\":\"viale i maggio 7\",\"nationality\":\"Nigeria\",\"place_of_birth\":\"a\",\"occupation\":\"a\",\"fiscal_code\":\"a\",\"gender\":\"Male\"}'),
(42, 10, NULL, NULL, '1ef324ac-526c-6dd4-9fc3-9fd4f98ce1a0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'rejected', 'Step: document_mrz,  Document: driver_license Status: failed Errors: Some data fields not recognized. Errors: Name on the document doesn\'t match your name., ', '2024-06-24 16:57:02', '2024-06-24 17:42:44', '{\"firstname\":\"Walshak\",\"lastname\":\"Apollos\",\"othername\":null,\"email\":\"walshak1999@gmail.com\",\"phone\":\"+2347050737402\",\"address\":\"Siopay HQ\",\"citizenship\":\"NG\",\"dob\":\"2024-06-24\",\"gender\":\"M\"}'),
(43, 19, NULL, NULL, '1ef35ef9-3790-6c95-b8be-dd7f3e1bc06d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'approved', 'Step: document_mrz,  Document: driver_license Status: failed Errors: Some data fields not recognized. Errors: Name on the document doesn\'t match your name., ', '2024-06-29 08:14:21', '2024-06-29 08:55:12', '{\"firstname\":\"Dev\",\"lastname\":\"User\",\"othername\":null,\"email\":\"dev@gmail.com\",\"phone\":\"+3901123456789\",\"address\":\"Siopay\",\"citizenship\":\"IT\",\"dob\":\"2024-06-28\",\"gender\":\"M\"}'),
(44, 20, NULL, NULL, '1ef324ac-526c-6dd4-9fc3-9fd4f98ce1a0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'pending', NULL, '2024-06-29 13:02:00', '2024-06-29 13:03:11', '{\"firstname\":\"wal\",\"lastname\":\"tim\",\"othername\":\"app\",\"email\":\"it@siopay.eu\",\"phone\":\"+2347050737402\",\"address\":\"kamike estate badagray expressway\",\"citizenship\":\"NG\",\"dob\":\"1999-10-15\",\"gender\":\"M\"}');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_address_proof_types`
--

CREATE TABLE `kyc_address_proof_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc_address_proof_types`
--

INSERT INTO `kyc_address_proof_types` (`id`, `document_name`, `created_at`, `updated_at`) VALUES
(1, 'residence_permit', NULL, NULL),
(2, 'poa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kyc_document_type`
--

CREATE TABLE `kyc_document_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc_document_type`
--

INSERT INTO `kyc_document_type` (`id`, `document_name`, `created_at`, `updated_at`) VALUES
(1, 'passport', NULL, NULL),
(2, 'id_card', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `latitude`, `longitude`, `postcode`, `created_at`, `updated_at`) VALUES
(1, 'Jos1', '9.896527', '8.858331', '930', '2023-10-02 07:18:17', '2023-10-06 11:49:40'),
(2, 'Lagos', '6.465422', '3.406448', '920281', '2023-10-02 08:50:41', '2023-10-09 09:47:18'),
(3, 'Minna', '9.583555', '6.546316', '920283', '2023-10-05 07:21:37', '2023-10-09 09:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_01_175034_create_locations_table', 1),
(6, '2023_10_01_175530_create_customers_table', 1),
(7, '2023_10_01_181748_create_couriers_table', 1),
(8, '2023_10_01_181821_create_dispatchers_table', 1),
(9, '2023_10_01_184316_create_admins_table', 1),
(11, '2023_10_01_190628_create_vehicles_table', 1),
(15, '2023_10_05_182532_add_postcode_col_to_locations_table', 2),
(20, '2023_10_01_213417_create_shipping_rates_table', 3),
(23, '2023_10_01_185553_create_orders_table', 4),
(25, '2023_10_01_213229_create_order_batches_table', 6),
(26, '2023_10_06_190015_create_order_packages_table', 7),
(27, '2023_10_01_213929_add_batch_id_col_to_orders_table', 8),
(29, '2023_10_09_092606_add_pickup_cost_to_shipping_rates_table', 9),
(30, '2023_10_08_153417_create_payments_table', 10),
(31, '2023_10_10_063141_add_blocked_col_to_users_table', 11),
(32, '2023_10_10_073114_add_customer_id_col_to_payments_table', 12),
(33, '2023_10_10_081718_add_email_sent_col_to_payments_table', 13),
(36, '2023_10_25_071312_create_e_u_funds_transfer_rates_table', 15),
(37, '2023_10_25_071325_create_intl_funds_transfer_rates_table', 16),
(38, '2023_10_26_133444_create_walk_in_customers_table', 17),
(39, '2023_10_26_211532_add_walkincustomercol_to_orders_table', 17),
(44, '2023_10_27_080804_create_e_u_fund_transfer_orders_table', 21),
(47, '2023_10_27_080819_create_intl_fund_transfer_orders_table', 22),
(48, '2023_10_28_075741_add_contact_to_walk_in_customers_table', 23),
(49, '2023_11_17_120452_create_user_funds_table', 24),
(50, '2023_11_19_164924_add_agency_cols_to_dispatchers_table', 25),
(51, '2023_11_20_182243_add_can_col_to_admins_table', 26),
(52, '2023_11_27_085022_add_kyc_col_to_dispatchers_table', 27),
(53, '2023_11_23_184011_create_kyc_document_type_table', 28),
(54, '2023_11_23_185038_create_kyc_address_proof_types_table', 28),
(55, '2023_11_23_190245_create_kyc_table', 28),
(57, '2014_10_12_000000_create_users_table', 29),
(58, '2023_12_03_104313_create_beneficiaries_table', 30),
(59, '2023_12_03_104322_create_beneficiary_accounts_table', 30),
(60, '2023_12_03_104414_create_transactions_table', 30),
(61, '2023_12_12_075509_create_operation_countries_table', 30),
(63, '2023_12_24_171217_create_supported_banks_table', 31),
(64, '2016_06_01_000001_create_oauth_auth_codes_table', 32),
(65, '2016_06_01_000002_create_oauth_access_tokens_table', 32),
(66, '2016_06_01_000003_create_oauth_refresh_tokens_table', 32),
(67, '2016_06_01_000004_create_oauth_clients_table', 32),
(68, '2016_06_01_000005_create_oauth_personal_access_clients_table', 32),
(69, '2024_05_28_122311_create_user_login_logs_table', 33),
(70, '2023_12_12_080151_add_country_to_users_table', 34),
(71, '2023_12_14_181545_add_phone_to_users_table', 34),
(72, '2023_12_14_190559_add_receiveing_and_sending_to_operation_countries_table', 34),
(73, '2023_12_15_091949_add_personal_information_col_to_kyc_table', 34),
(74, '2023_12_15_200626_create_transfer_intent_table', 34),
(75, '2023_12_20_060801_add_payment_intent_data_col_to_transfer_intent_table', 34),
(76, '2023_12_20_063327_add_kyc_level_col_to_users_table', 34),
(77, '2023_12_24_172925_add_payment_intent_to_transactions_table', 34),
(78, '2023_12_24_180811_add_webhook_data_to_transactions_table', 34),
(79, '2024_05_28_125346_add_country_code_to_users_table', 35),
(80, '2024_05_28_125514_add_photo_to_users_table', 36),
(81, '2024_05_28_142629_create_transaction_limits_table', 37),
(82, '2024_05_29_091142_add_country_to_login_logs', 38);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operation_countries`
--

CREATE TABLE `operation_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_alpha2code` varchar(255) NOT NULL,
  `country_alpha3code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `receiving` varchar(255) NOT NULL DEFAULT 'no',
  `sending` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation_countries`
--

INSERT INTO `operation_countries` (`id`, `country_name`, `country_alpha2code`, `country_alpha3code`, `created_at`, `updated_at`, `receiving`, `sending`) VALUES
(1, 'Italy', 'IT', 'ITA', NULL, NULL, 'yes', 'yes'),
(2, 'Nigeria', 'NG', 'NGA', NULL, NULL, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `walk_in_customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `courier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dispatcher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_rate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('unpaid','placed','assigned','in_transit','delivered','cancelled') NOT NULL DEFAULT 'unpaid',
  `pickup_location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `current_location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tracking_id` varchar(255) NOT NULL,
  `pickup_time` timestamp NULL DEFAULT NULL,
  `delivery_time` timestamp NULL DEFAULT NULL,
  `delivery_name` varchar(255) DEFAULT NULL,
  `delivery_email` varchar(255) DEFAULT NULL,
  `delivery_phone` varchar(255) DEFAULT NULL,
  `delivery_phone_alt` varchar(255) DEFAULT NULL,
  `delivery_address1` text DEFAULT NULL,
  `delivery_address2` text DEFAULT NULL,
  `delivery_zip` varchar(255) DEFAULT NULL,
  `delivery_city` varchar(255) DEFAULT NULL,
  `delivery_state` varchar(255) DEFAULT NULL,
  `delivery_country` varchar(255) DEFAULT NULL,
  `pickup_name` varchar(255) DEFAULT NULL,
  `pickup_phone` varchar(255) DEFAULT NULL,
  `pickup_email` varchar(255) DEFAULT NULL,
  `pickup_phone_alt` varchar(255) DEFAULT NULL,
  `pickup_address1` text DEFAULT NULL,
  `pickup_address2` text DEFAULT NULL,
  `pickup_zip` varchar(255) DEFAULT NULL,
  `pickup_city` varchar(255) DEFAULT NULL,
  `pickup_state` varchar(255) DEFAULT NULL,
  `pickup_country` varchar(255) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `cond_of_goods` varchar(255) DEFAULT NULL,
  `val_of_goods` double(8,2) DEFAULT NULL,
  `val_cur` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `walk_in_customer_id`, `delivery_customer_id`, `courier_id`, `dispatcher_id`, `batch_id`, `shipping_rate_id`, `status`, `pickup_location_id`, `delivery_location_id`, `current_location_id`, `tracking_id`, `pickup_time`, `delivery_time`, `delivery_name`, `delivery_email`, `delivery_phone`, `delivery_phone_alt`, `delivery_address1`, `delivery_address2`, `delivery_zip`, `delivery_city`, `delivery_state`, `delivery_country`, `pickup_name`, `pickup_phone`, `pickup_email`, `pickup_phone_alt`, `pickup_address1`, `pickup_address2`, `pickup_zip`, `pickup_city`, `pickup_state`, `pickup_country`, `return_date`, `cond_of_goods`, `val_of_goods`, `val_cur`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, NULL, NULL, NULL, 1, 1, 'in_transit', 2, 1, 3, 'SIP1696717654', NULL, NULL, 'Walshak Rx', 'walshak1999@gmail.com', '07050737402', NULL, 'Dankankani village, Furaka district, Bauchi ring road', NULL, '920281', 'Minna', 'Niger', 'Nigeria', 'Walshak Timothy Apollos', '08188223228', 'walshak1999@gmail.com', '08188223228', 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', '2023-10-07', 'goodo', 100000.00, 'EUR - Euro', '2023-10-07 14:14:55', '2023-10-10 10:56:20'),
(4, 1, NULL, NULL, NULL, NULL, 1, 1, 'in_transit', 2, 1, 3, 'SIP1696842642', NULL, NULL, 'Walshak Rx2', 'walshak1999@gmail.com', '08188223228', NULL, 'Elwazir Street,bosso', NULL, '920281', 'Minna', 'Niger', 'Nigeria', 'Walshak Timothy Apollos', '07050737402', 'walshak1999@gmail.com', NULL, 'Dankankani village, Furaka district, Bauchi ring road', NULL, '930232', 'Jos', 'Plateau', 'Nigeria', '2023-10-01', 'good', 1000.00, 'EUR - Euro', '2023-10-09 08:10:42', '2023-10-10 10:56:20'),
(5, 1, NULL, NULL, NULL, 1, 1, 1, 'in_transit', 2, 1, 3, 'SIP1696927405', NULL, NULL, 'Simon James ed', 'simon@gmail.com', '07050737402', NULL, 'Dankankani village, Furaka district, Bauchi ring road', NULL, '930232', 'Jos', 'Plateau', 'Nigeria', 'Walshak Timothy Apollos', '08188223228', 'walshak1999@gmail.com', NULL, 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', '2023-10-01', 'good', 1000.00, 'EUR - Euro', '2023-10-09 10:12:51', '2023-10-10 10:56:20'),
(6, 1, 1, NULL, NULL, NULL, NULL, 1, 'placed', 2, 1, 2, 'SIO1698364331', NULL, NULL, 'Walshak Timothy Apollos', 'walshak1999@gmail.com', '07050737402', '07050737402', 'Elwazir Street,bosso\r\nVcm 105 Elwazir Estate', 'Elwazir Street,bosso\r\nVcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', 'Walshak Timothy Apollos', '07050737402', 'walshak1999@gmail.com', '08188223228', 'Dankankani village, Furaka district, Bauchi ring road', 'Dankankani village, Furaka district, Bauchi ring road', '930232', 'Jos', 'Plateau', 'Nigeria', '2023-10-20', 'good', 1000.00, 'AED - United Arab Emirates Dirham', '2023-10-26 22:52:11', '2023-11-19 05:47:51'),
(7, 1, 2, NULL, NULL, NULL, NULL, 1, 'placed', 2, 1, 2, 'SIO1698390297', NULL, NULL, 'Walshak Timothy Apollos', 'walshak1999@gmail.com', '07050737402', NULL, 'Dankankani village, Furaka district, Bauchi ring road', NULL, '930232', 'Jos', 'Plateau', 'Nigeria', 'Walshak Timothy Apollos', '08188223228', 'walshak1999@gmail.com', NULL, 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', '2023-10-27', 'good', 1000.00, 'EUR - Euro', '2023-10-27 06:04:57', '2023-11-18 20:10:45'),
(8, 1, 2, NULL, NULL, NULL, NULL, 1, 'placed', 2, 1, 2, 'SIO1698390815', NULL, NULL, 'Walshak Timothy Apollos', 'walshak1999@gmail.com', '08188223228', NULL, 'Elwazir Street,bosso', NULL, '920281', 'Minna', 'Niger', 'Nigeria', 'Walshak Timothy Apollos', '07050737402', 'walshak1999@gmail.com', NULL, 'Dankankani village, Furaka district, Bauchi ring road', NULL, '930232', 'Jos', 'Plateau', 'Nigeria', '2023-10-01', NULL, NULL, NULL, '2023-10-27 06:13:35', '2023-11-18 20:06:56'),
(9, 1, 2, NULL, NULL, NULL, NULL, 1, 'placed', 2, 1, 2, 'SIO1698391275', NULL, NULL, 'Walshak Timothy Apollos', 'walshak1999@gmail.com', '08188223228', NULL, 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', 'Walshak Timothy Apollos', '07050737402', 'walshak1999@gmail.com', '07050737402', 'Dankankani village, Furaka district, Bauchi ring road', NULL, '930232', 'Jos', 'Plateau', 'Nigeria', '2023-10-21', NULL, NULL, NULL, '2023-10-27 06:21:15', '2023-10-27 06:32:59'),
(10, 1, 2, NULL, NULL, NULL, NULL, 1, 'placed', 2, 1, 2, 'SIO1698504884', NULL, NULL, 'Walshak Gory', 'walshak1999@gmail.com', '08188223228', NULL, 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', 'Walshak Timothy Apollos', '07050737402', 'walshak1999@gmail.com', NULL, 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', '2023-10-28', 'good', 1000.00, 'EUR - Euro', '2023-10-28 13:54:44', '2023-11-18 20:00:06'),
(11, 1, 4, NULL, NULL, NULL, NULL, 1, 'placed', 2, 1, 2, 'SIO1700339248', NULL, NULL, 'Walshak Timothy Apollos', 'walshak1999@gmail.com', '07050737402', NULL, 'Dankankani village, Furaka district, Bauchi ring road', NULL, '930232', 'Jos', 'Plateau', 'Nigeria', 'Walshak Timothy Apollos', '08188223228', 'walshak1999@gmail.com', NULL, 'Elwazir Street,bosso', 'Vcm 105 Elwazir Estate', '920281', 'Minna', 'Niger', 'Nigeria', '2023-11-04', NULL, NULL, NULL, '2023-11-18 19:27:28', '2023-11-18 19:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_batches`
--

CREATE TABLE `order_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dispatcher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('assigned','in_transit','delivered','cancelled') NOT NULL DEFAULT 'assigned',
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_batches`
--

INSERT INTO `order_batches` (`id`, `name`, `dispatcher_id`, `status`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'BA-1696757437-Lagos-Jos', 1, 'in_transit', 3, '2023-10-08 08:30:37', '2023-10-10 10:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_packages`
--

CREATE TABLE `order_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `length` double(8,2) DEFAULT NULL,
  `width` double(8,2) DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `qty` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_packages`
--

INSERT INTO `order_packages` (`id`, `order_id`, `type`, `length`, `width`, `height`, `weight`, `qty`, `created_at`, `updated_at`) VALUES
(3, 5, 'percel', 1.00, 2.00, 3.00, 0.50, 1.00, '2023-10-09 10:12:51', '2023-10-10 07:43:25'),
(4, 5, 'doc', 0.20, 0.10, 0.60, 0.50, 2.00, '2023-10-09 10:12:51', '2023-10-10 07:43:25'),
(5, 6, 'percel', 1.00, 1.00, 1.00, 1.00, 1.00, '2023-10-26 22:52:11', '2023-10-26 22:52:11'),
(6, 7, 'doc', 1.00, 1.00, 1.00, 1.00, 1.00, '2023-10-27 06:04:57', '2023-10-27 06:04:57'),
(7, 8, 'percel', 1.00, 2.00, 1.00, 1.00, 1.00, '2023-10-27 06:13:35', '2023-10-27 06:13:35'),
(8, 9, 'pallet', 1.00, 2.00, 2.00, 3.00, 1.00, '2023-10-27 06:21:15', '2023-10-27 06:21:15'),
(9, 10, 'percel', 2.00, 3.00, 1.00, 4.00, 1.00, '2023-10-28 13:54:44', '2023-10-28 13:54:44'),
(10, 10, 'doc', 1.00, 1.00, 1.00, 0.20, 1.00, '2023-10-28 13:54:44', '2023-10-28 13:54:44'),
(11, 11, 'doc', 1.00, 1.00, 1.00, 1.00, 1.00, '2023-11-18 19:27:28', '2023-11-18 19:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 0,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `amt_expected` double(8,2) NOT NULL DEFAULT 0.00,
  `amt_paid` double(8,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','done','failed') NOT NULL DEFAULT 'pending',
  `misc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `email_sent`, `customer_id`, `ref`, `amt_expected`, `amt_paid`, `status`, `misc`, `created_at`, `updated_at`) VALUES
(1, 4, 0, 1, 'pi_3NzO1sCPuHcGXdFK0HZAWsjT', 2465.00, 2465.00, 'done', '{\"headers\":{},\"body\":\"{\\n  \\\"id\\\": \\\"pi_3NzO1sCPuHcGXdFK0HZAWsjT\\\",\\n  \\\"object\\\": \\\"payment_intent\\\",\\n  \\\"amount\\\": 2465,\\n  \\\"amount_capturable\\\": 0,\\n  \\\"amount_details\\\": {\\n    \\\"tip\\\": {}\\n  },\\n  \\\"amount_received\\\": 2465,\\n  \\\"application\\\": null,\\n  \\\"application_fee_amount\\\": null,\\n  \\\"automatic_payment_methods\\\": {\\n    \\\"allow_redirects\\\": \\\"always\\\",\\n    \\\"enabled\\\": true\\n  },\\n  \\\"canceled_at\\\": null,\\n  \\\"cancellation_reason\\\": null,\\n  \\\"capture_method\\\": \\\"automatic\\\",\\n  \\\"client_secret\\\": \\\"pi_3NzO1sCPuHcGXdFK0HZAWsjT_secret_nLXlk4sahDVDAc5XLJeEpPltm\\\",\\n  \\\"confirmation_method\\\": \\\"automatic\\\",\\n  \\\"created\\\": 1696875488,\\n  \\\"currency\\\": \\\"eur\\\",\\n  \\\"customer\\\": null,\\n  \\\"description\\\": null,\\n  \\\"invoice\\\": null,\\n  \\\"last_payment_error\\\": null,\\n  \\\"latest_charge\\\": \\\"ch_3NzO1sCPuHcGXdFK0uytvBYT\\\",\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {},\\n  \\\"next_action\\\": null,\\n  \\\"on_behalf_of\\\": null,\\n  \\\"payment_method\\\": \\\"pm_1NzQwfCPuHcGXdFKE842Wv1o\\\",\\n  \\\"payment_method_configuration_details\\\": {\\n    \\\"id\\\": \\\"pmc_1LRcNhCPuHcGXdFKlIjueJUS\\\",\\n    \\\"parent\\\": null\\n  },\\n  \\\"payment_method_options\\\": {\\n    \\\"card\\\": {\\n      \\\"installments\\\": null,\\n      \\\"mandate_options\\\": null,\\n      \\\"network\\\": null,\\n      \\\"request_three_d_secure\\\": \\\"automatic\\\"\\n    }\\n  },\\n  \\\"payment_method_types\\\": [\\n    \\\"card\\\"\\n  ],\\n  \\\"processing\\\": null,\\n  \\\"receipt_email\\\": null,\\n  \\\"review\\\": null,\\n  \\\"setup_future_usage\\\": null,\\n  \\\"shipping\\\": null,\\n  \\\"source\\\": null,\\n  \\\"statement_descriptor\\\": null,\\n  \\\"statement_descriptor_suffix\\\": null,\\n  \\\"status\\\": \\\"succeeded\\\",\\n  \\\"transfer_data\\\": null,\\n  \\\"transfer_group\\\": null\\n}\",\"json\":{\"id\":\"pi_3NzO1sCPuHcGXdFK0HZAWsjT\",\"object\":\"payment_intent\",\"amount\":2465,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":2465,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":{\"allow_redirects\":\"always\",\"enabled\":true},\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3NzO1sCPuHcGXdFK0HZAWsjT_secret_nLXlk4sahDVDAc5XLJeEpPltm\",\"confirmation_method\":\"automatic\",\"created\":1696875488,\"currency\":\"eur\",\"customer\":null,\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3NzO1sCPuHcGXdFK0uytvBYT\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1NzQwfCPuHcGXdFKE842Wv1o\",\"payment_method_configuration_details\":{\"id\":\"pmc_1LRcNhCPuHcGXdFKlIjueJUS\",\"parent\":null},\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null},\"code\":200}', '2023-10-09 17:18:08', '2023-10-09 20:25:02'),
(10, 5, 1, 1, 'pi_3NzeQRCPuHcGXdFK1z263HT0', 1168.00, 1168.00, 'done', '{\"headers\":{},\"body\":\"{\\n  \\\"id\\\": \\\"pi_3NzeQRCPuHcGXdFK1z263HT0\\\",\\n  \\\"object\\\": \\\"payment_intent\\\",\\n  \\\"amount\\\": 116800,\\n  \\\"amount_capturable\\\": 0,\\n  \\\"amount_details\\\": {\\n    \\\"tip\\\": {}\\n  },\\n  \\\"amount_received\\\": 116800,\\n  \\\"application\\\": null,\\n  \\\"application_fee_amount\\\": null,\\n  \\\"automatic_payment_methods\\\": {\\n    \\\"allow_redirects\\\": \\\"always\\\",\\n    \\\"enabled\\\": true\\n  },\\n  \\\"canceled_at\\\": null,\\n  \\\"cancellation_reason\\\": null,\\n  \\\"capture_method\\\": \\\"automatic\\\",\\n  \\\"client_secret\\\": \\\"pi_3NzeQRCPuHcGXdFK1z263HT0_secret_aI6F0uJUrcUzVnrwFN5uL8aCc\\\",\\n  \\\"confirmation_method\\\": \\\"automatic\\\",\\n  \\\"created\\\": 1696938515,\\n  \\\"currency\\\": \\\"eur\\\",\\n  \\\"customer\\\": null,\\n  \\\"description\\\": null,\\n  \\\"invoice\\\": null,\\n  \\\"last_payment_error\\\": null,\\n  \\\"latest_charge\\\": \\\"ch_3NzeQRCPuHcGXdFK1TFGiAbr\\\",\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {},\\n  \\\"next_action\\\": null,\\n  \\\"on_behalf_of\\\": null,\\n  \\\"payment_method\\\": \\\"pm_1NzeR2CPuHcGXdFKNl7Xddzh\\\",\\n  \\\"payment_method_configuration_details\\\": {\\n    \\\"id\\\": \\\"pmc_1LRcNhCPuHcGXdFKlIjueJUS\\\",\\n    \\\"parent\\\": null\\n  },\\n  \\\"payment_method_options\\\": {\\n    \\\"card\\\": {\\n      \\\"installments\\\": null,\\n      \\\"mandate_options\\\": null,\\n      \\\"network\\\": null,\\n      \\\"request_three_d_secure\\\": \\\"automatic\\\"\\n    }\\n  },\\n  \\\"payment_method_types\\\": [\\n    \\\"card\\\"\\n  ],\\n  \\\"processing\\\": null,\\n  \\\"receipt_email\\\": null,\\n  \\\"review\\\": null,\\n  \\\"setup_future_usage\\\": null,\\n  \\\"shipping\\\": null,\\n  \\\"source\\\": null,\\n  \\\"statement_descriptor\\\": null,\\n  \\\"statement_descriptor_suffix\\\": null,\\n  \\\"status\\\": \\\"succeeded\\\",\\n  \\\"transfer_data\\\": null,\\n  \\\"transfer_group\\\": null\\n}\",\"json\":{\"id\":\"pi_3NzeQRCPuHcGXdFK1z263HT0\",\"object\":\"payment_intent\",\"amount\":116800,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":116800,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":{\"allow_redirects\":\"always\",\"enabled\":true},\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3NzeQRCPuHcGXdFK1z263HT0_secret_aI6F0uJUrcUzVnrwFN5uL8aCc\",\"confirmation_method\":\"automatic\",\"created\":1696938515,\"currency\":\"eur\",\"customer\":null,\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3NzeQRCPuHcGXdFK1TFGiAbr\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1NzeR2CPuHcGXdFKNl7Xddzh\",\"payment_method_configuration_details\":{\"id\":\"pmc_1LRcNhCPuHcGXdFKlIjueJUS\",\"parent\":null},\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null},\"code\":200}', '2023-10-10 10:48:38', '2023-10-10 10:52:42'),
(11, 9, 1, 1, 'pi_3O5kNVCPuHcGXdFK0OXsIoPQ', 2465.00, 2465.00, 'done', '{\"headers\":{},\"body\":\"{\\n  \\\"id\\\": \\\"pi_3O5kNVCPuHcGXdFK0OXsIoPQ\\\",\\n  \\\"object\\\": \\\"payment_intent\\\",\\n  \\\"amount\\\": 246500,\\n  \\\"amount_capturable\\\": 0,\\n  \\\"amount_details\\\": {\\n    \\\"tip\\\": {}\\n  },\\n  \\\"amount_received\\\": 246500,\\n  \\\"application\\\": null,\\n  \\\"application_fee_amount\\\": null,\\n  \\\"automatic_payment_methods\\\": {\\n    \\\"allow_redirects\\\": \\\"always\\\",\\n    \\\"enabled\\\": true\\n  },\\n  \\\"canceled_at\\\": null,\\n  \\\"cancellation_reason\\\": null,\\n  \\\"capture_method\\\": \\\"automatic\\\",\\n  \\\"client_secret\\\": \\\"pi_3O5kNVCPuHcGXdFK0OXsIoPQ_secret_f6lgDlrammRqqsJILKPher7ET\\\",\\n  \\\"confirmation_method\\\": \\\"automatic\\\",\\n  \\\"created\\\": 1698391365,\\n  \\\"currency\\\": \\\"eur\\\",\\n  \\\"customer\\\": null,\\n  \\\"description\\\": null,\\n  \\\"invoice\\\": null,\\n  \\\"last_payment_error\\\": null,\\n  \\\"latest_charge\\\": \\\"ch_3O5kNVCPuHcGXdFK026IuHda\\\",\\n  \\\"livemode\\\": false,\\n  \\\"metadata\\\": {},\\n  \\\"next_action\\\": null,\\n  \\\"on_behalf_of\\\": null,\\n  \\\"payment_method\\\": \\\"pm_1O5kXLCPuHcGXdFK13ZcV6I7\\\",\\n  \\\"payment_method_configuration_details\\\": {\\n    \\\"id\\\": \\\"pmc_1LRcNhCPuHcGXdFKlIjueJUS\\\",\\n    \\\"parent\\\": null\\n  },\\n  \\\"payment_method_options\\\": {\\n    \\\"card\\\": {\\n      \\\"installments\\\": null,\\n      \\\"mandate_options\\\": null,\\n      \\\"network\\\": null,\\n      \\\"request_three_d_secure\\\": \\\"automatic\\\"\\n    }\\n  },\\n  \\\"payment_method_types\\\": [\\n    \\\"card\\\"\\n  ],\\n  \\\"processing\\\": null,\\n  \\\"receipt_email\\\": null,\\n  \\\"review\\\": null,\\n  \\\"setup_future_usage\\\": null,\\n  \\\"shipping\\\": null,\\n  \\\"source\\\": null,\\n  \\\"statement_descriptor\\\": null,\\n  \\\"statement_descriptor_suffix\\\": null,\\n  \\\"status\\\": \\\"succeeded\\\",\\n  \\\"transfer_data\\\": null,\\n  \\\"transfer_group\\\": null\\n}\",\"json\":{\"id\":\"pi_3O5kNVCPuHcGXdFK0OXsIoPQ\",\"object\":\"payment_intent\",\"amount\":246500,\"amount_capturable\":0,\"amount_details\":{\"tip\":[]},\"amount_received\":246500,\"application\":null,\"application_fee_amount\":null,\"automatic_payment_methods\":{\"allow_redirects\":\"always\",\"enabled\":true},\"canceled_at\":null,\"cancellation_reason\":null,\"capture_method\":\"automatic\",\"client_secret\":\"pi_3O5kNVCPuHcGXdFK0OXsIoPQ_secret_f6lgDlrammRqqsJILKPher7ET\",\"confirmation_method\":\"automatic\",\"created\":1698391365,\"currency\":\"eur\",\"customer\":null,\"description\":null,\"invoice\":null,\"last_payment_error\":null,\"latest_charge\":\"ch_3O5kNVCPuHcGXdFK026IuHda\",\"livemode\":false,\"metadata\":[],\"next_action\":null,\"on_behalf_of\":null,\"payment_method\":\"pm_1O5kXLCPuHcGXdFK13ZcV6I7\",\"payment_method_configuration_details\":{\"id\":\"pmc_1LRcNhCPuHcGXdFKlIjueJUS\",\"parent\":null},\"payment_method_options\":{\"card\":{\"installments\":null,\"mandate_options\":null,\"network\":null,\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"processing\":null,\"receipt_email\":null,\"review\":null,\"setup_future_usage\":null,\"shipping\":null,\"source\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null},\"code\":200}', '2023-10-27 06:22:45', '2023-10-27 06:33:15'),
(17, 7, 1, 1, 'SIO1698390297', 200.00, 0.00, 'done', NULL, '2023-11-18 20:10:45', '2023-11-18 20:11:01'),
(18, 6, 0, 1, 'SIO1698364331', 200.00, 0.00, 'done', NULL, '2023-11-19 05:47:51', '2023-11-19 05:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_rates`
--

CREATE TABLE `shipping_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `origin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `destination_id` bigint(20) UNSIGNED DEFAULT NULL,
  `weight_start` double(8,2) DEFAULT NULL,
  `weight_end` double(8,2) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `length` double(8,2) DEFAULT NULL,
  `width` double(8,2) DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `pickup_cost_per_km` double(8,2) DEFAULT 0.00,
  `delivery_cost_per_km` double(8,2) DEFAULT 0.00,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_rates`
--

INSERT INTO `shipping_rates` (`id`, `name`, `origin_id`, `destination_id`, `weight_start`, `weight_end`, `price`, `length`, `width`, `height`, `pickup_cost_per_km`, `delivery_cost_per_km`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Lagos-Jos', 2, 1, 0.00, 10.00, 100.00, 10.00, 10.00, 5.00, 2.00, 3.00, 'No returns', '2023-10-06 17:06:33', '2023-10-09 09:21:32'),
(2, 'Minna-Lagos', 3, 2, 0.00, 10.00, 30.00, 10.00, 10.00, 19.00, 2.00, 4.00, 'No retuns', '2023-10-09 09:35:31', '2023-10-09 09:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `supported_banks`
--

CREATE TABLE `supported_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) NOT NULL,
  `extra_info` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supported_banks`
--

INSERT INTO `supported_banks` (`id`, `bank_code`, `bank_name`, `country_code`, `extra_info`, `created_at`, `updated_at`) VALUES
(1, 'CHASUS33XXX', 'JPMorgan', 'IT', NULL, NULL, NULL),
(2, 'ZEIBNGLA013', 'Zenith Bank', 'NG', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` enum('transfer') NOT NULL DEFAULT 'transfer',
  `beneficiary_id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_account_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `transaction_amount` double NOT NULL,
  `beneficiary_account_number` varchar(255) NOT NULL,
  `beneficiary_account_name` varchar(255) NOT NULL,
  `beneficiary_bank_name` varchar(255) NOT NULL,
  `beneficiary_bank_code` varchar(255) NOT NULL,
  `payment_provider` varchar(255) NOT NULL,
  `transaction_status` enum('success','pending','failed','refunded') NOT NULL DEFAULT 'success',
  `transaction_reference` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_intent` varchar(255) NOT NULL,
  `payment_intent_data` text DEFAULT NULL,
  `webhook_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_limits`
--

CREATE TABLE `transaction_limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `monthly_limit` double(8,2) DEFAULT NULL,
  `daily_limit` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_limits`
--

INSERT INTO `transaction_limits` (`id`, `country_code`, `monthly_limit`, `daily_limit`, `created_at`, `updated_at`) VALUES
(3, 'IT', 9999.00, 999.00, '2024-05-28 14:52:54', '2024-05-28 14:52:54'),
(4, 'NG', 9999.00, 999.00, '2024-05-28 14:52:54', '2024-05-28 14:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_intent`
--

CREATE TABLE `transfer_intent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `intent_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_intent_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_type` enum('user','courier','dispatcher','admin','mobile') NOT NULL DEFAULT 'user',
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` bigint(20) UNSIGNED DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `kyc_level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `user_type`, `blocked`, `remember_token`, `created_at`, `updated_at`, `country`, `country_code`, `phone`, `photo`, `kyc_level`) VALUES
(1, 'Walshak Timothy Apollos', 'admin@siopay.eu', NULL, '$2y$10$Hrrz.cOVHDzxffWsZQdgHO6mB7ibWyAtM4Aa/i6eeVf/S.zk8y.22', 1, 'admin', 0, NULL, '2023-10-02 05:14:50', '2023-10-10 08:45:58', NULL, 'IT', NULL, NULL, 1),
(2, 'Walshak Timothy Apollos', 'agent@siopay.eu', NULL, '$2y$10$9XdDeRDsPHVfiLznXJ9HUO1GlEmuEPg9yjxXJog3H5w4p.B6W5FTm', 1, 'mobile', 0, NULL, '2023-10-10 11:33:50', '2023-10-10 13:31:12', NULL, 'IT', NULL, NULL, 1),
(3, 'Walshak Timothy Apollos', 'kycadmin@siopay.eu', NULL, '$2y$10$VyB44UUydJUsIXr8P4QJuejUXJzxu3B2Y463owkkUbhNQ0fZfhR4a', 1, 'admin', 0, NULL, '2023-11-19 16:55:31', '2023-11-19 16:55:31', NULL, 'IT', NULL, NULL, 1),
(4, 'Walshak Timothy Apollos', 'accountsadmin@siopay.eu', NULL, '$2y$10$LLNhRSBOhJJ1h4iOZFe3AOSOmSLnD2nGuFUHQF7so6bvZ0Pej65oS', 1, 'admin', 0, NULL, '2023-11-19 17:03:21', '2023-11-19 17:03:21', NULL, 'IT', NULL, NULL, 1),
(5, 'Kefas Kingsley', 'kingkc@gmail.com', NULL, '$2y$10$CHThc8th.KEqJOAvXHyv8.qxzoa8L4OJFLaB7..bx7QZ6g6CHpw6e', 1, 'mobile', 0, NULL, '2024-05-28 11:56:04', '2024-05-28 11:56:04', NULL, 'IT', '2348038752155', NULL, 1),
(6, 'Dev User', 'dev@siopay.eu', NULL, '$2y$10$iEk6ZHfjvhEey4SYHB0AvOrO7BYCTgnC3tgDacLPwjGuCYlFDp3Ui', 1, 'mobile', 0, NULL, '2024-05-29 10:37:37', '2024-05-29 10:37:37', NULL, 'IT', '+411234567891123', NULL, 1),
(7, 'suleiman ismoil', 'jocsmart@outlok.com', NULL, '$2y$10$YrUDIoBGLJ9AMQTf7QJIXOH/rOTC0O.q2qSNhhhtBZRrYUKKesdoS', 1, 'mobile', 0, NULL, '2024-06-15 20:09:49', '2024-06-15 20:09:49', NULL, 'IT', '+39', NULL, 1),
(8, 'man eoo', 'aw@siopay.eu', NULL, '$2y$10$64k0G8MY1ElH6B.pNYLcm.mtfWBendIIDB5yN/1A3hvUp8kNUGcDa', 1, 'mobile', 0, NULL, '2024-06-15 20:15:48', '2024-06-15 20:15:48', NULL, 'NG', '+2348067868384', NULL, 1),
(9, 'Samson Johnson', 'johnsonsamson23@gmail.com', NULL, '$2y$10$papQDR7hEy3Vw3IVlSlXTehUw2A6SJvPII5qa3c2uKiq1gyCgAgj6', 1, 'mobile', 0, NULL, '2024-06-18 17:00:18', '2024-06-18 17:00:18', NULL, 'NG', '+23407015100484', NULL, 1),
(10, 'Walshak Apollos', 'walshak1999@gmail.com', NULL, '$2y$10$Hi7yYkDUSO1mWZiFiZvVIuBcD.0ZawahXyHFxBsqg8U.yPxi6dga.', 1, 'mobile', 0, NULL, '2024-06-19 08:22:14', '2024-06-19 08:22:14', NULL, 'NG', '+2347050737402', NULL, 1),
(11, 'sulaimoj ismoil', 'jocsmart393510@gmail.com', NULL, '$2y$10$fSmfd1O1uHiDxtkI1gNvD.BMeehv4UZZolOiN3r49XTQpS26nCwY2', 1, 'mobile', 0, NULL, '2024-06-19 10:44:25', '2024-06-19 10:44:25', NULL, 'IT', '+41', NULL, 1),
(12, 'ghh kkkl', 'smart678683@gmail.com', NULL, '$2y$10$WEoiRXvvx/N2n9NGJJBRMunDwrnl1KYXDzsJT09sQjSrF6Wc75mae', 1, 'mobile', 0, NULL, '2024-06-19 10:49:57', '2024-06-19 10:49:57', NULL, 'IT', '+418067868384333', NULL, 1),
(13, 'ismoil sulaimon', 'joc@gmail.com', NULL, '$2y$10$Wbdr4YM8r4lous07v.URFu63IZSE6xsOyaOlMIFC3Pr1gTXa72GX2', 1, 'mobile', 0, NULL, '2024-06-19 10:52:04', '2024-06-19 10:52:04', NULL, 'IT', '+413333333333333', NULL, 1),
(14, 'gg ggg', 'info@siopay.eu', NULL, '$2y$10$YLqMnk3a18YHKAx.mBcwhuOLVToNJ8QuvlCJeP9Yus7ux9v48oFeS', 1, 'mobile', 0, NULL, '2024-06-19 13:29:58', '2024-06-19 13:29:58', NULL, 'IT', '+417386838584686', NULL, 1),
(15, 'sulaimon ismoil', 'jocsmart@outlook.com', NULL, '$2y$10$SaCrjbSeTt1s/MS4qqkYDu7Gin8FwR4kxw8wTzmcbIHpN1FZZRPwy', 1, 'mobile', 0, NULL, '2024-06-19 13:36:14', '2024-06-19 13:36:14', NULL, 'IT', '+413666666666633', NULL, 1),
(16, 'Samson Johnson', 'bb2537a@gmail.com', NULL, '$2y$10$gM0opVoFyQFYMVyyH52iH.ilEImMjNTiHrW6SvPdJP1Ye5p0PHFKO', 1, 'mobile', 0, NULL, '2024-06-24 12:49:59', '2024-06-24 12:49:59', NULL, 'NG', '+2347015100484', NULL, 1),
(17, 'sulaimon ismoil', 'smart678684@gmail.com', NULL, '$2y$10$BYuLdpPyaR8GWUt1EMF4MeR6Po6eEkL9pN9bFS4v4HVEAhkkjNSnS', 1, 'mobile', 0, NULL, '2024-06-25 06:35:09', '2024-06-25 06:35:09', NULL, 'NG', '+23437709936153', NULL, 1),
(18, 'ismo sulaimon', 'siopay67@gmail.com', NULL, '$2y$10$0FETTR1dOpuTDdq/GIy5C.zpB1c5m07.BWbdt0XINbdiP0A7tfwYC', 1, 'mobile', 0, NULL, '2024-06-25 06:38:23', '2024-06-25 06:38:23', NULL, 'IT', '+3933333333333', NULL, 1),
(19, 'Dev User', 'dev@gmail.com', NULL, '$2y$10$VCJDo2Jy4diB.jRuTNUs0.5MJY2661wpPSUsZrX0JnIeD9Sguq9ua', 1, 'mobile', 0, NULL, '2024-06-29 08:00:22', '2024-06-29 08:00:22', NULL, 'IT', '+3901123456789', NULL, 1),
(20, 'wal tim', 'it@siopay.eu', NULL, '$2y$10$/J48Uu1dYuae7s1X1rXLQuAUJID5vU3I48dWvDTL5WD5E28BhLUkO', 1, 'mobile', 0, NULL, '2024-06-29 13:01:21', '2024-06-29 13:01:21', NULL, 'NG', '+2347050737402', NULL, 1),
(21, 'sulaimon ismoil', 'sio67@gmail.com', NULL, '$2y$10$I7itVYZ8qh9FRiwv9jcnyexjqBjy3QLzc8eVyQTFnhMRyvbLif.pa', 1, 'mobile', 0, NULL, '2024-07-07 09:08:24', '2024-07-07 09:08:24', NULL, 'IT', '+3937777777777', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_funds`
--

CREATE TABLE `user_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transId` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `currency` varchar(255) NOT NULL DEFAULT 'EUR',
  `description` varchar(255) DEFAULT NULL,
  `flag` enum('debit','credit') NOT NULL DEFAULT 'debit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_funds`
--

INSERT INTO `user_funds` (`id`, `transId`, `user_id`, `amount`, `currency`, `description`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'pi_3ODUkpCPuHcGXdFK0JAY3yhu', 1, 300000, 'EUR', 'Wallet Funding', 'debit', '2023-11-17 16:10:27', '2023-11-17 16:10:27'),
(2, 'pi_3ODVmuCPuHcGXdFK0OqQI094', 1, 1000, 'EUR', 'Wallet Funding', 'debit', '2023-11-17 16:25:30', '2023-11-17 16:25:30'),
(3, 'SIO1700339248', 1, 0, 'EUR', 'Order SIO1700339248', 'credit', '2023-11-18 19:56:02', '2023-11-18 19:56:02'),
(4, 'SIO1700339248', 1, 1.5, 'EUR', 'Order CommisionSIO1700339248', 'debit', '2023-11-18 19:56:02', '2023-11-18 19:56:02'),
(5, 'SIO1698504884', 1, 0, 'EUR', 'Order SIO1698504884', 'credit', '2023-11-18 20:00:06', '2023-11-18 20:00:06'),
(6, 'SIO1698504884', 1, 1.5, 'EUR', 'Order CommisionSIO1698504884', 'debit', '2023-11-18 20:00:06', '2023-11-18 20:00:06'),
(7, 'SIO1698390815', 1, 0, 'EUR', 'Order SIO1698390815', 'credit', '2023-11-18 20:03:55', '2023-11-18 20:03:55'),
(8, 'SIO1698390815', 1, 1.5, 'EUR', 'Order CommisionSIO1698390815', 'debit', '2023-11-18 20:03:55', '2023-11-18 20:03:55'),
(9, 'SIO1698390815', 1, 0, 'EUR', 'Order SIO1698390815', 'credit', '2023-11-18 20:06:56', '2023-11-18 20:06:56'),
(10, 'SIO1698390815', 1, 1.5, 'EUR', 'Order CommisionSIO1698390815', 'debit', '2023-11-18 20:06:56', '2023-11-18 20:06:56'),
(11, 'SIO1698390297', 1, 100, 'EUR', 'Order SIO1698390297', 'credit', '2023-11-18 20:09:03', '2023-11-18 20:09:03'),
(12, 'SIO1698390297', 1, 3, 'EUR', 'Order CommisionSIO1698390297', 'debit', '2023-11-18 20:09:03', '2023-11-18 20:09:03'),
(13, 'SIO1698390297', 1, 100, 'EUR', 'Order SIO1698390297', 'credit', '2023-11-18 20:10:45', '2023-11-18 20:10:45'),
(14, 'SIO1698390297', 1, 3, 'EUR', 'Order CommisionSIO1698390297', 'debit', '2023-11-18 20:10:45', '2023-11-18 20:10:45'),
(15, 'SIO1698364331', 1, 100, 'EUR', 'Order SIO1698364331', 'credit', '2023-11-19 05:47:51', '2023-11-19 05:47:51'),
(16, 'SIO1698364331', 1, 3, 'EUR', 'Order CommisionSIO1698364331', 'debit', '2023-11-19 05:47:51', '2023-11-19 05:47:51'),
(17, 'SIO-EUR34125856', 1, 55, 'EUR', 'EU Fund Order Order SIO-EUR34125856', 'credit', '2023-11-19 07:37:15', '2023-11-19 07:37:15'),
(18, 'SIO-EUR34125856', 1, 1.1, 'EUR', 'EU Fund Order Commision SIO-EUR34125856', 'debit', '2023-11-19 07:37:15', '2023-11-19 07:37:15'),
(19, 'SIO-EUR34125856', 1, 55, 'EUR', 'EU Fund Order Order SIO-EUR34125856', 'credit', '2023-11-19 07:38:39', '2023-11-19 07:38:39'),
(20, 'SIO-EUR34125856', 1, 1.1, 'EUR', 'EU Fund Order Commision SIO-EUR34125856', 'debit', '2023-11-19 07:38:39', '2023-11-19 07:38:39'),
(21, 'SIO-EUR34125856', 1, 55, 'EUR', 'EU Fund Order Order SIO-EUR34125856', 'credit', '2023-11-19 07:39:29', '2023-11-19 07:39:29'),
(22, 'SIO-EUR34125856', 1, 1.1, 'EUR', 'EU Fund Order Commision SIO-EUR34125856', 'debit', '2023-11-19 07:39:29', '2023-11-19 07:39:29'),
(23, 'SIO-EUR34125856', 1, 55, 'EUR', 'EU Fund Order Order SIO-EUR34125856', 'credit', '2023-11-19 07:40:13', '2023-11-19 07:40:13'),
(24, 'SIO-EUR34125856', 1, 1.1, 'EUR', 'EU Fund Order Commision SIO-EUR34125856', 'debit', '2023-11-19 07:40:13', '2023-11-19 07:40:13'),
(25, 'SIO-INTL80180491', 1, 200, 'EUR', 'EU Fund Order Order SIO-INTL80180491', 'credit', '2023-11-19 07:42:41', '2023-11-19 07:42:41'),
(26, 'SIO-INTL80180491', 1, 4, 'EUR', 'EU Fund Order Commision SIO-INTL80180491', 'debit', '2023-11-19 07:42:41', '2023-11-19 07:42:41'),
(27, 'SIO-INTL80180491', 1, 200, 'EUR', 'EU Fund Order Order SIO-INTL80180491', 'credit', '2023-11-19 07:43:07', '2023-11-19 07:43:07'),
(28, 'SIO-INTL80180491', 1, 4, 'EUR', 'EU Fund Order Commision SIO-INTL80180491', 'debit', '2023-11-19 07:43:07', '2023-11-19 07:43:07'),
(29, 'SIO-INTL80180491', 1, 200, 'EUR', 'EU Fund Order Order SIO-INTL80180491', 'credit', '2023-11-19 07:43:10', '2023-11-19 07:43:10'),
(30, 'SIO-INTL80180491', 1, 4, 'EUR', 'EU Fund Order Commision SIO-INTL80180491', 'debit', '2023-11-19 07:43:10', '2023-11-19 07:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_logs`
--

CREATE TABLE `user_login_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `device` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_login_logs`
--

INSERT INTO `user_login_logs` (`id`, `user_id`, `ip_address`, `device`, `location`, `country`, `created_at`, `updated_at`) VALUES
(1, 5, '127.0.0.1', '0', 'Local/Reserved IP', NULL, '2024-05-28 12:06:50', '2024-05-28 12:06:50'),
(2, 5, '127.0.0.1', '----', 'Local/Reserved IP', NULL, '2024-05-28 12:08:39', '2024-05-28 12:08:39'),
(3, 5, '127.0.0.1', '----', 'Local/Reserved IP', NULL, '2024-05-28 15:24:15', '2024-05-28 15:24:15'),
(4, 5, '127.0.0.1', '----', 'Local/Reserved IP', 'Local', '2024-05-29 08:55:01', '2024-05-29 08:55:01'),
(5, 5, '102.88.68.120', '----', 'Lagos, Nigeria', 'NG', '2024-05-29 10:13:38', '2024-05-29 10:13:38'),
(6, 5, '102.88.68.120', '----', 'Lagos, Nigeria', 'NG', '2024-05-29 10:29:18', '2024-05-29 10:29:18'),
(7, 6, '102.91.49.220', '----', 'Lagos, Nigeria', 'NG', '2024-05-29 10:37:52', '2024-05-29 10:37:52'),
(8, 6, '197.210.77.98', '----', 'Lagos, Nigeria', 'NG', '2024-05-30 07:50:23', '2024-05-30 07:50:23'),
(9, 6, '105.112.67.237', '----', 'Lagos, Nigeria', 'NG', '2024-05-30 13:22:19', '2024-05-30 13:22:19'),
(10, 1, '105.112.18.113', '----', 'Lagos, Nigeria', 'NG', '2024-06-14 16:00:20', '2024-06-14 16:00:20'),
(11, 6, '102.91.47.61', '----', 'Lagos, Nigeria', 'NG', '2024-06-15 05:38:33', '2024-06-15 05:38:33'),
(12, 6, '102.91.47.61', '----', 'Lagos, Nigeria', 'NG', '2024-06-15 08:01:29', '2024-06-15 08:01:29'),
(13, 6, '102.91.47.61', '----', 'Lagos, Nigeria', 'NG', '2024-06-15 09:12:06', '2024-06-15 09:12:06'),
(14, 6, '102.91.47.61', '----', 'Lagos, Nigeria', 'NG', '2024-06-15 10:14:51', '2024-06-15 10:14:51'),
(15, 6, '105.112.26.246', '----', 'Lagos, Nigeria', 'NG', '2024-06-15 13:09:15', '2024-06-15 13:09:15'),
(16, 6, '134.0.4.29', '----', 'Milan, Italy', 'IT', '2024-06-15 19:31:46', '2024-06-15 19:31:46'),
(17, 8, '134.0.4.29', '----', 'Milan, Italy', 'IT', '2024-06-15 20:16:21', '2024-06-15 20:16:21'),
(18, 6, '217.171.75.108', '----', 'Rome, Italy', 'IT', '2024-06-16 07:15:16', '2024-06-16 07:15:16'),
(19, 5, '197.211.61.139', '----', 'Lagos, Nigeria', 'NG', '2024-06-18 12:56:45', '2024-06-18 12:56:45'),
(20, 6, '197.211.61.139', '----', 'Lagos, Nigeria', 'NG', '2024-06-18 13:08:42', '2024-06-18 13:08:42'),
(21, 2, '197.211.61.139', '----', 'Lagos, Nigeria', 'NG', '2024-06-18 13:12:09', '2024-06-18 13:12:09'),
(22, 2, '197.211.61.139', '----', 'Lagos, Nigeria', 'NG', '2024-06-18 13:13:39', '2024-06-18 13:13:39'),
(23, 2, '197.211.58.219', '----', 'Lagos, Nigeria', 'NG', '2024-06-18 13:34:43', '2024-06-18 13:34:43'),
(24, 2, '197.211.59.157', '----', 'Lagos, Nigeria', 'NG', '2024-06-18 13:35:06', '2024-06-18 13:35:06'),
(25, 6, '197.210.70.79', '----', 'Lagos, Nigeria', 'NG', '2024-06-18 16:57:36', '2024-06-18 16:57:36'),
(26, 9, '197.210.70.79', '----', 'Lagos, Nigeria', 'NG', '2024-06-18 17:00:39', '2024-06-18 17:00:39'),
(27, 9, '102.91.69.68', '----', 'Abuja, Nigeria', 'NG', '2024-06-19 05:45:10', '2024-06-19 05:45:10'),
(28, 10, '105.112.201.6', '----', 'Lagos, Nigeria', 'NG', '2024-06-19 08:22:29', '2024-06-19 08:22:29'),
(29, 10, '105.112.201.29', '----', 'Lagos, Nigeria', 'NG', '2024-06-19 09:11:11', '2024-06-19 09:11:11'),
(30, 10, '105.112.201.29', '----', 'Lagos, Nigeria', 'NG', '2024-06-19 09:52:25', '2024-06-19 09:52:25'),
(31, 10, '105.112.201.29', '----', 'Lagos, Nigeria', 'NG', '2024-06-19 09:54:56', '2024-06-19 09:54:56'),
(32, 10, '105.112.199.88', '----', 'Lagos, Nigeria', 'NG', '2024-06-19 09:56:51', '2024-06-19 09:56:51'),
(33, 10, '105.112.199.88', '----', 'Lagos, Nigeria', 'NG', '2024-06-19 09:59:27', '2024-06-19 09:59:27'),
(34, 10, '105.112.199.88', '----', 'Lagos, Nigeria', 'NG', '2024-06-19 10:05:51', '2024-06-19 10:05:51'),
(35, 10, '105.112.199.88', '----', 'Lagos, Nigeria', 'NG', '2024-06-19 10:07:41', '2024-06-19 10:07:41'),
(36, 13, '82.60.160.227', '----', 'Polverara, Italy', 'IT', '2024-06-19 10:52:25', '2024-06-19 10:52:25'),
(37, 14, '82.60.160.227', '----', 'Polverara, Italy', 'IT', '2024-06-19 13:30:43', '2024-06-19 13:30:43'),
(38, 15, '82.60.160.227', '----', 'Polverara, Italy', 'IT', '2024-06-19 13:36:43', '2024-06-19 13:36:43'),
(39, 15, '5.77.102.153', '----', 'Milan, Italy', 'IT', '2024-06-19 19:21:04', '2024-06-19 19:21:04'),
(40, 9, '102.91.5.219', '----', 'Lagos, Nigeria', 'NG', '2024-06-21 00:34:52', '2024-06-21 00:34:52'),
(41, 9, '102.91.5.219', '----', 'Lagos, Nigeria', 'NG', '2024-06-21 10:12:36', '2024-06-21 10:12:36'),
(42, 9, '102.91.47.150', '----', 'Lagos, Nigeria', 'NG', '2024-06-22 11:30:55', '2024-06-22 11:30:55'),
(43, 9, '102.91.47.150', '----', 'Lagos, Nigeria', 'NG', '2024-06-22 12:40:27', '2024-06-22 12:40:27'),
(44, 9, '102.91.47.150', '----', 'Lagos, Nigeria', 'NG', '2024-06-22 13:49:55', '2024-06-22 13:49:55'),
(45, 9, '102.91.47.150', '----', 'Lagos, Nigeria', 'NG', '2024-06-22 14:50:29', '2024-06-22 14:50:29'),
(46, 9, '102.91.47.150', '----', 'Lagos, Nigeria', 'NG', '2024-06-22 14:55:47', '2024-06-22 14:55:47'),
(47, 9, '102.91.47.150', '----', 'Lagos, Nigeria', 'NG', '2024-06-22 15:32:27', '2024-06-22 15:32:27'),
(48, 9, '102.91.47.150', '----', 'Lagos, Nigeria', 'NG', '2024-06-22 16:36:19', '2024-06-22 16:36:19'),
(49, 9, '102.91.47.150', '----', 'Lagos, Nigeria', 'NG', '2024-06-22 16:45:14', '2024-06-22 16:45:14'),
(50, 10, '105.112.198.145', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 11:54:05', '2024-06-24 11:54:05'),
(51, 10, '105.112.198.145', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 11:58:29', '2024-06-24 11:58:29'),
(52, 10, '105.112.198.145', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 12:06:30', '2024-06-24 12:06:30'),
(53, 10, '105.112.198.145', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 12:16:25', '2024-06-24 12:16:25'),
(54, 16, '197.210.77.104', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 12:50:10', '2024-06-24 12:50:10'),
(55, 16, '197.210.77.104', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 13:21:47', '2024-06-24 13:21:47'),
(56, 10, '105.112.182.246', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 13:43:46', '2024-06-24 13:43:46'),
(57, 10, '105.112.182.246', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 13:47:30', '2024-06-24 13:47:30'),
(58, 10, '105.112.182.246', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 13:59:12', '2024-06-24 13:59:12'),
(59, 10, '197.210.77.104', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 14:11:33', '2024-06-24 14:11:33'),
(60, 10, '197.210.77.104', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 14:29:06', '2024-06-24 14:29:06'),
(61, 10, '105.112.23.243', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 14:46:18', '2024-06-24 14:46:18'),
(62, 10, '105.112.198.113', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 16:36:19', '2024-06-24 16:36:19'),
(63, 10, '105.112.198.113', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 16:36:59', '2024-06-24 16:36:59'),
(64, 10, '105.112.71.154', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 16:53:27', '2024-06-24 16:53:27'),
(65, 10, '105.112.71.154', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 16:55:44', '2024-06-24 16:55:44'),
(66, 10, '197.210.77.104', '----', 'Lagos, Nigeria', 'NG', '2024-06-24 17:23:59', '2024-06-24 17:23:59'),
(67, 18, '82.60.160.227', '----', 'Polverara, Italy', 'IT', '2024-06-25 06:38:50', '2024-06-25 06:38:50'),
(68, 19, '105.112.236.41', '----', 'Minna, Nigeria', 'NG', '2024-06-29 08:11:55', '2024-06-29 08:11:55'),
(69, 19, '102.91.4.66', '----', 'Kabba, Nigeria', 'NG', '2024-06-29 08:13:07', '2024-06-29 08:13:07'),
(70, 20, '105.112.76.250', '----', 'Lagos, Nigeria', 'NG', '2024-06-29 13:01:41', '2024-06-29 13:01:41'),
(71, 9, '102.91.72.18', '----', 'Lagos, Nigeria', 'NG', '2024-07-06 12:52:48', '2024-07-06 12:52:48'),
(72, 9, '102.91.72.18', '----', 'Lagos, Nigeria', 'NG', '2024-07-06 14:25:09', '2024-07-06 14:25:09'),
(73, 10, '105.112.29.251', '----', 'Lagos, Nigeria', 'NG', '2024-07-06 22:01:24', '2024-07-06 22:01:24'),
(74, 21, '176.62.152.48', '----', 'Milan, Italy', 'IT', '2024-07-07 09:10:31', '2024-07-07 09:10:31'),
(75, 9, '102.91.4.87', '----', 'Abuja, Nigeria', 'NG', '2024-07-09 09:31:00', '2024-07-09 09:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `courier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive','decommisioned') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `walk_in_customers`
--

CREATE TABLE `walk_in_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `birthPlace` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `belfioreCode` varchar(255) DEFAULT NULL,
  `doc_type` varchar(255) DEFAULT NULL,
  `doc_num` varchar(255) DEFAULT NULL,
  `doc_front` varchar(255) DEFAULT NULL,
  `doc_back` varchar(255) DEFAULT NULL,
  `tax_code` varchar(255) DEFAULT NULL,
  `kyc_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `walk_in_customers`
--

INSERT INTO `walk_in_customers` (`id`, `surname`, `name`, `birthDate`, `birthPlace`, `gender`, `belfioreCode`, `doc_type`, `doc_num`, `doc_front`, `doc_back`, `tax_code`, `kyc_status`, `created_at`, `updated_at`, `email`, `phone`, `address`) VALUES
(1, 'Apollos', 'Walshak', '1985-12-10', NULL, 'M', NULL, 'tax_id', '123', NULL, NULL, NULL, 'rejected', '2023-10-26 22:52:11', '2023-10-28 05:47:03', NULL, NULL, NULL),
(2, 'Apollos', 'Walshak', '1985-12-10', NULL, 'M', NULL, 'EU Driving License / Patente Di Guida', '12344', 'doc_front_1698504884.png', 'doc_back_1698504884.png', 'RSSMRA85T10A562S', 'rejected', '2023-10-27 06:04:57', '2023-10-28 14:36:49', 'walshak1999@gmail.com', '07050737402', 'Elwazir Street,bosso\r\nVcm 105 Elwazir Estate'),
(4, 'Apollos', 'Walshak', '2023-11-01', NULL, 'm', NULL, 'ID Card / Carta Di Identità', '876666', NULL, NULL, 'nhhhh', 'rejected', '2023-11-18 19:27:28', '2024-07-26 06:15:52', NULL, NULL, NULL),
(5, 'Apollos', 'Walshak', '2023-11-19', NULL, 'm', NULL, 'Others / Altro', '7373', NULL, NULL, 'yyeeye', 'approved', '2023-11-19 07:37:08', '2024-06-29 08:55:25', 'walshak1999@gmail.com', '07050737402', 'Elwazir Street,bosso\r\nVcm 105 Elwazir Estate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `beneficiary_accounts`
--
ALTER TABLE `beneficiary_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiary_accounts_user_id_foreign` (`user_id`),
  ADD KEY `beneficiary_accounts_beneficiary_id_foreign` (`beneficiary_id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `couriers_user_id_foreign` (`user_id`),
  ADD KEY `couriers_current_location_foreign` (`current_location`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `dispatchers`
--
ALTER TABLE `dispatchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dispatchers_user_id_foreign` (`user_id`),
  ADD KEY `dispatchers_location_id_foreign` (`location_id`);

--
-- Indexes for table `e_u_funds_transfer_rates`
--
ALTER TABLE `e_u_funds_transfer_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_u_fund_transfer_orders`
--
ALTER TABLE `e_u_fund_transfer_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_u_fund_transfer_orders_walk_in_customer_id_foreign` (`walk_in_customer_id`),
  ADD KEY `e_u_fund_transfer_orders_customer_id_foreign` (`customer_id`),
  ADD KEY `e_u_fund_transfer_orders_dispatcher_id_foreign` (`dispatcher_id`),
  ADD KEY `e_u_fund_transfer_orders_e_u_funds_transfer_rate_id_foreign` (`e_u_funds_transfer_rate_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `intl_funds_transfer_rates`
--
ALTER TABLE `intl_funds_transfer_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intl_fund_transfer_orders`
--
ALTER TABLE `intl_fund_transfer_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intl_fund_transfer_orders_walk_in_customer_id_foreign` (`walk_in_customer_id`),
  ADD KEY `intl_fund_transfer_orders_customer_id_foreign` (`customer_id`),
  ADD KEY `intl_fund_transfer_orders_dispatcher_id_foreign` (`dispatcher_id`),
  ADD KEY `intl_fund_transfer_orders_e_u_funds_transfer_rate_id_foreign` (`e_u_funds_transfer_rate_id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kyc_user_id_foreign` (`user_id`),
  ADD KEY `kyc_document_type_id_foreign` (`document_type_id`),
  ADD KEY `kyc_proof_of_address_type_id_foreign` (`proof_of_address_type_id`);

--
-- Indexes for table `kyc_address_proof_types`
--
ALTER TABLE `kyc_address_proof_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_document_type`
--
ALTER TABLE `kyc_document_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `operation_countries`
--
ALTER TABLE `operation_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_tracking_id_unique` (`tracking_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_delivery_customer_id_foreign` (`delivery_customer_id`),
  ADD KEY `orders_courier_id_foreign` (`courier_id`),
  ADD KEY `orders_dispatcher_id_foreign` (`dispatcher_id`),
  ADD KEY `orders_shipping_rate_id_foreign` (`shipping_rate_id`),
  ADD KEY `orders_pickup_location_id_foreign` (`pickup_location_id`),
  ADD KEY `orders_delivery_location_id_foreign` (`delivery_location_id`),
  ADD KEY `orders_current_location_id_foreign` (`current_location_id`),
  ADD KEY `orders_batch_id_foreign` (`batch_id`),
  ADD KEY `orders_walk_in_customer_id_foreign` (`walk_in_customer_id`);

--
-- Indexes for table `order_batches`
--
ALTER TABLE `order_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_batches_dispatcher_id_foreign` (`dispatcher_id`),
  ADD KEY `order_batches_location_id_foreign` (`location_id`);

--
-- Indexes for table `order_packages`
--
ALTER TABLE `order_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_packages_order_id_foreign` (`order_id`);

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
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `shipping_rates`
--
ALTER TABLE `shipping_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_rates_origin_id_foreign` (`origin_id`),
  ADD KEY `shipping_rates_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `supported_banks`
--
ALTER TABLE `supported_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_beneficiary_id_foreign` (`beneficiary_id`),
  ADD KEY `transactions_beneficiary_account_id_foreign` (`beneficiary_account_id`);

--
-- Indexes for table `transaction_limits`
--
ALTER TABLE `transaction_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_intent`
--
ALTER TABLE `transfer_intent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_intent_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_funds`
--
ALTER TABLE `user_funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_funds_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_login_logs`
--
ALTER TABLE `user_login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_courier_id_foreign` (`courier_id`);

--
-- Indexes for table `walk_in_customers`
--
ALTER TABLE `walk_in_customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beneficiary_accounts`
--
ALTER TABLE `beneficiary_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dispatchers`
--
ALTER TABLE `dispatchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `e_u_funds_transfer_rates`
--
ALTER TABLE `e_u_funds_transfer_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_u_fund_transfer_orders`
--
ALTER TABLE `e_u_fund_transfer_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intl_funds_transfer_rates`
--
ALTER TABLE `intl_funds_transfer_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `intl_fund_transfer_orders`
--
ALTER TABLE `intl_fund_transfer_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kyc_address_proof_types`
--
ALTER TABLE `kyc_address_proof_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kyc_document_type`
--
ALTER TABLE `kyc_document_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operation_countries`
--
ALTER TABLE `operation_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_batches`
--
ALTER TABLE `order_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_packages`
--
ALTER TABLE `order_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_rates`
--
ALTER TABLE `shipping_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supported_banks`
--
ALTER TABLE `supported_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_limits`
--
ALTER TABLE `transaction_limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfer_intent`
--
ALTER TABLE `transfer_intent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_funds`
--
ALTER TABLE `user_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_login_logs`
--
ALTER TABLE `user_login_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `walk_in_customers`
--
ALTER TABLE `walk_in_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD CONSTRAINT `beneficiaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `beneficiary_accounts`
--
ALTER TABLE `beneficiary_accounts`
  ADD CONSTRAINT `beneficiary_accounts_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`),
  ADD CONSTRAINT `beneficiary_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `couriers`
--
ALTER TABLE `couriers`
  ADD CONSTRAINT `couriers_current_location_foreign` FOREIGN KEY (`current_location`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `couriers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `dispatchers`
--
ALTER TABLE `dispatchers`
  ADD CONSTRAINT `dispatchers_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `dispatchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `e_u_fund_transfer_orders`
--
ALTER TABLE `e_u_fund_transfer_orders`
  ADD CONSTRAINT `e_u_fund_transfer_orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `e_u_fund_transfer_orders_dispatcher_id_foreign` FOREIGN KEY (`dispatcher_id`) REFERENCES `dispatchers` (`id`),
  ADD CONSTRAINT `e_u_fund_transfer_orders_e_u_funds_transfer_rate_id_foreign` FOREIGN KEY (`e_u_funds_transfer_rate_id`) REFERENCES `e_u_funds_transfer_rates` (`id`),
  ADD CONSTRAINT `e_u_fund_transfer_orders_walk_in_customer_id_foreign` FOREIGN KEY (`walk_in_customer_id`) REFERENCES `walk_in_customers` (`id`);

--
-- Constraints for table `intl_fund_transfer_orders`
--
ALTER TABLE `intl_fund_transfer_orders`
  ADD CONSTRAINT `intl_fund_transfer_orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `intl_fund_transfer_orders_dispatcher_id_foreign` FOREIGN KEY (`dispatcher_id`) REFERENCES `dispatchers` (`id`),
  ADD CONSTRAINT `intl_fund_transfer_orders_e_u_funds_transfer_rate_id_foreign` FOREIGN KEY (`e_u_funds_transfer_rate_id`) REFERENCES `e_u_funds_transfer_rates` (`id`),
  ADD CONSTRAINT `intl_fund_transfer_orders_walk_in_customer_id_foreign` FOREIGN KEY (`walk_in_customer_id`) REFERENCES `walk_in_customers` (`id`);

--
-- Constraints for table `kyc`
--
ALTER TABLE `kyc`
  ADD CONSTRAINT `kyc_document_type_id_foreign` FOREIGN KEY (`document_type_id`) REFERENCES `kyc_document_type` (`id`),
  ADD CONSTRAINT `kyc_proof_of_address_type_id_foreign` FOREIGN KEY (`proof_of_address_type_id`) REFERENCES `kyc_address_proof_types` (`id`),
  ADD CONSTRAINT `kyc_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `order_batches` (`id`),
  ADD CONSTRAINT `orders_courier_id_foreign` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`),
  ADD CONSTRAINT `orders_current_location_id_foreign` FOREIGN KEY (`current_location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_delivery_customer_id_foreign` FOREIGN KEY (`delivery_customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_delivery_location_id_foreign` FOREIGN KEY (`delivery_location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `orders_dispatcher_id_foreign` FOREIGN KEY (`dispatcher_id`) REFERENCES `dispatchers` (`id`),
  ADD CONSTRAINT `orders_pickup_location_id_foreign` FOREIGN KEY (`pickup_location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `orders_shipping_rate_id_foreign` FOREIGN KEY (`shipping_rate_id`) REFERENCES `shipping_rates` (`id`),
  ADD CONSTRAINT `orders_walk_in_customer_id_foreign` FOREIGN KEY (`walk_in_customer_id`) REFERENCES `walk_in_customers` (`id`);

--
-- Constraints for table `order_batches`
--
ALTER TABLE `order_batches`
  ADD CONSTRAINT `order_batches_dispatcher_id_foreign` FOREIGN KEY (`dispatcher_id`) REFERENCES `dispatchers` (`id`),
  ADD CONSTRAINT `order_batches_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `order_packages`
--
ALTER TABLE `order_packages`
  ADD CONSTRAINT `order_packages_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `shipping_rates`
--
ALTER TABLE `shipping_rates`
  ADD CONSTRAINT `shipping_rates_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `shipping_rates_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_beneficiary_account_id_foreign` FOREIGN KEY (`beneficiary_account_id`) REFERENCES `beneficiary_accounts` (`id`),
  ADD CONSTRAINT `transactions_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transfer_intent`
--
ALTER TABLE `transfer_intent`
  ADD CONSTRAINT `transfer_intent_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_funds`
--
ALTER TABLE `user_funds`
  ADD CONSTRAINT `user_funds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_courier_id_foreign` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
