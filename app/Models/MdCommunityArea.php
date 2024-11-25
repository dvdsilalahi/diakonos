<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdCommunityArea extends Model
{
    use HasFactory;

    protected $table = 'md_community_areas'; // Specify the table name

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
