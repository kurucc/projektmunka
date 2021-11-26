@include('header')

<div class="container my-2">
    <h2 class="text-center admin-control">Profil szerkesztése</h2>
</div>
<form method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col">
                <h4>Profil adatok</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="required">Keresztnév</label> <br>
                <input
                    type="text"
                    class="form-control-sm"
                    name="firstname"
                    placeholder="Keresztnév"
                    required
                    value="{{explode(' ', Auth::guard('buyer')->user()->name)[1]}}"
                />
            </div>
            <div class="col-sm-6">
                <label class="required">Vezetéknév</label> <br>
                <input
                    type="text"
                    name="lastname"
                    class="form-control-sm"
                    placeholder="Vezetéknév"
                    required
                    value="{{explode(' ', Auth::guard('buyer')->user()->name)[0]}}"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="required">Felhasználónév</label> <br>
                <input
                    type="text"
                    name="felhasználónév"
                    class="form-control-sm"
                    disabled
                    placeholder="Felhasználónév"
                    required
                    value="{{Auth::guard('buyer')->user()->username}}"
                />
            </div>
            <div class="col-sm-6">
                <label class="required">Születési idő</label> <br>
                <input
                    type="date"
                    name="születésnap"
                    class="form-control-sm"
                    required
                    value="{{Auth::guard('buyer')->user()->birthday}}"
                />
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <label>Telefonszám</label> <br>
                <input
                    type="text"
                    name="telefonszám"
                    class="form-control-sm"
                    placeholder="Telefonszám"
                    value="{{Auth::guard('buyer')->user()->tel}}"
                />
            </div>
            <div class="col-sm-6">
                <label class="required">E-mail cím</label> <br>
                <input
                    type="email"
                    class="form-control-sm"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    name="email"
                    required
                    placeholder="E-mail"
                    value="{{Auth::guard('buyer')->user()->email}}"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Új jelszó beállítása</label> <br>
                <input
                    type="password"
                    class="form-control-sm"
                    name="newPassword"
                    placeholder="Jelszó"
                /> <br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <label>
                    <h5>Szállítási adatok</h5>
                </label>
            </div>
            <div class="col-sm-6">
                <label class="required">Irányítószám</label> <br>
                <input type="text" class="form-control-sm" name="delivery_zip" required placeholder="Irányítószám"
                       value="{{Auth::guard('buyer')->user()->delivery_zip}}"/>
            </div>
            <div class="col-sm-6">
                <label class="required">Település</label> <br>
                <input type="text" class="form-control-sm" name="delivery_city" required placeholder="Település"
                       value="{{Auth::guard('buyer')->user()->delivery_city}}"/>
            </div>

            <div class="col-sm-12">
                <label class="required">Cím</label> <br>
                <input type="text" class="form-control-sm" name="delivery_address" required placeholder="Cím"
                       value="{{Auth::guard('buyer')->user()->delivery_address}}"/>
            </div>
        </div>
        <br>

        <!--If a person this one shows up-->
        <div class="col-12">
            <label><h5>Számlázási adatok</h5></label>
        </div>
        <div class="row maganszemely">
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="isequal"
                    name="equalcheck"
                    onclick="setEqual()"
                    {{empty(Auth::guard('buyer')->user()->invoice_name) && empty(Auth::guard('buyer')->user()->invoice_company) && empty(Auth::guard('buyer')->user()->invoice_tax) ? 'checked' : ''}}
                />
                <label class="form-check-label" for="flexCheckChecked">
                    Megegyeznek a szállítási adataimmal
                </label>
            </div>
        </div>
        <div class="row maganszemely" id="maganszem">
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="individual"
                    name="individualcheck"
                    onclick="isIndividual()"
                    {{Auth::guard('buyer')->user()->invoice_company == null && !empty(Auth::guard('buyer')->user()->invoice_name) && !empty(Auth::guard('buyer')->user()->invoice_company) && !empty(Auth::guard('buyer')->user()->invoice_tax)? 'checked' : ''}}
                />
                <label class="form-check-label" for="flexCheckChecked">
                    Magánszemély vagyok
                </label>
            </div>
        </div>
        <div class="row maganszemely person" id="person">
            <div class="col-sm-6">
                <label class="required">Keresztnév</label> <br>
                <input
                    type="text"
                    class="form-control-sm personreq"
                    name="firstnamereq"
                    id="firstnamereq"
                    placeholder="Keresztnév"
                    value="{{Auth::guard('buyer')->user()->invoice_name != null ? explode(' ', Auth::guard('buyer')->user()->invoice_name)[1] : ''}}"
                />
            </div>
            <div class="col-sm-6">
                <label class="required">Vezetéknév</label> <br>
                <input
                    type="text"
                    name="lastnamereq"
                    class="form-control-sm personreq"
                    id="latnamereq"
                    placeholder="Vezetéknév"
                    value="{{Auth::guard('buyer')->user()->invoice_name != null ? explode(' ', Auth::guard('buyer')->user()->invoice_name)[0] : ''}}"
                />
            </div>

        </div>
        <!--If a company this one shows up-->
        <div class="row company" id="company" style="display:none">
            <div class="col-sm-6">
                <label class="required">Cég név</label> <br>
                <input
                    type="text"
                    class="form-control-sm companyreq"
                    name="companyname"
                    id="companyreq"
                    placeholder="Cég név"
                    value="{{Auth::guard('buyer')->user()->invoice_company}}"
                />
            </div>
            <div class="col-sm-6">
                <label class="required">Adószám</label> <br>
                <input
                    type="text"
                    name="taxnumber"
                    class="form-control-sm companyreq"
                    id="taxreq"
                    placeholder="Adószám"
                    value="{{Auth::guard('buyer')->user()->invoice_tax}}"
                />
            </div>
        </div>

        <div class="row" id="invo">
            <div class="col-sm-6">
                <label class="required">Irányítószám</label> <br>
                <input type="text" class="form-control-sm" name="invoice_zip" id="invoice_zip" required placeholder="Irányítószám"
                       value="{{Auth::guard('buyer')->user()->invoice_zip}}"/>
            </div>
            <div class="col-sm-6">
                <label class="required">Település</label> <br>
                <input type="text" class="form-control-sm" name="invoice_city" id="invoice_city" required placeholder="Település"
                       value="{{Auth::guard('buyer')->user()->invoice_city}}"/>
            </div>
            <div class="col-sm-12 pb-5">
                <label class="required">Cím</label> <br>
                <input type="text" class="form-control-sm" name="invoice_address" id="invoice_address" required placeholder="Cím"
                       value="{{Auth::guard('buyer')->user()->invoice_address}}"/>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <button type="submit" class="btn btn-dark admin">Mentés</button>
        </div>
    </div>
</form>
@include('footer')

<script>
    function setEqual() {
        if (!document.getElementById('isequal').checked) {
            document.getElementById('maganszem').removeAttribute('hidden');
            document.getElementById('person').removeAttribute('hidden');
            document.getElementById('company').removeAttribute('hidden');
            document.getElementById('invo').removeAttribute('hidden');

            document.getElementById('firstnamereq').setAttribute('required', 'true');
            document.getElementById('latnamereq').setAttribute('required', 'true');

            document.getElementById('invoice_city').setAttribute('required', 'true');
            document.getElementById('invoice_zip').setAttribute('required', 'true');
            document.getElementById('invoice_address').setAttribute('required', 'true');

            document.getElementById('person').style.display = "";
            document.getElementById('company').style.display = "none";
            document.getElementById('individual').checked = true;

        } else {
            document.getElementById('maganszem').setAttribute('hidden', 'true');
            document.getElementById('person').setAttribute('hidden', 'true');
            document.getElementById('company').setAttribute('hidden', 'true');
            document.getElementById('invo').setAttribute('hidden', 'true');

            document.getElementById('invoice_city').removeAttribute('required');
            document.getElementById('invoice_zip').removeAttribute('required');
            document.getElementById('invoice_address').removeAttribute('required');

            document.getElementById('companyreq').removeAttribute('required');
            document.getElementById('taxreq').removeAttribute('required');
            document.getElementById('firstnamereq').removeAttribute('required');
            document.getElementById('latnamereq').removeAttribute('required');
        }
    }

    function isIndividual() {
        var company = document.getElementsByClassName('companyreq');
        var person = document.getElementsByClassName('personreq');

        if(document.getElementById('individual').checked === true)
        {
            document.getElementById('person').style.display = "";
            document.getElementById('company').style.display = "none";
            for (let i = 0; i < company.length; i++) {
                company[i].removeAttribute('required');

            }
            for (let i = 0; i < person.length; i++) {
                person[i].setAttribute('required', 'true');

            }
        }
        else
        {
            document.getElementById('person').style.display = "none";
            document.getElementById('company').style.display = "";
            for (let i = 0; i < company.length; i++) {
                company[i].setAttribute('required', 'true');

            }
            for (let i = 0; i < person.length; i++) {
                person[i].removeAttribute('required');

            }
        }
    }
</script>

@if(empty(Auth::guard('buyer')->user()->invoice_name) && empty(Auth::guard('buyer')->user()->invoice_company) && empty(Auth::guard('buyer')->user()->invoice_tax))
    <script>
        document.getElementById('maganszem').setAttribute('hidden', 'true');
        document.getElementById('person').setAttribute('hidden', 'true');
        document.getElementById('company').setAttribute('hidden', 'true');
        document.getElementById('invo').setAttribute('hidden', 'true');
    </script>
@elseif(!empty(Auth::guard('buyer')->user()->invoice_name) && empty(Auth::guard('buyer')->user()->invoice_company) && empty(Auth::guard('buyer')->user()->invoice_tax))
    <script>
        document.getElementById('individual').setAttribute('checked', 'true');
    </script>
@elseif(empty(Auth::guard('buyer')->user()->invoice_name) && !empty(Auth::guard('buyer')->user()->invoice_company) && !empty(Auth::guard('buyer')->user()->invoice_tax))
    <script>
        document.getElementById('person').style.display = "none";
        document.getElementById('company').style.display = "";
    </script>
@endif
