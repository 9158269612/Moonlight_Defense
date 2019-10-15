<!doctype html>
<html>
	<head>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">	</script>
		
		
	</head>
	<body>
		<center>
			<p>Suggestions: <span id="txtHint"></span></p> 

			Search: <input type="text" id="txt1" onkeyup="showHint(this.value)"></p>

	<script>
		function showHint(str) 
		{
			var xhttp;
			if (str.length == 0)
			{ 
					document.getElementById("txtHint").innerHTML = "";
					return;
			}
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() 
			{
				
				if (this.readyState == 4 && this.status == 200)
				{
					document.getElementById("txtHint").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "msg.php?q="+str, true);
			xhttp.send();   
		}
    </script>

</body>
</html>

