<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies Mangement') }}
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
                    <a class="btn btn-info" href="{{ route('companies.create') }}">Add Company</a>

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Revenue</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->revenue }}</td>
                                <td><a href="{{ $company->website }}">Website URL</a></td>
                                <td><img width="100px" height="100px" src="{{ asset($company->logo) }}"></td>
                                <td>
                                    <form action="{{ route('companies.destroy',$company->id) }}" method="POST">

                                        <a class="btn btn-info"
                                           href="{{ route('companies.show',$company->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Are you sure delete Company?')"  style="background-color: #dc3545;" type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
