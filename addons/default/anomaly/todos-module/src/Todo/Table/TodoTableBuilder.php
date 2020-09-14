<?php namespace Anomaly\TodosModule\Todo\Table;

use Anomaly\Streams\Platform\Ui\Table\Component\Action\Handler\Delete;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;

class TodoTableBuilder extends TableBuilder
{

	protected $sortable = true;

	/**
	 * The table views.
	 *
	 * @var array|string
	 */
	protected $views = [
		'all',
		'trash'
	];

	/**
	 * The table filters.
	 *
	 * @var array|string
	 */
	protected $filters = [
		'name',
		'creator',
	];

	/**
	 * The table columns.
	 *
	 * @var array|string
	 */
	protected $columns = [
		'name',
		'creator',
	];

	/**
	 * The table buttons.
	 *
	 * @var array|string
	 */
	protected $buttons = [
		'edit',
	];

	/**
	 * The table actions.
	 *
	 * @var array|string
	 */
	protected $actions = [
		'delete_user' => [
			'type' => 'danger',
			'text' => 'streams::button.delete',
			'handler' => Delete::class
		],
	];

	/**
	 * The table options.
	 *
	 * @var array
	 */
	protected $options = [
		'order_by' => [
			'created_at' => 'DESC',
		],
	];

	/**
	 * The table assets.
	 *
	 * @var array
	 */
	protected $assets = [];

	public function onQuerying(Builder $query)
	{
		if (!auth()->user()->isAdmin()) {
			$query->where('creator_id', auth()->user()->id);
		}
	}
}
