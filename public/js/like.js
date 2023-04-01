
$(function () {

    let like = $('.like-toggle'); 
    let likeCosmeticId; 
    like.on('click', function () {
      let $this = $(this); 
      likeCosmeticId = $this.data('cosmetic-id'); 

      $.ajax({
        headers: { 
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }, 
        url: '/like', 
        method: 'POST', 
        data: { 
          'cosmetic_id': likeCosmeticId 
        },
      })

      .done(function (data) {
        $this.toggleClass('liked'); 
        $this.next('.like-counter').html(data.cosmetic_likes_count);
      })

      .fail(function () {
        console.log('fail'); 
      });
    });
    });