<?php

namespace App;

use App\Traits\EventManager;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use UuidTrait, EventManager;

    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name', 'last_name', 'identification', 'phone'
    ];

    protected $appends = [
        'full_name'
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Allow uuid as primary key on users table
     *
     * @var bool
     */
    protected $allowUuid = true;

    /**
     * @return array[]
     */
    public static function getColumnsTable(){
        return [
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'searchable' => false, 'orderable' => false],
            ['data' => 'identification', 'name' => 'identification', 'title' => __('models/student.fillable.identification')],
            ['data' => 'first_name', 'name' => 'first_name', 'title' => __('models/student.fillable.first_name')],
            ['data' => 'last_name', 'name' => 'last_name', 'title' => __('models/student.fillable.last_name')],
        ];
    }
}
