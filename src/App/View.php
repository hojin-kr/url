<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: 'Roboto', sans-serif;
        background-color: #0F4C81;
    }
    #create {
        display: flex;
        flex-direction: column;
        width: 70%;
    }
    .input-type-1 {
        margin: 1em;
        padding: 1em;
    }
    .btn-type-1 {
        margin: 1em;
        padding: 1em;
    }
    #result {
        display: flex;
        flex-direction: column;
        width: 70%;
    }
    #notice {
        display: flex;
        flex-direction: row;
        width: 90%;
        justify-content:space-around;
        margin: 1em;
    }

    input {
        border: 0px;
        border-radius: 0.5em;
    }
    button {
        border: 0.1em solid aliceblue;
        border-radius: 0.5em;
        background-color: #FF6F61;
        color: aliceblue;
    }
    H1 {
        color: aliceblue;
    }
    label {
        color: aliceblue;
        margin-left: 1em;
    }

  </style>
  <title id="title" class="locale title"></title>
</head>
<body>
    <H1 id="h1" class="locale h1"></H1>
    <div id="create">
        <label for="detination" class="locale label-destination"></label>
        <input id="destination" class="locale destination input-type-1" type="text">
        <label for="source" class="locale label-source"></label>
        <input id="source" class="locale source input-type-1" type="text">
        <button id="btn-create" class="locale btn-create btn-type-1"></button>
    </div>
    <div id="result">
        <input id="result-url" class="input-type-1" type="text">
        <button id="btn-copy" class="locale btn-copy btn-type-1"></button>
        <button id="btn-copied" class="locale btn-copied btn-type-1"></button>
    </div>
    <div id="notice">
        <article>
            <p class="locale article-title-0"></p>
            <p class="locale article-desc-0"></p>
        </article>
        <article>
            <p class="locale article-title-1"></p>
            <p class="locale article-desc-1"></p>
        </article>

    </div>
</body>
</html>

<script>

    let Domain = "http://localhost:8080"

    init()

    function init() {
        $("#result").hide()
        $("#btn-copied").hide()
        getStaticText()
    }

    // short url create
    $("#btn-create").on("click", ()=>{
        let source = $('#source').val()
        let destination = $('#destination').val()

        createURL(source, destination)
  })

  // btn copy
  $("#btn-copy").on("click", ()=>{
    $("#result-url").select();
    document.execCommand( 'Copy' );
    $("#btn-copy").hide()
    $("#btn-copied").show()
  })

  $("#btn-copied").on("click", ()=>{
    $("#result-url").select();
    document.execCommand( 'Copy' );
  })

  // validater URL
  function validaterURL(source, destination) {
    if (source == "") {
        alert("ERROR : Custom URL")
        return false
    }
    if (destination == "") {
        alert("ERROR : Origin URL")
        return false
    }
    if (destination.substr(0, 7) == "http://") {
        alert("ERROR : Origin URL must start with https://")
        return false
    }
    return true
  }

  function createURL(source, destination) {
    if (!validaterURL(source, destination)) {
        return 1;
    }
    if (destination.substr(0, 8) != "https://") {
        destination = "https://" + destination
    }
    $.ajax({
        method: "POST",
        url: "/",
        data: { source: source, destination: destination }
    })
    .done(function( msg ) {
        if (msg == 500) {
            alert("Already used")
            return 1
        }
      $("#result-url").val(Domain + "/" + source)
      showResult()
    })
  }

  function showResult() {
    $("#create").hide()
    $('#result').show()
  }


  function getStaticText(countryCode = "US") {
    let locales = {
        "US":{
            "title":"URL Shortener",
            "h1":"URL Shortener",
            "destination":"https://www.nasa.gov/feature/additional-artemis-i-test-objectives-to-provide-added-confidence-in-capabilities-0",
            "source":"nasa",
            "btn-create":"Shorten",
            "btn-copy":"Copy",
            "btn-copied":"Copied",
            "article-title-0":"How to use",
            "article-desc-0":"",
            "article-title-1":"Title",
            "article-desc-1":"Desc",
            "label-destination":"Origin URL",
            "label-source":"Custom URL",
        },
        'KR':{
            "title":"단축 URL",
        },
    }
    $(".locale.title").text(locales[countryCode]["title"])
    $(".locale.h1").text(locales[countryCode]["h1"])
    $(".locale.destination").attr("placeholder",locales[countryCode]["destination"])
    $(".locale.source").attr("placeholder",locales[countryCode]["source"])
    $(".locale.btn-create").text(locales[countryCode]["btn-create"])
    $(".locale.btn-copy").text(locales[countryCode]["btn-copy"])
    $(".locale.btn-copied").text(locales[countryCode]["btn-copied"])
    $(".locale.label-destination").text(locales[countryCode]["label-destination"])
    $(".locale.label-source").text(locales[countryCode]["label-source"])
  }
</script>
