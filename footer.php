
<!-- // barre bleu -->
<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start" style="background-color: Navy;">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark sidebar-left simplebar" data-simplebar>
            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account flex-shrink-0">
                <a href="/" class="flex d-flex align-items-center text-underline-0 text-body">
                    <span class="mr-3">
                        <img src="assets/images/logo.png" width="43" height="43" alt="avatar">
                    </span>
                    <span class="flex d-flex flex-column">
                        <strong style="font-size: 1.125rem;">GUESSPROMO</strong>
                    </span>
                </a>
                <div class="dropdown ml-auto">
                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">keyboard_arrow_down</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-item-text dropdown-item-text--lh">
                            <div><strong><?php echo $_SESSION['name'] ?></strong></div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item active" href="/">Calendrier</a>
                        <a class="dropdown-item" href="Modifications">Modifier le compte</a>
                        <div class="dropdown-divider"></div>
                      <form action="login" method="POST">
                        <button name="decnx" class="dropdown-item">Déconnexion</button>
                      </form>
                    </div>
                </div>
            </div>


            <ul class="nav nav-tabs sidebar-tabs flex-shrink-0" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="sm-menu-tab" href="#sm-menu" data-toggle="tab" role="tab" aria-controls="sm-menu" aria-selected="true">Menu</a></li>
            </ul>
            <div class="tab-content">
                <div id="sm-menu" class="tab-pane show active" role="tabpanel" aria-labelledby="sm-menu-tab">
                    <ul class="sidebar-menu flex">
                      <?php if($_SESSION['current_page']=="index"){?>
                        <li class="sidebar-menu-item active">
                      <?php }else{ ?>
                        <li class="sidebar-menu-item ">
                      <?php } ?>
                            <a class="sidebar-menu-button" href="/">
                              <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">date_range</i>
                                <span class="sidebar-menu-text">Calendrier</span>
                            </a>
                        </li>
                        <?php if($_SESSION['current_page']=="edit"){?>
                          <li class="sidebar-menu-item active">
                        <?php }else{ ?>
                          <li class="sidebar-menu-item ">
                        <?php } ?>
                                <a class="sidebar-menu-button" href="Modifications">
                                    <span class="sidebar-menu-text">Modifier le compte</span>
                                </a>
                                <?php
                                if($_SESSION['user']=="admin")
                                {
                                ?>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="Nouveau">
                                        <span class="sidebar-menu-text">Créer un compte</span>
                                    </a>
                                </li>
                                <?php
                               }
                                 ?>
                            </ul>
                        </li>
                      </li>
<?php

                          if($_SESSION['user']=="admin")
                           { ?>
                             <?php if($_SESSION['current_page']=="commerciaux"){?>
                               <li class="sidebar-menu-item active">
                             <?php }else{ ?>
                               <li class="sidebar-menu-item ">
                             <?php } ?>
                            <a class="sidebar-menu-button" href="Commerciaux">
                                <span class="sidebar-menu-text">Gestion des commerciaux</span>
                            </a>
                          <?php } ?>
                          <?php if($_SESSION['current_page']=="projets"){?>
                            <li class="sidebar-menu-item active">
                          <?php }else{ ?>
                            <li class="sidebar-menu-item ">
                          <?php } ?>
                            <a class="sidebar-menu-button" href="Projets">
                                <span class="sidebar-menu-text">Gestion des projets</span>
                            </a>
                            <?php if($_SESSION['current_page']=="clients"){?>
                              <li class="sidebar-menu-item active">
                            <?php }else{ ?>
                              <li class="sidebar-menu-item ">
                            <?php } ?>
                            <a class="sidebar-menu-button" href="Clients">
                                <span class="sidebar-menu-text">Gestion des clients</span>
                            </a>
                      </li>

                        <?php
                        if($_SESSION['user']=="admin")
                        {
                         if($_SESSION['current_page']=="Graphe"){?>
                          <li class="sidebar-menu-item active">
                        <?php }else{ ?>
                          <li class="sidebar-menu-item ">
                        <?php } ?>
                            <a class="sidebar-menu-button" href="Statistiques">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">donut_small</i>
                                <span class="sidebar-menu-text">Statistiques</span>
                            </a>
                        <?php } ?>
                    </ul>
                </div>

            <div class="mt-auto sidebar-p-a sidebar-b-t d-flex flex-column flex-shrink-0">
                  <p>
                    <form action="login" method="POST">
                      <button name="decnx" style="width: 100px;">Déconnexion</button>
                    </form>
                  </p>
            </div>

        </div>
    </div>
</div>
</div>
<!-- // END drawer-layout -->
