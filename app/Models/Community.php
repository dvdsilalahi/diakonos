<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Define the fillable columns (columns that can be mass-assigned)
    protected $fillable = [
        'uuid',
        'category',
        'segmen',
        'area',
        'leaders',
        'address',
        'gmap_link',
    ];

    public function getRouteKeyName(){
        return 'uuid';
     }

}
