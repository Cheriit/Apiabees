<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * @property int $id
 * @property string $performed_at
 * @property int $hive_id
 * @property string $type_name
 * @property string $employee_PESEL
 * @property string $description
 * @property ActionType $actionType
 * @property Employee $employee
 * @property Hive $hive
 */
class Action extends Model
{

    protected $fillable = [
        'employee_PESEL',
        'performed_at',
        'hive_id',
        'type_name',
        'description'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'performed_at' => 'datetime:Y-m-d h:i:s',
    ];

    /**
     * @return BelongsTo
     */
    public function actionType()
    {
        return $this->belongsTo('App\Models\ActionType', 'type_name', 'name');
    }

    /**
     * @return BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_PESEL', 'PESEL');
    }

    /**
     * @return BelongsTo
     */
    public function hive()
    {
        return $this->belongsTo('App\Models\Hive');
    }



}
