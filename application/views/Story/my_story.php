<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center page-header">這是屬於<span id="name"><?=$name?></span>的故事</h2>
      <div id="map" style="width: 100%; height:40vh;margin-bottom:20px;"></div>
      <h3>台中火車站</h3>
      <p id="story" class="lead">「喂！你還活著嗎？」被人拍打著臉，我慢慢醒了過來，發現自己被圍在一群身著西服或長袍，氣質儒雅的人之中。「你還好吧？」其中一個人這麼問道，我疑惑地向周圍望了一圈，發現是個奇怪的地方，有神社、綠樹、池塘……難道是公園的…這是亭子中？「這裡…這裡是哪裡？我該怎麼回去？我被樹洞……對了！那隻石虎！你們有沒有看見一隻石虎？拿著紅傘的石虎，大概這麼大。」我慌張地有些語無倫次，手也一邊比劃著，他們看著我皺了一下眉頭，思考似的沉默了一段時間，我心中越來越沒有把握。「阿！你可以去找W，他是這裡最厲害的人，也許他知道該怎麼回去！」突然有一個人大聲喊道，我詢問完怎麼去並道謝之後，便趕忙出發了。</p>
      <button type="submit" class="btn btn-primary" style="width:100%;margin-bottom:20px;" onclick="Next_step()">下一步</button>
    </div>
  </div>
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeomCbkr7arq7I2GQlw9hrE-zdso8SoVQ&callback=initMap"></script>
<script>
  var story_data;
  var step = 0;
  var MaxStep = 0;
  // $(document).ready(function() {
  //   $.ajax({
  //     type: "GET",
  //     url: "<?=site_url('Story/my_story')?>",
  //     dataType: "json",
  //     data: {
  //       user_name: $('#name').text()
  //     },
  //     success: function(data) {
  //       story_data = data;
  //       MaxStep = story_data.story_location.length;

  //       renderStory();
  //     },
  //     error: function(e, a, f) {
  //       alert(f);
  //     }
  //   });
  // })

  function Next_step() {
    if (step < MaxStep - 1) {
      step = step + 1;
      renderStory();
    }
  }

  function renderStory() {
    document.getElementById('story').innerHTML = story_data.story[step].st_content;
    console.log(story_data.story_location[step]);
  }

  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: 24.140793, lng: 120.676346 },
      zoom: 14,
      mapTypeControl: false,
      streetViewControl: false,
    });
  }

  makerArray[makerArray.length] = new google.maps.Marker({   position: { lat: lat, lng: lng },   map: map,   title: 'Hello World!'  });

</script>
