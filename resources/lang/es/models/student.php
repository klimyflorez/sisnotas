<?php

return [
    'module' => 'Estudiante|Estudiantes',
    'fillable' => [
        'id' => '#',
        'identification' => 'Identificación',
        'first_name' => 'Nombres',
        'last_name' => 'Apellidos',
        'phone' => 'Teléfono'
    ],
    'actions' => [
        'add' => 'Crear estudiante',
        'edit' => 'Editar estudiante',
        'destroy' => 'Eliminar estudiante'
    ],
];
