<?php
if (session_unset()) {
	echo "haii";
	echo "haii";
	session_destroy();
	header(sprintf('location:?user=login'));
}else {

	echo "haii";
	echo "haii";
	echo "haii";
	echo "haii";
	echo "haii";
	echo "haii";
	echo "haii";
	echo "haii";
	header(sprintf('location:?user=login'));
}
// echo "<meta http-equiv='refresh' content='0; url=?user=login''>";
exit;
?>
