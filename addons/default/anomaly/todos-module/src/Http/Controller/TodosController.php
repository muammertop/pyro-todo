<?php


namespace Anomaly\TodosModule\Http\Controller;


use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\TodosModule\Todo\Contract\TodoRepositoryInterface;
use Anomaly\TodosModule\Todo\Form\TodoFormBuilder;
use Anomaly\TodosModule\Todo\Table\TodoTableBuilder;
use Symfony\Component\HttpFoundation\Response;

class TodosController extends PublicController
{

	/**
	 * Display an index of existing entries.
	 *
	 * @param TodoTableBuilder $table
	 * @return Response
	 */
	public function index(TodoTableBuilder $table)
	{
		$table->setViews([
			'create' => [
				'text' => 'module::field.new_todo',
				'href' => '/todos/create',
			],
			'all',
			'trash' => [
				'buttons' => [
					'restore' => [
						'href' => 'todos/restore/' . '{entry.id}'
					],
				],
			],
		]);


		$table->setButtons([
			'todo_edit' => [
				'type' => 'warning',
				'text' => 'streams::button.edit',
				'href' => 'todos/edit/' . '{entry.id}'
			],
		]);

		$table->setFilters([
			'name',
		]);

		return $table->render();
	}


	/**
	 * Create a new entry.
	 *
	 * @param TodoFormBuilder $form
	 * @return Response
	 */
	public function create(TodoFormBuilder $form)
	{
		$form->setFields([
			'name',
			'slug',
			'creator' => [
				'value' => auth()->user()->getAuthIdentifier(),
				'hidden' => true,
			]
		]);

		$form->setActions([
			'save_exit' => [
				'redirect' => '/todos'
			],
		]);

		$form->setButtons([]);

		return $form->render();
	}


	/**
	 * Edit an existing entry.
	 *
	 * @param TodoFormBuilder $form
	 * @param        $id
	 * @return Response
	 */
	public function edit(TodoFormBuilder $form, $id)
	{
		$form->setFields([
			'name',
			'slug',
			'creator' => [
				'value' => auth()->user()->getAuthIdentifier(),
				'hidden' => true,
			]
		]);

		$form->setActions([
			'save_exit' => [
				'redirect' => '/todos'
			],
		]);

		$form->setButtons([]);

		return $form->render($id);
	}


	public function restore(TodoRepositoryInterface $todoRepository, MessageBag $message, $id)
	{
		if ($todo = $todoRepository->findTrashed($id)) {
			$todo->restore();
			$message->success(trans('streams::message.restore_success'));
		}
		return back();
	}
}
