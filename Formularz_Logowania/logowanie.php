<form autocomplete="off" action="index.php" method="post" class="form">		
	<div class="heading">Zaloguj się</div>
	<div class="inputs">
		<input class="toCheck" required minlength="5" maxlength="16" onfocus="inputFocused(this.name);" onfocusout="inputUnfocused(this.name);" type="text" name="username" placeholder="Podaj nazwę">
		<input class="toCheck" required minlength="5" maxlength="16" onfocus="inputFocused(this.name);" onfocusout="inputUnfocused(this.name);" type="password" name="password" placeholder="Podaj hasło">
		<input type="hidden" name="act" value="log">
	</div>
	<div class="alert">
		<?php
			if(isset($_GET['ale'])){
				switch($_GET['ale']){
					case '1': { echo '<div class="alerttext">Brak konta o podanych<br> danych logowania</div>'; ?><script>changeClassForMany(".toCheck", "wrong");</script><?php } break;
					case '2': { echo '<div class="alerttext">Hasło i nazwa użytkownika<br> nie mogą być takie same</div>'; ?><script>changeClassForMany(".toCheck", "wrong");</script><?php } break;
				}
			}
		?>
	</div>
	<div class="submits">
		<input type="submit" class="sub2" value="Zaloguj się!">
		<a href="index.php?opt=2" class="sub1">Zarejestruj się!</a>
	</div>
</form>