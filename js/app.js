var squeakyclean = {
    menuInit: function() {
        jQuery('.sf-menu ul').superfish({
            delay: 1000,
            animation: {opacity:'show',height:'show'},
            speed: 'fast',
            dropShadows: false
        });

        jQuery('#openMobileMenu').on('click', (function () {
            var menuid = jQuery('nav.primary');
            if (!menuid.is(':visible')) {
                menuid.slideDown(300);
            } else {
                menuid.slideUp(300);
            };
        })
        );
    },
    pinSidebar: function() {
        var $body = jQuery('body');
        var pinnedClass = 'pinned-sidebar';
        if ($body.hasClass(pinnedClass)) {
            $body.removeClass(pinnedClass);
            localStorage.setItem('pinned', 'false');
        } else {
            $body.addClass('pinned-sidebar');
            localStorage.setItem('pinned', 'true');
        }
    },
/*    sidebarInit: function() {
        var mobileSidebar = jQuery('.mobile-sidebar'), widgets = jQuery('.widget-container')
        var leftCol = jQuery('#left-column-widgets ul'), rightCol = jQuery('#right-column-widgets ul');
        var leftHeight = 0, rightHeight = 0, shortest = 'left';
        mobileSidebar.show();

        widgets.each(function() {
            leftHeight = leftCol.height();
            rightHeight = rightCol.height();

            if (leftHeight < rightHeight) {
                jQuery(this).clone().appendTo(leftCol);
            } else {
                jQuery(this).clone().appendTo(rightCol);
            }
        });

        mobileSidebar.hide();
    },*/
    sidebarDrawerInit: function() {
        var pinned = localStorage.getItem('pinned');
        console.log('init');
        if (pinned === 'true') {
            jQuery('body').addClass('pinned-sidebar');
        }

        jQuery('.sidebar-scroll').html(jQuery('.sidebar').html());
    },
    toggleDrawer: function() {
        var $body = jQuery('body');
        if ($body.hasClass('open-drawer')) {
            $body.removeClass('open-drawer').addClass('close-drawer');
        } else {
            $body.removeClass('close-drawer').addClass('open-drawer');
        }

    }
}