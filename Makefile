DOCKER_IMAGE := php-oop-freight:latest

build-docker-image:
	docker build --tag ${DOCKER_IMAGE} .

test:
	docker run --rm -v ${PWD}:${PWD} -w ${PWD} ${DOCKER_IMAGE} ./vendor/bin/phpunit --no-coverage

test-coverage:
	docker run --rm -v ${PWD}:${PWD} -w ${PWD} ${DOCKER_IMAGE} ./vendor/bin/phpunit

open-coverage-report:
	xdg-open ./report/html/index.html

install-slim:
	docker run --rm -v ${PWD}:${PWD} -w ${PWD} ${DOCKER_IMAGE} composer require slim/slim

install-slim-psr7:
	docker run --rm -v ${PWD}:${PWD} -w ${PWD} ${DOCKER_IMAGE} composer require slim/psr7

run-api:
	docker run -d -p 80:80 --name php-oop-freight -v ${PWD}:/var/www/html php:7.3-apache