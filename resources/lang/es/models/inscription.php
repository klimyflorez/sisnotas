<?php

return [
    'module' => 'inscription|inscriptions',
    'fillable' => [
        'id' => '#',
        'student' => 'Estudiante',
        'course' => 'Curso'
    ],
    'actions' => [
        'add' => 'Crear inscription',
        'edit' => 'Editar inscription',
        'destroy' => 'Eliminar inscription'
    ],
];
