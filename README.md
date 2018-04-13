# Example REST API

Crud rest php

### Prerequisites

Install LAMP or LEMP  on your local machine include:
* Apache or Nginx server
* PHP
* Mysql

I'm using:
* Ubuntu 16.04 LTS
* PHP 7.2.4
* Mysql 5.7.21
* Nginx 1.10.3

### Installing

* Clone project from https://github.com/AnhOps/php.git into your server. My side is /var/www/html/
* Import database from folder: php/pos061/db
* Change your info in: php/pos061/include/Config.php

```
    define("DB_HOST", "localhost");
    define("DB_USER", "demo");
    define("DB_PASSWORD", "demo");
    define("DB_DATABASE", "demo");
```

## Running the tests

Open your browser and input: http://localhost/php/pos061/api-get.php?id=1
If success, result like this:

```
    {
      "statusCode": 200,
      "statusMessage": "Success",
      "data": {
        "id": 1,
        "countryCode": "+84",
        "areaCode": "6546",
        "mobileNumber": "88888888"
      }
    }
```

### Example request:
* **GET** [http://localhost/php/pos061/api-get.php?id=1](http://localhost/php/pos061/api-get.php?id=1)
* **POST** [http://localhost/php/pos061/api-post.php?countryCode=11&areaCode=11111&mobileNumber=1111111](http://localhost/php/pos061/api-post.php?countryCode=11&areaCode=11111&mobileNumber=1111111)

## Authors

* **Anh (Albert) Q. NGO** - [AnhOps](https://github.com/AnhOps)


## License

Free


