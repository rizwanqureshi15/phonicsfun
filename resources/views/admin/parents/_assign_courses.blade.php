<div class="form-group row">
    <label class="col-md-2 col-form-label" for="gender">Courses</label>
    <div class="col-md-6">
       
         <select class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id">
            @foreach($courses as $course)
             <option value="{{ $course->id }}"
            @if(isset($batch) && $batch->id == $course->id )
                selected="selected" 
            @endif
             >{{ $course->name }}</option>
            @endforeach
           
        </select>

        @error('course_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="gender">Teacher</label>
    <div class="col-md-6">
       
         <select class="form-control @error('teacher_id') is-invalid @enderror" id="teacher_id" name="teacher_id">
            @foreach($teachers as $teacher)
             <option value="{{ $teacher->id }}"
            @if(isset($batch) && $batch->id == $teacher->id )
                selected="selected" 
            @endif
             >{{ $teacher->name }}</option>
            @endforeach
           
        </select>

        @error('teacher_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label" for="gender">Students</label>
    <div class="col-md-6">
       
         <select class="form-control @error('student_ids') is-invalid @enderror" id="student_id" name="student_ids[]" multiple="multiple">
            @foreach($students as $student)
             <option value="{{ $student->id }}"
           
             >{{ $student->name }}</option>
            @endforeach
           
        </select>

        @error('student_ids')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Name</label>
    <div class="col-md-6">
        <input class="form-control  @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Enter Name" value="{{ (isset($batch))? $batch->name : old('name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Amount</label>
    <div class="col-md-6">
        <input class="form-control  @error('amount') is-invalid @enderror" id="amount" type="text" name="amount" placeholder="Enter Amount" value="{{ (isset($batch))? $batch->amount : old('amount') }}">
        @error('amount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Tutor Rate</label>
    <div class="col-md-6">
        <input class="form-control  @error('tutor_rate') is-invalid @enderror" id="tutor_rate" type="text" name="tutor_rate" placeholder="Enter Tutor Rate" value="{{ (isset($batch))? $batch->tutor_rate : old('tutor_rate') }}">
        @error('tutor_rate')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="start_date">Start Date</label>
    <div class="col-md-6">
        <input class="form-control  @error('start_date') is-invalid @enderror" id="start_date" type="text" name="start_date" placeholder="Enter Start Date" value="{{ (isset($batch))? $batch->start_date : old('start_date') }}">
        @error('start_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="start_time">Start Time</label>
    <div class="col-md-6">
        <input class="form-control  @error('start_time') is-invalid @enderror" id="start_time" type="text" name="start_time" placeholder="Enter Start Time" value="{{ (isset($batch))? $batch->start_time : old('start_time') }}">
        @error('start_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">End Time</label>
    <div class="col-md-6">
        <input class="form-control  @error('end_time') is-invalid @enderror" id="end_time" type="text" name="end_time" placeholder="Enter End Time" value="{{ (isset($batch))? $batch->end_time : old('end_time') }}">
        @error('end_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Days</label>
    <div class="col-md-6">
        <div class="form-check">
		  <input class="form-check-input" type="checkbox" value="1" id="monday" name="monday">
		  <label class="form-check-label" for="monday">
		    Monday
		  </label>
		</div>

		<div class="form-check">
		  <input class="form-check-input" type="checkbox" value="1" id="tuesday" name="tuesday">
		  <label class="form-check-label" for="tuesday">
		    Tuesday
		  </label>
		</div>


		<div class="form-check">
		  <input class="form-check-input" type="checkbox" value="1" id="wednesday" name="wednesday">
		  <label class="form-check-label" for="wednesday">
		    Wednesday
		  </label>
		</div>


		<div class="form-check">
		  <input class="form-check-input" type="checkbox" value="1" id="thursday" name="thursday">
		  <label class="form-check-label" for="thursday">
		    Thursday
		  </label>
		</div>


		<div class="form-check">
		  <input class="form-check-input" type="checkbox" value="1" id="friday" name="friday">
		  <label class="form-check-label" for="friday">
		    Friday
		  </label>
		</div>

		<div class="form-check">
		  <input class="form-check-input" type="checkbox" value="1" id="saturday" name="saturday">
		  <label class="form-check-label" for="saturday">
		    Saturday
		  </label>
		</div>

		<div class="form-check">
		  <input class="form-check-input" type="checkbox" value="1" id="sunday" name="sunday">
		  <label class="form-check-label" for="sunday">
		    Sunday
		  </label>
		</div>
        @error('end_time')
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