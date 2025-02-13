<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Asset extends Model
{
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('imagen', 100);
            $table->string('video_path', 100);
            $table->timestamps();
        });
    }
}
