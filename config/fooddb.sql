-- Create the user table
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address TEXT,
    image VARCHAR(255)
);


-- Create the images table
CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imageName VARCHAR(255) NOT NULL,
    imagePath VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL
);

-- Insert  data into the images table with descriptions
INSERT INTO images (imageName, imagePath, description) VALUES
('Ovacado Toast', 'public/images/Avocado.jpeg', 'Fresh avocado slices with a sprinkle of salt and pepper.'),
('Classic Cheeseburger', 'public/images/burger.jpg', 'Juicy beef patty with melted cheese and fresh toppings.'),
('Spicy Chicken Wings', 'public/images/chicken.jpg', 'Succulent chicken wings with a spicy kick.'),
('Fried Fish', 'public/images/fish.jpeg', 'Golden-brown fried fish served with vegetables and lemon wedges.'),
('Fried Eggs', 'public/images/fried_eggs.jpeg', 'Perfectly fried eggs with a golden yolk.'),
('Fried Rice', 'public/images/fried_rice.jpeg', 'Fried rice with a mix of vegetables and a savory sauce.'),
('Kattogo', 'public/images/katoogo.jpeg', 'Traditional Ugandan dish with beans and plantains.'),
('Pancakes', 'public/images/Pancakes.jpeg', 'Fluffy pancakes served with maple syrup and fresh fruits.'),
('Vegetarian Pizza', 'public/images/pizza.jpeg', 'Delicious pizza with fresh mozzarella and a variety of toppings.'),
('Rolex', 'public/images/Rolex.jpeg', 'Ugandan street food with eggs, vegetables, and chapati.'),
('Spaghetti', 'public/images/spaghetti.jpeg', 'Classic spaghetti served with marinara sauce and meatballs.'),
('Toasted Bread', 'public/images/toasted_bread.jpeg', 'Toasted bread with butter and a side of jam.'),
('Fried Turkey', 'public/images/Turkey.jpeg', 'Roasted turkey served with stuffing and cranberry sauce.');


-- Create the menu table
CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT NOT NULL,
    image_id INT,
    FOREIGN KEY (image_id) REFERENCES images(id) ON DELETE CASCADE
);

-- Insert menu items
INSERT INTO menu (name, price, description, image_id) VALUES
('Pancakes', 15000.00, 'Contains wheat, milk, and eggs.', 1),
('Toasted Bread', 10000.00, 'Crispy brown toasted bread served with butter.', 2),
('Fried Eggs', 10000.00, 'Over-easy fried eggs, served with a hot cup of tea.', 3),
('Fried Rice', 75000.00, 'Savory fried rice with vegetables, eggs, and beef.', 4),
('Katoogo', 50000.00, 'A traditional dish with plantains, beans, and meat.', 5),
('Rolex', 25000.00, 'Rolled chapati filled with eggs, tomatoes, and onions.', 6),
('Spaghetti', 65000.00, 'Classic spaghetti with rich tomato sauce, seasoned with spices.', 7),
('Fried Chicken', 100000.00, 'Crispy fried chicken pieces served with rice.', 8);

-- Create the blogPosts table
CREATE TABLE blogPosts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    post TEXT NOT NULL,
    likes INT DEFAULT 0,
    postImage VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

-- Create the comments table
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    comment TEXT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES blogPosts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);


CREATE TABLE user_likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    UNIQUE (user_id, post_id),
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES blogPosts(id) ON DELETE CASCADE
);
