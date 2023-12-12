@extends('layouts.app')
@section('title', 'Thống kê doanh thu')
@section('content')
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>
    <div class="container mt-5 mb-5">
        <h1 style="margin: 20px 0 20px 5px" class="text-uppercase fw-bold mb-5">Báo cáo doanh thu</h1>
        <form method="POST" action="/getRevenue">
            @csrf
            <div class="row g-3 mb-3">
                <div class="col-auto">
                    <label class="visually-hidden" for="month">Preference</label>
                    <select class="form-select" id="autoSizingSelect" name="month">
                        <option selected>Tháng...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label class="visually-hidden" for="year">Preference</label>
                    <select class="form-select" id="autoSizingSelect" name="year">
                        <option selected>Năm...</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Xem</button>
                </div>
            </div>
        </form>

        {{-- BẢNG --}}
        @if (isset($total))
            <table class="table" style="width: 30%;">
                <tr>
                    <th>Số lượng bán</th>
                    <td style="text-align: center;">{{ $mar + $don }}</td>
                </tr>
                <tr>
                    <th>Macaron bán được</th>
                    <td style="text-align: center;">{{ $mar }}</td>
                </tr>
                <tr>
                    <th>Donut bán được</th>
                    <td style="text-align: center;">{{ $don }}</td>
                </tr>
                <tr>
                    <th>Tổng thu</th>
                    <td style="text-align: center;">{{ $total }}</td>
                </tr>
            </table>
        @endif
    </div>
    <section class="option-bar text-warning pt-5 mt-5 mb-5 pb-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>
@endsection