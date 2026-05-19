<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['year', 'submission_deadline', 'meeting_date', 'sort_order'])]
class MeetingSchedule extends Model
{
}
