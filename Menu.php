<?php include "header.php"?>
<!doctype html>
<html><head>
<link rel="stylesheet" href="menu.css" type="text/css">
	<style>
		
		th,caption,td{
		 padding:10px;
		}
		table
		{
			margin:20px;
			border:1px solid #D92211;
			
		}
		caption
		{
				font-size:30px;
				color:#F2A71B;
		}
		th
		{
			font-size:20px;
			color:#F2A71B;
   		   border:1px solid #D92211;	
			
		}
				
		td
		{
			font-size:15px;
			color:#D92211;
	        border:1px solid #D92211;	

		}
		
		#table_div
		{
			height:50%;
			margin top:20px;
		}
		
		.JsonDiv
		{
		   margin-left:40px;
		   margin-top:10%;
		   margin-bottom:10px;
		   color:#D92211;
		   height:50%;
		}
		
	</style>
</head>
<body>

	<div class="shopping-cart">
  <!-- Title -->
  <div class="title">
    Menu
  </div>
 
  <!-- Product #1 -->
  <div class="item">
    <div class="buttons">
      <span class="delete-btn"></span>
      <span class="like-btn"></span>
    </div>
 
    <div class="image">
      <img src="https://assets.limetray.com/assets/user_images/menus/compressed/1570310331_Puribhaji.jpeg" height="80px" width="100px" alt=""/>
    </div>
 
    <div class="description">
      <span>Thali</span>
      <span>Special spicy</span>
      <span>White</span>
    </div>
 
    <div class="quantity">
      <button class="plus-btn" type="button" name="button">
        <img src="https://image.flaticon.com/icons/svg/149/149156.svg" alt="+" />
      </button>
      <input type="text" name="name" value="1">
      <button class="https://image.flaticon.com/icons/svg/149/149157.svg"" type="button" name="button">
        <img src="minus.svg" alt="-" />
      </button>
    </div>
 
    <div class="total-price">$100</div>
  </div>
 
  <!-- Product #2 -->
  <div class="item">
    <div class="buttons">
      <span class="delete-btn"></span>
      <span class="like-btn"></span>
    </div>
 
    <div class="image">
      <img src="https://assets.limetray.com/assets/user_images/menus/compressed/1569410213_sweetkachori.jpg" height="80px" width="100px" alt=""/>
    </div>
 
    <div class="description">
      <span>Panner Springroll</span>
      <span>so yummy</span>
      <span>White</span>
    </div>
 
    <div class="quantity">
      <button class="plus-btn" type="button" name="button">
        <img src="https://image.flaticon.com/icons/svg/149/149156.svg" alt="+" />
      </button>
      <input type="text" name="name" value="1">
      <button class="https://image.flaticon.com/icons/svg/149/149157.svg" type="button" name="button">
        <img src="minus.svg" alt="-" />
      </button>
    </div>
 
    <div class="total-price">$170</div>
  </div>
 
  <!-- Product #3 -->
  <div class="item">
    <div class="buttons">
      <span class="delete-btn"></span>
      <span class="like-btn"></span>
    </div>
 
    <div class="image">
      <img src="https://assets.limetray.com/assets/user_images/menus/compressed/1569410287_pavbhaji.jpg" height="80px" width="100px"  alt="" />
    </div>
 
    <div class="description">
      <span>Pav Bhaji</span>
      <span>Masala</span>
      <span>Brown</span>
    </div>
 
    <div class="quantity">
      <button class="plus-btn" type="button" name="button">
        <img src="https://image.flaticon.com/icons/svg/149/149156.svg" alt="+" />
      </button>
      <input type="text" name="name" value="1">
      <button class="minus-btn" type="button" name="button">
        <img src="https://image.flaticon.com/icons/svg/149/149157.svg" alt="-" />
      </button>
    </div>
 
    <div class="total-price">$256</div>
  </div>
</div>

<div id="table_div" >
	<center>
	<p style="color:">Suggestions: <span id="txtHint"></span></p> 

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
	
	 <table>
			<caption>Menu Table</caption>
			<tr>
				<th>Item</th>
				<th id="p">Price</th>
			</tr>
			<tr>
				<td>Panner Tikka Masala</td>
				<td>Rs.190</td>
			</tr>
			<tr>
				<td>Malai Kofta</td>
				<td>Rs.150</td>
			</tr>
			<tr>
				<td>Kolhapuri Biryani</td>
				<td>Rs. 210</td>
			</tr>
			<tr>
				<td>Vegetable Pulao</td>
				<td>Rs. 100</td>
			</tr>
			<tr>
				<td>Dal Khichadi</td>
				<td>Rs. 200</td>
			</tr>
		</table></center>
</div>
<div class="JsonDiv">
<center>
<h2>Json Data</h2>
<?php
    $weather="https://samples.openweathermap.org/data/2.5/weather?q=Mumbai,india&appid=b6907d289e10d714a6e88b30761fae22";
	
	$c=curl_init($weather);
	curl_setopt($c,CURLOPT_RETURNTRANSFER,TRUE);
	$j=curl_exec($c);
	$decode=json_decode($j,true);
	

	
	foreach($decode['main'] as $key => $value)
	{
		echo "<h4>".$key. ':' .$value; "</h4><br>";
	}
     
?>
</center>
<div>
</body>
</html>
<?php include 'footer.php' ?>
