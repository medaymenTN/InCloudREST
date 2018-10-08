# Restfull Api made by Symfony 4

### Installation 

* Clone the projet from the repository 
* Open your command line under your project directory and execute this command 

```
$  composer install 
``` 
this will download all the required depenedencies to your symfony 4 project 

* Configure your .env file and add user and password credentials to your SQL database 

```
 DATABASE_URL=mysql://dbuser:dbpassword@127.0.0.1:3306/inclouddb
``` 
* using the command line add the migrations relative to your entities created using this command 
 
```
$ php bin/console make:migration
```
* after that check the migration  in the filecreated under src/migrations .
* if everything is ok generate your database schema using this command
``` 
$ php bin/console doctrine:migrations:migrate

```
* load data fixtures using the following command 
``` 
$ php bin/console doctrine:fixtures:load

```
* finally run your project using 
 ``` 
$ php bin/console server:run
```
your project will run on http://localhost:8000/ note that all the routes are under /api 



