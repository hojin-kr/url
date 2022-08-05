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
        width: 50%;
    }
    #destination {
        margin: 1em;
        padding: 1em;
    }
    #source {
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
        margin: 1em;
        padding: 1em;
    }
  </style>
  <title>URL Shortener</title>
</head>
<body>
    <H1>URL Shortener</H1>
    <div id="create">
        <input id="destination" type="text" placeholder="Origin URL : https://www.nasa.gov/feature/additional-artemis-i-test-objectives-to-provide-added-confidence-in-capabilities-0">
        <input id="source" type="text" placeholder="Custom URL : nasa/article">
        <button id="btn-create">Create</button>
    </div>


</body>
</html>

<script>

    let Domain = "http://localhost:8080"

    $("#btn-create").on("click", ()=>{
        let source = $('#source').val()
        let destination = $('#destination').val()

        console.log(source)
        console.log(destination)

        if (source == "") {
            alert("input Custom URL")
            return 0
        }
        if (destination == "") {
            alert("input Origin URL")
            return 0
        }

        // return 0;

        createURL(source, destination)
  })

  function createURL(source, destination) {
    $.ajax({
        method: "POST",
        url: "/",
        data: { source: source, destination: destination }
    })
    .done(function( msg ) {
      alert(msg);
      let url = Domain + "/" + source
      $('#create').html('\
        <input id="result" type="text" value="' + url + '"> \
        <button id="btn-copy">Copy</button> \
      ')
    })
  }
</script>
