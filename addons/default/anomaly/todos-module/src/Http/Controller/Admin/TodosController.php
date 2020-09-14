<?php namespace Anomaly\TodosModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\TodosModule\Todo\Form\TodoFormBuilder;
use Anomaly\TodosModule\Todo\Table\TodoTableBuilder;

class TodosController extends AdminController
{

	/**
	 * Display an index of existing entries.
	 *
	 * @param TodoTableBuilder $table
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function index(TodoTableBuilder $table)
	{
		return $table->render();
	}

	/**
	 * Create a new entry.
	 *
	 * @param TodoFormBuilder $form
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function create(TodoFormBuilder $form)
	{
		return $form->render();
	}

	/**
	 * Edit an existing entry.
	 *
	 * @param TodoFormBuilder $form
	 * @param        $id
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function edit(TodoFormBuilder $form, $id)
	{
		return $form->render($id);
	}
}
