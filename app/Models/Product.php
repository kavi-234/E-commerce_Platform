<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table and the fillable fields if necessary
    protected $table = 'products'; // Ensure this is the correct table name
    protected $fillable = ['name', 'price', 'description']; // Add other fields as required
}

