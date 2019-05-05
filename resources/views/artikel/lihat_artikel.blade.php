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
		     	<div class="row" hidden>       
			    	<div class="col-xl-3 col-md-6 mb-4">
			      		<div class="card border-left-info shadow h-100 py-2">
			        		<div class="card-body">
			          			<div class="row no-gutters align-items-center">
			            			<div class="col mr-2">
			              				<div class="row no-gutters align-items-center">
			                				{{--  --}}
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
	    			@foreach ($post as $post)
	    				@php
							$nama = App\user::find($post->id_user);
						@endphp
		            	<div class="card mb-4 border-left-info shadow">
			                <div class="card-header card-header-padding">
								<a class="post-title" href="" style="font-size: 20px; font-weight: bold; text-align: text-center;">{{ $post->judul}} </a> <br>
								<small>
									{{ $post->created_at->diffForHumans()}} {{ date('F d, Y',strtotime($post->created_at)) }} at {{ date('g:ia',strtotime($post->created_at)) }} by <a href=""> {{ $nama->name }}</a>
								</small>
			                </div>
			                <div class="card-body">
			                    <p>
			                    	{{ $post->isi_artikel }} 
			                    	{{-- <a href="{{ url('/post/'.$post->id_artikel) }}">Baca Selengkapnya</a> --}}
								</p>
								
			                </div>
			            </div>
					
					<div class="panel panel-default"><br><br>
					<div class="panel-heading">
						Tambahkan Komentar
					</div><br>
					<div class="panel-body">
						<form action="{{url('/komen')}}" method="POST" class="form-horizontal">
							{{csrf_field()}}
							<div class="form-grup">
								<textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Tambahkan Komentar..."></textarea>
								<input class="form-control" placeholder="ID" type="text" name="id" value="{{ $post->id_artikel }}" hidden>
							</div><br>
							<div class="form-group text-right">
								<input type="submit" value="Submit" class="btn btn-primary">
							</div>
						</form>
						<br><br>
						@endforeach
		        @foreach($komen as $comment)
		        @php
		        	$nama = App\user::find($comment->id_user);
		        @endphp
		              <div class="media border p-3">
		                {{-- <img src="{{ asset('storage/'.$comment->user->avatar)}}" alt="" class="mr-3 mt-3 rounded-circle" style="width:60px;"> --}}
		                <div class="media-body">
		                  {{$nama->name}} {{-- - {{$comment->created_at->diffForHumans()}} --}}
		                  <p>{{$comment->komentar}}</p>
		                </div>
		              </div><br>
		            @endforeach
						{{-- @foreach($post->comments()->get() as $comment)
							<div class="media border p-3">
							  <img src="{{ asset('storage/'.$comment->user->avatar)}}" alt="" class="mr-3 mt-3 rounded-circle" style="width:60px;">
							  <div class="media-body">
							    {{$comment->user->username}} - {{$comment->created_at->diffForHumans()}}
							    <p>{{$comment->message}}</p>
							  </div>
							</div><br>
						@endforeach --}}
					</div>
				</div>
	        </div>
    	</div>
  	</div>
@endsection