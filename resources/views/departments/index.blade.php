<x-app-layout>
    <div class="container mx-auto p-6">

        <h1 class="text-2xl font-bold mb-4">
            Departments
        </h1>

        <table class="table-auto border w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->code }}</td>
                    <td>
                        {{ $department->is_active ? 'Active' : 'Inactive' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>