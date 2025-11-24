Laravel Mini Task Management System

A simple Task Management application built with Laravel 12.
Supports user authentication, task CRUD, task reminders via email, and provides both Blade UI and REST API endpoints.

Features

User registration and login (Laravel Breeze & Sanctum)
Task management (Create, Read, Update, Delete)
Task fields: Title, Description, Status (pending, in-progress, completed), Due Date
Task filtering by status and due date
Pagination on task list
Email reminders for tasks due tomorrow (scheduled job)
RESTful API for tasks (with JSON responses)
Role-based access (optional: Admin/User)
Project Structure


app/
 ├─ Models/
 │   ├─ Task.php
 │   └─ User.php
 ├─ Http/Controllers/
 │   ├─ API/TaskController.php
 │   ├─ Web/TaskController.php
 │   └─ Auth/...
database/
 ├─ migrations/
 │   └─ create_tasks_table.php
 ├─ seeders/
 │   └─ DatabaseSeeder.php
resources/views/
 ├─ layouts/app.blade.php
 ├─ tasks/index.blade.php
 └─ tasks/form.blade.php
routes/
 ├─ web.php
 └─ api.php
.env.example


Requirements

PHP 8.2+
Composer
Node.js + NPM
MySQL / MariaDB (or any database supported by Laravel)
Mail service configured for reminders

Installation Steps

Clone the repository
cd laravel-mini-task


Install PHP dependencies
composer install


Install Node.js dependencies & build assets
npm install
npm run dev


Copy the environment file and set credentials
cp .env.example .env

Run migrations & seed database
php artisan migrate --seed


Run the local server
php artisan serve

Visit: http://127.0.0.1:8000

Register a new user and start managing tasks.

API Endpoints
Method	Endpoint	Description
GET	/api/tasks	List all user tasks (paginated)
POST	/api/tasks	Create a new task
PUT	/api/tasks/{id}	Update a task
DELETE	/api/tasks/{id}	Delete a task

Authentication: Bearer token via Sanctum.

Scheduler / Email Reminders

Laravel uses a queued job to send email reminders for tasks due tomorrow.

To run scheduler locally:
php artisan queue:work
php artisan schedule:run

Configure mail credentials in .env to enable email delivery.

