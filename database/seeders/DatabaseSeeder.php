<?php

namespace Database\Seeders;

use App\Models\MdCOA;
use App\Models\MdEventDuty;
use App\Models\MdEventFacility;
use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Member;
use App\Models\Category;
use App\Models\MdGender;
use App\Models\Community;
use App\Models\MdMinistry;
use App\Models\MdBloodType;
use App\Models\MdEducation;
use App\Models\MdProfession;
use App\Models\MdCitizenship;
use App\Models\MdSkillTalent;
use App\Models\MdCommunityArea;
use App\Models\MdEventCategory;
use App\Models\MdEventTemplate;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MdHobbyActivity;
use App\Models\MdSpiritualGift;
use Illuminate\Database\Seeder;
use App\Models\MdFamilyRelation;
use App\Models\MdPersonalityType;
use App\Models\MdCommunitySegment;
use App\Models\MdCommunityCategory;
use App\Models\MdAdministrativeDivision;

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

        Community::factory(3)->create();

        MdPersonalityType::factory(4)->create();

        MdSkillTalent::factory(4)->create();

        MdHobbyActivity::factory(3)->create();

        MdCommunityCategory::factory(3)->create();

        MdCommunitySegment::factory(3)->create();

        MdCommunityArea::factory(3)->create();

        MdEventCategory::factory(2)->create();

        MdEventFacility::factory(1)->create();

        MdEventTemplate::factory(2)->create();

        MdCOA::factory(2)->create();

        Event::factory(1)->create();

        MdEventDuty::factory(4)->create();

    }
}
