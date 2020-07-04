<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<body>

  <!-- jQuery -->
  <script src="assets/vendor/jquery.min.js"></script>

  <script src"assets/vendor/jquery.password-validation.js"></script>

  <!-- Bootstrap -->
  <script src="assets/vendor/popper.min.js"></script>
  <script src="assets/vendor/bootstrap.min.js"></script>


  <div class = "container">
    <h1 class="text-center">Pass</h1>
    <div class="row">
      <div class="col-ms-7">
        <div class="well well-bg">
          <form>
            <div class = "form-group">
              <label>Password</label>
              <input type="password" id="password" class="form-control"/>
            </div>
            <div class = "form-group">
              <label>Confirm Password</label>
              <input type="password" id="Confirmpassword" class="form-control"/>
            </div>
            <div class = "form-group">
              <input type="button" id="button" class="btn btn-primary" value="Submit"/>
            </div>
          </form>
      </div>
      <div class="col-md-5">
        <div id="errors"></div>
      </div>
  </div>
</div>


<script>
   var options = {
     confirmField: "#Confirmpassword"
   };
    $('#password').passwordValidation(options,function(element, valid, match, failedCases){
      $('#errors').html("<pre>"+failedCaises.join("\n")+"</pre>");
      if(valid) $(element).css('border','1px solid green');
      if(!valid) $(element).css('border','1px solid red');
      if(valid && match) $('#Confirmpassword').css('border','1px solid green');
      if(!valid || !match) $('#Confirmpassword').css('border','1px solid red');
    });
</script>




</body>
</html>
