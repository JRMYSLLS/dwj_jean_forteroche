<?php $title = 'Connection'; ?>

<?php ob_start(); ?>

<div class="form">
  <div class="form-group row connection">
    <h2>Connection</h2>
    <form class="inscription" action="index.php?action=connection" method="post">
      <div class="form-group">
        <label for="mail">Votre mail</label>
        <input type="email" id="mail" class="form-control" name="mail">
      </div>
      <div class="form-group">
        <label for="password">Votre mot de passe</label>
        <input type="password" id="password" class="form-control" name="password">
      </div>
      <input type="submit" name="" value="Connection">
    </form>
  </div>

  <div class="form-group row inscription">
    <h2>Inscription</h2>
    <form class="inscription" action="index.php?action=registration" method="post">
      <div class="form-group">
        <label for="pseudo">Votre pseudo</label>
        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="pseudo">
      </div>
      <div class="form-group">
        <label for="mail2">Votre mail</label>
        <input type="email" id="mail2" class="form-control" name="mail">
      </div>
      <div class="form-group">
        <label for="password2">Votre mot de passe</label>
        <input type="password" id="password2" class="form-control" name="password">
      </div>
      <input type="submit" name="" value="Inscription">
    </form>
  </div>
</div>

  <?php $content =ob_get_clean(); ?>
  <?php require('view/template.php') ?>
