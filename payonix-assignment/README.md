# Laravel Admin Management System

A minimal and secure Admin Management System built using Laravel as part of a technical assessment.  
This project demonstrates core Laravel concepts such as authentication, role-based access control, and CRUD operations, with a focus on clean structure and best practices rather than UI complexity.

---

## Project Overview

This application provides an admin-only panel where authenticated administrators can manage a simple **Items** resource.  
Access to all administrative pages and APIs is restricted using role-based middleware to ensure proper authorization.

The project is intentionally scoped to highlight backend fundamentals, authorization flow, and data handling in Laravel.

---

## Tech Stack

- **Backend**: PHP 8.2+, Laravel (10/11 compatible)
- **Database**: MySQL (recommended), PostgreSQL, SQLite (optional)
- **Authentication**:
  - Session-based authentication (Web)
  - Laravel Sanctum (API)
- **Frontend**: Blade Templates (no frontend frameworks)

---

## Features

- Secure admin authentication (login & logout)
- Role-based access control using custom middleware
- Admin dashboard (`/admin/dashboard`)
- Items management with full CRUD functionality
- RESTful API for Items (admin-protected)
- Request validation using Form Request classes
- Eloquent relationships between Users and Items
- Simple and clean admin interface

---

## Database Structure

### users
- id
- name
- email
- password
- role
- timestamps

### items
- id
- name
- description
- status
- created_by (foreign key → users.id)
- timestamps

---

## Getting Started

Follow the steps below to set up the project locally.

### 1. Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL or PostgreSQL (recommended)

---

### 2. Clone the Repository

```bash
git clone https://github.com/rohankumar404/payonix-laravel-assignment.git
cd payonix-laravel-assignment

3. Install Dependencies

composer install
npm install
npm run build


4. Environment Configuration

cp .env.example .env
php artisan key:generate


Update database credentials in the .env file as needed:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=payonix-assignment
DB_USERNAME=root
DB_PASSWORD=


5. Run Migrations & Seeders

php artisan migrate --seed


This will create all required tables and seed a default admin user.


6. Start the Development Server

php artisan serve


Application URL:

http://127.0.0.1:8000


Default Admin Credentials

Email: admin@example.com  
Password: password


Login URL:

/login


Admin Routes

Dashboard: /admin/dashboard  
Items Management: /admin/items  

All admin routes are protected by auth and role:admin middleware.


API Endpoints

All API routes are prefixed with /api/admin and require authentication.

GET     /api/admin/items          List items  
POST    /api/admin/items          Create item  
GET     /api/admin/items/{id}     View item  
PUT     /api/admin/items/{id}     Update item  
DELETE  /api/admin/items/{id}     Delete item  

API authentication is handled using Laravel Sanctum.


Security Notes

Authorization is enforced using middleware  
CSRF protection is enabled for web routes  
Mass assignment protection is applied in models  
Validation is handled using Form Request classes  


Assignment Context

This project was developed as part of a Laravel technical assessment.  
The scope is intentionally kept minimal to demonstrate backend structure, security, and role-based access control.
