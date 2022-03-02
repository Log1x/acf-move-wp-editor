(function ($) {
  $(document).ready(function () {
    if ($(".acf-field-wpeditor").length) {
      $("#postdivrich").on("load", function () {
        $(".acf-field-wpeditor .acf-input").append($("#postdivrich"));
      });
    }
  });
})(jQuery);
