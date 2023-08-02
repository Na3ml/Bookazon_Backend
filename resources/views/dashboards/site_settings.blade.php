{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('logo', 'Logo:') !!}
			{!! Form::text('logo') !!}
		</li>
		<li>
			{!! Form::label('address', 'Address:') !!}
			{!! Form::text('address') !!}
		</li>
		<li>
			{!! Form::label('support_phone', 'Support_phone:') !!}
			{!! Form::text('support_phone') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('copyright', 'Copyright:') !!}
			{!! Form::textarea('copyright') !!}
		</li>
		<li>
			{!! Form::label('facebook', 'Facebook:') !!}
			{!! Form::text('facebook') !!}
		</li>
		<li>
			{!! Form::label('twitter', 'Twitter:') !!}
			{!! Form::text('twitter') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}