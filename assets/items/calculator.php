<!DOCTYPE html>
<html lang="en" >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Hind:wght@400;700&amp;display=swap'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=VT323&amp;display=swap'><link rel="stylesheet" href="./calculator.css">
<style>

    
.calc {
	background-color: var(--calcBg);
	background-image:
		linear-gradient(180deg,#0000,#0001),
		radial-gradient(0.25em 0.25em at 0.5em 0.25em,#fff7 25%,#fff0 50%),
		radial-gradient(95% 0.25em at 50% 0.25em,#fff7 25%,#fff0 50%);
	border-radius: 0.75em;
	box-shadow:
		0 0.5em 0.5em #fff4 inset,
		0 -0.125em 0.25em 0.125em #0007 inset,
		0 0.25em 0.75em #0007;
	padding: 0.25em 1em;
	position: relative;
	width: 12em;
	height: 19.5em;
}
.calc__btns {
	display: grid;
	grid-template-columns: repeat(4,1fr);
	grid-template-rows: repeat(6,1.5em);
	grid-gap: 0.5em 0.75em;
}
.calc__btn:focus, .calc__btn span:focus, .calc__screen:focus {
	outline: transparent;
}
.calc__btn, .calc__screen {
	-webkit-appearance: none;
	appearance: none;
}
.calc__btn, .calc__btn.calc__btn--primary, .calc__btn.calc__btn--secondary {
	color: #fff;
}
.calc__btn {
	background-color: #2e3138;
	background-image:
		linear-gradient(180deg,#0000,#0002),
		radial-gradient(90% 0.125em at 50% 0.125em,#fff7 25%,#fff0 50%);
	border: 0;
	border-radius: 0.25em;
	box-shadow:
		0.125em 0.125em 0.25em #0007,
		0 -0.05em 0 0.05em #0004,
		0 0.05em 0 0.05em #fff4,
		-0.125em 0 0.125em #22252a inset,
		0 0.125em 0.125em #fff4 inset,
		0.125em 0 0.125em #fff4 inset,
		0 -0.125em 0.125em #22252a inset;
	cursor: pointer;
	text-shadow: 0 0 0.125em #fff7;
	transition: box-shadow var(--transDur) var(--buttonTiming);
	-webkit-tap-highlight-color: #0000;
}
.calc__btn:active, .calc__btn.calc__btn--active {
	box-shadow:
		0 0 0 #0007,
		0 -0.05em 0 0.05em #0004,
		0 0.05em 0 0.05em #fff4,
		-0.125em 0 0.125em #0b0c0e inset,
		0 0.125em 0.125em #0004 inset,
		0.125em 0 0.125em #0004 inset,
		0 -0.125em 0.125em #0b0c0e inset;
}
.calc__btn:active span, .calc__btn.calc__btn--active span {
	transform: scale(0.95);
}
.calc__btn:focus {
	color: #86a6f9;
	text-shadow: 0 0 0.25em #86a6f977;
}
.calc__btn small, .calc__btn span {
	pointer-events: none;
}
.calc__btn span {
	display: block;
	transition: transform var(--transDur) var(--buttonTiming);
}
.calc__btn.calc__btn--primary {
	background-color: #255ff4;
	box-shadow:
		0.125em 0.125em 0.25em #0007,
		0 -0.05em 0 0.05em #0004,
		0 0.05em 0 0.05em #fff4,
		-0.125em 0 0.125em #0936aa inset,
		0 0.125em 0.125em #fff4 inset,
		0.125em 0 0.125em #fff4 inset,
		0 -0.125em 0.125em #0936aa inset;
}
.calc__btn.calc__btn--primary:active, .calc__btn.calc__btn--primary.calc__btn--active {
	box-shadow:
		0 0 0 #0007,
		0 -0.05em 0 0.05em #0004,
		0 0.05em 0 0.05em #fff4,
		-0.125em 0 0.125em #062779 inset,
		0 0.125em 0.125em #0004 inset,
		0.125em 0 0.125em #0004 inset,
		0 -0.125em 0.125em #062779 inset;
}
.calc__btn.calc__btn--secondary {
	background-color: #5c6270;
	box-shadow:
		0.125em 0.125em 0.25em #0007,
		0 -0.05em 0 0.05em #0004,
		0 0.05em 0 0.05em #fff4,
		-0.125em 0 0.125em #454954 inset,
		0 0.125em 0.125em #fff4 inset,
		0.125em 0 0.125em #fff4 inset,
		0 -0.125em 0.125em #454954 inset;
}
.calc__btn.calc__btn--secondary:active, .calc__btn.calc__btn--secondary.calc__btn--active {
	box-shadow:
		0 0 0 #0007,
		0 -0.05em 0 0.05em #0004,
		0 0.05em 0 0.05em #fff4,
		-0.125em 0 0.125em #2e3138 inset,
		0 0.125em 0.125em #0004 inset,
		0.125em 0 0.125em #0004 inset,
		0 -0.125em 0.125em #2e3138 inset;
}
.calc__btn--tall {
	grid-column: 4 / 5;
	grid-row: 5 / 7;
}
.calc__error, .calc__memory, .calc__screen {
	color: #17181c;
}
.calc__error, .calc__memory {
	font-weight: bold;
	position: absolute;
	left: 1.5em;
	text-shadow: 0.1em 0.1em 0.1em #0004;
}
.calc__error {
	top: 4.3em;
}
.calc__memory {
	top: 3.4em;
}
.calc__j {
	color: var(--logoBlue);
	text-shadow: 0 0 0.25em #255ff444;
}
.calc__logo {
	font-size: 2em;
	text-align: center;
	text-shadow: 0 0 0.25em #0004;
	height: 3rem;
}
.calc__screen {
	background-image: linear-gradient(180deg,#9aa38f,#8d9781);
	border-top: 0.25rem solid #abafba;
	border-right: 0.25rem solid #abafba;
	border-bottom: 0.25rem solid #fff;
	border-left: 0.25rem solid #c7cad1;
	border-radius: 0.25rem;
	box-shadow:
		0 0.25rem 0.25rem #0007 inset;
	display: block;
	font: 2em/1 "VT323", monospace;
	margin: 0 auto 1rem auto;
	padding: 0 0.25rem;
	text-align: right;
	text-shadow: 0.1rem 0.1rem 0.1rem #0004;
	text-transform: uppercase;
	width: 100%;
}
.calc__screen--fade-in {
	animation: valueBlink 0.05s linear;
}
/* Dark theme */
@media (prefers-color-scheme: dark) {
	:root {
		--bg: #454954;
		--fg: #e3e4e8;
		--calcBg: #17181c;
		--logoBlue: #5583f6;
	}
	.calc__btn {
		background-color: #e3e4e8;
		background-image:
			linear-gradient(180deg,#0000,#0002),
			radial-gradient(90% 0.125em at 50% 0.125em,#fff7 25%,#fff0 50%);
		box-shadow:
			0.125em 0.125em 0.25em #0007,
			0 -0.05em 0 0.05em #0004,
			0 0.05em 0 0.05em #fff1,
			-0.125em 0 0.125em #737a8c inset,
			0 0.125em 0.125em #fff4 inset,
			0.125em 0 0.125em #fff4 inset,
			0 -0.125em 0.125em #737a8c inset;
		color: #17181c;
		text-shadow: 0 0 0.125em #fff7;
	}
	.calc__btn:active, .calc__btn.calc__btn--active {
		box-shadow:
			0 0 0 #0007,
			0 -0.05em 0 0.05em #0004,
			0 0.05em 0 0.05em #fff1,
			-0.125em 0 0.125em #5c6270 inset,
			0 0.125em 0.125em #0004 inset,
			0.125em 0 0.125em #0004 inset,
			0 -0.125em 0.125em #5c6270 inset;
	}
	.calc__btn.calc__btn--primary {
		box-shadow:
			0.125em 0.125em 0.25em #0007,
			0 -0.05em 0 0.05em #0004,
			0 0.05em 0 0.05em #fff1,
			-0.125em 0 0.125em #0936aa inset,
			0 0.125em 0.125em #fff4 inset,
			0.125em 0 0.125em #fff4 inset,
			0 -0.125em 0.125em #0936aa inset;
	}
	.calc__btn.calc__btn--primary:active, .calc__btn.calc__btn--primary.calc__btn--active {
		box-shadow:
			0 0 0 #0007,
			0 -0.05em 0 0.05em #0004,
			0 0.05em 0 0.05em #fff1,
			-0.125em 0 0.125em #062779 inset,
			0 0.125em 0.125em #0004 inset,
			0.125em 0 0.125em #0004 inset,
			0 -0.125em 0.125em #062779 inset;
	}
	.calc__btn.calc__btn--secondary {
		box-shadow:
			0.125em 0.125em 0.25em #0007,
			0 -0.05em 0 0.05em #0004,
			0 0.05em 0 0.05em #fff1,
			-0.125em 0 0.125em #454954 inset,
			0 0.125em 0.125em #fff4 inset,
			0.125em 0 0.125em #fff4 inset,
			0 -0.125em 0.125em #454954 inset;
	}
	.calc__btn.calc__btn--secondary:active, .calc__btn.calc__btn--secondary.calc__btn--active {
		box-shadow:
			0 0 0 #0007,
			0 -0.05em 0 0.05em #0004,
			0 0.05em 0 0.05em #fff1,
			-0.125em 0 0.125em #2e3138 inset,
			0 0.125em 0.125em #0004 inset,
			0.125em 0 0.125em #0004 inset,
			0 -0.125em 0.125em #2e3138 inset;
	}
	.calc__logo {
		text-shadow: 0 0 0.25em #fff4;
	}
	.calc__screen {
		border-top: 0.25rem solid #2e3138;
		border-right: 0.25rem solid #2e3138;
		border-bottom: 0.25rem solid #454954;
		border-left: 0.25rem solid #454954;
	}
}
/* Animation */
@keyframes valueBlink {
	from {
		color: #17181c00;
		text-shadow: 0.1rem 0.1rem 0.1rem #0000;
	}
	to {
		color: #17181c;
		text-shadow: 0.1rem 0.1rem 0.1rem #0004;
	}
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<form class="calc">
	<div class="calc__logo">
		<span class="calc__j">RB</span>S
	</div>
	<div class="calc__memory"></div>
	<div class="calc__error"></div>
	<input class="calc__screen" type="text" name="output" maxlength="10" value="0" readonly>
	<div class="calc__btns">
		<button class="calc__btn calc__btn--secondary" type="button" data-fn="%" title="Percent" aria-label="Percent" ontouchstart="">
			<span tabindex="-1">%</span>
		</button>
		<button class="calc__btn calc__btn--secondary" type="button" data-fn="sqrt" title="Square Root" aria-label="Square Root" ontouchstart="">
			<span tabindex="-1"><small>&radic;</small></span>
		</button>
		<button class="calc__btn calc__btn--secondary" type="button" data-fn="+-" title="Negate Value" aria-label="Negate Value" ontouchstart="">
			<span tabindex="-1"><small>+/-</small></span>
		</button>
		<button class="calc__btn calc__btn--primary" type="button" data-fn="C" title="Clear" aria-label="Clear" ontouchstart="">
			<span tabindex="-1">C</span>
		</button>
		<button class="calc__btn calc__btn--secondary" type="button" data-fn="mrc" title="Recall/Clear Memory" aria-label="Recall/Clear Memory" ontouchstart="">
			<span tabindex="-1"><small>MRC</small></span>
		</button>
		<button class="calc__btn calc__btn--secondary" type="button" data-fn="m-" title="Subtract From Memory" aria-label="Subtract From Memory" ontouchstart="">
			<span tabindex="-1"><small>M-</small></span>
		</button>
		<button class="calc__btn calc__btn--secondary" type="button" data-fn="m+" title="Add To Memory" aria-label="Add To Memory" ontouchstart="">
			<span tabindex="-1"><small>M+</small></span>
		</button>
		<button class="calc__btn calc__btn--secondary" type="button" data-fn="/" title="Divided By" aria-label="Divided By" ontouchstart="">
			<span tabindex="-1">&divide;</span>
		</button>
		<button class="calc__btn" type="button" data-fn="7" ontouchstart="">
			<span tabindex="-1">7</span>
		</button>
		<button class="calc__btn" type="button" data-fn="8" ontouchstart="">
			<span tabindex="-1">8</span>
		</button>
		<button class="calc__btn" type="button" data-fn="9" ontouchstart="">
			<span tabindex="-1">9</span>
		</button>
		<button class="calc__btn calc__btn--secondary" type="button" data-fn="*" title="Times" aria-label="Times" ontouchstart="">
			<span tabindex="-1">&times;</span>
		</button>
		<button class="calc__btn" type="button" data-fn="4" ontouchstart="">
			<span tabindex="-1">4</span>
		</button>
		<button class="calc__btn" type="button" data-fn="5" ontouchstart="">
			<span tabindex="-1">5</span>
		</button>
		<button class="calc__btn" type="button" data-fn="6" ontouchstart="">
			<span tabindex="-1">6</span>
		</button>
		<button class="calc__btn calc__btn--secondary" type="button" data-fn="-" title="Minus" aria-label="Minus" ontouchstart="">
			<span tabindex="-1">-</span>
		</button>
		<button class="calc__btn" type="button" data-fn="1" ontouchstart="">
			<span tabindex="-1">1</span>
		</button>
		<button class="calc__btn" type="button" data-fn="2" ontouchstart="">
			<span tabindex="-1">2</span>
		</button>
		<button class="calc__btn" type="button" data-fn="3" ontouchstart="">
			<span tabindex="-1">3</span>
		</button>
		<button class="calc__btn calc__btn--secondary calc__btn--tall" type="button" data-fn="+" title="Plus" aria-label="Plus" ontouchstart="">
			<span tabindex="-1">+</span>
		</button>
		<button class="calc__btn" type="button" data-fn="0" ontouchstart="">
			<span tabindex="-1">0</span>
		</button>
		<button class="calc__btn" type="button" data-fn="." aria-label="Point" ontouchstart="">
			<span tabindex="-1">.</span>
		</button>
		<button class="calc__btn" type="button" data-fn="=" title="Equals" aria-label="Equals" ontouchstart="">
			<span tabindex="-1">=</span>
		</button>
	</div>
</form>
<!-- partial -->


  <script  src="https://satkamatkarb.online/user/assets/items/calculator.js"></script>

</body>
</html>
