
jQuery(".orphita-admin-font").fontselect();

jQuery(".orphita-tabs-ul li:first").addClass("active");
jQuery(".orphita-tabs-content-tabs:first").addClass("active");
jQuery(".orphita-tabs-ul li").click(function () {
    jQuery(".orphita-tabs-ul li").removeClass("active");
    jQuery(this).toggleClass("active");
    jQuery(".orphita-tabs-content-tabs").removeClass("active");
    var activeTab = jQuery(this).attr("ref");
    jQuery(activeTab).addClass("active");
});
jQuery('[data-toggle="tooltip"]').tooltip();
jQuery("#orphita-preview-data-background").on("change", function () {
    jQuery("<style type='text/css'> #orphita-preview-data{ background-color:" + jQuery('#orphita-preview-data-background').val() + ";} </style>").appendTo("#orphita-preview-data");
});
jQuery('.orphita-carousel-nev-style').click(function (e) {
    jQuery('.orphita-carousel-nev-style').css('color', '#a7a7a7').siblings('input').prop('checked', false);
    jQuery(this).css('color', '#E00086').siblings('input').prop('checked', true);
});
jQuery(".orphita-style-clone").on("click", function () {
    var dataid = jQuery(this).attr("dataid");
    jQuery("#orphita-style-id").val(dataid);
});
jQuery('.orphita-style-delete').submit(function () {
    var status = confirm("Do you Want to Delete?");
    if (status == false) {
        return false;
    } else {
        return true;
    }
});
jQuery('.orphita-color').each(function () {
    jQuery(this).minicolors({
        control: jQuery(this).attr('data-control') || 'hue',
        defaultValue: jQuery(this).attr('data-defaultValue') || '',
        format: jQuery(this).attr('data-format') || 'hex',
        keywords: jQuery(this).attr('data-keywords') || '',
        inline: jQuery(this).attr('data-inline') === 'true',
        letterCase: jQuery(this).attr('data-letterCase') || 'lowercase',
        opacity: jQuery(this).attr('data-opacity'),
        position: jQuery(this).attr('data-position') || 'bottom left',
        swatches: jQuery(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
        change: function (value, opacity) {
            if (!value)
                return;
            if (opacity)
                value += ', ' + opacity;
            if (typeof console === 'object') {
                console.log(value);
            }
        },
        theme: 'bootstrap'
    });

});
jQuery('#orphita-admin-add-new-item').on('click', function () {
    jQuery("#orphita-oxi-testimonial-add-new-data").modal("show");
});
jQuery('#orphita-drag-and-drop').on('click', function () {
    jQuery("#orphita-drag-and-drop-data").modal("show");
});
jQuery('#orphita-drag-and-drop').on('click', function () {
    jQuery("#orphita-drag-and-drop-data").modal("show");
    jQuery("#orphita-drag-saving").slideUp();
    jQuery("#orphita-drag-drop").slideDown();
    jQuery("#orphita-drag-and-drop-data-close").slideDown();
    jQuery('#orphita-drag-and-drop-data-submit').val('Submit');

});
jQuery('#orphita-drag-drop').sortable({
    axis: 'y',
    opacity: 0.7
});
