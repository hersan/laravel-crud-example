# Laravel crud example

Example of laravel package

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.


### Installing

install using Composer:

```
$ composer create-project hersan/laravel-crud-example
```

If you need to edit the views run

```
$ php artisan vendor:publish --tag=crud
```

### Usage

You only need to access the url http://yourproject/users

## Running the tests

to run the tests you need to install [dusk](https://laravel.com/docs/5.6/dusk), after that you need to publish the tests

```
$ php artisan vendor:publish --tag=crudtests
```
you finally run the tests

```
$ php artisan dusk --filter=CrudUserTest
```

## Authors

* **Herminio Heredia**

See also the list of [contributors](https://github.com/hersan/laravel-crud-example/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


