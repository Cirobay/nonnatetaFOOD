<?php

namespace App\Models\Dash;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'company_name',
        'company_email',
        'company_adress',
        'company_telephone',
        'company_kvk'
    ];
}
