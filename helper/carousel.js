var styleid = jQuery('#orphita-styleid').val();

jQuery("#orphita-carousel-yes").on("change", function () {
    var data = "<strong>Active Slider</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-no").on("change", function () {
    var data = "<strong>Active Slider</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-center-mode-yes").on("change", function () {
    var data = "<strong>Center Mode</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-center-mode-no").on("change", function () {
    var data = "<strong>Center Mode</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-autoplay-yes").on("change", function () {
    var data = "<strong>Auto Play</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-autoplay-no").on("change", function () {
    var data = "<strong>Auto Play</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-autoplay-time").on("change", function () {
    var data = "<strong>Autoplay Time</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-navigation-no").on("change", function () {
    var data = "<strong>Active Navigation</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-navigation-yes").on("change", function () {
    var data = "<strong>Active Navigation</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery(".orphita-carousel-navigation-style").on("change", function () {
    var data = "<strong>Navimation Style</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});

jQuery("#orphita-carousel-navigation-size").on("change", function () {
    var intvalue = parseInt(jQuery(this).val(), 10);
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-nav [class*='owl-']{font-size: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-nav [class*='owl-']{margin-top: -" + intvalue / 2 + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-navigation-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-nav [class*='owl-']{color: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-navigation-active-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-nav [class*='owl-']:hover{color: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-navigation-posion").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-nav [class*='owl-']{left: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-nav .owl-next{right: " + jQuery(this).val() + "px; left: auto; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-navigation-showing-type-no").on("change", function () {
    var data = "<strong>Showing Type</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-navigation-showing-type-yes").on("change", function () {
    var data = "<strong>Showing Type</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-pagination-no").on("change", function () {
    var data = "<strong>Pagination</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-pagination-yes").on("change", function () {
    var data = "<strong>Pagination</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});

jQuery("#orphita-carousel-pagination-position").on("change", function () {
    var data = "<strong>Position</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});

jQuery("#orphita-carousel-pagination-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-dots .owl-dot span{background: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-pagination-active-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-dots .owl-dot.active span{background: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-dots .owl-dot:hover span{background: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-pagination-width").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-dots .owl-dot span{width: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-pagination-height").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-dots .owl-dot span{height: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-pagination-active-size").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-dots .owl-dot.active span{ transform: scale(" + jQuery(this).val() + "); } </style>").appendTo("#orphita-preview-data");
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-dots .owl-dot:hover span{ transform: scale(" + jQuery(this).val() + "); } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-pagination-margin-top").on("change", function () {
    var data = "<strong>Margin Top Bottom</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-carousel-pagination-margin-left").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-dots .owl-dot span{ margin: 0px " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#orphita-carousel-pagination-radius").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonial-carousel-" + styleid + " .owl-dots .owl-dot span{ border-radius: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
