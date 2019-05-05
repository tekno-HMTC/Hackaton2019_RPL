@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-body">
                    <div class="profile">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/120x120">
                                <h3 class="mt-2">{{Auth::user()->name}}</h3>
                                <p>{{Auth::user()->nrp}}</p>
                                <div class="row justify-content-center">
                                    <a class="btn btn-primary btn-sm mr-2" href="{{ url('pertanyaan') }}">Questions <strong>10</strong></a>
                                    <a class="btn btn-warning btn-sm" href="#menu2">Answers <strong>10</strong></a>
                                    <a class="btn btn-success btn-sm ml-2"  href="{{ url('artikel')}}">Articles <strong>10</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div id="article">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
