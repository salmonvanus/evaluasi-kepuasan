// // autocomplete functionality
// document.addEventListener("DOMContentLoaded", (function() {
//     if (jQuery('input#search-hero').length > 0) {
//         jQuery('input#search-hero').typeahead({

//             displayText: function(item) {
//                 var n = item.faq_consultation;
//                 return n;
//             },
//             afterSelect: function(item) {
//                 this.$element[0].value = item.faq_consultation;
//                 jQuery("input#field-search-hero").val(item.faq_id);
//             },
//             source: function(query, process) {
//                 jQuery.ajax({
//                     url: baseurl + "Faq/getFaqAutocomplete",
//                     data: { query: query },
//                     dataType: "JSON",
//                     type: "POST",
//                     success: function(data) {
//                         process(data)
//                     }
//                 })
//             }
//         });

//     }
// }))
ambilData();

function ambilData() {
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('/Faq/show_faq_to_dom') ?>/",
        dataType: "JSON",
        success: function(data) {
            console.log(data)
        }
    })
}

// return c;