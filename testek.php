
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calendar</title>

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


</head>

<body class="layout-default">


<!-- Modal Add Category -->
<div class="modal fade" tabindex="-1">
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

    <!-- FullCalendar -->
    <script src="assets/vendor/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>

</body>

</html>
