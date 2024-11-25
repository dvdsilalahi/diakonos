<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdEventTemplate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = [
        'event_category',
        'minister_duties',
        'community_duties',
        'segment_attendances',
        'offering_accounts',
    ];

    public function eventCategory(){
        return $this->belongsTo(MdEventCategory::class, 'event_category');
     }

     public function getRouteKeyName(){
        return 'uuid';
     }

}
