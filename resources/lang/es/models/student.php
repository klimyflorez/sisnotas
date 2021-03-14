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
    'action' => [
        'add' => 'Crear estudiante',
        'edit' => 'Editar estudiante',
        'delete' => 'Eliminar estudiante'
    ],
];
