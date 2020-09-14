<?php namespace Anomaly\TodosModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Todos\TodosTodosEntryModel;
use Anomaly\TodosModule\Todo\Contract\TodoRepositoryInterface;
use Anomaly\TodosModule\Todo\TodoModel;
use Anomaly\TodosModule\Todo\TodoRepository;
use Illuminate\Routing\Router;

class TodosModuleServiceProvider extends AddonServiceProvider
{

	/**
	 * Additional addon plugins.
	 *
	 * @type array|null
	 */
	protected $plugins = [];

	/**
	 * The addon Artisan commands.
	 *
	 * @type array|null
	 */
	protected $commands = [];

	/**
	 * The addon's scheduled commands.
	 *
	 * @type array|null
	 */
	protected $schedules = [];

	/**
	 * The addon API routes.
	 *
	 * @type array|null
	 */
	protected $api = [];

	/**
	 * The addon routes.
	 *
	 * @type array|null
	 */
	protected $routes = [
		'todos' => [
			'middleware' => 'auth',
			'as' => 'todo::index',
			'uses' => 'Anomaly\TodosModule\Http\Controller\TodosController@index',
		],
		'todos/create' => [
			'middleware' => 'auth',
			'as' => 'todo::create',
			'uses' => 'Anomaly\TodosModule\Http\Controller\TodosController@create',
		],
		'todos/edit/{id}' => [
			'middleware' => 'auth',
			'as' => 'todo::edit',
			'uses' => 'Anomaly\TodosModule\Http\Controller\TodosController@edit',
		],
		'todos/update' => [
			'middleware' => 'auth',
			'as' => 'todo::update',
			'uses' => 'Anomaly\TodosModule\Http\Controller\TodosController@update',
		],
		'todos/restore/{id}' => [
			'as' => 'todo::restore',
			'uses' => 'Anomaly\TodosModule\Http\Controller\TodosController@restore',
		],


		'admin/todos' => 'Anomaly\TodosModule\Http\Controller\Admin\TodosController@index',
		'admin/todos/create' => 'Anomaly\TodosModule\Http\Controller\Admin\TodosController@create',
		'admin/todos/edit/{id}' => 'Anomaly\TodosModule\Http\Controller\Admin\TodosController@edit',
	];

	/**
	 * The addon middleware.
	 *
	 * @type array|null
	 */
	protected $middleware = [
		//Anomaly\TodosModule\Http\Middleware\ExampleMiddleware::class
	];

	/**
	 * Addon group middleware.
	 *
	 * @var array
	 */
	protected $groupMiddleware = [
		//'web' => [
		//    Anomaly\TodosModule\Http\Middleware\ExampleMiddleware::class,
		//],
	];

	/**
	 * Addon route middleware.
	 *
	 * @type array|null
	 */
	protected $routeMiddleware = [];

	/**
	 * The addon event listeners.
	 *
	 * @type array|null
	 */
	protected $listeners = [
		//Anomaly\TodosModule\Event\ExampleEvent::class => [
		//    Anomaly\TodosModule\Listener\ExampleListener::class,
		//],
	];

	/**
	 * The addon alias bindings.
	 *
	 * @type array|null
	 */
	protected $aliases = [
		//'Example' => Anomaly\TodosModule\Example::class
	];

	/**
	 * The addon class bindings.
	 *
	 * @type array|null
	 */
	protected $bindings = [
		TodosTodosEntryModel::class => TodoModel::class,
	];

	/**
	 * The addon singleton bindings.
	 *
	 * @type array|null
	 */
	protected $singletons = [
		TodoRepositoryInterface::class => TodoRepository::class,
	];

	/**
	 * Additional service providers.
	 *
	 * @type array|null
	 */
	protected $providers = [
		//\ExamplePackage\Provider\ExampleProvider::class
	];

	/**
	 * The addon view overrides.
	 *
	 * @type array|null
	 */
	protected $overrides = [
		'streams::form/standard' => 'streams::form/form',
		'streams::table/standard' => 'streams::table/table',
		//'streams::errors/500' => 'module::errors/500',
	];

	/**
	 * The addon mobile-only view overrides.
	 *
	 * @type array|null
	 */
	protected $mobile = [
		//'streams::errors/404' => 'module::mobile/errors/404',
		//'streams::errors/500' => 'module::mobile/errors/500',
	];

	/**
	 * Register the addon.
	 */
	public function register()
	{
		// Run extra pre-boot registration logic here.
		// Use method injection or commands to bring in services.
	}

	/**
	 * Boot the addon.
	 */
	public function boot()
	{
		// Run extra post-boot registration logic here.
		// Use method injection or commands to bring in services.
	}

	/**
	 * Map additional addon routes.
	 *
	 * @param Router $router
	 */
	public function map(Router $router)
	{
		// Register dynamic routes here for example.
		// Use method injection or commands to bring in services.
	}

}
