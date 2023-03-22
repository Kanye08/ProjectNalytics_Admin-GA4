<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRequest;

class RequestsTableSeeder extends Seeder
{

    public function run(): void
    {
        UserRequest::create(

            [
                'user_id' => 2,
                'status_message' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        UserRequest::create(

            [
                'user_id' => 3,
                'status_message' => 'declined',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        UserRequest::create(

            [
                'user_id' => 4,
                'status_message' => 'in progress',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        UserRequest::create(

            [
                'user_id' => 5,
                'status_message' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
