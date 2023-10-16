# Test-task

#### Radievych V.
#### 11-oct-2023
#### version 1.0

This is a test task for VRG Soft

Tasks:

1. Необхідно створити довідник книг з можливістю CRUD.

    Кожна книга має бути:
    1.1 Назва. (Обов'язкове поле)
    1.2 Короткий опис. (Необов'язкове поле)
    1.3 Зображення. (jpg або png, не більше 2 Мб, повинна зберігатися в окрему папку та мати унікальне ім'я файлу)
    1.4 Автори (Обов'язкове поле, може бути кілька авторів у однієї книги, має бути можливість вибирати зі списку авторів, що створюється окремо).
    1.5 Дата опублікування книги.
2. Список авторів створюється окремо. Також має бути можливість додавання, видалення та редагування. У кожного автора мають бути:

    2.1 Прізвище (Обов'язкове поле, не коротше 3 символів)
    2.2 Ім'я (Обов'язкове, не пусте)
    2.3 По-батькові (Необов'язкове)
3. На виході отримуємо:

    3.1 Перегляд окремо сторінок усіх книг та авторів.
    3.2 На сторінці авторів:

    -Має бути можливість побачити всіх авторів.
    -Зробити сортування авторів на прізвище.
    -Пошук (фільтр) на прізвище, ім'я.
    -Додавання, редагування реалізувати в модальних вікнах через ajax.
    -Видалення.

    3.3 На сторінці книг:

    -Має бути можливість побачити всі книги.
    -Зробити сортування книг за назвою.
    -Пошук(фільтр) за назвою, автором.
    -Додавання, редагування реалізувати в модальних вікнах через ajax.
    -Видалення.

    3.4 Зробити пагінацію по 15 сторінок.
4. У проекті обов'язково використовувати:
    
    -База даних (mysql).
    -Створення таблиць реалізувати через механізм міграцій.
    -Back-end використовувати Yii2, Laravel або Symfony.

Візуальне оформлення на розсуд того, хто виконує.

Надати посилання на репозиторій із інструкцією для розгортання проекту.