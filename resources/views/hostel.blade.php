@extends('welcome')
@section('content')

<section class="mt-4">
	<div class="mb-4">
		<h4 class="text-muted font-weight-bold text-left">
			<a href="/displayRegisteredHostels" class="text-decoration-none text-uppercase">Display Registered Hostels</a>
		</h4>
	</div>

	<div class="pt-4">
		@if(session('errorMsg'))
			<p class="alert alert-danger">{{session('errorMsg')}}</p>
		@endif
	</div>	

	<div class="col-sm-8 mx-auto">
		<fieldset class="text-center font-weight-bold pb-2">Register Hostel</fieldset>

		<form method="POST" action="/store" enctype="multipart/form-data" class="shadow-lg p-3 mb-5 bg-light rounded">
			@csrf
			<div class="mt-2 mb-2">
				<label for="universty_id">Select University: <span class="text-danger ml-1">*</span></label>
				<div>
					<select name="universty_id" class="form-control @error('universty_id') is-invalid @enderror">
						<option>Select University</option>
						@foreach($university as $item)
							<option value="{{$item->id}}">{{$item->name}}</option>
						@endforeach
					</select>
	        		@error('universty_id')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
			</div>
			<div class="mt-2 mb-4">
				<label for="hname">Hostel Name: <span class="text-danger ml-1">*</span></label>
				<input type="type" name="hname" class="form-control @error('hname') is-invalid @enderror">
	        		@error('hname')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
			</div>
			<div class="mt-2 mb-4">
				<label for="type">Hostel Type: <span class="text-danger ml-1">*</span></label>
				<div class="form-group @error('type') is-invalid @enderror">
					<span class="ml-0"><input type="radio" name="type" value="Mixed" class="form-group mr-1"></span>Mixed
					<span class="ml-4"><input type="radio" name="type" value="Girls" class="form-group mr-1"></span>Girls
					<span class="ml-4"><input type="radio" name="type" value="Boys" class="form-group mr-1"></span>Boys
				</div>
	        		@error('type')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
			</div>
			<div class="mt-2 mb-4">
				<label for="service" class="form-group">Services in the Hostel:</label>
				<textarea name="service" id="summernote" class="@error('service') is-invalid @enderror"></textarea>
        		@error('service')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div class="mt-2 mb-4">
				<label for="profileImage">Profile Image:</label>
				<input type="file" name="profileImage" class="form-control @error('profileImage') is-invalid @enderror" accept="image/*">
	        		@error('profileImage')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
			</div>
			<div class="mt-2 mb-4">
				<label for="slideImage">Sliding Images:</label>
				<input type="file" name="slideImage[]" multiple="multiple" class="form-control" accept="image/*">
			</div>
			<div class="mt-2 mb-4">
				<label for="description" class="form-group">Hostel description:</label>
				<textarea name="description" class="form-control summernote @error('description') is-invalid @enderror" id="summernote"></textarea> 
        		@error('description')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div>
				<input type="submit" class="btn btn-primary">
			</div>
		</form>
	</div>
</section>

@endsection