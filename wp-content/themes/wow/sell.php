<?php
/*
 Template Name:Sell
*/
get_header();
?>
<?php
global $post;
		$slug = get_post( $post )->post_name;
		$game	=	'';
 
		switch($slug){
			case 'diablo3':
				$game	='DIABLO3 US';
				break;
			case 'guildwars2':
				$game	='Guild Wars 2 US';
				break;
			case 'lol':
				$game	='League of Legends';
				break;
			case 'runescape':
				$game	='Runescape';
			break;
			case 'wow':
			default:
				$slug	='wow';
				$game	='World Of Warcraft US';
		}
?>
<div id="info-bar" style="padding-top: 102px; visibility: visible;">
	<div id="search">
		<div class="pp_search_container" id="pp_search_container_7560" style="  ">
			<div style="display:none" class="chrome_xp"></div>
			<form autocomplete="off" action="" method="get" class="fr_search_widget" id="fr_pp_search_widget_7560">
				<div class="ctr_search">
					<input type="text" id="pp_course_7560" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if (this.value == 'Search') {this.value = '';}" value="Search" name="rs" class="txt_livesearch">
					<span class="bt_search" id="bt_pp_search_7560">
					  <i class="icon-search"></i>
					</span>
				</div>
				
				<input type="hidden" name="search_in" value="product">
				<input type="hidden" name="search_other" value="product">
			</form>
		</div>
		<div style="clear:both;"></div>
	</div>	
</div>

<div id="content-wrapper" style="visibility: visible;">
	<div id="container">
	<div class="box_line both clr"></div>
	<style type="text/CSS">
	
		
	</style>
	<div id="buy_detailed" class="" >
		<div class="groupsHeader" id="bidHeader">
			<div id="copy">
				<h1 class="art_heading">Sell your Accounts to VBarrack™</h1>
				<p class="art_heading">
					To sell an account to us, make sure you have the secret question answer, the email access of your <?php echo $game;?> email account and you must be the original owner of this account </p>
				<p class="art_heading">Please logon to our livechat after submitting the form, our customer support team will give you an instant quote</p>
			</div>
		</div>
		<div  id="enquiryForm" class="grp widthfull">
			<form action="" class="new_bid" id="new_bid" method="post">

				<div id="title">
				   <h2>Character Information here:</h2>
				   <p class="bottom"><strong>Simply fill in the below enquiry form, and goes into livechat for the remaining process</strong></p>
				</div>

				<div class="section">
				   <h3><span class="small quiet" id="legend"><sub class="asterisk">*</sub> denotes required field</span> 1. Account Basics</h3>
				</div>

				<p class="nofull">Is this account currently active? <sub class="asterisk">*</sub>
				   <input checked="checked" id="bid_account_active_1" name="bid[account_active]" type="radio" value="1">Yes <input id="bid_account_active_0" name="bid[account_active]" type="radio" value="0"> No</p> 

					   <div class="formField">
						   <label for="bidder_email" class="desc">Your Email <sub class="asterisk">*</sub></label> 
						   <input id="bid_bidder_email" name="bid[bidder_email]" size="30" type="text" value=""><br>
						   <label class="small" for="country">Please fill in your contact email</label>
					   </div>
					   <div class="clear"></div>

					   <div class="formField">
						   <label for="bidder_fullname" class="desc">Full Name  </label> 
						   <input id="bid_bidder_fullname" name="bid[bidder_fullname]" size="30" type="text" value=""><br>
						   <label class="small" for="country">Please fill in your full name</label>
					   </div>
					   <div class="clear"></div>

					   <div class="formField last">
						   <label for="game_type" class="desc">Game  </label> 
						   
						   <select id="bid_game_type" name="bid[game_type]">
								<?php if($slug=='runescape'){?>
									<option value="RunescapeCharacter">Runescape</option>
								<?php }elseif($slug=='diablo3'){?>
									<option value="Diablo3UsCharacter">DIABLO3 US</option>
									<option value="Diablo3EuCharacter">DIABLO3 EU</option>
									<option value="Diablo3AsiaCharacter">DIABLO3 Asia</option>
								<?php }elseif($slug=='guildwars2'){?>
									<option value="Guildwars2UsCharacter">Guild Wars 2 US</option>
									<option value="Guildwars2EuCharacter">Guild Wars 2 EU</option>
								<?php }elseif($slug=='lol'){?>
									<option value="LolCharacter">League of Legends</option>
								<?php }else{?>
									<option value="WowUsCharacter" >World Of Warcraft US</option>
									<option value="WowEuCharacter">World Of Warcraft EU</option>
								<?php }?>
						   </select>
					   
					   </div>
					   <div class="clear"></div>

					   <div class="section">
						   <h3>2. Main Character Information</h3>
					   </div>

					   <?php if($slug=='wow'){?>
					   <div class="formField">
						   <label for="bidder_email" class="desc">Primary Armory Link</label> 
						   <input id="bid_armory_link" name="bid[armory_link]" size="60" type="text" value=""><br>
						   <label class="small" for="armory_link">Please Fill in the armory link of the character above or character detail below</label>
					   </div>
					   <div class="clear"></div>
					   <?php }?>
					   
					   <div class="formField">
						   <label for="customer_quote" class="desc">Your Price</label> 
						   USD$ <input id="bid_customer_quote" name="bid[customer_quote]" size="10" type="text" value="0.0">
					   </div>
					   <div class="clear"></div>

						<?php if($slug=='wow'){?>
						<div class="formField">
						<label for="server" class="desc">Server</label> 
							<select id="bid_server" name="bid[server]">
								<option value="">Server:</option>
								<?php include('wow_server.inc.php');?>
							</select>
						</div>
						<div class="clear"></div>
					   <?php }?>
					   
					   <?php if($slug=='diablo3' || $slug=='guildwars2' || $slug=='wow'){?>
					   <div class="formField">
						   <label for="character_class" class="desc">Class</label> 
							<select id="bid_character_class" name="bid[character_class]">
								<option value=""> Class:</option>
								<?php if($slug=='diablo3'){ ?>
								<option value="Barbarian">Barbarian</option>
								<option value="Demon Hunter">Demon Hunter</option>
								<option value="Monk">Monk</option>
								<option value="Witch Doctor">Witch Doctor</option>
								<option value="Wizard">Wizard</option>
								<?php }elseif($slug=='guildwars2'){?>
								<option value="Engineer">Engineer</option>
								<option value="Necromancer">Necromancer</option>
								<option value="Thief">Thief</option>
								<option value="Elementalist">Elementalist</option>
								<option value="Warrior">Warrior</option>
								<option value="Mesmer">Mesmer</option>
								<option value="Guardian">Guardian</option>
								<option value="Ranger">Ranger</option>
								<?php }else{?>
								<option value="1">Shaman</option>
								<option value="2">Hunter</option>
								<option value="3">Warlock</option>
								<option value="4">Druid</option>
								<option value="5">Mage</option>
								<option value="6">Paladin</option>
								<option value="7">Priest</option>
								<option value="8">Rogue</option>
								<option value="9">Warrior</option>
								<option value="10">Death Knight</option>
								<option value="11">Monk</option>
								<?php }?>
							</select>
						</div>
						<div class="clear"></div>
						<?php }?>
						
						<?php if($slug=='wow'){?>
						<div class="formField">
							<label for="character_race" class="desc">Race</label> 
							<select id="bid_character_race" name="bid[character_race]"><option value="">Race:</option>
								<option value="1">Draenei</option>
								<option value="2">NightElf</option>
								<option value="3">BloodElf</option>
								<option value="4">Gnome</option>
								<option value="5">Human</option>
								<option value="6">Undead</option>
								<option value="7">Dwarf</option>
								<option value="8">Orc</option>
								<option value="9">Tauren</option>
								<option value="10">Troll</option>
								<option value="11">Worgen</option>
								<option value="12">Goblin</option>
								<option value="13">Pandaren</option>
							</select>
						</div>
						<div class="clear"></div>
						<?php }?>
						
						<?php if($slug=='guildwars2'){?>
						<div class="formField">
							<label for="character_race" class="desc">profession</label> 
							<select id="bid_character_race" name="bid[character_race]"><option value=""> Profession:</option>
								<option value="Asura">Asura</option>
								<option value="Sylvari">Sylvari</option>
								<option value="Human">Human</option>
								<option value="Norn">Norn</option>
								<option value="Charr">Charr</option>
							</select>
						</div>
						<div class="clear"></div>
						<?php }?>
						
						
					   <div class="formField">
						   <label for="character_level" class="desc">Level</label> 
							<select id="bid_character_level" name="bid[character_level]">
								<?php if($slug=='runescape'){?>
									<option value=""> Level:</option>
									<option value="100-120">Lv100 - Lv120</option>
									<option value="120-140">Lv120 - Lv140</option>
									<option value="140-160">Lv140 - Lv160</option>
									<option value="160-180">Lv160 - Lv180</option>
									<option value="180-200">Lv180 - Lv200</option>
								<?php }elseif($slug=='diablo3'){?>
									<option value="">Level:</option>
									<option value="1-10">Lv1 - Lv10</option>
									<option value="11-20">Lv11 - Lv20</option>
									<option value="21-30">Lv21 - Lv30</option>
									<option value="31-40">Lv31 - Lv40</option>
									<option value="41-49">Lv41 - Lv49</option>
									<option value="50-60">Lv50 - Lv60+</option>
								<?php }elseif($slug=='guildwars2'){?>
									<option value=""> Level:</option>
									<option value="1-10">Lv1 - Lv20</option>
									<option value="11-20">Lv11 - Lv20</option>
									<option value="21-30">Lv21 - Lv30</option>
									<option value="31-40">Lv31 - Lv40</option>
									<option value="41-50">Lv41 - Lv50</option>
									<option value="51-60">Lv51 - Lv60</option>
									<option value="61-70">Lv61 - Lv70</option>
									<option value="71-79">Lv71 - Lv79</option>
									<option value="80-80">Lv80</option>								
								<?php }elseif($slug=='lol'){?>
									<option value=""> Level:</option>
									<option value="1-10">Lv1 - Lv20</option>
									<option value="11-20">Lv11 - Lv20</option>
									<option value="21-29">Lv21 - Lv29</option>
									<option value="30-30">Lv30</option>
								<?php }else{?>
									<option value="">Level:</option>
								   <option value="80">80</option>
								   <option value="81">81</option>
								   <option value="82">82</option>
								   <option value="83">83</option>
								   <option value="84">84</option>
								   <option value="85">85</option>
								   <option value="86">86</option>
								   <option value="87">87</option>
								   <option value="88">88</option>
								   <option value="89">89</option>
								   <option value="90">90</option>
								<?php }?>
							</select>
					   </div>
					   <div class="clear"></div>

					   <?php if($slug=='diablo3' || $slug=='guildwars2' || $slug=='wow'){?>
						<div class="formField">
							<label for="character_gender" class="desc">Gender</label> 
							<select id="bid[character_gender]" name="bid[character_gender]">
								<option value="">Gender:</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					   <?php }?>
					   <div class="clear"></div>
					   
					   <?php if($slug=='diablo3' || $slug=='guildwars2' || $slug=='wow'){?>
					   <div class="section">
						   <h3>3. Alternative Characters</h3>
					   </div>
					   
							<?php if($slug=='diablo3'){?>
							<div class="formField">
								<div class="formField">
									<label for="character_class" class="desc">Class</label> 
									<select id="bid_character_class" name="bid[character_class]"><option value=""> Class:</option>
										<option value="Barbarian">Barbarian</option>
										<option value="Demon Hunter">Demon Hunter</option>
										<option value="Monk">Monk</option>
										<option value="Witch Doctor">Witch Doctor</option>
										<option value="Wizard">Wizard</option>
									</select>
								</div>
								<div class="clear"></div>

								<div class="formField">
									<label for="level" class="desc">Level</label> 
									<select id="bid_character_level" name="bid[character_level]">
										<option value="">Level:</option>
										<option value="1-10">Lv1 - Lv10</option>
										<option value="11-20">Lv11 - Lv20</option>
										<option value="21-30">Lv21 - Lv30</option>
										<option value="31-40">Lv31 - Lv40</option>
										<option value="41-49">Lv41 - Lv49</option>
										<option value="50-60">Lv50 - Lv60+</option>
									</select>
								</div>
								<div class="clear"></div>
							</div>
							<p id="bid_add_button"><a href="#" onclick="Element.insert(&quot;alternatives&quot;, { bottom: &quot;\n\n\n    \n&lt;div class=\&quot;formField\&quot;&gt;\n\n&lt;div class=\&quot;formField\&quot;&gt;\n&lt;label for=\&quot;character_class\&quot; class=\&quot;desc\&quot;&gt;Class&lt;/label&gt; \n&lt;select id=\&quot;bid_character_class\&quot; name=\&quot;bid[character_class]\&quot;&gt;&lt;option value=\&quot;\&quot;&gt; Class:&lt;/option&gt;\n&lt;option value=\&quot;Barbarian\&quot;&gt;Barbarian&lt;/option&gt;\n&lt;option value=\&quot;Demon Hunter\&quot;&gt;Demon Hunter&lt;/option&gt;\n&lt;option value=\&quot;Monk\&quot;&gt;Monk&lt;/option&gt;\n&lt;option value=\&quot;Witch Doctor\&quot;&gt;Witch Doctor&lt;/option&gt;\n&lt;option value=\&quot;Wizard\&quot;&gt;Wizard&lt;/option&gt;&lt;/select&gt;\n&lt;/div&gt;\n&lt;div class=\&quot;clear\&quot;&gt;&lt;/div&gt;\n\n&lt;div class=\&quot;formField\&quot;&gt;\n&lt;label for=\&quot;level\&quot; class=\&quot;desc\&quot;&gt;Level&lt;/label&gt; \n&lt;select id=\&quot;bid_character_level\&quot; name=\&quot;bid[character_level]\&quot;&gt;&lt;option value=\&quot;\&quot;&gt;Level:&lt;/option&gt;\n&lt;option value=\&quot;1-10\&quot;&gt;Lv1 - Lv10&lt;/option&gt;\n&lt;option value=\&quot;11-20\&quot;&gt;Lv11 - Lv20&lt;/option&gt;\n&lt;option value=\&quot;21-30\&quot;&gt;Lv21 - Lv30&lt;/option&gt;\n&lt;option value=\&quot;31-40\&quot;&gt;Lv31 - Lv40&lt;/option&gt;\n&lt;option value=\&quot;41-49\&quot;&gt;Lv41 - Lv49&lt;/option&gt;\n&lt;option value=\&quot;50-60\&quot;&gt;Lv50 - Lv60+&lt;/option&gt;&lt;/select&gt;\n&lt;/div&gt;\n&lt;div class=\&quot;clear\&quot;&gt;&lt;/div&gt;\n\n\n\n\t\t\n\n\n\n&quot; });; return false;"><img alt="Add Alternative Account" src="/images/paul/pixel.gif?1378896111"></a></p>
							<?php }elseif($slug=='guildwars2'){ ?>
							<div class="formField">
								<div class="formField">
									<label for="character_class" class="desc">Class</label> 
									<select id="bid_character_class" name="bid[character_class]"><option value=""> Class:</option>
										<option value="Engineer">Engineer</option>
										<option value="Necromancer">Necromancer</option>
										<option value="Thief">Thief</option>
										<option value="Elementalist">Elementalist</option>
										<option value="Warrior">Warrior</option>
										<option value="Mesmer">Mesmer</option>
										<option value="Guardian">Guardian</option>
										<option value="Ranger">Ranger</option>
									</select>
								 </div>
								<div class="clear"></div>

								<div class="formField">
									<label for="character_race" class="desc">Profession</label> 
									<select id="bid_character_race" name="bid[character_race]"><option value=""> Profession:</option>
										<option value="Asura">Asura</option>
										<option value="Sylvari">Sylvari</option>
										<option value="Human">Human</option>
										<option value="Norn">Norn</option>
										<option value="Charr">Charr</option>
									</select>
								</div>
								<div class="clear"></div>

								<div class="formField">
									<label for="level" class="desc">Level</label> 
									<select id="bid_character_level" name="bid[character_level]">
										<option value=""> Level:</option>
										<option value="1-10">Lv1 - Lv20</option>
										<option value="11-20">Lv11 - Lv20</option>
										<option value="21-30">Lv21 - Lv30</option>
										<option value="31-40">Lv31 - Lv40</option>
										<option value="41-50">Lv41 - Lv50</option>
										<option value="51-60">Lv51 - Lv60</option>
										<option value="61-70">Lv61 - Lv70</option>
										<option value="71-79">Lv71 - Lv79</option>
										<option value="80-80">Lv80</option>
									</select>
									</div>
									<div class="clear"></div>
								</div>
						   
							<?php }else{?>
							<div id="alternatives">
								<div class="formField">
								<label for="armory_link" class="desc">Primary Armory Link</label> 
									<input id="bid_new_alternative_attributes__armory_link" name="bid[new_alternative_attributes][][armory_link]" size="60" type="text"><br>
									<label class="small" for="armory_link">Please Fill in the armory link of the character above or character detail below</label>
								</div>
								<div class="clear"></div>

								<div class="formField">
								<label for="server" class="desc">Server</label> 
									<select id="bid_new_alternative_attributes__server" name="bid[new_alternative_attributes][][server]">
									<option value="">Server:</option>
									<?php include('wow_server.inc.php');?>
									</select>
								</div>
								<div class="clear"></div>

								<div class="formField">
									<label for="character_class" class="desc">Class</label> 
									<select id="bid_new_alternative_attributes__character_class" name="bid[new_alternative_attributes][][character_class]"><option value="">Class:</option>
										<option value="1">Shaman</option>
										<option value="2">Hunter</option>
										<option value="3">Warlock</option>
										<option value="4">Druid</option>
										<option value="5">Mage</option>
										<option value="6">Paladin</option>
										<option value="7">Priest</option>
										<option value="8">Rogue</option>
										<option value="9">Warrior</option>
										<option value="10">Death Knight</option>
										<option value="11">Monk</option>
									</select>
								</div>
								<div class="clear"></div>

								<div class="formField">
								<label for="character_race" class="desc">Race</label> 
									<select id="bid_new_alternative_attributes__character_race" name="bid[new_alternative_attributes][][character_race]">
										<option value="">Race:</option>
										<option value="1">Draenei</option>
										<option value="2">NightElf</option>
										<option value="3">BloodElf</option>
										<option value="4">Gnome</option>
										<option value="5">Human</option>
										<option value="6">Undead</option>
										<option value="7">Dwarf</option>
										<option value="8">Orc</option>
										<option value="9">Tauren</option>
										<option value="10">Troll</option>
										<option value="11">Worgen</option>
										<option value="12">Goblin</option>
										<option value="13">Pandaren</option>
									</select>
								</div>
								<div class="clear"></div>

								<div class="formField">
								<label for="level" class="desc">Level</label> 
								<select id="bid[new_alternative_attributes][][level]" name="bid[new_alternative_attributes][][level]">
									<option value="">Level:</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
									<option value="60">60</option>
									<option value="61">61</option>
									<option value="62">62</option>
									<option value="63">63</option>
									<option value="64">64</option>
									<option value="65">65</option>
									<option value="66">66</option>
									<option value="67">67</option>
									<option value="68">68</option>
									<option value="69">69</option>
									<option value="70">70</option>
									<option value="71">71</option>
									<option value="72">72</option>
									<option value="73">73</option>
									<option value="74">74</option>
									<option value="75">75</option>
									<option value="76">76</option>
									<option value="77">77</option>
									<option value="78">78</option>
									<option value="79">79</option>
									<option value="80">80</option>
									<option value="81">81</option>
									<option value="82">82</option>
									<option value="83">83</option>
									<option value="84">84</option>
									<option value="85">85</option>
									<option value="86">86</option>
									<option value="87">87</option>
									<option value="88">88</option>
									<option value="89">89</option>
									<option value="90">90</option>
								</select>
								</div>
								<div class="clear"></div>
										   </div>
							
							<?php }?>
					   <?php } ?>
					   
					   
					   
					   
					   <div class="section">
						   <h3>4. More Information</h3>
					   </div>

					   <div class="formField">
						   <label for="bidder_remarks" class="desc">Remarks</label> 
						   <textarea cols="40" id="bid_bidder_remarks" name="bid[bidder_remarks]" rows="4"></textarea><br>
						   <label class="small" for="bidder_remarks">Please provide other information that is important to determine the value of your account</label>
					   </div>
					   <div class="clear"></div>
						<!--
						<div id="captcha_canvas" class="span-5 last">

						<style type="text/CSS">
							#simple_captcha{border: 1px solid #ccc; padding: 5px !important;}
							#simple_captcha,
							#simple_captcha div{display: table;}
							#simple_captcha .simple_captcha_field,
							#simple_captcha .simple_captcha_image{
							border: 1px solid #ccc;
							margin: 0px 0px 2px 0px !important;
							padding: 0px !important;
							}
							#simple_captcha .simple_captcha_image img{
							margin: 0px !important;
							padding: 0px !important;
							width: 110px !important;
							}
							#simple_captcha .simple_captcha_label{font-size: 12px;}
							#simple_captcha .simple_captcha_field input{
							width: 150px !important;
							font-size: 16px;
							border: none;
							background-color: #efefef;
							}
						</style>

						<div id="simple_captcha">
							<div class="simple_captcha_image">
							<img src="https://www.vbarrack.com/simple_captcha/simple_captcha?distortion=&amp;image_style=&amp;simple_captcha_key=d92d721efa37200d521b3d1d896d6285592087c9&amp;time=1379488551" alt="simple_captcha.jpg">
							</div>

							<div class="simple_captcha_field">
							<input id="bid_captcha" name="bid[captcha]" size="30" type="text" value=""><input id="bid_captcha_key" name="bid[captcha_key]" type="hidden" value="d92d721efa37200d521b3d1d896d6285592087c9">
							</div>

							<div class="simple_captcha_label">
							(type the code from the image)
							</div>
						</div>
						
						
						</div>
					   <script type="text/javascript">
						//<![CDATA[

								   new Ajax.Updater('captcha_canvas', '/bids/show_simple_captcha', {asynchronous:true, evalScripts:true, method:'get', parameters:'authenticity_token=' + encodeURIComponent('RMaWoTW4gvvIbzBI721Kybf+wEQEU6SlzAhbLsujP90=')})
								   
						//]]>
						</script>
						-->

					   <div class="formField clear">
							<p class="nofull"><input alt="Send Bid Request" id="bid_request_button" type="button" style="border:0px;"></p>

					   </div>

           </form>
		</div>
	
	</div>

	<div id="buy_pay">		
	<!-- BEGIN ARTICLE -->			
		<article class="post-2816 page type-page status-publish hentry instock">
		<!-- BEGIN ENTRY HEADER -->
			<div class="videoall">
				<div class="">
					<img src="<?php echo get_template_directory_uri(); ?>/img/video-words99ac.png">
					<a href="" style="float:right;"><img src="<?php echo get_template_directory_uri(); ?>/img/enlarge_button.jpg"></a>
				</div>
				<div class="">
					<img class="video" src="<?php echo get_template_directory_uri(); ?>/img/video.png">
				</div>
			</div>

		<div class="fpGuides">
		<ul>
			<li>
			<h2>24x7 Online Support</h2>
			<div style="float:left;width:120px;">
			<div>
			<table cellspacing="2" cellpadding="2" border="0">
			<tbody>
			<tr>
			<td align="center"></td>
			<td align="center">
			<a id="_lpChatBtn" onclick="lpButtonCTTUrl = 'https://server.iad.liveperson.net/hc/25905816/?cmd=file&amp;file=visitorWantsToChat&amp;site=25905816&amp;SESSIONVAR!skill=Vbarrack.com&amp;imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English/Small/2c&amp;referrer='+escape(document.location); lpButtonCTTUrl = (typeof(lpAppendVisitorCookies) != 'undefined' ? lpAppendVisitorCookies(lpButtonCTTUrl) : lpButtonCTTUrl); lpButtonCTTUrl = ((typeof(lpMTag)!='undefined' &amp;&amp; typeof(lpMTag.addFirstPartyCookies)!='undefined')?lpMTag.addFirstPartyCookies(lpButtonCTTUrl):lpButtonCTTUrl);window.open(lpButtonCTTUrl,'chat25905816','width=475,height=400,resizable=yes');return false;" target="chat25905816" href="https://server.iad.liveperson.net/hc/25905816/?cmd=file&amp;file=visitorWantsToChat&amp;site=25905816&amp;byhref=1&amp;SESSIONVAR!skill=Vbarrack.com&amp;imageUrl=https://server.iad.liveperson.net/hcp/Gallery/ChatButton-Gallery/English/Small/2c">
			</a></td>
			</tr>
			<tr>
			<td> </td>
			<td align="center">
			<div style="margin-top:5px;">
			<span style="font-size:10px; font-family:Arial, Helvetica, sans-serif;">
			<a target="_blank" style="text-decoration:none; color:#000" href="#">
			<b>Live Chat</b>
			</a>
			<span style="color:#000"> by </span>
			<a target="_blank" style="text-decoration:none; color:#FF9900" href="#">LivePerson</a>
			</span>
			</div>
			</td>
			</tr>
			<tr>
			<td> </td>
			<td align="center">
			<a onclick="javascript:window.open('https://solutions.liveperson.com/customer-service/?site=25905816&amp;domain=server.iad.liveperson.net&amp;origin=chatbutton&amp;referrer='+escape(document.location));return false;" target="_blank" href="https://solutions.liveperson.com/customer-service/?site=25905816&amp;domain=server.iad.liveperson.net&amp;origin=chatbutton">
			<img border="0" alt="Customer Service Rating by LivePerson" name="hcRating" src="https://server.iad.liveperson.net/hc/25905816/?cmd=rating&amp;site=25905816&amp;type=indicator">
			</a>
			</td>
			</tr>
			</tbody>
			</table>
			</div>
			</div>
			<p class="small quiet bottom"> As part of an ongoing efforts to offer the best in services and support to our valued customers, our live help service is available 24 hours, 7 days a week. Our customer representative teams are experienced MMO players which can provide tailor made solutions for our customers' questions. </p>
			</li>
			<li>
			<h2>Godaddy® SSL Verified</h2>
			<div style="float:left;padding-right:8px;">
			<span id="siteseal">
			<script src="https://seal.godaddy.com/getSeal?sealID=hWuyheNxoOqMZS0B2ZViL2Y5EKkFfGnYfn6f51HaWZ2lDvFrhDh2aV9" type="text/javascript">

			</script><img style="cursor:pointer;cursor:hand" width="132" height="31" src="https://seal.godaddy.com/images/3/siteseal_gd_3_h_l_m.gif" onclick="verifySeal();">
			</span>
			</div>
			<p class="small quiet bottom">
			Godaddy is a trusted provider of Internet infrastructure services for the networked world. Godaddy protects more than one million Web servers with digital certificates.
			<span class="genLink"></span>
			</p>
			</li>
			<li>
			<h2>Site secured by McAfee® </h2>
			<a href="#" target="_blank">
			<img border="0" height="54" oncontextmenu="alert('Copying Prohibited by Law - McAfee Secure is a Trademark of McAfee, Inc.'); return false;" alt="McAfee Secure sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" src="<?php echo get_template_directory_uri(); ?>/img/23.gif" style="float:left;padding-right:8px" weight="94">
			</a>
			<p class="small quiet bottom">McAfee, Inc. is the world’s largest dedicated security technology company. McAfee delivers comprehensive protection for small and mid-sized businesses in one smart, simple, and secure solution. </p>
			</li>
			<li>
			<h2>Financial Support in NewZealand</h2>
			<img height="40px" style="float:left;padding-right:8px" src="<?php echo get_template_directory_uri(); ?>/img/nz.png">
			<p class="small quiet bottom"> VBarrack™ Limited is a registered business with financial assistance from New Zealand team-members selling MMO Characters and Accounts that are exclusively purchased from the original players. </p>
			</li>
			<li>
			<h2>Founded in Canada</h2>
			<img height="40px" style="float:left;padding-right:8px" src="<?php echo get_template_directory_uri(); ?>/img/ca.png">
			<p class="small quiet bottom"> VBarrack™ was founded in Canada, to help provide services to gamers of every level and ability to help them reach their potential. </p>
			</li>
			<li>
			<h2>100% Security Guaranteed</h2>
			<a href="#">
			<img style="float:left;padding-right:8px" src="<?php echo get_template_directory_uri(); ?>/img/star.png?1366900430" alt="Star">
			</a>
			<p class="small quiet bottom"> When you purchase anything from VBarrack™ , you can be assured that we have taken every precaution possible to ensure your personal data and payment details remain safe and secure. </p>
			</li>
			<li>
	<span></span>
	<div class="clear"></div>
	</li>
		</ul>
		</div>
		</article>
	</div>
	<!-- END ARTICLE -->	
	</div>
</div>




<?php get_footer(); ?>