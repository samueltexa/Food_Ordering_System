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

INSERT INTO user (firstName, lastName, username, email, password, address, image) VALUES
('John', 'Doe', 'johndoe', 'john@example.com', 'password123', '123 Main St', 'public/images/chicken.jpg'),
('Jane', 'Smith', 'janesmith', 'jane@example.com', 'password123', '456 Elm St', 'public/images/chicken.jpg');


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
    FOREIGN KEY (image_id) REFERENCES images(id) ON DELETE CASCADE,
    category VARCHAR(50) NOT NULL DEFAULT 'Main',
    available BOOLEAN DEFAULT TRUE
);

-- Insert menu items
INSERT INTO menu (name, price, description, image_id) VALUES
('Pancakes', 15000.00, 'Contains wheat, milk, and eggs.', 1), -- Assuming image_id 1 for Pancakes
('Toasted Bread', 10000.00, 'Crispy brown toasted bread served with butter.', 2), -- Assuming image_id 2 for Toasted Bread
('Fried Eggs', 10000.00, 'Over-easy fried eggs, served with a hot cup of tea.', 3), -- Assuming image_id 3 for Fried Eggs
('Fried Rice', 75000.00, 'Savory fried rice with vegetables, eggs, and beef.', 4), -- Assuming image_id 4 for Fried Rice
('Katoogo', 50000.00, 'A traditional dish with plantains, beans, and meat.', 5), -- Assuming image_id 5 for Katoogo
('Rolex', 25000.00, 'Rolled chapati filled with eggs, tomatoes, and onions.', 6), -- Assuming image_id 6 for Rolex
('Spaghetti', 65000.00, 'Classic spaghetti with rich tomato sauce, seasoned with spices.', 7), -- Assuming image_id 7 for Spaghetti
('Fried Chicken', 100000.00, 'Crispy fried chicken pieces served with rice.', 8); -- Assuming image_id 8 for Fried Chicken

-- Create the blogPosts table
CREATE TABLE blogPosts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    post TEXT NOT NULL,
    likes INT DEFAULT 0,
    postImage VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

-- Insert sample blog posts
INSERT INTO blogPosts (user_id, post, likes, postImage) VALUES
(1, 'Just had the best avocado toast ever! #foodie', 10, 'public/images/chicken.jpg'),
(2, 'Spicy chicken wings are my favorite snack!', 5, 'public/images/chicken.jpg'),
(1, 'Can’t wait to try the new pancakes recipe!', 8, 'public/images/chicken.jpg');

-- Create the comments table
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    comment TEXT NOT NULL,
    FOREIGN KEY (post_id) REFERENCES blogPosts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

-- Insert sample comments
INSERT INTO comments (post_id, user_id, comment) VALUES
(1, 2, 'I love avocado toast too!'),
(1, 2, 'Looks delicious!'),
(2, 1, 'I need to try that recipe!'),
(3, 2, 'Pancakes are the best breakfast!'),
(1, 2, 'Pancakes are the best breakfast!'),
(2, 2, 'Pancakes are the best breakfast!'),
(1, 2, 'Pancakes are the best breakfast!'),
(2, 2, 'Pancakes are the best breakfast!');

-- creating the Orders and OderItems table 

-- Orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    total_price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    order_status VARCHAR(20) DEFAULT 'pending'
);

-- Order Items table
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    dish_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);