# Laravel Lab

Eksperymentalne środowisko do nauki i testowania aplikacji Laravel z wykorzystaniem konteneryzacji Docker.

## Spis treści

- [Opis](#opis)
- [Wymagania](#wymagania)
- [Instalacja](#instalacja)
- [Struktura projektu](#struktura-projektu)
- [Funkcjonalności](#funkcjonalności)
- [Licencja](#licencja)

## Opis

Ten projekt służy jako laboratorium do eksperymentowania z frameworkiem Laravel.  
Został skonfigurowany do uruchamiania w środowisku Docker, co umożliwia łatwe testowanie i rozwijanie aplikacji Laravel bez konieczności instalowania wszystkich zależności lokalnie.

## Wymagania

Aby uruchomić projekt, potrzebne są następujące narzędzia:

- **Docker Desktop** – narzędzie do zarządzania kontenerami Docker.  
  Pobierz ze strony: https://www.docker.com/products/docker-desktop/

- **GNU Make** – narzędzie do automatyzacji kompilacji i budowania projektów.  
  Pobierz ze strony: https://www.gnu.org/software/make/#download


## Instalacja

1. Sklonuj repozytorium:

   ```bash
   git clone https://github.com/PKoralewski/laravel-lab.git
   cd laravel-lab
   ```

2. Skopiuj plik `.env.example` do `.env` i ustaw odpowiednie dane konfiguracyjne, takie jak:
   - Dane połączenia z bazą danych
   - Konfiguracja e-mail (np. SMTP)

3. Uruchom skrypt `make setup`, który zainstaluje zależności, przeprowadzi migracje oraz seedowanie bazy danych i uruchomi kontenery, a także wygeneruje klucz aplikacji jeśli go nie ma oraz włączy kolejkę:

   ```bash
   make setup
   ```
   Jeżeli nie mamy zainstalowany GNU Make możemy uruchomić projekt poprzez:
   ```bash
   docker compose build
   docker compose up
   ```


4. Aplikacja powinna być dostępna pod adresem: [http://localhost:9000](http://localhost:9000)

## Struktura projektu

```
laravel-lab/
├── app/                  # Logika aplikacji (kontrolery, modele, polityki)
├── bootstrap/            # Pliki inicjalizacyjne
├── config/               # Pliki konfiguracyjne
├── database/             # Migracje, seedery, fabryki
├── licenses/             # Licencje
├── public/               # Katalog publiczny aplikacji
├── resources/            # Widoki, pliki frontendowe
├── routes/               # Definicje tras aplikacji
├── storage/              # Pliki generowane przez aplikację
├── tests/                # Testy jednostkowe i funkcjonalne
├── .buildcomplete        # Flaga ukończenia procesu budowania
├── .editorconfig         # Konfiguracja edytora
├── .env.example          # Przykładowy plik konfiguracyjny .env
├── .gitattributes        # Atrybuty Gita
├── .gitignore            # Ignorowane pliki przez Git
├── .spdx-laravel.spdx    # Licencja SPDX
├── Makefile              # Skrypty automatyzujące zadania
├── README.md             # Dokumentacja projektu
├── artisan               # Skrypt uruchamiający Artisan
├── composer.json         # Definicja zależności PHP
├── composer.lock         # Zablokowane wersje zależności PHP
├── docker-compose.yaml   # Konfiguracja usług Docker
├── entrypoint.sh         # Skrypt uruchamiający kontener
├── package-lock.json     # Zablokowane wersje zależności JavaScript
├── package.json          # Definicja zależności JavaScript
├── phpunit.xml           # Konfiguracja PHPUnit
├── vite.config.js        # Konfiguracja Vite dla budowania zasobów frontendowych
└── wait-for.sh           # Skrypt oczekujący na dostępność usług
```

## Funkcjonalności

- **Autentykacja i rejestracja użytkowników** – umożliwia logowanie i rejestrację nowych użytkowników  
- **CRUD dla prac (`job_listings`)** – pełna funkcjonalność tworzenia, odczytu, aktualizacji i usuwania prac 
- **Polityki (`Policies`)** – kontrola dostępu do zasobów na podstawie uprawnień użytkownika  
- **Migracje** – zarządzanie strukturą bazy danych za pomocą migracji  
- **Seedery** – wstępne wypełnienie bazy danych przykładowymi danymi  
- **Fabryki (`Factories`)** – generowanie danych testowych dla modeli  
- **Wysyłanie e-maili przy tworzeniu ofert pracy** – automatyczne powiadamianie użytkowników o nowych pracach
- **Kontrolery i modele** – organizacja logiki aplikacji zgodnie z wzorcem MVC  

## Licencja

Projekt jest dostępny na licencji MIT.