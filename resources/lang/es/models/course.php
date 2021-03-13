<?php

return [
    'module' => 'course|courses',
    'fillable' => [
        'id' => '#',
        'name' => 'Nombre',
        'description' => 'Descripción',
    ],
    'actions' => [
        'add' => 'Crear course',
        'edit' => 'Editar course',
        'destroy' => 'Eliminar course'
    ],
];
