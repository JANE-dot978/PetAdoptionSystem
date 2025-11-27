
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('pet_type_id');
            $table->integer('age');
            $table->string('gender');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('status')->default('available'); // <-- Add status here
            $table->timestamps();

            $table->foreign('pet_type_id')->references('id')->on('pet_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pets');
    }
};
