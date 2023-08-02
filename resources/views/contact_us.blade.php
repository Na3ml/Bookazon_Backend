{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('msg', 'Msg:') !!}
			{!! Form::textarea('msg') !!}
		</li>
		<li>
			{!! Form::label('contact_email', 'Contact_email:') !!}
			{!! Form::text('contact_email') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}