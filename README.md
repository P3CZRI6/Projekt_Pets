# Aplikacja Pet Store

To jest aplikacja napisana w Laravel, która komunikuje się z API Pet Store. Pozwala na dodawanie, pobieranie, edytowanie i usuwanie wpisów dotyczących zwierząt z zasobu `/pet`.

## Funkcje

- **Lista zwierząt**: Wyświetlanie dostępnych zwierząt.
- **Dodaj zwierzę**: Dodawanie nowego zwierzęcia do sklepu.
- **Edytuj zwierzę**: Aktualizacja danych istniejącego zwierzęcia.
- **Usuń zwierzę**: Usunięcie zwierzęcia ze sklepu.

## Wymagania

- PHP >= 8.0
- Composer
- Laravel 10.x
- MySQL lub inna obsługiwana baza danych
- Node.js i npm (do kompilacji zasobów)

## Instalacja

1. Sklonuj repozytorium

   ```
   bash
   git clone https://github.com/twojanazwa/petstore-app.git
   cd petstore-app
   ```
2. Zainstaluj zależności PHP
   Upewnij się, że masz zainstalowany Composer, a następnie uruchom:
   ```
   composer install
   ```
3. Skonfiguruj zmienne środowiskowe
   Skopiuj plik `.env.example` do `.env` i skonfiguruj swoją bazę danych oraz inne zmienne środowiskowe:
   ```
   cp .env.example .env
   ```
   Zaktualizuj poniższe linie w pliku `.env`, dostosowując do swoich ustawień:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nazwa_bazy_danych
   DB_USERNAME=uzytkownik
   DB_PASSWORD=haslo
   ```
4. Wygeneruj klucz aplikacji
   ```
   php artisan key:generate
   ```
5. Uruchom migracje i zasil bazę danych
   ```
   php artisan migrate --seed
   ```
6. Zainstaluj zależności Node.js i skompiluj zasoby
   ```
   npm install
   npm run dev
   ```
7. Uruchom aplikację
   Użyj wbudowanego serwera Laravel, aby uruchomić aplikację:
   ```
   php artisan serve
   ```
   Aplikacja będzie dostępna pod adresem http://localhost:8000.
   
## Użytkowanie
- **Dodaj nowe zwierzę:** Przejdź do strony "Add New Pet" i wypełnij formularz, aby utworzyć nowy wpis dotyczący zwierzęcia.
- **Edytuj zwierzę:** Kliknij na link "Edit" obok wybranego zwierzęcia, aby zaktualizować jego dane.
- **Usuń zwierzę:** Kliknij przycisk "Delete", aby usunąć zwierzę z listy.

## Interakcja z API
Aplikacja komunikuje się z [API PetStore](https://petstore.swagger.io/) w celu wykonywania operacji CRUD na zasobach zwierząt. Używane są następujące metody HTTP:
- **GET `/pet/findByStatus` **: Pobierz listę dostępnych zwierząt.
- **POST `/pet` **: Dodaj nowe zwierzę.
- **PUT `/pet` **: Zaktualizuj istniejące zwierzę.
- **DELETE `/pet/{petId}` **: Usuń zwierzę.

## Obsługa błędów
- Wyświetla komunikaty o błędach dla nieudanych żądań do API lub przesłanych formularzy.
- Waliduje dane wejściowe użytkownika przed wysłaniem żądań do API.

## Autor
### Patryk Jędrzejczyk
[Profil GitHub](https://github.com/P3CZRI6/)
