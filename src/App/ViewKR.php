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
    }
    #create {
        display: flex;
        flex-direction: column;
        width: 70%;
    }
    #destination {
        margin: 1em;
        padding: 1em;
    }
    #source {
        margin: 1em;
        padding: 1em;
    }
    #result-url {
        margin: 1em;
        padding: 1em;
    }
    #btn-create {
        margin: 1em;
        padding: 1em;
    }
    #btn-copy {
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

  </style>
  <title id="title">단축 URL</title>
</head>
<body>
    <H1 id="H1">단축 URL</H1>
    <div id="create">
        <input id="destination" type="text" placeholder="Origin URL : https://www.nasa.gov/feature/additional-artemis-i-test-objectives-to-provide-added-confidence-in-capabilities-0">
        <input id="source" type="text" placeholder="Custom URL : nasa/article">
        <button id="btn-create">Create</button>
    </div>
    <div id="result">
        <input id="result-url" type="text">
        <button id="btn-copy">Copy</button>
    </div>
    <div id="notice">
        <article>
            <p>Notice!</p>
            <p>This application is free</p>
        </article>
        <article>
            <p>Notice!</p>
            <p>This application is free</p>
        </article>

    </div>
</body>
</html>

<script>

    let Domain = "http://localhost:8080"

    init()

    function init() {
        $('#result').hide()
    }

    $("#btn-create").on("click", ()=>{
        let source = $('#source').val()
        let destination = $('#destination').val()

        console.log(source)
        console.log(destination)

        createURL(source, destination)
  })

  $("#btn-copy").on("click", ()=>{
    $("#result-url").select();
    document.execCommand( 'Copy' );
    alert("Copy")
  })

  function validaterURL(source, destination) {
    console.log("validaterURL" + country)
    if (source == "") {
        alert("input Custom URL")
        return false
    }
    if (destination == "") {
        alert("input Origin URL")
        return false
    }
    return true
  }

  function createURL(source, destination) {
    if (!validaterURL(source, destination)) {
        return 1;
    }
    $.ajax({
        method: "POST",
        url: "/",
        data: { source: source, destination: destination }
    })
    .done(function( msg ) {
      alert(msg);
      let url = Domain + "/" + source
      $("#result-url").val(url)
      showResult()
    })
  }

  function showResult() {
    $("#create").hide()
    $('#result').show()
  }
</script>
