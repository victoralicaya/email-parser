## How to run the application locally.

## I am using Laravel ver. 11 for this.

-   Install "composer" in your local. Make sure you have PHP server running in your computer. This is very important as composer needs a running PHP server during a setup.
-   Clone the application in your local.
-   If you are using xampp, clone the project inside the "htdocs" folder. If you are using laragon, clone the project in the "www" folder. You can setup the virtual hosts in these applications. If you are running a different PHP server then clone the application in the designated folders.
-   After cloning the application, CD into that folder.
-   Create an ".env" file in the root folder and copy the contents of the ".env.example" and configure the database connection. (In my case, I am using mysql).
-   Run the command "composer install" or "composer update" to install the required packages.
-   After all the packages are installed, run the command "php artisan migrate" to run all the migration files, once the migration is done, run the next command "php artisan db:seed" to create the seeder for the test user.
-   Once these are done, open the application in your browser to see if it's running. If you setup the host for this application, just open the application using that virtual host but if not, you can just run the command "php artisan serve" and open the application in the browser by typing the host "http://localhost:8000" or "http://127.0.0.1:8000" (Laravel will provide the port if you don't specify a specific port when running the command).
-   You can serve the application using a different specific port by running the command "php artisan server --port={your_specific_port_here}".
-   Once you confirmed the application is running, you can access the API endpoints by looking at the "routes/api.php" file.
-   I am using sanctum as my authentication.
-   When running the login API, copy the entire value of the "access_token".
-   Credentials for the login can be found inside the "database/seeders/DatabaseSeeder.php" file.
