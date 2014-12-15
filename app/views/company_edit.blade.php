@extends('_master')


@section('title')
	Edit
@stop


@section('head')
@stop


@section('content')
	
	@foreach($errors->all() as $message) 
		<div class='error'>{{ $message }}</div>
	@endforeach

	<h2>{{{ $company['name'] }}}</h2>

	<div class="form-horizontal" role="form">

		{{----- # EDIT -----}}
		{{ Form::open(array('url' => '/company/edit')) }}

			{{ Form::hidden('id',$company['id']); }}
			
			<div class="form-group">
				{{ Form::label('name','Name',
					array(
						'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
					)
				) }}
				<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
					{{ Form::text('name',$company['name'],
						array(
							'class' => 'form-control'
						)
					) }}
				</div>
			</div>




			<div class='form-group'>
				{{ Form::label('phone', 'Phone',
					array(
						'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
					)
				) }}
				<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
					{{ Form::text('phone',$company['phone'],
						array(
							'placeholder' => 'No special characters',
							'class' => 'form-control'
						)
					) }}
				</div>
			</div>
			



			<div class="form-group">
				{{ Form::label('street','Street',
					array(
						'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
					)
				) }}
				<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
					{{ Form::text('street',$company['street'],
						array(
							'class' => 'form-control'
						)
					) }}
				</div>
			</div>
			



			<div class="form-group">
				{{ Form::label('city','City',
					array(
						'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
					)
				) }}
				<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
					{{ Form::text('city',$company['city'],
						array(
							'class' => 'form-control'
						)
					) }}
				</div>
			</div>
			



			<div class="form-group">
				{{ Form::label('state','State',
					array(
						'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
					)
				) }}
				<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
					{{ Form::select('state', 
						array(
						    'AL'=>'Alabama',
						    'AK'=>'Alaska',
						    'AZ'=>'Arizona',
						    'AR'=>'Arkansas',
						    'CA'=>'California',
						    'CO'=>'Colorado',
						    'CT'=>'Connecticut',
						    'DE'=>'Delaware',
						    'DC'=>'District of Columbia',
						    'FL'=>'Florida',
						    'GA'=>'Georgia',
						    'HI'=>'Hawaii',
						    'ID'=>'Idaho',
						    'IL'=>'Illinois',
						    'IN'=>'Indiana',
						    'IA'=>'Iowa',
						    'KS'=>'Kansas',
						    'KY'=>'Kentucky',
						    'LA'=>'Louisiana',
						    'ME'=>'Maine',
						    'MD'=>'Maryland',
						    'MA'=>'Massachusetts',
						    'MI'=>'Michigan',
						    'MN'=>'Minnesota',
						    'MS'=>'Mississippi',
						    'MO'=>'Missouri',
						    'MT'=>'Montana',
						    'NE'=>'Nebraska',
						    'NV'=>'Nevada',
						    'NH'=>'New Hampshire',
						    'NJ'=>'New Jersey',
						    'NM'=>'New Mexico',
						    'NY'=>'New York',
						    'NC'=>'North Carolina',
						    'ND'=>'North Dakota',
						    'OH'=>'Ohio',
						    'OK'=>'Oklahoma',
						    'OR'=>'Oregon',
						    'PA'=>'Pennsylvania',
						    'RI'=>'Rhode Island',
						    'SC'=>'South Carolina',
						    'SD'=>'South Dakota',
						    'TN'=>'Tennessee',
						    'TX'=>'Texas',
						    'UT'=>'Utah',
						    'VT'=>'Vermont',
						    'VA'=>'Virginia',
						    'WA'=>'Washington',
						    'WV'=>'West Virginia',
						    'WI'=>'Wisconsin',
						    'WY'=>'Wyoming'),

						$company['state'],

						array(
							'class' => 'form-control'
						)
					) }}
				</div>
			</div>




			<div class="form-group">
				{{ Form::label('zip','Zip',
					array(
						'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
					)
				) }}
				<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
					{{ Form::text('zip',$company['zip'],
						array(
							'class' => 'form-control'
						)
					) }}
				</div>
			</div>
			

			{{ Form::submit('Save', 
				array(
					'class' => 'pull-right btn btn-default'
				)
			) }}




		{{ Form::close() }}

	</div>

@stop