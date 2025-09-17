# dPyx

## Installation & requirements

1. You must install the next:  
[laravel](https://laravel.com/docs/8.x/installation)
[nodejs](https://nodejs.org/es/)

2. You should clone the repository:
https://github.com/gitescire/revistas.dpyx.net.git

3. You must go to the path where you installed your project and install dependencies:
`composer install`

4. Copy the .env.example file in .env:
`copy .env.example .env`

5. you must generate a new key:
`php artisan key:generate`

6. create the storage link in public folder:
`php artisan storage:link`

7. Edit your `.env` file to setup the database, the email, and the app variables.

8. You should have created a file in lang/es/<APP_NAME> and another file in lang/es.<APP_NAME>.json that will show a customized message depending the APP NAME:
`cp resources/lang/es.json.example resources/lang/es.json`

9.  You should copy folder public/images/default.example/ to public/images/default/ to set up defult images into system:
`cp public/images/default.example/ public/images/default -R`

### Permissions in linux file

1. Assign the project ownership to the web server user:
`sudo chown -R www-data:www-data /path/to/your/laravel/root/directory`

2. Assign our user to the web server user group:
`sudo usermod -a -G www-data elusuario`

## Set to production

1. You need to generate a random key to prevent some attacks
`php artisan key:generate`

2. When the steps shown before were executed, you need to run the migrations to create the database and tables:
`php artisan migrate:fresh`

3. Then you need to set the basic information (seed) to run the app:
`php artisan db:seed`

4. You need to create a storage link to make public the folder that users will save their files:
`php artisan storage:link`

5. You must go to the path where you have your php.ini file, and change the next variables like are shown below:
`upload_max_filesize = 20M`
`post_max_size = 20M`

## Setting up some files

1. You must copy /public/images/default.example in /public/images/default, then update the picures that you want inside the copied folder.

2. You must copy /resources/lang/es.json.example in /resources/lang/es.json, then update the message that you want inside the copied folder.