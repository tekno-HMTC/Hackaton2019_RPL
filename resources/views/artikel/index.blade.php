@extends('layouts.app')
@section('content')
	<div class="row">
    	<div class="col">
      {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            {{ $error }}
          </div>
        @endforeach  
      @endif
      @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
          <strong>Sukses!</strong> {{ session()->get('message') }}
        </div>
      @endif --}}
        	<div class="card shadow">
          		<div class="card-header border-0">
              		<h3 class="mb-0">Artikel TC~OverFlow</h3>
          		</div>
          	<div class="container-fluid">
		 		<div class="d-sm-flex align-items-center justify-content-between mb-4">
	        		<h1 class="h3 mb-0 text-gray-800"></h1>
	     		</div>
		     	<div class="row">       
			    	<div class="col-xl-3 col-md-6 mb-4">
			      		<div class="card border-left-info shadow h-100 py-2">
			        		<div class="card-body">
			          			<div class="row no-gutters align-items-center">
			            			<div class="col mr-2">
			              				<div class="row no-gutters align-items-center">
			                				<div class="col-auto">
			                					<form action="{{ url('/buat_artikel') }}" class="inline">
													<button class="float-left btn btn-success" >Buat Artikel </button>
												</form>
			                				</div>
						              	</div>
						            </div>
						     		<div class="col-auto">
						              	<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						            </div>
						        </div>
						    </div>
						</div>
					</div>
				</div>
	    			@foreach ($artikel as $post)
		            	<div class="card mb-4 border-left-info shadow">
			                <div class="card-header card-header-padding">
								<a class="post-title" href="" style="font-size: 20px; font-weight: bold; text-align: text-center;">{{ $post->judul}} </a> <br>
								<small>
									{{ $post->created_at->diffForHumans()}} {{ date('F d, Y',strtotime($post->created_at)) }} at {{ date('g:ia',strtotime($post->created_at)) }} by <a href=""> {{ $post->id_user}}</a>
								</small>
			                		{{-- @if($post->comments()->get()->count()==1){{$post->comments()->get()->count()}} Komentar
			                		@endif
			                		@if($post->comments()->get()->count() > 1){{$post->comments()->get()->count()}} Komentar
			                		@endif
			                		@if($post->comments()->get()->count() ==null) Don't have a comment
			                		@endif --}}
								{{-- @if( Auth::user()->username == $post->user->username)
									<div class="">
										<a href="{{ route('post.edit', $post)}}">
											<button type="submit" class="btn btn-xs btn-outline-success btn-block">Edit</button> 
										</a><br>
										<form class="" action="{{ route('post.destroy', $post)}}" method="post">
											{{ csrf_field()}}
											{{ method_field('DELETE')}}
											<button type="submit" class="btn btn-xs btn-outline-danger btn-block">Delete</button> 
										</form>
									</div>
								@endif --}}
			                </div>
			                <div class="card-body">
			                    <p>
			                    	{{ str_limit($post->isi_artikel, 300, ' ....')}}
								</p>
								<p>
									{{-- @if( Auth::user()->username == $post->user->username)
									<div class="form-inline">
										<a href="{{ route('post.edit', $post)}}" style="margin-right: 6px;">
											<button type="submit" class="btn btn-lg btn-outline-success">Edit</button> 
										</a><br>
										<form class="" action="{{ route('post.destroy', $post)}}" method="post">
											{{ csrf_field()}}
											{{ method_field('DELETE')}}
											<button type="submit" class="btn btn-lg btn-outline-danger">Delete</button> 
										</form>
									</div>
									@endif --}}
								</p>
			                </div>
			            </div>
					@endforeach
	        </div>
    	</div>
  	</div>
@endsection