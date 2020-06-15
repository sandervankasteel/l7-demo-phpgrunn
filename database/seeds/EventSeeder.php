<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Event::class,50)->make()->each(static function($event) {
            $user = factory(User::class)->create();
            $event->organizer_id = $user->id;
            $event->save();

            $attendees = factory(User::class, 5)->create();
            $event->attendees()->attach($attendees);
        });
    }
}
