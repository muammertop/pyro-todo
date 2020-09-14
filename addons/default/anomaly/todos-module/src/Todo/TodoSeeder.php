<?php namespace Anomaly\TodosModule\Todo;

use Anomaly\Streams\Platform\Database\Seeder\Seeder;

class TodoSeeder extends Seeder
{

    /**
     * Run the seeder.
     */
    public function run()
    {
        factory(TodoModel::class, 3)->create();
    }
}
