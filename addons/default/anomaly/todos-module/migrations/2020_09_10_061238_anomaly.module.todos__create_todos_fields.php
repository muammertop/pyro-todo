<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleTodosCreateTodosFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name' => 'anomaly.field_type.text',
        'creator' => [
            'type' => 'anomaly.field_type.relationship',
            'config' => [
                'related' => \Anomaly\UsersModule\User\UserModel::class,
            ]
        ],
        'slug' => [
            'type' => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name',
                'type' => '_'
            ],
        ],
        'deleted_at' => 'anomaly.field_type.datetime',
    ];

}
