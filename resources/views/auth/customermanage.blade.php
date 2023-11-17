@extends('layouts.app')
@section('title', 'Customer Management - Macadonuts')
@section('content')
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>

    <h1 style="margin: 20px 0 20px 5px" class="text-capitalize">Customer Management</h1>
    @unless ($users->isEmpty())
        <table class="table table-striped table-hover" style="margin-bottom: 167px">
            <thead>
                <tr class="table-warning">
                    <th scope="col">User's ID</th>
                    <th scope="col">User's Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->user_id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="d-flex flex-row justify-content-center gap-4 link-danger mt-1">
                                <form method="POST" action="/delete_user/{{ $user->user_id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#exampleModal" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 style="margin: 20px 0 20px 5px" class="text-capitalize">No Users Found</h3>
    @endunless
    <section class="option-bar text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            
            </div>
        </div>
    </section>
@endsection
