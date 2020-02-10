-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2020 at 09:59 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basica`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auteurs`
--

INSERT INTO `auteurs` (`id`, `nom`, `slug`, `prenom`, `created_at`, `updated_at`) VALUES
(1, 'Cummings', 'jacobs-cummings', 'Jacobs', NULL, NULL),
(2, 'Doe', 'john-doe', 'John', NULL, NULL),
(3, 'Jackson', 'jarred-jackson', 'Jarred', NULL, NULL),
(4, 'Pascret', 'fred-pascret', 'Fred', NULL, NULL),
(5, 'Garo', 'lisa-garo', 'Lisa', NULL, NULL),
(6, 'Zoizo', 'guy-zoizo', 'Guy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Footer', 'footer', NULL, NULL),
(2, 'Art classique', 'art-classique', NULL, NULL),
(3, 'Photographie', 'photographie', NULL, NULL),
(4, 'Musique', 'musique', NULL, NULL),
(5, 'Cinéma', 'cinema', NULL, NULL),
(6, 'Art moderne', 'art-moderne', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Vactual Art', 'vactual-art', NULL, NULL),
(2, 'Cloos Enterprise', 'cloos-enterprise', NULL, NULL),
(3, 'Cine Club', 'cine-club', NULL, NULL),
(4, 'Patrick James', 'patrick-james', NULL, NULL),
(5, 'Ruth Daniels', 'ruth-daniels', NULL, NULL),
(7, 'Nicolas Bertho', 'nicolas-bertho', '2020-02-09 21:57:19', '2020-02-09 21:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sous_titre` varchar(255) DEFAULT NULL,
  `texte` text,
  `tri` tinyint(1) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `titre`, `slug`, `sous_titre`, `texte`, `tri`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', NULL, NULL, 1, '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(2, 'Portfolio', 'portfolio', 'Our portfolio', '<h2>We are leading company</h2><h3>Specializing in Wordpress Theme Development</h3><p>Donec elementum mi vitae enim fermentum lobortis. In hac habitasse platea dictumst. Ut pellentesque, orci sed mattis consequat, libero ante lacinia arcu, ac porta lacus urna in lorem. Praesent consectetur tristique augue, eget elementum diam suscipit id. Donec elementum mi vitae enim fermentum lobortis.</p>', 2, '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(3, 'Blog', 'blog', 'Our blog', NULL, 3, '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(4, 'Contact', 'contact', 'Contact us', '<b>Address:</b> 123 Fake Street, LN1 2ST, London, United Kingdom<br/><b>Phone:</b> +44 123 654321<br/><b>Fax:</b> +44 123 654321<br/><b>Email:</b> <a href=\"mailto:getintoutch@yourcompanydomain.com\">getintoutch@yourcompanydomain.com</a>', 4, '2020-01-25 00:00:00', '2020-01-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `texte` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `titre`, `slug`, `texte`, `image`, `created_at`, `updated_at`, `categories_id`) VALUES
(1, 'Contact us', 'contact-us', '<p class=\"contact-us-details\"><b>Address:</b> 123 Downtown Avenue, Manhattan, New York, United States of America<br><b>Phone:</b> +1 123 45678910<br><b>Fax:</b> +1 123 45678910<br><b>Email:</b> <a href=\"mailto:info@yourcompanydomain.com\">info@yourcompanydomain.com</a></p>', '0', '2020-01-25 00:00:00', '2020-01-25 00:00:00', 1),
(2, 'Our social Networks', 'our-social-network', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam.</p>', '0', '2020-01-25 00:00:00', '2020-01-25 00:00:00', 1),
(3, 'About our company', 'about-our-company', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci.</p>', '0', '2020-01-25 00:00:00', '2020-01-25 00:00:00', 1),
(4, 'Dolor tacit', 'dolor-tacit', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><p>Vivamus euismod elit ac libero facilisis tristique. Duis mollis non ligula vel tincidunt. Nulla consectetur libero id nunc ornare, vel vulputate tellus mollis. Sed quis nulla magna. Integer rhoncus sem quis ultrices lobortis. Maecenas tempus nulla quis dolor vulputate egestas. Phasellus cursus tortor quis massa faucibus fermentum vel sit amet tortor. Phasellus vehicula lorem et tortor luctus, a dignissim lacus tempor. Aliquam volutpat molestie metus sit amet aliquam. Duis vestibulum quam tortor, sed ultrices orci sagittis nec.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><h3>Sed sit amet metus sit</h3><p>Proin fermentum, purus id eleifend molestie, nisl arcu rutrum tellus, a luctus erat tortor ut augue. Vivamus feugiat nisi sit amet dignissim fermentum. Duis elementum mattis lacinia. Sed sit amet metus sit amet leo semper feugiat. Nulla vel orci nec neque interdum facilisis egestas vitae lorem. Phasellus elit ante, posuere at augue quis, porta vestibulum magna. Nullam non mattis odio. Donec eget velit leo. Nunc et diam volutpat tellus ultrices fringilla eu a neque.Integerlectus nunc, vestibulum a turpis vitae, malesuada lacinia nibh. In sit amet leo ut turpis convallis bibendum. Nullam nec purus sapien. Quisque sollicitudin cursus felis sit amet aliquam.</p>', 'images/blog4.jpg', '2020-01-25 00:00:00', '2020-01-25 00:00:00', 4),
(5, 'Vivamus euismod', 'vivamus-euismod', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><p>Vivamus euismod elit ac libero facilisis tristique. Duis mollis non ligula vel tincidunt. Nulla consectetur libero id nunc ornare, vel vulputate tellus mollis. Sed quis nulla magna. Integer rhoncus sem quis ultrices lobortis. Maecenas tempus nulla quis dolor vulputate egestas. Phasellus cursus tortor quis massa faucibus fermentum vel sit amet tortor. Phasellus vehicula lorem et tortor luctus, a dignissim lacus tempor. Aliquam volutpat molestie metus sit amet aliquam. Duis vestibulum quam tortor, sed ultrices orci sagittis nec.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><h3>Sed sit amet metus sit</h3><p>Proin fermentum, purus id eleifend molestie, nisl arcu rutrum tellus, a luctus erat tortor ut augue. Vivamus feugiat nisi sit amet dignissim fermentum. Duis elementum mattis lacinia. Sed sit amet metus sit amet leo semper feugiat. Nulla vel orci nec neque interdum facilisis egestas vitae lorem. Phasellus elit ante, posuere at augue quis, porta vestibulum magna. Nullam non mattis odio. Donec eget velit leo. Nunc et diam volutpat tellus ultrices fringilla eu a neque.Integerlectus nunc, vestibulum a turpis vitae, malesuada lacinia nibh. In sit amet leo ut turpis convallis bibendum. Nullam nec purus sapien. Quisque sollicitudin cursus felis sit amet aliquam.</p>', 'images/blog5.jpg', '2020-01-25 00:00:00', '2020-01-25 00:00:00', 5),
(6, 'Exerci Tation Ullamcorper', 'exerci-tation-ullamcorper', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><p>Vivamus euismod elit ac libero facilisis tristique. Duis mollis non ligula vel tincidunt. Nulla consectetur libero id nunc ornare, vel vulputate tellus mollis. Sed quis nulla magna. Integer rhoncus sem quis ultrices lobortis. Maecenas tempus nulla quis dolor vulputate egestas. Phasellus cursus tortor quis massa faucibus fermentum vel sit amet tortor. Phasellus vehicula lorem et tortor luctus, a dignissim lacus tempor. Aliquam volutpat molestie metus sit amet aliquam. Duis vestibulum quam tortor, sed ultrices orci sagittis nec.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><h3>Sed sit amet metus sit</h3><p>Proin fermentum, purus id eleifend molestie, nisl arcu rutrum tellus, a luctus erat tortor ut augue. Vivamus feugiat nisi sit amet dignissim fermentum. Duis elementum mattis lacinia. Sed sit amet metus sit amet leo semper feugiat. Nulla vel orci nec neque interdum facilisis egestas vitae lorem. Phasellus elit ante, posuere at augue quis, porta vestibulum magna. Nullam non mattis odio. Donec eget velit leo. Nunc et diam volutpat tellus ultrices fringilla eu a neque.Integerlectus nunc, vestibulum a turpis vitae, malesuada lacinia nibh. In sit amet leo ut turpis convallis bibendum. Nullam nec purus sapien. Quisque sollicitudin cursus felis sit amet aliquam.</p>', 'images/blog1.jpg', '2020-01-25 00:00:00', '2020-01-25 00:00:00', 6),
(7, 'Lorem Ipsum', 'lorem-ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><p>Vivamus euismod elit ac libero facilisis tristique. Duis mollis non ligula vel tincidunt. Nulla consectetur libero id nunc ornare, vel vulputate tellus mollis. Sed quis nulla magna. Integer rhoncus sem quis ultrices lobortis. Maecenas tempus nulla quis dolor vulputate egestas. Phasellus cursus tortor quis massa faucibus fermentum vel sit amet tortor. Phasellus vehicula lorem et tortor luctus, a dignissim lacus tempor. Aliquam volutpat molestie metus sit amet aliquam. Duis vestibulum quam tortor, sed ultrices orci sagittis nec.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><h3>Sed sit amet metus sit</h3><p>Proin fermentum, purus id eleifend molestie, nisl arcu rutrum tellus, a luctus erat tortor ut augue. Vivamus feugiat nisi sit amet dignissim fermentum. Duis elementum mattis lacinia. Sed sit amet metus sit amet leo semper feugiat. Nulla vel orci nec neque interdum facilisis egestas vitae lorem. Phasellus elit ante, posuere at augue quis, porta vestibulum magna. Nullam non mattis odio. Donec eget velit leo. Nunc et diam volutpat tellus ultrices fringilla eu a neque.Integerlectus nunc, vestibulum a turpis vitae, malesuada lacinia nibh. In sit amet leo ut turpis convallis bibendum. Nullam nec purus sapien. Quisque sollicitudin cursus felis sit amet aliquam.</p>', 'images/blog2.jpg', '2020-01-25 00:00:00', '2020-01-25 00:00:00', 2),
(8, 'Sit amet', 'sit-amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><p>Vivamus euismod elit ac libero facilisis tristique. Duis mollis non ligula vel tincidunt. Nulla consectetur libero id nunc ornare, vel vulputate tellus mollis. Sed quis nulla magna. Integer rhoncus sem quis ultrices lobortis. Maecenas tempus nulla quis dolor vulputate egestas. Phasellus cursus tortor quis massa faucibus fermentum vel sit amet tortor. Phasellus vehicula lorem et tortor luctus, a dignissim lacus tempor. Aliquam volutpat molestie metus sit amet aliquam. Duis vestibulum quam tortor, sed ultrices orci sagittis nec.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.</p><h3>Sed sit amet metus sit</h3><p>Proin fermentum, purus id eleifend molestie, nisl arcu rutrum tellus, a luctus erat tortor ut augue. Vivamus feugiat nisi sit amet dignissim fermentum. Duis elementum mattis lacinia. Sed sit amet metus sit amet leo semper feugiat. Nulla vel orci nec neque interdum facilisis egestas vitae lorem. Phasellus elit ante, posuere at augue quis, porta vestibulum magna. Nullam non mattis odio. Donec eget velit leo. Nunc et diam volutpat tellus ultrices fringilla eu a neque.Integerlectus nunc, vestibulum a turpis vitae, malesuada lacinia nibh. In sit amet leo ut turpis convallis bibendum. Nullam nec purus sapien. Quisque sollicitudin cursus felis sit amet aliquam.</p>', 'images/blog3.jpg', '2020-01-25 00:00:00', '2020-01-25 00:00:00', 3),
(9, 'qfqsf', 'qfqsf', 'qfes  esh fisehuih uiejk ze jlr jhoze ioze', 'images/bc021cad19784025a646186ac28e86c5.jpg', '2020-02-09 20:11:01', '2020-02-09 20:11:01', 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts_has_auteurs`
--

CREATE TABLE `posts_has_auteurs` (
  `posts_id` int(10) UNSIGNED NOT NULL,
  `auteurs_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE `projets` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `texte` text,
  `image` varchar(255) DEFAULT NULL,
  `mise_en_avant` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `clients_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projets`
--

INSERT INTO `projets` (`id`, `nom`, `slug`, `texte`, `image`, `mise_en_avant`, `created_at`, `updated_at`, `clients_id`) VALUES
(1, 'Settings', 'settings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.g elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.', 'images/proj1.jpg', 0, '2020-01-25 00:00:00', '2020-01-25 00:00:00', 1),
(2, 'Camera', 'camera', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.g elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.', 'images/proj2.jpg', 0, '2020-01-25 00:00:00', '2020-01-25 00:00:00', 2),
(3, 'Music', 'music', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.g elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.', 'images/proj3.jpg', 1, '2020-01-25 00:00:00', '2020-01-25 00:00:00', 4),
(4, 'Safari', 'safari', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.g elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.', 'images/proj4.jpg', 1, '2020-01-25 00:00:00', '2020-01-25 00:00:00', 3),
(5, 'Phone', 'phone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.g elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.', 'images/proj5.jpg', 0, '2020-01-25 00:00:00', '2020-01-25 00:00:00', 2),
(6, 'Game center', 'game-center', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.g elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.', 'images/proj6.jpg', 0, '2020-01-25 00:00:00', '2020-01-25 00:00:00', 1),
(7, 'Music cover', 'music-cover', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.g elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.', 'images/proj7.jpg', 1, '2020-01-25 00:00:00', '2020-01-25 00:00:00', 5),
(8, 'Cinema', 'cinema', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.g elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.', 'images/proj8.jpg', 0, '2020-01-25 00:00:00', '2020-01-25 00:00:00', 5),
(9, 'Make-up', 'make-up', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.g elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.', 'images/proj9.jpg', 0, '2020-01-25 00:00:00', '2020-01-25 00:00:00', 1),
(11, 'Test projet', 'test-projet', 'kje jzij iozefji olzjiolze jfli jilzejfize', 'images/aaa8f6a2171e7b57d72cc7009ea40504.jpg', 1, '2020-02-09 22:01:17', '2020-02-09 22:02:27', 7);

-- --------------------------------------------------------

--
-- Table structure for table `projets_has_auteurs`
--

CREATE TABLE `projets_has_auteurs` (
  `projets_id` int(10) UNSIGNED NOT NULL,
  `auteurs_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projets_has_tags`
--

CREATE TABLE `projets_has_tags` (
  `projets_id` int(10) UNSIGNED NOT NULL,
  `tags_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projets_has_tags`
--

INSERT INTO `projets_has_tags` (`projets_id`, `tags_id`) VALUES
(3, 1),
(7, 1),
(1, 2),
(3, 2),
(6, 2),
(9, 2),
(4, 3),
(6, 3),
(9, 3),
(1, 4),
(6, 4),
(8, 4),
(9, 4),
(1, 5),
(5, 5),
(6, 5),
(9, 5),
(2, 6),
(9, 6),
(8, 7),
(11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `nom`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Photography', 'photography', NULL, NULL),
(2, 'Art', 'art', NULL, NULL),
(3, 'Music', 'music', NULL, NULL),
(4, 'Cinema', 'cinema', NULL, NULL),
(5, 'Lorem', 'lorem', NULL, NULL),
(6, 'Ipsum', 'ipsum', NULL, NULL),
(7, 'Dolor', 'dolor', NULL, NULL),
(8, 'Tenet', 'tenet', NULL, NULL),
(9, 'Alpha', 'alpha', NULL, NULL),
(10, 'Basket-ball', 'basket-ball', '2020-02-09 22:06:38', '2020-02-09 22:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nicolas Bertho', 'nicolasbertho1996@gmail.com', NULL, '$2y$10$6VX/NkyQdirA/uv2wphr4en2at2bNtaPq13s8Irxd1KHvbp1Ykaxe', 'rFR7imbBhmwzNvjFzy5pnZaAQKkvnUorx8jEDC1EtZjb50xkV5VCt89GJaRU', '2020-02-07 22:36:38', '2020-02-07 22:36:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_categories1_idx` (`categories_id`);

--
-- Indexes for table `posts_has_auteurs`
--
ALTER TABLE `posts_has_auteurs`
  ADD PRIMARY KEY (`posts_id`,`auteurs_id`),
  ADD KEY `fk_posts_has_auteurs_auteurs1_idx` (`auteurs_id`),
  ADD KEY `fk_posts_has_auteurs_posts1_idx` (`posts_id`);

--
-- Indexes for table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projets_clients1_idx` (`clients_id`);

--
-- Indexes for table `projets_has_auteurs`
--
ALTER TABLE `projets_has_auteurs`
  ADD PRIMARY KEY (`projets_id`,`auteurs_id`),
  ADD KEY `fk_projets_has_auteurs_auteurs1_idx` (`auteurs_id`),
  ADD KEY `fk_projets_has_auteurs_projets1_idx` (`projets_id`);

--
-- Indexes for table `projets_has_tags`
--
ALTER TABLE `projets_has_tags`
  ADD PRIMARY KEY (`projets_id`,`tags_id`),
  ADD KEY `fk_projets_has_tags_tags1_idx` (`tags_id`),
  ADD KEY `fk_projets_has_tags_projets_idx` (`projets_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts_has_auteurs`
--
ALTER TABLE `posts_has_auteurs`
  ADD CONSTRAINT `fk_posts_has_auteurs_auteurs1` FOREIGN KEY (`auteurs_id`) REFERENCES `auteurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_posts_has_auteurs_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `fk_projets_clients1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projets_has_auteurs`
--
ALTER TABLE `projets_has_auteurs`
  ADD CONSTRAINT `fk_projets_has_auteurs_auteurs1` FOREIGN KEY (`auteurs_id`) REFERENCES `auteurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projets_has_auteurs_projets1` FOREIGN KEY (`projets_id`) REFERENCES `projets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projets_has_tags`
--
ALTER TABLE `projets_has_tags`
  ADD CONSTRAINT `fk_projets_has_tags_projets` FOREIGN KEY (`projets_id`) REFERENCES `projets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projets_has_tags_tags1` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
