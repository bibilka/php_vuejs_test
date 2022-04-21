# PHP VueJs Test
Тестовое задание: PHP (native) + VueJS

## Требования
- [Docker](https://www.docker.com)
- [Docker Compose](https://docs.docker.com/compose/)
- [Composer](https://getcomposer.org)
- [Git](https://git-scm.com)

## Установка проекта

### 1. Склонировать репозиторий. 
```
    git clone https://github.com/bibilka/php_vuejs_test.git
```

В итоге создастся папка `php_vuejs_test` в текущей активной директории. Перейдем в эту папку:
```
    cd php_vuejs_test
```
### 2. Подгружаем зависимые пакеты через composer

```
    composer install
```

### 3. Собрать и запустить докер контейнеры.

```
    docker-compose build
    
    docker-compose up -d
```
Чтобы посмотреть активные контейнеры и проверить что все запустилось успешно, можно воспользоваться следующей командой:
```
    docker-compose ps
```
_____
:white_check_mark: <b>Все готово, проект запущен!</b> :+1: :tada:
_____

### Прочее
- Если в процессе возникли какие-либо ошибки, можно воспользоваться командой `docker-compose logs`
- Также все ошибки будут показываться, если запускать контейнер не фоновым процессом: `docker-compose up`
- Остановить все текущие активные контейнеры: `docker-compose stop`
- Остановить и удалить все текущие контейнеры: `docker-compose down`. Затем придется снова собрать контейнеры: `docker-compose build`
- Чтобы подлючиться к базе данных напрямую, можно воспользоваться соответствующим контейнером: `docker exec -it db bash`, затем внутри контейнера выполнить команду: `mysql -uroot -proot database`.
- Чтобы удалить все контейнеры вместе с базой данных можно воспользоваться командой: `docker-compose down -v`
