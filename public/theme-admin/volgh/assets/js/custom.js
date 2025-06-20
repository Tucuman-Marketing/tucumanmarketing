  (() => {
    function e(o) {
        return (e =
            "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                ? function (e) {
                      return typeof e;
                  }
                : function (e) {
                      return e &&
                          "function" == typeof Symbol &&
                          e.constructor === Symbol &&
                          e !== Symbol.prototype
                          ? "symbol"
                          : typeof e;
                  })(o);
    }


    // Si el switch se encuentra en darkmode que el switch aparezca activado al refrescar el sitio, caso contrario, si se encuentra en ligh mode, que aparezca desactivado

    var myonoffswitch16 = document.getElementById("myonoffswitch16");

if (myonoffswitch16) {
    if (localStorage.getItem("dark-mode") === "true") {
        myonoffswitch16.checked = true;
    } else {
        myonoffswitch16.checked = false;
    }
} else {
    console.error("El elemento con ID 'myonoffswitch16' no fue encontrado.");
}


    // if (localStorage.getItem("dark-mode") === "true") {
    //     document.getElementById("myonoffswitch16").checked = true;
    // } else {
    //     document.getElementById("myonoffswitch16").checked = false;
    // }

    !(function (o) {
        console.log("custom.js");
        "use strict";
        o(document).on("click", "a[data-theme]", function () {
            o("head link#theme").attr("href", o(this).data("theme")),
                o(this).toggleClass("active").siblings().removeClass("active");
        }),
            o(document).on("click", ".fullscreen-button", function () {
                o("html").addClass("fullscreenie"),
                    (void 0 !== document.fullScreenElement &&
                        null === document.fullScreenElement) ||
                    (void 0 !== document.msFullscreenElement &&
                        null === document.msFullscreenElement) ||
                    (void 0 !== document.mozFullScreen &&
                        !document.mozFullScreen) ||
                    (void 0 !== document.webkitIsFullScreen &&
                        !document.webkitIsFullScreen)
                        ? document.documentElement.requestFullScreen
                            ? document.documentElement.requestFullScreen()
                            : document.documentElement.mozRequestFullScreen
                            ? document.documentElement.mozRequestFullScreen()
                            : document.documentElement.webkitRequestFullScreen
                            ? document.documentElement.webkitRequestFullScreen(
                                  Element.ALLOW_KEYBOARD_INPUT
                              )
                            : document.documentElement.msRequestFullscreen &&
                              document.documentElement.msRequestFullscreen()
                        : (o("html").removeClass("fullscreenie"),
                          document.cancelFullScreen
                              ? document.cancelFullScreen()
                              : document.mozCancelFullScreen
                              ? document.mozCancelFullScreen()
                              : document.webkitCancelFullScreen
                              ? document.webkitCancelFullScreen()
                              : document.msExitFullscreen &&
                                document.msExitFullscreen());
            }),
            o(window).on("load", function (e) {
                o("#global-loader").fadeOut("slow");
            }),
            o(window).on("scroll", function (e) {
                o(this).scrollTop() > 0
                    ? o("#back-to-top").fadeIn("slow")
                    : o("#back-to-top").fadeOut("slow");
            }),
            o(document).on("click", "#back-to-top", function (e) {
                return o("html, body").animate({ scrollTop: 0 }, 600), !1;
            }),
            o(".cover-image").each(function () {
                var t = o(this).attr("data-image-src");
                "undefined" !== e(t) &&
                    !1 !== t &&
                    o(this).css("background", "url(" + t + ") center center");
            });
        o(".quantity-right-plus").on("click", function (e) {
            e.preventDefault();
            var t = parseInt(o(".quantity").val());
            o(".quantity").val(t + 1);
        }),
            o(".quantity-left-minus").on("click", function (e) {
                e.preventDefault();
                var t = parseInt(o(".quantity").val());
                t > 0 && o(".quantity").val(t - 1);
            }),
            o(".chart-circle").length &&
                o(".chart-circle").each(function () {
                    var e = o(this);
                    e.circleProgress({
                        fill: { color: e.attr("data-color") },
                        size: e.height(),
                        startAngle: (-Math.PI / 4) * 2,
                        emptyFill: "rgba(119, 119, 142, 0.2)",
                        lineCap: "round",
                    });
                });
        var t = "div.card";
        o('[data-toggle="tooltip"]').tooltip(),
            o('[data-toggle="popover"]').popover({ html: !0 }),
            o(document).on(
                "click",
                '[data-toggle="card-remove"]',
                function (e) {
                    return o(this).closest(t).remove(), e.preventDefault(), !1;
                }
            ),
            o(document).on(
                "click",
                '[data-toggle="card-collapse"]',
                function (e) {
                    return (
                        o(this).closest(t).toggleClass("card-collapsed"),
                        e.preventDefault(),
                        !1
                    );
                }
            ),
            o(document).on(
                "click",
                '[data-toggle="card-fullscreen"]',
                function (e) {
                    return (
                        o(this)
                            .closest(t)
                            .toggleClass("card-fullscreen")
                            .removeClass("card-collapsed"),
                        e.preventDefault(),
                        !1
                    );
                }
            ),
            o(document).on("click", "#myonoffswitch16", function () {
                this.checked
                    ? (o("body").addClass("dark-mode"),
                      o("body").removeClass("light-mode"),
                      o("body").removeClass("transparent-mode"),
                      localStorage.setItem("dark-mode", "true"))
                    : (o("body").removeClass("dark-mode"),
                      localStorage.setItem("dark-mode", "false"));

            }),
            o(document).on("click", "#myonoffswitch3", function () {
                this.checked
                    ? (o("body").addClass("light-mode"),
                      o("body").removeClass("dark-mode"),
                      o("body").removeClass("transparent-mode"),
                      localStorage.setItem("light-mode", "True"))
                    : (o("body").removeClass("light-mode"),
                      localStorage.setItem("light-mode", "false"));
            }),
            o(document).on("click", "#myonoffswitch4", function () {
                this.checked
                    ? (o("body").addClass("transparent-mode"),
                      o("body").removeClass("dark-mode"),
                      o("body").removeClass("light-mode"),
                      localStorage.setItem("transparent-mode", "True"))
                    : (o("body").removeClass("transparent-mode"),
                      localStorage.setItem("transparent-mode", "false"));
            }),
            o("#myonoffswitch13").click(function () {
                this.checked
                    ? (o("body").addClass("default"),
                      o("body").removeClass("boxed"),
                      localStorage.setItem("default", "True"))
                    : (o("body").removeClass("default"),
                      localStorage.setItem("default", "false"));
            }),
            o("#myonoffswitch14").click(function () {
                this.checked
                    ? (o("body").addClass("boxed"),
                      o("body").removeClass("default"),
                      localStorage.setItem("boxed", "True"))
                    : (o("body").removeClass("boxed"),
                      localStorage.setItem("boxed", "false"));
            }),
            o(document).on("click", "#myonoffswitch10", function () {
                this.checked
                    ? (o("body").addClass("light-hor-header"),
                      o("body").removeClass("color-hor-header"),
                      o("body").removeClass("gradient-hor-header"),
                      o("body").removeClass("color-hor-menu"),
                      o("body").removeClass("light-hor-menu"),
                      o("body").removeClass("gradient-hor-menu"),
                      o("body").removeClass("dark-hor-menu"),
                      localStorage.setItem("default-hor-header", "True"))
                    : (o("body").removeClass("light-hor-header"),
                      localStorage.setItem("light-hor-header", "false"));
            }),
            o(document).on("click", "#myonoffswitch11", function () {
                this.checked
                    ? (o("body").addClass("color-hor-header"),
                      o("body").removeClass("light-hor-header"),
                      o("body").removeClass("gradient-hor-header"),
                      o("body").removeClass("color-hor-menu"),
                      o("body").removeClass("light-hor-menu"),
                      o("body").removeClass("gradient-hor-menu"),
                      o("body").removeClass("dark-hor-menu"),
                      localStorage.setItem("color-hor-header", "True"))
                    : (o("body").removeClass("color-hor-header"),
                      localStorage.setItem("color-hor-header", "false"));
            }),
            o(document).on("click", "#myonoffswitch12", function () {
                this.checked
                    ? (o("body").addClass("gradient-hor-header"),
                      o("body").removeClass("color-hor-header"),
                      o("body").removeClass("light-hor-header"),
                      o("body").removeClass("color-hor-menu"),
                      o("body").removeClass("light-hor-menu"),
                      o("body").removeClass("gradient-hor-menu"),
                      o("body").removeClass("dark-hor-menu"),
                      localStorage.setItem("gradient-hor-header", "True"))
                    : (o("body").removeClass("gradient-hor-header"),
                      localStorage.setItem("gradient-hor-header", "false"));
            }),
            o(document).on("click", "#myonoffswitch6", function () {
                this.checked
                    ? (o("body").addClass("color-hor-menu"),
                      o("body").removeClass("light-hor-menu"),
                      o("body").removeClass("dark-hor-menu"),
                      o("body").removeClass("gradient-hor-menu"),
                      o("body").removeClass("light-hor-header"),
                      o("body").removeClass("gradient-hor-header"),
                      o("body").removeClass("color-hor-header"),
                      localStorage.setItem("color-hor-menu", "True"))
                    : (o("body").removeClass("color-hor-menu"),
                      localStorage.setItem("color-hor-menu", "false"));
            }),
            o(document).on("click", "#myonoffswitch7", function () {
                this.checked
                    ? (o("body").addClass("light-hor-menu"),
                      o("body").removeClass("color-hor-menu"),
                      o("body").removeClass("dark-hor-menu"),
                      o("body").removeClass("gradient-hor-menu"),
                      o("body").removeClass("color-hor-header"),
                      o("body").removeClass("gradient-hor-header"),
                      o("body").removeClass("light-hor-header"),
                      localStorage.setItem("light-hor-menu", "True"))
                    : (o("body").removeClass("light-hor-menu"),
                      localStorage.setItem("light-hor-menu", "false"));
            }),
            o(document).on("click", "#myonoffswitch8", function () {
                this.checked
                    ? (o("body").addClass("dark-hor-menu"),
                      o("body").removeClass("light-hor-menu"),
                      o("body").removeClass("color-hor-menu"),
                      o("body").removeClass("gradient-hor-menu"),
                      o("body").removeClass("color-hor-header"),
                      o("body").removeClass("gradient-hor-header"),
                      o("body").removeClass("light-hor-header"),
                      localStorage.setItem("dark-hor-menu", "True"))
                    : (o("body").removeClass("dark-hor-menu"),
                      localStorage.setItem("dark-hor-menu", "false"));
            }),
            o(document).on("click", "#myonoffswitch9", function () {
                this.checked
                    ? (o("body").addClass("gradient-hor-menu"),
                      o("body").removeClass("color-hor-menu"),
                      o("body").removeClass("light-hor-menu"),
                      o("body").removeClass("dark-hor-menu"),
                      o("body").removeClass("color-hor-header"),
                      o("body").removeClass("gradient-hor-header"),
                      o("body").removeClass("light-hor-header"),
                      localStorage.setItem("gradient-hor-menu", "True"))
                    : (o("body").removeClass("gradient-hor-menu"),
                      localStorage.setItem("gradient-hor-menu", "false"));
            }),
            o(document).on("click", "#myonoffswitch-1", function () {
                this.checked
                    ? (o("body").addClass("sidemenu-bgimage"),
                      localStorage.setItem("sidemenu-bgimage", "True"))
                    : (o("body").removeClass("sidemenu-bgimage"),
                      localStorage.setItem("sidemenu-bgimage", "false"));
            }),
            o(document).on("click", "#myonoffswitch", function () {
                this.checked
                    ? (o("body").addClass("color-menu"),
                      o("body").removeClass("light-menu"),
                      o("body").removeClass("dark-menu"),
                      o("body").removeClass("gradient-menu"),
                      localStorage.setItem("color-menu", "True"))
                    : (o("body").removeClass("color-menu"),
                      localStorage.setItem("color-menu", "false"));
            }),
            o(document).on("click", "#myonoffswitch1", function () {
                this.checked
                    ? (o("body").addClass("light-menu"),
                      o("body").removeClass("color-menu"),
                      o("body").removeClass("dark-menu"),
                      o("body").removeClass("gradient-menu"),
                      localStorage.setItem("light-menu", "True"))
                    : (o("body").removeClass("light-menu"),
                      localStorage.setItem("light-menu", "false"));
            }),
            o(document).on("click", "#myonoffswitch2", function () {
                this.checked
                    ? (o("body").addClass("dark-menu"),
                      o("body").removeClass("color-menu"),
                      o("body").removeClass("light-menu"),
                      o("body").removeClass("gradient-menu"),
                      localStorage.setItem("dark-menu", "True"))
                    : (o("body").removeClass("dark-menu"),
                      localStorage.setItem("dark-menu", "false"));
            }),
            o(document).on("click", "#myonoffswitch5", function () {
                this.checked
                    ? (o("body").addClass("gradient-menu"),
                      o("body").removeClass("color-menu"),
                      o("body").removeClass("light-menu"),
                      o("body").removeClass("dark-menu"),
                      localStorage.setItem("gradient-menu", "True"))
                    : (o("body").removeClass("gradient-menu"),
                      localStorage.setItem("gradient-menu", "false"));
            }),
            o("#myonoffswitch15").click(function () {
                this.checked
                    ? (o("body").addClass("default"),
                      o("body").removeClass("boxed"),
                      localStorage.setItem("default", "True"))
                    : (o("body").removeClass("default"),
                      localStorage.setItem("default", "false"));
            }),
            o("#myonoffswitch17").click(function () {
                this.checked
                    ? (o("body").addClass("boxed"),
                      o("body").removeClass("default"),
                      localStorage.setItem("boxed", "True"))
                    : (o("body").removeClass("boxed"),
                      localStorage.setItem("boxed", "false"));
            });
    })(jQuery);
  })();
