<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class HelpTopic extends Model
{
    protected $fillable = ['topic'];

    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'help_topic');
    }
}
