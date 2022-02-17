// autocomplete functionality
if (jQuery('input#add-autocomplete').length > 0) {
    jQuery('input#add-autocomplete').typeahead({
        displayText: function(item) {
            return item.country_name
        },
        afterSelect: function(item) {
            this.$element[0].value = item.country_name;
            jQuery("input#field-autocomplete").val(item.country_id);
        },
        source: function(query, process) {
            jQuery.ajax({
                url: baseurl + "location/getCountryAutocomplete",
                data: { query: query },
                dataType: "json",
                type: "POST",
                success: function(data) {
                    process(data)
                }
            })
        }
    });
}