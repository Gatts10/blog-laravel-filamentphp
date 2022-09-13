<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Event::class;

    public function definition()
    {
        $name = ucwords($this->faker->unique()->word);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'date' => $this->faker->unique()->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            'published_at' => $this->faker->unique()->dateTimeThisYear(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Event $item) {
            $images = $this->faker->randomElement(array(2, 5));

            for ($i = 0; $i < $images; $i++) {
                $url = 'https://source.unsplash.com/1200x800/?nature,water';
                $item
                    ->addMediaFromUrl($url)
                    ->toMediaCollection('events');
            }
        });
    }
}
