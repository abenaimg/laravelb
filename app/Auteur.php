<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{

    public function livres()
  	{
  		return $this->belongsToMany('App\Livre');
  	}

}
