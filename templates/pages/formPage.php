
<form method='post' action='index.php'>
  <div class="form-group row">
    <label for="noPass" class="col-2 col-form-label">Number of passwords</label> 
    <div class="col-2">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"></div>
        </div> 
        <input id="noPass" name="noPass" type="text" required="required" class="form-control"> 
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
        <input id="noChar" name="noChar" type="text" required="required" class="form-control"> 
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
          <input name="pasStr_0" id="pasStr_0" type="checkbox" checked="checked" class="custom-control-input" value="lowLetters"> 
          <label for="pasStr_0" class="custom-control-label">Lower case letters</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="pasStr_1" id="pasStr_1" type="checkbox" checked="checked" class="custom-control-input" value="upLetters"> 
          <label for="pasStr_1" class="custom-control-label">Upper case letters</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="pasStr_2" id="pasStr_2" type="checkbox" checked="checked" class="custom-control-input" value="digits"> 
          <label for="pasStr_2" class="custom-control-label">Digits</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="pasStr_3" id="pasStr_3" type="checkbox" checked="checked" class="custom-control-input" value="spCharactera"> 
          <label for="pasStr_3" class="custom-control-label">Special characters</label>
        </div>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-2 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-2 col-8">
   
<a href="https://github.com/pawlo78/Calendar" class="btn btn-primary active center" target="_blank" role="button" aria-pressed="true">Go to github</a>
 
    </div>
  </div>
</form>



