## Introduction

This application is an example for Global Tickets.

The application is built using Laravel, Vue.js, and Jetstream. For the front-end, Tailwind CSS with Shadcn UI is used. The application is a "simple" URL shortener. You can create short links, view them, and delete them.

**Main technologies used:**
- [Laravel](https://laravel.com)
- [Vue.js](https://vuejs.org)
- [Jetstream](https://jetstream.laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [Shadcn UI](https://www.shadcn-vue.com/docs/)

**Extra packages used:**
- [Tabler Icons](https://tabler.io/icons/)
- [Heroicons](https://heroicons.com)

Example application created by [Rick Visser](https://linkedin/in/cytorick).

---

## Installation

For the installation of this application, you need to have the following software installed:
- [Composer](https://getcomposer.org)
- [Node.js](https://nodejs.org)
- [NPM](https://www.npmjs.com)
- [MySQL](https://www.mysql.com)
- [PHP](https://www.php.net)
- [Laravel Herd](https://herd.laravel.com) (optional)

To install the application, you need to follow these steps:

### Clone the repository
To clone the repository, you need to run the following command:
```bash
git clone
```


### Run composer install
To install the PHP dependencies, you need to run the following command:

```bash
composer install
```

### Run npm install
To install the JavaScript dependencies, you need to run the following command:

```bash
npm install
```

### Create a .env file
To create a .env file, you need to run the following command:

```bash
cp .env.example .env
```

### Generate an application key
To generate an application key, you need to run the following command:

```bash
php artisan key:generate
```

### Migrate the database
To migrate the database, you need to run the following command:

```bash
php artisan migrate
```
    
### Run the application
To run the application, you need to run the following command:

```bash
php artisan serve
```

---
