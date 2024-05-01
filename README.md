# testemployee: Laravel API Test

This project provides a simple Laravel API to test employee-related functionalities. 
Test sample server http://128.199.72.174/api/v1/employees

## Installation

**Prerequisites:**

* PHP 8.2
* php8.2-xml
* php8.2-dom
* php8.2-curl (ensure these extensions are installed)
* PHP MS SQL driver, for Linux or Mac check https://learn.microsoft.com/en-us/sql/connect/php/installation-tutorial-linux-mac?view=sql-server-ver16

**Steps:**

1. **Install Composer:**
   Follow the instructions at https://getcomposer.org/ to install Composer, a dependency management tool for PHP.

2. **Clone the Repository:**
   Use Git to clone this repository to your local machine:

   ```bash
   git clone https://<your-repository-url>

3. **Install Dependencies:**
   Navigate to the project directory and run the following command to install all required dependencies::

   ```bash
   composer install

3. **Laravel Setup:**
   run key generate setup for fresh installation laravel:

   ```bash
   php artisan key:generate

4. **Configure Environment:**
   Copy the .env.example file to .env and change the db setting:


    DB_CONNECTION=sqlsrv
    DB_HOST=
    DB_PORT=
    DB_DATABASE=PylonProductionData_ForTesting
    DB_USERNAME=
    DB_PASSWORD=
   
5. **Run The Server locally:**
   Further action is needed if want to make it persistent like Nginx or Apache. But for testing you can run this command:

   ```bash
   php artisan serve

6. **Enjoy Explore:**
   if you can browse http://YOURHOST:8000 Then the API is live at that url. 
   Use following for basicauth credential 
   username : myuser
   password : mypassword
