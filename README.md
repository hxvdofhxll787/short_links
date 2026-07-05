# ShortLink Service
Laravel-приложение для создания коротких ссылок с возможностью отслеживания переходов.\
Пользователь может:
- регистрация и вход;
- создавать короткие ссылки;
- переходить по коротким ссылкам;
- просматривать статистику переходов;
- управлять своими ссылками через личный кабинет.
## Стек
- PHP 8.3+
- Laravel 13
- FilamentPHP v3
- MySQL
- Breeze (auth)
## Запуск
### Установка зависимостей
```bash
composer install
npm install
npm run build
```
### Настройка окружения
```bash
cp .env.example .env
php artisan key:generate
```
### Миграции
```bash
php artisan migrate
```
### Запуск сервера
```bash
php artisan serve
```
## Доступ в админку
После регистрации:
```url
http://127.0.0.1:8000/admin
```
