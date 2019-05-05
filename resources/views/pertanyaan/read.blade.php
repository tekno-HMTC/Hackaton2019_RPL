@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<style>
    a {
        color: #005999;
    }

    code,
    pre {
        background-color: #eff0f1;
    }

    a:hover {
        color: #07C;
    }

    pre {
        white-space: pre-line;
    }

    p.voter {
        font-size: 50px;
        margin-bottom: 0;
    }

    span.tag {
        color: #fff;
        background-color: #007bff;
    }

    .p-15 {
        padding: 15px;
    }

    .p-10 {
        padding: 10px;
    }

    .p-0 {
        padding: 0px;
    }

    .mb-1 {
        clear: both;
        margin-bottom: 1em;
        border-bottom: 1px solid #e4e6e8;
    }

    .mt-1 {
        clear: both;
        margin-top: 1em;
        border-top: 1px solid #e4e6e8;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .list-no-style {
        list-style: none;
        list-style-type: none;
    }

    .komen {
        margin: 0;
        padding-left: 20pt;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div id="question-header" class="p-15 mb-1">
        <h2>{{ $pertanyaan->judul }}</h2>
    </div>
    <div id="question-view">
        <div class="post-layout row p-10">
            <div class="votecell col-auto text-center" style="margin-left: 20px;">
                <a href=""><i class="fas fa-angle-up icon-7x"></i></a>
                <p class="voter">{{ $pertanyaan->upvote }}</p>
                <p>voter</p>
                <a href=""><i class="fas fa-angle-down icon-3x"></i></a>
            </div>
            <div class="postcell col">
                <div id="dummy">
                    <p>{{ $pertanyaan->pertanyaan }}</p>
                </div>
                <div class="tags m-b-20">
                    <span class="badge tag">javascript</span>
                    <span class="badge tag">laravel</span>
                </div>
                <ul class="list-no-style p-0 mt-1">
                    @foreach ($pertanyaan->komentar as $data)
                        <li class="mb-1 komen" id="komen">
                            <p>{{ $data->komentar }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <a data-toggle="collapse" href="#collapseKomentar" role="button" aria-expanded="false"
            aria-controls="collapseKomentar">add comment</a>
        <div class="collapse" id="collapseKomentar">
            <form action="{{ route('comment.create')}}" method="post" class="" enctype="multipart/form-data">
                {{ csrf_field()}}
                <input type="hidden" name="id" value="{{ $pertanyaan->id_pertanyaan }}">
                <input type="hidden" name="flag" value="1">
                <div class="form-group">
                    <textarea class="form-control inp" name="komentarmu" id='article-ckeditor' cols="" rows="3"
                        placeholder="komentarmu" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Kirim" class="btn btn-md btn-primary">
                </div>
            </form>
        </div>
    </div>
    <div id="answer-header" class="p-15 mb-1">
        <h5>{{ count($jawaban) }} Answers</h5>
    </div>
    @foreach ($jawaban as $data)
    <div id="answer-view">
            <div class="post-layout row p-10">
                <div class="votecell col-auto text-center" style="margin-left: 20px;">
                    <i class="fas fa-angle-up icon-7x"></i>
                    <p class="voter">{{$data->upvote}}</p>
                    <p>voter</p>
                    <i class="fas fa-angle-down icon-3x"></i>
                </div>
                <div class="postcell col">
                    <div id="data">
                        {{$data->body}}
                    </div>
                    <div class="tags m-b-20">
                        <span class="badge tag">javascript</span>
                        <span class="badge tag">laravel</span>
                    </div>
                    <ul class="list-no-style p-0 mt-1">
                        @foreach ($data->komentar as $item)
                            <li class="mb-1 komen" id="komen2">
                                <p>{{ $item->komentar }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a data-toggle="collapse" href="#collapseKomentar" role="button" aria-expanded="false"
                aria-controls="collapseKomentar">add comment</a>
            <div class="collapse" id="collapseKomentar">
                <form action="{{ route('comment.create')}}" method="post" class="" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <input type="hidden" name="id" value="{{ $data->id_jawaban }}">
                    <input type="hidden" name="flag" value="2">
                    <div class="form-group">
                        <textarea class="form-control inp" name="komentarmu" id='article-ckeditor' cols="" rows="3"
                            placeholder="komentarmu" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kirim" class="btn btn-md btn-primary">
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</div>
<form action="{{ route('answer.store')}}" method="post" class="" enctype="multipart/form-data">
    {{ csrf_field()}}
    <div class="form-group has-feedback">
        <input type="hidden" name="id_pertanyaan" value="{{ $pertanyaan->id_pertanyaan }}">
        <label for="" class="tex" style="font-size: 20px;">Jawaban</label>
        <textarea class="form-control inp" name="jawaban" id='article-ckeditor' cols="" rows="5"
            placeholder="jawaban" required></textarea>

    </div>
    <div class="form-group">
        <input type="submit" value="Kirim" class="btn btn-md btn-primary">
    </div>
</form>
<script src="{{ asset('js/marked.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
@endsection