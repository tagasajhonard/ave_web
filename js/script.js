


    $(document).ready(function() {
        $('.management').on('click', function(event) {
            event.preventDefault();
            var $submenu = $(this).closest('.dropdown').find('.sub_menu');
            $submenu.toggleClass('show');
        });
        $('.manage').click(function(event) {
            event.preventDefault(); // Prevent the default action of the anchor tag
            $('.custpopupoverlay').removeClass('hideform').addClass('showform');
        });

    // Hide the popup when clicking on the "x" button
        $('.xbtn').click(function(event) {
            event.preventDefault(); // Prevent the default action
            $('.custpopupoverlay').removeClass('showform').addClass('hideform');
        });


        $('.productManage').click(function(event) {
            event.preventDefault(); // Prevent the default action of the anchor tag
            $('.ProductPopupOverlay').removeClass('hideform').addClass('showform');
        });

        $('.xbtn2').click(function(event) {
            event.preventDefault(); // Prevent the default action
            $('.ProductPopupOverlay').removeClass('showform').addClass('hideform');
        });

        $('.staff').click(function(event) {
            event.preventDefault(); 
            $('.custpopupoverlay1').removeClass('hideform').addClass('showform');
        });

        $('.xbtn3').click(function(event) {
            event.preventDefault(); 
            $('.custpopupoverlay1').removeClass('showform').addClass('hideform');
        });


         $('.sideBar li').click(function() {
            $('.sideBar li').removeClass('focused');
            $(this).addClass('focused');
        });
        
    });

