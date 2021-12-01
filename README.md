# Books Library Laravel 📚

This is a web application for managing books. It was created using Laravel. It is a simple application that allows you to add, edit, and delete books.

## How to use the application

▶️ Execute the following command: 
```
composer install
npm install
npm run dev
```
▶️ Open your terminal and execute the following command (you must have docker installed):
```
docker-compose up -d
```
▶️ Create a .env file in the root directory of the application.

▶️ Replace the following values in the .env file:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=library
DB_USERNAME=root
DB_PASSWORD=root
```
▶️ Run the migrations:
```
php artisan migrate
```
▶️ Create storage link:
```
php artisan storage:link
```
▶️ Now execute you can run the app with the following command:
```
php artisan serve
```

✔️ Look the application in the browser at port http://127.0.0.1:8000/
