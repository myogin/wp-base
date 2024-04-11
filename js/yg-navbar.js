$(document).ready(function ($) {
  $(".navbar-toggler").click(function () {
    navbarToggle();
  });
  $("#close-navbar").click(function () {
    console.log("====================================");
    console.log("CLOSE");
    console.log("====================================");
    navbarToggle();
  });
});

function navbarToggle() {
  let expandedNavbar = JSON.parse($(".navbar-toggler").attr("aria-expanded"));
  let navbarToggler = $(".navbar-toggler");
  navbarToggler.prop(
    "ariaExpanded",
    !JSON.parse(navbarToggler.attr("aria-expanded"))
  );

  if (!expandedNavbar) {
    openNavbar();
  } else {
    closeNavbar();
  }
}

function openNavbar() {
  $("html").attr("style", "overflow: hidden;");
  $("body").attr("style", "padding-right: 15px;");

  $(".navbar-collapse").removeClass("collapse");
  $(".navbar-collapse").addClass("collapsing");
  setTimeout(() => {
    $(".navbar-collapse").removeClass("collapsing");
    $(".navbar-collapse").addClass("collapse");
    $(".navbar-collapse").addClass("show");
  }, 200);
}

function closeNavbar() {
  $(".navbar-collapse").removeClass("collapse");
  $(".navbar-collapse").addClass("collapsing");
  setTimeout(() => {
    $(".navbar-collapse").removeClass("collapsing");
    $(".navbar-collapse").removeClass("show");
    $(".navbar-collapse").addClass("collapse");

    $("html").removeAttr("style");
    $("body").removeAttr("style");
  }, 200);
}
