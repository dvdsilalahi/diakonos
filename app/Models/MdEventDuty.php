<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdEventDuty extends Model
{
    use HasFactory;

    protected $table = 'md_event_duties'; // Specify the table name

    protected $guarded = ['id'];

    protected $fillable = [
        'uuid',
        'title',
        'description',
    ];

    public function getRouteKeyName(){
        return 'uuid';
     }
}
