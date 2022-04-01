//  Notifications & messages scrollable

$(function() {
    "use strict";

    var Font = Quill.import("formats/font");
    Font.whitelist = ["sofia", "slabo", "roboto", "inconsolata", "ubuntu"];
    Quill.register(Font, true);

    // Email left Sidebar
    if ($(".sidebar-menu-list").length > 0) {
        var sidebar_menu_list = new PerfectScrollbar(".sidebar-menu-list");
    }

    // User list scroll
    if ($(".email-user-list").length > 0) {
        var users_list = new PerfectScrollbar(".email-user-list");
    }

    // Email detail section

    if ($(".email-scroll-area").length > 0) {
        var users_list = new PerfectScrollbar(".email-scroll-area");
    }
    // Email left Sidebar

    // Modal dialog scroll
    if ($(".modal-dialog-scrollable .modal-body").length > 0) {
        var sidebar_menu_list = new PerfectScrollbar(
            ".modal-dialog-scrollable .modal-body"
        );
    }

    // Compose Modal - Reset Input Value on Click compose btn
    $(".compose-btn .btn").on("click", function(e) {
        // all input forms
        $(".modal .modal-body input").val("");
        // quill editor content
        var quill_editor = $(".modal .modal-body .ql-editor");
        quill_editor[0].innerHTML = "";
        // file input content
        var file_input = $(
            ".modal .modal-body .custom-file .custom-file-label"
        );
        file_input[0].innerHTML = "";
    });

    // Main menu toggle should hide app menu
    $(".menu-toggle").on("click", function(e) {
        $(".app-content .sidebar-left").removeClass("show");
        $(".app-content .app-content-overlay").removeClass("show");
    });

    // On sidebar close click
    $(".email-application .sidebar-close-icon").on("click", function() {
        $(".sidebar-left").removeClass("show");
        $(".app-content-overlay").removeClass("show");
    });

    // Email sidebar toggle
    $(".sidebar-toggle").on("click", function(e) {
        e.stopPropagation();
        $(".app-content .sidebar-left").toggleClass("show");
        $(".app-content .app-content-overlay").addClass("show");
    });
    $(".app-content .app-content-overlay").on("click", function(e) {
        $(".app-content .sidebar-left").removeClass("show");
        $(".app-content .app-content-overlay").removeClass("show");
    });

    // Email Right sidebar toggle
    $(document).on("click", ".email-user-list li", function(e) {
        var title = $(this).attr("data-user");
        var service_title = $(this).attr("data-service_title");

        var booking_title = $(this).attr("data-booking_title");

        var image = $(this).attr("data-service_image");
        var status = $(this).attr("data-booking_status");
        var date = $(this).attr("data-booking_date");
        var time = $(this).attr("data-booking_time");
        var body = $(this).attr("data-booking_description");
        var address = $(this).attr("data-booking_address");

        // window.livewire.set();
        var status_color = "bullet-" + status;
        document.getElementById("service_title").innerHTML = title;
        document.getElementById("service_name").innerHTML = title;
        document.getElementById(
            "dropdownMenuButton200"
        ).innerHTML = booking_title;
        document.getElementById(
            "booking_service_name"
        ).innerHTML = service_title;
        var el = document.getElementById("status_color");
        if (el.classList.contains("bullet-En-Attente")) {
            el.classList.remove("bullet-En-Attente");
        }
        if (el.classList.contains("bullet-En-Cours")) {
            el.classList.remove("bullet-En-Cours");
        }
        if (el.classList.contains("bullet-Terminée")) {
            el.classList.remove("bullet-Terminée");
        }
        if (el.classList.contains("bullet-Annulée")) {
            el.classList.remove("bullet-Annulée");
        }
        if (el.classList.contains("bullet-Acceptée")) {
            el.classList.remove("bullet-Acceptée");
        }
        if (el.classList.contains("bullet-Réjétée")) {
            el.classList.remove("bullet-Réjétée");
        }
        document.getElementById("booking_title").innerHTML = booking_title;
        $("#status_color").toggleClass(status_color);

        document.getElementById("booking_status").innerHTML = status;
        document.getElementById("booking_date").innerHTML = date;
        document.getElementById("booking_time").innerHTML = time;
        document.getElementById("booking_date_time").innerHTML =
            time + "-" + date;

        document.getElementById("booking_time").innerHTML = time;
        document.getElementById("booking_address").innerHTML = address;

        document.getElementById("booking_description").innerHTML = body;

        document.getElementById("service_image").src = image;

        $(".app-content .email-app-details").toggleClass("show");
    });

    // Add class active on click of sidebar list
    $(".email-application .list-group-messages label").on("click", function() {
        if (
            $(".email-application .list-group-messages label").hasClass(
                "active"
            )
        ) {
            $(".email-application .list-group-messages label").removeClass(
                "active"
            );
        }
        $(this).addClass("active");
    });

    // Email detail view back button click
    $(".go-back").on("click", function(e) {
        e.stopPropagation();
        $(".app-content .email-app-details").removeClass("show");
    });

    // For app sidebar on small screen
    if ($(window).width() > 768) {
        if ($(".app-content .app-content-overlay").hasClass("show")) {
            $(".app-content .app-content-overlay").removeClass("show");
        }
    }
    // Favorite star click
    $(".email-application .favorite i").on("click", function(e) {
        $(this)
            .parent(".favorite")
            .toggleClass("warning");
        e.stopPropagation();
    });

    // On checkbox click stop propogation
    $(".email-user-list .vs-checkbox-con input").on("click", function(e) {
        e.stopPropagation();
    });

    // Select all checkbox
    $(document).on("click", ".email-app-list .selectAll input", function() {
        $(".user-action .vs-checkbox-con input").prop("checked", this.checked);
    });

    // Delete Mail from list
    $(".email-application .mail-delete").on("click", function() {
        $(".email-application .user-action .vs-checkbox-con input:checked")
            .closest("li")
            .remove();
        $(".email-application .selectAll input").prop("checked", "");
    });

    // Mark mail unread
    $(".email-application .mail-unread").on("click", function() {
        $(".email-application .user-action .vs-checkbox-con input:checked")
            .closest("li")
            .removeClass("mail-read");
    });

    // Filter
    $(".email-app-list #email-search").on("keyup", function() {
        var value = $(this)
            .val()
            .toLowerCase();
        if (value != "") {
            $(".email-user-list .users-list-wrapper li").filter(function() {
                $(this).toggle(
                    $(this)
                        .text()
                        .toLowerCase()
                        .indexOf(value) > -1
                );
            });
            var tbl_row = $(".email-user-list .users-list-wrapper li:visible")
                .length; //here tbl_test is table name

            //Check if table has row or not
            if (tbl_row == 0) {
                $(".email-user-list .no-results").addClass("show");
            } else {
                if ($(".email-user-list .no-results").hasClass("show")) {
                    $(".email-user-list .no-results").removeClass("show");
                }
            }
        } else {
            // If filter box is empty
            $(".email-user-list .users-list-wrapper li").show();
            if ($(".email-user-list .no-results").hasClass("show")) {
                $(".email-user-list .no-results").removeClass("show");
            }
        }
    });

    document.addEventListener("DOMSubtreeModified", () => {
        // User list scroll
        if ($(".email-user-list").length > 0) {
            $(".khra").addClass("ps ps-active-y ps--active-y ps--scrolling-y");
        }
        if ($(".email-scroll-area").length > 0) {
            //sidebar_menu_list.update();

            $(".email-scroll-area").addClass(
                "ps ps-active-y ps--active-y ps--scrolling-y"
            );
        }
        if ($(".sidebar-menu-list").length > 0) {
            $(".sidebar-menu-list").addClass(
                "ps ps-active-y ps--active-y ps--scrolling-y"
            );
        }
    });
    // Email compose Editor

    var emailEditor = new Quill("#email-container .editor", {
        bounds: "#email-container .editor",
        modules: {
            formula: true,
            syntax: true,
            toolbar: [
                [
                    "bold",
                    "italic",
                    "underline",
                    "strike",
                    "link",
                    "blockquote",
                    "code-block",
                    {
                        header: "1"
                    },
                    {
                        header: "2"
                    },
                    {
                        list: "ordered"
                    },
                    {
                        list: "bullet"
                    }
                ],
                [
                    {
                        font: []
                    }
                ]
            ]
        },
        placeholder: "Message",
        theme: "snow"
    });

    var editors = [emailEditor];
});

$(window).on("resize", function() {
    // remove show classes from sidebar and overlay if size is > 992
    if ($(window).width() > 768) {
        if ($(".app-content .app-content-overlay").hasClass("show")) {
            $(".app-content .sidebar-left").removeClass("show");
            $(".app-content .app-content-overlay").removeClass("show");
        }
    }
});