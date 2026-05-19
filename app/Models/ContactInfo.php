<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['institution_name', 'address', 'city_state_zip', 'phone', 'email', 'service_hours'])]
class ContactInfo extends Model
{
    protected $table = 'contact_info';
}
