		<div>
            <select class="form-control col-1" style="position: fixed; margin: 15px; float: right !important; z-index: 9999; width: 70px" id="lang" name="lang">
                <option value="fr" @if(session('lang')=='fr') selected @endif>FR</option>
                <option value="en" @if(session('lang')=='en') selected @endif>EN</option>
            </select>
            <br>
        </div>