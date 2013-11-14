<div class="banner">
	<div class="banner-lf">
		<img src="<?php echo get_template_directory_uri(); ?>/img/lol-banner.jpg" />
	</div>
	<div>
	<div class="searchBar">
    <form action="" method="get">
		<input type="hidden" name='game_type' value='lol' />
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
					<option value="2000-99999" <?php if($price=='2000-99999'){echo 'selected="selected"'; } ?>>$2000+</option>
				</select>
            </div>
            
            <div class="standard_field">
              <label for="searchNightsSelect"></label>
              <select class="ind_form_select" id="level" name="level">
				<option value="" <?php if($level==''){echo 'selected="selected"'; } ?>>Level:</option>
				<option value="30-30" <?php if($level=='30-30'){echo 'selected="selected"'; } ?>>Lv30</option>
				<option value="20-10" <?php if($level=='20-10'){echo 'selected="selected"'; } ?>>Lv20-10</option>
				<option value="10-0"<?php if($level=='10-0'){echo 'selected="selected"'; } ?>>Lv10-0</option>
			  </select>
            </div>
            <div class="clr"></div>
           
			<div><input alt="Search" class="search-btn" id="search_button"  type="submit" value="search"></div>
          </div>
        </form>
	</div>
	</div>
</div>
