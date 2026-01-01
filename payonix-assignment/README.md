# Laravel Admin Management System

A simple, secure, and well-structured Admin Management System built with Laravel 12. This project demonstrates core Laravel features including Role-Based Access Control (RBAC), RESTful APIs with Sanctum, and full CRUD functionality for a resource module.

## Project Overview

This application provides a basic foundation for an admin panel where administrators can manage "Items". It features a secure authentication system that distinguishes between regular users and administrators, ensuring that only authorized personnel can access sensitive areas and perform administrative tasks.

The project is built with a focus on clean code, best practices, and a clear separation of concerns, making it an excellent starting point for more complex applications.

## Tech Stack

-   **Backend**: PHP 8.2+, Laravel 12
-   **Database**: SQLite (default), MySQL, PostgreSQL
-   **Authentication**: Laravel Sanctum (for API), Session-based (for Web)
-   **Frontend**: Blade Templates, Vanilla CSS (no JS frameworks)
-   **Development Environment**: Laravel Sail (Docker-based) is supported but not required.

## Features

-   **Role-Based Access Control (RBAC)**: Simple `admin` role check via custom middleware.
-   **Secure Admin Dashboard**: A dedicated dashboard at `/admin/dashboard` accessible only to admins, displaying statistics like total users and items.
-   **Web CRUD for Items**: Full Create, Read, Update, and Delete functionality for items through a secure web interface.
-   **REST API for Items**: A complete set of RESTful API endpoints for managing items, protected by Laravel Sanctum.
-   **Form Request Validation**: Robust validation using dedicated Form Request classes to keep controllers clean.
-   **Eloquent Relationships**: Clear `User` and `Item` model relationships.
-   **Minimalist UI**: A clean and functional admin UI built with Blade and simple CSS, without the overhead of a large frontend framework.

---

## Getting Started

Follow these instructions to get the project up and running on your local machine for development and testing purposes.

### 1. Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js & NPM
-   A database server (SQLite is used by default, no server needed)

### 2. Clone the Repository

```bash
git clone https://github.com/your-username/payonix-laravel-assignment.git
cd payonix-laravel-assignment
```

### 3. Install Dependencies

Install both PHP and JavaScript dependencies.

```bash
# Install Composer (PHP) dependencies
composer install

# Install NPM (JS) dependencies
npm install

# Build frontend assets
npm run build
```

### 4. Environment Configuration

Create your local environment file by copying the example file.

```bash
cp .env.example .env
```

Then, generate a unique application key.

```bash
php artisan key:generate
```

The project is configured to use SQLite by default. The setup script will automatically create the `database/database.sqlite` file for you. If you prefer to use another database like MySQL, update the `DB_*` variables in your `.env` file accordingly.

### 5. Run Database Migrations & Seed

Run the migrations to create the necessary database tables. We will also seed the database with a default admin user.

```bash
php artisan migrate --seed
```

### 6. Start the Development Server

You can now start the local development server.

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`.

---

## Usage

### Admin Login

After seeding the database, you can log in with the default administrator account:

-   **Email**: `admin@example.com`
-   **Password**: `password`

Navigate to `/login` to access the login page. Once logged in, you will be redirected to the admin dashboard at `/admin/dashboard`.

### API Endpoints

The API provides full CRUD functionality for the `items` resource. All endpoints are prefixed with `/api/admin` and are protected by Laravel Sanctum and an `admin` role check.

To interact with the API, you must first authenticate and obtain an API token.

| Method | URI                    | Action   | Route Name            |
| :----- | :--------------------- | :------- | :-------------------- |
| `GET`  | `/api/admin/items`     | `index`  | `api.items.index`     |
| `POST` | `/api/admin/items`     | `store`  | `api.items.store`     |
| `GET`  | `/api/admin/items/{id}`| `show`   | `api.items.show`      |
| `PUT`  | `/api/admin/items/{id}`| `update` | `api.items.update`    |
| `DELETE`| `/api/admin/items/{id}`| `destroy`| `api.items.destroy`   |

**Example Request (Get all items):**

```
GET /api/admin/items
Accept: application/json
Authorization: Bearer <YOUR_API_TOKEN>
```

