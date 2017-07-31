<?php
namespace App\Mailers;

use App\Contact;
use App\Client;
use App\Ticket;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer {
	protected $mailer;           

	/**
	 * from email address
	 * @var string
	 */
	protected $fromAddress = 'ticketingsystem123@gmail.com';

	/**
	 * from name
	 * @var string
	 */
	protected $fromName = 'Customer Service';

	/**
	 * email to send to
	 * @var [type]
	 */
	protected $to;

	/**
	 * Subject of the email
	 * @var [type]
	 */
	protected $subject;

	/**
	 * view template for email
	 * @var [type]
	 */
	protected $view;

	/**
	 * data to be sent alone email
	 * @var array
	 */
	protected $data = [];


	public function __construct(Mailer $mailer)
	{
		$this->mailer = $mailer;
	}
	
	/**
	 * Send Ticket information to user
	 * 
	 * @param  User   $user
	 * @param  Ticket  $ticket
	 * @return method deliver()
	 */
	public function sendTicketInformation(Ticket $ticket, Client $client)
	{
		$contacts = Contact::select('email')->where('client_id', $ticket->client_id)->get();

        foreach ($contacts as $contact){
            $this->to = $contact->email;
            $this->subject = "Ticketing System (Ticket ID: $ticket->id) $ticket->product - $ticket->description - $client->branch";
            $this->view = 'emails.ticket_info';
            $this->data = compact('ticket', 'client');
            $this->deliver();
        }
	}

	/**
	 * Send Ticket Comments/Replies to Ticket Owner
	 *
	 * @param  User   $ticketOwner
	 * @param  User   $user
	 * @param  Ticket  $ticket
	 * @param  Comment  $comment
	 * @return method deliver()
	 */
	public function sendTicketComments($user, Ticket $ticket, $comment)
	{
		$client = Client::where('id', $ticket->client_id)->first();
		$contacts = Contact::select('email')->where('client_id', $ticket->client_id)->get();

        foreach ($contacts as $contact){
            $this->to = $contact->email;
            $this->subject = "Ticketing System (Ticket ID: $ticket->id) $ticket->product - $ticket->description - $client->branch";
            $this->view = 'emails.ticket_comments';
            $this->data = compact('user', 'ticket', 'comment');
            $this->deliver();
        }
	}

	/**
	 * Send ticket status notification
	 * 
	 * @param  User   $ticketOwner
	 * @param  Ticket  $ticket
	 * @return method deliver()
	 */
	public function sendTicketStatusNotification(Ticket $ticket)
	{
		$contacts = Contact::select('email')->where('client_id', $ticket->client_id)->get();
        $client = Client::where('id', $ticket->client_id)->first();

		foreach ($contacts as $contact){
            $this->to = $contact->email;
            $this->subject = "Ticketing System (Ticket ID: $ticket->id) $ticket->product - $ticket->description - $client->branch";
            $this->view = 'emails.ticket_status';
            $this->data = compact('ticket', 'contacts', 'clients');
            $this->deliver();
        }
	}

	/**
	 * Do the actual sending of the mail
	 */
	public function deliver()
	{
		$this->mailer->send($this->view, $this->data, function($message) {
			$message->from($this->fromAddress, $this->fromName)
					->to($this->to)->subject($this->subject);
		});
	}
}