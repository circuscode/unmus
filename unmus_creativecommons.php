<?php 
		
/* 
Creative Commons 
*/		
		
function creative_commons() {
	
	global $post;
	
	if (get_post_meta( $post->ID, 'licence_type', true)) { 
			
			/* License Scope */	
			/* This code is not used currently */

			$licence_type=get_post_meta($post->ID, 'licence_type', true);
			$licence_include=get_post_meta($post->ID, 'licence_include', true);
			$licence_exclude=get_post_meta($post->ID, 'licence_exclude', true);
			$licence_version=get_post_meta( $post->ID, 'licence_version', true);
			
			// text
			// foto
			// sketchnote
			// zeichnung
			// typo
			// schaubild
			// tweet
			// youtube
			
			$licence_include_text=false;
			$licence_include_photo=false;
			$licence_include_sketchnote=false;
			$licence_include_drawing=false;
			$licence_include_typo=false;
			$licence_include_figure=false;
			$licence_include_tweet=false;
			$licence_include_youtube=false;
	
			if (strpos($licence_include, 'text') !== false) { $licence_include_text=true; }; 
			if (strpos($licence_include, 'foto') !== false) { $licence_include_photo=true; }; 
			if (strpos($licence_include, 'sketchnote') !== false) { $licence_include_sketchnote=true; };
			if (strpos($licence_include, 'zeichnung') !== false) { $licence_include_drawing=true; };
			if (strpos($licence_include, 'typo') !== false) { $licence_include_typo=true; };
			if (strpos($licence_include, 'schaubild') !== false) { $licence_include_figure=true; };
			if (strpos($licence_include, 'tweet') !== false) { $licence_include_tweet=true; };
			if (strpos($licence_include, 'youtube') !== false) { $licence_include_youtube=true; };

			/* License Out of Scope */	
			/* This code is used */	

			$licence_excludes=0;
			$licence_excludes_decounter=$licence_excludes;
			
			// screenshot
			// youtube
			// foto
			// tweet
			// symbol
			// music
			// logo
			
			$licence_exclude_screenshot=false;
			$licence_exclude_youtube=false;
			$licence_exclude_photo=false;
			$licence_exclude_tweet=false;
			$licence_exclude_symbol=false;
			$licence_exclude_music=false;
			$licence_exclude_logo=false;
			
			if (strpos($licence_exclude, 'screenshot') !== false) 
			{ $licence_exclude_screenshot=true; $licence_excludes=$licence_excludes+1; };
			if (strpos($licence_exclude, 'youtube') !== false) 
			{ $licence_exclude_youtube=true; $licence_excludes=$licence_excludes+1; };
			if (strpos($licence_exclude, 'foto') !== false) 
			{ $licence_exclude_photo=true; $licence_excludes=$licence_excludes+1; };
			if (strpos($licence_exclude, 'tweet') !== false) 
			{ $licence_exclude_tweet=true; $licence_excludes=$licence_excludes+1; };
			if (strpos($licence_exclude, 'symbol') !== false) 
			{ $licence_exclude_symbol=true; $licence_excludes=$licence_excludes+1; };
			if (strpos($licence_exclude, 'music') !== false) 
			{ $licence_exclude_music=true; $licence_excludes=$licence_excludes+1; };
			if (strpos($licence_exclude, 'logo') !== false) 
			{ $licence_exclude_logo=true; $licence_excludes=$licence_excludes+1; };
			
			$licence_excludes_decounter=$licence_excludes;
			
			/* License Output */	
			/* CC-BY is supported only */

			$cc_post_type=get_post_type( get_the_ID() );
			$blog_dir=get_site_url();
		
			$upload_dir = wp_upload_dir(); 
 			$ccimagepath=$upload_dir['baseurl']; 
 			$ccimagepath=$ccimagepath.'/cc-by.png';
		
			echo '<span class="license-definition">';

			if ( $cc_post_type != 'pinseldisko') {
					
					// Small Logo

					echo '<a class="license-link" rel="license" href="https://creativecommons.org/licenses/by/4.0/deed.de" target="_blank">';
					echo 'Creative Commons'; 
					echo '</a>';
			
					echo '<a class="license-image" rel="license" href="https://creativecommons.org/licenses/by/4.0/deed.de" target="_blank" >';
					echo '<img src="'.$ccimagepath.'" width="150" height="52" alt="Creative Commons"/>';
					echo '</a>';
			
					if ($licence_excludes > 0) {
					}

			} else {

					// Large Logo
			
					echo '<a href="https://creativecommons.org/licenses/by/4.0/deed.de" target="_blank">';
					echo '<img src="'.$blog_dir.'/wp-content/themes/aloha/creativecommons.png" width="500" height="119" alt="Creative Commons"/>';
					echo '</a>';
				
					if ($licence_excludes > 0) {
					
					echo '<a href="https://creativecommons.org/licenses/by/4.0/deed.de" target="_blank">CC-BY</a> - ';
					}
			}
			echo '</span>';
			
			/* License Output */

			echo '<span class="license-exclude">';
			if ($licence_excludes > 0) {
				if ($licence_exclude_photo===true) { 
					echo 'Fotos'; 
					$licence_excludes_decounter=$licence_excludes_decounter-1;
					if ($licence_excludes_decounter > 1) { 
						echo ', '; 
						} elseif ($licence_excludes_decounter == 1) { 
						echo ' und ';
					}
				}
				if ($licence_exclude_screenshot===true) { 
					echo 'Screenshots'; 
					$licence_excludes_decounter=$licence_excludes_decounter-1;
					if ($licence_excludes_decounter > 1) { echo ', '; 
					} elseif ($licence_excludes_decounter == 1) { 
					echo ' und ';
					}
				}
				if ($licence_exclude_youtube===true) { 
					echo 'YouTube'; 
					$licence_excludes_decounter=$licence_excludes_decounter-1;
					if ($licence_excludes_decounter > 1) { echo ', '; 
					} elseif ($licence_excludes_decounter == 1) { 
					echo ' und ';
					}
				}
				if ($licence_exclude_tweet===true) { 
					echo 'Tweets'; 
					$licence_excludes_decounter=$licence_excludes_decounter-1;
					if ($licence_excludes_decounter > 1) { echo ', '; 
					} elseif ($licence_excludes_decounter == 1) { 
					echo ' und ';
					}
				}
				if ($licence_exclude_symbol==true) { 
					echo 'Symbole'; 
					$licence_excludes_decounter=$licence_excludes_decounter-1;
					if ($licence_excludes_decounter > 1) { echo ', '; 
					} elseif ($licence_excludes_decounter == 1) { 
					echo ' und ';
					}
				}
				if ($licence_exclude_music==true) { 
					echo 'Musik'; 
					$licence_excludes_decounter=$licence_excludes_decounter-1;
					if ($licence_excludes_decounter > 1) { echo ', '; 
					} elseif ($licence_excludes_decounter == 1) { 
					echo ' und ';
					}
				}
				if ($licence_exclude_logo==true) { 
					echo 'Logos'; 
					$licence_excludes_decounter=$licence_excludes_decounter-1;
					if ($licence_excludes_decounter > 1) { echo ', '; 
					} elseif ($licence_excludes_decounter == 1) { 
					echo ' und ';
					}
				}
			echo ' ausgeschlossen.';
			}
			echo '</span>';

	} // if
	
} // function
		
?>