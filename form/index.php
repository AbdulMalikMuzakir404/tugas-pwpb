<!-- Author By Abdul Malik Muzakir -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>INDEX</title>
</head>
<style type="text/css">
* {
	margin: 0;
	padding: 0;
	font-family: sans-serif;
	box-sizing: border-box;
}

body {
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	flex-direction: column;
	background: #0e1538;
}

a {
	position: relative;
	padding: 20px 60px;
	display: flex;
	justify-content: center;
	align-items: center;
	background: rgba(0,0,0,0.5);
	margin: 40px;
	text-decoration: none;
	transition: 1s;
	overflow: hidden;
	-webkit-box-reflect: belox 1px linear-gradient(transparent, transparent, #0004);
}

a:hover {
	background: var(--clr);
	box-shadow: 0 0 10px var(--clr),
	            0 0 30px var(--clr),
            	0 0 60px var(--clr),
	            0 0 100px var(--clr);
}

a::before {
	content: "";
	position: absolute;
	width: 40px;
	height: 400%;
	background: var(--clr);
	transition: 1s;
	animation: animate 2s linear infinite;
	animation-delay: calc(0.33s * var(--i));
}

a:hover::before {
	width: 120%;
}

@keyframes animate {
	0% {
		transform: rotate(0deg);
	}
	100% {
		transform: rotate(360deg);
	}
}

a::after {
	content: "";
	position: absolute;
	inset: 4px;
	background: #0e1358;
	transition: 0.5s;
}

a:hover::after {
	background: var(--clr);font-size: 2em;
}

a span {
	position: relative;
	z-index: 1;
	color: #fff;
	opacity: 0.5;
	text-transform: uppercase;
	letter-spacing: 4px;
	transition: 0.5;
}

a:hover span {
	opacity: 1;
}
</style>
<body>
	<a href="barang.php" style="--clr: #ff22bb;--i:0;"><span>Barang</span></a>
	<a href="buyer.php" style="--clr: #00ccff;--i:1;"><span>Buyer</span></a>
</body>
</html>