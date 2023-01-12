<?php

use App\Models\Provider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Provider::insert([
            [
                'name' => 'vultr',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
            [
                'name' => 'custom',
                'created_at'  => now(),
                'updated_at'  => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Provider::whereName('vultr')->delete();
        Provider::whereName('custom')->delete();
    }
};
