build:
	docker-compose build

up:
	docker-compose up

upd:
	docker-compose up -d

exec:
	docker-compose exec web bash

exec-db:
	docker-compose exec db bash

art:
	docker-compose exec web bash -c "php artisan $(c)"
