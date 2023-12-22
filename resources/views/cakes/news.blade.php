@extends('layouts.app')
@section('title', 'Về chúng tôi')
@section('content')
<style>
    body {
        background: linear-gradient(180deg, #fff, rgb(247, 247, 245));
    }
    .align-items {
        text-align: center;
        display: flex;
    }
</style>

<body>
    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
            </div>
        </div>
    </section>
    <div class="container-fluid mt-3">
  
    
        <div class="row">
          <div class="col-sm-4 p-3 text-black">
              <img src="{{ URL::to('./image/minhphucpic/bridge.jpg') }}" alt="" width="400px"> <br>
              <b class="align-items">Maccadonuts Việt Nam thánh thành cầu 25m tại Cà Mau</b>
              <table>
                  <tr>
                      <td><i class="fa-solid fa-calendar-days"></i>
                      <p>22/12/2023</p></td>
                      <td>
                          <i class="fa-regular fa-heart"></i>
                          <p></p>
                      </td>
                  </tr>
              </table>
              <hr>
              <p id="tet">Những ngày trước Tết Tân Sửu, bà con tại xã Nguyễn Phích vui mừng khi có cây cầu mới phục vụ việc đi lại thuận tiện hơn...</p>
              <button style="width: 400px; border-radius: 5px;" type="button" onclick="document.getElementById('tet').innerHTML = 'Những ngày trước Tết Tân Sửu, bà con tại xã Nguyễn Phích vui mừng khi có cây cầu mới phục vụ việc đi lại thuận tiện hơn. Công trình do Maccadonuts Việt Nam tài trợ xây dựng với với chiều dài 25 m, rộng 2 m, nối hai bờ sông Cái Tàu, kết nối giữa các ấp ngoài rìa với xã. Đại diện Maccadonuts hy vọng công trình sẽ góp phần vào sự phát triển của xã cũng như huyện U Minh và đem lại niềm vui ngày Tết cho bà con. Đây là một trong chuỗi hoạt động Act of Colonel- ness, nhằm mục đích mang lại các giá trị tinh thần của Colonel Sanders(người sáng lập Maccadonuts) để góp phần xây dựng sự phát triển cộng đồng trong tương lai tốt đẹp hơn. Xã Nguyễn Phích là một trong những xã nghèo nhất của tỉnh Cà Mau. Xã mất hơn 7 năm cố gắng để vươn lên đạt mô hình Nông thôn mới. Tuy nhiên, để làm được điều này, địa phương phải vượt qua những khó khăn trước mắt để có thể phát triển kinh tế tại vùng.'">Xem thêm</button>
          </div>
          <div class="col-sm-4 p-3 text-black">
              <img src="{{ URL::to('./image/minhphucpic/hutech.jpg') }}" alt="" width="400px" height="297px"> <br>
              <b>Maccadonuts Việt Nam trao tặng học bổng cho sinh viên Hutech</b>
              <table>
                  <tr>
                      <td><i class="fa-solid fa-calendar-days"></i>
                      <p>22/12/2023</p></td>
                      <td>
                          <i class="fa-regular fa-heart"></i>
                          <p></p>
                      </td>
                  </tr>
              </table>
              <hr>
              <p id="hb">Maccadonuts Việt Nam vừa trao tặng học bổng cho 5 sinh viên trường đại học Hutech trong chương trình "Viết tiếp ước mơ - Colonel-ness"...</p>
              <button style="width: 400px; border-radius: 5px;" type="button" onclick="document.getElementById('hb').innerHTML = 'Maccadonuts Việt Nam vừa trao tặng học bổng cho 5 sinh viên trường đại học Hutech trong chương trình Viết tiếp ước mơ - Colonel-ness.Chương trình trao học bổng Viết tiếp ước mơ - Colonel-ness do Maccadonuts Việt Nam tổ chức, diễn ra từ ngày 1/12 đến 15/12 thu hút sự tham gia của nhiều sinh viên trường Đại học Hutech.Maccadonuts Việt nam phối hợp cùng trường Hutech đã chọn 10 bài viết ấn tượng nhất bước vào vòng phỏng vấn chung cuộc để trình bày về giấc mơ và những khó khăn mà bản thân mỗi người gặp phải trong quá trình đi đến ước mơ. Hội đồng giám khảo đã chọn được 5 sinh viên xuất sắc để trao tặng học bổng.5 sinh viên trường Hutech nhận học bổng Colonel-ness của Maccadonuts Việt Nam. Học bổng The Boldhead (trị giá 20 triệu đồng) thuộc về Nguyễn Mỹ Trân, sinh viên năm 2 khoa Ngôn ngữ Trung với ước mơ xây dựng nông trại hữu cơ tại quê nhà Cà Mau. Để làm được điều này, Mỹ Trân đang nỗ lực trau dồi thêm các kiến thức về kỹ thuật sinh học ngoài ngành học chính, với mục tiêu được tiếp cận kiến thức giáo dục từ nhiều nơi đang dẫn đầu khu vực về lĩnh vực này như Đài Loan (Trung Quốc), Trung Quốc. Học bổng The Risktaker (10 triệu đồng) trao cho Nguyễn Lê Duy, sinh viên năm 3 khoa Quản trị Kinh doanh với ước mơ chế biến và kinh doanh nhựa cây khoai môn để chữa bỏng; Phạm Xuân Khánh, sinh viên năm 1 khoa Thiết kế nội thất với ước mơ trở thành người truyền tải, định hướng giáo dục về nghệ thuật cho các bạn trẻ, xây dựng một bảo tàng về nghệ thuật và con người. Học bổng The Challenger (5 triệu đồng) thuộc về Liêu Từ Luân, sinh viên năm cuối khoa Quản trị Kinh doanh với ước mơ trở thành người doanh nhân thành đạt, đã bắt đầu start-up về vật liệu xây dựng; Lê Thảo Quỳnh, sinh viên năm cuối khoa Quản trị khách sạn với ước mơ trở thành giảng viên truyền lửa đam mê nghề cho các bạn sau này và lập ra học bổng hỗ trợ cho sinh viên nghèo kiến thể tiếp tục con đường học vấn của mình.'">Xem thêm</button>
      
          </div>
          <div class="col-sm-4 p-3 text-black">
              <img src="{{ URL::to('./image/minhphucpic/kfc-running.jpg') }}" alt="" width="452px">
              <b>Maccadonuts Việt Nam đồng hành cùng Fun Run 2022</b>
              <div class="row">
                  <div class="col-sm-6">
                      <i class="fa-regular fa-calendar-days"></i>
                      <p>22/12/2023</p>
                  </div>
                  <div class="col-sm-6">
                      <i class="fa-regular fa-heart"></i>
                      <p></p>
                  </div>
              </div>
              <p> </p>
              <hr>
              <p id="chaybo">Sáng ngày 13 tháng 11 năm 2022 vừa qua, công ty Maccadonuts Việt Nam tự hào tham gia vào sự kiện chạy bộ Fun Run...</p>
              <button style="width: 400px; border-radius: 5px;" type="button" onclick="document.getElementById('chaybo').innerHTML = 'Sáng ngày 13 tháng 11 năm 2022 vừa qua, công ty Maccadonuts Việt Nam tự hào tham gia vào sự kiện chạy bộ Fun Run gây quỹ từ thiện của BritCham (Hiệp Hội  Doanh Nghiệp Anh Quốc tại Việt Nam). Đây là năm thứ 9 Maccadonuts đã đồng hành cùng sự kiện Fun Run của BritCham với tư cách là một trong những nhà tài trợ cho chương trình này.'">Xem thêm</button>
          </div>
        </div>
      </div>
</body>
    
@endsection