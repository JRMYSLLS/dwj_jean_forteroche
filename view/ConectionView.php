<?php $title = 'Connection'; ?>

<?php ob_start(); ?>

<div class="container form">
  <div class="row">
    <div class="col-lg-6">
      <div class="form-custom connection">
        <h2>Connexion</h2>
        <form class="inscription" action="index.php?action=connection" method="post">
          <div class="form-group">
            <label for="mail">Votre mail</label>
            <input type="email" id="mail" class="form-control" name="mail">
          </div>
          <div class="form-group">
            <label for="password">Votre mot de passe</label>
            <input type="password" id="password" class="form-control" name="password">
          </div>
          <input type="submit" name="connection" value="Connexion">
        </form>
      </div>


    </div>
    <div class="col-lg-6">
      <div class="form-custom inscription">
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
          <input type="submit" name="inscription" value="Inscription">
        </form>
      </div>
    </div>
  </div>
</div>

  <?php $content =ob_get_clean(); ?>
  <?php require('view/template.php') ?>
