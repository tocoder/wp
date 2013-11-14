<div class="banner">
	<div class="banner-lf">
		<img src="<?php echo get_template_directory_uri(); ?>/img/guildwars2eu-banner.jpg" />
	</div>
	<div class="searchBar">
        <form action="" method="get">
            <div id="destDropdown" class="formField topField">
            <div class="standard_field3 standard_field1"  >
				<label for="searchnightsselect">Keywords</label>
				<input id="auto_suggest_item_title" name="auto_suggest_item[title]" size="30" class="keyinput" type="text" autocomplete="off" value="<?php if($auto_suggest_item != ''){echo $auto_suggest_item;}?>">
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
<option value="2000-99999" <?php if($price=='2000-99999'){echo 'selected="selected"'; } ?>>$2000+</option></select>

            </div>
            <div class="standard_field">
                          <label for="searchNightsSelect"></label>
                          <select class="ind_form_select" id="race" name="race">
						  <option value="" <?php if($race==''){echo 'selected="selected"'; } ?>> Profession:</option>
<option value="Asura" <?php if($race=='Asura'){echo 'selected="selected"'; } ?>>Asura</option>
<option value="Sylvari" <?php if($race=='Sylvari'){echo 'selected="selected"'; } ?>>Sylvari</option>
<option value="Human" <?php if($race=='Human'){echo 'selected="selected"'; } ?>>Human</option>
<option value="Norn" <?php if($race=='Norn'){echo 'selected="selected"'; } ?>>Norn</option>
<option value="Charr" <?php if($race=='Charr'){echo 'selected="selected"'; } ?>>Charr</option></select>
                        </div>
            <div class="clr"></div>
            <div class="standard_field">
              <label for="searchNightsSelect"></label>
              <select class="ind_form_select" id="character_class" name="character_class">
			  <option value="" <?php if($character_class==''){echo 'selected="selected"'; } ?>> Class:</option>
<option value="Engineer" <?php if($character_class=='Engineer'){echo 'selected="selected"'; } ?>>Engineer</option>
<option value="Necromancer" <?php if($character_class=='Necromancer'){echo 'selected="selected"'; } ?>>Necromancer</option>
<option value="Thief" <?php if($character_class=='Thief'){echo 'selected="selected"'; } ?>>Thief</option>
<option value="Elementalist" <?php if($character_class=='Elementalist'){echo 'selected="selected"'; } ?>>Elementalist</option>
<option value="Warrior" <?php if($character_class=='Warrior'){echo 'selected="selected"'; } ?>>Warrior</option>
<option value="Mesmer" <?php if($character_class=='Mesmer'){echo 'selected="selected"'; } ?>>Mesmer</option>
<option value="Guardian" <?php if($character_class=='Guardian'){echo 'selected="selected"'; } ?>>Guardian</option>
<option value="Ranger" <?php if($character_class=='Ranger'){echo 'selected="selected"'; } ?>>Ranger</option></select>
            </div>
            <div class="standard_field">
              <label for="searchNightsSelect"></label>
              <select class="ind_form_select" id="level" name="level">
			  <option value="" <?php if($level==''){echo 'selected="selected"'; } ?>>Level:</option>
<option value="1-10" <?php if($level=='1-10'){echo 'selected="selected"'; } ?>>Lv1 - Lv20</option>
<option value="11-20" <?php if($level=='11-20'){echo 'selected="selected"'; } ?>>Lv11 - Lv20</option>
<option value="21-30" <?php if($level=='21-30'){echo 'selected="selected"'; } ?>>Lv21 - Lv30</option>
<option value="31-40" <?php if($level=='31-40'){echo 'selected="selected"'; } ?>>Lv31 - Lv40</option>
<option value="41-50" <?php if($level=='41-50'){echo 'selected="selected"'; } ?>>Lv41 - Lv50</option>
<option value="51-60" <?php if($level=='51-60'){echo 'selected="selected"'; } ?>>Lv51 - Lv60</option>
<option value="61-70" <?php if($level=='61-70'){echo 'selected="selected"'; } ?>>Lv61 - Lv70</option>
<option value="71-79" <?php if($level=='71-79'){echo 'selected="selected"'; } ?>>Lv71 - Lv79</option>
<option value="80-80" <?php if($level=='80-80'){echo 'selected="selected"'; } ?>>Lv80</option></select>
            </div>
            <div class="clr"></div>
            <div class="standard_field">
              <label for="searchNightsSelect"></label>
              <select class="ind_form_select" id="gender" name="gender">
			  <option value="" <?php if($gender==''){echo 'selected="selected"'; } ?>> Gender:</option>
<option value="Female" <?php if($gender=='Female'){echo 'selected="selected"'; } ?>>Female</option>
<option value="Male" <?php if($gender=='Male'){echo 'selected="selected"'; } ?>>Male</option></select>
            </div>
           
            <div class="clr"></div> 
            
            <div class="clr"></div>
            <div class="standard_field3" style="width:280px;">
              <input id="r" name="r" type="hidden" value="listed">
  						<input checked="checked" id="type_guildwars2us" <?php if($type=='guildwars2us'){echo 'checked="checked"'; } ?> name="type" type="radio" value="guildwars2us">
  						<label class="small destLabel" for="destinationRadio">Guild Wars 2 US</label>
  						<input id="type_guildwars2eu" name="type" type="radio" <?php if($type=='guildwars2eu'){echo 'checked="checked"'; } ?>  value="guildwars2eu"> 
  						<label class="small propLabel" for="propertyRadio">Guild Wars 2 EU</label>

            </div>
            <div class="clr"></div>
			<div><input alt="Search" class="search-btn" id="search_button"  type="submit" value="search"></div>
          </div>
        </form>
    </div>
</div>
