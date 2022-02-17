<?php
echo $this->session->flashdata('message');
?>
<div class="uk-section uk-section-large uk-section-default">
	<div class="uk-container">
		<div data-uk-grid>
			<div class="uk-width-1-3@m">
				<?php foreach ($category as $data) : ?>
					<h2 class="uk-h1"><a href="<?= base_url('Landing/detail_consultation_category/') . $data['category_id']; ?>"><?php echo $data['category_name']; ?>
						</a></h2>
				<?php endforeach; ?>
			</div>
			<div class="uk-width-expand@m">
				<div class="uk-child-width-1-2@s uk-h4 uk-text-500" data-uk-grid>
					<?php foreach ($faq as $data) : ?>
						<div><a href="<?= base_url('Faq/detail_faq/') . $data['faq_id']; ?>">
								<?php echo '<u style="color:black;">' . $data['category_name'] . '</u>';
								echo " - ";
								echo substr($data['faq_consultation'], 0, 50) . "..."; ?></a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="uk-section uk-section-large uk-section-secondary">
	<div class="uk-container">
		<h2 class="uk-h1 uk-text-center">Video Seputar Sulawesi Utara</h2>
		<!-- <p class="uk-text-center uk-text-lead">Watch step by step tutorials and lear how to use our
			awesome product</p> -->
		<div class="uk-margin-large-top uk-child-width-1-3@l uk-child-width-1-2@s" data-uk-grid>
			<?php foreach ($video as $data) : ?>
				<div>
					<!-- <h4 class="uk-margin-bottom uk-text-center" data-uk-lightbox><a href="https://vimeo.com/169007268" data-caption="Vimeo Video" class="">Measuring your shoe size</a></h4> -->
					<div class="uk-inline uk-light" data-uk-lightbox style="width: 350; height:215">
						<iframe width="350" height="215" alt="video" src="<?= $data['video_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="uk-section uk-section-large uk-section-muted">
	<div class="uk-container uk-container-xsmall">
		<h2 class="uk-h1 uk-text-center">Frequently asked questions</h2>
		<p class="uk-text-center uk-text-lead">Ada pertanyaan terkait hukum ? Jika pertanyaan yang anda cari tidak ada, masukkan pertanyaan anda <a href="<?php echo base_url('Consultation_form'); ?>">disni!</a></p>

		</a>
		<ul class="uk-margin-large-top" data-uk-accordion="multiple: true">
			<?php foreach ($consultation_respon as $data) : ?>
				<li>
					<a class="uk-accordion-title" href="#"><?php echo $data['faq_consultation']; ?></a>
					<div class="uk-article-content uk-accordion-content link-primary">
						<p style="font-size:small"><?php echo $data['faq_respon']; ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<div class="uk-section uk-section-large uk-section-default">
	<div class="uk-container uk-container-small">
		<h2 class="uk-h1 uk-text-center">Tidak menemukan jawaban?</h2>
		<p class="uk-text-center uk-text-lead">Kami siap menjawab semua pertanyaan/konsultasi anda terkait masalah hukum. Beri tahu kami apa yang bisa kami bantu.</p>
		<div class="uk-margin-medium-top uk-text-center" data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
			<a class="uk-button uk-button-large uk-button-primary" href="<?= base_url('Consultation_form'); ?>">Tanya Kami</a>
		</div>
	</div>
</div>

<div>
	<div class="uk-position-fixed uk-widget-contact uk-position-bottom-right">
		<div class="uk-margin-medium-top uk-float-right">
			<a href="#" class="uk-icon-button uk-box-shadow-medium" data-uk-icon="icon: question; ratio: 1.4" data-uk-toggle="target: #toggle-widget; animation: uk-animation-fade;"></a>
		</div>
	</div>
	<div class="uk-position-fixed uk-widget-contact uk-position-bottom-right">
		<div id="toggle-widget" hidden>
			<div class="uk-card uk-card-small uk-card-default uk-box-shadow-large uk-overflow-hidden">
				<div class="uk-card-header">
					<h5 class="">Masukkan pertanyaan anda.
						<a href="#" data-uk-icon="icon: close; ratio: 1.2" data-uk-toggle="target: #toggle-widget"></a>
					</h5>
				</div>
				<div class="uk-card-body">
					<form class="uk-form-stacked" method="POST" action="<?= base_url('Consultation_form/add_consultation'); ?>">
						<div>
							<label class="uk-form-label uk-text-xsmall" for="name">Nama Lengkap</label>
							<div class="uk-form-controls">
								<input id="name" class="uk-input uk-form-small" name="add_user_full_name" type="text" autocomplete="off" required="">
							</div>
						</div>
						<div class="uk-margin-small">
							<label class="uk-form-label uk-text-xsmall" for="_replyto">Nomor WA</label>
							<div class="uk-form-controls">
								<input id="_replyto" class="form-control uk-input uk-form-small" name="add_phone_number" type="text" autocomplete="off" value="+62" onkeypress="return hanyaAngka(event)" required="">
							</div>
						</div>
						<div class="uk-margin-small">
							<label class="uk-form-label uk-text-xsmall" for="_replyto">Email</label>
							<div class="uk-form-controls">
								<input id="_replyto" class="form-control uk-input uk-form-small" name="add_user_mail" type="email" autocomplete="off" required="">
							</div>
						</div>
						<div class="uk-margin-small">
							<label class="uk-form-label uk-text-xsmall" for="message">Masalah</label>
							<div class="uk-form-controls">
								<textarea id="message" class=" form-control uk-textarea uk-form-small" name="add_consultation_text" rows="3" minlength="10" autocomplete="off" required=""></textarea>
							</div>
						</div>
						<div class="uk-margin-small">
							<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key'); ?>"></div>
						</div>
						<div class="uk-text-center">
							<input class="uk-button uk-button-primary uk-button-small" type="submit" value="Send Message">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>