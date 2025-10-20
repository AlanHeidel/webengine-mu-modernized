<?php

try {
	
	if(!mconfig('active')) throw new Exception(lang('error_47',true));
	
	echo '<div class="page-title"><span>'.lang('module_titles_txt_11',true).'</span></div>';

	echo '<div class="warning-donation">
			<i class="fa-solid fa-triangle-exclamation"></i>
			<h4>ADVERTENCIA: Si el pago es realizado a través de transferencia, puede tomar hasta 24 hs. en acreditarse los COINS</h4>
		</div>';
	echo '<div class="donations-container">';
		echo '<div class="donation">';
			echo '<div class="donation-title">
					<i class="fa-solid fa-coins"></i>
					<h2>1.000 COINS</h2>
				</div>';
			echo '<div class="donation-1-image">
					<img style="width:180px; height:180px;" src="'.__PATH_TEMPLATE_IMG__.'donation/donation-1.webp">
				</div>';
			echo '<div class="price-and-button">
			<div class="donation-price">
					<h2>$5.000 ARS</h2>
				</div>	
			<a href="https://donacionesfront.ogdev.com.ar/?subdomain=muliberty" target="_blank">
			<button class="wooden-cart-button">
				  <svg viewBox="0 0 24 24">
					<path
						  d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 21.42 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"
					></path>
				  </svg>
				  <span class="button-text">Donar</span>
			</button>
			</a>
			</div>
		</div>';

		echo '<div class="donation">';
			echo '<div class="donation-title">
					<i class="fa-solid fa-coins"></i>
					<h2>2.000 COINS</h2>
				</div>';
			echo '<div class="donation-2-image">
					<img style="width:180px; height:180px;" src="'.__PATH_TEMPLATE_IMG__.'donation/donation-2.webp">
				</div>';
				echo '<div class="price-and-button">
				<div class="donation-price">
						<h2>$9.000 ARS</h2>
					</div>
				<a href="https://donacionesfront.ogdev.com.ar/?subdomain=muliberty" target="_blank">
				<button class="wooden-cart-button">
						  <svg viewBox="0 0 24 24">
							<path
								  d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 21.42 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"
							></path>
						  </svg>
						  <span class="button-text">Donar</span>
					</button>
					</a>
			</div>
			</div>';

		echo '<div class="donation">';
			echo '<div class="donation-title">
					<i class="fa-solid fa-coins"></i>
					<h2>5.000 COINS</h2>
				</div>';
			echo '<div class="donation-3-image">
					<img style="width:180px; height:180px;" src="'.__PATH_TEMPLATE_IMG__.'donation/donation-3.webp">
				</div>';
				echo '<div class="price-and-button">
				<div class="donation-price">
						<h2>$18.000 ARS</h2>
					</div>
				<a href="https://donacionesfront.ogdev.com.ar/?subdomain=muliberty" target="_blank">
				<button class="wooden-cart-button">
						  <svg viewBox="0 0 24 24">
							<path
								  d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 21.42 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"
							></path>
						  </svg>
						  <span class="button-text">Donar</span>
					</button>
					</a>
			</div>
			</div>';

		echo '<div class="donation">';
			echo '<div class="donation-title">
					<i class="fa-solid fa-coins"></i>
					<h2>10.000 COINS</h2>
				</div>';
			echo '<div class="donation-4-image">
					<img style="width:180px; height:180px;" src="'.__PATH_TEMPLATE_IMG__.'donation/donation-4.webp">
				</div>';
				echo '<div class="price-and-button">
				<div class="donation-price">
						<h2>$32.000 ARS</h2>
					</div>
				<a href="https://donacionesfront.ogdev.com.ar/?subdomain=muliberty" target="_blank">
				<button class="wooden-cart-button">
						  <svg viewBox="0 0 24 24">
							<path
								  d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 21.42 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"
							></path>
						  </svg>
						  <span class="button-text">Donar</span>
					</button>
					</a>
			</div>
			</div>';

		echo '<div class="donation">';
			echo '<div class="donation-title">
					<i class="fa-solid fa-coins"></i>
					<h2>25.000 COINS</h2>
				</div>';
			echo '<div class="donation-5-image">
					<img style="width:180px; height:180px;" src="'.__PATH_TEMPLATE_IMG__.'donation/donation-5.webp">
				</div>';
				echo '<div class="price-and-button">
				<div class="donation-price">
						<h2>$67.000 ARS</h2>
					</div>
				<a href="https://donacionesfront.ogdev.com.ar/?subdomain=muliberty" target="_blank">
				<button class="wooden-cart-button">
						  <svg viewBox="0 0 24 24">
							<path
								  d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 21.42 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"
							></path>
						  </svg>
						  <span class="button-text">Donar</span>
					</button>
					</a>
			</div>
			</div>';

		echo '<div class="donation">';
			echo '<div class="donation-title">
					<i class="fa-solid fa-coins"></i>
					<h2>30.000 COINS</h2>
				</div>';
			echo '<div class="donation-6-image">
					<img style="width:180px; height:180px;" src="'.__PATH_TEMPLATE_IMG__.'donation/donation-6.webp">
				</div>';
				echo '<div class="price-and-button">
				<div class="donation-price">
						<h2>$75.000 ARS</h2>
					</div>
				<a href="https://donacionesfront.ogdev.com.ar/?subdomain=muliberty" target="_blank">
				<button class="wooden-cart-button">
						  <svg viewBox="0 0 24 24">
							<path
								  d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 21.42 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"
							></path>
						  </svg>
						  <span class="button-text">Donar</span>
					</button>
					</a>
			</div>
		</div>
			</div>';
	
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}



