<footer style="margin-top: 60px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="list-inline">
					<li>
						<a href="/productos">Productos</a>
					</li>
					<li class="footer-menu-divider">&sdot;</li>
					<li>
						<a href="/faq">FAQ</a>
					</li>
					<li class="footer-menu-divider">&sdot;</li>
					<li>
						<a href="/cookies">Política de Cookies</a>
					</li>
					<li class="footer-menu-divider">&sdot;</li>
					<li>
						<a id="botonContactar" data-toggle="modal" data-target="#modalContacto">Contacto</a>
					</li>
					<li class="footer-menu-divider">&sdot;</li>
					<li>
						<a href="/condiciones">Condiciones generales y política de privacidad</a>
					</li>
					
				</ul>
				<p class="copyright text-muted small">Copyright &copy; quiendamenos All Rights Reserved</p>
			</div>
		</div>
	</div>
	
<!-- Modal -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="form-signin" action="/auth/register" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="nombre">Nombre de usuario</label>
            <input type="text" name="aliasReg" id="input" class="form-control"  required autofocus>
            <span class="msg-error">Introduce un nombre de usuario válido</span>
          </div>
          <div class="form-group">
            <label for="inputEmail">Correo electrónico</label>
            <input type="email" name="emailReg" id="inputEmail" class="form-control"  required autofocus>
            <span class="msg-error">Introduce un correo válido</span>
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password"  name="passwordReg" required>
            <span class="msg-error">Introduce una contrasenya válida</span>
          </div> 
          <div class="form-group">
            <label for="contrasenya">Confirma tu contraseña</label>
            <input type="password" class="form-control" id="confirmedPassword"  name="confirmedPassword" required>
            <span class="msg-error">las contraseñas no coinciden!</span>
          </div>
          <label>
            <input id="aceptoCondiciones" type="checkbox"> <a target="_blank"  href="/condiciones">Acepto los terminos y condiciones de uso</a>
          </label>
          <button disabled class="btn btn-lg btn-primary btn-block" id="botonRegistrar" type="button">Regístrate!</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal LogIn -->
<div class="modal fade" id="modalLogIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="form-login" action="/auth/login" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="nombre">Usuario</label>
            <input type="text" name="alias" id="inputEmail" class="form-control"  required autofocus>
            <span class="msg-error">Introduce un nombre de usuario válido!</span>
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password"  name="password" required>
            <span class="msg-error">Introduce una contraseña válida!</span>
          </div>
          <span class="msg-error js-login-error-msg"></span>
          <button class="btn btn-lg btn-primary btn-block" id="btn-iniciar-sesion" type="button">Iniciar sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Contacto -->

  <div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
          <form class="form-mensaje" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="alias" id="inputEmail" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label for="password">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="mensaje">Mensaje</label>
              <textarea class="form-control" name="mensaje" rows="3"></textarea>
            </div>

            <button class="btn btn-lg btn-primary btn-block" id="contactar" type="button">Enviar</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</footer>
<script src="/js/footer.js"></script>