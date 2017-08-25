<?
	include_once('includes/class/concerts.class.php');
	global $cncrts;
	$cncrts = new Concert();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<? require('includes/common_meta.php');	?>
    <meta name="description" content="Keystone Concert Band is an organization to foster, promote, and increase the musical knowledge and appreciation of the general public by operating and maintaining a concert band and by presenting performances of music.">

    <title>KCB Refresh</title>

	<? require('includes/common_css.php'); ?>
	
  </head>

  <body>
	<div id="fb-root"></div>
	<? require('includes/nav.php'); ?>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
	    <div class="active item">
	      <div class="fill" style="background-image:url('images/slide1.png');">
	        <div class="container">
	            <div class="carousel-caption">
	              <h1>We need you</h1>
	              <p>As a 501(c)3 organization, we rely on donations to continue performing</p>
	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Donate today</a></p>
	            </div>
	        </div>
	      </div>
	    </div>
        <div class="item">
	      <div class="fill" style="background-image:url('images/slide2.png');">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Play with us</h1>
	              <p>Been a few years since you picked up your instrument? Play once again</p>
	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Join Us</a></p>
	            </div>
	          </div>
          </div>
        </div>
        <div class="item">
	      <div class="fill" style="background-image:url('images/slide5.png');">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>We can play for you</h1>
	              <p>We can play your event, big or small. Just give us a call</p>
	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Book Us</a></p>
	            </div>
	          </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
    <?
			if (strtotime('3/17/2016') > time()) {
			    // older
			    echo('<div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button>
					  <h4>Band Members</h4>
					  <p>Practice until March 16 will be held at <a href="https://goo.gl/maps/xRdPC">Steelton-Highspire High School</a>. Please check the calendar for all appropriate dates.</p></div>');
			}
	?>
    <?
			if (strtotime('1/1/2016') > time()) {
			    // older
			    echo('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>
					  <h4>Please take note</h4>
					  <p>Due to weather, today\'s concert has been cancelled.</p></div>');
			}
	?>
    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="images/logo_concert.jpg" alt="Upcoming Concert Image" width="140" height="140">
          <h2>Upcoming Concert</h2>
          <p>
	          <?
				$concert = $cncrts->getCurrentConcert();
								
				if(!$concert) {
					echo "<h4>There are no upcoming concerts.</h4>Our concert series is done for the season. Please check back again in early Spring to see our new concert schedule!";
				}
				else {
					$location = "http://maps.googleapis.com/maps/api/staticmap?center=" . urlencode($concert['address']) ."&zoom=14&size=340x200&sensor=false&markers=color:red|" . urlencode($concert['address']);
					$today = date("Y-m-d");
					$begin = date('Y-m-d', strtotime($concert['concertBegin']));
				
					if ($today == $begin) {
						$begin = "Today";
					}
					else {
						$begin = date('D, M d', strtotime($concert['concertBegin']));
					}
	
					echo "<h4>" . $begin . " | " . date('g:iA', strtotime($concert['concertBegin'])) . " to " . date('g:iA', strtotime($concert['concertEnd'])) . "</h4>";			
					echo "<h4><a href='http://maps.google.com/maps?q=" . urlencode($concert['address']) . "' target='_blank' style='border-bottom:none;'>" . $concert['Title'] . "</a></h4>";
					echo "<img src='" .$location . "' alt='Google Maps location of the concert.' usemap='#map' id='map'>";
					echo "<map name='map'><area shape='circle' coords='250,80,15' href='http://maps.google.com/maps?q=" . urlencode($concert['address']) . "' target='_blank'></map>";
				}
			?>
          </p>
          <p><a class="btn btn-default" href="concerts.php" role="button">View more &raquo;</a></p>
          <? if($concert) { ?>
          <p><a href="#show" style="font-size: 8px;" onclick="showAlerts()">Band Member?</a>
	          <div id="bandAlerts" style="display:none">
		          <?
					if ($concert['pants'] == 0) {
							echo "<div><span class='glyphicon glyphicon-alert' aria-hidden='true'></span> This is a black pants concert</div>";
					}
					elseif ($concert['pants'] == 1) {
						echo "<div><span class='glyphicon glyphicon-alert' aria-hidden='true'></span> This is a tan pants concert</div>";
					}
					if ($concert['chair'] == 1) {
						echo "<div><span class='glyphicon glyphicon-alert' aria-hidden='true'></span> A chair is required at this concert</div>";
					}
				?>
	          </div>
          </p>
          <? } //End if concert ?>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/logo_facebook.png" alt="Facebook Image" width="140" height="140">
          <h2>Facebook</h2>
          <p>Join our Facebook page for the latest information and upcoming concerts.
			  <div class="fb-page" data-href="https://www.facebook.com/keystoneconcertband/" data-tabs="events" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/keystoneconcertband/"><a href="https://www.facebook.com/keystoneconcertband/">Keystone Concert Band</a></blockquote></div></div></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/logo_amazonSmile.png" alt="Amazon Smile Image" width="140" height="140">
          <h2>Amazon Smile</h2>
          <p>Use amazon.com. Buy products. Amazon donates. It's just that simple.</p>
          <p><a class="btn btn-default" href="amazon.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

	<? require('includes/footer.php'); ?>

    </div><!-- /.container -->

	<? require('includes/common_js.php'); ?>
    <script type="text/javascript">
		(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));
	    function showAlerts()
	    {
		    $("#bandAlerts").toggle();
	    }
	</script>
  </body>
</html>
