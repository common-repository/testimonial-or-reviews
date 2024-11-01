var styleid = jQuery('#orphita-styleid').val();
jQuery("#open-tabs-yes").on("change", function () {
    var data = "<strong>Link Open</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#open-tabs-no").on("change", function () {
    var data = "<strong>Link Open</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#orphita-animation").on("change", function () {
    var data = "<strong>Animation</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#animation-duration").on("change", function () {
    var data = "<strong>Animation Duration</strong> will works after saved data";
    jQuery.bootstrapGrowl(data, {});
});
jQuery("#testimonial-col").on("change", function () {
    jQuery(".orphita-testimonials-"+styleid+"-padding").removeClass("orphita-testimonial-or-reviews-col-1");
    jQuery(".orphita-testimonials-"+styleid+"-padding").removeClass("orphita-testimonial-or-reviews-col-2");
    jQuery(".orphita-testimonials-"+styleid+"-padding").removeClass("orphita-testimonial-or-reviews-col-3");
    jQuery(".orphita-testimonials-"+styleid+"-padding").removeClass("orphita-testimonial-or-reviews-col-4");
    jQuery(".orphita-testimonials-"+styleid+"-padding").removeClass("orphita-testimonial-or-reviews-col-5");
    jQuery(".orphita-testimonials-"+styleid+"-padding").removeClass("orphita-testimonial-or-reviews-col-6");
    jQuery(".orphita-testimonials-"+styleid+"-padding").addClass(jQuery("#testimonial-col").val());
});
jQuery("#testimonial-width").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-item-"+styleid+"{max-width: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#background-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{background-color: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#testimonial-position").on("change", function () {
    jQuery(".orphita-testimonials-style-"+styleid+"").removeClass("orphita-testimonials-right");
    jQuery(".orphita-testimonials-style-"+styleid+"").addClass(jQuery("#testimonial-position").val());
});
jQuery("#padding-top").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{padding: " + jQuery(this).val() + "px " + jQuery("#padding-left").val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#padding-left").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{padding: " + jQuery("#padding-top").val() + "px " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#margin-top").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-"+styleid+"-padding{padding: " + jQuery(this).val() + "px " + jQuery("#margin-left").val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#margin-left").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-"+styleid+"-padding{padding: " + jQuery("#margin-top").val() + "px " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#border-radius-top").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{border-radius: " + jQuery(this).val() + "px " + jQuery("#border-radius-bottom").val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#border-radius-bottom").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{border-radius: " + jQuery("#border-radius-top").val() + "px " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#boxshow-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{box-shadow: " + jQuery("#boxshow-horizontal").val() + "px " + jQuery("#boxshow-vertical").val() + "px " + jQuery("#boxshow-blur").val() + "px " + jQuery("#boxshow-spread").val() + "px " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#boxshow-horizontal").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{box-shadow: " + jQuery(this).val() + "px " + jQuery("#boxshow-vertical").val() + "px " + jQuery("#boxshow-blur").val() + "px " + jQuery("#boxshow-spread").val() + "px " + jQuery("#boxshow-color").val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#boxshow-vertical").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{box-shadow: " + jQuery("#boxshow-horizontal").val() + "px " + jQuery(this).val() + "px " + jQuery("#boxshow-blur").val() + "px " + jQuery("#boxshow-spread").val() + "px " + jQuery("#boxshow-color").val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#boxshow-blur").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{box-shadow: " + jQuery("#boxshow-horizontal").val() + "px " + jQuery("#boxshow-vertical").val() + "px " + jQuery(this).val() + "px " + jQuery("#boxshow-spread").val() + "px " + jQuery("#boxshow-color").val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#boxshow-spread").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{box-shadow: " + jQuery("#boxshow-horizontal").val() + "px " + jQuery("#boxshow-vertical").val() + "px " + jQuery("#boxshow-blur").val() + "px " + jQuery(this).val() + "px " + jQuery("#boxshow-color").val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-image-Width").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-image{width: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
    var intvalue = parseInt(jQuery(this).val(), 10);
    var value = (intvalue / 2);
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-image{margin-top: -" + value + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-image-height").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-image:after{padding-bottom: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-image-border-size").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{border: " + jQuery(this).val() + "px solid " + jQuery("#typo-image-border-color").val() + "; } </style>").appendTo("#orphita-preview-data");
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-image img{border: " + jQuery(this).val() + "px solid " + jQuery("#typo-image-border-color").val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-image-border-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"{border: " + jQuery("#typo-image-border-size").val() + "px solid " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-image img{border: " + jQuery("#typo-image-border-size").val() + "px solid " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-image-border-radius").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-image img{border-radius: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-info-size").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-info{font-size: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
    var intvalue = parseInt(jQuery(this).val(), 10);
    var value = intvalue * 1.30 * 3;
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-info{min-height: " + value + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-info-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-info{color: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery('#typo-info-family').change(function () {
    var font = jQuery(this).val().replace(/\+/g, ' ');
    font = font.split(':');
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-info{font-family:" + font[0] + ";} </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-info-style").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-info{font-style: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-info-weight").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-info{font-weight: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-info-padding-top").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-info{margin-top: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-info-padding-bottom").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-info{margin-bottom: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-name-size").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-name{font-size: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-name-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-name{color: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery('#typo-name-family').change(function () {
    var font = jQuery(this).val().replace(/\+/g, ' ');
    font = font.split(':');
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-name{font-family:" + font[0] + ";} </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-name-style").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-name{font-style: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-name-weight").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-name{font-weight: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-name-padding-top").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-name{padding-top: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-name-padding-left").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-name{padding-bottom: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-designation-size").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-working{font-size: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-designation-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-working{color: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-company-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-working a{color: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-company-hover-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-working a:hover,\n\
                                      .orphita-testimonials-style-"+styleid+"-working a:focus,\n\
                                      .orphita-testimonials-style-"+styleid+"-working a:active{color: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery('#typo-designation-family').change(function () {
    var font = jQuery(this).val().replace(/\+/g, ' ');
    font = font.split(':');
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-working{font-family:" + font[0] + ";} </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-designation-style").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-working{font-style: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-designation-weight").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-working{font-weight: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-designation-padding-top").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-working{padding-top: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-name-designation-left").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-working{padding-bottom: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-rating-size").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-rating .fa{font-size: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-rating-color").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-rating .fa{color: " + jQuery(this).val() + "; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-rating-margin-top").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-rating{padding-top: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
jQuery("#typo-rating-margin-bottom").on("change", function () {
    jQuery("<style type='text/css'> .orphita-testimonials-style-"+styleid+"-rating{padding-bottom: " + jQuery(this).val() + "px; } </style>").appendTo("#orphita-preview-data");
});
