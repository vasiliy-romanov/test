Использованно:

Symfony
Docker
RabbitMq
PostGreSQL

Установка:

1. Скачать репозиторий.
2. Запустить команду docker-compose up из папки со скаченным репозиторием.
3. Запустить миграции командой php bin/console doctrine:migrations:migrate

Приложение расчитывает факториал от 1 до 1000. Каждый пользователь видит свои ранее введеные результаты. Пользователи c ролью администратора могут просматривать все результаты.
