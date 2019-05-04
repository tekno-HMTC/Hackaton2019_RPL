<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        a {
            color: #005999;
        }

        code, pre {
            background-color: #eff0f1;
        }

        a:hover {
            color: #07C;
        }
        pre{
            white-space: pre-line;
        }
    </style>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
</head>

<body>
    <a href=""><code>this is code</code>
    </a>
    <br>
    <code>&lt;?php&gt;</code>
    <br>
    <div id="content"></div>
    <pre>
        <code id="code1">
        </code>
    </pre>
    <form name="form-komen" method="POST" action="{{ route('comment.create')}}">
        @csrf
        <div class="form-group">
            <label for="komen">comment</label>
            <textarea name="komentar" class="form-control" id="MyID" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary my-1" id="submit">Submit</button>
    </form>
</body>
<script src="{{ asset('js/marked.js') }}"></script>
<script>
var simplemde = new SimpleMDE({
	autofocus: true,
	blockStyles: {
		bold: "__",
		italic: "_"
	},
	element: document.getElementById("MyID"),
	forceSync: true,
	hideIcons: ["guide", "heading"],
	indentWithTabs: false,
	insertTexts: {
		horizontalRule: ["", "\n\n-----\n\n"],
		image: ["![](http://", ")"],
		link: ["[", "](http://)"],
		table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
	},
	lineWrapping: false,
	parsingConfig: {
		allowAtxHeaderWithoutSpace: true,
		strikethrough: false,
		underscoresBreakWords: true,
	},
	placeholder: "Type here...",
	previewRender: function(plainText) {
		return customMarkdownParser(plainText); // Returns HTML from a custom parser
	},
	previewRender: function(plainText, preview) { // Async method
		setTimeout(function(){
			preview.innerHTML = customMarkdownParser(plainText);
		}, 250);

		return "Loading...";
	},
	promptURLs: true,
	renderingConfig: {
		singleLineBreaks: false,
		codeSyntaxHighlighting: true,
	},
	shortcuts: {
		drawTable: "Cmd-Alt-T"
	},
	showIcons: ["code", "table"],
	spellChecker: false,
	status: false,
	status: ["autosave", "lines", "words", "cursor"], // Optional usage
	status: ["autosave", "lines", "words", "cursor", {
		className: "keystrokes",
		defaultValue: function(el) {
			this.keystrokes = 0;
			el.innerHTML = "0 Keystrokes";
		},
		onUpdate: function(el) {
			el.innerHTML = ++this.keystrokes + " Keystrokes";
		}
	}], // Another optional usage, with a custom status bar item that counts keystrokes
	styleSelectedText: false,
	tabSize: 4,
	toolbar: false,
	toolbarTips: false,
});
</script>
<script>
$( "code" ).text( "<b>Some</b>\nnew text.");
// $("button").click(alert(), function (e) { 
//     e.preventDefault();
// });
document.getElementById("submit").addEventListener("click", function(){
    // alert("hai");
    var val = document.getElementById("komen").value;
    console.log(val);
});
document.getElementById('content').innerHTML =
      marked('Marked in the browser\n\nRende .................................... Rende.................................... Rende.................................... Rende......................... .................................... Rende.................................... Rende.................................... Rende............................................................................. ......red by **marked**.\n[clear everything](/demo/?text=) with a. \n\n`simple click.`');

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>