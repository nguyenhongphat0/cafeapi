## LARAVEL NOTES
- [TABLE OF CONTENTS](#laravel-notes)
  - [> Register route](#register-route)
  - [> Create model](#create-model)
### > Register route
- Add this line to top of file to support IDE helper
```php
use Illuminate\Support\Facades\Route;
```
- To register a route, use
```php
Route::get('/path/to/{param}[/{optional}]', 'Controller@action');
// Controller is the class
// Action is the function name
```
- You can also create group of route, with a prefix
```php
$router->group(['prefix' => 'api/'], function ($app) {
    $app->get('todo/', 'TodoController@index');
    $app->get('todo/{id}/', 'TodoController@show');
    $app->put('todo/{id}/', 'TodoController@update');
    $app->delete('todo/{id}/', 'TodoController@destroy');
});
```
### > Create model
- To have a model, we must have: a `TABLE` to store model in database, a `CLASS` to present table object and interract with database and a `CONTROLLER` to act with the model. We also need some `ROUTE` to access the model controller.
- To create model `TABLE`, we won't use SQL statment. Laravel use `artisan` to create model table with the column defined in a PHP file. First run this in bash
```
$ php artisan make:migration <model> --create=<model>
```
If the operation successful, we will get a file in database/migrations. We will define the column of the table in this file
```php
$table->charset = 'utf8';
$table->collation = 'utf8_unicode_ci';
$table->increments('id');
$table->string('name');
$table->integer('price')->unsigned();
$table->string('description')->nullable();
$table->timestamps();
```
After we define the column, run this command to actually create the table
```
$ php artisan migrate
```
- Create the `CLASS` is easy, just create new PHP file in `app/` folder. Then define column name in fillable props
```php
class ModelName extends Model {
    public $timestamps = false; // if tables not has timestamps defined
    protected $table = 'tablename'; // if not Product -> products naming convention
    protected $fillable = ['name', 'price', 'picture', 'description'];
}
```
- Create `CONTROLLER` is easy too. Create a php file in `app\http\controllers\` with the name <Model>sController.php, and add functions to it.
```php
class ModelNamesController extends Controller {
    public function index() {
        return response('Hello');
    }
}
```
- Create `ROUTE` scroll up.