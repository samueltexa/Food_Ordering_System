
---

# Food Ordering and Blog Platform System

Welcome to the Food Ordering and Blog Platform System! This project aims to provide a seamless experience for users to browse meals, place orders, and engage with food-related content through a blog. Designed with a client-server architecture, this system ensures smooth interaction between users and backend services.

## Table of Contents

1. [Introduction](#introduction)
2. [Features](#features)
    - [Menu Display](#menu-display)
    - [Featured Dishes](#featured-dishes)
    - [Recently Searched Dishes](#recently-searched-dishes)
    - [Blogs/News Section](#blogsnews-section)
    - [Help Section](#help-section)
    - [User Authentication](#user-authentication)
    - [Cart System](#cart-system)
3. [Technologies Used](#technologies-used)
    - [Frontend](#frontend)
    - [Backend](#backend)
    - [Database Management System (DBMS)](#database-management-system-dbms)
4. [Setup and Installation](#setup-and-installation)
5. [Usage](#usage)
6. [Contributing](#contributing)
7. [License](#license)

## Introduction

This project focuses on developing a comprehensive food ordering system integrated with a blog platform. Users can browse various meals, place orders, and engage with food-related content. The system is designed with a client-server architecture to ensure effective interaction between the user interface and backend services.

## Features

### Menu Display

- Lists available meals with images, descriptions, prices, and categories (e.g., breakfast, lunch, dinner).

### Featured Dishes

- Showcases promotional or featured dishes, including new arrivals and chef recommendations. The featured dishes section rotates periodically.

### Recently Searched Dishes

- Displays dishes that users have recently searched for, allowing quick access to previously viewed items.

### Blogs/News Section

- Allows users to post and interact with food-related content including personal experiences, recommendations, and more. Posts are categorized for easy browsing, and interaction is possible through comments.

### Help Section

- Provides guidance on placing orders, making payments, and navigating the platform.

### User Authentication

- Features a registration and login system for personalized experiences. Users can save their order history, favorite meals, and track current orders.

### Cart System

- **Cart Overview:** Displays selected meals with itemized details.
- **Add/Remove/Update Items:** Users can manage their cart with ease.
- **Cart Summary:** Shows total items, subtotal, and final cost.
- **Proceed to Checkout:** Users can complete their orders through a streamlined checkout process.

## Technologies Used

### Frontend

- **HTML:** Structures the content of web pages.
- **CSS:** Styles the application for a visually appealing interface.
- **JavaScript:** Adds interactivity, such as dynamic cart updates and form validations.

### Backend

- **PHP:** Handles server-side logic, data processing, and user sessions. Manages communication between the frontend and the database.

### Database Management System (DBMS)

- **MySQL:** Stores and manages user information, meal details, orders, blog posts, and transaction records.

## Setup and Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/samueltexa/food-system.git
   ```

2. **Navigate to the project directory:**

   ```bash
   cd food-ordering-blog-platform
   ```

3. **Set up the database:**

   - Create a new MySQL database and import the provided SQL dump file.

4. **Configure environment variables:**

   - Update the database connection details in `config.php`.

5. **Install dependencies:**

   - Ensure you have a local server stack (e.g., XAMPP, WAMP) to run PHP.

6. **Run the application:**

   - Start your local server and navigate to `localhost/food-ordering-blog-platform` in your web browser.

## Usage

- **Browse Meals:** View and search for meals from the menu.
- **Place Orders:** Add meals to the cart, review, and proceed to checkout.
- **Read and Post Blogs:** Engage with community posts and share your own food-related experiences.
- **Manage Account:** Register, log in, and manage your account details and order history.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or fix.
3. Commit your changes and push to your branch.
4. Open a pull request describing your changes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---
