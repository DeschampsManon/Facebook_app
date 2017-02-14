function gallery_masonry(){
  $('.grid').masonry({
    itemSelector: '.grid-item'
  });
}

function custom_select(){
 $('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });
  });
}

function custom_input_file(){
  $('input[type="file"]').change(function(){
    alert("a");
    var value = $("input[type='file']").val();
    $('.js-value').text(value);
  });
}

function display_album() {
  var rel = $(this).attr("rel");
  $('#pictures .album').addClass("hidden");
  $('#pictures .album[album='+rel+']').removeClass("hidden");
}

function search_user(){
  var search = $(this).val().toLowerCase();
  console.log(search)
  $('.user-picture').each(function(){
      var author = $(this).find('.author').html().toLowerCase();
      var result = author.search(search);
      if(result == -1) {
        $(this).hide();
        $(".no-result-found").removeClass("hidden");
      }else{
        $(this).show();
        $(".no-result-found").addClass("hidden");
      }
  });
}


$(document).ready(function(){
  gallery_masonry();
  custom_select();
  custom_input_file();
  $('.select-options li').click(display_album);
  $('#search-user').keyup(search_user);
})





