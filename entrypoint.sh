#!/bin/bash

echo "Łączenie z bazą: $DB_HOST:$DB_PORT"

# Sprawdzanie, czy wait-for-it.sh jest dostępne
which wait-for || { echo "wait-for.sh nie znaleziony!"; exit 1; }

# Czekaj na bazę danych
echo "Czekam na bazę danych..."
wait-for $DB_HOST:$DB_PORT --timeout=60 -- echo "Baza danych gotowa!"


cd /app

# Instalacja zależności PHP
if [ ! -d "vendor" ]; then
  echo "Instaluję zależności Composer..."
  composer install
fi

# Generowanie klucza jeśli brak
if ! grep -q '^APP_KEY=' .env || [ -z "$(grep '^APP_KEY=' .env | cut -d '=' -f2)" ]; then
  echo "Generuję APP_KEY..."
  php artisan key:generate
fi

# Migracje i seedy
echo "Migracje i seedy..."
php artisan migrate:fresh --seed

# Instalacja JS i build
if [ ! -d "node_modules" ]; then
  echo "Instaluję zależności NPM..."
  npm install
fi

echo "Buduję frontend..."
npm run build


echo "Uruchamiam queue:work w tle..."
php artisan queue:work &

# Start serwera
echo "Uruchamiam serwer..."
php artisan serve --host=0.0.0.0 --port=8000
