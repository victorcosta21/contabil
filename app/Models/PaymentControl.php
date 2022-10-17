<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentControl extends Model
{
    use HasFactory;
    
    protected $table = 'payment_controls';
    protected $fillable = ['client_id', 'month', 'payment', 'dueDate', 'cpPrevision', 'comments'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id', 'client_id');
    }
}
