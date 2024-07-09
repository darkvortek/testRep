up:= docker-compose -f ./docker/docker-compose.yml up
build:= docker-compose -f ./docker/docker-compose.yml build
stop-php-fpm:= docker stop test-php-fpm

help:
	@echo ---------------------------------------------
	@echo This is Makefile for local Docker environment
	@echo ---------------------------------------------
	@echo Available commands:
	@echo - up
	@echo - build
	@echo - restart
	@echo - stop
	@echo - uninstall
	@echo - exec-to-php-fpm

info:
	@exec make help

up:
	$(up)

up-service:
	$(up) -d $(c)

build:
	$(build)

build-service:
	$(build) $(c)

restart:
	$(up)

stop:
	$(stop-php-fpm)

uninstall:
	docker rm test-php-fpm

exec-to-php-fpm:
	clear
	docker exec -it --user test test-php-fpm bash