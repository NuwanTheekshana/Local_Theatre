-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 05:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `local_theatre_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_tbls`
--

CREATE TABLE `comment_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_comment_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_comment_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_comment_date` datetime NOT NULL,
  `movie_comment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_tbls`
--

INSERT INTO `comment_tbls` (`id`, `movie_token`, `movie_title`, `movie_comment`, `movie_comment_user_id`, `movie_comment_user`, `movie_comment_date`, `movie_comment_status`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, '862894', 'The Air I Breathe', 'Best movie', '1', 'Nuwan Athukorala', '2021-03-27 15:38:21', 'Accept', '1', '2021-03-27 10:08:21', '2021-03-27 10:09:09'),
(2, '398216', 'Wonder Woman', 'Best action movie', '1', 'Nuwan Athukorala', '2021-03-27 15:38:48', 'Accept', '1', '2021-03-27 10:08:48', '2021-03-27 10:09:15'),
(3, '398216', 'Wonder Woman', 'best', '2', 'Sameera Abeysekara', '2021-03-27 15:46:42', 'Accept', '1', '2021-03-27 10:16:42', '2021-03-27 10:18:08'),
(4, '709700', 'Children of a Lesser God', 'best movie', '2', 'Sameera Abeysekara', '2021-03-27 15:46:56', 'Accept', '1', '2021-03-27 10:16:56', '2021-03-27 10:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2021_03_13_114357_create_movies_tbls_table', 2),
(15, '2021_03_14_111435_create_comment_tbls_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `movies_tbls`
--

CREATE TABLE `movies_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_genres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_collect_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imdb_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imdb_rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insert_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies_tbls`
--

INSERT INTO `movies_tbls` (`id`, `movie_token`, `movie_title`, `movie_year`, `movie_summary`, `movie_genres`, `movie_image_path`, `movie_collect_type`, `imdb_code`, `imdb_rating`, `insert_user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '709700', 'Children of a Lesser God', '1986', 'Having taught at the best institutions in the country aside from other more eclectic jobs, James Leeds, with progressive methods, has just started teaching at a school for the deaf on an island off the New England coast, where he is assigned primarily to a speech class for the upper grades. At the school, he quickly notices the young cleaning woman, who he learns is twenty-five year old Sarah Norman and who, deaf herself, was once a student there and has been there since the age of five. He can see that she is bright, headstrong and angry, on top of which she doesn\'t speak, the latter issues a result of a troubled home life, her mother, her only touchstone to family, who she has purposefully not seen in eight years. As he is able to get through to most of his students to feel more and more comfortable in speaking for a more holistic life, Jim, with the reluctant blessing of the school\'s superintendent Dr. Curtis Franklin, who has always and still considers Sarah a proverbial pain in ...', 'Drama,Romance', 'https://yts.mx/assets/images/movies/children_of_a_lesser_god_1986/medium-cover.jpg', 'API', 'tt0090830', '7.2', '1', 1, '2021-03-27 09:12:26', '2021-03-27 09:12:26'),
(2, '862894', 'The Air I Breathe', '2007', 'A frustrated and clumsy bank clerk overhears the conversation of three coworkers in the toilet about a fix in a horse race, and bets a large amount. He loses the bet and owes the money to the dangerous and powerful mobster Fingers. A gangster who works for Fingers has the ability of foreseeing pieces of the future; he is assigned to collect money for the boss, with his troublemaker nephew Tony, and is beaten up by a gang. The manager of pop-star Trista loses her contract to Fingers without her agreement and she is threatened by the gangster. A dedicated doctor seeks a blood donor that might have a rare blood type to save the life of his secret and unrequited passion, a beautiful epidemiologist who\'s married to a friend.', 'Crime,Drama,Thriller', 'https://yts.mx/assets/images/movies/the_air_i_breathe_2007/medium-cover.jpg', 'API', 'tt0485851', '6.8', '1', 1, '2021-03-27 10:00:38', '2021-03-27 10:00:38'),
(3, '197693', 'Raise the Titanic', '1980', 'A group of Americans are interested in raising the ill-fated ocean liner R.M.S. Titanic. One of the team members finds out the Russians also have plans to raise the ship from its watery grave. Why all the interest? A rare mineral on board could be used to power a sound beam that will knock any missile out of the air when entering us airspace.', 'Action,Adventure,Drama,Thriller', 'https://yts.mx/assets/images/movies/raise_the_titanic_1980/medium-cover.jpg', 'API', 'tt0081400', '5', '1', 1, '2021-03-27 10:05:42', '2021-03-27 10:05:42'),
(4, '398216', 'Wonder Woman', '2017', 'Princess Diana of an all-female Amazonian race rescues US pilot Steve. Upon learning of a war, she ventures into the world of men to stop Ares, the god of war, from destroying mankind.', 'Crime,History,Action', 'img/movie_img/img-2144169137.jpg', 'Manual', '', '7.4', '1', 1, '2021-03-27 10:07:34', '2021-03-27 10:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `premission_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `fullname`, `gender`, `DOB`, `Address`, `city`, `email`, `email_verified_at`, `password`, `premission_type`, `active_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nuwan', 'Athukorala', 'Nuwan Athukorala', 'M', '1996-06-06', 'Kelaniya', 'Gampaha', 'nuwanthikshana@gmail.com', NULL, '$2y$10$oOwDgy5zx9OQhemf8BwL5u39avh4Jd6G4JJW.EDkdSMban7rApXQi', 'admin', '1', NULL, '2021-03-10 05:24:15', '2021-03-26 23:17:40'),
(2, 'Sameera', 'Abeysekara', 'Sameera Abeysekara', 'M', '1996-06-06', 'Piliyandala', 'Colombo', 'sameera@gmail.com', NULL, '$2y$10$wELL3i4pP0fi5KG3j4c6sufeVgs4MWc3qiFNexikC/Ej6fuo1KCtK', 'non_admin', '1', NULL, '2021-03-26 23:05:20', '2021-03-26 23:05:20'),
(3, 'Heshan', 'Silva', 'Heshan Silva', 'M', '1995-06-24', 'Kelaniya', 'Colombo', 'heshan@gmail.com', NULL, '$2y$10$3vBKW1GmsrzoCdPWSOIUmeEBDOGipEt6cflgULJ7dglsUoHIS0Kpi', 'admin', '1', NULL, '2021-03-27 07:00:50', '2021-03-27 07:00:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_tbls`
--
ALTER TABLE `comment_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies_tbls`
--
ALTER TABLE `movies_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_tbls`
--
ALTER TABLE `comment_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `movies_tbls`
--
ALTER TABLE `movies_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
