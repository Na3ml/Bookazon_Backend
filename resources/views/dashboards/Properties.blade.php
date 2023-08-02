{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('UUID', 'UUID:') !!}
			{!! Form::text('UUID') !!}
		</li>
		<li>
			{!! Form::label('prorerty_code', 'Prorerty_code:') !!}
			{!! Form::text('prorerty_code') !!}
		</li>
		<li>
			{!! Form::label('property_status', 'Property_status:') !!}
			{!! Form::text('property_status') !!}
		</li>
		<li>
			{!! Form::label('price', 'Price:') !!}
			{!! Form::text('price') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description') !!}
		</li>
		<li>
			{!! Form::label('property_size', 'Property_size:') !!}
			{!! Form::text('property_size') !!}
		</li>
		<li>
			{!! Form::label('address', 'Address:') !!}
			{!! Form::text('address') !!}
		</li>
		<li>
			{!! Form::label('country', 'Country:') !!}
			{!! Form::text('country') !!}
		</li>
		<li>
			{!! Form::label('city', 'City:') !!}
			{!! Form::text('city') !!}
		</li>
		<li>
			{!! Form::label('Additional_fees', 'Additional_fees:') !!}
			{!! Form::text('Additional_fees') !!}
		</li>
		<li>
			{!! Form::label('longitude', 'Longitude:') !!}
			{!! Form::text('longitude') !!}
		</li>
		<li>
			{!! Form::label('latitude', 'Latitude:') !!}
			{!! Form::text('latitude') !!}
		</li>
		<li>
			{!! Form::label('status', 'Status:') !!}
			{!! Form::text('status') !!}
		</li>
		<li>
			{!! Form::label('hot', 'Hot:') !!}
			{!! Form::text('hot') !!}
		</li>
		<li>
			{!! Form::label('featured', 'Featured:') !!}
			{!! Form::text('featured') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}