<?
	include_once('includes/class/kcbPublic.class.php');
	global $homepage;
	$homepage = new KCBPublic();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <? require 'includes/common_meta.php'; ?>
    <meta name="description" content="Use your purchases on amazon to help the band!">

    <title>Email Test</title>

    <? require 'includes/common_css.php'; ?>

</head>

<body>

    <? require 'includes/nav.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bs-component">
                    <div class="jumbotron">
                        <h1>Email Test</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2>Email Test</h2>
                </div>
                <div>
                    <?php
                        $homepage->emailTest();
                    ?>
                </div>
            </div>
        </div>
        <? require 'includes/footer.php'; ?>
    </div> <!-- /container -->

    <? require 'includes/common_js.php'; ?>
</body>

</html>