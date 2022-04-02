<?php

use App\Event;
use App\Method;
use Illuminate\Database\Seeder;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Method::class, 10)->create()->each(
        //     function ($method) {
        //         $method->events()->save(factory(Event::class, 3)->make());
        //     }
        // );

        $methods = factory(Method::class, 10)->create()
            ->each(function ($method) {
                $method->events()->saveMany(factory(Event::class, 3)->make());
            });
    }
}
