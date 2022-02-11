## About the system

This system use SQLite database to make the system portable.

## Before Run System

### Create Database File

```bash
php artisan app:create-db-file
```

Using above command, you'll create an SQLite file under the database folder. Then you'll need to change your database path in the example .env file

```config
DB_CONNECTION=sqlite
DB_FOREIGN_KEYS=true
DB_DATABASE=YOUR_PATH\tasksdb.sqlite # change this line with your database path.
```

### Migrate all the database schema

```bash
php artisan migrate
```

Then you need to seed database to populate developers

```bash
php artisan db:seed
```

The last thing you need to do is fetching provider data to the system

```bash
php artisan app:fetch-tasks
```

That's all.

You can run the project using this command

```
php artisan serve
```

You can access the dashboard using this url: **http://localhost:8000/developer-task**

## Info

Providers named by **Marmara** and **Ege**. This should be fun :P
