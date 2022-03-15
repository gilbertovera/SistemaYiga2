<?php

namespace App\Models;
use App\Models\CashCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashMov extends Model
{
    use HasFactory;

    protected $table = 'cashmovs';
    protected $primaryKey = 'idcashmovs';
    protected $fillable = [
        'date',
        'description',
        'amount',
        'type',
        'idcashcategories'        
    ];

    //Relación uno a muchos inversa
    public function cashcategory(){
        return $this->belongsTo(CashCategory::class, 'idcashcategories');
    }
}
