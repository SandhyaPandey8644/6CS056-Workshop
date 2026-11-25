<form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" method="POST">
    @csrf

    @if(isset($course))
        @method('PUT')
    @endif

    @include('components.form-input', [
        'name' => 'name',
        'label' => 'Course Name',
        'value' => $course->name ?? '',
        'required' => true
    ])

    @include('components.form-textarea', [
        'name' => 'description',
        'label' => 'Description',
        'value' => $course->description ?? ''
    ])

    @include('components.form-input', [
        'name' => 'duration',
        'label' => 'Duration',
        'value' => $course->duration ?? '',
        'required' => true
    ])

    <label>Fee:</label>
    <input type="number" name="fee" step="0.01" min="0"
        value="{{ old('fee', $course->fee ?? '') }}" required>
    @error('fee')
        <p>{{ $message }}</p>
    @enderror
    <br><br>

    <label>Difficulty:</label>
    <select name="difficulty" required>
        <option value="Easy" {{ old('difficulty', $course->difficulty ?? '') == 'Easy' ? 'selected' : '' }}>Easy</option>
        <option value="Medium" {{ old('difficulty', $course->difficulty ?? '') == 'Medium' ? 'selected' : '' }}>Medium</option>
        <option value="Hard" {{ old('difficulty', $course->difficulty ?? '') == 'Hard' ? 'selected' : '' }}>Hard</option>
    </select>
    @error('difficulty')
        <p>{{ $message }}</p>
    @enderror
    <br><br>

    <label>Status:</label>
    <select name="is_active" required>
        <option value="1" {{ (string) old('is_active', isset($course) ? (int) $course->is_active : '1') === '1' ? 'selected' : '' }}>Active</option>
        <option value="0" {{ (string) old('is_active', isset($course) ? (int) $course->is_active : '1') === '0' ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('is_active')
        <p>{{ $message }}</p>
    @enderror
    <br><br>

    <button type="submit">
        {{ isset($course) ? 'Update Course' : 'Save Course' }}
    </button>
</form>

<br>
<a href="{{ route('courses.index') }}">Back to Course List</a>
