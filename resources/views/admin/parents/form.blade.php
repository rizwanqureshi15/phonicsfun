@csrf
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Name</label>
    <div class="col-md-6">
        <input class="form-control  @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Enter Name" value="{{ (isset($parent))? $parent->name : old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


@if(isset($parents))
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="email">Email</label>
    <div class="col-md-6">
        <input class="form-control  @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Enter Email" value="{{ (isset($parent))? $parent->email : old('email') }}" disabled="true">
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
        <input class="form-control  @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Enter Email" value="{{ (isset($parent))? $parent->email : old('email') }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endif


@if(!isset($parent))
<div class="form-group row">
     <label class="col-md-2 col-form-label" for="phone">Password</label>
    <div class="col col-md-6">
        
        <input class="form-control  @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Enter password" value="{{ (isset($parent))? $parent->password : old('password') }}">
         @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endif

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Phone</label>
    <div class="col-md-6">
        <input class="form-control  @error('phone') is-invalid @enderror" id="phone" type="text" name="phone" placeholder="Enter Phone" value="{{ (isset($parent))? $parent->phone : old('phone') }}">
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="address">Address</label>
    <div class="col-md-6">
        <textarea class="form-control  @error('address') is-invalid @enderror" id="address" name="address" rows="5">{{ (isset($parent))? $parent->address : old('address') }}</textarea>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="gender">Gender</label>
    <div class="col-md-6">
       
         <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
            @foreach($genders as $key => $name)
             <option value="{{ $key }}"
            @if(isset($parent) && $parent->gender == $key )
                selected="selected" 
            @endif
             >{{ $name }}</option>
            @endforeach
           
        </select>

        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label" for="duration">Image</label>
    <div class="col-md-6">
        <input class="form-control  @error('image') is-invalid @enderror" id="image" type="file" name="image" placeholder="Enter image" value="{{ (isset($parent))? $parent->image : old('image') }}">
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label" for="duration"></label>
    <div class="col-md-6">
         @if(isset($parent) && $parent->image)
            <a href="{{ Storage::url('parents/'. $parent->image) }}" target="_blank"><img class="img-thumbnail" src="{{ Storage::url('parents/'. $parent->image) }}" width="150px;" height="150px;"></a>
        @endif
    </div>
</div>



<div class="form-group row">
    <div class="col-md-6 offset-md-2">
        <button class="btn btn-primary float-right" type="submit"> Submit</button>
    </div>
</div>
