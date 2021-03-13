<?php

namespace App;

use App\Traits\EventManager;
use App\Traits\UuidTrait;
use Mappweb\Mappweb\Models\BaseModel;

class Subject extends BaseModel
{
    use UuidTrait, EventManager;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * @return array[]
     */
    public static function getColumnsTable(){
        return [
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'searchable' => false, 'orderable' => false],
            ['data' => 'name', 'name' => 'name', 'title' => __('models/course.fillable.name')],
        ];
    }
}
