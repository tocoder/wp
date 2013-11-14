<?php
/*
 Template Name:Golds
 */
get_header();
 
global $post;
		$slug = get_post( $post )->post_name;
		$params	=	'';
		$game	=	'';
		$money_unit	=	'$';
		
		switch($slug){
			case 'diablo3us':
				$params	='?type=Diablo3UsGold';
				$game	='diablo3';
				break;
			case 'diablo3eu':
				$params	='?type=Diablo3EuGold';
				$game	='diablo3';
				
				break;
			case 'guildwars2us':
				$params	='?type=Guildwars2UsGold';
				$game	='guildwars2';
				
				break;
			case 'guildwars2eu':
				$params	='?type=Guildwars2EuGold';
				$game	='guildwars2';
				break;
			case 'runescape':
				$params	='?type=RunescapeGold';
				$game	='runescape';
			
			break;
			case 'woweu':
				$params	='?game=woweu';
				$game	='WoW Gold EU';	
				$money_unit	=	'USD $';
				
			break;
			
			case 'wowus':
			default:
				$params	=	'';
				$game	='WoW Gold US';
				$money_unit	=	'USD $';
				
		}
		
		$xml_feed_url	=	'http://vbarrack:ee69b5604bf2bf2d5e12ea57963b57e8@api.vbarrack.com/api/golds.xml'.$params;
		$xml	=	simplexml_load_file($xml_feed_url);

?>
<script>
//<![CDATA[

    function validateFields(count){ 
		
        if ((document.getElementById('server_id_'+count) && document.getElementById('server_id_'+count).value == "") || (document.getElementById('character_name_'+count) && document.getElementById('character_name_'+count).value == "") || (document.getElementById('faction_'+count) && document.getElementById('faction_'+count).value == "")){
            showDiv();
            return false;
        } else{
            return true;
        }
    }
    
    function showDiv() {
        if (document.getElementById) 
            document.getElementById('hideShow').style.display = "";
    }
    
    function showDetails(count){
        document.getElementById('purchase_gold_form_'+count).style.display = "";
        document.getElementById('order_image_'+count).style.visibility = 'hidden';
		
		
    }

//]]>
</script>
<div id="info-bar" style="padding-top: 102px; visibility: visible;">
	<div id="search">
		<div class="pp_search_container" id="pp_search_container_7560" >
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

	<?php get_sidebar('blog'); ?>
	
	<ul class="products">
	<table id="tableAccomm" class="listView" border="0" cellpadding="0" cellspacing="0">
		<thead>
		  <tr>
			<td id="name" width="20%"><a href="#">Game</a></td>	
			<td id="name" width="15%"><a href="#">Gold</a></td>
			<td id="name" width="15%"><a href="#">Price</a></td>
			<td width="15%">&nbsp;</td>
			
		  </tr>
		</thead>
		<tbody>
			<script src="<?php echo get_template_directory_uri(); ?>/js/product_index.js" type="text/javascript"></script> 
			<div id="hideShow" class="error" style="display:none">
				<h3>Before purchase, please fill in the required details.</h3>
			</div>
			<?php
				$i=0;
				foreach($xml as $key=>$value){?>
			<tr >
				<td><span class="gold_list_item"><?php echo $game; ?></span></td>
				<td><span class="gold_list_item"><?php echo $value->description;?></span></td>
				<td><span class="gold_list_item"><?php echo $money_unit;?><?php echo $value->price;?></span></td>
				<td>
					<img alt="Buy Now" class="add_to_cart" id="order_image_<?php echo $i; ?>" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" width="75"   onclick="showDetails(<?php echo $i;?>);" onmouseover="this.style.cursor='hand';this.style.cursor='pointer'" style="cursor: pointer;">
				</td> 
				<tr id="purchase_gold_form_<?php echo $i;?>" style="display:none">
				<form action="<?php echo home_url('/');?>buy" method="post" name="order_gold_form" onsubmit="return validateFields(<?php echo $i;?>);" style="background-image: url(http://www.vbarrack.com/images/bookers/backgrounds/bgstripes.gif); background-attachment: scroll; background-color: transparent; background-position: 0px 0px; background-repeat: repeat repeat;">            
				<td colspan="3" style="background-image: url(http://www.vbarrack.com/images/bookers/backgrounds/bgtdgrad.jpg); background-attachment: scroll; background-color: rgb(249, 249, 249); background-position: 100% 100%; background-repeat: repeat no-repeat;">
				<div style="padding:20px">
                <h2>Please fill in the details.</h2>
                <br>
				
				<?php if($game == 'WoW Gold US' || $game == 'WoW Gold EU'){ ?>
                <font color="red">*</font> Select Your Game Server: <br>
				<select id="server_id_<?php echo $i;?>" name="server[server_id]">
				<option value="">Select Server</option>
				<option value="1">WOW US / Aegwynn</option>
				<option value="2">WOW US / Aerie Peak</option>
				<option value="3">WOW US / Agamaggan</option>
				<option value="4">WOW US / Aggramar</option>
				<option value="5">WOW US / Akama</option>
				<option value="6">WOW US / Alexstrasza</option>
				<option value="7">WOW US / Alleria</option>
				<option value="8">WOW US / Altar of Storms</option>
				<option value="9">WOW US / Alterac Mountains</option>
				<option value="10">WOW US / Aman'Thul</option>
				<option value="11">WOW US / Andorhal</option>
				<option value="12">WOW US / Anetheron</option>
				<option value="13">WOW US / Antonidas</option>
				<option value="14">WOW US / Anub'arak</option>
				<option value="15">WOW US / Anvilmar</option>
				<option value="16">WOW US / Arathor</option>
				<option value="17">WOW US / Archimonde</option>
				<option value="18">WOW US / Area 52</option>
				<option value="19">WOW US / Argent Dawn</option>
				<option value="20">WOW US / Arthas</option>
				<option value="21">WOW US / Arygos</option>
				<option value="22">WOW US / Auchindoun</option>
				<option value="23">WOW US / Azgalor</option>
				<option value="24">WOW US / Azjol-Nerub</option>
				<option value="635">WOW US / Azralon</option>
				<option value="25">WOW US / Azshara</option>
				<option value="26">WOW US / Azuremyst</option>
				<option value="27">WOW US / Baelgun</option>
				<option value="28">WOW US / Balnazzar</option>
				<option value="29">WOW US / Barthilas</option>
				<option value="30">WOW US / Black Dragonflight</option>
				<option value="31">WOW US / Blackhand</option>
				<option value="32">WOW US / Blackrock</option>
				<option value="33">WOW US / Blackwater Raiders</option>
				<option value="34">WOW US / Blackwing Lair</option>
				<option value="35">WOW US / Blade's Edge</option>
				<option value="36">WOW US / Bladefist</option>
				<option value="37">WOW US / Bleeding Hollow</option>
				<option value="38">WOW US / Blood Furnace</option>
				<option value="39">WOW US / Bloodhoof</option>
				<option value="40">WOW US / Bloodscalp</option>
				<option value="41">WOW US / Bonechewer</option>
				<option value="481">WOW US / Borean Tundra</option>
				<option value="550">WOW US / Borean Tundra</option>
				<option value="42">WOW US / Boulderfist</option>
				<option value="43">WOW US / Bronzebeard</option>
				<option value="44">WOW US / Burning Blade</option>
				<option value="45">WOW US / Burning Legion</option>
				<option value="46">WOW US / Caelestrasz</option>
				<option value="47">WOW US / Cairne</option>
				<option value="48">WOW US / Cenarion Circle</option>
				<option value="49">WOW US / Cenarius</option>
				<option value="50">WOW US / Cho'gall</option>
				<option value="51">WOW US / Chromaggus</option>
				<option value="52">WOW US / Coilfang</option>
				<option value="53">WOW US / Crushridge</option>
				<option value="54">WOW US / Daggerspine</option>
				<option value="55">WOW US / Dalaran</option>
				<option value="56">WOW US / Dalvengyr</option>
				<option value="57">WOW US / Dark Iron</option>
				<option value="58">WOW US / Darkspear</option>
				<option value="59">WOW US / Darrowmere</option>
				<option value="60">WOW US / Dath'Remar</option>
				<option value="473">WOW US / Dawnbringer</option>
				<option value="551">WOW US / Dawnbringer</option>
				<option value="61">WOW US / Deathwing</option>
				<option value="62">WOW US / Demon Soul</option>
				<option value="63">WOW US / Dentarg</option>
				<option value="64">WOW US / Destromath</option>
				<option value="65">WOW US / Dethecus</option>
				<option value="66">WOW US / Detheroc</option>
				<option value="67">WOW US / Doomhammer</option>
				<option value="68">WOW US / Draenor</option>
				<option value="69">WOW US / Dragonblight</option>
				<option value="70">WOW US / Dragonmaw</option>
				<option value="474">WOW US / Drak'Tharon</option>
				<option value="552">WOW US / Drak'Tharon</option>
				<option value="71">WOW US / Drak'thul</option>
				<option value="72">WOW US / Draka</option>
				<option value="73">WOW US / Drakkari</option>
				<option value="74">WOW US / Dreadmaul</option>
				<option value="75">WOW US / Drenden</option>
				<option value="76">WOW US / Dunemaul</option>
				<option value="77">WOW US / Durotan</option>
				<option value="78">WOW US / Duskwood</option>
				<option value="79">WOW US / Earthen Ring</option>
				<option value="80">WOW US / Echo Isles</option>
				<option value="81">WOW US / Eitrigg</option>
				<option value="82">WOW US / Eldre'Thalas</option>
				<option value="83">WOW US / Elune</option>
				<option value="84">WOW US / Emerald Dream</option>
				<option value="85">WOW US / Eonar</option>
				<option value="86">WOW US / Eredar</option>
				<option value="87">WOW US / Executus</option>
				<option value="88">WOW US / Exodar</option>
				<option value="89">WOW US / Farstriders</option>
				<option value="90">WOW US / Feathermoon</option>
				<option value="91">WOW US / Fenris</option>
				<option value="92">WOW US / Firetree</option>
				<option value="475">WOW US / Fizzcrank</option>
				<option value="93">WOW US / Frostmane</option>
				<option value="94">WOW US / Frostmourne</option>
				<option value="95">WOW US / Frostwolf</option>
				<option value="476">WOW US / Galakrond</option>
				<option value="632">WOW US / Gallywix</option>
				<option value="633">WOW US / Gallywix</option>
				<option value="96">WOW US / Garithos</option>
				<option value="97">WOW US / Garona</option>
				<option value="482">WOW US / Garrosh</option>
				<option value="98">WOW US / Ghostlands</option>
				<option value="99">WOW US / Gilneas</option>
				<option value="100">WOW US / Gnomeregan</option>
				<option value="631">WOW US / Goldrinn</option>
				<option value="101">WOW US / Gorefiend</option>
				<option value="102">WOW US / Gorgonnash</option>
				<option value="103">WOW US / Greymane</option>
				<option value="477">WOW US / Grizzly Hills</option>
				<option value="104">WOW US / Gul'dan</option>
				<option value="479">WOW US / Gundrak</option>
				<option value="105">WOW US / Gurubashi</option>
				<option value="106">WOW US / Hakkar</option>
				<option value="107">WOW US / Haomarush</option>
				<option value="108">WOW US / Hellscream</option>
				<option value="109">WOW US / Hydraxis</option>
				<option value="110">WOW US / Hyjal</option>
				<option value="111">WOW US / Icecrown</option>
				<option value="112">WOW US / Illidan</option>
				<option value="113">WOW US / Jaedenar</option>
				<option value="114">WOW US / Jubei'Thos</option>
				<option value="115">WOW US / Kael'thas</option>
				<option value="116">WOW US / Kalecgos</option>
				<option value="117">WOW US / Kargath</option>
				<option value="118">WOW US / Kel'Thuzad</option>
				<option value="119">WOW US / Khadgar</option>
				<option value="120">WOW US / Khaz Modan</option>
				<option value="121">WOW US / Khaz'goroth</option>
				<option value="122">WOW US / Kil'Jaeden</option>
				<option value="123">WOW US / Kilrogg</option>
				<option value="124">WOW US / Kirin Tor</option>
				<option value="125">WOW US / Korgath</option>
				<option value="126">WOW US / Korialstrasz</option>
				<option value="127">WOW US / Kul Tiras</option>
				<option value="128">WOW US / Laughing Skull</option>
				<option value="129">WOW US / Lethon</option>
				<option value="130">WOW US / Lightbringer</option>
				<option value="131">WOW US / Lightning's Blade</option>
				<option value="132">WOW US / Lightninghoof</option>
				<option value="133">WOW US / Llane</option>
				<option value="134">WOW US / Lothar</option>
				<option value="135">WOW US / Madoran</option>
				<option value="136">WOW US / Maelstrom</option>
				<option value="137">WOW US / Magtheridon</option>
				<option value="138">WOW US / Maiev</option>
				<option value="139">WOW US / Mal'Ganis</option>
				<option value="140">WOW US / Malfurion</option>
				<option value="141">WOW US / Malorne</option>
				<option value="142">WOW US / Malygos</option>
				<option value="143">WOW US / Mannoroth</option>
				<option value="144">WOW US / Medivh</option>
				<option value="145">WOW US / Misha</option>
				<option value="146">WOW US / Mok'Nathal</option>
				<option value="147">WOW US / Moon Guard</option>
				<option value="148">WOW US / Moonrunner</option>
				<option value="149">WOW US / Mug'thol</option>
				<option value="150">WOW US / Muradin</option>
				<option value="151">WOW US / Nagrand</option>
				<option value="152">WOW US / Nathrezim</option>
				<option value="153">WOW US / Nazgrel</option>
				<option value="154">WOW US / Nazjatar</option>
				<option value="638">WOW US / Nemesis</option>
				<option value="155">WOW US / Ner'zhul</option>
				<option value="485">WOW US / Nesingwary</option>
				<option value="486">WOW US / Nesingwary</option>
				<option value="156">WOW US / Nordrassil</option>
				<option value="157">WOW US / Norgannon</option>
				<option value="158">WOW US / Onyxia</option>
				<option value="159">WOW US / Perenolde</option>
				<option value="160">WOW US / Proudmoore</option>
				<option value="162">WOW US / Quel'Thalas</option>
				<option value="161">WOW US / Quel'dorei</option>
				<option value="163">WOW US / Ragnaros</option>
				<option value="164">WOW US / Ravencrest</option>
				<option value="165">WOW US / Ravenholdt</option>
				<option value="166">WOW US / Rexxar</option>
				<option value="167">WOW US / Rivendare</option>
				<option value="168">WOW US / Runetotem</option>
				<option value="169">WOW US / Sargeras</option>
				<option value="480">WOW US / Saurfang</option>
				<option value="170">WOW US / Scarlet Crusade</option>
				<option value="171">WOW US / Scilla</option>
				<option value="172">WOW US / Sen'Jin</option>
				<option value="173">WOW US / Sentinels</option>
				<option value="174">WOW US / Shadow Council</option>
				<option value="175">WOW US / Shadowmoon</option>
				<option value="176">WOW US / Shadowsong</option>
				<option value="177">WOW US / Shandris</option>
				<option value="178">WOW US / Shattered Halls</option>
				<option value="179">WOW US / Shattered Hand</option>
				<option value="180">WOW US / Shu'halo</option>
				<option value="181">WOW US / Silver Hand</option>
				<option value="182">WOW US / Silvermoon</option>
				<option value="183">WOW US / Sisters of Elune</option>
				<option value="184">WOW US / Skullcrusher</option>
				<option value="185">WOW US / Skywall</option>
				<option value="186">WOW US / Smolderthorn</option>
				<option value="187">WOW US / Spinebreaker</option>
				<option value="188">WOW US / Spirestone</option>
				<option value="189">WOW US / Staghelm</option>
				<option value="190">WOW US / Steamwheedle Cartel</option>
				<option value="191">WOW US / Stonemaul</option>
				<option value="192">WOW US / Stormrage</option>
				<option value="193">WOW US / Stormreaver</option>
				<option value="194">WOW US / Stormscale</option>
				<option value="195">WOW US / Suramar</option>
				<option value="196">WOW US / Tanaris</option>
				<option value="197">WOW US / Terenas</option>
				<option value="198">WOW US / Terokkar</option>
				<option value="199">WOW US / Thaurissan</option>
				<option value="200">WOW US / The Forgotten Coast</option>
				<option value="201">WOW US / The Scryers</option>
				<option value="202">WOW US / The Underbog</option>
				<option value="203">WOW US / The Venture Co</option>
				<option value="204">WOW US / Thorium Brotherhood</option>
				<option value="205">WOW US / Thrall</option>
				<option value="206">WOW US / Thunderhorn</option>
				<option value="207">WOW US / Thunderlord</option>
				<option value="208">WOW US / Tichondrius</option>
				<option value="209">WOW US / Tortheldrin</option>
				<option value="210">WOW US / Trollbane</option>
				<option value="211">WOW US / Turalyon</option>
				<option value="212">WOW US / Twisting Nether</option>
				<option value="213">WOW US / Uldaman</option>
				<option value="214">WOW US / Uldum</option>
				<option value="215">WOW US / Undermine</option>
				<option value="216">WOW US / Ursin</option>
				<option value="217">WOW US / Uther</option>
				<option value="218">WOW US / Vashj</option>
				<option value="219">WOW US / Vek'nilash</option>
				<option value="220">WOW US / Velen</option>
				<option value="221">WOW US / Warsong</option>
				<option value="222">WOW US / Whisperwind</option>
				<option value="223">WOW US / WildHammer</option>
				<option value="224">WOW US / Windrunner</option>
				<option value="553">WOW US / Winterhoof</option>
				<option value="484">WOW US / Wyrmrest Accord</option>
				<option value="225">WOW US / Ysera</option>
				<option value="226">WOW US / Ysondre</option>
				<option value="227">WOW US / Zangarmarsh</option>
				<option value="228">WOW US / Zul'jin</option>
				<option value="229">WOW US / Zuluhed</option>
				</select>
				<br>
				<?php } ?>
				
				<?php if($game == 'WoW Gold US' || $game == 'WoW Gold EU'){ ?>
				<font color="red">*</font> Select Your Side: <br>
				<select class="ind_form_select" id="faction_<?php echo $i;?>" name="faction">
				<option value="">Select a Faction</option>
				<option value="Alliance">Alliance</option>
				<option value="Horde">Horde</option>
				</select><br>
				<?php }?>
				
				<?php if($game == 'guildwars2'){?>
					<font color="red">*</font> Select Your Game Server: </br>
					<select id="server_id_<?php echo $i;?>" name="server[server_id]">
						<option value="">Select Server</option>
						<option value="639">GW2 US / Anvil Rock</option>
						<option value="640">GW2 US / Blackgate</option>
						<option value="641">GW2 US / Borlis Pass</option>
						<option value="642">GW2 US / Crystal Desert</option>
						<option value="643">GW2 US / Darkhaven</option>
						<option value="644">GW2 US / Dragonbrand</option>
						<option value="645">GW2 US / Ehmry Bay</option>
						<option value="646">GW2 US / Ferguson's Crossing</option>
						<option value="647">GW2 US / Fort Aspenwood</option>
						<option value="648">GW2 US / Gate of Madness</option>
						<option value="649">GW2 US / Henge of Denravi</option>
						<option value="650">GW2 US / Isle of Janthir</option>
						<option value="651">GW2 US / Jade Quarry</option>
						<option value="688">GW2 US / Kaineng</option>
						<option value="652">GW2 US / Maguuma</option>
						<option value="653">GW2 US / Northern Shiverpeaks</option>
						<option value="654">GW2 US / Sanctum of Rall</option>
						<option value="655">GW2 US / Sea of Sorrows</option>
						<option value="656">GW2 US / Sorrow's Furnace</option>
						<option value="657">GW2 US / Stormbluff Isle</option>
						<option value="658">GW2 US / Tarnished Coast</option>
						<option value="659">GW2 US / Yak's Bend</option>
					</select>
					<br />
				<?php }?>
				<font color="red">*</font> Fill in Your Character Name (or BattleTag): <br><input id="character_name_<?php echo $i;?>" name="character_name" type="text">
				</div>
				</td>
				<td style="background-image: url(http://www.vbarrack.com/images/bookers/backgrounds/bgstripes.gif); background-attachment: scroll; background-color: transparent; background-position: 0px 0px; background-repeat: repeat repeat;">
						
						<input id="action" name="action" type="hidden" value="add">
						<input id="id" name="id" type="hidden" value="<?php echo $value->id; ?>">
						<input id="product_name" name="product_name" type="hidden" value="<?php echo $slug; ?>">
						<input id="species" name="species" type="hidden" value="golds">
						<input id="price" name="price" type="hidden" value="<?php echo $value->price; ?>">
						<input id="on" name="on" type="hidden" value="<?php echo time(); ?>">
						<input alt="Buy Now" class="add_to_cart" src="<?php echo get_template_directory_uri(); ?>/img/Order_Now.png" type="image"  onclick="validateFields(<?php echo $i;?>);" style="background:none;border:none;">
				</td>
				</form>
				</tr>
			</tr>
			<?php $i++;
				}
			?>
			
		</tbody>
	</table>
	</ul>

	<div id="content">		
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
<?php get_footer(); ?>