(function($) {
  $(document).ready(function() {
    (function() {
      var deskFunctions = function() {
        //make dropdown hoverable
        $(".dropdown-toggle").attr("data-toggle", "hover");

        //make paragraphs line up in a certain way on the bottom of the homepage
        $.each($(".attach-me"), function(index, value) {
          $(this).appendTo($(this).data("target-desk"));
        });
      };

      var mobileFunctions = function() {
        //make dropdown clickable
        $(".dropdown-toggle").attr("data-toggle", "dropdown");

        //make paragraphs line up in a certain way on the bottom of the homepage
        //it is bad I know
        $.each($(".attach-me"), function(index, value) {
          $(this).appendTo($(this).data("target-mobile"));
        });
      };

      $(".link-sync a").hover(function() {
        $($(this).data("target")).toggleClass("active");
      });

      var timeout;
      window.addEventListener(
        "resize",
        function(event) {
          if (timeout) {
            window.cancelAnimationFrame(timeout);
          }
          timeout = window.requestAnimationFrame(function() {
            resize();
          });
        },
        false
      );

      function resize() {
        if ($(window).width() >= 1200) {
          deskFunctions();
        } else if ($(window).width() < 1200) {
          mobileFunctions();
        }
      }

      resize();
    })();
  });
})(jQuery);
