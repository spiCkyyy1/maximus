
<template>
   <div class="wrap">
   <!--MAXIMUS MODALS-->
   <!--MCQ's-->
   <div id="mcqs-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="icon-close"></i>
            </button>
            <div class="modal-body">
               <div class="modal-title">
                  <i class="icon-note"></i>Assessment Test
               </div>
               <ul class="accordion mcqs-list th-list number drag-drop" id="faqs-list">
                  <li class="card mb-3 correct">
                     <div class="card-header">
                        <div class="row align-items-center">
                           <div class="col">
                              <div class="title">
                                 Est sit amet facilisis magna etiam?
                              </div>
                           </div>
                           <div class="col-auto">
                              <div class="drag-cursor"></div>
                           </div>
                        </div>
                     </div>
                     <!--.card-header-->
                     <div id="card-1">
                        <div class="card-body">
                           <div class="check_radio style-2 mb-2">
                              <div class="radio">
                                 <input type="radio" id="cr-r1" name="radio1">
                                 <label class="custom-label" for="cr-r1">One</label>
                              </div>
                           </div>
                           <div class="check_radio style-2 mb-2">
                              <div class="radio">
                                 <input type="radio" id="cr-r2" name="radio1" checked>
                                 <label class="custom-label" for="cr-r2">Two</label>
                              </div>
                           </div>
                           <div class="check_radio style-2">
                              <div class="radio">
                                 <input type="radio" id="cr-r3" name="radio1">
                                 <label class="custom-label" for="cr-r3">Two</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="card mb-3 incorrect">
                     <div class="card-header">
                        <div class="row align-items-center">
                           <div class="col">
                              <div class="title">
                                 Est sit amet facilisis magna etiam?
                              </div>
                           </div>
                           <div class="col-auto">
                              <div class="drag-cursor"></div>
                           </div>
                        </div>
                     </div>
                     <!--.card-header-->
                     <div id="card-1">
                        <div class="card-body">
                           <div class="check_radio style-2 mb-2">
                              <div class="radio">
                                 <input type="radio" id="cr-r1a" name="radio2" checked>
                                 <label class="custom-label" for="cr-r1a">One</label>
                              </div>
                           </div>
                           <div class="check_radio style-2 mb-2">
                              <div class="radio">
                                 <input type="radio" id="cr-r2a" name="radio2">
                                 <label class="custom-label" for="cr-r2a">Two</label>
                              </div>
                           </div>
                           <div class="check_radio style-2">
                              <div class="radio">
                                 <input type="radio" id="cr-r3a" name="radio2">
                                 <label class="custom-label" for="cr-r3a">Two</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
   <div class="ux-module main-dashboard style-1">
   <!--Add 'style-n' class here for different looks-->
   <!--UX MODULE HOLDER-->
   <div class="ux-module-holder">
      <aside id="aside-left" class="left">
         <!--ASIDE HEADER-->
         <div class="aside-header">
            <div class="logo">
               <inertiaLink :href="route('dashboard')" class="logo-img"></inertiaLink>
            </div>
            <div class="left-aside-toggle">
               <div class="btn-toggle"><span><i class="icon-close fa-2x"></i></span></div>
            </div>
         </div>
         <!--ASIDE BODY-->
         <div class="aside-body">
            <ul class="sec-holder">
               <li class="heading">Dashboard</li>
               <li><a href="<?php echo $base_url; ?>index.php"><span><i class="icon-speedometer"></i></span>Dashboard</a></li>
               <li class="heading">Candidates</li>
               <li><a href="<?php echo $base_url; ?>phonebook.php"><span><i class="icon-user"></i></span>All Candidates</a></li>
               <li><a href="<?php echo $base_url; ?>trash.php"><span><i class="icon-user-following"></i></span>Selected Candidates</a></li>
               <li><a href="<?php echo $base_url; ?>faqs.php"><span><i class="icon-user-unfollow"></i></span>Rejected Candidates</a></li>
               <li class="heading">Account</li>
               <li><a href="<?php echo $base_url; ?>profile-settings.php"><span><i class="icon-settings"></i></span>Profile</a></li>
               <li><a href="<?php echo $base_url; ?>login.php"><span><i class="icon-logout"></i></span>Logout</a></li>
               <!--Dropdown 1-->
               <li class="sub-menu">
                  <a class="collapsed" data-toggle="collapse" href="#dropdown1"><span><i class="icon-settings"></i></span>Dropdown</a>
                  <ul class="collapse" data-parent="#aside-left" id="dropdown1">
                     <li><a href="">...</a></li>
                     <li><a href="">...</a></li>
                     <!--Dropdown 2-->
                     <li class="sub-menu">
                        <a class="collapsed" data-toggle="collapse" href="#dropdown2">Dropdown</a>
                        <ul class="collapse" id="dropdown2">
                           <li><a href="">...</a></li>
                           <li><a href="">...</a></li>
                           <li><a href="">...</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
         <!--ASIDE FOOTER-->
      </aside>
      <main>
         <header class="main-header">
            <div class="container">
               <nav class="navbar row p-0">
                  <div class="col-auto left-aside-toggle">
                     <div class="btn-toggle"><i class="icon-menu"></i></div>
                  </div>
                  <div class="col hide">
                     <form>
                        <div class="searchbar input-group input-group-merge input-group-flush d-none d-sm-flex">
                           <input type="search" class="form-control form-control-prepended" placeholder="Search">
                           <div class="input-group-prepend">
                              <div class="input-group-text"><i class="icon-magnifier fa-lg"></i></div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-auto">
                     <ul class="nav-menu">
                        <!--NOTIFICATIONS DROPDOWN-->
                        <li class="nav-item dropdown dropdown-lg notifications-dropdown arrow-hide hide">
                           <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                              <div class="notifications-icon">
                                 <i class="fas fa-bell fa-2x"></i>
                                 <span>08</span>
                              </div>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <!--Header-->
                              <div class="header">
                                 <div class="banner">
                                    <div class="meta">
                                       <h2 class="heading">Notifications</h2>
                                       <p class="description mt-1 mb-0">You have <span class="strong">21</span> unread notifications.</p>
                                    </div>
                                 </div>
                                 <ul class="nav nav-pills nav-justified p-2 d-none">
                                    <li class="nav-item">
                                       <a class="nav-link active" data-toggle="tab" href="#tab-1">
                                       <i class="icon-bubble fa-lg fa-r"></i>Messages<span class="strong ml-1">10</span>
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                              <!--Body-->
                              <div>
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1">
                                       <div class="body th-scrollbar">
                                          <div class="notification-box flag">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <a href="" class="media">
                                                      <div class="media-object pr-3">
                                                         <div class="avatar avatar-sm">
                                                            <img src="/admin/img/icons/avatar.png" class="avatar-img rounded-circle" alt="...">
                                                         </div>
                                                      </div>
                                                      <div class="media-body align-self-center">
                                                         <div class="meta">
                                                            <div class="heading">Jhon Doe</div>
                                                            <p class="sec-text mt-1 mb-0">
                                                               Ref::SALESREP7887 - Laboris nisi ut aliquip ex ea commodo consequat.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </a>
                                                </div>
                                                <div class="col-auto">
                                                   <div class="time-date small text-muted">6:25 PM</div>
                                                   <div class="controller">
                                                      <div class="dropdown dropdown-ellipses">
                                                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                         <i class="icon-options-vertical"></i>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope"></i>Mark as Read
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope-open"></i>Mark as Unread
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-flag"></i>Mark as Flagged
                                                            </a>
                                                            <a href="#delete-modal" class="dropdown-item" data-toggle="modal">
                                                            <i class="icon-trash"></i>Delete
                                                            </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="notification-box unread">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <a href="" class="media">
                                                      <div class="media-object pr-3">
                                                         <div class="avatar avatar-sm">
                                                            <img src="/admin/img/icons/avatar-fm.png" class="avatar-img rounded-circle" alt="...">
                                                         </div>
                                                      </div>
                                                      <div class="media-body align-self-center">
                                                         <div class="meta">
                                                            <div class="heading">Jane Doe</div>
                                                            <p class="sec-text mt-1 mb-0">
                                                               Ref::SALESREP7887 - Laboris nisi ut aliquip ex ea commodo consequat.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </a>
                                                </div>
                                                <div class="col-auto">
                                                   <div class="time-date small text-muted">6:25 PM</div>
                                                   <div class="controller">
                                                      <div class="dropdown dropdown-ellipses">
                                                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                         <i class="icon-options-vertical"></i>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope"></i>Mark as Read
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope-open"></i>Mark as Unread
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-flag"></i>Mark as Flagged
                                                            </a>
                                                            <a href="#delete-modal" class="dropdown-item" data-toggle="modal">
                                                            <i class="icon-trash"></i>Delete
                                                            </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="notification-box">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <a href="" class="media">
                                                      <div class="media-object pr-3">
                                                         <div class="avatar avatar-sm">
                                                            <img src="/admin/img/icons/avatar.png" class="avatar-img rounded-circle" alt="...">
                                                         </div>
                                                      </div>
                                                      <div class="media-body align-self-center">
                                                         <div class="meta">
                                                            <div class="heading">Jhon Doe</div>
                                                            <p class="sec-text mt-1 mb-0">
                                                               Ref::SALESREP7887 - Laboris nisi ut aliquip ex ea commodo consequat.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </a>
                                                </div>
                                                <div class="col-auto">
                                                   <div class="time-date small text-muted">6:25 PM</div>
                                                   <div class="controller">
                                                      <div class="dropdown dropdown-ellipses">
                                                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                         <i class="icon-options-vertical"></i>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope"></i>Mark as Read
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope-open"></i>Mark as Unread
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-flag"></i>Mark as Flagged
                                                            </a>
                                                            <a href="#delete-modal" class="dropdown-item" data-toggle="modal">
                                                            <i class="icon-trash"></i>Delete
                                                            </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="notification-box">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <a href="" class="media">
                                                      <div class="media-object pr-3">
                                                         <div class="avatar avatar-sm">
                                                            <img src="/admin/img/icons/avatar-fm.png" class="avatar-img rounded-circle" alt="...">
                                                         </div>
                                                      </div>
                                                      <div class="media-body align-self-center">
                                                         <div class="meta">
                                                            <div class="heading">Jane Doe</div>
                                                            <p class="sec-text mt-1 mb-0">
                                                               Ref::SALESREP7887 - Laboris nisi ut aliquip ex ea commodo consequat.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </a>
                                                </div>
                                                <div class="col-auto">
                                                   <div class="time-date small text-muted">6:25 PM</div>
                                                   <div class="controller">
                                                      <div class="dropdown dropdown-ellipses">
                                                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                         <i class="icon-options-vertical"></i>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope"></i>Mark as Read
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope-open"></i>Mark as Unread
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-flag"></i>Mark as Flagged
                                                            </a>
                                                            <a href="#delete-modal" class="dropdown-item" data-toggle="modal">
                                                            <i class="icon-trash"></i>Delete
                                                            </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="notification-box">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <a href="" class="media">
                                                      <div class="media-object pr-3">
                                                         <div class="avatar avatar-sm">
                                                            <img src="/admin/img/icons/avatar.png" class="avatar-img rounded-circle" alt="...">
                                                         </div>
                                                      </div>
                                                      <div class="media-body align-self-center">
                                                         <div class="meta">
                                                            <div class="heading">Jhon Doe</div>
                                                            <p class="sec-text mt-1 mb-0">
                                                               Ref::SALESREP7887 - Laboris nisi ut aliquip ex ea commodo consequat.
                                                            </p>
                                                         </div>
                                                      </div>
                                                   </a>
                                                </div>
                                                <div class="col-auto">
                                                   <div class="time-date small text-muted">6:25 PM</div>
                                                   <div class="controller">
                                                      <div class="dropdown dropdown-ellipses">
                                                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                         <i class="icon-options-vertical"></i>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope"></i>Mark as Read
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-envelope-open"></i>Mark as Unread
                                                            </a>
                                                            <a href="<?php echo $base_url; ?>#" class="dropdown-item">
                                                            <i class="icon-flag"></i>Mark as Flagged
                                                            </a>
                                                            <a href="#delete-modal" class="dropdown-item" data-toggle="modal">
                                                            <i class="icon-trash"></i>Delete
                                                            </a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="footer"><a href="<?php echo $base_url; ?>notifications-messages.php">View all</a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <!--USER PROFILE-->
                        <li class="nav-item dropdown dropdown-lg user-profile arrow-xs-hide">
                           <a class="nav-link dropdown-toggle d-flex align-items-center hide" data-toggle="dropdown">
                              <div class="media align-items-center">
                                 <div class="media-object">
                                    <div class="avatar avatar-sm avatar-online">
                                       <img src="/admin/img/icons/avatar.png" class="avatar-img rounded-circle" alt="...">
                                    </div>
                                 </div>
                                 <div class="media-body pl-3 d-sm-block d-none">
                                    <div class="strong">Rizwan Akram</div>
                                    <div class="small text-muted">Admin</div>
                                 </div>
                              </div>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <!--Header-->
                              <div class="header">
                                 <div class="banner">
                                    <div class="author mx-auto p-3 position-relative">
                                       <div class="avatar avatar-xxl avatar-online">
                                          <img src="/admin/img/icons/avatar.png" class="avatar-img rounded-circle" alt="...">
                                       </div>
                                       <div class="meta mt-3">
                                          <h2 class="heading mb-1">Jhon Doe</h2>
                                          <p class="description mb-3">Lahore, Pakistan</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!--Body-->
                              <div class="body">
                                 <ul class="d-flex nav-justified">
                                    <li class="nav-item">
                                       <h5 class="mb-1">Service</h5>
                                       <div class="text-muted">Active</div>
                                    </li>
                                    <li class="nav-item">
                                       <h5 class="mb-1">Package</h5>
                                       <div class="text-muted">Premium</div>
                                    </li>
                                    <li class="nav-item">
                                       <h5 class="mb-1">Expiry</h5>
                                       <div class="text-muted">29-Nov-2019</div>
                                    </li>
                                 </ul>
                              </div>
                              <!--Footer-->
                              <div class="footer">
                                 <div class="btn-group w-100">
                                    <a href="<?php echo $base_url; ?>profile.php" class="btn btn-default p-3 w-100 rounded-0 border-bottom-0 border-left-0">
                                    <i class="icon-user fa-r fa-lg"></i>Profile
                                    </a>
                                    <a href="<?php echo $base_url; ?>login.php" class="btn btn-default p-3 w-100 rounded-0 border-bottom-0 border-right-0">
                                    <i class="icon-logout fa-r fa-lg"></i>Logout
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <slot></slot>
         <!-- MAIN FOOTER -->
         <footer class="main-footer hide">
            <div class="logo">
               <inertiaLink :href="route('dashboard')" class="logo-img"></inertiaLink>
            </div>
            <div class="copyright">
               Copyrights 2019. All Right Reserved.
            </div>
         </footer>
      </main>
   </div>
   </div>
   </div>
</template>

