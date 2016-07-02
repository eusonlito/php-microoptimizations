# web-deploy

## Requirements

* PHP 5.4
* Composer | https://getcomposer.org/download/

## Install

* Install in your production server if you want to update your project from `GIT`.
* Install in your develop server if you want to update your production server from `FTP` or `RSYNC`.
* `RSYNC` only works with public keys. You must have the keys of develop web user installed in your production server.

```
$> git clone https://github.com/eusonlito/web-deploy.git
$> cd web-deploy
$> composer install
```

## Configuration

* Set write permissions to web service user to `storage/logs/` and `storage/assets/` folders
* Configuration files are in `config/` folder
* Create a copy into `config/custom/` to customize configurations
* At first, copy `config/middleware.php` into `config/custom/` and configure a basic auth user/password
* Now you can login with http://yoursite.com/web-deploy/

## Images

![web-deploy-1](https://raw.githubusercontent.com/eusonlito/web-deploy/gh-pages/images/web-deploy-1.png)
![web-deploy-2](https://raw.githubusercontent.com/eusonlito/web-deploy/gh-pages/images/web-deploy-2.png)
![web-deploy-3](https://raw.githubusercontent.com/eusonlito/web-deploy/gh-pages/images/web-deploy-3.png)
![web-deploy-4](https://raw.githubusercontent.com/eusonlito/web-deploy/gh-pages/images/web-deploy-4.png)
