
<head>
	<style>

		#myBtn {
			display: none;
			position: fixed;
			bottom: 25px;
			right: 50px;
			z-index: 99;
			font-size: 14px;
			border: none;
			outline: none;
			background-color: green;
			color: white;
			cursor: pointer;
			padding: 15px;
			border-radius: 4px;
		}

		#myBtn:hover {
			background-color: #555;
		}

	</style>
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>
<script>
	//Get the button
	var mybutton = document.getElementById("myBtn");
	var mylogo = document.getElementById("logo");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>

</body>
