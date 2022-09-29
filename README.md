# Pimcore New Project Install Guide Ubuntu

## Getting started follow these steps
# Choose which version
## Demo or Skeleton

```bash
COMPOSER_MEMORY_LIMIT=-1 composer create-project pimcore/demo my-project

cd ./my-project
```
```bash
COMPOSER_MEMORY_LIMIT=-1 composer create-project pimcore/skeleton my-project

cd ./my-project
```
### 
 * Open the `docker-compose.yml` file in an editor, uncomment all the `user: '1001:1001'` lines and update the ids if necessary
###
```bash
docker-compose up -d 
```
```bash
docker-compose run --rm php-fpm vendor/bin/pimcore-install --mysql-host-socket=db --mysql-username=pimcore --mysql-password=pimcore --mysql-database=pimcore
```
```bash
docker-compose run --rm php-fpm chown -R www-data:www-data var/*
```

###
* This is the `janvandenbogaert` user you are logged in to ubuntu
###
```bash
chown -R janvandenbogaert: . 
```
You can now visit your pimcore instance:
- The frontend: <http://localhost>
- The admin interface, using the credentials you have chosen above: <http://localhost/admin>
- Done! 😎

## Other demo/skeleton packages
- [Pimcore Basic Demo](https://github.com/pimcore/demo)
- [Pimcore Basic Skeleton](https://github.com/pimcore/skeleton)

**Made By [Jan Van den Bogaert](https://github.com/JanVDB2000) 2022**
