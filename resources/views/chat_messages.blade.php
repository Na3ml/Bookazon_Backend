{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('sender_id', 'Sender_id:') !!}
			{!! Form::text('sender_id') !!}
		</li>
		<li>
			{!! Form::label('receiver_id', 'Receiver_id:') !!}
			{!! Form::text('receiver_id') !!}
		</li>
		<li>
			{!! Form::label('msg', 'Msg:') !!}
			{!! Form::textarea('msg') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}