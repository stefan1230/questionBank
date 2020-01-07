<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;
use App\Tag;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Stefan',
            'email' => 'ss@ss.com',
            'profile_pic'=>'def.jpg',
            'password' => Hash::make('1234567890'),
        ]);

        $tag1 = Tag::create([
            'name' => 'News'
        ]);

        $tag2 = Tag::create([
            'name' => 'IT'
        ]);

        $tag3 = Tag::create([
            'name' => 'Science'
        ]);

        $que1 = Question::create([
            'question' => 'What is Lipsum?',
            'author_id' => $user->id
        ]);

      
        $que1->tags()->attach([$tag1->id, $tag3->id]);
    }
}
