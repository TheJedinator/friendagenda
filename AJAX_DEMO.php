<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

<script>
function showText(str) {
    //work some AJAX magic here
    if (str.length> 0){
        $.get("Background.php?q=" + str,
            function(data) {
                document.getElementById("myText").innerHTML = data;
                //alert(data);
            }
        );
    }
    else {
        document.getElementById("myText").innerHTML = "";
    }
}
</script>
</head>
<body>

<p><b>Type something to search for:</b></p>
<form>
<input type="text" onkeyup="showText(this.value)">
</form>
<p>Suggestions: <span id="myText"></span></p>
</body>
</html>
