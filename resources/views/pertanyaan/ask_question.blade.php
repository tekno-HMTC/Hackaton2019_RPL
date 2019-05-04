@extends('layouts.app')

{{-- @section('content')
<div class="container-fluid">
	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     </div>

     <div class="row">       

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-3 col-md-6 mb-4">
	      <div class="card border-left-info shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="row no-gutters align-items-center">
	                <div class="col-auto">
	                	<form action="/tcoverflow/public/pertanyaan/tambah" class="inline">
							<button class="float-left btn btn-success" >Tambah Pertanyaan</button>
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

<div class="container">
	
</div>

<div class="container">
 <h2>Pertanyaanku</h2>
	@foreach($pertanyaan as $p)
		<a href="">{{ $p->judul }}</a>
		<br>
	@endforeach
</div>
@endsection --}}
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
	   @foreach ($pertanyaan as $p)
	    <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- Card Body -->
                <div class="card-body">
                  	<table width="100%">
                  		<tr>
                  			<th style="font-weight: bold; font-size: 20px; padding: 10px 15px 15px 0px;">Pertanyaan</td>
                  			<th style="font-weight: bold; font-size: 20px; text-align: right; padding: 15px;"><a href="{{ URL('/pertanyaan/vote/'.$p->id_pertanyaan )}}">Vote</a></td>
                  		</tr>
	               
							<tr>
								<td style="padding: 10px 10px 10px 0px;"><a href="{{ URL('/pertanyaan/read/'.$p->id_pertanyaan )}}">{{ $p->pertanyaan }}</a></td>

								<td style="text-align: right; padding: 15px;">{{ $p->upvote }}</td>
							</tr>
					</table>
                </div>
              </div>
            </div>
        </div>
        @endforeach
</div>
          <div class="table-responsive col-md-12">
            
          </div>
        </div>
    </div>
  </div>
@endsection