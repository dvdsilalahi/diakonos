<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdGender extends Model
{
    use HasFactory;

    protected $table = 'md_genders'; // Specify the table name

    protected $guarded = ['id'];

    // Define the fillable columns (columns that can be mass-assigned)
    protected $fillable = [
        'uuid',
        'title',
        'description',
    ];

    public function getRouteKeyName(){
        return 'uuid';
     }

}
