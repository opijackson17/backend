@extends('welcome')
@section('content')
<section class="pt-4 ">
	<div>
		<h4 class="text-muted font-weight-bold text-left">
			<a href="" class="text-decoration-none text-uppercase">Update {{$hostelData->hname}} Hostel Room and Fares</a>
		</h4>

	</div>
	<fieldset class="text-center font-weight-bold pb-2">Edit {{$hostelData->hname}} Hostel</fieldset>
		<form action="" method="post" class="col-sm-10 mx-auto shadow-lg p-3 mb-5 bg-light rounded">	
			@csrf
			<div class="row mb-4 pl-2">
				<div class="col-xs-4 mr-4">
					<div class="mb-4">
						<label for="hname">Hostel Name:</label>
						<input type="text" name="hname" class="form-control" value="{{$hostelData->hname}}">
					</div>
					<div class="">				
						<label for="email">Hostel Email:</label>
						<input type="email" name="email" class="form-control" value="{{$locationData->email}}">
					</div>
				</div>
				<div class="col-xs-4 mr-4">
					<div class="mb-4">
						<label for="type">Gender in the Hostel:</label>
						<select name="type" class="form-control">
		                  	<option value="" {!! ($hostelData->type == '')? 'selected': '' !!}>select gender in Hostel </option>
							<option value="Mixed" {!! ($hostelData->type == 'Mixed')?'selected' : '' !!}>Mixed</option>
							<option value="Boys" {!! ($hostelData->type == 'Boys')?'selected' : '' !!}>Boys</option>
							<option value="Girls" {!! ($hostelData->type == 'Girls')?'selected' : '' !!}>Girls</option>
						</select>
					</div>
					<div class="">
						<label for="location">Address of Hostel:</label>
						<input type="text" name="location" class="form-control" value="{{$locationData->location}}">
					</div>
				</div>		
				<div class="col-xs-4">
					<div class="">
						<label for="mobile">Mobile:</label>
						<input type="tel" name="mobile" class="form-control" value="{{$locationData->mobile}}">
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="mb-4">
					<label for="service" class="form-group">Services in the Hostel:</label>
					<textarea name="service" id="summernote">{{$serviceData->service}}</textarea>
				</div>
				<div>
					<label for="description" class="form-group">Description of the Hostel:</label>
					<textarea name="description" class="summernote">{{$hostelData->description}}</textarea>
				</div>
			</div>
			<div class="col-xs-12 pt-4">
				<input type="submit" name="Update" class="btn btn-primary">
			</div>
		</form>
</section>
@endsection