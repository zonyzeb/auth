
## About Auth Module Project

Auth Module is a docker containerized responsive web application built using Laravel Framework. Auth package supports web and api based access to the system. Following are the functionalities the system supports:

- [Login](http://localhost/login).
- [Register](http://localhost/register).
- [Activity List](http://localhost/dashboard).
- [User Profile](http://localhost/profile).
- [API Login](http://localhost/api/login).
- [API Register](http://localhost/register).
- [API User](http://localhost/user).
- [API Activity List](http://localhost/api/activity).

## Application Stack

The Application uses PHP, MySQL, Redis and Laravel Framework.

- [Nginx Webserver](https://www.nginx.com/)
- [PHP 7.3](https://www.php.net/)
- [MySQL 5.7](https://www.mysql.com/)
- [Redis 6.0](https://redis.io/)
- [Laravel Framework 8.X](https://laravel.com/)
- [PhpMyAdmin](https://www.phpmyadmin.net/)

## Application Installation

The application can be installed on local or remote servers by using the following steps. 

1. Install Docker on the system, if you already installed Docker on the system you can skip this step. Otherwise, you can follow the docker installation steps mentioned in the [official documentation](https://docs.docker.com/engine/install/).
2. [Install docker compose](https://docs.docker.com/compose/install/) on you the system, skip this step if it's already installed in your system.
3. Check out the soure code, `git clone git@github.com:zonyzeb/auth.git` or `git clone https://github.com/zonyzeb/auth.git`.
4. Get into the source directory, `cd auth`.
5. Build the docker images for the project, `docker-compose build`.
6. Start the docker images to run the application, `docker-compose up`. Run the command, `docker-compose up -d` if you want to run the process on the background.
7. Load the url on your favorite browser, [http://localhost](http://localhost).
8. Now you can access different pages using below links:
    1. [Login](http://localhost/login).
    2. [Register](http://localhost/register).
    3. [Activity Board](http://localhost/dashboard).
9. API URLs can be accessed using below endpoints. If you have [Postman](https://www.postman.com) installed in your system, you can load the postman script from [the url](https://www.getpostman.com/collections/3e19ea3b93196b36f5bd) and test the APIs. 
    1. [API Login](http://localhost/api/login).
    2. [API Register](http://localhost/register).
    3. [API USer](http://localhost/api/user).
    4. [API Activity List](http://localhost/api/activity).
10. PhpMyAdmin server can accessed through, [localhost:8080](http://localhost:8080).
11. Run the test cases, `docker-compose exec app php artisan test`.
12. Laravel cli commands can be run by executing the command, `docker-compose exec app php artisan <COMMANDS>`. Otherwise you can enter in side the contatiner(`docker-compose exec app bash`) and execute the commanda directly inside the container. 
13. To shutdown the application use `docker-compose down` command


## Docker Containers

The appliation is using different docker images and containers. Docker configuration details can be found on **docker-compose.yml** file. You can access different docker containers as mentioned below,
1. Nginx Server
    - `docker-compose exec webserver bash`
2. PHP App
    - `docker-compose exec app bash`
3. MySQL Server
    - `docker-compose exec db bash`
4.  Redis Server
    - `docker-compose exec redis bash`


### Persistent Database

The application databases(MySQL and Redis) are persistent, meaning even if the container is terminated the data will be available. The persistent database setup can be altered in the `docker-compose.yml` file. Also the data files can be found in the docker directory. 

#### Accessing database

1. MySQL Database.
    - MySQL database can be directly accessed using PhpMyAdmin container available on port 8080, [MySql DB](localhost:8080). 
    - Or it can be accessed through docker container, `docker-compose exec db bash`.
2. Redis Database.
    - Redis database can be accessed through docker container, `docker-compose exec redis bash`.
        - List all keys in redis database:
            - `rediscli`
            - `keys *`
        - Get a key value from redis database,
            - `get <key>`
        - Delete a key from redis database,
            - `del <key>`

#### Logs

The application logs can be followed by the below commands,

    - `docker-compose logs --follow app`

### Test Cases

Application testcases can be found under test folder. You can run the test case by issuing the following command,

    - `docker-compose exec app php artisan test`





    

