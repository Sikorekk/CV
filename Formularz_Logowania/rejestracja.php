<form autocomplete="off" action="index.php" method="post" class="form">		
	<div class="heading">Zarejestruj się</div>
	<div class="inputs">
		<input class="err2 err3" required minlength="5" maxlength="16" onfocus="inputFocused(this.name);" onfocusout="inputUnfocused(this.name);" type="text" name="username" placeholder="Podaj nazwę">
		<input class="err3" required minlength="5" maxlength="16" onfocus="inputFocused(this.name);" onfocusout="inputUnfocused(this.name);" type="password" name="password" placeholder="Podaj hasło">
	<!--	<input onfocus="inputFocused(this.name);" onfocusout="inputUnfocused(this.name);" type="password" name="password2" placeholder="Powtórz hasło"> -->
		<input class="err1" required onfocus="inputFocused(this.name);" onfocusout="inputUnfocused(this.name);" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Podaj email">
	<!--	<input onfocus="inputFocused(this.name);" onfocusout="inputUnfocused(this.name);" type="text" name="email2" placeholder="Powtórz email"> -->
		<input type="hidden" name="act" value="rej">
	</div>
	<div class="alert">
		<?php
			if(isset($_GET['ale'])){
				switch($_GET['ale']){
					case '1': { echo '<div class="alerttext"><br>Podany email jest już zajęty</div>'; ?><script>changeClassForOne(".err1", "wrong");</script><?php } break;
					case '2': { echo '<div class="alerttext">Podana nazwa użytkownika<br> jest już zajęta</div>'; ?><script>changeClassForOne(".err2", "wrong");</script><?php } break;
					case '3': { echo '<div class="alerttext">Hasło i nazwa użytkownika<br> nie mogą być takie same</div>'; ?><script>changeClassForMany(".err3", "wrong");</script><?php } break;
				}
			}
		?>	
	</div>
	<div class="submits">
		<a href="index.php?opt=1" class="sub1">Zaloguj się!</a>
		<input type="submit" class="sub2" value="Zarejestruj się!">
	</div>
</form>