<?php

return [
    'module' => 'Curso|Cursos',
    'fillable' => [
        'id' => '#',
        'name' => 'Nombre',
        'description' => 'Descripción',
    ],
    'actions' => [
        'add' => 'Crear curso',
        'edit' => 'Editar curso',
        'destroy' => 'Eliminar curso'
    ],
];
