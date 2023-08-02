{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('type_name', 'Type_name:') !!}
			{!! Form::text('type_name') !!}
		</li>
		<li>
			{!! Form::label('type_icon', 'Type_icon:') !!}
			{!! Form::text('type_icon') !!}
		</li>
		<li>
			{!! Form::label('property_id', 'Property_id:') !!}
			{!! Form::text('property_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}