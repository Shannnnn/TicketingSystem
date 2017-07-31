<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
    	'assigned_to', 'department', 'help_topic',
        'priority', 'product', 'ticket_source', 'ticket_status', 'description', 'product_summary', 'sla_plan',
        'remarks', 'client_id', 'brand', 'warranty', 'user_id', 'scheduled_date', 'turn_over_date'
    ];

    public function category()
    {
        return $this->belongsTo('App\HelpTopic', 'topic');
    }
}
