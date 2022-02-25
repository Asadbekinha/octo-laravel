<?php

namespace Asadbek\OctoLaravel\Models;

use Illuminate\Database\Eloquent\Model;
use JsonSerializable;

class Order extends Model implements JsonSerializable
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('octo.table.orders');

    }

    protected $fillable = [
        'name',
    ];
    public function jsonSerialize()
    {
        return
            [
                "user_id" => $this->id,
                "phone" => $this->phone,
                "email" => $this->email
            ];
    }
    public function user(){
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
