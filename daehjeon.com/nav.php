<?php
	$nav = array('index.php', 'about.php', 'work.php', 'resume.php', 'news.php', 'contact.php');
	
	for ($i=0; $i < sizeof($nav); $i++){
		if ($nav[$i] == str_replace('/','',$_SERVER['PHP_SELF'])){
			${str_replace('.php','',$nav[$i])} = 'class="current"';
		}
	}
?>
<a href="../"><img src="images/logo/Dae_Jeon.png" alt="logo" id="logo"/></a>
<nav>
  <ul>
    <li><a href="../" <?=$index?>>Home</a></li>
    <li><a href="about.php" <?=$about?>>About me</a></li>
    <li><a href="work.php" <?=$work?>>Work & Projects</a></li>
    <li><a href="resume.php" <?=$resume?>>Resume</a></li>
    <li><a href="#" <?=$news?>>News</a></li>
    <li><a href="contact.php" <?=$contact?>>Contact</a></li>
  </ul>
</nav>
