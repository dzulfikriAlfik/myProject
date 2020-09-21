 <div id="main-menu-navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
						<?php
								$menu = mysql_query("SELECT * FROM menu where id_parent='0' AND position = 'Bottom' AND aktif='Ya' ORDER BY urutan ASC");
								while($dataMenu = mysql_fetch_assoc($menu)){
									$menu_id = $dataMenu['id_menu'];
									$submenu = mysql_query("SELECT * FROM menu WHERE id_parent='$menu_id' AND aktif='Ya' ORDER BY urutan ASC");
									if(mysql_num_rows($submenu) == 0){
										echo '<li class="color-theme"><a href="'.$dataMenu['link'].'">'.$dataMenu['nama_menu'].' <span class="nav-line"></span></a></li>';
									}else{
										echo '
										<li class="dropdown color-theme active">
											<a href="'.$dataMenu['link'].'" class="dropdown-toggle" data-toggle="dropdown">'.$dataMenu['nama_menu'].' </a>
											<ul class="dropdown-menu" data-dropdownanimation="true" data-animation="fadeInLeft">';
											while($dataSubmenu = mysql_fetch_assoc($submenu)){
												echo '<li><a href="'.$dataSubmenu['link'].'">'.$dataSubmenu['nama_menu'].'</a></li>';
											}
										echo '
											</ul>
										</li>
										';
									}
								}
							?>
                    </ul>


</div>