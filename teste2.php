<?php
require 'functions.php';
$_SESSION['current_page']="projets";
if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']))
{
      header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Projets</title>


        <!-- Simplebar -->
        <link type="text/css" href="assets/vendor/simplebar.min.css" rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css" href="assets/css/app.css" rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">

    </head>

    <body class="layout-default">
        <div class="preloader"></div>

        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
            <div class="mdk-drawer-layout__content">

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

              <?php include 'haute_bar.php';?>

                <!-- Header Layout Content -->

                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">

                    <div class="container-fluid page__container">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-8 card-form__body border-left">
                                    <div id="contacts"  >
                                        <table class="table mb-0 thead-border-top-0">

                                                  <thead>
                                                      <tr>
                                                        <th class="sort" data-sort="name">Name</th>
                                                        <th class="sort" data-sort="age">Age</th>
                                                        <th class="sort" data-sort="city">City</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody class="list">
                                                      <tr>
                                                        <td class="id" style="display:none;">1</td>
                                                        <td class="name">Jonny</td>
                                                        <td class="age">27</td>
                                                        <td class="city">Stockholm</td>
                                                      </tr>
                                                      <tr>
                                                        <td class="id" style="display:none;">2</td>
                                                        <td class="name">Jonas</td>
                                                        <td class="age">-132</td>
                                                        <td class="city">Berlin</td>
                                                      </tr>

                                                    </tbody>
                                                  </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- // END header-layout__content -->

            </div>
            <!-- // END header-layout -->

        </div>
        <!-- // END drawer-layout__content -->

        <script>
          var options = {
          valueNames: [ 'id', 'name', 'age', 'city' ]
        };

        // Init list
        var contactList = new List('contacts', options);

        function refreshCallbacks() {
          // Needed to add new buttons to jQuery-extended object
          removeBtns.click(function() {
            var itemId = $(this).closest('tr').find('.id').text();
          });
        }
        </script>


    <?php include 'footer.php';?>



    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <script src="assets/vendor/simplebar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>


    <!-- App -->
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>

    <!-- List.js -->
    <script src="assets/vendor/list.min.js"></script>
    <script src="assets/js/list.js"></script>

</body>

</html>
