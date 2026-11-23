-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2026 at 02:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finals_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Juan Miguel Santos', 'juan.santos@example.com', '0917-555-0101', '2026-11-23 00:42:12'),
(2, 'Maria Clara Reyes', 'mariaclara.reyes@example.com', '0918-555-0102', '2026-11-23 00:42:19'),
(3, 'Rafael Antonio Cruz', 'rafael.cruz@school.edu.eu', '0919-555-0103', '2026-11-23 00:42:28'),
(4, 'Sofia Isabel Mendoza', 'sofia.mendoza@example.com', '0920-555-0104', '2026-11-23 00:42:46'),
(5, 'Gabriel Luis Bautista', 'gabriel.bautista@example.com', '0927-555-0105', '2026-11-23 00:42:54'),
(6, 'Camille Andrea Garcia', 'camille.garcia@try.com', '0928-555-0106', '2026-11-23 00:43:07'),
(7, 'Marco Paolo Villanueva', 'marco.villanueva@gmail.com', '0935-555-0107', '2026-11-23 00:43:18'),
(8, 'Bea Therese Aquino', 'bea.aquino@yahoo.com', '0939-555-0108', '2026-11-23 00:43:30'),
(9, 'Christian Jose Ramos', 'christian.ramos@outlook.com', '0945-555-0109', '2026-11-23 00:43:43'),
(10, 'Althea Mae Torres', 'althea.torres@qwerty.com', '0956-555-0110', '2026-11-23 00:43:55');

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
(1, '2026_11_20_000000_seed_default_staff_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock_quantity`, `image`, `created_at`) VALUES
(1, 'Grand Theft Auto VI – Standard Edition (PS5)', 4990.00, 50, 'products/PLtRLbdAMHZEbx1gtC3pdaFddtJI1sSApNcnCyuI.jpg', '2026-11-23 00:24:47'),
(2, 'Grand Theft Auto VI – Standard Edition (Xbox Series X|S)', 4990.00, 29, 'products/Kf1Zs29ehdCVH44jZH4dFD64J6xsL6GPfd1owLzz.webp', '2026-11-23 00:25:50'),
(3, 'The Legend of Zelda: Ocarina of Time (Nintendo Switch 2)', 4295.00, 40, 'products/dyBBoFTqHakbXpodMDEYI3jfh7JYWy5zDF3dkcP5.jpg', '2026-11-23 00:26:56'),
(4, 'Stellar Blade: Complete Edition (Nintendo Switch 2)', 2850.00, 1, 'products/N0wiQx769hv9862W0YDJeDnQkH2EW7G225UkmBH3.jpg', '2026-11-23 00:27:33'),
(5, 'Metaphor: ReFantazio (Nintendo Switch 2)', 1068.00, 14, 'products/A4ZIQjr7kC3x7LcgNOEeQai7OOu3epkyvCv5XsQ9.jpg', '2026-11-23 00:28:20'),
(6, 'Halo: Campaign Evolved (PS5)', 3295.00, 20, 'products/1b6EdEozhtILoPzO1YGi9T8OTopJZPpRgxMMNUvl.jpg', '2026-11-23 00:29:28'),
(7, 'Resident Evil Requiem (PS5)', 3295.00, 28, 'products/xl245iaT6WKsps5b6yZhqleTc2kxYlZYHeWX702I.jpg', '2026-11-23 00:29:58'),
(8, 'Grand Theft Auto V – Standard Edition (PS5)', 3500.00, 12, 'products/HICw0rRnxTLtYCWbtyyXScsYPR8QsPZas46DYr9Y.jpg', '2026-11-23 00:30:58'),
(9, 'Tekken	Tekken 8 – Standard Edition (PS5)', 2195.00, 32, 'products/1MHwS251ebgmEJBwirrCChaTyM9QrgpoMVREYXMO.jpg', '2026-11-23 00:32:30'),
(10, 'Street Fighter 6: Years 1-2 Fighters Edition (PS5)', 1995.00, 18, 'products/OVOIcdJUZ2bUJQMteAEeYpfL8LmreK6nhocuNcgS.jpg', '2026-11-23 00:33:02'),
(11, 'Fortnite: Anime Legends Pack – Retail Code Box (PS5)', 950.00, 2, 'products/breW5iNzblhvHm3fj4gwGebRA2cMBdPlc16aDBrL.jpg', '2026-11-23 00:34:02'),
(12, 'NBA 2K27 – Standard Edition (PS5)', 4390.00, 43, 'products/yzzE4QsgNsDXq3X2t9NHE4L0MMohkrb5hENjix0J.jpg', '2026-11-23 00:34:56'),
(13, 'WWE 2K26 – Standard Edition (PS5)', 3250.00, 8, 'products/Jw82jAZA5IwvE0kR7xX1ztunR5g7LJaYqSCgLw05.jpg', '2026-11-23 00:36:01'),
(14, 'Jump Force – Standard Edition (PS4 / PS5)', 1645.00, 10, 'products/dZ1zRu6G61GTE6j6DeigtHdryQLsd7K3NocQjJnh.jpg', '2026-11-23 00:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `sold_by` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `sold_by`, `quantity`, `total_price`, `created_at`) VALUES
(1, 2, 9, 1, 1, 4990.00, '2026-11-23 00:44:48'),
(2, 5, NULL, 1, 2, 2136.00, '2026-11-23 08:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `avatar`, `created_at`) VALUES
(1, 'zyril', 'John Zyril Paco', '$2y$12$WH0wonFZvIn0vCAPIpqrruaHtiq2qoXAmH6zuhuTSYmL72U3ZsEna', NULL, '2026-11-23 00:20:28'),
(2, 'kyle', 'Kyle Sarangay', '$2y$12$6c0k2JGhoECAUendpPRBrey2WDsRNB33RKaZ0nHcVdbIOXqgpldKC', NULL, '2026-11-23 00:20:28'),
(3, 'seth', 'Seth John Lloyd Biala', '$2y$12$mTUmMgL8XwPx4vEUTNPo8uHlNNXoimECpttj.U0RSmzNIe4dnYvha', NULL, '2026-11-23 00:20:28'),
(4, 'johann', 'Johann Abion', '$2y$12$w3pDwdLXkR2RRFCDX3ZIZOlGFNb3q3xSgZsX/ueBH3kHYKZ5tn4X.', NULL, '2026-11-23 00:20:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `sold_by` (`sold_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`sold_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
