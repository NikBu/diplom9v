![Лого](https://github.com/NikBu/diplom9v/blob/main/public/images/logo_mini.png?raw=true)
# Дипломный проект: Веб-приложение для "Фенстер Техник"

Этот проект - веб-приложение, разработанное в рамках моего дипломного проекта, демонстрирующее мои навыки и знания в веб-разработке. Приложение моделирует онлайн-магазин для компании "Фенстер Техник" (Fenster Technik).

## Установка

1. Клонируйте репозиторий на свой локальный компьютер.
2. Установите зависимости с помощью `composer install`.
3. Настройте базу данных и окружение.
4. Выполните миграции и заполните базу данных с помощью `php artisan migrate`.
5. Создайте пользователя-администратора с `php artisan db:seed --class=AdminUserSeeder`
6. Запустите сервер разработки с помощью `php artisan serve`.

## Использование

Веб-приложение позволяет пользователям просматривать продукты, добавлять товары в корзину и просматривать новости и специальные предложения компании. Основные функции включают:
- Аутентификация и регистрация пользователей
- Каталог продуктов с функциями поиска и фильтрации по категориям
- Функционал корзины
- Просмотр новостей и акций

![Скриншот](/путь/к/скриншоту.png)

## Использованные технологии

- Фреймворк Laravel PHP
- База данных MySQL
- HTML, CSS, JavaScript
- JS библиотека TinyMCE для форматирования текста

