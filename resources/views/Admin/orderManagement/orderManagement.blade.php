@extends('Admin.master')
@section('content')
    <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <div class="sucs" style=" display: flex;  ">
                <h4 class="font-weight-bold py-3 mb-0">Quản lí đơn hàng</h4>
            </div>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="http://127.0.0.1:8000/dashboard">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Quản lí đơn hàng</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header with-elements pb-0">
                            <h6 class="card-header-title mb-0">Thông tin tất cả đơn hàng</h6>
                            <div class="card-header-elements ml-auto p-0">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link show active" data-toggle="tab" href="#sale-stats">Thông tin đơn
                                            hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link show" data-toggle="tab" href="#latest-sales">Thông tin người
                                            mua</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-tabs-top">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="sale-stats">
                                    <div id="tab-table-1" class="ps ps--active-y">
                                        <table class="table table-hover card-table">
                                            <thead>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Tên khóa học</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Ngày mua</th>
                                                    <th>Trạng thái</th>
                                                    <th style=" text-align: center; ">Xuất hóa đơn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoiceBills as $invoiceBill)
                                                    <tr>
                                                        <td>
                                                            <div class="media mb-0">
                                                                <div class="media-body align-self-center">
                                                                    <h6 class="mb-0">
                                                                        {{ $invoiceBill->maHoaDon }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style=" display: table-cell; vertical-align: middle; ">
                                                            <div class="media-body align-self-center">
                                                                <h6 class="mb-0">
                                                                    {{ $invoiceBill->tenKhoaHoc }}
                                                                </h6>
                                                            </div>

                                                        </td>
                                                        <td style=" display: table-cell; vertical-align: middle; ">
                                                            <div class="media-body align-self-center">
                                                                <h6 class="mb-0">1</h6>
                                                            </div>
                                                        </td>
                                                        <td style=" display: table-cell; vertical-align: middle; ">
                                                            <div class="media-body align-self-center">
                                                                <h6 class="mb-0">
                                                                    {{ number_format(floatval($invoiceBill->giaCa), 0, ',', '.') }}
                                                                    VNĐ
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td style=" display: table-cell; vertical-align: middle; ">
                                                            <div class="media-body align-self-center">
                                                                <h6 class="mb-0">
                                                                    {{ $invoiceBill->ngayMua }}
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($invoiceBill->trangThai == 0)
                                                                <span
                                                                    style=" font-size: 10px; background-color: #12d560 !important; "
                                                                    class="badge badge-pill badge-success">Đã kích hoạt
                                                                </span>
                                                            @else
                                                                <span
                                                                    style=" font-size: 10px; background-color: #78786f !important; "
                                                                    class="badge badge-pill badge-success">Chưa kích hoạt
                                                                </span>
                                                            @endif
                                                        </td>

                                                        <td style=" text-align: center; ">
                                                            @if ($invoiceBill->trangThai == 0)
                                                                <a href="#"
                                                                    style="pointer-events: none;color :#78786f">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                        height="21" fill="currentColor"
                                                                        class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                                                    </svg>
                                                                </a>
                                                            @else
                                                                <a
                                                                    href="{{ route('exportPDF', ['id' => $invoiceBill->id]) }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                        height="21" fill="currentColor"
                                                                        class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                                                    </svg>
                                                                </a>
                                                            @endif
                                                            /
                                                            <a href="#">
                                                                <button type="button"
                                                                    class="btn icon-btn btn-sm btn-outline-danger">
                                                                    <span class="feather icon-trash-2"></span>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="latest-sales">
                                    <div id="tab-table-2" class="ps">
                                        <table class="table table-hover card-table">
                                            <thead>
                                                <tr>
                                                    <th>Họ tên</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Địa chỉ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoiceBills as $invoiceBill)
                                                    <tr>
                                                        <td class="align-middle">{{ $invoiceBill->hoTen }}</td>
                                                        <td class="align-middle">{{ $invoiceBill->soDienThoai }}</td>
                                                        <td class="align-middle">{{ $invoiceBill->soDienThoai }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ content ] End -->
    </div>
@endsection
