var Demo=function(){var e=function(){var e=$(".theme-panel");1===$(".page-head > .container-fluid").size()?$(".theme-setting-layout",e).val("fluid"):$(".theme-setting-layout",e).val("boxed"),$(".top-menu li.dropdown.dropdown-dark").size()>0?$(".theme-setting-top-menu-style",e).val("dark"):$(".theme-setting-top-menu-style",e).val("light"),$("body").hasClass("page-header-top-fixed")?$(".theme-setting-top-menu-mode",e).val("fixed"):$(".theme-setting-top-menu-mode",e).val("not-fixed"),$(".hor-menu.hor-menu-light").size()>0?$(".theme-setting-mega-menu-style",e).val("light"):$(".theme-setting-mega-menu-style",e).val("dark"),$("body").hasClass("page-header-menu-fixed")?$(".theme-setting-mega-menu-mode",e).val("fixed"):$(".theme-setting-mega-menu-mode",e).val("not-fixed");var t=function(){$("body").removeClass("page-header-top-fixed").removeClass("page-header-menu-fixed"),$(".page-header-top > .container-fluid").removeClass("container-fluid").addClass("container"),$(".page-header-menu > .container-fluid").removeClass("container-fluid").addClass("container"),$(".page-head > .container-fluid").removeClass("container-fluid").addClass("container"),$(".page-content > .container-fluid").removeClass("container-fluid").addClass("container"),$(".page-prefooter > .container-fluid").removeClass("container-fluid").addClass("container"),$(".page-footer > .container-fluid").removeClass("container-fluid").addClass("container")},a=function(){var a=$(".theme-setting-layout",e).val(),n=$(".theme-setting-top-menu-style",e).val(),o=$(".theme-setting-top-menu-mode",e).val(),i=$(".theme-setting-mega-menu-style",e).val(),s=$(".theme-setting-mega-menu-mode",e).val();t(),"fluid"===a&&($(".page-header-top > .container").removeClass("container").addClass("container-fluid"),$(".page-header-menu > .container").removeClass("container").addClass("container-fluid"),$(".page-head > .container").removeClass("container").addClass("container-fluid"),$(".page-content > .container").removeClass("container").addClass("container-fluid"),$(".page-prefooter > .container").removeClass("container").addClass("container-fluid"),$(".page-footer > .container").removeClass("container").addClass("container-fluid")),"dark"===n?$(".top-menu > .navbar-nav > li.dropdown").addClass("dropdown-dark"):$(".top-menu > .navbar-nav > li.dropdown").removeClass("dropdown-dark"),"fixed"===o?$("body").addClass("page-header-top-fixed"):$("body").removeClass("page-header-top-fixed"),"light"===i?$(".hor-menu").addClass("hor-menu-light"):$(".hor-menu").removeClass("hor-menu-light"),"fixed"===s?$("body").addClass("page-header-menu-fixed"):$("body").removeClass("page-header-menu-fixed")},n=function(e){var t=App.isRTL()?e+"-rtl":e;$("#style_color").attr("href",Layout.getLayoutCssPath()+"themes/"+t+".min.css"),$(".page-logo img").attr("src",Layout.getLayoutImgPath()+"logo-"+e+".png")};$(".theme-colors > li",e).click(function(){var t=$(this).attr("data-theme");n(t),$(".theme-colors > li",e).removeClass("active"),$(this).addClass("active")}),$(".theme-setting-top-menu-mode",e).change(function(){var t=$(".theme-setting-top-menu-mode",e).val(),a=$(".theme-setting-mega-menu-mode",e).val();"fixed"===a&&(alert("The top menu and mega menu can not be fixed at the same time."),$(".theme-setting-mega-menu-mode",e).val("not-fixed"),t="not-fixed")}),$(".theme-setting-mega-menu-mode",e).change(function(){var t=$(".theme-setting-top-menu-mode",e).val();$(".theme-setting-mega-menu-mode",e).val();"fixed"===t&&(alert("The top menu and mega menu can not be fixed at the same time."),$(".theme-setting-top-menu-mode",e).val("not-fixed"),t="not-fixed")}),$(".theme-setting",e).change(a)},t=function(e){var t="rounded"===e?"components-rounded":"components";t=App.isRTL()?t+"-rtl":t,$("#style_components").attr("href",App.getGlobalCssPath()+t+".min.css"),"undefined"!=typeof Cookies&&Cookies.set("layout-style-option",e)};return{init:function(){e(),$(".theme-panel .theme-setting-style").change(function(){t($(this).val())}),"undefined"!=typeof Cookies&&"rounded"===Cookies.get("layout-style-option")&&(t(Cookies.get("layout-style-option")),$(".theme-panel .layout-style-option").val(Cookies.get("layout-style-option")))}}}();App.isAngularJsApp()===!1&&jQuery(document).ready(function(){Demo.init()});