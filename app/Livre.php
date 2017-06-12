<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{

    public function auteurs() 
  	{
  		return $this->belongsToMany('App\Auteur');
  	}

  	public function editeur()
  	{
  		return $this->belongsTo('App\Editeur');
  	}

}
