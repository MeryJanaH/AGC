<?php
require 'functions.php';
$_SESSION['current_page']="clients";
if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']))
{
      header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clients</title>


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

          <?php include 'haute_bar.php';
                          if(isset($_POST["name_client"]))
                          {
                              if (isset($_POST["add"]))
                              {
                                  add_client($_POST["name_client"],$_POST["num"],$_POST["Note"],$_POST["source"],$_POST["c_p"]);
                              }
                          }
                          else {
                           header('Location: Clients.php');
                          }
                 ?>

                    <!-- Header Layout Content -->
                    <form action="#Ajouter" method="POST">
                    <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">
                        <div class="container-fluid page__container">
                            <div class="card card-form">
                                <div class="row no-gutters">

                                    <div class="col-lg-12 card-form__body">
                                        <div  id="contacts">
                                            <div class="search-form search-form--light m-3">
                                                <input type="text" class="form-control search" placeholder="Search">
                                                <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                            </div>
                                        <table class="table mb-0 thead-border-top-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 120px;" name="name_client">Nom</th>
                                                    <th style="width: 120px;" name="num">Numéro de téléphone</th>
                                                    <th style="width: 120px;" name="projet">Projet</th>
                                                    <th style="width: 120px;" name="Note">Notes</th>
                                                    <th style="width: 120px;" name="source">Source</th>
                                                    <th style="width: 120px;" name="source">Date du 1er visite</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="staff03">
                                              <!--table des Employés-->
                                              <?php update_table_clients(); ?>
                                                  <tr>
                                                  <td><input type='hidden' id='id-field'/></td>
                                                  <td><input required='' id ='name' name='name_client[]'></td>
                                                  <td><input required='' id ='num' type='tel' name='num[]'></td>
                                                  <td><select required='' id = 'projet' class='form-control item_unit' name='c_p[]'><option> </option><?php echo fill_unit_select_box_projet();?></select></td>
                                                  <td><input required='' id ='note' name='Note[]'></td>
                                                  <td><select required='' id = 'source' class='form-control item_unit' name='source[]'><option> </option><?php echo fill_unit_select_box_source();?></select></td>
                                                  <td >
                                                    <button id="edit-btn">Edit</button>
                                                  </td>
                                                  </tr>
                                            </tbody>
                                        </table>
                                        <td>
                                          <br/>
                                          <br/>
                                           <input type="button" id="btnShowMsg1"  style="width: 200px; color: green;" value="Ajouter un nouveau client !" onClick="add_ct()"/>
                                           <input type="button" id="btnShowMsg2"  style="width: 300px; color: red;" value="Modifier les informations des clients !" onClick="window.location.href='éditer.php?data=clients';"/>
                                           <br/>
                                           <br/>
                                        <div class="form-group">
                                            <button class="btn btn-block btn-primary" name="add" type="submit">Enregistrer</button>
                                        </div>
                                       </td>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    <!-- // END header-layout__content -->

                </div>
                <!-- // END header-layout -->

            </div>
            <!-- // END drawer-layout__content -->



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

    <!-- List.js-->
    <script src="assets/vendor/list.min.js"></script>
    <script src="assets/js/list.js"></script>

    <script>
    var options = {
      valueNames: [ 'id', 'name', 'phnumber', 'projet_name', 'notes', 'source', 'visite' ]
    };

    // Init list
    var contactList = new List('contacts', options);
    console.log(contactList);
    var idField = $('#id-field'),
        nameField = $('#name'),
        numField = $('#num'),
        projetField = $('#projet').children("option:selected"),
        srcField = $('#source').children("option:selected"),
        noteField = $('#note'),
        //editBtn = $('#edit-btn').hide(),
        editBtns = $('.edit-item-btn');

    console.log(idField.val());
    console.log(nameField.val());
    console.log(numField.val());
    console.log(projetField.val());
    console.log(srcField.val());
    console.log(noteField.val());
    // Sets callbacks to the buttons in the list
    refreshCallbacks();
/*
    editBtn.click(function() {
      cityField = $('#city-field').children("option:selected");
      var item = contactList.get('id', idField.val())[0];
      item.values({
        id:idField.val(),
        name: nameField.val(),
        age: ageField.val(),
        city: cityField.val()
      });
      clearFields();
      editBtn.hide();
      addBtn.show();
    });   noteeee: codePen : Yassine*/

    function refreshCallbacks() {
      // Needed to add new buttons to jQuery-extended object
      editBtns = $(editBtns.selector);

      editBtns.click(function() {
        alert("tt");
        var itemId = $(this).closest('tr').find('.id').text();
        var itemValues = contactList.get('id', itemId)[0].values();
        idField.val(itemValues.id);
        nameField.val(itemValues.name);
        numField.val(itemValues.num);
        projetField.val(itemValues.projet);
        projetField.text(itemValues.projet);
        srcField.val(itemValues.source);
        srcField.text(itemValues.source);
        noteField.val(itemValues.note);
      });
    }

    </script>

    </body>

    </html>
