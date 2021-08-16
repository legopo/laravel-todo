<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskTag extends Pivot
{
    protected $table = 'task_tags';

    /**
     * 変更可能カラム
     *
     * @var array
     */
    protected $fillable = [
        'task_id',
        'tag_id',
    ];

}
