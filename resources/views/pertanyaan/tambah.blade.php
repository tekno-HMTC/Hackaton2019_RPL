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
          			<h3 class="mb-0">Buat Pertanyaan</h3>
        		</div>
    			<div class="ml-4 mb-4 mt-4 mr-4">			
				<form action="{{ route('pertanyaan.store')}}" method="post" class="" enctype="multipart/form-data">
					{{ csrf_field()}}
					<div class="form-group has-feedback">
						<label for="" class="text mt-1" style="font-size: 20px;">Judul</label>
						<input type="text" class="form-control inp" name="judul" placeholder="Judul" required>
					</div>
					<div class="form-group has-feedback">
						<label for="" class="text mt-1" style="font-size: 20px;">Tag</label>
						<input type="text" class="form-control inp" name="tag" placeholder="Tag" required>
					</div>
					<div class="form-group has-feedback">
						<label for="" class="tex" style="font-size: 20px;">Pertanyaan</label>
						<textarea class="form-control inp" name="pertanyaan" id='article-ckeditor' cols="" rows="5" placeholder="Pertanyaan" required></textarea>
						
					</div>
					<div class="form-group">
						<input type="submit" value="Simpan" class="btn btn-md btn-primary">
						<a href="{{route('pertanyaan')}}" class="btn btn-md btn-light">Batal</a>
					</div>
				</form>
				
			</div>
        	</div>
    	</div>
  	</div>
@endsection