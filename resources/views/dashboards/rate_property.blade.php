{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('proprty_id', 'Proprty_id:') !!}
			{!! Form::text('proprty_id') !!}
		</li>
		<li>
			{!! Form::label('comment', 'Comment:') !!}
			{!! Form::textarea('comment') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}