SocialWebProject

this project will be a nice demo for what a social page and admin look like

## Getting Started

this project is running using laravel and this is indivitual project not getting and reponser or request by anyone 

### Prerequisites

this project is running using laravel framework so what you need to do is install everything with a laravel project environtment need and also composer

```
https://laravel.com/docs/7.x
```
### Installing

some package require that you will need

```
composer create-project --prefer-dist laravel/laravel blog
```
```
composer require guzzlehttp/guzzle
```
After that publish all the package your just installed
```
php artisan vendor:publish
```
Because we going to use storage to save image you gonna need to run this code
```
php artisan storage:link
```

okay we good to go


## Deployment

Apache you going to need a sql for this website

copy my .env.examples

```
cp .env.examples .env
```
fix your .env to match with your database 

```
DB_DATABASE=<YOUR-DATABASE>
DB_USERNAME=<YOUR-USERNAME>
DB_PASSWORD=<YOUR-PASSWORK>
```

also you need to fix your mail in order to send the qr code

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=<YOUR-EMAIL>
MAIL_PASSWORD=<YOUR-PASSWORD>
MAIL_ENCRYPTION=<TYPE-OF-ENCRYTION>
MAIL_FROM_NAME="${APP_NAME}"
```
okay you good to go 

## Built With

* [pragmarx](https://github.com/antonioribeiro/google2fa-laravel)
* [BaconQrCode](https://github.com/Bacon/BaconQrCode)

## Authors

* **Benjamin Lam- Lâm Thái Gia Huy** - who participated in this project.

## Acknowledgments

* code for anyone who need anyone whose code was used
* Inspiration
* still in progress
* be brave enough to beat anything
* etc

