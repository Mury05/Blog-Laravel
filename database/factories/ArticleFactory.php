<?php

namespace Database\Factories;

use Alirezasedghi\LaravelImageFaker\ImageFaker;
use Alirezasedghi\LaravelImageFaker\Services\Picsum;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     * @var 
     */
    protected $model = Article::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageFaker = new ImageFaker(new Picsum());
        return [
            'title' => $this->faker->text(15),
            'body' => fake()->text(200),
            'user_id' => function(){
                return User::inRandomOrder()->first()->id;
            },
            'image' => $imageFaker->image(public_path("images"))
        ];
    }
}
