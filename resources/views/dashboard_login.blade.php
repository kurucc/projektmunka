@include('header')
<div class="background">
<div class="container d-flex align-items-center py-3">
<h2>Üdv!</h2>
    <a class="logout" href={{ url('logout') }}><button type="submit" class="btn btn-light logout-btn">Kijelentkezés</button></a>
@if(Auth::guard('employee')->check() && Auth::guard('employee')->user()->role == 'admin')
        <a class="logout" href={{ url('dashboard/admin') }}><button type="submit" class="btn btn-light logout-btn">Admin felület</button></a>
@endif
@if(Auth::guard('employee')->check() && Auth::guard('employee')->user()->role == 'munkás')
    <a class="logout" href={{ url('dashboard/worker') }}><button type="submit" class="btn btn-light logout-btn">Munkás felület</button></a>
@endif
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h4>Profil adatok</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
                          <label>Keresztnév</label> <br>
                          <input
                            type="text"
                            class="form-control-sm"
                            name="firstname"
                            disabled
                            placeholder="FIRSTNAME"
                          />
                        </div>
                        <div class="col-sm-6">
                          <label>Vezetéknév</label> <br>
                          <input
                            type="text"
                            name="lastname"
                            class="form-control-sm"
                            disabled
                            placeholder="LASTNAME"
                          />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <label>Felhasználónév</label> <br>
                          <input
                            type="text"
                            name="felhasználónév"
                            class="form-control-sm"
                            disabled
                            placeholder="USERNAME"
                          />
                        </div>
                        <div class="col-sm-6">
                          <label>Születési idő</label> <br>
                          <input
                            type="date"
                            name="születésnap"
                            class="form-control-sm"
                            disabled
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
                            placeholder="PHONENUMBER"
                            disabled
                          />
                        </div>
                        <div class="col-sm-6">
                          <label>Email cím</label> <br>
                          <input
                            type="email"
                            class="form-control-sm"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            name="email"
                            disabled
                            placeholder="EMAIL"
                          />
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-sm-6">
                          <label>Új jelszó beállítása</label> <br>
                          <input
                            type="password"
                            class="form-control-sm"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            name="newPassword"
                            disabled
                            placeholder="password"
                          /> <br>
                          <label>Új jelszó újra</label> <br>
                          <input
                            type="password"
                            class="form-control-sm"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            name="newPasswordAgain"
                            disabled
                            placeholder="password"
                          />
                        </div>
                      </div>
                      <br>
                      <div class="row">
                      <label><h5>Szállítási adatok</h5></label>
                     <div class="col-sm-6">
                          <label>Irányítószám</label> <br>
                          <input type="text" class="form-control-sm" name="delivery_zip" disabled placeholder="ZIP" />
                        </div>
                        <div class="col-sm-6">
                          <label>Település</label> <br>
                          <input type="text" class="form-control-sm" name="delivery_city" disabled placeholder="CITY"/>
                        </div>
                      </div>
                      <div class="row ms-0">
                          <label>Cím</label> <br>
                          <input type="text" class="form-control-sm" name="delivery_zip" disabled placeholder="ADDRESS"/>
                      </div>
                      <br>
                      <div class="row maganszemely">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="individual"
                    checked
                    onclick="isIndividual()"
                  />
                  <label class="form-check-label" for="flexCheckChecked">
                    Magánszemély vagyok
                  </label>
                </div>
              </div>

                      <!--If a person this one shows up-->
                        <div class="row maganszemely person" id="person" style="display:''">
                        <label><h5>Számlázási adatok</h5></label>
                         <div class="col-sm-6">
                          <label>Keresztnév</label> <br>
                          <input
                            type="text"
                            class="form-control-sm personreq"
                            name="firstname"
                            disabled
                            placeholder="FIRSTNAME"
                          />
                        </div>
                        <div class="col-sm-6">
                          <label>Vezetéknév</label> <br>
                          <input
                            type="text"
                            name="lastname"
                            class="form-control-sm personreq"
                            disabled
                            placeholder="LASTNAME"
                          />
                        </div>

                      </div>
                        <!--If a company this one shows up-->
                        <div class="row company" id="company" style="display:none">
                        <label><h5>Számlázási adatok</h5></label>
                         <div class="col-sm-6">
                          <label>Cég név</label> <br>
                          <input
                            type="text"
                            class="form-control-sm companyreq"
                            name="firstname"
                            disabled
                            placeholder="COMPANYNAME"
                          />
                        </div>
                        <div class="col-sm-6">
                          <label>Adószám</label> <br>
                          <input
                            type="text"
                            name="lastname"
                            class="form-control-sm companyreq"
                            disabled
                            placeholder="TAXNUMBER"
                          />
                        </div>
                      </div>

                    <div class="row">
                     <div class="col-sm-6">
                          <label>Irányítószám</label> <br>
                          <input type="text" class="form-control-sm" name="delivery_zip" disabled placeholder="ZIP" />
                        </div>
                        <div class="col-sm-6">
                          <label>Település</label> <br>
                          <input type="text" class="form-control-sm" name="delivery_city" disabled placeholder="CITY"/>
                        </div>
                      </div>
                      <div class="row ms-0 pb-5">
                          <label>Cím</label> <br>
                          <input type="text" class="form-control-sm" name="delivery_zip" disabled placeholder="ADDRESS"/>
                      </div>
</div>
</div>
</div>
@include('footer')
<script src="{{ URL::asset('js/login.js') }}"></script>
@if (Auth::guard('employee')->check() && Auth::guard('employee')->user()->role === 'admin')
    <a href={{ url('dashboard/admin') }}>Admin</a>
@endif
