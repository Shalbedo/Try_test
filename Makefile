.PHONY: install, run, down

install:
	docker-compose build
	make up
up:
	docker-compose up -d
down:
	docker-compose down
php_bash:
	docker-compose exec php /bin/bash
