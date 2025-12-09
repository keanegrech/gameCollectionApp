<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    // $table->id();
    // $table->string('name');
    // $table->string('manufacturer')->nullable();

    public function game()
    {
        return $this->hasMany(Game::class);
    }

    protected $fillable = ['name', 'manufacturer'];
}
