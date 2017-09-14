# Jewelry Shop

Simple Symfony installation with doctrine and command line tool

# Purpose

This is a test to show up my skills coding a Symfony Project.

The project is intented to be a "Jewelry Shop ;) " There are some products, There is a User and there are registers when a user make a purchase.


# Source Code example Inside this project

- 3 entities made with Doctrine and Annotations
- 3 Services declared with Dependency Injection
- 2 Repositories
- 1 Controller to get public access to data stored on database
- 2 Command line


# How to INSTALL

You don't need composer installed on your machine, neither an apache, you  only need a PHP7 or higher on your machine.

Go to a terminal Console
```
$ cd path/to/you/workspace
$ git clone https://github.com/moriorgames/simple-symfony.git
$ cd simple-symfony
$ php phars/composer.phar install
```

When composer finishes, you can go and setup Manually the database in file:
```
/simple-symfony/app/config/parameters.yml
```

And then you can rebuild the database with a script

```
# This command will create a database and load all the fixtures
$ sh scripts/build-database-and-load-fixtures.sh
$ php -S localhost:8000 --docroot=web
```

And then go to : http://localhost:8000/app.php/ping

If you see a "Success!" you are ready to go!

# Routes

You can access this routes

```
http://localhost:8000/app.php/ping
http://localhost:8000/app.php/list-products
http://localhost:8000/app.php/get-user-data/1
```

# Command Line Tools

There are 2 command line tools:

```
# To load Fixtures
$ php bin/console app:fixtures

# Display Hello World Help
$ php bin/console app:hello-world -h

# Display Hello World 
$ php bin/console app:hello-world

# Display Hello "parameter"
$ php bin/console app:hello-world --name=parameter
```


# Copy Left

All the Source Code is free to use.
