<?php
include("admin/bd.php");

//Seleccionar registros de servicios
$sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Seleccionar registros de portafolio
$sentencia = $conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
$lista_portfolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM `tbl_entradas`");
$sentencia->execute();
$lista_entradas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM `tbl_equipo`");
$sentencia->execute();
$lista_equipo = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM `tbl_configuracion`");
$sentencia->execute();
$lista_configuraciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ceutec - Eventos</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Aquí agregas el código CSS -->
    <style>
  /**
* Template Name: Medilab
* Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

/*--------------------------------------------------------------
# Font & Color Variables
# Help: https://bootstrapmade.com/color-system/
--------------------------------------------------------------*/
/* Fonts */
:root {
  --default-font: "Roboto",  system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  --heading-font: "Poppins",  sans-serif;
  --nav-font: "Raleway",  sans-serif;
}

/* Global Colors - The following color variables are used throughout the website. Updating them here will change the color scheme of the entire website */
:root { 
  --background-color: #ffffff; /* Background color for the entire website, including individual sections */
  --default-color: #444444; /* Default color used for the majority of the text content across the entire website */
  --heading-color: #2c4964; /* Color for headings, subheadings and title throughout the website */
  --accent-color: #1977cc; /* Accent color that represents your brand on the website. It's used for buttons, links, and other elements that need to stand out */
  --surface-color: #ffffff; /* The surface color is used as a background of boxed elements within sections, such as cards, icon boxes, or other elements that require a visual separation from the global background. */
  --contrast-color: #ffffff; /* Contrast color for text, ensuring readability against backgrounds of accent, heading, or default colors. */
}

/* Nav Menu Colors - The following color variables are used specifically for the navigation menu. They are separate from the global colors to allow for more customization options */
:root {
  --nav-color: #2c4964;  /* The default color of the main navmenu links */
  --nav-hover-color: #1977cc; /* Applied to main navmenu links when they are hovered over or active */
  --nav-mobile-background-color: #ffffff; /* Used as the background color for mobile navigation menu */
  --nav-dropdown-background-color: #ffffff; /* Used as the background color for dropdown items that appear when hovering over primary navigation items */
  --nav-dropdown-color: #2c4964; /* Used for navigation links of the dropdown items in the navigation menu. */
  --nav-dropdown-hover-color: #1977cc; /* Similar to --nav-hover-color, this color is applied to dropdown navigation links when they are hovered over. */
}

/* Color Presets - These classes override global colors when applied to any section or element, providing reuse of the sam color scheme. */

.light-background {
  --background-color: #f1f7fc;
  --surface-color: #ffffff;
}

.dark-background {
  --background-color: #060606;
  --default-color: #ffffff;
  --heading-color: #ffffff;
  --surface-color: #252525;
  --contrast-color: #ffffff;
}

/* Smooth scroll */
:root {
  scroll-behavior: smooth;
}

/*--------------------------------------------------------------
# General Styling & Shared Classes
--------------------------------------------------------------*/
body {
  color: var(--default-color);
  background-color: var(--background-color);
  font-family: var(--default-font);
}

a {
  color: var(--accent-color);
  text-decoration: none;
  transition: 0.3s;
}

a:hover {
  color: color-mix(in srgb, var(--accent-color), transparent 25%);
  text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  color: var(--heading-color);
  font-family: var(--heading-font);
}

/* Pulsating Play Button
------------------------------*/
.pulsating-play-btn {
  width: 94px;
  height: 94px;
  background: radial-gradient(var(--accent-color) 50%, color-mix(in srgb, var(--accent-color), transparent 75%) 52%);
  border-radius: 50%;
  display: block;
  position: relative;
  overflow: hidden;
}

.pulsating-play-btn:before {
  content: "";
  position: absolute;
  width: 120px;
  height: 120px;
  animation-delay: 0s;
  animation: pulsate-play-btn 2s;
  animation-direction: forwards;
  animation-iteration-count: infinite;
  animation-timing-function: steps;
  opacity: 1;
  border-radius: 50%;
  border: 5px solid color-mix(in srgb, var(--accent-color), transparent 30%);
  top: -15%;
  left: -15%;
  background: rgba(198, 16, 0, 0);
}

.pulsating-play-btn:after {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 100;
  transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

.pulsating-play-btn:hover:before {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border: none;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 200;
  animation: none;
  border-radius: 0;
}

.pulsating-play-btn:hover:after {
  border-left: 15px solid var(--accent-color);
  transform: scale(20);
}

@keyframes pulsate-play-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }

  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}

/* PHP Email Form Messages
------------------------------*/
.php-email-form .error-message {
  display: none;
  background: #df1529;
  color: #ffffff;
  text-align: left;
  padding: 15px;
  margin-bottom: 24px;
  font-weight: 600;
}

.php-email-form .sent-message {
  display: none;
  color: #ffffff;
  background: #059652;
  text-align: center;
  padding: 15px;
  margin-bottom: 24px;
  font-weight: 600;
}

.php-email-form .loading {
  display: none;
  background: var(--surface-color);
  text-align: center;
  padding: 15px;
  margin-bottom: 24px;
}

.php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid var(--accent-color);
  border-top-color: var(--surface-color);
  animation: php-email-form-loading 1s linear infinite;
}

@keyframes php-email-form-loading {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Global Header
--------------------------------------------------------------*/
.header {
  color: var(--default-color);
  transition: all 0.5s;
  z-index: 997;
  background-color: var(--background-color);
}

.header .topbar {
  background-color: var(--accent-color);
  height: 40px;
  padding: 0;
  font-size: 14px;
  transition: all 0.5s;
}

.header .topbar .contact-info i {
  font-style: normal;
  color: var(--contrast-color);
}

.header .topbar .contact-info i a,
.header .topbar .contact-info i span {
  padding-left: 5px;
  color: var(--contrast-color);
}

@media (max-width: 575px) {

  .header .topbar .contact-info i a,
  .header .topbar .contact-info i span {
    font-size: 13px;
  }
}

.header .topbar .contact-info i a {
  line-height: 0;
  transition: 0.3s;
}

.header .topbar .contact-info i a:hover {
  color: var(--contrast-color);
  text-decoration: underline;
}

.header .topbar .social-links a {
  color: color-mix(in srgb, var(--contrast-color), transparent 40%);
  line-height: 0;
  transition: 0.3s;
  margin-left: 20px;
}

.header .topbar .social-links a:hover {
  color: var(--contrast-color);
}

.header .branding {
  min-height: 60px;
  padding: 10px 0;
}

.header .logo {
  line-height: 1;
}

.header .logo img {
  max-height: 36px;
  margin-right: 8px;
}

.header .logo h1 {
  font-size: 30px;
  margin: 0;
  font-weight: 700;
  color: var(--heading-color);
}

.header .cta-btn,
.header .cta-btn:focus {
  color: var(--contrast-color);
  background: var(--accent-color);
  font-size: 14px;
  padding: 8px 25px;
  margin: 0 0 0 30px;
  border-radius: 50px;
  transition: 0.3s;
}

.header .cta-btn:hover,
.header .cta-btn:focus:hover {
  color: var(--contrast-color);
  background: color-mix(in srgb, var(--accent-color), transparent 15%);
}

@media (max-width: 1200px) {
  .header .logo {
    order: 1;
  }

  .header .cta-btn {
    order: 2;
    margin: 0 15px 0 0;
    padding: 6px 15px;
  }

  .header .navmenu {
    order: 3;
  }
}

.scrolled .header {
  box-shadow: 0px 0 18px rgba(0, 0, 0, 0.1);
}

.scrolled .header .topbar {
  height: 0;
  visibility: hidden;
  overflow: hidden;
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/* Desktop Navigation */
@media (min-width: 1200px) {
  .navmenu {
    padding: 0;
  }

  .navmenu ul {
    margin: 0;
    padding: 0;
    display: flex;
    list-style: none;
    align-items: center;
  }

  .navmenu li {
    position: relative;
  }

  .navmenu>ul>li {
    white-space: nowrap;
    padding: 15px 14px;
  }

  .navmenu>ul>li:last-child {
    padding-right: 0;
  }

  .navmenu a,
  .navmenu a:focus {
    color: var(--nav-color);
    font-size: 15px;
    padding: 0 2px;
    font-family: var(--nav-font);
    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: space-between;
    white-space: nowrap;
    transition: 0.3s;
    position: relative;
  }

  .navmenu a i,
  .navmenu a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
    transition: 0.3s;
  }

  .navmenu>ul>li>a:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 2px;
    bottom: -6px;
    left: 0;
    background-color: var(--nav-hover-color);
    visibility: hidden;
    width: 0px;
    transition: all 0.3s ease-in-out 0s;
  }

  .navmenu a:hover:before,
  .navmenu li:hover>a:before,
  .navmenu .active:before {
    visibility: visible;
    width: 100%;
  }

  .navmenu li:hover>a,
  .navmenu .active,
  .navmenu .active:focus {
    color: var(--nav-hover-color);
  }

  .navmenu .dropdown ul {
    margin: 0;
    padding: 10px 0;
    background: var(--nav-dropdown-background-color);
    display: block;
    position: absolute;
    visibility: hidden;
    left: 14px;
    top: 130%;
    opacity: 0;
    transition: 0.3s;
    border-radius: 4px;
    z-index: 99;
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
  }

  .navmenu .dropdown ul li {
    min-width: 200px;
  }

  .navmenu .dropdown ul a {
    padding: 10px 20px;
    font-size: 15px;
    text-transform: none;
    color: var(--nav-dropdown-color);
  }

  .navmenu .dropdown ul a i {
    font-size: 12px;
  }

  .navmenu .dropdown ul a:hover,
  .navmenu .dropdown ul .active:hover,
  .navmenu .dropdown ul li:hover>a {
    color: var(--nav-dropdown-hover-color);
  }

  .navmenu .dropdown:hover>ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
  }

  .navmenu .dropdown .dropdown ul {
    top: 0;
    left: -90%;
    visibility: hidden;
  }

  .navmenu .dropdown .dropdown:hover>ul {
    opacity: 1;
    top: 0;
    left: -100%;
    visibility: visible;
  }
}

/* Mobile Navigation */
@media (max-width: 1199px) {
  .mobile-nav-toggle {
    color: var(--nav-color);
    font-size: 28px;
    line-height: 0;
    margin-right: 10px;
    cursor: pointer;
    transition: color 0.3s;
  }

  .navmenu {
    padding: 0;
    z-index: 9997;
  }

  .navmenu ul {
    display: none;
    list-style: none;
    position: absolute;
    inset: 60px 20px 20px 20px;
    padding: 10px 0;
    margin: 0;
    border-radius: 6px;
    background-color: var(--nav-mobile-background-color);
    border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
    box-shadow: none;
    overflow-y: auto;
    transition: 0.3s;
    z-index: 9998;
  }

  .navmenu a,
  .navmenu a:focus {
    color: var(--nav-dropdown-color);
    padding: 10px 20px;
    font-family: var(--nav-font);
    font-size: 17px;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: space-between;
    white-space: nowrap;
    transition: 0.3s;
  }

  .navmenu a i,
  .navmenu a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: 0.3s;
    background-color: color-mix(in srgb, var(--accent-color), transparent 90%);
  }

  .navmenu a i:hover,
  .navmenu a:focus i:hover {
    background-color: var(--accent-color);
    color: var(--contrast-color);
  }

  .navmenu a:hover,
  .navmenu .active,
  .navmenu .active:focus {
    color: var(--nav-dropdown-hover-color);
  }

  .navmenu .active i,
  .navmenu .active:focus i {
    background-color: var(--accent-color);
    color: var(--contrast-color);
    transform: rotate(180deg);
  }

  .navmenu .dropdown ul {
    position: static;
    display: none;
    z-index: 99;
    padding: 10px 0;
    margin: 10px 20px;
    background-color: var(--nav-dropdown-background-color);
    transition: all 0.5s ease-in-out;
  }

  .navmenu .dropdown ul ul {
    background-color: rgba(33, 37, 41, 0.1);
  }

  .navmenu .dropdown>.dropdown-active {
    display: block;
    background-color: rgba(33, 37, 41, 0.03);
  }

  .mobile-nav-active {
    overflow: hidden;
  }

  .mobile-nav-active .mobile-nav-toggle {
    color: #fff;
    position: absolute;
    font-size: 32px;
    top: 15px;
    right: 15px;
    margin-right: 0;
    z-index: 9999;
  }

  .mobile-nav-active .navmenu {
    position: fixed;
    overflow: hidden;
    inset: 0;
    background: rgba(33, 37, 41, 0.8);
    transition: 0.3s;
  }

  .mobile-nav-active .navmenu>ul {
    display: block;
  }
}

/*--------------------------------------------------------------
# Global Footer
--------------------------------------------------------------*/
.footer {
  color: var(--default-color);
  background-color: var(--background-color);
  border-top: 1px solid color-mix(in srgb, var(--accent-color), transparent 75%);
  font-size: 14px;
  position: relative;
}

.footer .footer-top {
  padding-top: 50px;
}

.footer .footer-about .logo {
  line-height: 1;
  margin-bottom: 25px;
}

.footer .footer-about .logo img {
  max-height: 40px;
  margin-right: 6px;
}

.footer .footer-about .logo span {
  color: var(--heading-color);
  font-family: var(--heading-font);
  font-size: 26px;
  font-weight: 700;
  letter-spacing: 1px;
}

.footer .footer-about p {
  font-size: 14px;
  font-family: var(--heading-font);
}

.footer .social-links a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid color-mix(in srgb, var(--default-color), transparent 50%);
  font-size: 16px;
  color: color-mix(in srgb, var(--default-color), transparent 20%);
  margin-right: 10px;
  transition: 0.3s;
}

.footer .social-links a:hover {
  color: var(--accent-color);
  border-color: var(--accent-color);
}

.footer h4 {
  font-size: 16px;
  font-weight: bold;
  position: relative;
  padding-bottom: 12px;
}

.footer .footer-links {
  margin-bottom: 30px;
}

.footer .footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer .footer-links ul i {
  padding-right: 2px;
  font-size: 12px;
  line-height: 0;
}

.footer .footer-links ul li {
  padding: 10px 0;
  display: flex;
  align-items: center;
}

.footer .footer-links ul li:first-child {
  padding-top: 0;
}

.footer .footer-links ul a {
  color: color-mix(in srgb, var(--default-color), transparent 30%);
  display: inline-block;
  line-height: 1;
}

.footer .footer-links ul a:hover {
  color: var(--accent-color);
}

.footer .footer-contact p {
  margin-bottom: 5px;
}

.footer .copyright {
  padding-top: 25px;
  padding-bottom: 25px;
  border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
}

.footer .copyright p {
  margin-bottom: 0;
}

.footer .credits {
  margin-top: 8px;
  font-size: 13px;
}

/*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/
#preloader {
  position: fixed;
  inset: 0;
  z-index: 999999;
  overflow: hidden;
  background: var(--background-color);
  transition: all 0.6s ease-out;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #ffffff;
  border-color: var(--accent-color) transparent var(--accent-color) transparent;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: animate-preloader 1.5s linear infinite;
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Scroll Top Button
--------------------------------------------------------------*/
.scroll-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  right: 15px;
  bottom: 15px;
  z-index: 99999;
  background-color: var(--accent-color);
  width: 40px;
  height: 40px;
  border-radius: 4px;
  transition: all 0.4s;
}

.scroll-top i {
  font-size: 24px;
  color: var(--contrast-color);
  line-height: 0;
}

.scroll-top:hover {
  background-color: color-mix(in srgb, var(--accent-color), transparent 20%);
  color: var(--contrast-color);
}

.scroll-top.active {
  visibility: visible;
  opacity: 1;
}

/*--------------------------------------------------------------
# Disable aos animation delay on mobile devices
--------------------------------------------------------------*/
@media screen and (max-width: 768px) {
  [data-aos-delay] {
    transition-delay: 0 !important;
  }
}

/*--------------------------------------------------------------
# Global Page Titles & Breadcrumbs
--------------------------------------------------------------*/
.page-title {
  color: var(--default-color);
  background-color: var(--background-color);
  position: relative;
}

.page-title .heading {
  padding: 80px 0;
  border-top: 1px solid color-mix(in srgb, var(--accent-color), transparent 80%);
}

.page-title .heading h1 {
  font-size: 38px;
  font-weight: 700;
}

.page-title nav {
  background-color: color-mix(in srgb, var(--accent-color), transparent 94%);
  padding: 20px 0;
}

.page-title nav ol {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  font-size: 16px;
  font-weight: 600;
}

.page-title nav ol li+li {
  padding-left: 10px;
}

.page-title nav ol li+li::before {
  content: "/";
  display: inline-block;
  padding-right: 10px;
  color: color-mix(in srgb, var(--default-color), transparent 70%);
}

/*--------------------------------------------------------------
# Global Sections
--------------------------------------------------------------*/
section,
.section {
  color: var(--default-color);
  background-color: var(--background-color);
  padding: 60px 0;
  scroll-margin-top: 72px;
  overflow: clip;
}

@media (max-width: 1199px) {

  section,
  .section {
    scroll-margin-top: 60px;
  }
}

/*--------------------------------------------------------------
# Global Section Titles
--------------------------------------------------------------*/
.section-title {
  text-align: center;
  padding-bottom: 60px;
  position: relative;
}

.section-title h2 {
  font-size: 32px;
  font-weight: 500;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
}

.section-title h2:before {
  content: "";
  position: absolute;
  display: block;
  width: 160px;
  height: 1px;
  background: color-mix(in srgb, var(--default-color), transparent 60%);
  left: 0;
  right: 0;
  bottom: 1px;
  margin: auto;
}

.section-title h2::after {
  content: "";
  position: absolute;
  display: block;
  width: 60px;
  height: 3px;
  background: var(--accent-color);
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
}

.section-title p {
  margin-bottom: 0;
}

/*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
.hero {
  width: 100%;
  min-height: calc(100vh - 112px);
  padding: 80px 0;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
}

.hero img {
  position: absolute;
  inset: 0;
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 1;
}

.hero .container {
  z-index: 3;
}

.hero .welcome h2 {
  margin: 0;
  font-size: 48px;
  font-weight: 700;
}

.hero .welcome p {
  font-size: 24px;
  margin: 0;
}

.hero .content {
  margin-top: 40px;
}

.hero .content .why-box {
  color: var(--contrast-color);
  background: var(--accent-color);
  padding: 30px;
  border-radius: 4px;
}

.hero .content .why-box h3 {
  color: var(--contrast-color);
  font-weight: 700;
  font-size: 34px;
  margin-bottom: 30px;
}

.hero .content .why-box p {
  margin-bottom: 30px;
}

.hero .content .why-box .more-btn {
  color: var(--contrast-color);
  background: color-mix(in srgb, var(--contrast-color), transparent 80%);
  display: inline-block;
  padding: 6px 30px 8px 30px;
  border-radius: 50px;
  transition: all ease-in-out 0.4s;
}

.hero .content .why-box .more-btn i {
  font-size: 14px;
}

.hero .content .why-box .more-btn:hover {
  background: var(--surface-color);
  color: var(--accent-color);
}

.hero .content .icon-box {
  text-align: center;
  border-radius: 10px;
  background: color-mix(in srgb, var(--surface-color), transparent 20%);
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  padding: 40px 30px;
  width: 100%;
}

.hero .content .icon-box i {
  font-size: 40px;
  color: var(--accent-color);
}

.hero .content .icon-box h4 {
  font-size: 20px;
  font-weight: 700;
  margin: 10px 0 20px 0;
}

.hero .content .icon-box p {
  font-size: 15px;
  color: color-mix(in srgb, var(--default-color), transparent 30%);
}
.appointment .php-email-form {
  width: 100%;
}

.appointment .php-email-form .form-group {
  padding-bottom: 8px;
}

.appointment .php-email-form input,
.appointment .php-email-form textarea,
.appointment .php-email-form select {
  color: var(--default-color);
  background-color: transparent;
  border-color: color-mix(in srgb, var(--default-color), transparent 80%);
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
  padding: 10px !important;
}

.appointment .php-email-form input:focus,
.appointment .php-email-form textarea:focus,
.appointment .php-email-form select:focus {
  border-color: var(--accent-color);
}

.appointment .php-email-form input::placeholder,
.appointment .php-email-form textarea::placeholder,
.appointment .php-email-form select::placeholder {
  color: color-mix(in srgb, var(--default-color), transparent 70%);
}

.appointment .php-email-form input,
.appointment .php-email-form select {
  height: 44px;
}

.appointment .php-email-form textarea {
  padding: 10px 12px;
}

.appointment .php-email-form button[type=submit] {
  background: var(--accent-color);
  border: 0;
  padding: 10px 35px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;
}

.appointment .php-email-form button[type=submit]:hover {
  background: color-mix(in srgb, var(--accent-color) 90%, white 15%);
}

</style>
<header id="header" class="header sticky-top">
    <div class="topbar d-flex align-items-center">
        <div class="container-fluid d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope"><a href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone ms-4"><span>+1 5589 55488 55</span></i>
            </div>
            <div class="social-links d-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div>
    <div class="branding d-flex align-items-center">
        <div class="container-fluid d-flex justify-content-between">
            <a href="index.html" class="logo">
                <h1 class="sitename">CitaSmile</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Inicio</a></li>
                    <li><a href="#about">Conócenos</a></li>
                    <li><a href="#services">Servicios</a></li>
                    <li><a href="#departments">Consejos</a></li>
                    <li><a href="#doctors">Doctores</a></li>
                    <li><a href="#contactanos">Contact</a></li>
                </ul>
            </nav>
            <a class="cta-btn d-none d-sm-block" href="#appointment">Make an Appointment</a>
        </div>
    </div>
</header>


<main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section light-background">

  <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

  <div class="container position-relative">

    <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
      <h2><?php echo $lista_configuraciones[12]['valor'] ?></h2>
      <p><?php echo $lista_configuraciones[13]['valor'] ?></p>
    </div><!-- End Welcome -->

    <div class="content row gy-4">
      <div class="col-lg-4 d-flex align-items-stretch">
        <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
          <h3><?php echo $lista_configuraciones[14]['valor'] ?></h3>
          <p>
          <?php echo $lista_configuraciones[15]['valor'] ?>
          </p>
          <div class="text-center">
            <a href="#about" class="more-btn"><span>Leer mas</span> <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div><!-- End Why Box -->

      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="d-flex flex-column justify-content-center">
          <div class="row gy-4">

            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                <i class="bi bi-clipboard-data"></i>
                <h4><?php echo $lista_configuraciones[16]['valor'] ?></h4>
                <p><?php echo $lista_configuraciones[17]['valor'] ?></p>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                <i class="bi bi-gem"></i>
                <h4><?php echo $lista_configuraciones[18]['valor'] ?></h4>
                <p><?php echo $lista_configuraciones[19]['valor'] ?></p>
              </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                <i class="bi bi-inboxes"></i>
                <h4><?php echo $lista_configuraciones[20]['valor'] ?></h4>
                <p><?php echo $lista_configuraciones[21]['valor'] ?></p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>
      </div>
    </div><!-- End  Content-->

  </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

  <div class="container">

    <div class="row gy-4 gx-5">

      <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
        <img src="assets/img/about.jpg" class="img-fluid" alt="">
      </div>

      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
        <h3><?php echo $lista_configuraciones[22]['valor'] ?></h3>
        <p>
        <?php echo $lista_configuraciones[23]['valor'] ?>        </p>
        <ul>
          <li>
            <i class="fa-solid fa-vial-circle-check"></i>
            <div>
              <h5><?php echo $lista_configuraciones[24]['valor'] ?></h5>
              <p><?php echo $lista_configuraciones[25]['valor'] ?></p>
            </div>
          </li>
          <li>
            <i class="fa-solid fa-pump-medical"></i>
            <div>
              <h5><?php echo $lista_configuraciones[26]['valor'] ?></h5>
              <p><?php echo $lista_configuraciones[27]['valor'] ?></p>
            </div>
          </li>
        </ul>
      </div>

    </div>

  </div>

</section><!-- /About Section -->

<!-- Stats Section -->




    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[3]['valor'] ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[4]['valor'] ?></h3>
            </div>
            <div class="row text-center">
                <?php foreach ($lista_servicios as $registros) { ?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-3  x">
                            <i class="fas fa-calendar-alt fa-stack-2x text-primary"></i>
                            <i class="fas <?php echo $registros["icono"]; ?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">
                            <?php echo $registros["titulo"]; ?>
                        </h4>
                        <p class="text-muted">
                            <?php echo $registros["descripcion"]; ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[5]['valor'] ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[6]['valor'] ?></h3>
            </div>
            <div class="row">
                <?php foreach ($lista_portfolio as $registros) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <!-- Portfolio item -->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $registros["ID"]; ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/<?php echo $registros["imagen"]; ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">
                                    <?php echo $registros['titulo']; ?>
                                </div>
                                <div class="portfolio-caption-subheading text-muted">
                                    <?php echo $registros["subtitulo"]; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $registros["ID"]; ?>" tabindex="-1"
                        role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg"
                                        alt="Close modal" /></div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project details-->
                                                <h2 class="text-uppercase">
                                                    <?php echo $registros["titulo"]; ?>
                                                </h2>
                                                <p class="item-intro text-muted">
                                                    <?php echo $registros["subtitulo"]; ?>
                                                </p>
                                                <img class="img-fluid d-block mx-auto"
                                                    src="assets/img/portfolio/<?php echo $registros["imagen"]; ?>"
                                                    alt="..." />
                                                <p>
                                                    <?php echo $registros["descripcion"]; ?>
                                                </p>
                                                <ul class="list-inline">
                                                    <li>
                                                        <strong>Cliente:</strong>
                                                        <?php echo $registros["cliente"]; ?>
                                                    </li>
                                                    <li>
                                                        <strong>Categoria:</strong>
                                                        <?php echo $registros["categoria"]; ?>
                                                    </li>
                                                    <li>
                                                        <strong>URL: :</strong>
                                                        <a href="<?php echo $registros["url"]; ?>">
                                                            <?php echo $registros["url"]; ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <button class="btn btn-primary btn-xl text-uppercase"
                                                    data-bs-dismiss="modal" type="button">
                                                    <i class="fas fa-xmark me-1"></i>
                                                    Close Project
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </section>

    <!-- Appointment Section -->
    <section id="appointment" class="appointment section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Cita</h2>
        <p>Agenda tu cita con nosotros</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

      <form action="admin/appointments.php" method="post" role="form" class="php-email-form">          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="datetime-local" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required="">
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="department" class="form-select" required="">
                <option value="">Selecciona la ciudad</option>
                <option value="Department 1">La Ceiba</option>
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="doctor" id="doctor" class="form-select" required="">
                <option value="">Selecciona un doctor</option>
                <option value="Doctor 1"><?php echo $lista_configuraciones[28]['valor'] ?></option>
                <option value="Doctor 2"><?php echo $lista_configuraciones[29]['valor'] ?></option>
                <option value="Doctor 3"><?php echo $lista_configuraciones[30]['valor'] ?></option>
              </select>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          </div>
          <div class="mt-3">
        <div class="loading" style="display:none;">Cargando...</div>
        <div class="error-message" style="display:none; color: red;"></div>
        <div class="sent-message" style="display:none; color: green;">Tu cita se agendó correctamente.</div>
        <div class="text-center"><button type="submit">Agendar Cita</button></div>
        <a href="registro.php" class="btn btn-secondary">Ver Citas</a>
    </div>
</form>

<script>
    const form = document.querySelector('.php-email-form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault(); // Evitar el comportamiento por defecto
        const formData = new FormData(form);

        // Mostrar mensaje de carga
        document.querySelector('.loading').style.display = 'block';

        // Enviar los datos al servidor
        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            document.querySelector('.loading').style.display = 'none';

            if (result.status === 'success') {
                document.querySelector('.sent-message').style.display = 'block';
                form.reset();
            } else {
                document.querySelector('.error-message').style.display = 'block';
                document.querySelector('.error-message').innerText = result.message;
            }
        } catch (error) {
            document.querySelector('.loading').style.display = 'none';
            document.querySelector('.error-message').style.display = 'block';
            document.querySelector('.error-message').innerText = 'Error al enviar el formulario.';
        }
    });
</script>

      </div>

    </section><!-- /Appointment Section -->



    <!-- About-->
    <section class="page-section" id="about">

        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[7]['valor'] ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[8]['valor'] ?></h3>
            </div>
            <ul class="timeline">
                <?php
                $contador = 1;
                foreach ($lista_entradas as $registros) {

                ?>

                    <li <?php echo (($contador % 2) == 0) ? 'class="timeline-inverted"' : ""; ?>>
                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                src="assets/img/about/<?php echo $registros['imagen']; ?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">

                                <h4 class="subheading">
                                    <?php echo $registros['titulo']; ?>
                                </h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    <?php echo $registros['descripcion']; ?>
                                </p>
                            </div>
                        </div>
                    </li>
                <?php
                    $contador++;
                } ?>

                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            <?php echo $lista_configuraciones[9]['valor'] ?>
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[10]['valor'] ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[11]['valor'] ?></h3>
            </div>

            <div class="row">
                <?php foreach ($lista_equipo as $registros) { ?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/<?php echo $registros['imagen'] ?>" alt="..." />
                            <h4><?php echo $registros['nombrecompleto'] ?></h4>
                            <p class="text-muted"><?php echo $registros['puesto'] ?></p>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['whatsapp'] ?>" aria-label="Parveen Anand Twitter Profile"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['facebook'] ?>" aria-label="Parveen Anand Facebook Profile"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['linkedin'] ?>" aria-label="Parveen Anand LinkedIn Profile"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted"><?php echo $lista_configuraciones[11]['valor'] ?></p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 my-3 my-lg-0">

                </div>
                <div class="col-lg-4 text-lg-end">
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>