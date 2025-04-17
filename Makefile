setup:
	@make up 
	@make composer-update
	@make data
	@make queue
stop:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec laravel-lab bash -c "composer update"
data:
	docker exec laravel-lab bash -c "php artisan migrate:fresh --seed"
queue:
	docker exec -d laravel-lab bash -c "php artisan queue:work"
run:
	@make up
	@make queue