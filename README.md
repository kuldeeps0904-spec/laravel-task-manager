# 📝 Laravel Task Manager

A simple and clean Task Management CRUD application built using Laravel.

This project demonstrates full CRUD (Create, Read, Update, Delete) operations using Laravel’s MVC architecture and Eloquent ORM.

---

## 🚀 Features

- ✅ Create new tasks
- 📋 View all tasks (with pagination)
- ✏️ Edit existing tasks
- ❌ Delete tasks
- 🔄 Mark tasks as completed
- 🛡 Form validation
- 💬 Flash success messages
- 🗄 SQLite database support
- 🎨 Clean UI using Tailwind CSS

---

## 🛠 Tech Stack

- PHP 8+
- Composer 2+
- Laravel 10+
- SQLite
- Blade Templating Engine
- Tailwind CSS
- Eloquent ORM

---

## 📂 Project Structure

```
app/
 ├── Models/Task.php
 ├── Http/Controllers/TaskController.php
database/
 ├── migrations/
routes/
 ├── web.php
resources/
 ├── views/
```

---

## ⚙️ Installation & Setup Guide

Follow these steps to run the project locally:

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/kuldeeps0904-spec/Laravel-Task-Manager.git
cd Laravel-Task-Manager
```

---

### 2️⃣ Install Dependencies

```bash
composer install
```

---

### 3️⃣ Setup Environment File

```bash
cp .env.example .env
php artisan key:generate
```

---

### 4️⃣ Configure Database (SQLite)

Open `.env` and ensure:

```
DB_CONNECTION=sqlite
```

Then create an empty database file inside the `database` folder:

```
database/database.sqlite
```

(Windows users can manually create this file.)

---

### 5️⃣ Run Database Migrations

```bash
php artisan migrate
```

This will create the `tasks` table.

---

### 6️⃣ Start Development Server

```bash
php artisan serve
```

Visit in your browser:

```
http://127.0.0.1:8000
```

You will be automatically redirected to `/tasks`.

---

## 🧠 Architecture Used

This project follows the MVC pattern:

- **Model** → Handles database interaction (Task model)
- **View** → Blade templates for UI rendering
- **Controller** → Handles request logic and CRUD operations
- **Routes** → Resource routing for RESTful endpoints

---

## 📚 Learning Concepts Demonstrated

- Laravel Resource Controllers
- RESTful Routing
- Eloquent ORM
- Database Migrations
- Mass Assignment Protection
- Form Validation
- Pagination
- Blade Templating
- Flash Messaging
- MVC Architecture

---

## 🔮 Future Improvements

- User authentication (Login/Register)
- Task filtering & search
- API version of CRUD
- Task categories
- Deployment to cloud (Render / Railway / VPS)

---

## 👨‍💻 Author

**Kuldeep Shrivastav**  
Full-Stack Developer (Laravel | Flutter)

---

## 📜 License

This project is open-source and available under the MIT License.
