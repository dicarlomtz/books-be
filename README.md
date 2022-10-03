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

# Frontent implementation

This project can be used along [this](https://github.com/dicarlomtz/book-fe) cliend-side implementation

1. Ensure your client-side app is running on localhost and port 5173, if not, please change ALLOWED_HOST and SANCTUM_STATEFUL_DOMAINS in .env file to the ones you are using.
2. Ensure your server-side app is running on localhost and port 8000 in Docker (mapped to 80), if not, please change SESSION_DOMAIN in .env file to the one you are using.
3. In the client-site app, ensure that the base URL (API/instance) is configured to the one that the backend is using. If you are using docker, the port is mapped to 80.