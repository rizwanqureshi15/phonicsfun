@csrf
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Name</label>
    <div class="col-md-6">
        <input class="form-control  @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Enter Name" value="{{ (isset($user))? $user->name : old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


@if(isset($users))
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="email">Email</label>
    <div class="col-md-6">
        <input class="form-control  @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Enter Email" value="{{ (isset($user))? $user->email : old('email') }}" disabled="true">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@else
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="email">Email</label>
    <div class="col-md-6">
        <input class="form-control  @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Enter Email" value="{{ (isset($user))? $user->email : old('email') }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endif


@if(!isset($user))
<div class="form-group row">
     <label class="col-md-2 col-form-label" for="phone">Password</label>
    <div class="col col-md-6">
        
        <input class="form-control  @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Enter password" value="{{ (isset($user))? $user->password : old('password') }}">
         @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endif

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="local_currency">Local Currency</label>
    <div class="col-md-6">
       
         <select class="form-control @error('local_currency') is-invalid @enderror" id="local_currency" name="local_currency">
            @foreach($currency as $key => $name)
             <option value="{{ $key }}"
            @if(isset($user) && $user->local_currency == $key )
                selected="selected" 
            @endif
             >{{ $name }}</option>
            @endforeach
           
        </select>

        @error('local_currency')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="form-group row">
    <div class="col-md-6 offset-md-2">
        <button class="btn btn-primary float-right" type="submit"> Submit</button>
    </div>
</div>
