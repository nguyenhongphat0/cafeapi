# LARAVEL NOTES
### Register route
- To have IDE autocomplete, use
```php
use Illuminate\Support\Facades\Route;
```
- To register a route, use
```php
Route::get('/path/to/{param}[/{optional}]', 'Controller@action');
// Controller is the class
// Action is the function name
```
- To register group of route, use
```php
$router->group(['prefix' => 'api/'], function ($app) {
    $app->get('todo/', 'TodoController@index');
    $app->get('todo/{id}/', 'TodoController@show');
    $app->put('todo/{id}/', 'TodoController@update');
    $app->delete('todo/{id}/', 'TodoController@destroy');
});
```
### Create model
- To create model table, use
```
$ php artisan make:migration <model> --create=<model>
$ php artisan migrate
```
- To define column, use
```php
$table->charset = 'utf8';
$table->collation = 'utf8_unicode_ci';
$table->increments('id');
$table->string('name');
$table->integer('price')->unsigned();
$table->string('description')->nullable();
$table->timestamps();
```
- To create class, use
```php
class ModelName extends Model
```
```php
public $timestamps = false;
protected $table = 'tablename';
protected $fillable = ['name', 'price', 'picture', 'description'];
```
- To create controller, use
```php
class ModelNamesController extends Controller