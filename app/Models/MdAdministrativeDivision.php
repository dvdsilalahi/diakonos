<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdAdministrativeDivision extends Model
{
    use HasFactory;

    protected $table = 'md_administrative_divisions'; // Specify the table name

    protected $guarded = ['id'];

    // Define the fillable columns (columns that can be mass-assigned)
    protected $fillable = [
        'uuid',
        'village',
        'district',
        'municipality',
        'province',
        'country',
    ];

    public function getRouteKeyName(){
        return 'uuid';
     }
}
