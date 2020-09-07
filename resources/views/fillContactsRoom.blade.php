@extends('welcome')
@section('content')
<section class="pt-4">
	<div class="pt-4">
		@if(session('successMsg'))
			<p class="alert alert-success">{{session('successMsg')}}</p>
		@endif	
	</div>

	<div>
		<table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
		  <thead>
		    <tr>
		      <th class="th-sm">Name</th>
		      <th class="th-sm">Type</th>
		      <th class="th-sm">Add Location </th>
		      <th class="th-sm">Add Rooms</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<tr>
		  		<td>{{$hostels->hname}}</td>
		  		<td>{{$hostels->type}}</td>	
		  		<td><button data-toggle="modal" href="#exampleModal">Add Location</button></td>	
		  		<td><button data-toggle="modal" href="#exampleModalRoom">Add Rooms</button></td>	
	  		</tr>
		  </tbody>
		</table>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title font-weight-bold text-muted" id="exampleModalLabel">Register Location</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="/location" method="POST">
        	    @csrf
        	    <input type="hidden" name="hostel_id" value="{{$hostels->id}}">
	        	<div>
	        		<label class="mx-auto" for="location">Address:<span class="text-danger ml-2">*</span></label>
	        		<input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Address of {{$hostels->hname}}">
	        		@error('location')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
	        	</div>
	        	<div class="pt-2">
	        		<label class="mt-4" for="mobile">Mobile:<span class="text-danger ml-2">*</span></label>
	        		<input type="tel" id="phone" name="mobile" class="form-control @error('mobile') is-invalid @enderror">
	        		@error('mobile')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
	        	</div>
	        	<div class="pt-2">
	        		<label class="mt-4" for="email">Email:<span class="text-danger ml-2">*</span></label>
	        		<input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
	        		@error('email')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
	        	</div>
		      <div class="modal-footer d-flex justify-content-center">
		        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

  	<div class="modal fade" id="exampleModalRoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title font-weight-bold text-muted" id="exampleModalLabel">Register Room</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="/room" method="POST">
        	    @csrf
        	    <input type="hidden" name="hostel_id" value="{{$hostels->id}}">
	        	<div>
	        		<label class="mx-auto" for="room">Room:<span class="text-danger ml-2">*</span></label>
        		<div class="form-group @error('type') is-invalid @enderror">
	        		<span class="ml-0"><input type="radio" name="room" class="form-group mr-1" value="single"></span>Single
	        		<span class="ml-4"><input type="radio" name="room" class="form-group mr-1" value="double"></span>Double
	        		<span class="ml-4"><input type="radio" name="room" class="form-group mr-1" value="triple"></span>Triple
	        	</div>
	        		@error('room')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
	        	</div>
	        	<div class="pt-2">
	        		<label class="mt-4" for="description">Description:<span class="text-danger ml-2">*</span></label>
	        		<textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror">
	        		</textarea>
	        		@error('description')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
	        	</div>
	        	<div class="pt-2">
	        		<label class="mt-4" for="fare">Fare:<span class="text-danger ml-2">*</span></label>
	        		<input type="number" name="fare" min="0" class="form-control @error('fare') is-invalid @enderror">
	        		@error('fare')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
	        	</div>
		      <div class="modal-footer d-flex justify-content-center">
		        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
</section>

@endsection