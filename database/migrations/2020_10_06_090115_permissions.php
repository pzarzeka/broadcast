<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
Use Spatie\Permission\Models\Role;

class Permissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = Permission::create(['name' => 'manage question']);
        $speaker = Permission::create(['name' => 'answer question']);

        $adminRole = Role::create(['name' => 'admin']);
        $speakerRole = Role::create(['name' => 'speaker']);

        $adminRole->syncPermissions([
            $admin,
            $speaker
        ]);

        $speakerRole->syncPermissions([
            $speaker
        ]);
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
