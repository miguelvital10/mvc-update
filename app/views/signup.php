<form method="post" action="signup/store">
    <input type="text" name="firstName" placeholder="Nome" class="form-control" value="<?php echo old('firstName') ?>">
    <php echo flash('firstName'); ?>

    <input type="text" name="lastName" placeholder="Sobrenome" class="form-control" value="<?php echo old('firstName')?>>
    <php echo flash('lastName'); ?>
        
    <input type="email" name="email" placeholder="E-mail" class="form-control" value="<?php echo old('firstName')?>>
    <php echo flash('email'); ?>
        
    <input type="password" name="password" placeholder="Senha" class="form-control" value="<?php echo old('firstName')?>>
    <php echo flash('password'); ?>

    <button type="submit">CADASTRAR</button>
</form>