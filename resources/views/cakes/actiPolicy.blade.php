@extends('layouts.app')
@section('title', 'Chính sách hoạt động')
@section('content')
    <style>
        body {
            background: linear-gradient(180deg, #fff, rgb(247, 247, 245));
        }
    </style>

    <body>
        <div class="container">
            <h1 style="text-align: center;margin-top: 150px;"><b>CHÍNH SÁCH HOẠT ĐỘNG</b></h1>
            <h3 style="margin-top: 50px;"><i><b>1. Hướng dẫn đặt phần ăn</b></i></h3>
            <p>Để đặt phần bánh trên website <a href="" style="color: black;"><b>maccadonuts.com.vn/ứng dụng điện
                        thoại</b></a>, Khách hàng có thể thực hiện theo 02 cách thức như sau:</p>
            <p><u>Cách 1: Đặt phần ăn trực tuyến theo các bước trên website <b>maccadonuts.com.vn/ứng dụng điện thoại</b>
                    theo các bước sau đây:</u></p>
            <ol>
                <li>Khách hàng chọn phần ăn dự định đặt hàng được hiển thị chi tiết tại chuyên mục <b>"Combo nhóm"</b>, hoặc
                    <b>"Menu ưu đãi"</b>, hoặc <b>"Món lẻ"</b>.</li>
                <li>Các phần ăn dự định đặt hàng sẽ được ghi nhận tại <b>"Giỏ Hàng Của Bạn"</b>, trong đó liệt kê chi tiết
                    về phần ăn, giá từng phần ăn và tổng giá của đơn hàng. Khách hàng có thể thay đổi phần ăn (thêm, bớt
                    phần ăn) tại giai đoạn này.</li>
                <li>Khi đã hoàn tất đơn hàng, Khách hàng chọn <b>"Tiến hành thanh toán"</b>.</li>
                <li>Tại mục <b>"Địa Chỉ Giao Hàng"</b>, Khách hàng liệt kê các thông tin cần thiết bao gồm: họ và tên, địa
                    chỉ, tỉnh/thành phố, số điện thoại, email tại mục <b>"Giao Hàng Tới"</b>. Khách hàng chọn nút <b>"Tiếp
                        tục"</b> để đến bước <b>"Chọn hình thức thanh toán"</b>.</li>
                <li>Tại bước <b>"Kiểm Tra Lại và Thanh Toán"</b> Quý Khách có thể chọn 1 trong các hình thức thanh toán sau:
                </li>
            </ol>
            <ul>
                <li>Thanh toán bằng ví điện tử: ZaloPay</li>
                <li>Thanh toán bằng thẻ ATM nội địa (Internet banking)</li>
                <li>Thanh toán thẻ tín dụng/ghi nợ</li>
                <li>Thanh toán khi nhận hàng</li>
            </ul>
            <p>Sau đó chọn nút <b>"Tiếp tục"</b> để hoàn tất việc đặt hàng trên hệ thống.</p>
            </li>
            </ol>
            <p>Hệ thống sẽ gửi email về đơn hàng của Khách Hàng trong vòng 05-10 phút kể từ khi khách hàng <b>"Hoàn Tất Đơn
                    Hàng"</b> trên website/ứng dụng điện thoại.</p>
            <p><u>Cách 2: Gọi điện thoại đến tổng đài 19006886:</u></p>
            <ol>
                <li>
                    <p>Khách hàng liên hệ gọi đến tổng đài để được các tổng đài viên hỗ trợ.</p>
                </li>
                <li>
                    <p>Khách hàng gọi tên phần ăn được cung cấp trên website, tờ rơi hoặc các catalogue giới thiệu phần ăn
                        của Maccadonuts để nhân viên tổng đài tiếp nhận, tiếp đó Khách hàng sẽ được tổng đài viên yêu cầu
                        cung cấp các thông tin giao hàng bao gồm: Họ và tên, địa chỉ, tỉnh/thành phố, số điện thoại, email,
                        các yêu cầu giao hàng khác (nếu có).</p>
                </li>
                <li>
                    <p>Nhân viên của Maccadonuts tiếp nhận đơn hàng, xác nhận đơn đặt hàng và giao hàng trong vòng 30 phút
                        trở lên kể từ thời điểm tiếp nhận đơn hàng.</p>
                </li>
            </ol>
            <p><strong>Lưu ý:</strong> Khi đặt hàng trên website maccadonuts.com.vn, Khách hàng hiểu và chấp nhận các điều
                kiện/lưu ý sau:</p>
            <ul>
                <li>Maccadonuts chỉ tiếp nhận đơn hàng trực tuyến từ 10:00 sáng đến 22:00 tối.</li>
                <li>Maccadonuts chỉ tiếp nhận đơn hàng có tổng giá tối thiểu 80.000 đồng.</li>
            </ul>
            <h3><i><b>2. Chính sách thanh toán khi đặt hàng trên website maccadonuts.com.vn/ứng dụng điện thoại</b></i></h3>
            <ul>
                <li>Thanh toán bằng ví điện tử: ZaloPay</li>
                <li>Thanh toán bằng thẻ ATM nội địa (Internet banking): áp dụng cho thẻ ATM có đăng ký dịch vụ internet
                    banking</li>
                <li>Thanh toán thẻ tín dụng/ghi nợ: chỉ áp dụng cho 3 loại thẻ Visa, Mastercard, JCB</li>
                <li>Thanh toán trực tiếp tại nơi giao hàng: sau khi đặt hàng, nhân viên giao hàng của Maccadonuts sẽ thông
                    báo cho Khách Hàng về việc giao hàng. Khách Hàng vui lòng thanh toán bằng tiền mặt hoặc phiếu quà tặng
                    (nếu có) tại nơi giao hàng, người giao hàng sẽ cung cấp hóa đơn bán hàng hợp lệ sau khi Khách Hàng kiểm
                    tra đơn hàng.</li>
            </ul>
            <h3><i><b>3. Xác nhận đơn hàng khi đặt hàng trực tuyến trên website maccadonuts.com.vn/ứng dụng điện
                        thoại</b></i></h3>
            <p>Sau khi hoàn thành việc đặt hàng trực tuyến trên website maccadonuts.com.vn/ứng dụng điện thoại, hệ thống sẽ
                tự động gửi email xác nhận vào hòm thư của khách hàng.</p>
            <p>Trong hầu hết trường hợp, khách hàng sẽ nhận được email cùng với thông tin đặt hàng trong vòng 10 phút kể từ
                lúc khách hàng thực hiện việc đặt hàng. Nếu Khách Hàng không nhận được sau thời gian này, hãy kiểm tra thư
                rác hoặc các bộ lọc thư rác.</p>

            <h3><i><b>4. Chính sách giao hàng – nhận hàng</b></i></h3>
            <p>Sau khi tiếp nhận đơn hàng, nhân viên giao hàng Maccadonuts sẽ giao hàng đến địa chỉ do Khách Hàng cung cấp
                trong vòng 30 phút trở lên. Tại thời điểm giao hàng, Khách Hàng kiểm tra phần ăn theo đơn hàng ghi trên hóa
                đơn và số tiền cần thanh toán. Khách Hàng vui lòng thanh toán bằng tiền mặt hoặc phiếu quà tặng (nếu có).
                Việc giao hàng kết thúc khi khách hàng xác nhận đủ phần ăn.</p>

            <p><em>Các lưu ý:</em></p>
            <ul>
                <li>Thời gian giao hàng có thể nhanh hơn hoặc lâu hơn với dự kiến vì lý do thời tiết, đơn hàng tại cửa hàng
                    hiện quá tải, địa chỉ do Khách Hàng cung cấp quá xa với cửa hàng hoặc địa chỉ của Khách Hàng bị nhầm lẫn
                    với các địa chỉ khác. Lúc này, Maccadonuts sẽ thông báo cụ thể đến Khách Hàng ngay khi phát sinh sự kiện
                    gây chậm trễ việc giao hàng.</li>
                <li>Trường hợp Khách Hàng thay đổi địa chỉ hoặc yêu cầu điều chỉnh đơn hàng chỉ được thực hiện trong vòng 3
                    phút từ khi xác nhận phần ăn và địa chỉ giao hàng.</li>
                <li>Việc điều chỉnh đơn hàng nhằm thay đổi phần ăn sẽ không được chấp nhận nếu khách hàng thông báo điều
                    chỉnh sau 3 phút kể từ khi đơn hàng đã được Maccadonuts tiếp nhận.</li>
            </ul>
            <h3><i><b>5. Chính sách đổi, trả hàng</b></i></h3>
            <p><u>a) Chính sách đổi hàng:</u></p>
            <p>Sau khi yêu cầu đơn hàng, Khách Hàng có thể liên hệ tổng đài để yêu cầu nhân viên tổng đài của Maccadonuts
                điều chỉnh đơn hàng trong vòng 3 phút kể từ khi đơn hàng đã được xác nhận. Mọi trường hợp điều chỉnh đơn
                hàng quá thời gian nêu trên đều không được chấp nhận.</p>
            <p>Trường hợp đơn hàng sau khi điều chỉnh có tổng giá trị thấp hơn 80.000 đồng, Maccadonuts sẽ từ chối việc điều
                chỉnh này.</p>
            <p>Trường hợp Khách Hàng phát hiện phần ăn bị nhầm lẫn do lỗi của Maccadonuts, Maccadonuts sẽ tiến hành ngay
                việc đổi hàng đúng theo đơn hàng đã tiếp nhận.</p>
            <p>Trường hợp Khách Hàng phát hiện phần ăn bị hư, hỏng, không đạt chất lượng...Maccadonuts sẽ tiến hành ngay
                việc kiểm tra và đổi hàng cho Khách Hàng trong vòng 30 phút kể từ khi nhận được phản ánh từ Khách Hàng.</p>

            <p><u>b) Chính sách trả hàng:</u></p>
            <p>Trong trường hợp phần ăn phát hiện có sự hư, hỏng, ôi, thiu... Khách Hàng vui lòng thông báo ngay cho
                Maccadonuts qua số điện thoại 19006886 để phản ánh, Maccadonuts sẽ cử nhân viên đến kiểm tra trực tiếp tại
                địa chỉ của Khách Hàng và thực hiện việc đổi hàng. Nếu Khách Hàng không đồng ý với việc đổi hàng,
                Maccadonuts sẽ hoàn tiền cho Khách Hàng tương ứng với giá trị phần ăn bị hư, hỏng.</p>
        </div>
    </body>

@endsection
