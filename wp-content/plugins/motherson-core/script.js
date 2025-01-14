jQuery(document).ready(function($) {
    // Toggle hamburger menu open/close
    $('.hamburger-icon').on('click', function() {
        $(this).toggleClass('close');
        $('.menu-container').toggleClass('open');
    });

    // Toggle sub-menu on menu-item click and collapse others
    $('.menu-item > a').on('click', function(e) {
        var $submenu = $(this).siblings('.sub-menu');
        
        if ($submenu.length) {
            e.preventDefault();  // Prevent default behavior if submenu exists

            // Close other submenus
            $('.menu-item').not($(this).parent()).removeClass('active');
            $('.sub-menu').not($submenu).slideUp(300); // Close other sub-menus

            // Ensure the current submenu is closed or open without conflicts
            if ($(this).parent().hasClass('active')) {
                $(this).parent().removeClass('active');
                $submenu.slideUp(300);  // Close current submenu
            } else {
                $(this).parent().addClass('active');
                $submenu.stop(true, true).slideDown(300);  // Open current submenu
            }
        }
    });

    // Prevent sub-menu collapse on sub-menu item click, allow page navigation
    $('.sub-menu li a').on('click', function(e) {
        e.stopPropagation();  // Prevent the event from bubbling up to parent
    });
});
