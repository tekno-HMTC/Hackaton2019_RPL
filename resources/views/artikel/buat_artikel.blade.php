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
          			<h3 class="mb-0">Buat Artikel</h3>
        		</div>
        		
    			<div class="col-md-10 offset-md-1 shadow-lg mb-4 mt-4" id="form-box">			
				<form action="{{ route('post.store')}}" method="post" class="" enctype="multipart/form-data">
					{{ csrf_field()}}
					<div class="form-group has-feedback">
						<label for="" class="text mt-1" style="font-size: 20px;">Judul Artikel</label>
						<input type="text" class="form-control inp" name="title" placeholder="Judul Artikel" value="{{ old('title')}}" required>
					</div>
					<div class="form-group has-feedback">
						<label for="" class="tex" style="font-size: 20px;">Konten Artikel</label>
						<textarea class="form-control inp" name="content" id='article-ckeditor' cols="" rows="5" placeholder="Konten Artikel" value="{{ old('content')}}" required></textarea>
						
					</div>
					<div class="form-group">
						<input type="submit" value="Simpan" class="btn btn-md btn-primary">
						<a href="" class="btn btn-md btn-light">Batal</a>
					</div>
				</form>
				
			</div>
        	</div>
    	</div>
  	</div>
@endsection