<?php

return [
    'module' => 'subject|subjects',
    'fillable' => [
        'id' => '#',
        'name' => 'Nombre',
        'description' => 'Descripción',
    ],
    'actions' => [
        'add' => 'Crear subject',
        'edit' => 'Editar subject',
        'destroy' => 'Eliminar subject'
    ],
];
