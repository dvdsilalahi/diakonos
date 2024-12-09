<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdEventFacility extends Model
{
    use HasFactory;

    protected $table = 'md_event_facilities'; // Specify the table name

    protected $guarded = ['id'];

    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    public function getRouteKeyName(){
        return 'uuid';
     }

     public function event(){
        $this->hasMany(Event::class);
    }
}
