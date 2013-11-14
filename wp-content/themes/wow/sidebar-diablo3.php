<div class="banner">
	<div class="banner-lf">
		<img src="<?php echo get_template_directory_uri(); ?>/img/diablo3us-banner.jpg" />
	</div>
	<div class="searchBar">
		<form action="" method="get">
          <div id="destDropdown" class="formField topField">
            <div class="standard_field3 standard_field1"  >
				<label for="searchnightsselect">Keywords</label>
				<input id="auto_suggest_item_title" name="auto_suggest_item[title]" size="30" class="keyinput" style="" type="text" autocomplete="off" value="<?php if($auto_suggest_item != ''){echo $auto_suggest_item;}?>">
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
				<select class="ind_form_select" id="mode" name="mode">
					<option value="" <?php if($mode==''){echo 'selected="selected"'; } ?>> Mode:</option>
					<option value="Hardcore" <?php if($mode=='Hardcore'){echo 'selected="selected"'; } ?>>Hardcore</option>
					<option value="Normal" <?php if($mode=='Normal'){echo 'selected="selected"'; } ?>>Normal</option>
				</select>
            </div>
            <div class="clr"></div>
            <div class="standard_field">
				<label for="searchNightsSelect"></label>
				<select class="ind_form_select" id="character_class" name="character_class">
					<option value=""  <?php if($character_class==''){echo 'selected="selected"'; } ?>> Class:</option>
					<option value="Barbarian"  <?php if($character_class=='Barbarian'){echo 'selected="selected"'; } ?>>Barbarian</option>
					<option value="Demon Hunter" <?php if($character_class=='Demon Hunter'){echo 'selected="selected"'; } ?>>Demon Hunter</option>
					<option value="Monk" <?php if($character_class=='Monk'){echo 'selected="selected"'; } ?>>Monk</option>
					<option value="Witch Doctor" <?php if($character_class=='Witch Doctor'){echo 'selected="selected"'; } ?>>Witch Doctor</option>
					<option value="Wizard" <?php if($character_class=='Wizard'){echo 'selected="selected"'; } ?>>Wizard</option>
				</select>
            </div>
            <div class="standard_field">
				<label for="searchNightsSelect"></label>
				<select class="ind_form_select" id="level" name="level">
					<option value=""  <?php if($level==''){echo 'selected="selected"'; } ?>>Level:</option>
					<option value="1-10"  <?php if($level=='1-10'){echo 'selected="selected"'; } ?>>Lv1 - Lv20</option>
					<option value="11-20" <?php if($level=='11-20'){echo 'selected="selected"'; } ?>>Lv11 - Lv20</option>
					<option value="21-30" <?php if($level=='21-30'){echo 'selected="selected"'; } ?>>Lv21 - Lv30</option>
					<option value="31-40" <?php if($level=='31-40'){echo 'selected="selected"'; } ?>>Lv31 - Lv40</option>
					<option value="41-49" <?php if($level=='41-49'){echo 'selected="selected"'; } ?>>Lv41 - Lv49</option>
					<option value="50-50" <?php if($level=='50-50'){echo 'selected="selected"'; } ?>>Lv50</option>
				</select>
            </div>
            <div class="clr"></div>
            <div class="standard_field">
				<label for="searchNightsSelect"></label>
				<select class="ind_form_select" id="gender" name="gender">
					<option value="" <?php if($gender==''){echo 'selected="selected"'; } ?>> Gender:</option>
					<option value="Female" <?php if($gender=='Female'){echo 'selected="selected"'; } ?>>Female</option>
					<option value="Male" <?php if($gender=='Male'){echo 'selected="selected"'; } ?>>Male</option>
				</select>
            </div>
            
            <div class="clr"></div> 
            
            <div class="clr"></div>
            <div class="standard_field3" >
				<input id="r" name="r" type="hidden" value="listed">
				<input checked="checked" <?php if($type == 'diablo3us'){ echo 'checked="checked"';}?> id="type_diablo3us" name="type" type="radio" value="diablo3us">
				<label class="small destLabel" for="destinationRadio">Diablo3 US</label>
				<input id="type_diablo3eu" <?php if($type == 'diablo3eu'){ echo 'checked="checked"';}?>  name="type" type="radio" value="diablo3eu"> 
				<label class="small propLabel" for="propertyRadio">Diablo3 EU</label>
				<input id="type_diablo3asia" <?php if($type == 'diablo3asia'){ echo 'checked="checked"';}?>  name="type" type="radio" value="diablo3asia"> 
				<label class="small propLabel" for="propertyRadio">Diablo3 Asia</label>
            </div>
            <div class="clr"></div>
			<div><input alt="Search" class="search-btn" id="search_button"  type="submit" value="search"></div>
          </div>
        </form>
	</div>
</div>
