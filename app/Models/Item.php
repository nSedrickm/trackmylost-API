<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['document_type', 'first_name', 'other_names', 'phone_number', 'reward'];

    /**
     * Get the full name.
     *
     * @return string
     */
    public function getFullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
