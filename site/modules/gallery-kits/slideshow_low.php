<html> 
<head>
  <title>Slide Show for album :: Prelude</title>
  <link rel="stylesheet" type="text/css" href="http://www.aresspeed.com.au/modules/gallery-kits/css/embedded_style.css.default">
<link rel="stylesheet" type="text/css" href="http://www.aresspeed.com.au/modules/gallery-kits/css/standalone_style.css">  <style type="text/css">
  </style>
</head>

<body>


<script language="JavaScript">
var timer; 
var current_location = 1;
var next_location = 1; 
var pics_loaded = 0;
var onoff = 0;
var timeout_value;
var images = new Array;
var photo_urls = new Array;
var photo_captions = new Array;
var loop = 0;
var full = 0;
var direction = 1;
photo_urls[1] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aaa.jpg";
photo_captions[1] = "92 prelude";
photo_urls[2] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aab.jpg";
photo_captions[2] = "98 prelude mugen rear";
photo_urls[3] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aac.jpg";
photo_captions[3] = "98 prelude mugen";
photo_urls[4] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aad.sized.jpg";
photo_captions[4] = "98prelude-int-wing";
photo_urls[5] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aae.sized.jpg";
photo_captions[5] = "98prelude-int-wing2";
photo_urls[6] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aaf.jpg";
photo_captions[6] = "PRELU97A";
photo_urls[7] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aag.jpg";
photo_captions[7] = "PRELU97D";
photo_urls[8] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aah.jpg";
photo_captions[8] = "PRELU97E";
photo_urls[9] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aai.jpg";
photo_captions[9] = "PRELU97G";
photo_urls[10] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aaj.sized.jpg";
photo_captions[10] = "PRELUDE-VS-F";
photo_urls[11] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aak.sized.jpg";
photo_captions[11] = "PRELUDE-VS-R";
photo_urls[12] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aal.jpg";
photo_captions[12] = "PRELUDE98-vs-f";
photo_urls[13] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aam.jpg";
photo_captions[13] = "PRELUDE98-vs-r";
photo_urls[14] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aan.sized.jpg";
photo_captions[14] = "kinetik kit fibremotive";
photo_urls[15] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aao.jpg";
photo_captions[15] = "prelude 92 rear wing 4 legs";
photo_urls[16] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aap.jpg";
photo_captions[16] = "prelude mugen kit fs";
photo_urls[17] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aaq.jpg";
photo_captions[17] = "prelude mugen rs";
photo_urls[18] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aar.jpg";
photo_captions[18] = "prelude mugen ss";
photo_urls[19] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aas.jpg";
photo_captions[19] = "prelude rw 92";
photo_urls[20] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aat.jpg";
photo_captions[20] = "prelude-gtr-w";
photo_urls[21] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aau.jpg";
photo_captions[21] = "prelude94R-w";
photo_urls[22] = "http://www.aresspeed.com.au/modules/gallery-kits/albums/album12/aav.jpg";
photo_captions[22] = "prelude98-bonnet";
var photo_count = 22; 

function stop() {
    onoff = 0;
    status = "The slide show is stopped, Click [play] to resume.";
    clearTimeout(timer);
}

function play() {
    onoff = 1;
    status = "Slide show is running...";
    go_to_next_photo();
}

function toggleLoop() {
    if (loop) {
        loop = 0;
    } else {
        loop = 1;
    }
}

function preload_complete() {
}

function reset_timer() {
    clearTimeout(timer);
    if (onoff) {
	timeout_value = document.TopForm.time.options[document.TopForm.time.selectedIndex].value * 1000;
	timer = setTimeout('go_to_next_page()', timeout_value);
    }
}

function wait_for_current_photo() {

    /* Show the current photo */
    if (!show_current_photo()) {

	/*
	 * The current photo isn't loaded yet.  Set a short timer just to wait
	 * until the current photo is loaded.
	 */
	status = "Picture is loading...(" + current_location + " of " + photo_count +
		").  Please Wait..." ;
	clearTimeout(timer);
	timer = setTimeout('wait_for_current_photo()', 500);
	return 0;
    } else {
	preload_next_photo();
	reset_timer();
    }
}

function go_to_next_page() {

    var slideShowUrl = "http://www.aresspeed.com.au/modules/gallery-kits/slideshow_low.php?set_albumName=album12";

    document.location = slideShowUrl + "&slide_index=" + next_location + "&slide_full=" + full
	+ "&slide_loop=" + loop + "&slide_pause=" + (timeout_value / 1000) 
	+ "&slide_dir=" + direction;
    return 0;
}

function go_to_next_photo() {
    /* Go to the next location */
    current_location = next_location;

    /* Show the current photo */
    if (!show_current_photo()) {
	wait_for_current_photo();
	return 0;
    }

    preload_next_photo();
    reset_timer();

}

function preload_next_photo() {
    
    /* Calculate the new next location */
    next_location = (parseInt(current_location) + parseInt(direction));
    if (next_location > photo_count) {
	next_location = 1;
	if (!loop) {
	    stop();
	}
    }
    
    /* Preload the next photo */
    preload_photo(next_location);
}

function show_current_photo() {

    /*
     * If the current photo is not completely loaded don't display it.
     */
    if (!images[current_location] || !images[current_location].complete) {
	preload_photo(current_location);
	return 0;
    }
    
    return 1;
}

function preload_photo(index) {

    /* Load the next picture */
    if (pics_loaded < photo_count) {

	/* not all the pics are loaded.  Is the next one loaded? */
	if (!images[index]) {
	    images[index] = new Image;
	    images[index].onLoad = preload_complete();
	    images[index].src = photo_urls[index];
	    pics_loaded++;
	}
    } 
}

</Script>




<table width=100% border=0>
  <tr>
    <td>
      <span class="head">
        Prelude      </span>
    </td>
  </tr>
  <tr>
    <td  align="center" valign="top">

<form name="TopForm">


<table width="" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td colspan="3" bgcolor="black"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
  <tr> 
    <td bgcolor="black" width="1" height="18"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
    <td align="right" width="3000" height="18">
      <span class="bread">
&nbsp;Gallery: <a href="http://www.aresspeed.com.au/modules/gallery-kits/albums.php">Bodykits Gallery</a>&nbsp<img src="http://www.aresspeed.com.au/modules/gallery-kits/images/nav_home.gif" width=13 height=11>&nbsp;Album: <a href="http://www.aresspeed.com.au/modules/gallery-kits/view_album.php?set_albumName=album04">Honda</a>&nbsp<img src="http://www.aresspeed.com.au/modules/gallery-kits/images/nav_home.gif" width=13 height=11>&nbsp;Album: <a href="http://www.aresspeed.com.au/modules/gallery-kits/view_album.php?set_albumName=album12">Prelude</a>&nbsp      <img src="http://www.aresspeed.com.au/modules/gallery-kits/images/nav_home.gif" width="13" height="11">&nbsp;
      </span>
    </td> 
                
    <td bgcolor="black" width="1" height="18"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
</table>    

<table width="" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td colspan="4" bgcolor="black"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
  <tr> 
    <td bgcolor="black" width="1" height="18"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
    <td align="left" valign="middle" width="3000" height="18">&nbsp;Slide Show</td>
    <td align="right" valign="middle" width="3000" height="18">&nbsp;&nbsp;</td>
    <td bgcolor="black" width="1" height="18"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
</table>    

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" bgcolor="black"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td height="25" width="1" bgcolor="black"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
    <td width="5000" align="left" valign="middle">
    <span class=admin>
    &nbsp;<a href="#" onClick='stop(); return false;'>[stop]</a>
    <a href="#" onClick='play(); return false;'>[play]</a>
<a href="http://www.aresspeed.com.au/modules/gallery-kits/slideshow_low.php?set_albumName=&slide_index=1&slide_loop=0&slide_pause=3&slide_full=1&slide_dir=1">[full size]</a>&nbsp;<a href="http://www.aresspeed.com.au/modules/gallery-kits/slideshow_low.php?set_albumName=&slide_index=1&slide_loop=0&slide_pause=3&slide_full=0&slide_dir=-1">[reverse direction]</a>    &nbsp;&nbsp;||
    &nbsp;Delay:
<select name="time" size=1  onchange="reset_timer()" style="font-size=10px;">
<option value=1 > 1 second
<option value=2 > 2 second
<option value=3 selected> 3 second
<option value=4 > 4 second
<option value=5 > 5 second
<option value=10 > 10 second
<option value=15 > 15 second
<option value=30 > 30 second
<option value=45 > 45 second
<option value=60 > 60 second
</select>
    &nbsp;Loop:<input type="checkbox" name="loopCheck"  onclick='toggleLoop();'>
    </span>
    </td>
    <td width="1" bgcolor="black"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="black"><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
</table>

<br>
<div align="center">


<table width=1% border=0 cellspacing=0 cellpadding=0>
  <tr bgcolor="black">
    <td colspan=3 height=1><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td bgcolor="black" width=1><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
    <script language="JavaScript">
    document.write("<td><img border=0 src="+photo_urls[1]+" name=slide></td>");
    </script>
    <td bgcolor="black" width=1><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
  <tr bgcolor="black">
    <td colspan=3 height=1><img src="http://www.aresspeed.com.au/modules/gallery-kits/images/pixel_trans.gif" width="1" height="1"></td>
  </tr>
</table>
<br>

<script language="Javascript">
/* show the caption either in a nice div or an ugly form textarea */
document.write("<div class='desc'>" + "[" + current_location + " of " + photo_count + "] " + photo_captions[1] + "</div>");

/* Load the first picture */
preload_photo(1);

/* Start the show. */
play();

</script>

 

</div>
</form>



    </td>
  </tr>
  <tr>
    <td>
    <!-- The Gallery code version number, linked to the Gallery home page -->
    <span class="fineprint">
    Powered by <a href=http://gallery.sourceforge.net>Gallery v1.3.2</a>
    </span>
    </td>
  </tr>
</table>


</body>
</html>
