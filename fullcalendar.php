<?php
session_start();
$_SESSION['current_page']="calendar";
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
    <link type="text/css" href="assets/vendor/fullcalendar/fullcalendar.min.css" rel="stylesheet">

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

              <?php include 'haute_bar.php'; ?>

                <!-- Header Layout Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">


                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card card-body">
                                    <div id="calendar" data-toggle="fullcalendar"></div>
                                </div>
                            </div> <!-- end col -->

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

                                <!-- checkbox -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="drop-remove">
                                    <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                </div>



                            </div> <!-- end col-->
                        </div> <!-- end row -->
                    </div>



                </div>
                <!-- // END header-layout__content -->

            </div>
            <!-- // END header-layout -->

        </div>
        <!-- // END drawer-layout__content -->

<?php
include 'footer.php'; ?>

    <div class="mdk-drawer js-mdk-drawer" id="events-drawer" data-align="end">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>




                <small class="text-dark-gray px-3 py-1">
                    <strong>Thursday, 28 Feb</strong>
                </small>

                <div class="list-group list-group-flush">

                    <div class="list-group-item bg-light">
                        <div class="row">
                            <div class="col-auto d-flex flex-column">
                                <small>12:30 PM</small>
                                <small class="text-dark-gray">2 hrs</small>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column flex">
                                    <a href="#" class="text-body"><strong class="text-15pt">Marketing Team Meeting</strong></a>

                                    <small class="text-muted d-flex align-items-center"><i class="material-icons icon-16pt mr-1">location_on</i> 16845 Hicks Road</small>


                                </div>
                                <div class="avatar-group mt-2">

                                    <div class="avatar avatar-xs">
                                        <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>

                                    <div class="avatar avatar-xs">
                                        <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>

                                    <div class="avatar avatar-xs">
                                        <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <small class="text-dark-gray px-3 py-1">
                    <strong>Wednesday, 27 Feb</strong>
                </small>

                <div class="list-group list-group-flush">

                    <div class="list-group-item bg-light">
                        <div class="row">
                            <div class="col-auto d-flex flex-column">
                                <small>07:48 PM</small>
                                <small class="text-dark-gray">30 min</small>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column flex">
                                    <a href="#" class="text-body"><strong class="text-15pt">Call Alex</strong></a>


                                    <small class="text-muted d-flex align-items-center"><i class="material-icons icon-16pt mr-1">phone</i> 202-555-0131</small>

                                </div>



                            </div>
                        </div>
                    </div>

                </div>

                <small class="text-dark-gray px-3 py-1">
                    <strong>Tuesday, 26 Feb</strong>
                </small>

                <div class="list-group list-group-flush">

                    <div class="list-group-item bg-light">
                        <div class="row">
                            <div class="col-auto d-flex flex-column">
                                <small>03:13 PM</small>
                                <small class="text-dark-gray">2 hrs</small>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column flex">
                                    <a href="#" class="text-body"><strong class="text-15pt">Design Team Meeting</strong></a>

                                    <small class="text-muted d-flex align-items-center"><i class="material-icons icon-16pt mr-1">location_on</i> 16845 Hicks Road</small>


                                </div>
                                <div class="avatar-group mt-2">

                                    <div class="avatar avatar-xs">
                                        <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>

                                    <div class="avatar avatar-xs">
                                        <img src="assets/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>

                                    <div class="avatar avatar-xs">
                                        <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>

                                    <div class="avatar avatar-xs">
                                        <img src="assets/images/stories/256_rsz_clem-onojeghuo-193397-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <small class="text-dark-gray px-3 py-1">
                    <strong>Monday, 25 Feb</strong>
                </small>

                <div class="list-group list-group-flush">

                    <div class="list-group-item bg-light">
                        <div class="row">
                            <div class="col-auto d-flex flex-column">
                                <small>12:30 PM</small>
                                <small class="text-dark-gray">2 hrs</small>
                            </div>
                            <div class="col d-flex">
                                <div class="d-flex flex-column flex">
                                    <a href="#" class="text-body"><strong class="text-15pt">Call Wendy</strong></a>


                                    <small class="text-muted d-flex align-items-center"><i class="material-icons icon-16pt mr-1">phone</i> 202-555-0131</small>

                                </div>


                                <div class="avatar avatar-xs">
                                    <img src="assets/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings></app-settings>
    </div>

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

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>




    <!-- Add New Event MODAL -->
    <div class="modal fade" id="event-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Event</h4>
                </div>
                <div class="modal-body pt-3 pr-4 pl-4">
                </div>
                <div class="text-right pb-4 pr-4">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success save-event">Create event</button>
                    <button type="button" class="btn btn-danger delete-event" data-dismiss="modal">Delete</button>
                </div>
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->

    <!-- Modal Add Category -->
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

                </div> <!-- end modal-body-->
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>
    <!-- end modal-->

    <!-- jQuery UI (for draggable) -->
    <script src="assets/vendor/jquery-ui.min.js"></script>

    <!-- Moment.js -->
    <script src="assets/vendor/moment.min.js"></script>




    <script>
    var res="a";
    var show=[{
        title: "Hey!",
        start: new Date($.now() + 158e6),
        className: "bg-warning"
    }, {
        title: "See John Deo",
        start: new Date($.now()),
        end: new Date($.now()),
        className: "bg-success"
    }, {
        title: "Meet John Deo",
        start: new Date($.now() + 168e6),
        className: "bg-info"
    }, {
        title: "Buy a Theme",
        start: new Date($.now() + 338e6),
        className: "bg-primary"
    }];
  var commerciaux='<?php
        require 'LBD.php';
        $req=$bdd->query("SELECT ID_cm, CName, Email FROM Commerciaux WHERE CName !=''");
        while($dn = $req->fetch())
        { ?> <option value="<?php print_r($dn['ID_cm']); ?>" ><?php echo $dn['CName']." , ".$dn['Email']; ?></option>\n<?php } ?> '


  var clients='<?php
    require 'LBD.php';
    $req=$bdd->query("SELECT * FROM Clients");
    while($dn = $req->fetch())
    { ?> <option value="<?php print_r($dn['ID_client']); ?>" ><?php echo $dn['Name']." , ".$dn['phnumber']." , ".$dn['Notes']." , ".$dn['Source']; ?></option>\n<?php } ?> '

    var projets='<?php
      require 'LBD.php';
      $req=$bdd->query("SELECT *  FROM Projets");
      while($dn = $req->fetch())
      { ?> <option value="<?php print_r($dn['Code_pj']); ?>" ><?php echo $dn['ProjetName']." , ".$dn['type_p']." , ".$dn['Etages']; ?></option>\n<?php } ?> '
/*$.post("/AGC/test.php",
      {
        op: "test"
      },
      function(data,status){
        res=data;
      });*/

    //  console.log(res);

    </script>

    <!-- FullCalendar -->
    <script src="assets/vendor/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>

    <!-- Select2 -->
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/js/select2.js"></script>



</body>

</html>
