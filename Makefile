DOCKER_IMAGE := php-oop-freight:latest

build-docker-image:
	docker build --tag ${DOCKER_IMAGE} .

test:
	docker run --rm -v ${PWD}:${PWD} -w ${PWD} ${DOCKER_IMAGE} ./vendor/bin/phpunit --no-coverage

test-coverage:
	docker run --rm -v ${PWD}:${PWD} -w ${PWD} ${DOCKER_IMAGE} ./vendor/bin/phpunit

open-coverage-report:
	xdg-open ./report/html/index.html