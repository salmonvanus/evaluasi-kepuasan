<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">
        <a class="uk-logo" href="<?= base_url('Landing'); ?>">Konsultasi Hukum</a>
        <button class="uk-offcanvas-close" type="button" data-uk-close></button>
        <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-top uk-text-center uk-text-500">
            <li class="uk-active"><a href="<?= base_url('Landing'); ?>">Beranda</a></li>
            <li><a href="<?= base_url('Faq'); ?>">Faq</a></li>
            <li><a href="<?= base_url('Article'); ?>">Artikel</a></li>
            <li>
                <div class="uk-navbar-item"><a class="uk-button uk-button-primary" href="<?= base_url('Consultation_form'); ?>">Konsultasi</a></div>
            </li>
        </ul>
        <div class="uk-margin-top uk-text-center">
            <div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
                <div>
                    <a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link" target="_blank"></a>
                </div>
                <div>
                    <a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link" target="_blank"></a>
                </div>
                <div>
                    <a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link" target="_blank"></a>
                </div>
                <div>
                    <a href="https://vimeo.com/" data-uk-icon="icon: vimeo" class="uk-icon-link" target="_blank"></a>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="uk-section uk-section-muted uk-section-small">
    <div class=" uk-container uk-text-muted uk-margin-small-top">
        <div class="uk-margin uk-margin-small-bottom ">
            <img style="width: 40%; height: 40%;" class="mt-0" src="<?= base_url('assets_user/images/'); ?>logo_footer.png" alt="">
        </div>
        <div class="uk-margin uk-margin-small-bottom">
            <a href="#" class="uk-logo">
                Alamat Kantor
            </a>
        </div>
        <div class="uk-margin uk-margin-small-top uk-text-small">
            <p style="font-size: medium;">Jl. Trans Sulawesi, Pondang, Amurang Tim. Kabupaten Minahasa Selatan, Sulawesi Utara</p>
            <hr class="uk-margin uk-margin-0-top" />
        </div>
        <div class="uk-margin uk-text-small uk-margin-large-top">
            <p style="font-size: smaller;">Powered by <a href="https://cleverlabs.id/" target="_blank">Cleverlabs Indonesia</a> in Manado, North Sulawesi.</p>
        </div>
        <!-- <div class="uk-margin">
            <div data-uk-grid class="uk-child-width-auto uk-grid-collapse">
                <div class="uk-margin-small-right">
                    <a href="#" data-uk-icon="icon: facebook" class="uk-icon-link uk-icon" target="_blank"></a>
                </div>
                <div class="uk-margin-small-right">
                    <a href="#" data-uk-icon="icon: instagram" class="uk-icon-link uk-icon" target="_blank"></a>
                </div>
                <div class="uk-margin-small-right">
                    <a href="#" data-uk-icon="icon: twitter" class="uk-icon-link uk-icon" target="_blank"></a>
                </div>
                <div class="uk-margin-small-right">
                    <a href="#" data-uk-icon="icon: youtube" class="uk-icon-link uk-icon" target="_blank"></a>
                </div>
                <div class="uk-margin-small-right">
                    <a href="#" data-uk-icon="icon: vimeo" class="uk-icon-link uk-icon" target="_blank"></a>
                </div>
            </div>
        </div> -->
    </div>
</footer>

<script src="<?= base_url('assets_user/'); ?>js/awesomplete2.js"></script>

<script>
    var baseurl = "<?php echo site_url(); ?>";
</script>


<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<!-- <script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>Faq/show_faq",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            })
        }

        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script> -->

<!-- <script>
    function delete_search_history(id) {
        fetch("<?= base_url('Faq/proses_search_data'); ?>", {

            method: "POST",

            body: JSON.stringify({
                action: 'delete',
                id: id
            }),

            headers: {
                'Content-type': 'application/json; charset=UTF-8'
            }

        }).then(function(response) {

            return response.json();

        }).then(function(responseData) {
            load_search_history();
        });
    }

    function load_search_history() {
        var search_query = document.getElementsByName('search_box')[0].value;

        if (search_query == '') {

            fetch("<?= base_url('Faq/proses_search_data'); ?>", {

                method: "POST",

                body: JSON.stringify({
                    action: 'fetch'
                }),

                headers: {
                    'Content-type': 'application/json; charset=UTF-8'
                }

            }).then(function(response) {

                return response.json();

            }).then(function(responseData) {

                if (responseData.length > 0) {

                    var html = '<ul class="list-group">';

                    html += '<li class="list-group-item d-flex justify-content-between align-items-center"><b class="text-primary"><i>Your Recent Searches</i></b></li>';

                    for (var count = 0; count < responseData.length; count++) {

                        html += '<li class="list-group-item text-muted" style="cursor:pointer"><i class="fas fa-history mr-3"></i><span onclick="get_text(this)">' + responseData[count].search_query + '</span> <i class="far fa-trash-alt float-right mt-1" onclick="delete_search_history(' + responseData[count].id + ')"></i></li>';

                    }

                    html += '</ul>';

                    document.getElementById('search_result').innerHTML = html;

                }

            });

        }
    }

    function get_text(event) {
        var string = event.textContent;
        //fetch api
        fetch("<?= base_url('Faq/proses_search_data'); ?>", {

            method: "POST",

            body: JSON.stringify({
                search_query: string
            }),

            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        }).then(function(response) {

            return response.json();

        }).then(function(responseData) {

            document.getElementsByName('search_box')[0].value = string;

            document.getElementById('search_result').innerHTML = '';

        });

    }

    function load_data(query) {
        if (query.length > 2) {
            var form_data = new FormData();

            form_data.append('query', query);

            var ajax_request = new XMLHttpRequest();

            ajax_request.open('POST', "<?= base_url('Faq/proses_search_data'); ?>");

            ajax_request.send(form_data);

            ajax_request.onreadystatechange = function() {
                if (ajax_request.readyState == 4 && ajax_request.status == 200) {
                    var response = JSON.parse(ajax_request.responseText);

                    var html = '<div class="list-group">';

                    if (response.length > 0) {
                        for (var count = 0; count < response.length; count++) {
                            html += '<a href="#" class="list-group-item list-group-item-action" onclick="get_text(this)">' + response[count].post_title + '</a>';
                        }
                    } else {
                        html += '<a href="#" class="list-group-item list-group-item-action disabled">No Data Found</a>';
                    }

                    html += '</div>';

                    document.getElementById('search_result').innerHTML = html;
                }
            }
        } else {
            document.getElementById('search_result').innerHTML = '';
        }
    }

    /*var ignore_element = document.getElementById('search_box');

    document.addEventListener('click', function(event) {
        var check_click = ignore_element.contains(event.target);
        if (!check_click) 
        {
            document.getElementById('search_result').innerHTML = '';
        }
    });*/
</script> -->


</body>

</html>