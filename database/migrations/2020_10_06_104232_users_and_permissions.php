<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@espu.pl',
            'password' => Hash::make('admin_espu_2020')
        ]);

        $speaker = User::create([
            'name' => 'speaker',
            'email' => 'speaker@espu.pl',
            'password' => Hash::make('speaker_espu_2020')
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@espu.pl',
            'password' => Hash::make('user_espu_2020')
        ]);

        $admin->assignRole('admin');
        $speaker->assignRole('speaker');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
