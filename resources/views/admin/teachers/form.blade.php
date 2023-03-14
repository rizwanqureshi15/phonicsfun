@csrf
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Name</label>
    <div class="col-md-6">
        <input class="form-control  @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Enter Name" value="{{ (isset($teacher))? $teacher->name : old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


@if(isset($teachers))
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="email">Email</label>
    <div class="col-md-6">
        <input class="form-control  @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Enter Email" value="{{ (isset($teacher))? $teacher->email : old('email') }}" disabled="true">
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
        <input class="form-control  @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Enter Email" value="{{ (isset($teacher))? $teacher->email : old('email') }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endif


@if(!isset($teacher))
<div class="form-group row">
     <label class="col-md-2 col-form-label" for="phone">Password</label>
    <div class="col col-md-6">
        
        <input class="form-control  @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Enter password" value="{{ (isset($teacher))? $teacher->password : old('password') }}">
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
        <input class="form-control  @error('phone') is-invalid @enderror" id="phone" type="text" name="phone" placeholder="Enter Phone" value="{{ (isset($teacher))? $teacher->phone : old('phone') }}">
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
        <textarea class="form-control  @error('address') is-invalid @enderror" id="address" name="address" rows="5">{{ (isset($teacher))? $teacher->address : old('address') }}</textarea>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label" for="qualification">Qualification</label>
    <div class="col-md-6">
        <textarea class="form-control  @error('qualification') is-invalid @enderror" id="qualification" name="qualification" rows="5">{{ (isset($teacher))? $teacher->qualification : old('qualification') }}</textarea>
        @error('qualification')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Date Of Birth</label>
    <div class="col-md-6">
        <input class="form-control  @error('date_of_birth') is-invalid @enderror" id="date_of_birth" type="text" name="date_of_birth" placeholder="Enter Date Of Birth" value="{{ (isset($teacher))? $teacher->date_of_birth : old('date_of_birth') }}">
        @error('date_of_birth')
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
            @if(isset($teacher) && $teacher->gender == $key )
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
    <label class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-6">
        <select class="form-control @error('is_active') parsley-error @enderror" name="is_active">
            @foreach(['1' => 'Active', '0' => 'Inactive'] as $key => $name)
             <option value="{{ $key }}"
            @if(isset($teacher) && $teacher->is_active == $key )
                selected="selected" 
            @endif
             >{{ $name }}</option>
            @endforeach
        </select>
        @error('is_active')
            <ul class="parsley-errors-list filled" id="">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="duration">Image</label>
    <div class="col-md-6">
        <input class="form-control  @error('image') is-invalid @enderror" id="image" type="file" name="image" placeholder="Enter image" value="{{ (isset($teacher))? $teacher->image : old('image') }}">
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
         @if(isset($teacher) && $teacher->image)
            <a href="{{ Storage::url('teachers/'. $teacher->image) }}" target="_blank"><img class="img-thumbnail" src="{{ Storage::url('teachers/'. $teacher->image) }}" width="150px;" height="150px;"></a>
        @endif
    </div>
</div>



<div class="form-group row">
    <div class="col-md-6 offset-md-2">
        <button class="btn btn-primary float-right" type="submit"> Submit</button>
    </div>
</div>
