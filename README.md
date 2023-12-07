## About 

This is a sample admin application with integrated file manager. Based on Laravel 10 framework. It also contains basic API endpoints. The smaple application provides the following features:

- User authentication
- Create, Update, Delete products data
- View files in public storage
- Swagger documentation for API endpoints
- API endpoints 
- - List products
- - Show product

## Installation 

- Clone the repository.
- Then run `composer install` to complete the installation for additional packages.
- Create `.env` file in the root project folder and fill it with configuration params.
- Migrate the database by running the `php artisan migrate` command.
- Seed the database - `php artisan db:seed`
- Create a navigation menu - `php artisan db:seed --class=NavbarSeeder`
- (Optional) Fill the sample data - `php artisan db:seed --class=ProductSeeder`
- Publish assets for File Manager `php artisan vendor:publish --tag=fm-assets` and Swagger `php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"`
- Login creadentials for testing user are <b>admin@example.com</b>/<b>password</p>

## Used packages

```
  alexusmai/laravel-file-manager
  darkaonline/l5-swagger 
  infyomlabs/adminlte-templates
  infyomlabs/laravel-generator 
  infyomlabs/laravel-ui-adminlte 
  infyomlabs/swagger-generator 
  intervention/image 
  laracasts/flash 
  laravel/breeze 
  laravel/sail 
  laravel/sanctum
  laravel/tinker 
  laravel/ui 
  laravelcollective/html 
  nesbot/carbon 
  nunomaduro/collision 
  nunomaduro/termwind 
  spatie/laravel-ignition 
```
