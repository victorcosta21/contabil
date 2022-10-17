<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = ['id', 'accountNumber', 'name', 'document', 'email', 'date'];

    public function contacts()
    {
        return $this->hasMany(Contacts::class, 'contact_id', 'id');
    }
    
    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function extra()
    {
        return $this->hasOne(ExtraInformation::class, 'id', 'extra_id');
    }

    public function payment()
    {
        return $this->hasMany(PaymentControl::class, 'id', 'payment_id');
    }
}
