<div class="banner">
	<div class="banner-lf">
		<img src="<?php echo get_template_directory_uri(); ?>/img/runescape-banner.jpg" />
	</div>
	<div class="searchBar">
	<form action="" method="get">
			<input type="hidden" name='game_type' value='runescape' />
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
              <select class="ind_form_select" id="level" name="level">
			  <option value="" <?php if($level==''){echo 'selected="selected"'; } ?>>Level:</option>
<option value="100-120" <?php if($level=='100-120'){echo 'selected="selected"'; } ?>>Lv100 - Lv120</option>
<option value="120-140" <?php if($level=='120-140'){echo 'selected="selected"'; } ?>>Lv120 - Lv140</option>
<option value="140-160" <?php if($level=='140-160'){echo 'selected="selected"'; } ?>>Lv140 - Lv160</option>
<option value="160-180" <?php if($level=='160-180'){echo 'selected="selected"'; } ?>>Lv160 - Lv180</option>
<option value="180-200" <?php if($level=='180-200'){echo 'selected="selected"'; } ?>>Lv180 - Lv200</option></select>
            </div>
            <div class="clr"></div>
         
			<div><input alt="Search" class="search-btn" id="search_button"  type="submit" value="search"></div>
          </div>
        </form>
	</div>
</div>
