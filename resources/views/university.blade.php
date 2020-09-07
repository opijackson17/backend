@extends('welcome')
@section('content')
<section class="mt-4">
	<div>
		<h4 class="lead text-left" ><a href="#exampleModal" data-toggle="modal" class="text-decoration-none">Register University</a> </h4>
	</div>
	<div class="pt-4">
		@if(session('successMsg'))
			<p class="alert alert-success">{{session('successMsg')}}</p>
		@endif
		@if(session('errorMsg'))
			<p class="alert alert-danger">{{session('errorMsg')}}</p>
		@endif
	</div>


	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title font-weight-bold text-muted" id="exampleModalLabel">Register University</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="/save" method="POST" id="university">
        	    @csrf
	        	<div>
	        		<label class="mx-auto" for="name">Name of University:<span class="text-danger ml-2">*</span></label>
	        		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name of University">
	        		@error('name')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
	        	</div>
	        	<div class="pt-2">
	        		<label class="mt-4" for="description">Brief Description of University:</label>
	        		<textarea name="description" class="form-control @error('description') is-invalid @enderror">
	        		</textarea>
	        		@error('decription')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror

	        	</div>
		      <div class="modal-footer d-flex justify-content-center">
		        <input type="submit" class="btn btn-primary" form="university"/>
		        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<div>
	<h4 class="text-muted text-uppercase font-weight-bold text-center">Registered Universities in Uganda</h4>
	<div>
		<table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
		  <thead>
		    <tr>
		      <th class="th-sm">Name
		      </th>
		      <th class="th-sm">Description
	   		  </th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($university as $item)
		  	<tr>
		  		<td>{{$item->name}}</td>
		  		<td>{{$item->description}}</td>	
	  		</tr>
	  		@endforeach	  	
		  </tbody>
		</table>

	</div>	
</section>
@endsection