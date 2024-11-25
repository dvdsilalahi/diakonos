<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdEventCategory extends Model
{
    use HasFactory;

    protected $table = 'md_event_categories'; // Specify the table name

    protected $guarded = ['id'];

    protected $fillable = [
        'uuid',
        'title',
        'description',
    ];

    public function getRouteKeyName(){
        return 'uuid';
     }

    public function eventTemplate(){
        $this->hasMany(MdEventTemplate::class);
    }
}
