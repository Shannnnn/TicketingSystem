<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ticket Information</title>
</head>
<body>
	<p>
		Thank you for contacting our support team. A ticket has been opened for you. You will be notified when a response is made by email. The details of your ticket are shown below:
	</p>

	<p>Title: {{ $ticket->product }} - {{ $ticket->description }} - {{ $client->branch }}</p>
	<p>Product: {{ $ticket->product }}</p>
	<p>Problem Description: {{ $ticket->description }}</p>
	<p>Problem Summary: {{ $ticket->product_summary }}</p>

</body>
</html>