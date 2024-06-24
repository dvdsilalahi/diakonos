<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_code' => $this->faker->unique()->numberBetween(1000000000,9999999999),
            'uuid' => sha1($this->faker->unique()->safeEmail),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'place_of_birth' => $this->faker->city,
            'date_of_birth' => $this->faker->date,
            'address' => $this->faker->address,
            'country' => strtoupper($this->faker->randomElement(['Indonesia'])),
            'municipality' => strtoupper($this->faker->city),
            'hamlet' => '0'.$this->faker->numberBetween(1,9),
            'neighbourhood' => '0'.$this->faker->numberBetween(1,9),
            'nin' => $this->faker->unique()->numberBetween(1000000000000000,9999999999999999),
            'ssn' => $this->faker->unique()->numberBetween(1000000000000000,9999999999999999),
            'fr_no' => $this->faker->randomElement(['3501515948341675', '5037034287543984', '9942216282018063', '1824970450640576', '8481721588987968']),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'blood_type' => $this->faker->randomElement(['A','B','AB','O',]),
            'fam_relation' => $this->faker->randomElement(['KEPALA KELUARGA', 'ANAK', 'ANAK', 'ANAK', 'ANAK', 'ANAK']),
            'education' => $this->faker->randomElement(['SMA', 'S1', 'S2', 'S3']),
            'profession' => $this->faker->randomElement(['Belum / Tidak Bekerja', 'Pensiunan', 'Pegawai Negeri Sipil
            ', 'Karyawan Swasta']),
            'citizenship' => $this->faker->randomElement(['WNA', 'WNI', 'WNI', 'WNI', 'WNI', 'WNI', 'WNI', 'WNI', 'WNI', 'WNI']),
            'father_name' => $this->faker->name('male'),
            'mother_name' => $this->faker->name('female'),
            'pic' => $this->faker->imageUrl(),
            'ministries' => $this->faker->randomElement([json_encode(['items' => ['pastor', 'teacher']]),json_encode(['items' => ['evangelist', 'prophet']]),json_encode(['items' => ['apostle', 'teacher']]),]),
            'spiritual_gifts' => $this->faker->randomElement([json_encode(['items' => ['leader', 'faith']]),json_encode(['items' => ['prophecy', 'tongue']]),json_encode(['items' => ['healing']]),]),
            'personality_types' => $this->faker->randomElement([json_encode(['items' => ['stabil', 'sanguin']]),json_encode(['items' => ['diligent', 'faithful']]),json_encode(['items' => ['hospitality', 'faithful']]),]),
            'skills_talents' => $this->faker->randomElement([json_encode(['items' => ['repairing ac']]),json_encode(['items' => ['repairing automotive', 'cooking pie']]),json_encode(['items' => ['repairing house']]),]),
            'hobbies_activities' => $this->faker->randomElement([json_encode(['items' => ['singing', 'music']]),json_encode(['items' => ['touring', 'automotive']]),json_encode(['items' => ['painting', 'cooking']]),]),
        ];
    }
}
