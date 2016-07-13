<body class="login">
<div>
  <a class="hiddenanchor" id="signup"></a>
  <a class="hiddenanchor" id="signin"></a>

  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <form action="" method="POST">
          <h1>Login Form</h1>
          <? if(isset($data['in'])) { ?>
            <div class="alert alert-success">
              <?= $data['in']; ?>
            </div>
          <? } ?>
          <div>
            <input type="text" name="login" class="form-control" placeholder="Username" required="" />
          </div>
          <div>
            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
          </div>
          <div>
            <input class="btn btn-default submit" value="Log in" type="submit">
            <a class="reset_pass" href="#">Lost your password?</a>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">New to site?
              <a href="#signup" class="to_register"> Create Account </a>
            </p>

            <div class="clearfix"></div>
          </div>
        </form>
      </section>
    </div>

    <div id="register" class="animate form registration_form">
      <section class="login_content">
        <form action="" method="POST">
          <h1>Create Account</h1>
          <? if(isset($data['reg'])) { ?>
            <div class="alert alert-success">
              <?= $data['reg']; ?>
            </div>
          <? } ?>
          <div>
            <input type="text" name="login" class="form-control" placeholder="Username" required="" />
          </div>
          <div>
            <input type="email" name="email" class="form-control" placeholder="Email" required="" />
          </div>
          <div>
            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
          </div>
          <div>
            <input type="submit" value="Register" class="btn btn-default submit" />
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Already a member ?
              <a href="#signin" class="to_register"> Log in </a>
            </p>

            <div class="clearfix"></div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="/templates/assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/templates/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Custom scripts -->
<script src="/templates/assets/custom/ui.js"></script>
</body>