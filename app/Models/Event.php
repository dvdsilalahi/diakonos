<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Define the fillable columns (columns that can be mass-assigned)
    protected $fillable = [
        'uuid',
        'category_id',
        'community_id',
        'title',
        'flyer',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'duties_officers',
        'duties_teams',
        'budget',
        'offerings',
        'attendees',
        'attendee_names',
        'evaluation',
        'is_published',
        'is_active',
      ];

    public function getRouteKeyName(){
        return 'uuid';
     }

}
