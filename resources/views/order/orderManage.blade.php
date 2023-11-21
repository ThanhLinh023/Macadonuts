@extends('layouts.app')
@section('title', 'Quản lý đơn hàng')
@section('content')
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>

    <h1 style="margin: 20px 0 20px 5px" class="text-capitalize">Order Management</h1>
    @unless ($query->isEmpty()) 
        <table class="table table-striped table-hover" style="margin-bottom: 167px">
            <thead>
                <tr class="table-warning">
                    <th scope="col">User's ID</th>
                    <th scope="col">User's Name</th>
                    <th scope="col">Số lượng hoá đơn</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query as $q)
                    <tr>
                        <th scope="row">{{ $q->user_id }}</th>
                        <td>{{ $q->name }}</td>
                        <td>{{ $q->sld }}</td>
                        <td>
                            <div class="d-flex flex-row justify-content-center gap-4 link-danger mt-1">
                                <form method="POST" action="">
                                    <a href="/orderdetail/user/{{ $q->user_id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-info-circle" viewBox="0 0 16 16" style="color: black;">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </a>
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
