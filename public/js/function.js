(function () {
    $.notify = function (text, type, position = null) {
        let color;
        switch (type) {
            case "success":
                color = "#219310";
                break;
            case "error":
                color = "#9E250E";
                break;
            case "warning":
                color = "#FA830A";
                break;
            default:
                color = "#1E27FF";
                break;
        }

        $.toast({
            text: text,
            showHideTransition: 'slide',  // It can be plain, fade or slide
            bgColor: '#A9A9A9',              // Background color for toast
            textColor: color,            // text color
            allowToastClose: false,       // Show the close button or not
            hideAfter: 5000,              // `false` to make it sticky or time in milliseconds to hide after
            stack: 5,                     // `false` to show one stack at a time count showing the number of toasts that can be shown at once
            textAlign: 'left',            // Alignment of text i.e. left, right, center
            position: position ?? 'top-right'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
        });
    }
})(jQuery);
