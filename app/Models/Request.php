<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    protected $fillable = [
        'user_id', 'company_id', 'partner_id', 'protocol', 'status', 'situation', 'service', 'cpf', 'employee_name', 'gender', 'born_date', 'department', 'post',
    ];
}
