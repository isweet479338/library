<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Rent</title>
</head>
<body>
<p>
Thank You, Mr./Mrs. {{ $user->name }}
<br/>
Your Book List is.
</p>

<table>
	<thead>
		<th>SL.</th>
		<th>Name</th>
	</thead>
	<tbody>

		<tr>
			<td>1</td>
			<td>{{ $book->name }}</td>
		</tr>
	
	</tbody>
</table>

<p>This is Daily Notification</p>


</body>
</html>



