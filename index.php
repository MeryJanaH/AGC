<?php
session_start();
$_SESSION['current_page']="index";
if(isset($_SESSION['login']) and $_SESSION['login']=="false" or !isset($_SESSION['login']))
{
      header('Location: login');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calendrier</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <link href="assets/images/logo.png" rel="shortcut icon" type="image/x-icon" />
    <!-- Simplebar -->
    <link type="text/css" href="assets/vendor/simplebar.min.css" rel="stylesheet">


    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="assets/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">


    <!-- FullCalendar -->
    <link type="text/css" href="assets/vendor/fullcalendar/lib/main.css" rel="stylesheet">

    <!-- Select2 -->
    <link type="text/css" href="assets/css/vendor-select2.css" rel="stylesheet">
    <link type="text/css" href="assets/css/vendor-select2.rtl.css" rel="stylesheet">
    <link type="text/css" href="assets/vendor/select2/select2.min.css" rel="stylesheet">


</head>

<body class="layout-default">
    <div class="preloader"></div>

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
        <div class="mdk-drawer-layout__content">

            <!-- Header Layout -->
            <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

              <?php include 'include/haute_bar.php'; ?>

                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">



<!--   <div class="container-fluid page__container">
      <div class="row">
          <div class="col-lg-9">
              <div class="card card-body">-->
                    <div class="container-fluid page__container">
                        <div >
                            <div >
                                <div class="card">
                                    <div id="calendar" data-toggle="fullcalendar"></div>
                                </div>
                            </div> <!-- end col -->
<!--
                            <div class="col-lg-3">
                                <a href="" data-toggle="modal" data-target="#add-category" class="btn btn-primary btn-block"><i class="material-icons">today</i> New Event</a>
                                <hr>
                                <div id="external-events">
                                    <p class="text-muted">Drag and drop your event or click in the calendar.</p>
                                    <div class="external-event bg-success" data-class="bg-success">
                                        <i class="mr-2 material-icons">drag_handle</i>
                                        <span class="external-event__title">New Theme Release</span>
                                    </div>
                                    <div class="external-event bg-info" data-class="bg-info">
                                        <i class="mr-2 material-icons">drag_handle</i>
                                        <span class="external-event__title">My Event</span>
                                    </div>
                                    <div class="external-event bg-warning" data-class="bg-warning">
                                        <i class="mr-2 material-icons">drag_handle</i>
                                        <span class="external-event__title">Meet manager</span>
                                    </div>
                                    <div class="external-event bg-danger" data-class="bg-danger">
                                        <i class="mr-2 material-icons">drag_handle</i>
                                        <span class="external-event__title">Create New theme</span>
                                    </div>
                                </div>

                                - checkbox -
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="drop-remove">
                                    <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                </div>


                            </div> end col-->
                        </div> <!-- end row -->
                    </div>

                </div>
                <!-- // END header-layout__content -->

            </div>
            <!-- // END header-layout -->

        </div>
        <!-- // END drawer-layout__content -->

<?php
include 'include/left_side.php'; ?>



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

    <!-- Range Slider -->
    <script src="assets/vendor/ion.rangeSlider.min.js"></script>
    <script src="assets/js/ion-rangeslider.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- App Settings (safe to remove)-->
    <script src="assets/js/app-settings.js"></script>




    <!-- Add New Event MODAL -->
    <div class="modal fade" id="event-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Ajouter un nouveau événement</h4>
                </div>
                <div class="modal-body pt-3 pr-4 pl-4">

                  <input type="hidden" id="startTime"/>
            <!--  <input type="hidden" id="endTime"/> -->

                  <form id="form1">    <div class="row">       <div class="col-12">
                      <div class="form-group">
                       <label class="control-label" for="select01">Commercial :</label>
                            <select id="select01" data-toggle="select" class="form-control" name="commercial">
                              <?php
                              require 'BDD/LBD.php';
                              $req=$bdd->query("SELECT ID_cm, CName, Email FROM Commerciaux WHERE CName !=''");
                              while($dn = $req->fetch())
                              { ?> <option value="<?php print_r($dn['ID_cm']); ?>" ><?php echo $dn['CName']." , ".$dn['Email']; ?></option><?php } ?>
                            </select>
                      <div class="form-group"></br>
                       <label class="control-label" for="select02">Client :</label>
                         <select id="select02" data-toggle="select" class="form-control" name="client">
                           <?php
                            require 'BDD/LBD.php';
                            $req=$bdd->query("SELECT * FROM Clients");
                            while($dn = $req->fetch())
                            { ?> <option value="<?php print_r($dn['ID_client']); ?>" ><?php echo $dn['Name']." , ".$dn['phnumber']; ?></option><?php } ?>
                          </select>
                        <div class="form-group"></br>
                        <label class="control-label" for="select03">Projet :</label>
                          <select id="select03" data-toggle="select" class="form-control" name="projet">
                            <?php
                              require 'BDD/LBD.php';
                              $req=$bdd->query("SELECT *  FROM Projets");
                              while($dn = $req->fetch())
                              { ?> <option value="<?php print_r($dn['Code_pj']); ?>" ><?php echo $dn['ProjetName']." , ".$dn['type_p']." , ".$dn['Etages']; ?></option><?php } ?>
                         </select>
                        </div>
                      </div>
                     </div>
                  </div>

                 <div class="col-12"></br>
                    <label class="control-label">Description :</label>
                    <input class="form-control" placeholder="Ajouter une description" type="text" id="desc" name="description" />
                 </div>

                 <div class="col-12">
                   <div class="form-group"></br>
                      <label class="control-label">Category :</label>
                      <select class="form-control custom-select" name="category" id="category">
                         <option value="bg-danger">Annulé</option>
                         <option value="bg-success">Venu</option>
                         <option value="bg-primary">Prévu</option>
                      </select>
                  </div>
              </div>
              <div class="col-12">
                <div class="form-group"></br>
                   <label class="control-label">Type de visite :</label>
                   <select class="form-control custom-select" name="category" id="type">
                      <option value="Bureau">Bureau</option>
                      <option value="Chantier">Chantier</option>
                      <option value="Appel">Appel</option>
                      <option value="Vente">Vente</option>
                   </select>
               </div>
           </div>
            </div>
        </form>
      </div>

                <div class="text-right pb-4 pr-4">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-success save-event" id="submitButton">Créer</button>
                  <!--  <button type="button" class="btn btn-danger delete-event" data-dismiss="modal">Delete</button>-->
                </div>
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->

    <!-- Edit New Event MODAL -->
    <div class="modal fade" id="event-edit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modifier un événement</h4>
                </div>
                <div class="modal-body pt-3 pr-4 pl-4">

                  <input type="hidden" id="startTime2"/>
        <!--      <input type="hidden" id="endTime2"/>  -->

                  <form id="form2">    <div class="row">     <div class="col-12">
                      <div class="form-group">
                       <label class="control-label" for="commercial">Commercial :</label>
                            <select id="commercial" data-toggle="select" class="form-control" name="commercial">
                              <?php
                              require 'BDD/LBD.php';
                              $req=$bdd->query("SELECT ID_cm, CName, Email FROM Commerciaux WHERE CName !=''");
                              while($dn = $req->fetch())
                              { ?> <option value="<?php print_r($dn['ID_cm']); ?>" ><?php echo $dn['CName']." , ".$dn['Email']; ?></option><?php } ?>
                            </select>
                      <div class="form-group"></br>
                       <label class="control-label" for="select02">Client :</label>
                         <select id="client" data-toggle="select" class="form-control" name="client">
                           <?php
                            require 'BDD/LBD.php';
                            $req=$bdd->query("SELECT * FROM Clients");
                            while($dn = $req->fetch())
                            { ?> <option value="<?php print_r($dn['ID_client']); ?>"  ><?php echo $dn['Name']." , ".$dn['phnumber']; ?></option><?php } ?>
                          </select>
                        <div class="form-group"></br>
                        <label class="control-label" for="select03">Projet :</label>
                          <select id="projet" data-toggle="select" class="form-control" name="projet">
                            <?php
                              require 'BDD/LBD.php';
                              $req=$bdd->query("SELECT *  FROM Projets");
                              while($dn = $req->fetch())
                              { ?> <option value="<?php print_r($dn['Code_pj']); ?>" ><?php echo $dn['ProjetName']." , ".$dn['type_p']." , ".$dn['Etages']; ?></option><?php } ?>
                         </select>
                        </div>
                      </div>
                     </div>
                  </div>

                 <div class="col-12"></br>
                    <label class="control-label">Description :</label>
                    <input class="form-control" placeholder="Ajouter une description" type="text" id="description" name="description" />
                 </div>

                 <div class="col-12">
                   <div class="form-group"></br>
                      <label class="control-label">Category :</label>
                      <select class="form-control custom-select" name="category" id="etat">
                         <option value="bg-danger">Annulé</option>
                         <option value="bg-success">Venu</option>
                         <option value="bg-primary">Prévu</option>
                      </select>
                  </div>
              </div>
              <div class="col-12">
                <div class="form-group"></br>
                   <label class="control-label">Type de visite :</label>
                   <select class="form-control custom-select" name="category" id="visite">
                      <option value="Bureau">Bureau</option>
                      <option value="Chantier">Chantier</option>
                      <option value="Vente">Vente</option>
                      <option value="Appel">Appel</option>
                   </select>
               </div>
           </div>
            </div>
        </form>
      </div>

                <div class="text-right pb-4 pr-4">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-success " id="modifier">Modifier</button>
                  <button type="button" class="btn btn-danger delete-event" id="DELETE" data-dismiss="modal">Supprimer</button>
                </div>
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->

    <!-- Modal Add Category
    <div class="modal fade" id="add-category" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add a category</h4>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="form-group">
                            <label class="control-label">Category Name</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Choose Category Color</label>
                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                <option value="primary">Primary</option>
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="warning">Warning</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                    </form>

                    <div class="text-right">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary ml-1 save-category" data-dismiss="modal">Save</button>
                    </div>

                </div> - end modal-body-
            </div> - end modal-content-
        </div> - end modal dialog-
    </div>-->
    <!-- end modal-->





    <!-- jQuery UI (for draggable) -->
    <script src="assets/vendor/jquery-ui.min.js"></script>

    <!-- Moment.js -->
    <script src="assets/vendor/moment.min.js"></script>


    <!-- Select2 -->
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/js/select2.js"></script>

    <script>


  /*  $.post("fct_calend.php",
      {
        op: "show",
        comm: commercial,
        client: client,
        projet: projet,
        titre: titre,
        description: description,
        start:startTime,
        end: endTime,
        c: category
      });*/

    </script>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

    <!-- FullCalendar -->
    <script src="assets/vendor/fullcalendar/lib/main.js"></script>
  <!--   <script src="assets/js/test.js"></script>-->

<script src='assets/vendor/fullcalendar/lib/locales/fr.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          locale: 'fr',
          selectable: true,
          editable: true,
          droppable: true,
          slotDuration: "00:30:00",
          slotMinTime: "08:00:00",
          slotMaxTime: "18:00:00",
          initialView:"dayGridMonth",
          navLinks:true,
          allDaySlot:false,
          handleWindowResize: true,
          aspectRatio: 1,
          height: $(window).height() - 10,
          themeSystem: 'bootstrap',
          headerToolbar: {
            left: 'prev,next',/* today*/
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listMonth'/*,timeGridDay,listMonth*/
          },
          weekNumbers: false,
          dayMaxEvents: true, // allow "more" link when too many events
          selectLongPressDelay:500,
          longPressDelay:500,
          expandRows:true,
          events: [
            <?php
            require 'BDD/LBD.php';
            $req=$bdd->query("SELECT * FROM Calendrier ");
            while($dn = $req->fetch())
            { ?>  {
               id: <?php print_r($dn['id']) ?>,
               title: "<?php
                      $rq=$bdd->query("SELECT Name,phnumber,Projets.ProjetName FROM Clients,Projets,Calendrier WHERE Clients.ID_client=". $dn['ID_client']." AND Calendrier.id=". $dn['id']." AND Projets.Code_pj=Calendrier.Code_pj");
                      $res = $rq->fetch();
               print_r($res['Name']." , ".$res['phnumber']." , ". $res['ProjetName']); ?>",
               start: new Date("<?php print_r($dn['date_tdebut']) ?>"),
               classNames: "<?php print_r($dn['Category']) ?>"
            }, <?php } ?>
          ],
          select: function(info) {

            $('#event-modal #startTime').val(info.startStr);
          //$('#event-modal #endTime').val(info.endStr);
            $('#event-modal').modal('toggle');
            $('#submitButton').unbind('click').on('click', function(e){
                 // We don't want this to act as a link so cancel the link action
                 e.preventDefault();
                 $("#event-modal").modal('hide');
                 var startTime = $('#startTime').val();
                 //var endTime = $('#endTime').val();
                 var commercial = $("#select01").children("option:selected").val();
                 var client = $("#select02").children("option:selected").val();
                 var projet = $("#select03").children("option:selected").val();
                 var category = $("#category").children("option:selected").val();
                 var visite = $("#type").children("option:selected").val();
                 var description = $("#desc").val();

                 calendar.addEvent({
                    id:<?php $rq=$bdd->query("SELECT id FROM `Calendrier` ORDER BY `id` DESC LIMIT 1");
                        if ($res = $rq->fetch()) {
                          print_r(intval($res['id'])+1);
                        }else {
                          echo 1;
                        }
                         ?>,
                     title: $("#select02").children("option:selected").text()+ " , "+$("#select03").children("option:selected").text(),
                     start: startTime,
                     classNames: category,
                     allDay:false
                 });

                 $.post("fct_calend",
                   {
                     op: "add",
                     comm: commercial,
                     client: client,
                     projet: projet,
                     description: description,
                     start:startTime,
                     //end: endTime,
                     visite:visite,
                     category: category
                   }, function(data, status){
                  //location.reload();
                });
             });
          },
          eventClick: function(info) {
            //  alert('Titre: ' + info.event.title +'\nCommercial: ' + info.event.comm +'\nClient: ' + info.event.client +'\nProjet: ' + info.event.projet+'\nDescription: ' + info.event.description+'\nTemps: \n   -De : '+info.event.start+'\n   -Ä : '+info.event.end);
            $('#event-edit #startTime2').val(info.event.startStr);
            //$('#event-edit #endTime').val(info.event.endStr);

            var values;
            $.post("fct_calend",
              {
                op: "get",
                id: info.event.id
              }, function(json){
                values=JSON.parse(json);
                //console.log(values);
           });

            setTimeout(function(){
              //console.log(values['Visite']);

              /*$("#commercial").children("option:selected").val()=
              $("#client").children("option:selected").val()=
              $("#projet").children("option:selected").val()=
              $("#etat").children("option:selected").val()=*/

              document.querySelector('#commercial [value="' + values['ID_cm'] + '"]').selected = true;
              var comm = document.querySelector('#commercial [value="' + values['ID_cm'] + '"]').innerText ;
              document.querySelector('#select2-commercial-container ').innerText = comm;

              document.querySelector('#client [value="' + values['ID_client'] + '"]').selected = true;
              var client = document.querySelector('#client [value="' + values['ID_client'] + '"]').innerText ;
              document.querySelector('#select2-client-container ').innerText = client;

              document.querySelector('#projet [value="' + values['Code_pj'] + '"]').selected = true;
              var projet = document.querySelector('#projet [value="' + values['Code_pj'] + '"]').innerText ;

              document.querySelector('#select2-projet-container ').innerText = projet;

              document.querySelector('#etat [value="' + values['Category'] + '"]').selected = true;
              document.querySelector('#visite [value="' + values['Visite'] + '"]').selected = true;

              document.getElementById("description").value = values['Description'];
              //$('#createEventModal #when').text(mywhen);
              $('#event-edit').modal('toggle');

              //console.log($("#commercial").children("option:selected").val());
            }, 500);


            $('#modifier').unbind('click').on('click', function(e){
                 // We don't want this to act as a link so cancel the link action
                 e.preventDefault();
                 $("#event-edit").modal('hide');
                 var startTime = $('#startTime2').val();
                // var endTime = $('#endTime2').val();
                 var commercial = $("#commercial").children("option:selected").val();
                 var client = $("#client").children("option:selected").val();
                 var projet = $("#projet").children("option:selected").val();
                 var category = $("#etat").children("option:selected").val();
                 var visite = $("#visite").children("option:selected").val();
                 var description = $("#description").val();
                 var id_calendar=info.event.id;
                 
                 //console.log(id_calendar);
                 //var event = calendar.getEventById( id_calendar );
                 info.event.setProp('title',$("#client").children("option:selected").text() + " , " + $("#projet").children("option:selected").text());
                 info.event.setProp('classNames', category);
                 //event.className= category;
                 //console.log($("#client").children("option:selected").text());
                 //console.log(category);
                 $.post("fct_calend",
                   {
                     op: "modif",
                     id: id_calendar,
                     commercial: commercial,
                     client: client,
                     projet: projet,
                     description: description,
                     start:startTime,
                     //end: endTime,
                     visite:visite,
                     category: category
                   }, function(data, status){
                     //alert(data);
                  //location.reload();
                });
             });

             $('#DELETE').unbind('click').on('click', function(e){
               $.post("fct_calend",
                 {
                   op: "sup",
                   id: info.event.id
                 }, function(data, status){
                   //alert(info.event.id+"removed");
                info.event.remove();
              });

            });
              // change the border color just for fun
              info.el.style.borderColor = 'red';
            },
          /*eventResize: function(info) {
            //alert(info.event.title + " end is now " + info.event.end.toString());
            //alert(info.event.title + " start is now " + info.event.start.toString());

            if (!confirm("Sûr de changer la période ?")) {
              info.revert();
            }else {
              $.post("fct_calend",
                {
                  op: "time",
                  id: info.event.id,
                  start:info.event.start.toString(),
                  end: info.event.end.toString()
                }, function(data, status){
                  //alert(data);
             });
            }
          },*/
          eventDrop: function(info) {
            //alert(info.event.title + " was dropped on " + info.event.start.toString());

            if (!confirm("Sûr de mettre ce changement ?")) {
              info.revert();
            }else {
              $.post("fct_calend",
                {
                  op: "time",
                  id: info.event.id,
                  start:info.event.startStr
          //        end: info.event.end.toString()
                }, function(data, status){
                  //alert(data);
             });
            }
          }
          });

        calendar.render();
$(document).ready(function(){
  setTimeout(function(){

    $(".fc-timeGridWeek-button").click();

},10);
});
      });

    </script>

</body>

</html>
