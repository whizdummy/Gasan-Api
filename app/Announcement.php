<?php

namespace Gasan;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = array(
    	'municipality_id',
    	'title',
    	'description',
    	'duration',
    	'is_lapsed'
    );
}
