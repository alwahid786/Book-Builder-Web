<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copyright extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'copyright_year',
        'copyright_name',
        'company_name1',
        'company_name2',
        'street_address1',
        'street_address2',
        'city',
        'state',
        'country',
        'zipcode',
        'template_id',
        'content',
        'publication_year',
        'author_name',
        'cover_designer',
        'editor',
        'publisher',
        'isbn',
        'printed_country',
    ];
}
