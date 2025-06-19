/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/admin/js/scripts/ckeditor.js":
/*!*******************************************************!*\
  !*** ./resources/assets/admin/js/scripts/ckeditor.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var allEditors = document.querySelectorAll('.ckeditor');
for (var i = 0; i < allEditors.length; ++i) {
  ClassicEditor.create(allEditors[i], {
    ckfinder: {
      uploadUrl: '/api/helpers/ckeditor/upload-image'
    },
    toolbar: {
      items: ['heading', '|', 'bold', 'italic', 'blockQuote', 'underline', 'fontSize', 'fontFamily', 'fontBackgroundColor', 'fontColor', 'alignment', '|', 'bulletedList', 'numberedList', 'insertTable', '|', 'mediaEmbed', 'imageInsert', '|', 'outdent', 'indent', 'horizontalLine', '|', 'removeFormat', 'strikethrough', 'subscript', 'superscript']
    },
    language: 'ar',
    image: {
      toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side', 'linkImage']
    },
    table: {
      contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableCellProperties', 'tableProperties']
    }
  });
}

/***/ }),

/***/ "./resources/assets/admin/js/scripts/datatables.js":
/*!*********************************************************!*\
  !*** ./resources/assets/admin/js/scripts/datatables.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(".dt").DataTable({
  "order": [],
  "language": jsConfig.locale.datatable,
  "lengthMenu": [[10, 50, 100, 500, -1], [10, 50, 100, 500, jsConfig.locale.labels.all]]
});

/***/ }),

/***/ "./resources/assets/admin/js/scripts/script.js":
/*!*****************************************************!*\
  !*** ./resources/assets/admin/js/scripts/script.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

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
    var id = $(this).data("id");
    $(".file-input-" + id).removeClass("d-none");
  });
  $(".remove-file-btn").on("click", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $(".file-preview-" + id).remove();
    $(".file-input-" + id).removeClass("d-none");
  });
  $(":not(.modal-content) .search-select").select2({
    placeholder: jsConfig.locale.labels.click_to_choose,
    language: "ar",
    allowClear: true
  });
  $(".modal-content .search-select").select2({
    placeholder: jsConfig.locale.labels.click_to_choose,
    language: "ar",
    dropdownParent: $('.modal-content'),
    allowClear: true
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
    var type = $(this).data("type");
    var title = $(this).data("modal_title");
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

/***/ }),

/***/ "./resources/assets/admin/js/scripts/sidebar.large.js":
/*!************************************************************!*\
  !*** ./resources/assets/admin/js/scripts/sidebar.large.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
  "use strict";

  var $sidebarToggle = $(".menu-toggle");
  var $sidebarLeft = $(".sidebar-left");
  var $sidebarLeftSecondary = $(".sidebar-left-secondary");
  var $sidebarOverlay = $(".sidebar-overlay");
  var $mainContentWrap = $(".main-content-wrap");
  var $sideNavItem = $(".nav-item");
  function openSidebar() {
    $sidebarLeft.addClass("open");
    $mainContentWrap.addClass("sidenav-open");
  }
  function closeSidebar() {
    $sidebarLeft.removeClass("open");
    $mainContentWrap.removeClass("sidenav-open");
  }
  function openSidebarSecondary() {
    $sidebarLeftSecondary.addClass("open");
    $sidebarOverlay.addClass("open");
  }
  function closeSidebarSecondary() {
    $sidebarLeftSecondary.removeClass("open");
    $sidebarOverlay.removeClass("open");
  }
  function openSidebarOverlay() {
    $sidebarOverlay.addClass("open");
  }
  function closeSidebarOverlay() {
    $sidebarOverlay.removeClass("open");
  }
  function navItemToggleActive($activeItem) {
    var $navItem = $(".nav-item");
    $navItem.removeClass("active");
    $activeItem.addClass("active");
  }
  function initLayout() {
    // Makes secondary menu selected on page load
    $sideNavItem.each(function (index) {
      var $item = $(this);
      if ($item.hasClass("active")) {
        var dataItem = $item.data("item");
        $sidebarLeftSecondary.find("[data-parent=\"".concat(dataItem, "\"]")).show();
      }
    });
    if (gullUtils.isMobile()) {
      closeSidebar();
      closeSidebarSecondary();
    }
  }
  $(window).on("resize", function (event) {
    if (gullUtils.isMobile()) {
      closeSidebar();
      closeSidebarSecondary();
    }
  });
  initLayout(); // Show Secondary menu area on hover on side menu item;

  $sidebarLeft.find(".nav-item").on("mouseenter", function (event) {
    var $navItem = $(event.currentTarget);
    var dataItem = $navItem.data("item");

    //navItemToggleActive($navItem);

    if (dataItem) {
      openSidebarSecondary();
    } else {
      closeSidebarSecondary();
    }
    $sidebarLeftSecondary.find(".childNav").hide();
    $sidebarLeftSecondary.find("[data-parent=\"".concat(dataItem, "\"]")).show();
  }); // Prevent opening link if has data-item

  $sidebarLeft.find(".nav-item").on("click", function (e) {
    var $navItem = $(event.currentTarget);
    var dataItem = $navItem.data("item");
    if (dataItem) {
      e.preventDefault();
    }
  }); // Hide secondary menu on click on overlay

  $sidebarOverlay.on("click", function (event) {
    if (gullUtils.isMobile()) {
      closeSidebar();
    }
    closeSidebarSecondary();
  }); // Toggle menus on click on header toggle icon

  $sidebarToggle.on("click", function (event) {
    var isSidebarOpen = $sidebarLeft.hasClass("open");
    var isSidebarSecOpen = $sidebarLeftSecondary.hasClass("open");
    var dataItem = $(".nav-item.active").data("item");
    if (isSidebarOpen && isSidebarSecOpen && gullUtils.isMobile()) {
      closeSidebar();
      closeSidebarSecondary();
    } else if (isSidebarOpen && isSidebarSecOpen) {
      closeSidebarSecondary();
    } else if (isSidebarOpen) {
      closeSidebar();
    } else if (!isSidebarOpen && !isSidebarSecOpen && !dataItem) {
      openSidebar();
    } else if (!isSidebarOpen && !isSidebarSecOpen) {
      openSidebar();
      openSidebarSecondary();
    }
  });
});

/***/ }),

/***/ "./resources/assets/admin/js/scripts/sort.js":
/*!***************************************************!*\
  !*** ./resources/assets/admin/js/scripts/sort.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(".sortable").sortable({
  handle: ".i-Cursor-Move",
  update: function update(event, ui) {
    var table_name = $(this).attr("table-name");
    var ids = [];
    $(this).find('tr').each(function () {
      ids.push($(this).attr("item-id"));
    });
    $.ajax({
      url: "/api/helpers/sorting",
      type: "post",
      data: {
        ids: ids,
        table_name: table_name
      }
    });
  }
});

/***/ }),

/***/ "./resources/assets/admin/scss/themes/dark-purple.scss":
/*!*************************************************************!*\
  !*** ./resources/assets/admin/scss/themes/dark-purple.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/admin/scss/themes/lite-blue.scss":
/*!***********************************************************!*\
  !*** ./resources/assets/admin/scss/themes/lite-blue.scss ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/admin/scss/themes/lite-purple.scss":
/*!*************************************************************!*\
  !*** ./resources/assets/admin/scss/themes/lite-purple.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/assets/admin/js/scripts/script.js ./resources/assets/admin/js/scripts/sidebar.large.js ./resources/assets/admin/js/scripts/ckeditor.js ./resources/assets/admin/js/scripts/datatables.js ./resources/assets/admin/js/scripts/sort.js ./resources/assets/admin/scss/themes/lite-purple.scss ./resources/assets/admin/scss/themes/lite-blue.scss ./resources/assets/admin/scss/themes/dark-purple.scss ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\wamp64\www\points-market\Src\resources\assets\admin\js\scripts\script.js */"./resources/assets/admin/js/scripts/script.js");
__webpack_require__(/*! C:\wamp64\www\points-market\Src\resources\assets\admin\js\scripts\sidebar.large.js */"./resources/assets/admin/js/scripts/sidebar.large.js");
__webpack_require__(/*! C:\wamp64\www\points-market\Src\resources\assets\admin\js\scripts\ckeditor.js */"./resources/assets/admin/js/scripts/ckeditor.js");
__webpack_require__(/*! C:\wamp64\www\points-market\Src\resources\assets\admin\js\scripts\datatables.js */"./resources/assets/admin/js/scripts/datatables.js");
__webpack_require__(/*! C:\wamp64\www\points-market\Src\resources\assets\admin\js\scripts\sort.js */"./resources/assets/admin/js/scripts/sort.js");
__webpack_require__(/*! C:\wamp64\www\points-market\Src\resources\assets\admin\scss\themes\lite-purple.scss */"./resources/assets/admin/scss/themes/lite-purple.scss");
__webpack_require__(/*! C:\wamp64\www\points-market\Src\resources\assets\admin\scss\themes\lite-blue.scss */"./resources/assets/admin/scss/themes/lite-blue.scss");
module.exports = __webpack_require__(/*! C:\wamp64\www\points-market\Src\resources\assets\admin\scss\themes\dark-purple.scss */"./resources/assets/admin/scss/themes/dark-purple.scss");


/***/ })

/******/ });