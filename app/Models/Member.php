<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members'; // Specify the table name

    protected $guarded = ['id'];

    // Define the fillable columns (columns that can be mass-assigned)
    protected $fillable = [
        'member_code',
        'first_name',
        'last_name',
        'uuid',
        'email',
        'phone_number',
        'place_of_birth',
        'date_of_birth',
        'address',
        'country',
        'municipality',
        'district',
        'village',
        'hamlet',
        'neighbourhood',
        'nin',
        'ssn',
        'fr_no',
        'gender',
        'bloodtype',
        'fam_relation',
        'education',
        'profession',
        'citizenship',
        'father_name',
        'mother_name',
        'pic',
        'ministries',
        'spiritual_gifts',
        'personality_types',
        'skills',
        'hobbies',
        'is_active',
    ];

    public function getRouteKeyName(){
        return 'uuid';
     }

}
