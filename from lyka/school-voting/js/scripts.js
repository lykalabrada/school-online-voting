
function viewCandidates() {
  $('#candidatesContainer').fadeIn();
  $('#btn-viewCandidates').hide();
  $('.welcome-banner h1').addClass('h1-normal');
  $('.welcome-banner p').addClass('p-normal');
  $('.welcome-banner').addClass('welcome-normal');
  $('.bg-banner').removeClass('bg-banner-small');
  $('#resultsContainer').fadeOut();
}
function viewResults() {
  $('#resultsContainer').fadeIn();
  $('#btn-viewResults').hide();
  $('.welcome-banner h1').addClass('h1-normal');
  $('.welcome-banner p').addClass('p-normal');
  $('.welcome-banner').addClass('welcome-normal');
  $('.bg-banner').addClass('bg-banner-small');
  $('#candidatesContainer').fadeOut();
}


$(document).ready(function() {
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
    });
        $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
    });  
        $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
  
    });  
        $('#activate-step-5').on('click', function(e) {
        $('ul.setup-panel li:eq(4)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-5"]').trigger('click');
    });  
        $('.activate-step-6').on('click', function(e) {
          $('ul.setup-panel li:eq(5)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-6"]').trigger('click');
        $('ul.setup-panel li:eq(0),ul.setup-panel li:eq(1),ul.setup-panel li:eq(2),ul.setup-panel li:eq(3),ul.setup-panel li:eq(4),ul.setup-panel li:eq(5)').addClass('disabled');
    });  
        /*
        $('#activate-step-7').on('click', function(e) {
        $('ul.setup-panel li:eq(6)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-7"]').trigger('click');
    });
        $('#activate-step-8').on('click', function(e) {
        $('ul.setup-panel li:eq(7)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-8"]').trigger('click');
    });  
      $('#activate-step-9').on('click', function(e) {
        $('ul.setup-panel li:eq(5)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-6"]').trigger('click');
        $('ul.setup-panel li:eq(0),ul.setup-panel li:eq(1),ul.setup-panel li:eq(2),ul.setup-panel li:eq(3),ul.setup-panel li:eq(4),ul.setup-panel li:eq(5)').addClass('disabled');
    }); */
});

