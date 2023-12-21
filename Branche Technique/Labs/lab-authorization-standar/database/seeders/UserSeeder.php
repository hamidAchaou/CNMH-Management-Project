<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $leaderPermissions = Permission::pluck('name')->toArray();

       $projectLeader =  User::create([
            'name' => 'Chef de projet',
            'email' => 'project.leader@solicode.com',
            'password' => Hash::make('leader'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $projectLeader->assignRole('project-leader');
        $projectLeader->givePermissionTo($leaderPermissions);

        $user = User::create([
            'name' => 'membre',
                'email' => 'membre@solicode.com',
                'password' => Hash::make('membre'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ])->assignRole('member');
        $user->givePermissionTo('index-TasksController','index-ProjectsController', 'show-ProjectsController');

    }
}
