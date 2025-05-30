<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
	<title>NiQuiTeen-Admin Side</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logokkm.jpeg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v1.1.1') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    
    
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Root @s -->
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main">
            <div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                      
                    <div class="logo-wrap" style="margin-bottom: 20px;">
                                    <img style="width:80px; height:80px;" class="logo-img logo-light" src="{{ asset('logokkm.jpeg') }}"  alt="">
                                        <img style="width:80px; height:80px;" class="logo-img logo-dark" src="{{ asset('logokkm.jpeg') }}" alt="">
                                        <img style="width:80px; height:80px;" class="logo-img logo-icon" src="{{ asset('logokkm.jpeg') }}"  alt="">
                                    </div>
                        
                      
                    </div><!-- end nk-sidebar-brand -->
                    <br>
                </div><!-- end nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">

                            <li class="nk-menu-item">
                                    <a href="/dashboard" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-calendar-alt"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                         
                            <li class="nk-menu-item">
                                    <a href="/admin/patients" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                    <span class="nk-menu-text">Manage Patient</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
        <a href="/signout" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
            <span class="nk-menu-text">Sign Out</span>
        </a>
    </li>
                                
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div><!-- .nki-sidebar -->
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap">
                <div class="nk-header nk-header-fixed">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-header-logo ms-n1">
                                <div class="nk-sidebar-toggle">
                                    <button class="btn btn-sm btn-icon btn-zoom sidebar-toggle d-sm-none"><em class="icon ni ni-menu"></em></button>
                                    <button class="btn btn-md btn-icon btn-zoom sidebar-toggle d-none d-sm-inline-flex"><em class="icon ni ni-menu"></em></button>
                                </div>
                               
                                <a href="#" class="logo-link">
                                    <div class="logo-wrap">
                                        <img class="logo-img logo-light" src="{{ asset('logokkm.jpeg') }}" alt="">
                                        <img class="logo-img logo-dark" src="{{ asset('logokkm.jpeg') }}" alt="">
                                        <img class="logo-img logo-icon" src="{{ asset('logokkm.jpeg') }}" alt="">
                                    </div>
                                </a>
                            </div>
                            <nav class="nk-header-menu nk-navbar">
                         
                            </nav>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav ms-2">
                                  
                                    <li >
                                       Hi <b style="color:coral;">{{auth()->user()->username}}</b> !
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown">
                                            <div class="d-sm-none">
                                                <div class="media media-md media-circle">
                                                    <img src="{{ asset('user.png') }}"alt="" class="img-thumbnail">
                                                </div>
                                            </div>
                                            <div class="d-none d-sm-block">
                                                <div class="media media-circle">
                                                <img src="{{ asset('user.png') }}"alt="" class="img-thumbnail">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md">
                                            <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                                <div class="media-group">
                                                    <div class="media media-xl media-middle media-circle"><img src="logokkm.jpeg" alt="" class="img-thumbnail"></div>
                                                    <div class="media-text">
                                                        <div class="lead-text">{{auth()->user()->username}}</div>
                                                        <span class="sub-text">{{auth()->user()->role}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="dropdown-content dropdown-content-x-lg py-3">
                                                <ul class="link-list">

                                                
                                                    <li><a href="/signout"><em class="icon ni ni-signout"></em> <span>Log Out</span></a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>

                <!-- header -->