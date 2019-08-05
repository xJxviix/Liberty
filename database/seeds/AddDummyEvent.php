<?php

use Illuminate\Database\Seeder;

class AddDummyEvent extends Seeder
{
    public function run()
    {
        $data = [
        	['title'=>'Demo Event-1', 'start_date'=>'2019-09-11', 'end_date'=>'2019-09-12'],
        	['title'=>'Demo Event-2', 'start_date'=>'2019-09-11', 'end_date'=>'2019-09-13'],
        	['title'=>'Demo Event-3', 'start_date'=>'2019-09-14', 'end_date'=>'2019-09-14'],
        	['title'=>'Demo Event-3', 'start_date'=>'2019-09-17', 'end_date'=>'2019-09-17'],
        ];
        foreach ($data as $key => $value) {
        	Event::create($value);
        }
    }
}
