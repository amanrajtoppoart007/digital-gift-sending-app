<input type="text" name="mobile" id="mobile" class="form-control" value=""
       pattern="[1-9]{1}[0-9]{9}" minlength="10" maxlength="10"
       onkeypress=" if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"
       placeholder="Enter your mobile number" required>
