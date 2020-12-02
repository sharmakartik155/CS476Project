<?php session_start(); ?>
<?php	if (!isset($_SESSION["email"]) && !$_SESSION["email"]) { header("Location: login.php"); exit(); } ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>View</title>
<?php include '../snippets/head.php'; ?>
	</head>
	<body class="theme-dark-secondary">
<?php include '../snippets/header.php'; ?>
		<section>
			<div class="w3-container w3-margin-top">
				<?php
					$db = new mysqli("localhost", "soren200", "Asdfasdf", "soren200");
					if ($db->connect_error) { die ("Database connection failed: " . $db->connect_error); }
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						$q = "SELECT * FROM Docs where doc_id = '$id'";
						$r = $db->query($q);
						$edit_doc = $r->fetch_assoc();
						$edit_content = $edit_doc["doc_content"];
						$edit_title = $edit_doc["doc_title"];
					}
				?>
				<p class="doc-title theme-dark-secondary"><?php echo $edit_title;?></p>
				<p id="textarea" class="theme-dark-primary view-doc w3-margin-top"><?php echo $edit_content;?></p>
				<div class="w3-third">
					<p>Last auto-upload 3 seconds ago</p>
					<p>Next auto-upload in 2 seconds</p>
				</div>
				<button onclick="someFunction()" class="w3-button theme-dark-primary w3-section w3-third w3-margin-left w3-margin-right w3-padding edit-buttons">Request Control</button>
				<div class="w3-right-align">
					<p>3 current viewers</p>
					<p>1 request for edit control</p>
				</div>
			</div>
		</section>
<?php include '../snippets/footer.php'; ?>
	</body>
</html>
