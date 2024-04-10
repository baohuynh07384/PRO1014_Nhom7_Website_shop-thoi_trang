-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 10, 2024 lúc 06:41 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `title` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `new_type` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `create_at`) VALUES
(2, 'Áo thun ZOZZ // Cappuccino', 'z3760661114834_66599be4e51678d911ceacdbef12b049.jpg', 1, '2024-04-04 10:40:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `path` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `product_id`, `path`) VALUES
(131, 207, ''),
(132, 208, ''),
(133, 209, ''),
(134, 210, ''),
(135, 211, ''),
(136, 212, ''),
(137, 213, ''),
(138, 214, ''),
(139, 215, 'Array'),
(140, 216, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `status` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `total` int NOT NULL,
  `size` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `categories_id` int NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `description` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `categories_id`, `name`, `price`, `quantity`, `description`, `create_at`, `status`) VALUES
(207, 2, 'Áo thun ZOZZ // Cappuccino', 350, 100, '<p>b</p>', '2024-04-07 18:57:16', 1),
(208, 2, 'Áo thun ZOZZ // Cappuccino', 243546, 200, '<p>bb</p>', '2024-04-07 18:57:35', 1),
(209, 2, 'Áo thun ZOZZ // Cappuccino', 243546, 200, '<p>bb</p>', '2024-04-07 19:05:19', 1),
(210, 2, 'Áo thun ZOZZ // Cappuccino', 350, 100, '<p>jvjgcu</p>', '2024-04-07 19:20:38', 1),
(211, 2, 'Áo thun ZOZZ // Cappuccino', 350, 100, '<p>jvjgcu</p>', '2024-04-07 19:21:08', 1),
(212, 2, 'Áo thun ZOZZ // Cappuccino', 350, 100, '<p>m</p>', '2024-04-07 19:22:21', 1),
(213, 2, 'Áo thun ZOZZ // Cappuccino', 350, 100, '<p>sxs</p>', '2024-04-07 19:23:24', 1),
(214, 2, 'Áo thun ZOZZ // Cappuccino', 350, 100, '<p>c</p>', '2024-04-07 19:24:17', 1),
(215, 2, 'Áo thun ZOZZ // Cappuccino', 350, 100, '<p>grteg</p>', '2024-04-07 19:26:39', 1),
(216, 2, 'bảo', 350, 200, '<p>khfytdut</p>', '2024-04-07 19:28:10', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `status` int NOT NULL,
  `role` int NOT NULL,
  `image` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `address`, `phone`, `status`, `role`, `image`, `create_at`) VALUES
(25, '', '$2y$10$NC20kH7gWgWeaie0DlD6me4jckr9i4HcHbrgqQRQkA7kWlKAxuy/S', 'baohcpc07384@fpt.edu.vn', '', 942422472, 1, 1, '', '2024-04-03 18:28:56'),
(28, '', '$2y$10$T0lpONpXTajOV7Wo0tjwd.02KGGUKyAdVEDyZZfzs3mhWO.p/IMbO', 'hcb2k4@gmail.com', '', 942422472, 1, 0, '', '2024-04-09 18:41:56');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id1` (`product_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `product_id1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categories_id` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
