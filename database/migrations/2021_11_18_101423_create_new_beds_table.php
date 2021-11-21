<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_beds', function (Blueprint $table) {
            $table->id();
            $table->string('bed');
            $table->unsignedBigInteger('bed_type_id');
            $table->integer('charge');
            $table->text('description');
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
        Schema::dropIfExists('new_beds');
    }
}
// CREATE TABLE `beds` (
//     `bed_id` int(11) NOT NULL,
//     `bed` varchar(100) DEFAULT NULL,
//     `bed_types` varchar(100) DEFAULT NULL,
//     `charge` int(11) DEFAULT NULL,
//     `avavilable` varchar(100) DEFAULT NULL,
//     `action` blob DEFAULT NULL
//   ) 

//   CREATE TABLE `new_bed` (
//     `bed` varchar(100) DEFAULT NULL,
//     `bed_type` blob DEFAULT NULL,
//     `charge` int(11) DEFAULT NULL,
//     `description` text DEFAULT NULL
//   ) 