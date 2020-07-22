
<!-- Header -->

<div id="header" class="mdk-header js-mdk-header m-0" data-fixed data-effects="waterfall" data-retarget-mouse-scroll="false">
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-main navbar-light bg-white  pr-0" id="navbar" data-primary>
            <div class="container-fluid p-0">

                <!-- Navbar toggler -->
                <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                    <span class="material-icons">short_text</span>
                </button>

                <!-- Navbar Brand -->
                  <?php if($_SESSION['current_page']=="projets"){?>
                    <a class="navbar-brand flex ">
                    <span>Table des projets</span>
                  <?php }if($_SESSION['current_page']=="index"){?>
                    <a class="navbar-brand flex ">
                    <span>Calendrier</span>
                  <?php }if($_SESSION['current_page']=="commerciaux"){ ?>
                    <a  class="navbar-brand flex ">
                    <span>Table des commerciaux</span>
                  <?php }if($_SESSION['current_page']=="edit"){ ?>
                    <a  class="navbar-brand flex ">
                    <span>Modifier vos informations</span>
                  <?php }if($_SESSION['current_page']=="clients"){ ?>
                     <a class="navbar-brand flex ">
                     <span>Table de clients</span>
                 <?php }if($_SESSION['current_page']=="Graphe"){ ?>
                    <a class="navbar-brand flex ">
                    <span>Statistiques</span>
                  <?php } ?>
                </a>


                            <!-- Notif -->
                                    <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" data-caret="false" class="dropdown-toggle navbar-toggler navbar-toggler-company border-left d-flex align-items-center ml-navbar">
                                        <span class="rounded-circle">
                                            <span class="material-icons">business</span>
                                            <span class="badge badge-warning text-primary-dark rounded-circle badge-notifications">5</span>
                                        </span>
                                    </a>


                                    <div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                                        <div class="dropdown-item d-flex align-items-center py-2">
                                            <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                                            <a href="javascript:void(0)" class="text-muted"><small>Supprimer Tout</small></a>
                                        </div>
                                        <div class="navbar-notifications-menu__content" data-simplebar>
                                            <div class="py-2">

                                              <?php
                                              require 'LBD.php';
                                              function name_client($id){
                                                require 'LBD.php';
                                                $rq = $bdd->prepare(" SELECT Name FROM Clients WHERE ID_client=$id ");
                                                $rq->execute();
                                                $req = $rq->fetch();
                                                return $req['Name'];
                                              }

                                              $rq = $bdd->prepare(" SELECT * FROM Calendrier WHERE Category='bg-primary' ORDER BY date_tdebut ASC ");
                                              $rq->execute();
                                              WHILE($dn=$rq->fetch()){
                                                  $currentDateTime = date('Y-m-d H:i:s');
                                                  $last = date('Y-m-d H:i:s', strtotime($dn['date_tdebut']));


                                              $date1 = $currentDateTime;
                                              $date2 = $last;

                                              $hours = round(abs(strtotime($date2) - strtotime($date1))/3600,2);


                                              if($hours <= "16"){
                                                ?>
                                                  <div class="dropdown-item d-flex">
                                                      <div class="flex">
                                                          <b>NOTE :</b> Il reste around <?php echo floor($hours) ?> heurs pour le rendez-vous de <?php  echo name_client($dn['ID_client']); ?><br/> Pour plus de détails : <a href="">Cliquez ici</a><br>
                                                          <small class="text-muted"><?php echo date("h:i:sa") ?></small>
                                                      </div>
                                                  </div>
                                                <?php
                                                  }
                                              }
                                              ?>


                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="dropdown-item text-center navbar-notifications-menu__footer">Voir Tout</a>
                                    </div>
                                </div>

            </div>
        </div>

    </div>
</div>

<!-- // END Header -->
