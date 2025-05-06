# 🛒 E-Commerce Microservices Backend (Laravel + DDD)

This project implements a modular **e-commerce backend system** using the **Laravel framework**, following **Domain-Driven Design (DDD)** principles and a **microservices architecture**.

## 📐 Architecture Overview

The system is composed of the following microservices:

- 🛍️ **AuthService** – Manages user register and login.
- 🧾 **ProductService** – Handles creation, pricing, and types of products.
- 💳 **OrderService** – Handles orders logic.

Each service follows the **DDD structure**, divided into:



## 🚀 Getting Started

### Prerequisites

- PHP 8.1+
- Composer
- MySQL or PostgreSQL
- Laravel 10+
- Docker (optional but recommended)

### Installation

```bash
git clone https://github.com/your-username/your-project.git
cd your-project

# Install dependencies
composer install

# Copy .env file
cp .env.example .env

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate
```


✅ Features
Modular, scalable microservices structure

Clean DDD separation between domain, application, and infrastructure layers

Typed value objects and enums

Laravel Eloquent ORM for persistence

Ready to be expanded with messaging (RabbitMQ/Kafka) or API gateway

📁 Folder Structure (Example: ProductService)


ProductService/
├── Domain/
│   ├── Entities/
│   ├── ValueObjects/
│   ├── Repositories/
├── Application/
│   ├── Commands/
│   ├── Handlers/
│   └── DTOs/
├── Infrastructure/
│   └── Persistence/
├── Http/
│   └── Controllers/
├── Models/



