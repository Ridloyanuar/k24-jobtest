# K24 - JOBTEST

How to Setup This Project :
1. Clone this project https://github.com/Ridloyanuar/k24-jobtest
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. In the .env file, add database information to allow Laravel to connect to the database
6. php artisan migrate
7. php artisan db:seed
8. npm run install && npm run dev
9. php artisan serve (to run project)

Login Admin Information :
email : admin@example.com
password : admin123

Login Member Information :
email : member@example.com
password : member123

