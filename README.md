# Mypcot User & Blog Management System

This is a Laravel-based assignment project that supports two roles:

- **0 - Super Admin**
- **1 - User**

## Setup Instructions

1. **Clone the Repository**

    git clone https://github.com/abdullah8098/Mypcot.git
    cd Mypcot

2. Install Dependencies

    composer install
    npm install && npm run dev

3. Environment Setup
    cp .env.example .env
    php artisan key:generate

4. Configure .env
    <!-- Update your database settings and other environment variables in the .env file. -->

5. Run Migrations and Seeder
    php artisan migrate --seed
    <!-- This will create the first Super Admin record using the seeder. -->

6. Run the Application
    php artisan serve




Features
    Super Admin (Role: 0)
        Login
        Dashboard shows total users count
        Can create, update, delete, search, filter (active/inactive), and bulk delete users
        Can logout

    User (Role: 1)
        Login
        Can update profile
        Can create, update, delete, search, and bulk delete blogs
        Dashboard shows blog count for the logged-in user
        Can logout

    Other Highlights
        Authentication with Laravel Breeze or custom auth (as implemented)
        Active/Inactive filter functionality
        Bulk delete for both users and blogs
        Clean UI for both admin and user dashboards
        Well-structured role-based access

    Notes
        Users can only see and manage their own blogs.
        The Super Admin manages all users.
        Additional features and improvements can be added as needed.

