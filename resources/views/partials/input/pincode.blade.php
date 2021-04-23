<input type="text" name="pin_code" id="pin_code" class="form-control"
                                                   value=""
                                                   placeholder="Enter your pincode" minlength="6" maxlength="6"
                                                   pattern="[0-9]+"
                                                   onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"
                                                   required>
