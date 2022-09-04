<html>
	<head>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
	</head>
	<style>
		
		#footer_box{
			height: 120px;
			width: 1068px;
			border: 0px solid black;
			position: relative;
			background-color: rgba(0,0,0,0.8);
		}
		
		#footer{
			height: 120px;
			width: 1012px;
			margin-left: 57px;
			border: 0px solid black;
			position: absolute;
			background-color: rgba(0,0,0,0.6);
		}

		#f_colorbox{
			background-color: #E1D5DF;
			height: 35px;
			width: 960px;
			margin-top: 60px;
			margin-left: 26px;
			border: 0px solid black;
			position: absolute;
			color: black;
		}

		#f_topbox{
			background-color: white;
			height: 120px;
			width: 56px;
			border: 0px solid black;
			position: absolute;
			background-color: rgba(0,0,0,0.6);
		}

		#copyright{
			height: 20px;
			width: 140px;
			position: absolute;
			border: 0px solid black;
			margin-top: 8px;
			margin-left: 15px;
			font: 14px century gothic;
		}

		#privacy{
			margin-top: 8px;
			margin-left: 350px;
			position: absolute;
			font: 14px century gothic;
		}

		#terms{
			margin-top: 8px;
			margin-left: 500px;
			position: absolute;
			font: 14px century gothic;
		}

		#webname{
			margin-top: 8px;
			margin-left: 835px;
			position: absolute;
			border: 0px solid black;
			width: 120px;
			font: 14px century gothic;
		}

		#foll{
			position: absolute;
			height: auto;
			width: 100px;
			margin-top: 16px;
			margin-left: 30px;
			width: 1040px;
			border: 0px solid black;
		}

		#follow{
			position: absolute;
			margin-top: 4px;
			font: 14px century gothic;
			color: white;
		}

		#contactus{
			position: absolute;
			text-align: right;
			margin-top: 4px;
			margin-left: 442px;
			width: 350px;
			border: 0px solid black;
			font: 14px century gothic;
			color: white;
		}

		#textTOP{
			position: absolute;
			margin-left: 5px;
			margin-top: 23px;
			font: 25px Century Gothic;
			color: #E1D5Df;
			transform: rotate(-90deg);
		}
		
	</style>
	<body>
		<div id="footer_box">
			<div id="f_topbox" onclick="topFunction()" style="cursor: pointer;">
				<label style="cursor: pointer;" id="textTOP">TOP</label>
				<img src="top.png" style="height: 35px;width: 35px; margin-top: 74px; margin-left: 10px;">
			</div>

			<div id="footer">
				<div id="f_colorbox">
					<div id="copyright">
						<img src="copyright.png" style="height: 16px;width: 20px; float: left; padding-right: 5px; margin-top: 2px;">
						Copyright 2020
					</div>
					<label id="privacy">Privacy Policy</label>
					<label id="terms">Terms & Conditions</label>
					<label id="webname">HelpingHands</label>
				</div>
				<div id="foll">
					<label id="follow">Follow Us</label>
					<img src="facebook%20(1).png" style="height: 25px;width: 28px; float: none; padding-right: 5px; margin-left: 95px;">
					<img src="google-plus.png" style="height: 25px;width: 28px; float: none; padding-right: 5px; margin-left: 10px;">
					<label id="contactus">Contact Us at HelpingHands@gmail.com</label>
				</div>
			</div>
		</div>
		
		<script>
            //Get the button:
                mybutton = document.getElementById("top");
                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                  document.body.scrollTop = 0; // For Safari
                  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                }
        </script>
		
	</body>
</html>