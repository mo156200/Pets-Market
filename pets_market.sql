-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 01:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pets_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `user_id`, `name`, `type`, `age`, `price`, `description`, `image`) VALUES
(1, 9, 'Bella', 'cat', 2, 1600.00, 'good ', 'uploads/11.jpg'),
(2, 4, 'Luna', 'cat', 4, 1800.00, 'quite', 'uploads/22.jpg'),
(3, 7, 'Misty', 'cat', 3, 1350.00, 'love play ', 'uploads/white-fur-kitten-3840x2160-16431.jpg'),
(5, 8, 'Cleo', 'cat', 5, 2100.00, 'big', 'uploads/44.jpg'),
(11, 15, 'Pearl', 'cat', 3, 2150.00, 'drink milk only', 'uploads/Cat_November_2010-1a.jpg'),
(17, 9, 'Charlie', 'cat', 3, 200.00, 'l,', 'uploads/6751a3864dc91_66.jpg'),
(22, 14, 'Nala', 'cat', 5, 3000.00, 'trany', 'uploads/55.jpg'),
(55, 4, 'Chloe', 'cat', 2, 1600.00, 'good', 'uploads/77.jpg'),
(96, 1, 'Sophie', 'cat', 3, 950.00, 'beuty', 'uploads/cat-3336579_640.jpg'),
(111, 9, 'mes', 'cat', 3, 2000.00, 'km', 'uploads/6751ab882b3dd_77.jpg'),
(112, 9, 'max', 'Dog', 2, 2500.00, 'good', 'uploads/6751afe7ad50f_American_Eskimo_Dog.jpg'),
(113, 9, 'Thor', 'Dog', 3, 4000.00, 'quite', 'uploads/6751b0109918e_dog_with_bows_195498.jpg'),
(114, 9, 'Jac', 'Dog', 3, 6000.00, 'golden', 'uploads/6751b0330f28f_adorable_animal_breed_canine_cute_dog_doggy_603714.jpg'),
(115, 9, 'simba', 'Dog', 4, 5000.00, 'beuty', 'uploads/6751b0b7b1639_cute-puppy-with-paws-over-white-sign-catahoula-lab-mix-dog-ai-generated-photo.jpg'),
(116, 9, 'roccy', 'Dog', 2, 1600.00, 'too quite ', 'uploads/6751b0e4a86ea_Dog.jpg'),
(117, 9, 'chiko', 'Dog', 1, 4000.00, 'good', 'uploads/6751b128aa629_istockphoto-467923438-612x612.jpg'),
(118, 9, 'roy', 'Dog', 4, 5000.00, 'golden', 'uploads/6751b1479628a_Golden_Retriever_Hund_Dog.jpg'),
(119, 9, 'Rex', 'Dog', 2, 3500.00, 'good', 'uploads/6751b19d4f081_Dogs_love.jpg'),
(120, 9, 'wilo', 'cat', 2, 1600.00, 'small', 'uploads/6751b1e11f4b1_108.jpg'),
(121, 9, 'metoly', 'Dog', 30, 1200.00, 'kdfklflfe', 'uploads/6751ec8711a9f_110.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `id`) VALUES
('mohamed', 'm2nd.afs@gmail.com', '$2y$10$5nI8KueZzsnH3tthN.A.ae9P2jo1xXSg4aZvUUJ0wps105Q5yXn1S', 1),
('tarek', 'm@gmail.com', '$2y$10$CCq1.Ws/iL0LHSdpPSc3I./jYrMC.vQvM.v1UvtI8DRWOh7n8h73.', 2),
('kareem', 'l@gmail.com', '$2y$10$6Wq/7YwzpZszZXMGtXbJbeJWNIb80zMom6Xi5.SqA2ns.Eww6D7IC', 3),
('asmaa', 'asmaa@gmail.com', '$2y$10$4M8qX0vJW8xhTmOLYTy/pO3Iug.YoDajHv/JSTyd3q2jRmq5D0R/W', 4),
('Mona', 'mona423@gmail.com', '$2y$10$wIHqEfiD3lY8iWryzl477eVurH2vgoAgHxYUBsQQ9Bp9V9QucDFc6', 5),
('soliman ahmed', 'oki@gmail.com', '$2y$10$E7KOKhWUJ7pamtXJUlomA.SGWEKFZwHyJJiGoUOFNc138lM.BZs/K', 6),
('azzat', 'azzat14@gmail.com', '$2y$10$eLJBS6EJCdID5cWjtRooxuVyBEl6a/G9BSkBxRIaF9CvCYHk/50vy', 7),
('said moursy', 'morsy4@gmail.com', '$2y$10$9Bui3v6cALI/SogOW3OsdusNbZhh.bWaujDQyftn.ndWRWgC9kiay', 8),
('ahmed', 'ahmedfathy@gmail.com', '$2y$10$J/TIV5H0ZbAflLwVot6XFer1aiZqt8mEz2NN9jLOQ7E7x5jmReM1a', 9),
('karima', 'karima@gmail.com', '$2y$10$0j3can.3Tg.RhgvO7FWdJ.YMpE/23TZ5kOpcYblbx8WUzwL0St6pu', 10),
('mariem mahmoud ', 'mariom40@gmail.com', '$2y$10$aw7EXpstN9w3ChOmFOlqhuHIp6BiHy/KzwdYeJ3cYLMpQTQCqdZja', 11),
('marina gorge', 'mero12@gmail.com', '$2y$10$Mbc1/nEt5/JvVkkkLsybKuXVjT2VqtSBoHnFLXdnxDnpOC11dXOGK', 12),
('shawqi ', 'show89@gmail.com', '$2y$10$0YnwUsIsn2hwSZGc2BF0f./yw.K7vxkG0Ze0bsdMcodxPPBFWKyWa', 13),
('salma hany', 'salma@gmail.com', '$2y$10$MePsNP7m4jXkSfNpkIdRXeH7abMXHyrR5wKuO4ggwD5B4VDpTjowK', 14),
('kemo', 'kk21k@gmail.com', '$2y$10$X6nI4BKZj0m5PQ2il08wU.E6B94/HtY6LIYC03Lb.tc1cqvoOzchi', 15),
('mo', 'sherbini@gmail.com', '$2y$10$v2MoH8gWfJh4t6mGivybMOfFJv01Jv/T2WS.TKeokFY6.xMlEmBLS', 16),
('mohamed hamdy', 'mo@gmail.com', '$2y$10$nP6lcOuNdmhPcJn50I3nZuK5u448DY7/anf6vtlhgbrJHa58OMmyS', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
