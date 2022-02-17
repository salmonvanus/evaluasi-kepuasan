<div class="uk-section uk-section-large uk-section-default">
    <div class="uk-container">
        <div data-uk-grid>
            <div class="uk-width-1-3@m">
                <div class="uk-visible@m" data-uk-sticky="offset: 140; bottom: true">
                    <div>
                        <h3 class="uk-margin-small-bottom">Kategori</h3>
                        <ul class="uk-nav uk-nav-default">
                            <?php foreach ($category as $data) : ?>
                                <li><a href="<?= base_url('Landing/detail_consultation_category/') . $data['category_id']; ?>"><?= $data['category_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-expand@m">
                <ul class="uk-breadcrumb uk-margin-bottom uk-text-500">
                    <li><a href=""><?= $activePage; ?></a></li>
                    <!-- <li><a href="category.html">Payments & Prices</a></li> -->
                    <li><span style="color: red;">Daftar Faq</span></li>
                </ul>
                <div>
                    <h2 class="uk-h1 uk-margin-remove">FAQ</h2>
                </div>
                <div class="uk-child-width-1-1 uk-h4 uk-text-500 uk-margin-medium-top" data-uk-grid>
                    <?php foreach ($faq as $data) : ?>
                        <div><a href="<?= base_url('Faq/detail_faq/') . $data['faq_id']; ?>"><?= $data['faq_consultation']; ?></a></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>