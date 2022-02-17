    // autocomplete functionality
    if (jQuery('input#add-autocomplete').length > 0) {
        jQuery('input#add-autocomplete').typeahead({
            displayText: function(item) {
                return item.faq_consultation;
            },
            afterSelect: function(item) {
                this.$element[0].value = item.faq_consultation;
                jQuery("input#field-autocomplete").val(item.faq_id);
            },
            source: function(query, process) {
                jQuery.ajax({
                    url: baseurl + "Faq/getFaqAutocomplete",
                    data: { query: query },
                    dataType: "JSON",
                    type: "POST",
                    success: function(data) {
                        process(data)
                    }
                })
            }
        });
    }