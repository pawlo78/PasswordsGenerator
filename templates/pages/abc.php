<form method='post' action='index.php'>

  <div class="form-group row margin-top">
    <label for="noPass" class="col-2 col-form-label"></label> 
    <div class="col-2">
      <div class="input-group">
        <div class="input-group-prepend">          
        </div> 
        <?php
          if(isset($params['info'])) {      
            echo "<button type='button' class='btn btn-danger'>{$params['info']}</button>";
          }
        ?>
        <div class="input-group-append">        
        </div>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="noPass" class="col-2 col-form-label">Number of passwords</label> 
    <div class="col-2">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"></div>
        </div> 
        <input id="noPass" name="noPass" type="text" class="form-control"
        <?php
          if(isset($params['noPass'])) { echo "value={$params['noPass']}"; }
        ?>
        >
        <div class="input-group-append">
          <div class="input-group-text"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="noChar" class="col-2 col-form-label">Number of characters</label> 
    <div class="col-2">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"></div>
        </div> 
        <input id="noChar" name="noChar" type="text" class="form-control"
        <?php
          if(isset($params['noChar'])) { echo "value={$params['noChar']}"; }
        ?>
        > 
        <div class="input-group-append">
          <div class="input-group-text"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-2 col-form-label">Password structure</label> 
    <div class="col-4">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="passStruc_LL" id="passStruc_LL" type="checkbox" class="custom-control-input" value="lowLetters"
          <?php
            if(isset($params['passStruc_LL'])) { echo "checked='checked'"; }
          ?>
          > 
          <label for="passStruc_LL" class="custom-control-label">Lower case letters</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="passStruc_UL" id="passStruc_UL" type="checkbox" class="custom-control-input" value="upLetters"
          <?php
            if(isset($params['passStruc_UL'])) { echo "checked='checked'"; }
          ?>
          >  
          <label for="passStruc_UL" class="custom-control-label">Upper case letters</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="passStruc_DG" id="passStruc_DG" type="checkbox" class="custom-control-input" value="digits"
          <?php
            if(isset($params['passStruc_DG'])) { echo "checked='checked'"; }
          ?>
          >  
          <label for="passStruc_DG" class="custom-control-label">Digits</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="passStruc_SC" id="passStruc_SC" type="checkbox" class="custom-control-input" value="specChar"
          <?php
            if(isset($params['passStruc_SC'])) { echo "checked='checked'"; }
          ?>
          >  
          <label for="passStruc_SC" class="custom-control-label">Special characters</label>
        </div>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-2 col-8">
      <button name="submit" type="submit" class="btn btn-primary" value="submit">Submit</button>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-2 col-8">
   
<a href="https://github.com/pawlo78/Calendar" class="btn btn-primary active center" target="_blank" role="button" aria-pressed="true">Go to github</a>
 
    </div>
  </div>
</form>



