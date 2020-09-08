<!DOCTYPE html>
<html>
  <head>
    <title>Odontovida</title>
    <link rel="stylesheet" href="MetroUI/build/css/metro-all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
  </head>
  <body>
    <div class="container-fluid">
      <div class="grid ">
        <div class="row d-flex flex-column flex-justify-center h-vh-50" >
          <div class="cell-4 offset-4">
            <form class="p-6 win-shadow" action="login.php" method="POST">
              <div class="cell-4 offset-4"><img src="images/logo.png"></div>
              <hr class="thin mt-4 mb-4 bg-white">
              <div class="form-group">
                  <label>Usuário</label>
                  <input name="user" type="text" placeholder="Digite o login" data-role="input" />
                  <!--<small class="text-muted">Não compartilhe o acesso com ninguém</small>-->
              </div>
              <div class="form-group">
                  <label>Senha</label>
                  <input name="pass" type="password" placeholder="Digite a senha" data-role="input" />
              </div>
              <small class="text-muted" style="color:Red">Usuário ou senha incorretos!</small>
              <div class="form-group mt-10">
                  <button class="button primary" data-role="button" style="background-color: #735b3c;">Entrar</button>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <script src="MetroUI/build/js/metro.min.js></script>
  </body>
</html>