<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\MdAdministrativeDivision;
use App\Models\MdCommunityCategory;
use App\Models\MdMinistry;
use App\Models\MdSpiritualGift;
use App\Models\Post;
use App\Models\User;
use App\Models\Member;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MdGender;
use App\Models\MdBloodType;
use App\Models\MdEducation;
use App\Models\MdProfession;
use App\Models\MdCitizenship;
use Illuminate\Database\Seeder;
use App\Models\MdFamilyRelation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

/*         User::factory(10)->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
 */

        User::create([
            'name' => 'Davidy Silalahi',
            'username' => 'dvdsilalahi',
            'email' => 'dvdsilalahi@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin'=> 1,
        ]);
        User::factory(10)->create();

        Category::create([
            'name'=> 'Programming',
            'slug'=> 'programming',
        ]);

        Category::create([
            'name'=> 'Web Design',
            'slug'=> 'web-design',
        ]);

        Category::create([
            'name'=> 'Personal',
            'slug'=> 'personal',
        ]);

        Post::factory(20)->create();

        Member::factory(20)->create();

        MdCitizenship::factory(2)->create();

        MdEducation::factory(6)->create();

        MdProfession::factory(8)->create();

        MdFamilyRelation::factory(8)->create();

        MdBloodType::factory(4)->create();

        MdGender::factory(2)->create();

        MdAdministrativeDivision::factory(10)->create();

        MdMinistry::factory(4)->create();

        MdSpiritualGift::factory(7)->create();

        MdCommunityCategory::factory(4)->create();

        Community::factory(4)->create();

    }
}
