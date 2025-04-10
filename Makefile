setup:
	@make up 
	@make composer-update
stop:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec laravel-lab bash -c "composer update"
data:
	docker exec laravel-lab bash -c "php artisan migrate"
	docker exec laravel-lab bash -c "php artisan db:seed"
