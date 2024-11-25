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
        'name',
        'category',
        'segment',
        'area',
        'leaders',
        'address',
        'description',
        'social_media',
        'gmap_link',
        'is_active,'
      ];

      public function communityCategory(){
        return $this->belongsTo(MdCommunityCategory::class, 'category');
     }

     public function communitySegment(){
        return $this->belongsTo(MdCommunitySegment::class, 'segment');
     }

     public function communityArea(){
        return $this->belongsTo(MdCommunityArea::class, 'area');
     }

    public function getRouteKeyName(){
        return 'uuid';
     }

}
