🦁 Zoo Management — Laravel CRUD-приложение
📋 Описание
Это тестовое Laravel-приложение для управления клетками в зоопарке. Реализованы стандартные CRUD-операции: создание, редактирование, удаление и просмотр клеток.
Список клеток доступен только авторизованным пользователям.

## 📦 Установка

```bash
git clone https://github.com/your-username/virtual-zoo.git
cd virtual-zoo
composer install
cp .env.example .env
php artisan key:generate
```

🐘 Настройка базы данных (PostgreSQL)
Создайте базу данных с именем zoo
Например, через pgAdmin4 или psql:

CREATE DATABASE zoo;
В файле .env укажите ваши данные подключения:

```bash
DB*CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=zoo
DB_USERNAME=postgres
DB_PASSWORD=ваш*пароль

```

Выполните миграции:

```bash
    php artisan migrate
```

🚀 Запуск сервера

```bash
    php artisan serve
```

🔐 Доступ
Для входа в систему используйте следующие данные:

```bash
Email: test@gmail.com

Пароль: 12345678910
```

🚀 Навигация
После успешного входа вы будете автоматически перенаправлены на страницу со списком клеток (/cages).
Если вы уже авторизованы, главная страница (/) также редиректит вас на /cages.

⚙️ Запуск проекта
bash
Copy
Edit

# Настройка .env и ключа приложения

cp .env.example .env
php artisan key:generate

# Миграции

php artisan migrate

# Запуск сервера

php artisan serve
