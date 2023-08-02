{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('video_id', 'Video_id:') !!}
			{!! Form::text('video_id') !!}
		</li>
		<li>
			{!! Form::label('caption', 'Caption:') !!}
			{!! Form::textarea('caption') !!}
		</li>
		<li>
			{!! Form::label('video_path', 'Video_path:') !!}
			{!! Form::text('video_path') !!}
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