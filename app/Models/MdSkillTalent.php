<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdSkillTalent extends Model
{
    use HasFactory;

    protected $table = 'md_skills_talents'; // Specify the table name

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

     public function members(){
        return $this->hasMany(Member::class);
    }

}
