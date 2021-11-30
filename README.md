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
4) Doctrine migrations
```
$ docker exec -it exo_web php bin/console doctrine:migrations:migrate --no-interaction
```