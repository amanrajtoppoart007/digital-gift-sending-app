<select class="form-control" name="state_id" id="state_id">
                                                <option value="" disabled selected>Select State *</option>
                                                @foreach($states as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
