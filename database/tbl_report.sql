-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2026 at 11:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hfaml_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `report_id` int(11) NOT NULL,
  `report_title` varchar(1000) NOT NULL,
  `report_type` varchar(500) NOT NULL,
  `report_date` date NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `report_link` varchar(1000) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`report_id`, `report_title`, `report_type`, `report_date`, `remarks`, `report_link`, `created_at`, `updated_at`) VALUES
(1, 'Annual-Report_2019-of-HFAML-ACME-Employees’-Unit-Fund', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/annual-report-2019-of-hfaml-acme-employees-unit-fund-1786961003-1417.pdf', '2026-08-17', '2026-08-17'),
(2, 'Annual-Reprot-2019-of-HFAML-Unit-Fund', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/annual-reprot-2019-of-hfaml-unit-fund-1786961003-2386.pdf', '2026-08-17', '2026-08-17'),
(3, 'Annual Reprot 2019 of HFAML Unit Fund', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/annual-reprot-2019-of-hfaml-unit-fund-1786961003-8460.pdf', '2026-08-17', '2026-08-17'),
(4, 'Annual-Audited-Accounts-HFSUF-2022', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/annual-audited-accounts-hfsuf-2022-1786961003-3337.pdf', '2026-08-17', '2026-08-17'),
(5, 'Annual-Audited-Accounts-HF-ACME-2022', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/annual-audited-accounts-hf-acme-2022-1786961003-4294.pdf', '2026-08-17', '2026-08-17'),
(6, 'Annual-Audited-Report-HFUF-2022', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/annual-audited-report-hfuf-2022-1786961003-4854.pdf', '2026-08-17', '2026-08-17'),
(7, 'Annual-Audited-Financial-Statement-2020-HFAML-ACME-Employees-Unit-Fund', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/annual-audited-financial-statement-2020-hfaml-acme-employees-unit-fund-1786961003-7535.pdf', '2026-08-17', '2026-08-17'),
(8, 'Annual-Audited-Financial-Statement-2020-HFAML-Unit-Fund', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/annual-audited-financial-statement-2020-hfaml-unit-fund-1786961003-4866.pdf', '2026-08-17', '2026-08-17'),
(9, 'Advertise_Annual-Report_Feb-12-2019', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/advertise-annual-report-feb-12-2019-1786961003-7929.pdf', '2026-08-17', '2026-08-17'),
(10, 'SHARIAH_June-30_-2026-Sectorwise-Portfolio', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/shariah-june-30-2026-sectorwise-portfolio-1786961003-1141.pdf', '2026-08-17', '2026-08-17'),
(11, 'ACME_June-30_-2026-Sectorwise-Portfolio', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/acme-june-30-2026-sectorwise-portfolio-1786961003-2649.pdf', '2026-08-17', '2026-08-17'),
(12, 'HFUF_June-30_-2026-Sectorwise-Portfolio', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/hfuf-june-30-2026-sectorwise-portfolio-1786961003-9614.pdf', '2026-08-17', '2026-08-17'),
(13, 'ACME-1st-Quater-Accounts-2026', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/acme-1st-quater-accounts-2026-1786961003-3391.pdf', '2026-08-17', '2026-08-17'),
(14, 'SUF-1st-Quater-Accounts-2026', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/suf-1st-quater-accounts-2026-1786961003-5361.pdf', '2026-08-17', '2026-08-17'),
(15, 'HFUF-1st-Quater-Accounts-2026', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/hfuf-1st-quater-accounts-2026-1786961003-5904.pdf', '2026-08-17', '2026-08-17'),
(16, 'SHARIAH_March-31_-2026-Sectorwise-Portfolio', 'Annual Reports', '2026-08-17', 'Uploaded report', 'reports/shariah-march-31-2026-sectorwise-portfolio-1786961003-2968.pdf', '2026-08-17', '2026-08-17'),
(17, '30-09-2024-HFUF-Financial-Position', 'Quarterly Disclosures', '2026-08-17', 'Uploaded report', 'reports/30-09-2024-hfuf-financial-position-1786962461-3420.pdf', '2026-08-17', '2026-08-17'),
(18, '30-09-2024-HFUF-Financial-Position-1', 'Quarterly Disclosures', '2026-08-17', 'Uploaded report', 'reports/30-09-2024-hfuf-financial-position-1-1786962461-4102.pdf', '2026-08-17', '2026-08-17'),
(19, '30-09-2024-SUF-Financial-Position', 'Quarterly Disclosures', '2026-08-17', 'Uploaded report', 'reports/30-09-2024-suf-financial-position-1786962461-7161.pdf', '2026-08-17', '2026-08-17'),
(20, 'ACME_March-31_Sectorwise-Portfolio', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-march-31-sectorwise-portfolio-1786962591-7438.pdf', '2026-08-17', '2026-08-17'),
(21, 'ACME_Portfolio_30_June-21', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-portfolio-30-june-21-1786962591-4061.pdf', '2026-08-17', '2026-08-17'),
(22, 'ACME_Portfolio_30_September-21', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-portfolio-30-september-21-1786962591-2168.pdf', '2026-08-17', '2026-08-17'),
(23, 'ACME_Portfolio_30-June-22', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-portfolio-30-june-22-1786962591-9675.pdf', '2026-08-17', '2026-08-17'),
(24, 'ACME_Portfolio_31_December-21', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-portfolio-31-december-21-1786962591-3533.pdf', '2026-08-17', '2026-08-17'),
(25, 'ACME_September_30_-2025-Sectorwise-Portfolio', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-september-30-2025-sectorwise-portfolio-1786963925-3651.pdf', '2026-08-17', '2026-08-17'),
(26, 'ACME_September_30_Sectorwise-Portfolio 2023', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-september-30-sectorwise-portfolio-2023-1786963925-2273.pdf', '2026-08-17', '2026-08-17'),
(27, 'ACME_September_30_Sectorwise-Portfolio', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-september-30-sectorwise-portfolio-1786963925-1818.pdf', '2026-08-17', '2026-08-17'),
(28, 'ACME_September_30_Sectorwise-Portfolio-1', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-september-30-sectorwise-portfolio-1-1786963925-3828.pdf', '2026-08-17', '2026-08-17'),
(29, 'ACME_September_30_Sectorwise-Portfolio-2024', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-september-30-sectorwise-portfolio-2024-1786963925-4565.pdf', '2026-08-17', '2026-08-17'),
(30, 'ACME_September_30_Sectorwise-Portfolio-2024-1', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-september-30-sectorwise-portfolio-2024-1-1786963925-1505.pdf', '2026-08-17', '2026-08-17'),
(31, 'ACME-1st-Quater-Accounts-2026', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-1st-quater-accounts-2026-1786963925-5992.pdf', '2026-08-17', '2026-08-17'),
(32, 'ACME-3rd-Quarterly-Accounts-2025', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-3rd-quarterly-accounts-2025-1786963925-4326.pdf', '2026-08-17', '2026-08-17'),
(33, 'ACME-30-06-2024-Financial-Position', 'Price Sensitive Info', '2026-08-17', '', 'reports/acme-30-06-2024-financial-position-1786963925-6920.pdf', '2026-08-17', '2026-08-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
