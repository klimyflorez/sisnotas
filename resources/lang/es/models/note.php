<?php

return [
    'module' => 'note|notes',
    'fillable' => [
        'id' => '#',
        'student' => 'Estudiante',
        'subject' => 'Asignatura',
        'value' => 'Nota',
    ],
    'actions' => [
        'add' => 'Crear note',
        'edit' => 'Editar note',
        'destroy' => 'Eliminar note'
    ],
];
