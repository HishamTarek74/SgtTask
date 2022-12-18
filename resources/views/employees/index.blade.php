<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees Mangement') }}
        </h2>
    </x-slot>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong class="text-center">{{ $message }}</strong>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="btn btn-info" href="{{ route('employees.create') }}">Add New Employee</a>

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Occupation</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>{{ $employee->occupation }}</td>
                                <td>
                                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                                        <a class="btn btn-info"
                                           href="{{ route('employees.show',$employee->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Are you sure delete employee c?')"
                                                style="background-color: #dc3545;" type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
