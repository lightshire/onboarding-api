<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDummyUserToOrganizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = \App\User::create([
            'name' => 'Dummy Person',
            'email' => 'gian@dummy.org',
            'password' => Hash::make('12345678'),
            'organization_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\User::where('email', 'gian@dummy.org')->delete();
    }
}
