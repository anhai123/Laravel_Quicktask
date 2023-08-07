<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


    //Give the moving column a temporary name:
    Schema::table('tasks', function($table)
    {
        $table->dropForeign(['user_id']);
        $table->dropIndex(['user_id' => 'user_id']);
        $table->renameColumn('user_id', 'name_old');

    });

    //Add a new column with the regular name:
    Schema::table('tasks', function(Blueprint $table)
    {
        $table->bigInteger('user_id')->unsigned()->index()->nullable()->after('end_time');
        $table->foreign('user_id')->references('id')->on('users');
    });

    //Copy the data across to the new column:
    DB::table('tasks')->update([
        'user_id' => DB::raw('name_old')
    ]);

    //Remove the old column:
    Schema::table('tasks', function(Blueprint $table)
    {

        $table->dropColumn('name_old');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

           //Give the moving column a temporary name:
          Schema::table('tasks', function($table)
          {
              $table->renameColumn('user_id', 'name_old');
              $table->dropForeign(['user_id']);
          });

          //Add a new column with the regular name:
          Schema::table('tasks', function(Blueprint $table)
          {
              $table->bigInteger('user_id')->unsigned()->index()->nullable()->after('name');
              $table->foreign('user_id')->references('id')->on('users');
          });

          //Copy the data across to the new column:
          DB::table('tasks')->update([
              'user_id' => DB::raw('name_old')
          ]);

          //Remove the old column:
          Schema::table('tasks', function(Blueprint $table)
          {
              $table->dropColumn('name_old');
          });
    }
};
