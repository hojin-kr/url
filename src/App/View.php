<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8516954617838123"
     crossorigin="anonymous"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3LVP1LE67W"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-3LVP1LE67W');
    </script>
  <link rel=”shortcut icon” href=”static/favicon.ico”>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: 'Roboto', sans-serif;
        background-color: #F5F5F8;
    }
    #create {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    #result {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    #how {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-top: 3em;
    }
    #benefit {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    #article-title {
        margin-top: 3em;
    }
    #article {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .box {
        margin: 0.5em;
        align-items: center;
        border: 0em solid aliceblue;
        border-radius: 0.5em;
        background-color: #FFFFFF;
        box-shadow: 0.1em 0.1em 0.1em 0.1em #D3D3D3;
        display: flex;
        flex-direction: column;
        padding: 1em;
    }
    #notice {
        display: flex;
        flex-direction: row;
        width: 90%;
        justify-content:space-around;
        margin: 1em;
    }
    #h1 {
        margin-bottom: 0.5em;
    }
    #h2 {
        margin-top: 0px;
        font-size: medium;
    }

    #icon {
        border-radius: 0.5em;
        width: 5em;
        height: 5em;
        margin: 1em;
    }

    #source-warp {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .btn-full-large {
        border: 0em solid aliceblue;
        border-radius: 0.5em;
        background-color: #FFFFFF;
        box-shadow: 0.1em 0.1em 0.1em 0.1em #D3D3D3;
        padding: 1.5em;
        margin: 1em;
        font-weight: 600;
        color: #171D2E;
        font-size: medium;
    }

    .btn-inner {
        border: 0em solid aliceblue;
        border-radius: 0.5em;
        background-color: #FFFFFF;
        box-shadow: 0.1em 0.1em 0.1em 0.1em #D3D3D3;
        padding: 1.5em;
        margin: 0.3em 1em 1em 0em;
        font-weight: 600;
        color: #171D2E;
    }

    .input-warp {
        border: 0px;
        border-radius: 0.5em;
        padding: 1.5em;
        margin: 0.3em 1em 1em 1em;
        width: -webkit-fill-available;
    }

    .share-url {
        border: 0px;
        border-radius: 0.5em;
        box-shadow: 0.1em 0.1em 0.1em 0.1em #D3D3D3;
        padding: 1.5em;
        margin: 0.3em 1em 1em 1em;
    }

    button:hover {
        background-color: #171D2E;
        color: #FFFFFF;
    }
    label {
        font-size: medium;
        margin-left: 1em;
    }

  </style>
  <title id="title" class="locale title"></title>
</head>
<body>
    <img id="icon" src="https://storage.googleapis.com/url-358416.appspot.com/static/url-icon.png" alt="none img">
    <H3 id="h1" class="locale h1"></H3>
    <p id="h2" class="locale h2"></p>
    <br>
    <div id="create">
        <label for="detination" class="locale label-destination"></label>
        <input id="destination" class="locale destination input-warp" type="text">
        <label for="source" class="locale label-source"></label>
        <div id="source-warp">
            <input id="source" class="locale source input-warp" type="text">
            <button id="btn-random" class="locale btn-inner">🔁</button>
        </div>
        <label for="preview" class="locale label-preview"></label>
        <input id="preview" class="locale preview input-warp" type="text" disabled>
        <button id="btn-create" class="locale btn-create btn-full-large"></button>
    </div>
    <div id="result">
        <label for="result-url" class="locale label-result-url"></label>
        <input id="result-url" class="input-warp" type="text">
        <button id="btn-copy" class="locale btn-copy btn-full-large"></button>
        <button id="btn-copied" class="locale btn-copied btn-full-large"></button>
    </div>
    <H2 id="article-title" class="locale article-title"></H2>
    <div id="article">
    </div>
    <div id="article-more">
        <button id="btn-article-more" class="locale article-more btn-inner"></button>
    </div>
    <div id="how">
        <div class="box">
            <H3 class="locale how-title"></H3>
            <div>
                <p class="locale how-desc-0"></p>
                <p class="locale how-desc-1"></p>
                <p class="locale how-desc-2"></p>
                <p class="locale how-desc-3"></p>
            </div>
        </div>
    </div>
    <div id="benefit">
        <div class="box">
            <H3 class="locale benefit-title"></H3>
            <p class="locale benefit-desc-0"></p>
            <p class="locale benefit-desc-1"></p>
            <p class="locale benefit-desc-2"></p>
        </div>
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
    <footer>
        Mailbox jhj377@gmail.com
    </footer>
</body>
</html>

<script>

    let Domain = window.location.protocol + "//" + window.location.hostname

    let ContryCode = "KR"
    let now = new Date()
    let page = now.getFullYear() + "-" + (now.getMonth() + 1)

    let locales = {
        "US":{
            "title":"TL;DR",
            "h1":"TL; DR",
            "h2":"Too Long; Didn't Read",
            "destination":"https://www.nasa.gov/feature/additional-artemis-i-test-objectives-to-provide-added-confidence-in-capabilities-0",
            "source":"nasa",
            "btn-create":"Shorten 👏",
            "btn-copy":"to copy",
            "btn-copied":"Copied, paste wherever you want",
            "article-title-0":"How to use",
            "article-desc-0":"",
            "article-title-1":"Title",
            "article-desc-1":"Desc",
            "label-destination":"Too Long; Didn't Read.",
            "label-source":"Cool story, bro",
            "label-result-url":"generated link 🔗",
            "label-preview":"Preview 👀",
            "how-title":"How to use 🎉",
            "how-desc-0":"Step1. paste long link",
            "how-desc-1":"Step2. create custom links",
            "how-desc-2":"Step3. Preview 👀 & cut down 👏",
            "how-desc-3":"Step4. Share your link anywhere 🔗",
            "benefit-title":"Advantages",
            "benefit-desc-0":"random character 🙆🏻‍♂️ custom link 🙆‍♀️",
            "benefit-desc-1":"Totally free, service fee Zero 💸",
            "benefit-desc-2":"Unlimited Link Creation, Unlimited Traffic 📈",
            "article-title":"Daily News",
            "article-more":"More",
            "btn-share":"Share",
            "alert-link-check":"Watch your link",
            "already-use":"already used",
        },
        'KR':{
            "title":"TL;DR",
            "h1":"TL; DR",
            "h2":"Too Long; Didn't Read",
            "destination":"https://www.nasa.gov/feature/additional-artemis-i-test-objectives-to-provide-added-confidence-in-capabilities-0",
            "source":"nasa",
            "btn-create":"줄이기 👏",
            "btn-copy":"복사하기",
            "btn-copied":"복사됨, 원하는곳에 붙여 넣으세요",
            "article-title-0":"How to use",
            "article-desc-0":"",
            "article-title-1":"Title",
            "article-desc-1":"Desc",
            "label-destination":"줄일 링크",
            "label-source":"커스텀 링크",
            "label-result-url":"생성된 링크 🔗",
            "label-preview":"링크 미리보기 👀",
            "how-title":"이용 방법 🎉",
            "how-desc-0":"Step1. 긴 링크를 붙여넣기",
            "how-desc-1":"Step2. 커스텀 링크를 작성",
            "how-desc-2":"Step3. 미리보기 👀 & 줄이기 👏",
            "how-desc-3":"Step4. 링크를 어디든 공유하세요 🔗",
            "benefit-title":"장점",
            "benefit-desc-0":"랜덤 문자 🙆🏻‍♂️ 커스텀 링크 🙆‍♀️",
            "benefit-desc-1":"완전 무료, 서비스 이용료 Zero 💸",
            "benefit-desc-2":"제한 없는 링크 생성, 무제한 트래픽 📈",
            "article-title":"매일 뉴스",
            "article-more":"더 보기",
            "btn-share":"공유하기",
            "alert-link-check":"링크를 확인해주세요",
            "already-use":"이미 사용중인 링크",
        },
    }


    init()

    function init() {
        $("#result").hide()
        $("#btn-copied").hide()
        locale()
        getArticle(page)
    }

    function locale() {
        getStaticText(ContryCode)
        $.ajax({
        method: "GET",
        url: "https://api.ip.pe.kr/json",
        })
        .done(function( msg ) {
            if (msg.country_code != undefined && msg.country_code == "US") {
                ContryCode = "US"
                getStaticText(ContryCode)
            }
        })
    }

    function getArticle(page) {
        $.ajax({
        method: "GET",
        url: Domain + "/article/" + page,
        })
        .done(function( msg ) {
            let articles = JSON.parse(msg).articles
            for (const [key, value] of Object.entries(articles)) {
                if (ContryCode != value.contry_code) {
                    continue
                }
                $("#article").append('\
                    <div class="box">\
                        <a href="'+ value.url +'"><H3>'+ value.title +'</H3></a>\
                        <div>\
                            <p>'+ value.content +'</p>\
                        </div>\
                        <div>\
                            <input class="share-url" type="text" value='+value.shorten+'>\
                            <button class="locale btn-share btn-inner"></button>\
                        </div>\
                    </div>\
                ')
            }
            getStaticText(ContryCode)
        })
    }

    $("#btn-article-more").on("click",()=>{
        getArticle(page)
    })

    // short url create
    $("#btn-create").on("click", ()=>{
        let source = $('#source').val()
        let destination = $('#destination').val()

        createURL(source, destination)
  })

  $(document).on("click", ".btn-share", (event)=>{
    $(event.target).prev().select();
    document.execCommand( 'Copy' );
    alert(locales[ContryCode]["btn-copied"])
  });

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

  $("#source").on("keyup", ()=>{
    $("#preview").val(Domain+"/"+$("#source").val())
  })

  $("#btn-random").on("click", ()=>{
    setRandString()
  })

  function setRandString() {
    $("#source").val(generateRandomString(5))
    $("#preview").val(Domain+"/"+$("#source").val())
  }

  // validater URL
  function validaterURL(source, destination) {
    if (destination == "") {
        alert(locales[ContryCode]["alert-link-check"])
        return false
    }
    if (source == "") {
        setRandString()
    }
    return true
  }

  function createURL(source, destination) {
    if (!validaterURL(source, destination)) {
        return 1;
    }
    // force https
    destination = destination.replace(/http:\/\//g, "https://")
    // attach https
    if (destination.substr(0, 8) != "https://") {
        destination = "https://" + destination
    }
    // escape space
    source = source.replace(/ /g, "%20")
    $.ajax({
        method: "POST",
        url: "/",
        data: { source: source, destination: destination }
    })
    .done(function( msg ) {
        if (msg == 500) {
            alert(locales[ContryCode]["already-use"])
            return 1
        }
        // build result URL
        resultURL = Domain+"/"+source
        // replace space escape
        resultURL = resultURL.replace(/\%20/g, " ")
        $("#result-url").val(resultURL)
        showResult()
    })
  }

  function showResult() {
    $("#create").hide()
    $("#preview").hide()
    $("#result").show()
  }

  const generateRandomString = (num) => {
  const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890_-';
  let result = '';
  const charactersLength = characters.length;
  for (let i = 0; i < num; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }

  return result;
}



  function getStaticText(countryCode = "KR") {
    $(".locale.title").text(locales[countryCode]["title"])
    $(".locale.h1").text(locales[countryCode]["h1"])
    $(".locale.h2").text(locales[countryCode]["h2"])
    $(".locale.destination").attr("placeholder",locales[countryCode]["destination"])
    $(".locale.source").attr("placeholder",locales[countryCode]["source"])
    $(".locale.btn-create").text(locales[countryCode]["btn-create"])
    $(".locale.btn-copy").text(locales[countryCode]["btn-copy"])
    $(".locale.btn-copied").text(locales[countryCode]["btn-copied"])
    $(".locale.label-destination").text(locales[countryCode]["label-destination"])
    $(".locale.label-source").text(locales[countryCode]["label-source"])
    $(".locale.label-result-url").text(locales[countryCode]["label-result-url"])
    $(".locale.label-preview").text(locales[countryCode]["label-preview"])
    $("#preview").val(Domain+"/"+locales[countryCode]["source"])
    $(".locale.how-title").text(locales[countryCode]["how-title"])
    $(".locale.how-desc-0").text(locales[countryCode]["how-desc-0"])
    $(".locale.how-desc-1").text(locales[countryCode]["how-desc-1"])
    $(".locale.how-desc-2").text(locales[countryCode]["how-desc-2"])
    $(".locale.how-desc-3").text(locales[countryCode]["how-desc-3"])
    $(".locale.benefit-title").text(locales[countryCode]["benefit-title"])
    $(".locale.benefit-desc-0").text(locales[countryCode]["benefit-desc-0"])
    $(".locale.benefit-desc-1").text(locales[countryCode]["benefit-desc-1"])
    $(".locale.benefit-desc-2").text(locales[countryCode]["benefit-desc-2"])
    $(".locale.article-title").text(locales[countryCode]["article-title"])
    $(".locale.article-more").text(locales[countryCode]["article-more"])
    $(".locale.btn-share").text(locales[countryCode]["btn-share"])

  }
</script>
