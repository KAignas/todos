<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AppInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        /* Clear all dabatase */
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Label::truncate();
        \App\Event::truncate();
        \App\User::truncate();
        \App\Notification::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        /* Creating labels | All default labels is in resources/lang/en/labels.php */
        $labels = \App\Label::getDefaultLabels();
        foreach ($labels as $label) {
            \App\Label::create($label);
        }

        /* Creating test user with password:root, email:todos@todos.com */
        $user = \App\User::where('email', 'todos@todos.com')->first();
        $faker = Faker::create('App\User');
        $user = \App\User::create([
            'name'      => $faker->name,
            'email'     => 'todos@todos.com',
            'password'  => Hash::make('root'),
            'birthday'  => $faker->date()
        ]);

        /* Create rand events */
        $faker = Faker::create('App\Event');
        for ($x = 0; $x < 10; $x++) {
            $date   = Carbon::now()->addDay(rand(1,10))->format('Y-m-d');
            $start  = Carbon::parse($faker->time());
            $end    = Carbon::parse($start)->addHour(rand(1,5));
            $user->events()->create([
                'title'         => implode($faker->sentences(1)),
                'description'   => $faker->paragraph,
                'label_id'      => rand(1, count(trans('labels'))),
                'date'          => $date,
                'start'         => $start->format('H:i:s'),
                'end'           => $end->format('H:i:s'),
                'location'      => $faker->city
            ]);
        }

        $this->info("================================================================");
        $this->info("App is ready!");
        $this->info("LOGIN:");
        $this->info("Email: todos@todos.com");
        $this->info("Password: root");
        $this->info("================================================================");
    }
}
