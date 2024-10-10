
## Weather Forecasting API

- Clone the Repo.
- Composer install ``composer install``
- Copy the .env.example and put the DB credentials.
- Run ``php artisan jwt:secret``
- Run ``php artisan migrate``
- Run ``php artisan serve``
- You can run test ``php artisan test``

### APIs

#### Register API
``
curl --location 'http://127.0.0.1:8000/api/auth/register' \
--header 'X-Requested-With: XMLHttpRequest' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'name=test' \
--data-urlencode 'email=test@example.com' \
--data-urlencode 'password=123456'
``

#### Login API
``
curl --location 'http://127.0.0.1:8000/api/auth/login' \
--header 'X-Requested-With: XMLHttpRequest' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'email=test@example.com' \
--data-urlencode 'password=123456'
``

#### For the upcoming APIs make sure to change the token according to the generated token whether from register api or login api
#### User API 
``
curl --location 'http://127.0.0.1:8000/api/auth/user' \
--header 'X-Requested-With: XMLHttpRequest' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3Mjg1NjAxMDgsImV4cCI6MTcyODU2MzcwOCwibmJmIjoxNzI4NTYwMTA4LCJqdGkiOiJlRzZiUk1CYlEwUFhtdWhqIiwic3ViIjoiNiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.DIH2VHaPxsHVcTDBlQabGf5pH_Shhj-DGtG1qKYzvWo'
``


#### Weather API
``
curl --location 'http://127.0.0.1:8000/api/weather?city=Cairo' \
--header 'X-Requested-With: XMLHttpRequest' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3Mjg1NjAxMDgsImV4cCI6MTcyODU2MzcwOCwibmJmIjoxNzI4NTYwMTA4LCJqdGkiOiJlRzZiUk1CYlEwUFhtdWhqIiwic3ViIjoiNiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.DIH2VHaPxsHVcTDBlQabGf5pH_Shhj-DGtG1qKYzvWo'
``

#### Logout API
``
curl --location --request POST 'http://127.0.0.1:8000/api/auth/logout' \
--header 'X-Requested-With: XMLHttpRequest' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3Mjg1NjAxMDgsImV4cCI6MTcyODU2MzcwOCwibmJmIjoxNzI4NTYwMTA4LCJqdGkiOiJlRzZiUk1CYlEwUFhtdWhqIiwic3ViIjoiNiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.DIH2VHaPxsHVcTDBlQabGf5pH_Shhj-DGtG1qKYzvWo'
``

