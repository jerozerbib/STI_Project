<header>
		<nav class="navbar navbar-expand-lg navbar-inverse bg-dark">
			<div class="collapse navbar-collapse" id="navbarNav">
    			<ul class="navbar-nav">
                    <li class="nav-item">
        				<a class="nav-link" href='message.php'>MessageBox</a>
					</li>
					<li class="nav-item">
        				<a class="nav-link" href='newmessage.php'>NewMessage</a>
      				</li>
					<?php
					if(isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin' ){

						echo '<li class="nav-item">';
						echo '<a class="nav-link" href=\'adduser.php\'>AddUser</a>';
						echo '</li>';
						echo '<li class="nav-item">';
						echo '<a class="nav-link" href=\'updateuserchoice.php\'>UpdateUser</a>';
						echo '</li>';
						echo '<li class="nav-item">';
						echo '<a class="nav-link" href=\'deleteuser.php\'>DeleteUser</a>';
						echo '</li>';
					}
					else{
						echo '<li class="nav-item">';
						echo '<a class="nav-link" href=\'passwd.php\'>ChangePassword</a>';
						echo '</li>';
					}
					?>
      				<li class="nav-item">
        				<a class="nav-link" href='logout.php'>Logout</a>
					</li>
    			</ul>
  			</div>
		</nav>	  
</header>