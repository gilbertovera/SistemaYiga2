<?php

namespace App\Models;
use App\Models\CashMov;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'idcashcategories';
    protected $fillable = [
        'name',
        'description',
        'type',
        'idcashcategories'
    ];

    //Relación uno a muchos 
    public function cashmovs(){
        return $this->hasMany(CashMov::class,'idcashcategories');
    }
}
