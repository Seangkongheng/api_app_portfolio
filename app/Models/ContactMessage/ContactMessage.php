<?php

namespace App\Models\ContactMessage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

     public $timestamps = false;
    protected $table ='tbl_contact_messages';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'firstName',
        'lastName',
        'phone',
        'email',
        'decription'
    ];
}
