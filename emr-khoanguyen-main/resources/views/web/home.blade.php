@extends('web.layouts.master')

@section('home')
    <!-- section common-feature -->
  <section class="common-feature BgScrollEffect">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 container__card card--1">
          <a href="#" class="icon-card">
          </a>
          <div class="content">
            <h4>Chuyên gia hàng đầu</h4>
            <div class="text">
              <p>DentalCare quy tụ đội ngũ chuyên gia, bác sĩ, dược sĩ và điều dưỡng được đào tạo bài bản đến chuyên sâu tại Việt nam và nhiều nước có nên y học phát triển như Mỹ, Anh, Pháp... Luôn lấy người bệnh là trung tâm, DentalCare cam kết mang lại dịch vụ chăm sóc sức khỏe toàn diện và chất lượng cao cho khách hàng.</p>
            </div>
          </div>
          <a class="content--btn" href="#">
            <span>ĐỌC THÊM</span>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 container__card card--2">
          <a href="#" class="icon-card"></a>
          <div class="content">
            <h4>Kiểm tra nhanh</h4>
            <div class="text">
              <p>Quy trình kiểm tra theo chuẩn Châu Âu với các công nghệ cao, đưa ra kết quả nhanh chóng và chính xác.</p>
            </div>
          </div>
          <a class="content--btn" href="#">
            <span>ĐỌC THÊM</span>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 container__card card--3">
          <a href="#" class="icon-card"></a>
          <div class="content">
            <h4>Điều trị không đau đớn</h4>
            <div class="text">
              <p>Với đội ngũ giàu kinh nghiệm trong chuyên khoa răng, bạn sẽ có một trải nghiệm hoàn hảo nhất.</p>
            </div>
          </div>
          <a class="content--btn" href="#">
            <span>ĐỌC THÊM</span>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 container__card card--4">
          <a href="#" class="icon-card"></a>
          <div class="content">
            <h4>Đặt lịch ngay</h4>
            <div class="text">
              <p>Đặt lịch khám ngay để nhận được tư vấn từ đội ngũ chuyên nghiệp. Và được tư vấn các dịch vụ hợp lý.</p>
            </div>
          </div>
          <a class="content--btn" href="#">
            <span>ĐỌC THÊM</span>
          </a>
        </div>
      </div>
      <!-- out standing -->
      <div style="margin-top:7rem;" class="row outstanding">
        <div class="col-md-6 col-lg-7 ElementScrollEffect left">
          <div class="content">
            <div class="content__header">
              <div class="content__header--subtitle">
                Bác sĩ Jenna Wilson
              </div>
              <span class="d-block dash"></span>
              <div class="content__header--title">
                ĐỘI NGŨ TÂM HUYẾT
              </div>
            </div>
            <div class="content__script mt-4">
              <p>DentalCare quy tụ đội ngũ chuyên gia, bác sĩ, dược sĩ và điều dưỡng được đào tạo bài bản đến chuyên sâu tại Việt nam và nhiều nước có nên y học phát triển như Mỹ, Anh, Pháp... Luôn lấy người bệnh là trung tâm, DentalCare cam kết mang lại dịch vụ chăm sóc sức khỏe toàn diện và chất lượng cao cho khách hàng.</p>
            </div>
            <div class="content__footer">
              <img src="/web-dentalcare/images/signature.png" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 ElementScrollEffect right">
          <img src="/web-dentalcare/images/Jenna_Dr.png" alt="">
        </div>
      </div>
    </div>
  </section>

  <!--Section doctor team -->
  <section class="dr-team SequentialAppear">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 dr-card FadeInItem dr-card--1">
          <div class="container-img">
            <a href="#">
              <div class="search-info">
                <span class="iconify" data-icon="carbon:search"></span>
              </div>
              <img src="/web-dentalcare/images/dr-audrey.jpg" alt="">
            </a>
          </div>
          <div class="content">
            <a href="#" class="icon-card icon-card--1"></a>
            <a href="#" class="icon-card icon-card--2"></a>
            <h5>Bác sĩ phẫu thuật</h5>
            <h3>Audrey Button</h3>
            <p>ThS. BS Audrey Button có hơn 15 kinh nghiệm trong lĩnh vực Răng - Hàm - Mặt với các thế mạnh trong các phẫu thuật về nhổ răng khôn áp dụng kỹ thuật cao Piezotome để nhổ răng khôn khó, cấy ghép Implant, chỉnh nha mắc cài - chỉnh nha bằng khay trong suốt, thiết kế lại nụ cười đường cười và profile cho bệnh nhân, răng thẩm mỹ, xử trí các trường hợp viêm nha chu... Hiện tại, BS đang làm việc tại Đơn nguyên Răng - Hàm - Mặt khoa Liên chuyên khoa Phòng khám DentalCare.</p>
          </div>
          <div class="dr-card--contact">
            <a href="#">
              <span class="iconify" data-icon="gg:facebook"></span>
            </a>
            <a href="#">
              <span class="iconify" data-icon="ei:sc-twitter"></span>
            </a>
            <a href="#">
              <span class="iconify" data-icon="la:google-plus-g"></span>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 dr-card FadeInItem dr-card--2">
          <div class="container-img">
            <a href="#">
              <div class="search-info">
                <span class="iconify" data-icon="carbon:search"></span>
              </div>
              <img src="/web-dentalcare/images/dr-emma.jpg" alt="">
            </a>
          </div>
          <div class="content">
            <a href="#" class="icon-card icon-card--1"></a>
            <a href="#" class="icon-card icon-card--2"></a>
            <h5>Bác sĩ phẫu thuật</h5>
            <h3>Emma Beckett</h3>
            <p>ThS. BS Emma Beckett đã có nhiều năm kinh nghiệm trong lĩnh vực Răng - Hàm - Mặt, đặc biệt có chuyên môn sâu về khám, điều trị, tư vấn các vấn đề bệnh lý răng miệng, phẫu thuật hàm mặt, chỉnh hình phục hình răng hàm mặt,... ở người lớn và trẻ em. Hiện tại, ThS. BS Emma Beckett đang giữ chức vụ là bác sĩ Răng - Hàm - Mặt tại Liên chuyên khoa - DentalCare.</p>
          </div>
          <div class="dr-card--contact">
            <a href="#">
              <span class="iconify" data-icon="gg:facebook"></span>
            </a>
            <a href="#">
              <span class="iconify" data-icon="ei:sc-twitter"></span>
            </a>
            <a href="#">
              <span class="iconify" data-icon="la:google-plus-g"></span>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 dr-card FadeInItem dr-card--3">
          <div class="container-img">
            <a href="#">
              <div class="search-info">
                <span class="iconify" data-icon="carbon:search"></span>
              </div>
              <img src="/web-dentalcare/images/dr-hellen.jpg" alt="">
            </a>
          </div>
          <div class="content">
            <a href="#" class="icon-card">
            </a>
            <h5>Nha sĩ</h5>
            <h3>Hellen Hill</h3>
            <p>Bác sĩ Hellen Hill đã có hơn 7 năm kinh nghiệm trong lĩnh vực Răng hàm mặt, đặc biệt có chuyên môn sâu về làm thủ thuật nhổ răng khôn, chữa tuỷ, lấy cao răng, hàn răng nhẹ nhàng, ít sang chấn, giúp người bệnh giảm cảm giác đau tối đa; thiết kế và làm răng sứ đẹp. Hiện tại, BS Hellen Hill đang giữ chức vụ là bác sĩ Răng - Hàm - Mặt làm việc Part-time tại Liên chuyên khoa - Phòng khám DentalCare.</p>
          </div>
          <div class="dr-card--contact">
            <a href="#">
              <span class="iconify" data-icon="gg:facebook"></span>
            </a>
            <a href="#">
              <span class="iconify" data-icon="ei:sc-twitter"></span>
            </a>
            <a href="#">
              <span class="iconify" data-icon="la:google-plus-g"></span>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 dr-card FadeInItem dr-card--4">
          <div class="container-img">
            <a href="#">
              <div class="search-info">
                <span class="iconify" data-icon="carbon:search"></span>
              </div>
              <img src="/web-dentalcare/images/dr-arianna.jpg" alt="">
            </a>
          </div>
          <div class="content">
            <a href="#" class="icon-card">
            </a>
            <h5>Nha sĩ</h5>
            <h3>Jennifer Green</h3>
            <p>BSCK II Jennifer Green đã có hơn 30 năm kinh nghiệm trong lĩnh vực Răng - Hàm - Mặt, đặc biệt có chuyên môn sâu về khám, điều trị, tư vấn các vấn đề bệnh lý răng miệng, phẫu thuật hàm mặt, chỉnh hình phục hình răng hàm mặt. Hiện tại, BSCK II Jennifer Green đang giữ chức vụ là Bác sĩ Răng - Hàm - Mặt tại Ngoại tổng hợp - Phòng khám DentalCare</p>
          </div>
          <div class="dr-card--contact">
            <a href="#">
              <span class="iconify" data-icon="gg:facebook"></span>
            </a>
            <a href="#">
              <span class="iconify" data-icon="ei:sc-twitter"></span>
            </a>
            <a href="#">
              <span class="iconify" data-icon="la:google-plus-g"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Section testimonials-->
  <section class="testimonial">
    <div class="container">
      <div class="container__heading ElementScrollEffect right">
        <h5 class="container__heading--sub">
          THAM KHẢO TỐT NHẤT
        </h5>
        <span class="dash"></span>
        <h2>
          <em>KHÁCH HÀNG</em>
          <b>ĐÁNH GIÁ</b>
        </h2>
      </div>
      <div class="row SequentialAppear">
        <div class="col-md-12 col-lg-6 testimonial__content FadeInItem testimonial__content--1">
          <div style="height: 100%;" class="row align-items-center pt-3 pb-3">
            <div class="col-md-12 col-lg-4 testimonial__content--info">
              <img class="client-img" src="/web-dentalcare/images/client-1.jpg" alt="">
              <h4>PAUL LEE</h4>
              <span class="sign-img"><img src="/web-dentalcare/images/sign-1.png" alt=""></span>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="testimonial__content--text">
                <blockquote>
                  <i class="fas fa-quote-left"></i>
                  <p>Bác sĩ Philippe hiểu rất rõ những gì tôi cần và cách để khắc phục tình trạng này. Quá trình điều trị rất cẩn thận. Hiện tại, thì mọi triệu chứng đã biến mất. Tôi vất vui vì điều này. Về vấn đề bảo hiểm, do tôi có thẻ bảo lãnh trực tiếp, nên không cần phải trả tiền mặt, chỉ cần ký giấy tờ rất đơn giản và nhanh chóng.</p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-6 testimonial__content FadeInItem testimonial__content--2">
          <div style="height: 100%;" class="row align-items-center pt-3 pb-3">
            <div class="col-md-12 col-lg-4 testimonial__content--info">
              <img class="client-img" src="/web-dentalcare/images/client-2.jpg" alt="">
              <h4>ANN CLARK</h4>
              <span class="sign-img"><img src="/web-dentalcare/images/sign-2.png" alt=""></span>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="testimonial__content--text">
                <blockquote>
                  <i class="fas fa-quote-left"></i>
                  <p>Tôi đánh giá cao dịch vụ tại DentalCare vì nhân viên và các bác sĩ rất tốt, rất chuyên nghiệp. Tôi hoàn toàn tin hưởng họ. Và gần như không cảm thấy sợ hãi mỗi khi đến đây. Cảm thấy luôn tự tin khi đến DentalCare vì tôi biết các bác sĩ sẽ không làm mình đau, họ luôn điều trị răng nhẹ nhàng, thậm chí còn mang đến sự thoải mái, vui vẻ.</p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row SequentialAppear">
        <div class="col-md-12 col-lg-6 testimonial__content FadeInItem testimonial__content--3">
          <div style="height: 100%;" class="row align-items-center pt-3 pb-3">
            <div class="col-md-12 col-lg-4 testimonial__content--info">
              <img class="client-img" src="/web-dentalcare/images/client-3.jpg" alt="">
              <h4>PAUL LEE</h4>
              <span class="sign-img"><img src="/web-dentalcare/images/sign-3.png" alt=""></span>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="testimonial__content--text">
                <blockquote>
                  <i class="fas fa-quote-left"></i>
                  <p>Mọi người rất thân thiện, tôi chưa từng gặp rắc rối với bất kỳ ai ở đây. Mọi thứ đều tốt. Và tôi đã tìm ra DentalCare 5 năm trước. Tôi muốn chia sẻ rằng, DentalCare là phòng khám tốt nhất, tôi từng được trải nghiệm trong đời.</p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-6 testimonial__content FadeInItem testimonial__content--4">
          <div style="height: 100%;" class="row align-items-center pt-3 pb-3">
            <div class="col-md-12 col-lg-4 testimonial__content--info">
              <img class="client-img" src="/web-dentalcare/images/client-4.jpg" alt="">
              <h4>ANN CLARK</h4>
              <span class="sign-img"><img src="/web-dentalcare/images/sign-4.png" alt=""></span>
            </div>
            <div class="col-md-12 col-lg-8">
              <div class="testimonial__content--text">
                <blockquote>
                  <i class="fas fa-quote-left"></i>
                  <p>Trải nghiệm tại phòng khám thực sự tuyệt vời. Trước đây khi ở quê hương, tôi không hề mong muốn đến thăm khám bác sĩ. Nhưng hiện tại, tôi cảm thấy trải nghiệm này rất thú vị, từ không gian thư giãn, cách bày trí thoải mái, rất tuyệt mỹ. Có thể nhận xét rằng đây là trải nghiệm tuyệt vời.</p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Section contact us-->
  <section class="contact-us">
    <div class="container content d-flex justify-content-between flex-wrap">
      <div class="heading ElementScrollEffect left">
        <h5>Hợp tác?</h5>
        <h2 class="mb-3">liên hệ với chúng tôi và có một gặp gỡ thân mật</h2>
      </div>
      <div class="d-flex align-items-center ElementScrollEffect right">
        <a href="#">
          <span style="text-transform: uppercase; color: #000000;">liên hệ</span>
        </a>
      </div>
    </div>
  </section>

  <!--Section services-->
  <section class="services">
    <div class="container">
      <div class="container__heading ElementScrollEffect right">
        <h5 class="container__heading--sub">
          dịch vụ tốt nhất
        </h5>
        <span class="dash"></span>
        <h2>
          <em>Dịch vụ</em>
          <b>của chúng tôi</b>
        </h2>
        <p>
          Các dịch vụ được thực hiện dưới sự giám sát của các chuyên gia hàng đầu.
        </p>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3 sv-card FadeInItem sv-card--1">
          <div class="container--card">
            <div class="container-img">
              <a href="#">
                <img src="web-dentalcare/images/sv-teeth.jpg" alt="">
              </a>
            </div>
            <div class="content">
              <a href="#" class="icon-card"></a>
              <h5>Răng</h5>
              <h3>Dịch vụ răng</h3>
              <p>Dịch vụ cạo vôi răng công nghệ Thụy Sĩ. Đầu cạo vôi chất lượng cao hạn chế ma sát, không gây ê buốt như phương pháp truyền thống, kết hợp cùng máy thổi khí Air - Flow đánh bay vết dính, mang đến hơi thở thơm mát
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 sv-card FadeInItem sv-card--2">
          <div class="container--card">
            <div class="container-img">
              <a href="#">
                <img src="web-dentalcare/images/sv-implants.jpg" alt="">
              </a>
            </div>
            <div class="content">
              <a href="#" class="icon-card"></a>
              <h5>Nếu bạn thiếu</h5>
              <h3>Cấy ghép implant</h3>
              <p>Khôi phục răng đã mất với implant - kĩ thuật phục hình răng hiện đại, được thực hiện bởi các bác sĩ có tay nghề cao. Không xâm lấn đến các răng kế cận, đảm bảo chức năng ăn nhai lẫn độ thẩm mỹ cao hệt răng thật</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 sv-card FadeInItem sv-card--3">
          <div class="container--card">
            <div class="container-img">
              <a href="#">
                <img src="web-dentalcare/images/sv-dentistry.jpg" alt="">
              </a>
            </div>
            <div class="content">
              <a href="#" class="icon-card"></a>
              <h5>Thẩm mỹ</h5>
              <h3>nha khoa</h3>
              <p>Các sản phẩm răng sứ được chế tác từ nguyên liệu cao cấp tại labo riêng của DentalCare. Kết hợp cùng công nghệ chế tác hiện đại, mang đến dịch vụ răng sứ đạt độ thẩm mỹ cao và bền bỉ theo năm tháng.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 sv-card FadeInItem sv-card--4">
          <div class="container--card">
            <div class="container-img">
              <a href="#">
                <img src="web-dentalcare/images/sv-bridges.jpg" alt="">
              </a>
            </div>
            <div class="content">
              <a href="#" class="icon-card"></a>
              <h5>biện pháp tốt nhất</h5>
              <h3>cầu răng sứ</h3>
              <p>Mão răng sứ giúp răng phục hồi lại hình dạng, kích thước và khả năng chịu lực. Mão răng sẽ bọc quanh phần cùi răng hoặc trụ implant. Một khi mão răng sứ được gắn cố định chỉ có bác sĩ hoặc chuyên viên nha khoa mới có thể tháo rời.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3 sv-card FadeInItem sv-card--5">
          <div class="container--card">
            <div class="container-img">
              <a href="#">
                <img src="web-dentalcare/images/sv-crowns.jpg" alt="">
              </a>
            </div>
            <div class="content">
              <a href="#" class="icon-card"></a>
              <h5>điều trị không đau</h5>
              <h3>chụp răng</h3>
              <p>Chụp răng sứ là một kỹ thuật nha khoa nhằm cải thiện thẩm mỹ và chức năng ăn nhai của mỗi người. Răng thật được mài với một tỷ lệ nhất định để tạo thành cùi răng, sau đó bác sĩ sẽ bọc mão sứ lên trên.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 sv-card FadeInItem sv-card--6">
          <div class="container--card">
            <div class="container-img">
              <a href="#">
                <img src="web-dentalcare/images/sv-invisalign.jpg" alt="">
              </a>
            </div>
            <div class="content">
              <a href="#" class="icon-card"></a>
              <h5>hàm răng đều</h5>
              <h3>niềng răng</h3>
              <p>Chỉnh Nha - Niềng răng tiêu chuẩn quốc tế với bác sĩ giàu kinh nghiệm, khắc phục tình trạng răng lệch lạc, chen chúc, hô, móm. Giải pháp ưu việt mang đến nụ cười hoàn mỹ giúp tự tin hơn trong cuộc sống và công việc</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 sv-card FadeInItem sv-card--7">
          <div class="container--card">
            <div class="container-img">
              <a href="#">
                <img src="web-dentalcare/images/sv-venneers.jpg" alt="">
              </a>
            </div>
            <div class="content">
              <a href="#" class="icon-card"></a>
              <h5>dán sứ</h5>
              <h3>Dán sứ veneers</h3>
              <p>Các sản phẩm răng sứ được chế tác từ nguyên liệu cao cấp tại labo riêng của DentalCare. Kết hợp cùng công nghệ chế tác hiện đại, mang đến dịch vụ răng sứ đạt độ thẩm mỹ cao và bền bỉ theo năm tháng</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 sv-card FadeInItem sv-card--8">
          <div class="container--card">
            <div class="container-img">
              <a href="#">
                <img src="web-dentalcare/images/sv-whitening.jpg" alt="">
              </a>
            </div>
            <div class="content">
              <a href="#" class="icon-card"></a>
              <h5>nụ cười tỏa sáng</h5>
              <h3>làm trắng răng</h3>
              <p>Áp dụng công nghệ White Smile nhập khẩu từ Đức giúp bật tone răng nhanh chóng. Kĩ thuật làm trắng răng được chứng nhận an toàn, đạt độ thẩm mỹ cao. Không gây tổn hại đến nướu, men răng</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--section map-->
  <section class="map">
    <div class="container-map">
      <div class="containerWorkingHour" style="background-color: #005B88; padding: 48px 40px;">
        <div id="btn-toggle" data-icon=""></div>
        <div class="working-hours-wrap">
          <h3>giờ làm việc</h3>
          <div class="working-hours">
            <div class="row">
              <div class="col-md-5">
                Thứ 2 - Thứ 4
              </div>
              <div class="col-md-7">
                8:00 - 19:00
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                Thứ 5 - Thứ 7
              </div>
              <div class="col-md-7">
                8:00 - 17:00
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                Chủ nhật
              </div>
              <div class="col-md-7">
                Đóng cửa
              </div>
            </div>
          </div>
          <div class="TopSpace"></div>
          <h3>liên hệ chi tiết</h3>
          <div class="contact">
            <div>
              <a target="_blank" href="https://www.google.com/maps/place/Vinmec+International+Hospital/@20.9962152,105.8669144,15z/data=!4m5!3m4!1s0x0:0xef1e1e02b64fcb4c!8m2!3d20.9962152!4d105.8669144">
                <div style="display: table-cell; width: 28px;">
                  <span class="iconify" data-icon="fluent:location-28-regular" data-rotate="180deg" data-flip="vertical"></span>
                </div>
                <span style="display: table-cell;" class="ml-2 text">458 Minh Khai, Hai Bà Trưng, Hà Nội</span>
              </a>
              <a class="d-block mt-2" href="mailto:info@vinmec.com">
                <span class="iconify" data-icon="uiw:mail-o"></span>
                <span class="ml-2 text">info@vinmec.com</span>
              </a>
              <a class="d-block mt-2" href="tel:024 3974 3556">
                <span class="iconify" data-icon="healthicons:phone-outline" data-rotate="270deg" data-flip="vertical"></span>
                <span class="ml-2 text">Gọi ngay</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2521.189562983325!2d105.86532408406353!3d20.996233074417177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac04daecb877%3A0xef1e1e02b64fcb4c!2zQuG7h25oIHZp4buHbiDEkGEga2hvYSBRdeG7kWMgdOG6vyBWaW5tZWMgVGltZXMgQ2l0eQ!5e0!3m2!1svi!2s!4v1635734046594!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </section>
@endsection