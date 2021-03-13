<?php

namespace App;

use App\Traits\EventManager;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Course extends Model

{
    use UuidTrait, EventManager;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

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
