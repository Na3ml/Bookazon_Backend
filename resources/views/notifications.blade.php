{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('notifiable_type', 'Notifiable_type:') !!}
			{!! Form::text('notifiable_type') !!}
		</li>
		<li>
			{!! Form::label('notifiable_id', 'Notifiable_id:') !!}
			{!! Form::text('notifiable_id') !!}
		</li>
		<li>
			{!! Form::label('data', 'Data:') !!}
			{!! Form::textarea('data') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}