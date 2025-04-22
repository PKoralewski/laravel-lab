setup:
	@make build
	@make up
stop:
	docker-compose stop
build:
	docker-compose build
up:
	docker-compose up
composer-update:
	docker exec -it laravel-lab bash -c "composer update"
data:
	docker exec -it laravel-lab bash -c "php artisan migrate:fresh --seed"
queue:
	docker exec -d laravel-lab bash -c "php artisan queue:work"
npm-update:
	docker exec -it laravel-lab "npm install"
npm-build:
	docker exec -it laravel-lab "npm run build"
run:
	@make up
	@make queue