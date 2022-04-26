<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'users';

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->string('id');
            $table->string('username');
            $table->string('email');
            $table->string('password', 64);                 //sha256 hash length
            $table->string('salt');             //legacy support (^.^)
            $table->integer('updated_at');
            $table->integer('created_at');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop($this->table);
    }
}
