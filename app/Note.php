<?php

namespace App;

use App\Traits\EventManager;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use UuidTrait, EventManager;

    /**
     * Allow uuid as primary key on users table
     *
     * @var bool
     */
    protected $allowUuid = true;

    /**
     * @var string[]
     */
    protected $fillable = [
        'inscription_id', 'subject_id', 'value'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * @return array[]
     */
    public static function getColumnsTable(){
        return [
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => '#', 'searchable' => false, 'orderable' => false],
            ['data' => 'inscription', 'name' => 'inscription', 'title' => __('models/note.fillable.student')],
            ['data' => 'subject.name', 'name' => 'subject.name', 'title' => __('models/note.fillable.subject')],
            ['data' => 'value', 'name' => 'value', 'title' => __('models/note.fillable.value')],
        ];
    }
}
