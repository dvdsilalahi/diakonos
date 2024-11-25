<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdCOA extends Model
{
    use HasFactory;

    protected $table = 'md_coas'; // Specify the table name

    protected $guarded = ['id'];

    // Define the fillable columns (columns that can be mass-assigned)
    protected $fillable = [
        'uuid',
        'number',
        'account_name',
        'account_type',
    ];

}
