<x-app-layout>
    <x-slot name="header">All Barbers</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barbers as $barber)
                                <tr>
                                    <td>{{ $barber->id }}</td>
                                    <td>{{ $barber->first_name }}</td>
                                    <td>{{ $barber->last_name }}</td>
                                    <td>{{ $barber->email }}</td>
                                    <td>
                                        <a href="{{ route('barbers.show', $barber->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('barbers.edit', $barber->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form style="display:inline-block" action="{{ route('barbers.destroy', $barber->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>