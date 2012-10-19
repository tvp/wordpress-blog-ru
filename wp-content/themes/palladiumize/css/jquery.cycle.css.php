


/* = jquery.slideshow.css
--------------------------------------------------- */


/* = Featured Content
--------------------------------------------------- */

div#featured {
	width: 928px;
	border: 1px solid #d3d3d3;
	background: transparent url('../images/bg-featured.png') left top repeat;
	margin: 0 auto 30px auto;
	padding: 15px;
	overflow: hidden;
}
div#featured h2 {
	display: none;
}


/* = Slide Show
--------------------------------------------------- */

div#slideshow {
	overflow: hidden;
	height: 272px;
}
div#slideshow .item {
	width: 928px;
	height: 272px;
}
div#slideshow .item .image {
	display: block;
	float: left;
	padding: 0;
}
div#slideshow .item .image a {
	display: block;
	margin: 0;
	padding: 0;
}
div#slideshow .item .image a img {
	border: 1px solid #d3d3d3;
	background: #fff none;
	padding: 4px;
	margin: 0;
}
div#slideshow .item .meta  {
	width: 350px;
	float: right;
	color: #666;
}
div#slideshow h3 {
	display: block;
	border-top: 4px solid #cecece;
	border-bottom: 1px solid #cecece;
	padding: 6px 0;
	margin: 0;
	font: normal 24px/38px Georgia, serif;
}
div#slideshow h3 a:link,
div#slideshow h3 a:visited {
	color: #000;
	text-decoration: none;
}
div#slideshow h3 a:hover,
div#slideshow h3 a:active {
	text-decoration: underline;
}

div#slideshow p {
	display: block;
	padding: 0;
	margin: 0;
	font: normal 14px/28px Georgia, serif;
}
div#slideshow p.info {
	font: normal 10px/14px 'Lucida Grande', 'Lucida Sans', serif;
	margin: 0;
	padding: 8px 0;
}
div#slideshow p.info a {
	color: #000;
	text-decoration: none;
}
div#slideshow p.info .author {
	font-weight: bold;
	text-transform: uppercase;
	color: #000;
}
div#slideshow p.info a:hover,
div#slideshow p.info .author a:hover {
	text-decoration: none;
	border-bottom: 1px solid #000;
}

div#slideshow p.read-more {
	padding: 0;
	margin: 7px 0 0 0;
}
div#slideshow p.read-more a {
	background: transparent url('../images/button-read-more.png') left top no-repeat;
	display: block;
	width: 140px;
	height: 31px;
	color: #fff;
	text-align: center;
	font: normal 11px/31px 'Lucida Grande', 'Lucida Sans', sans-serif;
	letter-spacing: 3px;
	text-decoration: none;
	text-transform: uppercase;
}
div#slideshow p.read-more a:hover {
	text-decoration: underline;
}