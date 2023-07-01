# JobApplication Project Installation Guide

A Laravel-based application for managing job applications.

## Table of Contents
- [Prerequisites](#prerequisites)
- [Installation Steps](#installation-steps)

## Prerequisites

Before starting the installation, make sure you have the following prerequisites:

1. PHP 8.1
2. Composer 2.4
3. Laravel 9
3. MySQL 10
4. Git

## Installation Steps

Here are the steps to install the JobApplication project:

1. Clone the Repository

   Open your terminal or command prompt and run the following command to clone the repository:

   ```bash
   git clone https://github.com/shofistwn/laravel-job-application.git
   ```

2. Navigate to the Project Directory

   Go to the cloned project directory by running the command:

   ```bash
   cd laravel-job-application
   ```

3. Install Dependencies

   Run the following command to install all the project dependencies:

   ```bash
   composer install
   ```

4. Configure Environment

   Copy the `.env.example` file and rename it to `.env` by running the command:

   ```bash
   cp .env.example .env
   ```

5. Generate Application Key

   Run the following command to generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure Database

    Create a new database in MySQL with the name `db_job_application` or any name you prefer. Then, open the `.env` file and update the database configuration with the newly created database:
    
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_job_application
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    
    Make sure to replace the values of `DB_USERNAME` and `DB_PASSWORD` with your MySQL database credentials.

7. Run Migrations

   Run the database migrations to create the required tables:

   ```bash
   php artisan migrate
   ```

8. Start the Local Server

   Finally, start the local server by running the command:

   ```bash
   php artisan serve
   ```

   The server will run at `http://localhost:8000`.
   
If you have any questions or encounter any difficulties during the installation process, please do not hesitate to contact me for assistance. Good luck!