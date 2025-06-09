# ToDoKirano

A modern Task Management API built with Laravel 12 and Laravel Sanctum for authentication. This RESTful API provides comprehensive task management functionality with user authentication and authorization.

## 📋 Overview

ToDoKirano is a backend API service that allows users to manage their tasks efficiently. The application provides secure user authentication using Laravel Sanctum and offers full CRUD operations for task management. Each user can manage their own tasks with different status levels and due dates.

### Key Features

- 🔐 **User Authentication** - Register, login, and logout with token-based authentication
- ✅ **Task Management** - Create, read, update, and delete tasks
- 🏷️ **Task Status Tracking** - Support for pending, in_progress, and completed statuses
- 📅 **Due Date Management** - Set and track task deadlines
- 👤 **User-specific Tasks** - Each user can only access their own tasks
- 🔒 **Secure API** - Protected routes with Sanctum middleware
- 📖 **RESTful Design** - Clean and intuitive API endpoints

## 🛠️ Technology Stack

### Backend Framework
- **Laravel 12** - Modern PHP framework with latest features
- **PHP 8.2+** - Latest PHP version with improved performance

### Authentication & Security
- **Laravel Sanctum 4.1** - Token-based API authentication
- **Bcrypt Hashing** - Secure password hashing

### Database
- **SQLite** (default) - Lightweight database for development
- **MySQL/PostgreSQL** - Production-ready database options

### Development Tools
- **Laravel Pail** - Real-time log monitoring
- **Laravel Pint** - Code style fixer
- **Laravel Sail** - Docker development environment
- **PHPUnit** - Testing framework
- **Faker** - Test data generation

## 📊 Database Schema

### Users Table
- `id` - Primary key
- `name` - User's full name
- `email` - Unique email address
- `password` - Hashed password
- `email_verified_at` - Email verification timestamp
- `remember_token` - Remember me token
- `created_at`, `updated_at` - Timestamps

### Tasks Table
- `id` - Primary key
- `user_id` - Foreign key to users table
- `title` - Task title (required)
- `description` - Task description (optional)
- `status` - Task status: `pending`, `in_progress`, `completed`
- `due_date` - Task deadline (optional)
- `created_at`, `updated_at` - Timestamps

## 🚀 Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js 16+ and npm
- SQLite (or MySQL/PostgreSQL)

### Step 1: Clone the Repository

```bash
git clone https://github.com/Abdulaziz-cybers/ToDoKirano.git
cd ToDoKirano
```

### Step 2: Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### Step 3: Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Database Setup

```bash
# Create SQLite database file (if using SQLite)
touch database/database.sqlite

# Run migrations
php artisan migrate
```

### Step 5: Start Development Server

```bash
# Start Laravel development server
php artisan serve

# Or use the comprehensive development command
composer run dev
```

The API will be available at `http://localhost:8000`

## 📡 API Documentation

### Base URL
```
http://localhost:8000/api
```

### Authentication Endpoints

#### Register User
```http
POST /api/register
Content-Type: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Response:**
```json
{
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    },
    "token": "1|abc123..."
}
```

#### Login User
```http
POST /api/login
Content-Type: application/json

{
    "email": "john@example.com",
    "password": "password123"
}
```

#### Logout User
```http
POST /api/logout
Authorization: Bearer {token}
```

#### Get Current User
```http
GET /api/user
Authorization: Bearer {token}
```

### Task Management Endpoints

> **Note:** All task endpoints require authentication via Bearer token

#### List All Tasks
```http
GET /api/tasks
Authorization: Bearer {token}
```

#### Create Task
```http
POST /api/tasks
Authorization: Bearer {token}
Content-Type: application/json

{
    "title": "Complete project documentation",
    "description": "Write comprehensive README and API docs",
    "status": "pending",
    "due_date": "2024-12-31"
}
```

#### Get Specific Task
```http
GET /api/tasks/{id}
Authorization: Bearer {token}
```

#### Update Task
```http
PUT /api/tasks/{id}
Authorization: Bearer {token}
Content-Type: application/json

{
    "title": "Updated task title",
    "status": "in_progress",
    "due_date": "2024-12-25"
}
```

#### Delete Task
```http
DELETE /api/tasks/{id}
Authorization: Bearer {token}
```

### Task Status Values
- `pending` - Task is not started
- `in_progress` - Task is currently being worked on
- `completed` - Task is finished


## 🛠️ Development

### Real-time Logs
```bash
# Monitor application logs
php artisan pail
```

### Build Assets
```bash
# Development build
npm run dev

# Production build
npm run build
```

### Comprehensive Development Server
```bash
# Start all development services (server, queue, logs, vite)
composer run dev
```

## 🔧 Configuration

### Database Configuration

By default, the application uses SQLite. To use MySQL or PostgreSQL:

1. Update your `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todokirano
DB_USERNAME=root
DB_PASSWORD=your_password
```

2. Run migrations:
```bash
php artisan migrate
```

### Environment Variables

Key environment variables to configure:

- `APP_NAME` - Application name
- `APP_URL` - Application URL
- `DB_*` - Database configuration
- `MAIL_*` - Email configuration (for notifications)

## 📁 Project Structure

```
ToDoKirano/
├── app/
│   ├── Http/Controllers/Api/
│   │   ├── AuthController.php
│   │   └── TaskController.php
│   └── Models/
│       ├── Task.php
│       └── User.php
├── database/
│   └── migrations/
├── routes/
│   ├── api.php
│   └── web.php
├── tests/
├── .env.example
├── composer.json
├── package.json
└── README.md
```

## 🚀 Production Deployment

### Environment Setup
1. Set `APP_ENV=production`
2. Set `APP_DEBUG=false`
3. Configure production database
4. Set up proper mail configuration
5. Configure cache and session drivers

### Optimization Commands
```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Build production assets
npm run build
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request


---

**Happy Task Managing! 🎯**

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
