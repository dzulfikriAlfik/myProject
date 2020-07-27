               <!-- Collect the nav links, forms, and other content for toggling -->
                <div id="social-menu-navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left visible-lg visible-md">
                        <?php
                        $topmenu=mysql_query("SELECT * FROM menu where position='Top' AND aktif='Ya' ORDER BY urutan ASC");
                        while($me=mysql_fetch_array($topmenu)){
                            echo '<li class="color-theme"><a href="'.$me['link'].'">'.$me['nama_menu'].' <span class="nav-line"></span></a></li>';
                        }
                        ?>
                    </ul>

                    <ul class="nav navbar-nav navbar-right visible-lg visible-md visible-sm">
                        <li class="search dropdown">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li>
                                    <form class="navbar-form navbar-right" role="search" method="POST" action="hasil-pencarian.html">
                                        <div class="form-group">
                                            <input type="text" name="kata" class="form-control" placeholder="Search" required="required" />
                                            <button type="submit" class="btn-search"><i class="icon-search"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li class="social-icons">
                            <ul class="list-inline clearfix">
								<?php
									$sosmedd = mysql_query("SELECT * FROM identitas");
									$ssd = mysql_fetch_array($sosmedd);
									$pecahd = explode(",", $ssd['facebook']);
									$fb1 = $pecahd[0];
									$tw1 = $pecahd[1];
									$go1 = $pecahd[2];
									$yt1 = $pecahd[3];
								?>
                                <li class="tooltip_item fb-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="facebook">
                                    <div class="mask-background animated lightSpeedIn" data-animation="lightSpeedIn"></div>
                                    <a href="<?php echo"$fb1"; ?>"><i class="zoc-facebook"></i></a>
                                </li>

                                <li class="tooltip_item twitter-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="twitter">
                                    <div class="mask-background animated lightSpeedIn" data-animation="lightSpeedIn"></div>
                                    <a href="<?php echo"$tw1"; ?>"><i class="zoc-twitter"></i></a>
                                </li>

                                <li class="tooltip_item googleplus-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="google+">
                                    <div class="mask-background animated lightSpeedIn"></div>
                                    <a href="<?php echo"$go1"; ?>"><i class="zoc-gplus"></i></a>
                                </li>

                                <li class="tooltip_item youtube-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="youtube">
                                    <div class="mask-background animated lightSpeedIn"></div>
                                    <a href="<?php echo"$yt1"; ?>"><i class="zoc-youtube"></i></a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                