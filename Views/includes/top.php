<div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                         </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                      <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user-o"></i>
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span><?php  echo $this->session->client_fname; ?>  <?php  echo $this->session->client_lname; ?></span>
                                                    <p class="text-muted small">
                                                         <?php  echo $this->session->client_company; ?>
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <!-- view -->
                                                    <a href="<?php echo base_url(); ?>myaccount" class="btn-sm active">View Profile</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </header>
                </div>