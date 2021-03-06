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

    <link href="assets/images/logo.png" rel="shortcut icon" type="image/x-icon" />
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

          <?php include 'include/haute_bar.php';
                          if(isset($_POST["name_client"]))
                          {
                              if (isset($_POST["add"]))
                              {
                                  add_client($_POST["name_client"],$_POST["num"],$_POST["Note"],$_POST["source"],$_POST["c_p"],$_POST["nb_visite"]);
                              }
                          }
                          else {
                           header('Location: Clients');
                          }
                 ?>

              <script>
                 function add_ct()
                   {
                     var html = "<tr>";
                         html += "<td><input required='' id ='n' name='name_client[]'></td>";
                         html += "<td><input required='' id ='nm' type='tel' name='num[]'></td>";
                         html += "<td><select required='' id = 'pj' class='form-control item_unit' name='c_p[]'><?php echo fill_unit_select_box_projet();?></select></td>";
                         html += "<td><input required='' id ='nt' name='Note[]'></td>";
                         html += "<td><select required='' id = 's' class='form-control item_unit' name='source[]'><?php echo fill_unit_select_box_source();?></select></td>";
                         html += "<td><input required='' id ='v' type='number' name='nb_visite[]'></td>";
                         html += "</tr>";

                    var row = document.getElementById("staff03").insertRow();
                         row.innerHTML = html;
                   }

               </script>

                    <!-- Header Layout Content-->
                    <form action="#Ajouter" method="POST">
                    <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">
                        <div class="container-fluid page__container">
                            <div class="card card-form">
                                <div class="row no-gutters">

                                    <div class="col-lg-16 card-form__body">
                                        <div  id="contacts">
                                            <div class="search-form search-form--light m-3">
                                                <input type="text" class="form-control search" placeholder="Search">
                                                <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                            </div>
                                        <table class="table mb-0 thead-border-top-0">
                                            <thead>
                                                <tr>
                                                    <th  name="name_client">Nom</th>
                                                    <th  name="num">Téléphone</th>
                                                    <th  name="projet">Projet</th>
                                                    <th  name="Note">Notes</th>
                                                    <th  name="source">Source</th>
                                                    <th  name="nb_visite">Nb Visites</th>
                                                    <th  type="number"  name="visite">1er visite</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="staff03">
                                              <!--table des Employés-->
                                              <?php update_table_clients(); ?>
                                                  <tr>
                                                  <td class="name"><input type='hidden' id='id-field'/><input id='name'></td>
                                                  <td class="phnumber"><input id='num' ></td>
                                                  <td class="projet_name"><select id='projet' class='form-control item_unit'><option value="none"> </option><?php echo fill_unit_select_box_projet();?></select></td>
                                                  <td class="notes"><input id='note'></td>
                                                  <td class="source"><select id='source' class='form-control item_unit'><option value="none"> </option><?php echo fill_unit_select_box_source();?></select></td>
                                                  <td class="nb_visite"><input id='nb_visite'></td>
                                                  <td >
                                                    <button type="button" id="edit-btn">Éditer</button>
                                                  </td>
                                                  </tr>
                                            </tbody>
                                        </table>
                                        <td>
                                          <br/>
                                          <br/>
                                           <input type="button" id="btnShowMsg1"  style="width: 200px; color: green;" value="Ajouter un nouveau client !" onClick="add_ct()"/>
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
                <!--     // END header-layout__content -->

                </div>
                <!-- // END header-layout -->

            </div>
            <!-- // END drawer-layout__content -->

    <?php include 'include/left_side.php';?>


    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <script>
    var options = {
      valueNames: [ 'id', 'name', 'phnumber', 'projet_name', 'notes', 'source','nb_visite' ]
    };

    // Init list
    var contactList = new List('contacts', options);

    var idField = $('#id-field'),
        nameField = $('#name').hide(),
        numField = $('#num').hide(),
        projetField = $('#projet').hide(),
        srcField = $('#source').hide(),
        nb_visiteField = $('#nb_visite').hide(),
        noteField = $('#note').hide(),
        removeBtns = $('.remove-item-btn'),
        editBtn = $('#edit-btn').hide(),
        editBtns = $('.edit-item-btn');

  /*
    console.log(nb_visiteField.val());
    console.log(nameField.val());
    console.log(numField.val());
    console.log(projetField.val());
    console.log(srcField.val());
    console.log(noteField.val());*/
    // Sets callbacks to the buttons in the list
    refreshCallbacks();
/*
       noteeee: codePen : Yassine*/
       editBtn.click(function() {

         $.post("fct",
           {
             op: "edit",
             id_client:idField.val(),
             name: nameField.val(),
             phnumber: numField.val(),
             projet_id: projetField.children("option:selected").val(),
             notes: noteField.val(),
             source: srcField.children("option:selected").val(),
             nb_visite : nb_visiteField.val()
           }, function(data){
             console.log(data);
             if(data=='1'){
               var item = contactList.get('id', idField.val())[0];
               item.values({
                 id:idField.val(),
                 name: nameField.val(),
                 phnumber: numField.val(),
                 projet_name: projetField.children("option:selected").text(),
                 notes: noteField.val(),
                 source: srcField.children("option:selected").val(),
                 nb_visite : nb_visiteField.val()
               });
               clearFields();
               editBtn.hide();
             }else {
               alert('Une erreur est survenue');
             }

           });

       });
    function refreshCallbacks() {
      // Needed to add new buttons to jQuery-extended object
      editBtns = $(editBtns.selector);
      removeBtns = $(removeBtns.selector);

      removeBtns.click(function() {
        var itemId = $(this).closest('tr').find('.id').text();
        var itemValues = contactList.get('id', itemId)[0].values();
        if (confirm("êtes-vous sûr de supprimer le client "+itemValues.name)) {
          $.post("fct",
            {
              op: "supp",
              id_client:itemValues.id
            }, function(data){
              console.log(data);
              if(data=='1'){
                contactList.remove('id', itemId);
              }else {
                alert('Une erreur est survenue');
              }

            });

        }

      });

      editBtns.click(function() {
        editBtn.show();
        noteField.show();
        srcField.show();
        projetField.show();
        numField.show();
        nameField.show();
        nb_visiteField.show();

        var itemId = $(this).closest('tr').find('.id').text();
        var itemValues = contactList.get('id', itemId)[0].values();
        idField.val(itemValues.id);
        nameField.val(itemValues.name);
        numField.val(itemValues.phnumber);
        noteField.val(itemValues.notes);
        nb_visiteField.val(itemValues.nb_visite);
        document.querySelector('#source [value="' + itemValues.source + '"]').selected = true;
        $.post("fct",
          {
            op: "getid",
            project_name: itemValues.projet_name
          }, function(data){
            var values=JSON.parse(data);
            //console.log(values);
            document.querySelector('#projet [value="' + values['Code_pj'] + '"]').selected = true;
          });
       });

      }
      function clearFields() {
        nameField.val('');
        numField.val('');
        noteField.val('');
        nb_visiteField.val('');
        document.querySelector('#source [value="none"]').selected = true;
        document.querySelector('#projet [value="none"]').selected = true;
      }
    </script>

    </body>

    </html>
