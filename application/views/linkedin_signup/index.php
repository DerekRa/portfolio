
<form id="linkedin_connect_form" action="linkedin_signup/initiate" method="post"><input type="submit" value="Login with LinkedIn" /></form>


<!-- <script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script> -->
<!-- <script type="text/javascript" src="https://platform.linkedin.com/badges/js/badge.js" async defer></script> -->


here
<!-- <div class="LI-profile-badge"  data-version="v1" data-size="medium" data-locale="en_US" data-type="horizontal" data-theme="dark" data-vanity="kenneth-macaraeg-37967729"><a class="LI-simple-link" href='https://ph.linkedin.com/in/kenneth-macaraeg-37967729?trk=profile-badge'>Kenneth Macaraeg</a></div>
 -->
<!-- 
<div class="LI-entity-badge" data-version="v2" data-locale="en_US" data-entity="jserp" data-theme="light" data-type="simple" data-size="medium" data-key-companyname="confidencial" data-key-title="Junior Programmer Job - Victoria Court - 7225661"><a class="LI-simple-link" href="https://www.linkedin.com/jobs/confidencial-junior-programmer-job---victoria-court---7225661-jobs">Junior Programmer Job - Victoria Court - 7225661 at confidencial</a></div>
 -->

=============
<!-- <script type="text/javascript" src="http://platform.linkedin.com/in.js"> -->
<!-- <div id="statusDiv">change</div>

<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js">
api_key: 'L1nMuXO9MyTEee6d'
onLoad: 'onLinkedInLoad'
authorize: 'true'
</script>
<script type="text/javascript">
function onLinkedInLoad() {
	alert('ok');
	
IN.API.Raw("/companies/37967729:(num-followers)")
.result( function(result) {
 document.getElementById("statusDiv").innerHTML = result.numFollowers;
} )
.error( function(error) { 
 /*do nothing*/  } )
;
}
</script>
 -->


<div id="statusDiv">Result</div>

<script type="text/javascript" src="http://platform.linkedin.com/in.js">
api_key: <?php echo 'VXmzSddDzlEjNNg6' . PHP_EOL; ?>
onLoad: onLinkedInLoad
authorize: true
lang: en_US
</script>
<script type="text/javascript">
function onLinkedInLoad() {
IN.API.Raw("/companies/37967729:(num-followers)").result( function(result) { document.getElementById("statusDiv").innerHTML = result.numFollowers; } )
	.error( function(error) { /* do nothing */ } )
;
}
</script>