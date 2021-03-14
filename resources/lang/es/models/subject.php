<?php

return [
    'module' => 'Materia|Materias',
    'fillable' => [
        'id' => '#',
        'name' => 'Nombre',
        'description' => 'Descripción',
    ],
    'actions' => [
        'add' => 'Crear materia',
        'edit' => 'Editar materia',
        'destroy' => 'Eliminar materia'
    ],
];
