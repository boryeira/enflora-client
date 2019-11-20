@auth

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
<div class="row justify-content-center">
  <div class="col-sm-6" >
    <div class="alert alert-warning">
      <h5>Cambia tu contraseña</h5>
            <form action="{{route('auth.password')}}" class="row">
                @csrf
                <div class="form-group col-4">
                  <label>Contraseña</label>
                  <input class="form-control" name="password" type="password">
                </div>
                <div class="form-group col-4">
                    <label>Repetir</label>
                  <input class="form-control" name="password_confirmation" type="password" >
                </div>  
                <div class="form-group col-3 " >
                  <button class="btn btn-success mt-4" type="submit" >Actualizar</button>
                </div>         
            </form>

    </div>
  </div>
</div>
@endif



@endAuth