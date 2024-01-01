<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
//
use App\Models\User;
use Spatie\Permission\Models\Role;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
{
    protected $model = User::class;
    protected $table = 'users';

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $storage_path = 'public/images/avatars';
        Storage::deleteDirectory($storage_path);

        $name = $this->faker->lastName();
        $prename = $this->faker->unique()->firstName();

        $i = rand($min = 0, $max = 6);
        $seps = ['', '.', '_'];
        $sep = $seps[array_rand($seps)];
        if ($i == 0) {
            $email = "$name$sep$prename";
        } elseif ($i == 1) {
            $email = "$prename$sep$name";
        } elseif ($i == 2) {
            $email = "$name$sep$prename";
        } elseif ($i == 3) {
            $email = "$prename$sep$name";
        } elseif ($i == 4) {
            $email = "$name$sep$prename";
        } elseif ($i == 5) {
            $email = "$prename$sep$name";
        } else {
            $arr = [$name, $prename];
            $key = array_rand($arr, 1);
            $email = $arr[$key];
        }

        $email = fncCambiaCaracteresEspeciales($email);
        // $iniciales = fncCambiaCaracteresEspeciales($prename . ' ' . $name);
        // $iniciales = fncGetIniciales($prename . ' ' . $name);

        // $avatar = $this->faker->imageUrl(640, 480, null, false);
        // $avatar = $this->faker->imageUrl(640, 480, 'animals', true);
        // $avatar = $this->faker->image($dir = null, $width = 640, $height = 480, $category = null, $randomize = false, $word = $iniciales, $gray = false, $format = 'png');
        $avatar = $storage_path . '/default.png';
        // dump($avatar);
        // $avatar1 = $this->faker->imageUrl($width = 640, $height = 480, $category = fncGetIniciales($prename . ' ' . $name), $randomize = false, $word = null, $gray = true);

        return [
            'name' => $name . ' ' . $prename,
            // 'prename' => $prename,
            'email' => $email . '@' . $this->faker->freeEmailDomain(),
            'email_verified_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'profile_photo_path' => $avatar,
            'is_active' => $this->faker->boolean(80),
            // 'password' => Hash::make('password'),
            'password' => 'password',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(
            fn(array $attributes) => [
                'email_verified_at' => null,
            ],
        );
    }
}
