## LTask Backend (Laravel 10 PHP framework tasker api with basic auth)

## Installation

Copy .env from .env.example file and then write your database config. API_LOGIN and API_PASSWORD should be set to test and test respectively. 

```bash
cp .env.example .env
```
Run composer install

```bash
composer install
```

Run migrations

```bash
php artisan migrate
```

Run seeders

```bash
php artisan migrate:refresh --seed
```
Generate app key:
```bash
php artisan key:generate
```

Run:

```bash
php artisan serve
```
Now you can access the api from postman, curl or from the Vue project by reference 

```bash 
localhost:8000
```

Examples of requests (with basic api required):

Get Tasks response:

```json
{
"data": [
            {
                "id": 1,
                "name": "Mr.",
                "description": "A dolores magnam sequi laudantium sit. Magni quos quis autem facilis dolores. Tenetur necessitatibus ut voluptate consequatur. Veniam nesciunt corporis et consequuntur.",
                "author": {
                    "id": 1,
                    "name": "Icie Monahan III",
                    "email": "blubowitz@example.org",
                    "created_at": "2023-11-13T18:48:36.000000Z",
                    "updated_at": "2023-11-13T18:48:36.000000Z"
                },
                "status": "new",
                "is_open": 1
            }
  ]
}
```

Delete Task response:

```json
{
    "data": {
        "message": "Карточка успешно удалена"
    }
}
```




