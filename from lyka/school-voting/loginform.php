<div class="container-fluid">
        <div class="row">
        <!--Login-->
         <div id="login" class="col-xs-12 col-md-8 col-lg-8">
            <div class="login-panel">
              <div class="login-header">
                <div class="row">
                  <div class="col-xs-6">
                  <img src="images/school-logo.png" width="125" alt="">
                  </div>
                </div>
              </div>
              <div class="login-table">
                <div class="login-table-cell">
                  <div class="login-panel-content">
                    <h1>Sign in your Account</h1>
                    <p>Enter you details below.</p>
                  </div>
                  <form class="form-horizontal" method="post" action="<?php echo $PHP_SELF; ?>">
                    <div class="form-group">
                      
                      <div class="col-sm-12">
                      <label for="inputEmail3" class="control-label label-title">Email</label>
                        <input type="email" class="form-control input-lg" id="inputEmail3" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="inputPassword3" class="control-label label-title">Password</label>
                        <input type="password" class="form-control input-lg" id="inputPassword3" placeholder="Password">
                      </div>
                    </div>
                    <br />
                    <div class="form-group">
                      <div class="col-sm-12 text-center">
                        <a type="submit" class="btn btn-xl btn-primary">Sign in</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--End Login-->
          <!--Promo-->
          <div id="promo" class="promo-1 hidden-xs hidden-sm col-md-4 col-lg-4 ">
               <div class="login-panel">
               </div>
          </div>
          <!--End Promo-->
      </div>
    </div>