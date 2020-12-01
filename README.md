## Laravel-Mailbox
Mailbox created with PHP/Laravel and Mysql as backend. It reads mails from Gmail and shows in the grid with search option.

## php and mysql versions used
10.4.16-MariaDB as DB
PHP version: 7.3.24  PHP version

## Installation 
- Download the project, cd into the project folder and run **composer install**
- Create a DB with desired name.
- Edit DB_DATABASE,DB_USERNAME,DB_PASSWORD values in **.env** at root project folder.
- run **php artisan migrate** in project root folder.
- run **php artisan serve** in project root folder.

**http://localhost:8000/mailbox** will load the ui and **php artisan fetch:email** will fetch all emails from gmail to local db, this can be used with cron to fetch the emails in regular intervals.
