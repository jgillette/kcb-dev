<!-- Static navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Keystone Concert Band</a>
		  </div>
		  <div id="navbar" class="navbar-collapse collapse">
		    <ul class="nav navbar-nav">
		      <li <? if ($_SERVER['PHP_SELF'] == "/index.php") { ?>class="active"<? } ?>><a href="/index.php">Home</a></li>
		      <li <? if (basename($_SERVER['PHP_SELF']) == "concerts.php") { ?>class="active"<? } ?>><a href="/concerts.php">Concerts</a></li>
		      <li <? if (basename($_SERVER['PHP_SELF']) == "donate.php") { ?>class="active"<? } ?>><a href="/donate.php">Donate</a></li>
		      <li <? if (basename($_SERVER['PHP_SELF']) == "join.php") { ?>class="active"<? } ?>><a href="/join.php">Join</a></li>
		      <li <? if (basename($_SERVER['PHP_SELF']) == "book.php") { ?>class="active"<? } ?>><a href="/book.php">Book</a></li>
		      <li <? if (basename($_SERVER['PHP_SELF']) == "cd.php") { ?>class="active"<? } ?>><a href="/cd.php">CD</a></li>
		      <li <? if (basename($_SERVER['PHP_SELF']) == "conductors.php") { ?>class="active"<? } ?>><a href="/conductors.php">Conductors</a></li>
		      <? if(isset($_SESSION["email"])) { ?>
					<li class="dropdown <? if ($_SERVER['PHP_SELF'] == "/members/index.php") { ?>active"<?}?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Members <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/members/index.php">Member Home</a></li>
						<li <? if ($_SERVER['PHP_SELF'] == "/members/myInfo.php") { ?>class="active"<?}?>><a href="/members/myInfo.php">My Info</a></li>
						<li <? if ($_SERVER['PHP_SELF'] == "/members/members.php") { ?>class="active"<?}?>><a href="/members/members.php">Members</a></li>
						<li <? if ($_SERVER['PHP_SELF'] == "/members/documents.php") { ?>class="active"<?}?>><a href="/members/documents.php">Documents</a></li>
						<li <? if ($_SERVER['PHP_SELF'] == "/members/music.php") { ?>class="active"<?}?>><a href="/members/music.php">Music</a></li>
						<? if (isset($_SESSION["office"])) { ?>
						<li role="separator" class="divider"></li>
						<li <? if ($_SERVER['PHP_SELF'] == "/members/messageMembers.php") { ?>class="active"<?}?>><a href="/members/messageMembers.php">Text Message Mbrs</a></li>
						<li <? if ($_SERVER['PHP_SELF'] == "/members/pendingMembers.php") { ?>class="active"<?}?>><a href="/members/pendingMembers.php">Pending Members</a></li>
						<li <? if ($_SERVER['PHP_SELF'] == "/members/loginStats.php") { ?>class="active"<?}?>><a href="/members/loginStats.php">Login Stats</a></li>
						<li role="separator" class="divider"></li>
						<? } ?>
						<li><a href="logoff.php">Logoff</a></li>
					</ul>
		      <? }
			     else { ?>
				 	<li <? if (basename($_SERVER['PHP_SELF']) == "members.php") { ?>class="active"<? } ?>><a href="/members.php">Members</a></li>
			  <? }?>
		    </ul>
		  </div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>
