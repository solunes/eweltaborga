<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Custom
        Schema::create('social_networks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->unsigned()->default(1);
            $table->integer('order')->nullable()->default(0);
            $table->string('code');
            $table->string('url');
            $table->timestamps();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
        });
        Schema::create('titles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->timestamps();
        });
        Schema::create('title_translation', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('title_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['title_id','locale']);
            $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
        });
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->timestamps();
        });
        Schema::create('content_translation', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('content_id')->unsigned();
            $table->string('locale')->index();
            $table->text('content');
            $table->unique(['content_id','locale']);
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
        });
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->nullable();
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('location_1')->nullable();
            $table->string('location_2')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->timestamps();
        });
        /* Formularios */
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_forms');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('members');
        Schema::dropIfExists('services');
        Schema::dropIfExists('types');
        Schema::dropIfExists('content_translation');
        Schema::dropIfExists('contents');
        Schema::dropIfExists('title_translation');
        Schema::dropIfExists('titles');
        Schema::dropIfExists('social_networks');
    }
}
