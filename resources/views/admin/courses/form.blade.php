@csrf
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Name</label>
    <div class="col-md-6">
        <input class="form-control  @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Enter Name" value="{{ (isset($course))? $course->name : old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="description">Description</label>
    <div class="col-md-6">
        <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ (isset($course))? $course->description : old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label" for="category_id">Categories</label>
    <div class="col-md-6">
       
         <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
            @foreach($categories as $key => $name)
             <option value="{{ $key }}"
            @if(isset($course) && $course->category_id == $key )
                selected="selected" 
            @endif
             >{{ $name }}</option>
            @endforeach
           
        </select>

        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="age_group">Age Group</label>
    <div class="col-md-6">
        <input class="form-control  @error('age_group') is-invalid @enderror" id="age_group" type="text" name="age_group" placeholder="Enter Age Group (3 - 3.6 years)" value="{{ (isset($course))? $course->age_group : old('age_group') }}">
        @error('age_group')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="classes_per_week">Classes Per Week</label>
    <div class="col-md-6">
        <input class="form-control  @error('classes_per_week') is-invalid @enderror" id="classes_per_week" type="text" name="classes_per_week" placeholder="Enter Age Classes Per Week" value="{{ (isset($course))? $course->classes_per_week : old('classes_per_week') }}">
        @error('classes_per_week')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="total_classes">Total Classes</label>
    <div class="col-md-6">
        <input class="form-control  @error('total_classes') is-invalid @enderror" id="total_classes" type="text" name="total_classes" placeholder="Enter Total Classes" value="{{ (isset($course))? $course->total_classes : old('total_classes') }}">
        @error('total_classes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Sheets </label>
    <div class="col-sm-6">
        <select class="form-control @error('sheets') parsley-error @enderror" name="sheets">
            @foreach(['1' => 'Yes', '0' => 'No'] as $key => $name)
             <option value="{{ $key }}"
            @if(isset($course) && $course->sheets == $key )
                selected="selected" 
            @endif
             >{{ $name }}</option>
            @endforeach
        </select>
        @error('sheets')
            <ul class="parsley-errors-list filled" id="">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
</div>



<div class="form-group row">
    <label class="col-sm-2 col-form-label">Reading Material </label>
    <div class="col-sm-6">
        <select class="form-control @error('reading_material') parsley-error @enderror" name="reading_material">
            @foreach(['1' => 'Yes', '0' => 'No'] as $key => $name)
             <option value="{{ $key }}"
            @if(isset($course) && $course->reading_material == $key )
                selected="selected" 
            @endif
             >{{ $name }}</option>
            @endforeach
        </select>
        @error('reading_material')
            <ul class="parsley-errors-list filled" id="">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Sight Words And It's Uses</label>
    <div class="col-sm-6">
        <select class="form-control @error('sight_words') parsley-error @enderror" name="sight_words">
            @foreach(['yes' => 'Yes', 'no' => 'No'] as $key => $name)
             <option value="{{ $key }}"
            @if(isset($course) && $course->sight_words == $key )
                selected="selected" 
            @endif
             >{{ $name }}</option>
            @endforeach
        </select>
        @error('sight_words')
            <ul class="parsley-errors-list filled" id="">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Comprehensive Practice</label>
    <div class="col-sm-6">
        <select class="form-control @error('comprehensive_practice') parsley-error @enderror" name="comprehensive_practice">
            @foreach(['yes' => 'Yes', 'no' => 'No'] as $key => $name)
             <option value="{{ $key }}"
            @if(isset($course) && $course->comprehensive_practice == $key )
                selected="selected" 
            @endif
             >{{ $name }}</option>
            @endforeach
        </select>
        @error('comprehensive_practice')
            <ul class="parsley-errors-list filled" id="">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Writing Activity </label>
    <div class="col-sm-6">
        <select class="form-control @error('writing_activity') parsley-error @enderror" name="writing_activity">
            @foreach(['yes' => 'Yes', 'no' => 'No'] as $key => $name)
             <option value="{{ $key }}"
            @if(isset($course) && $course->writing_activity == $key )
                selected="selected" 
            @endif
             >{{ $name }}</option>
            @endforeach
        </select>
        @error('writing_activity')
            <ul class="parsley-errors-list filled" id="">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label" for="cost_per_class">Cost Per Class</label>
    <div class="col-md-6">
        <input class="form-control  @error('cost_per_class') is-invalid @enderror" id="cost_per_class" type="text" name="cost_per_class" placeholder="Enter Cost Per Class (250 for 4:1, 416 for 1:1)" value="{{ (isset($course))? $course->cost_per_class : old('cost_per_class') }}">
        @error('cost_per_class')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label" for="duration">Duration</label>
    <div class="col-md-6">
        <input class="form-control  @error('duration') is-invalid @enderror" id="duration" type="text" name="duration" placeholder="Enter Duration (40 Mins for 4:1, 30 Mins for 1:1)" value="{{ (isset($course))? $course->duration : old('duration') }}">
        @error('duration')
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
            @if(isset($course) && $course->is_active == $key )
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
        <input class="form-control  @error('image') is-invalid @enderror" id="image" type="file" name="image" placeholder="Enter image" value="{{ (isset($course))? $course->image : old('image') }}">
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
         @if(isset($course) && $course->image)
            <a href="{{ Storage::url('courses/'. $course->image) }}" target="_blank"><img class="img-thumbnail" src="{{ Storage::url('courses/'. $course->image) }}" width="150px;" height="150px;"></a>
        @endif
    </div>
</div>



<div class="form-group row">
    <div class="col-md-6 offset-md-2">
        <button class="btn btn-primary float-right" type="submit"> Submit</button>
    </div>
</div>