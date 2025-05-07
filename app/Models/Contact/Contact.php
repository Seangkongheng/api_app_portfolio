<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ='tbl_contacts';
    protected $primarykey='id';
    protected $fillable=[
        'id',
        'label',
        'icon',
        'values'
    ];
}
