{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('property_id', 'Property_id:') !!}
			{!! Form::text('property_id') !!}
		</li>
		<li>
			{!! Form::label('facility_id', 'Facility_id:') !!}
			{!! Form::text('facility_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}