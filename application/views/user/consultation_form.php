<div class="uk-section uk-section-large uk-section-default">
	<div class="uk-container">
		<div class="uk-grid-large" data-uk-grid>
			<div class="uk-width-1-3@m">
				<h2>Hubungi Kami</h2>
				<p>Alamat:
					Jl. Trans Sulawesi, Pondang, Amurang Tim., Kabupaten Minahasa Selatan, Sulawesi Utara</p>
				<p>
					Telepon: (0430) 22989
				</p>
				<p>
					5am - 9pm PST Weekdays<br>
					6am - 6pm PST Saturdays<br>
					6am – 9pm PST Sundays<br>
					Closed – December 25th
				</p>
			</div>
			<div class="uk-width-expand@m">
				<article class="uk-article">
					<div class="uk-article-content">
						<h2>Masukkan Konsultasi Anda</h2>
						<?php echo $this->session->flashdata('message'); ?>
						<form class="uk-form-stacked" method="POST" action="<?= base_url('Consultation_form/add_consultation'); ?>">
							<div class="uk-margin-bottom">
								<label class="uk-form-label" for="name">Nama Lengkap</label>
								<div class="uk-form-controls">
									<input class="form-control uk-input uk-form-large" placeholder="Masukkan nama lengkap" name="add_user_full_name" type="text" required="">
								</div>
							</div>
							<div class="uk-margin-bottom">
								<label class="uk-form-label" for="_subject">Nomor Wa</label>
								<div class="uk-form-controls">
									<input id="_subject" class="form-control uk-input uk-form-large" type="text" autocomplete="off" name="add_phone_number" onkeypress="return hanyaAngka(event)" required>
								</div>
							</div>
							<div class="uk-margin-bottom">
								<label class="uk-form-label" for="_subject">Email</label>
								<div class="uk-form-controls">
									<input id="_subject" class="form-control uk-input uk-form-large" type="email" autocomplete="off" name="add_user_mail" placeholder="Email" required>
								</div>
							</div>
							<div class="uk-margin-bottom">
								<label class="uk-form-label" for="message">Masalah</label>
								<div class="uk-form-controls">
									<textarea id="message" class="uk-textarea uk-form-large" name="add_consultation_text" placeholder="Masukkan maksimal 10 karakter" rows="5" minlength="10" required=""></textarea>
								</div>
							</div>
							<div class="uk-margin-bottom">
								<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key'); ?>"></div>
							</div>
							<div>
								<input class="uk-button uk-button-primary uk-button-large" type="submit" value="Kirim">
							</div>
						</form>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>