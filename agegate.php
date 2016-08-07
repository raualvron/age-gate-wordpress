<?php
/**
 * Plugin Name: Age Gate JS
 * Description: Confirming that the user attempting to access your website is of the age require. Compatible with cache plugins.
 * Author: Raul Alvarez
 */

if (!defined('WPINC')) {
	die();
}

/*
* add_option - A safe way of adding a named option/value pair to the options database table
* register_setting - Register a setting and its sanitization callback.
*
*/

function register_contact_form_settings() { 
	add_option('type_user', '');
	register_setting('default', 'type_user');

	add_option('minimum_age', '');
	register_setting('default', 'minimum_age');

	add_option('number_age', '');
	register_setting('default', 'number_age');

	add_option('cookie_time', '');
	register_setting('default', 'cookie_time');

	add_option('cookie_name', '');
	register_setting('default', 'cookie_name');

	add_option('cookie_domain', '');
	register_setting('default', 'cookie_domain');

	add_option('main_text', '');
	register_setting('default', 'main_text');

	add_option('disclamer', '');
	register_setting('default', 'disclamer');

	add_option('cookie_domain', '');
	register_setting('default', 'cookie_domain');

	add_option('type_input', '');
	register_setting('default', 'type_input');

	add_option('type_input', '');
	register_setting('default', 'type_input');

	add_option('image_logo', '');
	register_setting('default', 'image_logo');

	add_option('submit_text', '');
	register_setting('default', 'submit_text');

	add_option('group_country', '');
	register_setting('default', 'group_country');

	add_option('type_redirect', '');
	register_setting('default', 'type_redirect');

	add_option('validation', '');
	register_setting('default', 'validation');

}
add_action('admin_init', 'register_contact_form_settings');

/*
* add_options_page - Add sub menu page to the Settings menu.
* add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
*
*/

function build_menu() {
    add_options_page('Age Gate Settings', // Page Title
        'Age Gate JS', // Menu Title
        'manage_options', // Capability
        'manage_agegate_form', // Menu Slug
        'agegate_options_menu' // Callback
        );
}
add_action('admin_menu', 'build_menu');

function agegate_options_menu() {
	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permission to access this page.'));
	}
	?>

	<div class="wrap">
		<h2>Age Gate JS Settings</h2>
		<form method="post" action="options.php">
			<?php settings_fields('default'); ?>
			<hr/>
			<h2>1. Age gate Options</h2>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Require verification for:</th>
					<td>	
						<fieldset>
							<label>
								<input type="radio" name="type_user" value="visitants" <?php if(get_option('type_user') == "visitants" || empty(get_option('type_user'))) : echo "checked"; endif; ?>>Visitants only (no users)<br>
							</label>
							<br>
							<label>
								<input type="radio" name="type_user" value="all" <?php if(get_option('type_user') == "all") : echo "checked"; endif; ?>>All users and visitants
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Visitors must be:</th>
					<td>	

						<fieldset>
							<label>
								<?php if(get_option('number_age')) :  $number_age = get_option('number_age'); else: $number_age = 18; endif;?>
								<input type="radio" name="minimum_age" value="age" <?php if(get_option('minimum_age') == "age" || empty(get_option('minimum_age'))) : echo "checked"; endif; ?>> Minimum age: <input name="number_age" type="number" min="2" value="<?= $number_age ?>" style="width:70px">
							</label>
							<br>
							<label>
								<input type="radio" name="minimum_age" value="all" <?php if(get_option('minimum_age') == "all") : echo "checked"; endif; ?>>Use the minimum age per country. It shows a country dropdown too.
							</label>
							<br/>
							<textarea style="text-align:left" rows="10" cols="100" id="group_country" name="group_country">
<?php if(!empty(get_option('group_country'))) : echo get_option('group_country'); else: ?>
<?php 


/*
* 
* ALL COUNTRIES
*
*/

?>
<option value="" selected="selected">- Select Country -</option>
<option value="GB2">United Kingdom</option>
<option value="AF">Afghanistan</option>
<option value="AX">Aland Islands</option>
<option value="AL">Albania</option>
<option value="DZ">Algeria</option>
<option value="AS">American Samoa</option>
<option value="AD">Andorra</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AQ">Antarctica</option>
<option value="AG">Antigua and Barbuda</option>
<option value="AR">Argentina</option>
<option value="AM">Armenia</option>
<option value="AW">Aruba</option>
<option value="AU">Australia</option>
<option value="AT">Austria</option>
<option value="AZ">Azerbaijan</option>
<option value="BS">Bahamas</option>
<option value="BH">Bahrain</option>
<option value="BD">Bangladesh</option>
<option value="BB">Barbados</option>
<option value="BY">Belarus</option>
<option value="BE">Belgium</option>
<option value="BZ">Belize</option>
<option value="BJ">Benin</option>
<option value="BM">Bermuda</option>
<option value="BT">Bhutan</option></option>
<option value="BO">Bolivia</option>
<option value="BA">Bosnia and Herzegovina</option>
<option value="BW">Botswana</option>
<option value="BV">Bouvet Island</option>
<option value="BR">Brazil</option>
<option value="IO">British Indian Ocean Territory</option>
<option value="VG">British Virgin Islands</option>
<option value="BN">Brunei</option>
<option value="BG">Bulgaria</option>
<option value="BF">Burkina Faso</option>
<option value="BI">Burundi</option>
<option value="KH">Cambodia</option>
<option value="CM">Cameroon</option>
<option value="CA">Canada</option>
<option value="CV">Cape Verde</option>
<option value="BQ">Caribbean Netherlands</option>
<option value="KY">Cayman Islands</option>
<option value="CF">Central African Republic</option>
<option value="TD">Chad</option>
<option value="CL">Chile</option>
<option value="CN">China</option>
<option value="CX">Christmas Island</option>
<option value="CC">Cocos (Keeling) Islands</option>
<option value="CO">Colombia</option>
<option value="KM">Comoros</option>
<option value="CG">Congo (Brazzaville)</option>
<option value="CD">Congo (Kinshasa)</option>
<option value="CK">Cook Islands</option>
<option value="CR">Costa Rica</option>
<option value="HR">Croatia</option>
<option value="CU">Cuba</option>
<option value="CW">Curaçao</option>
<option value="CY">Cyprus</option>
<option value="CZ">Czech Republic</option>
<option value="DK">Denmark</option>
<option value="DJ">Djibouti</option>
<option value="DM">Dominica</option>
<option value="DO">Dominican Republic</option>
<option value="EC">Ecuador</option>
<option value="EG">Egypt</option>
<option value="SV">El Salvador</option>
<option value="GQ">Equatorial Guinea</option>
<option value="ER">Eritrea</option>
<option value="EE">Estonia</option>
<option value="ET">Ethiopia</option>
<option value="FK">Falkland Islands</option>
<option value="FO">Faroe Islands</option>
<option value="FJ">Fiji</option>
<option value="FI">Finland</option>
<option value="FR">France</option>
<option value="GF">French Guiana</option>
<option value="PF">French Polynesia</option>
<option value="TF">French Southern Territories</option>
<option value="GA">Gabon</option>
<option value="GM">Gambia</option>
<option value="GE">Georgia</option>
<option value="DE">Germany</option>
<option value="GH">Ghana</option>
<option value="GI">Gibraltar</option>
<option value="GR">Greece</option>
<option value="GL">Greenland</option>
<option value="GD">Grenada</option>
<option value="GP">Guadeloupe</option>
<option value="GU">Guam</option>
<option value="GT">Guatemala</option>
<option value="GG">Guernsey</option>
<option value="GN">Guinea</option>
<option value="GW">Guinea-Bissau</option>
<option value="GY">Guyana</option>
<option value="HT">Haiti</option>
<option value="HM">Heard Island and McDonald Islands</option>
<option value="HN">Honduras</option>
<option value="HK">Hong Kong S.A.R., China</option>
<option value="HU">Hungary</option>
<option value="IS">Iceland</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IR">Iran</option>
<option value="IQ">Iraq</option>
<option value="IE">Ireland</option>
<option value="IM">Isle of Man</option>
<option value="IL">Israel</option>
<option value="IT">Italy</option>
<option value="CI">Ivory Coast</option>
<option value="JM">Jamaica</option>
<option value="JP">Japan</option>
<option value="JE">Jersey</option>
<option value="JO">Jordan</option>
<option value="KZ">Kazakhstan</option>
<option value="KE">Kenya</option>
<option value="KI">Kiribati</option>
<option value="KW">Kuwait</option>
<option value="KG">Kyrgyzstan</option>
<option value="LA">Laos</option>
<option value="LV">Latvia</option>
<option value="LB">Lebanon</option>
<option value="LS">Lesotho</option>
<option value="LR">Liberia</option>
<option value="LY">Libya</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lithuania</option>
<option value="LU">Luxembourg</option>
<option value="MO">Macao S.A.R., China</option>
<option value="MK">Macedonia</option>
<option value="MG">Madagascar</option>
<option value="MW">Malawi</option>
<option value="MY">Malaysia</option>
<option value="MV">Maldives</option>
<option value="ML">Mali</option>
<option value="MT">Malta</option>
<option value="MH">Marshall Islands</option>
<option value="MQ">Martinique</option>
<option value="MR">Mauritania</option>
<option value="MU">Mauritius</option>
<option value="YT">Mayotte</option>
<option value="MX">Mexico</option>
<option value="FM">Micronesia</option>
<option value="MD">Moldova</option>
<option value="MC">Monaco</option>
<option value="MN">Mongolia</option>
<option value="ME">Montenegro</option>
<option value="MS">Montserrat</option>
<option value="MA">Morocco</option>
<option value="MZ">Mozambique</option>
<option value="MM">Myanmar</option>
<option value="NA">Namibia</option>
<option value="NR">Nauru</option>
<option value="NP">Nepal</option>
<option value="NL">Netherlands</option>
<option value="AN">Netherlands Antilles</option>
<option value="NC">New Caledonia</option>
<option value="NZ">New Zealand</option>
<option value="NI">Nicaragua</option>
<option value="NE">Niger</option>
<option value="NG">Nigeria</option>
<option value="NU">Niue</option>
<option value="NF">Norfolk Island</option>
<option value="MP">Northern Mariana Islands</option>
<option value="KP">North Korea</option>
<option value="NO">Norway</option>
<option value="OM">Oman</option>
<option value="PK">Pakistan</option>
<option value="PW">Palau</option>
<option value="PS">Palestinian Territory</option>
<option value="PA">Panama</option>
<option value="PG">Papua New Guinea</option>
<option value="PY">Paraguay</option>
<option value="PE">Peru</option>
<option value="PH">Philippines</option>
<option value="PN">Pitcairn</option>
<option value="PL">Poland</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="RE">Reunion</option>
<option value="RO">Romania</option>
<option value="RU">Russia</option>
<option value="RW">Rwanda</option>
<option value="BL">Saint Barthélemy</option>
<option value="SH">Saint Helena</option>
<option value="KN">Saint Kitts and Nevis</option>
<option value="LC">Saint Lucia</option>
<option value="MF">Saint Martin (French part)</option>
<option value="PM">Saint Pierre and Miquelon</option>
<option value="VC">Saint Vincent and the Grenadines</option>
<option value="WS">Samoa</option>
<option value="SM">San Marino</option>
<option value="ST">Sao Tome and Principe</option>
<option value="SA">Saudi Arabia</option>
<option value="SN">Senegal</option>
<option value="RS">Serbia</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leone</option>
<option value="SG">Singapore</option>
<option value="SX">Sint Maarten</option>
<option value="SK">Slovakia</option>
<option value="SI">Slovenia</option>
<option value="SB">Solomon Islands</option>
<option value="SO">Somalia</option>
<option value="ZA">South Africa</option>
<option value="GS">South Georgia and the South Sandwich Islands</option>
<option value="KR">South Korea</option>
<option value="SS">South Sudan</option>
<option value="ES">Spain</option>
<option value="LK">Sri Lanka</option>
<option value="SD">Sudan</option>
<option value="SR">Suriname</option>
<option value="SJ">Svalbard and Jan Mayen</option>
<option value="SZ">Swaziland</option>
<option value="SE">Sweden</option>
<option value="CH">Switzerland</option>
<option value="SY">Syria</option>
<option value="TW">Taiwan</option>
<option value="TJ">Tajikistan</option>
<option value="TZ">Tanzania</option>
<option value="TH">Thailand</option>
<option value="TL">Timor-Leste</option>
<option value="TG">Togo</option>
<option value="TK">Tokelau</option>
<option value="TO">Tonga</option>
<option value="TT">Trinidad and Tobago</option>
<option value="TN">Tunisia</option>
<option value="TR">Turkey</option>
<option value="TM">Turkmenistan</option>
<option value="TC">Turks and Caicos Islands</option>
<option value="TV">Tuvalu</option>
<option value="VI">U.S. Virgin Islands</option>
<option value="UG">Uganda</option>
<option value="UA">Ukraine</option>
<option value="AE">United Arab Emirates</option>
<option value="GB">United Kingdom</option>
<option value="US">United States</option>
<option value="UM">United States Minor Outlying Islands</option>
<option value="UY">Uruguay</option>
<option value="UZ">Uzbekistan</option>
<option value="VU">Vanuatu</option>
<option value="VA">Vatican</option>
<option value="VE">Venezuela</option>
<option value="VN">Vietnam</option>
<option value="WF">Wallis and Futuna</option>
<option value="EH">Western Sahara</option>
<option value="YE">Yemen</option>
<option value="ZM">Zambia</option>
<option value="ZW">Zimbabwe</option>
<?php endif; ?>
<?php 


/*
* 
* ALL COUNTRIES
*
*/

?>
</textarea>
<br/>
<small class="country-adv">Be careful. It is very sensitive. If you need get the default data, delete all and save again.</small>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Cookie time:</th>
					<td>	
						<fieldset>
							<label>
								<input type="input" name="cookie_time" type="number" value="<?php if(get_option('cookie_time')) : echo get_option('cookie_time'); else: echo "18"; endif; ?>"> hours
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Cookie name:</th>
					<td>	
						<fieldset>
							<label>
								<input type="input" name="cookie_name" type="text" value="<?php if(get_option('cookie_name')) : echo get_option('cookie_name'); else: echo "minimum_age"; endif; ?>">
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Set up the domain:</th>
					<td>	
						<fieldset>
							<label>
								<input type="radio" name="cookie_domain" value="domain" <?php if(get_option('cookie_domain') == "domain" || empty(get_option('cookie_domain'))) : echo "checked"; endif; ?>> For all the domain. E.g "*.age-gate.com"
							</label>
							<br>
							<label>
								<input type="radio" name="cookie_domain" value="subdomain" <?php if(get_option('cookie_domain') == "subdomain") : echo "checked"; endif; ?>> It just for the subdomain. E.g: "age-gate.com"
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Redirect:</th>
					<td>	
						<fieldset>
							<label>
								<input type="radio" name="type_redirect" value="domain" <?php if(get_option('type_redirect') == "domain" || empty(get_option('type_redirect'))) : echo "checked"; endif; ?>> Redirect to domain
							</label>
							<br>
							<label>
								<input type="radio" name="type_redirect" value="request" <?php if(get_option('type_redirect') == "request") : echo "checked"; endif; ?>> Redirect to the url request
							</label>
						</fieldset>
					</td>
				</tr>
			</table>
			<hr/>
			<table class="form-table">
				<h2>2. Template Options</h2>
				<tr valign="top">
					<th scope="row">Notice heading:</th>
					<td>
						<input name="main_text" type="text" value="<?php if(!empty(get_option('main_text'))) : echo get_option('main_text'); else: echo "Please enter your date of birth"; endif; ?>" style="width:600px">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Validation:</th>
					<td>
						<textarea name="validation" rows="4" cols="100"><?php if(!empty(get_option('validation'))) : echo get_option('validation'); else: echo "Sorry, you are not old enough to view this site."; endif; ?></textarea><br/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Disclaimer:</th>

					<td>
						<textarea name="disclamer" rows="4" cols="100"><?php if(!empty(get_option('disclamer'))) : echo get_option('disclamer'); else: echo "By entering our website you agree to our<br><a href='https://www.url.com/terms-conditions/' title='Terms and Conditions'>"; endif; ?></textarea><br/>
						<b>E.g:</b>
						<i>
							<?php echo htmlspecialchars('By entering our website you agree to our<br><a href="https://www.url.com/terms-conditions/" title="Terms and Conditions">'); ?><br/>
							<?php echo htmlspecialchars('Terms and Conditions</a> and <a href="https://www.url.com/privacy-cookie-policy/" title="Privacy and Cookie Policy">Privacy Policy</a>'); ?>
						</i>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Age input type:</th>
					<td>	
						<fieldset>
							<label>
								<input type="radio" name="type_input" value="domain" <?php if(get_option('type_input') == "domain" || empty(get_option('type_input'))) : echo "checked"; endif; ?>> Dropdowns
							</label>
							<br>
							<label>
								<input type="radio" name="type_input" value="subdomain" <?php if(get_option('type_input') == "subdomain") : echo "checked"; endif; ?>> Input
							</label>
						</fieldset>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Upload logo:</th>
					<td><label for="upload_image">
						<input id="image-url" type="text" name="image_logo" value=" <?php if(get_option('image_logo')) : echo get_option('image_logo'); endif; ?>"style="width:600px;"/>
						<input id="upload-button" type="button" class="button" value="Upload Image" />
						<br />Enter an URL or upload an image for the banner. E.g : 400x400
					</label>
				</td>
				<tr valign="top">
					<th scope="row">Text Input Submit:</th>
					<td>
						<input type="text" name="submit_text" value=" <?php if(get_option('submit_text')) : echo get_option('submit_text'); endif; ?>"style="width:600px;"/>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php } 



/*
* wp_enqueue_script - Registers the script if $src provided (does NOT overwrite), and enqueues it.
* 
*
*/
function my_media_lib_uploader_enqueue() {
	wp_enqueue_media();
	wp_register_script( 'age-gate-js', plugins_url( 'admin/assets/agegate.js' , __FILE__ ), array('jquery') );
	wp_enqueue_script( 'age-gate-js' );
}
add_action('admin_enqueue_scripts', 'my_media_lib_uploader_enqueue');


/*
* wp_enqueue_script - Registers the style if source provided (does NOT overwrite) and enqueues.
* 
*
*/
function plugin_css_style() {
	wp_enqueue_style( 'agegate', plugins_url('age-gate/admin/assets/agegate.css'));
	wp_enqueue_script( 'agegate' );
}
add_action( 'wp_enqueue_scripts', 'plugin_css_style' );


/*
* wp_enqueue_script - Registers the style if source provided (does NOT overwrite) and enqueues.
* 
*
*/
function form_validation() {
	wp_enqueue_media();
	wp_register_script( 'age-validation-js', "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js", array('jquery') );
	wp_enqueue_script( 'age-validation-js' );
}
add_action('wp_enqueue_scripts', 'form_validation');


function form_agegate() {

	/**
    * Detect plugin. For use on Front End only.
    */
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	$cookie_name = get_option('cookie_name');

	$age = get_option('number_age');
	$user = get_option('type_user');
	$logo = get_option('image_logo');
	$submit = get_option('submit_text');
	$time = get_option('cookie_time');
	$terms = get_option('disclamer');
	$main = get_option('main_text');
	$ifcountry = get_option('minimum_age');
	$validation = get_option('validation');


	if(!empty($cookie_name) && $user == "visitants" && !is_user_logged_in() || $user == "all") :

		$form_template .= '<style> body { overflow:hidden; } </style>';
		$form_template .= '<div class="age-gate" style="display: block;">';
		$form_template .= '<div class="age-gate-container">';
		if(isset($logo) && !empty($logo)) :
			$form_template .= '<img src="' . $logo . '" class="logo pull-left">';
		endif;
		$form_template .= '<div id="age-restricted" class="clearfix">';
		$form_template .= '<div id="age-gate" class="clearfix">';
		if(isset($main) && !empty($main)) :
			$form_template .= '<p class="dob">' . $main . '</p>';
		endif;
		$form_template .= '<form id="form-age" action="' . site_url( '/', 'http' ) . '" method="post">';
		$form_template .= '<br/>';
		$form_template .= 'Day:<select id="agegate-day" name="agegate-day"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><br>';
		$form_template .= 'Month:<select id="agegate-month" name="agegate-month"><option value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select><br>';
		$form_template .= 'Year:<select id="agegate-year" name="agegate-year"><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option></select><br>';
		if($ifcountry == "all") :
		$form_template .= 'Country:<select id="country" name="country" required>';
		 	foreach ( preg_split("/((\r?\n)|(\r\n?))/", get_option('group_country')) as $value ) :
		 		$form_template .= $value;
	    	endforeach;
		$form_template .= '</select>';
		$form_template .= '<br/>';
		$form_template .= '<br/>';
		endif;
		if(isset($validation) && !empty($validation)) :
			$form_template .= '<span class="validation">' . $validation . '</span>';
		endif;
		$form_template .= '<br/>';
		if(isset($terms) && !empty($terms)) :
			$form_template .= '' . preg_replace( "/\r|\n/", "", $terms). '';
		endif;
		$form_template .= '<br/>';
		$form_template .= '<input type="submit" id="verify" name="verify"' .((!empty($submit))?' value="' . $submit . '"': 'value="Verify"'). '" class="submit btn">';
		$form_template .= '<input type="hidden" name="validate" value="submitted" />';
		$form_template .= '<input type="hidden" name="request" value="' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . '" />';
		$form_template .= '</div>';
		$form_template .= '</form>';
		$form_template .= '</div></div></div>';

		$code_js_script  = 	"<script type='text/javascript'>jQuery().ready(function() {
		jQuery('#form-age').validate({
			 submitHandler: function(form) {

			 	var day = jQuery('#agegate-day').val();
			 	var month = jQuery('#agegate-month').val();
			 	var year = jQuery('#agegate-year').val();
			 	var country = jQuery('#country').val();
			 	var max_age;
			 	
			 	if(country) {

			 		switch (country) {

				      case 'MA' : //Morocco
				      case 'AZ' : //Azerbaijan
				      case 'TK' : //Tokelau
				      max_age = 16;
				      break;

				      case 'CY' : //Cyprus
				      case 'MT' : //Malta
				      max_age = 17;
				      break;

				      case 'KR' : //South Korea
				      max_age = 19;
				      break;

				      case 'PY' : //Paraguay
				      case 'JP' : //Japan
				      case 'FI' : //Finland
				      case 'IS' : //Iceland
				      case 'NO' : //Norway
				      case 'SE' : //Sweden
				      max_age = 20;
				      break;

				      case 'CM' : //Cameroon
				      case 'EG' : //Egypt
				      case 'LY' : //Libya
				      case 'SD' : //Sudan
				      case 'ID' : //Indonesia
				      case 'IR' : //Iran
				      case 'KZ' : //Kazakhstan
				      case 'OM' : //Oman
				      case 'PK' : //Pakistan
				      case 'QA' : //Qatar
				      case 'LK' : //Sri Lanka
				      case 'TJ' : //Tajikistan
				      case 'AE' : //United Arab Emirates
				      case 'YE' : //Yemen
				      case 'AS' : //American Samoa
				      case 'FJ' : //Fiji
				      case 'GU' : //Guam
				      case 'FM' : //Micronesia, Federated States of
				      case 'MP' : //Northern Mariana Islands
				      case 'PW' : //Palau
				      case 'SB' : //Solomon Islands
				      case 'US' : //United States
				      max_age = 21;
				      break;

				      case 'IN' : //India
				      max_age = 16;
				      break;

				      default : 

				      max_age = 18;

    				}

			 	} else {

			 		max_age = " . $age .";

			 	}

				var dateString = year + '/'  +  month + '/' + day;

			 	var today = new Date();
    			var birthDate = new Date(dateString);

    			var age = today.getFullYear() - birthDate.getFullYear();

    			var m = today.getMonth() - birthDate.getMonth();
    			
    			if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        			age--;
    			}

    			//console.log('Mi ' + age + ' Max' + max_age);
    			if(age < max_age) {

    				 jQuery('#agegate-day').addClass('error');
    				 jQuery('#agegate-month').addClass('error');
    				 jQuery('#agegate-year').addClass('error');
    				 jQuery('.validation').slideDown(function(){
    				 	setTimeout(function(){
            				jQuery('.validation').slideUp();
            				jQuery('#agegate-day').removeClass('error');
    				 		jQuery('#agegate-month').removeClass('error');
    				 		jQuery('#agegate-year').removeClass('error');
            			}, 2000);
            		 });
    				 return false;
    			}

    			return true;
			 }
		});
	});</script>";
		$code_js_script .=  "<script type='text/javascript'>if(document.cookie.indexOf('$cookie_name') < 0 ) { document.body.innerHTML += '$form_template'; }</script>";
		echo $code_js_script;

	endif;
}

add_action('wp_footer', 'form_agegate');


function cookie_function() {

	$action = $_POST['validate'];
	$request = $_POST['request'];

	$age = get_option('number_age');
	$cookie_name = get_option('cookie_name');
	$type_min = get_option('minimum_age');
	$countries = get_option('group_country');
	$domain = get_option('cookie_domain');
	$redirect = get_option('type_redirect');
	$time = get_option('cookie_time');

	if ( !empty($action) && !is_admin() ) :

		if ( $domain == 'domain' ) :
				
			@setcookie($cookie_name, $age, $time, "/", $_SERVER['SERVER_NAME']);

		else :

			@setcookie($cookie_name, $age, $time);

		endif;

		if ($redirect == "domain"):

			wp_redirect( site_url() );
		
		else:

			wp_redirect("//". $request);

		endif;

		exit;

	endif;

}

add_action('init', 'cookie_function');
?>