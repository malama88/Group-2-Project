<?php
include('templates/header.html');
?>
	<br>
	<br>
	<br>
	<div class="container">
		<form name="entry" action="entry_handler.php" method="post">
			<p><label for="entry_name">Entry Name:</label><input type="text" name="entry_name" size="30"></p>
			<p><label for="entry_content">Entry:</label><textarea name="entry_content" rows="10" col="50" wrap="soft"></textarea></p>
			<p><input type="submit" name="submit" value="Add Entry" class="button-pill"></p>
		</form>
	</div>
<?php
include('templates/footer.html');
?>