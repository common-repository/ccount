jQuery(document).ready(function ($) {
  $("#dashboard_commenter_counter .more").click(function(e) {
    e.preventDefault();
    var len = $('#dashboard_commenter_counter .no_display').length;
    $("#dashboard_commenter_counter .no_display").each(function(index) {
      $(this).show('slow');
      $(this).removeClass("no_display");
      if (index == len - 1) {
        $("#dashboard_commenter_counter .more").addClass("no_display");
      }
      return (index != 4);
    });
  });
});