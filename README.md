# Exo-dev
Exercice Hippocampe


# Environment
- Docker
- Php 7.4
- Mysql 5.7.24
- Symfony 5.4

# Demo

[Demo video]()


# Installation guide
### I) One command (use makefile)
```
$ make install
```
    To install make under windows: choco install make

### II) Installation steps
1) Run docker
```
$ docker compose up --build -d
```

2) Create .env file
```
$ docker exec -it exo_web cp .env.dist .env
```

3) Composer install
```
$ docker exec -it exo_web composer install
```
4) Install ckeditor
```
$ docker exec -it exo_web php bin/console ckeditor:install
```
5) Assets install
```
$ docker exec -it exo_web php bin/console assets:install --symlink
```
6) Doctrine migrations
```
$ docker exec -it exo_web php bin/console doctrine:migrations:migrate --no-interaction
```