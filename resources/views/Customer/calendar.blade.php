@include('Include.app')


              <!-- content @s -->
              <div class="nk-content">
                    <div class="container">
                    <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-page-head">
                                    <div class="nk-block-head-between flex-wrap gap g-2">
                                        <div class="nk-block-head-content">
                                            <h1 class="nk-block-title">My Calendar</h1>
                                            <p>Our Events in Calendar View</p>
                                        </div>
                                        <div class="nk-block-head-content nk-block-head-tools">
                                            <ul class="d-flex gap g-3 justify-content-center">
                                                <li>
                                                  
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="js-calendar" id="fullCalendar"></div>
                                        </div><!-- .card-body -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div> <!-- .nk-content -->
                <meta name="csrf-token" content="{{ csrf_token() }}">
               @include('Include.footer')
               <!-- Add this in your HTML file, preferably in the head section -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

               <script src="assets/js/fullcalendar/fullcalendaruser.js"></script>