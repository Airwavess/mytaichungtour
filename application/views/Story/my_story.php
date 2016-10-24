<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center page-header">這是屬於<span id="name"><?=$name?></span>的故事</h2>
      <p id="story" class="lead"></p>
      <button type="submit" class="btn btn-primary" style="width:100%;" onclick="Next_step()">下一步</button>
    </div>
  </div>
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url('assets/vendor/metisMenu/metisMenu.min.js')?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url('assets/scripts/sb-admin-2.js')?>"></script>

<!-- Script to Activate the Carousel -->
<script>
  $('.carousel').carousel({
    interval: 5000
  })

  var story_data;
  var step = 0;
  var MaxStep = 0;
  $(document).ready(function() {
    $.ajax({
      type: "GET",
      url: "<?=site_url('Story/my_story')?>",
      dataType: "json",
      data: {
        user_name: $('#name').text()
      },
      success: function(data) {
        story_data = data;
        MaxStep = story_data.story_location.length;
        console.log(story_data);
        renderStory();
      },
      error: function(e, a, f) {
        alert(f);
      }
    });
  })

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
</script>
