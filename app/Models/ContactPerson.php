<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    protected $fillable = [
        'company_id',
        'full_name',
        'phone',
        'email',
        'position'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
