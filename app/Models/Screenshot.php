<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    use HasFactory;

    // $table->id();
    // $table->string('alt_text')->nullable();
    // $table->binary('image_data');
    // $table->foreignId('game_id')->constrained()->onDelete('cascade');
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    protected $fillable = [
        'alt_text',
        'image_data',
        'game_id',
    ];
}
