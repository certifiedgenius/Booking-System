<!-- resources/views/customers/index.blade.php -->

<!-- CSS file Script -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-app-layout>
    
    <x-slot:header>
        All Customers
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Customers
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>
                                            <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-primary btn-sm">
                                                View
                                            </a>
                                            
                                            <a href="{{ route('customers.show', $customer->id) }}">
                                                Show
                                            </a>
                                            
                                            <a href="{{ route('customers.update', $customer->id) }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>
                                            
                                            <form style="display:inline-block" action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                
                                <!--  Delete Successfully Message -->
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>