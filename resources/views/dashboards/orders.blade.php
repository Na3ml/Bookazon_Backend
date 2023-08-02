{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('propertiy_id', 'Propertiy_id:') !!}
			{!! Form::text('propertiy_id') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('order_no', 'Order_no:') !!}
			{!! Form::text('order_no') !!}
		</li>
		<li>
			{!! Form::label('booking_date', 'Booking_date:') !!}
			{!! Form::text('booking_date') !!}
		</li>
		<li>
			{!! Form::label('check_in_date', 'Check_in_date:') !!}
			{!! Form::text('check_in_date') !!}
		</li>
		<li>
			{!! Form::label('checko_out_date', 'Checko_out_date:') !!}
			{!! Form::text('checko_out_date') !!}
		</li>
		<li>
			{!! Form::label('transaction_id', 'Transaction_id:') !!}
			{!! Form::text('transaction_id') !!}
		</li>
		<li>
			{!! Form::label('paid_amount', 'Paid_amount:') !!}
			{!! Form::text('paid_amount') !!}
		</li>
		<li>
			{!! Form::label('status', 'Status:') !!}
			{!! Form::text('status') !!}
		</li>
		<li>
			{!! Form::label('payment_method', 'Payment_method:') !!}
			{!! Form::text('payment_method') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}