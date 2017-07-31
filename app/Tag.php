<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var  array
	 */
	protected $fillable = [
		'ticket_id', 'tag'
	];

    /**
     * A comment belongs to a particular ticket
     */
    public function ticket()
    {
    	return $this->belongsTo(Ticket::class);
    }
}