<form action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST">
    @csrf

    @if(isset($student))
        @method('PUT')
    @endif

    @include('components.form-input', [
        'name' => 'name',
        'label' => 'Name',
        'value' => $student->name ?? '',
        'required' => true
    ])

    @include('components.form-input', [
        'name' => 'email',
        'label' => 'Email',
        'type' => 'email',
        'value' => $student->email ?? '',
        'required' => true
    ])

    @include('components.form-input', [
        'name' => 'phone',
        'label' => 'Phone',
        'value' => $student->phone ?? '',
        'required' => true
    ])

    @include('components.form-textarea', [
        'name' => 'address',
        'label' => 'Address',
        'value' => $student->address ?? ''
    ])

    @include('components.form-input', [
        'name' => 'date_of_birth',
        'label' => 'Date of Birth',
        'type' => 'date',
        'value' => isset($student) && $student->date_of_birth
            ? $student->date_of_birth->format('Y-m-d')
            : ''
    ])

    <button type="submit">
        {{ isset($student) ? 'Update Student' : 'Save Student' }}
    </button>
</form>

<br>
<a href="{{ route('students.index') }}">Back to Student List</a>
