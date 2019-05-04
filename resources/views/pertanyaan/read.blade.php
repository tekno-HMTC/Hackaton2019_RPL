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
        <h2>{{ $pertanyaan->title }}</h2>
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
                    <p>{{ $pertanyaan->body }}</p>
                </div>
                <div class="tags m-b-20">
                    <span class="badge tag">javascript</span>
                    <span class="badge tag">laravel</span>
                </div>
                <ul class="list-no-style p-0 mt-1">
                    <li class="mb-1 komen" id="komen"></li>
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
        <h5>1 Answer</h5>
    </div>
    <div id="answer-view">
        <div class="post-layout row p-10">
            <div class="votecell col-auto text-center" style="margin-left: 20px;">
                <i class="fas fa-angle-up icon-7x"></i>
                <p class="voter">0</p>
                <p>voter</p>
                <i class="fas fa-angle-down icon-3x"></i>
            </div>
            <div class="postcell col">
                <div id="dummy2"></div>
                <div class="tags m-b-20">
                    <span class="badge tag">javascript</span>
                    <span class="badge tag">laravel</span>
                </div>
                <ul class="list-no-style p-0 mt-1">
                    <li class="mb-1 komen" id="komen2"></li>
                </ul>
            </div>
        </div>
        
    </div>
</div>
<script src="{{ asset('js/marked.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
    var content = marked(
        '`conio.h` questions usually ask about `getch`, which corresponds roughly to the upper-level (curses) `getch`. However most of `conio.h` is lower-level, like this, and would be done using terminfo, e.g.\n\n[link](/home), tigetstr, tparm, tputs, using "civis" (cursor-invisible).\n\nand "cup" (cursor-position). Those functions are defined via <term.h>. Likely the program uses other features (and there are no useful tutorials on porting from conio.h to curses). In curses, the mentioned features would be curs_set and move. Further reading (terminfo): curses interfaces to terminfo database terminfo - terminal capability data base.'
    );
    // document.getElementById('dummy').innerHTML = content;
    document.getElementById('dummy2').innerHTML = content;

    var komen = marked('[What is the problem ?](/home)');
    // document.getElementById('komen').innerHTML = komen;
    document.getElementById('komen2').innerHTML = komen;
</script>
@endsection