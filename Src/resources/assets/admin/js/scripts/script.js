"use strict";

var csrf = $('meta[name="csrf-token"]').attr('content');




function cancelFullScreen(el) {
    var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el.exitFullscreen;

    if (requestMethod) {
        requestMethod.call(el);
    } else if (typeof window.ActiveXObject !== "undefined") {
        var wscript = new ActiveXObject("WScript.Shell");

        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

function requestFullScreen(el) {
    var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

    if (requestMethod) {
        requestMethod.call(el);
    } else if (typeof window.ActiveXObject !== "undefined") {
        var wscript = new ActiveXObject("WScript.Shell");

        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }

    return false;
}

function toggleFullscreen() {
    var elem = document.body;
    var isInFullScreen = document.fullScreenElement && document.fullScreenElement !== null || document.mozFullScreen || document.webkitIsFullScreen;

    if (isInFullScreen) {
        cancelFullScreen(document);
    } else {
        requestFullScreen(elem);
    }

    return false;
}



$(function () {
    "use strict";

    var $searchInput = $(".search-bar input");
    var $searchCloseBtn = $(".search-close");

    window.gullUtils = {
        isMobile: function isMobile() {
            return window && window.matchMedia("(max-width: 767px)").matches;
        },
        changeCssLink: function changeCssLink(storageKey, fileUrl) {
            localStorage.setItem(storageKey, fileUrl);
            location.reload();
        }
    };

    var $searchUI = $(".search-ui");
    $searchInput.on("focus", function () {
        $searchUI.addClass("open");
    });
    $searchCloseBtn.on("click", function () {
        $searchUI.removeClass("open");
    });

    var $dropdown = $(".dropdown-sidemenu");
    var $subMenu = $(".submenu");
    $dropdown.find("> a").on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var $parent = $(this).parent(".dropdown-sidemenu");
        $dropdown.not($parent).removeClass("open");
        $(this).parent(".dropdown-sidemenu").toggleClass("open");
    });

    $(".perfect-scrollbar, [data-perfect-scrollbar]").each(function (index) {
        var $el = $(this);
        var ps = new PerfectScrollbar(this, {
            suppressScrollX: $el.data("suppress-scroll-x"),
            suppressScrollY: $el.data("suppress-scroll-y")
        });
    });

    $("[data-fullscreen]").on("click", toggleFullscreen);

    $(".tooltips").tooltip();

    $(".edit-file-btn").on("click", function (e) {
        e.preventDefault();
        let id = $(this).data("id");

        $(".file-input-" + id).removeClass("d-none");
    });

    $(".remove-file-btn").on("click", function (e) {
        e.preventDefault();
        let id = $(this).data("id");

        $(".file-preview-" + id).remove();
        $(".file-input-" + id).removeClass("d-none");
    });

    $(":not(.modal-content) .search-select").select2({
        placeholder: jsConfig.locale.labels.click_to_choose,
        language: "ar",
        allowClear: true,

    });

    $(".modal-content .search-select").select2({
        placeholder: jsConfig.locale.labels.click_to_choose,
        language: "ar",
        dropdownParent: $('.modal-content'),
        allowClear: true,

    });


    $(".nav-tabs li a").on("click", function () {
        var tab = $(this).attr("href");
        $.ajax({
            url: "/admin/helpers/change_tab",
            data: {
                tab: tab,
                _token: csrf,
                current_url: location.pathname
            },
            type: "post"
        });
    });




    $(".openRepositoryModal").click(function (e) {
        e.preventDefault();
        let type = $(this).data("type");
        let title = $(this).data("modal_title");
        $("#addToRepositoryModal #type").val(type);
        $("#addToRepositoryModal").modal();

        $("#addToRepositoryModal .modal-title").html(title);
    });



    $(".confirm-form").click(function (e) {
        if (confirm(jsConfig.locale.labels.are_you_sure)) {
            $(this).submit();
        }
    });


    $(".confirm-link").click(function (e) {
        return confirm(jsConfig.locale.labels.are_you_sure);
    });















});
