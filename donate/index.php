<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <title>Standard Payment Sample PHP</title>
    <!-- TODO: create method to concat to a single css
            file on server instead of doing it at runtime -->
    <link href="style.css.php" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="loading" id="loading">Please wait&#8230;</div>
        <div class="col-sm-12 top" id="theform" style="display:none">
          <div class="donate-box">
            Donate...
          </div>
          <div class="alert alert-danger" id='errordiv' style="display: none"></div>
          <form action="donate-init.php"
                id="Edit" method="post" name="Edit"
                style="margin-bottom:40px;" >
            
            <h3>Personal Details</h3>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input class="form-control" data-first_name name="first_name" required="required" type="text" />
                </div>
              </div>


              <div class="col-sm-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input class="form-control" data-last_name name="last_name" required="required" type="text" />
                </div>
              </div>


              <div class="col-sm-6">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" data-email-Primary name="email" id="email-Primary" required="required" type="email" />
                </div>
              </div>


              <div class="col-sm-6">
                <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" name="phone-Primary-1" data-phone-Primary-1 required="required" type="tel" />
                </div>
              </div>


              
            </div>
            
            <h3>Donation Details</h3>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Amount</label> 
                  <input class="form-control" data-custom_25 id="donation-amount" name="amountngn" required="required" type="text" />
                </div>
              </div>

              
            </div>

            
            <br>
            <div id="result"></div>
            <br>
            <button class="payment-btn" type="submit">Proceed</button>
          </form>
        </div>
      </div>
    </div>
    <!-- TODO: create method to concat to a single js
         file on server instead of doing it at runtime -->
    <script src="js/main.js.php"></script>

  </body>
</html>