<!DOCTYPE html>
<html>
<head>
<style>
#box
{
    width:350px;
    height:270px;
    margin:0px auto;
    border:2px solid black;
}
h2{
    text-align: center;
}
table{
    margin:0px auto;
}
</style>
</head>

<body>

    <form action="converter.php" method="post">
    	<h2>Currency Converter</h2>
    	<table>
    		<tr>
    			<td>
    				Enter Amount:<input type="text" name="amount"><br>
   				</td>
    		</tr>
    		<tr>
    			<td>
    				<br>
    				<p>Conversion type:</p>
    				<select name='cur'>
    					<option value="EUR">US Dollar to Euro(EUR)</option>
    					<option value="USD">Euro to US Dollar(USD)</option>
    				</select>
    			</td>
    		</tr>
    		<tr>
    			<td><br>
    				<input type='submit' name='submit' value="ConvertNow">
    			</td>
    		</tr>
    	</table>
    </form>
<?php
//inspired from https://blog.eduonix.com/web-programming-tutorials/learn-create-currency-converter-using-php/
//many changes to html and php made, added a php function

function convert($amount,$cur){
    
    
    if($cur=="EUR"){
        echo "<center><b> $amount US Dollars converts to:</b><br></center>";
        echo "<center>" . $amount*0.92083999023 . "EUR</center>";
    }
    
    if($cur=="USD"){
        echo "<center><b>$amount Euro converts to:</b><br></center>";
        echo "<center>" . $amount*1.085965 . "USD</center>";
    }        
}

//function called on submit

if(isset($_POST['submit'])){
    $amount = $_POST['amount'];
    $cur = $_POST['cur'];
    convert($amount, $cur);
    return;
}
?>
 
</body>
</html>