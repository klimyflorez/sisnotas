<?php

return [
    'module' => 'Usuario|Usuarios',
    'fillable' => [
        'id' => '#',
        'social_network' => 'Red social',
        'value' => 'Perfil'
    ],
    'actions' => [
        'add' => 'Crear profile',
        'edit' => 'Editar profile',
        'destroy' => 'Eliminar profile'
    ],
];
