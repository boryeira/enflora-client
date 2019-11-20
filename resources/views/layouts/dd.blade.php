
@if ($errors->any())
  <div class="row">
    <div class="col-sm-12" >
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    </div>
  </div>
@endif

{{-- success alerts --}}
@if (Session::has('success'))
  <div class="row">
    <div class="col-sm-12" >
      <div class="alert alert-success">
          <ul>
              <li>{{ Session::get('success') }}</li>
          </ul>
      </div>
    </div>
  </div>
@endif

@if(Auth::user()->email_verified_at == null)
<div class="row">
  <div class="col-sm-12" >
    <div class="alert alert-warning">
      <div class="row">
        <div class="col-6"> <p>Debes actualizar tu contraseña.</p></div>
        <div class="col-6"> 
            <form action="{{route('auth.password')}}">
                @csrf
                <div class="form-group">
                  <label>Contraseña</label>
                  <input class="form-control" name="password" type="password">
                </div>
                <div class="form-group">
                    <label>Repetir Contraseña</label>
                  <input class="form-control" name="password_confirmation" type="password" >
                </div>  
                <div class="form-group">
                  <button class="btn btn-success" type="submit" >Actualizar</button>
                </div>         
              </form>
        </div>
      </div>
           

    </div>
  </div>
</div>
@endif
