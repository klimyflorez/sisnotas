<?php

namespace App;

use App\Traits\EventManager;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use UuidTrait, EventManager;

    /**
     * @var string[]
     */
    protected $fillable = [
        'course_id', 'student_id'
    ];

    /**
     * Allow uuid as primary key on users table
     *
     * @var bool
     */
    protected $allowUuid = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * @return array[]
     */
    public static function getColumnsTable(){
        return [
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'searchable' => false, 'orderable' => false],
            ['data' => 'course.name', 'name' => 'course.name', 'title' => __('models/inscription.fillable.course')],
            ['data' => 'student.full_name', 'name' => 'student.full_name', 'title' => __('models/inscription.fillable.student')],
        ];
    }
}
