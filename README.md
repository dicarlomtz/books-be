# Books API HOW TO GUIDE

To run this project, you will need to have docker compose installed. If not, you can download it [here](https://docs.docker.com/get-docker/).

# Steps:

1. First you need to run the project with sail and docker: `./vendor/bin/sail up`
2. Then you have to run the migrations: `./vendor/bin/sail artisan migrate`
3. Now you have to serve the project as an API: `./vendor/bin/sail artisan serve`
4. To test the API using postman, import the files located in the postman folder
5. Make sure you are selecting the correct environment
6. If you want to create some test data at once, run the seeder: `./vendor/bin/sail artisan db:seed`
7. To run tests: `./vendor/bin/sail artisan test --coverage --env=testing`
