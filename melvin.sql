-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 08:16 PM
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
-- Database: `melvin`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `password`, `active`, `date_created`) VALUES
(1, 'melvin@gmail.com', '12345', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `food_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `ingredients` varchar(2000) NOT NULL,
  `steps` varchar(2000) NOT NULL,
  `image_path` varchar(1000) NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT current_timestamp(),
  `view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`food_id`, `title`, `type`, `description`, `ingredients`, `steps`, `image_path`, `date_created`, `view_count`) VALUES
(5, 'Takoyaki', 'Snacks', 'Takoyaki is a popular Japanese street food made of octopus pieces wrapped in a savory batter and cooked into small, round balls. Here\'s a basic recipe and step-by-step instructions on how to make takoyaki', '• 2 cups all-purpose flour\r\n• 2 ½ cups dashi stock (or substitute with water)\r\n• 2 eggs\r\n• 1 tsp soy sauce\r\n• ½ tsp salt\r\n• 1 cup cooked octopus pieces (you can substitute with shrimp, crab, or vegetables)\r\n• Takoyaki sauce\r\n• Japanese mayonnaise\r\n• Aonori\r\n• Katsuobushi (bonito flakes)\r\n', '1. Prepare the Batter:  In a mixing bowl, whisk together the flour, dashi stock, eggs, soy sauce, and salt until you get a smooth batter without any lumps. The consistency should be similar to pancake batter.\r\n2. Preheat the Takoyaki Pan:  Place the takoyaki pan on the stove over medium heat. Once heated, lightly grease each mold with oil using a takoyaki brush.\r\n3. Pour Batter into the Pan:  Fill each mold of the takoyaki pan with batter until they are nearly full.\r\n4. Add Fillings:  Place a piece of cooked octopus into each mold. Add chopped spring onions and tempura scraps or crispy fried onions on top.\r\n5. Cook and Shape:  As the batter begins to set around the edges, use a takoyaki pick or skewer to gently push the edges towards the center, forming a round shape. Continue rotating and shaping until the takoyaki are evenly rounded and golden brown on all sides.\r\n6. Flip the Takoyaki:  Once the bottom is cooked and golden brown, use the takoyaki pick or skewer to flip each takoyaki ball over, ensuring they cook evenly on all sides. You may need to rotate them a few times to achieve a uniformly round shape.\r\n7. Cook Until Golden Brown:  Continue cooking and flipping the takoyaki until they are evenly golden brown and crispy on the outside, and the batter is fully cooked on the inside. This usually takes about 5-7 minutes.\r\n8. Serve:  Once cooked, transfer the takoyaki to a serving plate. Drizzle takoyaki sauce and Japanese mayonnaise over the top. Sprinkle with aonori (seaweed flakes) and katsuobushi (bonito flakes) for added flavor.\r\n', 'uploads/1709233218_65e0d44216486.png', 2147483647, 1),
(6, 'Pancake', 'Breakfast', 'Pancakes are a versatile dish enjoyed in many cultures around the world, often served for breakfast or brunch, and can be topped or filled with a variety of sweet or savory ingredients such as maple syrup, fresh fruit, chocolate chips, whipped cream, butter, or savory fillings like eggs, cheese, or bacon. They are typically soft and fluffy, although variations exist depending on regional preferences and recipes.', '• 1 1/2 cups all-purpose flour\r\n• 3 1/2 teaspoons baking powder\r\n• 1 teaspoon salt\r\n• 1 tablespoon white sugar\r\n• 1 1/4 cups milk\r\n• 1 egg\r\n• 3 tablespoons melted butter\r\n', '1. Mix Dry Ingredients:  In a large mixing bowl, whisk together the flour, baking powder, salt, and sugar until well combined.\r\n2. Combine Wet Ingredients:  In another bowl, whisk together the milk, egg, and melted butter until smooth.\r\n3. Combine Wet and Dry Ingredients:  Pour the wet ingredients into the dry ingredients and stir until just combined. Be careful not to overmix; a few lumps are okay.\r\n4. Preheat the Skillet or Griddle:  Place a skillet or griddle over medium heat and lightly grease it with butter or cooking spray.\r\n5. Cook the Pancakes:  Pour about 1/4 cup of batter onto the skillet for each pancake. Cook until bubbles form on the surface of the pancake and the edges look set, about 2-3 minutes.\r\n6. Flip the Pancakes:  Once bubbles have formed and the edges look set, carefully flip the pancakes with a spatula and cook for an additional 1-2 minutes, or until golden brown on both sides.\r\n7. Serve:  Transfer the cooked pancakes to a plate and repeat the process with the remaining batter. Stack the pancakes on plates and add your desired toppings such as maple syrup, fresh berries, whipped cream, sliced bananas, or chopped nuts.\r\n', 'uploads/1709233556_65e0d5940077d.jpeg', 2147483647, 0),
(8, 'Turkey and Avocado Sandwich', 'Lunch', 'Enjoy the perfect lunchtime treat with our Turkey and Avocado Sandwich. Tender slices of turkey breast meet creamy avocado, crisp lettuce, and juicy tomato, all between slices of your favorite bread. With a touch of mayo and mustard for extra flavor, this sandwich is a deliciously simple and satisfying option for any day of the week.', '• Sliced bread\r\n• Sliced turkey breast\r\n• Ripe avocado, sliced\r\n• Lettuce leaves\r\n• Tomato slices\r\n• Mayonnaise\r\n• Salt and pepper to taste\r\n• Red onion slices (optional)\r\n• Mustard (optional)\r\n', '1. Prepare the Bread:  If desired, lightly toast the bread slices to add extra crunch to your sandwich.\r\n2. Spread Mayonnaise (and Mustard):  Take one slice of bread and spread a layer of mayonnaise on it. Optionally, add a thin layer of mustard on top for extra flavor.\r\n3. Layer the Ingredients:  On the slice of bread with mayonnaise, arrange the turkey slices evenly to cover the surface. Next, add slices of ripe avocado on top of the turkey. Layer lettuce leaves, tomato slices, and red onion slices (if using) on top of the avocado.\r\n4. Season and Assemble:  Sprinkle a pinch of salt and pepper over the sandwich filling for added flavor. Place the second slice of bread on top to close the sandwich.\r\n5. Slice and Serve:  Use a sharp knife to slice the sandwich in half diagonally or straight down the middle, depending on your preference. If desired, secure the halves with toothpicks to hold them together. Serve the turkey and avocado sandwich with your favorite side dishes, such as chips, soup, or a crisp salad.\r\n', 'uploads/1709233886_65e0d6de9e270.jpeg', 2147483647, 0),
(9, 'Spaghetti Carbonara', 'Dinner', '', '• 8 oz (225g) spaghetti\r\n• 4 slices of bacon or pancetta, diced\r\n• 2 cloves garlic, minced\r\n• 2 large eggs\r\n• 1/2 cup grated Parmesan cheese\r\n• Salt and black pepper to taste\r\n• Chopped parsley for garnish (optional)\r\n', '1. Cook the Pasta:  Bring a large pot of salted water to a boil. Add the spaghetti and cook according to package instructions until al dente. Reserve about 1/2 cup of pasta water, then drain the spaghetti.\r\n2. Cook the Bacon (or Pancetta):  While the pasta is cooking, heat a skillet over medium heat. Add the diced bacon or pancetta and cook until crispy, about 5-7 minutes. Remove the cooked bacon from the skillet and set it aside, leaving the bacon fat in the skillet.\r\n3. Make the Sauce:  In a mixing bowl, whisk together the eggs, grated Parmesan cheese, minced garlic, and a pinch of black pepper until well combined.\r\n4. Combine Pasta and Sauce:  Once the spaghetti is cooked and drained, add it to the skillet with the reserved bacon fat. Toss the spaghetti in the fat for a minute to coat it evenly. Remove the skillet from heat, then quickly pour the egg and cheese mixture over the hot spaghetti. Use tongs to toss the spaghetti with the sauce until the eggs are cooked by the residual heat from the pasta. If the sauce seems too thick, gradually add some of the reserved pasta water to thin it out.\r\n5. Add Bacon and Serve:  Once the spaghetti is evenly coated in the sauce, add the cooked bacon (or pancetta) back into the skillet and toss everything together. Taste and adjust seasoning with salt and pepper if needed.\r\n6. Garnish and Serve:  Transfer the spaghetti carbonara to serving plates or bowls. Garnish with chopped parsley if desired.\r\n', 'uploads/1709234045_65e0d77d255ae.jpeg', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password_hash`, `active`, `date_created`) VALUES
(1, 'Joshua Pogi Portacion', 'joshportacion9@gmail.com', 'pogi', '$2y$10$EmDZz0eMm9Qgd52bi5WzFuDZ0c4w52NsjUS6bb6DgwNogO/xez0xe', 1, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
