<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            if (!Schema::hasColumn('tasks', 'name')) {
                $table->string('name')->nullable();
            }
            if (!Schema::hasColumn('tasks', 'user_id')) {
                $table->bigInteger('user_id')->unsigned()->index()->nullable();
                $table->foreign('user_id')->references('id')->on('users');
            }
            if (Schema::hasColumn('tasks', 'end_time')) {
                $table->dropColumn('end_time');
            }
        });

        Schema::table('tasks', function (Blueprint $table) {
            if (!Schema::hasColumn('tasks', 'end_time')) {
                $table->timestamp('end_time')->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            if (Schema::hasColumn('tasks', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('tasks', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropIndex(['user_id' => 'user_id']);
                $table->dropColumn('user_id');
            }
        });

    }
};
