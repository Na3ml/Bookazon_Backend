{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description') !!}
		</li>
		<li>
			{!! Form::label('price', 'Price:') !!}
			{!! Form::text('price') !!}
		</li>
		<li>
			{!! Form::label('size', 'Size:') !!}
			{!! Form::text('size') !!}
		</li>
		<li>
			{!! Form::label('amenities', 'Amenities:') !!}
			{!! Form::text('amenities') !!}
		</li>
		<li>
			{!! Form::label('total_bathrooms', 'Total_bathrooms:') !!}
			{!! Form::text('total_bathrooms') !!}
		</li>
		<li>
			{!! Form::label('total_balconies', 'Total_balconies:') !!}
			{!! Form::text('total_balconies') !!}
		</li>
		<li>
			{!! Form::label('total_guests', 'Total_guests:') !!}
			{!! Form::text('total_guests') !!}
		</li>
		<li>
			{!! Form::label('featured_photo', 'Featured_photo:') !!}
			{!! Form::text('featured_photo') !!}
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