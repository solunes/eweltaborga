<div class="col-md-12">
  <div class="team_all">
    <div class="row member_each">
        <div class="col-md-4 team-img team-member">
          <img src="assets/img/member.jpg" alt="">
          <div class="team-intro light-txt">
            <h5>{{ $item->name }}</h5>
            <span>socio fundador</span>
          </div>
          <div class="team-hover">
            <div class="desk">
              {{ $item->name }}
            </div>
            <div class="s-link">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-google-plus"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-8 member_content">
          <p>{!! $item->content !!}</p>
        </div>
    </div>
  </div>
</div>

<!--<div class="col-md-6">
  <div class="team-member">
    <div class="team-img">
      <img src="assets/images/team/t-1.jpg" alt="">
      <div class="team-intro light-txt">
        <h5>{{ $item->name }}</h5>
        <span>socio fundador</span>
      </div>
    </div>
    <div class="team-hover">
      <div class="desk">
        {!! $item->content !!}
      </div>
      <div class="s-link">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
      </div>
    </div>
  </div>
</div>-->