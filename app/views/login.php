<h2>Login</h2>

<form action="/login/store" method="post">
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>

<br>

<?php echo flash('login'); ?>