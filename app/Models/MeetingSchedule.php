<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingSchedule extends Model
{
    use HasFactory;

    protected $table = 'meeting_schedules';

    protected $fillable = [
        'year',
        'submission_deadline',
        'meeting_date',
        'sort_order',
    ];
}
