<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InOutMaterial extends Model
{
    use HasFactory;
    protected $table = 'in_out_materials';
    protected $fillable = [
        'category_id', 'matrial_id', 'date', 'quantity'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function material() {
        return $this->belongsTo(Material::class, 'matrial_id', 'id');
    }
}
