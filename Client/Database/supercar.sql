-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2025 at 04:58 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supercar`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_en`
--

DROP TABLE IF EXISTS `contact_en`;
CREATE TABLE IF NOT EXISTS `contact_en` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_en`
--

INSERT INTO `contact_en` (`id`, `section`, `content`) VALUES
(1, 'email', 'supercar@gmail.com'),
(2, 'phone', '+230 4444 5555'),
(3, 'horaire', '<p>Mon - Fri: 08:00 - 17:00</p>\n                <p>Saturday: 08:00 - 12:00</p>\n                <p>Sunday: Closed</p>');

-- --------------------------------------------------------

--
-- Table structure for table `contact_fr`
--

DROP TABLE IF EXISTS `contact_fr`;
CREATE TABLE IF NOT EXISTS `contact_fr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_fr`
--

INSERT INTO `contact_fr` (`id`, `section`, `content`) VALUES
(1, 'email', 'supercar@gmail.com'),
(2, 'phone', '+230 4444 5555'),
(3, 'horaire', '<p>Lun - Ven: 08:00 - 17:00</p>\n                <p>Samedi: 08:00 - 12:00</p>\n                <p>Dimanche: Fermé</p>');

-- --------------------------------------------------------

--
-- Table structure for table `home_en`
--

DROP TABLE IF EXISTS `home_en`;
CREATE TABLE IF NOT EXISTS `home_en` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `home_en`
--

INSERT INTO `home_en` (`id`, `section`, `content`, `image`) VALUES
(1, 'hero_title', 'Welcome to Supercar!', 'images/bgtest1'),
(2, 'hero_subtitle', 'Discover a unique automotive experience.', ''),
(3, 'about_us', 'Supercar is much more than just a dealership! It\'s a gateway to the world of automotive excellence. Passionate about performance and elegance, we offer an exclusive selection of top-of-the-range vehicles, combining cutting-edge technology with refined design. Whether you\'re looking for a powerful sports car, a luxury model or a limited edition, we\'ll help you find the vehicle of your dreams with expertise and professionalism. Experience a tailor-made service and immerse yourself in the world of supercars with Supercar.', 'Nav_Images/logo'),
(4, 'car1', 'Porsche Taycan Turbo S', 'images/TaycanTurboS'),
(5, 'car2', 'Maserati MC20 Cielo', 'images/mc20cielo'),
(6, 'car3', 'Aston Martin Vanquish', 'images/Vanquish-30'),
(7, 'service1', 'Detailing', 'Service_Images/ast-detail.jpg'),
(8, 'service2', 'Maintenance', 'Service_Images/mas-maint-big'),
(9, 'service3', 'Delivery', 'Service_Images/deliver.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_fr`
--

DROP TABLE IF EXISTS `home_fr`;
CREATE TABLE IF NOT EXISTS `home_fr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `home_fr`
--

INSERT INTO `home_fr` (`id`, `section`, `content`, `image`) VALUES
(1, 'hero_title', 'Bienvenue chez Supercar!', 'images/bgtest1'),
(2, 'hero_subtitle', 'Manger avec une expérience automobile unique.', ''),
(3, 'about_us', 'Karen est bien plus qu\'une simple concession! C\'est une porte d\'entrée dans le monde de l\'excellence automobile. Passionnés de performance et d\'élégance, nous vous proposons une sélection exclusive de véhicules haut de gamme, alliant technologie de pointe et design raffiné. Que vous recherchiez une puissante voiture de sport, un modèle de luxe ou une série limitée, nous vous aiderons à trouver le véhicule de vos rêves avec expertise et professionnalisme. Bénéficiez d\'un service sur mesure et plongez dans l\'univers des supercars avec Supercar.', 'Nav_Images/logo'),
(4, 'car1', 'Porsche Taycan Turbo S', 'images/TaycanTurboS'),
(5, 'car2', 'Maserati MC20 Cielo', 'images/mc20cielo'),
(6, 'car3', 'Aston Martin Vanquish', 'images/Vanquish-30'),
(7, 'service1', 'Entretien du vehicule', 'Service_Images/ast-detail.jpg'),
(8, 'service2', 'Maintenance', 'Service_Images/mas-maint-big'),
(9, 'service3', 'Livraison', 'Service_Images/deliver.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_en`
--

DROP TABLE IF EXISTS `service_en`;
CREATE TABLE IF NOT EXISTS `service_en` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `sub` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_en`
--

INSERT INTO `service_en` (`id`, `section`, `content`, `image`, `sub`) VALUES
(4, 'slide1', 'Banking & Leasing', 'Service_Images/leasing2.jpg', 'We take care of the bank side transactions and offer leasing\n                    facilities for easier payment!'),
(5, 'slide2', 'Maintenance', 'Service_Images/Maint1.jpg', 'Regular vehicle essential maintenance and repairs offered when\n                    needed to ensure your car is in pristine condition!'),
(6, 'slide3', 'On-Road Support', 'Service_Images/onroad3.jpg', 'Our team of professionals come wherever you are on the island to\n                    help you out in case of a car emergency!'),
(7, 'section1', 'Detailing', 'Service_Images/ast-detail.jpg', 'At SuperCar, we bring out the best in your car with our expert\n                    detailing services. From exterior washing and waxing to interior deep\n                    cleaning, we restore your vehicle\'s beauty and performance. Need\n                    something special? We tailor our services to your car’s unique needs,\n                    ensuring a hassle-free experience and exceptional results every time.'),
(8, 'section2', 'Courtesy Car', 'Service_Images/cayenne-court.jpg', 'Indulge in elegance with our Porsche Cayenne courtesy car. Powered by a 3.0L V6 engine delivering 335 horsepower, this SUV boasts adaptive air suspension, a luxurious leather interior, advanced tech features, and exceptional handling. Enjoy unrivaled comfort, performance, and style on every journey with our premium offering.'),
(9, 'section3', 'Delivery', 'Service_Images/deliver.jpg', 'We offer a premium car delivery service, ensuring your luxury vehicle arrives at your doorstep with the highest level of care. From start to finish, we prioritize a smooth, personalized experience, so you can enjoy your new car with ease and excitement, all from the comfort of your home.'),
(10, 'section4', 'Leasing &amp; Banking', 'Service_Images/lease-big.jpg', ' At SuperCar, we offer flexible leasing and banking facilities tailored to your needs, ensuring a seamless experience when acquiring your luxury vehicle. Whether you\'re looking for short-term leases or custom financing options, our expert team provides personalized solutions to make owning your dream car easy and accessible.'),
(11, 'section5', 'Maintenance &amp; Repairs', 'Service_Images/mas-maint-big.jpeg', 'We offer comprehensive maintenance services to ensure your luxury vehicle performs at its best. Our expert technicians use advanced diagnostic tools and genuine parts to provide top-tier care, from routine servicing to specialized repairs. Trust us to keep your car in pristine condition for years to come. '),
(12, 'section6', 'On-Road Assistance', 'Service_Images/onroad1.jpeg', 'We provide reliable on-road services to ensure you\'re never stranded. Whether it\'s a breakdown, flat tire, or fuel assistance, our professional team is available around the clock, 24/7 to offer quick support. With our prompt and efficient service, you can drive with confidence knowing help is just a call away.');

-- --------------------------------------------------------

--
-- Table structure for table `service_fr`
--

DROP TABLE IF EXISTS `service_fr`;
CREATE TABLE IF NOT EXISTS `service_fr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `sub` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_fr`
--

INSERT INTO `service_fr` (`id`, `section`, `content`, `image`, `sub`) VALUES
(4, 'slide1', 'Banque et Crédit', 'Service_Images/leasing2.jpg', 'Nous nous chargeons des transactions bancaires et offrons des facilités de crédit-bail pour faciliter les paiements.'),
(5, 'slide2', 'Maintenance', 'Service_Images/Maint1.jpg', 'L\'entretien régulier des véhicules et les réparations nécessaires sont assurés pour que votre voiture soit en parfait état.'),
(6, 'slide3', 'Assistance sur route', 'Service_Images/onroad3.jpg', 'Notre équipe de professionnels se déplace où que vous soyez sur l\'île pour vous aider en cas d\'urgence automobile.'),
(7, 'section1', 'Entretien de la voiture', 'Service_Images/ast-detail.jpg', 'Chez SuperCar, nous faisons ressortir le meilleur de votre voiture grâce à nos services d\'esthétique experts. Du lavage et du cirage extérieurs au nettoyage en profondeur de l\'intérieur, nous restaurons la beauté et la performance de votre véhicule. intérieur, nous restaurons la beauté et la performance de votre véhicule. Besoin d\'un de quelque chose de spécial? Nous adaptons nos services aux besoins spécifiques de votre voiture, pour vous garantir une expérience sans tracas et des résultats exceptionnels à chaque fois.'),
(8, 'section2', 'Voiture de prêt', 'Service_Images/cayenne-court.jpg', 'Laissez-vous séduire par notre voiture de courtoisie. Propulsé par un moteur V6 de 3,0 litres ayant 335 chevaux, ce SUV est doté d\'une suspension pneumatique adaptative, d\'un intérieur en cuir luxueux, de fonctions technologiques avancées et d\'une maniabilité exceptionnelle. Profitez d\'un confort, d\'une performance et d\'un style inégalés à chaque voyage.'),
(9, 'section3', 'Livraison', 'Service_Images/deliver.jpg', 'Nous proposons un service de livraison de voitures haut de gamme, garantissant que votre véhicule de luxe arrive à votre porte avec le plus grand soin. Nous donnons la priorité à une expérience fluide et personnalisée, afin que vous puissiez profiter de votre nouvelle voiture avec facilité et enthousiasme.'),
(10, 'section4', 'Crédit-Bail &amp; Banque', 'Service_Images/lease-big.jpg', 'Nous offrons des facilités bancaires et de leasing flexibles adaptées à vos besoins, garantissant une expérience sans faille lors de l\'acquisition de votre véhicule de luxe.'),
(11, 'section5', 'Maintenance &amp; Réparations', 'Service_Images/mas-maint-big.jpeg', 'Nous proposons des services d\'entretien complets pour que votre véhicule soit le plus performant. Nous utilisons des outils de diagnostic avancés et des pièces d\'origine pour fournir des soins de premier ordre, de l\'entretien de routine aux réparations spécialisées.'),
(12, 'section6', 'Assistance sur Route', 'Service_Images/onroad1.jpeg', 'Nous fournissons des services routiers fiables pour que vous ne soyez jamais bloqué. Une panne, une crevaison ou une panne de carburant, notre équipe est disponible 24/7, pour vous offrir une assistance rapide. Grâce à notre service rapide et efficace, vous pouvez conduire en toute confiance en sachant qu\'il suffit d\'un appel pour obtenir de l\'aide.');

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_num` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `make` varchar(30) NOT NULL,
  `model` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `car_num`, `make`, `model`, `type`, `price`, `image`) VALUES
(1, 'car1', 'Aston Martin', 'DB12 Volante', 'Cabriolet', '€275,000', 'Voiture_Images/db12_cabriolet.webp'),
(2, 'car2', 'Aston Martin', 'DBX', 'SUV', '€250,000', 'Voiture_Images/dbx2.webp'),
(3, 'car3', 'Aston Martin', 'Valour', 'Coupe', '€275,000', 'Voiture_Images/valour.webp'),
(4, 'car4', 'Aston Martin', 'Vanquish', 'Coupe', '€200,000', 'Voiture_Images/vanquish1.webp'),
(5, 'car5', 'Aston Martin', 'Vantage', 'Coupe', '€175,000', 'Voiture_Images/vantage_coupe.webp'),
(6, 'car6', 'Maserati', 'Ghibli', 'Sedan', '€225,000', 'Voiture_Images/ghibli1.webp'),
(7, 'car7', 'Maserati', 'GT2 Stradale', 'Coupe', '€400,000', 'Voiture_Images/gt2_stra1.webp'),
(8, 'car8', 'Maserati', 'Levante', 'SUV', '€190,000', 'Voiture_Images/Levante1.webp'),
(9, 'car9', 'Maserati', 'MC20 Cielo', 'Cabriolet', '€210,000', 'Voiture_Images/MC202.webp'),
(10, 'car10', 'Maserati', 'Quattroporte', 'Sedan', '€175,000', 'Voiture_Images/quattro11.webp'),
(11, 'car11', 'Porsche', 'Cayenne GTS', 'SUV', '€200,000', 'Voiture_Images/cayenne_gts1.png'),
(12, 'car12', 'Porsche', '911 Turbo S', 'Coupe', '€325,000', 'Voiture_Images/911turbo_s1.png'),
(13, 'car13', 'Porsche', '911 GT3 RS', 'Coupe', '€600,000', 'Voiture_Images/911gt3rs1.png'),
(14, 'car14', 'Porsche', 'Taycan', 'Sedan', '€400,000', 'Voiture_Images/taycan1.png'),
(15, 'car15', 'Porsche', 'Panamera', 'Sedan', '€350,000', 'Voiture_Images/panamera1.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
