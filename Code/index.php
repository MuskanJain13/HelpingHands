<?php
	session_start();
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
		<style>
			<?php
				include('index_style.css');	
			?>
		</style>
   
    </head>
    <body>
       
		<?php
			include('header.php');
		?>
		
		
		
            <div id="starting">
				<label id="quoteopen">“</label><br>
				<div id="maintext">
					Covid-19 will reshape our world.<br>
					We don't yet know when the crisis will end.<br>
					But, we can be sure that if we unite with this initiative to make our world look very different.<br>
					So, here we are!<br>
				</div>
				<label id="quoteclose">”</label>
				<img id="img-starting" src="together-we-can-fight-corona-virus_188398-63.jpg">
            </div>
		
			<div id="circle1"></div>
            <div id="circle2"></div>
            <div id="circle3"></div>
            <div id="circle4"></div>
            
			<div id="second">
				<img id="sec-image" src="customer-shopping-online-during-covid-19-stay-home-avoid-spreading-coronavirus_40876-1715.jpg">
				<button id="sn1"><a style="color: black;" href="household.php">Shop safely</a></button>
				<div id="sec-text">
					Is Covid 19 stopping you for buying necessary products...?
					What are you waiting for...? Here we are with all the necessary household products and we'll deliver all the sanitized products with safety measures.
				</div>
			</div>
             
 			<div id="third">
				<img id="third-image" src="humanitarian-help-concept_23-2148509851.jpg">
				<button type="button" id="sn2"><a style="color: black;" href="serve.php">Serve for Humanity</a></button>
				<div id="third-text">
					"Giving is not just about make a donation,<br>
                    it's about making a difference...<br>
                    So, here on this plateform you can make a difference..."
				</div>
			</div>
		
		
			<div id="fourth">
				<img id="fourth-image" src="people-helping-earth-recover_23-2148504381.jpg">
				<button type="button" id="sn3"><a style="color: black;" href="ngo.php">Unite with Us</a></button>
				<div id="fourth-text">
					"But I can change the world of one person." "Service to others is the rent you pay for your room here on earth." "Never take more out of life, than you intend to give back." When it comes to charity; many people stop at nothing
                    "
				</div>
			</div>     
			
            
			<?php
				include('footer.php');
			?>
        
        <script>
			
			
		</script>
    </body>
</html>