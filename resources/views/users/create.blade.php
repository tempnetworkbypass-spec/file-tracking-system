<select name="department_id" required>
    <option value="">Select Department</option>

    @foreach($departments as $department)
    <option value="{{ $department->id }}">
        {{ $department->name }}
    </option>
    @endforeach
</select>