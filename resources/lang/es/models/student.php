<?php

return [
    'module' => 'student|students',
    'fillable' => [
        'id' => '#',
        'identification' => 'Identificación',
        'first_name' => 'Nombres',
        'last_name' => 'Apellidos',
        'phone' => 'Teléfono'
    ],
    'actions' => [
        'add' => 'Crear student',
        'edit' => 'Editar student',
        'destroy' => 'Eliminar student'
    ],
];
