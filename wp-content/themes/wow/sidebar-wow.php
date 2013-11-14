
<div class="banner">
	<div class="banner-lf">
		<img style="width:100%;" src="<?php echo get_template_directory_uri(); ?>/img/wowus-banner.jpg" />
	</div>
	<div>
	<div class="searchBar">
        <form action="" method="get">
          <div id="destDropdown" class="formField topField">
            <div class="standard_field3 standard_field1" >
				<label  for="searchnightsselect">Keywords</label>
				<input  id="auto_suggest_item_title" name="auto_suggest_item[title]" size="30" class="keyinput" style="" type="text" autocomplete="off" value="<?php if($auto_suggest_item != ''){echo $auto_suggest_item;}?>">
				<div class="auto_complete" id="auto_suggest_item_title_auto_complete" style="display: none;"></div>
            </div>
            <div class="clr"></div>
            <div class="standard_field">
             
              <label for="searchNightsSelect"></label>
              <select class="ind_form_select" id="price" name="price">
					<option value="" <?php if($price==''){echo 'selected="selected"'; } ?>>Price:</option>
					<option value="0-250" <?php if($price=='0-250'){echo 'selected="selected"'; } ?>>$0 - $250</option>
					<option value="250-400" <?php if($price=='250-400'){echo 'selected="selected"'; } ?>>$250 - $400</option>
					<option value="400-600" <?php if($price=='400-600'){echo 'selected="selected"'; } ?>>$400 - $600</option>
					<option value="600-800" <?php if($price=='600-800'){echo 'selected="selected"'; } ?>>$600 - $800</option>
					<option value="800-1200" <?php if($price=='800-1200'){echo 'selected="selected"'; } ?>>$800 - $1200</option>
					<option value="1200-2000" <?php if($price=='1200-2000'){echo 'selected="selected"'; } ?>>$1200 - $2000</option>
					<option value="2000-99999" <?php if($price=='2000-99999'){echo 'selected="selected"'; } ?>>$2000+</option>
				</select>
            </div>
            <div class="standard_field">
              <label for="searchNightsSelect"></label>
              <select class="ind_form_select" id="race" name="race">
				<option value=""  <?php if($race==''){echo 'selected="selected"'; } ?>> Race:</option>
				<option value="Blood Elf" <?php if($race=='Blood Elf'){echo 'selected="selected"'; } ?>>Blood Elf</option>
				<option value="Draenei" <?php if($race=='Draenei'){echo 'selected="selected"'; } ?>>Draenei</option>
				<option value="Dwarf" <?php if($race=='Dwarf'){echo 'selected="selected"'; } ?>>Dwarf</option>
				<option value="Gnome" <?php if($race=='Gnome'){echo 'selected="selected"'; } ?>>Gnome</option>
				<option value="Goblin" <?php if($race=='Goblin'){echo 'selected="selected"'; } ?>>Goblin</option>
				<option value="Human" <?php if($race=='Human'){echo 'selected="selected"'; } ?>>Human</option>
				<option value="Night Elf" <?php if($race=='Night Elf'){echo 'selected="selected"'; } ?>>Night Elf</option>
				<option value="Orc" <?php if($race=='Orc'){echo 'selected="selected"'; } ?>>Orc</option>
				<option value="Pandaren" <?php if($race=='Pandaren'){echo 'selected="selected"'; } ?>>Pandaren</option>
				<option value="Tauren" <?php if($race=='Tauren'){echo 'selected="selected"'; } ?>>Tauren</option>
				<option value="Troll" <?php if($race=='Troll'){echo 'selected="selected"'; } ?>>Troll</option>
				<option value="Undead" <?php if($race=='Undead'){echo 'selected="selected"'; } ?>>Undead</option>
				<option value="Worgen" <?php if($race=='Worgen'){echo 'selected="selected"'; } ?>>Worgen</option>
			</select>
            </div>
            <div class="clr"></div>
            <div  class="standard_field">
              <label for="searchNightsSelect"></label>
              <select class="ind_form_select" id="character_class" name="character_class">
				<option value=""  <?php if($character_class==''){echo 'selected="selected"'; } ?>> Class:</option>
				<option value="Death Knight"  <?php if($character_class=='Death Knight'){echo 'selected="selected"'; } ?>>Death Knight</option>
				<option value="Druid"  <?php if($character_class=='Druid'){echo 'selected="selected"'; } ?>>Druid</option>
				<option value="Hunter" <?php if($character_class=='Hunter'){echo 'selected="selected"'; } ?>>Hunter</option>
				<option value="Mage" <?php if($character_class=='Mage'){echo 'selected="selected"'; } ?>>Mage</option>
				<option value="Monk" <?php if($character_class=='Monk'){echo 'selected="selected"'; } ?>>Monk</option>
				<option value="Paladin" <?php if($character_class=='Paladin'){echo 'selected="selected"'; } ?>>Paladin</option>
				<option value="Priest" <?php if($character_class=='Priest'){echo 'selected="selected"'; } ?>>Priest</option>
				<option value="Rogue" <?php if($character_class=='Rogue'){echo 'selected="selected"'; } ?>>Rogue</option>
				<option value="Shaman" <?php if($character_class=='Shaman'){echo 'selected="selected"'; } ?>>Shaman</option>
				<option value="Warlock" <?php if($character_class=='Warlock'){echo 'selected="selected"'; } ?>>Warlock</option>
				<option value="Warrior" <?php if($character_class=='Warrior'){echo 'selected="selected"'; } ?>>Warrior</option>
			</select>
            </div>
            <div class="standard_field">
              <label for="searchNightsSelect"></label>
				<select class="ind_form_select" id="level" name="level">
					<option value="" <?php if($level==''){echo 'selected="selected"'; } ?>>Level:</option>
					<option value="80-80" <?php if($level=='80-80'){echo 'selected="selected"'; } ?>>Lv80</option>
					<option value="81-84" <?php if($level=='81-84'){echo 'selected="selected"'; } ?>>Lv81-84</option>
					<option value="85-85" <?php if($level=='85-85'){echo 'selected="selected"'; } ?>>Lv85</option>
					<option value="86-89" <?php if($level=='86-89'){echo 'selected="selected"'; } ?>>Lv86-89</option>
					<option value="90-90" <?php if($level=='90-90'){echo 'selected="selected"'; } ?>>Lv90</option>
				</select>
            </div>
            <div class="clr"></div>
            <div class="standard_field">
              <label for="searchNightsSelect"></label>
				<select class="ind_form_select" id="gender" name="gender">
					<option value=""  <?php if($gender==''){echo 'selected="selected"'; } ?>> Gender:</option>
					<option value="Female" <?php if($gender=='Female'){echo 'selected="selected"'; } ?>>Female</option>
					<option value="Male" <?php if($gender=='Male'){echo 'selected="selected"'; } ?>>Male</option>
				</select>
            </div>
            <div class="standard_field">
              <label for="searchNightsSelect"></label>
				<select class="ind_form_select" id="faction" name="faction">
					<option value="" <?php if($faction==''){echo 'selected="selected"'; } ?>> Faction:</option>
					<option value="Alliance" <?php if($faction=='Alliance'){echo 'selected="selected"'; } ?>>Alliance</option>
					<option value="Horde" <?php if($faction=='Horde'){echo 'selected="selected"'; } ?>>Horde</option>
				</select>
            </div>
            <div class="clr"></div> 
            <div  class="standard_field">
              <label for="searchNightsSelect"></label>
              <select class="ind_form_select" id="talent" name="talent">
			  <option value="" <?php if($talent==''){echo 'selected="selected"'; } ?>> Talents:</option>
<option value="Affliction" <?php if($talent=='Affliction'){echo 'selected="selected"'; } ?>>Affliction (Warlock)</option>
<option value="Arcane" <?php if($talent=='Arcane'){echo 'selected="selected"'; } ?>>Arcane (Mage)</option>
<option value="Arms" <?php if($talent=='Arms'){echo 'selected="selected"'; } ?>>Arms (Warrior)</option>
<option value="Assassination" <?php if($talent=='Assassination'){echo 'selected="selected"'; } ?>>Assassination (Rogue)</option>
<option value="Balance"  <?php if($talent=='Balance'){echo 'selected="selected"'; } ?>>Balance (Druid)</option>
<option value="Beast Mastery" <?php if($talent=='Beast Mastery'){echo 'selected="selected"'; } ?>>Beast Mastery (Hunter)</option>
<option value="Blood" <?php if($talent=='Blood'){echo 'selected="selected"'; } ?>>Blood (Death Knight)</option>
<option value="Combat" <?php if($talent=='Combat'){echo 'selected="selected"'; } ?>>Combat (Rogue)</option>
<option value="Demonology" <?php if($talent=='Demonology'){echo 'selected="selected"'; } ?>>Demonology (Warlock)</option>
<option value="Destruction" <?php if($talent=='Destruction'){echo 'selected="selected"'; } ?>>Destruction (Warlock)</option>
<option value="Discipline" <?php if($talent=='Discipline'){echo 'selected="selected"'; } ?>>Discipline (Priest)</option>
<option value="Elemental" <?php if($talent=='Elemental'){echo 'selected="selected"'; } ?>>Elemental (Shaman)</option>
<option value="Enhancement" <?php if($talent=='Enhancement'){echo 'selected="selected"'; } ?>>Enhancement (Shaman)</option>
<option value="Feral" <?php if($talent=='Feral'){echo 'selected="selected"'; } ?>>Feral (Druid)</option>
<option value="Guardian" <?php if($talent=='Guardian'){echo 'selected="selected"'; } ?>>Guardian (Druid)</option>
<option value="Fire" <?php if($talent=='Fire'){echo 'selected="selected"'; } ?>>Fire (Mage)</option>
<option value="Frost" <?php if($talent=='Frost'){echo 'selected="selected"'; } ?>>Frost (Mage,Death Knight)</option>
<option value="Fury" <?php if($talent=='Fury'){echo 'selected="selected"'; } ?>>Fury (Warrior)</option>
<option value="Holy" <?php if($talent=='Holy'){echo 'selected="selected"'; } ?>>Holy (Paladin,Priest)</option>
<option value="Marksmanship" <?php if($talent=='Marksmanship'){echo 'selected="selected"'; } ?>>Marksmanship (Hunter)</option>
<option value="Protection" <?php if($talent=='Protection'){echo 'selected="selected"'; } ?>>Protection (Paladin,Warrior)</option>
<option value="Restoration" <?php if($talent=='Restoration'){echo 'selected="selected"'; } ?>>Restoration (Shaman,Druid)</option>
<option value="Retribution" <?php if($talent=='Retribution'){echo 'selected="selected"'; } ?>>Retribution (Paladin)</option>
<option value="Shadow" <?php if($talent=='Shadow'){echo 'selected="selected"'; } ?>>Shadow (Priest)</option>
<option value="Subtlety" <?php if($talent=='Subtlety'){echo 'selected="selected"'; } ?>>Subtlety (Rogue)</option>
<option value="Survival" <?php if($talent=='Survival'){echo 'selected="selected"'; } ?>>Survival (Hunter)</option>
<option value="Unholy" <?php if($talent=='Unholy'){echo 'selected="selected"'; } ?>>Unholy (Death Knight)</option>
<option value="Brewmaster" <?php if($talent=='Brewmaster'){echo 'selected="selected"'; } ?>>Brewmaster (Monk)</option>
<option value="Mistweaver" <?php if($talent=='Mistweaver'){echo 'selected="selected"'; } ?>>Mistweaver (Monk)</option>
<option value="Windwalker" <?php if($talent=='Windwalker'){echo 'selected="selected"'; } ?>>Windwalker (Monk)</option></select>
            </div>
            <div class="standard_field">
              <label for="searchNightsSelect"></label> 
              <select class="ind_form_select" id="profession" name="profession">
			  <option value="" <?php if($profession==''){echo 'selected="selected"'; } ?>> Profession:</option>
<option value="Alchemy" <?php if($profession=='Alchemy'){echo 'selected="selected"'; } ?>>Alchemy</option>
<option value="Blacksmithing" <?php if($profession=='Blacksmithing'){echo 'selected="selected"'; } ?>>Blacksmithing</option>
<option value="Enchanting" <?php if($profession=='Enchanting'){echo 'selected="selected"'; } ?>>Enchanting</option>
<option value="Engineering" <?php if($profession=='Engineering'){echo 'selected="selected"'; } ?>>Engineering</option>
<option value="Herbalism" <?php if($profession=='Herbalism'){echo 'selected="selected"'; } ?>>Herbalism</option>
<option value="Inscription" <?php if($profession=='Inscription'){echo 'selected="selected"'; } ?>>Inscription</option>
<option value="Jewelcrafting" <?php if($profession=='Jewelcrafting'){echo 'selected="selected"'; } ?>>Jewelcrafting</option>
<option value="Leatherworking" <?php if($profession=='Leatherworking'){echo 'selected="selected"'; } ?>>Leatherworking</option>
<option value="Mining" <?php if($profession=='Mining'){echo 'selected="selected"'; } ?>>Mining</option>
<option value="Tailoring" <?php if($profession=='Tailoring'){echo 'selected="selected"'; } ?>>Tailoring</option></select>
            </div>
            <div class="clr"></div>
            <div  class="standard_field">
              <label for="searchNightsSelect"></label>
              <select class="ind_form_select" id="t" name="t">
			  <option value="" <?php if($t==''){echo 'selected="selected"'; } ?>>Category: </option>
<option value="PvP Achievements" <?php if($t=='PvP Achievements'){echo 'selected="selected"'; } ?>>PvP Achievements</option>
<option value="Mounts Lovers" <?php if($t=='Mounts Lovers'){echo 'selected="selected"'; } ?>>Mounts Lovers</option>
<option value="Special" <?php if($t=='Special'){echo 'selected="selected"'; } ?>>Special</option>
<option value="PvP Aimed" <?php if($t=='PvP Aimed'){echo 'selected="selected"'; } ?>>PvP Aimed</option></select>
            </div>
            <div  class="standard_field">
              <label for="searchNightsSelect"></label> 
              <select class="ind_form_select" id="pr" name="pr">
			  <option value=""  <?php if($pr==''){echo 'selected="selected"'; } ?>>Type: </option>
<option value="both" <?php if($pr=='both'){echo 'selected="selected"'; } ?>>Transfer &amp; Premade</option>
<option value="transfer" <?php if($pr=='transfer'){echo 'selected="selected"'; } ?>>Transfer Only</option>
<option value="premade" <?php if($pr=='premade'){echo 'selected="selected"'; } ?>>Pre-made Only</option></select>
              
            </div>
            <div class="clr"></div>
			<div><input alt="Search" class="search-btn" id="search_button"  type="submit" value="search"></div>
          </div>
	   </form>
    
	</div>
	</div>
</div>
