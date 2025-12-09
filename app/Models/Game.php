<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // $table->id();
    // $table->string('title');
    // $table->string('description');
    // $table->string('steam_app_id')->nullable();
    // $table->string('developer');
    // $table->integer('percent_complete');
    // $table->date('release_date')->nullable();
    // $table->foreignId('machine_id')->constrained()->onDelete('cascade');

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function screenshots()
    {
        return $this->hasMany(Screenshot::class);
    }

    protected $fillable = [
        'title',
        'description',
        'steam_app_id',
        'developer',
        'percent_complete',
        'release_date',
        'machine_id',
    ];
}
