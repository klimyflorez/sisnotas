<?php

return [
    'module' => 'Usuario|Usuarios',
    'fillable' => [
        'id' => '#',
        'email' => 'Email',
        'full_name' => 'Usuario',
        'email_verified_at' => 'Verificado'
    ],
    'actions' => [
        'add' => 'Crear usuario',
        'edit' => 'Editar usuario',
        'destroy' => 'Eliminar usuario'
    ],
];
